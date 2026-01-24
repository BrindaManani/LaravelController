<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AnnouncementSettings extends Settings
{

    public ?string $link;
    public ?string $link_text;
    public ?string $message;
    public string $bg_color;
    public string $msg_color;
    public string $link_color;
    public static function group(): string
    {
        return 'announcement';
    }
}