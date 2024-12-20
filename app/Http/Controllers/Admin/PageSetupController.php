<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageSetupStoreRequest;
use App\Models\PageSetup;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PageSetupController extends Controller
{
    /**
     * Display the list of page setups.
     */
    public function index(): View
    {
        $pageSetups = PageSetup::all()->keyBy('slug'); // Ensure 'slug' is a valid column in the database.

        return view('admin.page-setups.edit', compact('pageSetups'));
    }

    /**
     * Store or update a page setup.
     */
    public function store(PageSetupStoreRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        // Update or create a PageSetup based on the slug
        PageSetup::updateOrCreate(
            ['slug' => $validatedData['slug']],
            [
                'title'            => $validatedData['title'],
                'meta_title'       => $validatedData['meta_title'],
                'meta_description' => $validatedData['meta_description'],
                'meta_keywords'    => $validatedData['meta_keywords'],
            ]
        );

        return redirect()
            ->route('admin.page-setups.index')
            ->with('success', 'Page setup updated successfully.');
    }
}
