<?php get_header(); ?>

<main class="container mt-5">
    <h1>Bienvenido a Playeraduría</h1>

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <article>
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p>No hay contenido</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
