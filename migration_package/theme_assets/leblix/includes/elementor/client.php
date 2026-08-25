<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class CSPT_ClientElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'cspt_client_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Leblix Client Logo Element', 'leblix' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-th';
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
		if( isset($data['settings']["infinite-scroll"]) && !empty($data['settings']["infinite-scroll"]) && $data['settings']["infinite-scroll"]=='yes' ){
			wp_enqueue_script( 'isotope' );
			wp_enqueue_script( 'infinite-scroll' );
			wp_enqueue_script( 'masonry' );
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
				'prefix_class' => 'cspt-align-',
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
				'label'		=> esc_attr__( 'Title Tag', 'leblix' ),
				'type'		=> Controls_Manager::SELECT,
				'options'	=> [
					'h1'		=> esc_attr( 'H1' ),
					'h2'		=> esc_attr( 'H2' ),
					'h3'		=> esc_attr( 'H3' ),
					'h4'		=> esc_attr( 'H4' ),
					'h5'		=> esc_attr( 'H5' ),
					'h6'		=> esc_attr( 'H6' ),
					'div'		=> esc_attr( 'DIV' ),
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
				'label' => esc_attr__( 'Data Options', 'leblix' ),
			]
		);
		$this->add_control(
			'offset',
			[
				'label'			=> esc_attr__( 'Skip Post (offset)', 'leblix' ),
				'description'	=> esc_attr__( 'How many Post you like to skip.', 'leblix' ),
				'type'			=> Controls_Manager::SELECT,
				'label_block'	=> true,
				'default'		=> '',
				'options'		=> [
					''				=> esc_attr__( 'Show All Post (No skip)', 'leblix' ),
					'1'				=> esc_attr__( 'Skip first Post', 'leblix' ),
					'2'				=> esc_attr__( 'Skip two Posts', 'leblix' ),
					'3'				=> esc_attr__( 'Skip three Posts', 'leblix' ),
					'4'				=> esc_attr__( 'Skip four Posts', 'leblix' ),
					'5'				=> esc_attr__( 'Skip five Posts', 'leblix' ),
				]
			]
		);
		$this->add_control(
			'from_category',
			[
				'label' => esc_attr__( 'Show Post from selected Client Group?', 'leblix' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->select_category(),
				'multiple' => true,
				'label_block'	=> true,
				'placeholder' => esc_attr__( 'All Categories', 'leblix' ),
			]
		);
		$this->add_control(
			'show',
			[
				'label' => esc_attr__( 'Post to show', 'leblix' ),
				'description' => esc_attr__( 'How many Post you want to show.', 'leblix' ),
				'separator' => 'before',
				'type' => Controls_Manager::NUMBER,
				'default' => '6',
			]
		);
		$this->add_control(
			'sortable',
			[
				'label' => esc_attr__( 'Show Sortable Client Group ?', 'leblix' ),
				'description' => esc_attr__( 'Select YES to show sortable Client Group.', 'leblix' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_attr__( 'Yes', 'leblix' ),
				'label_off' => esc_attr__( 'No', 'leblix' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		$this->add_control(
			'order',
			[
				'label' => esc_attr__( 'Order', 'leblix' ),
				'description' => esc_attr__( 'Designates the ascending or descending order.', 'leblix' ),
				'type' => Controls_Manager::SELECT,
				'separator' => 'before',
				'default' => 'DESC',
				'options' => [
					'ASC'		=> esc_attr__( 'Ascending order (1, 2, 3; a, b, c)', 'leblix' ),
					'DESC'		=> esc_attr__( 'Descending order (3, 2, 1; c, b, a)', 'leblix' ),
				]
			]
		);
		$this->add_control(
			'orderby',
			[
				'label' => esc_attr__( 'Order By', 'leblix' ),
				'description' => esc_attr__( ' Sort retrieved posts by parameter.', 'leblix' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'none'		=> esc_attr__( 'No order', 'leblix' ),
					'ID'		=> esc_attr__( 'ID', 'leblix' ),
					'title'		=> esc_attr__( 'Title', 'leblix' ),
					'date'		=> esc_attr__( 'Date', 'leblix' ),
					'rand'		=> esc_attr__( 'Random', 'leblix' ),
				]
			]
		);
		$this->add_control(
			'gap',
			[
				'label' => esc_attr__( 'Box Gap', 'leblix' ),
				'description' => esc_attr__( 'Gap between each Post box.', 'leblix' ),
				'type' => Controls_Manager::SELECT,
				'default' => '15px',
				'options' => [
					'0px'		=> esc_attr__( 'No Gap (0px)', 'leblix' ),
					'5px'		=> esc_attr__( '5px', 'leblix' ),
					'10px'		=> esc_attr__( '10px', 'leblix' ),
					'15px'		=> esc_attr__( '15px', 'leblix' ),
					'20px'		=> esc_attr__( '20px', 'leblix' ),
					'25px'		=> esc_attr__( '25px', 'leblix' ),
					'30px'		=> esc_attr__( '30px', 'leblix' ),
					'35px'		=> esc_attr__( '35px', 'leblix' ),
					'40px'		=> esc_attr__( '40px', 'leblix' ),
					'45px'		=> esc_attr__( '45px', 'leblix' ),
					'50px'		=> esc_attr__( '50px', 'leblix' ),
				]
			]
		);
		// Infinite scroll
		$this->add_control(
			'infinite-scroll-section-heading',
			[
				'label'			=> esc_attr__( 'Infinite Scroll Options', 'leblix' ),
				'type'			=> Controls_Manager::HEADING,
				'separator'		=> 'before',
				'condition' => [
					'sortable'  => '',
				],
			]
		);
		$this->add_control(
			'infinite-scroll',
			[
				'label' => esc_attr__( 'Enable infinite scroll ?', 'leblix' ),
				'description' => esc_attr__( 'Select YES to dynamically load more posts', 'leblix' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_attr__( 'Yes', 'leblix' ),
				'label_off' => esc_attr__( 'No', 'leblix' ),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'sortable'  => '',
				],
			]
		);
		$this->add_control(
			'infinite-scroll-show-loadmore-btn',
			[
				'label' => esc_attr__( 'Show (ajax based) Load More Button ?', 'leblix' ),
				'description' => esc_attr__( 'Select YES to show Load more button. This will load more Blog Posts dynamically', 'leblix' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_attr__( 'Yes', 'leblix' ),
				'label_off' => esc_attr__( 'No', 'leblix' ),
				'return_value' => 'yes',
				'default' => '',
				'condition' => [
					'infinite-scroll' => 'yes',
					'sortable' 		  => '',
				],
			]
		);
		$this->add_control(
			'infinite-scroll-loadmore-btn-title',
			[
				'label' => esc_attr__( 'Button text', 'leblix' ),
				'description' => esc_attr__( 'Button title for the "Load More" button.', 'leblix' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'infinite-scroll-show-loadmore-btn' => 'yes',
					'infinite-scroll' => 'yes',
					'sortable'  => '',
				],
				'default' => esc_attr__( 'Load More', 'leblix' ),
				'placeholder' => esc_attr__( 'Enter button title', 'leblix' ),
				'label_block' => true,
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
				'label'			=> esc_attr__( 'Select Client View Style', 'leblix' ),
				'description'	=> esc_attr__( 'Slect Client View style.', 'leblix' ),
				'type'			=> 'cspt_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> cspt_element_template_list( 'client', true ),
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

		$infinite_scroll_enabled = ( isset($settings['infinite-scroll']) && !empty($settings['infinite-scroll']) ) ? $settings['infinite-scroll'] : 'no' ;
		$loadmore_btn = ( isset($settings['infinite-scroll-show-loadmore-btn']) && !empty($settings['infinite-scroll-show-loadmore-btn']) ) ? $settings['infinite-scroll-show-loadmore-btn'] : 'no' ;

		$loadmore_btn_title = ( isset($settings['infinite-scroll-loadmore-btn-title']) && !empty($settings['infinite-scroll-loadmore-btn-title']) ) ? $settings['infinite-scroll-loadmore-btn-title'] : '' ;

		?>

		<?php
		// Starting container
		$start_div = cspt_element_container( array(
			'position'	=> 'start',
			'cpt'		=> 'client',
			'data'		=> $settings
		) );
		echo cspt_esc_kses($start_div);

		// Infinite scroll data
		$infinite_scroll_data = array();
		$infinite_scroll_data['cpt'] = 'client';
		$infinite_scroll_data['style'] = $style;

		if( !empty($settings['columns']) ){
			$infinite_scroll_data['columns'] = $settings['columns'];
		}
		if( !empty($settings['show']) ){
			$infinite_scroll_data['show'] = $settings['show'];
		}

		if( !empty($settings['offset']) ){
			$infinite_scroll_data['offset'] = $settings['offset'];
		}
		if( !empty($settings['from_category']) ){
			$infinite_scroll_data['from_category'] = $settings['from_category'];
		}
		if( !empty($settings['show']) ){
			$infinite_scroll_data['show'] = $settings['show'];
		}
		if( !empty($settings['order']) ){
			$infinite_scroll_data['order'] = $settings['order'];
		}
		if( !empty($settings['orderby']) ){
			$infinite_scroll_data['orderby'] = $settings['orderby'];
		}
		echo cspt_esc_kses('<div class="cspt-infinite-scroll-data">'.json_encode($infinite_scroll_data).'</div>');

		// Preparing $args
		$args = array(
			'post_type'				=> 'cspt-client',
			'status'				=> 'publish',
			'posts_per_page'		=> $show,
			'ignore_sticky_posts'	=> true,
		);
		if( !empty($offset) ){
			$args['offset'] = $offset;
		}
		if( !empty($orderby) && $orderby!='none' ){
			$args['orderby'] = $orderby;
			if( !empty($order) ){
				$args['order'] = $order;
			}
		}
		// From selected category/group
		if( !empty($from_category) ){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'cspt-client-group',
					'field'    => 'slug',
					'terms'    => $from_category,
				),
			);
		};

		// Wp query to fetch posts
		$posts = new \WP_Query( $args );

		if ( $posts->have_posts() ) {
			?>

			<div class="cspt-ele-header-area">
				<?php cspt_heading_subheading($settings, true); ?>

				<?php
				/* Sortable Category  */
				if( function_exists('cspt_sortable_category') ){
					$sortable_html = cspt_sortable_category( $settings, 'cspt-client-group' );
					echo  cspt_esc_kses($sortable_html);
				}
				?>

			</div>

			<div class="cspt-element-posts-wrapper row multi-columns-row">

			<?php
			$odd_even = 'odd';
			while ( $posts->have_posts() ) {
				$return = '';
				$posts->the_post();

				// Template
				if( file_exists( locate_template( '/theme-parts/client/client-style-'.esc_attr($style).'.php', false, false ) ) ){

					$return .= cspt_element_block_container( array(
						'position'	=> 'start',
						'column'	=> $columns,
						'cpt'		=> 'client',
						'taxonomy'	=> 'cspt-client-group',
						'style'		=> $style,
					) );

					ob_start();
					$r = include( locate_template( '/theme-parts/client/client-style-'.esc_attr($style).'.php', false, false ) );
					$return .= ob_get_contents();
					ob_end_clean();

					$return .= cspt_element_block_container( array(
						'position'	=> 'end',
					) );

				}

				echo cspt_esc_kses($return);

				// odd or even
				if( $odd_even == 'odd' ){ $odd_even = 'even'; } else { $odd_even = 'odd'; }

			}
			?>

			</div>

			<?php
		}

		?>

		<?php wp_reset_postdata(); ?>

		<?php
		// infinite scroll

		if( $infinite_scroll_enabled=='yes' ){

			// Load More button
			if( $loadmore_btn == 'yes' ){
				if( empty($loadmore_btn_title) ){
					$loadmore_btn_title = esc_attr__( 'Load More', 'leblix' );
				}
				echo cspt_esc_kses( '<div class="cspt-ajax-load-more-btn"><a href="#">' . esc_attr($loadmore_btn_title) . '</a></div>' );
			}

			echo cspt_esc_kses( '<div class="cspt-infinite-loader">
				<img src="' . get_template_directory_uri() . '/images/three-dots.svg" width="60" alt="'.esc_attr__( 'Loader', 'leblix' ).'">
			</div>
			<div class="cspt-infinite-scroll-last">' . esc_attr__( 'All content loaded', 'leblix' ) . '</div>' );

		}

		?>

		<?php

		// Ending wrapper of the whole arear
		$end_div = cspt_element_container( array(
			'position'	=> 'end',
			'cpt'		=> 'client',
			'data'		=> $settings
		) );
		echo cspt_esc_kses($end_div);
		?>

	    <?php
	}

	protected function content_template() {}

	protected function select_category() {
		$category = get_terms( array( 'taxonomy' => 'cspt-client-group', 'hide_empty' => false ) );
	  	$cat = array();
	  	foreach( $category as $item ) {
			$cat_count = get_category( $item );

	     	if( $item ) {
	        	$cat[$item->slug] = $item->name . ' ('.$cat_count->count.')';
	     	}
	  	}
	  	return $cat;
	}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new CSPT_ClientElement() );
