<?php
/**
 * Travelscape Theme Supports and Scripts
 *
 * @package Travelscape
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 */
function travelscape_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	//Add responsive embed support
	add_theme_support( 'responsive-embeds' );

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );	

	/*
	* Enable support for Post Thumbnails on posts and pages.
	*
	* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary Menu', 'travelscape' ),
			'top-menu' => esc_html__( 'Top Menu', 'travelscape' ),
		)
	);

	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'travelscape_custom_background_args',
			array(
				'default-color' => '#f9f3ef',
				'default-image' => '',
			)
		)
	);
	
	add_theme_support( 'wp-block-styles' );	
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'width'      => 360,
			'height'       => 160,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),		
		)
	);	
	
	/**
	 * Add support for core custom header
	 *
	 * @link https://codex.wordpress.org/Custom_Headers
	 */		
	$args = array(		
		'header-text'        => false,
		'width'              => 1200,
		'height'             => 320,
		'flex-width'         => true,
		'flex-height'        => true,
	);
	add_theme_support( 'custom-header', $args );	
	
	
}
add_action( 'after_setup_theme', 'travelscape_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travelscape_content_width() {
	
	$GLOBALS['content_width'] = apply_filters( 'travelscape_content_width', 840 ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound	
}
add_action( 'after_setup_theme', 'travelscape_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travelscape_widgets_init(){    
    $sidebars = array(
        'sidebar-main'   => array(
            'name'        => __( 'Main Sidebar', 'travelscape' ),
            'id'          => 'sidebar-main', 
            'description' => __( 'Default Sidebar', 'travelscape' ),
        ),
        'footer-one'=> array(
            'name'        => __( 'Footer One', 'travelscape' ),
            'id'          => 'footer-one', 
            'description' => __( 'Add footer one widgets here.', 'travelscape' ),
        ),
        'footer-two'=> array(
            'name'        => __( 'Footer Two', 'travelscape' ),
            'id'          => 'footer-two', 
            'description' => __( 'Add footer two widgets here.', 'travelscape' ),
        ),
        'footer-three'=> array(
            'name'        => __( 'Footer Three', 'travelscape' ),
            'id'          => 'footer-three', 
            'description' => __( 'Add footer three widgets here.', 'travelscape' ),
        ),
        'footer-four'=> array(
            'name'        => __( 'Footer Four', 'travelscape' ),
            'id'          => 'footer-four', 
            'description' => __( 'Add footer four widgets here.', 'travelscape' ),
        ),
    );			
	
    foreach( $sidebars as $sidebar ){
        register_sidebar( array(
    		'name'          => esc_html( $sidebar['name'] ),
    		'id'            => esc_attr( $sidebar['id'] ),
    		'description'   => esc_html( $sidebar['description'] ),
    		'before_widget' => '<section id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</section>',
    		'before_title'  => '<h3 class="widget-title" itemprop="name">',
    		'after_title'   => '</h3>',
    	) );
    }   
   
}
add_action( 'widgets_init', 'travelscape_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function travelscape_scripts_styles() {	
		
	wp_enqueue_style( 'travelscape-style', TRAVELSCAPE_PARENT_URI . '/style.css', array(), TRAVELSCAPE_PARENT_THEME_VERSION );		
	wp_enqueue_script( 'travelscape-navigation', TRAVELSCAPE_PARENT_URI . '/assets/js/navigation.js', array('jquery'), TRAVELSCAPE_PARENT_THEME_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'travelscape_scripts_styles' );

/**
 * Enqueue fonts
 */
function travelscape_fonts() {	
	
	$font_families = array(
		'Marcellus',
		'DM+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400'
	);

	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_families ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$fonts = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );	
	
	wp_enqueue_style( 'travelscape-fonts', $fonts, array(), TRAVELSCAPE_THEME_VERSION);
	
}
add_action( 'wp_enqueue_scripts', 'travelscape_fonts' );
add_action( 'enqueue_block_editor_assets', 'travelscape_fonts' );