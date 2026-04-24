<?php

use App\Models\SiteSetting;

if (!function_exists('setting')) {
    function setting(string $key, $default = null)
    {
        return SiteSetting::get($key, $default);
    }
}
