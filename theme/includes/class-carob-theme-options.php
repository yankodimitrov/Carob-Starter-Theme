<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Carob_Theme_Options' ) ) :

class Carob_Theme_Options {

	private $options;
	private $saved_options;

	public function __construct() {

		$this->saved_options = array();
		
		add_action( 'init', array( &$this, 'init' ) );
		add_action( 'wp_ajax_carob_save_theme_options', array( &$this, 'save_options' ) );

		if( isset( $_POST['carob_reset_theme_options'] ) ) {

			$this->reset_action();
		}
	}

	public function init() {

		$this->options = apply_filters( 'carob_theme_options', array() );
	}

	public function get_option( $option_id ) {

		$options = $this->get_saved_options();

		if( array_key_exists( $option_id, $options ) ) {

			return $options[ $option_id ];
		}

		return new WP_Error( 'theme-option' );
	}

	public function get_saved_options() {

		if( empty( $this->saved_options ) ) {

			$this->saved_options = get_option( CAROB_THEME_OPTIONS_ID );
		}

		return $this->saved_options;
	}

	public function get_options() {

		return $this->options;
	}

	public function save_options() {

		if( ! carob_is_framework_active() ) {

			return;
		}

		check_ajax_referer( Carob_Theme_Admin::NONCE_ACTION, 'nonce' );
		
		if( ! isset( $_POST['carob_form_data'] ) ) {
			
			die( __( 'No theme options for save.', 'carob-theme' ) );
		}

		$options_factory = Carob_Options_Factory::get_instance();
		$theme_options = $this->get_options();
		$options = array();
		$form_data = array();
		parse_str( $_POST['carob_form_data'], $form_data );
			
		foreach ( $theme_options as $option ) {
			
			if( ! isset( $form_data[ $option['id'] ] ) ) {
				continue;
			}
			
			$input_value = $form_data[ $option['id'] ];
			$validator = $options_factory->make_option_validator( $option['type'] );
			$value = $validator->validate( $option, $input_value );

			$options[ $option['id'] ] = $value;
		}

		update_option( CAROB_THEME_OPTIONS_ID, $options );

		die( __( 'All changes are saved!', 'carob-theme' ) );
	}

	public function reset_options() {

		$theme_options = apply_filters( 'carob_theme_options', array() );
		$options = array();

		foreach( $theme_options as $option ) {

			if( ! isset( $option['default'] ) ) {
 				continue;
			}

			$options[ $option['id'] ] = $option['default'];
		}

		update_option( CAROB_THEME_OPTIONS_ID, $options );
	}

	public function reset_action() {

		if( ! wp_verify_nonce( $_POST[ Carob_Theme_Admin::NONCE_ACTION ], Carob_Theme_Admin::NONCE_ACTION ) ) {

			return;
		}

		$this->reset_options();

		$theme = Carob_Theme::get_instance();
		$notice = __( 'All theme options are set to their default values.', 'carob-theme' );
		$notice_type = 'updated';

		$theme->store_var( 'admin_notice', $notice );
		$theme->store_var( 'admin_notice_type', $notice_type );
	}
}

endif;

?>