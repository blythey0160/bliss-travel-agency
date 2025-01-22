<?php
/**
 * The file for Travelscape Theme Options Page
 *
 * @package    Travelscape
 * @since      1.0.7
 * @author     WP Travel Kit <support@wptravelkit.com>
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Travelscape_Theme_Options' ) ) {

    class Travelscape_Theme_Options {


                /**
                 * Member Variable
                 *
                 * @var instance
                 */
                private static $instance;

                /**
                 *  Initiator
                 */
                public static function get_instance() {
                    if ( ! isset( self::$instance ) ) {
                        self::$instance = new self();
                    }
                    return self::$instance;
                }

                /**
                * Constructor
                */
                public function __construct() {

                    get_template_part('inc/admin/theme-options/functions-travelscape-theme', 'options');

                    add_filter( 'init', array( $this, 'travelscape_theme_options_run' ) );		
								

                }

                function travelscape_theme_options_run () {

					add_filter( 'admin_menu', array( $this, 'travelscape_theme_options_ed' ), 10 );
					add_action( 'admin_enqueue_scripts', array( $this, 'travelscape_admin_scripts' ), 10 );

					add_action( 'travelscape_theme_options_header_bar', 'travelscape_theme_options_header_bar_markup', 5 );										
					
					add_action( 'travelscape_theme_options_left_side', 'travelscape_theme_options_upgrade_box', 5 );
					add_action( 'travelscape_theme_options_left_side', 'travelscape_theme_options_pro_upgrade_text', 12 );
					add_action( 'travelscape_theme_options_left_side', 'travelscape_theme_options_pro_features', 15 );                    


					add_action( 'travelscape_theme_options_right_side', 'travelscape_theme_options_instant_site_sidebar_box', 5 );							
					add_action( 'travelscape_theme_options_right_side', 'travelscape_theme_options_review_us_sidebar_box', 10 );
					add_action( 'travelscape_theme_options_right_side', 'travelscape_theme_options_documentation_sidebar_box', 15 );
					add_action( 'travelscape_theme_options_right_side', 'travelscape_theme_options_support_sidebar_box', 20 );

                }


                /**
                 * Enqueue scripts and styles.
                 */
                function travelscape_admin_scripts($hook) {		
					
						if ($hook === 'appearance_page_travelscape-options' || $hook === 'appearance_page_demo-importer-plus') {
							wp_enqueue_style( 'travelscape-admin', TRAVELSCAPE_PARENT_URI . '/inc/admin/theme-options/assets/travelscape-admin.css', '', TRAVELSCAPE_THEME_VERSION );
						}
					
                }


                function travelscape_theme_options_ed() {
                    add_theme_page( __('Travelscape Options', 'travelscape'), __('Travelscape Options', 'travelscape'), 'edit_theme_options', 'travelscape-options', array( $this, 'travelscape_theme_options_page' ) );
                }

                function travelscape_theme_options_page() {
                    ?>
                    <div class="wrap travelscape-admin-wrap">
					<?php do_action('travelscape_theme_options_header_bar') ?>
                    <div class="travelscape-container">
                        <div class="travelscape-options-body">
                            <div class="travelscape-body-left">
                                <?php do_action('travelscape_theme_options_left_side') ?>
                            </div>
                            <div class="travelscape-body-right">
                                <?php do_action('travelscape_theme_options_right_side') ?>
                            </div>
                        </div>
                    </div>
                    </div>
                <?php
                }


    }

    /**
    *  Starting this off by calling 'get_instance()' method
    */
    Travelscape_Theme_Options::get_instance();

}