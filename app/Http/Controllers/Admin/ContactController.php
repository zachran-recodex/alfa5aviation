<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Service;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderByDesc('id')->paginate(10);

        $services = Service::where('status', 1)->pluck('title', 'slug')->toArray();

        return view('admin.contacts.index', compact('contacts', 'services'));
    }

    public function show(Contact $contact)
    {
        $services = Service::where('status', 1)->pluck('title', 'slug')->toArray();

        return view('admin.contacts.detail', compact('contact', 'services'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('toast', ['type' => 'success', 'message' => 'Contact deleted successfully.']);
    }
}
