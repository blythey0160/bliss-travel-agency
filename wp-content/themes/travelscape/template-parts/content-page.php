<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travelscape
 */

?>
<?php travelscape_entry_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php travelscape_entry_content_before(); ?>
	<?php
		/**
		* @hoked travelscape_entry_top - 5
		* @hooked travelscape_entry_content - 15		
		* @hoked travelscape_entry_bottom - 25
		*/
		do_action( 'travelscape_page_entry_content' );		
	?>
	<?php travelscape_entry_content_after(); ?>
</article><!-- #post-## -->
<?php travelscape_entry_after(); ?>


