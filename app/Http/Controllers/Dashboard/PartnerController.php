<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PartnerStoreRequest;
use App\Http\Requests\Dashboard\PartnerUpdateRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::orderByDesc('id')->paginate(10);

        return view('dashboard.partner.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
            'url' => ['nullable', 'url', 'max:255'], // Validasi URL
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('partner', 'public');
        }

        $validated['is_active'] = true;

        Partner::create($validated);

        return redirect()->route('dashboard.partner.index')->with('notification', [
            'variant' => 'success',
            'title' => 'Success!',
            'message' => 'Partner created successfully.',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('dashboard.partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'],
            'url' => ['nullable', 'url', 'max:255'], // Validasi URL
        ]);

        if ($request->hasFile('image')) {
            if ($partner->image) {
                Storage::disk('public')->delete($partner->image);
            }
            $validated['image'] = $request->file('image')->store('partner', 'public');
        }

        $partner->update($validated);

        return redirect()->route('dashboard.partner.index')->with('notification', [
            'variant' => 'success',
            'title' => 'Success!',
            'message' => 'Partner updated successfully.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        if ($partner->image) {
            Storage::disk('public')->delete($partner->image);
        }

        $partner->delete();

        return redirect()->route('dashboard.partner.index')->with('notification', [
            'variant' => 'success',
            'title' => 'Success!',
            'message' => 'Partner deleted successfully.',
        ]);
    }
}
