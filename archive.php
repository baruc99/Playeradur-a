<?php get_header(); ?>

<main class="container my-5">

    <header class="mb-4">
        <h1><?php the_archive_title(); ?></h1>
        <?php the_archive_description('<p>', '</p>'); ?>
    </header>

    <div class="row">

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <div class="col-md-4 mb-4">
                    <article <?php post_class('card h-100'); ?>>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail('medium', [
                                'class' => 'card-img-top'
                            ]); ?>
                        <?php endif; ?>

                        <div class="card-body">
                            <h2 class="card-title h5">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <p class="card-text">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </p>
                        </div>

                    </article>
                </div>

            <?php endwhile; ?>
        <?php else : ?>
            <p>No hay resultados.</p>
        <?php endif; ?>

    </div>

</main>

<?php get_footer(); ?>
