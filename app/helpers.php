<?php

if (! function_exists('setting')) {
    /** Get a site setting value with optional default. */
    function setting(string $key, string $default = ''): string
    {
        return \App\Models\SiteSetting::get($key, $default);
    }
}
