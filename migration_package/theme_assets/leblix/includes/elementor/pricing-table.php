<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class CSPT_PTableElement extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'cspt_ptable_element';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return esc_attr__( 'Leblix Pricing Table Element', 'leblix' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'fas fa-th-large';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'leblix_category' ];
	}

	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
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

        // Highlight Column
        $this->start_controls_section(
            'highlight_col_section',
            [
                'label' => esc_attr__( 'Highlight Column', 'leblix' ),
            ]
        );
        $this->add_control(
			'highlight_col',
			[
				'label' => esc_attr__( 'Highlight Column', 'leblix' ),
				'description' => esc_attr__( 'Select column which is highlighted in pricing table', 'leblix' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1'	=> esc_attr__( 'First Column', 'leblix' ),
                    '2'	=> esc_attr__( 'Second Column', 'leblix' ),
					'3'	=> esc_attr__( 'Third Column', 'leblix' ),
					'4'	=> esc_attr__( 'Fourth Column', 'leblix' ),
					'5'	=> esc_attr__( 'Fifth Column', 'leblix' ),
				],
				'default' => esc_attr( '2' ),
			]
		);
		$this->add_control(
			'highlight_text',
			[
				'label' => esc_attr__( 'Highlight Text', 'leblix' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_attr__( 'This will appear as special text', 'leblix' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		for( $x=1; $x<=5; $x++ ){

			$default_heading	= '';
			$default_price		= '';
			$default_icon		= [
				'value'				=> 'fas fa-star',
				'library'			=> 'fa-solid',
				'url'				=> '',
			];
			if( $x == 1 ){
				$default_heading = esc_attr__( 'Plan 1', 'buildguy' );
				$default_price	 = esc_attr__( '1.99', 'buildguy' );
				$default_icon	= [
					'value'			=> 'fas fa-user-alt',
					'library'		=> 'fa-solid',
					'url'			=> '',
				];

			} else if( $x == 2 ){
				$default_heading = esc_attr__( 'Plan 2', 'buildguy' );
				$default_price	 = esc_attr__( '3.99', 'buildguy' );
				$default_icon	= [
					'value'			=> 'fas fa-user-tie',
					'library'		=> 'fa-solid',
					'url'			=> '',
				];

			} else if( $x == 3 ){
				$default_heading = esc_attr__( 'Plan 3', 'buildguy' );
				$default_price	 = esc_attr__( '5.99', 'buildguy' );
				$default_icon	= [
					'value'			=> 'fas fa-users',
					'library'		=> 'fa-solid',
					'url'			=> '',
				];

			}

			//Content
			$this->start_controls_section(
				$x.'_col_section',
				[
					'label' => sprintf( esc_attr__( '%1$s Column in Pricing Table', 'leblix' ) , cspt_ordinal($x) ) ,
				]
			);

			$this->add_control(
				$x.'_icon_type',
				[
					'label' => esc_attr__( 'Icon Type', 'leblix' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'icon'	=> esc_attr__( 'Icon', 'leblix' ),
						'image'	=> esc_attr__( 'Image', 'leblix' ),
						'text'	=> esc_attr__( 'Text', 'leblix' ),
					],
					'default' => esc_attr( 'icon' ),
				]
			);
			$this->add_control(
				$x.'_icon',
				[
					'label' => __( 'Icon', 'leblix' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => $default_icon,
					'condition' => [
						$x.'_icon_type' => 'icon',
					]
				]

			);
			$this->add_control(
				$x.'_icon_image',
				[
					'label' => __( 'Select Image for Icon', 'leblix' ),
					'description' => __( 'This image will appear at icon position. Recommended size is 300x300 px transparent PNG file.', 'leblix' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
					'condition' => [
						$x.'_icon_type' => 'image',
					]
				]
			);
			$this->add_control(
				$x.'_icon_text',
				[
					'label' => esc_attr__( 'Text for Icon', 'leblix' ),
					'description' => esc_attr__( 'The text will appear at icon position. This should be small text like "01" or "PX"', 'leblix' ),
					'type' => Controls_Manager::TEXT,
					'dynamic' => [
						'active' => true,
					],
					'default' => esc_attr__( '01', 'leblix' ),
					'placeholder' => esc_attr__( 'Enter text here', 'leblix' ),
					'label_block' => true,
					'condition' => [
						$x.'_icon_type' => 'text',
					]
				]
			);

			$this->add_control(
				$x.'_heading',
				[
					'label'         => esc_attr__( 'Heading', 'leblix' ),
					'type'          => Controls_Manager::TEXT,
					'default'		=> esc_attr( $default_heading ),
					'description'   => esc_attr__( 'Enter text used as main heading. This will be plan title like "Basic", "Pro" etc.', 'leblix' ),
					'separator'     => 'after',
					'label_block'   => true,
				]
			);

			$this->add_control(
				$x.'_desc',
				[
					'label'         => esc_attr__( 'Description', 'leblix' ),
					'type'          => Controls_Manager::TEXT,
					'description'   => esc_attr__( 'Enter text used as description.', 'leblix' ),
					'separator'     => 'after',
					'label_block'   => true,
				]
			);

			$this->add_control(
				$x.'_price',
				[
					'label'         => esc_attr__( 'Price', 'leblix' ),
					'type'          => Controls_Manager::TEXT,
					'default'		=> esc_attr( $default_price ),
					'description'   => esc_attr__( 'Enter Price.', 'leblix' ),
				]
			);
			$this->add_control(
				$x.'_cur_symbol',
				[
					'label'         => esc_attr__( 'Currency symbol', 'leblix' ),
					'type'          => Controls_Manager::TEXT,
					'default'		=> esc_attr( '$' ),
					'description'   => esc_attr__( 'Enter currency symbol', 'leblix' ),
				]
			);
			$this->add_control(
				$x.'_cur_symbol_position',
				[
					'label'			=> esc_html__( 'Currency Symbol position', 'leblix' ),
					'description'	=> esc_html__( 'Select currency position.', 'leblix' ),
					'type'			=> Controls_Manager::SELECT,
					'default'		=> esc_attr('after'),
					'default'		=> 'after',
					'options' => [
						'after'		=> __( 'After Price', 'leblix' ),
						'before'	=> __( 'Before Price', 'leblix' ),
					],
				]
			);
			$this->add_control(
				$x.'_price_frequency',
				[
					'label'         => esc_attr__( 'Price Frequency', 'leblix' ),
					'type'          => Controls_Manager::TEXT,
					'default'		=> esc_attr__( 'Monthly', 'buildguy' ),
					'description'   => esc_attr__( 'Enter currency frequency like "Monthly", "Yearly" or "Weekly" etc.', 'leblix' ),
					'separator'     => 'after',
				]
			);
			$this->add_control(
				$x.'_btn_text',
				[
					'label'         => esc_attr__( 'Button Text', 'leblix' ),
					'type'          => Controls_Manager::TEXT,
					'default'		=> esc_attr__( 'Buy Now', 'buildguy' ),
					'description'   => esc_attr__( 'Like "Read More" or "Buy Now".', 'leblix' ),
				]
			);
			$this->add_control(
				$x.'_btn_link',
				[
					'label'         => esc_attr__( 'Button Link', 'leblix' ),
					'type'          => Controls_Manager::URL,
					'default'		=> array (
						'url'				=> '#',
						'is_external'		=> '',
						'nofollow'			=> '',
						'custom_attributes'	=> '',
					),
					'description'   => esc_attr__( 'Set link for button', 'leblix' ),
					'separator'     => 'after',
				]
			);

			$repeater = new Repeater();

			$repeater->add_control(
				'text',
				[
					'label' => __( 'Line Label', 'leblix' ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
				]
			);
			$repeater->add_control(
				'icon',
				[
					'label'     => __( 'Icon', 'leblix' ),
					'type'      => Controls_Manager::ICONS,
					'default'   => [
						'value'     => 'fas fa-check',
						'library'   => 'solid',
					],
				]

			);

			$this->add_control(
				$x.'_lines',
				[
					'label'			=> esc_attr__( 'Each Line (Features)', 'leblix' ),
					'description'	=> esc_attr__( 'Enter features that will be shown in spearate lines.', 'leblix' ),
					'type'			=> Controls_Manager::REPEATER,
					'fields'		=> $repeater->get_controls(),
					'default'		=> [
						[
							'text'		=> esc_attr__( 'Line One', 'leblix' ),
							'icon'	    => [
								'value'     => 'fas fa-check',
								'library'   => 'solid',
							]
						],
						[
							'text'		=> esc_attr__( 'Line Two', 'leblix' ),
							'icon'	    => [
								'value'     => 'fas fa-check',
								'library'   => 'solid',
							]
						],
						[
							'text'		=> esc_attr__( 'Line Three', 'leblix' ),
							'icon'	    => [
								'value'     => 'fas fa-check',
								'library'   => 'solid',
							]
						],
					],
					'title_field' => '{{{ text }}}',
				]
			);

			$this->end_controls_section();

		} // end for loop

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
				'label'			=> esc_attr__( 'Select Service View Style', 'leblix' ),
				'description'	=> esc_attr__( 'Slect Service View style.', 'leblix' ),
				'type'			=> 'cspt_imgselect',
				'label_block'	=> true,
				'thumb_width'	=> '110px',
				'default'		=> '1',
				'options'		=> cspt_element_template_list( 'pricing-table', true ),
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

		$settings	= $this->get_settings_for_display();
		extract($settings);
		$return = '';
		?>

		<div class="creativesplanet-ele creativesplanet-ele-pricing-table creativesplanet-ele-ptable-style-<?php echo esc_attr($style); ?>">

			<?php cspt_heading_subheading($settings, true); ?>

			<?php
			$columns = array();
			for ($x = 0; $x <= 5; $x++) {
				if( !empty( $settings[$x.'_heading'] ) ){
					$columns[$x] = $x;
				}
			}

			$col_start_div	= '';
			$col_end_div	= '';
			if( !empty($columns) ){
				switch( count($columns) ){
					case 1:
						$col_start_div	= '<div class="cspt-ptable-col col-md-12">';
						$col_end_div	= '</div>';
						break;

					case 2:
						$col_start_div	= '<div class="cspt-ptable-col col-md-6">';
						$col_end_div	= '</div>';
						break;

					case 3:
						$col_start_div	= '<div class="cspt-ptable-col col-md-4">';
						$col_end_div	= '</div>';
						break;

					case 4:
						$col_start_div	= '<div class="cspt-ptable-col col-md-3">';
						$col_end_div	= '</div>';
						break;

					case 5:
						$col_start_div	= '<div class="cspt-ptable-col col-md-20percent">';
						$col_end_div	= '</div>';
						break;
				}
			}

			if( !empty($columns) ){

				$return .= '<div class="cspt-ptable-cols row multi-columns-row">';

				foreach( $columns as $col => $highlight_col ){

					$icon = '';
					if( !empty($settings[$col.'_icon_type']) ){

						if( $settings[$col.'_icon_type']=='text' ){
							$icon = '<div class="cspt-ptable-icon"><div class="cspt-ptable-icon-wrapper cspt-ptable-icon-type-text">' . $settings[$col.'_icon_text'] . '</div></div>';
							$icon_type_class = 'text';

						} else if( $settings[$col.'_icon_type']=='image' ){
							$icon_image = '<img src="'.esc_url($settings[$col.'_icon_image']['url']).'" alt="'.esc_attr($settings[$col.'_heading']).'" />';
							$icon = '<div class="cspt-ptable-icon"><div class="cspt-ptable-icon-wrapper cspt-ptable-icon-type-image">' . $icon_image . '</div></div>';
							$icon_type_class = 'image';
						} else if( $settings[$col.'_icon_type']=='none' ){
							$icon = '';
							$icon_type_class = 'none';
						} else {

							// This is real icon html code
							$icon       = '<div class="cspt-ptable-icon"><div class="cspt-ptable-icon-wrapper"><i class="' . $settings[$col.'_icon']['value'] . '"></i></div></div>';
							$icon_type_class = 'icon';

							wp_enqueue_style( 'elementor-icons-'.$settings[$col.'_icon']['library']);
						}
					}

					// add highlighted class
					$featured = '';
					if( $settings['highlight_col'] == $col ){
						$col_start_div = str_replace( 'class="', 'class="cspt-pricing-table-featured-col ', $col_start_div );
						$featured = ( !empty($settings['highlight_col']) ) ? '<div class="cspt-ptablebox-featured-w">'.$settings['highlight_text'].'</div>' : '' ;
					} else {
						$col_start_div = str_replace( 'class="cspt-pricing-table-featured-col ', 'class="', $col_start_div );
					}

					// Heading
					$heading = ( !empty($settings[$col.'_heading']) ) ? '<h3 class="creativesplanet-ptable-heading">'.$settings[$col.'_heading'].'</h3><div class="creativesplanet-sep"></div>' : '' ;

					// Description
					$desc = ( !empty($settings[$col.'_desc']) ) ? '<div class="creativesplanet-ptable-desc">'.$settings[$col.'_desc'].'</div>' : '' ;

					// Currency Symbol
					$currency_symbol = ( !empty($settings[$col.'_cur_symbol']) ) ? '<div class="creativesplanet-ptable-symbol">'.$settings[$col.'_cur_symbol'].'</div>' : '' ;

					// Price Frequency
					$frequency = ( !empty($settings[$col.'_price_frequency']) ) ? '<div class="creativesplanet-ptable-frequency">'.$settings[$col.'_price_frequency'].'</div>' : '' ;

					// Price				
					$price = ( !empty($settings[$col.'_price']) ) ? '<div class="creativesplanet-ptable-price">'.$settings[$col.'_price'].'</div>' : '' ;
					// Add currently symbol in price
					$price = ( !empty($settings[$col.'_cur_symbol_position']) && $settings[$col.'_cur_symbol_position']=='before' ) ? $currency_symbol.' '.$price : $price.' '.$currency_symbol ;

					// list of features
					$lines_html = '';
					$values     = (array) $settings[$col.'_lines'];
					if( is_array($values) && count($values)>0 ){
						foreach ( $values as $data ) {

							$list_icon = '<i class="fa fa-check"></i> ';
							if( !empty($data['icon']['value']) ){
								$list_icon = '<i class="' . $data['icon']['value'] . '"></i> ';
								wp_enqueue_style( 'elementor-icons-'.$data['icon']['library']);
							}
							$lines_html .= isset( $data['text'] ) ? '<div class="cspt-ptable-line">'.$list_icon.$data['text'].'</div>' : '';
						}
					}

					// Button
					$button = '';
					if( !empty($settings[$col.'_btn_text']) && !empty($settings[$col.'_btn_link']['url']) ){
						$button = '<div class="cspt-ptable-btn">' . cspt_link_render($settings[$col.'_btn_link'], 'start' ) . cspt_esc_kses($settings[$col.'_btn_text']) . cspt_link_render($settings[$col.'_btn_link'], 'end' ) . '</div>';
					}

					// Template output
					$return .= $col_start_div;
					ob_start();
					include( get_template_directory() . '/theme-parts/pricing-table/pricing-table-style-'.esc_attr($style).'.php' );
					$return .= ob_get_contents();
					ob_end_clean();
					$return .= $col_end_div;
				}

				$return .= '</div>';

			}

			echo cspt_esc_kses($return);
			?>

		</div><!-- creativesplanet-ele creativesplanet-ele-pricing-table -->

		<?php

	}

	protected function content_template() {}

	protected function select_category() {
		$category = get_terms( array( 'taxonomy' => 'cspt-ptable-category', 'hide_empty' => false ) );
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
Plugin::instance()->widgets_manager->register( new CSPT_PTableElement() );