<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( dirname( __FILE__ ) . '/general-options.php' );
require_once( dirname( __FILE__ ) . '/header-options.php' );
require_once( dirname( __FILE__ ) . '/other-options.php' );

/**
 * Register Theme Options
 * 
 */
function carob_register_theme_options( $options ) {

	carob_general_theme_options( $options );
	carob_header_theme_options( $options );
	carob_other_theme_options( $options );
	
	return $options;
}
add_filter( 'carob_theme_options', 'carob_register_theme_options' );

?>