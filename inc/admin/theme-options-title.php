<?php

add_filter('pre_get_document_title', function ($title) {
    return playeraduria_get_option('seo_title', $title);
});
