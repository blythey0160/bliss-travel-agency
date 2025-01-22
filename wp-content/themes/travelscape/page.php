<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travelscape
 */

get_header();
?>
		<?php travelscape_content_before(); ?>
		<div class="container post-wrap">
			<?php travelscape_content_top(); ?>
			<div class="row site-main">
				<main id="primary">									
					
					<?php					
					travelscape_content_while_before();
					
					while ( have_posts() ) : the_post();																																				
						travelscape_entry_before();
					
						get_template_part( 'template-parts/content', 'page' );
					
						travelscape_entry_after();		
						
					endwhile; // End of the loop.	
					
					travelscape_content_while_after();
					?>
									
				</main><!-- #main -->					
				<?php get_sidebar(); ?>
			</div>
			<?php travelscape_content_bottom(); ?>
		</div>	
		<?php travelscape_content_after(); ?>

<?php
get_footer();
