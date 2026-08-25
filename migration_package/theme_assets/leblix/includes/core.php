<?php
if( !function_exists('cspt_icon_library_list') ){
function cspt_icon_library_list() {
	$icon_libraries = array(
		'cspt-leblix-icon'		=> array(
			'name'			=> esc_attr__( 'Leblix Icon', 'leblix' ),
			'default_icon'	=> 'cspt-leblix-icon cspt-leblix-icon-light',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/cspt-leblix-icon/flaticon.css' ),
			'common_class'	=> 'cspt-leblix-icon',
			'class_prefix'	=> 'cspt-leblix-icon-',
		),
		'elementor-icons-fa-regular'	=> array(
			'name'			=> esc_attr__( 'Font Awesome - Regular', 'leblix' ),
			'default_icon'	=> 'far fa-address-book',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/font-awesome/css/regular.min.css' ),
			'common_class'	=> 'far', 
			'class_prefix'	=> 'fa-',
		),
		'elementor-icons-fa-solid'	=> array(
			'name'			=> esc_attr__( 'Font Awesome - Solid', 'leblix' ),
			'default_icon'	=> 'fas fa-star',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/font-awesome/css/solid.min.css' ),
			'common_class'	=> 'fas', 
			'class_prefix'	=> 'fa-',
		),
		'elementor-icons-fa-brands'	=> array(
			'name'			=> esc_attr__( 'Font Awesome - Brands', 'leblix' ),
			'default_icon'	=> 'fab fa-facebook-square',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/font-awesome/css/brands.min.css' ),
			'common_class'	=> 'fab', 
			'class_prefix'	=> 'fa-',
		),
		'material-icons'	=> array(
			'name'			=> esc_attr__( 'Material Icons', 'leblix' ),
			'default_icon'	=> 'mdi mdi-group',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/material-icons/css/material-icons.min.css' ),
			'common_class'	=> 'mdi', 
			'class_prefix'	=> 'mdi-',
		),
		'sgicon'	=> array(
			'name'			=> esc_attr__( 'Stroke Gap Icons', 'leblix' ),
			'default_icon'	=> 'sgicon sgicon-WorldWide',
			'css_path'		=> esc_url( get_template_directory_uri() . '/libraries/stroke-gap-icons/style.css' ),
			'common_class'	=> 'sgicon', 
			'class_prefix'	=> 'sgicon-',
		),
	);
	return $icon_libraries;
}
}

/**
 *  Global function - This will return array of different templates for CPT and other boxes
 */
if( !function_exists('cspt_element_template_list') ){
function cspt_element_template_list( $for='portfolio', $section=true ){
	$return = array();
	if( !empty($for) ){
		// Default titles
		$portfolio_cpt_singular_title	= esc_attr__('Portfolio','leblix');
		$service_cpt_singular_title		= esc_attr__('Service','leblix');
		$team_cpt_singular_title		= esc_attr__('Team Member','leblix');
		if( class_exists('Kirki') ){
			// Portfolio - singular
			$portfolio_cpt_singular_title2	= Kirki::get_option( 'portfolio-cpt-singular-title' );
			$portfolio_cpt_singular_title	= ( !empty($portfolio_cpt_singular_title2) ) ? $portfolio_cpt_singular_title2 : $portfolio_cpt_singular_title ;
			// Service - singular
			$service_cpt_singular_title2	= Kirki::get_option( 'service-cpt-singular-title' );
			$service_cpt_singular_title	= ( !empty($service_cpt_singular_title2) ) ? $service_cpt_singular_title2 : $service_cpt_singular_title ;
			// Team - singular
			$team_cpt_singular_title2	= Kirki::get_option( 'team-cpt-singular-title' );
			$team_cpt_singular_title	= ( !empty($team_cpt_singular_title2) ) ? $team_cpt_singular_title2 : $team_cpt_singular_title ;
		}

		$elements_array = array(
			'icon-heading'				=> array( 'name' => esc_attr__('Icon Heading', 'leblix'),	
				'total_styles' 			=> 15,
				'exclude_in_customizer'	=> array(), // add style number here
			),
			'portfolio'					=> array( 'name' => $portfolio_cpt_singular_title,					
				'total_styles' 			=> 3,
				'exclude_in_customizer'	=> array(), // add style number here
			),
			'service'					=> array( 'name' => $service_cpt_singular_title,					
				'total_styles'			=> 5,
				'exclude_in_customizer'	=> array(), // add style number here
		 	),
			'team'						=> array( 'name' => $team_cpt_singular_title,						
				'total_styles' 			=> 1,
				'exclude_in_customizer'	=> array(), // add style number here
			),
			'testimonial'				=> array( 'name' => esc_attr__('Testimonial', 'leblix'),			
				'total_styles' 			=> 3,
				'exclude_in_customizer'	=> array(), // add style number here
			),
			'client'					=> array( 'name' => esc_attr__('Client', 'leblix'),				   
			 	'total_styles' 			=> 1,
				'exclude_in_customizer'	=> array(), // add style number here
			 ),
			'blog'						=> array( 'name' => esc_attr__('Blog', 'leblix'),					
				'total_styles' 			=> 3,
				'exclude_in_customizer'	=> array(), // add style number here
			),
			'pricing-table'				=> array( 'name' => esc_attr__('Pricing Table', 'leblix'),			
				'total_styles' 			=> 2,
				'exclude_in_customizer'	=> array(), // add style number here
			),
			'facts-in-digits'			=> array( 'name' => esc_attr__('Facts In Digits', 'leblix'),		
				'total_styles' 			=> 7,
				'exclude_in_customizer'	=> array(), // add style number here
			),
			'static-box'				=> array( 'name' => esc_attr__('Static Box', 'leblix'),			    
				'total_styles' 			=> 3,
				'exclude_in_customizer'	=> array(), // add style number here
		 	),
			'opening-hours-list'		=> array( 'name' => esc_attr__('Opening Hours List', 'leblix'),	    
				'total_styles' 			=> 2,
				'exclude_in_customizer'	=> array(), // add style number here
			),
			'tabs'			        	=> array( 'name' => esc_attr__('Tabs', 'leblix'),			        
				'total_styles' 			=> 1,
				'exclude_in_customizer'	=> array(), // add style number here
		 	),
		);
		
		if( $for=='blog' && $section !== true && $section == 'customizer' ){
			$return['classic'] = get_template_directory_uri() . '/includes/images/blog-style-classic.jpg';
		}

		if( !empty($elements_array[$for]) ){
			for ($x = 1; $x <= $elements_array[$for]['total_styles']; $x++) {
				$thumb = get_template_directory_uri() . '/includes/images/no-style-thumb.jpg';
				if( file_exists( get_stylesheet_directory() . '/includes/images/'.$for.'-style-'.$x.'.jpg' ) ){
					$thumb = get_stylesheet_directory_uri() . '/includes/images/'.$for.'-style-'.$x.'.jpg';
				} else if( file_exists( get_template_directory() . '/includes/images/'.$for.'-style-'.$x.'.jpg' ) ){
					$thumb = get_template_directory_uri() . '/includes/images/'.$for.'-style-'.$x.'.jpg';
				}
				if( $section !== true && $section == 'customizer'  ){
					if( !in_array( $x, $elements_array[$for]['exclude_in_customizer'] ) ){
						$return[$x] = $thumb;
					}
				} else {
					$return[$x] = $thumb;
				}
			}
		}
	}
	return $return;
}
}

/**
 *  Global function - Get category of CPT
 */
if( !function_exists('cspt_get_category_of_cpt') ){
function cspt_get_category_of_cpt( $cpt='post' ){
	$return = 'category';
	switch ($cpt) {
		case 'portfolio':
			$return = 'cspt-portfolio-category';
			break;
		case 'service':
			$return = 'cspt-service-category';
			break;
		case 'team':
			$return = 'cspt-team-group';
			break;
		case 'testimonial':
			$return = 'cspt-testimonial-cat';
			break;
		case 'client':
			$return = 'cspt-client-group';
			break;
	}

	return esc_attr($return);
}
}

/**
 * Returns an accessibility-friendly link to edit a post or page.
 *
 * This also gives us a little context about what exactly we're editing
 * (post or page?) so that users understand a bit more where they are in terms
 * of the template hierarchy and their content. Helpful when/if the single-page
 * layout with multiple posts/pages shown gets confusing.
 */
if ( ! function_exists( 'cspt_edit_link' ) ) {
function cspt_edit_link() {
	edit_post_link(
		esc_attr__( 'Edit', 'leblix' ),
		'<span class="edit-link">',
		'</span>'
	);
}
}

if( !function_exists('cspt_get_base_option') ) {
function cspt_get_base_option( $option='' ){
	$return = '';
	if( class_exists('Kirki') && !defined('LEBLIX_TPC_ACTIVATED')  ){
		$return = Kirki::get_option( $option );
	} else {
		if( empty($kirki_options_array) ){
			include get_template_directory() . '/includes/customizer-options.php';
		}
		foreach( $kirki_options_array as $kirki_options ){
			if( !empty($kirki_options['section_fields']) ){
				foreach( $kirki_options['section_fields'] as $field ){
					if( !empty($field['settings']) && $field['settings']==$option && isset($field['default']) ){
						$return = $field['default'];
					}
				}
			}
		}
	}
	return $return;
}
}

/*
 *  Creative's Planet element container
 */
if( !function_exists('cspt_element_container') ){
function cspt_element_container( $settings = array( 'position' => 'start', 'cpt' => 'blog', 'data' => array() ) ){

	$return 	 = '';
	$inner_class_array = array('creativesplanet-element-inner');

	// New Vars
	$position	= ( !empty($settings['position']) ) ? $settings['position'] : 'start' ;
	$cpt		= ( !empty($settings['cpt']) ) ? $settings['cpt'] : 'blog' ;
	$view_type	= ( !empty($settings['data']['view-type']) ) ? $settings['data']['view-type'] : 'row-column' ;
	$show		= ( !empty($settings['data']['show']) ) ? $settings['data']['show'] : '3' ;

	$offset		= ( !empty($settings['data']['offset']) ) ? $settings['data']['offset'] : 0 ;
	$from_category	= ( !empty($settings['data']['from_category']) ) ? $settings['data']['from_category'] : '' ;
	$orderby	= ( !empty($settings['data']['orderby']) ) ? $settings['data']['orderby'] : '' ;
	$order		= ( !empty($settings['data']['order']) ) ? $settings['data']['order'] : '' ;

	$columns	= ( !empty($settings['data']['columns']) ) ? $settings['data']['columns'] : '3' ;
	$gap		= ( !empty($settings['data']['gap']) ) ? $settings['data']['gap'] : '' ;
	$style		= ( !empty($settings['data']['style']) ) ? $settings['data']['style'] : '1' ;
	$infinite_scroll	= ( !empty($settings['data']['infinite-scroll']) && $settings['data']['infinite-scroll']=='yes' ) ? 'yes' : 'no' ;
	$loadmore_btn		= ( !empty($settings['data']['infinite-scroll-show-loadmore-btn']) && $settings['data']['infinite-scroll-show-loadmore-btn']=='yes' ) ? 'yes' : 'no' ;

	// Carousel
	$car_loop			= ( !empty($settings['data']['carousel-loop']) && $settings['data']['carousel-loop']=='1' ) ? 'true' : 'false' ;
	$car_autoplay		= ( !empty($settings['data']['carousel-autoplay']) && $settings['data']['carousel-autoplay']=='1' ) ? 'true' : 'false' ;
	$car_center			= ( !empty($settings['data']['carousel-center']) && $settings['data']['carousel-center']=='1' ) ? 'true' : 'false' ;
	$car_dots			= ( !empty($settings['data']['carousel-dots']) && $settings['data']['carousel-dots']=='1' ) ? 'true' : 'false' ;
	$car_autoplayspeed	= ( !empty($settings['data']['carousel-autoplayspeed']) ) ? trim($settings['data']['carousel-autoplayspeed']) : '1000' ;

	$car_nav = 'false';
	if( !empty($settings['data']['carousel-nav']) ) {
		if( $settings['data']['carousel-nav']=='1' ) {
			$car_nav = 'true';
		} else if( $settings['data']['carousel-nav']=='above' ) {
			$car_nav = 'above';
		}
	}

	if( $position=='start' ){

		// Enqueue scripts and styles
		if( $view_type=='carousel' ){
			wp_enqueue_script( 'owl-carousel' );
			wp_enqueue_style( 'owl-carousel' );
			wp_enqueue_style( 'owl-carousel-theme' );
		}

		$cpt_name = $cpt;
		if( $cpt_name == 'blog' ){
			$cpt_name = 'post';
		} else if( $cpt_name == 'team' ){
			$cpt_name = 'cspt-team-member';
		} else {
			$cpt_name = 'cspt-'.$cpt_name;
		};

		// Preparing $args to get total posts
		$args = array(
			'post_type'				=> $cpt_name,
			'status'				=> 'publish',
			'posts_per_page'		=> 999999,
			'ignore_sticky_posts'	=> true,
			'offset'				=> $offset,
		);

		// From selected category/group
		if( !empty($from_category) ){
			//$from_category = explode(',', $from_category);
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
		// Total posts
		$total_posts = 0;
		if( !empty($posts->found_posts) ){
			$total_posts = $posts->found_posts;
		}
		// Pagination
		$pagination = 1;
		if( !empty($total_posts) ){
			$pagination = ceil($total_posts / $show);
		}

		// Data tags
		$data_array = array();
		$data_array[] = 'data-cpt="'.$cpt.'"';
		//$data_array[] = '="'.$total_posts.'"';
		$data_array[] = 'data-totalpagination="'.$pagination.'"';
		$data_array[] = 'data-style="'.$style.'"';
		$data_array[] = 'data-show="'.$show.'"';
		$data_array[] = 'data-columns="'.$columns.'"';
		$data_array[] = 'data-loop="'.$car_loop.'"';
		$data_array[] = 'data-autoplay="'.$car_autoplay.'"';
		$data_array[] = 'data-center="'.$car_center.'"';
		$data_array[] = 'data-nav="'.$car_nav.'"';
		$data_array[] = 'data-dots="'.$car_dots.'"';
		$data_array[] = 'data-autoplayspeed="'.esc_attr($car_autoplayspeed).'"';
		$data_array[] = 'data-margin="'.esc_attr($gap).'"';

		// class
		$class_array = array();
		$class_array[] = 'creativesplanet-element';
		$class_array[] = 'creativesplanet-element-'.$cpt;
		$class_array[] = 'cspt-element-'.$cpt.'-style-'.$style;
		$class_array[] = 'creativesplanet-element-viewtype-'.$view_type;
		if( !empty($gap) ){
			$class_array[] = 'creativesplanet-gap-'.$gap;
		}
		if( !empty($settings['data']['sortable']) ){
			$class_array[] = 'cspt-sortable-' . esc_attr($settings['data']['sortable']);
		}
		// infinite scroll class
		$class_array[] = 'cspt-infinite-scroll-'. esc_attr($infinite_scroll);

		// infinite scroll with Load More button
		$class_array[] = 'cspt-infinite-scroll-button-'. esc_attr($loadmore_btn);

		// Return
		$return = '<div class="'. implode(' ', $class_array) .'" '. implode(' ', $data_array) . '><div class="'. implode(' ', $inner_class_array) .'">';

	} else {

		$return = '</div><!-- .creativesplanet-element-inner -->   </div><!-- .creativesplanet-element -->  ';

	}

	return $return;
}
}

if( !function_exists('cspt_social_links_list') ){
function cspt_social_links_list( $settings = array( 'position' => 'start', 'column' => '3' ) ){
	return array(
		array(
			'id'			=> 'facebook',
			'label'			=> 'Facebook',
			'icon_class'	=> 'cspt-base-icon-facebook-squared',
		),
		array(
			'id'			=> 'twitter',
			'label'			=> 'Twitter',
			'icon_class'	=> 'cspt-base-icon-twitter',
		),
		array(
			'id'			=> 'linkedin',
			'label'			=> 'LinkedIn',
			'icon_class'	=> 'cspt-base-icon-linkedin-squared',
		),
		array(
			'id'			=> 'youtube',
			'label'			=> 'Youtube',
			'icon_class'	=> 'cspt-base-icon-youtube-play',
		),
		array(
			'id'			=> 'instagram',
			'label'			=> 'Instagram',
			'icon_class'	=> 'cspt-base-icon-instagram',
		),
		array(
			'id'			=> 'flickr',
			'label'			=> 'Flickr',
			'icon_class'	=> 'cspt-base-icon-flickr',
		),
		array(
			'id'			=> 'pinterest',
			'label'			=> 'Pinterest',
			'icon_class'	=> 'cspt-base-icon-pinterest',
		),
	);
}
}

if( !function_exists('cspt_team_social_links') ){
function cspt_team_social_links(){
	$return = '';
	$social_list = cspt_social_links_list();
	foreach( $social_list as $social ){
		$social_link = get_post_meta( get_the_ID(), 'cspt-social-links_' . $social['id'], true );
		if( !empty($social_link) ){
			$return .= '<li class="cspt-social-li cspt-social-'.$social['id'].'"><a href="' . esc_url($social_link) . '" title="' . esc_attr($social['label']) . '" target="_blank"><span><i class="' . esc_attr($social['icon_class']) . '"></i></span></a></li>';
		}
	}
	if( !empty($return) ){
		echo cspt_esc_kses('<ul class="cspt-social-links cspt-team-social-links">'.$return.'</ul>');
	}
}
}

if( !function_exists('cspt_social_share_list') ){
function cspt_social_share_list( $for='' ){
	$list = array(
		'facebook'	=> array(
			'title'			=> esc_attr('Facebook'),
			'link'			=> 'https://facebook.com/sharer/sharer.php?u=%1$s&title=%2$s',
			'icon_class'	=> 'cspt-base-icon-facebook-squared',
		),
		'twitter'	=> array(
			'title' 		=> esc_attr('Twitter'),
			'link'			=> 'https://twitter.com/intent/tweet/?text=%2$s&amp;url=%1$s',
			'icon_class'	=> 'cspt-base-icon-twitter',
		),
		'google-plus'	=> array(
			'title' 		=> esc_attr('Google Plus'),
			'link'			=> 'https://plus.google.com/share?url=%1$s',
			'icon_class'	=> 'cspt-base-icon-gplus',
		),
		'tumblr'		=> array(
			'title' 		=> esc_attr('Tumblr'),
			'link'			=> 'https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title=%2$s&amp;caption=%2$s&amp;content=%1$s&amp;canonicalUrl= &amp;shareSource=tumblr_share_button',
			'icon_class'	=> 'cspt-base-icon-tumbler',
		),
		'pinterest'		=> array(
			'title'			=> esc_attr('Pinterest'),
			'link'			=> 'https://pinterest.com/pin/create/button/?url=%1$s&amp;media=%1$s&amp;description=%2$s',
			'icon_class'	=> 'cspt-base-icon-pinterest',
		),
		'linkedin'		=> array(
			'title'			=> esc_attr('LinkedIn'),
			'link'			=> 'https://www.linkedin.com/shareArticle?mini=true&amp;url=%1$s&amp;title=%2$s&amp;summary=%2$s&amp;source=%1$s',
			'icon_class'	=> 'cspt-base-icon-linkedin-squared',
		),
		'reddit'		=> array(
			'title'			=> esc_attr('Reddit'),
			'link'			=> 'https://reddit.com/submit/?url=%1$s&title=%2$s',
			'icon_class'	=> 'cspt-base-icon-reddit',
		),
	);
	if( $for=='customizer' ){
		$return_array = array();
		foreach( $list as $social=>$data ){
			$return_array[$social] = $data['title'];
		}
		return $return_array;
	}
	return $list;
}
}

if( !function_exists('cspt_blog_social_share') ){
function cspt_blog_social_share(){
	$return		 = '';
	$list        = cspt_social_share_list();
	$social_list = cspt_get_base_option('blog-social-share');
	if( !empty($social_list) && is_array($social_list) && count($social_list)>0 ){
		foreach( $social_list as $social ){
			if( !empty($list[$social]) ){
				$link = sprintf( $list[$social]['link'] , get_permalink() , get_the_title()  ) ;
				$return .= '<li class="cspt-social-li cspt-social-li-'.esc_attr($social).'"><a class="cspt-popup" href="'.esc_url($link).'" title="' . sprintf( esc_attr__('Share on %1$s','leblix'), $list[$social]['title'] ) . '"><i class="'.$list[$social]['icon_class'].'"></i></a></li>';
			}
		}
	}
	if( !empty($return) ){
		echo cspt_esc_kses('<div class="cspt-social-share"><ul>'.$return.'</ul></div>');
	}
}
}

if( !function_exists('cspt_team_designation') ){
function cspt_team_designation(){
	// Designation
	$designation = get_post_meta( get_the_ID(), 'cspt-team-details_designation', true );
	if( !empty($designation) ){
		?>
		<div class="creativesplanet-box-team-position"><?php echo esc_html($designation); ?></div>
		<?php
	}
}
}

if( !function_exists('cspt_get_all_option_array') ) {
function cspt_get_all_option_array(){
	$return = array();
	include get_template_directory() . '/includes/customizer-options.php';
	foreach( $kirki_options_array as $kirki_options ){
		if( !empty($kirki_options['section_fields']) ){
			foreach( $kirki_options['section_fields'] as $field ){
				$settings            = str_replace( '-', '_', $field['settings'] );
				$settings            = str_replace( '-', '_', $settings );
				$settings            = str_replace( '-', '_', $settings );
				$settings            = str_replace( '-', '_', $settings );
				$settings            = str_replace( '-', '_', $settings );
				$return[ $settings ] = cspt_get_base_option( $field['settings'] );
			}
		}
	}
	return $return;
}
}

if( !function_exists('cspt_inline_css') ) {
function cspt_inline_css( $css='' ){
	if( !empty($css) ){
		global $cspt_inline_css;
		if( empty($cspt_inline_css) ){
			$cspt_inline_css = '';
		}
		$cspt_inline_css .= $css;
	}
}
}

if( !function_exists('cspt_footer_boxes_area') ){
	function cspt_footer_boxes_area() {

		$footer_boxes_area = cspt_get_base_option('footer-boxes-area');

		if( $footer_boxes_area == true ){

			$footer_box_content	= array();
			$footer_box_class			= '';

			for( $x=1; $x<=1; $x++ ){
				$icon_html	= '';
				$title		= cspt_get_base_option('footer-box-'.$x.'-title');
				$desc		= cspt_get_base_option('footer-box-'.$x.'-content');
				$icon		= cspt_get_base_option('footer-box-'.$x.'-icon');

				if( !empty($icon) ){
					$icon = explode(';',$icon);
					$icon = $icon[0];
					// load icon library
					$icon_array = explode(' ',$icon);
					$icon_prefix = $icon_array[0];
					$lib_list_array = cspt_icon_library_list();
					foreach($lib_list_array as $lib_id=>$lib_data){
						if( $lib_data['common_class']==$icon_prefix ){
							wp_enqueue_style( $lib_id );
						}
					}
					$icon_html = '<i class="'.esc_attr($icon).'"></i>';
				}

				if( !empty($title) ){
					$footer_box_content[] = '<div class="cspt-footer-contact-info"><div class="cspt-footer-contact-info-inner d-flex align-items-center">
					' . cspt_esc_kses($icon_html) . '
					<div class="cspt-footer-contact-info-wrap"><span class="cspt-label cspt-label-'.esc_attr($x).'">'.esc_html($title).'</span> 			
					<span class="cspt-desc cspt-label-'.esc_attr($x).'"> '.esc_html($desc).'</span>
				</div></div></div>';
				}
			}

			/* Footer Copyright Content area - column class */
			switch( count($footer_box_content) ){
				case 1;
					$footer_box_class = 'col-md-12';
					break;
			}

			if( !empty($footer_box_content) && count($footer_box_content)>0 ){
				$x = 1;
				foreach( $footer_box_content as $content ){
					if( !empty($title) ){
						echo cspt_esc_kses('<div class="cspt-footer-boxes cspt-footer-boxes-'.$x.' '.esc_attr($footer_box_class).'">'.cspt_esc_kses($content).'</div>');
						$x++;
					}
				}
			}

		}
	}
	}

/**
 * Lightens/darkens a given colour (hex format), returning the altered colour in hex format.7
 * @param str $hex Colour as hexadecimal (with or without hash);
 * @percent float $percent Decimal ( 0.2 = lighten by 20%(), -0.4 = darken by 40%() )
 * @return str Lightened/Darkend colour as hexadecimal (with hash);
 */
if( !function_exists('cspt_color_luminance') ) {
function cspt_color_luminance( $hex='#ff0000', $percent='0.1' ) {
	$hex = preg_replace( '/[^0-9a-f]/i', '', $hex );
	$new_hex = '#';
	if ( strlen( $hex ) < 6 ) {
		$hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
	}
	// convert to decimal and change luminosity
	for ($i = 0; $i < 3; $i++) {
		$dec = hexdec( substr( $hex, $i*2, 2 ) );
		$dec = min( max( 0, $dec + $dec * $percent ), 255 );
		$dec = round($dec, 0); // round off and remove decimals
		$new_hex .= str_pad( dechex( $dec ) , 2, 0, STR_PAD_LEFT );
	}
	return $new_hex;
}
}

/*
 *  Main logo
 */
if( !function_exists('cspt_logo') ) {
function cspt_logo( $inneronly='' ) {
	$return				= '';
	$logo_img			= '';
	$main_logo			= cspt_get_base_option('logo');
	$sticky_logo		= cspt_get_base_option('sticky-logo');
	$responsive_logo	= cspt_get_base_option('responsive-logo');
	if( !empty($main_logo) ){
		$logo_img .= '<img class="cspt-main-logo" src="'.esc_url($main_logo).'" alt="' . get_bloginfo( 'name' ) . '" title="' . get_bloginfo( 'name' ) . '" />';
	}
	if( !empty($sticky_logo) ){
		$logo_img .= '<img class="cspt-sticky-logo" src="'.esc_url($sticky_logo).'" alt="' . get_bloginfo( 'name' ) . '" title="' . get_bloginfo( 'name' ) . '" />';
	}
	if( !empty($responsive_logo) ){
		$logo_img .= '<img class="cspt-responsive-logo" src="'.esc_url($responsive_logo).'" alt="' . get_bloginfo( 'name' ) . '" title="' . get_bloginfo( 'name' ) . '" />';
	}
	if( !empty($logo_img) ){
		if( $inneronly=='yes' ){
			$return .= '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . cspt_esc_kses($logo_img) . '</a>';
		} else {
			$return .= ( is_front_page() ) ? '<h1 class="site-title">' : '<div class="site-title">' ;
			$return .= '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home">';
			$return .= ( is_front_page() ) ? '<span class="site-title-text">' . get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' ) . '</span>' : '' ;
			$return .= cspt_esc_kses($logo_img);
			$return .= '</a>';
			$return .= ( is_front_page() ) ? '</h1>' : '</div>' ;
		}
	}
	return cspt_esc_kses($return);
}
}

/*
 *  HTML Filter
 */
if( !function_exists('cspt_esc_kses') ) {
function cspt_esc_kses( $html = '' ) {
	$return = '';
	$allowed_html = array(
		'p'	=> array(
			'class'		=> array(),
			'id'		=> array(),
		),
		'noscript'	=> array(),
		'a'			=> array(
			'class'			=> array(),
			'href'			=> array(),
			'title'			=> array(),
			'target'		=> array(),
			'rel'			=> array(),
			'data-sortby'	=> array(),
		),
		'button'	=> array(
			'class'		=> array(),
			'href'		=> array(),
			'title'		=> array(),
		),
		'ul'		=> array(
			'class'		=> array(),
		),
		'ol'		=> array(
			'class'		=> array(),
		),
		'li'		=> array(
			'class'			=> array(),
			'data-content'	=> array(),
		),
		'br'		=> array(),
		'em'		=> array(),
		'strong'	=> array(),
		'i'			=> array(
			'class'		=> array(),
			'style'		=> array(),
		),
		'small'	=> array(
			'name'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'div'		=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
			'role'			=> array(),
			'data-bg'		=> array(),
			'data-iconset'	=> array(),
			'data-icon'		=> array(),
			'data-show'		=> array(),
			'data-cpt'		=> array(),
			'data-totalpagination'	=> array(),
			'data-style'	=> array(),
			'data-columns'	=> array(),
			'data-appear-animation'	=> array(),
			'data-from'			=> array(),
			'data-to'			=> array(),
			'data-interval'		=> array(),
			'data-before'		=> array(),
			'data-before-style'	=> array(),
			'data-after'		=> array(),
			'data-after-style'	=> array(),
			'data-digit'		=> array(),
			'data-fill'			=> array(),
			'data-size'			=> array(),
			'data-emptyfill'	=> array(),
			'data-thickness'	=> array(),
			'data-filltype'		=> array(),
			'data-gradient1'	=> array(),
			'data-gradient2'	=> array(),
			'data-loop'			=> array(),
			'data-autoplay'		=> array(),
			'data-center'		=> array(),
			'data-nav'			=> array(),
			'data-dots'			=> array(),
			'data-autoplayspeed'=> array(),
			'data-max'			=> array(),
			'data-margin'		=> array(),
			'data-tag'			=> array(),
			'data-id'			=> array(),
			'data-model-id'		=> array(),
			'data-shortcode-controls'		=> array(),
		),
		'span'		=> array(
			'class'				=> array(),
			'id'				=> array(),
			'style'				=> array(),
			'data-appear-animation'	=> array(),
			'data-from'			=> array(),
			'data-to'			=> array(),
			'data-interval'		=> array(),
			'data-before'		=> array(),
			'data-before-style'	=> array(),
			'data-after'		=> array(),
			'data-after-style'	=> array(),
			'data-digit'		=> array(),
			'data-fill'			=> array(),
			'data-size'			=> array(),
			'data-emptyfill'	=> array(),
			'data-thickness'	=> array(),
			'data-filltype'		=> array(),
			'data-gradient1'	=> array(),
			'data-gradient2'	=> array(),
			'data-percentage-value'	=> array(),
			'data-value'		=> array(),
		),
		'h1'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'h2'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'h3'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'h4'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'h5'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'h6'			=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'header'	=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
		),
		'img'		=> array(
			'class'		=> array(),
			'src'		=> array(),
			'alt'		=> array(),
			'title'		=> array(),
			'width'		=> array(),
			'height'	=> array(),
			'srcset'	=> array(),
			'sizes'		=> array(),
			'data-id'	=> array(),
			'data-srcset' => array(),
			'data-src'	=> array(),
		),
		'time'	=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
			'datetime'	=> array(),
		),
		'iframe'	=> array(
			'class'		=> array(),
			'id'		=> array(),
			'style'		=> array(),
			'width'		=> array(),
			'height'	=> array(),
			'src'		=> array(),
			'frameborder'	=> array(),
			'allow'		=> array(),
			'allowfullscreen'	=> array(),
		),
		'blockquote'	=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'article'	=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'input'	=> array(
			'type'			=> array(),
			'name'			=> array(),
			'value'			=> array(),
			'placeholder'	=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
			'checked'		=> array(),
		),
		'textarea'	=> array(
			'name'			=> array(),
			'value'			=> array(),
			'placeholder'	=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'form'	=> array(
			'name'			=> array(),
			'method'		=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
			'data-id'		=> array(),
			'data-name'		=> array(),
		),
		'label'	=> array(
			'for'			=> array(),
			'name'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'aside'	=> array(
			'name'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'sup'	=> array(
			'class'			=> array(),
		),
		'sub'	=> array(
			'class'			=> array(),
		),
		'pre'	=> array(),
		'table'	=> array(
			'class'			=> array(),
			'style'			=> array(),
			'data-ninja_table_instance'	=> array(),
			'data-footable_id'	=> array(),
			'data-filter-delay'	=> array(),
			'aria-label'	=> array(),
			'id'			=> array(),
			'data-unique_identifier'	=> array(),
		),
		'thead'	=> array(
			'class'			=> array(),
		),
		'tr'	=> array(
			'class'			=> array(),
		),
		'th'	=> array(
			'class'			=> array(),
			'colspan'		=> array(),
			'scope'			=> array(),
		),
		'colgroup'	=> array(
			'class'			=> array(),
		),
		'tfoot'	=> array(
			'class'			=> array(),
		),
		'tbody'	=> array(
			'class'			=> array(),
		),
	);
	if( !empty($html) ){
		$return = wp_kses($html, $allowed_html);
	}
	return $return;
}
}

if ( !function_exists( 'cspt_header_slider' ) ){
function cspt_header_slider(){
	if( is_page() || is_singular() ){
		$slider_type = get_post_meta( get_the_ID(), 'cspt-slider-type', true );
		if( !empty($slider_type) ){
			// Check if Slider Revolution
			if( $slider_type=='revolution-slider' ){
				$slider_slug = get_post_meta( get_the_ID(), 'cspt-revolution-slider', true );
				if( !empty($slider_slug) && function_exists('add_revslider') ){
					echo cspt_esc_kses('<div class="cspt-slider-area">');
					add_revslider( $slider_slug );					
					echo cspt_esc_kses('</div>');
					// slider bottom content
					$below_content = get_post_meta( get_the_ID(), 'cspt-slider-below-content', true );
					if( !empty($below_content) ){
						echo cspt_esc_kses('<div class="container cspt-slider-bottom-section"><div class="row">'.$below_content.'<div class="col-sm-5"></div></div></div>');
					}
				}
			} else if( $slider_type=='custom-code' ){
				$custom_slider_code = get_post_meta( get_the_ID(), 'cspt-custom-slider-code', true );
				if( !empty($custom_slider_code) ){
					echo cspt_esc_kses('<div class="cspt-slider-area">');
					echo do_shortcode( cspt_esc_kses($custom_slider_code) );					
					echo cspt_esc_kses('</div>');
				}
			}
		}
	}
}
}

if ( !function_exists( 'cspt_get_featured_data' ) ){
function cspt_get_featured_data( $settings = array() ){
	$return				= '';
	$post_id			= ( !empty($settings['post_id']) ) ? $settings['post_id'] : get_the_ID() ;
	$post_type			= get_post_type();
	$get_post_format	= get_post_format( $post_id );
	$post_format		= ( !empty( $get_post_format ) ) ? $get_post_format : 'standard' ;
	$featured_img_only	= ( isset($settings['featured_img_only']) && $settings['featured_img_only']==true ) ? true : false ;
	$image_size			= ( !empty($settings['size']) ) ? $settings['size'] : 'full' ;
	// for portfolio
	if( is_singular('cspt-portfolio') ){
		$post_format = get_post_meta( $post_id, 'cspt-featured-type', true );
		$post_format = ($post_format=='slider') ? 'gallery' : $post_format ;
	}
	if( $featured_img_only==true || !in_array($post_format, array('audio', 'video', 'gallery', 'quote', 'link')) ){
		if ( has_post_thumbnail( $post_id ) ) {
			if( !is_singular() ) { $return .= '<a href="' . get_permalink( $post_id ) . '">'; }
			$return .= get_the_post_thumbnail( $post_id, $image_size );
			if( !is_singular() ) { $return .= '</a>'; }
		};
	} else {

		switch( $post_format ){

			case 'audio' :
				$audio_code = get_post_meta( $post_id, 'cspt-pformat-audio', true );
				if( is_singular('cspt-portfolio') ){
					$audio_code = get_post_meta( $post_id, 'cspt-audio-url', true );
				}
				$attr = array(
					'width'		=> 725,
					'height'	=> 400
				);
				$return .= wp_oembed_get( $audio_code, $attr );
				break;

			case 'video' :
				$video_code = get_post_meta( $post_id, 'cspt-pformat-video', true );
				if( is_singular('cspt-portfolio') ){
					$video_code = get_post_meta( $post_id, 'cspt-video-url', true );
				}
				$attr = array(
					'width'		=> 725,
					'height'	=> 400
				);
				$return .= wp_oembed_get( $video_code, $attr );
				break;

			case 'gallery' :
				// Enqueue scripts and styles
				wp_enqueue_script( 'lightslider' );
				wp_enqueue_style( 'lightslider' );
				$images = get_post_meta( $post_id, 'cspt-photo-gallery', true );
				$images_pformat = get_post_meta( $post_id, 'cspt-pformat-gallery', true );
				if( !empty($images_pformat) ){
					$images = $images_pformat;
				}
				if( !empty($images) ){
					$images_array = explode(',',$images);
					foreach( $images_array as $image_id ){
						$return .= '<div class="cspt-gallery-image">'.wp_get_attachment_image($image_id, $image_size).'</div>';
					}
				}
				if( !empty($return) ){
					$return = '<div class="cspt-gallery">'.$return.'</div>';
				}
				break;

			case 'quote' :
				$name		= get_post_meta( $post_id, 'cspt-pformat-quote-source-name', true );
				$url		= get_post_meta( $post_id, 'cspt-pformat-quote-source-url', true );
				$content	= get_the_content();
				if( !empty($url) && !empty($name) ){
					$name = '<a href="'.$url.'">'.$name.'</a>';
				}
				if( !empty($name) ){
					$name = '<div class="cspt-block-quote-citation">'.$name.'</div>';
				}
				if( !empty($content) ){
					$return .= '<div class="cspt-block-quote-content">'.nl2br($content) . $name .'</div>';
				}
				if( !empty($return) ){
					if( has_post_thumbnail($post_id) ){
						$bg_src = get_the_post_thumbnail_url($post_id);
						if( !empty($bg_src) ){
							cspt_inline_css( '.cspt-block-quote-wrapper-' . esc_attr($post_id) . '{background-image:url(\'' . esc_url($bg_src) . '\');}' );
						}
					}
					if( strpos($return, '<blockquote') === false ){
						$return = '<blockquote class="cspt-block-quote">'.$return.'</blockquote>';
					}
					$return = '<div class="cspt-block-quote-wrapper cspt-block-quote-wrapper-'.$post_id.'">'.$return.'</div>';
				}
				break;

			case 'link' :
				$link		= get_post_meta( $post_id, 'cspt-pformat-link-url', true );
				$title		= get_post_meta( $post_id, 'cspt-pformat-link-title', true );
				if( empty($title) ){ $title = get_post_meta( $post_id, 'cspt-pformat-link-url', true ); }

				if( !empty($link) ){
					$return = '<a href="'.$link.'">'.$title.'</a>';
				}
				if( !empty($return) ){
					if( has_post_thumbnail($post_id) ){
						$bg_src = get_the_post_thumbnail_url($post_id);
						if( !empty($bg_src) ){
							cspt_inline_css( '.cspt-link-wrapper-' . esc_attr($post_id) . '{background-image:url(\'' . esc_url($bg_src) . '\');}' );
						}
					}
					$return = '<div class="cspt-link-wrapper cspt-link-wrapper-'.$post_id.'"><div class="cspt-link-inner">'.$return.'</div></div>';
				}
				break;

		}

	}
	if( !empty($return) ){
		$return = '<div class="cspt-featured-wrapper">'.$return.'</div>';
		echo cspt_esc_kses($return);
	}
}
}

if ( !function_exists( 'cspt_hex2rgb' ) ){
function cspt_hex2rgb($color, $opacity='1'){
    $default = 'rgb(0,0,0)';
    if (empty($color))
        return $default;
    if ($color[0] == '#')
        $color = substr($color, 1);
    if (strlen($color) == 6)
        $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
    elseif (strlen($color) == 3)
        $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
    else
        return $default;
    $rgb = array_map('hexdec', $hex);
    if ($opacity) {
        if (abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
    } else {
        $output = 'rgb(' . implode(",", $rgb) . ')';
    }
    return $output;
}
}

if ( !function_exists( 'cspt_hex2rgb_code' ) ){
function cspt_hex2rgb_code($color){
	$default = 'rgb(0,0,0)';
	if (empty($color))
		return $default;
	if ($color[0] == '#')
		$color = substr($color, 1);
	if (strlen($color) == 6)
		$hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
	elseif (strlen($color) == 3)
		$hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
	else
		return $default;
	$rgb = array_map('hexdec', $hex);
	return implode(", ", $rgb);
}
}

if( !function_exists('cspt_element_block_container') ){
function cspt_element_block_container( $settings = array( 'position' => 'start', 'column' => '3', 'cpt' => 'blog', 'taxonomy' => 'category', 'style' => '1', 'odd_even' => '', 'col_odd_even' => '' ) ){
	$return = '';
	$cpt	= ( !empty($settings['cpt']) ) ? $settings['cpt'] : 'blog' ;
	$style	= ( !empty($settings['style']) ) ? $settings['style'] : '1' ;
	$terms	= '';
	if( !empty($settings['taxonomy']) ){
		$terms = get_the_terms( get_the_ID(), $settings['taxonomy'] );
	}
	$odd_even_class = '';
	if( !empty($settings['odd_even']) ){
		$odd_even_class = 'cspt-' . $settings['odd_even'] ;
	}
	$col_odd_even_class = '';
	if( !empty($settings['col_odd_even']) ){
		$col_odd_even_class = 'cspt-col-' . $settings['col_odd_even'] ;
	}
	$term_slug = '';
	if( is_array($terms) && count($terms)>0 ){
		foreach( $terms as $term ){
			$term_slug .= $term->slug.' ';
		}
		$term_slug = trim($term_slug);
	}

	$style_class = 'cspt-'.$cpt.'-style-'.$style;

	$column_class = '';

	if( $settings['position']=='start' ){
		switch( $settings['column'] ){
			case '1':
				$column_class = 'col-md-12';
			break;
			case '2':
				$column_class = 'col-md-6';
			break;
			case '3':
				$column_class = 'col-md-4';
			break;
			case '4':
				$column_class = 'col-md-6 col-lg-3';
			break;
			case '5':
				$column_class = 'col-md-20percent';
			break;
			case '6':
				$column_class = 'col-md-2';
				break;
		}

		$return = '<article class="cspt-ele cspt-ele-'.esc_attr($cpt).' '.esc_attr($style_class).' '.esc_attr($column_class).' '.esc_attr($term_slug).' '.esc_attr($odd_even_class).' '.esc_attr($col_odd_even_class).'">';

	} else {
		$return = '</article>';
	}
	return cspt_esc_kses($return);
}
}

/**
 *
 */
if( !function_exists('cspt_client_hover_img') ){
function cspt_client_hover_img(){
	$return = '';
	$hover_logo = get_post_meta( get_the_ID(), 'cspt-logo-image-for-hover', true );
	if( !empty($hover_logo) ){
		$hover_image = wp_get_attachment_image_src($hover_logo, 'full');
		if( !empty($hover_image[0]) ){
			$return = '<div class="cspt-client-hover-img"><img src="'.esc_url($hover_image[0]).'" alt /></div>';
		}
	}
	return cspt_esc_kses($return);
}
}

if( !function_exists('cspt_client_logo_link') ){
function cspt_client_logo_link( $type='start' ){
	$return = '';
	$link = get_post_meta( get_the_ID(), 'cspt-logo-link', true );
	if( !empty($link['url']) ){
		if( $type=='start' ){
			$target_code = '';
			if( !empty($link['target']) && $link['target']=='_blank' ){ $target_code = ' target="_blank"'; }
			$return = '<a href="' . esc_url($link['url']) . '" title="' . esc_attr($link['title']) . '"' . $target_code . '>';
		} else {
			$return = '</a>';
		}
	}
	echo cspt_esc_kses($return);
}
}

/*
 *  Titlebar Breadcrumb
 */
if( !function_exists('cspt_titlebar_breadcrumb') ){
function cspt_titlebar_breadcrumb(){
	$return = '';
	$hide_breadcrumb = cspt_get_base_option('titlebar-hide-breadcrumb');
	if(function_exists('bcn_display') && $hide_breadcrumb!=true ){
		$return = '<div class="cspt-breadcrumb"><div class="cspt-breadcrumb-inner">' . bcn_display(true) . '</div></div>';
	}
	return cspt_esc_kses($return);
}
}

if( !function_exists('cspt_check_sticky_logo_class') ){
function cspt_check_sticky_logo_class(){
	$sticky_logo = cspt_get_base_option('sticky-logo');
	if( !empty($sticky_logo) ){
		echo esc_attr('cspt-sticky-logo-yes');
	} else {
		echo esc_attr('cspt-sticky-logo-no');
	}
}
}

if( !function_exists('cspt_titlebar_headings') ){
function cspt_titlebar_headings(){
	$title		= get_the_title();
	$subtitle	= '';
	if( is_singular() || is_home() ){
		if( is_home() || is_singular('post') ){
			$page_id	= get_option( 'page_for_posts' );
			$title		= esc_attr__( 'Blog', 'leblix' );  // Setting for Titlebar title
			if( is_singular('post') ){
				$title		= get_the_title();  // Setting for Titlebar title
			}
		} else if( is_singular('cspt-team-member') ){
			$page_id	= get_the_ID();
			$cpt_title	= cspt_get_base_option('team-cpt-singular-title');
			$title		= sprintf( esc_attr__( '%1$s ', 'leblix' ), $cpt_title );  // Setting for Titlebar title
		} else {
			$page_id	= get_the_ID();
		}
		$single_title		= get_post_meta( $page_id, 'cspt-titlebar-title', true );
		$single_subtitle	= get_post_meta( $page_id, 'cspt-titlebar-subtitle', true );
		$title				= ( !empty($single_title) )		? trim($single_title)		: $title ;
		$subtitle			= ( !empty($single_subtitle) )	? trim($single_subtitle)	: $subtitle ;
		// Single post custom title and subtitle
		if( is_home() || is_singular('post') ){
			$current_single_title		= get_post_meta( get_the_ID(), 'cspt-titlebar-title', true );
			$current_single_subtitle	= get_post_meta( get_the_ID(), 'cspt-titlebar-subtitle', true );
			$title				= ( !empty($current_single_title) )		? trim($current_single_title)		: $title ;
			$subtitle			= ( !empty($current_single_subtitle) )	? trim($current_single_subtitle)	: $subtitle ;
		}
		if( function_exists('is_woocommerce') && is_woocommerce() ){ // WooCommerce
			$title	= cspt_get_base_option('wc-title');
			$subtitle = '';
		}
	} else if( function_exists('is_woocommerce') && is_woocommerce() && !is_product() ){ // WooCommerce
		$title	= cspt_get_base_option('wc-title');
		$subtitle = '';
	} else if( is_category() ){ // Category
		$title = sprintf(
			esc_attr__('Category: %s', 'leblix'),
			esc_attr( single_cat_title( '', false) )
		);
	} else if( is_post_type_archive() ){
		$title = post_type_archive_title('', false);
	} else if( is_author() ){ // Author
		global $post;
		$author_id = $post->post_author;
		$title	   = sprintf(
			esc_attr__('Author: %s', 'leblix'),
			get_the_author_meta( 'display_name', $author_id )
		);
	} else if( is_tax() ){ // Taxonomy
		global $wp_query;
		$tax = $wp_query->get_queried_object();
		$title = esc_attr($tax->name);
	} else if( is_tag() ){ // Tag
		$title = sprintf(
			esc_attr__('Tag: %s','leblix'),
			esc_attr( single_tag_title( '', false) )
		);
	} else if( is_404() ){ // 404
		$title = esc_attr__( 'PAGE NOT FOUND', 'leblix' );
	} else if( is_search()  ){ // Search Results
		$title = sprintf( esc_attr__( 'Search Results for %s', 'leblix' ), ' <span class="cspt-tbar-search-word">' . get_search_query() . '</span>' );
	} else if( is_archive() ){
		$title = esc_attr__( 'Archives', 'leblix' );
	} else {
		$title = get_the_title();
	}
	// return data
	$return  = '';

	$return .= ( !empty($title) ) ? '<h1 class="cspt-tbar-title"> '. do_shortcode($title) . '</h1>' : '' ;
	$return .= ( !empty($subtitle) ) ? '<h3 class="cspt-tbar-subtitle"> '. do_shortcode($subtitle) .'</h3>' : '' ;

	if( $return!='' ){
		$return = '<div class="cspt-tbar"><div class="cspt-tbar-inner container">'.$return.'</div></div>';
	}
	// Return data
	return cspt_esc_kses($return);
}
}

if( !function_exists('cspt_sticky_class') ){
function cspt_sticky_class(){
	$return = '';
	$class = array();
	if( cspt_get_base_option('sticky-header')=='1' ) {
		$class[] = 'cspt-header-sticky-yes';
		$class[] = 'cspt-sticky-type-'. cspt_get_base_option('sticky-type');
	}
	// Sticky
	if( cspt_get_base_option('sticky-header')=='1' ){
		$class[] = 'cspt-sticky-bg-color-'. cspt_get_base_option('sticky-header-bgcolor');
	}
	if( !empty($class) ){
		$return = implode( ' ', $class );
	}
	echo esc_attr($return);
}
}

if( !function_exists('cspt_header_class') ){
function cspt_header_class(){
	$return = '';
	$class = array();
	// Check if sticky logo exists
	$sticky_logo				= cspt_get_base_option('sticky-logo');
	$responsive_logo			= cspt_get_base_option('responsive-logo');
	$responsive_header_bgcolor	= cspt_get_base_option('responsive-header-bgcolor');
	if( !empty($sticky_logo) ){
		$class[] = 'cspt-sticky-logo-yes';
	} else {
		$class[] = 'cspt-sticky-logo-no';
	}
	if( !empty($responsive_logo) ){
		$class[] = 'cspt-responsive-logo-yes';
	} else {
		$class[] = 'cspt-responsive-logo-no';
	}
	if( !empty($responsive_header_bgcolor) ){
		$class[] = 'cspt-responsive-header-bgcolor-'.$responsive_header_bgcolor;
	}
	if( !empty($class) ){
		$return = implode( ' ', $class );
	}
	echo esc_attr($return);
}
}

if( !function_exists('cspt_header_bg_class') ){
function cspt_header_bg_class(){
	$return  = 'cspt-header-wrapper';
	$bgcolor = cspt_get_base_option('header-bgcolor');
	if( !empty($bgcolor) ){
		$return .= ' cspt-bg-color-'. cspt_get_base_option('header-bgcolor');
	}
	echo esc_attr($return);
}
}

if( !function_exists('cspt_header_box_contents') ){
function cspt_header_box_contents( $settings = array() ){
	for( $i=1 ; $i<=3 ; $i++ ){
		$title		= cspt_get_base_option( 'header-box'.$i.'-title' );
		$content	= cspt_get_base_option( 'header-box'.$i.'-content' );
		$link		= cspt_get_base_option( 'header-box'.$i.'-link' );
		$icon		= cspt_get_base_option( 'header-box'.$i.'-icon' );
		if( !empty($icon) ){
			$icon = explode(';',$icon);
			$icon = $icon[0];
			// load icon library
			$icon_array = explode(' ',$icon);
			$icon_prefix = $icon_array[0];
			$lib_list_array = cspt_icon_library_list();
			foreach($lib_list_array as $lib_id=>$lib_data){
				if( $lib_data['common_class']==$icon_prefix ){
					wp_enqueue_style( $lib_id );
				}
			}
		}
		if( !empty($title) || !empty($content) ){
			?>
			<div class="cspt-header-box cspt-header-box-<?php echo esc_attr($i); ?>">
				<?php if( !empty($link) ) : ?><a href="<?php echo esc_url($link); ?>"><?php endif; ?>
					<?php if( !empty($icon) ) : ?><span class="cspt-header-box-icon"><i class="<?php echo esc_attr($icon); ?>"></i></span><?php endif; ?>
					<span class="cspt-header-box-title"><?php echo esc_html($title); ?></span>
					<span class="cspt-header-box-content"><?php echo esc_html($content); ?></span>
				<?php if( !empty($link) ) : ?></a><?php endif; ?>
			</div>
			<?php
		}
	} // for loop
}
}

if( !function_exists('cspt_header_button') ){
function cspt_header_button( $settings = array() ){
	$btn_text  = cspt_get_base_option('header-btn-text');
	$btn_text2 = cspt_get_base_option('header-btn-text2');
	$btn_url   = cspt_get_base_option('header-btn-url');
	if( (!empty($btn_text) || !empty($btn_text2)) && !empty($btn_url) ){
		?>
		<?php if( isset($settings['inneronly']) && $settings['inneronly']=='yes' ){ ?>
			<?php // No wrapper needed ?>
		<?php } else { ?>
			<div class="cspt-header-button">
		<?php } ?>
		<a href="<?php echo esc_url($btn_url); ?>">
			<?php if(!empty($btn_text)) : ?><span class="cspt-header-button-text-1"><?php echo esc_html($btn_text); ?></span><?php endif; ?>

		</a>

		<?php if( isset($settings['inneronly']) && $settings['inneronly']=='yes' ){ ?>
			<?php // No wrapper needed ?>
		<?php } else { ?>
			</div>
		<?php } ?>
		<?php
	}
}
}

//for contact box 

if( !function_exists('cspt_header_button1') ){
	function cspt_header_button1( $settings = array() ){
		$btn_text  = cspt_get_base_option('header-contact-btn-text');
		$btn_text2 = cspt_get_base_option('header-contact-btn-text2');
		$btn_url   = cspt_get_base_option('header-contact-btn-url');
		if( (!empty($btn_text) || !empty($btn_text2)) && !empty($btn_url) ){
			?>
			<?php if( isset($settings['inneronly']) && $settings['inneronly']=='yes' ){ ?>
				<?php // No wrapper needed ?>
			<?php } else { ?>
				<div class="cspt-header-infobox">
			<?php } ?>
			<a href="<?php echo esc_url($btn_url); ?>">
				<?php if(!empty($btn_text)) : ?><span class="cspt-header-btn-text-1"><?php echo esc_html($btn_text); ?></span><?php endif; ?>
				<?php if(!empty($btn_text2)) : ?><span class="cspt-header-btn-text-2"><?php echo esc_html($btn_text2); ?></span><?php endif; ?>
			</a>

			<?php if( isset($settings['inneronly']) && $settings['inneronly']=='yes' ){ ?>
				<?php // No wrapper needed ?>
			<?php } else { ?>
				</div>
			<?php } ?>
			<?php
		}
	}
	}

if( !function_exists('cspt_header_search') ){
function cspt_header_search(){
	$header_search = cspt_get_base_option('header-search');
	if( !empty($header_search) && $header_search=='1' ){
		?>
		<div class="cspt-header-search-btn"><a href="#"><i class="cspt-base-icon-search-2"></i></a></div>
		<?php
	}
}
}

if( !function_exists('cspt_nav_class') ){
function cspt_nav_class(){
	$return = '';
	$main_active_link_color = cspt_get_base_option('main-menu-active-color');
	$drop_active_link_color = cspt_get_base_option('drop-down-menu-active-color');
	if( !empty($main_active_link_color) ){
		$return .= ' cspt-main-active-color-'.$main_active_link_color;
	}
	if( !empty($drop_active_link_color) ){
		$return .= ' cspt-dropdown-active-color-'.$drop_active_link_color;
	}
	echo esc_attr($return);
}
}

if( !function_exists('cspt_preheader_class') ){
function cspt_preheader_class(){
	$return = '';
	$bgcolor = cspt_get_base_option('preheader-bgcolor');
	$textcolor = cspt_get_base_option('preheader-text-color');
	if( !empty($bgcolor) ){
		$return .= ' cspt-bg-color-'.$bgcolor;
	}
	if( !empty($textcolor) ){
		$return .= ' cspt-color-'.$textcolor;
	}
	echo esc_attr($return);
}
}

if( !function_exists('cspt_footer_classes') ){
function cspt_footer_classes(){
	$return = '';
	$textcolor = cspt_get_base_option('footer-text-color');
	if( !empty($textcolor) ){
		$return .= '  cspt-text-color-'.$textcolor;
	}
	$bgcolor = cspt_get_base_option('footer-bgcolor');
	if( !empty($bgcolor) ){
		$return .= ' cspt-bg-color-'.$bgcolor;
	}
	$background = cspt_get_base_option('footer-background');
	if( !empty($background['background-image']) ){
		$return .= ' cspt-bg-image-yes';
	}
	$footer_right_content = cspt_get_base_option('footer-copyright-right-content');
	if( !empty($footer_right_content) ){
		if( $footer_right_content == 'footer-menu' ){
			if ( has_nav_menu( 'creativesplanet-footer' ) ){
				$return .= ' cspt-footer-with-right cspt-footer-menu-yes';
			} else {
				$return .= ' cspt-footer-menu-no';
			}
		} else {
			$return .= ' cspt-footer-with-right cspt-footer-right-' . esc_attr($footer_right_content);
		}
	}
	$footer_widget_columns	= cspt_footer_widget_columns(); // array
	if( $footer_widget_columns[0]==false ){
		$return .= ' cspt-footer-widget-no';
	} else {
		$return .= ' cspt-footer-widget-yes';
	}
	echo esc_attr($return);
}
}

if( !function_exists('cspt_footer_widget_classes') ){
function cspt_footer_widget_classes(){
	$return = '';
	$textcolor = cspt_get_base_option('footer-widget-text-color');
	$switch    = cspt_get_base_option('footer-widget-color-switch');
	if( !empty($textcolor) && $switch=='1' ){
		$return .= ' cspt-color-'.$textcolor;
	}
	$bgcolor = cspt_get_base_option('footer-widget-bgcolor');
	if( !empty($bgcolor) ){
		$return .= ' cspt-bg-color-'.$bgcolor;
	}
	$background = cspt_get_base_option('footer-widget-background');
	if( !empty($background['background-image']) ){
		$return .= ' cspt-bg-image-yes';
	}
	echo esc_attr($return);
}
}

if( !function_exists('cspt_footer_widget_columns') ){
function cspt_footer_widget_columns(){
	$return			= array(false, false, false);
	$widget_exists	= false;
	$footer_column	= cspt_get_base_option('footer-column');
	$footer_column	= ( empty($footer_column) ) ? '3-3-3-3' : $footer_column ;
	if( $footer_column=='custom' ){
		$footer_column_1	= cspt_get_base_option('footer-1-col-width');
		$footer_column_2	= cspt_get_base_option('footer-2-col-width');
		$footer_column_3	= cspt_get_base_option('footer-3-col-width');
		$footer_column_4	= cspt_get_base_option('footer-4-col-width');
		$footer_column_array = array();
		if( !empty($footer_column_1) && $footer_column_1!='hide' ){ $footer_column_array[] = 'yes'; }
		if( !empty($footer_column_2) && $footer_column_2!='hide' ){ $footer_column_array[] = 'yes'; }
		if( !empty($footer_column_3) && $footer_column_3!='hide' ){ $footer_column_array[] = 'yes'; }
		if( !empty($footer_column_4) && $footer_column_4!='hide' ){ $footer_column_array[] = 'yes'; }
		if( count($footer_column_array)=='1' ){
			$footer_column = '12';
		} else if( count($footer_column_array)=='2' ){
			$footer_column = '6-6';
		} else if( count($footer_column_array)=='3' ){
			$footer_column = '4-4-4';
		} else if( count($footer_column_array)=='4' ){
			$footer_column = '3-3-3-3';
		}
	}
	if( !empty($footer_column) ){
		$footer_columns	= explode('-', $footer_column );
		// Checking if widget exists
		if( is_array($footer_columns) && count($footer_columns)>0 ){
			$col = 1;
			foreach( $footer_columns as $column ){
				if ( is_active_sidebar( 'cspt-footer-'.$col ) ){
					$widget_exists = true;
				}
				$col++;
			} // end foreach
		}
		$return = array( $widget_exists, $footer_columns, $footer_column );
	}
	return $return;
}
}

if( !function_exists('cspt_footer_copyright_classes') ){
function cspt_footer_copyright_classes(){
	$return = '';
	$textcolor = cspt_get_base_option('footer-copyright-text-color');
	$switch    = cspt_get_base_option('footer-copyright-color-switch');
	if( !empty($textcolor) && $switch=='1' ){
		$return .= ' cspt-color-'.$textcolor;
	}
	$bgcolor = cspt_get_base_option('footer-copyright-bgcolor');
	if( !empty($bgcolor) ){
		$return .= ' cspt-bg-color-'.$bgcolor;
	}
	$background = cspt_get_base_option('footer-copyright-background');
	if( !empty($background['background-image']) ){
		$return .= ' cspt-bg-image-yes';
	}
	echo esc_attr($return);
}
}

if( !function_exists('cspt_all_options_values') ){
function cspt_all_options_values( $for='typography', $admin=false ) {
	$return			= '';
	$css_code		= '';
	include( get_template_directory() . '/includes/customizer-options.php' );
	foreach( $kirki_options_array as $options_key=>$options_val ){
		if( !empty( $options_val['section_fields'] ) ){
			foreach( $options_val['section_fields'] as $key=>$option ){
				if( !empty($option['type']) && $option['type']==$for && !empty($option['default']) && !empty($option['cspt-output']) ){
					$class		= $option['cspt-output'];
					$css_code	= '';
					$values = cspt_get_base_option( $option['settings'] );
					foreach( $values as $key=>$val ){
						if( !empty($val) & $key != 'font-weight' ){
							if( $key == 'background-image' ){
								$val = 'url("'.$val.'")';
							} else if( $key == 'font-family' ){
								$val = trim($val);
								if( substr($val, -1)!=',' ){ $val = $val.','; }
								$val = $val.'sans-serif';
							} else if( $key == 'variant' ){
								$key = 'font-weight';
								if( $val == 'regular' ){
									$val = 'normal';
								}
							}
							$css_code .= $key.':'.$val.';';
						}
					}
					if($admin==true){
						if( $class=='body' ){
							$class = $class.esc_attr('#tinymce.wp-editor');
						} else {
							$class = esc_attr('body#tinymce.wp-editor ').$class;
						}
					}
					$return .= $class.'{'.$css_code.'}';
				}
			}
		}
	}
	return $return;
}
}

if( !function_exists('cspt_titlebar_class') ){
function cspt_titlebar_class(){
	$return = '';
	$bgcolor = cspt_get_base_option('titlebar-bgcolor');
	if( !empty($bgcolor) ){
		$return .= ' cspt-bg-color-'.$bgcolor;
	}
	$background = cspt_get_base_option('titlebar-background');
	if( !empty($background['background-image']) ){
		$return .= ' cspt-bg-image-yes';
	}
	$style = cspt_get_base_option('titlebar-style');
	if( !empty($style) ){
		$return .= ' cspt-titlebar-style-'.$style;
	}
	echo esc_attr($return);
}
}

if( !function_exists('cspt_pagination') ){
function cspt_pagination($wp_query_data=false){
	if( $wp_query_data==false ){
		global $wp_query;
	} else {
		$wp_query = $wp_query_data;
	}
	$return  = '';
	$return .= cspt_esc_kses('<div class="clearfix"></div>');
	$big     = 999999999; // need an unlikely integer

	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}

	$pagination = paginate_links( array(
		'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format'    => '?paged=%#%',
		'current'   => max( 1, $paged ),
		'total'     => $wp_query->max_num_pages,
		'type'      => 'array',
		'prev_text' => cspt_esc_kses('<i class="cspt-base-icon-left-open"></i>'),
		'next_text' => cspt_esc_kses('<i class="cspt-base-icon-right-open"></i>'),
	) );
	if( $pagination!=NULL ){
		$big = 999999999; // need an unlikely integer
		$return .= '<div class="cspt-pagination"><div class="nav-links">';
		$return .= paginate_links( array(
			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'    => '?paged=%#%',
			'current'   => max( 1, $paged ),
			'total'     => $wp_query->max_num_pages,
			'prev_text' => cspt_esc_kses('<i class="cspt-base-icon-left-open"></i>'),
			'next_text' => cspt_esc_kses('<i class="cspt-base-icon-right-open"></i>'),
		) );
		$return .= '</div></div><!-- .cspt-pagination -->';
	}
	echo cspt_esc_kses($return);
}
}

if( !function_exists('cspt_meta_author') ){
function cspt_meta_author(){
	$author_name = get_the_author();
	if( empty($author_name) ){
		global $post;
		$author_name = get_userdata($post->post_author);
		$author_name = $author_name->display_name;
	}
	return '<span class="cspt-meta cspt-meta-author"><a class="cspt-author-link" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="cspt-base-icon-user-1"></i>' . esc_html($author_name) . '</a></span>';
}
}

if( !function_exists('cspt_meta_date') ){
function cspt_meta_date( $date_format='', $optional=false ){
	$return = '';
	if( $optional==false || ( $optional==true && !defined('LEBLIX_ADDON_VERSION') ) ){
		if( empty($date_format) ){
			$date_format = get_option('date_format');
		}
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = sprintf( '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated cspt-hide" datetime="%3$s">%4$s</time>',
				esc_attr( get_the_date( 'c' ) ),
				get_the_date( $date_format ),
				esc_attr( get_the_modified_date( 'c' ) ),
				get_the_modified_date( $date_format )
			);
		} else {
			$time_string = sprintf( '<time class="entry-date published updated" datetime="%1$s">%2$s</time>',
				esc_attr( get_the_date( 'c' ) ),
				get_the_date( $date_format ) // ,
			);
		}
		$return = '<span class="cspt-meta cspt-meta-date"><i class="cspt-base-icon-calendar-2"></i><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . cspt_esc_kses($time_string) . '</a></span>';
	}
	return $return;
}
}

if( !function_exists('cspt_meta_category') ){
function cspt_meta_category( $separator = ', ' ){
	$return = '';
	$categories_list = get_the_category_list( $separator );
	if ( !empty($categories_list) ){
		$return = '<span class="cspt-meta cspt-meta-cat"><i class="cspt-base-icon-folder-open-empty"></i> ' . cspt_esc_kses($categories_list) . '</span>';
	}
	return $return;
}
}

if( !function_exists('cspt_meta_tag') ){
function cspt_meta_tag( $separator = ', ', $title='' ){
	$return		= '';
	$tags_list	= get_the_tag_list( $title.' ' , $separator );
	if ( !empty($tags_list) ) {
		$return = '<span class="cspt-meta cspt-meta-tags"> ' . cspt_esc_kses($tags_list) . '</span>';
	}
	return $return;
}
}

if( !function_exists('cspt_meta_comment') ){
function cspt_meta_comment( $hide_zero=false ){
	$return = '';
	$comments_number = get_comments_number();
	if ( !post_password_required() && comments_open() ) {
		$return = '<span class="cspt-meta cspt-meta-comments cspt-comment-bigger-than-zero"><i class="cspt-base-icon-comment-empty"></i> ' . get_comments_number_text( esc_attr__('No Comments','leblix'), esc_attr__('One Comment','leblix'), esc_attr__('% Comments','leblix') ) . '</span>';
	}
	return $return;
}
}

if( !function_exists('cspt_author_social_links') ){
function cspt_author_social_links(){
	$return = '';
	$social_list = array(
		'twitter'	=>	array(
			'name'			=> esc_attr('Twitter'),
			'link'			=> get_the_author_meta( 'twitter' ),
		),
		'facebook'	=>	array(
			'name'			=> esc_attr('Facebook'),
			'link'			=> get_the_author_meta( 'facebook' ),
		),
		'linkedin'	=>	array(
			'name'			=> esc_attr('LinkedIn'),
			'link'			=> get_the_author_meta( 'linkedin' ),
		),
		'google_plus'	=>	array(
			'name'			=> esc_attr('Google +'),
			'link'			=> get_the_author_meta( 'gplus' ),
		),
	);
	foreach( $social_list as $social_id => $social_data ){
		if( !empty($social_data['link']) ){
			$return .= '<li class="cspt-author-social-li cspt-author-social-'.esc_attr($social_id).'"><a href="'. esc_url($social_data['link']) .'" target="_blank"><i class="creativesplanet-base-icon-twitter"></i><span class="creativesplanet-hide">'. esc_attr($social_data['name']) .'</span></a></li>';
		}
	}
	if( !empty($return) ){
		$return = '<div class="cspt-author-social-icons"><ul class="cspt-author-social-ul">' . $return . '</ul> <!-- .cspt-author-social-ul -->  </div> <!-- .cspt-author-social-icons -->';
	}
	// Return data
	return cspt_esc_kses($return);
}
}

if( !function_exists('cspt_comments_list_template') ){
function cspt_comments_list_template($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag		= 'div';
        $add_below	= 'comment';
    } else {
        $tag		= 'li';
        $add_below	= 'div-comment';
    }?>
    <<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="cspt-comment"><?php
    } ?>
		<div class="cspt-comment-avatar"><?php
            if ( $args['avatar_size'] != 0 ) {
                echo get_avatar( $comment, $args['avatar_size'] );
            } ?>
        </div>
		<div class="cspt-comment-content">
			<div class="cspt-comment-meta">
				<span class="cspt-comment-author"><?php echo get_comment_author_link(); ?></span>
				<span class="cspt-comment-date">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php printf( esc_attr_x( '%1$s ago', '%1$s = human-readable time difference', 'leblix' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
					</a>
					<?php edit_comment_link( esc_attr__( '(Edit)', 'leblix' ), '  ', '' ); ?>
				</span>
			</div>
			<?php
			if ( $comment->comment_approved == '0' ) { ?>
				<em class="cspt-comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'leblix' ); ?></em><br/><?php
			} ?>
			<?php comment_text(); ?>
			<div class="reply"><?php
					comment_reply_link(
						array_merge(
							$args,
							array(
								'add_below' => $add_below,
								'depth'     => $depth,
								'max_depth' => $args['max_depth']
							)
						)
					); ?>
			</div>
		</div>
	<?php
    if ( 'div' != $args['style'] ) : ?>
        </div><?php
    endif;
	?>
	<?php
}
}

if( !function_exists('cspt_portfolio_details_list') ){
function cspt_portfolio_details_list() {
	$return = '';
	$lines = cspt_get_base_option('portfolio-details');
	$title = cspt_get_base_option('portfolio-details-title');
	if( !empty($lines) ){
		foreach( $lines as $line ){
			$line_id = trim($line['line_title']);
			$line_id = str_replace( ' ', '_', $line_id );
			$line_id = sanitize_html_class( strtolower( $line_id ) ) ;
			// Data
			if( $line['line_type']=='category-link' ){
				$line_data = get_the_term_list( get_the_ID(), 'cspt-portfolio-category', '', ', ' );
			} else if( $line['line_type']=='category' ){
				$line_data = strip_tags( get_the_term_list( get_the_ID(), 'cspt-portfolio-category', '', ', ' ) );
			} else {
				$line_data = get_post_meta( get_the_ID(), 'cspt-portfolio-details_'.$line_id, true );
			}
			if( !empty($line_data) ){
				$return .= '<li class="cspt-portfolio-line-li"> <span class="cspt-portfolio-line-title">' . esc_attr($line['line_title']) . ': </span> <span class="cspt-portfolio-line-value">' . cspt_esc_kses($line_data) . '</span></li>';
			}
		}
	}
	if( !empty($return) ){
		$return = '<div class="cspt-portfolio-lines-wrapper"><ul class="cspt-portfolio-lines-ul">' . $return . '</ul></div>';
	}
	if( !empty($title) ){
		$return = '<h3>' . esc_html($title) . '</h3> ' . $return;
	}
	echo cspt_esc_kses($return);
}
}

if( !function_exists('cspt_related_portfolio') ){
function cspt_related_portfolio() {
	$return			= '';
	$related_title	= cspt_get_base_option('portfolio-show-related');
	if($related_title==true){
		$related_title	= cspt_get_base_option('portfolio-related-title');
		$show			= cspt_get_base_option('portfolio-related-count');
		$columns		= cspt_get_base_option('portfolio-related-column');
		$style			= cspt_get_base_option('portfolio-related-style');
		// Title
		if( !empty($related_title) ){
			$related_title = '<h3 class="cspt-related-title">'.$related_title.'</h3>';
		}
		$terms = wp_get_post_terms( get_the_ID(), 'cspt-portfolio-category' );
		$term_list = array();
		if( !empty($terms) ){
			foreach( $terms as $term ){
				$term_list[] = $term->slug;
			}
		}
		// Preparing $args
		$args = array(
			'post_type'				=> 'cspt-portfolio',
			'orderby'				=> 'rand',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
			'post__not_in'			=> array( get_the_ID() ),
			'tax_query'				=> array(
				array(
					'taxonomy' => 'cspt-portfolio-category',
					'field'    => 'slug',
					'terms'    => $term_list,
				),
			),
		);
		// Wp query to fetch posts
		$posts = new WP_Query( $args );
		$i = 1;
		if ( $posts->have_posts() ) {
			$return .= '<div class="cspt-element-posts-wrapper row multi-columns-row">';
			while ( $posts->have_posts() ) {
				$posts->the_post();
				$class = $i%2 ? 'cspt-odd':'cspt-even';
				// Template
				if( file_exists( locate_template( '/theme-parts/portfolio/portfolio-style-'.esc_attr($style).'.php', false, false ) ) ){
					$return .= cspt_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $columns,
						'cpt'		=> 'portfolio',
						'taxonomy'	=> 'cspt-portfolio-category',
						'style'		=> $style,
					) );
					ob_start();
					include( locate_template( '/theme-parts/portfolio/portfolio-style-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();
					$return .= cspt_element_block_container( array(
						'position'	=> 'end',
					) );
				}
				$i++;
			}
			$return .= '</div>';
		}
		/* Restore original Post Data */
		wp_reset_postdata();
	}
	// Output
	if( !empty($return) ){
		echo '<div class="cspt-portfolio-related">';
			echo cspt_esc_kses($related_title);
			echo cspt_esc_kses($return);
		echo '</div>';
	}
}
}

if( !function_exists('cspt_related_service') ){
function cspt_related_service() {
	$return			= '';
	$related_title	= cspt_get_base_option('service-show-related');

	if($related_title==true){

		$related_title	= cspt_get_base_option('service-related-title');
		$show			= cspt_get_base_option('service-related-count');
		$columns			= cspt_get_base_option('service-related-column');
		$style			= cspt_get_base_option('service-related-style');
		// Title
		if( !empty($related_title) ){
			$related_title = '<h3 class="cspt-related-title">'.$related_title.'</h3>';
		}

		$terms = wp_get_post_terms( get_the_ID(), 'cspt-service-category' );
		$term_list = array();
		if( !empty($terms) ){
			foreach( $terms as $term ){
				$term_list[] = $term->slug;
			}
		}

		// Preparing $args
		$args = array(
			'post_type'				=> 'cspt-service',
			'orderby'				=> 'rand',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
			'post__not_in'			=> array( get_the_ID() ),
			'tax_query'				=> array(
				array(
					'taxonomy' => 'cspt-service-category',
					'field'    => 'slug',
					'terms'    => $term_list,
				),
			),
		);

		// Wp query to fetch posts
		$posts = new WP_Query( $args );
		$i = 1;
		if ( $posts->have_posts() ) {

			$return .= '<div class="cspt-element-posts-wrapper row multi-columns-row">';

			while ( $posts->have_posts() ) {
				$posts->the_post();
				$class = $i%2 ? 'cspt-odd':'cspt-even';

				// Template
				if( file_exists( locate_template( '/theme-parts/service/service-style-'.esc_attr($style).'.php', false, false ) ) ){

					$return .= cspt_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $columns,
						'cpt'		=> 'service',
						'taxonomy'	=> 'cspt-service-category',
						'style'		=> $style,
					) );

					ob_start();
					include( locate_template( '/theme-parts/service/service-style-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();

					$return .= cspt_element_block_container( array(
						'position'	=> 'end',
					) );

				}
				$i++;
			}

			$return .= '</div>';
		}

		/* Restore original Post Data */
		wp_reset_postdata();

	}

	// Output
	if( !empty($return) ){
		echo '<div class="cspt-service-related">';
			echo cspt_esc_kses($related_title);
			echo cspt_esc_kses($return);
		echo '</div>';
	}
}
}

if( !function_exists('cspt_related_post') ){
function cspt_related_post() {
	$return			= '';
	$related_title	= cspt_get_base_option('blog-show-related');

	if($related_title==true){

		$related_title	= cspt_get_base_option('blog-related-title');
		$show			= cspt_get_base_option('blog-related-count');
		$column			= cspt_get_base_option('blog-related-column');
		$style			= cspt_get_base_option('blog-related-style');

		// Title
		if( !empty($related_title) ){
			$related_title = '<h3 class="cspt-related-title">'.$related_title.'</h3>';
		}

		$terms = wp_get_post_terms( get_the_ID(), 'category' );
		$term_list = array();
		if( !empty($terms) ){
			foreach( $terms as $term ){
				$term_list[] = $term->slug;
			}
		}

		// Preparing $args
		$args = array(
			'post_type'				=> 'post',
			'orderby'				=> 'rand',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
			'post__not_in'			=> array( get_the_ID() ),
			'tax_query'				=> array(
				array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => $term_list,
				),
			),
		);

		// Wp query to fetch posts
		$posts = new WP_Query( $args );
		$i = 1;
		if ( $posts->have_posts() ) {

			$return .= '<div class="cspt-element-posts-wrapper row multi-columns-row">';

			while ( $posts->have_posts() ) {
				$posts->the_post();
				$class = $i%2 ? 'cspt-odd':'cspt-even';

				// Template
				if( file_exists( locate_template( '/theme-parts/blog/blog-style-'.esc_attr($style).'.php', false, false ) ) ){

					$return .= cspt_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $column,
						'cpt'		=> 'blog',
						'taxonomy'	=> 'category',
						'style'		=> $style,
					) );

					ob_start();
					include( locate_template( '/theme-parts/blog/blog-style-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();

					$return .= cspt_element_block_container( array(
						'position'	=> 'end',
					) );

				}
				$i++;
			}

			$return .= '</div>';
		}

		/* Restore original Post Data */
		wp_reset_postdata();

	}

	// Output
	if( !empty($return) ){
		echo '<div class="cspt-post-related">';
			echo cspt_esc_kses($related_title);
			echo cspt_esc_kses($return);
		echo '</div>';
	}
}
}

if( !function_exists('cspt_preloader') ){
	function cspt_preloader(){
		$preloader = cspt_get_base_option('preloader');
		if( $preloader == true ){
			$preloader_img	= cspt_get_base_option('preloader-image');
			if( !empty($preloader_img) ){
				echo cspt_esc_kses('<div class="cspt-preloader" style="background-image:url('.esc_url( get_template_directory_uri() . '/images/loader'.esc_attr($preloader_img).'.svg'  ).')"></div>');
			}
		}
	}
}

if( !function_exists('cspt_testimonial_star_ratings') ){
function cspt_testimonial_star_ratings() {
	$return = '';
	$ratings = get_post_meta( get_the_ID(), 'cspt-star-ratings', true );
	if( !empty($ratings) && $ratings!='no' && $ratings>0 ){
		for($x = 1; $x <= 5; $x++) {
			$active_class = ( $x<=$ratings ) ? ' cspt-active' : '' ;
			$return .= '<i class="cspt-base-icon-star'.esc_attr($active_class).'"></i>';
		}
	}
	if( !empty($return) ){
		$return = '<div class="creativesplanet-box-star-ratings">'.$return.'</div>';
	}
	echo cspt_esc_kses($return);
}
}

if( !function_exists('cspt_testimonial_details') ){
function cspt_testimonial_details() {
	$return = '';
	$details = get_post_meta( get_the_ID(), 'cspt-testimonial-details', true );
	if( !empty($details) ){
		$return = '<div class="creativesplanet-testimonial-detail">'.$details.'</div>';
	}
	echo cspt_esc_kses($return);
}
}

if( !function_exists('cspt_check_widget_exists') ){
function cspt_check_widget_exists( $sidebar_position='' ) {
	$return = '';
	$sidebar	= 'cspt-sidebar-post';
	if( is_page() ){
		// page sidebar
		$sidebar	= 'cspt-sidebar-page';
		if( function_exists('is_woocommerce') && is_woocommerce() ){
			$sidebar = 'cspt-sidebar-wc-shop';
		}
	} else if( function_exists('is_woocommerce') && is_woocommerce() && !is_product() ){
		$sidebar = 'cspt-sidebar-wc-shop';
	} else if( function_exists('is_product') && is_product() ){
		$sidebar = 'cspt-sidebar-wc-single';
	} else if( is_search() ){
		$sidebar	= 'cspt-sidebar-search';
	} else if( is_singular('cspt-portfolio') ){
		$sidebar		= 'cspt-sidebar-portfolio';
	} else if( is_tax('cspt-portfolio-category') || is_post_type_archive('cspt-portfolio') ){
		$sidebar		= 'cspt-sidebar-portfolio-cat';
	} else if( is_singular('cspt-service') ){
		$sidebar		= 'cspt-sidebar-service';
	} else if( is_tax('cspt-service-category') || is_post_type_archive('cspt-service') ){
		$sidebar		= 'cspt-sidebar-service-cat';
	} else if( is_singular('cspt-team-member') ){
		$sidebar		= 'cspt-sidebar-team';
	} else if( is_tax('cspt-team-group') || is_post_type_archive('cspt-team-member') ){
		$sidebar		= 'cspt-sidebar-team-group';
	} else if( is_search() ){
		$sidebar		= 'cspt-sidebar-search';
	}

	// check if content exists for the sidebar
	$sidebar_content = '';
	ob_start();
	dynamic_sidebar( $sidebar );
	$sidebar_content = ob_get_clean();

	if ( !is_active_sidebar( $sidebar ) || empty($sidebar_content) ){
		$return = 'cspt-empty-sidebar';
	}
	return esc_attr($return);
}
}

/*
 *  Body Class
 */
if( !function_exists('cspt_check_sidebar') ){
function cspt_check_sidebar() {
	$return = false;
	// sidebar class
	$sidebar = cspt_get_base_option('sidebar-post');
	if( is_page() ){
		$sidebar = cspt_get_base_option('sidebar-page');
		$page_meta = get_post_meta( get_the_ID(), 'cspt-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
		if( function_exists('is_woocommerce') && is_woocommerce() ){
			$sidebar = cspt_get_base_option('sidebar-wc-shop');
		}
	} else if ( !is_front_page() && is_home() ) {
		$sidebar = cspt_get_base_option('sidebar-post');
		$page_for_posts = get_option( 'page_for_posts' );
		$page_meta = get_post_meta( $page_for_posts, 'cspt-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
	} else if( function_exists('is_woocommerce') && is_woocommerce() && !is_product() ){
		$sidebar = cspt_get_base_option('sidebar-wc-shop');
	} else if( function_exists('is_product') && is_product() ){
		$sidebar = cspt_get_base_option('sidebar-wc-single');
	} else if( is_singular('post') ){
		$sidebar = cspt_get_base_option('sidebar-post');
		$page_meta = get_post_meta( get_the_ID(), 'cspt-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
	} else if( is_singular('cspt-portfolio') ){
		$sidebar = cspt_get_base_option('sidebar-portfolio');
		$page_meta = get_post_meta( get_the_ID(), 'cspt-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
	} else if( is_singular('cspt-service') ){
		$sidebar = cspt_get_base_option('sidebar-service');
		$page_meta = get_post_meta( get_the_ID(), 'cspt-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
	} else if( is_singular('cspt-team-member') ){
		$sidebar = cspt_get_base_option('sidebar-team-member');
		$page_meta = get_post_meta( get_the_ID(), 'cspt-sidebar', true );
		if( !empty($page_meta) && $page_meta!='global' ){
			$sidebar = $page_meta;
		}
	} else if( is_tax('cspt-team-group') || is_post_type_archive('cspt-team-member') ){
		$sidebar = cspt_get_base_option('sidebar-team-group');
	} else if( is_tax('cspt-portfolio-category') || is_post_type_archive('cspt-portfolio') ){
		$sidebar = cspt_get_base_option('sidebar-portfolio-category');
	} else if( is_tax('cspt-service-category') || is_post_type_archive('cspt-service') ){
		$sidebar = cspt_get_base_option('sidebar-service-category');
	} else if( is_search() ){
		$sidebar = cspt_get_base_option('sidebar-search');
	}
	if( $sidebar!='' && $sidebar!='no' ){
		$return = true;
	}
	if( !empty( cspt_check_widget_exists() ) ){
		$return = false;
	}
	return $return;
}
}

if( !function_exists('cspt_sortable_category') ){
function cspt_sortable_category( $atts=array(), $taxonomy='' ){
	$return = '';
	$list = '';
	if( !empty($atts['sortable']) && $atts['sortable']=='yes' ){
		$list .= '<li><a href="#" class="cspt-sortable-link cspt-selected" data-sortby="*">' . esc_html__('All','leblix') . '</a></li>';
		if( !empty($atts['from_category']) ){
			// selected category
			$from_category = $atts['from_category'];
			if( !is_array($atts['from_category']) ){
				$from_category = explode(',',$atts['from_category']);
			}
			foreach( $from_category as $catslug ){
				$term = get_term_by( 'slug', $catslug, $taxonomy );
				$list .= '<li><a href="#" class="cspt-sortable-link" data-sortby="' . esc_attr($catslug) . '">' . esc_html($term->name) . '</a></li>';
			}
		} else {
			// all category
			$all_terms = get_terms( array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => true,
			) );
			foreach( $all_terms as $term ){
				$list .= '<li><a href="#" class="cspt-sortable-link" data-sortby="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</a></li>';
			}
		}
		$return = '<div class="cspt-sortable-list"><ul class="cspt-sortable-list-ul">
			'.$list.'
		</ul></div>';
		return cspt_esc_kses($return);
	}
}
}

if( !function_exists('cspt_cart_icon') ){
function cspt_cart_icon( $style='1' ){
	$show_cart = cspt_get_base_option('wc-show-cart-icon');
	if( function_exists('is_woocommerce') && $show_cart==true ){
		$show_cart_amount_class = 'no';
		$show_cart_amount = cspt_get_base_option('wc-show-cart-amount');
		if( $show_cart_amount == true ){ $show_cart_amount_class = 'yes'; }
		?>
		<div class="cspt-cart-wrapper cspt-cart-style-<?php echo esc_attr($style); ?> cspt-show-cart-amount-<?php echo esc_attr($show_cart_amount_class); ?>">
			<?php
			$content = cspt_woocommerce_header_fragement_content();
			echo cspt_esc_kses($content);
			?>
		</div>
		<?php
	}
}
}

if( !function_exists('cspt_woocommerce_header_fragement_content') ){
function cspt_woocommerce_header_fragement_content() {
	global $woocommerce;
	$return = '<a href="'.esc_url(wc_get_cart_url()).'" class="cspt-cart-link">
		<span class="cspt-cart-details">
			<span class="cspt-cart-icon"></span>
			<span class="cspt-cart-count">'.esc_html($woocommerce->cart->cart_contents_count).'</span>
		</span>';
		$return .= cspt_esc_kses( $woocommerce->cart->get_cart_total() );
	$return .= '</a>';
	return cspt_esc_kses($return);
}
}

if( !function_exists('cspt_site_content_class') ){
function cspt_site_content_class(){
	$return = '';
	if( is_404() ){
		$bgcolor = cspt_get_base_option('e404-bgcolor');
		if( !empty($bgcolor) ){
			$return .= ' cspt-bg-color-'.$bgcolor;
		}
		$background = cspt_get_base_option('e404-background');
		if( !empty($background['background-image']) ){
			$return .= ' cspt-bg-image-yes';
		}
		$text_color = cspt_get_base_option('e404-text-color');
		if( !empty($text_color) ){
			$return .= ' cspt-text-color-'.$text_color;
		}
	}
	if( !empty($return) ){
		echo esc_attr($return);
	}
}
}

if( !function_exists('cspt_ordinal') ){
function cspt_ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}
}

if( !function_exists('cspt_icon_heading_box') ){
function cspt_icon_heading_box( $settings = array() ){
	extract($settings);

	$icon_html = $title_html = $subtitle_html = $desc_html = $nav_html = $button_html = $box_number_html = '';

	if( !empty($box_number) ){
		$box_number_html = '<div class="cspt-ihbox-box-number">'.esc_attr($box_number).'</div>';
	}

	if( file_exists( locate_template( '/theme-parts/icon-heading/icon-heading-style-'.esc_attr($style).'.php', false, false ) ) ){

		$icon_type_class = '';

		if( !empty($settings['icon_type']) ){

			if( $settings['icon_type']=='text' ){
				$icon_html = '<div class="cspt-ihbox-icon"><div class="cspt-ihbox-icon-wrapper cspt-ihbox-icon-type-text">' . $settings['icon_text'] . '</div></div>';
				$icon_type_class = 'text';

			} else if( $settings['icon_type']=='image' ){
				$icon_alt	= (!empty($settings['title'])) ? trim($settings['title']) : esc_attr__('Icon', 'leblix') ;
				$icon_image = '<img src="'.esc_url($settings['icon_image']['url']).'" alt="'.esc_attr($icon_alt).'" />';
				$icon_html	= '<div class="cspt-ihbox-icon"><div class="cspt-ihbox-icon-wrapper cspt-ihbox-icon-type-image">' . $icon_image . '</div></div>';
				$icon_type_class = 'image';
			} else if( $settings['icon_type']=='none' ){
				$icon_html = '';
				$icon_type_class = 'none';
			} else {

				// This is real icon html code
				if( empty($settings['i_type']) ){ $settings['i_type'] = 'fontawesome'; }
				$icon_class      = ( !empty( $settings[ 'i_icon_'.$settings['i_type'] ] ) ) ? $settings[ 'i_icon_'.$settings['i_type'] ] : '' ;
				$icon_html       = '<div class="cspt-ihbox-icon"><div class="cspt-ihbox-icon-wrapper"><i class="' . $settings['icon']['value'] . '"></i></div></div>';
				$icon_type_class = 'icon';

				wp_enqueue_style( 'elementor-icons-'.$settings['icon']['library']);
			}
		}

		// Title
		if( !empty($settings['title']) ) {
			$title_tag	= ( !empty($settings['title_tag']) ) ? $settings['title_tag'] : 'h2' ;
			$title_html	= '<'. cspt_esc_kses($title_tag) . ' class="cspt-element-title">
				'.cspt_link_render($settings['title_link'], 'start' ).'
					'.cspt_esc_kses($settings['title']).'
				'.cspt_link_render($settings['title_link'], 'end' ).'
				</'. cspt_esc_kses($title_tag) . '>
			';
		}

		// SubTitle
		if( !empty($settings['subtitle']) ) {
			$subtitle_tag	= ( !empty($settings['subtitle_tag']) ) ? $settings['subtitle_tag'] : 'h4' ;
			$subtitle_html	= '<'. cspt_esc_kses($subtitle_tag) . ' class="cspt-element-subtitle">
				'.cspt_link_render($settings['subtitle_link'], 'start' ).'
					'.cspt_esc_kses($settings['subtitle']).'
				'.cspt_link_render($settings['subtitle_link'], 'end' ).'
				</'. cspt_esc_kses($subtitle_tag) . '>
			';
		}

		// Description text
		if( !empty($settings['desc']) ){
			$desc_html = '<div class="cspt-heading-desc">'.cspt_esc_kses($settings['desc']).'</div>';
		}

		// Button
		if( !empty($settings['btn_title']) && !empty($settings['btn_link']['url']) ){
			$button_html = '<div class="cspt-ihbox-btn">' . cspt_link_render($settings['btn_link'], 'start' ) . cspt_esc_kses($settings['btn_title']) . cspt_link_render($settings['btn_link'], 'end' ) . '</div>';
		}

		echo '<div class="cspt-ihbox cspt-ihbox-style-'.esc_attr($style).'">';

			include( locate_template( '/theme-parts/icon-heading/icon-heading-style-'.esc_attr($style).'.php', false, false ) );

		echo '</div>';

	}

}
}

if( !function_exists('cspt_get_elements') ){
function cspt_get_elements( $data = array() ){
	$el_array = array();

	if( !empty($data) && is_array($data) ){
		foreach( $data as $s1 ){

			if( isset($s1['elType']) && $s1['elType']!='section' && $s1['elType']!='column' && substr( $s1['widgetType'], 0 , 5 ) == 'cspt_' ){
				$style = ( isset($s1['settings']['style']) && !empty($s1['settings']['style']) ) ? trim($s1['settings']['style']) : '1' ;
				$el_array[] = $s1['widgetType'] . '___' . $style;
			}

			if( isset($s1['elements']) && !empty($s1['elements']) ){
				foreach($s1['elements'] as $s2){
					if( isset($s2['elType']) && $s2['elType']!='section' && $s2['elType']!='column' && substr( $s2['widgetType'], 0 , 5 ) == 'cspt_' ){
						$style = ( isset($s2['settings']['style']) && !empty($s2['settings']['style']) ) ? trim($s2['settings']['style']) : '1' ;
						$el_array[] = $s2['widgetType'] . '___' . $style;
					}

					if( isset($s2['elements']) && !empty($s2['elements']) ){
						foreach($s2['elements'] as $s3){
							if( isset($s3['elType']) && $s3['elType']!='section' && $s3['elType']!='column' && substr( $s3['widgetType'], 0 , 5 ) == 'cspt_' ){
								$style = ( isset($s3['settings']['style']) && !empty($s3['settings']['style']) ) ? trim($s3['settings']['style']) : '1' ;
								$el_array[] = $s3['widgetType'] . '___' . $style;
							}

							if( isset($s3['elements']) && !empty($s3['elements']) ){
								foreach($s3['elements'] as $s4){
									if( isset($s4['elType']) && $s4['elType']!='section' && $s4['elType']!='column' && substr( $s4['widgetType'], 0 , 5 ) == 'cspt_' ){
										$style = ( isset($s4['settings']['style']) && !empty($s4['settings']['style']) ) ? trim($s4['settings']['style']) : '1' ;
										$el_array[] = $s4['widgetType'] . '___' . $style;
									}

									if( isset($s4['elements']) && !empty($s4['elements']) ){
										foreach($s4['elements'] as $s5){
											if( isset($s5['elType']) && $s5['elType']!='section' && $s5['elType']!='column' && substr( $s5['widgetType'], 0 , 5 ) == 'cspt_' ){
												$style = ( isset($s5['settings']['style']) && !empty($s5['settings']['style']) ) ? trim($s5['settings']['style']) : '1' ;
												$el_array[] = $s5['widgetType'] . '___' . $style;
											}

											if( isset($s5['elements']) && !empty($s5['elements']) ){
												foreach($s5['elements'] as $s6){
													if( isset($s6['elType']) && $s6['elType']!='section' && $s6['elType']!='column' && substr( $s6['widgetType'], 0 , 5 ) == 'cspt_' ){
														$style = ( isset($s6['settings']['style']) && !empty($s6['settings']['style']) ) ? trim($s6['settings']['style']) : '1' ;
														$el_array[] = $s6['widgetType'] . '___' . $style;
													}
												}
											}

										}
									}
								}
							}
						}
					}
				}
			}
		}
	}

	// remove repeated values
	$el_array = array_unique($el_array);

	// final output
	return $el_array;

}
}

if( !function_exists('cspt_sub_category_list') ){
	function cspt_sub_category_list(){
		if( is_tax() ){
			$category = get_queried_object();
			if( isset($category->term_id) && !empty($category->term_id) ){
				$cat_id			= $category->term_id;
				$term			= get_term( $cat_id );
				$sub_category	= get_terms( $term->taxonomy, array('parent' => $cat_id, 'hide_empty' => false) );
				if( is_array($sub_category) && count($sub_category)>0 ){
					?>
					<div class="cspt-sub-cat-list-wrapper">
						<div class="cspt-sub-cat-list-title"><?php esc_attr_e('Sub Categories', 'leblix'); ?></div>
						<ul class="cspt-sub-cat-list">
						<?php
						foreach( $sub_category as $cat ){
							// Icon
							$icon_html = '';
							$icon_lib = get_term_meta( $cat->term_id, 'cspt-category-icon-library', true );
							$icon_class = get_term_meta( $cat->term_id, 'cspt-category-icon-'.$icon_lib, true );
							if( !empty($icon_class) ){
								$icon_html = '<i class="'.esc_attr($icon_class).'"></i>';
							}
							echo cspt_esc_kses('<li><a href="'.esc_url( get_term_link($cat) ).'">'.$icon_html.' '.esc_html($cat->name).'</a></li>');
						}
						?>
						</ul>
					</div>
					<?php
				}
			}
		}
	}
	}
	