<?php

add_action('wp_head', function () {

    $options = get_option('playeraduria_theme_options', []);

    /* =========================
     * META DESCRIPTION (SEO)
     * ========================= */

    $description = '';

    // 1️⃣ Excerpt de la página (si existe)
    if (is_singular() && has_excerpt()) {
        $description = get_the_excerpt();
    }
    // 2️⃣ Fallback global
    elseif (!empty($options['seo_description'])) {
        $description = $options['seo_description'];
    }

    if ($description) {
        $description = wp_strip_all_tags($description);
        $description = mb_substr($description, 0, 160);

        echo '<meta name="description" content="' .
            esc_attr($description) . '">' . "\n";
    }

    /* =========================
     * FAVICON
     * ========================= */
    if (!empty($options['favicon'])) {
        echo '<link rel="icon" href="' .
            esc_url($options['favicon']) . '">' . "\n";
    }

    /* =========================
     * OPEN GRAPH
     * ========================= */

    // OG Title
    $og_title = !empty($options['seo_title'])
        ? $options['seo_title']
        : get_bloginfo('name');

    echo '<meta property="og:title" content="' .
        esc_attr($og_title) . '">' . "\n";

    // OG Description
    if ($description) {
        echo '<meta property="og:description" content="' .
            esc_attr($description) . '">' . "\n";
    }

    // OG Image
    if (!empty($options['og_image'])) {
        echo '<meta property="og:image" content="' .
            esc_url($options['og_image']) . '">' . "\n";

        // Preload (performance)
        if (!empty($options['preload_hero'])) {
            echo '<link rel="preload" as="image" href="' .
                esc_url($options['og_image']) . '">' . "\n";
        }
    }

    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:site_name" content="' .
        esc_attr(get_bloginfo('name')) . '">' . "\n";

    /* =========================
     * SCRIPTS EN HEAD
     * ========================= */
    if (!empty($options['header_scripts'])) {
        echo "\n<!-- Scripts Opciones del Tema -->\n";
        echo $options['header_scripts'] . "\n";
    }

});


/* =========================
 * FOOTER (scripts)
 * ========================= */
add_action('wp_footer', function () {

    $options = get_option('playeraduria_theme_options', []);

    if (!empty($options['footer_scripts'])) {
        echo "\n<!-- Scripts Opciones del Tema (FOOTER) -->\n";
        echo $options['footer_scripts'] . "\n";
    }
});
