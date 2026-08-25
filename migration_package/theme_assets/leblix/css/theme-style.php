<?php
// Getting all options with values
$all_data = cspt_get_all_option_array();

$gradient_first = '#ffff00';
$gradient_last  = '#ffff00';
$responsive_breakpoint	= '1200';
$preheader_responsive	= '1200';
if( function_exists('cspt_get_base_option') ){
	$gradient_colors = cspt_get_base_option('gradient-color');
	$gradient_first  = ( !empty($gradient_colors['first']) ) ? $gradient_colors['first'] : '#ffff00' ;
	$gradient_last   = ( !empty($gradient_colors['last'])  ) ? $gradient_colors['last']  : '#ffff00' ;

	$responsive_breakpoint	= cspt_get_base_option('responsive-breakpoint');
	$preheader_responsive	= cspt_get_base_option('preheader-responsive');
	$service_single_image_hide = cspt_get_base_option('service-single-image-hide');
}

// new code start here
$new_all_data = array();
foreach( $all_data as $key=>$val ){
	$key            = str_replace( '_', '-', $key );
	$key            = str_replace( '_', '-', $key );
	$key            = str_replace( '_', '-', $key );
	$key            = str_replace( '_', '-', $key );
	$key            = str_replace( '_', '-', $key );
	$new_all_data[$key] = $val;
}

// allowed to create css variables
$allowed = array(
	'global-color',
	'secondary-color',
	'gradient-color',
	'white-color',
	'blackish-color',
	'light-bg-color',
	'blackish-bg-color',
	'header-height',
	'sticky-header-height',
	'responsive-breakpoint',
	'main-menu-typography',
	'main-menu-sticky-color',
	'preheader-bgcolor-custom',
	'header-background-color',
	'menu-background-color',
	'sticky-header-background-color',
	'link-color',
	'header-height',
	'logo-height',
	'responsive-logo-height',
	'titlebar-height',
	'sticky-logo-height',
	'light-bg-color',
	'footer-1-col-width',
	'footer-2-col-width',
	'footer-3-col-width',
	'footer-4-col-width',
	'subheading-typography',
);
?>

:root {
<?php
foreach( $new_all_data as $key=>$val ){

	if( in_array( $key, array( 'sticky-logo-height', 'responsive-logo-height', 'header-height', 'sticky-header-height', 'logo-height', 'responsive-logo-height', 'responsive-breakpoint', 'titlebar-height' ) ) ){
		$val .= 'px';
	}
	if( in_array( $key, array( 'footer-1-col-width', 'footer-2-col-width', 'footer-3-col-width', 'footer-4-col-width' ) ) ){
		$val .= '%';
	}

	if( in_array( $key, $allowed ) ){
		if( is_array($val) ){
			foreach( $val as $val_key=>$val_val ){
				if( !empty($val_val) ){
				?>
	--cspt-leblix-<?php echo esc_attr($key); ?>-<?php echo esc_attr($val_key); ?>: <?php echo esc_attr($val_val); ?>;
<?php
				}

			}
		} else {
		?>
	--cspt-leblix-<?php echo esc_attr($key); ?>: <?php echo esc_attr($val) ?>;
<?php

		}
	}
}

// value is color for the option
$colors = array(
	'global-color',
	'secondary-color',
	'white-color',
	'blackish-color',
	'light-bg-color',
	'blackish-bg-color',
	'main-menu-typography',
);

foreach( $new_all_data as $key=>$val ){
	if( in_array( $key, $colors ) ){
		if( is_array($val) && isset($val['color']) ){
			$key .= '-color';
			$val = $val['color'];
		}
		?>
	--cspt-leblix-<?php echo esc_attr($key); ?>-rgb: <?php echo esc_attr( cspt_hex2rgb_code($val) ) ?>;
<?php
	}
}
?>

} /* CSS :root ends here */

<?php echo cspt_all_options_values('background'); ?>
<?php echo cspt_all_options_values('typography'); ?>

/* --------------------------------------
 * Common header bg
 * ---------------------------------------*/

.site-header .cspt-sticky-header.cspt-sticky-bg-color-globalcolor{
	background-color: var(--cspt-leblix-global-color);
}
.site-header .cspt-sticky-header.cspt-sticky-bg-color-secondarycolor{
	background-color: var(--cspt-leblix-secondary-color);
}
.site-header .cspt-sticky-header.cspt-sticky-bg-color-blackish{
	background-color: var(--cspt-leblix-blackish-bg-color);
}
.site-header .cspt-sticky-header.cspt-sticky-bg-color-white{
	background-color: var(--cspt-leblix-white-color);
}
.site-header .cspt-sticky-header.cspt-sticky-bg-color-light{
	background-color: var(--cspt-leblix-light-bg-color);
}

/* --------------------------------------
 * Custom background color and text color
 * ---------------------------------------*/
/* Custom preheader background color */
.cspt-pre-header-wrapper.cspt-bg-color-custom{
	background-color: var(--cspt-leblix-preheader-bgcolor-custom);
}
/* Custom Header background color */
.cspt-header-wrapper.cspt-bg-color-custom{
	background-color: var(--cspt-leblix-header-background-color);
}
/* Custom Menu area background color */
.cspt-header-menu-area.cspt-bg-color-custom{
	background-color: var(--cspt-leblix-menu-background-color);
}
/* sticky-header-background-color */
.site-header.cspt-fixed-header .cspt-sticky-bg-color-custom{
	background-color: var(--cspt-leblix-sticky-header-background-color);
}
/* Custom Menu text color */
body:not(.cspt-max-mega-menu-override) .cspt-sticky-header .cspt-navbar div > ul > li > a{
	color: var(--cspt-leblix-main-menu-sticky-color);
}
<?php if($service_single_image_hide==true) { ?>
/* Hide single image in service */

.single.single-cspt-service .cspt-service-single .cspt-service-feature-image img {
	display: none;
}

<?php }?>

/* --------------------------------------
 * A tag
 * ---------------------------------------*/
a{
	color: var(--cspt-leblix-link-color-normal);
}
a:hover{
	color: var(--cspt-leblix-link-color-hover);
}

/* --------------------------------------
 * site-title
 * ---------------------------------------*/
.site-title {
	height: var(--cspt-leblix-header-height);
}
.site-title img.cspt-main-logo{
	max-height: var(--cspt-leblix-logo-height);
}
.site-title img.cspt-responsive-logo{
	max-height: var(--cspt-leblix-responsive-logo-height);
}

/*=== Sticky logo ===*/
.site-header.cspt-fixed-header .site-title img.cspt-main-logo{
	max-height: var(--cspt-leblix-sticky-logo-height);
}

/* --------------------------------------
 * Global color
 * ---------------------------------------*/
.cspt-color-globalcolor,
.cspt-globalcolor,
.globalcolor{
	color: var(--cspt-leblix-global-color) ;
}

/* --------------------------------------
 * Global Color
 * ---------------------------------------*/
/*=== Global BG Color ===*/
.site-header .cspt-sticky-on.cspt-sticky-bg-color-globalcolor,
.site-header .cspt-bg-color-globalcolor,
.cspt-bg-color-globalcolor{
    background-color: var(--cspt-leblix-global-color);
}

/*=== Global Text Color ===*/
.cspt-globalcolor,
.cspt-skincolor{
   	color: var(--cspt-leblix-global-color);
}

/*=== Global Border Color ===*/
.post.sticky{
	border-color: var(--cspt-leblix-global-color);
}

/* --------------------------------------
 * Secondary Color
 * ---------------------------------------*/

/*=== Secondary BG Color ===*/
.cspt-bg-color-secondarycolor,
.cspt-bg-color-secondary{
	background-color: var(--cspt-leblix-secondary-color);   
}

/* --------------------------------------
 *  Gradient Color
 * ---------------------------------------*/

/*=== Gradient BG Color ===*/
.elementor-widget-button.cspt-btn-color-gradient .elementor-button,
.cspt-bg-color-gradient{
	background-image: -ms-linear-gradient(right, var(--cspt-leblix-gradient-color-first) 0%, var(--cspt-leblix-gradient-color-last) 100%);
	background-image: linear-gradient(to right, var(--cspt-leblix-gradient-color-first) , var(--cspt-leblix-gradient-color-last) );
}
.cspt-footer-section.cspt-bg-color-gradientcolor:before{
	background-image: -ms-linear-gradient(right, var(--cspt-leblix-gradient-color-first) 0%, var(--cspt-leblix-gradient-color-last) 100%) !important;
	background-image: linear-gradient(to right, var(--cspt-leblix-gradient-color-first) , var(--cspt-leblix-gradient-color-last) ) !important;
}
.elementor-widget-button.cspt-btn-color-gradient .elementor-button {	
	border-image-slice: 1;
	border-image-source: linear-gradient(to left, var(--cspt-leblix-gradient-color-first), var(--cspt-leblix-gradient-color-last));
}

/* --------------------------------------
 *  Light Color
 * ---------------------------------------*/
.cspt-btn-style-flat.cspt-btn-color-light .elementor-button,
.cspt-bg-color-light{
    background-color: var(--cspt-leblix-light-bg-color);
}

.cspt-btn-style-text.cspt-btn-color-light .elementor-button{
	color: var(--cspt-leblix-light-bg-color);
}
.cspt-btn-style-outline.cspt-btn-color-light .elementor-button{
	border-color: var(--cspt-leblix-light-bg-color);
	color: var(--cspt-leblix-light-bg-color);
}

/* --------------------------------------
 * Light color
 * ---------------------------------------*/
.widget.widget_search .search-form input[type="search"],
body.single.single-cspt-portfolio .site-content-contain,
body.single.single-cspt-team-member .site-content-contain,
body.single.cspt-sidebar-exists .site-content-contain {
	background-color: var(--cspt-leblix-white-color);
}

/* --------------------------------------
 * White color
 * ---------------------------------------*/
 .cspt-elementor-bg-color-globalcolor .cspt-btn-color-blackish .elementor-button:hover{
 	background-color:#fff;
}

/* --------------------------------------
 * Woocommerce
 * ---------------------------------------*/
.cspt-cart-wrapper.cspt-show-cart-amount-no .woocommerce-Price-amount.amount{
	display: none !important;
}

/* --------------------------------------
 * cspt-responsive-icons
 * ---------------------------------------*/
.cspt-responsive-icons{
	position: absolute;
	top: 30px;
	left: 20px;
	display: none;
}
.admin-bar .cspt-responsive-icons{
	top: 65px;
}
.cspt-responsive-icons > div{
	margin: 0 10px;
}
.cspt-responsive-icons > div:first-child{
	margin-left: 0;
}

.cspt-responsive-icons .cspt-cart-wrapper a {
	position: relative;
	padding-left: 30px;
}
.cspt-responsive-icons .cspt-cart-wrapper.cspt-show-cart-amount-no a {
	padding-left: 25px;
}
.cspt-responsive-icons .cspt-cart-wrapper a:before {
	content: "\e823";
	font-family: "creativesplanet-base-icons";
	font-size: 20px;
	line-height: 20px;
	position: absolute;
	left: 0;
	top: 50%;
	-webkit-transform: translateY(-50%);
	-ms-transform: translateY(-50%);
	-moz-transform: translateY(-50%);
	transform: translateY(-50%);
	font-weight: 400;
	-webkit-transition: all .25s ease-in-out;
	transition: all .25s ease-in-out;
}
.cspt-responsive-icons .cspt-cart-wrapper .cspt-cart-count {
	position: absolute;
	top: -21px;
	left: 2px;
	background-color: var(--cspt-leblix-global-color);
	color: #fff;
	height: 20px;
	line-height: 20px;
	width: 20px;
	text-align: center;
	border-radius: 50%;
	font-size: 13px;
}

/*====================================  End Dynamic color  ====================================*/

/* * * * *  MENU AND BREAKPOINT CSS  * * * * * */
/*====================================  Max Width for dynamic breakpoint  ====================================*/
@media (max-width: <?php echo esc_attr($responsive_breakpoint); ?>px){

	.cspt-header-top-area > .container{
		position: relative;
	}
	.site-header .cspt-sticky-header {
		display: none !important;
	}
	.cspt-header-info-inner,
	.something{
		display: none;
	}
	.navbar-expand-lg .navbar-nav{
		-ms-flex-direction: unset !important;
		flex-direction: unset !important;
	}
	.cspt-header-menu-area-inner,
	.cspt-navbar{
	    display: block !important;
	}
	.nav-menu-toggle{
	    display: block;
	    position: absolute;
	    right: 0px;
	    top: 50%;
	    -webkit-transform: translateY(-50%);
	    -ms-transform: translateY(-50%);
	    transform: translateY(-50%);
	    background-color: transparent;
	    padding: 0;
	    font-size: 35px;
	    line-height: 35px;
	    color: #2c2c2c;
	    width: 40px;
	}
	.cspt-navbar > div{
		background-color: #fff;
	}
	.sub-menu{
		display: none;
	}
	.cspt-header-menu-area-wrapper{
		min-height: auto !important;
	}
	.closepanel{
		position: absolute;
		z-index: 99;
		right: 24px;
		margin-left: -20px;
		top: 25px;
		display: block;
		width: 30px;
		height: 30px;
		line-height: 30px;
		border-radius: 50%;
		text-align: center;
		cursor: pointer;
		font-size: 10px;
		color: #fff;		
		border: 0;		
		background-color: rgb(111 111 111);
		-webkit-transition: all 300ms ease;
		transition: all 300ms ease;
	}
	.admin-bar .closepanel{
		top: 60px;
	}
	.closepanel:hover{
		background-color: var(--cspt-leblix-global-color);
		color: #fff;
	}

	/*=== Responsive menu ===*/

	.cspt-responsive-icons{
		display: flex;
	}
	.cspt-mobile-menu-bg{
		position: fixed;
		right: 0;
		top: 0;
		width: 0%;
		height: 100%;
		z-index: 99;
		background: rgba(0,0,0,0.90);
		-webkit-transform: translateX(101%);
		-ms-transform: translateX(101%);
		transform: translateX(101%);
		transition: all 900ms ease;
		-moz-transition: all 900ms ease;
		-webkit-transition: all 900ms ease;
		-ms-transition: all 900ms ease;
		-o-transition: all 900ms ease;
		-webkit-transition-delay: 300ms;
		-moz-transition-delay: 300ms;
		-ms-transition-delay: 300ms;
		-o-transition-delay: 300ms;
		transition-delay: 300ms;
	}
	.active .cspt-mobile-menu-bg{
		opacity: 1;
		width: 100%;
		visibility: visible;
		transition: all 900ms ease;
		-moz-transition: all 900ms ease;
		-webkit-transition: all 900ms ease;
		-ms-transition: all 900ms ease;
		-o-transition: all 900ms ease;
		-webkit-transform: translateX(0%);
		-ms-transform: translateX(0%);
		transform: translateX(0%);
	}
	.cspt-navbar > div {
	    background-color: #fff;
	    position: fixed;
		top: 0;
		right: -400px;
	    z-index: 1000;
	    width: 300px;
	    height: 100%;
	    padding: 0;
	    display: block;	    
		transition: all 900ms ease;
		-moz-transition: all 900ms ease;
		-webkit-transition: all 900ms ease;
		-ms-transition: all 900ms ease;
		-o-transition: all 900ms ease;
	    -webkit-transform: translateX(400px);
	    -ms-transform: translateX(400px);
	    transform: translateX(400px);
		opacity: 0;
	}
	.cspt-navbar > div.active {
		right: 0px;
	    -webkit-transform: translateX(0);
	    -ms-transform: translateX(0);
	    transform: translateX(0);
	    visibility: visible;
	    opacity: 1;
		overflow-y: scroll;
		-webkit-transition-delay: 600ms;
		-moz-transition-delay: 600ms;
		-ms-transition-delay: 600ms;
		-o-transition-delay: 600ms;
		transition-delay: 600ms;
		opacity: 1;
	}
	.cspt-navbar > div > ul{
		padding: 80px 0;
	}
	.admin-bar .cspt-navbar > div > ul{
		padding: 105px 0;
	}

	.cspt-navbar > div > ul li a {
	    color: #000 !important;
	    padding: 15px 25px;
	    height: auto;
	    display: inline-block;
	}
	.cspt-navbar > div > ul ul {
	    padding-left: 1em;
	    overflow: hidden;
	    display: none;
	}

	ul .sub-menu.show,
	ul .children.show {
	    display: block;
	}
	.cspt-navbar li{
		position: relative;
	}
	.cspt-navbar ul.menu > li:first-child{
		border-top: 1px solid rgba(0, 0, 0, 0.10);
	}
	.cspt-navbar ul.menu > li{
		border-bottom: 1px solid rgba(0, 0, 0, 0.10);
	}
	.sub-menu-toggle{
	    display: block;
	    position: absolute;
	    right: 25px;
	    top: 15px;
	    cursor: pointer;
	    color: rgba(0, 0, 0, 0.80);
		font-size: 12px;
	}
	.sub-menu-toggle i::before{
		font-weight: bold;
	}
	.cspt-navbar ul ul{
		background-color: transparent !important;
	}
	.cspt-mobile-search{
		display: block;
	}
	.cspt-mobile-search .cspt-header-search-btn{
		display: block;
		position: absolute;
		right: 45px;
		top: 50%;
		-webkit-transform: translateY(-50%);
		-ms-transform: translateY(-50%);
		transform: translateY(-50%);
	}

	/*=== Responsive Logo ===*/
	.cspt-responsive-logo-yes .cspt-sticky-logo,
	.cspt-responsive-logo-yes .cspt-main-logo{
		display: none;
	}
	.cspt-responsive-logo-yes .cspt-responsive-logo{
		display: inline-block;
	}

	

	/*=== Responsive header background color ===*/
	.cspt-responsive-header-bgcolor-globalcolor .cspt-header-wrapper{
		background-color: var(--cspt-leblix-global-color) !important;
	}
	.cspt-responsive-header-bgcolor-white .cspt-header-wrapper{
		background-color: #fff !important;
	}
	.cspt-responsive-header-bgcolor-blackish .cspt-header-wrapper{
		background-color: #222 !important;
	}
	.cspt-responsive-header-bgcolor-white{
		background-color: #fff !important;
	}
	.cspt-responsive-header-bgcolor-blackish{
		background-color: var(--cspt-leblix-blackish-color)!important;
	}
	.cspt-responsive-header-bgcolor-globalcolor{
		background-color: var(--cspt-leblix-global-color)!important;
	}

}
/*====================================  End Max Break Point  ====================================*/
/*====================================  Min Width for dynamic breakpoint  ====================================*/

@media (min-width: <?php echo esc_attr($responsive_breakpoint+1); ?>px){
	.site-header .cspt-sticky-header {
		position: fixed;
		opacity: 0;
		visibility: hidden;
		background: #fff;
		left: 0px;
		top: 0px;
		box-shadow: 0 10px 20px rgb(0 0 0 / 20%);
		width: 100%;
		z-index: 0;
		transition: all 200ms ease;
		-moz-transition: all 200ms ease;
		-webkit-transition: all 200ms ease;
		-ms-transition: all 200ms ease;
		-o-transition: all 200ms ease;
	}
	.site-header.cspt-fixed-header .cspt-sticky-header {
		z-index: 999;
		opacity: 1;
		visibility: visible;
		-ms-animation-name: fadeInDown;
		-moz-animation-name: fadeInDown;
		-op-animation-name: fadeInDown;
		-webkit-animation-name: fadeInDown;
		animation-name: fadeInDown;
		-ms-animation-duration: 300ms;
		-moz-animation-duration: 300ms;
		-op-animation-duration: 300ms;
		-webkit-animation-duration: 300ms;
		animation-duration: 300ms;
		-ms-animation-timing-function: linear;
		-moz-animation-timing-function: linear;
		-op-animation-timing-function: linear;
		-webkit-animation-timing-function: linear;
		animation-timing-function: linear;
		-ms-animation-iteration-count: 1;
		-moz-animation-iteration-count: 1;
		-op-animation-iteration-count: 1;
		-webkit-animation-iteration-count: 1;
		animation-iteration-count: 1;
	}	
	.admin-bar .site-header .cspt-sticky-header {
		top: 32px;
	}
	.cspt-responsive-logo{
		display: none;
	}
	.nav-menu-toggle,
	.something{
		display: none;
	}
	.cspt-sticky-on .site-title img.cspt-main-logo,
	.site-title img.cspt-sticky-logo{
		max-height: var(--cspt-leblix-sticky-logo-height);
	}

	body .cspt-navbar > div > ul > li,
	body .cspt-navbar > div > ul > li > a{
	    line-height: var(--cspt-leblix-header-height) !important;
	    height: var(--cspt-leblix-header-height) !important;
	}
	.cspt-sticky-header .cspt-navbar > div > ul > li,
	.cspt-sticky-header .cspt-navbar > div > ul > li > a,
	.cspt-sticky-header .site-title {
	    line-height: var(--cspt-leblix-sticky-header-height) !important;
	    height: var(--cspt-leblix-sticky-header-height) !important;
	}
	.cspt-navbar ul > li > ul > li.current-menu-item > a,
	.cspt-navbar ul > li > ul li.current_page_item > a,
	.cspt-navbar ul > li > ul li.current_page_ancestor > a,
	.cspt-navbar > div > ul > li:hover > a,
	.cspt-navbar > div > ul > li.current_page_item > a,
	.cspt-navbar > div > ul > li.current-menu-parent > a {
	   color: var(--cspt-leblix-global-color);
	}
	.cspt-navbar ul > li > ul li.current_page_item > a:before,
	.cspt-navbar ul > li > ul li.current_page_ancestor > a:before,
	.cspt-navbar ul > li > ul li.current_page_parent > a:before{
		 background-color: var(--cspt-leblix-global-color);
	}
	.cspt-navbar ul > li > ul li:hover > a {
	   color: #ffffff !important;
	}
	body:not(.cspt-max-mega-menu-override) .cspt-navbar > div > ul {
	   position: relative;
	   z-index: 597;
	}
	body:not(.cspt-max-mega-menu-override) .cspt-navbar > div > ul > li {
	   float: left;
	   min-height: 1px;
	   vertical-align: middle;
	   position: relative;
	}
	body:not(.cspt-max-mega-menu-override) .cspt-navbar > div > ul ul {
	   visibility: hidden;
	   position: absolute;
	   top: 100%;
	   left: 0;
	   z-index: 598;
	}
	.cspt-navbar ul > li:hover > ul{
		z-index: 600;
	}
	.cspt-navbar > div > ul li ul.cspt-nav-left{
	    left: inherit;
	    right: 0;		
	}
	body:not(.cspt-max-mega-menu-override) .cspt-navbar > div > ul li ul ul.cspt-nav-left{
	    left: -100%;
	    right: 0;
		-webkit-transition: none;
		transition: none;
	}	
	.cspt-navbar > div > ul ul li {
	   float: none;
	}
	body:not(.cspt-max-mega-menu-override) .cspt-navbar > div > ul ul ul {
	   top: 0;
	   left: 100%;
	   width: 190px;
	}
	.cspt-navbar > div > ul ul {
	  margin-top: 0;
	}
	.cspt-navbar > div > ul ul li {
	    font-weight: normal;
	}
	.cspt-navbar a {
	    display: block;
	    line-height: 1em;
	    text-decoration: none;
	}
	.cspt-navbar > div > ul ul li:hover > a{
		background-color: var(--cspt-leblix-global-color);
	}
	/* Custom CSS Styles */
	.cspt-navbar > ul {
	  *display: inline-block;
	}
	.cspt-navbar:after,
	.cspt-navbar ul:after {
	   content: '';
	   display: block;
	   clear: both;
	}
	.cspt-navbar ul {
	   text-transform: uppercase;
	}
	body:not(.cspt-max-mega-menu-override) .cspt-navbar ul ul {
		min-width: 270px;
		opacity: 0;
		visibility: hidden;
		-webkit-transition: all 0.3s linear 0s;
		transition: all 0.3s linear 0s;
		box-shadow: 0px 10px 40px rgba(0,0,0,0.20);
		border-top: 3px solid var(--cspt-leblix-global-color);
	}
	body:not(.cspt-max-mega-menu-override) .cspt-navbar ul > li:hover > ul {
	    visibility: visible;
	    opacity: 1;
	}
	.cspt-navbar ul > li > ul > li > a{
	   padding: 15px 30px;
	}
	body:not(.cspt-max-mega-menu-override) .cspt-navbar ul > li > ul > li:hover > a{
		padding-left: 40px;
	}
	body:not(.cspt-max-mega-menu-override) .cspt-navbar ul > li > ul > li > a:before {
	    position: absolute;
	    content: '';
	    left: 18px;
	    top: 24px;
	    width: 0px;
	    height: 2px;
	    background-color: transparent;
	    -webkit-transition: all .500s ease-in-out;
	    transition: all .500s ease-in-out;
	}
	body:not(.cspt-max-mega-menu-override) .cspt-navbar ul > li > ul > li:hover >a:before{
		background-color: rgba(255, 255, 255, 0.50);
		width: 10px;
	}
	.cspt-navbar ul ul a {
	   border-bottom: 1px solid rgba(0, 0, 0, 0.10);
	   border-top: 0 none;
	   line-height: 150%;
	   padding: 16px 20px;
	}
	.cspt-navbar ul ul ul {
	   border-top: 0 none;
	}
	.cspt-navbar ul ul li {
	   position: relative;
	}
	.cspt-navbar ul li.last ul {
	    left: auto;
	    right: 0;
	}
	.cspt-navbar ul li.last ul ul {
	   left: auto;
	   right: 99.5%;
	}
	body:not(.cspt-max-mega-menu-override) .cspt-navbar div > ul > li > a{
	    margin: 0 20px;
	}
	/* Dropdown Menu ( Globalcolor )*/
	.cspt-navbar.cspt-dropdown-active-color-globalcolor ul > li > ul > li.current-menu-item > a, 
	.cspt-navbar.cspt-dropdown-active-color-globalcolor ul > li > ul li.current_page_item > a, 
	.cspt-navbar.cspt-dropdown-active-color-globalcolor ul > li > ul li.current_page_ancestor > a,
	/* Main Menu ( Globalcolor )*/
	.cspt-navbar.cspt-main-active-color-globalcolor > div > ul > li:hover > a, 
	.cspt-navbar.cspt-main-active-color-globalcolor > div > ul > li.current_page_item > a, 
	.cspt-navbar.cspt-main-active-color-globalcolor > div > ul >li.current-menu-parent > a{
	    color: var(--cspt-leblix-global-color);
	}
	/* Dropdown Menu ( Secondarycolor )*/
	.cspt-navbar.cspt-dropdown-active-color-secondarycolor ul > li > ul > li.current-menu-item > a, 
	.cspt-navbar.cspt-dropdown-active-color-secondarycolor ul > li > ul li.current_page_item > a, 
	.cspt-navbar.cspt-dropdown-active-color-secondarycolor ul > li > ul li.current_page_ancestor > a,
	/* Main Menu ( Secondarycolor )*/
	.cspt-navbar.cspt-main-active-color-secondarycolor > div > ul > li:hover > a, 
	.cspt-navbar.cspt-main-active-color-secondarycolor > div > ul > li.current_page_item > a, 
	.cspt-navbar.cspt-main-active-color-secondarycolor > div > ul >li.current-menu-parent > a{
	    color: var(--cspt-leblix-secondary-color);
	}
	.cspt-header-menu-area .cspt-navbar div > ul > li,
	.cspt-header-menu-area .cspt-navbar div > ul > li > a,
	.cspt-header-menu-area{
		height: 62px;
		line-height: 62px !important;
	}
	.cspt-header-menu-area.cspt-sticky-on .cspt-navbar div > ul > li,
	.cspt-header-menu-area.cspt-sticky-on .cspt-navbar div > ul > li > a,
	.cspt-header-menu-area.cspt-sticky-on{
		height: 62px;
		line-height: 62px !important;
	}
	.cspt-header-menu-area{
	    position: relative;
	    z-index: 10;
	}                                 

}
/*====================================  End Min Break Point  ====================================*/

<?php if( !empty($preheader_responsive) ){ ?>
@media screen and (max-width: <?php echo esc_html($preheader_responsive); ?>px) {
	.cspt-pre-header-wrapper{
		display: none;
	}
}
<?php } ?>
<?php
$footer_column	= cspt_get_base_option('footer-column');
if( $footer_column=='custom' ) :
	$footer_column_1	= cspt_get_base_option('footer-1-col-width');
	$footer_column_2	= cspt_get_base_option('footer-2-col-width');
	$footer_column_3	= cspt_get_base_option('footer-3-col-width');
	$footer_column_4	= cspt_get_base_option('footer-4-col-width');
	?>
	@media screen and (min-width: 992px) {
		<?php if( !empty($footer_column_1) && $footer_column_1!='hide' ) : ?>
		.site-footer .cspt-footer-widget.cspt-footer-widget-col-1{
			-ms-flex: 0 0 var(--cspt-leblix-footer-1-col-width);
			flex: 0 0 var(--cspt-leblix-footer-1-col-width);
			max-width: var(--cspt-leblix-footer-1-col-width);
		}
		<?php endif; ?>
		<?php if( !empty($footer_column_2) && $footer_column_2!='hide' ) : ?>
		.site-footer .cspt-footer-widget.cspt-footer-widget-col-2{
			-ms-flex: 0 0 var(--cspt-leblix-footer-2-col-width);
			flex: 0 0 var(--cspt-leblix-footer-2-col-width);
			max-width: var(--cspt-leblix-footer-2-col-width);
		}
		<?php endif; ?>
		<?php if( !empty($footer_column_3) && $footer_column_3!='hide' ) : ?>
		.site-footer .cspt-footer-widget.cspt-footer-widget-col-3{
			-ms-flex: 0 0 var(--cspt-leblix-footer-3-col-width);
			flex: 0 0 var(--cspt-leblix-footer-3-col-width);
			max-width: var(--cspt-leblix-footer-3-col-width);
		}
		<?php endif; ?>
		<?php if( !empty($footer_column_4) && $footer_column_4!='hide' ) : ?>
		.site-footer .cspt-footer-widget.cspt-footer-widget-col-4{
			-ms-flex: 0 0 var(--cspt-leblix-footer-4-col-width);
			flex: 0 0 var(--cspt-leblix-footer-4-col-width);
			max-width: var(--cspt-leblix-footer-4-col-width);
		}
		<?php endif; ?>
	}
<?php endif; ?>
