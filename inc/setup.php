<?php

function playeraduria_setup() {
    load_theme_textdomain('playeraduria');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'playeraduria_setup');

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
});
