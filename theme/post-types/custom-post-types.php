<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Custom Post Types
 * 
 */
function carob_register_custom_post_types( $post_types ) {

	/**
	 * Register a Portfolio post type with Skills taxonomy
	 *
	 * Visit https://github.com/ydimitrov/Carob-Framework for more information
	 */

	$post_types['portfolio'] = array(
		'post_type' => 'portfolio',
		'options' => array( 'menu_icon' => 'dashicons-portfolio' ),
		'taxonomies' => array( 
			array(
				'name' => 'skills',
				'singular' => 'skill',
				'plural' => 'skills',
			)
		)
	);

	return $post_types;
}
add_filter( 'carob_post_types', 'carob_register_custom_post_types' );

?>