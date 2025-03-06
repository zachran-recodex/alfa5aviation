<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ManageContact extends Component
{
    use WithPagination;

    // UI state properties
    public $search = '';
    public $selectedContact = null;
    public $showUnreadOnly = false;

    // Define listeners for events
    protected $listeners = ['refreshContacts' => '$refresh'];

    // Tambahkan protected $queryString untuk mengizinkan pagination dan pencarian via URL
    protected $queryString = [
        'search' => ['except' => ''],
        'showUnreadOnly' => ['except' => false]
    ];

    // Tambahkan method ini untuk reset pagination saat pencarian diubah
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedShowUnreadOnly()
    {
        $this->resetPage();
    }

    public function viewDetails($id)
    {
        $this->selectedContact = Contact::find($id);
        $this->dispatch('flux-show-modal', name: 'contact-details');
    }

    public function markAsRead($id)
    {
        $contact = Contact::find($id);

        if ($contact && !$contact->is_read) {
            $contact->is_read = true;
            $contact->save();

            session()->flash('message', 'Contact message marked as read.');

            // If we're showing unread only and viewing the contact details, close the modal
            if ($this->showUnreadOnly && $this->selectedContact && $this->selectedContact->id === $id) {
                $this->selectedContact = Contact::find($id); // Refresh the selected contact
                $this->dispatch('flux-close-modal', name: 'contact-details');
            } else {
                $this->selectedContact = Contact::find($id); // Just refresh the selected contact
            }

            $this->dispatch('refreshContacts');
        }
    }

    public function confirmDelete($id)
    {
        $this->selectedContact = Contact::find($id);
        $this->dispatch('flux-show-modal', name: 'delete-data');
    }

    public function delete()
    {
        if ($this->selectedContact) {
            $this->selectedContact->delete();
            session()->flash('message', 'Contact message successfully deleted.');

            $this->dispatch('flux-close-modal', name: 'delete-data');
            $this->selectedContact = null;
        }

        $this->dispatch('refreshContacts');
    }

    public function render()
    {
        $query = Contact::query();

        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('subject', 'like', '%' . $this->search . '%')
                    ->orWhere('message', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->showUnreadOnly) {
            $query->where('is_read', false);
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.manage-contact', [
            'contacts' => $contacts
        ]);
    }
}
