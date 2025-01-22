<?php
/**
 * Template part for displaying results in search pages
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
		 * @hooked travelscape_entry_thumbnail - 15
		 * @hooked travelscape_entry_header   	- 20 
		*/
		do_action( 'travelscape_before_page_entry_content' );

		/**
		* @hoked travelscape_entry_top - 5
		* @hooked travelscape_entry_content - 15	
		* @hoked travelscape_entry_bottom - 25
		*/
		do_action( 'travelscape_page_entry_content' );
	
		/**
		* @hooked travelscape_post_tags -5 
		* @hooked travelscape_single_post_navigation - 10
		* @hooked travelscape_single_post_comments  - 15
		*/
		do_action( 'travelscape_after_page_entry_content' );	
	?>
	<?php travelscape_entry_content_after(); ?>
</article><!-- #post-## -->
<?php travelscape_entry_after(); ?>
