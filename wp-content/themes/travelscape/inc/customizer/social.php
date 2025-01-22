<?php
/**
 * Travelscape Theme Customizer - Social Media Link Functions.
 *
 * @package Travelscape
 */

function travelscape_customize_register_social( $wp_customize ) {
	
$wp_customize->add_section( 'travelscape_site_header_social_media' , array(
	'title'             => __('Social Networks', 'travelscape'),
	'priority'          => 10,	
	'panel'             => 'travelscape_header_settings',
) );
	
//Social Media Ed
$wp_customize->add_setting( 'travelscape_header_social_ed' , array(
	'type'          => 'theme_mod',
	'transport'     => 'refresh',	
	'sanitize_callback' => 'travelscape_sanitize_checkbox'
) );
$wp_customize->add_control( 'travelscape_header_social_control', array(
	'label'      => __('Enable Social Media Icons?', 'travelscape'),
	'section'    => 'travelscape_site_header_social_media',
	'settings'   => 'travelscape_header_social_ed',	
	'priority'   => 1,
	'type'       => 'checkbox',
) );	
	
//Facebook
$wp_customize->add_setting( 'travelscape_facebook' , array(
	'type'          => 'theme_mod',
	'transport'     => 'postMessage',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'travelscape_facebook_control', array(
	'label'      => __('Facebook', 'travelscape'),
	'section'    => 'travelscape_site_header_social_media',
	'settings'   => 'travelscape_facebook',	
	'priority'   => 1,
	'type'       => 'url',
) );
	
//Twitter
$wp_customize->add_setting( 'travelscape_twitter' , array(
	'type'          => 'theme_mod',
	'transport'     => 'postMessage',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'travelscape_twitter_control', array(
	'label'      => __('Twitter', 'travelscape'),
	'section'    => 'travelscape_site_header_social_media',
	'settings'   => 'travelscape_twitter',	
	'priority'   => 2,
	'type'       => 'url',
) );	
	
//Instagram
$wp_customize->add_setting( 'travelscape_instagram' , array(
	'type'          => 'theme_mod',
	'transport'     => 'postMessage',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'travelscape_instagram_control', array(
	'label'      => __('Instagram', 'travelscape'),
	'section'    => 'travelscape_site_header_social_media',
	'settings'   => 'travelscape_instagram',
	'priority'   => 3,
	'type'       => 'url',
) );	
	
//Pinterest
$wp_customize->add_setting( 'travelscape_pinterest' , array(
	'type'          => 'theme_mod',
	'transport'     => 'postMessage',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'travelscape_pinterest_control', array(
	'label'      => __('Pinterest', 'travelscape'),
	'section'    => 'travelscape_site_header_social_media',
	'settings'   => 'travelscape_pinterest',	
	'priority'   => 4,
	'type'       => 'url',
) );	
	
//Youtube
$wp_customize->add_setting( 'travelscape_youtube' , array(
	'type'          => 'theme_mod',
	'transport'     => 'postMessage',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'travelscape_youtube_control', array(
	'label'      => __('Youtube', 'travelscape'),
	'section'    => 'travelscape_site_header_social_media',
	'settings'   => 'travelscape_youtube',
	'priority'   => 5,
	'type'       => 'url',
) );		
	
//TikTok
$wp_customize->add_setting( 'travelscape_tiktok' , array(
	'type'          => 'theme_mod',
	'transport'     => 'postMessage',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'travelscape_tiktok_control', array(
	'label'      => __('TikTok', 'travelscape'),
	'section'    => 'travelscape_site_header_social_media',
	'settings'   => 'travelscape_tiktok',
	'priority'   => 6,
	'type'       => 'url',
) );	
	
//Linkedin
$wp_customize->add_setting( 'travelscape_linkedin' , array(
	'type'          => 'theme_mod',
	'transport'     => 'postMessage',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'travelscape_linkedin_control', array(
	'label'      => __('Linkedin', 'travelscape'),
	'section'    => 'travelscape_site_header_social_media',
	'settings'   => 'travelscape_linkedin',
	'priority'   => 7,
	'type'       => 'url',
) );
	
//Whatsapp
$wp_customize->add_setting( 'travelscape_whatsapp' , array(
	'type'          => 'theme_mod',
	'transport'     => 'postMessage',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'travelscape_whatsapp_control', array(
	'label'      => __('Whatsapp', 'travelscape'),
	'section'    => 'travelscape_site_header_social_media',
	'settings'   => 'travelscape_whatsapp',
	'priority'   => 8,
	'type'       => 'url',
) );	
	
//Viber
$wp_customize->add_setting( 'travelscape_viber' , array(
	'type'          => 'theme_mod',
	'transport'     => 'postMessage',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'travelscape_viber_control', array(
	'label'      => __('Viber', 'travelscape'),
	'section'    => 'travelscape_site_header_social_media',
	'settings'   => 'travelscape_viber',
	'priority'   => 9,
	'type'       => 'url',
) );	
	
//Telegram
$wp_customize->add_setting( 'travelscape_telegram' , array(
	'type'          => 'theme_mod',
	'transport'     => 'postMessage',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'travelscape_telegram_control', array(
	'label'      => __('Telegram', 'travelscape'),
	'section'    => 'travelscape_site_header_social_media',
	'settings'   => 'travelscape_telegram',
	'priority'   => 10,
	'type'       => 'url',
) );	
	
//Trip Advisor
$wp_customize->add_setting( 'travelscape_tripadvisor' , array(
	'type'          => 'theme_mod',
	'transport'     => 'postMessage',
	'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'travelscape_tripadvisor_control', array(
	'label'      => __('Trip Advisor', 'travelscape'),
	'section'    => 'travelscape_site_header_social_media',
	'settings'   => 'travelscape_tripadvisor',
	'priority'   => 11,
	'type'       => 'url',
) );	
		
}
add_action( 'customize_register', 'travelscape_customize_register_social' );