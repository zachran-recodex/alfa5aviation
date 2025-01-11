<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\FleetStoreRequest;
use App\Http\Requests\Dashboard\FleetUpdateRequest;
use App\Models\Fleet;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FleetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fleets = Fleet::orderByDesc('id')->paginate(10);

        return view('dashboard.fleet.index', compact('fleets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.fleet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FleetStoreRequest $request)
    {

        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('fleet', 'public');
        }

        $validated['is_active'] = true;

        Fleet::create($validated);

        return redirect()->route('dashboard.fleet.index')->with('notification', [
            'variant' => 'success',
            'title' => 'Success!',
            'message' => 'Fleet created successfully.',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fleet $fleet)
    {
        return view('dashboard.fleet.edit', compact('fleet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FleetUpdateRequest $request, Fleet $fleet)
    {
        $validated = $request->validated();

        if ($validated['title'] !== $fleet->title) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if ($request->hasFile('image')) {
            if ($fleet->image) {
                Storage::disk('public')->delete($fleet->image);
            }
            $validated['image'] = $request->file('image')->store('fleet', 'public');
        }

        $fleet->update($validated);

        return redirect()->route('dashboard.fleet.index')->with('notification', [
            'variant' => 'success',
            'title' => 'Success!',
            'message' => 'Fleet updated successfully.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fleet $fleet)
    {
        if ($fleet->image) {
            Storage::disk('public')->delete($fleet->image);
        }

        $fleet->delete();

        return redirect()->route('dashboard.fleet.index')->with('notification', [
            'variant' => 'success',
            'title' => 'Success!',
            'message' => 'Fleet deleted successfully.',
        ]);
    }
}
