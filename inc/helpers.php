<?php

function playeraduria_asset($path) {
    return get_template_directory_uri() . '/assets/' . ltrim($path, '/');
}
// uso
/* <img src="<?= playeraduria_asset('img/logo.png'); ?>" alt="Logo"> */
