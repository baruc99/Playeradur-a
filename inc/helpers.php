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
        'image' => get_template_directory_uri() . '/assets/img/header-default.jpeg',
        'title' => 'Playeraduría',
        'subtitle' => 'Lo que imaginas, se imprime',
    ];
}

function playeraduria_get_product_images($post_id) {

    // Leer galería correcta
    $gallery = get_post_meta($post_id, 'product_gallery', true);
    $gallery = is_array($gallery) ? $gallery : [];

    $images = [];

    // Imagen destacada primero (si existe)
    $featured = get_post_thumbnail_id($post_id);
    if ($featured) {
        $images[] = $featured;
    }

    // Agregar galería evitando duplicados
    foreach ($gallery as $img_id) {
        if (!in_array($img_id, $images)) {
            $images[] = $img_id;
        }
    }

    return $images;
}

