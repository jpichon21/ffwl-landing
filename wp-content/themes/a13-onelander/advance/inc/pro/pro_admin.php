<?php
//features that are only available in Pro Themes
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_action( 'wp_ajax_apollo13framework_check_license_code', 'apollo13framework_check_license_code' );
/**
 * Checks license code on code registration
 */
function apollo13framework_check_license_code() {
	global $apollo13framework_a13;
	$out = $apollo13framework_a13->register_new_license_code( isset( $_POST['code'] )? sanitize_text_field( wp_unslash( $_POST['code'] ) ) : '' );
	echo wp_json_encode( $out, JSON_FORCE_OBJECT );
	exit;
}


/**
 * Set redirect transition on update or activation
 */
function apollo13framework_set_welcome_redirect() {
	if ( ! is_network_admin() ) {
		$last_seen = get_option( 'apollo13framework_last_seen_welcome' );

		//not seen or seen long ago
		if($last_seen === false || version_compare( $last_seen, '2.3.0', '<')){
			set_transient( 'apollo13framework_welcome_redirect', 1, 30 );
		}
	}
}



/**
 * Do redirect if required on welcome page
 */
function apollo13framework_welcome_redirect() {
	if(!current_user_can('switch_themes')){
		return;
	}
	$redirect = get_transient( 'apollo13framework_welcome_redirect' );
	if( $redirect !== false ){
		delete_transient( 'apollo13framework_welcome_redirect' );
		//update last seen info
		update_option( 'apollo13framework_last_seen_welcome', A13FRAMEWORK_THEME_VERSION );
		//welcome user:-)
		wp_redirect( admin_url( 'themes.php?page=apollo13_pages&amp;subpage=info' ) );
	}
}

// Enables redirect on activation.
add_action( 'after_switch_theme', 'apollo13framework_set_welcome_redirect' );
add_action( 'admin_init', 'apollo13framework_welcome_redirect' );



/**
 * Returns hidden code to protect it from easy copy
 *
 * @param $code string
 *
 * @return string "stared code"
 */
function apollo13framework_mask_code($code){
	//"star" code
	$changed_code = preg_replace('/[a-z0-9]/i', '*', $code);

	//parts of original code
	$first_chars = substr($code, 0, 2);
	$last_chars = substr($code, -2, 2);

	//merge
	$changed_code = substr_replace($changed_code, $first_chars, 0, 2);
	$changed_code = substr_replace($changed_code, $last_chars, -2, 2);

	return $changed_code;
}



add_filter( 'apollo13framework_meta_boxes_images_manager', 'apollo13framework_pro_images_manager', 11 );
function apollo13framework_pro_images_manager($meta){
	//products & proofing support for images from media library
	array_splice( $meta['images_manager'], 6, 0, array(
			array(
				'name'        => __( 'Product represented by this image', 'a13-onelander' ),
				'description' => __( 'This option will add a "add to cart" button to the image.', 'a13-onelander' ),
				'id'          => 'image_product_id',
				'default'     => '',
				'type'        => 'wp_dropdown_products',
			),
			array(
				'name'        => __('Photo Proofing', 'a13-onelander').' - ' .__( 'ID', 'a13-onelander' ),
				'id'          => 'image_proofing_id',
				'default'     => '',
				'type'        => 'text',
			)
		)
	);

	//proofing support for video from media library
	array_splice( $meta['images_manager'], 13, 0, array(
			array(
				'name'        => __('Photo Proofing', 'a13-onelander').' - ' .__( 'ID', 'a13-onelander' ),
				'id'          => 'video_proofing_id',
				'default'     => '',
				'type'        => 'text',
			)
		)
	);

	return $meta;
}



add_action( 'apollo13framework_a13_multi_upload_tools', 'apollo13framework_multi_upload_tags' );
/**
 * Add tags to media uploader in albums & works
 */
function apollo13framework_multi_upload_tags() {
	global $apollo13framework_a13;

	if($apollo13framework_a13->check_for_valid_license()): ?>
        <p class="inline-part disabled" id="a13_multi_tags">
            <label for="a13-bulk-tagging"><?php esc_html_e( 'Add tags to selected items', 'a13-onelander' ); ?></label>
            <input id="a13-bulk-tagging" class="newtag" size="16" value="" autocomplete="off" type="text" disabled="disabled" />
            <input class="button tagadd" value="<?php esc_attr_e( 'Add', 'a13-onelander' ); ?>" type="button" disabled="disabled" />
        </p>
    <?php endif;
}
