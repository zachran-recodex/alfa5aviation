<?php

namespace App\Livewire;

use App\Models\Fleet;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageFleet extends Component
{
    use WithFileUploads, WithPagination;

    // Form properties
    public $fleetId;
    public $title;
    public $description;
    public $image;
    public $newImage;
    public $start_model_year;
    public $end_model_year;
    public $fleet_size;
    public $engine_count;
    public $passenger;
    public $model_class;
    public $range;
    public $max_cruising_speed;
    public $ceiling;
    public $take_off_distance;
    public $landing_distance;
    public $is_active = true;

    // UI state properties
    public $isEditing = false;
    public $search = '';

    // Define listeners for events
    protected $listeners = ['refreshFleets' => '$refresh'];

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
            'start_model_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 10),
            'end_model_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 10),
            'fleet_size' => 'nullable|integer|min:0',
            'engine_count' => 'nullable|integer|min:0',
            'passenger' => 'nullable|integer|min:0',
            'model_class' => 'nullable|string|max:255',
            'range' => 'nullable|integer|min:0',
            'max_cruising_speed' => 'nullable|integer|min:0',
            'ceiling' => 'nullable|integer|min:0',
            'take_off_distance' => 'nullable|integer|min:0',
            'landing_distance' => 'nullable|integer|min:0',
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
        $fleet = Fleet::find($id);

        if ($fleet) {
            $this->resetValidation();
            $this->isEditing = true;

            $this->fleetId = $fleet->id;
            $this->title = $fleet->title;
            $this->description = $fleet->description;
            $this->image = $fleet->image;
            $this->start_model_year = $fleet->start_model_year;
            $this->end_model_year = $fleet->end_model_year;
            $this->fleet_size = $fleet->fleet_size;
            $this->engine_count = $fleet->engine_count;
            $this->passenger = $fleet->passenger;
            $this->model_class = $fleet->model_class;
            $this->range = $fleet->range;
            $this->max_cruising_speed = $fleet->max_cruising_speed;
            $this->ceiling = $fleet->ceiling;
            $this->take_off_distance = $fleet->take_off_distance;
            $this->landing_distance = $fleet->landing_distance;
            $this->is_active = $fleet->is_active;

            $this->dispatch('flux-show-modal', name: 'form');
        }
    }

    public function confirmDelete($id)
    {
        $this->fleetId = $id;
        $this->dispatch('flux-show-modal', name: 'delete-data');
    }

    public function cancelDelete()
    {
        $this->fleetId = null;
    }

    public function delete()
    {
        $fleet = Fleet::find($this->fleetId);

        if ($fleet) {
            // Delete the associated image
            if ($fleet->image && Storage::disk('public')->exists($fleet->image)) {
                Storage::disk('public')->delete($fleet->image);
            }

            $fleet->delete();
            session()->flash('message', 'Fleet successfully deleted.');

            $this->dispatch('flux-close-modal', name: 'delete-data');
        }

        $this->dispatch('refreshFleets');
    }

    public function save()
    {
        $this->validate();

        try {
            if ($this->isEditing) {
                $fleet = Fleet::find($this->fleetId);

                // Handle image upload if a new image is selected
                if ($this->newImage) {
                    // Delete the old image
                    if ($fleet->image && Storage::disk('public')->exists($fleet->image)) {
                        Storage::disk('public')->delete($fleet->image);
                    }

                    // Store the new image
                    $imagePath = $this->newImage->store('fleets', 'public');
                    $fleet->image = $imagePath;
                }

                $fleet->title = $this->title;
                $fleet->description = $this->description;
                $fleet->start_model_year = $this->start_model_year;
                $fleet->end_model_year = $this->end_model_year;
                $fleet->fleet_size = $this->fleet_size;
                $fleet->engine_count = $this->engine_count;
                $fleet->passenger = $this->passenger;
                $fleet->model_class = $this->model_class;
                $fleet->range = $this->range;
                $fleet->max_cruising_speed = $this->max_cruising_speed;
                $fleet->ceiling = $this->ceiling;
                $fleet->take_off_distance = $this->take_off_distance;
                $fleet->landing_distance = $this->landing_distance;
                $fleet->is_active = $this->is_active;
                $fleet->save();

                session()->flash('message', 'Fleet successfully updated.');
            } else {
                // Store the image
                $imagePath = $this->newImage->store('fleets', 'public');

                // Create new fleet
                Fleet::create([
                    'title' => $this->title,
                    'description' => $this->description,
                    'image' => $imagePath,
                    'start_model_year' => $this->start_model_year,
                    'end_model_year' => $this->end_model_year,
                    'fleet_size' => $this->fleet_size,
                    'engine_count' => $this->engine_count,
                    'passenger' => $this->passenger,
                    'model_class' => $this->model_class,
                    'range' => $this->range,
                    'max_cruising_speed' => $this->max_cruising_speed,
                    'ceiling' => $this->ceiling,
                    'take_off_distance' => $this->take_off_distance,
                    'landing_distance' => $this->landing_distance,
                    'is_active' => $this->is_active,
                ]);

                session()->flash('message', 'Fleet successfully created.');
            }

            $this->resetForm();
            $this->dispatch('flux-close-modal', name: 'form');

        } catch (\Exception $e) {
            session()->flash('error', 'Something wrong: ' . $e->getMessage());
        }
    }

    public function resetForm()
    {
        $this->reset([
            'fleetId', 'title', 'description', 'newImage', 'is_active',
            'start_model_year', 'end_model_year', 'fleet_size', 'engine_count',
            'passenger', 'model_class', 'range', 'max_cruising_speed',
            'ceiling', 'take_off_distance', 'landing_distance'
        ]);
        $this->isEditing = false;
        $this->resetValidation();
    }

    public function render()
    {
        $fleets = Fleet::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->orWhere('model_class', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.manage-fleet', [
            'fleets' => $fleets
        ]);
    }
}
