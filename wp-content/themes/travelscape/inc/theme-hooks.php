<?php
/**
 * Theme Hook list.
 *
 * @package  Travelscape
 * @version  1.0.0
 * https://github.com/zamoose/themehookalliance
 *
 */

/**
 * Define the version of TRAVELSCAPE support, in case that becomes useful down the road.
 */
define( 'TRAVELSCAPE_HOOKS_VERSION', '1.0.0' );

/**
 * Themes and Plugins can check for travelscape_hooks using current_theme_supports( 'travelscape_hooks', $hook )
 * to determine whether a theme declares itself to support this specific hook type.
 *
 * Example:
 * <code>
 * 		// Declare support for all hook types
 * 		add_theme_support( 'travelscape_hooks', array( 'all' ) );
 *
 * 		// Declare support for certain hook types only
 * 		add_theme_support( 'travelscape_hooks', array( 'header', 'content', 'footer' ) );
 * </code>
 */
add_theme_support( 'travelscape_hooks', array(

	/**
	 * As a Theme developer, use the 'all' parameter, to declare support for all
	 * hook types.
	 * Please make sure you then actually reference all the hooks in this file,
	 * Plugin developers depend on it!
	 */
	'all',

	/**
	 * Themes can also choose to only support certain hook types.
	 * Please make sure you then actually reference all the hooks in this type
	 * family.
	 *
	 * When the 'all' parameter was set, specific hook types do not need to be
	 * added explicitly.
	 */
	'html',
	'body',
	'head',
	'header',
	'content',
	'entry',
	'comments',
	'sidebars',
	'sidebar',
	'footer',

	/**
	 * If/when WordPress Core implements similar methodology, Themes and Plugins
	 * will be able to check whether the version of TRAVELSCAPE supplied by the theme
	 * supports Core hooks.
	 */
	//'core',
) );

/**
 * Determines, whether the specific hook type is actually supported.
 *
 * Plugin developers should always check for the support of a <strong>specific</strong>
 * hook type before hooking a callback function to a hook of this type.
 *
 * Example:
 * <code>
 * 		if ( current_theme_supports( 'travelscape_hooks', 'header' ) )
 * 	  		add_action( 'travelscape_head_top', 'prefix_header_top' );
 * </code>
 *
 * @param bool $bool true
 * @param array $args The hook type being checked
 * @param array $registered All registered hook types
 *
 * @return bool
 */
function travelscape_current_theme_supports( $bool, $args, $registered ) {
	return in_array( $args[0], $registered[0] ) || in_array( 'all', $registered[0] );
}
add_filter( 'current_theme_supports-travelscape_hooks', 'travelscape_current_theme_supports', 10, 3 );

/**
 * HTML <html> hook
 * Special case, useful for <DOCTYPE>, etc.
 * $travelscape_supports[] = 'html;
 */
function travelscape_html_before() {
	do_action( 'travelscape_html_before' );
}
/**
 * HTML <body> hooks
 * $travelscape_supports[] = 'body';
 */
function travelscape_body_top() {
	do_action( 'travelscape_body_top' );
}

function travelscape_body_bottom() {
	do_action( 'travelscape_body_bottom' );
}

/**
 * HTML <head> hooks
 *
 * $travelscape_supports[] = 'head';
 */
function travelscape_head_top() {
	do_action( 'travelscape_head_top' );
}

function travelscape_head_bottom() {
	do_action( 'travelscape_head_bottom' );
}

/**
 * Semantic <header> hooks
 *
 * $travelscape_supports[] = 'header';
 */
function travelscape_header_before() {
	do_action( 'travelscape_header_before' );
}

function travelscape_header_after() {
	do_action( 'travelscape_header_after' );
}

function travelscape_header_top() {
	do_action( 'travelscape_header_top' );
}

function travelscape_header_bottom() {
	do_action( 'travelscape_header_bottom' );
}

/**
 * Semantic <content> hooks
 *
 * $travelscape_supports[] = 'content';
 */
function travelscape_content_before() {
	do_action( 'travelscape_content_before' );
}

function travelscape_content_after() {
	do_action( 'travelscape_content_after' );
}

function travelscape_content_top() {
	do_action( 'travelscape_content_top' );
}

function travelscape_content_bottom() {
	do_action( 'travelscape_content_bottom' );
}

function travelscape_content_while_before() {
	do_action( 'travelscape_content_while_before' );
}

function travelscape_content_while_after() {
	do_action( 'travelscape_content_while_after' );
}

/**
 * Semantic <entry> hooks
 *
 * $travelscape_supports[] = 'entry';
 */
function travelscape_entry_before() {
	do_action( 'travelscape_entry_before' );
}

function travelscape_entry_after() {
	do_action( 'travelscape_entry_after' );
}

function travelscape_entry_content_before() {
	do_action( 'travelscape_entry_content_before' );
}

function travelscape_entry_content_after() {
	do_action( 'travelscape_entry_content_after' );
}

function travelscape_entry_top() {
	do_action( 'travelscape_entry_top' );
}

function travelscape_entry_bottom() {
	do_action( 'travelscape_entry_bottom' );
}

/**
 * Comments block hooks
 *
 * $travelscape_supports[] = 'comments';
 */
function travelscape_comments_before() {
	do_action( 'travelscape_comments_before' );
}

function travelscape_comments_after() {
	do_action( 'travelscape_comments_after' );
}

/**
 * Semantic <sidebar> hooks
 *
 * $travelscape_supports[] = 'sidebar';
 */
function travelscape_sidebar() {
	do_action( 'travelscape_sidebar' );
}
function travelscape_sidebars_before() {
	do_action( 'travelscape_sidebars_before' );
}

function travelscape_sidebars_after() {
	do_action( 'travelscape_sidebars_after' );
}

function travelscape_sidebar_top() {
	do_action( 'travelscape_sidebar_top' );
}

function travelscape_sidebar_bottom() {
	do_action( 'travelscape_sidebar_bottom' );
}

/**
 * Semantic <footer> hooks
 *
 * $travelscape_supports[] = 'footer';
 */
function travelscape_footer_before() {
	do_action( 'travelscape_footer_before' );
}

function travelscape_footer_after() {
	do_action( 'travelscape_footer_after' );
}

function travelscape_footer_top() {
	do_action( 'travelscape_footer_top' );
}

function travelscape_footer_bottom() {
	do_action( 'travelscape_footer_bottom' );
}
