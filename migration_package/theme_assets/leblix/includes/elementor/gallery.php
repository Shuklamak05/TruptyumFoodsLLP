<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class CSPT_GalleryElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'cspt_gallery_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Leblix Gallery Element', 'leblix' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-images';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'leblix_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		wp_enqueue_script( 'owl-carousel' );
		wp_enqueue_style( 'owl-carousel' );
		wp_enqueue_style( 'owl-carousel-theme' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'data_section',
			[
				'label' => esc_attr__( 'Content Options', 'leblix' ),
			]
        );

		$this->add_control(
			'gallery',
			[
				'label' => __( 'Add Images', 'leblix' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'default' => 'full',
				'separator' => 'none',
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
				'default'		=> '1',
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
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		$return = '';

		$show = count($gallery);

		$columns			= ( !empty($settings['columns']) ) ? $columns : '1' ;
		$car_loop			= ( !empty($settings['carousel-loop']) && $settings['carousel-loop']=='1' ) ? 'true' : 'false' ;
		$car_autoplay		= ( !empty($settings['carousel-autoplay']) && $settings['carousel-autoplay']=='1' ) ? 'true' : 'false' ;
		$car_center			= ( !empty($settings['carousel-center']) && $settings['carousel-center']=='1' ) ? 'true' : 'false' ;
		$car_nav			= ( !empty($settings['carousel-nav']) && $settings['carousel-nav']=='1' ) ? 'true' : 'false' ;
		$car_dots			= ( !empty($settings['carousel-dots']) && $settings['carousel-dots']=='1' ) ? 'true' : 'false' ;
		$car_autoplayspeed	= ( !empty($settings['carousel-autoplayspeed']) ) ? trim($settings['carousel-autoplayspeed']) : '1000' ;

		$return .= '<div class="creativesplanet-element-viewtype-carousel"
			data-columns		="'.esc_attr($columns).'"
			data-loop			="'.esc_attr($car_loop).'"
			data-autoplay		="'.esc_attr($car_autoplay).'"
			data-center			="'.esc_attr($car_center).'"
			data-nav			="'.esc_attr($car_nav).'"
			data-dots			="'.esc_attr($car_dots).'"
			data-autoplayspeed	="'.esc_attr($car_autoplayspeed).'"
			data-margin			="15px">';

			$return .= '<div class="cspt-element-posts-wrapper row multi-columns-row">';

				if( !empty($gallery) && is_array($gallery) && count($gallery)>0 ){

					foreach( $gallery as $image ){
						if( !empty($image['url']) ){

							$img =  Group_Control_Image_Size::get_attachment_image_src( $image['id'], 'thumbnail', $settings );

							$return .= cspt_element_block_container( array(
								'position'	=> 'start',
								'column'	=> esc_attr($columns),
								'cpt'		=> 'gallery',
							) );

							$return .= '<div><img src="' . esc_url($img) . '" alt="'.esc_attr__( 'Image', 'leblix' ).'" /></div>';

							$return .= cspt_element_block_container( array(
								'position'	=> 'end',
							) );

						}
					}

				}

			$return .= '</div>';

		$return .= '</div>';

		echo cspt_esc_kses($return);

	}

	protected function content_template() {}

}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new CSPT_galleryElement() );