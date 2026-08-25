
"use strict";
var cspt_admin_menu_class = function(){
	jQuery('#adminmenu > li[id$="-wp-admin-customize"]').addClass('cspt-admin-customize-menu');
}

var cspt_kirki_bg_color_show_hide = function(){
	jQuery('.accordion-section').on('click', function(){
		setTimeout(function(){
			jQuery('li.customize-control.customize-control-kirki-background' ).each(function(){
				var this_bg_ele = jQuery(this);
				var selected = '';
				if( jQuery(this).prev().hasClass('customize-control-kirki-radio-image') ){
					selected = jQuery('input.image-select:checked',  jQuery(this).prev() ).val() ; 
					if ( selected ) {
						if( selected == 'custom' ) {
							jQuery( '.background-color', this_bg_ele ).show();
						} else {
							jQuery( '.background-color', this_bg_ele ).hide();
						}
					}
				}
			});
		}, 100);
	});
}

jQuery(document).ready(function($){

	cspt_admin_menu_class();
	cspt_kirki_bg_color_show_hide();
	jQuery( '#acf-cspt-photo-gallery-group' ).hide();
	jQuery( '.cspt-merlin-message-small a' ).on('click', function(e){
		e.preventDefault();
		var parent = jQuery(this).closest('.cspt-merlin-message-box');
		jQuery('.cspt-merlin-message-conform', parent).fadeIn();
		jQuery('.cspt-merlin-message-inner', parent).animate({opacity: 0}, 400);
		jQuery('.cspt-merlin-message-box button.notice-dismiss', parent).fadeOut(400);
	});
	jQuery( '.cspt-disable-merlin-message-cancel' ).on('click', function(e){
		e.preventDefault();
		var parent = jQuery(this).closest('.cspt-merlin-message-box');
		jQuery('.cspt-merlin-message-conform', parent).fadeOut();
		jQuery('.cspt-merlin-message-inner', parent).animate({opacity: 1}, 400);
		jQuery('.cspt-merlin-message-box button.notice-dismiss', parent).fadeIn(400);
	});
	jQuery( '.cspt-disable-merlin-message' ).on('click', function(e){
		e.preventDefault();
		jQuery(this).closest('.notice.is-dismissible').slideUp();
		jQuery.post(
			ajaxurl, 
			{ 'action': 'cspt_remove_merlin_message' },
			function(response) {
				// Do nothing
			}
		);
	});

	// Ratings box
	jQuery( '.cspt-merlin-ratings-box .cspt-question-btn' ).on('click', function(e){
		e.preventDefault();
		jQuery('.cspt-merlin-ratings-box .cspt-merlin-ratings-box-main').slideUp(400);
		jQuery('.cspt-merlin-ratings-box .cspt-merlin-ratings-box-questions').slideDown(400);
		jQuery('.cspt-merlin-ratings-box .cspt-merlin-ratings-box-back-link').fadeIn(400);
	});
	jQuery( '.cspt-merlin-ratings-box .cspt-happy-btn' ).on('click', function(e){
		e.preventDefault();
		jQuery('.cspt-merlin-ratings-box .cspt-merlin-ratings-box-main').slideUp(400);
		jQuery('.cspt-merlin-ratings-box .cspt-merlin-ratings-box-ratings').slideDown(400);
		jQuery('.cspt-merlin-ratings-box .cspt-merlin-ratings-box-back-link').fadeIn(400);
	});
	jQuery( '.cspt-merlin-ratings-box .cspt-merlin-ratings-box-back-link' ).on('click', function(e){
		e.preventDefault();
		jQuery('.cspt-merlin-ratings-box .cspt-merlin-ratings-box-main').slideDown(400);
		jQuery('.cspt-merlin-ratings-box .cspt-merlin-ratings-box-ratings').slideUp(400);
		jQuery('.cspt-merlin-ratings-box .cspt-merlin-ratings-box-questions').slideUp(400);
		jQuery('.cspt-merlin-ratings-box .cspt-merlin-ratings-box-back-link').fadeOut(400);
	});
	jQuery( '.cspt-disable-ratings-message-cancel' ).on('click', function(e){
		var parent = jQuery(this).closest('.cspt-merlin-message-box');
		jQuery('.cspt-merlin-message-conform', parent).fadeOut();
		jQuery('.cspt-merlin-message-inner', parent).animate({opacity: 1}, 400);
		jQuery('.cspt-merlin-message-box button.notice-dismiss', parent).fadeIn(400);
	});
	jQuery( '.cspt-merlin-ratings-box .cspt-disable-ratings-message' ).on('click', function(e){
		e.preventDefault();
		jQuery(this).closest('.notice.is-dismissible').slideUp();
		jQuery.post(
			ajaxurl, 
			{ 'action': 'cspt_remove_ratings_message' },
			function(response) {
				// Do nothing
			}
		);
	});
});
jQuery(window).load(function($){

	// Post Format functions
	creativesplanet_post_format_calls();

});	

var creativesplanet_post_format_calls = function() {

	jQuery('#acf-form-data').insertAfter('#titlediv');
	jQuery('#acf_after_title-sortables').insertAfter('#acf-form-data');

	jQuery('input[type=radio][name=post_format]').change(function() {

		if( this.value == 'image' ){  // Post Format - Image
			jQuery('#postimagediv').after('<div id="cspt-postimagediv-place-holder"></div>').insertAfter('#titlediv');
		} else {
			jQuery('#cspt-postimagediv-place-holder').replaceWith( jQuery('#postimagediv') );
		}

		if( this.value == 'status' ){  // Post Format - Status
			jQuery('#content:visible').focus();
			jQuery('#titlewrap').hide();
		} else {
			jQuery('#titlewrap').show();
		}

	});

};