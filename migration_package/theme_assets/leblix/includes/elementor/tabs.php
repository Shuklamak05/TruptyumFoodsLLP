<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Section Heading 
 */
class CSPT_TabsElement extends Widget_Base{

 	/**
	 * Get widget name.
	 *
	 * Retrieve tabs widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'cspt_tabs_element';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve tabs widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Leblix Tabs Element', 'leblix' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve tabs widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fas fa-box';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'leblix_category' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'tabs', 'accordion', 'toggle' ];
	}

	protected function register_controls() {

		//Content Service box
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_attr__( 'Tabs', 'leblix' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'tab_icon',
			[
				'label' => esc_attr__( 'Icon', 'leblix' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
			]
		);

		$repeater->add_control(
			'tab_title',
			[
				'label' => esc_attr__( 'Title & Description', 'leblix' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_attr__( 'Tab Title', 'leblix' ),
				'placeholder' => esc_attr__( 'Tab Title', 'leblix' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'tab_content',
			[
				'label' => esc_attr__( 'Content', 'leblix' ),
				'default' => esc_attr__( 'Tab Content', 'leblix' ),
				'placeholder' => esc_attr__( 'Tab Content', 'leblix' ),
				'type' => Controls_Manager::WYSIWYG,
				'show_label' => false,
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => esc_attr__( 'Tabs Items', 'leblix' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => esc_attr__( 'Tab #1', 'leblix' ),
						'tab_icon' => [ 'value' => 'fas fa-star', 'library' => 'fa-solid' ],
						'tab_content' => esc_attr__( 'We help ambitious businesses like yours generate more profits by building awareness, driving web traffic, connecting with customers, and growing overall sales. Give us a call.', 'leblix' ),
					],
					[
						'tab_title' => esc_attr__( 'Tab #2', 'leblix' ),
						'tab_icon' => [ 'value' => 'fas fa-star', 'library' => 'fa-solid' ],
						'tab_content' => esc_attr__( 'We help ambitious businesses like yours generate more profits by building awareness, driving web traffic, connecting with customers, and growing overall sales. Give us a call.', 'leblix' ),
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="cspt-tabs">
			<?php if ( $settings['tabs'] ) : ?>
			<ul class="cspt-tabs-heading">
				<?php $i = 1; foreach ( $settings['tabs'] as $tabs ) { ?>
					<?php $active_li_class = ( $i==1 ) ? 'cspt-tab-li-active' : '' ; ?>

					<?php
					// icon
					$icon_html = '';
					if( !empty($tabs['tab_icon']['value']) ){
						$icon_html = '<i class="' . esc_attr($tabs['tab_icon']['value']) . '" aria-hidden="true"></i> ';
						wp_enqueue_style( 'elementor-icons-'.$tabs['tab_icon']['library']);
					}
					?>

				<li class="cspt-tab-link <?php echo esc_attr($active_li_class); ?>" data-cspt-tab="<?php echo esc_attr($i); ?>"><?php echo cspt_esc_kses($icon_html); ?><span><?php echo esc_html($tabs['tab_title']); ?></span></li>
				<?php $i++; } ?>
			</ul>

			<div class="cspt-tab-content-wrapper">
				<?php $j = 1; foreach ( $settings['tabs'] as $tabs ) { ?>
					<?php $active_class = ( $j==1 ) ? 'cspt-tab-active' : '' ; ?>
					<div class="cspt-tab-content cspt-tab-content-<?php echo esc_attr($j); ?> <?php echo esc_attr($active_class); ?>">
						<?php
						$icon_html = ''; // icon
						if( !empty($tabs['tab_icon']['value']) ){
							$icon_html = '<i class="' . esc_attr($tabs['tab_icon']['value']) . '" aria-hidden="true"></i> ';
							wp_enqueue_style( 'elementor-icons-'.$tabs['tab_icon']['library']);
						}
						?>
						<div class="cspt-tab-content-title" data-cspt-tab="<?php echo esc_attr($j); ?>"><?php echo cspt_esc_kses($icon_html); ?><?php echo esc_html($tabs['tab_title']); ?></div>
						<div class="cspt-tab-content-inner">
							<?php echo cspt_esc_kses($tabs['tab_content']); ?>
						</div>
					</div>
				<?php $j++; } ?>
			</div>

			<?php endif; ?>
	    </div>

	    <?php
	}

	protected function content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register( new CSPT_TabsElement() );