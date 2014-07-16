<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Carob_Theme_Admin' ) ) :

class Carob_Theme_Admin {

	const NONCE_ACTION = 'carob_theme_admin';
	private $options_page_id = 'carob-theme-options';

	public function __construct() {

		add_action( 'admin_enqueue_scripts', array( &$this, 'load_scripts' ) );
		add_action( 'admin_print_styles', array( &$this, 'load_styles' ) );
		add_action( 'admin_footer', array( &$this, 'add_notification_view' ) );
		add_action( 'admin_menu', array( &$this, 'add_options_page' ) );
		add_action( 'admin_notices', array( &$this, 'display_notice' ) );
	}

	public function load_scripts() {

		wp_enqueue_script(
			'carob-theme-admin-js',
			CAROB_THEME_ROOT_URI . '/theme/admin/js/carob-theme-admin.js',
			array( 'jquery' ),
			'1.0',
			true
		);
	
		$localized = array( 
			'resetOptions' => __( 'All options will be set to default!', 'carob-theme' ),
			'nonce' => wp_create_nonce( self::NONCE_ACTION )
		);
	
		wp_localize_script( 'carob-theme-admin-js', 'CarobAdmin_l10n', $localized );
	}

	public function load_styles() {

		wp_enqueue_style( 
			'carob-theme-admin-css',
			 CAROB_THEME_ROOT_URI . '/theme/admin/css/carob-theme-admin.css'
		);
	}

	public function add_notification_view() {

		require_once( dirname( __FILE__) . '/templates/notification-view.php' );
	}

	public function add_options_page() {

		add_theme_page( 
			__( 'Theme Options', 'carob-theme' ),
			__( 'Theme Options', 'carob-theme' ), 
			'manage_options',
			$this->options_page_id,
			array( &$this, 'display_theme_options_page' )
		);

	}

	public function display_theme_options_page() {

		require_once( dirname( __FILE__ ) . '/page-theme-options.php' );
	}

	public function display_notice() {

		$theme = Carob_Theme::get_instance();
		$notice = $theme->get_var( 'admin_notice' );
		$notice_type = $theme->get_var( 'admin_notice_type' );

		if( is_wp_error( $notice ) ) {
			return;
		}

		if( is_wp_error( $notice_type ) ) {

			$notice_type = 'updated';
		}

		echo '<div class="carob-admin-notice ' . esc_attr( $notice_type ) . '">
					<p>' . esc_html( $notice ) . '</p>
				</div>';
		
	}
}

endif;

?>