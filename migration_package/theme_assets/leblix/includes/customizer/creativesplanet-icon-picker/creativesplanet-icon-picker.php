<?php

/*
 *  Customizer - Creative's Planet Icon picker
 */

if( !function_exists('cspt_admin_enqueue_icon_library') ){
function cspt_admin_enqueue_icon_library() {
	// Icon libraries
	$icon_libraries = cspt_icon_library_list();
	wp_enqueue_style( 'elementor-icons-shared-0', get_template_directory_uri() . '/libraries/font-awesome/css/fontawesome.min.css' );
	foreach( $icon_libraries as $library_id=>$library_data ){
		wp_enqueue_style( $library_id, $library_data['css_path'] );
	}

}
}
add_action( 'admin_enqueue_scripts', 'cspt_admin_enqueue_icon_library', 55 );

if( !function_exists('cspt_enqueue_icon_base') ){
function cspt_enqueue_icon_base() {
	// Icon class array file
	wp_enqueue_script( 'acf-cspt_fonticonpicker-iconarray', get_template_directory_uri() . '/includes/customizer/creativesplanet-icon-picker/creativesplanet-icon-picker.js', array('jquery','acf-cspt_fonticonpicker') );
	wp_enqueue_style( 'creativesplanet-icon-picker-base',  get_template_directory_uri() . '/includes/customizer/creativesplanet-icon-picker/creativesplanet-icon-picker.css' );
}
}
add_action( 'admin_enqueue_scripts', 'cspt_enqueue_icon_base' );

add_action( 'customize_register', function( $wp_customize ) {
	/**
	 * The custom control class
	 */
	class Kirki_Controls_CreativesPlanet_Icon_Picker_Control extends Kirki_Control_Base {
		public $type = 'creativesplanet_icon_picker';

		//public function content_template() {
		public function render_content() {

			// Define all icon libraries
			$icon_libraries = cspt_icon_library_list();

			// Default icons for each library
			$default_icons = array();
			foreach( $icon_libraries as $library_id=>$library_data ){
				$default_icons[$library_id] = $library_data['default_icon'];
			}

			// Process value
			$allvalues       = $this->value();
			$allvalues_array = explode( ';', $allvalues );
			$active_lib      = '';

			foreach( $allvalues_array as $value ){
				$value_array = explode( ' ', $value );
				foreach( $icon_libraries as $library_id=>$library_data ){
					if( $library_data['common_class'] == $value_array[0] ){
						$default_icons[$library_id] = $value;

						$active_lib = ( empty($active_lib) ) ? $library_id : $active_lib ;
					}
				}
			}

			// First active library
			$selected_library = '';
			$allvalues_first = explode( ' ', $allvalues );
			$allvalues_first = $allvalues_first[0];
			foreach( $icon_libraries as $library_id=>$library_data ){
				if( $library_data['common_class'] == $allvalues_first ){
					$selected_library = $library_id;
				}
			}

			?>

			<div class="creativesplanet-icon-picker-element">

				<label class="customizer-text">
					<?php if( !empty($this->label) ) : ?><span class="customize-control-title"><?php echo esc_attr( $this->label ) ?></span><?php endif; ?>
					<?php if( !empty($this->description) ) : ?><span class="description customize-control-description"><?php echo esc_attr( $this->description ) ?></span><?php endif; ?>
				</label>

				<!-- Value will be stored here -->
				<div class="creativesplanet-select-icon-value-wrapper">
					<input type="text" value="<?php echo esc_attr($value); ?>" class="kirki-creativesplanet-icon-picker-control" data-id="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); ?>>
				</div>

				<!-- Icon library selector -->
				<div class="creativesplanet-select-icon-library-wrapper">
					<select name="_customize-creativesplanet-icon-picker-<?php echo esc_attr( $this->id ); ?>test" class="creativesplanet-select-icon-library" >
						<?php foreach( $icon_libraries as $library_id=>$library_data ) : ?>
							<option value="<?php echo esc_attr($library_id) ?>" <?php selected( $selected_library, $library_id ) ?> ><?php echo esc_attr($library_data['name']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<!-- Icon list wrapper -->
				<div class="creativesplanet-select-icons-list-wrapper">

				<?php foreach( $icon_libraries as $library_id=>$library_data ) : ?>
					<div class="creativesplanet-select-icon-list-wrapper creativesplanet-select-icon-list-wrapper-<?php echo esc_attr($library_id); ?> <?php if( $selected_library != $library_id ): ?> creativesplanet-hidden <?php endif; ?>">

						<div class="creativesplanet-icon-picker-ele-w" data-cspt-library="<?php echo esc_attr($library_id); ?>" data-cspt-selected-icon="<?php echo esc_attr($default_icons[$library_id]); ?>" data-cspt-common-class="<?php echo esc_attr($library_data['common_class']); ?>" data-cspt-class-prefix="<?php echo esc_attr($library_data['class_prefix']); ?>"  >
							<div class="creativesplanet-icon-picker-ele-icon"><i class="<?php echo esc_attr( $default_icons[$library_id] ); ?>"></i></div>
							<div class="creativesplanet-icon-picker-ele-arrow"><i class="fa fa-arrow-down"></i></div>
							<div class="clear clr clearfix"></div>
						</div>
						<div class="creativesplanet-icon-picker-list-w creativesplanet-hidden"></div>
					</div>
				<?php endforeach; ?>

				</div>

			</div>

			<?php
		}
	}
	// Register our custom control with Kirki
	add_filter( 'kirki_control_types', function( $controls ) {
		$controls['creativesplanet_icon_picker'] = 'Kirki_Controls_CreativesPlanet_Icon_Picker_Control';
		return $controls;
	} );

} );
