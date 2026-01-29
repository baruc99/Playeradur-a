<?php get_header(); ?>

<main class="container my-5">

<?php
$current_section = get_post_field('post_name', get_post());
?>

<div class="row g-4">

<?php
$query = new WP_Query([
    'post_type' => 'product_card',
    'posts_per_page' => -1,
    'tax_query' => [
        [
            'taxonomy' => 'section',
            'field' => 'slug',
            'terms' => $current_section,
        ]
    ]
]);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post(); ?>

        <div class="col-12 col-md-4">

            <?php
            get_template_part('template-parts/card', 'product');
            get_template_part('template-parts/modal', 'product');
            ?>

        </div>

    <?php endwhile;
    wp_reset_postdata();
else :
    echo '<p>No hay productos en esta sección.</p>';
endif;
?>

</div>

</main>

<?php get_footer(); ?>
