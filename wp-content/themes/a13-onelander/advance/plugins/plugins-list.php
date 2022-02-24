<?php


function apollo13framework_wpbakery_plugin_install_details(){
	return array(
		'name'     				=> esc_html__( 'WPBakery Page Builder', 'a13-onelander' ),
		'slug'     				=> 'js_composer', 
		'source'   				=> A13FRAMEWORK_TPL_PLUGINS.'/js_composer.zip', 
		'required' 				=> false, 
		'version' 				=> '6.7.0',
		'force_activation' 		=> false, 
		'force_deactivation' 	=> false,
	);
}

function apollo13framework_elementor_plugin_install_details(){
	return array(
		'name'     				=> esc_html__( 'Elementor', 'a13-onelander' ),
		'slug'     				=> 'elementor', 
		'required' 				=> false, 
		'version' 				=> '1.9.1', 
		'force_activation' 		=> false, 
		'force_deactivation' 	=> false,
	);
}

function apollo13framework_rife_elementor_extensions_plugin_install_details(){
	return array(
		'name'     				=> esc_html__( 'Rife Elementor Extensions &amp; Templates', 'a13-onelander' ),
		'slug'     				=> 'rife-elementor-extensions',
		'required' 				=> false,
		'version' 				=> '1.0.1',
		'force_activation' 		=> false,
		'force_deactivation' 	=> false,
	);
}

function apollo13framework_revoslider_plugin_install_details(){
	return array(
		'name'     				=> esc_html__( 'Revolution Slider', 'a13-onelander' ),
		'slug'     				=> 'revslider',
		'source'   				=> A13FRAMEWORK_TPL_PLUGINS.'/revslider.zip',
		'required' 				=> false,
		'version' 				=> '6.5.7',
		'force_activation' 		=> false,
		'force_deactivation'    => false,
	);
}

function apollo13framework_required_plugins_list(){
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'     				=> esc_html__( 'Apollo13 Framework Extensions', 'a13-onelander' ),
			'slug'     				=> 'apollo13-framework-extensions',
			'required' 				=> false,
			'version' 				=> A13FRAMEWORK_MIN_COMPANION_VERSION,
			'force_activation' 		=> false, 
			'force_deactivation' 	=> false,
		)
	);

	//commercial plugins
	if( file_exists(get_theme_file_path( 'advance/plugins/envy-plugins.php' )) ) {
		require_once(get_theme_file_path( 'advance/plugins/envy-plugins.php' ));
	}

	//include special plugins list for this theme
	if( file_exists(get_theme_file_path( 'advance/plugins/plugins-list_'.A13FRAMEWORK_TPL_SLUG.'.php' )) ) {
		require_once(get_theme_file_path( 'advance/plugins/plugins-list_'.A13FRAMEWORK_TPL_SLUG.'.php' ));
	}

	//any other special plugins for this theme?
	return apply_filters('apollo13framework_needed_plugins', $plugins);
}

/**
 * TGMPA plugin installer config
 */
function apollo13framework_register_required_plugins() {
	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'default_path' => A13FRAMEWORK_TPL_PLUGINS_DIR,
		// Default absolute path to pre-packaged plugins
		'is_automatic' => true,
		// Automatically activate plugins after installation or not
	);

	tgmpa(apollo13framework_required_plugins_list(), $config);
}


add_action('tgmpa_register', 'apollo13framework_register_required_plugins');