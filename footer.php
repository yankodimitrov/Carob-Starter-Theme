	
		<footer>
			<?php
				
				$footer_text = carob_get_theme_option( 'theme_footer_text' );

				echo esc_html( $footer_text );
			?>	
		</footer>

		<?php wp_footer(); ?>

	</body>
</html>