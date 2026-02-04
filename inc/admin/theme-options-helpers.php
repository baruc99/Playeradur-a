<?php

if (!function_exists('playeraduria_get_option')) {
    function playeraduria_get_option($key, $default = '') {
        $options = get_option('playeraduria_theme_options', []);
        return $options[$key] ?? $default;
    }
}

add_action('save_post', function () {

    global $wpdb;

    $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_playeraduria_page_%'");
});
