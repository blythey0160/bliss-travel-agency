<?php
/**
 * Travelscape Header class
 *
 * @package Travelscape
 *
 * @since 1.0.0
 *
 */

if ( !class_exists( 'Travelscape_Header' ) ) :
	Class Travelscape_Header {
						
		
		public $email;
		
		public $phone_number;
		
		public $phone_label;
		
		public $social_ed;

		/**
		 * Constructor
		 */
		public function __construct() {	
			
			$this->email = get_theme_mod('travelscape_header_email', '');
			$this->phone_number = get_theme_mod('travelscape_header_phone_number', '');
			$this->phone_label = get_theme_mod('travelscape_header_phone_label', '');
			$this->social_ed = get_theme_mod('travelscape_header_social_ed');								
			
		}		
	

		/**
		 * Header markup
		 */
		public function travelscape_header_render() {				
		?>
			<?php travelscape_header_before(); ?>
			<header id="masthead" class="site-header travelscape-header">	
						<?php travelscape_header_top(); ?>										
						<?php $this->travelscape_header_topbar(); ?>	
						<?php $this->travelscape_header_ed(); ?>																								
						<?php travelscape_header_bottom(); ?>
			</header><!-- #masthead -->
			<?php travelscape_header_after(); ?>
		<?php			
		}		
		
		public function travelscape_header_ed() {
			
			echo '<div class="travelscape-header-bottom">';								
					$this->travelscape_header_menu_desktop();
					$this->travelscape_header_menu_mobile();														
			echo '</div>';
			
		}				
		
		public function travelscape_header_topbar() {	
			
			$header_top_bar = apply_filters( 'travelscape_header_topbar', true );
			
			if($header_top_bar) { 
				if($this->email || $this->phone_number || $this->social_ed) {
					echo '<div class="travelscape-header-top">';
						echo '<div class="container">';
								echo '<div class="row">';
									echo '<div class="travelscape-header-top-left">';
										$this->travelscape_header_phone();
										$this->travelscape_header_email();												
									echo '</div>';			
									echo '<div class="travelscape-header-top-right">';																			
										$this->travelscape_header_social_icons();
									echo '</div>';			
								echo '</div>';			
						echo '</div>';			
					echo '</div>';
				}			
			}
		}		
		
		public function travelscape_header_menu_desktop() {	
			
			$header_desktop = apply_filters( 'travelscape_header_desktop', true );
			
			if($header_desktop) {			
				echo '<div class="container">';					
					echo '<div class="row header-desktop">';
						$this->travelscape_header_logo();
						$this->travelscape_header_menu();					
					echo '</div>';
				echo '</div>';
			}
		}				
		
		public function travelscape_header_menu_mobile() {
			
			$header_mobile = apply_filters( 'travelscape_header_mobile', true );
			
			if($header_mobile) {
				echo '<div class="container">';		
					echo '<div class="header-mobile">';		
						echo '<div class="row top-wrap">';
							$this->travelscape_header_logo();
							$this->travelscape_header_menu_toggle();
						echo '</div>';	
						echo '<div class="row">';
							$this->travelscape_header_menu();			
						echo '</div>';				
					echo '</div>';			
				echo '</div>';											
			}
		}
		
		//header elements		
		public function travelscape_header_logo() {
		?>
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$travelscape_description = get_bloginfo( 'description', 'display' );
			if ( $travelscape_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $travelscape_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<?php			
		}
		
		public function travelscape_header_menu() {
			
		$header_menu = apply_filters( 'travelscape_header_menu', true );	
			
			if($header_menu){
			?>
				<div class="travelscape-menu-wrap">										
					<nav id="site-navigation" class="main-navigation">									
						<div class="main-menu">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
						?>
						</div>
					</nav><!-- #site-navigation -->						
				</div>				
			<?php			
			}
			
		}
		
		public function travelscape_header_menu_toggle() {
			echo '<a href="#" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32" height="32"><path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path></svg></a>';
		}
		
		public function travelscape_header_email() {						
			if($this->email) {
				echo '<a href="mailto:'.esc_attr($this->email).'"><span class="travelscape-header-email">'.esc_html($this->email).'</span></a>';
			}
		}		
		
		public function travelscape_header_phone() {
			if($this->phone_label && $this->phone_number) {
				echo '<a href="tel:'.esc_html($this->phone_number).'"><span class="travelscape-header-email">'.esc_html($this->phone_label).'</span></a>';
			}
		}
		
		public function travelscape_header_social_icons() {		
			if($this->social_ed) {				
				$social_icons = new TravelScape_Social_Lists;		
				$social_icons->travelscape_social_links();							
			}
		}		
		
		
	}

endif;

function travelscape_header_primary_markup() {
	
    $travelscape_header_ed = new Travelscape_Header();    		
	$travelscape_header_ed->travelscape_header_render();	
	
}

add_action('travelscape_header', 'travelscape_header_primary_markup', 10);