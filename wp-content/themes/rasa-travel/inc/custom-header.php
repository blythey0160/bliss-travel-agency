<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Rasa Travel
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses rasa_travel_header_style()
 */
function rasa_travel_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'rasa_travel_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '1CA8CB',
		'width'                  => 1920,
		'height'                 => 1080,
		'flex-height'            => true,
		'wp-head-callback'       => 'rasa_travel_header_style',
	) ) );

	// Register default headers.
	register_default_headers( array(
		'default-banner' => array(
			'url'           => '%s/assets/images/default-header.jpg',
			'thumbnail_url' => '%s/assets/images/default-header.jpg',
			'description'   => esc_html_x( 'Default Banner', 'header image description', 'rasa-travel' ),
		),

	) );
}
add_action( 'after_setup_theme', 'rasa_travel_custom_header_setup' );

function rasa_travel_header_style() {
	$rasa_travel_header_text_color = get_header_textcolor();

	/*
	 * If no custom options for text are set, let's bail.
	 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
	 */
	if ( get_theme_support( 'custom-header', 'default-text-color' ) === $rasa_travel_header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	// Has the text been hidden?
	if ( ! display_header_text() ) :
		$rasa_travel_custom_css = ".site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}";
	// If the user has set a custom color for the text use that.
	else :
		$rasa_travel_custom_css = ".site-title a {
			color: #" . esc_attr( $rasa_travel_header_text_color ) . "}";
	endif;
	wp_add_inline_style( 'rasa-travel-style', $rasa_travel_custom_css );
}
add_action( 'wp_enqueue_scripts', 'rasa_travel_header_style' );