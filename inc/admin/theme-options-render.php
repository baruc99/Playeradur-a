<?php

function playeraduria_render_logo_main() { ?>
    <input type="text" class="regular-text"
        name="playeraduria_theme_options[logo_main]"
        value="<?= esc_url(playeraduria_get_option('logo_main')); ?>">
<?php }

function playeraduria_render_logo_alt() { ?>
    <input type="text" class="regular-text"
        name="playeraduria_theme_options[logo_alt]"
        value="<?= esc_url(playeraduria_get_option('logo_alt')); ?>">
<?php }

function playeraduria_render_favicon() { ?>
    <input type="text" id="playeraduria_favicon" class="regular-text"
        name="playeraduria_theme_options[favicon]"
        value="<?= esc_url(playeraduria_get_option('favicon')); ?>">
    <button class="button playeraduria-upload" data-target="#playeraduria_favicon">Subir</button>
<?php }

function playeraduria_render_seo_title() { ?>
    <input type="text" class="regular-text"
        name="playeraduria_theme_options[seo_title]"
        value="<?= esc_attr(playeraduria_get_option('seo_title')); ?>">
<?php }

function playeraduria_render_seo_description() { ?>
    <textarea class="large-text" rows="3"
        name="playeraduria_theme_options[seo_description]"><?= esc_textarea(playeraduria_get_option('seo_description')); ?></textarea>
<?php }

function playeraduria_render_header_scripts() { ?>
    <textarea class="large-text code" rows="5"
        name="playeraduria_theme_options[header_scripts]"><?= esc_textarea(playeraduria_get_option('header_scripts')); ?></textarea>
<?php }

function playeraduria_render_footer_scripts() { ?>
    <textarea class="large-text code" rows="5"
        name="playeraduria_theme_options[footer_scripts]"><?= esc_textarea(playeraduria_get_option('footer_scripts')); ?></textarea>
<?php }

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

function playeraduria_render_sticky_header() { ?>
    <label><input type="checkbox"
        name="playeraduria_theme_options[sticky_header]"
        value="1" <?= checked(playeraduria_get_option('sticky_header'), 1, false); ?>> Activar</label>
<?php }

function playeraduria_render_hero_height() { ?>
    <input type="number" min="20" max="80"
        name="playeraduria_theme_options[hero_height]"
        value="<?= esc_attr(playeraduria_get_option('hero_height', 35)); ?>"> rem
<?php }

function playeraduria_render_preload_hero() { ?>
    <label><input type="checkbox"
        name="playeraduria_theme_options[preload_hero]"
        value="1" <?= checked(playeraduria_get_option('preload_hero'), 1, false); ?>> Activar</label>
<?php }

function playeraduria_render_disable_emojis() { ?>
    <label><input type="checkbox"
        name="playeraduria_theme_options[disable_emojis]"
        value="1" <?= checked(playeraduria_get_option('disable_emojis'), 1, false); ?>> Activar</label>
<?php }
