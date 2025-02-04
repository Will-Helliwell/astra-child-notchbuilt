<?php
// Hero image at the top of the homepage
wp_enqueue_style(
    'homepage-cover-image-styles',
    get_stylesheet_directory_uri() . '/assets/css/homepage/homepage_cover_image.css',
    array(),
    '1.0.0'
);
?>

<div class="custom-hero-section">
    <div class="hero-overlay">
        <div class="overlay-text">
            <?php echo wp_kses_post( 'crafting unique, custom<br>homes for discerning<br>homeowners and architects' ); ?>
        </div>
    </div>
</div>

<style>
    .custom-hero-section {
        background-image: url('<?php echo esc_url( wp_get_attachment_url(36) ); ?>');
    }
</style>