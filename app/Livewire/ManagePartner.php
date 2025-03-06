<?php

namespace App\Livewire;

use App\Models\Partner;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManagePartner extends Component
{
    use WithFileUploads, WithPagination;

    // Form properties
    public $partnerId;
    public $title;
    public $image;
    public $newImage;
    public $link;
    public $is_active = true;

    // UI state properties
    public $isEditing = false;
    public $search = '';

    // Define listeners for events
    protected $listeners = ['refreshPartners' => '$refresh'];

    // Tambahkan protected $queryString untuk mengizinkan pagination dan pencarian via URL
    protected $queryString = [
        'search' => ['except' => '']
    ];

    // Validation rules
    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'link' => 'nullable|url|max:255',
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
        $partner = Partner::find($id);

        if ($partner) {
            $this->resetValidation();
            $this->isEditing = true;

            $this->partnerId = $partner->id;
            $this->title = $partner->title;
            $this->image = $partner->image;
            $this->link = $partner->link;
            $this->is_active = $partner->is_active;

            $this->dispatch('flux-show-modal', name: 'form');
        }
    }

    public function confirmDelete($id)
    {
        $this->partnerId = $id;
        $this->dispatch('flux-show-modal', name: 'delete-data');
    }

    public function cancelDelete()
    {
        $this->partnerId = null;
    }

    public function delete()
    {
        $partner = Partner::find($this->partnerId);

        if ($partner) {
            // Delete the associated image
            if ($partner->image && Storage::disk('public')->exists($partner->image)) {
                Storage::disk('public')->delete($partner->image);
            }

            $partner->delete();
            session()->flash('message', 'Partner successfully deleted.');

            $this->dispatch('flux-close-modal', name: 'delete-data');
        }

        $this->dispatch('refreshPartners');
    }

    public function save()
    {
        $this->validate();

        try {
            if ($this->isEditing) {
                $partner = Partner::find($this->partnerId);

                // Handle image upload if a new image is selected
                if ($this->newImage) {
                    // Delete the old image
                    if ($partner->image && Storage::disk('public')->exists($partner->image)) {
                        Storage::disk('public')->delete($partner->image);
                    }

                    // Store the new image
                    $imagePath = $this->newImage->store('partners', 'public');
                    $partner->image = $imagePath;
                }

                $partner->title = $this->title;
                $partner->link = $this->link;
                $partner->is_active = $this->is_active;
                $partner->save();

                session()->flash('message', 'Partner successfully updated.');
            } else {
                // Store the image
                $imagePath = $this->newImage->store('partners', 'public');

                // Create new partner
                Partner::create([
                    'title' => $this->title,
                    'image' => $imagePath,
                    'link' => $this->link,
                    'is_active' => $this->is_active,
                ]);

                session()->flash('message', 'Partner successfully created.');
            }

            $this->resetForm();
            $this->dispatch('flux-close-modal', name: 'form');

        } catch (\Exception $e) {
            session()->flash('error', 'Something wrong: ' . $e->getMessage());
        }
    }

    public function resetForm()
    {
        $this->reset(['partnerId', 'title', 'newImage', 'link', 'is_active']);
        $this->isEditing = false;
        $this->resetValidation();
    }

    public function render()
    {
        $partners = Partner::where('title', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.manage-partner', [
            'partners' => $partners
        ]);
    }
}
