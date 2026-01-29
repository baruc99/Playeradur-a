<?php

function playeraduria_asset($path) {
    return get_template_directory_uri() . '/assets/' . ltrim($path, '/');
}
// uso
/* <img src="<?= playeraduria_asset('img/logo.png'); ?>" alt="Logo"> */


function playeraduria_get_header_data() {

    // Página con imagen destacada
    if (is_page() && has_post_thumbnail()) {
        return [
            'image' => get_the_post_thumbnail_url(null, 'hero'),
            'title' => get_the_title(),
            'subtitle' => '',
        ];
    }

    // Home o fallback
    return [
        'image' => get_template_directory_uri() . '/assets/img/header-default.jpg',
        'title' => 'Playeraduría',
        'subtitle' => 'Lo que imaginas, se imprime',
    ];
}