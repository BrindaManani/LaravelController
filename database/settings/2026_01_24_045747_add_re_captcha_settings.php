<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    protected array $settings = [
        're-captcha.site_key' => '1234',
        're-captcha.site_secret' => '5678',
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
