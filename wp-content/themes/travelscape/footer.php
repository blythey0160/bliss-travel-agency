<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travelscape
 */

?>

	<?php 
	/*
	* @hooked travelscape_footer_primary_markup - 10
	*/
	do_action('travelscape_footer'); 
	?>
</div><!-- #page -->
<?php travelscape_body_bottom(); ?>
<?php wp_footer(); ?>
</body>
</html>
