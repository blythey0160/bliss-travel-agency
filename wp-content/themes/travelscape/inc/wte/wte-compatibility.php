<?php
/**
 *
 * This file is used to make changes to contents displayed by the WTE plugin as needed by the Theme
 *
 * @since 1.0.0
 */

//WTE style
/**
 * Enqueue scripts and styles.
 */
function travelscape_wte_scripts()
{
	wp_enqueue_style(
		"travelscape-wte-style",
		TRAVELSCAPE_PARENT_URI . "/inc/wte/wte.css",
		"",
		TRAVELSCAPE_PARENT_THEME_VERSION
	);
	wp_enqueue_script(
		"travelscape-wte-script",
		TRAVELSCAPE_PARENT_URI . "/inc/wte/wte.js",
		["jquery"],
		TRAVELSCAPE_PARENT_THEME_VERSION,
		true
	);
}
add_action("wp_enqueue_scripts", "travelscape_wte_scripts");

//Body class for Checkout and My Account pages
function travelscape_wte_body_class($classes)
{
	global $post;

	$wpte_settings = get_option("wp_travel_engine_settings");

	$checkout = $wpte_settings["pages"]["wp_travel_engine_place_order"];
	$thankyou = $wpte_settings["pages"]["wp_travel_engine_thank_you"];
	$confirmation = $wpte_settings["pages"]["wp_travel_engine_confirmation_page"];
	$dashboard = $wpte_settings["pages"]["wp_travel_engine_dashboard_page"];
	$wishlist = $wpte_settings["pages"]["wp_travel_engine_wishlist"] ?? "";

	$pages_array = [$checkout, $thankyou, $confirmation, $dashboard, $wishlist];

	if (in_array(get_the_ID(), $pages_array)) {
		$classes[] = "travelscape-wpte-pages";
	}

	$fixedtabs = get_option("wp_travel_engine_settings")["wte_sticky_tabs"] ?? null;

	if ($fixedtabs == "yes" && is_singular("trip")) {
		$classes[] = "travelscape-trip-fixed-tabs";
	}

	return $classes;
}
add_action("body_class", "travelscape_wte_body_class");

$travelscape_single_trip_hooks = WP_Travel_Engine_Template_Hooks::get_instance();

//move wte gallery below header/
remove_action("wte_single_trip_content", [$travelscape_single_trip_hooks, "display_single_trip_gallery"], 10);
add_action("wp_travel_engine_before_trip_content", [$travelscape_single_trip_hooks, "display_single_trip_gallery"], 1);

//trip slider image size
function travelscape_trip_single_galler_img_size($gallery_image_size)
{
	$gallery_image_size = "full";
	return $gallery_image_size;
}
add_filter("wp_travel_engine_trip_single_gallery_image_size", "travelscape_trip_single_galler_img_size");

/**
 * Hook for the header block ( contains title and description )
 *
 * @return void
 * Trips Archive Page Header Override
 */
function travelscape_wte_archive_page_header()
{
	$queried_object = get_queried_object();

	$page_title = "";
	if ($queried_object instanceof \WP_Term) {
		$page_title = $queried_object->name;
	} elseif ($queried_object instanceof \WP_Post_Type) {
		$page_title = $queried_object->label;
	}

	if (!empty($page_title)) {

		$custom_header = get_header_image();

		if (isset(get_queried_object()->term_id)) {
			$image_id = get_term_meta(get_queried_object()->term_id, "category-image-id", true);
		}
		$wte_global = get_option("wp_travel_engine_settings", true);
		$show_tax_image = isset($image_id) && "" != $image_id && isset($wte_global["tax_images"]) ? true : false;
		if ($show_tax_image) {
			$image_url = wp_get_attachment_url($image_id);
		} else {
			$image_url = $custom_header;
		}
		?>
		<header class="wte-page-header travescape-wte-page-header" style="background-image: url('<?php echo esc_url(
  	$image_url
  ); ?>');">
			<div class="page-header-overlay"></div>
				<div class="container">
					<div class="row">
					<?php
     $settings = get_option("wp_travel_engine_settings", []);
     $show_archive_title = apply_filters("wte_trip_archive_title", false); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
     $show_archive_title = !isset($settings["hide_term_title"]) || "yes" !== $settings["hide_term_title"];
     if ($show_archive_title) {
     	echo "<h1 class=\"page-title\" itemprop=\"name\">" . esc_html($page_title) . "</h1>";
     }
     ?>
					</div>	
				</div>				
		</header><!-- .page-header -->
		<div class="travelscape-taxonomy-description">
			<div class="container">
				<div class="row">
					<?php
     $show_archive_description = apply_filters("wte_trip_archive_description_below_title", false); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
     $show_archive_description =
     	!isset($settings["hide_term_description"]) || "yes" !== $settings["hide_term_description"];
     if ($show_archive_description && !is_post_type_archive(WP_TRAVEL_ENGINE_POST_TYPE)) {
     	the_archive_description('<div class="taxonomy-description" itemprop="description">', "</div>");
     }
     ?>		
				</div>					
			</div>
		</div>
		<?php
	}
}
add_filter("wte_trip_archive_description_page_header", "travelscape_wte_archive_page_header");
