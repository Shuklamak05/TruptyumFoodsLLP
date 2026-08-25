<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class CSPT_StaticBoxElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'cspt_static_box_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Leblix Static Box Element', 'leblix' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-boxes';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'leblix_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		if( isset($data['settings']["view-type"]) && !empty($data['settings']["view-type"]) && $data['settings']["view-type"]=='carousel' ){
			wp_enqueue_script( 'owl-carousel' );
			wp_enqueue_style( 'owl-carousel' );
			wp_enqueue_style( 'owl-carousel-theme' );
		}
	}

	protected function register_controls() {

		// Heading and Subheading
		$this->start_controls_section(
			'heading_section',
			[
				'label' => esc_attr__( 'Heading and Subheading', 'leblix' ),
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
			'title_link',
			[
				'label' => esc_attr__( 'Title Link', 'leblix' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label' => esc_attr__( 'Subtitle', 'leblix' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_attr__( 'This is Subtitle', 'leblix' ),
				'placeholder' => esc_attr__( 'Enter your subtitle', 'leblix' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitle_link',
			[
				'label' => esc_attr__( 'Subtitle Link', 'leblix' ),
				'type' => Controls_Manager::URL,
				'label_block' => true,
			]
		);
		$this->add_control(
			'desc',
			[
				'label' => esc_attr__( 'Description', 'leblix' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_attr__( 'Type your description here', 'leblix' ),
			]
		);
		$this->add_control(
			'reverse_title',
			[
				'label' => esc_attr__( 'Reverse Title', 'leblix' ),
				'description' => esc_attr__( 'Show sub-title before title', 'leblix' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_attr__( 'Yes', 'leblix' ),
				'label_off' => esc_attr__( 'No', 'leblix' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		$this->add_responsive_control(
			'text_align',
			[
				'label' => esc_attr__( 'Alignment', 'leblix' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => esc_attr__( 'Left', 'leblix' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_attr__( 'Center', 'leblix' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_attr__( 'Right', 'leblix' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cspt-ele-header-area' => 'text-align: {{VALUE}};',
				],
				'dynamic' => [
					'active' => true,
				],
				'default' => 'left',
			]
		);

		// Tags
		$this->add_control(
			'tag_options',
			[
				'label'			=> esc_attr__( 'Tags for SEO', 'leblix' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label' => esc_attr__( 'Title Tag', 'leblix' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1'	=> esc_attr( 'H1' ),
					'h2'	=> esc_attr( 'H2' ),
					'h3'	=> esc_attr( 'H3' ),
					'h4'	=> esc_attr( 'H4' ),
					'h5'	=> esc_attr( 'H5' ),
					'h6'	=> esc_attr( 'H6' ),
					'div'	=> esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h2' ),
			]
		);
		$this->add_control(
			'subtitle_tag',
			[
				'label' => esc_attr__( 'SubTitle Tag', 'leblix' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1'	=> esc_attr( 'H1' ),
					'h2'	=> esc_attr( 'H2' ),
					'h3'	=> esc_attr( 'H3' ),
					'h4'	=> esc_attr( 'H4' ),
					'h5'	=> esc_attr( 'H5' ),
					'h6'	=> esc_attr( 'H6' ),
					'div'	=> esc_attr( 'DIV' ),
				],
				'default' => esc_attr( 'h4' ),
			]
		);
		$this->end_controls_section();

		//Content
		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Boxes Options', 'leblix' ),
			]
        );

		$repeater = new Repeater();

		$repeater->add_control(
			'show_image',
			[
				'label' => esc_attr__( 'Show image?', 'leblix' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'yes'	=> esc_attr( 'Yes' ),
					'no'	=> esc_attr( 'No' ),
				],
				'default' => esc_attr( 'yes' ),
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'leblix' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'show_image' => 'yes',
				]
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'		=> 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default'	=> 'large',
				'separator'	=> 'none',
			]
		);

		$repeater->add_control(
			'label',
			[
				'label' => __( 'Box Title', 'leblix' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Box Title', 'leblix' ),
				'placeholder' => __( 'Box Title', 'leblix' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'smalltext',
			[
				'label' => __( 'Box Content', 'leblix' ),
				'default' => __( 'Box Content', 'leblix' ),
				'placeholder' => __( 'Box Content', 'leblix' ),
				'type' => Controls_Manager::WYSIWYG,
				'show_label' => true,
			]
		);
        $this->add_control(
			'boxes',
			[
				'label'		=> esc_attr__( 'Boxes', 'leblix' ),
				'type'		=> Controls_Manager::REPEATER,
				'fields'	=> $repeater->get_controls(),
				'default'	=> [
					[
						'image'		=> get_template_directory_uri() . '/images/placeholder.png',
						'label'		=> esc_attr__( 'This is first box', 'leblix' ),
						'smalltext'	=> esc_attr__( 'This is small description', 'leblix' ),
					],
					[
						'image'		=> get_template_directory_uri() . '/images/placeholder.png',
						'label'		=> esc_attr__( 'This is second box', 'leblix' ),
						'smalltext'	=> esc_attr__( 'This is small description', 'leblix' ),
					],
				],
				'title_field' => '{{{ label }}}',
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
				'label'			=> esc_attr__( 'Select StaticBox View Style', 'leblix' ),
				'description'	=> esc_attr__( 'Slect StaticBox View style.', 'leblix' ),
				'type'			=> 'cspt_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> cspt_element_template_list( 'static-box', true ),
			]
		);
		$this->end_controls_section();

		// Appearance
		$this->start_controls_section(
			'appearance_section',
			[
				'label' => esc_attr__( 'Column and Carousel Options', 'leblix' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'view-type',
			[
				'label'			=> esc_attr__( 'How you like to view each Post box?', 'leblix' ),
				'description'	=> esc_attr__( 'Show as carousel view or simple row-column view.', 'leblix' ),
				'type'			=> 'cspt_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> 'row-column',
				'options'		=> [
					'row-column'	=> esc_url( get_template_directory_uri() . '/includes/images/row-column.png' ),
					'carousel'		=> esc_url( get_template_directory_uri() . '/includes/images/carousel.png' ),
				]
			]
		);

		// Row Column: Heading
		$this->add_control(
			'row_col_options',
			[
				'label' => esc_attr__( 'Row-Column Options', 'leblix' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'view-type' => 'row-column',
				]
			]
		);

		// Carousel: Heading
		$this->add_control(
			'carousel_options',
			[
				'label' => esc_attr__( 'Carousel Options', 'leblix' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'view-type' => 'carousel',
				]
			]
		);
		// Carousel : Loop
		$this->add_control(
			'carousel-loop',
			[
				'label'			=> esc_attr__( 'Carousel: Loop', 'leblix' ),
				'description'	=> esc_attr__( 'Infinity loop. Duplicate last and first items to get loop illusion.', 'leblix' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'leblix' ),
					'0'				=> esc_attr__( 'No', 'leblix' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : Autoplay
		$this->add_control(
			'carousel-autoplay',
			[
				'label'			=> esc_attr__( 'Carousel: Autoplay', 'leblix' ),
				'description'	=> esc_attr__( 'Autoplay of carousel.', 'leblix' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'leblix' ),
					'0'				=> esc_attr__( 'No', 'leblix' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : Center
		$this->add_control(
			'carousel-center',
			[
				'label'			=> esc_attr__( 'Carousel: Center', 'leblix' ),
				'description'	=> esc_attr__( 'Center item. Works well with even an odd number of items.', 'leblix' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'leblix' ),
					'0'				=> esc_attr__( 'No', 'leblix' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : Nav
		$this->add_control(
			'carousel-nav',
			[
				'label'			=> esc_attr__( 'Carousel: Nav', 'leblix' ),
				'description'	=> esc_attr__( 'Show next/prev buttons.', 'leblix' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'leblix' ),
					'0'				=> esc_attr__( 'No', 'leblix' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : Dots
		$this->add_control(
			'carousel-dots',
			[
				'label'			=> esc_attr__( 'Carousel: Dots', 'leblix' ),
				'description'	=> esc_attr__( 'Show dots navigation.', 'leblix' ),
				'type'			=> Controls_Manager::SELECT,
				'default'		=> '0',
				'options'		=> [
					'1'				=> esc_attr__( 'Yes', 'leblix' ),
					'0'				=> esc_attr__( 'No', 'leblix' ),
				],
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);
		// Carousel : autoplaySpeed
		$this->add_control(
			'carousel-autoplayspeed',
			[
				'label'			=> esc_attr__( 'Carousel: autoplaySpeed', 'leblix' ),
				'description'	=> esc_attr__( 'autoplay speed.', 'leblix' ),
				'type'			=> Controls_Manager::TEXT,
				'default'		=> '1000',
				'condition'		=> [
					'view-type'		=> 'carousel',
				]
			]
		);

		// Columns
		$this->add_control(
			'columns',
			[
				'label'			=> esc_attr__( 'View in Column', 'leblix' ),
				'description'	=> esc_attr__( 'Select how many column to show.', 'leblix' ),
				'type'			=> 'cspt_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '3',
				'options'		=> [
					'1'				=> esc_url( get_template_directory_uri() . '/includes/images/column-1.png' ),
					'2'				=> esc_url( get_template_directory_uri() . '/includes/images/column-2.png' ),
					'3'				=> esc_url( get_template_directory_uri() . '/includes/images/column-3.png' ),
					'4'				=> esc_url( get_template_directory_uri() . '/includes/images/column-4.png' ),
					'5'				=> esc_url( get_template_directory_uri() . '/includes/images/column-5.png' ),
					'6'				=> esc_url( get_template_directory_uri() . '/includes/images/column-6.png' ),
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		?>

		<?php
		// Starting container
		$start_div = cspt_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'static-box',
			'data'		=> $settings
		) );

		echo cspt_esc_kses($start_div);

		cspt_heading_subheading($settings, true);
		?>

		<div class="cspt-element-posts-wrapper row multi-columns-row">

		<?php
		$return = '';

		if( $style == '31' ){

			$all_images_html = '';
			$all_content_html = '';

			foreach( $settings['boxes'] as $box ){
				if( !empty($box['image']) ){
					$all_images_html .= '<div class="creativesplanet-statcbox-image"><img src="'.$box['image']['url'].'" alt="'.esc_attr($box['label']).'" /></div>';
				}
				$smalltext_html	= ( !empty($box['smalltext']) ) ? '<div class="creativesplanet-static-box-desc">'.cspt_esc_kses($box['smalltext']).'</div>' : '' ;
				$label_html		= ( !empty($box['label']) ) ? '<div class="creativesplanet-box-title"><h4>'.esc_html($box['label']).'</h4></div>' : '' ;
				$all_content_html .= '<div>'.$label_html.$smalltext_html.'</div>';
			}

			// Template
			if( file_exists( locate_template( '/theme-parts/static-box/static-box-style-'.esc_attr($style).'.php', false, false ) ) ){
	
				$return .= cspt_element_block_container( array(
					'position'	=> 'start',
					'column'	=> $columns,
					'cpt'		=> 'static-box',
					'style'		=> $style

				) );

				ob_start();
				include( locate_template( '/theme-parts/static-box/static-box-style-'.esc_attr($style).'.php', false, false ) );
				$return .= ob_get_contents();
				ob_end_clean();

				$return .= cspt_element_block_container( array(
					'position'	=> 'end',
				) );

			}



		} else {

			foreach( $settings['boxes'] as $box ){
	
				$image_html		= '' ;
				$smalltext_html	= ( !empty($box['smalltext']) ) ? '<div class="creativesplanet-static-box-desc">'.cspt_esc_kses($box['smalltext']).'</div>' : '' ;
				$label_html		= ( !empty($box['label']) ) ? '<div class="creativesplanet-box-title"><h4>'.esc_html($box['label']).'</h4></div>' : '' ;
				if( !empty($box['image']) ){
					$image_html = '<img src="'.$box['image']['url'].'" alt="'.esc_attr($box['label']).'" />';
				}
	
				// Template
				if( file_exists( locate_template( '/theme-parts/static-box/static-box-style-'.esc_attr($style).'.php', false, false ) ) ){
	
					$return .= cspt_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $columns,
						'cpt'		=> 'static-box',
						'style'		=> $style
	
					) );
	
					ob_start();
					include( locate_template( '/theme-parts/static-box/static-box-style-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();
	
					$return .= cspt_element_block_container( array(
						'position'	=> 'end',
					) );
	
				}
	
			} // foreach

		}

		// final output
		echo cspt_esc_kses($return);
		?>

		</div>

		<?php

		// Ending wrapper of the whole arear
		$end_div = cspt_element_container( array(
			'position'	=> 'end',
			'cpt'		=> 'static-box',
			'data'		=> $settings
		) );
		echo cspt_esc_kses($end_div);
		?>

	    <?php
	}

	protected function content_template() {}

}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new CSPT_StaticBoxElement() );