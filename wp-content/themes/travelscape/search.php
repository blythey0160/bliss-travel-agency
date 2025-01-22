<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Travelscape
 */

get_header();
?>
<?php travelscape_content_before(); ?>
<div class="page-header" style="display:none;">
		<div class="container">
			<div class="row flex-column">	
				<h1>					
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'travelscape' ), '<span>' . get_search_query() . '</span>' );
					?></h1>				
			</div>
		</div>
</div>

<div class="container">
			<?php travelscape_content_top(); ?>
			<div class="row site-main">
				<main id="primary">
				
					

					<?php
					if ( have_posts() ) :
												
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
