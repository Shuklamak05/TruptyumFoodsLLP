<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if( !function_exists('cspt_widgets_init_20') ){
function cspt_widgets_init_20() {
	register_sidebar( array(
		'name'          => esc_attr__( 'Blog Sidebar', 'leblix' ),
		'id'            => 'cspt-sidebar-post',
		'description'   => esc_attr__( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'leblix' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Page Sidebar', 'leblix' ),
		'id'            => 'cspt-sidebar-page',
		'description'   => esc_attr__( 'Add widgets here to appear in your sidebar on pages.', 'leblix' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
}
add_action( 'widgets_init', 'cspt_widgets_init_20', 20 );
if( !function_exists('cspt_widgets_init_22') ){
function cspt_widgets_init_22() {
	register_sidebar( array(
		'name'          => esc_attr__( 'Search Results Sidebar', 'leblix' ),
		'id'            => 'cspt-sidebar-search',
		'description'   => esc_attr__( 'Add widgets here to appear on search result pages.', 'leblix' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Footer Row - 1st Column', 'leblix' ),
		'id'            => 'cspt-footer-1',
		'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'leblix' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Footer Row - 2nd Column', 'leblix' ),
		'id'            => 'cspt-footer-2',
		'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'leblix' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Footer Row - 3rd Column', 'leblix' ),
		'id'            => 'cspt-footer-3',
		'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'leblix' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Footer Row - 4th Column', 'leblix' ),
		'id'            => 'cspt-footer-4',
		'description'   => esc_attr__( 'Add widgets here to appear in your footer.', 'leblix' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
}
add_action( 'widgets_init', 'cspt_widgets_init_22', 22 );

/**
 * Customizer icon picker
 */
if( !function_exists('cspt_leblix_addons_configure_customizer') ){
function cspt_leblix_addons_configure_customizer(){
	if( class_exists('Kirki') ){
		/** Kirki icon picker **/
		include( get_template_directory() . '/includes/customizer/creativesplanet-icon-picker/creativesplanet-icon-picker.php' );
	}
}
}
add_action( 'init', 'cspt_leblix_addons_configure_customizer' );

/**
 *  Disable Legacy mode
 */
if( !function_exists('cspt_elementor_set_legacy_mode') ){
function cspt_elementor_set_legacy_mode(){
	$optimized_dom_output = get_option( 'elementor_optimized_dom_output' );
	if( $optimized_dom_output!='enabled' ){
		update_option( 'elementor_optimized_dom_output', 'enabled' );
	}
}
}
add_action( 'init', 'cspt_elementor_set_legacy_mode' );

/**
 *  Customizer options
 */
if( !function_exists('cspt_configure_customizer') ){
function cspt_configure_customizer(){
	if( class_exists('Kirki') ){
		include( get_template_directory() . '/includes/kirki-config.php' );
	}
}
}
add_action( 'init', 'cspt_configure_customizer', 99 );

/**
 *  Categories Widget - Wrap Post count in a span
 */
add_filter('wp_list_categories', 'cspt_cat_count_span');
if( !function_exists('cspt_cat_count_span') ){
function cspt_cat_count_span($links) {
	if(strpos($links, '<span class="count">') !== false){
		// WooComerce call
		$links = str_replace('<span class="count">(', '<span class="count">', $links);
		$links = str_replace(')</span>', '</span>', $links);
	} else {
		$links = str_replace('</a> (', '</a> <span>', $links);
		$links = str_replace(')', '</span>', $links);

	}
	return $links;
}
}

/**
 *  Archives Widget - Wrap Post count in a span
 */
add_filter('get_archives_link', 'cspt_archive_count_span');
if( !function_exists('cspt_archive_count_span') ){
function cspt_archive_count_span($links) {
	if( substr( trim($links), 0, 8 ) != '<option ' ){
		$links = str_replace('</a>&nbsp;(', '</a> <span>', $links);
		$links = str_replace(')', '</span>', $links);
	}
	return $links;
}
}

/**
 *  Default Enqueue scripts and styles.
 */
if( !function_exists('cspt_theme_gfonts') ){
function cspt_theme_gfonts() {
	$font_families = array();
	$gfont_family  = '';
	include( get_template_directory() . '/includes/customizer-options.php' );
	include( get_template_directory() . '/includes/gfonts-array.php' );
	foreach( $kirki_options_array as $options_key=>$options_val ){
		if( !empty( $options_val['section_fields'] ) ){
			foreach( $options_val['section_fields'] as $key=>$option ){
				if( !empty($option['type']) && $option['type']=='typography' ){
					$font_family = '';
					$value = cspt_get_base_option( $option['settings'] );
					$family = trim($value['font-family']);
					if( substr($family, -1) == ',' ){
						$family = substr($family, 0, -1);
					}
					// Repalce space with + character
					$spaces = substr_count($family, ' ');
					if( $spaces>0 ){
						for ($x = 1; $x <= $spaces; $x++) {
							$family = str_replace( ' ', '+', $family );
						} 
					}
					$variants = $value['variant'];
					if( isset($option['cspt-all-variants']) && $option['cspt-all-variants']==true ){
						$font_family = trim($value['font-family']);
						if( substr($font_family, -1) == ',' ){
							$font_family = substr($font_family, 0, -1);
						}
						if( !empty($gfonts_array[ $font_family ]['variants']) ){
							$variants = implode( ',', $gfonts_array[ $font_family ]['variants'] );
						}
					}
					$font_families[$family][] = $variants;
				}
			}
		}
	}
	if( !empty($font_families) && is_array($font_families) ){
		$x = 1;
		foreach( $font_families as $name=>$var){
			if( !empty($name) ){
				if( $x != 1 ){ $gfont_family .= '|'; }
				$var = array_unique($var);
				$gfont_family .= $name . ':'. implode(',',$var);
			}
			$x++;
		}
		if( !empty($gfont_family) ){
			$query_args = array(
				'family' => $gfont_family,
			);
			$fonts_url = add_query_arg( $query_args, esc_url('https://fonts.googleapis.com/css'), $query_args );
			wp_enqueue_style( 'cspt-all-gfonts', $fonts_url );
		}
	}
}
}
add_action( 'wp_enqueue_scripts', 'cspt_theme_gfonts' );
add_action( 'admin_enqueue_scripts', 'cspt_theme_gfonts' );

/**
 * Specially for Forminator plugin
 */
if( !function_exists('cspt_forminator_plugin_js_correction') ){
function cspt_forminator_plugin_js_correction(){
	$curr_screen = get_current_screen();
	if( !empty($curr_screen->base) && $curr_screen->base == 'customize' ){
		wp_enqueue_script( 'select2-forminator', get_template_directory_uri() . '/js/select2-forminator.min.js' );
	}
}
}
add_action( 'admin_enqueue_scripts', 'cspt_forminator_plugin_js_correction', 99 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
if( !function_exists('cspt_pingback_header') ){
function cspt_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
}
add_action( 'wp_head', 'cspt_pingback_header' );

/**
 * Enqueue scripts and styles.
 */
if( !function_exists('cspt_style_scripts') ){
function cspt_style_scripts() {
	$min = '';
	if( cspt_get_base_option('min')=='1' ){
		$min = '.min';
	}

	// header style css
	$header_style = cspt_get_base_option('header-style');
	if( empty($header_style) ){ $header_style = '1'; }
	if( file_exists( get_template_directory() . '/css/header/header-style-'.$header_style.$min.'.css' ) ){
		wp_enqueue_style( 'cspt-leblix-header-style', get_template_directory_uri() . '/css/header/header-style-'.$header_style.$min.'.css' );
	}

	// Blog box styles
	$blog_styles = cspt_element_template_list('blog', true);
	$total_blog_styles = count($blog_styles);
	if( is_array($blog_styles) && $total_blog_styles>0 ){
		foreach( $blog_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/blog/blog-style-'.$style.$min.'.css' ) ){
				if( ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) || is_search() ){
					wp_enqueue_style( 'cspt-blog-style-'.$style, get_template_directory_uri() . '/css/blog/blog-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'cspt-blog-style-'.$style, get_template_directory_uri() . '/css/blog/blog-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// blog but not classic
	$blogroll_view = cspt_get_base_option('blogroll-view');
	if( is_home() && $blogroll_view!='classic' ){
		wp_enqueue_style( 'cspt-blog-style-'.$blogroll_view, get_template_directory_uri() . '/css/blog/blog-style-'.$blogroll_view.$min.'.css' );
	}

	// Client box styles
	$client_styles = cspt_element_template_list('client', true);
	$total_client_styles = count($client_styles);
	if( is_array($client_styles) && $total_client_styles>0 ){
		foreach( $client_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/client/client-style-'.$style.$min.'.css' ) ){
				if( ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) || is_search() ){
					wp_enqueue_style( 'cspt-client-style-'.$style, get_template_directory_uri() . '/css/client/client-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'cspt-client-style-'.$style, get_template_directory_uri() . '/css/client/client-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// FID box styles
	$fid_styles = cspt_element_template_list('facts-in-digits', true);
	$total_fid_styles = count($fid_styles);
	if( is_array($fid_styles) && $total_fid_styles>0 ){
		foreach( $fid_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/fid/fid-style-'.$style.$min.'.css' ) ){
				if( ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) || is_search() ){
					wp_enqueue_style( 'cspt-fid-style-'.$style, get_template_directory_uri() . '/css/fid/fid-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'cspt-fid-style-'.$style, get_template_directory_uri() . '/css/fid/fid-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Icon Heading box styles
	$icon_heading_styles = cspt_element_template_list('icon-heading', true);
	$total_icon_heading_styles = count($icon_heading_styles);
	if( is_array($icon_heading_styles) && $total_icon_heading_styles>0 ){
		foreach( $icon_heading_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/icon-heading/icon-heading-style-'.$style.$min.'.css' ) ){
				if( ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) || is_search() ){
					wp_enqueue_style( 'cspt-icon-heading-style-'.$style, get_template_directory_uri() . '/css/icon-heading/icon-heading-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'cspt-icon-heading-style-'.$style, get_template_directory_uri() . '/css/icon-heading/icon-heading-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Pricing Table box styles
	$pricing_table_styles = cspt_element_template_list('pricing-table', true);
	$total_pricing_table_styles = count($pricing_table_styles);
	if( is_array($pricing_table_styles) && $total_pricing_table_styles>0 ){
		foreach( $pricing_table_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/ptable/ptable-style-'.$style.$min.'.css' ) ){
				if( ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) || is_search() ){
					wp_enqueue_style( 'cspt-ptable-style-'.$style, get_template_directory_uri() . '/css/ptable/ptable-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'cspt-ptable-style-'.$style, get_template_directory_uri() . '/css/ptable/ptable-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Testimonial box styles
	$testimonial_styles = cspt_element_template_list('testimonial', true);
	$total_testimonial_styles = count($testimonial_styles);
	if( is_array($testimonial_styles) && $total_testimonial_styles>0 ){
		foreach( $testimonial_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/testimonial/testimonial-style-'.$style.$min.'.css' ) ){
				if( ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) || is_search() ){
					wp_enqueue_style( 'cspt-testimonial-style-'.$style, get_template_directory_uri() . '/css/testimonial/testimonial-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'cspt-testimonial-style-'.$style, get_template_directory_uri() . '/css/testimonial/testimonial-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Team box styles
	$team_styles = cspt_element_template_list('team', true);
	$total_team_styles = count($team_styles);
	if( is_array($team_styles) && $total_team_styles>0 ){
		foreach( $team_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/team/team-style-'.$style.$min.'.css' ) ){
				if( ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) || is_search() ){
					wp_enqueue_style( 'cspt-team-style-'.$style, get_template_directory_uri() . '/css/team/team-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'cspt-team-style-'.$style, get_template_directory_uri() . '/css/team/team-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Portfolio box styles
	$portfolio_styles = cspt_element_template_list('portfolio', true);
	$total_portfolio_styles = count($portfolio_styles);
	if( is_array($portfolio_styles) && $total_portfolio_styles>0 ){
		foreach( $portfolio_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/portfolio/portfolio-style-'.$style.$min.'.css' ) ){
				if( ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) || is_search() ){
					wp_enqueue_style( 'cspt-portfolio-style-'.$style, get_template_directory_uri() . '/css/portfolio/portfolio-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'cspt-portfolio-style-'.$style, get_template_directory_uri() . '/css/portfolio/portfolio-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Service box styles
	$service_styles = cspt_element_template_list('service', true);
	$total_service_styles = count($service_styles);
	if( is_array($service_styles) && $total_service_styles>0 ){
		foreach( $service_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/service/service-style-'.$style.$min.'.css' ) ){
				if( ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) || is_search() ){
					wp_enqueue_style( 'cspt-service-style-'.$style, get_template_directory_uri() . '/css/service/service-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'cspt-service-style-'.$style, get_template_directory_uri() . '/css/service/service-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	// Static box styles
	$static_box_styles = cspt_element_template_list('static-box', true);
	$total_static_box_styles = count($static_box_styles);
	if( is_array($static_box_styles) && $total_static_box_styles>0 ){
		foreach( $static_box_styles as $style=>$image ){
			if( file_exists( get_template_directory() . '/css/static-box/static-box-style-'.$style.$min.'.css' ) ){
				if( ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) || is_search() ){
					wp_enqueue_style( 'cspt-static-box-style-'.$style, get_template_directory_uri() . '/css/static-box/static-box-style-'.$style.$min.'.css' );
				} else {
					wp_register_style( 'cspt-static-box-style-'.$style, get_template_directory_uri() . '/css/static-box/static-box-style-'.$style.$min.'.css' );
				}
			}
		}
	}

	if( is_singular( 'post' ) ){
		$style	= cspt_get_base_option('blog-related-style');
		wp_enqueue_style( 'cspt-blog-style-'.$style);
	} else if ( is_singular( 'cspt-portfolio' ) ){
		$style	= cspt_get_base_option('portfolio-related-style');
		wp_enqueue_style( 'cspt-portfolio-style-'.$style);
	} else if ( is_singular( 'cspt-service' ) ){
		$style	= cspt_get_base_option('service-related-style');
		wp_enqueue_style( 'cspt-service-style-'.$style);
	}

	// Portfolio Category view styles
	if( is_tax('cspt-portfolio-category') || is_post_type_archive('cspt-portfolio') ){
		$portfolio_cat_style = cspt_get_base_option('portfolio-cat-style');
		$portfolio_cat_style = ( empty($portfolio_cat_style) ) ? '1' : $portfolio_cat_style ;
		wp_enqueue_style( 'cspt-portfolio-style-'.$portfolio_cat_style, get_template_directory_uri() . '/css/portfolio/portfolio-style-'.$portfolio_cat_style.$min.'.css' );
	}

	// Service Category view styles
	if( is_tax('cspt-service-category') || is_post_type_archive('cspt-service') ){
		$service_cat_style = cspt_get_base_option('service-cat-style');
		$service_cat_style = ( empty($service_cat_style) ) ? '1' : $service_cat_style ;
		wp_enqueue_style( 'cspt-service-style-'.$service_cat_style, get_template_directory_uri() . '/css/service/service-style-'.$service_cat_style.$min.'.css' );
	}

	// Team Group view styles
	if( is_tax('cspt-team-group') || is_post_type_archive('cspt-team-member') ){
		$team_group_style = cspt_get_base_option('team-group-style');
		$team_group_style = ( empty($team_group_style) ) ? '1' : $team_group_style ;
		wp_enqueue_style( 'cspt-team-style-'.$team_group_style, get_template_directory_uri() . '/css/team/team-style-'.$team_group_style.$min.'.css' );
	}

	// Post Category view styles
	if( is_archive('category') || is_post_type_archive('post') ){
		$post_cat_style = cspt_get_base_option('blogroll-view');
		$post_cat_style = ( empty($post_cat_style) ) ? '1' : $post_cat_style ;
			wp_enqueue_style( 'cspt-post-category-style-'.$post_cat_style, get_template_directory_uri() . '/css/blog/blog-style-'.$post_cat_style.$min.'.css' );
	}

	if( is_page() || is_singular() ){
		$elementor_data  = get_post_meta( get_the_ID() , '_elementor_data', true );
		$elementor_page = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

		if( !empty($elementor_data) && !empty($elementor_page) ){

			if( is_array($elementor_data) ){
				$contents_array = $elementor_data;
			} else {
				$contents_array = json_decode($elementor_data, true);
			}

			if( !empty($contents_array) && is_array($contents_array) ){
				$elements = cspt_get_elements($contents_array);
				if( !empty($elements) && is_array($elements) && count($elements)>0 ){
					foreach( $elements as $element ){
						$ele = explode('___', $element);

						$css_id = $ele[0];
						$style = $ele[1];

						//$dir = str_replace('_element','', $ele[0] );
						//$dir = str_replace('cspt_','', $dir );

						//var_dump($dir);
						//var_dump($css_id);

						$css_id = str_replace('_element','-style', $css_id );
						$css_id = str_replace('_','-', $css_id );
						$css_id = str_replace('_','-', $css_id );
						$css_id = str_replace('_','-', $css_id );

						if( $css_id == 'cspt-icon-heading' ){
							$css_id .= '-style';
						}
						if( $css_id == 'cspt-multiple-icon-heading' ){
							$css_id = 'cspt-icon-heading-style';
						}

						//var_dump($css_id);

						if( $css_id !='cspt-heading' ){ // there is no style css for heading
							$css_id = $css_id.'-'.$style;
							//var_dump($css_id);
							//var_dump( get_template_directory_uri() . '/css/' . esc_attr($dir) . '/' . esc_attr($css_id) . esc_attr($min) . '.css' );
							//var_dump('-------');
							wp_enqueue_style( esc_attr($css_id) );
						}

					}
				}
			}
		}
	}
}
}
add_action( 'wp_enqueue_scripts', 'cspt_style_scripts', 10 );

/**
 * Enqueue scripts and styles.
 */
if( !function_exists('cspt_scripts') ){
function cspt_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	$min = '';
	if( cspt_get_base_option('min')=='1' ){
		$min = '.min';
	}

	// RTL 
	$rtl = ( is_rtl() ) ? '-rtl' : '' ;

	// Font Awesome base
	if( !wp_style_is( 'elementor-icons-shared-0', 'registered' ) ){
		wp_register_style( 'elementor-icons-shared-0', get_template_directory_uri() . '/libraries/font-awesome/css/fontawesome.min.css' );
	}
	$icon_libraries = cspt_icon_library_list();
	foreach( $icon_libraries as $library_id=>$library_data ){
		if( !wp_style_is( $library_id, 'registered' ) ){
			wp_register_style( $library_id, $library_data['css_path'] );
		}
	}

	if( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() || is_search()){
		$icon_libraries = cspt_icon_library_list();
		foreach( $icon_libraries as $library_id=>$library_data ){
			if( wp_style_is( $library_id, 'registered' ) ){
				wp_enqueue_style( $library_id, $library_data['css_path'] );
			}
		}
		if( wp_style_is( 'elementor-icons-shared-0', 'registered' ) ){
			wp_enqueue_style( 'elementor-icons-shared-0' );
		}
		if( wp_style_is( 'elementor-icons-fa-regular', 'registered' ) ){
			wp_enqueue_style( 'elementor-icons-fa-regular' );
		}
		if( wp_style_is( 'elementor-icons-fa-solid', 'registered' ) ){
			wp_enqueue_style( 'elementor-icons-fa-solid' );
		}
		if( wp_style_is( 'elementor-icons-fa-brands', 'registered' ) ){
			wp_enqueue_style( 'elementor-icons-fa-brands' );
		}
	}

	// Bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/libraries/bootstrap/css/bootstrap'.$rtl.'.min.css' );

	wp_register_script( 'waypoints', get_template_directory_uri() . '/libraries/waypoints/jquery.waypoints.min.js' , array( 'jquery' ) );
	wp_register_style( 'animate-css', get_template_directory_uri() . '/libraries/animate-css/animate.min.css' );

	wp_register_script( 'jquery-circle-progress', get_template_directory_uri() . '/libraries/jquery-circle-progress/circle-progress.min.js', array( 'jquery' ) );
	wp_register_script( 'numinate', get_template_directory_uri() . '/libraries/numinate/numinate.min.js', array( 'jquery' ) );

	wp_register_script( 'owl-carousel', get_template_directory_uri() . '/libraries/owl-carousel/owl.carousel.min.js' , array( 'jquery' ) );
	wp_register_style( 'owl-carousel', get_template_directory_uri() . '/libraries/owl-carousel/assets/owl.carousel.min.css' );
	wp_register_style( 'owl-carousel-theme', get_template_directory_uri() . '/libraries/owl-carousel/assets/owl.theme.default.min.css' );

	wp_enqueue_style( 'cspt-elementor-style', get_template_directory_uri() . '/css/elementor'.$min.'.css' );

	wp_enqueue_style( 'cspt-core-style', get_template_directory_uri() . '/css/core'.$min.'.css' );
	wp_enqueue_style( 'cspt-theme-style', get_template_directory_uri() . '/css/theme'.$min.'.css' );

	// WooCommerce
	if( function_exists('is_woocommerce') ){
		wp_enqueue_style( 'cspt-woocommerce-style', get_template_directory_uri() . '/css/woocommerce'.$min.'.css' );
	}

	// Magnific Popup Lightbox
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/libraries/magnific-popup/jquery.magnific-popup.min.js', array('jquery') );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/libraries/magnific-popup/magnific-popup.css' );
	// Base icon library
	wp_enqueue_style( 'cspt-base-icons', get_template_directory_uri() . '/libraries/creativesplanet-base-icons/css/creativesplanet-base-icons.css' );
	// Sticky
	if( cspt_get_base_option('sticky-header')==true ){
		wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/libraries/sticky-toolkit/jquery.sticky-kit.min.js' , array('jquery') );
	}
	// Theme base scripts
	wp_enqueue_script( 'cspt-core-script', get_template_directory_uri() . '/js/core'.$min.'.js' , array('jquery') );
	wp_enqueue_script( 'cspt-elementor-script', get_template_directory_uri() . '/js/elementor'.$min.'.js', array('jquery', 'cspt-core-script') );
	// Responsive variable
	$js_array = array(
		'responsive'	=> cspt_get_base_option('responsive-breakpoint'),
		'ajaxurl'		=> admin_url( 'admin-ajax.php' ),
		'ajaxnonce'		=> wp_create_nonce( 'cspt_infinite_scroll_ajax_validation' ) 
	);
	wp_localize_script( 'cspt-core-script', 'cspt_js_variables', $js_array );
	wp_localize_script( 'cspt-core-script', // Handle
		'cspt_infinite_scroll_vars', // Object name
		array( 
			'ajaxurl'     => admin_url( 'admin-ajax.php' ),
			'ajaxnonce'   => wp_create_nonce( 'cspt_infinite_scroll_ajax_validation' ) 
	   ) 
   );


	// ballon tooltip
	wp_enqueue_style( 'balloon', get_template_directory_uri() . '/libraries/balloon/balloon.min.css' );
	// Light Slider
	wp_register_script( 'lightslider', get_template_directory_uri() . '/libraries/lightslider/js/lightslider.min.js' , array('jquery') );
	wp_register_style( 'lightslider', get_template_directory_uri() . '/libraries/lightslider/css/lightslider.min.css' );
	// Isotope
	wp_register_script( 'isotope', get_template_directory_uri() . '/libraries/isotope/isotope.pkgd.min.js' , array('jquery') );
	// Infinite Scroll
	wp_register_script( 'infinite-scroll', get_template_directory_uri() . '/libraries/infinite-scroll/infinite-scroll.pkgd.min.js' , array( 'jquery', 'isotope' ) );
	// Masonry
	wp_register_script( 'masonry', array( 'jquery', 'infinite-scroll' ) );

	// For the Search Results page
	if( is_search() ){
		wp_enqueue_style( 'skeletabs', get_template_directory_uri() . '/libraries/skeletabs/skeletabs.min.css' );
		wp_enqueue_script( 'skeletabs', get_template_directory_uri() . '/libraries/skeletabs/skeletabs.min.js' , array( 'jquery' ) );
	}

	// Max Mega Menu style
	$mmmenu_override = cspt_get_base_option('max-mega-menu-override');
	if( $mmmenu_override == 1 && defined('MEGAMENU_VERSION') ){
		wp_enqueue_style( 'cspt-max-mega-menu', get_template_directory_uri() . '/css/max-mega-menu'.$min.'.css' );
	}

	
	// Category icon library
	if( is_tax() ){
		if( is_tax() ){
			$category = get_queried_object();
			if( isset($category->term_id) && !empty($category->term_id) ){
				$cat_id			= $category->term_id;
				$term			= get_term( $cat_id );
				$sub_category	= get_terms( $term->taxonomy, array('parent' => $cat_id, 'hide_empty' => false) );
				if( is_array($sub_category) && count($sub_category)>0 ){
					foreach( $sub_category as $cat ){
						$icon_lib = get_term_meta( $cat->term_id, 'cspt-category-icon-library', true );
						wp_enqueue_style($icon_lib);
					}
				}
			}
		}
	}

	// remove Kirki style
	wp_dequeue_style('kirki-styles');

	/******************** */

	if( function_exists('cspt_auto_css') ){
		// Addons plugin exists
		if( function_exists('is_customize_preview') && !is_customize_preview() ){
			wp_enqueue_style('cspt-dynamic-style', admin_url('admin-ajax.php').'?action=cspt_auto_css');
		} else {
			ob_start();
			include get_template_directory().'/css/theme-style.php'; // Fetching theme-style.php output and store in a variable
			$css    = ob_get_clean();
			wp_add_inline_style( 'cspt-theme-style', $css );
		}
	} else {
		// Addons plugin not exists
		wp_enqueue_style( 'cspt-dynamic-default-style', get_template_directory_uri() . '/css/dynamic-default-style'.$min.'.css' );
	}

	wp_enqueue_style( 'cspt-responsive-style', get_template_directory_uri() . '/css/responsive'.$min.'.css' );

	global $cspt_inline_css;
	if( !empty($cspt_inline_css) ){
		if( function_exists('cspt_minify_css') ){
			$cspt_inline_css = cspt_minify_css( $cspt_inline_css );
		}
		wp_add_inline_style( 'cspt-dynamic-style', trim( $cspt_inline_css ) );
	}

	if( is_page() || is_singular() ){
		if( wp_style_is( 'elementor-post-'.get_the_ID() , 'enqueued' ) ){
			wp_dequeue_style( 'elementor-post-'.get_the_ID() );
			wp_enqueue_style( 'elementor-post-'.get_the_ID() );
		}
	}

	if( is_singular('cspt-team-member') ){
		wp_enqueue_script( 'waypoints' );
	}

	if ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
		wp_enqueue_script( 'waypoints' );
		wp_enqueue_style( 'animate-css' );

		wp_enqueue_script( 'jquery-circle-progress' );
		wp_enqueue_script( 'numinate' );

		wp_enqueue_script( 'owl-carousel' );
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_style( 'owl-carousel-theme' );

		wp_enqueue_script( 'lightslider' );
		wp_enqueue_style( 'lightslider' );
	}

}
}
add_action( 'wp_enqueue_scripts', 'cspt_scripts', 20 );

/**
 * Admin scripts and styles
 */
if( !function_exists('cspt_wp_admin_scripts_styles') ){
function cspt_wp_admin_scripts_styles() {
	wp_register_script( 'cspt-admin-script', get_template_directory_uri() . '/includes/admin-script.js', array('jquery') );
	// Admin variable
	$admin_js_array = array(
		'theme_path' => get_template_directory_uri(),
	);
	wp_localize_script( 'cspt-admin-script', 'cspt_admin_js_variables', $admin_js_array );
	wp_enqueue_style( 'cspt-admin-style', get_template_directory_uri() . '/includes/admin-style.css' );
	wp_enqueue_script( 'cspt-admin-script' );
	wp_enqueue_style( 'wp-editor-classic-layout-styles' );

	// Admin widget view
	wp_enqueue_style( 'cspt-admin-widget-style', get_template_directory_uri() . '/includes/admin-widget.css' );
}
}
add_action( 'admin_enqueue_scripts', 'cspt_wp_admin_scripts_styles' );

/**
 * Enqueue script for custom customize control.
 */
function cspt_customize_enqueue() {
    wp_enqueue_script( 'cspt-customize-script', get_template_directory_uri() . '/includes/customizer-script.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'cspt_customize_enqueue' );

/**
 * Elementor correction for customize bug
 */
if( !function_exists('cspt_ele_correction') ){
function cspt_ele_correction() {
	if( function_exists('is_customize_preview') && is_customize_preview() ){
		if( wp_style_is( 'elementor-common', 'enqueued' ) ){
			wp_dequeue_style('elementor-common');
		}
		if( wp_style_is( 'elementor-admin', 'enqueued' ) ){
			wp_dequeue_style('elementor-admin');
		}
	}
}
}
add_action( 'admin_enqueue_scripts', 'cspt_ele_correction', 99 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Leblix 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
if( !function_exists('cspt_widget_tag_cloud_args') ){
function cspt_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';
	return $args;
}
}
add_filter( 'widget_tag_cloud_args', 'cspt_widget_tag_cloud_args' );

/*
 *  Body Tag: Class
 */
if( !function_exists('cspt_add_body_classes') ){
function cspt_add_body_classes($classes) {
	// Widget class
	$widget_class = '';
	// sidebar class
	$sidebar_class = cspt_get_base_option('sidebar-post');
	if( in_array( $sidebar_class, array('left','right') ) ){
		$widget_class = cspt_check_widget_exists('cspt-sidebar-page');
	}
	if( is_page() ){
		$widget_class = '';
		$sidebar_class = cspt_get_base_option('sidebar-page');
		$page_meta = get_post_meta( get_the_ID(), 'cspt-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar_class = $page_meta;
		}
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = cspt_check_widget_exists('cspt-sidebar-page');
		}
		if( function_exists('is_woocommerce') && is_woocommerce() ){
			$widget_class = '';
			$sidebar_class = cspt_get_base_option('sidebar-wc-shop');
		}
		// Curved style at slider bottom
		$slider_type	= get_post_meta( get_the_ID(), 'cspt-slider-type', true );
		$curved_style	= get_post_meta( get_the_ID(), 'cspt-slider-curved-style', true );
		if( !empty($slider_type) && $curved_style == true ){
			$classes[] = 'cspt-slider-curved-style';
		}
	} else if ( !is_front_page() && is_home() ) {
		$widget_class = '';
		$sidebar_class = cspt_get_base_option('sidebar-post');
		$page_for_posts = get_option( 'page_for_posts' );
		$post_meta = get_post_meta( $page_for_posts, 'cspt-sidebar', true );
		if( !empty($post_meta) && $post_meta!='global' ){
			$sidebar_class = $post_meta;
		}
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = cspt_check_widget_exists('cspt-sidebar-post');
		}

	} else if( function_exists('is_woocommerce') && is_woocommerce() && !is_product() ){
		$widget_class = '';
		$sidebar_class = cspt_get_base_option('sidebar-wc-shop');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = cspt_check_widget_exists('cspt-sidebar-wc-shop');
		}
	} else if( function_exists('is_product') && is_product() ){
		$widget_class = '';
		$sidebar_class = cspt_get_base_option('sidebar-wc-single');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = cspt_check_widget_exists('cspt-sidebar-wc-single');
		}
	} else if( is_singular() ){
		if( get_post_type()=='cspt-portfolio' ){
			$widget_class = '';
			$sidebar_class = cspt_get_base_option('sidebar-portfolio');
			$post_meta = get_post_meta( get_the_ID(), 'cspt-sidebar', true );
			if( !empty($post_meta) && $post_meta!='global' ){
				$sidebar_class = $post_meta;
			}
			if( in_array( $sidebar_class, array('left','right') ) ){
				$widget_class = cspt_check_widget_exists('cspt-sidebar-portfolio');
			}
		} else if( get_post_type()=='cspt-service' ){
			$widget_class = '';
			$sidebar_class = cspt_get_base_option('sidebar-service');
			$post_meta = get_post_meta( get_the_ID(), 'cspt-sidebar', true );
			if( !empty($post_meta) && $post_meta!='global' ){
				$sidebar_class = $post_meta;
			}
			if( in_array( $sidebar_class, array('left','right') ) ){
				$widget_class = cspt_check_widget_exists('cspt-sidebar-service');
			}
		} else if( get_post_type()=='cspt-team-member' ){
			$widget_class = '';
			$sidebar_class = cspt_get_base_option('sidebar-team-member');
			$post_meta = get_post_meta( get_the_ID(), 'cspt-sidebar', true );
			if( !empty($post_meta) && $post_meta!='global' ){
				$sidebar_class = $post_meta;
			}
			if( in_array( $sidebar_class, array('left','right') ) ){
				$widget_class = cspt_check_widget_exists('cspt-sidebar-team');
			}
		} else if( get_post_type()=='post' ){
			$widget_class = '';
			$sidebar_class = cspt_get_base_option('sidebar-post');
			$post_meta = get_post_meta( get_the_ID(), 'cspt-sidebar', true );
			if( !empty($post_meta) && $post_meta!='global' ){
				$sidebar_class = $post_meta;
			}
			if( in_array( $sidebar_class, array('left','right') ) ){
				$widget_class = cspt_check_widget_exists('cspt-sidebar-post');
			}
		}
	} else if( is_tax('cspt-portfolio-category')  || is_post_type_archive('cspt-portfolio') ){
		$widget_class = '';
		$sidebar_class = cspt_get_base_option('sidebar-portfolio-category');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = cspt_check_widget_exists('cspt-sidebar-portfolio-cat');
		}
	} else if( is_tax('cspt-service-category')  || is_post_type_archive('cspt-service') ){
		$widget_class = '';
		$sidebar_class = cspt_get_base_option('sidebar-service-category');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = cspt_check_widget_exists('cspt-sidebar-service-cat');
		}
	} else if( is_tax('cspt-team-group') || is_post_type_archive('cspt-team-member') ){
		$widget_class = '';
		$sidebar_class = cspt_get_base_option('sidebar-team-group');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = cspt_check_widget_exists('cspt-sidebar-team-group');
		}
	} else if( is_search() ){
		$widget_class = '';
		$sidebar_class = cspt_get_base_option('sidebar-search');
		if( in_array( $sidebar_class, array('left','right') ) ){
			$widget_class = cspt_check_widget_exists('cspt-sidebar-search');
		}
	}
	// widget exists class
	if( !empty($widget_class) ){
		$classes[] = 'cspt-sidebar-no';
	} else {
		if( in_array( $sidebar_class, array('left','right') ) ){
			$classes[] = 'cspt-sidebar-exists';
		}
		$classes[] = 'cspt-sidebar-' . $sidebar_class;
	}
	// Max Mega Menu orverride class
	$mmmenu_override	= cspt_get_base_option('max-mega-menu-override');
	$megamenu_settings	= get_option( 'megamenu_settings' );
	if( $mmmenu_override == 1 && defined('MEGAMENU_VERSION') && ( isset($megamenu_settings['creativesplanet-top']['enabled']) && !empty($megamenu_settings['creativesplanet-top']['enabled']) && $megamenu_settings['creativesplanet-top']['enabled']=='1' ) ){
		$classes[] = 'cspt-max-mega-menu-override';
	}
	return $classes;
}
}
add_filter('body_class', 'cspt_add_body_classes');

function cspt_update_comment_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = $req ? "aria-required='true'" : '';
	$fields['author'] =
		'<div class="cspt-comment-form-input-wrapper"><p class="cspt-comment-form-input comment-form-author">
			<input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Name', 'leblix' ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30" ' . $aria_req . ' />
		<span class="cspt-form-error cspt-error-author">'.esc_html__('This field is required.','leblix').'</span>
		</p>';
	$fields['email'] =
		'<p class="cspt-comment-form-input comment-form-email">
			<input id="email" name="email" type="email" placeholder="' . esc_attr__( 'Email', 'leblix' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
		'" size="30" ' . $aria_req . ' />
		<span class="cspt-form-error cspt-error-email cspt-empty-email">'.esc_html__('This field is required.','leblix').'</span>
		<span class="cspt-form-error cspt-error-email cspt-invalid-email">'.esc_html__('Please enter a valid email address.','leblix').'</span>
		</p>';
	$fields['url'] =
		'<p class="cspt-comment-form-input comment-form-url">
			<input id="url" name="url" type="url"  placeholder="' . esc_attr__( 'Website', 'leblix' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" size="30" />
			</p></div>';
	return $fields;
}
add_filter( 'comment_form_default_fields', 'cspt_update_comment_fields' );
function cspt_update_comment_textarea_field( $comment_field ) {
	$comment_field =
		'<p class="comment-form-comment">
		<textarea required id="comment" name="comment" placeholder="' . esc_attr__( "Enter your comment here...", 'leblix' ) . '" cols="45" rows="8"></textarea>
		<span class="cspt-form-error cspt-error-author">'.esc_html__('This field is required.','leblix').'</span>
		</p>';
	return $comment_field;
}
add_filter( 'comment_form_field_comment', 'cspt_update_comment_textarea_field' );
// Limit Posts Per Category/Archive Page
add_filter('pre_get_posts', 'cspt_limit_category_posts');
function cspt_limit_category_posts($query){
    if( is_tax( 'cspt-portfolio-category' ) && !empty($query->query['cspt-portfolio-category']) ){
		$count		= cspt_get_base_option('portfolio-cat-count');
        $query->set('posts_per_page', $count);
    } else if( is_tax( 'cspt-team-group' ) && !empty($query->query['cspt-team-group']) ){
		$count		= cspt_get_base_option('team-group-count');
        $query->set('posts_per_page', $count);
	} else if( is_tax( 'cspt-service-category' ) && !empty($query->query['cspt-service-category']) ){
		$count		= cspt_get_base_option('service-cat-count');
        $query->set('posts_per_page', $count);
    }
    return $query;
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'cspt_woocommerce_header_add_to_cart_fragment' );
if( !function_exists('cspt_woocommerce_header_add_to_cart_fragment') ){
function cspt_woocommerce_header_add_to_cart_fragment( $fragments ) {
	$content = cspt_woocommerce_header_fragement_content();
	$fragments['a.cspt-cart-link'] = cspt_esc_kses($content);
	return $fragments;
}
}

/**
 * Elementor core things
 */
include( get_template_directory() . '/includes/elementor-core.php' );

/**
 * Elementor global settings
 */
add_filter( 'admin_init', 'cspt_elementor_global_settings' );
if( !function_exists('cspt_elementor_global_settings') ){
function cspt_elementor_global_settings() {

	if(get_option('cspt_elementor_global_done') === false){

		// change default color
		$default_color = array (
			1 => '',
			2 => '',
			3 => '',
			4 => '',
		);
		update_option('elementor_scheme_color', $default_color );

		// change default typo
		$default_typo = array (
			1 => array (
				'font_family' => '',
				'font_weight' => '',
			),
			2 => array (
				'font_family' => '',
				'font_weight' => '',
			),
			3 => array (
				'font_family' => '',
				'font_weight' => '',
			),
			4 => array (
				'font_family' => '',
				'font_weight' => '',
			),
		);
		update_option('elementor_scheme_typography', $default_typo );

		// Set a flag if the theme activation happened
		update_option('cspt_elementor_global_done', true, '', false);
	}
}
}

/**
 * Init calls
 */
if( !function_exists('cspt_init_calls') ){
function cspt_init_calls(){
	$value = get_option('cspt-widget-classes');
	if( $value != 'yes' ){
		update_option(
			'WCSSC_options',
			array (
				'show_id'			=> false,
				'type'				=> 3,
				'defined_classes'	=> 
				array (
					0 => 'cspt-two-column-menu',
				),
				'show_number'		=> true,
				'show_location'		=> true,
				'show_evenodd'		=> true,
				'fix_widget_params'	=> false,
				'filter_unique'		=> false,
				'translate_classes'	=> false,
				)
		);
		update_option('cspt-widget-classes', 'yes');
	}

	// Removes the "shop" title on the main shop page
	add_filter( 'woocommerce_show_page_title', '__return_false' );

}
}
add_action( 'init', 'cspt_init_calls' );

/**
 *  Inline code generator
 */
if( !function_exists('cspt_inline_css_code_generator') ){
function cspt_inline_css_code_generator(){
	$return		= '';
	$color_css	= '';
	if( is_page() || is_singular() || is_home() ){

		$page_id = get_the_ID();
		if( is_home() ){
			$page_id = get_option( 'page_for_posts');
		}

		// Body background
		$bg_img		= get_post_meta( $page_id, 'cspt-bg-img', true );
		$bg_image	= $bg_color_css = $bg_color_opacity_css = '';

		if( !empty($bg_img) ){
			$img_src			= wp_get_attachment_image_src($bg_img, 'full');
			if( !empty($img_src[0]) ){ $bg_image = $img_src[0]; }
		}

		// Background color and color-opacity
		$bg_color			= get_post_meta( $page_id, 'cspt-bg-color', true );
		$bg_color_opacity	= get_post_meta( $page_id, 'cspt-bg-color-opacity', true );
		if( !empty($bg_color) ){
			$bg_color_css .= 'background-color:' . $bg_color . ' !important;';
		}
		if( !empty($bg_color_opacity) ){
			$bg_color_opacity_css .= 'opacity:' . $bg_color_opacity . ' !important;';
		}

		// Generating CSS for background
		if( !empty($bg_image) ){
			$return .= 'body{background-image:url(\'' . $bg_image . '\') !important;}';
			if( !empty($bg_color_css) ){
				$return .= 'body:before{' . $bg_color_css . $bg_color_opacity_css . '}';
			}

		} else {

			if( !empty($bg_color_css) ){
				$return .= 'body{' . $bg_color_css . '}';
			}

		}

		$titlebar_img = '';
		// Check if Titlebar bg imge is set in page or post
		$titlebar_bg_img	= get_post_meta( $page_id, 'cspt-titlebar-bg-img', true );
		if( !empty($titlebar_bg_img) ){
			$img_src			= wp_get_attachment_image_src($titlebar_bg_img, 'full');
			if( !empty($img_src[0]) ){ $titlebar_img = $img_src[0]; }
			$titlebar_bg_color			= get_post_meta( $page_id, 'cspt-titlebar-bg-color', true );
			$titlebar_bg_color_opacity	= get_post_meta( $page_id, 'cspt-titlebar-bg-color-opacity', true );
			if( !empty($titlebar_bg_color) ){
				$color_css .= 'background-color:' . $titlebar_bg_color . ' !important;';
			}
			if( !empty($titlebar_bg_color_opacity) ){
				$color_css .= 'opacity:' . $titlebar_bg_color_opacity . ' !important;';
			}
		} else {
			// If not than check now if fetaured img as titlebar bg option is enabled or not
			$titlebar_bg_featured = cspt_get_base_option('titlebar-bg-featured');
			if( !empty($titlebar_bg_featured) && is_array($titlebar_bg_featured) ){
				if( ( is_page()							&& in_array( 'page', $titlebar_bg_featured ) ) ||
					( is_singular('post')				&& in_array( 'post', $titlebar_bg_featured ) ) ||
					( is_singular('cspt-portfolio')		&& in_array( 'cspt-portfolio',   $titlebar_bg_featured ) ) ||
					( is_singular('cspt-team-member')	&& in_array( 'cspt-team-member', $titlebar_bg_featured ) ) ||
					( is_singular('cspt-testimonial')	&& in_array( 'cspt-testimonial', $titlebar_bg_featured ) ) ||
					( is_singular('cspt-service')		&& in_array( 'cspt-service',     $titlebar_bg_featured ) )
				){
					if( has_post_thumbnail() ){
						$titlebar_img = get_the_post_thumbnail_url( $page_id , 'full' );
					}
				}
			}
		}
		// Titlebar bg
		if( !empty($titlebar_img) ){
			$return .= '.cspt-title-bar-wrapper{background-image:url(\'' . $titlebar_img . '\') !important;}';
			if( !empty($color_css) ){
				$return .= '.cspt-title-bar-wrapper:before{' . $color_css . '}';
			}
		}
		// Titlebar BG Color
		$titlebar_bg_color	= get_post_meta( get_the_ID(), 'cspt-titlebar-bg-color', true );
		if( !empty($titlebar_bg_color) ){
			$opacity = get_post_meta( get_the_ID(), 'cspt-titlebar-bg-color-opacity', true );
			if( empty($opacity) ){ $opacity = '0.5'; }
			$return .= '.cspt-title-bar-wrapper:after{background-color:' . cspt_hex2rgb($titlebar_bg_color, $opacity ) . ' !important;}';
		}
	}
	if( !empty($return) ){
		cspt_inline_css( $return );
	}
}
}
add_action( 'wp', 'cspt_inline_css_code_generator' );

/**
 * Register a custom menu page.
 */
if( !function_exists('cspt_register_my_custom_menu_page') ){
function cspt_register_my_custom_menu_page() {
	if( class_exists('Kirki') ){
		add_menu_page(
			esc_attr__( 'Leblix Options', 'leblix' ),
			esc_attr__( 'Leblix Options', 'leblix' ),
			'manage_options',
			esc_url( site_url() . '/wp-admin/customize.php' ),
			'',
			'',
			6
		);
	}
}
}
add_action( 'admin_menu', 'cspt_register_my_custom_menu_page' );
/**
 * Widget custom class input
 */
function cspt_widget_custom_class( $widget, $return, $instance ){

	$id		= $widget->get_field_id( 'cspt-widget-class' );
	$name	= $widget->get_field_name( 'cspt-widget-class' );
	$value	= ( !empty($instance['cspt-widget-class']) ) ? $instance['cspt-widget-class'] : '' ;

	$id_image		= $widget->get_field_id( 'cspt-widget-bg-image' );
	$name_image		= $widget->get_field_name( 'cspt-widget-bg-image' );
	$value_image	= ( !empty($instance['cspt-widget-bg-image']) ) ? $instance['cspt-widget-bg-image'] : '' ;

	?>
	<div class="cspt-widget-option cspt-widget-class-wrapper">
		<p><label for="widget-text-2-classes">Custom CSS Class:</label><input type="text" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($id); ?>" value="<?php echo esc_attr($value); ?>" class="widefat"></p>
	</div>

	<div class="cspt-widget-option cspt-widget-bg-image-wrapper">
		<p><label for="widget-text-2-classes">Custom Background Image for widget:</label><input type="text" name="<?php echo esc_attr($name_image); ?>" id="<?php echo esc_attr($id_image); ?>" value="<?php echo esc_attr($value_image); ?>" class="widefat"></p>
		<p class="cspt-widget-small-text">NOTE: Add image full path only. The background image size should be <code>500x580</code> pixel.</p>
	</div>

	<?php
}
add_action( 'in_widget_form', 'cspt_widget_custom_class', 10, 3 );

/**
 * Widget custom class store value
 */
function cspt_save_widget_custom_class( $instance, $new_instance, $old_instance, $object ) {
	// ID
	$instance['ids'] = sanitize_text_field( $new_instance['ids'] );

	// Widget Class
	$instance['cspt-widget-class'] = ( !empty( $new_instance['cspt-widget-class'] ) ) ? sanitize_text_field( $new_instance['cspt-widget-class'] ) : '' ;
	
	// Widget Background Image
	$instance['cspt-widget-bg-image'] = ( !empty( $new_instance['cspt-widget-bg-image'] ) ) ? sanitize_text_field( esc_url($new_instance['cspt-widget-bg-image']) ) : '' ;
	
	return $instance;
}
add_filter( 'widget_update_callback', 'cspt_save_widget_custom_class', 10, 4 );


/**
 * Add Class in frontend
 */
function cspt_frontend_class_event($params){
	global $wp_registered_widgets;
	
	$widget_id              = $params[0]['widget_id'];
	$widget_obj             = $wp_registered_widgets[ $widget_id ];
	$widget_num				= $widget_obj['params'][0]['number'];
	$widget_opt				= cspt_get_widget_info( $widget_obj );
	
	// Custom class
	if( !empty($widget_opt[ $widget_num ]['cspt-widget-class']) ){
		$custom_class	= trim($widget_opt[ $widget_num ]['cspt-widget-class']);

		$class						= 'class="'.$custom_class.' '; 
		$params[0]['before_widget']	= str_replace('class="', $class, $params[0]['before_widget']);

	}


	// Background image
	if( !empty($widget_opt[ $widget_num ]['cspt-widget-bg-image']) ){
		$bg_image	= trim($widget_opt[ $widget_num ]['cspt-widget-bg-image']);

		$bg_image_attr	= 'style="background-image:url(\''.$bg_image.'\');" class="'; 
		$params[0]['before_widget']	= str_replace('class="', $bg_image_attr, $params[0]['before_widget']);

	}

	return $params;
}
// add the action
add_action( "dynamic_sidebar_params", "cspt_frontend_class_event" , 10, 1);


/**
 * Get specific widget information
 */
function cspt_get_widget_info($widget_obj){
	global $post;
	$id = ( isset( $post->ID ) ? get_the_ID() : null );
	
	if( isset( $id ) && get_post_meta( $id, '_customize_sidebars' ) ){
		$custom_sidebarcheck = get_post_meta( $id, '_customize_sidebars' );
	}

	$option_name = '';
	if( isset( $widget_obj['callback'][0]->option_name ) ){
		$option_name = $widget_obj['callback'][0]->option_name;
	} else if( isset( $widget_obj['original_callback'][0]->option_name ) ){
		$option_name = $widget_obj['original_callback'][0]->option_name;
	}

	if( isset( $custom_sidebarcheck[0] ) && ( 'yes' === $custom_sidebarcheck[0] ) ){
		$widget_opt = get_option( 'widget_' . $id . '_' . substr( $option_name, 7 ) );
	} else if( $option_name ){
		$widget_opt = get_option( $option_name );
	}

	return $widget_opt;
}
/**
 * Clear Kirki font cache
 */
if( !function_exists('cspt_clear_kirki_font_cache') ){
function cspt_clear_kirki_font_cache(){
	$cspt_theme_version	= get_option('cspt-leblix-theme-version');
	$current_theme			= wp_get_theme();
	$current_theme_version	= $current_theme->Version;
	if( $cspt_theme_version != $current_theme_version ){
		delete_option( 'kirki_downloaded_font_files' );
		delete_transient( 'kirki_remote_url_contents' );
		delete_transient( 'kirki_googlefonts_cache' );
		if( is_dir( WP_CONTENT_DIR . 'fonts' ) ){
			rmdir( WP_CONTENT_DIR . 'fonts' );
		}
	}
}
}
add_action( 'init', 'cspt_clear_kirki_font_cache' );