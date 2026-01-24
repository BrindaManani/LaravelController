<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    protected array $settings = [
        'email.smtp_host' => 'localhost',
        'email.smtp_port' => '2525',
        'email.encryption' => 'TLS',
        'email.username' => 'admin@admin.com',
        'email.password' => 'password',
        'email.sender_name' => 'FeatureRequest',
        'email.sender_email' => 'noreply@localhost',
        'email.test_email' => '',
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
