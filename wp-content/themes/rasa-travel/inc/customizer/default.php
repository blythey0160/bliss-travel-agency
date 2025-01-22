<?php
/**
 * Default theme options.
 *
 * @package Rasa Travel
 */

if ( ! function_exists( 'rasa_travel_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function rasa_travel_get_default_theme_options() {

	$rasa_travel_defaults = array();

	// Contact Details
	$rasa_travel_defaults['rasa_travel_show_contact_details'] 		= true;
	$rasa_travel_defaults['rasa_travel_address_one']				= esc_html__('214 West Arnold St','rasa-travel');
	$rasa_travel_defaults['rasa_travel_address_two']				= esc_html__('New York, NY 10002','rasa-travel');
	$rasa_travel_defaults['rasa_travel_phone_number']				= esc_html__('(007) 123 456 7890','rasa-travel');
	$rasa_travel_defaults['rasa_travel_opening_time']				= esc_html__('Mon-Fri 10:00am-7:30pm','rasa-travel');
	$rasa_travel_defaults['rasa_travel_email_id']					= esc_html__('info@example.com','rasa-travel');
	$rasa_travel_defaults['rasa_travel_support_text']				= esc_html__('24 X 7 online support','rasa-travel');

	// Menu
	$rasa_travel_defaults['rasa_travel_show_menu_button'] 			= true;
	$rasa_travel_defaults['rasa_travel_menu_button_text']			= esc_html__('Request A Quote','rasa-travel');
	$rasa_travel_defaults['rasa_travel_menu_button_url']			= esc_url('#','rasa-travel');

	// Front Page Header Image
	$rasa_travel_defaults['enable_frontpage_header_image']  = false;

	//General Section
	$rasa_travel_defaults['readmore_text']					= esc_html__('Read More','rasa-travel');
	$rasa_travel_defaults['your_latest_posts_title']			= esc_html__('Blog','rasa-travel');
	$rasa_travel_defaults['excerpt_length']					= 10;
	$rasa_travel_defaults['layout_options_blog']				= 'no-sidebar';
	$rasa_travel_defaults['layout_options_archive']			= 'no-sidebar';
	$rasa_travel_defaults['layout_options_page']				= 'no-sidebar';	
	$rasa_travel_defaults['layout_options_single']			= 'right-sidebar';	

	//Footer section 		
	$rasa_travel_defaults['copyright_text']					= esc_html__( 'Copyright &copy; All rights reserved.', 'rasa-travel' );

	// Pass through filter.
	$rasa_travel_defaults = apply_filters( 'rasa_travel_filter_default_theme_options', $rasa_travel_defaults );
	return $rasa_travel_defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'rasa_travel_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function rasa_travel_get_option( $key ) {

		$rasa_travel_default_options = rasa_travel_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$rasa_travel_theme_options = (array)get_theme_mod( 'theme_options' );
		$rasa_travel_theme_options = wp_parse_args( $rasa_travel_theme_options, $rasa_travel_default_options );

		$value = null;

		if ( isset( $rasa_travel_theme_options[ $key ] ) ) {
			$value = $rasa_travel_theme_options[ $key ];
		}

		return $value;

	}

endif;