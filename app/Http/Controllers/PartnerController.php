<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerStoreRequest;
use App\Http\Requests\PartnerUpdateRequest;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::orderBy('id')->paginate(12);

        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PartnerStoreRequest $request)
    {
        $partner = new Partner();

        // Update fields with request data
        $partner->title = $request->title;
        // Handle image upload
        if ($request->hasFile('image')) {
            $partner->image = $request->file('image')->store('partners', 'public');
        }
        $partner->url = $request->url;
        $partner->status = $request->status;

        $partner->save();

        return redirect()->route('admin.partners.index')->with('success', 'Partner created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PartnerUpdateRequest $request, Partner $partner)
    {
        // Update fields with request data
        $partner->title = $request->title;
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($partner->image) {
                Storage::disk('public')->delete($partner->image);
            }
            $partner->image = $request->file('image')->store('partners', 'public');
        }
        $partner->url = $request->url;
        $partner->status = $request->status;

        $partner->save();

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        // Delete images from storage if they exist
        if ($partner->image) {
            Storage::disk('public')->delete($partner->image);
        }

        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted successfully');
    }
}
