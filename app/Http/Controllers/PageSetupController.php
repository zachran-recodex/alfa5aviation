<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageSetupStoreRequest;
use App\Models\PageSetup;

class PageSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageSetups = PageSetup::all()->keyBy('slug'); // Pastikan 'slug' sesuai dengan yang digunakan

        return view('admin.page-setups.index', compact('pageSetups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageSetupStoreRequest $request)
    {
        // Mengambil slug dari request untuk menentukan halaman yang akan diperbarui
        $slug = $request->input('slug');

        // Mencari atau membuat instance PageSetup berdasarkan slug
        $pageSetup = PageSetup::updateOrCreate(
            ['slug' => $slug],
            [
                'title' => $request->input('title'),
                'meta_title' => $request->input('meta_title'),
                'meta_description' => $request->input('meta_description'),
                'meta_keywords' => $request->input('meta_keywords'),
            ]
        );

        // Mengembalikan dengan pesan sukses
        return redirect()->route('admin.page-setups.index')->with('success', 'Page setup updated successfully.');
    }

}
