<?php

/**
 * Ajusta la calidad de las imágenes al subirlas
 */
add_filter('jpeg_quality', function () {
    return 80;
});

add_filter('wp_editor_set_quality', function () {
    return 80;
});


/**
 * Fuerza lazy loading en imágenes
 */
add_filter('wp_get_attachment_image_attributes', function ($attr) {
    $attr['loading'] = 'lazy';
    return $attr;
});

/**
 * Limita tamaño máximo de imágenes grandes
 */
// add_filter('big_image_size_threshold', function () {
//     return 1920;
// });