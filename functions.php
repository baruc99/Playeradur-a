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

add_action('template_redirect', function () {

    if (!playeraduria_get_option('full_cache')) return;

    if (is_admin()) return;

    if (is_user_logged_in()) return;

    if ($_SERVER['REQUEST_METHOD'] !== 'GET') return;

    $ttl = intval(playeraduria_get_option('full_cache_ttl', 5)) * 60;

    $key = 'playeraduria_page_' . md5($_SERVER['REQUEST_URI']);

    $cached = get_transient($key);

    if ($cached !== false) {
        header('X-PlayerAduria-Cache: HIT');
        echo $cached;
        exit;
    }
    

    ob_start(function ($html) use ($key, $ttl) {

        header('X-PlayerAduria-Cache: MISS');
    
        set_transient($key, $html, $ttl);
    
        return $html;
    });

});

/**
 * ==========================================
 * WHATSAPP USER META
 * ==========================================
 */

 class WP_User_WhatsApp {

    private static $meta_key = 'whatsapp';

    public static function init() {

        // Columnas admin
        add_filter('manage_users_columns', [self::class, 'add_column']);
        add_filter('manage_users_custom_column', [self::class, 'render_column'], 10, 3);
        add_filter('manage_users_sortable_columns', [self::class, 'sortable_column']);

        // Campo en perfil
        add_action('show_user_profile', [self::class, 'render_field']);
        add_action('edit_user_profile', [self::class, 'render_field']);
        add_action('user_new_form', [self::class, 'render_field']);

        // Guardado
        add_action('personal_options_update', [self::class, 'save_field']);
        add_action('edit_user_profile_update', [self::class, 'save_field']);
        add_action('user_register', [self::class, 'save_field']);
    }

    /**
     * ======================
     * ADMIN COLUMN
     * ======================
     */

    public static function add_column($columns) {
        $columns[self::$meta_key] = 'WhatsApp';
        return $columns;
    }

    public static function render_column($value, $column_name, $user_id) {

        if ($column_name !== self::$meta_key) {
            return $value;
        }

        $whatsapp = get_user_meta($user_id, self::$meta_key, true);

        if (!$whatsapp) {
            return '—';
        }

        $link = self::generate_link($whatsapp);

        return '<a href="'.$link.'" target="_blank">'.$whatsapp.'</a>';
    }

    public static function sortable_column($columns) {
        $columns[self::$meta_key] = self::$meta_key;
        return $columns;
    }

    /**
     * ======================
     * PROFILE FIELD
     * ======================
     */

    public static function render_field($user = null) {

        $whatsapp = $user ? get_user_meta($user->ID, self::$meta_key, true) : '';

        ?>
        <h3>Información adicional</h3>
        <table class="form-table">
            <tr>
                <th><label for="whatsapp">WhatsApp</label></th>
                <td>
                    <input type="text"
                        name="whatsapp"
                        id="whatsapp"
                        value="<?php echo esc_attr($whatsapp); ?>"
                        class="regular-text" />
                    <p class="description">Formato: 5212281234567</p>
                </td>
            </tr>
        </table>
        <?php
    }

    public static function save_field($user_id) {

        if (!isset($_POST['whatsapp'])) {
            return;
        }

        $numero = sanitize_text_field($_POST['whatsapp']);

        update_user_meta($user_id, self::$meta_key, $numero);
    }

    /**
     * ======================
     * LINK GENERATOR
     * ======================
     */

    private static function generate_link($whatsapp) {

        $sitio = home_url();
    
        $mensaje = "Hola, te contacto desde ".$sitio;
    
        return "https://wa.me/".$whatsapp."?text=".urlencode($mensaje);
    }
}

WP_User_WhatsApp::init();