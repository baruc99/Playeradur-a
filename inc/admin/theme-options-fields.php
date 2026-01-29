<?php

add_action('admin_init', function () {

    register_setting('playeraduria_theme_options', 'playeraduria_theme_options');

    /* BRANDING */
    add_settings_section('playeraduria_branding_section', 'Branding', '__return_false', 'playeraduria-theme-options-branding');
    add_settings_field('logo_main', 'Logo principal', 'playeraduria_render_logo_main', 'playeraduria-theme-options-branding', 'playeraduria_branding_section');
    add_settings_field('logo_alt', 'Logo alternativo', 'playeraduria_render_logo_alt', 'playeraduria-theme-options-branding', 'playeraduria_branding_section');
    add_settings_field('favicon', 'Favicon', 'playeraduria_render_favicon', 'playeraduria-theme-options-branding', 'playeraduria_branding_section');

    /* SEO */
    add_settings_section('playeraduria_seo_section', 'SEO Global', '__return_false', 'playeraduria-theme-options-seo');
    add_settings_field('seo_title', 'Meta Title', 'playeraduria_render_seo_title', 'playeraduria-theme-options-seo', 'playeraduria_seo_section');
    add_settings_field('seo_description', 'Meta Description', 'playeraduria_render_seo_description', 'playeraduria-theme-options-seo', 'playeraduria_seo_section');

    /* SCRIPTS */
    add_settings_section('playeraduria_scripts_section', 'Scripts & Integraciones', '__return_false', 'playeraduria-theme-options-scripts');
    add_settings_field('header_scripts', 'Scripts en HEAD', 'playeraduria_render_header_scripts', 'playeraduria-theme-options-scripts', 'playeraduria_scripts_section');
    add_settings_field('footer_scripts', 'Scripts en Footer', 'playeraduria_render_footer_scripts', 'playeraduria-theme-options-scripts', 'playeraduria_scripts_section');

    /* REDES */
    add_settings_section('playeraduria_social_section', 'Redes Sociales', '__return_false', 'playeraduria-theme-options-social');
    add_settings_field('facebook', 'Facebook', 'playeraduria_render_social_facebook', 'playeraduria-theme-options-social', 'playeraduria_social_section');
    add_settings_field('instagram', 'Instagram', 'playeraduria_render_social_instagram', 'playeraduria-theme-options-social', 'playeraduria_social_section');
    add_settings_field('tiktok', 'TikTok', 'playeraduria_render_social_tiktok', 'playeraduria-theme-options-social', 'playeraduria_social_section');

    /* HEADER */
    add_settings_section('playeraduria_header_section', 'Header / Navegación', '__return_false', 'playeraduria-theme-options-header');
    add_settings_field('sticky_header', 'Header Sticky', 'playeraduria_render_sticky_header', 'playeraduria-theme-options-header', 'playeraduria_header_section');
    add_settings_field('hero_height', 'Altura Hero (rem)', 'playeraduria_render_hero_height', 'playeraduria-theme-options-header', 'playeraduria_header_section');

    /* PERFORMANCE */
    add_settings_section('playeraduria_performance_section', 'Performance', '__return_false', 'playeraduria-theme-options-performance');
    add_settings_field('preload_hero', 'Preload Hero', 'playeraduria_render_preload_hero', 'playeraduria-theme-options-performance', 'playeraduria_performance_section');
    add_settings_field('disable_emojis', 'Desactivar Emojis', 'playeraduria_render_disable_emojis', 'playeraduria-theme-options-performance', 'playeraduria_performance_section');
});
