<?php
$carousel_id = 'productCarousel-' . get_the_ID();

// Video URL
$video_url = get_post_meta(get_the_ID(), '_product_video_url', true);

// Imagen destacada
$featured_id = get_post_thumbnail_id(get_the_ID());

$featured_image = '';
if ($featured_id) {
    $featured_image = wp_get_attachment_image_url($featured_id, 'large');
}

// Galería
$gallery = playeraduria_get_product_images(get_the_ID());

// Slides finales
$slides = [];

// 1. Video
if ($video_url) {
    $slides[] = [
        'type' => 'video',
        'src'  => $video_url
    ];
}

// 2. Imagen destacada
if ($featured_id) {
    $slides[] = [
        'type' => 'image',
        'src'  => wp_get_attachment_image_url($featured_id, 'large')
    ];
}

// 3. Galería (evita duplicar destacada)
if ($gallery) {
    foreach ($gallery as $img_id) {

        if ($img_id == $featured_id) continue;

        $slides[] = [
            'type' => 'image',
            'src'  => wp_get_attachment_image_url($img_id, 'large')
        ];
    }
}
?>

<div class="product-card">

<div id="<?= esc_attr($carousel_id) ?>"
     class="carousel slide"
     data-bs-ride="carousel">

<?php if (count($slides) > 1): ?>
<div class="carousel-indicators">

<?php foreach ($slides as $i => $slide): ?>
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

<?php foreach ($slides as $i => $slide): ?>

<div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">

<?php if ($slide['type'] === 'video'): ?>

<?php
$is_youtube = strpos($slide['src'], 'youtube.com') !== false || strpos($slide['src'], 'youtu.be') !== false;

if ($is_youtube):

    // Convierte URL normal a embed
    preg_match('~(youtu\.be/|v=)([^&]+)~', $slide['src'], $matches);
    $youtube_id = $matches[2] ?? '';
?>

<iframe
    class="d-block w-100"
    style="height:100%"
    src="https://www.youtube.com/embed/<?= esc_attr($youtube_id); ?>?autoplay=1&mute=1&loop=1&playlist=<?= esc_attr($youtube_id); ?>"
    frameborder="0"
    loading="lazy"
    allow="autoplay; encrypted-media"
    allowfullscreen>
</iframe>

<?php else: ?>

<video
    class="d-block w-100"
    autoplay
    muted
    playsinline
    loop
    preload="none"
    <?php if ($featured_image): ?>
        poster="<?= esc_url($featured_image); ?>"
    <?php endif; ?>>

    <source src="<?= esc_url($slide['src']); ?>">

</video>

<?php endif; ?>

<?php else: ?>

<img
    src="<?= esc_url($slide['src']); ?>"
    class="d-block w-100 product-zoom-trigger"
    data-index="<?= $i ?>"
    loading="lazy"
    data-bs-toggle="modal"
    data-bs-target="#modal-<?= get_the_ID(); ?>"
    alt="<?= esc_attr(get_the_title()); ?>">

<?php endif; ?>

</div>

<?php endforeach; ?>

</div>

<?php if (count($slides) > 1): ?>
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
