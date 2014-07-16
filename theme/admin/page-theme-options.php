<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! current_user_can( 'manage_options' ) ) {
	
	wp_die( __( 'You do not have sufficient permissions to access this page.', 'carob-theme' ) );
}

?>

<form method="post" id="carob-theme-options-form">

	<div class="carob-page-wrap">
		
		<div class="carob-page-header">
			
			<h2 class="title">
				<?php echo CAROB_THEME_NAME; ?>
			</h2>
			<p class="description carob-description">
				<?php echo esc_html( __('Version: ', 'carob-theme' ) ); echo CAROB_THEME_VERSION; ?>
			</p>

		</div>

		<div class="carob-page-content-wrap">
			
			<?php if( carob_is_framework_active() ) : ?>

				<?php

					$carob_theme = Carob_Theme::get_instance();
					$carob_theme_options = $carob_theme->get_extension( 'theme_options' );
					$carob_framework = carob_get_framework();
					$page_options = $carob_framework->get_extension( 'page_options_view' );
					
					// generate theme options separated by heading options
					$page_options->display_page_options( $carob_theme_options->get_saved_options(), $carob_theme_options->get_options() );
				?>
				</div> <!-- close the last options group -->

				<div class="carob-page-sidebar">
					<ul class="carob-page-menu">
						<?php echo $page_options->get_menu(); ?>
					</ul>
					<div class="carob-clear"></div>
				</div>

				<?php wp_nonce_field( Carob_Theme_Admin::NONCE_ACTION, Carob_Theme_Admin::NONCE_ACTION ); ?>

			<?php else : ?>

				<div class="carob-notice">
					<h2>
						<?php _e( 'Inactive Framework', 'carob-theme' ); ?>
					</h2>
					<p>
						<?php _e( 'In order to use the full power of this theme, please activate the Carob Framework plugin.', 'carob-theme' ); ?>
					</p>
				
				</div>

			<?php endif; ?>

		</div>

		<div class="carob-toolbar">
			
		<?php if( carob_is_framework_active() ) : ?>

			<input type="submit" name="carob_reset_theme_options" class="carob-reset-theme-options button carob-left" value="<?php echo esc_attr( __( 'Reset Theme Options', 'carob-theme' ) ); ?>"/>
			<input type="submit" class="carob-save-theme-options button button-primary carob-right" value="<?php echo esc_attr( __( 'Save Theme Options', 'carob-theme' ) ); ?>"/>
			<div class="carob-clear"></div>
			
		<?php endif; ?>

	</div>

	</div>

</form>