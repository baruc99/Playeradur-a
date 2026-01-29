<div class="col-md-4 col-sm-6">
    <article class="product-card">
        <?php if (has_post_thumbnail()) : ?>
            <div class="product-image">
                <?php the_post_thumbnail('medium_large', ['class' => 'img-fluid']); ?>
            </div>
        <?php endif; ?>
    </article>
</div>
