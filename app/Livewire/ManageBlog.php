<?php

namespace App\Livewire;

use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageBlog extends Component
{
    use WithFileUploads, WithPagination;

    // Form properties
    public $blogId;
    public $title;
    public $description;
    public $image;
    public $newImage;
    public $is_active = true;

    // UI state properties
    public $isEditing = false;
    public $search = '';

    // Define listeners for events
    protected $listeners = ['refreshBlogs' => '$refresh'];

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
        $blog = Blog::find($id);

        if ($blog) {
            $this->resetValidation();
            $this->isEditing = true;

            $this->blogId = $blog->id;
            $this->title = $blog->title;
            $this->description = $blog->description;
            $this->image = $blog->image;
            $this->is_active = $blog->is_active;

            $this->dispatch('flux-show-modal', name: 'form');
        }
    }

    public function confirmDelete($id)
    {
        $this->blogId = $id;
        $this->dispatch('flux-show-modal', name: 'delete-data');
    }

    public function cancelDelete()
    {
        $this->blogId = null;
    }

    public function delete()
    {
        $blog = Blog::find($this->blogId);

        if ($blog) {
            // Delete the associated image
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }

            $blog->delete();
            session()->flash('message', 'Blog successfully deleted.');

            $this->dispatch('flux-close-modal', name: 'delete-data');
        }

        $this->dispatch('refreshBlogs');
    }

    public function save()
    {
        $this->validate();

        try {
            if ($this->isEditing) {
                $blog = Blog::find($this->blogId);

                // Handle image upload if a new image is selected
                if ($this->newImage) {
                    // Delete the old image
                    if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                        Storage::disk('public')->delete($blog->image);
                    }

                    // Store the new image
                    $imagePath = $this->newImage->store('blogs', 'public');
                    $blog->image = $imagePath;
                }

                $blog->title = $this->title;
                $blog->description = $this->description;
                $blog->is_active = $this->is_active;
                $blog->save();

                session()->flash('message', 'Blog successfully updated.');
            } else {
                // Store the image
                $imagePath = $this->newImage->store('blogs', 'public');

                // Create new blog
                Blog::create([
                    'title' => $this->title,
                    'description' => $this->description,
                    'image' => $imagePath,
                    'is_active' => $this->is_active,
                ]);

                session()->flash('message', 'Blog successfully created.');
            }

            $this->resetForm();
            $this->dispatch('flux-close-modal', name: 'form');

        } catch (\Exception $e) {
            session()->flash('error', 'Something wrong: ' . $e->getMessage());
        }
    }

    public function resetForm()
    {
        $this->reset(['blogId', 'title', 'description', 'newImage', 'is_active']);
        $this->isEditing = false;
        $this->resetValidation();
    }

    public function render()
    {
        $blogs = Blog::where('title', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')  // Tambahkan pencarian berdasarkan deskripsi juga
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.manage-blog', [
            'blogs' => $blogs
        ]);
    }
}
