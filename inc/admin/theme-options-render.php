<?php

/* ========= BRANDING ========= */
function playeraduria_render_logo_main() { ?>
    <input type="text" id="logo_main" class="regular-text"
        name="playeraduria_theme_options[logo_main]"
        value="<?= esc_url(playeraduria_get_option('logo_main')); ?>">
    <button class="button playeraduria-upload" data-target="#logo_main">Subir logo</button>
<?php }

function playeraduria_render_logo_alt() { ?>
    <input type="text" id="logo_alt" class="regular-text"
        name="playeraduria_theme_options[logo_alt]"
        value="<?= esc_url(playeraduria_get_option('logo_alt')); ?>">
    <button class="button playeraduria-upload" data-target="#logo_alt">Subir logo alternativo</button>
<?php }

/* ========= SEO ========= */
function playeraduria_render_seo_title() { ?>
    <input type="text" class="regular-text"
        name="playeraduria_theme_options[seo_title]"
        value="<?= esc_attr(playeraduria_get_option('seo_title')); ?>">
<?php }

function playeraduria_render_seo_description() {
    $v = playeraduria_get_option('seo_description');
    $l = mb_strlen($v);
?>
    <textarea class="large-text" rows="3"
        name="playeraduria_theme_options[seo_description]"><?= esc_textarea($v); ?></textarea>
    <p class="description">
        50–160 caracteres |
        <strong style="color:<?= ($l < 50 || $l > 160) ? '#d63638' : '#1d7f1d'; ?>">
            <?= $l ?> chars
        </strong>
    </p>
<?php }

/* ========= SCRIPTS ========= */
function playeraduria_render_header_scripts() { ?>
    <textarea class="large-text code" rows="5"
        name="playeraduria_theme_options[header_scripts]"><?= esc_textarea(playeraduria_get_option('header_scripts')); ?></textarea>
<?php }

function playeraduria_render_footer_scripts() { ?>
    <textarea class="large-text code" rows="5"
        name="playeraduria_theme_options[footer_scripts]"><?= esc_textarea(playeraduria_get_option('footer_scripts')); ?></textarea>
<?php }

/* ========= REDES ========= */
function playeraduria_render_social_facebook() { ?>
    <input type="url" class="regular-text"
        name="playeraduria_theme_options[facebook]"
        value="<?= esc_url(playeraduria_get_option('facebook')); ?>">
<?php }

function playeraduria_render_social_instagram() { ?>
    <input type="url" class="regular-text"
        name="playeraduria_theme_options[instagram]"
        value="<?= esc_url(playeraduria_get_option('instagram')); ?>">
<?php }

function playeraduria_render_social_tiktok() { ?>
    <input type="url" class="regular-text"
        name="playeraduria_theme_options[tiktok]"
        value="<?= esc_url(playeraduria_get_option('tiktok')); ?>">
<?php }

/* ========= HEADER ========= */
function playeraduria_render_sticky_header() { ?>
    <label>
        <input type="checkbox"
            name="playeraduria_theme_options[sticky_header]"
            value="1" <?= checked(playeraduria_get_option('sticky_header'), 1, false); ?>>
        Header sticky
    </label>
<?php }

function playeraduria_render_hero_height() { ?>
    <input type="number" min="20" max="80"
        name="playeraduria_theme_options[hero_height]"
        value="<?= esc_attr(playeraduria_get_option('hero_height', 35)); ?>"> rem
<?php }

/* ========= PERFORMANCE ========= */
function playeraduria_render_preload_hero() { ?>
    <label>
        <input type="checkbox"
            name="playeraduria_theme_options[preload_hero]"
            value="1" <?= checked(playeraduria_get_option('preload_hero'), 1, false); ?>>
        Preload hero
    </label>
<?php }

function playeraduria_render_disable_emojis() { ?>
    <label>
        <input type="checkbox"
            name="playeraduria_theme_options[disable_emojis]"
            value="1" <?= checked(playeraduria_get_option('disable_emojis'), 1, false); ?>>
        Desactivar emojis
    </label>
<?php }
