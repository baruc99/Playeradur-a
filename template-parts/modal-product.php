<?php
$images = playeraduria_get_product_images(get_the_ID());
?>

<div class="modal fade" id="modal-<?= get_the_ID() ?>" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body p-0">
                <div id="modalCarousel-<?= get_the_ID() ?>" class="carousel slide">

                    <div class="carousel-inner">
                        <?php foreach ($images as $i => $img_id): ?>
                            <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                                <img src="<?= wp_get_attachment_image_url($img_id, 'full') ?>"
                                     class="d-block w-100 zoom-image">
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <button class="carousel-control-prev"
                            data-bs-target="#modalCarousel-<?= get_the_ID() ?>"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next"
                            data-bs-target="#modalCarousel-<?= get_the_ID() ?>"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>

                </div>
            </div>

        </div>
    </div>
</div>
