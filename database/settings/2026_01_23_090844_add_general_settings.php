<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    protected array $settings = [
        'general.site_name' => 'FeatureRequest',
        'general.site_description' => 'FeatureRequest system',
        'general.timezone' => 'UTC',
        'general.date_format' => 'Y-m-d',
        'general.time_format' => '24',
        'general.default_language' => 'en',
        'general.site_logo' => '',
        'general.favicon' => '',
    ];
    public function up(): void
    {
        foreach ($this->settings as $key => $value) {
            if (! $this->migrator->exists($key)) {
                $this->migrator->add($key, $value);
            }
        }
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
