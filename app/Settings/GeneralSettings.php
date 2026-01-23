<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{

    public string $site_name;
    public string $footer;
    public string $site_logo;
    public string $site_description;
    public string $favicon;
    public string $timezone;
    public string $date_format = 'Y-m-d';
    public string $time_format;
    public string $default_language;
    public static function group(): string
    {
        return 'general';
    }
}
