<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\HeroSectionStoreRequest;
use App\Http\Requests\HeroSectionUpdateRequest;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero_sections = HeroSection::all();

        return view('admin.hero_sections.index', compact('hero_sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hero_sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HeroSectionStoreRequest $request)
    {
        $hero_section = new HeroSection();

        // Update fields with request data
        $hero_section->title = $request->title;
        $hero_section->status = $request->status;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/hero_sections'), $filename);
            $hero_section->image = 'hero_sections/' . $filename;
        }

        $hero_section->save();

        return redirect()->route('admin.hero_sections.index')->with('success', 'hero_section created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroSection $hero_section)
    {
        return view('admin.hero_sections.edit', compact('hero_section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HeroSectionUpdateRequest $request, HeroSection $hero_section)
    {
        // Update fields with request data
        $hero_section->title = $request->title;
        $hero_section->status = $request->status;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($hero_section->image && file_exists(public_path('storage/' . $hero_section->image))) {
                unlink(public_path('storage/' . $hero_section->image));
            }

            // Upload new image
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/hero_sections'), $filename);
            $hero_section->image = 'hero_sections/' . $filename;
        }

        $hero_section->save();

        return redirect()->route('admin.hero_sections.index')->with('success', 'hero_section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroSection $hero_section)
    {
        // Delete image from storage if exists
        if ($hero_section->image && file_exists(public_path('storage/' . $hero_section->image))) {
            unlink(public_path('storage/' . $hero_section->image));
        }

        $hero_section->delete();

        return redirect()->route('admin.hero_sections.index')->with('success', 'hero_section deleted successfully');
    }
}
