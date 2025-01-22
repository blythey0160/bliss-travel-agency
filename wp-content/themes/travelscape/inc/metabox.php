<?php 
/**
* Metabox for Page  Layout
*
* @package Travelscape
*/

function travelscape_settings_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function travelscape_settings_add_meta_box() {

	$travelscape_cpt_args = array(
	   'public'   => true,
	);
	$travelscape_cpt_output = 'names';
	$travelscape_cpt_operator = 'and';
	$travelscape_cpt_types = get_post_types( $travelscape_cpt_args, $travelscape_cpt_output, $travelscape_cpt_operator ); 
	
	foreach ( $travelscape_cpt_types  as $travelscape_cpt ) {	
		add_meta_box(
			'travelscape_settings-travelscape-settings',
			__( 'Travelscape Settings', 'travelscape' ),
			'travelscape_settings_html',
			$travelscape_cpt,
			'side',
			'high'
		);
	}	
	
	
}
add_action( 'add_meta_boxes', 'travelscape_settings_add_meta_box' );

function travelscape_settings_html( $post) {
	wp_nonce_field( '_travelscape_settings_nonce', 'travelscape_settings_nonce' ); ?>
    	<p>
		<input type="checkbox" name="travelscape_settings_enable_container_flow" id="travelscape_settings_enable_container_flow" value="enable-container-flow" <?php echo ( travelscape_settings_get_meta( 'travelscape_settings_enable_container_flow' ) === 'enable-container-flow' ) ? 'checked' : ''; ?>>
		<label for="travelscape_settings_enable_container_flow"><?php esc_html_e( 'Enable Container Flow', 'travelscape' ); ?></label>
        </p>	
    	<p>
		<input type="checkbox" name="travelscape_settings_disable_primary_header" id="travelscape_settings_disable_primary_header" value="disable-primary-header" <?php echo ( travelscape_settings_get_meta( 'travelscape_settings_disable_primary_header' ) === 'disable-primary-header' ) ? 'checked' : ''; ?>>
		<label for="travelscape_settings_disable_primary_header"><?php esc_html_e( 'Disable Header', 'travelscape' ); ?></label>
        </p>
        <p>
		<input type="checkbox" name="travelscape_settings_disable_footer_area" id="travelscape_settings_disable_footer_area" value="disable-footer-area" <?php echo ( travelscape_settings_get_meta( 'travelscape_settings_disable_footer_area' ) === 'disable-footer-area' ) ? 'checked' : ''; ?>>
		<label for="travelscape_settings_disable_footer_area"><?php esc_html_e( 'Disable Footer', 'travelscape' ); ?></label></p>
    	<p>
		<input type="checkbox" name="travelscape_settings_disable_sidebar" id="travelscape_settings_disable_sidebar" value="disable-sidebar" <?php echo ( travelscape_settings_get_meta( 'travelscape_settings_disable_sidebar' ) === 'disable-sidebar' ) ? 'checked' : ''; ?>>
		<label for="travelscape_settings_disable_sidebar"><?php esc_html_e( 'Disable Sidebar', 'travelscape' ); ?></label>
        </p>        
        <p>
		<input type="checkbox" name="travelscape_settings_disable_title" id="travelscape_settings_disable_title" value="disable-title" <?php echo ( travelscape_settings_get_meta( 'travelscape_settings_disable_title' ) === 'disable-title' ) ? 'checked' : ''; ?>>
		<label for="travelscape_settings_disable_title"><?php esc_html_e( 'Disable Title', 'travelscape' ); ?></label>
        </p>	        
		<p>
		<input type="checkbox" name="travelscape_settings_disable_content_padding" id="travelscape_settings_disable_content_padding" value="disable-content-padding" <?php echo ( travelscape_settings_get_meta( 'travelscape_settings_disable_content_padding' ) === 'disable-content-padding' ) ? 'checked' : ''; ?>>
		<label for="travelscape_settings_disable_content_padding"><?php esc_html_e( 'Disable Content Padding', 'travelscape' ); ?></label></p>   
		<?php
}

function travelscape_settings_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['travelscape_settings_nonce'] ) || ! wp_verify_nonce( $_POST['travelscape_settings_nonce'], '_travelscape_settings_nonce' ) ) return; // phpcs:ignore	
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;			
	
	if ( isset( $_POST['travelscape_settings_enable_container_flow'] ) )
		update_post_meta( $post_id, 'travelscape_settings_enable_container_flow', sanitize_text_field( $_POST['travelscape_settings_enable_container_flow'] ) ); // phpcs:ignore		
	else
		update_post_meta( $post_id, 'travelscape_settings_enable_container_flow', null );
	
	if ( isset( $_POST['travelscape_settings_disable_primary_header'] ) )
		update_post_meta( $post_id, 'travelscape_settings_disable_primary_header', sanitize_text_field( $_POST['travelscape_settings_disable_primary_header'] ) ); // phpcs:ignore		
	else
		update_post_meta( $post_id, 'travelscape_settings_disable_primary_header', null );
	
	if ( isset( $_POST['travelscape_settings_disable_title'] ) )
		update_post_meta( $post_id, 'travelscape_settings_disable_title', sanitize_text_field( $_POST['travelscape_settings_disable_title'] ) ); // phpcs:ignore
	else	
		update_post_meta( $post_id, 'travelscape_settings_disable_title', null );
	
	if ( isset( $_POST['travelscape_settings_disable_footer_area'] ) )
		update_post_meta( $post_id, 'travelscape_settings_disable_footer_area', sanitize_text_field( $_POST['travelscape_settings_disable_footer_area'] ) ); // phpcs:ignore
	else
		update_post_meta( $post_id, 'travelscape_settings_disable_footer_area', null );
	
	if ( isset( $_POST['travelscape_settings_disable_content_padding'] ) )
		update_post_meta( $post_id, 'travelscape_settings_disable_content_padding', sanitize_text_field( $_POST['travelscape_settings_disable_content_padding'] ) ); // phpcs:ignore
	else
		update_post_meta( $post_id, 'travelscape_settings_disable_content_padding', null );
	if ( isset( $_POST['travelscape_settings_disable_sidebar'] ) )
		update_post_meta( $post_id, 'travelscape_settings_disable_sidebar', sanitize_text_field( $_POST['travelscape_settings_disable_sidebar'] ) ); // phpcs:ignore
	else
		update_post_meta( $post_id, 'travelscape_settings_disable_sidebar', null );			
}
add_action( 'save_post', 'travelscape_settings_save' );