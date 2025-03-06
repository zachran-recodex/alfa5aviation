<?php

namespace App\Livewire;

use App\Models\HeroSection;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManageHeroSection extends Component
{
    use WithFileUploads;

    // Form properties
    public $heroSectionId;
    public $title;
    public $image;
    public $newImage;

    // Define listeners for events
    protected $listeners = ['refreshHeroSection' => '$refresh'];

    // Validation rules
    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'newImage' => $this->heroSectionId ? 'nullable|image|max:1024' : 'required|image|max:1024',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->loadHeroSectionData();
    }

    public function loadHeroSectionData()
    {
        $heroSection = HeroSection::first();

        if ($heroSection) {
            $this->heroSectionId = $heroSection->id;
            $this->title = $heroSection->title;
            $this->image = $heroSection->image;
        }
    }

    public function save()
    {
        $this->validate();

        try {
            $heroSection = HeroSection::firstOrNew(['id' => $this->heroSectionId]);

            // Handle image upload if a new image is selected
            if ($this->newImage) {
                // Delete the old image if it exists
                if ($heroSection->image && Storage::disk('public')->exists($heroSection->image)) {
                    Storage::disk('public')->delete($heroSection->image);
                }

                // Store the new image
                $imagePath = $this->newImage->store('hero-section', 'public');
                $heroSection->image = $imagePath;
            }

            $heroSection->title = $this->title;
            $heroSection->save();

            $this->heroSectionId = $heroSection->id;
            $this->newImage = null;

            session()->flash('message', 'Hero section successfully updated.');

        } catch (\Exception $e) {
            session()->flash('error', 'Something wrong: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.manage-hero-section');
    }
}
