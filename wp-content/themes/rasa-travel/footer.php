<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Rasa Travel
 */

/**
 *
 * @hooked rasa_travel_footer_start
 */
do_action( 'rasa_travel_action_before_footer' );

/**
 * Hooked - rasa_travel_footer_top_section -10
 * Hooked - rasa_travel_footer_section -20
 */
do_action( 'rasa_travel_action_footer' );

/**
 * Hooked - rasa_travel_footer_end. 
 */
do_action( 'rasa_travel_action_after_footer' );

wp_footer(); ?>

</body>  
</html>