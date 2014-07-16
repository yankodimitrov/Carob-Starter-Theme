/*--------------------------------------
 * Carob Theme
 *
 * @version  1.0
 --------------------------------------*/
jQuery(document).ready(function($){

	window.CarobTheme = {};

	/**
	 * Settings
	 * 
	 */
	CarobTheme.settings = {
		form: $('#carob-theme-options-form'),
		menu: $('.carob-page-menu'),
		resetButton: $('.carob-reset-theme-options'),
		saveButton: $('.carob-save-theme-options'),
		groups: $('.group'),
		currentGroup: null,
		notificationView: $('#carob-notification')
	};

	/**
	 * INIT
	 * 
	 */
	CarobTheme.init = function() {

		this.settings.currentGroup = CarobTheme.settings.groups.first();
	 	this.settings.currentGroup.show();
		this.settings.currentGroup.addClass('current-group');

		// set first menu btn to active
		this.settings.menu.find('li:first').addClass('current');
		
		// handle menu clicks
		this.settings.menu.find('a').click( function(e) {
			
			e.preventDefault();
			
			var newGroup = $( '#' + $(this).attr('id') ) ;
			
			if( $(this).parent().hasClass('current') ) {
				return;
			}

			CarobTheme.settings.menu.find('li.current').removeClass('current');
			
			$(this).parent().addClass('current');
			
			CarobTheme.settings.currentGroup.hide();
			CarobTheme.settings.currentGroup = newGroup;
			CarobTheme.settings.currentGroup.removeClass('hidden');
			CarobTheme.settings.currentGroup.fadeIn(200);

		});

		CarobTheme.settings.resetButton.click( function(){

			return confirm( CarobAdmin_l10n.resetOptions );

		});

		CarobTheme.settings.saveButton.click( CarobTheme.saveThemeOptions );
	};

	/**
	 * Show Notificaton
	 * 
	 */
	CarobTheme.showNotification = function( text, type ) {

		var view = this.settings.notificationView;
		
		view.removeClass( 'info success' );
		view.addClass( type );
		view.find('.content').html( text );
		view.stop(true, true)
				.animate({top: 0 }, 300)
					.delay(1600).animate({top: -90 }, 300);
	}

	/**
	 * Save Theme Options
	 * 
	 */
	CarobTheme.saveThemeOptions = function(e) {

		e.preventDefault();

		CarobTheme.settings.saveButton.prop('disabled', true);
		
		$.ajax({
			type: 'post',
	        url: ajaxurl,
	        data: { 
	        	action: 'carob_save_theme_options',
	        	carob_form_data: CarobTheme.settings.form.serialize(),
	        	nonce: CarobAdmin_l10n.nonce
	        },
	        success: function(data) {

				CarobTheme.showNotification( data, 'success' );
				CarobTheme.settings.saveButton.prop('disabled', false);	
	        }
		});
	};

	CarobTheme.init();
});