<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AboutManageRequest;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();

        return view('dashboard.about.index', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function manage(AboutManageRequest $request)
    {
        $about = About::first();

        if (!$about) {
            return redirect()->route('dashboard')->with('error', 'About not found.');
        }

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }
            $validated['image'] = $request->file('image')->store('about', 'public');
        }

        $about->update($validated);

        return redirect()->route('dashboard.about.index')->with('success', 'About updated successfully.');
    }
}
