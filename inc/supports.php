<?php

function playeraduria_theme_supports() {
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'gallery',
    ]);
}

add_action('after_setup_theme', 'playeraduria_theme_supports');
