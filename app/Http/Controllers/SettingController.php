<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingStoreRequest;
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

        return view ('admin.settings.index', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingStoreRequest $request)
    {
        $setting = Setting::first() ?? new Setting();

        // Handle image uploads
        if ($request->hasFile('logo')) {
            // Delete old image if exists
            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }
            $setting->logo = $request->file('logo')->store('settings', 'public');
        }

        if ($request->hasFile('favicon')) {
            // Delete old image if exists
            if ($setting->favicon) {
                Storage::disk('public')->delete($setting->favicon);
            }
            $setting->favicon = $request->file('favicon')->store('settings', 'public');
        }

        $setting->phone_one = $request->phone_one;
        $setting->phone_two = $request->phone_two;
        $setting->email_one = $request->email_one;
        $setting->email_two = $request->email_two;
        $setting->address = $request->address;
        $setting->operational_address = $request->operational_address;
        $setting->footer_text = $request->footer_text;

        // Save the setting record
        $setting->save();

        return redirect()->route('admin.settings.index');
    }
}
