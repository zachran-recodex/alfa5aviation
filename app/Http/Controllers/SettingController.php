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

        $setting->phone_one = $request->phone_one;
        $setting->phone_two = $request->phone_two;
        $setting->email_one = $request->email_one;
        $setting->email_two = $request->email_two;
        $setting->address = $request->address;
        $setting->operational_address = $request->operational_address;
        $setting->footer_text = $request->footer_text;

        // Handle image upload for logo
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoFilename = time() . '_logo.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('storage/settings'), $logoFilename);
            $setting->logo = 'settings/' . $logoFilename;
        }

        // Handle image upload for favicon
        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $faviconFilename = time() . '_favicon.' . $favicon->getClientOriginalExtension();
            $favicon->move(public_path('storage/settings'), $faviconFilename);
            $setting->favicon = 'settings/' . $faviconFilename;
        }

        // Save the setting record
        $setting->save();

        return redirect()->route('admin.settings.index');
    }
}
