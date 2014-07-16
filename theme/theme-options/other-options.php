<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Other Theme Options
 * 
 */
function carob_other_theme_options( &$options = array() ) {

	// General Heading
	$options[] = array( 
		'title' => __( 'Other', 'carob-theme' ),
		'id' => 'carob_other_options',
		'desc' => __( 'Miscellaneous theme options.', 'carob-theme' ),
		'type' => 'heading'
	);

	// 404 Page Title
	$options[] = array(
		'title' => __( '404 Page Title', 'carob-theme' ),
		'id' => '404_page_title',
		'desc' => __( 'Enter here the 404 page title text:', 'carob-theme' ),
		'default' => 'Good old 404',
		'class' => 'carob-input',
		'type' => 'text'
	);

	// Some Icon
	$options[] = array(
		'title' => __( 'Some Icon', 'carob-theme' ),
		'id' => 'theme_some_icon',
		'desc' => __( 'Select an icon:', 'carob-theme' ),
		'default' => 'fa-star',
		'class' => 'carob-font-icon-picker',
		'type' => 'icon_picker'
	);
}

?>