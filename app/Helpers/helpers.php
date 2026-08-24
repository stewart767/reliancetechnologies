<?php

if (!function_exists('setting')) {
    /**
     * Get a company setting value from database configuration.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting($key, $default = null)
    {
        return config("settings.{$key}", $default);
    }
}
