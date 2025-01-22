<?php
/**
 * Travelscape Theme Customizer - Footer Functions.
 *
 * @package Travelscape
 */

function travelscape_customize_register_footer( $wp_customize ) {
	
// Create our sections
$wp_customize->add_section( 'travelscape_site_footer' , array(
	'title'             => __('Site Footer', 'travelscape'),
	'priority'          => 20,	
) );

//payment logos
$wp_customize->add_setting( 'travelscape_footer_payment_logo' , array(
	'type'          => 'theme_mod',
	'transport'     => 'refresh',	
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'travelscape_footer_payment_logo_control', array(
    'section'    => 'travelscape_site_footer',
    'label'      => __('Payment Logos', 'travelscape'),
	'settings'   => 'travelscape_footer_payment_logo',
	'priority'   => 5,
    'mime_type' => 'image'
)));	
	

//copyright content
$wp_customize->add_setting( 'travelscape_footer_copyright' , array(
	'type'          => 'theme_mod',
	'transport'     => 'refresh',	
	'sanitize_callback' => 'travelscape_sanitize_html'
) );
$wp_customize->add_control( 'travelscape_footer_copyright_control', array(
	'label'      => __('Copyright Content', 'travelscape'),
	'section'    => 'travelscape_site_footer',
	'settings'   => 'travelscape_footer_copyright',
	'priority'   => 10,
	'type'       => 'textarea',
) );
		
}
add_action( 'customize_register', 'travelscape_customize_register_footer' );