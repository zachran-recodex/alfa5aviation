<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageSetupStoreRequest;
use App\Models\PageSetup;

class PageSetupController extends Controller
{
    public function index()
    {
        $pageSetups = PageSetup::all();

        return view('admin.page-setups.index', compact('pageSetups'));
    }

    public function edit(PageSetup $pageSetup)
    {
        return view('admin.page-setups.edit', compact('pageSetup'));
    }

    public function update(PageSetupStoreRequest $request, PageSetup $pageSetup)
    {
        $pageSetup->update($request->validated());

        return redirect()
            ->route('admin.page-setups.index')
            ->with('success', 'Page setup updated successfully.');
    }
}
