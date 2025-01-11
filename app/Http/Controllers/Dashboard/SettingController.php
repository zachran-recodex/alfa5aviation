<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingManageRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();

        return view('dashboard.setting.index', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function manage(SettingManageRequest $request)
    {
        $setting = Setting::first();

        if (!$setting) {
            return redirect()->route('dashboard')->with('notification', [
                'variant' => 'success',
                'title' => 'Success!',
                'message' => 'Setting not found.',
            ]);
        }

        $validated = $request->validated();

        if ($request->hasFile('logo')) {
            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }
            $validated['logo'] = $request->file('logo')->store('setting', 'public');
        }

        if ($request->hasFile('favicon')) {
            if ($setting->favicon) {
                Storage::disk('public')->delete($setting->favicon);
            }
            $validated['favicon'] = $request->file('favicon')->store('setting', 'public');
        }

        $setting->update($validated);

        return redirect()->route('dashboard.setting.index')->with('notification', [
            'variant' => 'success',
            'title' => 'Success!',
            'message' => 'Setting updated successfully.',
        ]);
    }
}
