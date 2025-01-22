<?php
/**
 * Travelscape Theme Customizer Functions.
 *
 * @package Travelscape
 */

function travelscape_customize_register_panel( $wp_customize ) {
	
$wp_customize->add_panel( 'travelscape_header_settings', array(
	'priority'       => 14,
	'title'          => __('Site Header', 'travelscape'),
	'description'    => __('Travelscape Header Settings', 'travelscape'),
) );				
		
}
add_action( 'customize_register', 'travelscape_customize_register_panel' );


/**
 * Reset Default Customizer Options
 */
function travelscape_default_customize($wp_customize) {

	$wp_customize->get_section ('title_tagline')->panel = 'travelscape_header_settings';	
	$wp_customize->get_section('title_tagline')->priority = 5;

}
add_action( 'customize_register', 'travelscape_default_customize', 10 );

//checkbox sanitization function
if( ! function_exists( 'travelscape_sanitize_checkbox' ) ) :
/**
 * Sanitize checkbox
 *
 * @since 1.0.0
*/
function travelscape_sanitize_checkbox( $checked ){
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
endif;

function travelscape_sanitize_html( $input ) {

	global $allowedposttags;
	return wp_kses( $input, $allowedposttags );

}


require_once TRAVELSCAPE_PARENT_DIR . '/inc/customizer/topbar.php';
require_once TRAVELSCAPE_PARENT_DIR . '/inc/customizer/social.php';
require_once TRAVELSCAPE_PARENT_DIR . '/inc/customizer/footer.php';