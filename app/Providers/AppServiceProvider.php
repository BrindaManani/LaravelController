<?php

namespace App\Providers;

use App\Settings\AnnouncementSettings;
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
    public function boot(AnnouncementSettings $announcementSettings): void
    {
        View::share('textColor', $announcementSettings->link_color);
        View::share('bgColor', $announcementSettings->bg_color);
        View::share('msgColor', $announcementSettings->msg_color);
    }
}
