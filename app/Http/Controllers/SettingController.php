<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralSettingsRequest;
use App\Models\Setting;
use App\Settings\GeneralSettings;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function show(GeneralSettings $settings)
    {
        // dd($settings->favicon);
        return view('Settings.general', compact('settings'));
    }

    public function update(GeneralSettingsRequest $request, GeneralSettings $settings)
    {
        $settings->site_name = $request->input('site_name');
        $settings->site_description = $request->input('site_description');
        $settings->timezone = $request->input('timezone');
        $settings->date_format = $request->input('date_format');
        $settings->time_format = $request->input('time_format');
        $settings->default_language = $request->input('default_language');
        
        try {

            $newSettings = $request->only([

                'site_name',

                'site_description',

                'timezone',

                'date_format',

                'time_format',

                'default_language',

            ]);

            $uploadableFields = [

                'site_logo',

                'favicon',

            ];

            foreach ($uploadableFields as $field) {
                if ($request->hasFile($field)) {
                    // 1. Delete the old file if it exists to avoid orphaned files
                    if (!empty($settings->$field)) {
                        Storage::disk('public')->delete($settings->$field);
                    }

                    // 2. Store the new file and update the array
                    $newSettings[$field] = $request->file($field)->store('settings/general', 'public');
                    $settings->$field = $newSettings[$field];
                } else {
                    // 3. If no new file is uploaded, retain the current value from the database
                    $newSettings[$field] = $settings->$field;
                }
            }

            if (! empty($newSettings)) {
                $settings->save();
                return redirect()->back()->with('success', 'Settings updated successfully!');
            }
        } catch (\Exception $e) {

            return back()->with('error', 'Error ' . $e->getMessage());
        }
    }

    public function re_captcha_settings(GeneralSettings $settings){

        return view('Settings.re-captcha', compact('settings'));
    }
}
