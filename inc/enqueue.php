<?php

function playeraduria_enqueue_assets() {

    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
    );

    wp_enqueue_style(
        'playeraduria-style',
        get_stylesheet_uri(),
        ['bootstrap-css']
    );

    // custom.css 👈 ESTE ES EL IMPORTANTE
    wp_enqueue_style(
        'playeraduria-custom',
        get_template_directory_uri() . '/assets/css/custom.css',
        ['playeraduria-style'], // dependencia correcta
        filemtime(get_template_directory() . '/assets/css/custom.css')
    );

    wp_enqueue_script('jquery');

    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        ['jquery'],
        null,
        true
    );

    wp_enqueue_script(
        'playeraduria-main',
        get_template_directory_uri() . '/assets/js/main.js',
        ['jquery'],
        null,
        true
    );
}

add_action('wp_enqueue_scripts', 'playeraduria_enqueue_assets');
