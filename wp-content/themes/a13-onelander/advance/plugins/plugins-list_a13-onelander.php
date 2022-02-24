<?php
//additional plugins for only if previously used
function apollo13framework_needed_plugins_onelander($plugins){

	//remove Visual composer as needed plugin
	foreach($plugins as $index => $plugin){
		if($plugin['slug'] === 'js_composer'){
			unset($plugins[$index]);
			continue;
		}

		//Revo Slider
		if($plugin['slug'] === 'revslider'){
			if ( class_exists('RevSliderFront') ) {
				$plugins[$index]['source'] = 'https://rifetheme.com/wp-content/themes/fatmoon/advance/plugins/revslider.zip';
			}
			else{
				unset($plugins[$index]);
			}
			continue;
		}
	}

	//add Elementor
	$plugins[] = apollo13framework_elementor_plugin_install_details();
	$plugins[] = apollo13framework_rife_elementor_extensions_plugin_install_details();

	return $plugins;
}

add_filter('apollo13framework_needed_plugins', 'apollo13framework_needed_plugins_onelander');