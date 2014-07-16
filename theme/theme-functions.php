<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CAROB_THEME_OPTIONS_ID', 'carob_starter_theme' );

require_once( dirname( __FILE__ ) . '/includes/class-carob-theme.php' );
require_once( dirname( __FILE__ ) . '/includes/class-carob-theme-options.php' );
require_once( dirname( __FILE__ ) . '/includes/class-carob-theme-sidebars.php' );
require_once( dirname( __FILE__ ) . '/post-types/custom-post-types.php' );
require_once( dirname( __FILE__ ) . '/sidebars/theme-sidebars.php' );
require_once( dirname( __FILE__ ) . '/class-tgm-plugin-activation.php' );

/**
 * Init The Theme
 * 
 */
function carob_init_theme() {

	$theme = Carob_Theme::get_instance();

	if( is_admin() ) {

		require_once( dirname( __FILE__ ) . '/theme-options/theme-options.php' );
		require_once( dirname( __FILE__ ) . '/admin/class-carob-theme-admin.php' );
		
		$theme->add_extension( 'admin', new Carob_Theme_Admin() );
	}

	$theme->add_extension( 'theme_options', new Carob_Theme_Options() );
	$theme->add_extension( 'sidebars', new Carob_Theme_Sidebars() );

	if( carob_is_framework_active() ) {

		require_once( dirname( __FILE__ ) . '/meta-boxes/custom-meta-boxes.php' );
	}
}
add_action( 'after_setup_theme', 'carob_init_theme' );

/**
 * Register The Icon Font
 * 
 * It is used by 'icon_picker' option type to let the user to select an icon. 
 */
function carob_register_icon_font( $font ) {

	$font = array( 
		'family' => 'Font Awesome',
		'css' => CAROB_THEME_ROOT_URI . '/fonts/font-awesome/css/font-awesome.min.css',
		'css_file' => CAROB_THEME_ROOT_PATH . '/fonts/font-awesome/css/font-awesome.min.css',
		'prefix' => 'fa',
		'type' => 'custom'
	);

	return $font;
}
add_filter( 'carob_icon_font', 'carob_register_icon_font' );

/**
 * Register Required Theme Plugins
 * 
 */
function carob_tgm_register_required_plugins() {

	$plugins = array(

		// Carob Framework
		array(
			'name' => 'Carob Framework',
			'slug' => 'carob-framework',
			'source' => CAROB_THEME_ROOT_PATH . '/plugins/carob-framework.zip',
			'required' => true,
			'force_activation' => false 
		)
	);

	$config = array(
		'id' => 'tgmpa-carob-theme',
		'menu' => 'tgmpa-install-plugins',
		'has_notices' => true,
		'dismissable' => true,
		'is_automatic' => true
	);
	
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'carob_tgm_register_required_plugins' );

/**
 * Uncomment if your theme will serve the shortcodes JS and CSS
 * 
 */
/*function carob_load_shortcodes_picker_frontend( $option ) {

	return false;
}
add_filter( 'carob_shortcodes_load_frontend', 'carob_load_shortcodes_picker_frontend' );
*/

/**
 * Get Theme Option
 * 
 * (a shorthand function)
 */
function carob_get_theme_option( $option_id ) {

	$theme = Carob_Theme::get_instance();
	$options = $theme->get_extension( 'theme_options' );

	return $options->get_option( $option_id );
}

/**
 * Determine If Carob Framework Plugin Is Active
 * 
 */
function carob_is_framework_active() {

	if( defined( 'CAROB_FRAMEWORK_VERSION' ) && class_exists( 'Carob_Framework' ) ) {
		
		return true;
	}

	return false;
}

/**
 * Get Carob Framework Instance
 *
 */
function carob_get_framework() {

	if( carob_is_framework_active() ) {

		return Carob_Framework::get_instance();
	}

	return new WP_Error( 'framework' );
}

?>