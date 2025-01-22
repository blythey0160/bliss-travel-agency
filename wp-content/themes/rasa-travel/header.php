<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rasa Travel
 */
/**
* Hook - rasa_travel_action_doctype.
*
* @hooked rasa_travel_doctype -  10
*/
do_action( 'rasa_travel_action_doctype' );
?>
<head>
<?php
/**
* Hook - rasa_travel_action_head.
*
* @hooked rasa_travel_head -  10
*/
do_action( 'rasa_travel_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<?php

/**
* Hook - rasa_travel_action_before.
*
* @hooked rasa_travel_page_start - 10
*/
do_action( 'rasa_travel_action_before' );

/**
*
* @hooked rasa_travel_header_start - 10
*/
do_action( 'rasa_travel_action_before_header' );

/**
*
*@hooked rasa_travel_site_branding - 10
*@hooked rasa_travel_header_end - 15 
*/
do_action('rasa_travel_action_header');

/**
*
* @hooked rasa_travel_content_start - 10
*/
do_action( 'rasa_travel_action_before_content' );

/**
 * Banner start
 * 
 * @hooked rasa_travel_banner_header - 10
*/
do_action( 'rasa_travel_banner_header' );  
