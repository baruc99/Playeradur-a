<?php

if (!function_exists('playeraduria_get_option')) {
    function playeraduria_get_option($key, $default = '') {
        $options = get_option('playeraduria_theme_options', []);
        return $options[$key] ?? $default;
    }
}
