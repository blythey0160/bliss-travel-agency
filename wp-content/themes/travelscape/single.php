<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					
						get_template_part( 'template-parts/content', 'single' );
					
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
