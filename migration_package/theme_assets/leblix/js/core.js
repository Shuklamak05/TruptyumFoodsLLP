"use strict";

/*----  Functions  ----*/

jQuery.fn.cspt_is_bound = function(type) {
	if( this.data('events') !== undefined ){
		if (this.data('events')[type] === undefined || this.data('events')[type].length === 0) {
			return false;
		}
		return (-1 !== $.inArray(fn, this.data('events')[type]));
	} else {
		return false;
	}
};

var cspt_sticky_header = function() {
	if( jQuery('.cspt-header-sticky-yes').length > 0 ){
		var header_html = jQuery('#masthead .cspt-main-header-area').html();
		jQuery('.cspt-sticky-header').append(header_html);

		jQuery('.cspt-sticky-header .main-navigation ul, .cspt-sticky-header .main-navigation ul li, .cspt-sticky-header .main-navigation ul li a').removeAttr('id');

		jQuery('.cspt-sticky-header h1').each(function(){
			var thisele = jQuery(this);
			var thisele_class = jQuery(this).attr('class');
			thisele.replaceWith('<span class="' + thisele_class + '">' + jQuery(thisele).html() +'</span>');
		});

		// For infostak header
		if( jQuery('.cspt-main-header-area').hasClass('cspt-infostack-header') ){  // check if infostack header
			// for header style 3
			jQuery(".cspt-sticky-header .cspt-header-menu-area").insertAfter(".cspt-sticky-header .site-branding");
			jQuery('.cspt-sticky-header .cspt-header-info, .cspt-sticky-header .cspt-mobile-search, .cspt-sticky-header .nav-menu-toggle').remove();

			// for header style 4
			jQuery(".cspt-sticky-header .cspt-header-left, .cspt-sticky-header .cspt-header-right").remove();
		}

	}
}

var cspt_sticky_header_class = function() {
	// Add sticky class
	if( jQuery('#wpadminbar').length>0 ){
		jQuery('#masthead').addClass('cspt-adminbar-exists');
	}

	var offset_px = 300;
	if( jQuery('.cspt-main-header-area').length>0 ){
		offset_px = jQuery('.cspt-main-header-area').height() + offset_px;
	}

	// apply on document ready
	if (jQuery(window).scrollTop() > offset_px) {
		jQuery('#masthead').addClass('cspt-fixed-header');
		jQuery('.cspt-sticky-header .mega-menu.max-mega-menu.mega-menu-horizontal').attr("id","mega-menu-creativesplanet-top");
	} else {
		jQuery('#masthead').removeClass('cspt-fixed-header');
	}

	jQuery(window).scroll(function() {
		if (jQuery(window).scrollTop() > offset_px) {
			jQuery('#masthead').addClass('cspt-fixed-header');
			jQuery('.cspt-sticky-header .mega-menu.max-mega-menu.mega-menu-horizontal').attr("id","mega-menu-creativesplanet-top");
		} else {
			jQuery('#masthead').removeClass('cspt-fixed-header');
		}
	});

}



var cspt_toggleSidebar = function() {
	jQuery('#menu-toggle').on('click', function(){
		jQuery("body:not(.mega-menu-creativesplanet-top) .cspt-navbar > div, body:not(.mega-menu-creativesplanet-top)").toggleClass("active");
	})
	if( jQuery('.cspt-navbar > div > .closepanel').length==0 ){
		jQuery('.cspt-navbar > div').append('<span class="closepanel"><i class="cspt-base-icon-cancel-1"></i></span>');
		jQuery('.cspt-navbar > div > .closepanel, .mega-menu-creativesplanet-top .nav-menu-toggle').on('click', function(){	    		
			jQuery(".cspt-navbar > div, body, .mega-menu-wrap").toggleClass("active");
		});
		// Cart icon
		if( jQuery('.cspt-main-header-area .cspt-right-box > .cspt-cart-wrapper').length>0 ){
			if( jQuery('.cspt-navbar > div > .cspt-responsive-icons').length==0 ){
				jQuery('.cspt-navbar > div').append("<div class='cspt-responsive-icons'></div>");
			}
			jQuery('.cspt-navbar > div > .cspt-responsive-icons').append('<div class="cspt-cart-wrapper"></div>');
			jQuery('.cspt-navbar > div > .cspt-responsive-icons .cspt-cart-wrapper').append( jQuery('.cspt-main-header-area .cspt-right-box > .cspt-cart-wrapper').html() );
		}
		// Search icon
		if( jQuery('.cspt-main-header-area .cspt-right-box > .cspt-header-search-btn').length>0 ){
			if( jQuery('.cspt-navbar > div > .cspt-responsive-icons').length==0 ){
				jQuery('.cspt-navbar > div').append("<div class='cspt-responsive-icons'></div>");
			}
			jQuery('.cspt-navbar > div > .cspt-responsive-icons').append('<div class="cspt-header-search-btn"></div>');
			jQuery('.cspt-navbar > div > .cspt-responsive-icons .cspt-header-search-btn').append( jQuery('.cspt-main-header-area .cspt-right-box > .cspt-header-search-btn').html() );
		}

		return false;
	}
}
/* ====================================== */
/* Cart page qty update
/* ====================================== */
function creativesplanet_wc_cart_page_qty_update(){
	jQuery( document ).ajaxComplete(function() {
		if( jQuery('.product-quantity .quantity input.input-text.qty').length > 0 && jQuery('.cspt-cart-wrapper .cspt-cart-details span.cspt-cart-count').length > 0 ){
			var total_qty = 0;
			jQuery('.product-quantity .quantity input.input-text.qty').each( function(){
				total_qty = total_qty + parseInt(jQuery(this).val());
				jQuery('.cspt-cart-wrapper .cspt-cart-details span.cspt-cart-count').text(total_qty);
			});
			jQuery('.cspt-cart-wrapper span.woocommerce-Price-amount').html(jQuery('.cart_totals .woocommerce-Price-amount > bdi').html());
		}
	});
}

var cspt_preloader = function() {
	jQuery(".cspt-preloader").fadeOut('600');
}

var cspt_search_results = function() {
	if( jQuery('.cspt-search-results-main-wrapper').length > 0 && jQuery('.cspt-search-result-tab-links').length > 0 ){
		jQuery('.cspt-search-results-main-wrapper').skeletabs();
	}
	if( jQuery('.cspt-search-results-main-wrapper').length > 0 ){
		jQuery('body').addClass('cspt-search-results-loaded');
	}
}

var cspt_sorting = function() {
	jQuery('.cspt-sortable-yes').each(function(){
		var boxes	= jQuery('.cspt-element-posts-wrapper', this );
		var links	= jQuery('.cspt-sortable-list a', this );			
		boxes.isotope({
			animationEngine : 'best-available'
		});
		links.on('click', function(e){
			var selector = jQuery(this).data('sortby');
			if( selector != '*' ){
				var selector = '.' + selector;
			}
			boxes.isotope({
				filter			: selector,
				itemSelector	: '.cspt-ele',
				layoutMode		: 'fitRows'
			});
			links.removeClass('cspt-selected');
			jQuery(this).addClass('cspt-selected');
			e.preventDefault();
		});
	});
}

var cspt_back_to_top = function() {
	// scroll-to-top
	var btn = jQuery('.scroll-to-top');
	jQuery(window).scroll(function() {
	if (jQuery(window).scrollTop() > 300) {
		btn.addClass('show');
	} else {
		btn.removeClass('show');
	}
	});
	btn.on('click', function(e) {
	e.preventDefault();
	jQuery('html, body').animate({scrollTop:0}, '300');
	});
}

var cspt_navbar = function() {
	if( !jQuery('ul#cspt-top-menu > li > a[href="#"]').cspt_is_bound('click') ) {
		jQuery('ul#cspt-top-menu > li > a[href="#"]').click(function(){ return false; });
	}
	jQuery('.cspt-navbar > div > ul li:has(ul)').append("<span class='sub-menu-toggle'><i class='cspt-base-icon-down-open-big'></i></span>");
	jQuery('.cspt-navbar li').hover(function() {	
		if(jQuery(this).children("ul").length == 1) {
			var parent		= jQuery(this);
			var child_menu	= jQuery(this).children("ul");
			if( jQuery(parent).offset().left + jQuery(parent).width() + jQuery(child_menu).width() > jQuery(window).width() ){
				jQuery(child_menu).addClass('cspt-nav-left');
			} else {
				jQuery(child_menu).removeClass('cspt-nav-left');
			}
		}
	});
	jQuery('.sub-menu-toggle').on( 'click', function() {
		if(jQuery(this).siblings('.sub-menu, .children').hasClass('show')){
			jQuery(this).siblings('.sub-menu, .children').removeClass('show');
			jQuery( 'i', jQuery(this) ).removeClass('cspt-base-icon-up-open-big').addClass('cspt-base-icon-down-open-big');
		} else {
			jQuery(this).siblings('.sub-menu, .children').addClass('show');
			jQuery( 'i', jQuery(this) ).removeClass('cspt-base-icon-down-open-big').addClass('cspt-base-icon-up-open-big');
		}
		return false;
	});
	jQuery('.cspt-navbar ul.menu > li > a').on( 'click', function() {
		if( jQuery(this).attr('href')=='#' && jQuery(this).siblings('ul.sub-menu, ul.children').length>0 ){
			jQuery(this).siblings('.sub-menu-toggle').trigger('click');
			return false;
		}
	});
}

var cspt_lightbox = function() {
	var i_type = 'image';
	jQuery('a.cspt-lightbox, a.cspt-lightbox-video, .cspt-lightbox-video a, .cspt-lightbox a').each(function(){
		if( jQuery(this).hasClass('cspt-lightbox-video') || jQuery(this).closest('.elementor-element').hasClass('cspt-lightbox-video') ){
			i_type = 'iframe';
		} else {
			i_type = 'image';
		}
		if( jQuery(this).closest('.cspt-ele-portfolio').length == 0 ){
			jQuery(this).magnificPopup({type:i_type});
		}
	});
}

var cspt_video_popup = function() {
	jQuery('.cspt-popup').on('click', function(event) {
		event.preventDefault();
		var href  = jQuery(this).attr('href');
		var title = jQuery(this).attr('title');
		window.open( href , title, "width=600,height=500");
	});
}

var cspt_testimonial = function() {
	jQuery('.cspt-testimonial-active').each(function(){
		var ele_parent = jQuery(this).closest('.cspt-element-posts-wrapper');
		jQuery('.creativesplanet-ele.creativesplanet-ele-testimonial', ele_parent ).on('mouseover', function() {
			jQuery('.creativesplanet-ele.creativesplanet-ele-testimonial', ele_parent ).removeClass('cspt-testimonial-active');
			jQuery(this).addClass('cspt-testimonial-active');
		});
	});
}

var cspt_search_btn = function(){
	jQuery(function() {
		jQuery('.cspt-header-search-btn').on("click", function(event) {
			event.preventDefault();
			jQuery(".cspt-header-search-form-wrapper").addClass("open");
			jQuery('.cspt-header-search-form-wrapper input[type="search"]').focus();
		});
		jQuery(".cspt-search-close").on("click keyup", function(event) {
			jQuery(".cspt-header-search-form-wrapper").removeClass("open");
		});
	});
}

var cspt_gallery = function(){
	jQuery("div.cspt-gallery").each(function(){
		jQuery( this ).lightSlider({ item: 1, auto: true, loop: true, controls: false, speed: 1500, pause: 5500 }); 
	});
}

var cspt_selectwrap = function(){
	jQuery("select:not(#rating)").each(function(){
		jQuery( this ).wrap( "<div class='cspt-select'></div>" );
	});
}

/* ====================================== */
/* Circle Progress bar
/* ====================================== */
var cspt_circle_progressbar = function() {

	jQuery('.cspt-circle-outer').each(function(){

		var this_circle = jQuery(this);

		// Circle settings
		var emptyFill_val = "rgba(0, 0, 0, 0)";
		var thickness_val = 10;
		var fill_val      = this_circle.data('fill');
		var size_val      = 130;

		if( typeof this_circle.data('emptyfill') !== 'undefined' && this_circle.data('emptyfill')!='' ){
			emptyFill_val = this_circle.data('emptyfill');
		}
		if( typeof this_circle.data('thickness') !== 'undefined' && this_circle.data('thickness')!='' ){
			thickness_val = this_circle.data('thickness');
		}
		if( typeof this_circle.data('size') !== 'undefined' && this_circle.data('size')!='' ){
			size_val = this_circle.data('size');
		}
		if( typeof this_circle.data('filltype') !== 'undefined' && this_circle.data('filltype')=='gradient' ){
			fill_val = {gradient: [ this_circle.data('gradient1') , this_circle.data('gradient2') ], gradientAngle: Math.PI / 4 };
		}

		if( typeof jQuery.fn.circleProgress == "function" ){
			var digit   = this_circle.data('digit');
			var before  = this_circle.data('before');
			var after   = this_circle.data('after');
			var digit       = Number( digit );
			var short_digit = ( digit/100 ); 

			jQuery('.cspt-circle', this_circle ).circleProgress({
				value		: 0,
				size		: size_val,
				startAngle	: -Math.PI / 4 * 2,
				thickness	: thickness_val,
				emptyFill	: emptyFill_val,
				fill		: fill_val
			}).on('circle-animation-progress', function(event, progress, stepValue) { // Rotate number when animating
				this_circle.find('.cspt-circle-number').html( before + Math.round( stepValue*100 ) + after );
			});
		}

		this_circle.waypoint(function(direction) {
			if( !this_circle.hasClass('completed') ){
				// Re draw when view
				if( typeof jQuery.fn.circleProgress == "function" ){
					jQuery('.cspt-circle', this_circle ).circleProgress( { value: short_digit } );
				};
				this_circle.addClass('completed');
			}
		}, { offset:'85%' });

	});
}

/* ====================================== */
/* Carousel
/* ====================================== */
var cspt_carousel = function() {

	jQuery(".creativesplanet-element-viewtype-carousel").each(function() {

		var carouselElement = jQuery( this );

		jQuery('.cspt-ele' , carouselElement).removeClass( function (index, className) {
			return (className.match (/(^|\s)col-md-\S+/g) || []).join(' ');
		}).removeClass( function (index, className) {
			return (className.match (/(^|\s)col-lg-\S+/g) || []).join(' ');
		});

		var columns = jQuery( this ).data('columns');
		var loop = jQuery( this ).data('loop');

		if( columns == '1' ){
			var responsive_items = [ /* 1199 : */ '1', /* 991 : */ '1', /* 767 : */ '1', /* 575 : */ '1', /* 0 : */ '1' ];
		} else if( columns == '2' ){
			var responsive_items = [ /* 1199 : */ '2', /* 991 : */ '2', /* 767 : */ '2', /* 575 : */ '2', /* 0 : */ '1' ];
		} else if( columns == '3' ){
			var responsive_items = [ /* 1199 : */ '3', /* 991 : */ '2', /* 767 : */ '2', /* 575 : */ '2', /* 0 : */ '1' ];
		} else if( columns == '4' ){
			var responsive_items = [ /* 1199 : */ '4', /* 991 : */ '4', /* 767 : */ '3', /* 575 : */ '2', /* 0 : */ '1' ];
		} else if( columns == '5' ){
			var responsive_items = [ /* 1199 : */ '5', /* 991 : */ '4', /* 767 : */ '3', /* 575 : */ '2', /* 0 : */ '1' ];
		} else if( columns == '6' ){
			var responsive_items = [ /* 1199 : */ '6', /* 991 : */ '4', /* 767 : */ '3', /* 575 : */ '2', /* 0 : */ '1' ];
		} else {
			var responsive_items = [ /* 1199 : */ '3', /* 991 : */ '3', /* 767 : */ '3', /* 575 : */ '2', /* 0 : */ '1' ];
		}

		var margin_val = 30;
		if( jQuery(carouselElement).data('margin')!='' ){
			margin_val = jQuery(carouselElement).data('margin');
		}

		var posts_wrapper_class = '.cspt-element-posts-wrapper';

		var val_nav = jQuery(carouselElement).data('nav');
		if( val_nav=='above' ){
			val_nav = false;
		}

		var car_options = {
			loop			: jQuery(carouselElement).data('loop'),
			autoplay		: jQuery(carouselElement).data('autoplay'),
			center			: jQuery(carouselElement).data('center'),
			nav				: val_nav,
			dots			: jQuery(carouselElement).data('dots'),
			autoplaySpeed	: jQuery(carouselElement).data('autoplayspeed'),
			autoplayTimeout	: jQuery(carouselElement).data('autoplayspeed') + 5000,
			navSpeed		: jQuery(carouselElement).data('autoplayspeed'),
			dotsSpeed		: jQuery(carouselElement).data('autoplayspeed'),
			dragEndSpeed	: jQuery(carouselElement).data('autoplayspeed'),
			margin			: 30,
			items			: columns,
			responsiveClass	: true,
			responsive		: {
				1199 : {
					items	: responsive_items[0],
				},
				991	 : {
					items	: responsive_items[1],
				},
				767	 : {
					items	: responsive_items[2],
				},
				575	 : {
					items	: responsive_items[3],
				},
				0	 : {
					items	: responsive_items[4],
				}
			}
		};

		// gap - margin
		if( typeof margin_val == "string" && margin_val!='' ){
			margin_val = margin_val.replace( 'px', '');
			margin_val = parseInt(margin_val);
			car_options['margin'] = margin_val;
		}

		if( jQuery(carouselElement).hasClass('cspt-element-static-box-style-3') ){
			car_options['item']	= '1';
			car_options['animateIn']	= 'fadeIn';
			car_options['animateOut']	= 'fadeOut';
			car_options['mouseDrag']	= false,
			car_options['touchDrag']	= false,
			car_options['pullDrag']		= false,
			car_options['freeDrag']		= false,
			car_options['responsive']	= {};
		}

		// apply carousel effect with options
		var cspt_owl = jQuery( posts_wrapper_class, carouselElement).removeClass('row multi-columns-row').addClass('owl-carousel').owlCarousel( car_options );

		jQuery('.cspt-carousel-prev', carouselElement).click(function(event) {
			event.preventDefault();
			cspt_owl.trigger('prev.owl.carousel', [jQuery(carouselElement).data('autoplayspeed')]);

		});
		jQuery('.cspt-carousel-next', carouselElement).click(function(event) {
			event.preventDefault();
			cspt_owl.trigger('next.owl.carousel', [jQuery(carouselElement).data('autoplayspeed')]);
		});

	});
};

/* ====================================== */
/* Menu item count
/* ====================================== */
var cspt_menu_count = function() {
	if( jQuery('ul#cspt-top-menu > li').length>0 || jQuery('div#cspt-top-menu > ul > li').length>0 ){
		if( jQuery('ul#cspt-top-menu > li').length>0 ){
			var total_li = jQuery( 'ul#cspt-top-menu > li' ).length;
		}
		if( jQuery('div#cspt-top-menu > ul > li').length>0 ){
			var total_li = jQuery( 'div#cspt-top-menu > ul > li' ).length;
		}
		if( total_li > 6 ){
			jQuery('#site-navigation').addClass('cspt-bigger-menu');
		}
	}
}

/* ====================================== */
/* Animate on scroll : Number rotator
/* ====================================== */
var cspt_number_rotate = function() {
	jQuery(".cspt-number-rotate").each(function() {
		var self      = jQuery(this);
		var delay     = (self.data("appear-animation-delay") ? self.data("appear-animation-delay") : 0);
		var animation = self.data("appear-animation");

		self.html('0');
		self.waypoint(function(direction) {
			if( !self.hasClass('completed') ){
				var from     = self.data('from');
				var to       = self.data('to');
				var interval = self.data('interval');
				self.numinate({
					format: '%counter%',
					from: from,
					to: to,
					runningInterval: 2000,
					stepUnit: interval,
					onComplete: function(elem) {
						self.addClass('completed');
					}
				});
			}
		}, { offset:'85%' });
	});
};

/* ====================================== */
/* Image size correction
/* ====================================== */
var cspt_img_size_correction = function() {
	setTimeout(function(){
		jQuery("img").each(function() {
			var thisimg = jQuery( this );
			var p_width = jQuery( this ).parent().width();
			var width   = jQuery( this ).attr('width');
			var height  = jQuery( this ).attr('height');
			if( (typeof width !== typeof undefined && width !== false) && (typeof height !== typeof undefined && height !== false) ){
				var ratio  = height/width;
				jQuery( this ).data('cspt-ratio', ratio);
				var real_width = jQuery( this ).width();
				var new_height = Math.round(real_width * ratio);
			}
		});
	}, 100);
};

/* ====================================== */
/* Tabs
/* ====================================== */
var cspt_tabs_element = function() {
	var tab_number = '';
	jQuery('.cspt-tab-link').on('click', function(){
		if( !jQuery(this).hasClass('cspt-tab-li-active') ){
			var parent = jQuery(this).closest('ul.cspt-tabs-heading');
			jQuery( 'li', parent).each(function(){
				jQuery(this).removeClass('cspt-tab-li-active')
			});
			jQuery(this).addClass('cspt-tab-li-active');
			tab_number = jQuery( this ).data('cspt-tab');
			jQuery(this).parent().parent().find('.cspt-tab-content').removeClass('cspt-tab-active');
			jQuery(this).parent().parent().find('.cspt-tab-content-'+tab_number).addClass('cspt-tab-active');
		}
	});
	jQuery('.cspt-tab-content-title').on('click', function(){
		tab_number = jQuery( this ).data('cspt-tab');
		jQuery( this ).closest('.cspt-tabs').find('li.cspt-tab-link[data-cspt-tab="'+tab_number+'"]',  ).trigger('click');
	});
};

var cspt_infinite_scroll = function() {
	if( jQuery('.cspt-infinite-scroll-yes').length>0 ){
		jQuery('.cspt-infinite-scroll-yes').each(function(){

			var main_ele	= jQuery(this);
			var style		= jQuery(this).data('style');
			var cpt			= jQuery(this).data('cpt');
			var columns		= jQuery(this).data('columns');
			var show		= jQuery(this).data('show');
			var totalpagination	= jQuery(this).data('totalpagination');

			var infinitre_scroll_data = jQuery( '.cspt-infinite-scroll-data', main_ele ).html();
			if( infinitre_scroll_data!='' ){
				var url_attributes = '';
				jQuery.each( jQuery.parseJSON(infinitre_scroll_data), function(key, value){
					url_attributes = url_attributes + '&'+key+'='+value;
				});
			}

			if( jQuery(this).hasClass('cspt-infinite-scroll-button-yes') ){
				var x = 2;

				// init Masonry
				let $grid = jQuery('.cspt-element-posts-wrapper', main_ele).masonry({
					itemSelector	: 'none', // select none at first
					columnWidth		: '.cspt-ele',
					gutter			: 0,
					percentPosition	: true,
					stagger			: 30,
					// nicer reveal transition
					visibleStyle	: { transform: 'translateY(0)', opacity: 1 },
					hiddenStyle		: { transform: 'translateY(100px)', opacity: 0 },
				});

				// get Masonry instance
				let msnry = $grid.data('masonry');

				// initial items reveal
				$grid.imagesLoaded( function() {
					$grid.removeClass('are-images-unloaded');
					$grid.masonry( 'option', { itemSelector: '.cspt-ele' });
					let $items = $grid.find('.cspt-ele');
					$grid.masonry( 'appended', $items );
				});

				// init Infinte Scroll
				$grid.infiniteScroll({
					// options
					path			: cspt_js_variables.ajaxurl + '?action=cspt_infinite_scroll&page_no={{#}}&nonce='+cspt_js_variables.ajaxnonce + url_attributes,
					checkLastPage	: false,
					button			: '.cspt-ajax-load-more-btn > a',
					scrollThreshold	: false,
					status			: '.cspt-infinite-loader',  // disable loading on scroll
					append			: '.cspt-ele',
					history			: false,
					visibleStyle	: { transform: 'translateY(0)', opacity: 1 },
					outlayer		: msnry,
				});
				$grid.on( 'append.infiniteScroll', function( event, body, path, items, response ) {
					jQuery(items).each(function(){
						jQuery(this).addClass('cspt-infinite-scroll-animation');
					});

					if( x >= totalpagination ){
						jQuery('.cspt-ajax-load-more-btn > a', main_ele).hide();
						jQuery('.cspt-infinite-loader', main_ele).addClass('cspt-infinite-loader-hide');
						jQuery('.cspt-infinite-scroll-last', main_ele).show();
					}
					x++;
				});

			} else {

				// infinite scroll without button

				// hide load more button
				var x = 2;
				if( x >= totalpagination ){ jQuery('.cspt-ajax-load-more-btn > a', main_ele).hide(); } // hide button on page load if lower post found

				//-------------------------------------//
				// init Masonry

				let $grid = jQuery('.cspt-element-posts-wrapper', main_ele).masonry({
					itemSelector: 'none', // select none at first
					columnWidth: '.cspt-ele',
					gutter: 0,
					percentPosition: true,
					stagger: 30,
					// nicer reveal transition
					visibleStyle: { transform: 'translateY(0)', opacity: 1 },
					hiddenStyle: { transform: 'translateY(100px)', opacity: 0 },
				});

				// get Masonry instance
				let msnry = $grid.data('masonry');

				// initial items reveal
				$grid.imagesLoaded( function() {
					$grid.removeClass('are-images-unloaded');
					$grid.masonry( 'option', { itemSelector: '.cspt-ele' });
					let $items = $grid.find('.cspt-ele');
					$grid.masonry( 'appended', $items );
				});

				//-------------------------------------//
				// init Infinte Scroll

				$grid.infiniteScroll({
					path		: cspt_js_variables.ajaxurl + '?action=cspt_infinite_scroll&page_no={{#}}&nonce='+cspt_js_variables.ajaxnonce + url_attributes,
					append		: '.cspt-ele',
					outlayer	: msnry,
					status		: '.cspt-infinite-loader',
					history			: false,
					scrollThreshold: -200,
				});

				$grid.on( 'append.infiniteScroll', function( event, body, path, items, response ) {
					if( x >= totalpagination ){
						jQuery('.cspt-infinite-loader', main_ele).addClass('cspt-infinite-loader-hide');
						jQuery('.cspt-infinite-scroll-last', main_ele).show();
					}
					x++;
				});

			}

		});

	}
}

var cspt_progressbar = function() {
	jQuery('.cspt-progressbar').each(function(){
		var $progressbar_ele = jQuery(this);
		jQuery(this).waypoint(function(direction) {
			var $progressbar = jQuery( '.elementor-progress-bar', $progressbar_ele );
			if( !$progressbar.hasClass('completed') ){
				$progressbar.css('width', $progressbar.data('max') + '%').addClass('completed');
			}
		}, { offset:'99%' });
	});
}

var cspt_icon_box_hover_effect = function() {

	jQuery( ".cspt-icon-box-hover-effect .elementor-element.elementor-widget-cspt_icon_heading" ).mouseover(function() {
		var main_row = jQuery( this ).closest( '.cspt-icon-box-hover-effect' );
		jQuery('.elementor-element.elementor-widget-cspt_icon_heading', main_row).removeClass('cspt-ihbox-hover-active');
		jQuery(this).addClass('cspt-ihbox-hover-active');
		});

}

var cspt_multi_icon_box_hover_effect = function() {
	jQuery( ".cspt-multi-icon-box-hover-effect .cspt-miconheading-style-7:nth-child(2)" ).addClass('cspt-mihbox-hover-active');
	jQuery( ".cspt-multi-icon-box-hover-effect .cspt-miconheading-style-7" ).mouseover(function() {
		var main_row = jQuery( this ).closest( '.cspt-multi-icon-box-hover-effect' );
		jQuery('.cspt-miconheading-style-7', main_row).removeClass('cspt-mihbox-hover-active');
		jQuery(this).addClass('cspt-mihbox-hover-active');
	}).mouseout(function() {
		var main_row = jQuery( this ).closest( '.cspt-multi-icon-box-hover-effect' );
		jQuery('.cspt-miconheading-style-7', main_row).removeClass('cspt-mihbox-hover-active');
		jQuery('.cspt-miconheading-style-7:nth-child(2)', main_row).addClass('cspt-mihbox-hover-active');
	});

}
/* ====================================== */
/* Comment form validator
/* ====================================== */
var cspt_validate = function() {
	jQuery("#commentform").submit( function( event ){
		var error = false;
		jQuery('.cspt-form-error').hide();
		if( jQuery("#author").length > 0 && ! jQuery("#author").val() ){  // empty author
			jQuery('.comment-form-author .cspt-form-error').show();
			error = true;
		}
		if( jQuery("#comment").length > 0 && ! jQuery("#comment").val() ){  // empty comment
			jQuery('.comment-form-comment .cspt-form-error').show();
			error = true;
		}
		if( jQuery("#email").length > 0 ) {
			if( ! jQuery("#email").val() ){ // empty email
				jQuery('.comment-form-email .cspt-form-error.cspt-empty-email').show();
				error = true;
			} else {
				var valid_email = (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test( jQuery("#email").val() ));
				if( valid_email != true ){
					jQuery('.comment-form-email .cspt-form-error.cspt-invalid-email').show();
					error = true;
				}
			}
		}
		if( error == true ){
			event.preventDefault();
			return false;
		} else {
			return true;
		}
	});
}

/*----  Events  ----*/

// On resize
jQuery(window).resize(function(){
	/* Image size correction */
	cspt_img_size_correction();
});

// on ready
jQuery(document).ready(function(){
	cspt_validate();
	cspt_search_results();
	cspt_toggleSidebar();
	cspt_tabs_element();
	cspt_multi_icon_box_hover_effect();
	cspt_icon_box_hover_effect();
	cspt_sorting();
	cspt_back_to_top();
	cspt_sticky_header();
	cspt_navbar();
	cspt_lightbox();
	cspt_video_popup();
	cspt_testimonial();
	cspt_search_btn();
	cspt_selectwrap();
	cspt_menu_count();
	setTimeout(function(){ cspt_carousel(); }, 500);
	cspt_img_size_correction();
	cspt_number_rotate();
	cspt_sticky_header_class();
	cspt_progressbar();
	// Update cart total on cart page
	creativesplanet_wc_cart_page_qty_update();
});	

// on load
jQuery(window).load(function(){
	cspt_preloader();
	cspt_sorting();
	cspt_gallery();
	cspt_circle_progressbar();
	cspt_infinite_scroll();
});
