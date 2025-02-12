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
            'description' => 'nullable|string|max:500',
            'keywords' => 'nullable|string|max:255',
            'canonical_url' => 'nullable|url',
        ]);

        // Update atau buat data SEO untuk halaman yang dimaksud
        $seo = SEO::updateOrCreate(
            ['page' => $page],
            $request->only(['title', 'description', 'keywords', 'canonical_url'])
        );

        return redirect()->route('dashboard.seo.edit', $page)->with('success', 'SEO updated successfully!');
    }
}
