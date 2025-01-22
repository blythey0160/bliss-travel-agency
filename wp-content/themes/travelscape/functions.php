<?php
/**
 * Travelscape all required files
 *
 * @package Travelscape
 */

		/**
		 * Define constants.
		 */
		$travelscape_theme_data = wp_get_theme();
		define( 'TRAVELSCAPE_THEME_NAME', $travelscape_theme_data->get( 'Name' ) );	
		define( 'TRAVELSCAPE_THEME_URL', $travelscape_theme_data->get( 'ThemeURI' ) );	
		define( 'TRAVELSCAPE_THEME_VERSION', $travelscape_theme_data->get( 'Version' ) );
		define( 'TRAVELSCAPE_PARENT_THEME_VERSION', wp_get_theme('travelscape')->get( 'Version' ) );
		define( 'TRAVELSCAPE_PARENT_DIR', get_template_directory() );
		define( 'TRAVELSCAPE_PARENT_URI', get_template_directory_uri() );

		/**
		 * Functions which enhance the theme by hooking into WordPress.
		 */
		require_once TRAVELSCAPE_PARENT_DIR . '/inc/wptt-webfont-loader.php';		
		require_once TRAVELSCAPE_PARENT_DIR . '/inc/setup.php';		
		require_once TRAVELSCAPE_PARENT_DIR . '/inc/template-functions.php';
		require_once TRAVELSCAPE_PARENT_DIR . '/inc/metabox.php';
		require_once TRAVELSCAPE_PARENT_DIR . '/inc/extras.php';
		require_once TRAVELSCAPE_PARENT_DIR . '/inc/customizer/customizer.php';
		require_once TRAVELSCAPE_PARENT_DIR . '/inc/classes/class-header.php';
		require_once TRAVELSCAPE_PARENT_DIR . '/inc/classes/class-footer.php';				
		require_once TRAVELSCAPE_PARENT_DIR . '/inc/classes/class-social.php';
		require_once TRAVELSCAPE_PARENT_DIR . '/inc/style.php';
		require_once TRAVELSCAPE_PARENT_DIR . '/inc/theme-hooks.php';		
		require_once TRAVELSCAPE_PARENT_DIR . '/inc/hfe-elementor.php';
		require_once TRAVELSCAPE_PARENT_DIR . '/inc/admin/tgmpa/recommended-plugins.php';
		require_once TRAVELSCAPE_PARENT_DIR . '/inc/admin/theme-options/class-travelscape-theme-options.php';

		/**
		 * Add theme compatibility function for WP travel engine
		*/
		if( travelscape_is_wpte_activated() ){
			require_once TRAVELSCAPE_PARENT_DIR . '/inc/wte/wte-compatibility.php';
		}
