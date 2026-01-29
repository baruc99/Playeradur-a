<?php

add_action('wp_head', function () {

    $desc = playeraduria_get_option('seo_description');
    if ($desc) {
        echo '<meta name="description" content="' . esc_attr($desc) . '">' . PHP_EOL;
    }

    if ($favicon = playeraduria_get_option('favicon')) {
        echo '<link rel="icon" href="' . esc_url($favicon) . '">' . PHP_EOL;
    }

    if ($og = playeraduria_get_option('og_image')) {
        echo '<meta property="og:image" content="' . esc_url($og) . '">' . PHP_EOL;
    }

    if ($scripts = playeraduria_get_option('header_scripts')) {
        echo $scripts;
    }
});

add_action('wp_footer', function () {
    if ($scripts = playeraduria_get_option('footer_scripts')) {
        echo $scripts;
    }
});
