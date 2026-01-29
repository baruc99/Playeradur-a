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
        'default'
    );
});


function playeraduria_render_product_gallery($post) {

    // Leer galería
    $images = get_post_meta($post->ID, 'product_gallery', true);
    $images = is_array($images) ? $images : [];

    // Seguridad
    wp_nonce_field('save_product_gallery', 'product_gallery_nonce');
    ?>

    <div id="product-gallery-wrapper">

        <ul class="product-gallery-list">
            <?php foreach ($images as $img_id): ?>
                <li data-id="<?= esc_attr($img_id); ?>">
                    <?= wp_get_attachment_image($img_id, 'thumbnail'); ?>
                    <input type="hidden"
                           name="product_gallery[]"
                           value="<?= esc_attr($img_id); ?>">
                    <button type="button" class="remove-image">×</button>
                </li>
            <?php endforeach; ?>
        </ul>

        <button type="button" class="button" id="add-product-gallery">
            Agregar imágenes
        </button>
    </div>

    <style>
        .product-gallery-list {
            display: flex;
            gap: 10px;
            padding: 0;
            margin: 10px 0;
            flex-wrap: wrap;
        }
        .product-gallery-list li {
            list-style: none;
            position: relative;
        }
        .product-gallery-list img {
            display: block;
        }
        .product-gallery-list .remove-image {
            position: absolute;
            top: -6px;
            right: -6px;
            background: #000;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            cursor: pointer;
            font-size: 14px;
            line-height: 18px;
        }
    </style>

    <script>
    jQuery(function($){

        let frame;

        // Agregar imágenes
        $('#add-product-gallery').on('click', function(e){
            e.preventDefault();

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

                    // Evitar duplicados
                    if ($('.product-gallery-list li[data-id="'+id+'"]').length) {
                        return;
                    }

                    $('.product-gallery-list').append(
                        '<li data-id="'+id+'">' +
                            '<img src="'+url+'">' +
                            '<input type="hidden" name="product_gallery[]" value="'+id+'">' +
                            '<button type="button" class="remove-image">×</button>' +
                        '</li>'
                    );
                });
            });

            frame.open();
        });

        // Eliminar imagen
        $(document).on('click', '.remove-image', function(){
            $(this).closest('li').remove();
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

    if (isset($_POST['product_gallery']) && is_array($_POST['product_gallery'])) {
        update_post_meta(
            $post_id,
            'product_gallery',
            array_map('intval', $_POST['product_gallery'])
        );
    } else {
        delete_post_meta($post_id, 'product_gallery');
    }
});





/**
 * Limita tamaño máximo de imágenes grandes
 */
// add_filter('big_image_size_threshold', function () {
//     return 1920;
// });