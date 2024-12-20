<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutStoreRequest;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();

        return view('admin.abouts.edit', compact('about'));
    }

    public function store(AboutStoreRequest $request)
    {
        $about = About::first() ?? new About();

        $about->title = $request->title;
        $about->description = $request->description;
        $about->vision = $request->vision;
        $about->mission = $request-> mission;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/abouts'), $filename);
            $about->image = 'uploads/abouts/' . $filename;
        }

        $about->save();

        return redirect()
            ->route('admin.abouts.index')
            ->with('toast', ['type' => 'success', 'message' => 'About updated successfully.']);
    }
}
