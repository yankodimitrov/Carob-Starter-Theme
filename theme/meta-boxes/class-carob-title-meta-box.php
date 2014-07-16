<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Carob_Title_Meta_Box' ) ) :

class Carob_Title_Meta_Box extends Carob_Meta_Box {

	public function __construct() {

		$this->id = 'carob-title-meta-box';
		$this->title = __( 'Title Options', 'carob-theme' );
	}

	public function get_options() {

		$options = array();

		// Subtitle
		$options[] = array(
			'title' => __( 'Subtitle', 'carob-theme' ),
			'id' => 'carob_subtitle',
			'desc' => __( 'Enter here the page subtitle text:', 'carob-theme' ),
			'default' => '',
			'class' => 'carob-input',
			'type' => 'text'
		);

		return $options;
	}
}

endif;