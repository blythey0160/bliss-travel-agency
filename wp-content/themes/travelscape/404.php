<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Travelscape
 */

get_header();
?>

		<div class="container">
			<div class="row site-main">
				<main id="primary">

					<section class="error-404 not-found">						
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'travelscape' ); ?></h1>						
						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'travelscape' ); ?></p>

							<?php get_search_form(); ?>

						</div><!-- .page-content -->
					</section><!-- .error-404 -->

				</main><!-- #main -->				
			</div>
		</div>		

<?php
get_footer();
