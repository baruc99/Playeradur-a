<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php $header = playeraduria_get_header_data(); ?>

<header class="hero"
    style="background-image:url('<?php echo esc_url($header['image']); ?>')">
</header>

<nav class="section-nav">
    <div class="container">
        <?php
        wp_nav_menu([
            'theme_location' => 'main_menu',
            'container' => false,
            'menu_class' => 'section-menu',
        ]);
        ?>
    </div>
</nav>
