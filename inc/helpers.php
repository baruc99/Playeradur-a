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

function playeraduria_get_product_images($post_id) {

    $images = [];

    // Imagen principal
    if (has_post_thumbnail($post_id)) {
        $images[] = get_post_thumbnail_id($post_id);
    }

    // Galería desde metabox
    $gallery = get_post_meta($post_id, '_product_gallery', true);

    if (is_array($gallery)) {
        $images = array_merge($images, $gallery);
    }

    return array_unique($images);
}
