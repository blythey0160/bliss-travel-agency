<?php
/**
 * Elementor – Header, Footer & Blocks Template compatibility
 * 
 * @package Travelscape
 */
if( defined( 'HFE_VER' ) ) {

    if( ! function_exists( 'travelscape_remove_header_and_footer' ) ) :
    /**
     * Removing header and footer from theme.
     */
    function travelscape_remove_header_and_footer() {
		
		if ( function_exists( 'hfe_render_header' ) && hfe_header_enabled() ) {
			remove_action( 'travelscape_header', 'travelscape_header_primary_markup' );
		}

		if ( function_exists( 'hfe_render_footer' ) && hfe_footer_enabled() ) {
			remove_action( 'travelscape_footer', 'travelscape_footer_primary_markup' );
		}		
		
    }
    endif;
    add_action( 'wp', 'travelscape_remove_header_and_footer' ); 

    if( ! function_exists( 'travelscape_render_hfe_header' ) ) :
    /**
     * Header
     */
    function travelscape_render_hfe_header() {	
        if ( function_exists( 'hfe_render_header' ) && hfe_header_enabled() ) {
            hfe_render_header();
        }
    }
    endif;
    add_action( 'travelscape_header', 'travelscape_render_hfe_header' );

    if( ! function_exists( 'travelscape_render_hfe_footer' ) ) :
    /**
     * Header
     */
    function travelscape_render_hfe_footer() {	
        if ( function_exists( 'hfe_render_footer' ) && hfe_footer_enabled() ) {
            hfe_render_footer();
        }
    }
    endif;
    add_action( 'travelscape_footer', 'travelscape_render_hfe_footer' );

    if( ! function_exists( 'travelscape_header_footer_elementor_support' ) ) :
    /**
     * Theme Support for header footer elementor.
     */
    function travelscape_header_footer_elementor_support() {
        add_theme_support( 'header-footer-elementor' );
    }
    endif;
    add_action( 'after_setup_theme', 'travelscape_header_footer_elementor_support' );	
		
}