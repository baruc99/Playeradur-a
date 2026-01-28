<?php

function playeraduria_register_menus() {
    register_nav_menus([
        'main_menu' => __('Menú Principal', 'playeraduria'),
        'footer_menu' => __('Menú Footer', 'playeraduria'),
    ]);
}

add_action('after_setup_theme', 'playeraduria_register_menus');
