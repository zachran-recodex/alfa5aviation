<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeroSectionStoreRequest;
use App\Models\HeroSection;

class HeroSectionController extends Controller
{
    public function index()
    {
        $heroSection = HeroSection::first();

        return view('admin.hero-sections.edit', compact('heroSection'));
    }

    public function store(HeroSectionStoreRequest $request)
    {
        $heroSection = HeroSection::first() ?? new HeroSection();

        $heroSection->title = $request->title;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/hero-sections'), $filename);
            $heroSection->image = 'uploads/hero-sections/' . $filename;
        }

        $heroSection->save();

        return redirect()
            ->route('admin.hero-sections.index')
            ->with('toast', ['type' => 'success', 'message' => 'Hero Section update successfully.']);
    }
}
