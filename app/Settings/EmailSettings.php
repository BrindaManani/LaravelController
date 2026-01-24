<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class EmailSettings extends Settings
{

    public ?string $smtp_host;
    public ?string $smtp_port;
    public ?string $username;
    public ?string $password;
    public ?string $sender_name;
    public ?string $sender_email;
    public ?string $test_email;
    public static function group(): string
    {
        return 'email';
    }
}