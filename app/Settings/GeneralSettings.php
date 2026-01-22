<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{

 public string $site_name;
    public string $footer;
    public string $site_logo;
    public string $favicon;
    public static function group(): string
    {
        return 'general';
    }
}