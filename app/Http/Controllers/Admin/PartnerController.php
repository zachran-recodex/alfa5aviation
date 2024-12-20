<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PartnerStoreRequest;
use App\Http\Requests\Admin\PartnerUpdateRequest;
use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderByDesc('id')->paginate(10);

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(PartnerStoreRequest $request)
    {
        $partner = new Partner();

        // Update fields with request data
        $partner->title = $request->title;
        $partner->url = $request->url;
        $partner->status = true;

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/partners'), $filename);
            $partner->image = 'uploads/partners/' . $filename;
        }

        $partner->save();

        return redirect()
            ->route('admin.partners.index')
            ->with('toast', ['type' => 'success', 'message' => 'Partner created successfully.']);
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(PartnerUpdateRequest $request, Partner $partner)
    {
        // Update fields with request data
        $partner->title = $request->title;
        $partner->url = $request->url;
        $partner->status = $request->boolean('status', true);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($partner->image && file_exists(public_path($partner->image))) {
                unlink(public_path($partner->image));
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/partners'), $filename);
            $partner->image = 'uploads/partners/' . $filename;
        }

        $partner->save();

        return redirect()
            ->route('admin.partners.index')
            ->with('toast', ['type' => 'success', 'message' => 'Partner updated successfully.']);
    }

    public function destroy(Partner $partner)
    {
        // Delete image from public folder if exists
        if ($partner->image && file_exists(public_path($partner->image))) {
            unlink(public_path($partner->image));
        }

        $partner->delete();

        return redirect()
            ->route('admin.partners.index')
            ->with('toast', ['type' => 'danger', 'message' => 'Partner deleted successfully.']);
    }
}
