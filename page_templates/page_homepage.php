<?php
/*
 * Template Name: homepage
 * description: >-
  Page template for the homepage
 */

wp_enqueue_style(
    'homepage-styles',
    get_stylesheet_directory_uri() . '/assets/css/homepage/homepage.css',
    array(),
    '1.0.0'
);
?>

<!-- Get astra header -->
<?php get_header(); ?>

<!-- Replicate astra default page template outer html for styling and SEO -->
<div id="primary" class="content-area primary">
    <main id="main" class="site-main">
        <article id="post-<?php the_ID(); ?>" <?php post_class('ast-article-single'); ?> itemscope="itemscope" itemtype="https://schema.org/CreativeWork">
            <?php get_template_part('template_parts/custom_header'); ?>

            <?php get_template_part('template_parts/homepage/homepage_cover_image'); ?>

            <div class="image-accordion-container">
                <?php get_template_part('template_parts/homepage/image_accordion'); ?>
            </div>

            <?php get_template_part('template_parts/astra_toggleable_title'); ?>

            <?php get_template_part('template_parts/astra_gutenberg_blocks') ?>
        </article>
    </main>
</div>

<!-- Get astra footer -->
<?php get_footer(); ?>