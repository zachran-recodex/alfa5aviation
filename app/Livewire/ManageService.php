<?php

namespace App\Livewire;

use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageService extends Component
{
    use WithFileUploads, WithPagination;

    // Form properties
    public $serviceId;
    public $title;
    public $description;
    public $image;
    public $newImage;
    public $is_active = true;

    // UI state properties
    public $isEditing = false;
    public $search = '';

    // Define listeners for events
    protected $listeners = ['refreshServices' => '$refresh'];

    // Tambahkan protected $queryString untuk mengizinkan pagination dan pencarian via URL
    protected $queryString = [
        'search' => ['except' => '']
    ];

    // Validation rules
    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'boolean',
            'newImage' => $this->isEditing ? 'nullable|image|max:1024' : 'required|image|max:1024',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Tambahkan method ini untuk reset pagination saat pencarian diubah
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
        $this->dispatch('flux-show-modal', name: 'form');
    }

    public function edit($id)
    {
        $service = Service::find($id);

        if ($service) {
            $this->resetValidation();
            $this->isEditing = true;

            $this->serviceId = $service->id;
            $this->title = $service->title;
            $this->description = $service->description;
            $this->image = $service->image;
            $this->is_active = $service->is_active;

            $this->dispatch('flux-show-modal', name: 'form');
        }
    }

    public function confirmDelete($id)
    {
        $this->serviceId = $id;
        $this->dispatch('flux-show-modal', name: 'delete-data');
    }

    public function cancelDelete()
    {
        $this->serviceId = null;
    }

    public function delete()
    {
        $service = Service::find($this->serviceId);

        if ($service) {
            // Delete the associated image
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }

            $service->delete();
            session()->flash('message', 'Service successfully deleted.');

            $this->dispatch('flux-close-modal', name: 'delete-data');
        }

        $this->dispatch('refreshServices');
    }

    public function save()
    {
        $this->validate();

        try {
            if ($this->isEditing) {
                $service = Service::find($this->serviceId);

                // Handle image upload if a new image is selected
                if ($this->newImage) {
                    // Delete the old image
                    if ($service->image && Storage::disk('public')->exists($service->image)) {
                        Storage::disk('public')->delete($service->image);
                    }

                    // Store the new image
                    $imagePath = $this->newImage->store('services', 'public');
                    $service->image = $imagePath;
                }

                $service->title = $this->title;
                $service->description = $this->description;
                $service->is_active = $this->is_active;
                $service->save();

                session()->flash('message', 'Service successfully updated.');
            } else {
                // Store the image
                $imagePath = $this->newImage->store('services', 'public');

                // Create new service
                Service::create([
                    'title' => $this->title,
                    'description' => $this->description,
                    'image' => $imagePath,
                    'is_active' => $this->is_active,
                ]);

                session()->flash('message', 'Service successfully created.');
            }

            $this->resetForm();
            $this->dispatch('flux-close-modal', name: 'form');

        } catch (\Exception $e) {
            session()->flash('error', 'Something wrong: ' . $e->getMessage());
        }
    }

    public function resetForm()
    {
        $this->reset(['serviceId', 'title', 'description', 'newImage', 'is_active']);
        $this->isEditing = false;
        $this->resetValidation();
    }

    public function render()
    {
        $services = Service::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.manage-service', [
            'services' => $services
        ]);
    }
}
