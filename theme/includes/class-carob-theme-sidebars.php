<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Carob_Theme_Sidebars' ) ) :

class Carob_Theme_Sidebars {

	private $theme_sidebars;

	public function __construct() {

		$this->theme_sidebars = apply_filters( 'carob_theme_sidebars', array() );
		
		add_action( 'widgets_init', array( &$this, 'register_theme_sidebars' ) );
		add_filter( 'carob_get_theme_sidebars', array( &$this, 'set_theme_sidebars' ) );
		add_filter( 'carob_sidebars_options', array( &$this, 'set_sidebar_options' ) );
	}

	public function register_theme_sidebars() {

		$options = $this->get_sidebars_options();

		foreach ( $this->theme_sidebars as $sidebar ) {
			
			register_sidebar( array_merge( $options, $sidebar ) );
		}
	}

	private function get_sidebars_options() {

		$options = array( 
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h4 class="widget__title">',
			'after_title' => '</h4>'
		);

		return $options;
	}

	public function set_theme_sidebars( $sidebars ) {

		$theme_sidebars = array();

		foreach ( $this->theme_sidebars as $sidebar ) {
		
			$theme_sidebars[] = array( 'name' => $sidebar['name'] );
		}

		return array_merge( $sidebars, $theme_sidebars );
	}

	public function set_sidebar_options( $options ) {
		
		return $this->get_sidebars_options();
	}
}

endif;

?>