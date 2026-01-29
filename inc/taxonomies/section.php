<?php

function playeraduria_register_section_taxonomy() {

    register_taxonomy(
        'section',
        ['product_card'],
        [
            'label' => 'Secciones',
            'hierarchical' => true,
            'show_admin_column' => true,
            'show_in_rest' => false,
            'rewrite' => ['slug' => 'seccion'],
        ]
    );
}

add_action('init', 'playeraduria_register_section_taxonomy');
