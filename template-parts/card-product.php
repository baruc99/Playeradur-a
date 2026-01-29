<?php
$images = playeraduria_get_product_images(get_the_ID());
$carousel_id = 'productCarousel-' . get_the_ID();
?>

<div class="product-card">

    <div id="<?= esc_attr($carousel_id) ?>"
         class="carousel slide"
         data-bs-ride="carousel">

        <?php if (count($images) > 1): ?>
        <div class="carousel-indicators">
            <?php foreach ($images as $i => $img_id): ?>
                <button type="button"
                        data-bs-target="#<?= esc_attr($carousel_id) ?>"
                        data-bs-slide-to="<?= $i ?>"
                        class="<?= $i === 0 ? 'active' : '' ?>"
                        aria-current="<?= $i === 0 ? 'true' : 'false' ?>">
                </button>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="carousel-inner">
            <?php foreach ($images as $i => $img_id): ?>
                <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                <img
                    src="<?= esc_url(wp_get_attachment_image_url($img_id, 'large')) ?>"
                    class="d-block w-100 product-zoom-trigger"
                    data-bs-toggle="modal"
                    data-bs-target="#modal-<?= get_the_ID(); ?>"
    alt="<?= esc_attr(get_the_title()); ?>">
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (count($images) > 1): ?>
        <button class="carousel-control-prev"
                type="button"
                data-bs-target="#<?= esc_attr($carousel_id) ?>"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next"
                type="button"
                data-bs-target="#<?= esc_attr($carousel_id) ?>"
                data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
        <?php endif; ?>

    </div>

</div>
