<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class CSPT_FIDElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'cspt_fid_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Leblix Facts-in-Digits Element', 'leblix' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-sync-alt';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'leblix_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		wp_enqueue_script( 'waypoints' );
		wp_enqueue_script( 'numinate' );
		wp_enqueue_script( 'jquery-circle-progress' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Content Options', 'leblix' ),
			]
        );

		$this->add_control(
			'icon',
			[
				'label' => esc_attr__( 'Icon', 'leblix' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
					'url' => '',
                ],
            ]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_attr__( 'Title', 'leblix' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'Welcome to our site', 'leblix' ),
				'placeholder' => esc_attr__( 'Enter your title', 'leblix' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'desc',
			[
				'label' => esc_attr__( 'Description', 'leblix' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_attr__( 'Type your description here', 'leblix' ),
			]
		);

		$this->add_control(
			'digit',
			[
				'label' => esc_attr__( 'Rotating Digit', 'leblix' ),
				'description' => esc_attr__( 'Enter rotating number digit here.', 'leblix' ),
				'separator' => 'before',
				'type' => Controls_Manager::NUMBER,
				'default' => '85',
			]
		);

		$this->add_control(
			'interval',
			[
				'label' => esc_attr__( 'Rotating digit Interval', 'leblix' ),
				'description' => esc_attr__( 'Enter rotating interval number here.', 'leblix' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '5',
			]
		);

		$this->add_control(
			'before',
			[
				'label' => esc_attr__( 'Text Before Number (Prefix)', 'leblix' ),
				'description' => esc_attr__( 'Enter text which appear just before the rotating numbers.', 'leblix' ),
				'separator' => 'before',
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
			]
		);

		$this->add_control(
			'beforetextstyle',
			[
				'label' => esc_attr__( 'Text Style', 'leblix' ),
				'description' => esc_attr__('Select text style for the text.', 'leblix') . '<br>' . esc_attr__('Superscript Example:','leblix') . cspt_esc_kses('X<sup>2</sup>')  . '<br>' . esc_attr__('Subscript Example:','leblix') . cspt_esc_kses('X<sub>2</sub>'),
				'type' => Controls_Manager::SELECT,
				'default' => 'sup',
				'options' => [
					'sup'		=> esc_attr__( 'Superscript', 'leblix' ),
					'sub'		=> esc_attr__( 'Subscript', 'leblix' ),
					'span'		=> esc_attr__( 'Normal', 'leblix' ),
				]
			]
		);

		$this->add_control(
			'after',
			[
				'label' => esc_attr__( 'Text After Number (Suffix)', 'leblix' ),
				'description' => esc_attr__( 'Enter text which appear just after the rotating numbers.', 'leblix' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
			]
		);

		$this->add_control(
			'aftertextstyle',
			[
				'label' => esc_attr__( 'Text Style', 'leblix' ),
				'description' => esc_attr__('Select text style for the text.', 'leblix') . '<br>' . esc_attr__('Superscript Example:','leblix') . cspt_esc_kses('X<sup>2</sup>')  . '<br>' . esc_attr__('Subscript Example:','leblix') . cspt_esc_kses('X<sub>2</sub>'),
				'type' => Controls_Manager::SELECT,
				'default' => 'sup',
				'options' => [
					'sup'		=> esc_attr__( 'Superscript', 'leblix' ),
					'sub'		=> esc_attr__( 'Subscript', 'leblix' ),
					'span'		=> esc_attr__( 'Normal', 'leblix' ),
				]
			]
		);

		$this->end_controls_section();

		// Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_attr__( 'Select Style', 'leblix' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'style',
			[
				'label'			=> esc_attr__( 'Select FID View Style', 'leblix' ),
				'description'	=> esc_attr__( 'Slect FID View style.', 'leblix' ),
				'type'			=> 'cspt_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'prefix'		=> 'cspt-fid cspt-fid-style-',
				'options'		=> cspt_element_template_list( 'facts-in-digits', true ),
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);

		$return = $icon = '';
		$global_color		= '#ff00ff';
		$secondary_color	= '#f0ff0f';
		$light_bg_color		= '#ff00ff';
		$blackish_color		= '#000000';
		$desc_html          = '';

		if( function_exists('cspt_get_base_option') ){
			// Global Color
			$global_color = cspt_get_base_option('global-color');

			// Secondary Color
			$secondary_color = cspt_get_base_option('secondary-color');

			// Light Background Color
			$light_bg_color = cspt_get_base_option('light-bg-color');

			// Blackish Color
			$blackish_color = cspt_get_base_option('blackish-color');

			// Secondary Color
			$gradient_color = cspt_get_base_option('gradient-color');
			$gradient1 = ( !empty($gradient_color['first']) ) ? $gradient_color['first'] : '#ff00ff' ;
			$gradient2 = ( !empty($gradient_color['last'])  ) ? $gradient_color['last']  : '#ff0000' ;

		}

		// Description text
		if( !empty($settings['desc']) ){
			$desc_html = '<div class="cspt-heading-desc">'.cspt_esc_kses($settings['desc']).'</div>';
		}

		//  Icon
		if( $settings['icon']['library']== 'svg' ){ 
			$icon = '<div class="desvy-fid-svg-icon"><img src="'.esc_url($settings['icon']['value']['url']).'"/></div>';
		} else if( !empty($settings['icon']['value']) ){ 
			$icon = '<div class="cspt-sbox-icon-wrapper"><i class="' . esc_attr($settings['icon']['value']) . '"></i></div>';
		} 

		//  Before or after text
		$before_text = '';
		$after_text  = '';
		if( !empty($before) && !empty($beforetextstyle) && in_array( $beforetextstyle, array( 'sup', 'sub', 'span' ) ) ){
			$before_text = '<'. esc_attr($beforetextstyle).'>'.esc_html($before).'</'.esc_attr($beforetextstyle).'>';
		}
		if( !empty($after) && !empty($aftertextstyle) && in_array( $aftertextstyle, array( 'sup', 'sub', 'span' ) ) ){
			$after_text = '<'. esc_attr($aftertextstyle).'>'.esc_html($after).'</'.esc_attr($aftertextstyle).'>';
		}

		if( file_exists( locate_template( '/theme-parts/fid/fid-style-'.esc_attr($style).'.php', false, false ) ) ){

			$return .= '<div class="creativesplanet-ele creativesplanet-ele-fid creativesplanet-ele-fid-style-'.esc_attr($style).' ">';

			ob_start();
			include( locate_template( '/theme-parts/fid/fid-style-'.esc_attr($style).'.php', false, false ) );
			$return .= ob_get_contents();
			ob_end_clean();

			$return .= '</div>';

		}

		echo cspt_esc_kses($return);

	}

	protected function content_template() {}

}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new CSPT_FIDElement() );
