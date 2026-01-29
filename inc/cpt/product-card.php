<?php

function playeraduria_register_product_card_cpt() {

    register_post_type('product_card', [
        'label' => 'Productos',
        'public' => true,
        'menu_icon' => 'dashicons-products',
        'supports' => ['title','editor','thumbnail','gallery'],
        'has_archive' => false,
        'show_in_rest' => false,
    ]);
}

add_action('init', 'playeraduria_register_product_card_cpt');
