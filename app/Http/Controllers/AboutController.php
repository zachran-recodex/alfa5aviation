<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AboutStoreRequest;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();

        return view ('admin.abouts.index', compact('about'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutStoreRequest $request)
    {
        $about = About::first() ?? new About();

        $about->title = $request->title;
        // Handle image uploads
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($about->image) {
                Storage::disk('public')->delete($about->image);
            }
            $about->image = $request->file('image')->store('abouts', 'public');
        }
        $about->description = $request->description;
        $about->vision = $request->vision;
        $about->mission = $request->mission;

        // Save the about record
        $about->save();

        return redirect()->route('admin.abouts.index');
    }
}
