<?php

/**
 * Image accordion gallery for the homepage
 */
wp_enqueue_style(
    'image-accordion-styles',
    get_stylesheet_directory_uri() . '/assets/css/homepage/image_accordion.css',
    array(),
    '1.0.0'
);
wp_enqueue_script(
    'image-accordion-scripts',
    get_stylesheet_directory_uri() . '/assets/js/homepage/image_accordion.js',
    array('jquery'),
    '1.0.0',
    true
);
?>


<?php
$carousel_gallery_images = get_field('carousel_gallery_images');

echo '<pre>';
print_r($carousel_gallery_images);
echo '</pre>';

if ($carousel_gallery_images): ?>
    <div class="gallery-container">
        <button class="nav-button prev" aria-label="Previous image">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
        </button>

        <div class="gallery-track">
            <?php foreach ($carousel_gallery_images as $image): ?>
                <div class="gallery-item">
                    <img src="<?php echo esc_url($image['metadata']['full']['file_url']); ?>"
                        srcset="<?php echo esc_attr($image['metadata']['medium']['file_url']); ?> 300w,
             <?php echo esc_attr($image['metadata']['medium_large']['file_url']); ?> 768w,
             <?php echo esc_attr($image['metadata']['large']['file_url']); ?> 1024w,
             <?php echo esc_attr($image['metadata']['1536x1536']['file_url']); ?> 1536w,
             <?php echo esc_attr($image['metadata']['2048x2048']['file_url']); ?> 2048w,
             <?php echo esc_attr($image['metadata']['full']['file_url']); ?> 2518w"
                        sizes="(max-width: 480px) 100vw, 
            (max-width: 768px) 80vw, 
            (max-width: 1024px) 70vw, 
            1200px"
                        loading="lazy"
                        alt="Kitchen Cover Photo">
                    <div class="hover-overlay">
                        <svg class="heart-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button class="nav-button next" aria-label="Next image">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </button>
    </div>
<?php endif; ?>