<?php
if ( ! defined('ABSPATH') ) {
    exit;
}

$playeraduria_includes = [
    'inc/setup.php',
    'inc/enqueue.php',
    'inc/menus.php',
    'inc/supports.php',
    'inc/helpers.php',
    'inc/cpt/routes.php',
    'inc/cpt/product-card.php',
    'inc/media.php',
    'inc/taxonomies/routes-taxonomy.php',
    'inc/taxonomies/section.php',

    // admin
    'inc/admin/theme-options-helpers.php',
    'inc/admin/theme-options-page.php',
    'inc/admin/theme-options-fields.php',
    'inc/admin/theme-options-render.php', 
    'inc/admin/theme-options-frontend.php',
    'inc/admin/theme-options-title.php',
];

foreach ( $playeraduria_includes as $file ) {
    require_once get_template_directory() . '/' . $file;
}
