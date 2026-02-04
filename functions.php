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
    'inc/cpt/product-card.php',
    'inc/media.php',
    'inc/taxonomies/routes-taxonomy.php',
    'inc/taxonomies/section.php',

    // admin
    'inc/admin/theme-options-helpers.php',
    'inc/admin/theme-options-page.php',
    'inc/admin/theme-options-fields.php',
    'inc/admin/theme-options-render.php', 
    'inc/admin/theme-options-frontend.php',
    'inc/admin/theme-options-title.php',
];

foreach ( $playeraduria_includes as $file ) {
    require_once get_template_directory() . '/' . $file;
}

add_filter('use_block_editor_for_post_type', function ($use, $post_type) {

    if ($post_type === 'product_card') {
        return false;
    }

    return $use;

}, 10, 2);

add_action('wp_ajax_playeraduria_save_product_video', function () {

    if (!current_user_can('edit_posts')) wp_send_json_error();

    $post_id = intval($_POST['post_id']);
    $video_id = intval($_POST['video_id']);

    if (!$post_id || !$video_id) wp_send_json_error();

    update_post_meta($post_id, '_product_video', $video_id);

    wp_send_json_success();
});

