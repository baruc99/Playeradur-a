<?php

function playeraduria_enqueue_assets() {

    /* =========================
     * Fonts
     * ========================= */
    wp_enqueue_style(
        'bebas-neue-font',
        'https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap',
        [],
        null
    );

    /* =========================
     * Bootstrap
     * ========================= */
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
    );

    /* =========================
     * Theme styles
     * ========================= */
    wp_enqueue_style(
        'playeraduria-style',
        get_stylesheet_uri(),
        ['bootstrap-css']
    );

    wp_enqueue_style(
        'playeraduria-custom',
        get_template_directory_uri() . '/assets/css/custom.css',
        ['playeraduria-style', 'bebas-neue-font'], // 👈 dependencia correcta
        filemtime(get_template_directory() . '/assets/css/custom.css')
    );

    /* =========================
     * Scripts
     * ========================= */
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

add_action('admin_enqueue_scripts', function ($hook) {

    // Solo en editar / crear producto
    if ($hook !== 'post.php' && $hook !== 'post-new.php') return;

    wp_enqueue_media();

    wp_enqueue_script(
        'playeraduria-product-video',
        get_template_directory_uri() . '/assets/js/product-video.js',
        ['jquery'],
        filemtime(get_template_directory() . '/assets/js/product-video.js'),
        true
    );

});