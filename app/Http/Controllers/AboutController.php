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
        $about->description = $request->description;
        $about->vision = $request->vision;
        $about->mission = $request->mission;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/about'), $filename);
            $about->image = 'about/' . $filename;
        }

        // Save the about record
        $about->save();

        return redirect()->route('admin.abouts.index');
    }
}
