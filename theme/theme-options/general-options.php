<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * General Theme Options
 * 
 */
function carob_general_theme_options( &$options = array() ) {

	/**
	 * Heading option is used to separate theme options into sections of groups.
	 * Here we have a 'General' heading that will create the first group of options
	 * and all options until the next heading will be presented in this section.
	 */

	// General Heading
	$options[] = array( 
		'title' => __( 'General', 'carob-theme' ),
		'id' => 'carob_general_options',
		'desc' => __( 'Here you can edit general theme settings.', 'carob-theme' ),
		'type' => 'heading'
	);

	// Responsive Design
	$options[] = array(
		'title' => __( 'Responsive Design', 'carob-theme' ),
		'id' => 'theme_rwd',
		'desc' => __( 'Enable or disable the theme responsive design:', 'carob-theme' ),
		'default' => 'on',
		'class' => 'carob-switch-toggle',
		'type' => 'switch_toggle'
	);

	// Favicon
	$options[] = array(
		'title' => __( 'Favicon', 'carob-theme' ),
		'id' => 'theme_favicon',
		'desc' => __( 'Upload your website favicon image, 16px by 16px in png, gif or ico format:', 'carob-theme' ),
		'default' => array( 'id' => 0 ),
		'options' => array(
			'type' => 'image',
			'button_title' => __( 'Select Favicon', 'carob-theme' ) 
		),
		'class' => 'carob-input--medium',
		'type' => 'file'
	);

	// Footer Text
	$options[] = array(
		'title' => __( 'Footer Text', 'carob-theme' ),
		'id' => 'theme_footer_text',
		'desc' => __( 'Enter the text displayed in the footer:', 'carob-theme' ),
		'default' => 'Carob Starter Theme 2014',
		'options' => array(),
		'class' => 'carob-editor',
		'type' => 'editor'
	);
}

?>