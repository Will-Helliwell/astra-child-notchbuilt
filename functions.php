<?php
add_action( 'wp_enqueue_scripts', 'astra_child_theme_enqueue_styles' );
function astra_child_theme_enqueue_styles() {
    // Enqueue the parent theme's stylesheet
    wp_enqueue_style( 'astra-child-theme-parent-style', get_parent_theme_file_uri( 'style.css' ), array(), '1.0.0' );
    // Enqueue the child theme's stylesheet
    wp_enqueue_style( 'astra-child-theme-style', get_stylesheet_uri(), array( 'astra-child-theme-parent-style' ), '1.0.0' );
    // Enqueue header styles globally as it is used on every page
    wp_enqueue_style('custom-header-styles', get_stylesheet_directory_uri() . '/assets/css/custom_header.css', '1.0.0');
}

// Load all custom shortcodes
add_action('init', 'load_all_custom_shortcodes');
function load_all_custom_shortcodes() {
    foreach (glob(get_stylesheet_directory() . '/shortcodes/*.php') as $shortcode_file) {
        include_once $shortcode_file;
    }
}