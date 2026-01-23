<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('get_settings_by_group')) {
    function get_settings_by_group($group) {
        return (object) DB::table('settings')
            ->where('group', $group)
            ->pluck('payload', 'name')
            ->toArray();
    }
}

if (!function_exists('set_settings_batch')) {
    function set_settings_batch($group, array $settings) {
        foreach ($settings as $name => $value) {
            DB::table('settings')->updateOrInsert(
                ['group' => $group, 'name' => $name],
                ['payload' => $value, 'updated_at' => now()]
            );
        }
    }
}
