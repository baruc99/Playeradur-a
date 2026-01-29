<?php

add_filter('pre_get_document_title', function ($title) {

    $options = get_option('playeraduria_theme_options', []);

    if (!empty($options['seo_title'])) {
        return $options['seo_title'];
    }

    return $title;
});
