<?php
/**
 * Travelscape Footer class
 *
 * @package Travelscape
 *
 * @since 1.0.0
 *
 */

if ( !class_exists( 'Travelscape_Footer' ) ) :
	Class Travelscape_Footer {
						
		public $copyright;
		
		public $payment_logo;

		/**
		 * Constructor
		 */
		public function __construct() {		
			
			$this->copyright = get_theme_mod('travelscape_footer_copyright', '');			
			$this->payment_logo = get_theme_mod('travelscape_footer_payment_logo', '');
			
		}		

		/**
		 * Footer markup
		 */
		public function travelscape_footer_render() {	
			
		$footer_render = apply_filters( 'travelscape_footer_render', true );			
			if($footer_render) {
			?>
				<?php travelscape_footer_before(); ?>
				<footer id="colophon" class="site-footer">
						<?php travelscape_footer_top(); ?>
						<?php 
						$this->travelscape_footer_top_markup(); 
						$this->travelscape_footer_bottom_markup(); 
						?>
						<?php travelscape_footer_bottom(); ?>
				</footer><!-- #colophon -->
				<?php travelscape_footer_after(); ?>
			<?php			
			}	
		}
		
		public function travelscape_footer_top_markup() {
			
			$footer_top = apply_filters( 'travelscape_footer_top_markup', true );
			
			if($footer_top) {
				echo '<div class="travelscape-footer-top">';
					echo '<div class="container">';
						echo '<div class="grid">';				
							$this->travelscape_footer_widgets();
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}
			
		}
		
		public function travelscape_footer_bottom_markup() {
			
			$footer_bottom = apply_filters( 'travelscape_footer_bottom_markup', true );
			
			if($footer_bottom) {
				echo '<div class="travelscape-footer-bottom">';			
					echo '<div class="container">';
						echo '<div class="row">';
							echo $this->travelscape_footer_siteinfo();	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped	
							echo $this->travelscape_footer_payment_logo();	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped	
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}
			
		}
		
		public function travelscape_footer_widgets() {
			
				$footer_widgets = apply_filters( 'travelscape_footer_widgets', true );
			
				if($footer_widgets) {
			
					if ( is_active_sidebar( 'footer-one' ) ) {				
						echo '<div class="travelscape-foot-main-col travelscape-footer-one">';
							dynamic_sidebar( 'footer-one' );
						echo '</div>';
					}

					if ( is_active_sidebar( 'footer-two' ) ) {
						echo '<div class="travelscape-foot-main-col travelscape-footer-two">';
							dynamic_sidebar( 'footer-two' );
						echo '</div>';
					}

					if ( is_active_sidebar( 'footer-three' ) ) {
						echo '<div class="travelscape-foot-main-col travelscape-footer-three">';
							dynamic_sidebar( 'footer-three' );
						echo '</div>';
					}

					if ( is_active_sidebar( 'footer-four' ) ) {
						echo '<div class="travelscape-foot-main-col travelscape-footer-four">';
							dynamic_sidebar( 'footer-four' );
						echo '</div>';
					}			
					
				}
			
			
		}
		
		public function travelscape_footer_siteinfo() {		
			
				$footer_siteinfo = apply_filters( 'travelscape_footer_siteinfo', true );
			
				if($footer_siteinfo) {
			
					$allowed_html = array(
						//formatting
						'strong' => array(),
						'em'     => array(),
						'b'      => array(),
						'i'      => array(),
						//links
						'a'     => array(
							'href' => array()
						)
					);			


					if($this->copyright) {
						$html  = '<div class="site-info">';
						$html .= '<p class="copyright">';
						$html .= wp_kses($this->copyright, $allowed_html);	
						$html .= '</p>';
						$html .= '</div>';										
					}
					else {
						$html  = '<div class="site-info">';
						$html .= '<p class="copyright">';
						$html .=  __( 'Copyright &copy; ', 'travelscape' ) . date_i18n( 'Y' );
						$html .= ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';								
						$html .= '<a href="'.TRAVELSCAPE_THEME_URL.'" rel="nofollow">';				
						$html .=  TRAVELSCAPE_THEME_NAME;			
						$html .= '</a>';				
						$html .=  __( ' By WP Travel Kit ', 'travelscape' );		
						$html .= '</p>';
						$html .= '</div>';
					}
					return $html;
					
				}

		}
		
		public function travelscape_footer_payment_logo() {
			
			$footer_plogo = apply_filters( 'travelscape_payment_logo', true );

			if($footer_plogo) {			
			
				if($this->payment_logo) {
					echo '<div class="travelscape-payment-logo">';
					echo '<img class="payment-logo" src="'.esc_attr(wp_get_attachment_url( $this->payment_logo )).'" />';
					echo '</div>';
				}
				
			}
			
		}
		
	}

endif;

function travelscape_footer_primary_markup() {
	
    $travelscape_footer_ed = new Travelscape_Footer();    		
	$travelscape_footer_ed->travelscape_footer_render();	
	
}

add_action('travelscape_footer', 'travelscape_footer_primary_markup', 10);