<?php

add_action('admin_menu', function () {
    add_menu_page(
        'Opciones del Tema',
        'Opciones del Tema',
        'manage_options',
        'playeraduria-theme-options',
        'playeraduria_render_theme_options_page',
        'dashicons-admin-customizer',
        99
    );
});

function playeraduria_render_theme_options_page() { ?>
    <div class="wrap">
        <h1>Opciones del Tema</h1>

        <form method="post" action="options.php">
            <?php settings_fields('playeraduria_theme_options'); ?>

            <div class="playeraduria-tabs">

                <nav class="playeraduria-tabs-nav">
                    <a class="active" data-tab="branding">Branding</a>
                    <a data-tab="seo">SEO</a>
                    <a data-tab="scripts">Scripts</a>
                    <a data-tab="social">Redes</a>
                    <a data-tab="header">Header</a>
                    <a data-tab="performance">Performance</a>
                </nav>

                <div class="tab-panel active" data-tab="branding">
                    <?php do_settings_sections('playeraduria-theme-options-branding'); ?>
                </div>

                <div class="tab-panel" data-tab="seo">
                    <?php do_settings_sections('playeraduria-theme-options-seo'); ?>
                </div>

                <div class="tab-panel" data-tab="scripts">
                    <?php do_settings_sections('playeraduria-theme-options-scripts'); ?>
                </div>

                <div class="tab-panel" data-tab="social">
                    <?php do_settings_sections('playeraduria-theme-options-social'); ?>
                </div>

                <div class="tab-panel" data-tab="header">
                    <?php do_settings_sections('playeraduria-theme-options-header'); ?>
                </div>

                <div class="tab-panel" data-tab="performance">
                    <?php do_settings_sections('playeraduria-theme-options-performance'); ?>
                </div>

            </div>

            <?php submit_button(); ?>
        </form>
    </div>
<?php }

add_action('admin_enqueue_scripts', function ($hook) {

    if ($hook !== 'toplevel_page_playeraduria-theme-options') {
        return;
    }

    wp_enqueue_media();

    wp_enqueue_style(
        'playeraduria-admin-style',
        get_template_directory_uri() . '/assets/css/admin.css'
    );

    wp_enqueue_script(
        'playeraduria-admin-tabs',
        get_template_directory_uri() . '/assets/js/admin/theme-options-tabs.js',
        ['jquery'],
        null,
        true
    );

    wp_enqueue_script(
        'playeraduria-admin-media',
        get_template_directory_uri() . '/assets/js/admin/theme-options-media.js',
        ['jquery'],
        null,
        true
    );
});

