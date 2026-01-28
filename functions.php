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
    'inc/media.php',
    'inc/taxonomies/routes-taxonomy.php',
];

foreach ( $playeraduria_includes as $file ) {
    require_once get_template_directory() . '/' . $file;
}
