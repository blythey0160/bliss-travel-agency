<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travelscape
 */

?>
<!doctype html>
<?php travelscape_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
	<?php travelscape_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php travelscape_head_bottom(); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php travelscape_body_top(); ?>
<?php wp_body_open(); ?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'travelscape' ); ?></a>

	<?php 
	/*
	* @hooked travelscape_header_primary_markup - 10
	*/
	do_action('travelscape_header');		
	?>