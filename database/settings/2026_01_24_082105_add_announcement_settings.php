<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    protected array $settings = [
        'announcement.link' => '',
        'announcement.link_text' => '',
        'announcement.message' => '',
        'announcement.bg_color' => '#2563eb',
        'announcement.msg_color' => '#2563eb',
        'announcement.link_color' => '#2563eb',
    ];
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            foreach ($this->settings as $key => $value) {
                if (! $this->migrator->exists($key)) {
                    $this->migrator->add($key, $value);
                }
            }
        });
    }
    public function down(): void
    {
        foreach (array_keys($this->settings) as $key) {
            if ($this->migrator->exists($key)) {
                $this->migrator->delete($key);
            }
        }
    }
};
