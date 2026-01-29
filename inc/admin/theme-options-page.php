<?php

add_action('admin_menu', function () {

    add_menu_page(
        'Opciones del Tema',
        'Opciones del Tema',
        'manage_options',
        'playeraduria-theme-options',
        'playeraduria_render_theme_options_page',
        'dashicons-admin-customizer',
        2
    );
});

function playeraduria_render_theme_options_page() {
    ?>
    <div class="wrap">
        <h1>Opciones del Tema</h1>

        <form method="post" action="options.php">
            <?php
            settings_fields('playeraduria_theme_options');
            do_settings_sections('playeraduria-theme-options');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

add_action('admin_enqueue_scripts', function ($hook) {

    if ($hook !== 'toplevel_page_playeraduria-theme-options') {
        return;
    }

    wp_enqueue_media();

    wp_enqueue_script(
        'playeraduria-admin-media',
        get_template_directory_uri() . '/inc/admin/theme-options-media.js',
        ['jquery'],
        null,
        true
    );
});
