<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( dirname( __FILE__ ) . '/class-carob-portfolio-meta-box.php' );
require_once( dirname( __FILE__ ) . '/class-carob-title-meta-box.php' );
require_once( dirname( __FILE__ ) . '/class-carob-page-layout-meta-box.php' );
require_once( dirname( __FILE__ ) . '/class-carob-all-options-meta-box.php' );

/**
 * Register Custom Meta Boxes
 * 
 */
function carob_register_custom_meta_boxes( $meta_boxes ) {

	$meta_boxes['portfolio_options'] = 'Carob_Portfolio_Meta_Box';
	$meta_boxes['page_title'] = 'Carob_Title_Meta_Box';
	$meta_boxes['page_layout'] = 'Carob_Page_Layout_Meta_Box';
	$meta_boxes['all_options'] = 'Carob_All_Options_Meta_Box';

	return $meta_boxes;
}
add_filter( 'carob_meta_boxes', 'carob_register_custom_meta_boxes' );

/**
 * Assign Meta Boxes To Post Types
 * 
 */
function carob_assign_meta_boxes( $post_types ) {

	$post_types['portfolio'] = array( 'portfolio_options' );
	$post_types['post'] = array( 'all_options', 'page_title', 'page_layout' );
	$post_types['page'] = array( 'page_title', 'page_layout' );

	return $post_types;
}
add_filter( 'carob_assign_meta_box', 'carob_assign_meta_boxes' );

?>