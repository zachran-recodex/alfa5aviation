<?php

namespace App\Livewire;

use App\Models\About;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageAbout extends Component
{
    use WithFileUploads;

    // Form properties
    public $aboutId;
    public $title;
    public $image;
    public $newImage;
    public $description;
    public $vision;
    public $mission;

    // Define listeners for events
    protected $listeners = ['refreshAbout' => '$refresh'];

    // Validation rules
    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'newImage' => $this->aboutId ? 'nullable|image|max:1024' : 'required|image|max:1024',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->loadAboutData();
    }

    public function loadAboutData()
    {
        $about = About::first();

        if ($about) {
            $this->aboutId = $about->id;
            $this->title = $about->title;
            $this->image = $about->image;
            $this->description = $about->description;
            $this->vision = $about->vision;
            $this->mission = $about->mission;
        }
    }

    public function save()
    {
        $this->validate();

        try {
            $about = About::firstOrNew(['id' => $this->aboutId]);

            // Handle image upload if a new image is selected
            if ($this->newImage) {
                // Delete the old image if it exists
                if ($about->image && Storage::disk('public')->exists($about->image)) {
                    Storage::disk('public')->delete($about->image);
                }

                // Store the new image
                $imagePath = $this->newImage->store('about', 'public');
                $about->image = $imagePath;
            }

            $about->title = $this->title;
            $about->description = $this->description;
            $about->vision = $this->vision;
            $about->mission = $this->mission;
            $about->save();

            $this->aboutId = $about->id;
            $this->newImage = null;

            session()->flash('message', 'About content successfully updated.');

        } catch (\Exception $e) {
            session()->flash('error', 'Something wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.manage-about');
    }
}
