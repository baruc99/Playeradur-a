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

add_action('add_meta_boxes', function () {

    add_meta_box(
        'product_gallery',
        'Galería del producto',
        'playeraduria_render_product_gallery',
        'product_card',
        'normal',
        'high'
    );

});

function playeraduria_render_product_gallery($post) {

    $images = get_post_meta($post->ID, '_product_gallery', true);
    $images = is_array($images) ? $images : [];

    wp_nonce_field('save_product_gallery', 'product_gallery_nonce');
    ?>

    <div id="product-gallery-wrapper">
        <ul class="product-gallery-list">
            <?php foreach ($images as $img_id): ?>
                <li>
                    <?= wp_get_attachment_image($img_id, 'thumbnail'); ?>
                    <input type="hidden" name="product_gallery[]" value="<?= esc_attr($img_id); ?>">
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <button type="button" class="button" id="add-product-gallery">
        Agregar imágenes
    </button>

    <style>
        .product-gallery-list {
            display: flex;
            gap: 10px;
            margin: 0;
            padding: 0;
        }
        .product-gallery-list li {
            list-style: none;
        }
    </style>

    <script>
    jQuery(function($){
        let frame;

        $('#add-product-gallery').on('click', function(e){
            e.preventDefault();

            if (frame) {
                frame.open();
                return;
            }

            frame = wp.media({
                title: 'Seleccionar imágenes',
                button: { text: 'Usar imágenes' },
                multiple: true
            });

            frame.on('select', function(){
                const selection = frame.state().get('selection');

                selection.each(function(attachment){
                    const id  = attachment.id;
                    const url = attachment.attributes.sizes.thumbnail.url;

                    $('.product-gallery-list').append(
                        '<li>' +
                        '<img src="'+url+'">' +
                        '<input type="hidden" name="product_gallery[]" value="'+id+'">' +
                        '</li>'
                    );
                });
            });

            frame.open();
        });
    });
    </script>

    <?php
}


/* =========================
 * GUARDAR GALERÍA
 * ========================= */

 add_action('save_post_product_card', function ($post_id) {

    if (!isset($_POST['product_gallery_nonce']) ||
        !wp_verify_nonce($_POST['product_gallery_nonce'], 'save_product_gallery')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['product_gallery'])) {
        update_post_meta(
            $post_id,
            '_product_gallery',
            array_map('intval', $_POST['product_gallery'])
        );
    } else {
        delete_post_meta($post_id, '_product_gallery');
    }
});




/**
 * Limita tamaño máximo de imágenes grandes
 */
// add_filter('big_image_size_threshold', function () {
//     return 1920;
// });