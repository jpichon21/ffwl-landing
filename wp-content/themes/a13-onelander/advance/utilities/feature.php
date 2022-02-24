<?php
if(!function_exists('apollo13framework_make_scroller')){
	/**
	 * Make theme scroller for photos
	 *
	 * @param array    $args
	 * @param null|int $id post ID
	 */
	function apollo13framework_make_scroller($args, $id = null ){
		if(is_null($id)){
			$id = get_the_ID();
		}

		$default_args = array(
			//rather constant settings
			'imagesLoaded'         => true,
			'setGallerySize'       => false,
			'resize'               => false,
			'bgLazyLoad'           => 2,
			'arrowShape'           => array(
				'x0' => 25,
				'x1' => 55,
				'y1' => 40,
				'x2' => 65,
				'y2' => 40,
				'x3' => 35
			),
			//variable settings
			'wrapAround'           => true,
			'contain'              => false,
			'freeScroll'           => false,
			'prevNextButtons'      => false,
			'pageDots'             => true,
			'a13Parallax'          => false,
			'a13Effect'            => 'blur',
			'a13MainSlider'        => false,
			'a13ShowDesc'          => false,
			'a13CellWidth'         => 25,
			'a13CellWidthMobile'   => 75,
			'a13Ratio'             => '16/9',
			'autoPlay'             => false,
			'pauseAutoPlayOnHover' => true,
		);

		$args = wp_parse_args($args, $default_args);

		//extra classes
		$extra_class = ' scroller-gallery-'.$id;
		$extra_class .= $args['pageDots'] ? ' page-dots': '';
		$extra_class .= $args['a13Parallax'] ? ' parallax': '';
		$extra_class .= $args['a13MainSlider'] ? ' a13-main-scroller': '';
		$open_behavior = get_post_meta( $id, '_scroller_opened_photo_behavior', true );
		$extra_class .= strlen($open_behavior) ? ' opened-'.$open_behavior : '';
		$photo_cover = get_post_meta( $id, '_scroller_photo_cover', true );
		$extra_class .= strlen($photo_cover) ? ' closed-'.$photo_cover : 'closed-cover';


		echo '<div class="a13-scroller-stuff">';
		apollo13framework_make_media_collection($id);
		echo '<div class="a13-scroller'.esc_attr($extra_class).'" data-scroller=\''.esc_attr(wp_json_encode($args)).'\'></div>';
		echo '<button class="scroll-below">'.esc_html__( 'Click here to scroll the page below', 'a13-onelander' ).'</button>';
		echo '</div>';
		apollo13framework_scroller_gallery_individual_look($id);
	}
}


if(!function_exists('apollo13framework_scroller_gallery_individual_look')){
	/**
	 * Prepares CSS specially for each scroller gallery
	 *
	 * @since 2.3.0
	 *
	 * @param null|int $id post ID
	 */
	function apollo13framework_scroller_gallery_individual_look($id = null){
		if(is_null($id)){
			$id = get_the_ID();
		}
		$selector_class   = wp_strip_all_tags( '.scroller-gallery-' . $id );
		$cell_margin     = wp_strip_all_tags( get_post_meta( $id, '_scroller_cell_margin', true ) );

		$css = '
'.$selector_class.' .carousel-cell {
    margin-right: ' . $cell_margin . ';
}
';

		//if we have some CSS then add it
		if(strlen($css)){
			$css = apollo13framework_minify_css($css);

			// Elementor edit mode
			if ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
				//we need to print inline CSS this way, cause otherwise it will be enqueued in frame parent(wrong place)
				echo '<style type="text/css" media="all" id="a13-scroller-gallery-'.esc_attr($id).'">'.$css.'</style>';
			}
			// not edit mode
			else {
				//print gallery inline CSS without attaching it to any style
				//credits to https://www.cssigniter.com/late-enqueue-inline-css-wordpress/
				wp_register_style( 'a13-scroller-gallery-'.esc_attr($id), false );
				wp_enqueue_style( 'a13-scroller-gallery-'.esc_attr($id) );
				wp_add_inline_style( 'a13-scroller-gallery-'.esc_attr($id), $css );
			}
		}
	}
}



if(!function_exists('apollo13framework_cookie_message')){
	function apollo13framework_cookie_message() {
		global $apollo13framework_a13;
		$is_cookie_for_msg_set = isset($_COOKIE["apollo13framework_top_msg"]);

		if($apollo13framework_a13->get_option( 'top_message' ) === 'on' && (!$is_cookie_for_msg_set || is_customize_preview()) ){
			$message           = $apollo13framework_a13->get_option( 'top_message_text' );
			$button_text       = $apollo13framework_a13->get_option( 'top_message_button' );
			$position          = $apollo13framework_a13->get_option( 'top_message_position', 'top' );
			$is_button         = ! ! strlen( $button_text );
			$top_message_class = $is_button ? '' : ' no-button'; //X if there is no button
		?>
		<div id="top-closable-message" class="top-message-container <?php echo esc_attr($position); ?>-screen">
			<div class="top-message<?php echo esc_attr($top_message_class) ?>">
				<div class="message"><?php echo wp_kses_data( balanceTags( $message, true ) ); ?></div>
				<?php if($is_button) {
					?>
					<div class="button"><span><?php echo esc_html( $button_text ); ?></span></div><?php
				}
				else{
					?><span class="a13icon-cross close-sidebar"></span><?php
				}?>
			</div>
		</div>
		<?php
		}
	}
}

function apollo13framework_cookie_message_css() {
	global $apollo13framework_a13;

	$css = '';

	if ( $apollo13framework_a13->get_option( 'top_message' ) === 'on' ) {
		$top_message_bg_color_value   = $apollo13framework_a13->get_option_color_rgba( 'top_message_bg_color' );
		$top_message_link_color_value = $apollo13framework_a13->get_option_color_rgba( 'top_message_link_color' );
		$top_message_bg_color         = apollo13framework_make_css_rule( 'background-color', $top_message_bg_color_value );
		$top_message_text_color       = apollo13framework_make_css_rule( 'color', $apollo13framework_a13->get_option_color_rgba( 'top_message_text_color' ) );
		$top_message_link_color       = apollo13framework_make_css_rule( 'color', $top_message_link_color_value );
		$top_message_link_color_hover = apollo13framework_make_css_rule( 'color', $apollo13framework_a13->get_option_color_rgba( 'top_message_link_color_hover' ) );
		$top_message_text_transform   = apollo13framework_make_css_rule( 'text-transform', $apollo13framework_a13->get_option( 'top_message_text_transform' ) );

		$css .= "
/* ==================
   TOP CLOSABLE MESSAGE
   ==================*/
.top-message-container{
	$top_message_bg_color
	$top_message_text_color
	$top_message_text_transform
}
.top-message .message a,
.top-message .close-sidebar{
	$top_message_link_color
}
.top-message .message a:hover{
	$top_message_link_color_hover
}
.top-message .button span{
    border-color: $top_message_link_color_value;
    color: $top_message_link_color_value;
}
.top-message .button span:hover{
    background-color: $top_message_link_color_value;
    color: $top_message_bg_color_value;
}";
	}

	return $css;
}

function apollo13framework_cookie_message_partial_css($response) {
	return apollo13framework_prepare_partial_css($response, 'top_message_bg_color', 'apollo13framework_cookie_message_css');
}
add_filter( 'customize_render_partials_response', 'apollo13framework_cookie_message_partial_css' );



if ( ! function_exists( 'apollo13framework_header_top_bar' ) ) {
	/**
	 * Prints out Header top bar
	 */
	function apollo13framework_header_top_bar() {
		global $apollo13framework_a13;

		$wpml_active       = defined( 'ICL_SITEPRESS_VERSION' );
		$polylang_active   = defined( 'POLYLANG_BASENAME' );
		$top_bar_msg_part  = $apollo13framework_a13->get_option( 'top_bar_msg_part' );
		$top_bar_text      = $apollo13framework_a13->get_option( 'top_bar_message' );
		$top_bar_on_mobile = $apollo13framework_a13->get_option( 'header_top_bar_display_on_mobile' ) === 'off' ? ' hide_on_mobile' : '';

		?>
		<div class="top-bar-container<?php echo esc_attr($top_bar_on_mobile);?>">
			<div class="top-bar">
				<?php
				echo '<div class="part1">'; /* in PHP to make sure :empty works when it is empty */
				if ( $top_bar_msg_part === 'message' ){
					echo '<div class="top-bar-msg">'.wp_kses_post( $top_bar_text ).'</div>';
				}
				elseif( $top_bar_msg_part === 'menu' && has_nav_menu( 'top-bar-menu' )  ){
					/** @noinspection PhpIncludeInspection */
					require_once( get_theme_file_path( 'advance/walkers/top-bar.php' ) );
					//place for 1-4 links
					wp_nav_menu( array(
							'container'      => false,
							'link_before'    => '',
							'link_after'     => '',
							'depth'          => 1,
							'menu_class'     => 'top-bar-menu',
							'theme_location' => 'top-bar-menu',
							'walker'         => new A13FRAMEWORK_top_bar_menu_walker
						)
					);
				}
				echo '</div>';


				echo '<div class="part2">'; /* in PHP to make sure :empty works when it is empty */
				//language switcher
				if ( ( $wpml_active || $polylang_active ) && $apollo13framework_a13->get_option( 'top_bar_lang_switcher' ) === 'on' ) {
					$languages         = apply_filters( 'wpml_active_languages', '', 'skip_missing=0&orderby=code&order=ASC' );
					$current_lang_code = ICL_LANGUAGE_CODE;
					$lang_html         = '<ul class="language-switcher">';

					//build languages list
					foreach ( $languages as $lang ) {
						$lang_html .= '<li><a href="'.esc_url($lang['url']).'" title="'.esc_attr($lang['native_name']).'" '.($current_lang_code === $lang['language_code'] ? 'class="current"' : '').'>' . esc_html( $lang['language_code'] ) . '</a></li>';
					}

					$lang_html .= '</ul>';

					echo wp_kses_post( $lang_html );
				}

				//socials
				$socials = $apollo13framework_a13->get_option( 'top_bar_socials' ) === 'on';
				if ( $socials ) {
					//check what color variant we use
					$color_variant = apollo13framework_horizontal_header_color_variant();
					$color_variant = $color_variant === 'normal' ? '' : 'header_'.$color_variant.'_';

					echo apollo13framework_social_icons( $apollo13framework_a13->get_option( $color_variant.'top_bar_socials_color' ), $apollo13framework_a13->get_option( $color_variant.'top_bar_socials_color_hover' ) );
				}
				echo '</div>';
				?>
			</div>
		</div>
		<?php
	}
}
if ( ! function_exists( 'apollo13framework_header_tools_language_switcher' ) ) {
	/**
	 * Prints Language switcher in header tools
	 *
	 * @param string $tools_html Current tools HTML
	 *
	 * @return string
	 */
	function apollo13framework_header_tools_language_switcher($tools_html) {
		global $apollo13framework_a13;

		$wpml_active     = defined( 'ICL_SITEPRESS_VERSION' );
		$polylang_active = defined( 'POLYLANG_BASENAME' );

		//language switcher
		if ( ( $wpml_active || $polylang_active ) && $apollo13framework_a13->get_option( 'header_language_switcher' ) === 'on' ) {
			$options = $apollo13framework_a13->get_option( 'header_language_switcher_options' );
			$flags = in_array( 'flags', $options );
			$codes = in_array( 'codes', $options );;

			if( $flags || $codes ){
				$languages         = apply_filters( 'wpml_active_languages', '', 'skip_missing=0&orderby=code&order=ASC' );
				$current_lang_code = ICL_LANGUAGE_CODE;
				$switcher_html = '<div class="language-switcher tool'.( $codes ? ' codes' : '' ).'">';
				$other_languages_html = '<ul class="languages">';

				//build languages list
				foreach ( $languages as $lang ) {
					if( $current_lang_code === $lang['language_code'] ){
						$switcher_html .= '
							<button id="tools-lang-switcher" title="'.esc_attr($lang['native_name']).'">'
		                         . ( $flags? '<img src="'.esc_attr($lang['country_flag_url']).'" alt='.esc_attr($lang['native_name']).'" />' : '' )
		                         . ( $codes? esc_html( $lang['language_code'] ) : '' )
							.'</button>';

						continue;
					}

					$other_languages_html .= '
						<li><a href="'.esc_url($lang['url']).'" title="'.esc_attr($lang['native_name']).'">'
			                . ( $flags? '<img src="'.esc_attr($lang['country_flag_url']).'" alt='.esc_attr($lang['native_name']).'" />' : '' )
			                . ( $codes? esc_html( $lang['language_code'] ) : '' )
		                . '</a></li>';
				}

				$other_languages_html .= '</ul>';

				$switcher_html .= $other_languages_html . '</div>';

				return $switcher_html.$tools_html;
			}
		}

		return $tools_html;
	}
}
add_filter( 'apollo13framework_header_tools', 'apollo13framework_header_tools_language_switcher' );



if(!function_exists('apollo13framework_menu_overlay')) {
	/**
	 * Prints out HTML for menu overlay module
	 */
	function apollo13framework_menu_overlay(){
		global $apollo13framework_a13;

		if( $apollo13framework_a13->get_option( 'header_menu_overlay' ) === 'on' ){
			$mo_effect = $apollo13framework_a13->get_option( 'header_menu_overlay_effect' );
			$mo_effect = 'eff-'. (strlen($mo_effect)? $mo_effect : 'default');
			$text_align = ' align-'.$apollo13framework_a13->get_option( 'header_menu_overlay_align' );
			?>
			<div id="menu-overlay" class="<?php echo esc_attr($mo_effect.$text_align); ?>">
				<nav<?php apollo13framework_schema_args('navigation'); ?>>
					<?php
					if ( has_nav_menu( 'header-menu' ) ):
						/** @noinspection PhpIncludeInspection */
						require_once( get_theme_file_path( 'advance/walkers/overlay.php' ) );
						wp_nav_menu( array(
							'container'      => false,
							'link_before'    => '<span>',
							'link_after'     => '</span>',
							'menu_class'     => '',
							'theme_location' => 'header-menu',
							'walker'          => new A13FRAMEWORK_menu_overlay_walker,
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'          => 1
						) );
					else:
						echo '<ul>';
						wp_list_pages(
							array(
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'title_li'    => '',
								'depth'       => 1
							)
						);
						echo '</ul>';
					endif;
					?>

				</nav>
				<span class="close-menu"></span>
			</div>
			<?php
		}
	}
}



if ( ! function_exists( 'apollo13framework_horizontal_header_color_variant' ) ) {
	/**
	 * Returns what color variant of horizontal header is default for current page
	 */
	function apollo13framework_horizontal_header_color_variant() {
		global $apollo13framework_a13;

		$page_type = apollo13framework_what_page_type_is_it();
		$value = 'normal';

		//if header color variants are not fully enabled
		if( $apollo13framework_a13->get_option( 'header_color_variants', 'on' ) !== 'on' || post_password_required() ){
			return $value;
		}

		//albums list - first cause it is also page type!
		if ( $page_type['albums_list'] ) {
			$value = $apollo13framework_a13->get_option( 'albums_list_horizontal_header_color_variant' );
		}
		//works list - before page cause it is also page type!
		elseif ( $page_type['works_list'] ) {
			$value = $apollo13framework_a13->get_option( 'works_list_horizontal_header_color_variant' );
		}
		elseif($page_type['product']){
			$value = $apollo13framework_a13->get_option( 'product_horizontal_header_color_variant', 'normal' );
		}
		//cart and others not sidebar/title pages of woocommerce
		elseif( ( $page_type['shop'] && !apollo13framework_is_woocommerce_sidebar_page() ) ||
		        //wish list
		        ( class_exists( 'YITH_WCWL' ) && (get_the_ID() === (int)yith_wcwl_object_id( get_option( 'yith_wcwl_wishlist_page_id' ) ) ) ) ){
			$value = $apollo13framework_a13->get_option( 'shop_no_major_pages_horizontal_header_color_variant', 'normal' );
		}
		//shop
		elseif ( $page_type['shop'] ) {
			$value = $apollo13framework_a13->get_option( 'shop_horizontal_header_color_variant' );
		}
		//pages, posts, albums, work
		elseif ( $page_type['page'] || $page_type['album'] || $page_type['work'] || $page_type['post'] ) {
			$value = $apollo13framework_a13->get_meta('_horizontal_header_color_variant', get_the_ID() );
		}
		//blog
		elseif ( $page_type['blog_type'] ) {
			$value = $apollo13framework_a13->get_option( 'blog_horizontal_header_color_variant' );
		}

		return $value;
	}
}



add_action( 'wp_ajax_apollo13framework_album_finished_proofing', 'apollo13framework_album_finished_proofing' );
add_action( 'wp_ajax_nopriv_apollo13framework_album_finished_proofing', 'apollo13framework_album_finished_proofing' );
/**
 * Function to mark album as finished for proofing process
 */
function apollo13framework_album_finished_proofing() {
	$album_id = isset($_REQUEST['album_id'])? sanitize_text_field( wp_unslash($_REQUEST['album_id'] ) ) : '';

	//check is it trusted call
	check_ajax_referer( 'proofing_ajax', 'security' );

	//save changed data
	update_post_meta( $album_id, '_proofing_finished', 1 );

	//prepare option with changed albums
	$proof_option = get_option('a13_proofed_albums');
	$proof_option[$album_id] = time();
	update_option('a13_proofed_albums', $proof_option, true);

	//send e-mail about new proofed album only if plugin is installed & active
	if(function_exists('a13fe_album_proofing_admin_mail')){
		a13fe_album_proofing_admin_mail($album_id);
	}

	//return JSON result
	echo wp_json_encode(array('done' => 1));

	die(); // this is required to return a proper result
}



add_action( 'wp_ajax_apollo13framework_proofing_notice_action', 'apollo13framework_proofing_notice_action' );

/**
 * Mark proofing notice to be disabled
 */
function apollo13framework_proofing_notice_action() {
	//clear data
	update_option('a13_proofed_albums', array());

	echo '';

	die(); // this is required to return a proper result
}



/**
 * Notice about finished proofing in albums
 *
 */
function apollo13framework_new_proofed_albums(){
	$proof_option = get_option('a13_proofed_albums');
	if($proof_option !== false && $proof_option !== '' && sizeof($proof_option) ){
		echo '<div id="proofing-notice" class="notice notice-warning is-dismissible"><p>';
		echo '<strong>'.esc_html__( 'Your clients have marked the following albums as completed in the photo proofing process.', 'a13-onelander' ).'</strong><br />';
		echo esc_html__( 'Using the links below, you can view and mark albums as "viewed" so that they do not appear on this list until new changes are made.', 'a13-onelander' );
		echo '</p>';
		echo '<ul>';

		//albums
		$albums = get_option('a13_proofed_albums');
		$now = time();
		foreach($albums as $album_id => $time){
			echo '<li><a href="'.esc_url(wp_nonce_url(add_query_arg( 'proof_viewed', $album_id, get_permalink($album_id) ), 'album-proof-viewed')).
			     '" target="_blank">'. esc_html( get_the_title($album_id) ).'</a> '.
			     sprintf(
					/* translators: %s: human readable time in HTML tag */
				     esc_html__('&mdash; accepted %s ago', 'a13-onelander' ),
				     '<abbr title="'.esc_attr( date('l jS \of F Y h:i:s A e', $time) ).'">'.esc_html( human_time_diff($time ,$now) ).'</abbr>'
			     ).
			     '</li>';
		}

		echo '</ul>';
		echo '<p><strong><a id="hide-proof-notice" href="#">'. esc_html__( 'Mark all albums as viewed and hide the message.', 'a13-onelander').'</a></strong></p>';
		echo '</div>';
	}
}
//check for notices about proofed albums
add_action('apollo13framework_theme_notices', 'apollo13framework_new_proofed_albums');



if(!function_exists('apollo13framework_album_proofing_query')){
	/* registers query var for proofing to be used later */
	function apollo13framework_album_proofing_query( $vars ){
		$vars[] = "proof_viewed";
		return $vars;
	}
}
add_filter( 'query_vars', 'apollo13framework_album_proofing_query', 10 );/* add query var for proofing */



if(!function_exists('apollo13framework_album_proofing_viewed')){
	/* check for "mark proofing as viewed" */
	function apollo13framework_album_proofing_viewed($query) {
		if ( isset( $_REQUEST['_wpnonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ), 'album-proof-viewed' ) ) {
			$mark_as_viewed = array_key_exists( 'proof_viewed', $query->query_vars ) && ( (int) $query->query_vars['proof_viewed'] ) > 0;

			if ( $mark_as_viewed && current_user_can( 'edit_posts' ) ) {
				//mark as viewed
				$proof_option = get_option( 'a13_proofed_albums' );
				unset( $proof_option[ $query->query_vars['proof_viewed'] ] );
				update_option( 'a13_proofed_albums', $proof_option, true );

				//remove params from url by redirect
				wp_redirect(get_permalink($query->query_vars['proof_viewed']));
				exit;
			}
		}
	}
}
add_action( 'parse_request', 'apollo13framework_album_proofing_viewed' );



add_action( 'wp_ajax_apollo13framework_mark_album_item', 'apollo13framework_mark_album_item' );
add_action( 'wp_ajax_nopriv_apollo13framework_mark_album_item', 'apollo13framework_mark_album_item' );
/**
 * Function to mark item as (not)selected by client
 */
function apollo13framework_mark_album_item() {
	$approve  = isset( $_GET['approve'] ) ? sanitize_text_field( wp_unslash( $_GET['approve'] ) ) : '';
	$album_id = isset( $_GET['album_id'] ) ? sanitize_text_field( wp_unslash( $_GET['album_id'] ) ) : '';
	$item_id  = isset( $_GET['item_id'] ) ? sanitize_text_field( wp_unslash( $_GET['item_id'] ) ) : '';
	$link     = isset( $_GET['link'] ) ? sanitize_text_field( wp_unslash( $_GET['link'] ) ) : '';

	//check is it trusted call
	check_ajax_referer( 'proofing_ajax', 'security' );

	//get current proofing data
	$meta                = get_post_meta( $album_id, '_images_n_videos_proofing', true );
	$images_videos_array = strlen( $meta ) === 0 ? array() : json_decode( $meta, true );

	//external media
	if ( $item_id == 'external' ) {
		$images_videos_array[$link]['approved'] = $approve;
	}
	//numeric ID
	elseif(strlen($item_id)){
		$images_videos_array[$item_id]['approved'] = $approve;
	}

	//save changed data
	update_post_meta( $album_id, '_images_n_videos_proofing' , wp_slash( wp_json_encode($images_videos_array) ) );

	//album need to be marked as finished after change
	update_post_meta( $album_id, '_proofing_finished', 0 );

	//return JSON result
	echo wp_json_encode(array('approve' => (int)$approve));

	die(); // this is required to return a proper result
}


add_action( 'wp_ajax_apollo13framework_comment_album_item', 'apollo13framework_comment_album_item' );
add_action( 'wp_ajax_nopriv_apollo13framework_comment_album_item', 'apollo13framework_comment_album_item' );
/**
 * Function to add comment to item selected by client
 */
function apollo13framework_comment_album_item() {
	$comment  = isset( $_REQUEST['comment'] ) ? sanitize_textarea_field( wp_unslash( $_REQUEST['comment'] ) ) : '';
	$album_id = isset( $_REQUEST['album_id'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['album_id'] ) ) : '';
	$item_id  = isset( $_REQUEST['item_id'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['item_id'] ) ) : '';
	$link     = isset( $_REQUEST['link'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['link'] ) ) : '';

	//check is it trusted call
	check_ajax_referer( 'proofing_ajax', 'security' );

	//get current proofing data
	$meta                = get_post_meta( $album_id, '_images_n_videos_proofing', true );
	$images_videos_array = strlen( $meta ) === 0 ? array() : json_decode( $meta, true );

	//external media
	if ( $item_id == 'external' ) {
		$images_videos_array[$link]['comment'] = $comment;
	}
	//numeric ID
	elseif(strlen($item_id)){
		$images_videos_array[$item_id]['comment'] = $comment;
	}

	//save changed data
	update_post_meta( $album_id, '_images_n_videos_proofing' ,  wp_slash( wp_json_encode($images_videos_array) ) );

	//album need to be marked as finished after change
	update_post_meta( $album_id, '_proofing_finished', 0 );

	//return JSON result
	echo wp_json_encode(array('comment' => $comment));

	die(); // this is required to return a proper result
}



if ( ! function_exists( 'apollo13framework_cpt_categories_list' ) ){
	/**
	 * Lists all categories(terms) for post type
	 *
	 * @param string $for which post type terms to list
	 *
	 * @return array $termID => category name
	 */
	function apollo13framework_cpt_categories_list( $for ) {
		$album_tax  = defined( 'A13FRAMEWORK_CPT_ALBUM_TAXONOMY' ) ? A13FRAMEWORK_CPT_ALBUM_TAXONOMY : 'genre';
		$work_tax   = defined( 'A13FRAMEWORK_CPT_WORK_TAXONOMY' ) ? A13FRAMEWORK_CPT_WORK_TAXONOMY : 'work_genre';
		$people_tax = defined( 'A13FRAMEWORK_CPT_PEOPLE_TAXONOMY' ) ? A13FRAMEWORK_CPT_PEOPLE_TAXONOMY : 'group';

		$taxonomies = [
			'post'   => 'category',
			'album'  => $album_tax,
			'work'   => $work_tax,
			'people' => $people_tax,
		];

		$options  = [ '__all' => esc_html__( 'All', 'a13-onelander' ) ];
		$taxonomy = $taxonomies[ $for ];

		$terms = get_terms( [
			'taxonomy'   => $taxonomy,
			'hide_empty' => false,
		] );

		foreach( $terms as $term ) {
			$options[ $term->term_id ] = $term->name;
		}

		return $options;
	}
}