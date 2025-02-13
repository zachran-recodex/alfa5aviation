<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\SEO;
use Illuminate\Http\Request;

class SEOController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seos = SEO::all();

        return view('dashboard.seo.index', compact('seos'));
    }

    /**
     * Show the form for editing the SEO.
     */
    public function edit(string $page)
    {
        // Ambil data SEO berdasarkan nama halaman (page)
        $seo = SEO::firstOrCreate(['page' => $page]);

        return view('dashboard.seo.edit', compact('seo'));
    }

    /**
     * Update the SEO for the specified page.
     */
    public function update(Request $request, string $page)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        // Update atau buat data SEO untuk halaman yang dimaksud
        $seo = SEO::updateOrCreate(
            ['page' => $page],
            $request->only(['title', 'meta_description', 'meta_keywords'])
        );

        return redirect()->route('dashboard.seo.index')->with('notification', [
            'variant' => 'success',
            'title' => 'Success!',
            'message' => 'SEO updated successfully.',
        ]);
    }
}
