<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceStoreRequest;
use App\Http\Requests\Admin\ServiceUpdateRequest;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderByDesc('id')->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(ServiceStoreRequest $request)
    {
        $service = new Service();

        // Update fields with request data
        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->description = $request->description;
        $service->status = true;

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/services'), $filename);
            $service->image = 'uploads/services/' . $filename;
        }

        $service->save();

        return redirect()
            ->route('admin.services.index')
            ->with('toast', ['type' => 'success', 'message' => 'Service created successfully.']);
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(ServiceUpdateRequest $request, Service $service)
    {
        // Update fields with request data
        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->description = $request->description;
        $service->status = $request->boolean('status', true);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }

            $file = $request->file('image');
            $filename = time() . '-' . Str::slug($request->title) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/services'), $filename);
            $service->image = 'uploads/services/' . $filename;
        }

        $service->save();

        return redirect()
            ->route('admin.services.index')
            ->with('toast', ['type' => 'success', 'message' => 'Service updated successfully.']);
    }

    public function destroy(Service $service)
    {
        // Delete image from public folder if exists
        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }

        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('toast', ['type' => 'danger', 'message' => 'Service deleted successfully.']);
    }
}
