<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::orderByDesc('id')->paginate(10);

        return view('dashboard.contact.index', compact('contacts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('dashboard.contact.show', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('dashboard.contact.index')->with('notification', [
            'variant' => 'success',
            'title' => 'Success!',
            'message' => 'Contact deleted successfully.',
        ]);
    }
}
