<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Carob_Page_Layout_Meta_Box' ) ) :

class Carob_Page_Layout_Meta_Box extends Carob_Meta_Box {

	public function __construct() {

		$this->id = 'carob-page-layout-meta-box';
		$this->title = __( 'Page Layout', 'carob-theme' );
	}

	public function get_options() {
		
		$options = array();
		$path = CAROB_THEME_ROOT_URI . '/theme/admin/images/options/';
		$layouts = array(
			array( 'value' => 'left', 'image' => $path . 'left-sidebar.png' ),
			array( 'value' => 'no-sidebar', 'image' => $path . 'no-sidebar.png' ),
			array( 'value' => 'right', 'image' => $path . 'right-sidebar.png' )
		);

		$options[] = array(
			'title' => __( 'Page Layout Options', 'carob-theme' ),
			'id' => 'heading',
			'desc' => __( 'Change page layout options like sidebar position and more.', 'carob-theme' ),
			'type' => 'heading'
		);
			
		$options[] = array(
			'title' => __( 'Sidebar Position', 'carob-theme' ),
			'id' => 'carob_page_layout',
			'desc' => __( 'Choose the sidebar position for this page:', 'carob-theme' ),
			'default' => 'right',
			'options' => $layouts,
			'class' => 'carob-select-image-option',
			'type' => 'select_image_option'
		);

		$options[] = array(
			'title' => __( 'Sidebar', 'carob-theme' ),
			'id' => 'carob_page_sidebar',
			'desc' => __( 'Select the page sidebar from the list below:', 'carob-theme' ),
			'default' => 'Blog Sidebar',
			'class' => 'carob-select',
			'type' => 'select_sidebar'
		);

		return $options;
	}
}

endif;