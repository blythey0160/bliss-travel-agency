<?php
/**
 * Travelscape Theme Customizer - Topbar Functions.
 *
 * @package Travelscape
 */

function travelscape_customize_register_topbar( $wp_customize ) {
	
// Create our sections
$wp_customize->add_section( 'travelscape_site_header' , array(
	'title'             => __('Header Topbar', 'travelscape'),
	'priority'          => 10,	
	'panel'             => 'travelscape_header_settings',
) );
		
// Create our settings
//Header Email
$wp_customize->add_setting( 'travelscape_header_email' , array(
	'type'          => 'theme_mod',
	'transport'     => 'postMessage',
	'sanitize_callback' => 'sanitize_email'
) );
$wp_customize->add_control( 'travelscape_header_email_control', array(
	'label'      => __('Email', 'travelscape'),
	'section'    => 'travelscape_site_header',
	'settings'   => 'travelscape_header_email',
	'priority'   => 10,
	'type'       => 'email',
) );
	
// Header Phone Label	
$wp_customize->add_setting( 'travelscape_header_phone_label' , array(	
	'type'          => 'theme_mod',
	'transport'     => 'refresh',
	'sanitize_callback' => 'wp_filter_nohtml_kses'
) );
$wp_customize->add_control( 'travelscape_header_phone_label_control', array(
	'label'      => __('Phone Label', 'travelscape'),
	'section'    => 'travelscape_site_header',
	'settings'   => 'travelscape_header_phone_label',
	'priority'   => 11,
	'type'       => 'text',
) );	

	
//Header Phone Number	
$wp_customize->add_setting( 'travelscape_header_phone_number' , array(
	'type'          => 'theme_mod',
	'transport'     => 'refresh',
	'sanitize_callback' => 'absint'
) );
	
$wp_customize->add_control( 'travelscape_header_phone_number_control', array(
	'label'      => __('Phone Number', 'travelscape'),
	'section'    => 'travelscape_site_header',
	'settings'   => 'travelscape_header_phone_number',
	'priority'   => 12,
	'type'       => 'number',
) );
		
}
add_action( 'customize_register', 'travelscape_customize_register_topbar' );