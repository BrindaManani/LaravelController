<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ReCaptchaSettings extends Settings
{

    public string $site_key;
    public string $site_secret;
    public static function group(): string
    {
        return 're-captcha';
    }
}