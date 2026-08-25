<?php
/**
 * Leblix functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Leblix
 * @since 1.0
 */
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if( !function_exists('cspt_theme_setup') ){
function cspt_theme_setup() {

	/*
	 * Theme translation textdomain
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/leblix
	 */
	load_theme_textdomain( 'leblix', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Add WooCommerce support
	 */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'header-footer-elementor' );

	/*
	 *  Image size
	 */
	add_image_size( 'cspt-img-800x770', 800, 770, true ); // For Leblix Blog - style3 - Use
	add_image_size( 'cspt-img-600x800', 600, 800, true ); // For Leblix Portfolio Style 1 - Use
	add_image_size( 'cspt-img-1030x570', 1030, 570, true ); // For Leblix Portfolio Style 3 - Use
	add_image_size( 'cspt-img-600x700', 600, 700, true ); // For Leblix Service - style3 - Use
	add_image_size( 'cspt-img-770x635', 770, 635, true ); // For Leblix Blog - style2 - Use
	add_image_size( 'cspt-img-770x500', 770, 500, true ); // For Leblix Blog - style1 - Use
	add_image_size( 'cspt-img-770x9999', 770, 9999, false ); // For Client Logos  - Use	
	add_image_size( 'cspt-img-770x770', 770, 770, true ); //  - Use	
	add_image_size( 'cspt-img-300x300', 300, 300, true ); //  - Use	

	add_image_size( 'cspt-img-1200x600', 1200, 600, true ); //  - portfolio style1
	add_image_size( 'cspt-img-770x400', 770, 400, true ); //  - service style 1
	add_image_size( 'cspt-img-590x550', 590, 550, true ); // For Leblix Team  -style1 Use	
	add_image_size( 'cspt-img-800x256', 800, 256, true ); // For Optimize  - Free
	add_image_size( 'cspt-img-720x540', 720, 540, true ); // For Leblix services - style2 - Use
	add_image_size( 'cspt-img-560x350', 560, 350, true ); // For Leblix services - style3 - Use
	add_image_size( 'cspt-img-800x670', 800, 670, true ); // For Leblix portfolio - style2 - Use
	add_image_size( 'cspt-img-750x950', 750, 950, true ); // For Leblix portfolio - style3 - Use
	add_image_size( 'cspt-img-660x480', 660, 480, true ); // For Leblix portfolio - style3 - Use

	/*
	 *  Editor style  
	 */
	add_editor_style();

	// Set the default content width.
	$GLOBALS['content_width'] = 847;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'creativesplanet-top'		=> esc_attr__( 'Top Menu', 'leblix' ),
		'creativesplanet-footer'	=> esc_attr__( 'Footer Menu', 'leblix' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
		'status',
		'chat',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
}
add_action( 'after_setup_theme', 'cspt_theme_setup' );
/**
 * Favorites
 */
function cspt_elementor_add_to_fav(){
	$fav_added = get_user_meta( get_current_user_id(), 'cspt_add_to_fav', true );
	if( function_exists('is_user_logged_in') && is_user_logged_in() && $fav_added != 'yes' ){
		$data = get_user_meta( get_current_user_id(), 'wp_elementor_editor_user_favorites', true);
		if( is_string($data) ){
			$data = array();
		}
		if( !isset($data['widgets']) ){
			$data['widgets'] = array();
		}
		$existing_widgets = $data['widgets'];
		if( is_array($existing_widgets) ){
			$new_widgets = array(
				'cspt_blog_element',
				'cspt_client_element',
				'cspt_custom_heading',
				'cspt_fid_element',
				'cspt_gallery_element',
				'cspt_heading',
				'cspt_icon_heading',
				'cspt_multiple_icon_heading',
				'cspt_portfolio_element',
				'cspt_ptable_element',
				'cspt_service_element',
				'cspt_staticbox_element',
				'cspt_tabs_element',
				'cspt_team_element',
				'cspt_testimonial_element',
				'cspt_timeline_element',
			);
			if( !empty($existing_widgets) ){
				// Favorites is not empty
				$existing_widgets = array_merge($new_widgets, $existing_widgets );
			} else {
				// Favorites is empty
				$existing_widgets = $new_widgets;
			}
			$data['widgets'] = $existing_widgets;
			update_user_meta( get_current_user_id(), 'wp_elementor_editor_user_favorites', $data);
		}
		update_user_meta( get_current_user_id(), 'cspt_add_to_fav', 'yes' );
	}
}
add_action( 'init', 'cspt_elementor_add_to_fav' );
add_action( 'admin_init', 'cspt_elementor_add_to_fav' );

/* *** Kirki **** */
require_once get_template_directory().'/includes/kirki/kirki.php';

/* *** Envato Theme Setup Wizard settings **** */
require_once get_template_directory().'/setup/envato_setup_init.php';
// Please don't forgot to change filters tag.
// It must start from your theme's name.
add_filter('leblix_theme_setup_wizard_username', 'leblix_set_theme_setup_wizard_username', 10);
if( ! function_exists('leblix_set_theme_setup_wizard_username') ){
    function leblix_set_theme_setup_wizard_username($creativesplanet){
        return 'creativesplanet';
    }
}

add_filter('leblix_theme_setup_wizard_oauth_script', 'leblix_set_theme_setup_wizard_oauth_script', 10);
if( ! function_exists('leblix_set_theme_setup_wizard_oauth_script') ){
    function leblix_set_theme_setup_wizard_oauth_script($oauth_url){
        return 'https://creativesplanet.com/envato-api/server-script.php';
    }
}

if ( ! defined( 'leblix_theme_version' ) ) {
	define( 'leblix_theme_version', '1.0' );
}

if ( ! class_exists( 'leblix_Theme_Manager', false ) ) {
	// includes core theme manager class and default settings.
	require_once( get_template_directory() . '/theme_setup_class.php' );
}

if ( class_exists( 'leblix_Theme_Manager', false ) ) {

	class leblix_Theme_Manager_custom extends leblix_Theme_Manager {

		/**
		 * Holds the current instance of the theme manager
		 *
		 * @var leblix_Theme_Manager
		 */
		private static $instance = null;

		/**
		 * @return leblix_Theme_Manager
		 */
		public static function get_instance() {
			if ( ! self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}

		public function start(){

			add_filter('leblix_default_headers', array($this,'default_headers'));
			add_filter('leblix_custom_header_args', array($this,'leblix_custom_header_args'));
			add_filter('leblix_featured_image_options', array($this,'leblix_featured_image_options'));
			add_filter('leblix_page_options', array($this,'leblix_page_options'));
            add_filter('elementor/widget/render_content', array($this,'elementor_render_content'), 10, 2);

			parent::start();
		}

        public function elementor_render_content( $html, $widget ){
            $settings = $widget->get_settings();
            // this config option is set from theme.json and controlled through the elementor UI
            if(!empty($settings['slider_labels']) && $settings['slider_labels'] == 'labels'){
                // inject our labels into the HTML
                if( preg_match_all('#<figure class="slick-slide-inner">.*alt="([^"]*)".*</figure>#imsU', $html, $matches) ){
                    foreach($matches[0] as $key => $attachment){

                        $image_caption = $matches[1][$key];

                        $image_id = !empty($settings['carousel'][$key]['id']) ? $settings['carousel'][$key]['id'] : false;
                        if($image_id){
                            $image_data = get_post( $image_id );
                            if($image_data) {
                                $image_caption = $image_data->post_excerpt;
                                $image_description = $image_data->post_content;
                            }
                        }
                        $html = str_replace( $attachment, str_replace('<figure class="slick-slide-inner">', '<figure class="slick-slide-inner"><div class="leblix-slider-caption"><div class="inner-content-width"><div><h3>' . esc_html( $image_caption ) . '</h3><div>' . esc_html( $image_description ) . '</div></div></div></div>', $attachment), $html );
                    }
                }
            }
            return $html;
        }

		public function setup_background() {

			// Set up the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'leblix_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			) ) );
		}

		public function leblix_page_options($page_options){
			$page_options['title']['options']['show'] = 'Fancy Title';
			$page_options['title']['options']['normal'] = 'Normal Title';

			$page_options['background'] = array(
				'title'   => 'Page Background',
				'options' => array(
					'transparent' => 'Transparent',
					'normal' => 'Bordered',
				),
				'default' => 'transparent',
			);

			return $page_options;
		}

		public function setup_images() {
			parent::setup_images();
			add_image_size( 'leblix_gallery_square', 600, 600, true );
			add_image_size( 'leblix_wide_slider', 1500, 385, true );
			add_image_size( 'leblix_blog-large', 1500, 9999, false );
			set_post_thumbnail_size( 800, 410, true );
		}

		public function excerpt_length() {
			return 70;
		}

		public function leblix_featured_image_options($images){
			return array();
		}
		public function leblix_custom_header_args($headerargs){
		    $headerargs['default-image'] = get_template_directory_uri() . '/images/header2-top-lg.png';
		    return $headerargs;
        }
		public function default_headers($headers){
			$headers['header1'] = array(
				'url'           => '%s/images/header1-bottom-lg.png',
				'thumbnail_url'           => '%s/images/header1-bottom-lg.png',
				'description'   => esc_html__( 'Header', 'leblix' )
			);
			$headers['header2'] = array(
				'url'           => '%s/images/header2-top-lg.png',
				'thumbnail_url'           => '%s/images/header2-top-lg.png',
				'description'   => esc_html__( 'Header', 'leblix' )
			);
			$headers['header3'] = array(
				'url'           => '%s/images/header3-top-sml.png',
				'thumbnail_url'           => '%s/images/header3-top-sml.png',
				'description'   => esc_html__( 'Header', 'leblix' )
			);
			return $headers;
		}

		public function after_setup_theme(){

			parent::after_setup_theme();
		}

		public function leblix_blog_date(){
			if(get_post_type() == 'post') {
				?>
                <div class="blog_date">
                    <span class="day"><?php echo get_the_date( 'j' ); ?></span>
                    <span class="month"><?php echo get_the_date( 'M' ); ?></span>
                    <span class="year"><?php echo get_the_date( 'Y' ); ?></span>
                </div>
				<?php
			}
		}

	}

	require_once get_template_directory().'/setup/envato_setup_init.php';

	leblix_Theme_Manager_custom::get_instance()->start();
}
/* **** End of Envato Theme Setup Wizard ***** */

if( !function_exists('cspt_init_calls') ){
function cspt_init_calls() {
	include( get_template_directory() . '/includes/core.php' );
	// Meta boxes
	include( get_template_directory() . '/includes/meta-boxes.php' );
}
}
add_action( 'init', 'cspt_init_calls' );

// actions
include( get_template_directory() . '/includes/actions.php' );

// Advanced Custom Fields - Fonts Icon Picker
include( get_template_directory() . '/includes/acf/creativesplanet-acf-iconpicker/acf-cspt_fonticonpicker.php' );

/*
 *  Plugins
 */
require_once get_parent_theme_file_path( '/includes/class-tgm-plugin-activation.php' );
add_action( 'tgmpa_register', 'cspt_register_required_plugins' );
if( !function_exists('cspt_register_required_plugins') ){
function cspt_register_required_plugins() {
	$plugins = array(
		array(
			'name'					=> esc_attr('Slider Revolution'),
			'slug'					=> esc_attr('revslider'),
			'source'				=> get_template_directory() . '/includes/plugins/revslider.zip',
			'version'				=> esc_attr('6.6.20'),
		),
		array(
			'name'					=> esc_attr('Leblix Theme Addons'),
			'slug'					=> esc_attr('leblix-addons'),
			'source'				=> get_template_directory() . '/includes/plugins/leblix-addons.zip',
			'required'				=> true,
			'version'				=> esc_attr('1.9'),
		),
		array(
			'name'					=> esc_attr('Elementor Page Builder'),
			'slug'					=> esc_attr('elementor'),
			'required'				=> true,
		),
		array(
			'name'					=> esc_attr('Advanced Custom Fields'),
			'slug'					=> esc_attr('advanced-custom-fields'),
			'required'				=> true,
		),
		array(
			'name'					=> esc_attr('ACF Photo Gallery Field'),
			'slug'					=> esc_attr('navz-photo-gallery'),
			'required'				=> true,
		),
		array(
			'name'					=> esc_attr('Envato Market'),
			'slug'					=> esc_attr('envato-market'),
			'source'				=> get_template_directory() . '/includes/plugins/envato-market.zip',
		),
		array(
			'name'					=> esc_attr('Breadcrumb NavXT'),
			'slug'					=> esc_attr('breadcrumb-navxt'),
		),
		array(
			'name'					=> esc_attr('MailChimp for WordPress'),
			'slug'					=> esc_attr('mailchimp-for-wp'),
		),
		array(
			'name'					=> esc_attr('Contact Form 7'),
			'slug'					=> esc_attr('contact-form-7'),
		),
	);
	$config = array(
		'id'           => 'leblix',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}
}

/**
 *  Merlin Message
 */
if( !function_exists('cspt_merlin_message') ){
function cspt_merlin_message() {
	?>
	<div class="cspt-merlin-message-box notice is-dismissible">
		<div class="cspt-merlin-message">
			<div class="cspt-merlin-message-conform">
				<div class="cspt-merlin-message-conform-inner">
					<div class="cspt-merlin-message-conform-i">
						<div class="cspt-merlin-message-conform-col cspt-merlin-message-conform-img">
							<img src="<?php echo get_template_directory_uri() ?>/includes/images/merlin-message.png" />
						</div>
						<div class="cspt-merlin-message-conform-col cspt-merlin-message-conform-text">
							<h3><?php esc_html_e('Are you sure you want to permenently close this wizard?', 'leblix'); ?></h3>
							<p><?php printf( esc_html__('You can start this wizard from %1$s Appearance > Leblix Theme Setup %2$s section', 'leblix') ,cspt_esc_kses('<strong>') ,cspt_esc_kses('</strong>') );  ?></p>
							<div class="cspt-merlin-message-conform-btn">
								<a href="#" class="button button-primary cspt-disable-merlin-message"><?php esc_html_e('Yes close this message', 'leblix'); ?></a>
								&nbsp; &nbsp;
								<a href="#" class="button cspt-disable-merlin-message-cancel"><?php esc_html_e('No, keep this message', 'leblix'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div><!-- .cspt-merlin-message-conform -->
			<div class="cspt-merlin-message-inner">
				<div class="cspt-merlin-message-logo">
					<img src="<?php echo get_template_directory_uri() ?>/includes/images/logo.png" />
				</div>
				<div class="cspt-merlin-message-vline">
					<div class="cspt-merlin-message-vline-i"></div>
				</div>
				<div class="cspt-merlin-message-text">
					<h2><?php esc_html_e('Leblix Theme Setup Wizard', 'leblix'); ?></h2>
					<p><?php esc_html_e('This Leblix theme comes with one-click setup wizard. This step-by-step wizard will install all required plugins, install child theme, install demo content and also import sliders.', 'leblix'); ?></p>
				</div>
				<div class="cspt-merlin-message-btn">
					<div class="cspt-merlin-message-btn-i">
						<a href="<?php echo admin_url( 'themes.php?page=leblix-setup' ); ?>" class="button button-primary button-hero load-customize hide-if-no-customize"><?php esc_html_e('Start Theme Setup Wizard', 'leblix'); ?></a>
						<div class="cspt-merlin-message-small"><a href="#"><?php esc_html_e('Permanently disable this message', 'leblix'); ?></a></div>
					</div>
				</div>
				<div class="clear clearfix clr"></div>
			</div><!-- .cspt-merlin-message-inner -->
		</div><!-- .cspt-merlin-message -->
	</div><!-- .notice.is-dismissible -->
	<?php
}
}

if( !function_exists('cspt_merlin_fresh_setup_call') ){
function cspt_merlin_fresh_setup_call(){
	$cspt_merlin_all_done = get_option('cspt-merlin-all-done');
	if( empty($cspt_merlin_all_done) ){
		add_action( 'admin_notices', 'cspt_merlin_message' );
	}
}
}
add_action( 'init', 'cspt_merlin_fresh_setup_call' );

/**
 *  Merlin message disable ajax call
 */
add_action( 'wp_ajax_cspt_remove_merlin_message', 'cspt_remove_merlin_message' );
if( !function_exists('cspt_remove_merlin_message') ){
function cspt_remove_merlin_message() {
	update_option( 'cspt-merlin-all-done', 'yes' );
	echo 'ok';
	wp_die(); // this is required to terminate immediately and return a proper response
}
}

/* Ratings and reviews */
/**
 *  Merlin Message
 */
if( !function_exists('cspt_ratings_message') ){
function cspt_ratings_message() {
	?>
	<div class="cspt-merlin-message-box notice is-dismissible cspt-merlin-ratings-box">
		<div class="cspt-merlin-ratings-box-back-link"><a href="#"><i class="fa fa-chevron-circle-left"></i> <?php esc_html_e('Back','leblix') ?> </a></div>
		<div class="cspt-merlin-message">
			<!-- Ratings Main Box -->
			<div class="cspt-merlin-message-inner cspt-merlin-ratings-box-main">
				<div class="cspt-merlin-message-logo">
					<img src="<?php echo get_template_directory_uri() ?>/includes/images/logo.png" />
				</div>
				<div class="cspt-merlin-message-vline">
					<div class="cspt-merlin-message-vline-i"></div>
				</div>
				<div class="cspt-merlin-message-text">
					<h2><?php esc_html_e('Happy with our theme?', 'leblix'); ?></h2>
					<p><?php esc_html_e('We like to know how is your experiance with our theme. If you have any question than you can create ticket on our support site', 'leblix'); ?></p>
				</div>
				<div class="cspt-merlin-message-btn">
					<div class="cspt-merlin-message-btn-1">
						<a href="#" class="button button-primary button-hero load-customize hide-if-no-customize cspt-question-btn"> <i class="fa fa-question-circle"></i> <?php esc_html_e('I have a question or problem', 'leblix'); ?></a>
					</div>
					<div class="cspt-merlin-message-btn-2 cspt-happy-btn-container">
						<a href="#" class="button button-primary button-hero load-customize cspt-happy-btn"> <i class="fa fa-thumbs-o-up"></i> <?php esc_html_e('I am happy with the theme', 'leblix'); ?></a>
					</div>
					<div class="clearfix clear"></div>
					<div class="cspt-merlin-message-small"><a href="#"><?php esc_html_e('Permanently disable this message', 'leblix'); ?></a></div>
				</div>
				<div class="clear clearfix clr"></div>
			</div><!-- .cspt-merlin-message-inner -->
			<!-- Ratings Close Permenetly message -->
			<div class="cspt-merlin-message-conform">
				<div class="cspt-merlin-message-conform-inner">
					<div class="cspt-merlin-message-conform-i">
						<div class="cspt-merlin-message-conform-col cspt-merlin-message-conform-text">
							<h3><?php esc_html_e('Are you sure you want to permenently close this box?', 'leblix'); ?></h3>
							<div class="cspt-merlin-message-conform-btn">
								<a href="#" class="button button-primary cspt-disable-ratings-message"><?php esc_html_e('Yes close this message', 'leblix'); ?></a>
								&nbsp; &nbsp;
								<a href="#" class="button cspt-disable-ratings-message-cancel"><?php esc_html_e('No, keep this message', 'leblix'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div><!-- .cspt-merlin-message-conform -->
			<!-- Questions or problem box -->
			<div class="cspt-merlin-message-inner cspt-merlin-ratings-box-questions">
				<div class="cspt-merlin-message-text">
					<h2><?php esc_html_e('Have any question or problem?', 'leblix'); ?></h2>
					<p><?php printf( esc_html__('You can read our theme documents to get how to work with the theme. Still not solved, than feel free to contact us via our support site at %1$s', 'leblix'), cspt_esc_kses('<a href="' . esc_url('https://support.creativesplanet.com') . '" target="_blank">' . esc_url('https://support.creativesplanet.com') . '</a>') ); ?></p>
				</div>
				<div class="cspt-merlin-message-btn">
					<div class="cspt-merlin-message-btn-2 cspt-happy-btn-container cspt-pright-15">
						<a href="<?php echo esc_url('http://leblix-demo.creativesplanet.com/docs/'); ?>" target="_blank" class="button button-primary button-hero load-customize cspt-ratings-doc-btn"> <i class="fa fa-book"></i> <?php esc_html_e('Leblix Theme Documents', 'leblix'); ?></a>
					</div>
					<div class="cspt-merlin-message-btn-2 cspt-happy-btn-container">
						<a href="<?php echo esc_url('https://support.creativesplanet.com/'); ?>" target="_blank" class="button button-primary button-hero load-customize cspt-ratings-support-btn"> <i class="fa fa-question-circle"></i> <?php esc_html_e('Go to Creative\'s Planet support site', 'leblix'); ?></a>
					</div>
					<div class="clearfix clear"></div>
				</div>
				<div class="clear clearfix clr"></div>
			</div><!-- .cspt-merlin-message-inner -->
			<!-- 5-star ratings box -->
			<div class="cspt-merlin-message-inner cspt-merlin-ratings-box-ratings">
				<div class="cspt-merlin-message-text">
					<div class="cspt-merlin-message-arrow-area">
						<h2><?php esc_html_e('Glad to hear you like our theme', 'leblix'); ?></h2>
						<p><?php printf( esc_html__('Thanks for your support. Please provide us 5-star ratings. This will help us a lot.
It just take 1 minute. %1$s', 'leblix'), cspt_esc_kses('<a href="' . esc_url('https://themeforest.net/downloads') . '" target="_blank">'.esc_html__('Click here to go for review now','leblix').'</a>') ); ?></p>
					</div>
				</div>
				<div class="cspt-merlin-5star-right-area">
					<img src="<?php echo get_template_directory_uri(); ?>/includes/images/ratings-steps.png" alt="<?php esc_attr_e( 'Ratings Steps', 'leblix' ); ?>" />
				</div>
				<div class="clear clearfix clr"></div>
			</div><!-- .cspt-merlin-message-inner -->
		</div><!-- .cspt-merlin-message -->
	</div><!-- .notice.is-dismissible -->
	<?php
}
}

if( !function_exists('cspt_ratings_call') ){
function cspt_ratings_call(){
	$show_date			= get_option('cspt-ratingsbox-show-date');
	$cspt_merlin_all_done = get_option('cspt-merlin-all-done');
	if( empty($show_date) ){
		$nextWeek = time() + (7 * 24 * 60 * 60); // One week..
		$nextWeek = strval( $nextWeek );
		update_option('cspt-ratingsbox-show-date', $nextWeek);
	} else {
		$cspt_ratings_done	= get_option('cspt-ratings-done');
		$nextWeek			= get_option('cspt-ratingsbox-show-date');
		$curr_date			= time();
		if( $nextWeek < $curr_date && empty($cspt_ratings_done) && $cspt_merlin_all_done=='yes' ){
			add_action( 'admin_notices', 'cspt_ratings_message' );
		}
	}
}
}
add_action( 'init', 'cspt_ratings_call' );

/**
 *  Ratings message disable ajax call
 */
add_action( 'wp_ajax_cspt_remove_ratings_message', 'cspt_remove_ratings_message' );
if( !function_exists('cspt_remove_ratings_message') ){
function cspt_remove_ratings_message() {
	update_option( 'cspt-ratings-done', 'yes' );
	echo 'ok';
	wp_die(); // this is required to terminate immediately and return a proper response
}
}

/**
 * Kirki changes
 */
if( !function_exists('cspt_kirki_changes') ){
function cspt_kirki_changes(){
	if (!is_customize_preview() ) {
		add_filter( 'kirki_output_inline_styles', '__return_false' );
	}
	add_filter( 'kirki/config', function( $config = array() ) {
		$config['styles_priority'] = 10;
		return $config;
	} );
}
}
add_action( 'init', 'cspt_kirki_changes' );

/************************************************************* */

//Infinite Scroll
if( !function_exists('cspt_infinite_scroll') ){
function cspt_infinite_scroll(){

	if ( ! wp_verify_nonce( $_GET['nonce'], 'cspt_infinite_scroll_ajax_validation' ) ) {
		return '';
		exit();
	}

	$paged = '1';
	if( isset($_GET['page_no']) && !empty($_GET['page_no']) ){
		$paged = $_GET['page_no'];
	}
	$nonce = '';
	if( isset($_GET['nonce']) && !empty($_GET['nonce']) ){
		$nonce = $_GET['nonce'];
	}
	$show = '3';
	if( isset($_GET['show']) && !empty($_GET['show']) ){
		$show = $_GET['show'];
	}
	$cpt = 'post';
	if( isset($_GET['cpt']) && !empty($_GET['cpt']) ){
		$cpt_name = $cpt = $_GET['cpt'];
		if( $cpt == 'blog' ){
			$cpt_name = 'post'; 
		} else if($cpt == 'team'){
			$cpt_name = 'cspt-team-member';
		} else {
			$cpt_name = 'cspt-'.$cpt;
		}
	}
	$columns = '3';
	if( isset($_GET['columns']) && !empty($_GET['columns']) ){
		$columns = $_GET['columns'];
	}
	$style = '1';
	if( isset($_GET['style']) && !empty($_GET['style']) ){
		$style = $_GET['style'];
	}
	$orderby = '';
	if( isset($_GET['orderby']) && !empty($_GET['orderby']) ){
		$orderby = $_GET['orderby'];
	}
	$order = '';
	if( isset($_GET['order']) && !empty($_GET['order']) ){
		$order = $_GET['order'];
	}
	$from_category = '';
	if( isset($_GET['from_category']) && !empty($_GET['from_category']) ){
		$from_category = $_GET['from_category'];
	}
	$offset = 0;
	if( isset($_GET['offset']) && !empty($_GET['offset']) ){
		$offset = $_GET['offset'];
	}

	if( $paged>1 ){
		$offset = $offset + ( ($paged-1) * $show);
	}

	// Preparing $args
	$args = array(
		'post_type'				=> $cpt_name,
		'status'				=> 'publish',
		'posts_per_page'		=> $show,
		'ignore_sticky_posts'	=> true,
		'offset'				=> $offset,
	);

	// From selected category/group
	if( !empty($from_category) ){
		$from_category = explode(',', $from_category);
		$args['tax_query'] = array(
			array(
				'taxonomy' => cspt_get_category_of_cpt($cpt),
				'field'    => 'slug',
				'terms'    => $from_category,
			),
		);
	};

	if( !empty($orderby) && $orderby!='none' ){
		$args['orderby'] = $orderby;
		if( !empty($order) ){
			$args['order'] = $order;
		}
	}

	// Wp query to fetch posts
	$posts = new \WP_Query( $args );

	if ( $posts->have_posts() ) {

		$odd_even		= 'odd';
		$col_odd_even	= 'odd';
		$x				= 1;
		while ( $posts->have_posts() ) {
			$return = '';
			$posts->the_post();

			// Template
			if( file_exists( locate_template( '/theme-parts/'.esc_attr($cpt).'/'.esc_attr($cpt).'-style-'.esc_attr($style).'.php', false, false ) ) ){

				$return .= cspt_element_block_container( array(
					'position'		=> 'start',
					'column'		=> $columns,
					'cpt'			=> $cpt,
					'taxonomy'		=> cspt_get_category_of_cpt($cpt),
					'style'			=> $style,
					'odd_even'		=> $odd_even,
					'col_odd_even'	=> $col_odd_even,
				) );

				ob_start();
				$r = include( locate_template( '/theme-parts/'.esc_attr($cpt).'/'.esc_attr($cpt).'-style-'.esc_attr($style).'.php', false, false ) );
				$return .= ob_get_contents();
				ob_end_clean();

				$return .= cspt_element_block_container( array(
					'position'	=> 'end',
				) );

			}

			echo cspt_esc_kses($return);

			// odd or even
			if( $odd_even == 'odd' ){ $odd_even = 'even'; } else { $odd_even = 'odd'; }
			if( $x % $columns == 0 ){
				if( $col_odd_even == 'odd' ){ $col_odd_even = 'even'; } else { $col_odd_even = 'odd'; }
			}
			$x++;

		}
		?>

		<?php

	}
	wp_reset_postdata();

	wp_die(); // this is required to terminate immediately and return a proper response
}
}
add_action('wp_ajax_cspt_infinite_scroll', 'cspt_infinite_scroll'); // for logged in user
add_action('wp_ajax_nopriv_cspt_infinite_scroll', 'cspt_infinite_scroll'); // if user not logged in
