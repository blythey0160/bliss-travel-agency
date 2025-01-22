<?php
/**
 * The file for Travelscape Theme Options Page functions
 *
 * @package    Travelscape
 * @since      1.0.7
 * @author     WP Travel Kit <support@wptravelkit.com>
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

		function travelscape_add_thickbox() {
			add_thickbox();
		}
		add_action('admin_menu', 'travelscape_add_thickbox');

		function travelscape_theme_options_header_bar_markup() {
			echo '<div class="travelscape-header-bar">';
				travelscape_theme_options_header_logo();				
				travelscape_theme_options_header_side();
			echo'</div>';            
		}

        function travelscape_theme_options_header_logo() {            
            echo '<div class="travelscape-logo">';
            	echo '<img src="' .esc_url(get_template_directory_uri()). '/inc/admin/theme-options/assets/wp-travel-kit-logo.png" />';                    
            echo'</div>';            
        }

		function travelscape_theme_options_header_menu() {
			echo '<ul class="travelscape-header-menu">';
				echo '<li class="menu-item active">';
					echo '<a href="">';
						echo 'Welcome';
					echo '</a>';
				echo '</li>';
			echo '</ul>';
		}

		function travelscape_theme_options_header_side() {
			echo '<div class="travelscape-side">';
				echo '<a href="'.esc_url('https://docs.wptravelkit.com/', 'travelscape').'" target="_blank">Knowledgebase</a>';
				echo '<p class="theme-version">'.TRAVELSCAPE_PARENT_THEME_VERSION.'</p>';
			echo'</div>';      
		}

        function travelscape_theme_options_upgrade_box() { ?>
		<div class="travelscape-options-welcome">
        <div class="travelscape-welcome-box upgrade-box">
            <h1 class="hndle"><span><?php echo esc_html('Upgrade to Travelscape Pro', 'travelscape') ?></span></h1>
            <div class="sidebox-body">
             <p><?php echo esc_html('Elevate your travel booking website with Travelscape Pro, the ultimate WordPress theme designed to transform your online presence.', 'travelscape') ?></p>
             <p><?php echo esc_html('Seamlessly integrating with the WP Travel Engine plugin, Travelscape Pro empowers you to create stunning, feature-rich travel websites without writing a single line of code.', 'travelscape') ?></p>				
             <a class="button button-primary upgrade-btn" target="_blank" href="https://wptravelkit.com/wordpress-travel-themes/travelscape-pro/?utm_source=travelscape&utm_medium=theme-options&utm_campaign=upgrade&utm_content=upgrade-button"><?php echo esc_html('Upgrade to Travelscape Pro →', 'travelscape') ?></a>
            </div>
        </div>
		</div>
        <?php
        }

        function travelscape_theme_options_header_desc() {            
            
            echo '<div class="travelscape-theme-desc">';
            echo '<p>' . esc_html('Travelscape WordPress Theme is now installed and ready to use. If you have further queries, you can always contact us. We hope you enjoy it!', 'travelscape') . '</p>';
            echo'</div>';

        }

        function travelscape_theme_options_pro_features () {
			$features = array(
				'blog_layout' => array (
					'title' => __('Site Header', 'travelscape'),
					'link' => 'https://wptravelkit.com/wordpress-travel-themes/travelscape-pro/',
					'description' => __('Choose from 7 different header designs.', 'travelscape'),
					'label' => __('Learn More', 'travelscape'),
				),
				'mobile_header' => array (
					'title' => __('Mobile Header', 'travelscape'),
					'link' => 'https://wptravelkit.com/wordpress-travel-themes/travelscape-pro/',
					'description' => __('Customize your site header for mobile and tablet browsers.', 'travelscape'),
					'label' => __('Learn More', 'travelscape'),
				), 
				'site_footer' => array (
					'title' => __('Site Footer', 'travelscape'),
					'link' => 'https://wptravelkit.com/wordpress-travel-themes/travelscape-pro/',
					'description' => __('Customize site footer for better design.', 'travelscape'),
					'label' => __('Learn More', 'travelscape'),
				), 							
				'off_canvas_header' => array (
					'title' => __('Unlimited Colors', 'travelscape'),
					'link' => 'https://wptravelkit.com/wordpress-travel-themes/travelscape-pro/',
					'description' => __('Personalize your website to align with your brand\'s identity', 'travelscape'),
					'label' => __('Learn More', 'travelscape'),
				),  
				'font_options' => array (
					'title' => __('1000+ Font Options', 'travelscape'),
					'link' => 'https://wptravelkit.com/wordpress-travel-themes/travelscape-pro/',
					'description' => __('Access to over 1000+ Google Fonts, allowing you to create a unique look for your website.', 'travelscape'),
					'label' => __('Learn More', 'travelscape'),
				),							
				'breadcrumbs' => array (
					'title' => __('Breadcrumbs', 'travelscape'),
					'link' => 'https://wptravelkit.com/wordpress-travel-themes/travelscape-pro/',
					'description' => __('Use Travelscape Pro’s schema ready breadcrumbs for that extra boost in search engine ranking.', 'travelscape'),
					'label' => __('Learn More', 'travelscape'),
				),    
				'notification' => array (
					'title' => __('Notification Bar', 'travelscape'),
					'link' => 'https://wptravelkit.com/wordpress-travel-themes/travelscape-pro/',
					'description' => __('Notification Bar to prominently display important messages or discounts on your website’s header.', 'travelscape'),
					'label' => __('Learn More', 'travelscape'),
				),    
				'scrolltop' => array (
					'title' => __('Scroll to Top', 'travelscape'),
					'link' => 'https://wptravelkit.com/wordpress-travel-themes/travelscape-pro/',
					'description' => __('Add a scroll to tip button which shows up when the user is at the footer of the site.', 'travelscape'),
					'label' => __('Learn More', 'travelscape'),
				),                                                                         
				'pagination' => array (
					'title' => __('Pagination', 'travelscape'),
					'link' => 'https://wptravelkit.com/wordpress-travel-themes/travelscape-pro/',
					'description' => __('Multiple pagination options to enhance user navigation and experience.', 'travelscape'),
					'label' => __('Learn More', 'travelscape'),
				),    
			);  

			$travelscape_pro_features_arr = apply_filters( 'travelscape_pro_features', $features );		

			?>

			<div class="travelscape-pro-features">                                    
				<?php foreach ( $travelscape_pro_features_arr as $travelscape_pro_feature) : ?>
						<div class="travelscape-pro-feature-single">
							<div class="pro-feature"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path fill="none" d="M0 0h24v24H0z"></path><path d="M19 10H20C20.5523 10 21 10.4477 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 10.4477 3.44772 10 4 10H5V9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9V10ZM5 12V20H19V12H5ZM11 14H13V18H11V14ZM17 10V9C17 6.23858 14.7614 4 12 4C9.23858 4 7 6.23858 7 9V10H17Z"></path></svg></div>
							<div class="text-holder">                             
								<p class="title"><?php echo esc_html($travelscape_pro_feature['title']); ?></p>
								<p class="description"><?php echo esc_html($travelscape_pro_feature['description']); ?></p>
							</div>
							<a href="<?php echo esc_url($travelscape_pro_feature['link']); ?>"><?php echo esc_html($travelscape_pro_feature['label']) ?></a>
						</div>
				<?php endforeach; ?>                    
			</div>    
        <?php    
        }

        function travelscape_theme_options_pro_upgrade_text() {
            ?>
                <div class="travelscape-pro-features-header">
                    <h3><?php echo esc_html('Do more with Travelscape Pro.', 'travelscape') ?></h3>
                    <p class="description travelscape-desc"><?php echo esc_html('Upgrade to Travelscape Pro for more exciting features', 'travelscape') ?></p>
                </div>
            <?php        
        }

        function travelscape_theme_options_instant_site_sidebar_box() { 
			
			$ts_starter_templates = apply_filters( 'travelscape_starter_templates_options', true );			
			if($ts_starter_templates) { 							
			?>
			<div class="travelscapebox travelscape-option-sidebox">
				<h4 class="hndle"><span><?php echo esc_html('Travelscape Starter Templates', 'travelscape') ?></span></h4>
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/theme-options/assets/travelscape-sites.jpg" />   
				<div class="sidebox-body">
				 <p><?php echo esc_html('Choose from a collection of professionally designed, pre-built website layouts that allow creating a fully functional and visually appealing website in no time.', 'travelscape') ?></p>
				
				<?php
				if ( function_exists('DEMO_IMPORTER_PLUS_setup') ) {
				echo '<a class="button button-primary" href="'.esc_url( admin_url( 'themes.php?page=demo-importer-plus' )).'">'.esc_html('Import Starter Templates', 'travelscape').'</a>';
				} 
				else {					
				$plugin_name = 'demo-importer-plus';
				$install_link = '<a href="' . esc_url( network_admin_url('plugin-install.php?tab=plugin-information&plugin=' . $plugin_name . '&TB_iframe=true&width=600&height=550' ) ) . '" class="thickbox button button-primary" title="More info about ' . $plugin_name . '">Install Demo Import Plus</a>';		
				echo $install_link;									
				}
				?>						
					
				</div>
			</div>    
			<?php
			}
        }

        function travelscape_theme_options_review_us_sidebar_box() { ?>
         <div class="travelscapebox travelscape-option-sidebox">
            <h4 class="hndle"><span><?php echo esc_html('Review Us', 'travelscape') ?></span></h4>                     
            <div class="sidebox-body">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 17l-5.878 3.59 1.598-6.7-5.23-4.48 6.865-.55L12 2.5l2.645 6.36 6.866.55-5.231 4.48 1.598 6.7z" fill="rgba(241,196,14,1)"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 17l-5.878 3.59 1.598-6.7-5.23-4.48 6.865-.55L12 2.5l2.645 6.36 6.866.55-5.231 4.48 1.598 6.7z" fill="rgba(241,196,14,1)"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 17l-5.878 3.59 1.598-6.7-5.23-4.48 6.865-.55L12 2.5l2.645 6.36 6.866.55-5.231 4.48 1.598 6.7z" fill="rgba(241,196,14,1)"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 17l-5.878 3.59 1.598-6.7-5.23-4.48 6.865-.55L12 2.5l2.645 6.36 6.866.55-5.231 4.48 1.598 6.7z" fill="rgba(241,196,14,1)"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 17l-5.878 3.59 1.598-6.7-5.23-4.48 6.865-.55L12 2.5l2.645 6.36 6.866.55-5.231 4.48 1.598 6.7z" fill="rgba(241,196,14,1)"/></svg>                        
             <p><?php echo esc_html('Love using Travelscape WP Theme? Help us by leaving a review', 'travelscape') ?></p>
             <a class="button button-primary" href="https://wordpress.org/support/theme/travelscape/reviews/#new-post"><?php echo esc_html('Write Your Review →', 'travelscape') ?></a>
            </div>
        </div>     
        <?php
        }

        function travelscape_theme_options_documentation_sidebar_box() { ?>
        <div class="travelscapebox travelscape-option-sidebox">
            <h4 class="hndle"><span><?php echo esc_html('Join the Community', 'travelscape') ?></span></h4>
            <div class="sidebox-body">
             <p><?php echo esc_html('Have a question about the plugin, want to showcase your amazing project, or just want to say hello? Join our facebook community!', 'travelscape') ?></p>
             <a class="button button-primary" target="_blank" href="https://www.facebook.com/groups/wptravelkit/"><?php echo esc_html('Join Now →', 'travelscape') ?></a>
            </div>
        </div>    
        <?php
        }

        function travelscape_theme_options_support_sidebar_box() { ?>
        <div class="travelscapebox travelscape-option-sidebox">
            <h4 class="hndle"><span><?php echo esc_html('Support Ticket', 'travelscape') ?></span></h4>
            <div class="sidebox-body">
             <p><?php echo esc_html('Got a question or need some help with the theme? You can always submit a support ticket, and our team will help you out.', 'travelscape') ?></p>
             <a class="button button-primary" target="_blank" href="https://wptravelkit.com/support-ticket/"><?php echo esc_html('Contact Support →', 'travelscape') ?></a>
            </div>
        </div>   
        <?php
        }