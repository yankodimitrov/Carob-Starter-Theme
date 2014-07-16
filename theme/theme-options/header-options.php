<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme Header Options
 * 
 */
function carob_header_theme_options( &$options = array() ) {

	// Header Heading
	$options[] = array( 
		'title' => __( 'Header', 'carob-theme' ),
		'id' => 'carob_header_options',
		'desc' => __( 'Here you can edit theme header related options.', 'carob-theme' ),
		'type' => 'heading'
	);

	// Gallery
	$options[] = array(
		'title' => __( 'Header Images', 'carob-theme' ),
		'id' => 'theme_header_slides',
		'desc' => __( 'Select or upload the header images:', 'carob-theme' ),
		'default' => array(),
		'button_title' => __( 'Manage Slides', 'carob-theme' ), 
		'class' => 'carob-gallery',
		'type' => 'gallery'
	);
}

?>