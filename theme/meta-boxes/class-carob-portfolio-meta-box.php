<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Carob_Portfolio_Meta_Box' ) ) :

class Carob_Portfolio_Meta_Box extends Carob_Meta_Box {

	public function __construct() {

		$this->id = 'carob-portfolio-meta-box';
		$this->title = __( 'Portfolio Options', 'carob-theme' );
	}

	public function get_options() {

		$options = array();

		// Gallery
		$options[] = array(
			'title' => __( 'Portfolio Gallery', 'carob-theme' ),
			'id' => 'carob_portfolio_gallery',
			'desc' => __( 'Select or upload the portfolio gallery slides:', 'carob-theme' ),
			'default' => array(),
			'button_title' => __( 'Manage Slides', 'carob-theme' ), 
			'class' => 'carob-gallery',
			'type' => 'gallery'
		);

		return $options;
	}
}

endif;