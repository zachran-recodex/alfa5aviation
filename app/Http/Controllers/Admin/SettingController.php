<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingStoreRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(SettingStoreRequest $request)
    {
        $setting = Setting::first() ?? new Setting();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            $setting->logo = 'uploads/settings/' . $filename;
        }

        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            $setting->favicon = 'uploads/settings/' . $filename;
        }

        $setting->phone_one = $request->phone_one;
        $setting->phone_two = $request->phone_two;
        $setting->email_one = $request->email_one;
        $setting->email_two = $request->email_two;
        $setting->instagram = $request->instagram;
        $setting->linkedin = $request->linkedin;
        $setting->tiktok = $request->tiktok;
        $setting->facebook = $request->facebook;
        $setting->whatsapp = $request->whatsapp;
        $setting->address = $request->address;
        $setting->footer_text = $request->footer_text;

        $setting->save();

        return redirect()
            ->route('admin.settings.edit')
            ->with('toast', ['type' => 'success', 'message' => 'Setting updated successfully.']);
    }
}
