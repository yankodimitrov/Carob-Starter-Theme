<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Carob_All_Options_Meta_Box' ) ) :

class Carob_All_Options_Meta_Box extends Carob_Meta_Box {

	public function __construct() {

		$this->id = 'carob-all-options-meta-box';
		$this->title = __( 'All Options', 'carob-theme' );
	}

	public function get_options() {
		
		$options = array();
		$path = CAROB_THEME_ROOT_URI . '/theme/admin/images/options/';
		$blog_layouts = array(
			array( 'value' => 'standard', 'image' => $path . 'blog-standard.png' ),
			array( 'value' => 'masonry', 'image' => $path . 'blog-masonry.png' )
		);

		// Heading
		$options[] = array(
			'title' => __( 'All Standard Carob Framework Options (Heading)', 'carob-theme' ),
			'id' => 'heading',
			'desc' => __( 'You can register your own!', 'carob-theme' ),
			'type' => 'heading'
		);
		
		// Select Image Option
		$options[] = array(
			'title' => __( 'Select Image Option', 'carob-theme' ),
			'id' => 'carob_blog_layout',
			'desc' => __( 'Select the blog layout:', 'carob-theme' ),
			'default' => 'standard',
			'options' => $blog_layouts,
			'class' => 'carob-select-image-option',
			'type' => 'select_image_option'
		);

		// Text
		$options[] = array(
			'title' => __( 'Text', 'carob-theme' ),
			'id' => 'carob_text',
			'desc' => __( 'Description text:', 'carob-theme' ),
			'default' => '',
			'class' => 'carob-input',
			'type' => 'text'
		);

		// Textarea
		$options[] = array(
			'title' => __( 'Textarea', 'carob-theme' ),
			'id' => 'carob_textarea',
			'desc' => __( 'Description text:', 'carob-theme' ),
			'default' => '',
			'rows' => 7,
			'class' => 'carob-input',
			'type' => 'textarea'
		);

		// Checkbox
		$options[] = array(
			'title' => __( 'Checkbox', 'carob-theme' ),
			'id' => 'carob_checkbox',
			'desc' => __( 'Description text:', 'carob-theme' ),
			'default' => 'off',
			'label' => __( 'Label text', 'carob-theme' ),
			'class' => 'carob-checkbox',
			'type' => 'checkbox'
		);

		// Radio
		$options[] = array(
			'title' => __( 'Radio', 'carob-theme' ),
			'id' => 'carob_radio',
			'desc' => __( 'Description text:', 'carob-theme' ),
			'default' => 'one',
			'options' => array(
				array( 'value' => 'one', 'label' => __( 'One', 'carob-theme' ) ),
				array( 'value' => 'two', 'label' => __( 'Two', 'carob-theme' ) )
			),
			'class' => 'carob-radio',
			'type' => 'radio'
		);

		// Select
		$options[] = array(
			'title' => __( 'Select', 'carob-theme' ),
			'id' => 'carob_select',
			'desc' => __( 'Description text:', 'carob-theme' ),
			'default' => 'one',
			'options' => array(
				array( 'value' => 'one', 'label' => __( 'Option One', 'carob-theme' ) ),
				array( 'value' => 'two', 'label' => __( 'Option Two', 'carob-theme' ) )
			),
			'class' => 'carob-select',
			'type' => 'select'
		);

		// Checkboxes
		$options[] = array(
			'title' => __( 'Checkboxes', 'carob-theme' ),
			'id' => 'carob_checkboxes',
			'desc' => __( 'Description text:', 'carob-theme' ),
			'default' => array('one', 'four'),
			'options' => array(
				array( 'value' => 'one', 'label' => __( 'One', 'carob-theme' ) ),
				array( 'value' => 'two', 'label' => __( 'Two', 'carob-theme' ) ),
				array( 'value' => 'three', 'label' => __( 'Three', 'carob-theme' ) ),
				array( 'value' => 'four', 'label' => __( 'Four', 'carob-theme' ) )
			),
			'class' => 'carob-checkbox',
			'type' => 'checkboxes'
		);

		// Editor
		$options[] = array(
			'title' => __( 'Editor', 'carob-theme' ),
			'id' => 'carob_editor',
			'desc' => __( 'Description text:', 'carob-theme' ),
			'default' => 'Some default content',
			'options' => array(),
			'class' => 'carob-editor',
			'type' => 'editor'
		);

		// Slider Input
		$options[] = array(
			'title' => __( 'Slider Input', 'carob-theme' ),
			'id' => 'carob_slider_input',
			'desc' => __( 'Description text:', 'carob-theme' ),
			'default' => 10,
			'options' => array(
				'min' => 1,
				'max' => 100,
				'step' => 1
			),
			'class' => 'carob-ui-slider-field',
			'type' => 'slider_input'
		);

		// Color Picker
		$options[] = array(
			'title' => __( 'Color Picker', 'carob-theme' ),
			'id' => 'carob_color_picker',
			'desc' => __( 'Description text:', 'carob-theme' ),
			'default' => '7cd3c6',
			'class' => 'carob-color-picker',
			'type' => 'color_picker'
		);

		// Switch Toggle
		$options[] = array(
			'title' => __( 'Switch Toggle', 'carob-theme' ),
			'id' => 'carob_switch_toggle_option',
			'desc' => __( 'Description text:', 'carob-theme' ),
			'default' => 'off',
			'class' => 'carob-switch-toggle',
			'type' => 'switch_toggle'
		);

		// File
		$options[] = array(
			'title' => __( 'File (in this case an image file)', 'carob-theme' ),
			'id' => 'carob_image_file',
			'desc' => __( 'Description text:', 'carob-theme' ),
			'default' => array( 'id' => 0, 'url' => '' ),
			'options' => array(
				'type' => 'image',
				'button_title' => __( 'Select Image', 'carob-theme' ) 
			),
			'class' => 'carob-input--medium',
			'type' => 'file'
		);

		// Gallery
		$options[] = array(
			'title' => __( 'Gallery', 'carob-theme' ),
			'id' => 'carob_page_gallery',
			'desc' => __( 'Description text:', 'carob-theme' ),
			'default' => array(),
			'button_title' => __( 'Select Images', 'carob-theme' ), 
			'class' => 'carob-gallery',
			'type' => 'gallery'
		);

		// Icon Picker
		$options[] = array(
			'title' => __( 'Icon Picker', 'carob-theme' ),
			'id' => 'carob_page_icon',
			'desc' => __( 'Description text:', 'carob-theme' ),
			'default' => 'fa-music',
			'class' => 'carob-font-icon-picker',
			'type' => 'icon_picker'
		);

		// Select Sidebar
		$options[] = array(
			'title' => __( 'Select Sidebar', 'carob-theme' ),
			'id' => 'carob_page_sidebar',
			'desc' => __( 'Description text:', 'carob-theme' ),
			'default' => 'Blog Sidebar',
			'class' => 'carob-select',
			'type' => 'select_sidebar'
		);

		return $options;
	}
}

endif;