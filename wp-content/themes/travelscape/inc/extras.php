<?php
/**
 * Travelscape Theme Standalone Functions.
 *
 * @package Travelscape
 */
 
if ( !defined( 'ABSPATH' ) )
    die( 'Direct access forbidden.' ); 

/* body classes for layout container
* Adds a class to <body> based on the site container selected
* @since 1.0.0
*/
if ( ! function_exists( 'travelscape_body_container_class' ) ) :
function travelscape_body_container_class($classes) {					

		global $post;				
	
		if (is_archive() || is_search() || is_home()) {
			 //Adds a class of sidebar position						
			$sidebar_pos = get_theme_mod('ts_pro_sidebar_pos', 'right-sidebar');				

			if ( ($sidebar_pos == 'no-sidebar') || !is_active_sidebar( 'sidebar-main' ) ) {
				$classes[] = 'travelscape-no-sidebar';
			} 
			elseif ($sidebar_pos == 'left-sidebar') { 
				$classes[] = 'travelscape-left-sidebar';
			} 
			else {
				$classes[] = 'travelscape-right-sidebar';
			}

		}		
		// if single post type then do this
		elseif (is_singular()) {
			
			$travelscape_settings_enable_container_flow = get_post_meta( $post->ID, 'travelscape_settings_enable_container_flow', true );
			if ($travelscape_settings_enable_container_flow) {
				$classes[] = 'travelscape-container-flow';
			}		
			
			$travelscape_settings_disable_sidebar = get_post_meta( $post->ID, 'travelscape_settings_disable_sidebar', true );
			if ($travelscape_settings_disable_sidebar) {
				$classes[] = 'travelscape-no-sidebar';
			}			
			
			$travelscape_single_content_padding = get_post_meta( $post->ID, 'travelscape_settings_disable_content_padding', true );
			if ($travelscape_single_content_padding) {
				$classes[] = 'travelscape-content-no-padding';
			}
			
		}
		// if no frontpage blog
		elseif ( is_home() && !is_front_page() ) {
			
			$pageID = get_option('page_for_posts');						
			
			$travelscape_settings_enable_container_flow = get_post_meta( $pageID, 'travelscape_settings_enable_container_flow', true );
			if ($travelscape_settings_enable_container_flow) {
				$classes[] = 'travelscape-container-flow';
			}		
			
			$travelscape_settings_disable_sidebar = get_post_meta( $pageID, 'travelscape_settings_disable_sidebar', true );
			if ($travelscape_settings_disable_sidebar) {
				$classes[] = 'travelscape-no-sidebar';
			}			
			
			$travelscape_single_content_padding = get_post_meta( $pageID, 'travelscape_settings_disable_content_padding', true );
			if ($travelscape_single_content_padding) {
				$classes[] = 'travelscape-content-no-padding';
			}
			
		}	
		
		//if any archive or home type then do this
		else {				
			$classes[] = 'travelscape-container-default';						
		}
    
        if (function_exists('has_blocks')) { 
            
            if ( is_singular() && has_blocks() ) {
                $classes[] = 'has-blocks';
            }           	                
            
        }
		
		return $classes;
		
}
endif;
add_filter('body_class', 'travelscape_body_container_class');	

if ( ! function_exists( 'travelscape_single_options_ed' ) ) :
function travelscape_single_options_ed() {			
	
	//remove title if 'Disable Title' is checked on post/page
	if (is_singular() ) {		
		global $post;
		
		$title_ed 		= get_post_meta( $post->ID, 'travelscape_settings_disable_title', true );		
		$header_ed		= get_post_meta( $post->ID, 'travelscape_settings_disable_primary_header', true );
		$footer_ed 		= get_post_meta( $post->ID, 'travelscape_settings_disable_footer_area', true );
		
		//disable header
		if ( $header_ed ) {
			remove_action('travelscape_header', 'travelscape_header_primary_markup', 10);			
		}	
		
		//disable footer
		if ( $footer_ed ) {
			remove_action('travelscape_footer', 'travelscape_footer_primary_markup', 10);			
		}					
		
		//disabled page title
		if ( $title_ed ) {			
			remove_action('travelscape_before_page_entry_content', 'travelscape_entry_header', 10);		
			remove_action('travelscape_before_page_entry_content', 'travelscape_entry_meta', 5);
		}		
	}
	
	//for blog page
	if ( is_home() && !is_front_page() ) {

		$pageID = get_option('page_for_posts');					
		
		$title_ed 		= get_post_meta( $pageID, 'travelscape_settings_disable_title', true );		
		$header_ed		= get_post_meta( $pageID, 'travelscape_settings_disable_primary_header', true );
		$footer_ed 		= get_post_meta( $pageID, 'travelscape_settings_disable_footer_area', true );
		
		//disable header
		if ( $header_ed ) {
			remove_action('travelscape_header', 'travelscape_header_primary_markup', 10);			
		}	
		
		//disable footer
		if ( $footer_ed ) {
			remove_action('travelscape_footer', 'travelscape_footer_primary_markup', 10);			
		}					
		
		//disabled page title
		if ( $title_ed ) {			
			remove_action('travelscape_before_page_entry_content', 'travelscape_entry_header', 15);
		}		
	}	
	
}
add_filter('wp', 'travelscape_single_options_ed');	
endif;

// site title ed	
function travelscape_header_title() {
	/*
	 * If header text is set to display, let's bail.
	 * hattip:  https://themetry.com/custom-header-text-display-option/
	 */
	if ( display_header_text() ) {
		return;
	}
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	</style>
	<?php	
}	

if ( ! function_exists( 'travelscape_post_navigation' ) ) :
	function travelscape_post_navigation() {			
			echo '<nav class="travelscape-pagination">';
				the_posts_pagination( array(
				  'screen_reader_text' => ' ',
				  'prev_text' => esc_html__( 'Previous', 'travelscape' ),
				  'next_text' => esc_html__( 'Next', 'travelscape' ),
				  ) );						
			echo '</nav>';
	}
endif;
add_action('travelscape_content_while_after', 'travelscape_post_navigation');

/**
 * Query WooCommerce activation
 */
function travelscape_is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}

/**
 * Check Elementor PB Activation
 */
function travelscape_is_elementor_activated() {
	
	if ( did_action( 'elementor/loaded' ) ) {
		return true;
	}
		
	return false;
}

if ( ! function_exists( 'travelscape_excerpt_more' ) ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function travelscape_excerpt_more( $more ) {
	
	if (!is_admin()) {		
		
				$more .= '<div class="read-more"><a href="' .esc_url(get_the_permalink()) . '" class="read-more-link">';
				$more .= __('Read More...', 'travelscape');
				$more .= '</a></div>';		
		
		return $more; // phpcs:ignore WordPress.Security.EscapeOutput.DeprecatedWhitelistCommentFound
	}	
	
	return $more; 
}
endif;
add_filter( 'excerpt_more', 'travelscape_excerpt_more' );

if ( ! function_exists( 'travelscape_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function travelscape_excerpt_length( $length ) {
				
	$excerpt_length = '55';	
	
	if ( is_admin() ) {
		return $length;
	} 
	else {
		return absint( $excerpt_length );
	}	
	
}
endif;
add_filter( 'excerpt_length', 'travelscape_excerpt_length', 999 );

if( ! function_exists( 'travelscape_get_kses_extended_ruleset' ) ) :
/**
 * Sanitize SVG
 */
function travelscape_get_kses_extended_ruleset() {
	$kses_defaults = wp_kses_allowed_html( 'post' );

	$svg_args = array(
		'svg'   => array(
			'class'           => true,
			'aria-hidden'     => true,
			'aria-labelledby' => true,
			'role'            => true,
			'xmlns'           => true,
			'width'           => true,
			'height'          => true,
			'viewbox'         => true, // <= Must be lower case!
		),
		'g'     => array( 'fill' => true ),
		'title' => array( 'title' => true ),
		'path'  => array(
			'd'    => true,
			'fill' => true,
		),
	);
	return array_merge( $kses_defaults, $svg_args );
}
endif;

if (!function_exists('travelscape_is_wpte_activated')):
    /**
     * Check if WP Travel Engine Plugin is installed
     */
    function travelscape_is_wpte_activated() {
        return class_exists('Wp_Travel_Engine') ? true : false;
    }
endif;

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function travelscape_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'travelscape_pingback_header' );

/**
 * Demo Importer Plus - Filters
 * Add filter only if function exists
 */
if ( function_exists('DEMO_IMPORTER_PLUS_setup')) {
    add_filter(
        'demo_importer_plus_api_url',
        function () {
            return 'https://preview.wptravelkit.com/';
        }
    );
}

/**
 * Demo Importer Plus - Filters
 * Add filter only if function exists
 */
if ( function_exists('DEMO_IMPORTER_PLUS_setup')) {
    add_filter(
        'demo_importer_plus_get_pro_url',
        function () {
            return 'https://wptravelkit.com/wordpress-travel-themes/travelscape-pro/';
        }
    );
}

/**
 * Demo Importer Plus - Filters
 * Add filter only if function exists
 */
if ( function_exists('DEMO_IMPORTER_PLUS_setup')) {
    add_filter(
        'demo_importer_plus_get_pro_text',
        function () {
            return __( 'Get Travelscape Pro', 'travelscape' );
        }
    );
}



if ( ! function_exists('travelscape_demo_importer_checked') ):
/**
 * Add filter only if function exists
 */
function travelscape_demo_importer_checked() {
    if ( function_exists('DEMO_IMPORTER_PLUS_setup') ) {
        add_filter(
            'demo_importer_plus_api_id',
            function () {
                return  array( '5492', '5580', '5574', '5568', '5564', '5558' );
            }
        );
    }
}
endif;

/**
 * Function for demo importer
 */
travelscape_demo_importer_checked();