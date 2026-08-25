<?php
// Default titles
$portfolio_cpt_singular_title	= esc_attr__('Portfolio','leblix');
$portfolio_cat_singular_title	= esc_attr__('Portfolio Category','leblix');
$service_cpt_singular_title	= esc_attr__('Service','leblix');
$service_cat_singular_title	= esc_attr__('Service Category','leblix');
$team_cpt_singular_title	= esc_attr__('Team Member','leblix');
$team_group_singular_title	= esc_attr__('Team Group','leblix');
$testimonial_cpt_singular_title		= esc_attr__('Testimonial','leblix');
$testimonial_cat_singular_title	= esc_attr__('Testimonial Category','leblix');
if( class_exists('Kirki') ){
	// Portfolio
	$portfolio_cpt_singular_title2	= Kirki::get_option( 'portfolio-cpt-singular-title' );
	$portfolio_cpt_singular_title	= ( !empty($portfolio_cpt_singular_title2) ) ? $portfolio_cpt_singular_title2 : $portfolio_cpt_singular_title ;
	// Portfolio Category
	$portfolio_cat_singular_title2	= Kirki::get_option( 'portfolio-cat-singular-title' );
	$portfolio_cat_singular_title	= ( !empty($portfolio_cat_singular_title2) ) ? $portfolio_cat_singular_title2 : $portfolio_cat_singular_title ;
	// Service
	$service_cpt_singular_title2	= Kirki::get_option( 'service-cpt-singular-title' );
	$service_cpt_singular_title	= ( !empty($service_cpt_singular_title2) ) ? $service_cpt_singular_title2 : $service_cpt_singular_title ;
	// Service Category
	$service_cat_singular_title2	= Kirki::get_option( 'service-cat-singular-title' );
	$service_cat_singular_title	= ( !empty($service_cat_singular_title2) ) ? $service_cat_singular_title2 : $service_cat_singular_title ;
	// Team
	$team_cpt_singular_title2	= Kirki::get_option( 'team-cpt-singular-title' );
	$team_cpt_singular_title	= ( !empty($team_cpt_singular_title2) ) ? $team_cpt_singular_title2 : $team_cpt_singular_title ;
	// Team Group
	$team_group_singular_title2	= Kirki::get_option( 'team-group-singular-title' );
	$team_group_singular_title	= ( !empty($team_group_singular_title2) ) ? $team_group_singular_title2 : $team_group_singular_title ;
	// Testimonial
	$testimonial_cpt_singular_title2	= Kirki::get_option( 'testimonial-cpt-singular-title' );
	$testimonial_cpt_singular_title	= ( !empty($testimonial_cpt_singular_title2) ) ? $testimonial_cpt_singular_title2 : $testimonial_cpt_singular_title ;
	// Testimonial Category
	$testimonial_cat_singular_title2	= Kirki::get_option( 'testimonial-cat-singular-title' );
	$testimonial_cat_singular_title	= ( !empty($testimonial_cat_singular_title2) ) ? $testimonial_cat_singular_title2 : $testimonial_cat_singular_title ;
}
$pre_color_list = array(
	'globalcolor'		=> get_template_directory_uri() . '/includes/images/precolor-globalcolor.png',
	'secondarycolor'	=> get_template_directory_uri() . '/includes/images/precolor-secondarycolor.png',
	'transparent'		=> get_template_directory_uri() . '/includes/images/precolor-transparent.png',
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'light'				=> get_template_directory_uri() . '/includes/images/precolor-light.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
	'custom'			=> get_template_directory_uri() . '/includes/images/precolor-custom.png',
);
$pre_color_with_gradient_list = array(
	'globalcolor'		=> get_template_directory_uri() . '/includes/images/precolor-globalcolor.png',
	'secondarycolor'	=> get_template_directory_uri() . '/includes/images/precolor-secondarycolor.png',
	'gradientcolor'		=> get_template_directory_uri() . '/includes/images/precolor-gradientcolor.png',
	'transparent'		=> get_template_directory_uri() . '/includes/images/precolor-transparent.png',
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'light'				=> get_template_directory_uri() . '/includes/images/precolor-light.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
	'custom'			=> get_template_directory_uri() . '/includes/images/precolor-custom.png',
);
$pre_two_color_list = array(
	''					=> get_template_directory_uri() . '/includes/images/precolor-default.png',
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
	'globalcolor'		=> get_template_directory_uri() . '/includes/images/precolor-globalcolor.png',
);
$pre_text_color_list = array(
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
	'globalcolor'		=> get_template_directory_uri() . '/includes/images/precolor-globalcolor.png',
	'secondarycolor'	=> get_template_directory_uri() . '/includes/images/precolor-secondarycolor.png',
);
$pre_text_color_2_list = array(
	'white'				=> get_template_directory_uri() . '/includes/images/precolor-white.png',
	'blackish'			=> get_template_directory_uri() . '/includes/images/precolor-blackish.png',
);
$column_list = array(
	'1'	=> get_template_directory_uri() . '/includes/images/column-1.png',
	'2'	=> get_template_directory_uri() . '/includes/images/column-2.png',
	'3'	=> get_template_directory_uri() . '/includes/images/column-3.png',
	'4'	=> get_template_directory_uri() . '/includes/images/column-4.png',
	'5'	=> get_template_directory_uri() . '/includes/images/column-5.png',
	'6'	=> get_template_directory_uri() . '/includes/images/column-6.png',
);
// Total Header Styles
$header_style_array = array(
	'1'	=> get_template_directory_uri() . '/includes/images/header-style-1.jpg',
	'2'	=> get_template_directory_uri() . '/includes/images/header-style-2.jpg',
	'3'	=> get_template_directory_uri() . '/includes/images/header-style-3.jpg',
	'4'	=> get_template_directory_uri() . '/includes/images/header-style-4.jpg',
);
// Total Single Portfolio Styles
$portfolio_single_style_array = array(
	'1'	=> get_template_directory_uri() . '/includes/images/portfolio-single-style-1.jpg',
	'2'	=> get_template_directory_uri() . '/includes/images/portfolio-single-style-2.jpg',
);
// Total Single Service Styles
$service_single_style_array = array(
	'1'	=> get_template_directory_uri() . '/includes/images/service-single-style-1.jpg',
	'2'	=> get_template_directory_uri() . '/includes/images/service-single-style-2.jpg',
);
// Total Single Portfolio Styles
$team_single_style_array = array(
	'1'	=> get_template_directory_uri() . '/includes/images/team-single-style-1.jpg',
	'2'	=> get_template_directory_uri() . '/includes/images/team-single-style-2.jpg',
);
// Social links
$social_options_array = array();
if( function_exists('cspt_social_links_list') ){
	$social_list = cspt_social_links_list();
	foreach( $social_list as $social ){
		$social_options_array[] = array(
			'type'			=> 'text',
			'settings'		=> esc_attr( $social['id'] ),
			'label'			=> esc_attr( $social['label'] ),
			'description'	=> esc_attr__( 'Write Social URL.', 'leblix' ),
			'default'		=> '',
		);
	}
}
$footer_col_width_array = array(
	'hide'	=> esc_attr__( 'Hide this column', 'leblix' ),
	'1'		=> esc_attr__( '1%', 'leblix' ),
	'2'		=> esc_attr__( '2%', 'leblix' ),
	'3'		=> esc_attr__( '3%', 'leblix' ),
	'4'		=> esc_attr__( '4%', 'leblix' ),
	'5'		=> esc_attr__( '5%', 'leblix' ),
	'6'		=> esc_attr__( '6%', 'leblix' ),
	'7'		=> esc_attr__( '7%', 'leblix' ),
	'8'		=> esc_attr__( '8%', 'leblix' ),
	'9'		=> esc_attr__( '9%', 'leblix' ),
	'10'	=> esc_attr__( '10%', 'leblix' ),
	'11'	=> esc_attr__( '11%', 'leblix' ),
	'12'	=> esc_attr__( '12%', 'leblix' ),
	'13'	=> esc_attr__( '13%', 'leblix' ),
	'14'	=> esc_attr__( '14%', 'leblix' ),
	'15'	=> esc_attr__( '15%', 'leblix' ),
	'16'	=> esc_attr__( '16%', 'leblix' ),
	'17'	=> esc_attr__( '17%', 'leblix' ),
	'18'	=> esc_attr__( '18%', 'leblix' ),
	'19'	=> esc_attr__( '19%', 'leblix' ),
	'20'	=> esc_attr__( '20%', 'leblix' ),
	'21'	=> esc_attr__( '21%', 'leblix' ),
	'22'	=> esc_attr__( '22%', 'leblix' ),
	'23'	=> esc_attr__( '23%', 'leblix' ),
	'24'	=> esc_attr__( '24%', 'leblix' ),
	'25'	=> esc_attr__( '25%', 'leblix' ),
	'26'	=> esc_attr__( '26%', 'leblix' ),
	'27'	=> esc_attr__( '27%', 'leblix' ),
	'28'	=> esc_attr__( '28%', 'leblix' ),
	'29'	=> esc_attr__( '29%', 'leblix' ),
	'30'	=> esc_attr__( '30%', 'leblix' ),
	'31'	=> esc_attr__( '31%', 'leblix' ),
	'32'	=> esc_attr__( '32%', 'leblix' ),
	'33'	=> esc_attr__( '33%', 'leblix' ),
	'34'	=> esc_attr__( '34%', 'leblix' ),
	'35'	=> esc_attr__( '35%', 'leblix' ),
	'36'	=> esc_attr__( '36%', 'leblix' ),
	'37'	=> esc_attr__( '37%', 'leblix' ),
	'38'	=> esc_attr__( '38%', 'leblix' ),
	'39'	=> esc_attr__( '39%', 'leblix' ),
	'40'	=> esc_attr__( '40%', 'leblix' ),
	'41'	=> esc_attr__( '41%', 'leblix' ),
	'42'	=> esc_attr__( '42%', 'leblix' ),
	'43'	=> esc_attr__( '43%', 'leblix' ),
	'44'	=> esc_attr__( '44%', 'leblix' ),
	'45'	=> esc_attr__( '45%', 'leblix' ),
	'46'	=> esc_attr__( '46%', 'leblix' ),
	'47'	=> esc_attr__( '47%', 'leblix' ),
	'48'	=> esc_attr__( '48%', 'leblix' ),
	'49'	=> esc_attr__( '49%', 'leblix' ),
	'50'	=> esc_attr__( '50%', 'leblix' ),
	'51'	=> esc_attr__( '51%', 'leblix' ),
	'52'	=> esc_attr__( '52%', 'leblix' ),
	'53'	=> esc_attr__( '53%', 'leblix' ),
	'54'	=> esc_attr__( '54%', 'leblix' ),
	'55'	=> esc_attr__( '55%', 'leblix' ),
	'56'	=> esc_attr__( '56%', 'leblix' ),
	'57'	=> esc_attr__( '57%', 'leblix' ),
	'58'	=> esc_attr__( '58%', 'leblix' ),
	'59'	=> esc_attr__( '59%', 'leblix' ),
	'60'	=> esc_attr__( '60%', 'leblix' ),
	'61'	=> esc_attr__( '61%', 'leblix' ),
	'62'	=> esc_attr__( '62%', 'leblix' ),
	'63'	=> esc_attr__( '63%', 'leblix' ),
	'64'	=> esc_attr__( '64%', 'leblix' ),
	'65'	=> esc_attr__( '65%', 'leblix' ),
	'66'	=> esc_attr__( '66%', 'leblix' ),
	'67'	=> esc_attr__( '67%', 'leblix' ),
	'68'	=> esc_attr__( '68%', 'leblix' ),
	'69'	=> esc_attr__( '69%', 'leblix' ),
	'70'	=> esc_attr__( '70%', 'leblix' ),
	'71'	=> esc_attr__( '71%', 'leblix' ),
	'72'	=> esc_attr__( '72%', 'leblix' ),
	'73'	=> esc_attr__( '73%', 'leblix' ),
	'74'	=> esc_attr__( '74%', 'leblix' ),
	'75'	=> esc_attr__( '75%', 'leblix' ),
	'76'	=> esc_attr__( '76%', 'leblix' ),
	'77'	=> esc_attr__( '77%', 'leblix' ),
	'78'	=> esc_attr__( '78%', 'leblix' ),
	'79'	=> esc_attr__( '79%', 'leblix' ),
	'80'	=> esc_attr__( '80%', 'leblix' ),
	'81'	=> esc_attr__( '81%', 'leblix' ),
	'82'	=> esc_attr__( '82%', 'leblix' ),
	'83'	=> esc_attr__( '83%', 'leblix' ),
	'84'	=> esc_attr__( '84%', 'leblix' ),
	'85'	=> esc_attr__( '85%', 'leblix' ),
	'86'	=> esc_attr__( '86%', 'leblix' ),
	'87'	=> esc_attr__( '87%', 'leblix' ),
	'88'	=> esc_attr__( '88%', 'leblix' ),
	'89'	=> esc_attr__( '89%', 'leblix' ),
	'90'	=> esc_attr__( '90%', 'leblix' ),
	'91'	=> esc_attr__( '91%', 'leblix' ),
	'92'	=> esc_attr__( '92%', 'leblix' ),
	'93'	=> esc_attr__( '93%', 'leblix' ),
	'94'	=> esc_attr__( '94%', 'leblix' ),
	'95'	=> esc_attr__( '95%', 'leblix' ),
	'96'	=> esc_attr__( '96%', 'leblix' ),
	'97'	=> esc_attr__( '97%', 'leblix' ),
	'98'	=> esc_attr__( '98%', 'leblix' ),
	'99'	=> esc_attr__( '99%', 'leblix' ),
	'100'	=> esc_attr__( '100%', 'leblix' ),
);

$blog_styles = cspt_element_template_list('blog', 'customizer');
unset($blog_styles['classic'], $blog_styles['4']);

/*** Options array ***/
$kirki_options_array = array(
	// General Settings
	'general_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'General Options', 'leblix' ),
			'panel'			=> 'leblix_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'color',
				'settings'		=> 'global-color',
				'label'			=> esc_attr__( 'Global Color', 'leblix' ),
				'description'	=> esc_attr__( 'This color will be globally applied to most of elements parts and special texts', 'leblix' ),
				'default'		=> '#01cd61',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'secondary-color',
				'label'			=> esc_attr__( 'Secondary Color', 'leblix' ),
				'description'	=> esc_attr__( 'This color will be used on some elements. Sometimes with Global Color. This should match with Global Color to look good.', 'leblix' ),
				'default'		=> '#003281',
			),
			array(
				'type'		=> 'multicolor',
				'settings'	=> 'gradient-color',
				'label'		=> esc_attr__( 'Gradient Color', 'leblix' ),
				'choices'		=> array(
					'first'		=> esc_attr__( 'Starting Color', 'leblix' ),
					'last'		=> esc_attr__( 'Ending Color', 'leblix' ),
				),
				'default'	=> array(
				  'first'		=> '#01cd61',
				  'last'		=> '#0ecc66',
				),
			),
			array(
				'type'				=> 'image',
				'settings'			=> 'logo',
				'label'				=> esc_attr__( 'Logo', 'leblix' ),
				'description'		=> esc_attr__( 'Main logo', 'leblix' ),
				'default'			=> get_template_directory_uri() . '/images/logo.png',
				'partial_refresh'	=> array(
					'logo'				=> array(
						'selector'			=> '.site-title',
						'render_callback'	=> function() {
							return cspt_logo( 'yes' );
						},
					)
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'logo-height',
				'label'			=> esc_attr__( 'Logo Max Height', 'leblix' ),
				'default'		=> 40,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
			),
			array(
				'type'			=> 'image',
				'settings'		=> 'sticky-logo',
				'label'			=> esc_attr__( 'Sticky Logo', 'leblix' ),
				'description'	=> esc_attr__( 'Sticky logo', 'leblix' ),
				'default'		=> '',
				'active_callback'=> array( array(
					'setting' => 'sticky-header',
					'operator' => '==',
					'value' => '1',
				) ),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'sticky-logo-height',
				'label'			=> esc_attr__( 'Sticky Logo Max Height', 'leblix' ),
				'default'		=> 40,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
				'active_callback'=> array( array(
					'setting' => 'sticky-header',
					'operator' => '==',
					'value' => '1',
				) ),
			),
			array(
				'type'			=> 'image',
				'settings'		=> 'responsive-logo',
				'label'			=> esc_attr__( 'Responsive Logo', 'leblix' ),
				'description'	=> esc_attr__( 'This logo appear in small devices like mobile/tablet etc', 'leblix' ),
				'default'		=> '',
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'responsive-logo-height',
				'label'			=> esc_attr__( 'Responsive Logo Max Height', 'leblix' ),
				'default'		=> 50,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
			),
			array(
				'type'		=> 'multicolor',
				'settings'	=> 'link-color',
				'label'		=> esc_attr__( 'Link Color', 'leblix' ),
				'choices'		=> array(
					'normal'	=> esc_attr__( 'Normal Color', 'leblix' ),
					'hover'		=> esc_attr__( 'Mouse-Over (Hover) Color', 'leblix' ),
				),
				'default'	=> array(
					'normal'	=> '#101010',
					'hover'		=> '#01cd61',
				),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'preloader',
				'label'			=> esc_attr__( 'Show Preloader?', 'leblix' ),
				'description'	=> esc_attr__( 'Show or hide preloader', 'leblix' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'leblix' ),
					'off' => esc_attr__( 'No', 'leblix' ),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'preloader-image',
				'label'			=> esc_html__( 'Select preloader image', 'leblix' ),
				'default'		=> '1',
				'choices'		=> array(
					'1'   => get_template_directory_uri() . '/images/loader1.svg',
					'2'   => get_template_directory_uri() . '/images/loader2.svg',
					'3'   => get_template_directory_uri() . '/images/loader3.svg',
					'4'   => get_template_directory_uri() . '/images/loader4.svg',
					'5'   => get_template_directory_uri() . '/images/loader5.svg',
					'6'   => get_template_directory_uri() . '/images/loader6.svg',
					'7'   => get_template_directory_uri() . '/images/loader7.svg',
					'8'   => get_template_directory_uri() . '/images/loader8.svg',
					'9'   => get_template_directory_uri() . '/images/loader9.svg',
				),
				'active_callback'=> array( array(
					'setting' => 'preloader',
					'operator' => '==',
					'value' => '1',
				) ),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'responsive-breakpoint',
				'label'			=> esc_attr__( 'Responsive Breakpoint', 'leblix' ),
				'description'	=> esc_attr__( 'Select screen size to make the menu burger menu (responsive menu) below the selected screen size and also other settings too. Preferred Sizes: 1200, 1024, 992 and 768', 'leblix' ),
				'default'		=> 1200,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 2000,
					'step'			=> 1,
				),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-page',
				'label'		=> esc_html__( 'Page Sidebar', 'leblix' ),
				'default'	=> 'right',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			// Advanced Settings
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-advanced-options',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Advanced Settings', 'leblix' ) . '</h2> <span>' . esc_html__( 'Special advanced options', 'leblix' ) . '</span></div>',
			),
			array(
				'type'        => 'switch',
				'settings'    => 'min',
				'label'       => esc_attr__( 'Load Minified CSS and JS Files?', 'leblix' ),
				'description' => esc_attr__( 'Load minified files for CSS and JS code files. Select YES to reduce page load time.', 'leblix' ),
				'default'     => '1',
				'choices'     => array(
					'on'  => esc_attr__( 'Yes', 'leblix' ),
					'off' => esc_attr__( 'No', 'leblix' ),
				),
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'white-color',
				'label'			=> esc_attr__( 'White Color', 'leblix' ),
				'description'	=> esc_attr__( 'This is default white color for text.', 'leblix' ),
				'default'		=> '#ffffff',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'light-bg-color',
				'label'			=> esc_attr__( 'Light Background Color', 'leblix' ),
				'description'	=> esc_attr__( 'This is default grey background color.', 'leblix' ),
				'default'		=> '#f2f6fb',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'blackish-color',
				'label'			=> esc_attr__( 'Blackish Text Color', 'leblix' ),
				'description'	=> esc_attr__( 'This is default blackish color for text.', 'leblix' ),
				'default'		=> '#101010',
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'blackish-bg-color',
				'label'			=> esc_attr__( 'Blackish Background Color', 'leblix' ),
				'description'	=> esc_attr__( 'This is default blackish background color.', 'leblix' ),
				'default'		=> '#101010',
			),
		)
	),
	// Typography Settings
	'typography_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Typography Options', 'leblix' ),
			'panel'			=> 'leblix_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'typography',
				'settings'		=> 'global-typography',
				'label'			=> esc_attr__( 'Global Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array (
					'font-family'		=> 'Archivo',
					'variant'			=> 'regular',
					'font-size'			=> '15px',
					'line-height'		=> '1.7',
					'letter-spacing'	=> '',
					'color'				=> '#666666',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				  ),
				'priority'			=> 10,
				'cspt-output'		=> 'body',
				'cspt-all-variants'	=> true,
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h1-typography',
				'label'			=> esc_attr__( 'H1 Typography', 'leblix' ),
				'tooltip'     => esc_attr__( 'This is tooltip', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Poppins',
					'variant'			=> '600',
					'font-size'			=> '34px',
					'line-height'		=> '44px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#101010',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'cspt-output'	=> 'h1',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h2-typography',
				'label'			=> esc_attr__( 'H2 Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Poppins',
					'variant'			=> '600',
					'font-size'			=> '30px',
					'line-height'		=> '40px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#101010',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'cspt-output'	=> 'h2',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h3-typography',
				'label'			=> esc_attr__( 'H3 Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Poppins',
					'variant'			=> '600',
					'font-size'			=> '26px',
					'line-height'		=> '36px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#101010',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'cspt-output'	=> 'h3',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h4-typography',
				'label'			=> esc_attr__( 'H4 Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Poppins',
					'variant'			=> '600',
					'font-size'			=> '22px',
					'line-height'		=> '32px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#101010',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'cspt-output'	=> 'h4',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h5-typography',
				'label'			=> esc_attr__( 'H5 Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Poppins',
					'variant'			=> '600',
					'font-size'			=> '18px',
					'line-height'		=> '28px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#101010',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'cspt-output'	=> 'h5',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'h6-typography',
				'label'			=> esc_attr__( 'H6 Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Poppins',
					'variant'			=> '600',
					'font-size'			=> '14px',
					'line-height'		=> '24px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#101010',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'cspt-output'	=> 'h6',
			),
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Special Heading Typography', 'leblix' ) . '</h2> <span>' . esc_html__( 'Heading typography options', 'leblix' ) . '</span></div>',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'heading-typography',
				'label'			=> esc_attr__( 'Heading Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Poppins',
					'variant'			=> '600',
					'font-size'			=> '42px',
					'line-height'		=> '48px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#101010',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'cspt-output'	=> '.cspt-heading-subheading .cspt-element-title',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'subheading-typography',
				'label'			=> esc_attr__( 'Sub-heading Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Poppins',
					'variant'			=> '600',
					'font-size'			=> '16px',
					'line-height'		=> '24px',
					'letter-spacing'	=> '0px',
					'color'				=> '#01cd61',
					'text-transform'	=> 'uppercase',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'cspt-output'	=> '.cspt-heading-subheading .cspt-element-subtitle',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'content-typography',
				'label'			=> esc_attr__( 'Content Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Archivo',
					'variant'			=> 'regular',
					'font-size'			=> '15px',
					'line-height'		=> '1.7',
					'letter-spacing'	=> '0px',
					'color'				=> '#666666',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'cspt-output'	=> '.cspt-ihbox.cspt-ihbox-style-hsbox .cspt-ihbox-content',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'widget-heading-typography',
				'label'			=> esc_attr__( 'Widget Heading Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Poppins',
					'variant'			=> '700',
					'font-size'			=> '20px',
					'line-height'		=> '28px',
					'letter-spacing'	=> '-0.5px',
					'color'				=> '#101010',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'cspt-output'	=> '.creativesplanet-sidebar .widget_search .wp-block-search__label, .creativesplanet-sidebar .widget_block .wp-block-group h2, .cspt-sub-cat-list-wrapper .cspt-sub-cat-list-title, .widget-title, .cspt-footer-copyright-box h3',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'buttons-typography',
				'label'			=> esc_attr__( 'Button Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Poppins',
					'variant'			=> '700',
					'font-size'			=> '13px',
					'line-height'		=> '19px',
					'letter-spacing'	=> '-0.2px',
					'text-transform'	=> 'capitalize',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'cspt-output'	=> '.cspt-search-results .cspt-read-more-link a, .cspt-service-btn a, .cspt-header-style-2 .cspt-right-box .cspt-header-button a, .cspt-header-style-3 .cspt-right-box .cspt-header-button a, .creativesplanet-ele-pricing-table .cspt-ptable-btn a, .cspt-header-button, .woocommerce ul.products li.product .onsale, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .elementor-widget-button .elementor-button, .cspt-ptable-btn a, .cspt-service-btn, .cspt-ihbox-btn, .woocommerce .woocommerce-message .button, .woocommerce div.product form.cart .button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, button, html input[type=button], input[type=reset], input[type=submit]',
			),
			// Extra Load Fonts Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'css-only-custom-heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'CSS only Typography', 'leblix' ) . '</h2> <span>' . esc_html__( 'This will not apply to any font style but this font will be loaded so we can use anywhere.', 'leblix' ) . '</span></div>',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'css-only-1-typography',
				'label'			=> esc_attr__( 'First Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Rajdhani',
					'variant'			=> 'regular',
					'font-style'		=> 'normal',
					'font-backup'		=> '',
				),
				'cspt-output'	=> '.cspt-tab-content-inner a.link-button',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'css-only-2-typography',
				'label'			=> esc_attr__( 'Second Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Poppins',
					'variant'			=> '600',
					'font-style'		=> 'normal',
					'font-backup'		=> '',
				),
				'cspt-output'	=> '.cspt-element-static-box-style-3 .owl-item .cspt-contentbox::before, .cspt-static-box-style-3 ul li, .creativesplanet-ele-fid-style-6 .cspt-fid-title, .cspt-author-content .cspt-author-name, .cspt-comment-content .cspt-comment-author, .cspt-header-contact-number,.creativesplanet-ele-fid-style-2 .cspt-fid-sub span,
				.cspt-footer-big-area .cspt-footer-contact-info-wrap .cspt-desc,.cspt-portfolio-single .cspt-portfolio-nav-head,
				.cspt-tabs .cspt-tab-content-inner a.link-button, .cspt-service-style-6 .cspt-content-box .cspt-service-content a, 
				.cspt-service-style-3 .cspt-content-box .cspt-service-content a, .cspt-blog-style-3 .cspt-meta-date-wrapper span, .cspt-pricing-table-box .creativesplanet-ptable-price, .creativesplanet-ele-ptable-style-1 .cspt-pricing-table-box .creativesplanet-ptable-frequency, 
				.cspt-pricing-table-box .creativesplanet-ptable-symbol, .cspt-header-style-2 .cspt-header-infobox a, 
				.cspt-blog-classic .cspt-meta-date-wrapper, .cspt-header-style-4 .cspt-pre-header-left .cspt-contact-info li, 
				.cspt-tabs .cspt-tabs-heading li, .cspt-team-single-style-1 .cspt-team-progressbar .elementor-title'
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'css-only-3-typography',
				'label'			=> esc_attr__( 'Third Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Archivo',
					'variant'			=> '700',
					'font-style'		=> 'normal',
					'font-backup'		=> '',
				),
				'cspt-output'	=> 'blockquote, .cspt-ihbox-style-6 .cspt-element-heading, .creativesplanet-ele-fid-style-2 .cspt-fid-title',
			),
		)
	),
	// Pre-Header Options
	'preheader_options'	=> array(
		'section_settings'	=> array(
			'title'				=> esc_attr__( 'Pre-Header Options', 'leblix' ),
			'panel'				=> 'leblix_base_options',
			'priority'			=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'switch',
				'settings'		=> 'preheader-enable',
				'label'			=> esc_attr__( 'Show or hide Pre-header', 'leblix' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'			=> esc_attr__( 'Show', 'leblix' ),
					'off'			=> esc_attr__( 'Hide', 'leblix' ),
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'preheader-text-color',
				'label'				=> esc_attr__( 'Select pre-header text color', 'leblix' ),
				'default'			=> 'white',
				'choices'			=> $pre_text_color_list,
				'active_callback'	=> array(
					array(
						'setting'		=> 'preheader-enable',
						'operator'		=> '==',
						'value'			=> '1',
					)
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'preheader-bgcolor',
				'label'				=> esc_html__( 'Select pre-header background color', 'leblix' ),
				'default'			=> 'blackish',
				'choices'			=> $pre_color_list,
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'preheader-bgcolor-custom',
				'label'			=> esc_attr__( 'Select pre-header background custom color', 'leblix' ),
				'description'	=> esc_attr__( 'Select custom color for pre-header background', 'leblix' ),
				'default'		=> '#ff5e15',
				'active_callback'=> array(
					array(
						'setting'	=> 'preheader-bgcolor',
						'operator'	=> '==',
						'value'		=> 'custom',
					),
					array(
						'setting'			=> 'preheader-enable',
						'operator'			=> '==',
						'value'				=> '1',
					)
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'preheader-responsive',
				'label'			=> esc_attr__( 'Hide in screen size', 'leblix' ),
				'description'	=> esc_attr__( 'Select screen size to hide this pre-header below the selected screen size. Preferred Sizes: 1200, 1024, 992 and 768', 'leblix' ),
				'default'		=> 1200,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 2000,
					'step'			=> 1,
				),
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'preheader-content-heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Preheader content', 'leblix' ) . '</h2> <span>' . sprintf( esc_attr__( 'Manage preheader content from here', 'leblix' ) , $portfolio_cpt_singular_title ) . '</span></div>',
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'preheader-left',
				'label'			=> esc_attr__( 'Pre-header Left Content', 'leblix' ),
				'default'		=> cspt_esc_kses('<i class="cspt-base-icon-marker"></i> Los Angeles Gournadi, 1230  Bariasl'),
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
				'partial_refresh'	=> array(
					'preheader-left'		=> array(
						'selector'			=> '.cspt-pre-header-left',
						'render_callback'	=> function() {
							return do_shortcode(get_theme_mod('preheader-left'));
						},
					)
				),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'preheader-right',
				'label'			=> esc_attr__( 'Pre-header Right Content', 'leblix' ),
				'default'		=> cspt_esc_kses('<ul class="cspt-contact-info"><li><i class="cspt-base-icon-contact"></i> Make a call  : +1 (212) 255-5511</li><li>[cspt-social-links]</li></ul>'),
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
				'partial_refresh'	=> array(
					'preheader-right'		=> array(
						'selector'			=> '.cspt-pre-header-right',
						'render_callback'	=> function() {
							return do_shortcode(get_theme_mod('preheader-right'));
						},
					)
				),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'preheader-search',
				'label'			=> esc_attr__( 'Show Search Icon in Pre-header Right Area?', 'leblix' ),
				'description'	=> esc_attr__( 'Select YES to show search icon in pre-header right side.', 'leblix' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'leblix' ),
					'off' => esc_attr__( 'No', 'leblix' ),
				),
				'active_callback'	=> array( array(
					'setting'			=> 'preheader-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
		),
	),
	// Header Options
	'header_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Header Options', 'leblix' ),
			'panel'			=> 'leblix_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'header-style',
				'label'		=> esc_html__( 'Header Style', 'leblix' ),
				'description'	=> '<div class="cspt-alert-message">'.esc_html__( 'NOTE: This will also change other options (like background color, menu color, logo etc) to set it with this header.', 'leblix' ).'</div>',
				'default'	=> '1',
				'choices'		=> $header_style_array,
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-header-box-typography',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Header Box Typography', 'leblix' ) . '</h2> <span>' . esc_html__( 'Select or change header box typography', 'leblix' ) . '</span></div>',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
					)
				),
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'header-box-title-typography',
				'label'			=> esc_attr__( 'Header Typography - Box Title', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Barlow',
					'variant'			=> '800',
					'font-size'			=> '17px',
					'line-height'		=> '27px',
					'letter-spacing'	=> '0px',
					'color'				=> '#0c121d',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'cspt-output'	=> '.cspt-header-box-title',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
					)
				),
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'header-box-content-typography',
				'label'			=> esc_attr__( 'Header Typography - Box Content', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Barlow',
					'variant'			=> '700',
					'font-size'			=> '15px',
					'line-height'		=> '25px',
					'letter-spacing'	=> '1px',
					'color'				=> '#b0b6bf',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'cspt-output'	=> '.cspt-header-box-content',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
					)
				),
			),
			// Header Contact button
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-Contact-button-options',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Header Contact Button', 'leblix' ) . '</h2> <span>' . esc_html__( 'Set header button title and link', 'leblix' ) . '</span></div>',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
					)
				),
			),
			array(
				'type'				=> 'text',
				'settings'			=> 'header-contact-btn-text',
				'label'				=> esc_attr__( 'Header Contact Button Text', 'leblix' ),
				'default'		=> esc_attr__( 'Have any Question ?', 'leblix' ),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
					)
				),
				'partial_refresh'	=> array(
					'header-contact-btn-text'	=> array(
						'selector'			=> '.cspt-header-button',
						'render_callback'	=> function() {
							return cspt_header_button( array('inneronly'=>'yes') );
						},
					)
				),
			),
			array(
				'type'				=> 'text',
				'settings'			=> 'header-contact-btn-text2',
				'label'				=> esc_attr__( 'Header Button Text (2nd line)', 'leblix' ),
				'default'			=> '2',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
					)
				),
			), 
			array(
				'type'				=> 'text',
				'settings'			=> 'header-contact-btn-url',
				'label'				=> esc_attr__( 'Header Contact Button Link (URL)', 'leblix' ),
				'default'			=> '2',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
					)
				),
			),
			// Header button
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-header-button-options',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Header Button', 'leblix' ) . '</h2> <span>' . esc_html__( 'Set header button title and link', 'leblix' ) . '</span></div>',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
					)
				),
			),
			array(
				'type'				=> 'text',
				'settings'			=> 'header-btn-text',
				'label'				=> esc_attr__( 'Header Button Text (1st line)', 'leblix' ),
				'default'		=> esc_attr__( 'Have any Question ?', 'leblix' ),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
					)
				),
				'partial_refresh'	=> array(
					'header-btn-text'	=> array(
						'selector'			=> '.cspt-header-button',
						'render_callback'	=> function() {
							return cspt_header_button( array('inneronly'=>'yes') );
						},
					)
				),
			),

			array(
				'type'				=> 'text',
				'settings'			=> 'header-btn-url',
				'label'				=> esc_attr__( 'Header Button Link (URL)', 'leblix' ),
				'default'			=> '',
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '2',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
					)
				),
			),

			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-header-options',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'General Options', 'leblix' ) . '</h2> <span>' . esc_html__( 'Common options that apply to all header styles', 'leblix' ) . '</span></div>',
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'header-height',
				'label'			=> esc_attr__( 'Header Height (in pixel)', 'leblix' ),
				'description'	=> esc_attr__( 'Select header height', 'leblix' ),
				'default'		=> 100,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 900,
					'step'			=> 1,
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'header-bgcolor',
				'label'				=> esc_html__( 'Select header background color', 'leblix' ),
				'default'			=> 'white',
				'choices'			=> $pre_color_list,
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'header-background-color',
				'label'			=> esc_attr__( 'Header Background Color', 'leblix' ),
				'description'	=> esc_attr__( 'Select custom color for header background', 'leblix' ),
				'default'		=> '#ffffff',
				'active_callback'=> array(
					array(
						'setting'	=> 'header-bgcolor',
						'operator'	=> '==',
						'value'		=> 'custom',
					)
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'menu-bgcolor',
				'label'				=> esc_html__( 'Select menu area background color', 'leblix' ),
				'default'			=> 'white',
				'choices'			=> $pre_color_list,
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '5',
						),
					)
				),
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'menu-background-color',
				'label'			=> esc_attr__( 'Menu Area Background Color', 'leblix' ),
				'description'	=> esc_attr__( 'Select custom color for Menu area background', 'leblix' ),
				'default'		=> '#ffffff',
				'active_callback'=> array(
					array(
						'setting'	=> 'menu-bgcolor',
						'operator'	=> '==',
						'value'		=> 'custom',
					)
				),
			),
			// Search in Header
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-search-header-options',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Search in Header', 'leblix' ) . '</h2> <span>' . esc_html__( 'Options for search in header area', 'leblix' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'header-search',
				'label'			=> esc_attr__( 'Show Search Icon in Header Area?', 'leblix' ),
				'description'	=> esc_attr__( 'Select YES to show search icon in header area.', 'leblix' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'leblix' ),
					'off' => esc_attr__( 'No', 'leblix' ),
				),
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'header-search-placeholder',
				'label'			=> esc_attr__( 'Search input placeholder text', 'leblix' ),
				'description'	=> esc_attr__( 'Search input placeholder text', 'leblix' ),
				'default'		=> esc_attr__( 'Write Search Keyword & Press Enter', 'leblix' ),
				'active_callback' => array(
					array(
						'setting'	=> 'header-search',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'header-search-btn-text',
				'label'			=> esc_attr__( 'Search button text', 'leblix' ),
				'description'	=> esc_attr__( 'Search button text', 'leblix' ),
				'default'		=> esc_attr__( 'Search', 'leblix' ),
				'active_callback' => array(
					array(
						'setting'	=> 'header-search',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			// Sticky Header
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-sticky-header-options',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Sticky Header Options', 'leblix' ) . '</h2> <span>' . esc_html__( 'Options for sticky header area', 'leblix' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'sticky-header',
				'label'			=> esc_attr__( 'Sticky Header on Scroll?', 'leblix' ),
				'description'	=> esc_attr__( 'Select YES to make header sticky on scroll.', 'leblix' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'leblix' ),
					'off' => esc_attr__( 'No', 'leblix' ),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'sticky-header-height',
				'label'			=> esc_attr__( 'Sticky Area Height (in pixel)', 'leblix' ),
				'description'	=> esc_attr__( 'Select Area height for sticky header', 'leblix' ),
				'default'		=> 90,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 300,
					'step'			=> 1,
				),
				'active_callback'=> array(
					array(
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '1',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '3',
						),
						array(
							'setting'	=> 'header-style',
							'operator'	=> '==',
							'value'		=> '4',
						),
					)
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'sticky-header-bgcolor',
				'label'				=> esc_html__( 'Sticky Area Background Color', 'leblix' ),
				'default'			=> 'white',
				'choices'			=> $pre_color_list,
				'active_callback'	=> array(
					array(
						'setting'	=> 'sticky-header',
						'operator'	=> '==',
						'value'		=> '1',
					)
				),
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'sticky-header-background-color',
				'label'			=> esc_attr__( 'Sticky Header Background Custom Color', 'leblix' ),
				'description'	=> esc_attr__( 'Select custom color for sticky header background', 'leblix' ),
				'default'		=> '#ffffff',
				'active_callback'=> array(
					array(
						'setting'	=> 'sticky-header',
						'operator'	=> '==',
						'value'		=> '1',
					),
					array(
						'setting'	=> 'sticky-header-bgcolor',
						'operator'	=> '==',
						'value'		=> 'custom',
					)
				),
			),
			// Responsive Header
			array(
				'type'			=> 'custom',
				'settings'		=> 'responsive-header-options',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Responsive Header Options', 'leblix' ) . '</h2> <span>' . esc_html__( 'Options for responsive (mobile or tablet mode) header area', 'leblix' ) . '</span></div>',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'responsive-header-bgcolor',
				'label'				=> esc_html__( 'Select header background color', 'leblix' ),
				'default'			=> 'white',
				'choices'			=> $pre_two_color_list,
			),
		),
	),
	// Menu Options
	'menu_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Menu Options', 'leblix' ),
			'panel'			=> 'leblix_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Main Menu Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'main-menu-heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Main Menu Options', 'leblix' ) . '</h2> <span>' . esc_html__( 'Set Main Menu font settings', 'leblix' ) . '</span></div>',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'main-menu-typography',
				'label'			=> esc_attr__( 'Main Menu Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Poppins',
					'variant'			=> '600',
					'font-size'			=> '13px',
					'line-height'		=> '24px',
					'letter-spacing'	=> '0.15px',
					'color'				=> '#101010',
					'text-transform'	=> 'capitalize',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'cspt-output'	=> 'body:not(.cspt-max-mega-menu-override) .cspt-navbar div > ul > li > a, .cspt-max-mega-menu-override #page #site-navigation .max-mega-menu > li.mega-menu-item > a.mega-menu-link',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'main-menu-active-color',
				'label'			=> esc_attr__( 'Main Menu Active Link Color', 'leblix' ),
				'description'	=> esc_attr__( 'This color will be applied to main menu when the menu link is active', 'leblix' ),
				'default'		=> 'globalcolor',
				'choices'		=> $pre_text_color_list,
			),
			array(
				'type'			=> 'color',
				'settings'		=> 'main-menu-sticky-color',
				'label'			=> esc_attr__( 'Main Menu Text Color for Sticky Header', 'leblix' ),
				'description'	=> esc_attr__( 'This color will be applied to main menu text when header is sticky', 'leblix' ),
				'default'		=> '#101010',
			),
			// Dropdown Menu Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'drop-down-menu-heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Dropdown Menu Options', 'leblix' ) . '</h2> <span>' . esc_html__( 'Set Dropdown font settings', 'leblix' ) . '</span></div>',
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'dropdown-menu-typography',
				'label'			=> esc_attr__( 'Dropdown Menu Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Archivo',
					'variant'			=> '700',
					'font-size'			=> '13px',
					'line-height'		=> '1.5',
					'letter-spacing'	=> '0.5px',
					'color'				=> '#101010',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'cspt-output'	=> '.cspt-navbar ul ul a',
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'dropdown_background',
				'label'			=> esc_attr__( 'Dropdown Menu Background', 'leblix' ),
				'description'	=> esc_attr__( 'Background settings for Dropdown Menu', 'leblix' ),
				'default'		=> array(
					'background-color'		=> '#f6f6f6',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'cspt-output'	=> '.cspt-navbar ul ul,.cspt-navbar ul ul:before',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'drop-down-menu-active-color',
				'label'				=> esc_html__( 'Dropdown Menu Active Color', 'leblix' ),
				'default'			=> 'globalcolor',
				'choices'			=> $pre_text_color_list,
			),
			// Max Mega Menu Option
			array(
				'type'			=> 'custom',
				'settings'		=> 'max-mega-menu-override-heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Max Mega Menu Plugin Option', 'leblix' ) . '</h2> <span>' . esc_html__( 'Option for Max Mega Menu plugin', 'leblix' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'max-mega-menu-override',
				'label'			=> esc_attr__( 'Override Max Mega Menu design?', 'leblix' ),
				'description'	=> esc_attr__( 'Select YES to override Max Mega Menu design. Make sure you are using "Max Mega Menu" plugin for mega menu', 'leblix' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'leblix' ),
					'off' => esc_attr__( 'No', 'leblix' ),
				),
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'mmm-title-typography',
				'label'			=> esc_attr__( 'Max Mega Menu - Widget Title Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Yantramanav',
					'variant'			=> '500',
					'font-size'			=> '16px',
					'line-height'		=> '20px',
					'letter-spacing'	=> '0px',
					'color'				=> '#232e35',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-weight'		=> 500,
					'font-style'		=> 'normal',
				),
				'active_callback'=> array(
					array(
						'setting'	=> 'max-mega-menu-override',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
				'priority'		=> 10,
				'cspt-output'	=> '.cspt-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li.mega-menu-megamenu > ul.mega-sub-menu > li.mega-menu-item h4.mega-block-title, .cspt-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li.mega-menu-megamenu > ul.mega-sub-menu li.mega-menu-column > ul.mega-sub-menu > li.mega-menu-item h4.mega-block-title',
			),
			array( // 1st dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-1-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 1st Dropdown Menu Background Option', 'leblix' ),
				'description'	=> esc_attr__( 'Background settings for first Dropdown Menu in Max Mega Menu', 'leblix' ),
				'default'		=> array(
					'background-color'		=> '#f6f6f6',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'active_callback'=> array(
					array(
						'setting'	=> 'max-mega-menu-override',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
				'cspt-output'	=> '.cspt-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(1) > ul.mega-sub-menu',
			),
			array( // 2nd dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-2-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 2nd Dropdown Menu Background Option', 'leblix' ),
				'description'	=> esc_attr__( 'Background settings for second Dropdown Menu in Max Mega Menu', 'leblix' ),
				'default'		=> array(
					'background-color'		=> '#f6f6f6',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'active_callback'=> array(
					array(
						'setting'	=> 'max-mega-menu-override',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
				'cspt-output'	=> '.cspt-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(2) > ul.mega-sub-menu',
			),
			array( // 3rd dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-3-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 3rd Dropdown Menu Background Option', 'leblix
				' ),
				'description'	=> esc_attr__( 'Background settings for third Dropdown Menu in Max Mega Menu', 'leblix' ),
				'default'		=> array(
					'background-color'		=> '#f6f6f6',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'active_callback'=> array(
					array(
						'setting'	=> 'max-mega-menu-override',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
				'cspt-output'	=> '.cspt-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(3) > ul.mega-sub-menu',
			),
			array( // 4th dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-4-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 4th Dropdown Menu Background Option', 'leblix' ),
				'description'	=> esc_attr__( 'Background settings for fourth Dropdown Menu in Max Mega Menu', 'leblix' ),
				'default'		=> array(
					'background-color'		=> '#f6f6f6',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'active_callback'=> array(
					array(
						'setting'	=> 'max-mega-menu-override',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
				'cspt-output'	=> '.cspt-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(4) > ul.mega-sub-menu',
			),
			array( // 5th dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-5-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 5th Dropdown Menu Background Option', 'leblix' ),
				'description'	=> esc_attr__( 'Background settings for fifth Dropdown Menu in Max Mega Menu', 'leblix' ),
				'default'		=> array(
					'background-color'		=> '#f6f6f6',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'active_callback'=> array(
					array(
						'setting'	=> 'max-mega-menu-override',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
				'cspt-output'	=> '.cspt-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(5) > ul.mega-sub-menu',
			),
			array( // 6th dropdown mega menu
				'type'			=> 'background',
				'settings'		=> 'mmm-6-dropdown',
				'label'			=> esc_attr__( 'Max Mega Menu - 6th Dropdown Menu Background Option', 'leblix' ),
				'description'	=> esc_attr__( 'Background settings for sixth Dropdown Menu in Max Mega Menu', 'leblix' ),
				'default'		=> array(
					'background-color'		=> '#f6f6f6',
					'background-image'		=> '',
					'background-repeat'		=> 'repeat',
					'background-position'	=> 'center center',
					'background-size'		=> 'cover',
					'background-attachment'	=> 'scroll',
				),
				'active_callback'=> array(
					array(
						'setting'	=> 'max-mega-menu-override',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
				'cspt-output'	=> '.cspt-max-mega-menu-override #page #site-navigation .mega-menu-wrap > ul > li:nth-child(6) > ul.mega-sub-menu',
			),
		)
	),
	// Titlebar Options
	'titlebar_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Titlebar Options', 'leblix' ),
			'panel'			=> 'leblix_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'switch',
				'settings'		=> 'titlebar-enable',
				'label'			=> esc_attr__( 'Show Titlebar?', 'leblix' ),
				'description'	=> esc_attr__( 'Show or hide Titlebar', 'leblix' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'leblix' ),
					'off' => esc_attr__( 'No', 'leblix' ),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'titlebar-height',
				'label'			=> esc_attr__( 'Titlebar Height', 'leblix' ),
				'default'		=> 300,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 1000,
					'step'			=> 1,
				),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'titlebar-style',
				'label'			=> esc_attr__( 'Titlebar Style', 'leblix' ),
				'description'	=> esc_attr__( 'Select style for Titlebar', 'leblix' ),
				'default'		=> 'left',
				'choices'		=>  array(
					'left'			=> esc_attr__( 'All Left Aligned', 'leblix' ),
					'center'		=> esc_attr__( 'All Center Aligned', 'leblix' ),
				),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'titlebar-hide-breadcrumb',
				'label'			=> esc_attr__( 'Hide Breadcrumb?', 'leblix' ),
				'description'	=> esc_attr__( 'Show or hide breadcrumb in Titlebar', 'leblix' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'leblix' ),
					'off' => esc_attr__( 'No', 'leblix' ),
				),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'multicheck',
				'settings'		=> 'titlebar-bg-featured',
				'label'			=> esc_attr__( 'Featured Image as Titlebar Background', 'leblix' ),
				'description'	=> esc_attr__( 'Select which section (CPT) will show featured image as background image in Titlebar. NOTE: This will work for Single view only.', 'leblix' ),
				'default'		=> array(),
				'choices'		=> array(
					'post'				=> sprintf( esc_attr__('For %1$s', 'leblix') , '"Post"' ),
					'page'				=> sprintf( esc_attr__('For %1$s', 'leblix') , '"Page"' ),
					'cspt-portfolio'	=> sprintf( esc_attr__('For %1$s', 'leblix') , '"'.$portfolio_cpt_singular_title.'"' ),
					'cspt-team-member'	=> sprintf( esc_attr__('For %1$s', 'leblix') , '"'.$team_cpt_singular_title.'"' ),
				),
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'titlebar-bgcolor',
				'label'				=> esc_html__( 'Select Titlebar background color', 'leblix' ),
				'default'			=> 'custom',
				'choices'			=> $pre_color_with_gradient_list,
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'titlebar-background',
				'label'			=> esc_attr__( 'Background', 'leblix' ),
				'description'	=> esc_attr__( 'Background Settings', 'leblix' ),
				'default'		=> array(
					'background-color'      => '#003281',
					'background-repeat'     => 'no-repeat',
					'background-position'   => 'center center',
					'background-size'       => 'cover',
					'background-attachment' => 'scroll',
				),
				'cspt-output'	=> '.cspt-title-bar-wrapper, .cspt-title-bar-wrapper.cspt-bg-color-custom:before',
				'active_callback' => array( array(
					'setting'		=> 'titlebar-enable',
					'operator'		=> '==',
					'value'			=> '1',
				) ),
			),
			array(
				'type'		=> 'typography',
				'settings'	=> 'titlebar-heading-typography',
				'label'		=> esc_attr__( 'Titlebar Heading Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Poppins',
					'variant'			=> '700',
					'font-size'			=> '44px',
					'line-height'		=> '60px',
					'letter-spacing'	=> '-2px',
					'color'				=> '#fff',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'cspt-output'	=> '.cspt-tbar-title',
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'titlebar-subheading-typography',
				'label'			=> esc_attr__( 'Titlebar Sub-heading Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Archivo',
					'variant'			=> '600',
					'font-size'			=> '18px',
					'line-height'		=> '1.5',
					'letter-spacing'	=> '0px',
					'color'				=> '#101010',
					'text-transform'	=> 'none',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
				'priority'		=> 10,
				'cspt-output'	=> '.cspt-tbar-subtitle',
				'active_callback'	=> array( array(
					'setting'			=> 'titlebar-enable',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'typography',
				'settings'		=> 'titlebar-breadcrumb-typography',
				'label'			=> esc_attr__( 'Titlebar Breadcrumb Typography', 'leblix' ),
				'choices'		=> [ 'fonts' => [ 'google' => [ 'popularity', 600 ], ], ],
				'default'		=> array(
					'font-family'		=> 'Archivo',
					'variant'			=> '500',
					'font-size'			=> '15px',
					'line-height'		=> '1.5',
					'letter-spacing'	=> '0px',
					'color'				=> '#101010',
					'text-transform'	=> 'uppercase',
					'font-backup'		=> '',
					'font-style'		=> 'normal',
				),
			'priority'				=> 10,
				'cspt-output'		=> '.cspt-breadcrumb, .cspt-breadcrumb a',
				'active_callback'	=> array(
					array(
						'setting'			=> 'titlebar-enable',
						'operator'			=> '==',
						'value'				=> '1',
					),
					array(
						'setting'			=> 'titlebar-hide-breadcrumb',
						'operator'			=> '==',
						'value'				=> '0',
					)
				),
			),
		),
	),
	// Footer Options
	'footer_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Footer Options', 'leblix' ),
			'panel'			=> 'leblix_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Footer Background settings
			array(
				'type'			=> 'custom',
				'settings'		=> 'footer-background-settings-heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Footer Background Settings', 'leblix' ) . '</h2> <span>' . sprintf( esc_attr__( 'Manage footer background settings from here', 'leblix' ) , $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'footer-bgcolor',
				'label'			=> esc_html__( 'Select Footer background color', 'leblix' ),
				'default'		=> 'custom',
				'choices'		=> $pre_color_with_gradient_list,
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'footer-background',
				'label'			=> esc_attr__( 'Background', 'leblix' ),
				'description'	=> esc_attr__( 'Background Settings', 'leblix' ),
				'default'		=> array(
					'background-color'		=> '#003281',
					'background-image'		=> '',
					'background-repeat'		=> 'no-repeat',
					'background-position'	=> 'center top',
					'background-size'		=> 'contain',
					'background-attachment'	=> 'scroll',
				),

				'cspt-output'	=> '.site-footer, .site-footer.cspt-bg-color-custom:before',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'footer-text-color',
				'label'				=> esc_attr__( 'Select Footer Text Color', 'leblix' ),
				'default'			=> 'white',
				'choices'			=> $pre_text_color_list,
			),

			// Footer Boxes Area
			array(
				'type'			=> 'custom',
				'settings'		=> 'footer-boxes-area-heading',
				'default'		=> '<div class="leblix-option-heading"><h2>' . esc_html__( 'Footer Boxes Area', 'leblix' ) . '</h2> <span>' . sprintf( esc_attr__( 'Manage footer boxes from here', 'leblix' ) , $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'footer-boxes-area',
				'label'			=> esc_attr__( 'Show footer boxes?', 'leblix' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'leblix' ),
					'off' => esc_attr__( 'No', 'leblix' ),
				),
			),
			array(
				'type'				=> 'image',
				'settings'			=> 'footer-logo',
				'label'				=> esc_attr__( 'Foorer Logo', 'leblix' ),
				'default'			=> get_template_directory_uri() . '/images/logo.png',
				'active_callback'	=> array( array(
					'setting'			=> 'footer-boxes-area',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			// 1st box
			array(
				'type'			=> 'creativesplanet_icon_picker',
				'settings'		=> 'footer-box-1-icon',
				'label'			=> esc_attr__( '1st Footer box - Icon', 'leblix' ),
				'description'	=> esc_attr__( 'Select icon for 1st box', 'leblix' ),
				'default'		=> esc_attr('cspt-leblix-icon cspt-leblix-icon-email;fa fa-map-marker;sgicon sgicon-Pointer'),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-boxes-area',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'		=> 'text',
				'settings'	=> 'footer-box-1-title',
				'label'		=> esc_attr__( '1st Footer Box - Title', 'leblix' ),
				'default'	=> esc_attr('Call us for any question'),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-boxes-area',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
				'partial_refresh'	=> array(
					'footer-box-1-title'		=> array(
						'selector'			=> '.cspt-label-1',
						'render_callback'	=> function() {
							return do_shortcode(get_theme_mod('footer-box-1-title'));
						},
					)
				),
			),
			array(
				'type'		=> 'text',
				'settings'	=> 'footer-box-1-content',
				'label'		=> esc_attr__( '1st Footer Box - Content', 'leblix' ),
				'default'	=> esc_attr('(+00)888.666.88'),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-boxes-area',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'footer-left-area',
				'label'			=> esc_attr__( 'Footer Left Area', 'leblix' ),
				'default'		=> cspt_esc_kses('[cspt-social-links]'),
				'active_callback'	=> array( array(
					'setting'			=> 'footer-boxes-area',
					'operator'			=> '==',
					'value'				=> '1',
				) ),
			),
			// Footer Widget Area
			array(
				'type'			=> 'custom',
				'settings'		=> 'footer-widget-heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Footer Widget Area', 'leblix' ) . '</h2> <span>' . sprintf( esc_attr__( 'Manage widget area settings', 'leblix' ) , $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'footer-column',
				'label'		=> esc_html__( 'Footer Widget Column Type', 'leblix' ),
				'description'	=> esc_html__( 'This will show widgets. You can manage it from "Admin > Appearance > Widgets" section.', 'leblix' ),
				'default'	=> '4-4-4',
				'choices'		=> array(
					'12'		=> get_template_directory_uri() . '/includes/images/footer-12.png',
					'6-6'		=> get_template_directory_uri() . '/includes/images/footer-6-6.png',
					'4-4-4'		=> get_template_directory_uri() . '/includes/images/footer-4-4-4.png',
					'3-3-3-3'	=> get_template_directory_uri() . '/includes/images/footer-3-3-3-3.png',
					'2-2-2-6'	=> get_template_directory_uri() . '/includes/images/footer-2-2-2-6.png',
					'6-2-2-2'	=> get_template_directory_uri() . '/includes/images/footer-6-2-2-2.png',
					'8-4'		=> get_template_directory_uri() . '/includes/images/footer-8-4.png',
					'4-8'		=> get_template_directory_uri() . '/includes/images/footer-4-8.png',
					'custom'	=> get_template_directory_uri() . '/includes/images/footer-col-custom.png',
				),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-1-col-width',
				'label'			=> esc_attr__( 'Footer Widget Width - 1st Column', 'leblix' ),
				'description'	=> esc_attr__( 'Set custom width of the 1st column in footer widget area', 'leblix' ),
				'default'		=> '25',
				'choices'		=> $footer_col_width_array,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-column',
						'operator'			=> '==',
						'value'				=> 'custom',
					)
				),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-2-col-width',
				'label'			=> esc_attr__( 'Footer Widget Width - 2nd Column', 'leblix' ),
				'description'	=> esc_attr__( 'Set custom width of the 2nd column in footer widget area', 'leblix' ),
				'default'		=> '50',
				'choices'		=> $footer_col_width_array,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-column',
						'operator'			=> '==',
						'value'				=> 'custom',
					)
				),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-3-col-width',
				'label'			=> esc_attr__( 'Footer Widget Width - 3rd Column', 'leblix' ),
				'description'	=> esc_attr__( 'Set custom width of the 3rd column in footer widget area', 'leblix' ),
				'default'		=> '25',
				'choices'		=> $footer_col_width_array,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-column',
						'operator'			=> '==',
						'value'				=> 'custom',
					)
				),
			),
			array(
				'type'			=> 'select',
				'settings'		=> 'footer-4-col-width',
				'label'			=> esc_attr__( 'Footer Widget Width - 4th Column', 'leblix' ),
				'description'	=> esc_attr__( 'Set custom width of the 4th column in footer widget area', 'leblix' ),
				'default'		=> '30',
				'choices'		=> $footer_col_width_array,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-column',
						'operator'			=> '==',
						'value'				=> 'custom',
					)
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'footer-widget-bgcolor',
				'label'				=> esc_html__( 'Select Footer Widget Area background color', 'leblix' ),
				'default'			=> 'transparent',
				'choices'			=> $pre_color_with_gradient_list,
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'footer-widget-background',
				'label'			=> esc_attr__( 'Footer Widget Area Background', 'leblix' ),
				'description'	=> esc_attr__( 'Background Settings for footer widget area', 'leblix' ),
				'default'		=> array(
					'background-color'		=> '#003281',
				    'background-image'		=> '',
				    'background-repeat'		=> 'repeat',
				    'background-position'	=> 'center center',
				    'background-size'		=> 'cover',
				    'background-attachment'	=> 'scroll',
				),
				'cspt-output'	=> '.cspt-footer-widget-area, .cspt-footer-widget-area.cspt-bg-color-custom:before',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'footer-widget-color-switch',
				'label'			=> esc_attr__( 'Set Custom Text Color for Widget Area?', 'leblix' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'leblix' ),
					'off' => esc_attr__( 'No', 'leblix' ),
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'footer-widget-text-color',
				'label'				=> esc_attr__( 'Footer Widget Area Text Color', 'leblix' ),
				'default'			=> 'white',
				'choices'			=> $pre_text_color_list,
				'active_callback'	=> array(
					array(
						'setting'			=> 'footer-widget-color-switch',
						'operator'			=> '==',
						'value'				=> '1',
					)
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'footer-copyright-heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Footer Copyright Text Area', 'leblix' ) . '</h2> <span>' . sprintf( esc_attr__( 'Manage bottom footer area from here', 'leblix' ) , $portfolio_cpt_singular_title ) . '</span></div>',
			),

			array(
				'type'				=> 'radio-image',
				'settings'			=> 'footer-copyright-bgcolor',
				'label'				=> esc_html__( 'Select Footer Copyright Area background color', 'leblix' ),
				'default'			=> 'transparent',
				'choices'			=> $pre_color_with_gradient_list,
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'footer-copyright-background',
				'label'			=> esc_attr__( 'Footer Copyright Area Background', 'leblix' ),
				'description'	=> esc_attr__( 'Background Settings for footer copyright area', 'leblix' ),
				'default'		=> array(
					'background-color'		=> '#0a0a0a',
				    'background-image'		=> '',
				    'background-repeat'		=> 'repeat',
				    'background-position'	=> 'center center',
				    'background-size'		=> 'cover',
				    'background-attachment'	=> 'scroll',
				),
				'cspt-output'	=> '.cspt-footer-text-area, .cspt-footer-text-area.cspt-bg-color-custom:before',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'footer-copyright-color-switch',
				'label'			=> esc_attr__( 'Set Custom Text Color for Copyright Area?', 'leblix' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'leblix' ),
					'off' => esc_attr__( 'No', 'leblix' ),
				),
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'footer-copyright-text-color',
				'label'				=> esc_attr__( 'Footer Copyright Area Text Color', 'leblix' ),
				'default'			=> 'white',
				'choices'			=> array_merge( array('inherit' => get_template_directory_uri() . '/includes/images/precolor-inherit.png'), $pre_text_color_list ),
				'active_callback'	=> array(
					array(
						'setting'		=> 'footer-copyright-color-switch',
						'operator'		=> '==',
						'value'			=> '1',
					)
				),
			),

			array(
				'type'			=> 'editor',
				'settings'		=> 'copyright-text',
				'label'			=> esc_attr__( 'Footer Copyright Text', 'leblix' ),
				'default'		=> sprintf( esc_attr__( 'Copyright &copy; %1$s %2$s, All Rights Reserved.', 'leblix' ), date('Y'), '<a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo('name') . '</a>' ),
				'priority'		=> 10,
				'partial_refresh'	=> array(
					'copyright-text'		=> array(
						'selector'			=> '.cspt-footer-copyright-text',
						'render_callback'	=> function() {
							return do_shortcode(get_theme_mod('copyright-text'));
						},
					)
				),
			),

			array(
				'type'			=> 'select',
				'settings'		=> 'footer-copyright-right-content',
				'label'			=> esc_attr__( 'Footer Copyright Right Side', 'leblix' ),
				'default'		=> 'footer-menu',
				'priority'		=> 10,
				'multiple'		=> 0,
				'choices'		=> [
					'footer-menu'		=> esc_attr__( 'Show Footer Menu', 'leblix' ),
					'social-links'		=> esc_attr__( 'Show Social Links', 'leblix' ),
					''					=> esc_attr__( 'None', 'leblix' ),
				],
			),



		)
	),
	// Social Links Options
	'social_links_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Social Links Options', 'leblix' ),
			'description'	=> esc_attr__( 'You can use [cspt-social-links] shortcode for social list with icon.', 'leblix' ),
			'panel'			=> 'leblix_base_options',
			'priority'		=> 160,
		),
		'section_fields' => $social_options_array
	),
	// Blog Settings
	'blog_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Blog Options', 'leblix' ),
			'panel'			=> 'leblix_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-blog-options',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Blog Settings', 'leblix' ) . '</h2> <span>' . esc_html__( 'Settings for Blogroll, Category, Tag, Archives etc section.', 'leblix' ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'blogroll-view',
				'label'			=> esc_html__( 'Blogroll view', 'leblix' ),
				'default'		=> 'classic',
				'choices'		=> cspt_element_template_list('blog', 'customizer'),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'blogroll-column',
				'label'			=> esc_html__( 'Blogroll column', 'leblix' ),
				'default'		=> '3',
				'choices'		=> $column_list,
				'active_callback'	=> array(
					array(
						'setting'		=> 'blogroll-view',
						'operator'		=> '!=',
						'value'			=> 'classic',
					)
				),
			),
			array(
			'type'			=> 'switch',
			'settings'		=> 'blog-show-related',
			'label'			=> esc_attr__( 'Show Related Post?', 'leblix' ),
			'default'		=> '0',
			'choices'     => array(
				'on'  => esc_attr__( 'Yes', 'leblix' ),
				'off' => esc_attr__( 'No', 'leblix' ),
			),
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'blog-related-title',
				'label'			=> esc_attr__( 'Related Post Section Title', 'leblix' ), 
				'description'	=> esc_attr__( 'Related Area Title', 'leblix' ),
				'default'		=> esc_attr__( 'Related Post', 'leblix' ),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'blog-related-count',
				'label'			=> esc_attr__( 'How many post you like to show', 'leblix' ),
				'default'		=> 3,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'blog-related-column',
				'label'			=>  esc_html__('Related Post Column', 'leblix' ),
				'default'		=> '3',
				'choices'     => $column_list,
				'active_callback' => array(
					array(
						'setting'	=> 'blog-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'blog-related-style',
				'label'			=> esc_html__( 'Related Post View', 'leblix' ),
				'default'		=> '1',
				'choices'     => $blog_styles,
				'active_callback' => array(
					array(
						'setting'	=> 'blog-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'multicheck',
				'settings'		=> 'blog-social-share',
				'label'			=> esc_attr__( 'Social share for Blog', 'leblix' ),
				'description'	=> esc_attr__( 'Select which social share buttons will appear on blog post.', 'leblix' ),
				'default'		=> array(),
				'choices'		=> cspt_social_share_list('customizer'),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-blog-classic-options',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Blog Classic Settings', 'leblix' ) . '</h2> <span>' . esc_html__( 'Settings for Blog Classic view.', 'leblix' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'blog-classic-limit-switch',
				'label'			=> esc_attr__( 'Limit Content Words for Blog Classic view?', 'leblix' ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'leblix' ),
					'off' => esc_attr__( 'No', 'leblix' ),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'blog-classic-limit',
				'label'			=> esc_attr__( 'Set Word Limit for Blog Classic view', 'leblix' ),
				'description'	=> esc_attr__( 'This will add limited words before "Read More" link. This is useful if you didn\'t added Read More link in posts.', 'leblix' ),
				'default'		=> 15,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 900,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-classic-limit-switch',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-blog-element-options',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Blog Style Elements (boxes) Settings', 'leblix' ) . '</h2> <span>' . esc_html__( 'Settings for Blog Style Elements.', 'leblix' ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'blog-element-limit-switch',
				'label'			=> esc_attr__( 'Limit Content Words for Blog Element view?', 'leblix' ),
				'default'		=> '1',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'leblix' ),
					'off' => esc_attr__( 'No', 'leblix' ),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'blog-element-limit',
				'label'			=> esc_attr__( 'Limit Words for Blog Element view', 'leblix' ),
				'description'	=> esc_attr__( 'This will add limited words before "Read More" link.', 'leblix' ),
				'default'		=> 30,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 900,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'blog-element-limit-switch',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-blog-sidebar-options',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Sidebar Settings', 'leblix' ) . '</h2> <span>' . esc_html__( 'Select sidebar position Page and Blog section.', 'leblix' ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-post',
				'label'		=> esc_html__( 'Blog Sidebar', 'leblix' ),
				'default'	=> 'right',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
		)
	),
	// Portfolio Settings
	'portfolio_options' => array(
		'section_settings' => array(
			'title'			=> sprintf( esc_attr__( '%1$s options', 'leblix' ) , $portfolio_cpt_singular_title ) ,
			'panel'			=> 'leblix_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-portfolio-settings',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . sprintf( esc_html__( 'Single %1$s Options', 'leblix' ), $portfolio_cpt_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Options for Single %1$s Section', 'leblix' ), $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'portfolio-single-style',
				'label'		=> sprintf( esc_html__( '%1$s Single View Style', 'leblix' ), $portfolio_cpt_singular_title ),
				'default'	=> '1',
				'choices'		=> $portfolio_single_style_array,
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-portfolio-detailsbox-settings',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . sprintf( esc_html__( 'Single %1$s Details Box Options', 'leblix' ), $portfolio_cpt_singular_title ) . '</h2> <span>' . esc_attr__( 'Details Box Settings', 'leblix' ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-details-title',
				'label'			=> sprintf( esc_attr__( 'Single %1$s Details Box Title', 'leblix' ), $portfolio_cpt_singular_title ),
				'description'	=> esc_attr__( 'Details Box Title', 'leblix' ),
				'default'		=> esc_attr__( 'Project info', 'leblix' ),
			),
			array(
				'type'			=> 'repeater',
				'label'			=> sprintf( esc_attr__( 'Single %1$s Details Box', 'leblix' ), $portfolio_cpt_singular_title ),
				'row_label'		=> array(
					'type'			=> 'field',
					'value'			=> esc_attr__('Line', 'leblix' ),
					'field'			=> 'line_title',
				),
				'button_label'	=> esc_attr__('Add New Line', 'leblix' ),
				'settings'		=> 'portfolio-details',
				'fields'		=> array(
					'line_title'	=> array(
						'type'			=> 'text',
						'label'			=> esc_attr__( 'Line Title', 'leblix' ),
						'description'	=> esc_attr__( 'This will be the label for the line', 'leblix' ),
						'default'		=> '',
					),
					'line_type'		=> array(
						'type'			=> 'select',
						'label'			=> esc_attr__( 'Line Type', 'leblix' ),
						'description'	=> esc_attr__( 'This will be type for the line', 'leblix' ),
						'default'		=> 'text',
						'choices'		=> array(
							'text'			=> esc_attr__( 'Normal Text', 'leblix' ),
							'category'		=> esc_attr__( 'Category List (without link)', 'leblix' ),
							'category-link'	=> esc_attr__( 'Category List (with link)', 'leblix' ),
						)
					),
				),
				'default'		=> array(
					array(
						'line_title'	=> esc_attr__('Date', 'leblix'),
						'line_type'		=> 'text',
					),
					array(
						'line_title'	=> esc_attr__('Client', 'leblix'),
						'line_type'		=> 'text',
					),
					array(
						'line_title'	=> esc_attr__('Category', 'leblix'),
						'line_type'		=> 'category-link',
					),
					array(
						'line_title'	=> esc_attr__('Address', 'leblix'),
						'line_type'		=> 'text',
					),
    			),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-portfolio-related-settings',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . sprintf( esc_html__( 'Related %1$s Options', 'leblix' ), $portfolio_cpt_singular_title ) . '</h2> <span>' . sprintf( esc_html__( 'Options for Related %1$s', 'leblix' ), $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'portfolio-show-related',
				'label'			=> sprintf( esc_attr__( 'Show Related %1$s?', 'leblix' ), $portfolio_cpt_singular_title ),
				'default'		=> '0',
				'choices'		=> array(
					'on'  => esc_attr__( 'Yes', 'leblix' ),
					'off' => esc_attr__( 'No', 'leblix' ),
				),
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-related-title',
				'label'			=> sprintf( esc_attr__( 'Related %1$s Section Title', 'leblix' ), $portfolio_cpt_singular_title ),
				'description'	=> esc_attr__( 'Related Area Title', 'leblix' ),
				'default'		=> sprintf( esc_attr__( 'Related %1$s', 'leblix' ), $portfolio_cpt_singular_title ),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'portfolio-related-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show', 'leblix' ), $portfolio_cpt_singular_title ),
				'default'		=> 3,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'portfolio-related-column',
				'label'			=> sprintf( esc_html__( 'Related %1$s Column', 'leblix' ), $portfolio_cpt_singular_title ),
				'default'		=> '3',
				'choices'		=> $column_list,
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'portfolio-related-style',
				'label'			=> sprintf( esc_html__( 'Related %1$s View', 'leblix' ), $portfolio_cpt_singular_title ),
				'default'		=> '2',
				'choices'		=> cspt_element_template_list('portfolio', true),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-portfolio-cat-view',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . sprintf( esc_html__( 'Element View Style for %1$s', 'leblix' ), $portfolio_cat_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Select view style for elements on %1$s', 'leblix' ) , $portfolio_cat_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'portfolio-cat-style',
				'label'			=> sprintf( esc_html__( 'Element View on %1$s', 'leblix' ), $portfolio_cat_singular_title ),
				'default'		=> '1',
				'choices'		=> cspt_element_template_list('portfolio', true),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'portfolio-cat-column',
				'label'			=> sprintf( esc_html__( '%1$s View Column', 'leblix' ), $portfolio_cat_singular_title ),
				'default'		=> '3',
				'choices'		=> $column_list,
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'portfolio-cat-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show on single %2$s page', 'leblix' ), $portfolio_cpt_singular_title, $portfolio_cat_singular_title ),
				'default'		=> 9,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-portfolio-sidebar-settings',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Sidebar Options', 'leblix' ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'leblix' ) , $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-portfolio',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'leblix' ), $portfolio_cpt_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-portfolio-category',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'leblix' ), $portfolio_cat_singular_title ),
				'default'	=> 'right',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			// Advanced Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'portfolio-advanced-heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Advanced Options', 'leblix' ) . '</h2> <span>' . sprintf( esc_attr__( 'Advanced Options for %1$s Section', 'leblix' ) , $portfolio_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cpt-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title', 'leblix' ) , $portfolio_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Title', 'leblix' ),
				'default'		=> esc_attr__( 'Portfolio', 'leblix' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cpt-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title (Singular)', 'leblix' ) , $portfolio_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Singular Title', 'leblix' ),
				'default'		=> esc_attr__( 'Portfolio', 'leblix' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cpt-slug',
				'label'			=> sprintf( esc_attr__( '%1$s Section URl Slug', 'leblix' ) , $portfolio_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT URL slug.', 'leblix' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'leblix' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'leblix' ), cspt_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'portfolio' ),
				'priority'		=> 10,
			),
			// Portfolio Category
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cat-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title', 'leblix' ) , $portfolio_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Title', 'leblix' ),
				'default'		=> esc_attr__( 'Portfolio Categories', 'leblix' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cat-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title (Singular)', 'leblix' ) , $portfolio_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Singular Title', 'leblix' ),
				'default'		=> esc_attr__( 'Portfolio Category', 'leblix' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'portfolio-cat-slug',
				'label'			=> sprintf( esc_attr__( '%1$s URl Slug', 'leblix' ) , $portfolio_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy URL slug', 'leblix' ),
				'description'	=> esc_attr__( 'Taxonomy URL slug.', 'leblix' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'leblix' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'leblix' ), cspt_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'priority'		=> 10,
			),
		)
	),
	// Service Settings
	'service_options' => array(
		'section_settings' => array(
			'title'			=> sprintf( esc_attr__( '%1$s options', 'leblix' ) , $service_cpt_singular_title ) ,
			'panel'			=> 'leblix_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-service-settings',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . sprintf( esc_html__( 'Single %1$s Options', 'leblix' ), $service_cpt_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'leblix' ), $service_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'service-single-style',
				'label'		=> sprintf( esc_html__( '%1$s Single View Style', 'leblix' ), $service_cpt_singular_title ),
				'default'	=> '1',
				'choices'		=> $service_single_style_array,
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'service-single-image-hide',
				'label'			=> sprintf( esc_attr__( 'Hide Featured Image on Single %1$s page? ', 'leblix' ), $service_cpt_singular_title ),
				'default'		=> '0',
				'choices'     => array(
					'on'  => esc_attr__( 'Yes', 'leblix' ),
					'off' => esc_attr__( 'No', 'leblix' ),
				),
			'active_callback' => array(
				array(
					'setting'	=> 'service-single-style',
					'operator'	=> '==',
					'value'		=> '1',
				),
			),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'service-show-related',
				'label'			=> sprintf( esc_attr__( 'Show Related %1$s', 'leblix' ), $service_cpt_singular_title ),
				'default'		=> '0',
				'choices'     => array(
					'on'  => esc_attr__( 'Yes', 'leblix' ),
					'off' => esc_attr__( 'No', 'leblix' ),
				),
			),
			array(
			'type'			=> 'text',
			'settings'		=> 'service-related-title',
			'label'			=> sprintf( esc_attr__( 'Related %1$s Section Title', 'leblix' ), $service_cpt_singular_title ),
			'description'	=> esc_attr__( 'Related Area Title', 'leblix' ),
			'default'		=> sprintf( esc_attr__( 'Related %1$s', 'leblix' ), $service_cpt_singular_title ),
			'active_callback' => array(
				array(
					'setting'	=> 'service-show-related',
					'operator'	=> '==',
					'value'		=> '1',
				),
			),
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'service-related-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show', 'leblix' ), $service_cpt_singular_title ),
				'default'		=> 3,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'service-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'service-related-column',
				'label'			=> sprintf( esc_html__( 'Related %1$s Column', 'leblix' ), $service_cpt_singular_title ),
				'default'		=> '3',
				'choices'     => $column_list,
				'active_callback' => array(
					array(
						'setting'	=> 'service-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'service-related-style',
				'label'			=> sprintf( esc_html__( 'Related %1$s View', 'leblix' ), $service_cpt_singular_title ),
				'default'		=> '2',
				'choices'     => cspt_element_template_list('service', true),
				'active_callback' => array(
					array(
						'setting'	=> 'service-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-service-cat-view',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . sprintf( esc_html__( 'Element View Style for %1$s', 'leblix' ), $service_cat_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Select view style for elements on %1$s', 'leblix' ) , $service_cat_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'service-cat-style',
				'label'			=> sprintf( esc_html__( 'Element View on %1$s', 'leblix' ), $service_cat_singular_title ),
				'default'		=> '1',
				'choices'		=> cspt_element_template_list('service', true),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'service-cat-column',
				'label'			=> sprintf( esc_html__( '%1$s View Column', 'leblix' ), $service_cat_singular_title ),
				'default'		=> '3',
				'choices'		=> $column_list,
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'service-cat-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show on single %2$s page', 'leblix' ), $service_cpt_singular_title, $service_cat_singular_title ),
				'default'		=> 9,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-service-sidebar-settings',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Sidebar Options', 'leblix' ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'leblix' ) , $service_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-service',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'leblix' ), $service_cpt_singular_title ),
				'default'	=> 'left',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-service-category',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'leblix' ), $service_cat_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			// Advanced - Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'service-advanced-heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Advanced Options', 'leblix' ) . '</h2> <span>' . sprintf( esc_attr__( 'Advanced Options for %1$s Section', 'leblix' ) , $service_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cpt-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title', 'leblix' ) , $service_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Title', 'leblix' ),
				'default'		=> esc_attr__( 'Service', 'leblix' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cpt-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title (Singular)', 'leblix' ) , $service_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Singular Title', 'leblix' ),
				'default'		=> esc_attr__( 'Service', 'leblix' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cpt-slug',
				'label'			=> sprintf( esc_attr__( '%1$s Section URl Slug', 'leblix' ) , $service_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT URL slug.', 'leblix' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'leblix' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'leblix' ), cspt_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'service' ),
				'priority'		=> 10,
			),
			// Service Category
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cat-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title', 'leblix' ) , $service_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Title', 'leblix' ),
				'default'		=> esc_attr__( 'Service Categories', 'leblix' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cat-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title (Singular)', 'leblix' ) , $service_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Singular Title', 'leblix' ),
				'default'		=> esc_attr__( 'Service Category', 'leblix' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'service-cat-slug',
				'label'			=> sprintf( esc_attr__( '%1$s URl Slug', 'leblix' ) , $service_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy URL slug.', 'leblix' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'leblix' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'leblix' ), cspt_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'service-category' ),
				'priority'		=> 10,
			),
		)
	),
	// Team Member Settings
	'team_options' => array(
		'section_settings' => array(
			'title'			=> sprintf( esc_attr__( '%1$s options', 'leblix' ) , $team_cpt_singular_title ) ,
			'panel'			=> 'leblix_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-single-team-settings',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . sprintf( esc_html__( 'Single %1$s Options', 'leblix' ), $team_cpt_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'leblix' ), $team_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'team-single-style',
				'label'		=> sprintf( esc_html__( '%1$s Single View Style', 'leblix' ), $team_cpt_singular_title ),
				'default'	=> '1',
				'choices'		=> $team_single_style_array,
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-team-group-view',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . sprintf( esc_html__( 'Element View Style for %1$s', 'leblix' ), $team_group_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Select view style for elements on %1$s', 'leblix' ) , $team_group_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'team-group-style',
				'label'			=> sprintf( esc_html__( 'Element View on %1$s', 'leblix' ), $team_group_singular_title ),
				'default'		=> '1',
				'choices'		=> cspt_element_template_list('team', true),
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'team-group-column',
				'label'			=> sprintf( esc_html__( '%1$s View Column', 'leblix' ), $team_group_singular_title ),
				'default'		=> '3',
				'choices'		=> $column_list,
			),
			array(
				'type'			=> 'number',
				'settings'		=> 'team-group-count',
				'label'			=> sprintf( esc_attr__( 'How many %1$s you like to show on single %2$s page', 'leblix' ), $team_cpt_singular_title, $team_group_singular_title ),
				'default'		=> 9,
				'choices'		=> array(
					'min'			=> 1,
					'max'			=> 50,
					'step'			=> 1,
				),
				'active_callback' => array(
					array(
						'setting'	=> 'portfolio-show-related',
						'operator'	=> '==',
						'value'		=> '1',
					),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-team-member-sidebar-settings',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Sidebar Options', 'leblix' ) . '</h2> <span>' . sprintf( esc_attr__( 'Sidebar options for %1$s Section', 'leblix' ) , $team_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-team-member',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'leblix' ), $team_cpt_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-team-group',
				'label'		=> sprintf( esc_html__( '%1$s Sidebar', 'leblix' ), $team_group_singular_title ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'team_advanced_heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Advanced Options', 'leblix' ) . '</h2> <span>' . sprintf( esc_attr__( 'Advanced Options for %1$s Section', 'leblix' ) , $team_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-cpt-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title', 'leblix' ) , $team_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Title', 'leblix' ),
				'default'		=> esc_attr__( 'Team Members', 'leblix' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-cpt-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title (Singular)', 'leblix' ) , $team_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Singular Title', 'leblix' ),
				'default'		=> esc_attr__( 'Team Member', 'leblix' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-cpt-slug',
				'label'			=> sprintf( esc_attr__( '%1$s Section URl Slug', 'leblix' ) , $team_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT URL slug.', 'leblix' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'leblix' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'leblix' ), cspt_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'team' ),
				'priority'		=> 10,
			),
			// Team Member group
			array(
				'type'			=> 'text',
				'settings'		=> 'team-group-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title', 'leblix' ) , $team_group_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Title', 'leblix' ),
				'default'		=> esc_attr__( 'Team Groups', 'leblix' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-group-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title (Singular)', 'leblix' ) , $team_group_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Singular Title', 'leblix' ),
				'default'		=> esc_attr__( 'Team Group', 'leblix' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'team-group-slug',
				'label'			=> sprintf( esc_attr__( '%1$s URl Slug', 'leblix' ) , $team_group_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy URL slug.', 'leblix' ) . '<br />' . '<strong>' . esc_attr__( 'NOTE:', 'leblix' ) . '</strong> ' . sprintf( esc_attr__( 'After changing this, please go to %1$s section and save it once.', 'leblix' ), cspt_esc_kses('<a href="' . esc_url( get_admin_url().'options-permalink.php' ) . '" target="_blank"><strong>Settings > Permalinks</strong></a>') ) . '<br /><br />',
				'default'		=> esc_attr( 'team-group' ),
				'priority'		=> 10,
			),
		)
	),
	// Testimonial Settings
	'testimonial_options' => array(
		'section_settings' => array(
			'title'			=> sprintf( esc_attr__( '%1$s options', 'leblix' ) , $testimonial_cpt_singular_title ) ,
			'panel'			=> 'leblix_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'			=> 'custom',
				'settings'		=> 'custom-testimonial-group-view',
				'default'		=> '<div class="creativeplanet-option-heading"><h2>' . sprintf( esc_html__( 'Testimonial Element View Style for Search Results', 'leblix' ), $testimonial_cat_singular_title ) . '</h2> <span>' . sprintf( esc_attr__( 'Select view style for elements on %1$s', 'leblix' ) , $testimonial_cat_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'radio-image',
				'settings'		=> 'testimonial-default-view',
				'label'			=> sprintf( esc_html__( 'Testimonial Element View Style for Search Results', 'leblix' ), $testimonial_cat_singular_title ),
				'default'		=> '1',
				'choices'		=> cspt_element_template_list('testimonial', false),
			),
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'testimonial_advanced_heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Advanced Options', 'leblix' ) . '</h2> <span>' . sprintf( esc_attr__( 'Advanced Options for %1$s Section', 'leblix' ) , $testimonial_cpt_singular_title ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'testimonial-cpt-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title', 'leblix' ) , $testimonial_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Title', 'leblix' ),
				'default'		=> esc_attr__( 'Testimonials', 'leblix' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'testimonial-cpt-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Section Title (Singular)', 'leblix' ) , $testimonial_cpt_singular_title ) ,
				'description'	=> esc_attr__( 'CPT Singular Title', 'leblix' ),
				'default'		=> esc_attr__( 'Testimonial', 'leblix' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'testimonial-cat-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title', 'leblix' ) , $testimonial_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Title', 'leblix' ),
				'default'		=> esc_attr__( 'Testimonial Categories', 'leblix' ),
				'priority'		=> 10,
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'testimonial-cat-singular-title',
				'label'			=> sprintf( esc_attr__( '%1$s Title (Singular)', 'leblix' ) , $testimonial_cat_singular_title ) ,
				'description'	=> esc_attr__( 'Taxonomy Singular Title', 'leblix' ),
				'default'		=> esc_attr__( 'Testimonial Category', 'leblix' ),
				'priority'		=> 10,
			),
		)
	),
	// Search Settings
	'search_results_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Search Results options', 'leblix' ),
			'panel'			=> 'leblix_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'search_results_heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Search Results Settings', 'leblix' ) . '</h2> <span>' . esc_attr__( 'Settings for Search Results page', 'leblix' ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'no-results-title',
				'label'			=> esc_attr__( 'Title for "No Search Results" page', 'leblix' ),
				'description'	=> esc_attr__( 'Title to show when there is no search results', 'leblix' ),
				'default'		=> esc_attr__( 'No Results Found', 'leblix' ),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'no-results-text',
				'label'			=> esc_attr__( 'Text for "No Search Results" page', 'leblix' ),
				'description'	=> esc_attr__( 'Text to show when there is no search results', 'leblix' ),
				'default'		=> esc_attr__('Sorry, but nothing matched your search terms. Please try again with some different keywords.','leblix'),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'search-sidebar-options',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Sidebar Settings', 'leblix' ) . '</h2> <span>' . esc_html__( 'Select sidebar position for search results page.', 'leblix' ) . '</span></div>',
			),
			array(
				'type'		=> 'radio-image',
				'settings'	=> 'sidebar-search',
				'label'		=> esc_html__( 'Search Results Sidebar', 'leblix' ),
				'default'	=> 'no',
				'choices'		=> array(
					'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
					'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
					'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
				),
			),
		)
	),
	// Error 404 Settings
	'error_404_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Error 404 options', 'leblix' ),
			'panel'			=> 'leblix_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'error_404_heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Error 404 Settings', 'leblix' ) . '</h2> <span>' . esc_attr__( 'Settings for error 404 page', 'leblix' ) . '</span></div>',
			),
			array(
				'type'			=> 'text',
				'settings'		=> 'error-404-heading',
				'label'			=> esc_attr__( 'Error 404 Heading', 'leblix' ),
				'description'	=> esc_attr__( 'This is heading for 404 page', 'leblix' ),
				'default'		=> esc_attr__( '404', 'leblix' ),
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'error-404-text',
				'label'			=> esc_attr__( 'Error 404 Text', 'leblix' ),
				'description'	=> esc_attr__( 'This is text for 404 page', 'leblix' ),
				'default'		=> esc_attr__( 'OOPS! THE PAGE YOU WERE LOOKING FOR, COULDN\'T BE FOUND.', 'leblix' ),
			),
			array(
				'type'			=> 'switch',
				'settings'		=> 'error-404-show-search',
				'label'			=> esc_attr__( 'Show search form on 404 page', 'leblix' ),
				'default'		=> '1',
				'priority'		=> 10,
				'choices'		=> array(
					'on'			=> esc_attr__( 'Yes', 'leblix' ),
					'off'			=> esc_attr__( 'No', 'leblix' ),
				),
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'error_404_text_custom',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Error 404 Text Color', 'leblix' ) . '</h2> <span>' . esc_attr__( 'Settings for text color for 404 error page', 'leblix' ) . '</span></div>',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'e404-text-color',
				'label'				=> esc_attr__( 'Select 404 page text color', 'leblix' ),
				'default'			=> 'white',
				'choices'			=> $pre_text_color_2_list,
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'error_404_bg_custom',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Error 404 Background Option', 'leblix' ) . '</h2> <span>' . esc_attr__( 'Settings for background color/image for 404 error page', 'leblix' ) . '</span></div>',
			),
			array(
				'type'				=> 'radio-image',
				'settings'			=> 'e404-bgcolor',
				'label'				=> esc_html__( 'Select 404 page background color', 'leblix' ),
				'default'			=> 'custom',
				'choices'			=> $pre_color_list,
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'e404-background',
				'label'			=> esc_attr__( 'Background', 'leblix' ),
				'description'	=> esc_attr__( 'Background Settings', 'leblix' ),
				'default'		=> array(				
					'background-color'      => 'rgb(1 205 97)',
					'background-repeat'     => 'no-repeat',
					'background-position'   => 'center top',
					'background-size'       => 'cover',
					'background-attachment' => 'scroll',
				),
				'cspt-output'	=> '.error404 .site-content-wrap, .error404 .cspt-bg-color-custom > .site-content-wrap:before',
			),
		)
	),
	// Login Page Settings
	'login_page_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'Login Page options', 'leblix' ),
			'panel'			=> 'leblix_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			array(
				'type'				=> 'image',
				'settings'			=> 'login-logo',
				'label'				=> esc_attr__( 'Login Page Custom Logo', 'leblix' ),
				'description'		=> esc_attr__( 'Select logo for the login page', 'leblix' ),
				'default'			=> '',
			),
			array(
				'type'			=> 'background',
				'settings'		=> 'login-page-background',
				'label'			=> esc_attr__( 'Login Page Background', 'leblix' ),
				'description'	=> esc_attr__( 'Background Settings for the login page', 'leblix' ),
				'default'		=> array(				
					'background-color'      => '#444444',
					'background-repeat'     => 'no-repeat',
					'background-position'   => 'center top',
					'background-size'       => 'cover',
					'background-attachment' => 'scroll',
				),
			),
		)
	),
	// Custom CSS/JS Options
	'custom_code_options' => array(
		'section_settings' => array(
			'title'			=> esc_attr__( 'CSS/JS Code', 'leblix' ),
			'panel'			=> 'leblix_base_options',
			'priority'		=> 160,
		),
		'section_fields' => array(
			// Heading Options
			array(
				'type'			=> 'custom',
				'settings'		=> 'tracking_js_heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Tracking Code', 'leblix' ) . '</h2> <span>' . esc_attr__( 'Code for Google Tracking or other ', 'leblix' ) . '</span></div>',
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'tracking-code',
				'label'			=> esc_attr__( 'Tracking Code', 'leblix' ),
				'description'	=> esc_attr__( 'This code will be added to HEAD element on your all pages.', 'leblix' ),
				'default'		=> '',
			),
			array(
				'type'			=> 'custom',
				'settings'		=> 'cust_css_heading',
				'default'		=> '<div class="creativesplanet-option-heading"><h2>' . esc_html__( 'Custom CSS Code', 'leblix' ) . '</h2> <span>' . esc_attr__( 'Custom CSS Code', 'leblix' ) . '</span></div>',
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'css-code',
				'label'			=> esc_attr__( 'Custom CSS Code', 'leblix' ),
				'description'	=> esc_attr__( 'Add your custom CSS code here.', 'leblix' ),
				'default'		=> '',
			),
			array(
				'type'			=> 'textarea',
				'settings'		=> 'js-code',
				'label'			=> esc_attr__( 'Custom JS Code', 'leblix' ),
				'description'	=> esc_attr__( 'Add your custom JS code here.', 'leblix' ),
				'default'		=> '',
			),
		)
	),
);
// adding WooCommerce options
if( function_exists('is_woocommerce') ){
	$kirki_options_array2 = array();
	foreach( $kirki_options_array as $sections=>$settings ){
		$kirki_options_array2[$sections] = $settings;
		if( $sections == 'portfolio_options' ){
			$kirki_options_array2['woocommerce_options'] = array(
				'section_settings' => array(
					'title'			=> esc_attr__( 'WooCommerce Options', 'leblix' ),
					'panel'			=> 'leblix_base_options',
					'priority'		=> 160,
				),
				'section_fields' => array(
					// Heading Options
					array(
						'type'		=> 'radio-image',
						'settings'	=> 'sidebar-wc-shop',
						'label'		=> esc_html__( 'WooCommerce Shop Sidebar', 'leblix' ),
						'default'	=> 'right',
						'choices'		=> array(
							'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
							'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
							'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
						),
					),
					array(
						'type'		=> 'radio-image',
						'settings'	=> 'sidebar-wc-single',
						'label'		=> esc_html__( 'WooCommerce Single Product Sidebar', 'leblix' ),
						'default'	=> 'no',
						'choices'		=> array(
							'left'		=> get_template_directory_uri() . '/includes/images/sidebar-left.png',
							'right'		=> get_template_directory_uri() . '/includes/images/sidebar-right.png',
							'no'		=> get_template_directory_uri() . '/includes/images/sidebar-no.png',
						),
					),
					array(
						'type'		=> 'text',
						'settings'	=> 'wc-title',
						'label'		=> esc_attr__( 'WooCommerce Shop Page Title', 'leblix' ),
						'description'	=> esc_attr__( 'This will appear in Titlebar on Shop page.', 'leblix' ),
						'default'	=> esc_attr('Shop'),
					),
					array(
						'type'			=> 'select',
						'settings'		=> 'wc-related-count',
						'label'			=> esc_attr__( 'How many related products will be shown?', 'leblix' ),
						'description'	=> esc_attr__( 'How many related products will be shown on single product page?', 'leblix' ),
						'default'		=> '3',
						'choices'		=> array(
							'1'		=> esc_attr__( '1 product', 'leblix' ),
							'2'		=> esc_attr__( '2 products', 'leblix' ),
							'3'		=> esc_attr__( '3 products', 'leblix' ),
							'4'		=> esc_attr__( '4 products', 'leblix' ),
						),
					),
					array(
						'type'			=> 'switch',
						'settings'		=> 'wc-show-cart-icon',
						'label'			=> esc_attr__( 'Show Cart Icon in Header?', 'leblix' ),
						'description'	=> esc_attr__( 'Show or hide cart icon in header area. The icon will appear only if WooCommerce plugin is active.', 'leblix' ),
						'default'		=> '1',
						'choices'		=> array(
							'on'		=> esc_attr__( 'Yes', 'leblix' ),
							'off'		=> esc_attr__( 'No', 'leblix' ),
						),
					),
					array(
						'type'			=> 'switch',
						'settings'		=> 'wc-show-cart-amount',
						'label'			=> esc_attr__( 'Show Amount with Cart Icon in Header?', 'leblix' ),
						'description'	=> esc_attr__( 'Show or hide cart amount with cart icon in header area. The icon will appear only if WooCommerce plugin is active.', 'leblix' ),
						'default'		=> '1',
						'choices'		=> array(
							'on'		=> esc_attr__( 'Yes', 'leblix' ),
							'off'		=> esc_attr__( 'No', 'leblix' ),
						),
						'active_callback' => array( array(
							'setting'		=> 'wc-show-cart-icon',
							'operator'		=> '==',
							'value'			=> '1',
						) ),
					),
				)
			);
		}
	} // foreach
	$kirki_options_array = $kirki_options_array2;
}
