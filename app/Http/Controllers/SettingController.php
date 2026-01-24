<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnouncemetSettingsRequest;
use App\Http\Requests\EmailSettingsRequest;
use App\Http\Requests\GeneralSettingsRequest;
use App\Http\Requests\RecaptchaSettingsRequest;
use App\Models\Setting;
use App\Settings\AnnouncementSettings;
use App\Settings\EmailSettings;
use App\Settings\GeneralSettings;
use App\Settings\ReCaptchaSettings;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function show(GeneralSettings $settings, AnnouncementSettings $announcement)
    {
        // dd($settings->favicon);
        return view('Settings.general', compact('settings', 'announcement'));
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

    public function re_captcha_settings(GeneralSettings $settings, ReCaptchaSettings $recaptcha, AnnouncementSettings $announcement)
    {

        return view('Settings.re-captcha', compact('settings', 'recaptcha', 'announcement'));
    }

    public function re_captcha_update(RecaptchaSettingsRequest $request, ReCaptchaSettings $settings)
    {
        $settings->site_key = $request->input('site_key');
        $settings->site_secret = $request->input('site_secret');
        try {

            $newSettings = $request->only([

                'site_key',

                'site_secret',

            ]);

            if (! empty($newSettings)) {
                $settings->save();
                return redirect()->back()->with('success', 'Settings updated successfully!');
            }
        } catch (\Exception $e) {

            return back()->with('error', 'Error ' . $e->getMessage());
        }
    }

    public function email_settings(GeneralSettings $settings, EmailSettings $email, AnnouncementSettings $announcement)
    {
        return view('Settings.email', compact('settings', 'email', 'announcement'));
    }

    public function email_update(EmailSettingsRequest $request, EmailSettings $settings)
    {
        $settings->smtp_host = $request->input('smtp_host');
        $settings->smtp_port = $request->input('smtp_port');
        $settings->encryption = $request->input('encryption');
        $settings->username = $request->input('username');
        $settings->password = Hash::make($request->input('password'));
        $settings->sender_name = $request->input('sender_name');
        $settings->sender_email = $request->input('sender_email');
        $settings->test_email = $request->input('test_email');

        try {

            $newSettings = $request->only([

                'smtp_host',
                'smtp_port',
                'encryption',
                'username',
                'password',
                'sender_name',
                'sender_email',
                'test_email',

            ]);
            if (! empty($newSettings)) {
                $settings->save();
                return redirect()->back()->with('success', 'Settings updated successfully!');
            }
        } catch (\Exception $e) {

            return back()->with('error', 'Error ' . $e->getMessage());
        }
    }

    public function announcement_settings(GeneralSettings $settings, AnnouncementSettings $announcement)
    {
        return view('Settings.announcement', compact('settings', 'announcement'));
    }

    public function announcement_update(AnnouncemetSettingsRequest $request, AnnouncementSettings $settings)
    {
        $settings->link = $request->input('link');
        $settings->link_text = $request->input('link_text');
        $settings->message = $request->input('message');
        $settings->bg_color = $request->input('bg_color');
        $settings->msg_color = $request->input('msg_color');
        $settings->link_color = $request->input('link_color');

        try {

            $newSettings = $request->only([

                'link',
                'link_text',
                'message',
                'bg_color',
                'msg_color',
                'link_color',

            ]);
            if (! empty($newSettings)) {
                $settings->save();
                return redirect()->back()->with('success', 'Settings updated successfully!');
            }
        } catch (\Exception $e) {

            return back()->with('error', 'Error ' . $e->getMessage());
        }
    }
}
