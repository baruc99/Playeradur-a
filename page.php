<?php get_header(); ?>

<main class="container my-5">

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <article <?php post_class(); ?>>
                <h1><?php the_title(); ?></h1>

                <div class="content">
                    <?php the_content(); ?>
                </div>
            </article>

        <?php endwhile; ?>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
