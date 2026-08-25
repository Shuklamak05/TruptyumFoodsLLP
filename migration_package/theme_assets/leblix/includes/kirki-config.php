<?php
Kirki::add_config( 'creativesplanet_leblix_base_options', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );
// Panel
Kirki::add_panel( 'leblix_base_options', array(
    'priority'    => 10,
    'title'       => esc_attr__( 'Leblix Options', 'leblix' ),
    'description' => esc_attr__( 'Leblix theme options', 'leblix' ),
) );
// Customizer options array file
if( file_exists(get_template_directory() . '/includes/customizer-options.php') ){
	include( get_template_directory() . '/includes/customizer-options.php' );
}
// Setting all options
if( !empty($kirki_options_array) ){
foreach( $kirki_options_array as $section_id=>$data ){
	// Sections
	if( !empty($data['section_settings']) ){
		Kirki::add_section( $section_id , $data['section_settings'] );
	}
	// Options (fields)
	if( !empty($data['section_fields']) ){
		foreach( $data['section_fields'] as $field ){
			$field['section'] = $section_id;
			Kirki::add_field( 'creativesplanet_leblix_base_options', $field );
		}
	}
}
}
/**
 * Configuration sample for the Kirki Customizer.
 * The function's argument is an array of existing config values
 * The function returns the array with the addition of our own arguments
 * and then that result is used in the kirki_config filter
 *
 * @param $config the configuration array
 *
 * @return array
 */
if( !function_exists('cspt_kirki_demo_configuration') ){
function cspt_kirki_demo_configuration( $config ) {
	$logo = cspt_get_base_option('logo');
	if( !empty($logo) ){
		$logo_img = esc_url( $logo );
	} else {
		$logo_img = esc_url( get_template_directory_uri() . '/images/logo.png' );
	}
	return wp_parse_args( array(
		'logo_image'	=> esc_url( $logo_img ),
		'description'	=> esc_attr__( 'By Creative\'s Planet Team.', 'leblix' ),
	), $config );
}
}
add_filter( 'kirki_config', 'cspt_kirki_demo_configuration' );
