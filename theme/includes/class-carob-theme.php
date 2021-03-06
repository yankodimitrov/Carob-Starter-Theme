<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Carob_Theme' ) ) :

class Carob_Theme {

	private static $instance = null;
	private $extensions = null;
	private $registry = null;

	private function __construct() {

		$this->extensions = array();
		$this->registry = array();

		add_action( 'after_switch_theme', array( &$this, 'theme_activation' ) );
	}

	public static function get_instance() {

		if ( ! ( self::$instance instanceof Carob_Theme ) ) {
      		
      		self::$instance = new Carob_Theme();
		}
    	
    	return self::$instance;
	}

	public function theme_activation() {
		
		flush_rewrite_rules();

		$this->init_theme_options();
	}

	private function init_theme_options() {
		
		$theme_options = $this->get_extension( 'theme_options' );

		if( ! is_wp_error( $theme_options ) ) {

			$theme_options->reset_options();
		}

	}

	public function add_extension( $extension_key, &$extension ) {

		if( isset( $extension ) && is_object( $extension ) ) {
			
			$this->extensions[ $extension_key ] = $extension;
		}
	}

	public function get_extension( $extension_key ) {
		
		if( isset( $extension_key ) && array_key_exists( $extension_key, $this->extensions ) ) {
			
			return $this->extensions[ $extension_key ];
		}

		return new WP_Error(
			'crb_extension',
			sprintf( __( 'There is no extension with %s as key.', 'carob-framework' ), $extension_key )
		);
	}

	public function store_var( $key, $var ) {

		if( ! empty( $key ) && ! empty( $var ) ) {
			
			$this->registry[ $key ] = $var;
		}
	}

	public function get_var( $key ) {

		if( isset( $key ) && array_key_exists( $key, $this->registry ) ) {
			
			return $this->registry[ $key ];
		}

		return new WP_Error(
			'crb_registry',
			sprintf( __( 'There is no variable in registry with %s as key.', 'carob-framework' ), $key )
		);
	}

	private function __clone() {}
}

endif;

?>