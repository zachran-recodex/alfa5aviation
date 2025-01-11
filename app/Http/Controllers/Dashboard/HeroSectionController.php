<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\HeroSectionManageRequest;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroSection = HeroSection::first();

        return view('dashboard.hero-section.index', compact('heroSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function manage(HeroSectionManageRequest $request)
    {
        $heroSection = HeroSection::first();

        if (!$heroSection) {
            return redirect()->route('dashboard')->with('error', 'Hero section not found.');
        }

        $validated = $request->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($heroSection->image) {
                Storage::disk('public')->delete($heroSection->image);
            }
            $validated['image'] = $request->file('image')->store('hero-section', 'public');
        }

        $heroSection->update($validated);

        return redirect()->route('dashboard.hero-section.index')->with('success', 'Hero section updated successfully.');
    }
}
