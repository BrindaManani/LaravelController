<?php

namespace App\Providers;

use App\Models\User;
use App\Settings\AnnouncementSettings;
use App\Settings\GeneralSettings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(GeneralSettings $general, AnnouncementSettings $announcementSettings, User $user): void
    {
        $hexToRgb = function ($hex) {
            $hex = ltrim($hex, '#'); // remove #
            if (strlen($hex) == 3) { // short hex like #f00
                $r = hexdec(str_repeat($hex[0], 2));
                $g = hexdec(str_repeat($hex[1], 2));
                $b = hexdec(str_repeat($hex[2], 2));
            } else { // full hex like #ff0000
                $r = hexdec(substr($hex, 0, 2));
                $g = hexdec(substr($hex, 2, 2));
                $b = hexdec(substr($hex, 4, 2));
            }
            return "$r,$g,$b";
        };
        View::share([
            'textColor' => $announcementSettings->link_color,
            'bgColor'   => $announcementSettings->bg_color,
            'msgColor'  => $announcementSettings->msg_color,
            'site_name' => $general->site_name,
            'site_logo' => $general->site_logo,
            'textColorRgb' => $hexToRgb($announcementSettings->link_color),
            'user' => $user,
        ]);
    }
}
