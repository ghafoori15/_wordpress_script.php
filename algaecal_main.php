<?php
/*
Plugin Name: AlgaeCal Carousel

Description: AlgaeCal Carousel creates a mixed media custom post type to display video and image carousel. It provides WP shortcode to easily access the gallery anywhere in your page. Please note that this carousel is build based on Bootstrap v3 and assumes you already have it in your theme. For Demonstration purposes only. Use of this plugin in your production is subject to permission by the author.

Version: 1.0
Author: Shah Ghafoori
Author URI: http://shahghafoori.com
*/
add_action( 'init', 'create_algaecal_carousel' );
function create_algaecal_carousel() {
    register_post_type( 'algaecal_carousel',
        array(
            'labels' => array(
                'name' => 'AlgaeCal Carousel',
                'singular_name' => 'AlgaeCal Carousel',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Slide',
                'edit' => 'Edit',
                'edit_item' => 'Edit Slide',
                'new_item' => 'New Slide',
                'view' => 'View',
                'view_item' => 'View Slide',
                'search_items' => 'Search for Slides',
                'not_found' => 'No Slide Found',
                'not_found_in_trash' => 'No Carousel Slides found in Trash',
            ),
            'public' => true,
            'menu_position' => 25,
            'supports' => array( 'title'),
            'taxonomies' => array( '' ),
            'menu_icon' => plugins_url( 'images/icon.png', __FILE__ ),
            'has_archive' => true
        )
    );
}


// Include Template File
include('template.php');

//Shortcode to call the template
add_shortcode( 'carousel', 'display_carousel' );

/**
 * Enqueue scripts and styles.
 */
function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'algaecal-carousel', plugin_dir_url( __FILE__ ) . 'css/algaecal-carousel.css' );
    wp_enqueue_script( 'wistia_script', 'http://fast.wistia.com/assets/external/E-v1.js', array(), '', true );
	wp_enqueue_script( 'algaecal-carousel-script', plugin_dir_url( __FILE__ ) . 'js/carousel.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );		
?>