<?php

namespace App\Http\Controllers;

use App\Http\Requests\FleetStoreRequest;
use App\Http\Requests\FleetUpdateRequest;
use App\Models\Fleet;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FleetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data fleet dengan pagination
        $fleets = Fleet::orderBy('id')->paginate(10);

        return view('admin.fleets.index', compact('fleets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk membuat fleet baru
        return view('admin.fleets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FleetStoreRequest $request)
    {
        $fleet = new Fleet();

        // Assign nilai dari request ke object Fleet
        $fleet->title = $request->title;
        $fleet->slug = Str::slug($request->title);
        $fleet->description = $request->description;
        $fleet->start_model_year = $request->start_model_year;
        $fleet->end_model_year = $request->end_model_year;
        $fleet->fleet_size = $request->fleet_size;
        $fleet->engine_count = $request->engine_count;
        $fleet->passenger = $request->passenger;
        $fleet->model_class = $request->model_class;
        $fleet->range = $request->range;
        $fleet->max_cruising_speed = $request->max_cruising_speed;
        $fleet->ceiling = $request->ceiling;
        $fleet->take_off_distance = $request->take_off_distance;
        $fleet->landing_distance = $request->landing_distance;
        $fleet->status = $request->status;

        // Handle image upload jika ada
        if ($request->hasFile('image')) {
            $fleet->image = $request->file('image')->store('fleets', 'public');
        }

        // Simpan data fleet ke database
        $fleet->save();

        return redirect()->route('admin.fleets.index')->with('success', 'Fleet created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fleet $fleet)
    {
        // Tampilkan form edit dengan data yang sudah ada
        return view('admin.fleets.edit', compact('fleet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FleetUpdateRequest $request, Fleet $fleet)
    {
        // Update data dari request
        $fleet->title = $request->title;
        $fleet->slug = Str::slug($request->title);
        $fleet->description = $request->description;
        $fleet->start_model_year = $request->start_model_year;
        $fleet->end_model_year = $request->end_model_year;
        $fleet->fleet_size = $request->fleet_size;
        $fleet->engine_count = $request->engine_count;
        $fleet->passenger = $request->passenger;
        $fleet->model_class = $request->model_class;
        $fleet->range = $request->range;
        $fleet->max_cruising_speed = $request->max_cruising_speed;
        $fleet->ceiling = $request->ceiling;
        $fleet->take_off_distance = $request->take_off_distance;
        $fleet->landing_distance = $request->landing_distance;
        $fleet->status = $request->status;

        // Handle image upload jika ada file baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($fleet->image) {
                Storage::disk('public')->delete($fleet->image);
            }
            $fleet->image = $request->file('image')->store('fleets', 'public');
        }

        // Simpan perubahan
        $fleet->save();

        return redirect()->route('admin.fleets.index')->with('success', 'Fleet updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fleet $fleet)
    {
        // Hapus gambar jika ada
        if ($fleet->image) {
            Storage::disk('public')->delete($fleet->image);
        }

        // Hapus data fleet
        $fleet->delete();

        return redirect()->route('admin.fleets.index')->with('success', 'Fleet deleted successfully');
    }
}
