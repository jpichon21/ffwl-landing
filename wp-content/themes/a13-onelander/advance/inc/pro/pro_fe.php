<?php
//features that are only available in Pro Themes
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//make usage of maintenance mode if plugin is available
if( function_exists('a13fe_waiting_page')){
	add_action( 'apollo13framework_before_html', 'apollo13framework_before_any_html' );

	function apollo13framework_before_any_html(){
		if( !is_user_logged_in() ){
			a13fe_waiting_page();
		}
	}
}