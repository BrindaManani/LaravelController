<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AllSettings extends Settings
{
    public string $site_name;
    public ?string $site_logo;
    public ?string $site_description;
    public ?string $favicon;
    public ?string $timezone;
    public ?string $date_format = 'Y-m-d';
    public ?string $time_format;
    public ?string $default_language;
    public ?string $smtp_host;
    public ?string $smtp_port;
    public ?string $username;
    public ?string $password;
    public ?string $sender_name;
    public ?string $sender_email;
    public ?string $test_email;
    public string $site_key;
    public string $site_secret;
    public ?string $link;
    public ?string $link_text;
    public ?string $message;
    public string $bg_color;
    public string $msg_color;
    public string $link_color;
    public static function group(): string
    {
        return 'default';
    }
}