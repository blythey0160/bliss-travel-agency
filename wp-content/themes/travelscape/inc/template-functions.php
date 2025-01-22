<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Travelscape
 */

//entry post tags
if ( ! function_exists( 'travelscape_page_header' ) ) :
	function travelscape_page_header() {
		
		$custom_header = get_header_image();
		
		global $post;
		
		if ( is_singular('page') ) {					
			
			$title_ed = get_post_meta( $post->ID, 'travelscape_settings_disable_title', true );	
			
			if(!$title_ed) {
				$image_id    = get_post_thumbnail_id( $post->ID );															
				if ( $image_id ) {			
					$image_url = wp_get_attachment_url($image_id);			
				} else {
					$image_url = $custom_header;
				}																

				echo '<div class="page-header" style="background-image: url('. esc_url($image_url) .');">';			
					echo '<div class="container"><div class="row">';
						the_title( '<h1 class="entry-title">', '</h1>' );		
					echo '</div></div>';
				echo '</div>';
			}
			
		} 		
		elseif ( is_home() && !is_front_page() ) {
			
			$pageID = get_option('page_for_posts');			
			$title_ed = get_post_meta( $pageID, 'travelscape_settings_disable_title', true );	
			
			if(!$title_ed) {
			
				$image_id    = get_post_thumbnail_id( $pageID );															
				if ( $image_id ) {			
					$image_url = wp_get_attachment_url($image_id);			
				} else {
					$image_url = $custom_header;
				}																										

				echo '<div class="page-header" style="background-image: url('.esc_url($image_url).');">';			
					echo '<div class="container"><div class="row">';
						echo '<h1 class="page-title">';
							echo esc_html(get_the_title( $pageID ));		
						echo '</h1>';
					echo '</div></div>';
				echo '</div>';
				
			}
			
		} 
		elseif ( is_search() ) {		
						
				$image_url = $custom_header;																									

				echo '<div class="page-header" style="background-image: url('.esc_url($image_url).');">';			
					echo '<div class="container"><div class="row">';
						echo '<h1 class="page-title">';

							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'travelscape' ), '<span>' . get_search_query() . '</span>' );

						echo '</h1>';
					echo '</div></div>';
				echo '</div>';
			
		}
		
		elseif ( is_archive() ) {		
						
				$image_url = $custom_header;																									

				echo '<div class="page-header" style="background-image: url('.esc_url($image_url).');">';			
					echo '<div class="container"><div class="row">';
						echo '<h1 class="page-title">';

								the_archive_title();
								the_archive_description( '<div class="archive-description">', '</div>' );

						echo '</h1>';
					echo '</div></div>';
				echo '</div>';
			
		}		
		
	}
endif;
add_action ('travelscape_content_before', 'travelscape_page_header', 5);

//entry meta
if ( ! function_exists( 'travelscape_entry_meta' ) ) :
	function travelscape_entry_meta() {
		
			$categories = get_the_category();							
		
			if ( ! empty( $categories ) ) {
				echo '<div class="travelscape-post-category">';				
				foreach($categories as $cat) {
					echo '<a href=' .esc_url(get_category_link($cat->term_id)). '>';
						echo esc_html($cat->name);
					echo '</a>';
				}				
				echo '</div>';						
			}
		
			echo '<div class="post-meta">';						
		
				'<span>'.the_time( 'j F, Y' ).'</span>';
				echo '<span>&bull;</span>';			
				echo '<span>' . esc_html('By: ', 'travelscape') . esc_html(get_the_author()). '</span>';
					
			echo '</div>';
				
	}
endif;
add_action ('travelscape_before_page_entry_content', 'travelscape_entry_meta', 5);

//entry header
if( !function_exists('travelscape_entry_header') ) {
    function travelscape_entry_header() {
	?>	
	<header class="post-header">		
		<?php 
		if ( is_home() || is_archive() || is_search() ) {
			the_title(sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_attr( esc_url( get_permalink() ) ) ),'</a></h3>');
		} else {
			the_title(sprintf( '<h1 class="entry-title">' ), '</h1>');
		}
		?>
		<?php if ( has_excerpt() && is_singular() ) { ?>
			<div class="post-excerpt"><?php the_excerpt(); ?></div>			
		<?php } ?>	
	</header><!-- .entry-header -->
	<?php
    }
}
add_action ('travelscape_before_page_entry_content', 'travelscape_entry_header', 10);


//entry thumnbail / featured image
if( !function_exists('travelscape_entry_thumbnail') ) {
    function travelscape_entry_thumbnail() {
	?>	
	<?php //if (is_single() || is_home()) { ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumbnail -->
	<?php //} ?>	
	<?php
    }
}
add_action ('travelscape_before_page_entry_content', 'travelscape_entry_thumbnail', 15);

//entry content
if( !function_exists('travelscape_entry_content') ) {
    function travelscape_entry_content() {			
		if ( is_singular() ) { 
			echo '<div class="entry-content">';
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'travelscape' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'travelscape' ),
					'after'  => '</div>',
				)
			);
			echo '</div>';			
		} 
		  else {
			echo '<div class="entry-excerpt">';
				the_excerpt();
			echo '</div>';			
		}			
    }
}
add_action ('travelscape_page_entry_content', 'travelscape_entry_content', 15);

//entry post tags
if ( ! function_exists( 'travelscape_post_tags' ) ) :
	function travelscape_post_tags() {
		
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( '', 'list item separator', 'travelscape' ) ); // phpcs:ignore WordPress.WP.I18n.NoEmptyStrings
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<div class="post-tags">' . esc_html__( '%1$s', 'travelscape' ) . '</div>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			
		}		
		
	}
endif;
add_action ('travelscape_after_page_entry_content', 'travelscape_post_tags', 5);

//post comments
if ( ! function_exists( 'travelscape_single_post_comments' ) ) :
	function travelscape_single_post_comments() {
		
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;	
				
	}
endif;
add_action ('travelscape_after_page_entry_content', 'travelscape_single_post_comments', 15);

//theme hooks for content
add_action('travelscape_page_entry_content', 'travelscape_entry_top', 10);
add_action('travelscape_page_entry_content', 'travelscape_entry_bottom', 25);

//sidebar
if ( ! function_exists( 'travelscape_sidebar_ed' ) ) :
	function travelscape_sidebar_ed() {
		
		global $post;
		
		$travelscape_sidebar = apply_filters( 'travelscape_sidebar_layout', true );

		if($travelscape_sidebar) {		
		
				if ( ! is_active_sidebar( 'sidebar-main' ) ) {
					return;
				}

				if(is_singular()) {		
					$travelscape_settings_disable_sidebar_ed = get_post_meta( $post->ID, 'travelscape_settings_disable_sidebar', true );
					if($travelscape_settings_disable_sidebar_ed) {
						return;
					} 	
				} 
				elseif ( is_home() && !is_front_page() ) {
					$pageID = get_option('page_for_posts');			
					$travelscape_settings_disable_sidebar_ed = get_post_meta( $pageID, 'travelscape_settings_disable_sidebar', true );
					if($travelscape_settings_disable_sidebar_ed) {
						return;
					} 	
				}
				travelscape_sidebars_before();
					echo '<aside id="secondary" class="widget-area">';
						travelscape_sidebar_top();
						dynamic_sidebar( 'sidebar-main' );
						travelscape_sidebar_bottom();
					echo '</aside>';
				travelscape_sidebars_after();
				
		}
		
	}
endif;
add_action('travelscape_sidebar', 'travelscape_sidebar_ed');