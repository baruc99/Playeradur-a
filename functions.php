<?php

function playeraduria_enqueue_assets() {

    // Bootstrap CSS
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
    );

    // Tema styles
    wp_enqueue_style(
        'playeraduria-style',
        get_stylesheet_uri(),
        ['bootstrap-css']
    );

    wp_enqueue_style(
        'playeraduria-custom',
        get_template_directory_uri() . '/assets/css/custom.css'
    );

    // jQuery (WordPress ya lo trae)
    wp_enqueue_script('jquery');

    // Bootstrap JS
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        ['jquery'],
        null,
        true
    );

    // JS del tema
    wp_enqueue_script(
        'playeraduria-main',
        get_template_directory_uri() . '/assets/js/main.js',
        ['jquery'],
        null,
        true
    );
}

add_action('wp_enqueue_scripts', 'playeraduria_enqueue_assets');
