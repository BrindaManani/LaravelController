<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('get_settings_by_group')) {
    function get_settings_by_group($group)
    {
        return (object) DB::table('settings')
            ->where('group', $group)
            ->pluck('payload', 'name')
            ->toArray();
    }
}

function set_settings_batch($group, array $settings)
{
    foreach ($settings as $key => $value) {
        \DB::table('settings')->updateOrInsert(
            ['group' => $group, 'name' => $key],
            ['payload' => $value, 'updated_at' => now()]
        );
    }
}
