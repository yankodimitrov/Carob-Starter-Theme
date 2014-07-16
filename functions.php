<?php

/**
 * Theme Functions
 * 
 * @author Yanko Dimitrov
 * @link   http://www.yankodimitrov.com
 *
 * Text Domain: carob-theme
 * Domain Path: languages
 */

define( 'CAROB_THEME_NAME', 'Carob Starter Theme' );
define( 'CAROB_THEME_VERSION', '1.0.0' );
define( 'CAROB_THEME_ROOT_PATH', get_template_directory() );
define( 'CAROB_THEME_ROOT_URI', get_template_directory_uri() );

require_once( CAROB_THEME_ROOT_PATH . '/theme/theme-functions.php' );

/**
 * Theme Setup
 * 
 */
function carob_theme_setup() {

	load_theme_textdomain( 'carob-theme', CAROB_THEME_ROOT_PATH . '/languages' );
	
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	));

	add_theme_support( 'post-formats', array( 
		'image', 'gallery', 'quote', 'link', 'video', 'audio', 'aside'
	));

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

	if ( ! isset( $content_width ) ) {
		
		$content_width = 1110;
	}

}
add_action( 'after_setup_theme', 'carob_theme_setup' );

/**
 * Load Theme Scripts
 * 
 */
function carob_load_theme_scripts() {
	
	wp_register_script(
		'carob-theme-js',
		CAROB_THEME_ROOT_URI . '/js/theme.js',
		array( 'jquery' ),
		'1.0',
		true
	);

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'carob-theme-js' );

	if ( is_singular() && comments_open() ) {
	
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'carob_load_theme_scripts' );

/**
 * Load Theme Styles
 *
 */
function carob_load_theme_styles() {

	wp_register_style( 
		'carob-theme-css',
		get_stylesheet_directory_uri() . '/style.css',
		null,
		'1.0',
		'screen'
	);
	
	wp_enqueue_style( 'carob-theme-css' );
}
add_action( 'wp_enqueue_scripts', 'carob_load_theme_styles' );

?>