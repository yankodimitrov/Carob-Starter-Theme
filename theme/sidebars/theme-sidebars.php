<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Theme Sidebars
 * 
 */
function carob_register_theme_sidebars( $sidebars ) {

	// Blog Sidebar
	$sidebars[] = array(
		'id' => 'blog-sidebar',  
		'name' => __( 'Blog Sidebar', 'carob-theme' ),
		'description' => __( 'The blog sidebar.', 'carob-theme' ) 
	);

	return $sidebars;
}
add_filter( 'carob_theme_sidebars', 'carob_register_theme_sidebars' );

?>