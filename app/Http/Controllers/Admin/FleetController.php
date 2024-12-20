<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FleetStoreRequest;
use App\Http\Requests\Admin\FleetUpdateRequest;
use App\Models\Fleet;
use Illuminate\Support\Str;

class FleetController extends Controller
{
    public function index()
    {
        $fleets = Fleet::orderByDesc('id')->paginate(10);

        return view('admin.fleets.index', compact('fleets'));
    }

    public function create()
    {
        return view('admin.fleets.create');
    }

    public function store(FleetStoreRequest $request)
    {
        $fleet = new Fleet();

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
        $fleet->status = true;

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/fleets'), $filename);
            $fleet->image = 'uploads/fleets/' . $filename;
        }

        $fleet->save();

        return redirect()
            ->route('admin.fleets.index')
            ->with('toast', ['type' => 'success', 'message' => 'Fleet created successfully.']);
    }

    public function edit(Fleet $fleet)
    {
        return view('admin.fleets.edit', compact('fleet'));
    }

    public function update(FleetUpdateRequest $request, Fleet $fleet)
    {
        // Update fields with request data
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
        $fleet->status = $request->boolean('status', true);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($fleet->image && file_exists(public_path($fleet->image))) {
                unlink(public_path($fleet->image));
            }

            $file = $request->file('image');
            $filename = time() . '-' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/fleets'), $filename);
            $fleet->image = 'uploads/fleets/' . $filename;
        }

        $fleet->save();

        return redirect()
            ->route('admin.fleets.index')
            ->with('toast', ['type' => 'success', 'message' => 'Fleet updated successfully.']);
    }

    public function destroy(Fleet $fleet)
    {
        // Delete image from public folder if exists
        if ($fleet->image && file_exists(public_path($fleet->image))) {
            unlink(public_path($fleet->image));
        }

        $fleet->delete();

        return redirect()
            ->route('admin.fleets.index')
            ->with('toast', ['type' => 'danger', 'message' => 'Fleet deleted successfully.']);
    }
}
