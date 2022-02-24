<?php
class EnvatoApi2 {

	// Bearer, no need for OAUTH token, change this to your bearer string
	// https://build.envato.com/api/#token

	//Token name I used: InThemeVerification
	private static $bearer = "iCVC8JHvkOg2RpGPMklS0SdHk37FDJ01";
	private static $cache;

	static function getPurchaseData( $code ) {
		if(is_object(EnvatoApi2::$cache) ){
			return EnvatoApi2::$cache;
		}

		//remove spaces around code - it can break call to API
		$url = 'https://api.envato.com/v3/market/author/sale?code='.urlencode(trim($code)).'';

		$response = wp_remote_get($url ,
			//setting the header for the rest of the api
			array(
				'headers' => array(
					'Authorization' => "Bearer " . self::$bearer,
					'User-Agent' => "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13"
				)
			)
		);

		$body = $response['body'];

		if ($body != ""){
			EnvatoApi2::$cache = json_decode($body);
			return EnvatoApi2::$cache;
		}
		else{
			return false;
		}

	}

	static function verifyPurchase( $code ) {
		$verify_obj = self::getPurchaseData($code);

		// Check for correct verify code

		//check if Envato API works
		if (
			(false === $verify_obj) ||
			!is_object($verify_obj)
		){
			return sprintf( __( 'Looks like Envato API is currently down. Please try again later, or contact us on our <a href="%s">ThemeForest profile</a>', 'a13-onelander' ), 'https://themeforest.net/user/apollo13');
		}

		//Check if we have valid code for our TF profile
		if (
			isset($verify_obj->{"purchase_count"}) &&
			$verify_obj->{"purchase_count"} > 0
		){
			return $verify_obj;
		}

		//Check if we have any error message from Envato API
		if( isset($verify_obj->error) ){
			return $verify_obj->description."\n<br />".__( 'There is a chance that you have entered invalid Purchase code.', 'a13-onelander' );
		}

		//Looks like something went wrong and we don't know what.
		return sprintf( __( 'Unknown Error. Please try again later, or contact us on our <a href="%s">ThemeForest profile</a>', 'a13-onelander' ), 'https://themeforest.net/user/apollo13');
	}
}



/**
 * Displays rating notice in admin area
 */
function apollo13framework_rating_notice(){
	global $apollo13framework_a13;

	$display_rating_notice = true;
	$option_name = 'a13_'.A13FRAMEWORK_TPL_SLUG.'_rating';
	$rating_option = get_option( $option_name );

	if($rating_option !== false){
		//we have date saved
		if($rating_option !== 'disabled'){
			$now = time();
			//days that passed since last time we displayed rating notice
			$days = floor(($now - $rating_option) / (60 * 60 * 24));

			//less then week
			if($days < 7){
				$display_rating_notice = false;
			}
		}
		//message have been disabled
		else{
			$display_rating_notice = false;
		}
	}
	//they have just installed theme, lets give them 3 days before asking for rating
	else{
		$now_4_days_ago = time() - 4*(60 * 60 * 24);
		update_option( $option_name, $now_4_days_ago );
		$display_rating_notice = false;
	}

	if($display_rating_notice){
		$rating_notice =
			//rating info
			sprintf(
				__( '<p>Daniel &amp; Air. here from <a href="%1$s">Apollo13Themes</a>. Thank you for using our <strong>%2$s theme</strong>, we hope everything is working good for you!</p>', 'a13-onelander' ),
				'https://apollo13themes.com/',
				A13FRAMEWORK_OPTIONS_NAME_PART
			)

			//support info
			. sprintf(
				__( '<p>However if you face some issues or feeling lost, please don\'t hesitate and <a href="%2$s" target="_blank">check theme documentation %3$s</a> or <a href="%1$s" target="_blank">visit our support forum %4$s</a>.</p>', 'a13-onelander' ),
				'https://support.apollo13.eu/',
				esc_url($apollo13framework_a13->get_docs_link()),
				'<i class="fa fa-book" aria-hidden="true"></i>',
				'<i class="fa fa-comments-o" aria-hidden="true"></i>'
			)

			. sprintf(
				__( '<p>If you have spare 2 minutes please rate %1$s theme on ThemeForest(<a href="%2$s" target="_blank">how to rate</a>). If not, no big deal, just keep on rocking!</p>', 'a13-onelander' ),
				A13FRAMEWORK_OPTIONS_NAME_PART,
				'http://fc07.deviantart.net/fs71/i/2012/038/8/5/how_to_rate_a_file_template_by_cooledition-d4oxno5.jpg'
			)

			//links
			. sprintf(
				__( '<p class="links"><a href="%2$s" target="_blank">Rate %1$s</a> | <a href="%3$s">Maybe later&#8230;(hide for 7 days)</a> | <a href="%4$s">Don\'t show this notice again %5$s</a></p>', 'a13-onelander' ),
				A13FRAMEWORK_OPTIONS_NAME_PART,
				'https://themeforest.net/downloads',
				'#remind-later',
				'#disable-rating',
				'<i class="fa fa-times" aria-hidden="true"></i>'
			);

		echo '<div class="notice notice-info is-dismissible rating-notice">' . $rating_notice . '</div>';
	}
}
add_action('apollo13framework_theme_notices', 'apollo13framework_rating_notice');



function apollo13framework_envato_purchase_code(){
	global $apollo13framework_a13;
	$code = apollo13framework_envato_get_license();
	$code = $code === false? '' : apollo13framework_mask_code($code);
	?>
	<div class="info_box license_code_info">
		<div class="license_code">
			<label for="add_license_code"><?php esc_attr_e( 'Your license code', 'a13-onelander' ); ?></label>
			<input id="add_license_code" name="add_license_code" placeholder="<?php echo esc_attr__('Your license code', 'a13-onelander'); ?>" value="<?php echo esc_attr($code); ?>" />
			<span class="code_submit"><?php echo esc_html_x( 'Submit', 'submit the form', 'a13-onelander' ); ?><span class="ll-animation"></span></span>
		</div>
		<?php
		echo '<p>'.
		     esc_html__( 'Here you can add or update your license code.', 'a13-onelander' ) .
		     ' <a href="'.esc_url( $apollo13framework_a13->get_docs_link('license-code') ).'" target="_blank">'.esc_html__( 'Where to find your code?', 'a13-onelander' ).'</a>'.
		     '</p>';
			if(strlen($code) > 0) {
				echo '<p>'.esc_html__( 'The code is protected, so nobody can steal it when logging in to the admin panel.', 'a13-onelander' ).'</p>';
			}
		?>
	</div>
	<?php
}
add_action('apollo13framework_license_code_input', 'apollo13framework_envato_purchase_code');



function apollo13framework_envato_verifyPurchase( $purchaseCode, $itemId = false ) {
	$verify_purchase = EnvatoApi2::verifyPurchase( $purchaseCode );

	//check if API replies
	if(is_object($verify_purchase)){
		return !$itemId ? true : $verify_purchase->item->id == $itemId;
	}

	//invalid purchase code
	return false;
}



function apollo13framework_envato_valid_license(){
	return get_option( 'a13_valid_pc' ) !== false;
}
add_filter('apollo13framework_valid_license', 'apollo13framework_envato_valid_license');


/**
 * Validate code and on success save info about registered code
 *
 * @param $out  array   status of validation and message
 * @param $code string  registered code
 *
 * @return array        status of validation and message
 */
function apollo13framework_envato_register_license($out, $code){
	$verify_purchase = EnvatoApi2::verifyPurchase( $code );

	if(is_object($verify_purchase)){
		if( $verify_purchase->item->id == A13FRAMEWORK_THEME_ID_NUMBER ){
			$out['response'] = 'success';
			$out['message']  = __( 'The code is correct. Thank you!', 'a13-onelander' );
			update_option( 'a13_valid_pc', $code );
		}
		else{
			$out['response'] = 'error';
			$out['message']  =  esc_html__( 'The provided code is invalid for this theme.', 'a13-onelander' );
		}
	}
	else{
		$out['response'] = 'error';
		$out['message']  = $verify_purchase;
	}

	return $out;
}
add_filter('apollo13framework_register_license', 'apollo13framework_envato_register_license', 10, 2);



function apollo13framework_envato_get_license(){
	return get_option( 'a13_valid_pc' );
}
add_filter('apollo13framework_get_license', 'apollo13framework_envato_get_license');


function apollo13framework_envato_info_page() {
	global $apollo13framework_a13;
	$is_valid = apollo13framework_envato_valid_license();

	if(!$is_valid){
		echo '<h2>'.esc_html__( 'How to start?', 'a13-onelander' ).'</h2>';
		echo '<p>'.esc_html__( 'Before you will go anywhere, you should enter the license code in the form below to activate the theme.', 'a13-onelander' ).'</p>';
		echo '<p><a href="'.esc_url( $apollo13framework_a13->get_docs_link('license-code') ).'" target="_blank">'.esc_html__( 'Where to find your code?', 'a13-onelander' ).'</a></p>';
		do_action('apollo13framework_license_code_input');
	}

	else{
		echo '<h2>'.esc_html__( 'Your license code', 'a13-onelander' ).'</h2>';
		do_action('apollo13framework_license_code_input');

		echo '<h2>'.esc_html__( 'What\'s next?', 'a13-onelander' ).'</h2>';
		//check for companion plugin
			if( apollo13framework_is_companion_plugin_ready( esc_html__( 'Some features(like Albums, Works, shortcodes, plugins support) of the Theme requires an additional plugin before you will be able to use it. ', 'a13-onelander' ) ) ){
				echo '<p>'.esc_html__( 'You can check out what is new in the Changelog or just move on with your usual work.', 'a13-onelander' ).
				     ' <a href="https://www.apollo13.eu/themes_update/apollo13_framework_theme/index.html#change-log">'.esc_html__( 'Visit the Changelog', 'a13-onelander').'</a>'.
				     '</p>';

				echo '<p>'.esc_html__( 'If you have fresh installation then it would be good time to import one of our designs.', 'a13-onelander' ).
				     ' <a class="button" href="'.esc_url( admin_url( 'themes.php?page=apollo13_pages&amp;subpage=import' ) ).'">'.esc_html__( 'Go to Design Importer', 'a13-onelander').'</a>'.
				     '</p>';

				echo '<p>'.esc_html__( 'If you have an existing website, then you can start from scratch by changing theme options.', 'a13-onelander' ).
				     ' <a class="button" href="'.esc_url( admin_url( 'customize.php') ).'">'.esc_html__( 'Go to Customizer', 'a13-onelander').'</a>'.
				     '</p>';

				echo '<p>'.esc_html__( 'If you have an existing website, you can also try to import one of our designs to speed up your work. You will have to do it without demo data.', 'a13-onelander' ).
				     ' <a href="'.esc_url( $apollo13framework_a13->get_docs_link('importer-configuration') ).'">'.esc_html__( 'How to do it is explained in the documentation here.', 'a13-onelander').'</a>'.
				     '</p>';
			}
	}

}
add_action('apollo13framework_apollo13_info_page_content', 'apollo13framework_envato_info_page');

function apollo13framework_envato_license_is_needed_msg() {
	echo '<h2>'.esc_html__( 'The license code is needed to access the importer.', 'a13-onelander' ).'</h2>';
	echo '<p class="center">'. esc_html__( 'You must provide the license code to access Design Importer.', 'a13-onelander' ).
	     ' <a href="'.esc_url( admin_url( 'themes.php?page=apollo13_pages&amp;subpage=info' ) ).'">'.esc_html__( 'You can do this on the License &amp; Info page.', 'a13-onelander' ).'</a>'.
	     '</p>';
}
add_action('apollo13framework_license_is_needed_msg', 'apollo13framework_envato_license_is_needed_msg');


/**
 * Expired notice for non GPL themes
 *
 * */
function apollo13framework_expired_themes_notice(){
	//only for 3 themes
	if( in_array( A13FRAMEWORK_TPL_SLUG, array('a13-onelander', 'a13-onelander', 'a13-onelander') ) ){
		$display_notice = true;
		$option_name = 'a13_'.A13FRAMEWORK_TPL_SLUG.'_theme_expired';
		$option = get_option( $option_name );

		if($option !== false){
			//we have date saved
			if($option !== 'disabled'){
				$now = time();
				//days that passed since last time we displayed notice
				$days = floor(($now - $option) / (60 * 60 * 24));

				//less then month
				if($days < 30){
					$display_notice = false;
				}
			}
			//message have been disabled
			else{
				$display_notice = false;
			}
		}
		//have just installed theme, give 3 days
		else{
			$now_27_days_ago = time() - 27*(60 * 60 * 24);
			update_option( $option_name, $now_27_days_ago );
			$display_notice = false;
		}

		if($display_notice){
			/** @noinspection HtmlUnknownAnchorTarget */
			echo '<div class="notice notice-info is-dismissible a13-expired-notice" style="display: none;">
					<p class="links"><a href="#remind-later">Hide this for 30 days</a> |
					<a href="#disable-notice">Don\'t show this notice again</a></p>
					</div>
				';
		}
	}
}
add_action('apollo13framework_theme_notices', 'apollo13framework_expired_themes_notice' );



/**
 * Mark expired notice to be displayed later or disabled
 */
function apollo13framework_expired_notice_action() {
	$what_to_do = isset( $_POST['what'] )? sanitize_text_field( wp_unslash( $_POST['what'] ) ) : '';
	$new_value = '';

	if($what_to_do === 'remind-later'){
		$new_value = time();
	}
	elseif($what_to_do === 'disable-notice'){
		$new_value = 'disabled';
	}

	update_option('a13_'.A13FRAMEWORK_TPL_SLUG.'_theme_expired', $new_value);

	echo esc_html( $what_to_do );

	die(); // this is required to return a proper result
}
add_action( 'wp_ajax_apollo13framework_expired_notice_action', 'apollo13framework_expired_notice_action' );


//auto updates
if(apollo13framework_envato_valid_license()){
	if( in_array( A13FRAMEWORK_TPL_SLUG, array('a13-onelander', 'a13-onelander', 'a13-onelander') ) ){
		/** @noinspection PhpIncludeInspection */
		require_once( get_theme_file_path( 'advance/inc/theme-update-checker.php' ));
		new ThemeUpdateChecker(
			A13FRAMEWORK_TPL_SLUG,
			'http://apollo13.eu/themes_update/'.A13FRAMEWORK_TPL_SLUG.'/info.json'
		);
	}
}
