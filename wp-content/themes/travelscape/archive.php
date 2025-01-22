<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Travelscape
 */

get_header();
?>
<?php travelscape_content_before(); ?>

		<div class="container">
			
			<?php travelscape_content_top(); ?>
			
			<div class="row site-main">
				<main id="primary">
				
					

					<?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php
						
						endif;
						
						travelscape_content_while_before();
						
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
						
							travelscape_entry_before();
					
							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );
							
							travelscape_entry_after();		
							
						
						endwhile;
						
						travelscape_content_while_after();												

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
					
				
				
				</main><!-- #main -->		
				
				<?php get_sidebar(); ?>	
				
			</div>
			
			<?php travelscape_content_bottom(); ?>
			
		</div>	

<?php travelscape_content_after(); ?>

<?php
get_footer();