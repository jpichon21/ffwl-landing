<?php

/**
 * make sure child theme style.css will be loaded as last file before user.css
 */
function a13_child_style(){
    global $wp_styles;

    //get current user.css dependencies
    $user_css_deps = $wp_styles->registered['a13-user-css']->deps;

    //register child theme style.css and add it with dependencies for user.css, to be sure it will be loaded after all other style files
    //it is useful for doing easier style overwrites
    wp_register_style('child-style', get_stylesheet_directory_uri(). '/style.css', $user_css_deps, A13FRAMEWORK_THEME_VER);

    //add child theme style.css as also needed for user.css
    array_push($wp_styles->registered['a13-user-css']->deps, 'child-style');
}
//register it later then parent theme styles
add_action('wp_enqueue_scripts', 'a13_child_style', 27);

/*
 * Add here your functions below, and overwrite native theme functions
 */
