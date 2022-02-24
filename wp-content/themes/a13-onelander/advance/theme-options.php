<?php

function apollo13framework_setup_theme_options() {
	global $apollo13framework_a13;

	//get all cursors
	$cursors = array(
		'christmas.png'         => 'christmas.png',
		'empty_black.png'       => 'empty_black.png',
		'empty_black_white.png' => 'empty_black_white.png',
		'superior_cursor.png'   => 'superior_cursor.png'
	);
	$apollo13framework_a13->set_settings_set( 'cursors', $cursors );

	//get all menu effects
	$menu_effects = array(
		'none'      => esc_html__( 'None', 'a13-onelander' ),
		'show_icon' => esc_html__( 'Show icon', 'a13-onelander' )
	);
	$dir          = get_theme_file_path( 'css/menu-effects' );
	if ( is_dir( $dir ) ) {
		//The GLOB_BRACE flag is not available on some non GNU systems, like Solaris. So we use merge:-)
		foreach ( (array) glob( $dir . '/*.css' ) as $file ) {
			$name                  = basename( $file, '.css' );
			$menu_effects[ $name ] = $name;
		}
	}
	$apollo13framework_a13->set_settings_set( 'menu_effects', $menu_effects );

	//get all custom sidebars
	$header_sidebars = $apollo13framework_a13->get_option( 'custom_sidebars' );
	if ( ! is_array( $header_sidebars ) ) {
		$header_sidebars = array();
	}
	//create 2 arrays for different purpose
	$header_sidebars            = array_merge( array( 'off' => esc_html__( 'Off', 'a13-onelander' ) ), $header_sidebars );
	$header_sidebars_off_global = array_merge( array( 'G' => esc_html__( 'Global settings', 'a13-onelander' ) ), $header_sidebars );
	//re-indexing these arrays
	array_unshift( $header_sidebars, null );
	unset( $header_sidebars[0] );
	array_unshift( $header_sidebars_off_global, null );
	unset( $header_sidebars_off_global[0] );
	$apollo13framework_a13->set_settings_set( 'header_sidebars', $header_sidebars );
	$apollo13framework_a13->set_settings_set( 'header_sidebars_off_global', $header_sidebars_off_global );

	$on_off = array(
		'on'  => esc_html__( 'Enable', 'a13-onelander' ),
		'off' => esc_html__( 'Disable', 'a13-onelander' ),
	);
	$apollo13framework_a13->set_settings_set( 'on_off', $on_off );

	$font_weights = array(
		'100'    => esc_html__( '100', 'a13-onelander' ),
		'200'    => esc_html__( '200', 'a13-onelander' ),
		'300'    => esc_html__( '300', 'a13-onelander' ),
		'normal' => esc_html__( 'Normal 400', 'a13-onelander' ),
		'500'    => esc_html__( '500', 'a13-onelander' ),
		'600'    => esc_html__( '600', 'a13-onelander' ),
		'bold'   => esc_html__( 'Bold 700', 'a13-onelander' ),
		'800'    => esc_html__( '800', 'a13-onelander' ),
		'900'    => esc_html__( '900', 'a13-onelander' ),
	);
	$apollo13framework_a13->set_settings_set( 'font_weights', $font_weights );

	$font_transforms = array(
		'none'      => esc_html__( 'None', 'a13-onelander' ),
		'uppercase' => esc_html__( 'Uppercase', 'a13-onelander' ),
	);
	$apollo13framework_a13->set_settings_set( 'font_transforms', $font_transforms );

	$text_align = array(
		'left'   => esc_html__( 'Left', 'a13-onelander' ),
		'center' => esc_html__( 'Center', 'a13-onelander' ),
		'right'  => esc_html__( 'Right', 'a13-onelander' ),
	);
	$apollo13framework_a13->set_settings_set( 'text_align', $text_align );

	$image_fit = array(
		'cover'    => esc_html__( 'Cover', 'a13-onelander' ),
		'contain'  => esc_html__( 'Contain', 'a13-onelander' ),
		'fitV'     => esc_html__( 'Fit Vertically', 'a13-onelander' ),
		'fitH'     => esc_html__( 'Fit Horizontally', 'a13-onelander' ),
		'center'   => esc_html__( 'Just center', 'a13-onelander' ),
		'repeat'   => esc_html__( 'Repeat', 'a13-onelander' ),
		'repeat-x' => esc_html__( 'Repeat X', 'a13-onelander' ),
		'repeat-y' => esc_html__( 'Repeat Y', 'a13-onelander' ),
	);
	$apollo13framework_a13->set_settings_set( 'image_fit', $image_fit );

	$content_layouts = array(
		'center'        => esc_html__( 'Center fixed width', 'a13-onelander' ),
		'left'          => esc_html__( 'Left fixed width', 'a13-onelander' ),
		'left_padding'  => esc_html__( 'Left fixed width + padding', 'a13-onelander' ),
		'right'         => esc_html__( 'Right fixed width', 'a13-onelander' ),
		'right_padding' => esc_html__( 'Right fixed width + padding', 'a13-onelander' ),
		'full_fixed'    => esc_html__( 'Full width + fixed content', 'a13-onelander' ),
		'full_padding'  => esc_html__( 'Full width + padding', 'a13-onelander' ),
		'full'          => esc_html__( 'Full width', 'a13-onelander' ),
	);
	$apollo13framework_a13->set_settings_set( 'content_layouts', $content_layouts );

	$parallax_types = array(
		"tb"   => esc_html__( 'top to bottom', 'a13-onelander' ),
		"bt"   => esc_html__( 'bottom to top', 'a13-onelander' ),
		"lr"   => esc_html__( 'left to right', 'a13-onelander' ),
		"rl"   => esc_html__( 'right to left', 'a13-onelander' ),
		"tlbr" => esc_html__( 'top-left to bottom-right', 'a13-onelander' ),
		"trbl" => esc_html__( 'top-right to bottom-left', 'a13-onelander' ),
		"bltr" => esc_html__( 'bottom-left to top-right', 'a13-onelander' ),
		"brtl" => esc_html__( 'bottom-right to top-left', 'a13-onelander' ),
	);
	$apollo13framework_a13->set_settings_set( 'parallax_types', $parallax_types );

	$header_color_variants = array(
		'normal' => esc_html__( 'Normal', 'a13-onelander' ),
		'light'  => esc_html__( 'Light', 'a13-onelander' ),
		'dark'   => esc_html__( 'Dark', 'a13-onelander' ),
	);
	$apollo13framework_a13->set_settings_set( 'header_color_variants', $header_color_variants );

	$content_under_header = array(
		'content' => esc_html__( 'Yes, hide the content', 'a13-onelander' ),
		'title'   => esc_html__( 'Yes, hide the content and add top padding to the outside title bar.', 'a13-onelander' ),
		'off'     => esc_html__( 'Turn it off', 'a13-onelander' ),
	);
	$apollo13framework_a13->set_settings_set( 'content_under_header', $content_under_header );

	$social_colors = array(
		'black'            => esc_html__( 'Black', 'a13-onelander' ),
		'color'            => esc_html__( 'Color', 'a13-onelander' ),
		'white'            => esc_html__( 'White', 'a13-onelander' ),
		'semi-transparent' => esc_html__( 'Semi transparent', 'a13-onelander' ),
	);
	$apollo13framework_a13->set_settings_set( 'social_colors', $social_colors );

	$bricks_hover = array(
		'cross'      => esc_html__( 'Show cross', 'a13-onelander' ),
		'drop'       => esc_html__( 'Drop', 'a13-onelander' ),
		'shift'      => esc_html__( 'Shift', 'a13-onelander' ),
		'pop'        => esc_html__( 'Pop text', 'a13-onelander' ),
		'border'     => esc_html__( 'Border', 'a13-onelander' ),
		'scale-down' => esc_html__( 'Scale down', 'a13-onelander' ),
		'none'       => esc_html__( 'None', 'a13-onelander' ),
	);
	$apollo13framework_a13->set_settings_set( 'bricks_hover', $bricks_hover );

	//tags allowed in descriptions
	$valid_tags = array(
		'a'      => array(
			'href' => array(),
		),
		'br'     => array(),
		'code'   => array(),
		'em'     => array(),
		'strong' => array(),
	);
	$apollo13framework_a13->set_settings_set( 'valid_tags', $valid_tags );

	/*
	 *
	 * ---> START SECTIONS
	 *
	 */

//GENERAL SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'General settings', 'a13-onelander' ),
		'desc'     => '',
		'id'       => 'section_general_settings',
		'icon'     => 'el el-adjust-alt',
		'priority' => 3,
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Front page', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_general_front_page',
		'icon'       => 'fa fa-home',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'fp_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'What to show on the front page?', 'a13-onelander' ),
				/* translators: %s: URL */
				'description' => sprintf( wp_kses( __( 'If you choose <strong>Page</strong> then make sure that in <a href="%s">WordPress Homepage Settings</a> you have selected <strong>A static page</strong>, that you wish to use as the front page.', 'a13-onelander' ), $valid_tags ), 'javascript:wp.customize.section( \'static_front_page\' ).focus();' ),
				'options'     => array(
					'page'         => esc_html__( 'Page', 'a13-onelander' ),
					'blog'         => esc_html__( 'Blog', 'a13-onelander' ),
					'single_album' => esc_html__( 'Single album', 'a13-onelander' ),
					'albums_list'  => esc_html__( 'Albums list', 'a13-onelander' ),
					'single_work'  => esc_html__( 'Single work', 'a13-onelander' ),
					'works_list'   => esc_html__( 'Works list', 'a13-onelander' ),
				),
				'default'     => 'page',

			),
			array(
				'id'       => 'fp_album',
				'type'     => 'wp_dropdown_albums',
				'title'    => esc_html__( 'Select album to use as the front page', 'a13-onelander' ),
				'required' => array( 'fp_variant', '=', 'single_album' ),

			),
			array(
				'id'       => 'fp_work',
				'type'     => 'wp_dropdown_works',
				'title'    => esc_html__( 'Select work to use as the front page', 'a13-onelander' ),
				'required' => array( 'fp_variant', '=', 'single_work' ),

			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'General layout', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_main_settings',
		'icon'       => 'fa fa-wrench',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'appearance_body_image',
				'type'    => 'image',
				'title'   => esc_html__( 'Background image', 'a13-onelander' ),
				'partial' => array(
					'selector'            => '.page-background',
					'container_inclusive' => true,
					'settings'            => array(
						'appearance_body_image',
						'appearance_body_image_fit',
						'appearance_body_bg_color',
					),
					'render_callback'     => 'apollo13framework_page_background',
				),
			),
			array(
				'id'      => 'appearance_body_image_fit',
				'type'    => 'select',
				'title'   => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options' => $image_fit,
				'default' => 'cover',
				'partial' => true,
			),
			array(
				'id'      => 'appearance_body_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'a13-onelander' ),
				'default' => '#999999',
				'partial' => true,
			),
			array(
				'id'      => 'layout_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Layout', 'a13-onelander' ),
				'options' => array(
					'full'     => esc_html__( 'Full width', 'a13-onelander' ),
					'bordered' => esc_html__( 'Framed', 'a13-onelander' ),
					'boxed'    => esc_html__( 'Boxed', 'a13-onelander' ),
				),
				'default' => 'full',
			),
			array(
				'id'       => 'boxed_layout_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Boxed layout', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => '#ffffff',
				'required' => array( 'layout_type', '=', 'boxed' ),
				'js'       => true,
			),
			array(
				'id'       => 'theme_borders_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Border color', 'a13-onelander' ),
				'default'  => '#ffffff',
				'required' => array( 'layout_type', '=', 'bordered' ),
				'js'       => true,
			),
			array(
				'id'       => 'theme_borders',
				'type'     => 'button-set',
				'multi'    => true,
				'title'    => esc_html__( 'Borders to show', 'a13-onelander' ),
				'options'  => array(
					'top'    => esc_html__( 'Top', 'a13-onelander' ),
					'right'  => esc_html__( 'Right', 'a13-onelander' ),
					'bottom' => esc_html__( 'Bottom', 'a13-onelander' ),
					'left'   => esc_html__( 'Left', 'a13-onelander' ),
				),
				'default'  => array( 'top', 'left', 'bottom', 'right' ),
				'required' => array( 'layout_type', '=', 'bordered' ),
				'js'       => true,
				'sanitize' => 'button_set_multi'
//				'partial' => array(
//					'selector' => '.theme-borders div',
////					'render_callback' => false,
//				)
			),
			array(
				'id'      => 'custom_cursor',
				'type'    => 'radio',
				'title'   => esc_html__( 'Mouse cursor', 'a13-onelander' ),
				'options' => array(
					'default' => esc_html__( 'Normal', 'a13-onelander' ),
					'select'  => esc_html__( 'Predefined', 'a13-onelander' ),
					'custom'  => esc_html__( 'Custom', 'a13-onelander' ),
				),
				'default' => 'default',
				'js'      => true,
			),
			array(
				'id'       => 'cursor_select',
				'type'     => 'select',
				'title'    => esc_html__( 'Cursor', 'a13-onelander' ),
				'options'  => $cursors,
				'default'  => 'empty_black_white.png',
				'required' => array( 'custom_cursor', '=', 'select' ),
				'js'       => true,
			),
			array(
				'id'       => 'cursor_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Custom cursor image', 'a13-onelander' ),
				'required' => array( 'custom_cursor', '=', 'custom' ),
				'js'       => true,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Page preloader', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_page_preloader',
		'icon'       => 'fa fa-spinner',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'preloader',
				'type'        => 'radio',
				'title'       => esc_html__( 'Page preloader', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
				'js'          => true,
			),
			array(
				'id'          => 'preloader_hide_event',
				'type'        => 'radio',
				'title'       => esc_html__( 'Hide event', 'a13-onelander' ),
				'description' => wp_kses( __( '<strong>On load</strong> is called when the whole site, with all the images, is loaded, which can take a lot of time on heavier sites, and even more time on mobile devices. Also,  it can sometimes hang and never hide the preloader, when there is a problem with some resource. <br /><strong>On DOM ready</strong> is called when the whole HTML with CSS is loaded, so after the preloader is hidden, you can still see the loading of images. This is a much safer option.', 'a13-onelander' ), $valid_tags ),
				'options'     => array(
					'ready' => esc_html__( 'On DOM ready', 'a13-onelander' ),
					'load'  => esc_html__( 'On load', 'a13-onelander' ),
				),
				'default'     => 'ready',
				'required'    => array( 'preloader', '=', 'on' ),
				'js'          => true,
			),
			array(
				'id'       => 'preloader_bg_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'a13-onelander' ),
				'required' => array( 'preloader', '=', 'on' ),
				'partial'  => array(
					'selector'            => '#preloader',
					'container_inclusive' => true,
					'settings'            => array(
						'preloader_bg_image',
						'preloader_bg_image_fit',
						'preloader_bg_color',
						'preloader_type',
						'preloader_color',
					),
					'render_callback'     => 'apollo13framework_page_preloader',
				),
			),
			array(
				'id'       => 'preloader_bg_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'preloader', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'preloader_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'preloader', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'preloader_type',
				'type'     => 'select',
				'title'    => esc_html__( 'Type', 'a13-onelander' ),
				'options'  => array(
					'none'              => esc_html__( 'none', 'a13-onelander' ),
					'atom'              => esc_html__( 'Atom', 'a13-onelander' ),
					'flash'             => esc_html__( 'Flash', 'a13-onelander' ),
					'indicator'         => esc_html__( 'Indicator', 'a13-onelander' ),
					'radar'             => esc_html__( 'Radar', 'a13-onelander' ),
					'circle_illusion'   => esc_html__( 'Circle Illusion', 'a13-onelander' ),
					'square_of_squares' => esc_html__( 'Square of squares', 'a13-onelander' ),
					'plus_minus'        => esc_html__( 'Plus minus', 'a13-onelander' ),
					'hand'              => esc_html__( 'Hand', 'a13-onelander' ),
					'blurry'            => esc_html__( 'Blurry', 'a13-onelander' ),
					'arcs'              => esc_html__( 'Arcs', 'a13-onelander' ),
					'tetromino'         => esc_html__( 'Tetromino', 'a13-onelander' ),
					'infinity'          => esc_html__( 'Infinity', 'a13-onelander' ),
					'cloud_circle'      => esc_html__( 'Cloud circle', 'a13-onelander' ),
					'dots'              => esc_html__( 'Dots', 'a13-onelander' ),
					'jet_pack_man'      => esc_html__( 'Jet-Pack-Man', 'a13-onelander' ),
					'circle'            => 'Circle'
				),
				'default'  => 'flash',
				'required' => array( 'preloader', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'preloader_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Animation color', 'a13-onelander' ),
				'required' => array(
					array( 'preloader', '=', 'on' ),
					array( 'preloader_type', '!=', 'tetromino' ),
					array( 'preloader_type', '!=', 'blurry' ),
					array( 'preloader_type', '!=', 'square_of_squares' ),
					array( 'preloader_type', '!=', 'circle_illusion' ),
				),
				'default'  => '',
				'partial'  => true,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Cookie message', 'a13-onelander' ),
		'id'         => 'subsection_top_message',
		'icon'       => 'fa fa-cog',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'top_message',
				'type'    => 'radio',
				'title'   => esc_html__( 'Cookie message', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'off',
				'js'      => true,
			),
			array(
				'id'      => 'top_message_position',
				'type'    => 'radio',
				'title'   => esc_html__( 'Position', 'a13-onelander' ),
				'options' => array(
					'top'    => esc_html__( 'Top', 'a13-onelander' ),
					'bottom' => esc_html__( 'Bottom', 'a13-onelander' ),
				),
				'default' => 'top',
				'required' => array( 'top_message', '=', 'on' ),
				'js'      => true,
			),
			array(
				'id'       => 'top_message_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => '#ffffff',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => array(
					'selector'            => '#top-closable-message',
					'container_inclusive' => true,
					'settings'            => array(
						'top_message_position',
						'top_message_bg_color',
						'top_message_text_color',
						'top_message_link_color',
						'top_message_link_color_hover',
						'top_message_text_transform',
						'top_message_text',
						'top_message_button',
					),
					'render_callback'     => 'apollo13framework_cookie_message',
				),
			),
			array(
				'title'    => esc_html__( 'Text color', 'a13-onelander' ),
				'type'     => 'color',
				'id'       => 'top_message_text_color',
				'default'  => '#000000',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => true,

			),
			array(
				'title'    => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'type'     => 'color',
				'id'       => 'top_message_link_color',
				'default'  => '',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'top_message_link_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'top_message_text_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'a13-onelander' ),
				'options'  => $font_transforms,
				'default'  => 'none',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'top_message_text',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Content', 'a13-onelander' ),
				'desc'     => esc_html__( 'You can use HTML here.', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'top_message', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'          => 'top_message_button',
				'type'        => 'text',
				'title'       => esc_html__( 'Closing button', 'a13-onelander' ). ' : ' .esc_html__( 'Text', 'a13-onelander' ),
				'description' => esc_html__( 'If no text is given, "X" will appear instead.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'top_message', '=', 'on' ),
				'partial'     => true,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Theme Header', 'a13-onelander' ),
		'desc'       => esc_html__( 'Theme header is a place where you usually find the logo of your site, main menu, and a few other elements.', 'a13-onelander' ),
		'id'         => 'subsection_header',
		'icon'       => 'fa fa-ellipsis-h',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'header_switch',
				'type'    => 'radio',
				'title'   => esc_html__( 'Theme Header', 'a13-onelander' ),
				'description' => esc_html__( 'If you do not plan to use theme header or want to replace it with something else, just disable it here.', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			)
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Footer', 'a13-onelander' ),
		'id'         => 'subsection_footer',
		'icon'       => 'fa fa-ellipsis-h',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'footer_switch',
				'type'    => 'radio',
				'title'   => esc_html__( 'Footer', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
				'partial'     => array(
					'selector'            => '#footer',
					'container_inclusive' => true,
					'settings'            => array(
						'footer_switch',
						'footer_unravel_effect',
						'footer_widgets_columns',
						'footer_text',
						'footer_privacy_link',
						'footer_content_width',
						'footer_content_style',
						'footer_bg_color',
						'footer_lower_bg_color',
						'footer_lower_bg_color',
						'footer_widgets_color',
						'footer_separator',
						'footer_separator_color',
						'footer_font_size',
						'footer_widgets_font_size',
						'footer_font_color',
						'footer_link_color',
						'footer_hover_color',
					),
					'render_callback'     => 'apollo13framework_theme_footer',
				),
			),
			array(
				'id'          => 'footer_unravel_effect',
				'type'        => 'radio',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ) .' '. esc_html__( 'It makes the footer uncover while you are scrolling the page to the bottom.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array(
					array( 'footer_switch', '=', 'on' ),
				),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_widgets_columns',
				'type'     => 'select',
				'title'    => esc_html__( 'Widgets columns number', 'a13-onelander' ),
				'options'  => array(
					'1' => esc_html__( '1', 'a13-onelander' ),
					'2' => esc_html__( '2', 'a13-onelander' ),
					'3' => esc_html__( '3', 'a13-onelander' ),
					'4' => esc_html__( '4', 'a13-onelander' ),
					'5' => esc_html__( '5', 'a13-onelander' ),
				),
				'default'  => '3',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'          => 'footer_text',
				'type'        => 'textarea',
				'title'       => esc_html__( 'Content', 'a13-onelander' ),
				'description' => esc_html__( 'You can use HTML here.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_privacy_link',
				'type'        => 'radio',
				'title'       => esc_html__( 'Privacy Policy Link', 'a13-onelander' ),
				'description' => esc_html__( 'Since WordPress 4.9.6 there is an option to set Privacy Policy page. If you enable this option it will display a link to it in the footer after footer content.', 'a13-onelander' ).' <a href="'.esc_url( admin_url( 'privacy.php' ) ).'">'.esc_html__( 'Here you can set your Privacy Policy page', 'a13-onelander' ).'</a>',
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_socials',
				'type'        => 'radio',
				'title'       => esc_html__( 'Social icons', 'a13-onelander' ),
				/* translators: %s: URL */
				'description' => sprintf( wp_kses( __( 'If you need to edit social links go to <a href="%s">Social icons</a> settings.', 'a13-onelander' ), $valid_tags ), 'javascript:wp.customize.section( \'section_social\' ).focus();' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => array(
					'selector'            => '.f-links',
					'container_inclusive' => true,
					'settings'            => array(
						'footer_socials',
						'footer_socials_color',
						'footer_socials_color_hover',
					),
					'render_callback'     => 'footer_socials'
				),
			),
			array(
				'id'       => 'footer_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'footer_switch', '=', 'on' ),
					array( 'footer_socials', '=', 'on' ),
				),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'footer_switch', '=', 'on' ),
					array( 'footer_socials', '=', 'on' ),
				),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_content_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Content', 'a13-onelander' ). ' : ' .esc_html__( 'Width', 'a13-onelander' ),
				'options'  => array(
					'narrow' => esc_html__( 'Narrow', 'a13-onelander' ),
					'full'   => esc_html__( 'Full width', 'a13-onelander' ),
				),
				'default'  => 'narrow',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_content_style',
				'type'     => 'radio',
				'title'    => esc_html__( 'Content', 'a13-onelander' ). ' : ' .esc_html__( 'Style', 'a13-onelander' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic', 'a13-onelander' ),
					'centered' => esc_html__( 'Centered', 'a13-onelander' ),
				),
				'default'  => 'classic',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_lower_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Lower part', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'desc'     => esc_html__( 'If you want to have a different color in the lower part than in the footer widgets.', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_widgets_color',
				'type'     => 'radio',
				'title'    => esc_html__( 'Widgets colors', 'a13-onelander' ),
				'desc'     => esc_html__( 'Depending on what background you have set up, choose proper option.', 'a13-onelander' ),
				'options'  => array(
					'dark-sidebar'  => esc_html__( 'On dark', 'a13-onelander' ),
					'light-sidebar' => esc_html__( 'On light', 'a13-onelander' ),
				),
				'default'  => 'dark-sidebar',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_separator',
				'type'     => 'radio',
				'title'    => esc_html__( 'Separator between widgets and footer content', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_separator_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Separator', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'default'  => '',
				'required' => array(
					array( 'footer_switch', '=', 'on' ),
					array( 'footer_separator', '=', 'on' ),
				),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Lower part', 'a13-onelander' ). ' : ' .esc_html__( 'Font size', 'a13-onelander' ),
				'default'  => 10,
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'       => 'footer_widgets_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Widgets part', 'a13-onelander' ). ' : ' .esc_html__( 'Font size', 'a13-onelander' ),
				'default'  => 10,
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'required' => array( 'footer_switch', '=', 'on' ),
				'partial'  => true,
			),
			array(
				'id'          => 'footer_font_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Lower part', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'description' => esc_html__( 'Does not work for footer widgets.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_link_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Lower part', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'description' => esc_html__( 'Does not work for footer widgets.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
			array(
				'id'          => 'footer_hover_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Lower part', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'description' => esc_html__( 'Does not work for footer widgets.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'footer_switch', '=', 'on' ),
				'partial'     => true,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Hidden sidebar', 'a13-onelander' ),
		'desc'       => esc_html__( 'It is active only if it contains active widgets. After activation, displays the opening button in the header.', 'a13-onelander' ),
		'id'         => 'subsection_hidden_sidebar',
		'icon'       => 'fa fa-columns',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'      => 'hidden_sidebar_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'      => 'hidden_sidebar_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'a13-onelander' ),
				'default' => 10,
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
			),
			array(
				'id'          => 'hidden_sidebar_widgets_color',
				'type'        => 'radio',
				'title'       => esc_html__( 'Widgets colors', 'a13-onelander' ),
				'description' => esc_html__( 'Depending on what background you have set up, choose proper option.', 'a13-onelander' ),
				'options'     => array(
					'dark-sidebar'  => esc_html__( 'On dark', 'a13-onelander' ),
					'light-sidebar' => esc_html__( 'On light', 'a13-onelander' ),
				),
				'default'     => 'dark-sidebar',
			),
			array(
				'id'      => 'hidden_sidebar_side',
				'type'    => 'radio',
				'title'   => esc_html__( 'Side', 'a13-onelander' ),
				'options' => array(
					'left'  => esc_html__( 'Left', 'a13-onelander' ),
					'right' => esc_html__( 'Right', 'a13-onelander' ),
				),
				'default' => 'left',
			),
			array(
				'id'      => 'hidden_sidebar_effect',
				'type'    => 'select',
				'title'   => esc_html__( 'Opening effect', 'a13-onelander' ),
				'options' => array(
					'1' => esc_html__( 'Slide in on top', 'a13-onelander' ),
					'2' => esc_html__( 'Reveal', 'a13-onelander' ),
					'3' => esc_html__( 'Push', 'a13-onelander' ),
					'4' => esc_html__( 'Slide along', 'a13-onelander' ),
					'5' => esc_html__( 'Reverse slide out', 'a13-onelander' ),
					'6' => esc_html__( 'Fall down', 'a13-onelander' ),
				),
				'default' => '2',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Fonts settings', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_fonts_settings',
		'icon'       => 'fa fa-font',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'nav_menu_fonts',
				'type'    => 'font',
				'title'   => esc_html__( 'Font for main navigation menu and overlay menu:', 'a13-onelander' ),
				'default' => array(
					'font-family'    => '-apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif',
					'word-spacing'   => 'normal',
					'letter-spacing' => 'normal'
				),
			),
			array(
				'id'      => 'titles_fonts',
				'type'    => 'font',
				'title'   => esc_html__( 'Font for Titles/Headings:', 'a13-onelander' ),
				'default' => array(
					'font-family'    => '-apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif',
					'word-spacing'   => 'normal',
					'letter-spacing' => 'normal'
				),
			),
			array(
				'id'      => 'normal_fonts',
				'type'    => 'font',
				'title'   => esc_html__( 'Font for normal(content) text:', 'a13-onelander' ),
				'default' => array(
					'font-family'    => '-apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif',
					'word-spacing'   => 'normal',
					'letter-spacing' => 'normal'
				),
			),
			array(
				'id'      => 'logo_fonts',
				'type'    => 'font',
				'title'   => esc_html__( 'Font for text logo:', 'a13-onelander' ),
				'default' => array(
					'font-family'    => '-apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif',
					'word-spacing'   => 'normal',
					'letter-spacing' => 'normal'
				),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Headings', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_heading_styles',
		'icon'       => 'fa fa-header',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'      => 'headings_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'      => 'headings_color_hover',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'      => 'headings_weight',
				'type'    => 'select',
				'title'   => esc_html__( 'Font weight', 'a13-onelander' ),
				'options' => $font_weights,
				'default' => 'bold',
			),
			array(
				'id'      => 'headings_transform',
				'type'    => 'radio',
				'title'   => esc_html__( 'Text transform', 'a13-onelander' ),
				'options' => $font_transforms,
				'default' => 'uppercase',
			),
			array(
				'id'      => 'page_title_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Main titles', 'a13-onelander' ). ' : ' .esc_html__( 'Font size', 'a13-onelander' ),
				'default' => 36,
				'min'     => 10,
				'step'    => 1,
				'max'     => 60,
				'unit'    => 'px',
			),
			array(
				'id'          => 'page_title_font_size_768',
				'type'        => 'slider',
				'title'       => esc_html__( 'Main titles', 'a13-onelander' ). ' : ' .esc_html__( 'Font size', 'a13-onelander' ). ' - ' .esc_html__( 'on mobile devices', 'a13-onelander' ),
				'description' => esc_html__( 'It will be used on devices less than 768 pixels wide.', 'a13-onelander' ),
				'min'         => 10,
				'max'         => 60,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 32,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Content', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_content_styles',
		'icon'       => 'fa fa-align-left',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'content_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background color', 'a13-onelander' ),
				'description' => esc_html__( 'It will change the default white background color that is set under content on pages, blog, posts, works, and albums.', 'a13-onelander' ),
				'default'     => '#ffffff',
			),
			array(
				'id'      => 'content_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'a13-onelander' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'content_link_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'      => 'content_link_color_hover',
				'type'    => 'color',
				'title'   => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'      => 'content_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'a13-onelander' ),
				'default' => 16,
				'min'     => 10,
				'step'    => 1,
				'max'     => 30,
				'unit'    => 'px',
			),
			array(
				'id'          => 'first_paragraph',
				'type'        => 'radio',
				'title'       => esc_html__( 'First paragraph', 'a13-onelander' ). ' : ' .esc_html__( 'Highlight', 'a13-onelander' ),
				'description' => esc_html__( 'If enabled, it highlights(font size and color) the first paragraph in the content(blog, post, page).', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'       => 'first_paragraph_color',
				'type'     => 'color',
				'title'    => esc_html__( 'First paragraph', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'first_paragraph', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Social icons', 'a13-onelander' ),
		'desc'       => esc_html__( 'These icons will be used in various places across theme if you decide to activate them.', 'a13-onelander' ),
		'id'         => 'section_social',
		'icon'       => 'fa fa-facebook-official',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'socials_variant',
				'type'    => 'radio',
				'title'   => esc_html__( 'Type of icons', 'a13-onelander' ),
				'options' => array(
					'squares'    => esc_html__( 'Squares', 'a13-onelander' ),
					'circles'    => esc_html__( 'Circles', 'a13-onelander' ),
					'icons-only' => esc_html__( 'Only icons', 'a13-onelander' ),
				),
				'default' => 'squares',
			),
			array(
				'id'          => 'social_services',
				'type'        => 'socials',
				'title'       => esc_html__( 'Links', 'a13-onelander' ),
				'description' => esc_html__( 'Drag and drop to change order of icons. Only filled links will show up as social icons.', 'a13-onelander' ),
				'label'       => false,
				'options'     => $apollo13framework_a13->get_social_icons_list( 'names' ),
				'default'     => $apollo13framework_a13->get_social_icons_list( 'empty' )
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Lightbox settings', 'a13-onelander' ),
		'desc'       => esc_html__( 'If you wish to use some other plugin/script for images and items, you can switch off default theme lightbox. If you are planning to use different lightbox script instead, then you will have to do some extra work with scripting to make it work in every theme place.', 'a13-onelander' ),
		'id'         => 'subsection_lightbox',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'apollo_lightbox',
				'type'    => 'radio',
				'title'   => esc_html__( 'Theme lightbox', 'a13-onelander' ),
				'options' => array(
					'lightGallery' => esc_html__( 'Light Gallery', 'a13-onelander' ),
					'off'          => esc_html__( 'Disable', 'a13-onelander' ),
				),
				'default' => 'lightGallery',
			),
			array(
				'id'          => 'lightbox_single_post',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use theme lightbox for images in posts', 'a13-onelander' ),
				'description' => esc_html__( 'If enabled, the theme will use a lightbox to display images in the post content. To work properly, Images should link to "Media File".', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'          => 'lg_lightbox_mode',
				'type'        => 'select',
				'title'       => '['.esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' . esc_html__( 'Transition', 'a13-onelander' ) . ' : ' . esc_html__( 'Type', 'a13-onelander' ),
				'description' => esc_html__( 'Animation between slides.', 'a13-onelander' ),
				'options'     => array(
					'lg-slide'                    => 'lg-slide',
					'lg-fade'                     => 'lg-fade',
					'lg-zoom-in'                  => 'lg-zoom-in',
					'lg-zoom-in-big'              => 'lg-zoom-in-big',
					'lg-zoom-out'                 => 'lg-zoom-out',
					'lg-zoom-out-big'             => 'lg-zoom-out-big',
					'lg-zoom-out-in'              => 'lg-zoom-out-in',
					'lg-zoom-in-out'              => 'lg-zoom-in-out',
					'lg-soft-zoom'                => 'lg-soft-zoom',
					'lg-scale-up'                 => 'lg-scale-up',
					'lg-slide-circular'           => 'lg-slide-circular',
					'lg-slide-circular-vertical'  => 'lg-slide-circular-vertical',
					'lg-slide-vertical'           => 'lg-slide-vertical',
					'lg-slide-vertical-growth'    => 'lg-slide-vertical-growth',
					'lg-slide-skew-only'          => 'lg-slide-skew-only',
					'lg-slide-skew-only-rev'      => 'lg-slide-skew-only-rev',
					'lg-slide-skew-only-y'        => 'lg-slide-skew-only-y',
					'lg-slide-skew-only-y-rev'    => 'lg-slide-skew-only-y-rev',
					'lg-slide-skew'               => 'lg-slide-skew',
					'lg-slide-skew-rev'           => 'lg-slide-skew-rev',
					'lg-slide-skew-cross'         => 'lg-slide-skew-cross',
					'lg-slide-skew-cross-rev'     => 'lg-slide-skew-cross-rev',
					'lg-slide-skew-ver'           => 'lg-slide-skew-ver',
					'lg-slide-skew-ver-rev'       => 'lg-slide-skew-ver-rev',
					'lg-slide-skew-ver-cross'     => 'lg-slide-skew-ver-cross',
					'lg-slide-skew-ver-cross-rev' => 'lg-slide-skew-ver-cross-rev',
					'lg-lollipop'                 => 'lg-lollipop',
					'lg-lollipop-rev'             => 'lg-lollipop-rev',
					'lg-rotate'                   => 'lg-rotate',
					'lg-rotate-rev'               => 'lg-rotate-rev',
					'lg-tube'                     => 'lg-tube',
				),
				'default'     => 'lg-slide',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_speed',
				'type'     => 'slider',
				'title'    => '['.esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' . esc_html__( 'Transition', 'a13-onelander' ). ' : ' .esc_html__( 'Speed', 'a13-onelander' ),
				'min'      => 100,
				'max'      => 1000,
				'unit'     => 'ms',
				'default'  => '600',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'          => 'lg_lightbox_preload',
				'type'        => 'slider',
				'title'       => '['.esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' . esc_html__( 'Preload items', 'a13-onelander' ),
				'description' => esc_html__( 'How many previous and next items should be preloaded.', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 5,
				'unit'        => '',
				'default'     => '1',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_hide_delay',
				'type'     => 'slider',
				'title'    => '['.esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' .esc_html__( 'Delay of hiding the interface', 'a13-onelander' ),
				'min'      => 100,
				'max'      => 10000,
				'unit'     => 'ms',
				'default'  => '2000',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_autoplay_open',
				'type'     => 'radio',
				'title'    => '['.esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' .esc_html__( 'Autoplay', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_progressbar',
				'type'     => 'radio',
				'title'    => '['.esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' .esc_html__( 'Progress bar', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_autoplay_pause',
				'type'     => 'slider',
				'title'    => '['.esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' .esc_html__( 'Time between slides', 'a13-onelander' ),
				'min'      => 500,
				'max'      => 10000,
				'unit'     => 'ms',
				'default'  => '5000',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'          => 'lg_lightbox_controls',
				'type'        => 'radio',
				'title'       => '['.esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' .esc_html__( 'Slides navigation', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_download',
				'type'     => 'radio',
				'title'    => '['.esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' .esc_html__( 'Controls', 'a13-onelander' ). ' : ' .esc_html__( 'Download', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_full_screen',
				'type'     => 'radio',
				'title'    => '['.esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' .esc_html__( 'Controls', 'a13-onelander' ). ' : ' .esc_html__( 'Full screen', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_zoom',
				'type'     => 'radio',
				'title'    => '['.esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' .esc_html__( 'Controls', 'a13-onelander' ). ' : ' .esc_html__( 'Zooming', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_autoplay',
				'type'     => 'radio',
				'title'    => '[' . esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' . esc_html__( 'Controls', 'a13-onelander' ). ' : ' .esc_html__( 'Autoplay', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_share',
				'type'     => 'radio',
				'title'    => '[' . esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' . esc_html__( 'Controls', 'a13-onelander' ) . ' : ' . esc_html__( 'Social icons', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_counter',
				'type'     => 'radio',
				'title'    => '['.esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' .esc_html__( 'Counter', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_thumbnail',
				'type'     => 'radio',
				'title'    => '['.esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' .esc_html__( 'Thumbnails', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'          => 'lg_lightbox_show_thumbs',
				'type'        => 'radio',
				'title'       => '[' . esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' . esc_html__( 'Thumbnails', 'a13-onelander' ) . ' : ' . esc_html__( 'Open', 'a13-onelander' ),
				'description' => __( 'If thumbnails are enabled, should they be open by default?', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_bg_color',
				'type'     => 'color',
				'title'    => '[' . esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' . esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'          => 'lg_lightbox_elements_bg_color',
				'type'        => 'color',
				'title'       => '[' . esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' . esc_html__( 'Semi transparent elements', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'default'     => '#000000',
				'required'    => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_elements_color',
				'type'     => 'color',
				'title'    => '[' . esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' . esc_html__( 'Semi transparent elements', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_elements_color_hover',
				'type'     => 'color',
				'title'    => '[' . esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' . esc_html__( 'Semi transparent elements', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_elements_text_color',
				'type'     => 'color',
				'title'    => '[' . esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' . esc_html__( 'Semi transparent elements', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_thumbs_bg_color',
				'type'     => 'color',
				'title'    => '[' . esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' . esc_html__( 'Thumbnails', 'a13-onelander' ) . ' : ' . esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_thumbs_border_bg_color',
				'type'     => 'color',
				'title'    => '[' . esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' . esc_html__( 'Thumbnails', 'a13-onelander' ) . ' : ' .esc_html__( 'Border color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),
			array(
				'id'       => 'lg_lightbox_thumbs_border_bg_color_hover',
				'type'     => 'color',
				'title'    => '[' . esc_html__( 'Light Gallery', 'a13-onelander' ) . '] ' . esc_html__( 'Thumbnails', 'a13-onelander' ) . ' : ' .esc_html__( 'Border color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'apollo_lightbox', '=', 'lightGallery' ),
			),

		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Widgets', 'a13-onelander' ),
		'id'         => 'subsection_widgets',
		'icon'       => 'fa fa-puzzle-piece',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'widgets_top_margin',
				'type'        => 'radio',
				'title'       => esc_html__( 'Top margin', 'a13-onelander' ),
				'description' => esc_html__( 'It only affects the widgets in the vertical sidebars.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'      => 'widget_title_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Main titles', 'a13-onelander' ). ' : ' .esc_html__( 'Font size', 'a13-onelander' ),
				'min'     => 10,
				'max'     => 60,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 14,
			),
			array(
				'id'          => 'widget_font_size',
				'type'        => 'slider',
				'title'       => esc_html__( 'Content', 'a13-onelander' ). ' : ' .esc_html__( 'Font size', 'a13-onelander' ),
				'description' => esc_html__( 'It only affects the widgets in the vertical sidebars.', 'a13-onelander' ),
				'min'         => 5,
				'max'         => 30,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 12,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'To top button', 'a13-onelander' ),
		'id'         => 'subsection_to_top',
		'icon'       => 'fa fa-chevron-up',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'to_top',
				'type'        => 'radio',
				'title'       => esc_html__( 'To top button', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'      => 'to_top_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'a13-onelander' ),
				'default' => '#524F51',
				'required' => array( 'to_top', '=', 'on' ),
			),
			array(
				'id'      => 'to_top_bg_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default' => '#000000',
				'required' => array( 'to_top', '=', 'on' ),
			),
			array(
				'id'      => 'to_top_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Icon', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'default' => '#cccccc',
				'required' => array( 'to_top', '=', 'on' ),
			),
			array(
				'id'      => 'to_top_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Icon', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default' => '#ffffff',
				'required' => array( 'to_top', '=', 'on' ),
			),
			array(
				'id'      => 'to_top_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Icon', 'a13-onelander' ). ' : ' .esc_html__( 'Font size', 'a13-onelander' ),
				'min'     => 10,
				'step'    => 1,
				'max'     => 60,
				'unit'    => 'px',
				'default' => 13,
				'required' => array( 'to_top', '=', 'on' ),
			),
			array(
				'id'          => 'to_top_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Icon', 'a13-onelander' ),
				'default'     => 'chevron-up',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required' => array( 'to_top', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Buttons', 'a13-onelander' ),
		'desc'       => esc_html__( 'You can change here colors of buttons that submit forms. For shop buttons, go to the shop settings.', 'a13-onelander' ),
		'id'         => 'subsection_buttons',
		'icon'       => 'fa fa-arrow-down',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'button_submit_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'a13-onelander' ),
				'default' => '#524F51',
			),
			array(
				'id'      => 'button_submit_bg_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'button_submit_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'a13-onelander' ),
				'default' => '#cccccc'
			),
			array(
				'id'      => 'button_submit_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default' => '#ffffff'
			),
			array(
				'id'      => 'button_submit_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'a13-onelander' ),
				'min'     => 10,
				'max'     => 60,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 13,
			),
			array(
				'id'      => 'button_submit_weight',
				'type'    => 'select',
				'title'   => esc_html__( 'Font weight', 'a13-onelander' ),
				'options' => $font_weights,
				'default' => 'bold',
			),
			array(
				'id'      => 'button_submit_transform',
				'type'    => 'radio',
				'title'   => esc_html__( 'Text transform', 'a13-onelander' ),
				'options' => $font_transforms,
				'default' => 'uppercase',
			),
			array(
				'id'      => 'button_submit_padding',
				'type'    => 'spacing',
				'title'   => esc_html__( 'Padding', 'a13-onelander' ),
				'mode'    => 'padding',
				'sides'   => array( 'left', 'right' ),
				'units'   => array( 'px', 'em' ),
				'default' => array(
					'padding-left'  => '30px',
					'padding-right' => '30px',
					'units'         => 'px'
				),
			),
			array(
				'id'          => 'button_submit_radius',
				'type'        => 'slider',
				'title'       => esc_html__( 'Border radius', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 20,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 20,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Flyout box', 'a13-onelander' ),
		'id'         => 'subsection_flyout_box',
		'icon'       => 'fa fa-info-circle',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'flyout_box',
				'type'    => 'radio',
				'title'   => esc_html__( 'Flyout box', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'          => 'flyout_box_content',
				'type'        => 'textarea',
				'title'       => esc_html__( 'Content', 'a13-onelander' ),
				'description' => esc_html__( 'You can use HTML here.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'flyout_box', '=', 'on' ),
			),
			array(
				'id'          => 'flyout_box_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Opening icon', 'a13-onelander' ),
				'default'     => 'info-circle',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'flyout_box', '=', 'on' ),
				)
			),
		)
	) );

//HEADER SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Header settings', 'a13-onelander' ),
		'desc'     => '',
		'id'       => 'section_header_settings',
		'icon'     => 'el el-magic',
		'priority' => 6,
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Type, variant, background', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_header_type',
		'icon'       => 'fa fa-cogs',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_type',
				'type'        => 'radio',
				'title'       => esc_html__( 'Type', 'a13-onelander' ),
				'description' => esc_html__( 'The vertical header does not work in a boxed layout.', 'a13-onelander' ),
				'options'     => array(
					'vertical'   => esc_html__( 'Vertical', 'a13-onelander' ),
					'horizontal' => esc_html__( 'Horizontal', 'a13-onelander' ),
				),
				'default'     => 'horizontal',
			),
			array(
				'id'       => 'header_horizontal_sticky',
				'type'     => 'select',
				'title'    => esc_html__( 'Sticky version', 'a13-onelander' ),
				'options'  => array(
					'default-sticky'     => esc_html__( 'Hiding when scrolling down', 'a13-onelander' ),
					'sticky-no-hiding'   => esc_html__( 'No hiding sticky', 'a13-onelander' ),
					'no-sticky no-fixed' => esc_html__( 'Disabled, show only default header(not fixed)', 'a13-onelander' ),
					'no-sticky'          => esc_html__( 'Disabled, show only default header fixed', 'a13-onelander' )
				),
				'default'  => 'default-sticky',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_side',
				'type'     => 'radio',
				'title'    => esc_html__( 'Side', 'a13-onelander' ),
				'options'  => array(
					'left'  => esc_html__( 'Left', 'a13-onelander' ),
					'right' => esc_html__( 'Right', 'a13-onelander' ),
				),
				'default'  => 'left',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'       => 'header_side_rtl',
				'type'     => 'radio',
				'title'    => esc_html__( 'Side', 'a13-onelander' ). ' - ' .esc_html__( 'in RTL languages', 'a13-onelander' ),
				'options'  => array(
					'left'  => esc_html__( 'Left', 'a13-onelander' ),
					'right' => esc_html__( 'Right', 'a13-onelander' ),
				),
				'default'  => 'left',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'       => 'header_horizontal_variant',
				'type'     => 'select',
				'title'    => esc_html__( 'Variant', 'a13-onelander' ),
				'options'  => array(
					'one_line'               => esc_html__( 'One line, logo on side', 'a13-onelander' ),
					'one_line_menu_centered' => esc_html__( 'One line, menu centered', 'a13-onelander' ),
					'one_line_centered'      => esc_html__( 'One line, logo centered', 'a13-onelander' ),
					'menu_below'             => esc_html__( 'Logo centered, menu below', 'a13-onelander' ),
					'menu_above'             => esc_html__( 'Logo centered, menu above', 'a13-onelander' ),
				),
				'default'  => 'one_line',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'header_color_variants',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variants', 'a13-onelander' ),
				'description' => esc_html__( 'If you want to use theme header color variants(light and dark variants) or the sticky header variant, then enable this option. Some settings of the header can then be overridden in color & sticky variants.', 'a13-onelander' ),
				'options'     => array(
					'on'     => esc_html__( 'Enable', 'a13-onelander' ),
					'sticky' => esc_html__( 'Turn on only for a sticky variant', 'a13-onelander' ),
					'off'    => esc_html__( 'Disable', 'a13-onelander' ),
				),
				'default'     => 'on',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_content_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Content width', 'a13-onelander' ),
				'options'  => array(
					'narrow' => esc_html__( 'Narrow', 'a13-onelander' ),
					'full'   => esc_html__( 'Full width', 'a13-onelander' ),
				),
				'default'  => 'full',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_content_width_narrow_bg',
				'type'     => 'radio',
				'title'    => esc_html__( 'Narrow the entire header as well', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_content_width', '=', 'narrow' )
				),
			),
			array(
				'id'          => 'header_content_padding',
				'type'        => 'slider',
				'title'       => esc_html__( 'Content', 'a13-onelander' ). ' : ' .esc_html__( 'Left/right padding', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 40,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => '',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'       => 'header_vertical_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'a13-onelander' ),
				'options'  => array(
					'classic'        => esc_html__( 'Classic', 'a13-onelander' ),
					'content_in_mid' => esc_html__( 'Vertical centered', 'a13-onelander' ),
				),
				'default'  => 'classic',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'       => 'header_center_content',
				'type'     => 'radio',
				'title'    => esc_html__( 'Center the entire content', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'      => 'header_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'a13-onelander' ),
				'default' => '#ffffff',
			),
			array(
				'id'          => 'header_bg_hover_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'description' => esc_html__( 'Useful in special cases, like when you make a transparent header.', 'a13-onelander' ),
				'default'     => '',
			),
			array(
				'id'          => 'header_bg_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Background image', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the vertical header.', 'a13-onelander' ) .' '. esc_html__( 'It works only on large screens(1025px wide or more).', 'a13-onelander' ),
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'       => 'header_bg_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'          => 'header_menu_part_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Part of the header menu', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'description' => esc_html__( 'Only for multi-line variants of the header.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '!=', 'one_line' ),
					array( 'header_horizontal_variant', '!=', 'one_line_menu_centered' ),
					array( 'header_horizontal_variant', '!=', 'one_line_centered' ),
				)
			),
			array(
				'id'       => 'header_border',
				'type'     => 'radio',
				'title'    => esc_html__( 'Bottom border', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'header_shadow',
				'type'    => 'radio',
				'title'   => esc_html__( 'Shadow', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'header_separators_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Separator and lines color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_custom_sidebar',
				'type'     => 'select',
				'title'    => esc_html__( 'Custom sidebar', 'a13-onelander' ),
				'options'  => $header_sidebars,
				'default'  => 'off',
				'required' => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'          => 'header_widgets_color',
				'type'        => 'radio',
				'title'       => esc_html__( 'Widgets colors', 'a13-onelander' ),
				'description' => esc_html__( 'Depending on what background you have set up, choose proper option.', 'a13-onelander' ),
				'options'     => array(
					'dark-sidebar'  => esc_html__( 'On dark', 'a13-onelander' ),
					'light-sidebar' => esc_html__( 'On light', 'a13-onelander' ),
				),
				'default'     => 'light-sidebar',
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
			array(
				'id'          => 'header_socials',
				'type'        => 'radio',
				'title'       => esc_html__( 'Social icons', 'a13-onelander' ),
				/* translators: %s: URL */
				'description' => sprintf( wp_kses( __( 'If you need to edit social links go to <a href="%s">Social icons</a> settings.', 'a13-onelander' ), $valid_tags ), 'javascript:wp.customize.section( \'section_social\' ).focus();' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'header_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_socials_display_on_mobile',
				'type'        => 'radio',
				'title'       => esc_html__( 'Social icons', 'a13-onelander' ). ' - ' .esc_html__( 'Display it on mobiles', 'a13-onelander' ),
				'description' => esc_html__( 'Should it be displayed on devices less than 600 pixels wide.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Logo', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_logo',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'logo_from_variants',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use logos from header variants', 'a13-onelander' ),
				'description' => esc_html__( 'If you want to be able to change the logo in header color variants (light and dark variants) or in the sticky header variant, then enable this option.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_color_variants', '!=', 'off' ),
				)
			),
			array(
				'id'      => 'logo_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Type', 'a13-onelander' ),
				'options' => array(
					'image' => esc_html__( 'Image', 'a13-onelander' ),
					'text'  => esc_html__( 'Text', 'a13-onelander' ),
				),
				'default' => 'image',
			),
			array(
				'id'          => 'logo_svg',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use the SVG logo', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'          => 'logo_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Image', 'a13-onelander' ),
				'description' => esc_html__( 'Upload an image for logo.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'          => 'logo_image_high_dpi',
				'type'        => 'image',
				'title'       => esc_html__( 'Image for HIGH DPI screen', 'a13-onelander' ),
				'description' => esc_html__( 'For example Retina(iPhone/iPad) screen has HIGH DPI screen.', 'a13-onelander' ) . ' ' . esc_html__( 'Upload an image for logo.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_svg', '=', 'off' ),
				)
			),
			array(
				'id'          => 'logo_with_shield',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use a shield for the logo', 'a13-onelander' ),
				/* translators: %s: "One line, logo centered" */
				'description' => sprintf( esc_html__( 'Works only in the horizontal header with the variant "%s".', 'a13-onelander' ), esc_html__( 'One line, logo centered', 'a13-onelander' ) ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
				)
			),
			array(
				'id'       => 'logo_shield_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Shield', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'default'  => '#000000',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
					array( 'logo_with_shield', '=', 'on' ),
				)
			),
			array(
				'id'          => 'logo_shield_padding',
				'type'        => 'slider',
				'title'       => esc_html__( 'Shield', 'a13-onelander' ). ' : ' .esc_html__( 'Area height', 'a13-onelander' ),
				'description' => esc_html__( 'If your logo does not fit in the shield, try increasing this setting.', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 100,
				'step'        => 1,
				'default'     => 15,
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
					array( 'logo_with_shield', '=', 'on' ),
				)
			),
			array(
				'id'          => 'logo_shield_hide',
				'type'        => 'slider',
				'title'       => esc_html__( 'Sticky header', 'a13-onelander' ). ' : ' .esc_html__( 'How many percent logo should fold up', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the sticky header.', 'a13-onelander' ) .' '. esc_html__( 'How many percent(%) of the logo should be hidden by folding up. The percentage is counted from the header height, not the shield height, so you may need to use values above 100%.', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 250,
				'step'        => 1,
				'unit'        => '%',
				'default'     => 50,
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
					array( 'logo_with_shield', '=', 'on' ),
				)
			),
			array(
				'id'          => 'logo_shield_hide_mobile',
				'type'        => 'slider',
				'title'       => esc_html__( 'How many percent logo should fold up', 'a13-onelander' ). ' - ' .esc_html__( 'on mobile devices', 'a13-onelander' ),
				'description' => esc_html__( 'It works only on mobile devices(1024px wide or less).', 'a13-onelander' ) .' '. esc_html__( 'How many percent(%) of the logo should be hidden by folding up. The percentage is counted from the header height, not the shield height, so you may need to use values above 100%.', 'a13-onelander' ),
				'min'         => 0,
				'step'        => 1,
				'max'         => 250,
				'unit'        => '%',
				'default'     => 50,
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
					array( 'logo_with_shield', '=', 'on' ),
				)
			),
			array(
				'id'          => 'logo_image_max_desktop_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Max width', 'a13-onelander' ). ' - ' .esc_html__( 'on desktop', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ) .' '. esc_html__( 'It works only on large screens(1025px wide or more).', 'a13-onelander' ),
				'min'         => 25,
				'step'        => 1,
				'max'         => 400,
				'unit'        => 'px',
				'default'     => 200,
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'          => 'logo_image_max_mobile_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Max width', 'a13-onelander' ). ' - ' .esc_html__( 'on mobile devices', 'a13-onelander' ),
				'description' => esc_html__( 'It works only on mobile devices(1024px wide or less).', 'a13-onelander' ),
				'min'         => 25,
				'max'         => 250,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 200,
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
				)
			),
			array(
				'id'          => 'logo_image_height',
				'type'        => 'slider',
				'title'       => esc_html__( 'Height', 'a13-onelander' ),
				'description' => esc_html__( 'Leave empty if you do not need anything fancy', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 100,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => '',
				'required'    => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'       => 'logo_image_normal_opacity',
				'type'     => 'slider',
				'title'    => esc_html__( 'Opacity', 'a13-onelander' ),
				'min'      => 0,
				'max'      => 1,
				'step'     => 0.01,
				'default'  => '1.00',
				'required' => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'       => 'logo_image_hover_opacity',
				'type'     => 'slider',
				'title'    => esc_html__( 'Opacity', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'min'      => 0,
				'max'      => 1,
				'step'     => 0.01,
				'default'  => '0.50',
				'required' => array( 'logo_type', '=', 'image' ),
			),
			array(
				'id'          => 'logo_text',
				'type'        => 'text',
				'title'       => esc_html__( 'Text', 'a13-onelander' ),
				'description' => wp_kses( __( 'If you use more than one word in the logo, you can use <code>&amp;nbsp;</code> instead of a white space, so the words will not break into many lines.', 'a13-onelander' ), $valid_tags ).
				                 /* translators: %s: Customizer JS URL */
				                 '<br />'.sprintf( wp_kses( __( 'If you want to change the font for logo go to <a href="%s">Font settings</a>.', 'a13-onelander' ), $valid_tags ), 'javascript:wp.customize.control( \''.A13FRAMEWORK_OPTIONS_NAME.'[logo_fonts]\' ).focus();' ),
				'default'     => get_bloginfo( 'name' ),
				'required'    => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'       => 'logo_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'       => 'logo_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'       => 'logo_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Font size', 'a13-onelander' ),
				'min'      => 10,
				'max'      => 60,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 26,
				'required' => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'       => 'logo_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'a13-onelander' ),
				'options'  => $font_weights,
				'default'  => 'normal',
				'required' => array( 'logo_type', '=', 'text' ),
			),
			array(
				'id'          => 'logo_padding',
				'type'        => 'spacing',
				'title'       => esc_html__( 'Padding', 'a13-onelander' ). ' - ' .esc_html__( 'on desktop', 'a13-onelander' ),
				'description' => esc_html__( 'It works only on large screens(1025px wide or more).', 'a13-onelander' ),
				'mode'        => 'padding',
				'sides'       => array( 'top', 'bottom' ),
				'units'       => array( 'px', 'em' ),
				'default'     => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px'
				)
			),
			array(
				'id'          => 'logo_padding_mobile',
				'type'        => 'spacing',
				'title'       => esc_html__( 'Padding', 'a13-onelander' ). ' - ' .esc_html__( 'on mobile devices', 'a13-onelander' ),
				'description' => esc_html__( 'It works only on mobile devices(1024px wide or less).', 'a13-onelander' ),
				'mode'        => 'padding',
				'sides'       => array( 'top', 'bottom' ),
				'units'       => array( 'px', 'em' ),
				'default'     => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px'
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Main Menu', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_header_menu',
		'icon'       => 'fa fa-bars',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'header_main_menu',
				'type'    => 'radio',
				'title'   => esc_html__( 'Main Menu', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'header_main_menu_width',
				'type'     => 'slider',
				'title'       => esc_html__( 'Reserved space for the main menu', 'a13-onelander' ),
				/* translators: %s: "One line, logo centered" */
				'description' => sprintf( esc_html__( 'Works only in the horizontal header with the variant "%s".', 'a13-onelander' ), esc_html__( 'One line, logo centered', 'a13-onelander' ) ) .' '. esc_html__( 'By default, 70% width is reserved for the main menu in this header variant. You can increase this value if it is not enough for the menu.', 'a13-onelander' ),
				'min'      => 0,
				'max'      => 100,
				'step'     => 1,
				'unit'     => '%',
				'default'  => 70,
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '=', 'one_line_centered' ),
				)
			),
			array(
				'id'          => 'menu_hover_effect',
				'type'        => 'select',
				'title'       => esc_html__( 'Hover effect', 'a13-onelander' ),
				'description' => esc_html__( 'It works only for first level links.', 'a13-onelander' ),
				'options'     => $menu_effects,
				'default'     => 'none',
				'required'    => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'          => 'menu_close_mobile_menu_on_click',
				'type'        => 'radio',
				'title'       => esc_html__( 'Mobile menu', 'a13-onelander' ). ' : ' .esc_html__( 'Close menu after click', 'a13-onelander' ),
				'description' => esc_html__( 'After turning on the mobile menu will be closed after clicking the link menu. This option is good for "one page" sites. For traditional websites, it is recommended to disable this option.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'          => 'menu_allow_mobile_menu',
				'type'        => 'radio',
				'title'       => esc_html__( 'Allow for the mobile menu', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ) .' '. esc_html__( 'If you disable this then menu will not switch to mobile menu. You should consider disabling this option only if you have a clean header with a short menu.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'      => 'header_mobile_menu_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Mobile menu', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'default' => '#ffffff',
				'required'    => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Font size', 'a13-onelander' ),
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 14,
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_line_height',
				'type'     => 'slider',
				'title'    => esc_html__( 'Menu item height', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the vertical header.', 'a13-onelander' ) .' '. esc_html__( 'It works only on large screens(1025px wide or more).', 'a13-onelander' ),
				'min'      => 10,
				'max'      => 60,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '',
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'header_type', '=', 'vertical' ),
				)
			),
			array(
				'id'       => 'menu_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '#000000',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'default'  => '#000000',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'          => 'menu_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'description' => esc_html__( 'It works only for first level links.', 'a13-onelander' ),
				'default'     => '#000000',
				'required'    => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'a13-onelander' ),
				'options'  => $font_weights,
				'default'  => 'normal',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'menu_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'a13-onelander' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => '#ffffff',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_separator_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mega-Menu separator color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_active_open',
				'type'     => 'radio',
				'title'    => esc_html__( 'Keep the submenu open for the current page', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the vertical header.', 'a13-onelander' ) .' '. esc_html__( 'If the current page has the link in a the submenu, this option opens the ancestor submenu.', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'header_type', '=', 'vertical' )
				)
			),
			array(
				'id'       => 'submenu_open_icons',
				'type'     => 'radio',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Opening/Closing icons', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'          => 'submenu_opener',
				'type'        => 'text',
				'title'       => esc_html__( 'Submenu/Mega-Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Opening icon', 'a13-onelander' ),
				'default'     => 'angle-down',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'submenu_open_icons', '=', 'on' ),
				)

			),
			array(
				'id'          => 'submenu_closer',
				'type'        => 'text',
				'title'       => esc_html__( 'Submenu/Mega-Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Closing icon', 'a13-onelander' ),
				'default'     => 'angle-up',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'submenu_open_icons', '=', 'on' ),
				)
			),
			array(
				'id'          => 'submenu_third_lvl_opener',
				'type'        => 'text',
				'title'       => esc_html__( 'Submenu 3rd level', 'a13-onelander' ). ' : ' .esc_html__( 'Opening icon', 'a13-onelander' ),
				'default'     => 'angle-right',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'submenu_open_icons', '=', 'on' ),
				)

			),
			array(
				'id'          => 'submenu_third_lvl_closer',
				'type'        => 'text',
				'title'       => esc_html__( 'Submenu 3rd level', 'a13-onelander' ). ' : ' .esc_html__( 'Closing icon', 'a13-onelander' ),
				'default'     => 'angle-left',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_main_menu', '=', 'on' ),
					array( 'submenu_open_icons', '=', 'on' ),
				)
			),
			array(
				'id'       => 'submenu_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'required' => array( 'header_main_menu', '=', 'on' ),
				'default'  => '#000000',
			),
			array(
				'id'       => 'submenu_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Font size', 'a13-onelander' ),
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 10,
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Font weight', 'a13-onelander' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
			array(
				'id'       => 'submenu_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Submenu/Mega-Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Text transform', 'a13-onelander' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'header_main_menu', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Top bar', 'a13-onelander' ),
		'desc'       => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
		'id'         => 'subsection_header_top_bar',
		'icon'       => 'fa fa-arrow-circle-o-up',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'header_top_bar',
				'type'    => 'radio',
				'title'   => esc_html__( 'Top bar', 'a13-onelander' ),
				'default' => 'on',
				'options' => $on_off,
			),
			array(
				'id'          => 'header_top_bar_display_on_mobile',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display it on mobiles', 'a13-onelander' ),
				'description' => esc_html__( 'Should it be displayed on devices less than 600 pixels wide.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => '#ffffff',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_border',
				'type'     => 'radio',
				'title'    => esc_html__( 'Bottom border', 'a13-onelander' ),
				'default'  => 'on',
				'options'  => $on_off,
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_text_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '#000000',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_link_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '#000000',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_link_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'default'  => '#000000',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_text_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'a13-onelander' ),
				'options'  => $font_transforms,
				'default'  => 'none',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_msg_part',
				'type'     => 'select',
				'title'    => esc_html__( 'Message part', 'a13-onelander' ),
				'options'  => array(
					'message' => esc_html__( 'Use message', 'a13-onelander' ),
					/* translators: %s: "Alternative short top bar menu" */
					'menu'    => sprintf( esc_html__( 'Use the menu from the "%s" position', 'a13-onelander' ), esc_html__( 'Alternative short top bar menu', 'a13-onelander' ) ),
					'off'     => esc_html__( 'Disable', 'a13-onelander' ),
				),
				'default'  => 'message',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_msg_part_text_align',
				'type'     => 'radio',
				'title'    => esc_html__( 'Message part', 'a13-onelander' ). ' : ' .esc_html__( 'Text align', 'a13-onelander' ),
				'options'  => $text_align,
				'default'  => 'left',
				'required'    => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_msg_part', '!=', 'off' ),
				)
			),
			array(
				'id'          => 'top_bar_message',
				'type'        => 'textarea',
				'title'       => esc_html__( 'Content', 'a13-onelander' ),
				'description' => esc_html__( 'You can use HTML here.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_msg_part', '=', 'message' ),
				)
			),
			array(
				'id'          => 'top_bar_socials',
				'type'        => 'radio',
				'title'       => esc_html__( 'Social icons', 'a13-onelander' ),
				/* translators: %s: URL */
				'description' => sprintf( wp_kses( __( 'If you need to edit social links go to <a href="%s">Social icons</a> settings.', 'a13-onelander' ), $valid_tags ), 'javascript:wp.customize.section( \'section_social\' ).focus();' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'top_bar_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'top_bar_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
			array(
				'id'          => 'top_bar_lang_switcher',
				'type'        => 'radio',
				'title'       => esc_html__( 'Language switcher', 'a13-onelander' ),
				'description' => esc_html__( 'Shows only if the WPML plugin is enabled.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'header_top_bar', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Variant light', 'a13-onelander' ). ' - ' .esc_html__( 'Override normal settings', 'a13-onelander' ),
		/* translators: %s: URL */
		'desc'       => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ) .' '. sprintf( wp_kses( __( 'Read more in <a href="%s">the documentation</a>.', 'a13-onelander' ), $valid_tags ), esc_url( $apollo13framework_a13->get_docs_link( 'header-color-variants' ) ) ),
		'id'         => 'subsection_header_light',
		'icon'       => 'fa fa-sun-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_light_logo_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo', 'a13-onelander' ). ' : ' .esc_html__( 'Image', 'a13-onelander' ),
				'description' => esc_html__( 'Upload an image for logo.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_light_logo_image_high_dpi',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo', 'a13-onelander' ). ' : ' .esc_html__( 'Image for HIGH DPI screen', 'a13-onelander' ),
				'description' => esc_html__( 'For example Retina(iPhone/iPad) screen has HIGH DPI screen.', 'a13-onelander' ) . ' ' . esc_html__( 'Upload an image for logo.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
					array( 'logo_svg', '=', 'off' ),
				)
			),
			array(
				'id'       => 'header_light_logo_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_light_logo_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'      => 'header_light_menu_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Main Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'      => 'header_light_menu_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Main Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'          => 'header_light_menu_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Main Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'description' => esc_html__( 'It works only for first level links.', 'a13-onelander' ),
				'default'     => '#000000',
			),
			array(
				'id'      => 'header_light_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'          => 'header_light_menu_part_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Part of the header menu', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'description' => esc_html__( 'Only for multi-line variants of the header.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '!=', 'one_line' ),
					array( 'header_horizontal_variant', '!=', 'one_line_menu_centered' ),
					array( 'header_horizontal_variant', '!=', 'one_line_centered' ),
				)
			),
			array(
				'id'      => 'header_light_mobile_menu_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Mobile menu', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'default' => '#222222',
			),
			array(
				'id'      => 'header_light_shadow',
				'type'    => 'radio',
				'title'   => esc_html__( 'Shadow', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'header_light_separators_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Header', 'a13-onelander' ). ' : ' .esc_html__( 'Separator and lines color', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'          => 'header_light_tools_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'a13-onelander' ),
				'default'     => '',
			),
			array(
				'id'          => 'header_light_tools_color_hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'a13-onelander' ),
				'default'     => '',
			),
			array(
				'id'       => 'header_light_button_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_light_button_bg_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_light_button_border_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Border color', 'a13-onelander' ),
				'default'  => 'rgba(255,255,255,0.3)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_light_button_border_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Border color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default'  => 'rgba(255,255,255,0.5)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_light_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_light_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_light_top_bar_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0.6)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_light_top_bar_text_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => 'rgba(255,255,255,0.6)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_light_top_bar_link_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => 'rgba(255,255,255,0.7)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_light_top_bar_link_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'default'  => '#ffffff',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_light_top_bar_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'white',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_light_top_bar_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Variant dark', 'a13-onelander' ). ' - ' .esc_html__( 'Override normal settings', 'a13-onelander' ),
		/* translators: %s: URL */
		'desc'       => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ) .' '. sprintf( wp_kses( __( 'Read more in <a href="%s">the documentation</a>.', 'a13-onelander' ), $valid_tags ), esc_url( $apollo13framework_a13->get_docs_link( 'header-color-variants' ) ) ),
		'id'         => 'subsection_header_dark',
		'icon'       => 'fa fa-moon-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_dark_logo_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo', 'a13-onelander' ). ' : ' .esc_html__( 'Image', 'a13-onelander' ),
				'description' => esc_html__( 'Upload an image for logo.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_dark_logo_image_high_dpi',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo', 'a13-onelander' ). ' : ' .esc_html__( 'Image for HIGH DPI screen', 'a13-onelander' ),
				'description' => esc_html__( 'For example Retina(iPhone/iPad) screen has HIGH DPI screen.', 'a13-onelander' ) . ' ' . esc_html__( 'Upload an image for logo.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
					array( 'logo_svg', '=', 'off' ),
				)
			),
			array(
				'id'       => 'header_dark_logo_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_dark_logo_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'      => 'header_dark_menu_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Main Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'      => 'header_dark_menu_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Main Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'          => 'header_dark_menu_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Main Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'description' => esc_html__( 'It works only for first level links.', 'a13-onelander' ),
				'default'     => 'rgba(0,0,0,0)',
			),
			array(
				'id'      => 'header_dark_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'          => 'header_dark_menu_part_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Part of the header menu', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'description' => esc_html__( 'Only for multi-line variants of the header.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '!=', 'one_line' ),
					array( 'header_horizontal_variant', '!=', 'one_line_menu_centered' ),
					array( 'header_horizontal_variant', '!=', 'one_line_centered' ),
				)
			),
			array(
				'id'      => 'header_dark_mobile_menu_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Mobile menu', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'default' => '#ffffff',
			),
			array(
				'id'      => 'header_dark_shadow',
				'type'    => 'radio',
				'title'   => esc_html__( 'Shadow', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'header_dark_separators_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Header', 'a13-onelander' ). ' : ' .esc_html__( 'Separator and lines color', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'          => 'header_dark_tools_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'a13-onelander' ),
				'default'     => '',
			),
			array(
				'id'          => 'header_dark_tools_color_hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'a13-onelander' ),
				'default'     => '',
			),
			array(
				'id'       => 'header_dark_button_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_dark_button_bg_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_dark_button_border_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Border color', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0.2)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_dark_button_border_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Border color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0.4)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_dark_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_dark_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_dark_top_bar_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => 'rgba(255,255,255,0)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_dark_top_bar_text_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0.5)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_dark_top_bar_link_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0.6)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_dark_top_bar_link_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0.7)',
				'required' => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_dark_top_bar_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_dark_top_bar_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Sticky header', 'a13-onelander' ). ' - ' .esc_html__( 'Override normal settings', 'a13-onelander' ),
		'desc'       => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ) .' '. esc_html__( 'You can change some options here to modify the appearance of the sticky header(if it is enabled).', 'a13-onelander' ),
		'id'         => 'subsection_header_sticky',
		'icon'       => 'fa fa-thumb-tack',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_sticky_logo_image',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo', 'a13-onelander' ). ' : ' .esc_html__( 'Image', 'a13-onelander' ),
				'description' => esc_html__( 'Upload an image for logo.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_sticky_logo_image_high_dpi',
				'type'        => 'image',
				'title'       => esc_html__( 'Logo', 'a13-onelander' ). ' : ' .esc_html__( 'Image for HIGH DPI screen', 'a13-onelander' ),
				'description' => esc_html__( 'For example Retina(iPhone/iPad) screen has HIGH DPI screen.', 'a13-onelander' ) . ' ' . esc_html__( 'Upload an image for logo.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'logo_from_variants', '=', 'on' ),
					array( 'logo_svg', '=', 'off' ),
				)
			),
			array(
				'id'          => 'header_sticky_logo_image_max_desktop_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Logo', 'a13-onelander' ). ' : ' .esc_html__( 'Max width', 'a13-onelander' ). ' - ' .esc_html__( 'on desktop', 'a13-onelander' ),
				'description' => esc_html__( 'It works only on large screens(1025px wide or more).', 'a13-onelander' ),
				'min'         => 25,
				'step'        => 1,
				'max'         => 400,
				'unit'        => 'px',
				'default'     => 200,
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'          => 'header_sticky_logo_image_max_mobile_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'Logo', 'a13-onelander' ). ' : ' .esc_html__( 'Max width', 'a13-onelander' ). ' - ' .esc_html__( 'on mobile devices', 'a13-onelander' ),
				'description' => esc_html__( 'It works only on mobile devices(1024px wide or less).', 'a13-onelander' ),
				'min'         => 25,
				'max'         => 250,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 200,
				'required'    => array(
					array( 'logo_type', '=', 'image' ),
					array( 'header_type', '=', 'horizontal' ),
				)
			),
			array(
				'id'      => 'header_sticky_logo_padding',
				'type'    => 'spacing',
				'title'   => esc_html__( 'Logo', 'a13-onelander' ). ' : ' .esc_html__( 'Padding', 'a13-onelander' ). ' - ' .esc_html__( 'on desktop', 'a13-onelander' ),
				'description' => esc_html__( 'It works only on large screens(1025px wide or more).', 'a13-onelander' ),
				'mode'    => 'padding',
				'sides'   => array( 'top', 'bottom' ),
				'units'   => array( 'px', 'em' ),
				'default' => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px'
				),
			),
			array(
				'id'          => 'header_sticky_logo_padding_mobile',
				'type'        => 'spacing',
				'title'       => esc_html__( 'Logo', 'a13-onelander' ). ' : ' .esc_html__( 'Padding', 'a13-onelander' ). ' - ' .esc_html__( 'on mobile devices', 'a13-onelander' ),
				'description' => esc_html__( 'It works only on mobile devices(1024px wide or less).', 'a13-onelander' ),
				'mode'        => 'padding',
				'sides'       => array( 'top', 'bottom' ),
				'units'       => array( 'px', 'em' ),
				'default'     => array(
					'padding-top'    => '10px',
					'padding-bottom' => '10px',
					'units'          => 'px'
				),
			),
			array(
				'id'       => 'header_sticky_logo_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_sticky_logo_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Logo', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default'  => '',
				'required' => array(
					array( 'logo_type', '=', 'text' ),
					array( 'logo_from_variants', '=', 'on' ),
				)
			),
			array(
				'id'      => 'header_sticky_menu_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Main Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'      => 'header_sticky_menu_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Main Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'          => 'header_sticky_menu_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Main Menu', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'description' => esc_html__( 'It works only for first level links.', 'a13-onelander' ),
				'default'     => 'rgba(0,0,0,0)',
			),
			array(
				'id'      => 'header_sticky_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'          => 'header_sticky_menu_part_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Part of the header menu', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'description' => esc_html__( 'Only for multi-line variants of the header.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_horizontal_variant', '!=', 'one_line' ),
					array( 'header_horizontal_variant', '!=', 'one_line_menu_centered' ),
					array( 'header_horizontal_variant', '!=', 'one_line_centered' ),
				)
			),
			array(
				'id'      => 'header_sticky_mobile_menu_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Mobile menu', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'default' => '#ffffff',
			),
			array(
				'id'      => 'header_sticky_shadow',
				'type'    => 'radio',
				'title'   => esc_html__( 'Shadow', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'header_sticky_separators_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Header', 'a13-onelander' ). ' : ' .esc_html__( 'Separator and lines color', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'          => 'header_sticky_tools_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'a13-onelander' ),
				'default'     => '',
			),
			array(
				'id'          => 'header_sticky_tools_color_hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'a13-onelander' ),
				'default'     => '',
			),
			array(
				'id'       => 'header_sticky_button_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_sticky_button_bg_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_sticky_button_border_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Border color', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0.2)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_sticky_button_border_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Border color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0.4)',
				'required' => array( 'header_button', '!=', '' ),
			),
			array(
				'id'       => 'header_sticky_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'semi-transparent',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_sticky_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_type', '=', 'horizontal' ),
					array( 'header_socials', '=', 'on' ),
				)
			),
			array(
				'id'          => 'header_sticky_top_bar',
				'type'        => 'radio',
				'title'       => esc_html__( 'Top bar', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'header_top_bar', '=', 'on' ),
			),
			array(
				'id'       => 'header_sticky_top_bar_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				),
			),
			array(
				'id'       => 'header_sticky_top_bar_text_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				),
			),
			array(
				'id'       => 'header_sticky_top_bar_link_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				),
			),
			array(
				'id'       => 'header_sticky_top_bar_link_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'default'  => '',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				),
			),
			array(
				'id'       => 'header_sticky_top_bar_socials_color',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				)
			),
			array(
				'id'       => 'header_sticky_top_bar_socials_color_hover',
				'type'     => 'select',
				'title'    => esc_html__( 'Top bar', 'a13-onelander' ). ' : ' .esc_html__( 'Social icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => $social_colors,
				'default'  => 'color',
				'required' => array(
					array( 'header_top_bar', '=', 'on' ),
					array( 'top_bar_socials', '=', 'on' ),
					array( 'header_sticky_top_bar', '=', 'on' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Tools icons', 'a13-onelander' ). ' - ' .esc_html__( 'General settings', 'a13-onelander' ),
		'id'         => 'subsection_header_tools',
		'icon'       => 'fa fa-ellipsis-h',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'header_tools_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'a13-onelander' ),
				'default'     => '#000000',
			),
			array(
				'id'          => 'header_tools_color_hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Tools icons', 'a13-onelander' ). ' : ' .esc_html__( 'Color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'description' => esc_html__( 'Basket, sidebar, menu and search icons. It is also color for the text of "Tools button".', 'a13-onelander' ),
				'default'     => '#000000',
			),
			array(
				'id'      => 'header_search',
				'type'    => 'radio',
				'title'   => esc_html_x( 'Search', 'tool', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'header_language_switcher',
				'type'    => 'radio',
				'title'       => esc_html__( 'Language switcher', 'a13-onelander' ),
				'description' => esc_html__( 'Shows only if the WPML plugin is enabled.', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'header_language_switcher_options',
				'type'     => 'button-set',
				'multi'    => true,
				'title'    => esc_html__( 'Language switcher', 'a13-onelander' ). ' : ' . esc_html__( 'Type', 'a13-onelander' ),
				'options'  => array(
					'flags'    => esc_html__( 'Flags', 'a13-onelander' ),
					'codes'  => esc_html__( 'Codes', 'a13-onelander' ),
				),
				'default'  => array( 'flags', 'codes' ),
				'required' => array( 'header_language_switcher', '=', 'on' ),
				'sanitize' => 'button_set_multi'
			),
			array(
				'id'          => 'header_button',
				'type'        => 'text',
				'title'       => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Content', 'a13-onelander' ),
				'description' => esc_html__( 'If left empty then the button will not be displayed.', 'a13-onelander' ),
				'default'     => '',
				'partial' => array(
					'selector' => '.tools_button',
					'container_inclusive' => true,
					'settings' => array(
						'header_button',
						'header_button_link',
						'header_button_link_target',
						'header_button_font_size',
						'header_button_weight',
						'header_button_bg_color',
						'header_button_bg_color_hover',
						'header_button_border_color',
						'header_button_border_color_hover',
						'header_button_display_on_mobile',
					),
					'render_callback' => 'apollo13framework_header_button',
				)
			),
			array(
				'id'       => 'header_button_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Link', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'          => 'header_button_link_target',
				'type'        => 'radio',
				'title'       => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Open link in new tab', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'       => 'header_button_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Font size', 'a13-onelander' ),
				'min'      => 5,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '12',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'       => 'header_button_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Font weight', 'a13-onelander' ),
				'options'  => $font_weights,
				'default'  => 'normal',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'       => 'header_button_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'       => 'header_button_bg_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0)',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'       => 'header_button_border_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Border color', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0.2)',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'       => 'header_button_border_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Tools button', 'a13-onelander' ). ' : ' .esc_html__( 'Border color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default'  => 'rgba(0,0,0,0.4)',
				'required' => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
			array(
				'id'          => 'header_button_display_on_mobile',
				'type'        => 'radio',
				'title'       => esc_html__( 'Tools button', 'a13-onelander' ). ' - ' .esc_html__( 'Display it on mobiles', 'a13-onelander' ),
				'description' => esc_html__( 'Should it be displayed on devices less than 600 pixels wide.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'header_button', '!=', '' ),
				'partial'  => true,
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Tools icons', 'a13-onelander' ). ' - ' .esc_html__( 'Individual icons', 'a13-onelander' ),
		'id'         => 'subsection_header_tools_individual',
		'icon'       => 'fa fa-ellipsis-h',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'header_tools_mobile_menu_icon_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Mobile menu', 'a13-onelander' ). ' : ' .esc_html__( 'Icon', 'a13-onelander' ). ' - ' .esc_html__( 'Type', 'a13-onelander' ),
				'default' => 'default',
				'options' => array(
					'default'  => esc_html__( 'Default for the theme', 'a13-onelander' ),
					'animated' => esc_html__( 'Animated', 'a13-onelander' ),
					'custom'   => esc_html__( 'Custom', 'a13-onelander' ),
				),
			),
			array(
				'id'          => 'header_tools_mobile_menu_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Mobile menu', 'a13-onelander' ). ' : ' .esc_html__( 'Icon', 'a13-onelander' ),
				'default'     => '',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_tools_mobile_menu_icon_type', '=', 'custom' ),
				)
			),
			array(
				'id'       => 'header_tools_mobile_menu_icon_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Mobile menu', 'a13-onelander' ) . ' : ' . esc_html__( 'Icon', 'a13-onelander' ) . ' - ' . esc_html__( 'Size', 'a13-onelander' ),
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 18,
				'required' => array(
					array( 'header_tools_mobile_menu_icon_type', '!=', 'animated' ),
				)
			),
			array(
				'id'       => 'header_tools_mobile_menu_effect_active',
				'type'     => 'select',
				'title'    => esc_html__( 'Mobile menu', 'a13-onelander' ) . ' : ' . esc_html__( 'Closing icon', 'a13-onelander' ),
				'options'  => array(
					'x'  => esc_html__( 'X', 'a13-onelander' ),
					'x2'  => esc_html__( 'X 2', 'a13-onelander' ),
					'x3'  => esc_html__( 'X 3', 'a13-onelander' ),
					'slider'  => esc_html__( 'Slider', 'a13-onelander' ),
					'la' => esc_html__( 'Left arrow', 'a13-onelander' ),
					'ra' => esc_html__( 'Right arrow', 'a13-onelander' ),
				),
				'default'  => 'x',
				'required' => array(
					array( 'header_tools_mobile_menu_icon_type', '=', 'animated' ),
				)
			),
			array(
				'id'      => 'header_tools_basket_sidebar_icon_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Basket sidebar', 'a13-onelander' ). ' : ' .esc_html__( 'Icon', 'a13-onelander' ). ' - ' .esc_html__( 'Type', 'a13-onelander' ),
				'options' => array(
					'default' => esc_html__( 'Default for the theme', 'a13-onelander' ),
					'custom'  => esc_html__( 'Custom', 'a13-onelander' ),
				),
				'default' => 'default',
			),
			array(
				'id'          => 'header_tools_basket_sidebar_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Basket sidebar', 'a13-onelander' ). ' : ' .esc_html__( 'Icon', 'a13-onelander' ),
				'default'     => '',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_tools_basket_sidebar_icon_type', '=', 'custom' ),
				)
			),
			array(
				'id'      => 'header_tools_basket_sidebar_icon_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Basket sidebar', 'a13-onelander' ) . ' : ' . esc_html__( 'Icon', 'a13-onelander' ) . ' - ' . esc_html__( 'Size', 'a13-onelander' ),
				'default' => 16,
				'min'     => 10,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
			),
			array(
				'id'      => 'header_tools_header_search_icon_type',
				'type'    => 'radio',
				'title'   => esc_html_x( 'Search', 'action', 'a13-onelander' ). ' : ' .esc_html__( 'Icon', 'a13-onelander' ). ' - ' .esc_html__( 'Type', 'a13-onelander' ),
				'default' => 'default',
				'options' => array(
					'default' => esc_html__( 'Default for the theme', 'a13-onelander' ),
					'custom'  => esc_html__( 'Custom', 'a13-onelander' ),
				),
			),
			array(
				'id'          => 'header_tools_header_search_icon',
				'type'        => 'text',
				'title'       => esc_html_x( 'Search', 'action', 'a13-onelander' ). ' : ' .esc_html__( 'Icon', 'a13-onelander' ),
				'default'     => '',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_tools_header_search_icon_type', '=', 'custom' ),
				)
			),
			array(
				'id'      => 'header_tools_header_search_icon_size',
				'type'    => 'slider',
				'title'   => esc_html_x( 'Search', 'action', 'a13-onelander' ) . ' : ' . esc_html__( 'Icon', 'a13-onelander' ) . ' - ' . esc_html__( 'Size', 'a13-onelander' ),
				'min'     => 10,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 16,
			),
			array(
				'id'      => 'header_tools_hidden_sidebar_icon_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Hidden sidebar', 'a13-onelander' ). ' : ' .esc_html__( 'Icon', 'a13-onelander' ). ' - ' .esc_html__( 'Type', 'a13-onelander' ),
				'options' => array(
					'default'  => esc_html__( 'Default for the theme', 'a13-onelander' ),
					'animated' => esc_html__( 'Animated', 'a13-onelander' ),
					'custom'   => esc_html__( 'Custom', 'a13-onelander' ),
				),
				'default' => 'default',
			),
			array(
				'id'          => 'header_tools_hidden_sidebar_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Hidden sidebar', 'a13-onelander' ). ' : ' .esc_html__( 'Icon', 'a13-onelander' ),
				'default'     => '',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_tools_hidden_sidebar_icon_type', '=', 'custom' ),
				)
			),
			array(
				'id'       => 'header_tools_hidden_sidebar_icon_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Hidden sidebar', 'a13-onelander' ) . ' : ' . esc_html__( 'Icon', 'a13-onelander' ) . ' - ' . esc_html__( 'Size', 'a13-onelander' ),
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 16,
				'required' => array(
					array( 'header_tools_hidden_sidebar_icon_type', '!=', 'animated' ),
				)
			),
			array(
				'id'       => 'header_tools_hidden_sidebar_effect_active',
				'type'     => 'select',
				'title'    => esc_html__( 'Hidden sidebar', 'a13-onelander' ) . ' : ' . esc_html__( 'Closing icon', 'a13-onelander' ),
				'options'  => array(
					'x'  => esc_html__( 'X', 'a13-onelander' ),
					'x2'  => esc_html__( 'X 2', 'a13-onelander' ),
					'x3'  => esc_html__( 'X 3', 'a13-onelander' ),
					'slider'  => esc_html__( 'Slider', 'a13-onelander' ),
					'la' => esc_html__( 'Left arrow', 'a13-onelander' ),
					'ra' => esc_html__( 'Right arrow', 'a13-onelander' ),
				),
				'default'  => 'x',
				'required' => array(
					array( 'header_tools_hidden_sidebar_icon_type', '=', 'animated' ),
				)
			),
			array(
				'id'      => 'header_tools_menu_overlay_icon_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Menu overlay', 'a13-onelander' ). ' : ' .esc_html__( 'Icon', 'a13-onelander' ). ' - ' .esc_html__( 'Type', 'a13-onelander' ),
				'options' => array(
					'default'  => esc_html__( 'Default for the theme', 'a13-onelander' ),
					'animated' => esc_html__( 'Animated', 'a13-onelander' ),
					'custom'   => esc_html__( 'Custom', 'a13-onelander' ),
				),
				'default' => 'default',
			),
			array(
				'id'          => 'header_tools_menu_overlay_icon',
				'type'        => 'text',
				'title'       => esc_html__( 'Menu overlay', 'a13-onelander' ). ' : ' .esc_html__( 'Icon', 'a13-onelander' ),
				'default'     => '',
				'input_attrs' => array(
					'class' => 'a13-fa-icon',
				),
				'required'    => array(
					array( 'header_tools_menu_overlay_icon_type', '=', 'custom' ),
				)
			),
			array(
				'id'       => 'header_tools_menu_overlay_icon_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Menu overlay', 'a13-onelander' ) . ' : ' . esc_html__( 'Icon', 'a13-onelander' ) . ' - ' . esc_html__( 'Size', 'a13-onelander' ),
				'min'      => 10,
				'max'      => 30,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 16,
				'required' => array(
					array( 'header_tools_menu_overlay_icon_type', '!=', 'animated' ),
				)
			),
			array(
				'id'       => 'header_tools_menu_overlay_effect_active',
				'type'     => 'select',
				'title'    => esc_html__( 'Menu overlay', 'a13-onelander' ) . ' : ' . esc_html__( 'Closing icon', 'a13-onelander' ),
				'options'  => array(
					'x'  => esc_html__( 'X', 'a13-onelander' ),
					'x2'  => esc_html__( 'X 2', 'a13-onelander' ),
					'x3'  => esc_html__( 'X 3', 'a13-onelander' ),
					'slider'  => esc_html__( 'Slider', 'a13-onelander' ),
					'la' => esc_html__( 'Left arrow', 'a13-onelander' ),
					'ra' => esc_html__( 'Right arrow', 'a13-onelander' ),
				),
				'default'  => 'x',
				'required' => array(
					array( 'header_tools_menu_overlay_icon_type', '=', 'animated' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Menu overlay', 'a13-onelander' ),
		'id'         => 'subsection_header_menu_overlay',
		'desc'       => esc_html__( 'Enabling this will add a button that displays a full-screen menu.', 'a13-onelander' ).' '.esc_html__( 'It works only for first level links.', 'a13-onelander' ),
		'icon'       => 'fa fa-align-center',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'header_menu_overlay',
				'type'    => 'radio',
				'title'   => esc_html__( 'Menu overlay', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'header_menu_overlay_effect',
				'type'     => 'select',
				'title'    => esc_html__( 'Opening effect', 'a13-onelander' ),
				'options'  => array(
					'default'     => esc_html__( 'Default', 'a13-onelander' ),
					'slide-top'   => esc_html__( 'Slide in from the top', 'a13-onelander' ),
					'slide-left'  => esc_html__( 'Slide in from the left', 'a13-onelander' ),
					'slide-right' => esc_html__( 'Slide in from the right', 'a13-onelander' ),
					'scale'       => esc_html__( 'Scale up', 'a13-onelander' ),
					'circle'      => esc_html__( 'Growing circle', 'a13-onelander' ),
				),
				'default'  => 'default',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'          => 'header_menu_overlay_on_click',
				'type'        => 'radio',
				'title'       => esc_html__( 'Close menu after click', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_align',
				'type'     => 'select',
				'title'    => esc_html__( 'Text align', 'a13-onelander' ),
				'options'  => $text_align,
				'default'  => 'center',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '#aaaaaa',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_color_hover',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default'  => '#ffffff',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_font_size',
				'type'     => 'slider',
				'title'    => esc_html__( 'Font size', 'a13-onelander' ),
				'min'      => 10,
				'step'     => 1,
				'max'      => 70,
				'unit'     => 'px',
				'default'  => 54,
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'a13-onelander' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
			array(
				'id'       => 'header_menu_overlay_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'a13-onelander' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'header_menu_overlay', '=', 'on' ),
			),
		)
	) );

//BLOG SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Blog settings', 'a13-onelander' ),
		'desc'     => esc_html__( 'Posts list refers to Blog, Search and Archives pages', 'a13-onelander' ),
		'id'       => 'section_blog_layout',
		'icon'     => 'fa fa-pencil',
		'priority' => 9,
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Background', 'a13-onelander' ),
		'id'         => 'subsection_blog_bg',
		'desc'       => esc_html__( 'This will be the default background for pages related to the blog.', 'a13-onelander' ),
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'blog_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'blog_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'a13-onelander' ),
				'required' => array( 'blog_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'blog_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'blog_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'blog_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'blog_custom_background', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Posts list', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_blog',
		'icon'       => 'fa fa-list',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'blog_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'blog_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'blog_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'a13-onelander' ),
				'options' => $content_layouts,
				'default' => 'center',
			),
			array(
				'id'      => 'blog_content_padding',
				'type'    => 'select',
				'title'   => esc_html__( 'Content', 'a13-onelander' ). ' : ' .esc_html__( 'Top/bottom padding', 'a13-onelander' ),
				'options' => array(
					'both'   => esc_html__( 'Both on', 'a13-onelander' ),
					'top'    => esc_html__( 'Only top', 'a13-onelander' ),
					'bottom' => esc_html__( 'Only bottom', 'a13-onelander' ),
					'off'    => esc_html__( 'Both off', 'a13-onelander' ),
				),
				'default' => 'off',
			),
			array(
				'id'      => 'blog_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'a13-onelander' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'a13-onelander' ),
					'right-sidebar' => esc_html__( 'Right', 'a13-onelander' ),
					'off'           => esc_html__( 'Off', 'a13-onelander' ),
				),
				'default' => 'off',
			),
			array(
				'id'      => 'blog_sidebar_rtl',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'a13-onelander' ). ' - ' .esc_html__( 'in RTL languages', 'a13-onelander' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'a13-onelander' ),
					'right-sidebar' => esc_html__( 'Right', 'a13-onelander' ),
					'off'           => esc_html__( 'Off', 'a13-onelander' ),
				),
				'default' => 'off',
			),
			array(
				'id'      => 'blog_post_look',
				'type'    => 'select',
				'title'   => esc_html__( 'Post look', 'a13-onelander' ),
				'options' => array(
					'vertical_no_padding' => esc_html__( 'Vertical no padding', 'a13-onelander' ),
					'vertical_padding'    => esc_html__( 'Vertical with padding', 'a13-onelander' ),
					'vertical_centered'   => esc_html__( 'Vertical centered', 'a13-onelander' ),
					'horizontal'          => esc_html__( 'Horizontal', 'a13-onelander' ),
				),
				'default' => 'vertical_padding',
			),
			array(
				'id'          => 'blog_layout_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to place items in rows', 'a13-onelander' ),
				'description' => esc_html__( 'If your items have different heights, you can start each row of items from a new line instead of the masonry style.', 'a13-onelander' ),
				'options'     => array(
					'packery' => esc_html__( 'Masonry', 'a13-onelander' ),
					'fitRows' => esc_html__( 'Each row from new line', 'a13-onelander' ),
				),
				'default'     => 'packery',
			),
			array(
				'id'          => 'blog_brick_columns',
				'type'        => 'slider',
				'title'       => esc_html__( 'Bricks columns', 'a13-onelander' ),
				'description' => esc_html__( 'It is a maximum number of columns displayed on larger devices. On smaller devices, it can be a lower number of columns.', 'a13-onelander' ),
				'min'         => 1,
				'max'         => 4,
				'step'        => 1,
				'unit'        => '',
				'default'     => 2,
				'required'    => array( 'blog_post_look', '!=', 'horizontal' ),
			),
			array(
				'id'          => 'blog_bricks_max_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'The maximum width of the brick layout', 'a13-onelander' ),
				'description' => esc_html__( 'Depending on the actual width of the screen, the available space for bricks may be smaller, but never greater than this number.', 'a13-onelander' ),
				'min'         => 200,
				'max'         => 2500,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 1920,
				'required'    => array( 'blog_post_look', '!=', 'horizontal' ),
			),
			array(
				'id'      => 'blog_brick_margin',
				'type'    => 'slider',
				'title'   => esc_html__( 'Brick margin', 'a13-onelander' ),
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 10,
			),
			array(
				'id'      => 'blog_lazy_load',
				'type'    => 'radio',
				'title'   => esc_html__( 'Lazy load', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'blog_lazy_load_mode',
				'type'     => 'radio',
				'title'    => esc_html__( 'Lazy load', 'a13-onelander' ). ' : ' . esc_html__( 'Type', 'a13-onelander' ),
				'options'  => array(
					'button' => esc_html__( 'By clicking button', 'a13-onelander' ),
					'auto'   => esc_html__( 'On scroll', 'a13-onelander' ),
				),
				'default'  => 'button',
				'required' => array( 'blog_lazy_load', '=', 'on' ),
			),
			array(
				'id'          => 'blog_read_more',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display "Read more" link', 'a13-onelander' ),
				'description' => esc_html__( 'Should "Read more" link be displayed after excerpts on blog list/search results.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'blog_excerpt_type',
				'type'        => 'radio',
				'title'       => esc_html__( 'Type of post excerpts', 'a13-onelander' ),
				'description' => wp_kses( __(
					'In the Manual mode, excerpts are used only if you add the "Read More Tag" (&lt;!--more--&gt;).<br /> In the Automatic mode, if you will not provide the "Read More Tag" or explicit excerpt, the content of the post will be truncated automatically.<br /> This setting only concerns blog list, archive list, search results.', 'a13-onelander' ), $valid_tags ),
				'options'     => array(
					'auto'   => esc_html__( 'Automatic', 'a13-onelander' ),
					'manual' => esc_html__( 'Manual', 'a13-onelander' ),
				),
				'default'     => 'auto',
			),
			array(
				'id'          => 'blog_excerpt_length',
				'type'        => 'slider',
				'title'       => esc_html__( 'Number of words to cut post', 'a13-onelander' ),
				'description' => esc_html__( 'After this many words post will be cut in the automatic mode.', 'a13-onelander' ),
				'min'         => 3,
				'max'         => 200,
				'step'        => 1,
				'unit'        => '',
				'default'     => 40,
				'required'    => array( 'blog_excerpt_type', '=', 'auto' ),
			),
			array(
				'id'          => 'blog_media',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display post Media', 'a13-onelander' ),
				'description' => esc_html__( 'You can set to not display post media(featured image/video/slider) inside of the post brick.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'      => 'blog_bricks_proportions_size',
				'type'    => 'select',
				'title'   => esc_html__( 'Choose the proportions of the bricks', 'a13-onelander' ) . ' : ' . esc_html__( 'Featured Image ', 'a13-onelander' ),
				'options' => array(
					'0'    => esc_html__( 'Original size', 'a13-onelander' ),
					'1/1'  => esc_html__( '1:1', 'a13-onelander' ),
					'2/3'  => esc_html__( '2:3', 'a13-onelander' ),
					'3/2'  => esc_html__( '3:2', 'a13-onelander' ),
					'3/4'  => esc_html__( '3:4', 'a13-onelander' ),
					'4/3'  => esc_html__( '4:3', 'a13-onelander' ),
					'9/16' => esc_html__( '9:16', 'a13-onelander' ),
					'16/9' => esc_html__( '16:9', 'a13-onelander' ),
				),
				'default' => '0',
				'required'    => array(
					array( 'blog_media', '=', 'on' ),
					array( 'blog_post_look', '!=', 'horizontal' ),
				)
			),
			array(
				'id'          => 'blog_videos',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display of posts video', 'a13-onelander' ),
				'description' => esc_html__( 'You can set to display videos as featured image on posts list. This can speed up loading of pages with many posts(blog, archive, search results) when the videos are used.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'blog_date',
				'type'        => 'radio',
				'title'       => esc_html__( 'Post info', 'a13-onelander' ). ' : ' .esc_html__( 'Date of publish or last update', 'a13-onelander' ),
				'description' => esc_html__( 'You can\'t use both dates, because the Search Engine will not know which date is correct.', 'a13-onelander' ),
				'options'     => array(
					'on'      => esc_html__( 'Published', 'a13-onelander' ),
					'updated' => esc_html__( 'Updated', 'a13-onelander' ),
					'off'     => esc_html__( 'Disable', 'a13-onelander' ),
				),
				'default'     => 'on',
			),
			array(
				'id'      => 'blog_author',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'a13-onelander' ). ' : ' .esc_html__( 'Author', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'blog_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'a13-onelander' ). ' : ' .esc_html__( 'Comments number', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'blog_cats',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'a13-onelander' ). ' : ' .esc_html__( 'Categories', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'blog_tags',
				'type'        => 'radio',
				'title'       => esc_html__( 'Tags', 'a13-onelander' ),
				'description' => esc_html__( 'Displays list of post tags under a post content.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'blog_header_custom_sidebar',
				'type'        => 'select',
				'title'       => esc_html__( 'Header', 'a13-onelander' ). ' : ' .esc_html__( 'Custom sidebar', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the vertical header.', 'a13-onelander' ),
				'options'     => $header_sidebars_off_global,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Posts list', 'a13-onelander' ). ' - ' .esc_html__( 'Title bar', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_blog_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'blog_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'blog_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'a13-onelander' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'a13-onelander' ),
					'centered' => esc_html__( 'Centered', 'a13-onelander' ),
				),
				'default'  => 'centered',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'a13-onelander' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'a13-onelander' ),
					'boxed' => esc_html__( 'Boxed', 'a13-onelander' ),
				),
				'default'  => 'full',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'          => 'blog_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Type', 'a13-onelander' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'a13-onelander' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'blog_title', '=', 'on' ),
					array( 'blog_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'blog_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Speed', 'a13-onelander' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'blog_title', '=', 'on' ),
					array( 'blog_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'blog_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'a13-onelander' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'a13-onelander' ),
				'default'     => '#ffffff',
				'required'    => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'          => 'blog_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'a13-onelander' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array( 'blog_title', '=', 'on' ),
			),
			array(
				'id'       => 'blog_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'blog_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Posts list', 'a13-onelander' ). ' - ' .esc_html__( 'Filter', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_blog_filter',
		'icon'       => 'fa fa-filter',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'blog_filter',
				'type'    => 'radio',
				'title'   => esc_html__( 'Filter', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'blog_filter_default_filter',
				'type'     => 'wp_dropdown_cpt_terms',
				'title'    => esc_html__( 'Default filter', 'a13-onelander' ),
				'for'      => 'post',
				'default'  => '__all',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_all_filter',
				'type'     => 'radio',
				'title'    => esc_html__( 'Display "All" filter', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required'    => array(
					array( 'blog_filter', '=', 'on' ),
					array( 'blog_filter_default_filter', '!=', '__all' ),
				)
			),
			array(
				'id'       => 'blog_filter_padding',
				'type'     => 'spacing',
				'title'    => esc_html__( 'Padding', 'a13-onelander' ),
				'mode'     => 'padding',
				'sides'    => array( 'top', 'bottom' ),
				'units'    => array( 'px', 'em' ),
				'default'  => array(
					'padding-top'    => '40px',
					'padding-bottom' => '40px',
					'units'          => 'px'
				),
				'required' => array( 'blog_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'blog_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '#000000',
				'required' => array( 'blog_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'required' => array( 'blog_filter', '=', 'on' ),
				'default'  => '#000000',
			),
			array(
				'id'      => 'blog_filter_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'a13-onelander' ),
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => '',
				'required' => array( 'blog_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'a13-onelander' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'blog_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'a13-onelander' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'blog_filter', '=', 'on' ),
			),
			array(
				'id'       => 'blog_filter_text_align',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text align', 'a13-onelander' ),
				'options'  => $text_align,
				'default'  => 'center',
				'required' => array( 'blog_filter', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single post', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_post',
		'icon'       => 'fa fa-pencil-square',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'post_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'post_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'post_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'a13-onelander' ),
				'options' => $content_layouts,
				'default' => 'center',
			),
			array(
				'id'      => 'post_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'a13-onelander' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'a13-onelander' ),
					'right-sidebar' => esc_html__( 'Right', 'a13-onelander' ),
					'off'           => esc_html__( 'Off', 'a13-onelander' ),
				),
				'default' => 'right-sidebar',
			),
			array(
				'id'      => 'post_sidebar_rtl',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'a13-onelander' ). ' - ' .esc_html__( 'in RTL languages', 'a13-onelander' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'a13-onelander' ),
					'right-sidebar' => esc_html__( 'Right', 'a13-onelander' ),
					'off'           => esc_html__( 'Off', 'a13-onelander' ),
				),
				'default' => 'left-sidebar',
			),
			array(
				'id'          => 'post_media',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display post Media', 'a13-onelander' ),
				'description' => esc_html__( 'You can set to not display post media(featured image/video/slider) inside of the post.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'post_author_info',
				'type'        => 'radio',
				'title'       => esc_html__( 'Author info', 'a13-onelander' ),
				'description' => esc_html__( 'Will show information about author below post content.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'post_date',
				'type'        => 'radio',
				'title'       => esc_html__( 'Post info', 'a13-onelander' ). ' : ' .esc_html__( 'Date of publish or last update', 'a13-onelander' ),
				'description' => esc_html__( 'You can\'t use both dates, because the Search Engine will not know which date is correct.', 'a13-onelander' ),
				'options'     => array(
					'on'      => esc_html__( 'Published', 'a13-onelander' ),
					'updated' => esc_html__( 'Updated', 'a13-onelander' ),
					'off'     => esc_html__( 'Disable', 'a13-onelander' ),
				),
				'default'     => 'on',
			),
			array(
				'id'      => 'post_author',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'a13-onelander' ). ' : ' .esc_html__( 'Author', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'post_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'a13-onelander' ). ' : ' .esc_html__( 'Comments number', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'post_cats',
				'type'    => 'radio',
				'title'   => esc_html__( 'Post info', 'a13-onelander' ). ' : ' .esc_html__( 'Categories', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'post_tags',
				'type'        => 'radio',
				'title'       => esc_html__( 'Tags', 'a13-onelander' ),
				'description' => esc_html__( 'Displays list of post tags under a post content.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'post_navigation',
				'type'        => 'radio',
				'title'       => esc_html__( 'Posts navigation', 'a13-onelander' ),
				'description' => esc_html__( 'Links to next and prev post.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),

		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single post', 'a13-onelander' ). ' - ' .esc_html__( 'Title bar', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_post_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'post_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'post_title_bar_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title position', 'a13-onelander' ),
				'options'  => array(
					'outside' => esc_html__( 'Before the content', 'a13-onelander' ),
					'inside'  => esc_html__( 'Inside the content', 'a13-onelander' ),
				),
				'default'  => 'inside',
				'required' => array( 'post_title', '=', 'on' ),
			),
			array(
				'id'       => 'post_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'a13-onelander' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'a13-onelander' ),
					'centered' => esc_html__( 'Centered', 'a13-onelander' ),
				),
				'default'  => 'classic',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'a13-onelander' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'a13-onelander' ),
					'boxed' => esc_html__( 'Boxed', 'a13-onelander' ),
				),
				'default'  => 'full',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'a13-onelander' ),
				'default'  => '',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'a13-onelander' ),
				'default'  => 'off',
				'options'  => $on_off,
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'post_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Type', 'a13-onelander' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'a13-onelander' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
					array( 'post_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'post_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Speed', 'a13-onelander' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
					array( 'post_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'post_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'a13-onelander' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'post_title', '=', 'on' ),
			),
			array(
				'id'       => 'post_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'post_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'post_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'a13-onelander' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array(
					array( 'post_title', '=', 'on' ),
					array( 'post_title_bar_position', '!=', 'inside' ),
				)
			),
		)
	) );

//SHOP SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Shop(WooCommerce) settings', 'a13-onelander' ),
		'desc'     => '',
		'id'       => 'section_shop_general',
		'icon'     => 'fa fa-shopping-cart',
		'priority' => 12,
		'woocommerce_required' => true,//only visible with WooCommerce plugin being available
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Background', 'a13-onelander' ),
		'desc'       => esc_html__( 'These options will work for all shop pages - product list, single product and other.', 'a13-onelander' ),
		'id'         => 'subsection_shop_general',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'shop_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'shop_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'a13-onelander' ),
				'required' => array( 'shop_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'shop_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'shop_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'shop_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'a13-onelander' ),
				'required' => array( 'shop_custom_background', '=', 'on' ),
				'default'  => '',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Products list', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_shop',
		'icon'       => 'fa fa-list',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'shop_search',
				'type'        => 'radio',
				'title'       => esc_html__( 'Search in products instead of pages', 'a13-onelander' ),
				'description' => esc_html__( 'It will change WordPress default search function to make shop search. So when this is activated search function in header or search widget will act as WooCommerece search widget.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'shop_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'shop_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'shop_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'a13-onelander' ),
				'options' => $content_layouts,
				'default' => 'full',
			),
			array(
				'id'      => 'shop_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'a13-onelander' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'a13-onelander' ),
					'right-sidebar' => esc_html__( 'Right', 'a13-onelander' ),
					'off'           => esc_html__( 'Off', 'a13-onelander' ),
				),
				'default' => 'left-sidebar',
			),
			array(
				'id'      => 'shop_sidebar_rtl',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'a13-onelander' ). ' - ' .esc_html__( 'in RTL languages', 'a13-onelander' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'a13-onelander' ),
					'right-sidebar' => esc_html__( 'Right', 'a13-onelander' ),
					'off'           => esc_html__( 'Off', 'a13-onelander' ),
				),
				'default' => 'right-sidebar',
			),
			array(
				'id'      => 'shop_products_variant',
				'type'    => 'radio',
				'title'   => esc_html__( 'Look of products on list', 'a13-onelander' ),
				'options' => array(
					'overlay' => esc_html__( 'Text as overlay', 'a13-onelander' ),
					'under'   => esc_html__( 'Text under photo', 'a13-onelander' ),
				),
				'default' => 'overlay',
			),
			array(
				'id'       => 'shop_products_subvariant',
				'type'     => 'select',
				'title'    => esc_html__( 'Look of products on list', 'a13-onelander' ),
				'options'  => array(
					'left'   => esc_html__( 'Texts to left', 'a13-onelander' ),
					'center' => esc_html__( 'Texts to center', 'a13-onelander' ),
					'right'  => esc_html__( 'Texts to right', 'a13-onelander' ),
				),
				'default'  => 'center',
				'required' => array( 'shop_products_variant', '=', 'under' ),
			),
			array(
				'id'      => 'shop_add_to_cart',
				'type'    => 'radio',
				'title'   => esc_html__( 'Where to display the "Add to Cart" button', 'a13-onelander' ),
				'options' => array(
					'over' => esc_html__( 'Over the image', 'a13-onelander' ),
					'in-text'   => esc_html__( 'In the text', 'a13-onelander' ),
				),
				'default' => 'over',
				'required' => array( 'shop_products_variant', '=', 'under' ),
			),
			array(
				'id'      => 'shop_products_second_image',
				'type'    => 'radio',
				'title'   => esc_html__( 'Show second image of product on hover', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'shop_products_layout_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to place items in rows', 'a13-onelander' ),
				'description' => esc_html__( 'If your items have different heights, you can start each row of items from a new line instead of the masonry style.', 'a13-onelander' ),
				'options'     => array(
					'packery' => esc_html__( 'Masonry', 'a13-onelander' ),
					'fitRows' => esc_html__( 'Each row from new line', 'a13-onelander' ),
				),
				'default'     => 'packery',
			),
			array(
				'id'          => 'shop_products_columns',
				'type'        => 'slider',
				'title'       => esc_html__( 'Bricks columns', 'a13-onelander' ),
				'description' => esc_html__( 'It is a maximum number of columns displayed on larger devices. On smaller devices, it can be a lower number of columns.', 'a13-onelander' ),
				'min'         => 1,
				'max'         => 4,
				'step'        => 1,
				'unit'        => '',
				'default'     => 4,
			),
			array(
				'id'          => 'shop_products_columns_on_mobile',
				'type'        => 'radio',
				'title'       => esc_html__( 'Bricks columns', 'a13-onelander' ). ' - ' .esc_html__( 'on mobiles', 'a13-onelander' ),
				'description' => esc_html__( 'It will be used on small devices(less than 600 pixels wide).', 'a13-onelander' ),
				'options' => array(
					'1' => '1',
					'2' => '2',
				),
				'default'     => 1,
			),
			array(
				'id'      => 'shop_products_per_page',
				'type'    => 'slider',
				'title'   => esc_html__( 'Items per page', 'a13-onelander' ),
				'min'     => 1,
				'max'     => 30,
				'step'    => 1,
				'unit'    => '',
				'default' => 12,
			),
			array(
				'id'      => 'shop_brick_margin',
				'type'    => 'slider',
				'title'   => esc_html__( 'Brick margin', 'a13-onelander' ),
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 20,
			),
			array(
				'id'      => 'shop_lazy_load',
				'type'    => 'radio',
				'title'   => esc_html__( 'Lazy load', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'shop_lazy_load_mode',
				'type'     => 'radio',
				'title'    => esc_html__( 'Lazy load', 'a13-onelander' ). ' : ' . esc_html__( 'Type', 'a13-onelander' ),
				'options'  => array(
					'button' => esc_html__( 'By clicking button', 'a13-onelander' ),
					'auto'   => esc_html__( 'On scroll', 'a13-onelander' ),
				),
				'default'  => 'auto',
				'required' => array( 'shop_lazy_load', '=', 'on' ),
			),
			array(
				'id'          => 'shop_header_custom_sidebar',
				'type'        => 'select',
				'title'       => esc_html__( 'Header', 'a13-onelander' ). ' : ' .esc_html__( 'Custom sidebar', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the vertical header.', 'a13-onelander' ),
				'options'     => $header_sidebars_off_global,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Products list', 'a13-onelander' ). ' - ' .esc_html__( 'Title bar', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_shop_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'shop_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'shop_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'a13-onelander' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'a13-onelander' ),
					'centered' => esc_html__( 'Centered', 'a13-onelander' ),
				),
				'default'  => 'classic',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'a13-onelander' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'a13-onelander' ),
					'boxed' => esc_html__( 'Boxed', 'a13-onelander' ),
				),
				'default'  => 'full',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'          => 'shop_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Type', 'a13-onelander' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'a13-onelander' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'shop_title', '=', 'on' ),
					array( 'shop_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'shop_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Speed', 'a13-onelander' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'shop_title', '=', 'on' ),
					array( 'shop_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'shop_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'a13-onelander' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'          => 'shop_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'a13-onelander' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array( 'shop_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'shop_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single product', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_product',
		'icon'       => 'fa fa-pencil-square',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'product_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'product_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'product_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'a13-onelander' ),
				'options' => $content_layouts,
				'default' => 'full_fixed',
			),
			array(
				'id'      => 'product_sidebar',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'a13-onelander' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'a13-onelander' ),
					'right-sidebar' => esc_html__( 'Right', 'a13-onelander' ),
					'off'           => esc_html__( 'Off', 'a13-onelander' ),
				),
				'default' => 'left-sidebar',
			),
			array(
				'id'      => 'product_sidebar_rtl',
				'type'    => 'select',
				'title'   => esc_html__( 'Sidebar', 'a13-onelander' ). ' - ' .esc_html__( 'in RTL languages', 'a13-onelander' ),
				'options' => array(
					'left-sidebar'  => esc_html__( 'Left', 'a13-onelander' ),
					'right-sidebar' => esc_html__( 'Right', 'a13-onelander' ),
					'off'           => esc_html__( 'Off', 'a13-onelander' ),
				),
				'default' => 'right-sidebar',
			),
			array(
				'id'          => 'product_custom_thumbs',
				'type'        => 'radio',
				'title'       => esc_html__( 'Theme thumbnails', 'a13-onelander' ),
				'description' => esc_html__( 'If disabled it will display standard WooCommerce thumbnails.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'product_related_products',
				'type'        => 'radio',
				'title'       => esc_html__( 'Related products', 'a13-onelander' ),
				'description' => esc_html__( 'Should related products be displayed on single product page.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single product', 'a13-onelander' ). ' - ' .esc_html__( 'Title bar', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_product_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'product_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'product_title_bar_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title position', 'a13-onelander' ),
				'options'  => array(
					'outside' => esc_html__( 'Before the content', 'a13-onelander' ),
					'inside'  => esc_html__( 'Inside the content', 'a13-onelander' ),
				),
				'default'  => 'inside',
				'required' => array( 'product_title', '=', 'on' ),
			),
			array(
				'id'       => 'product_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'a13-onelander' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'a13-onelander' ),
					'centered' => esc_html__( 'Centered', 'a13-onelander' ),
				),
				'default'  => 'classic',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'a13-onelander' ),
				'default'  => '',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'product_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Type', 'a13-onelander' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'a13-onelander' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
					array( 'product_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'product_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Speed', 'a13-onelander' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
					array( 'product_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'product_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'a13-onelander' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'a13-onelander' ),
				'default'     => '',
				'required'    => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'product_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'a13-onelander' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'product_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array(
					array( 'product_title', '=', 'on' ),
					array( 'product_title_bar_position', '!=', 'inside' ),
				)
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Other shop pages', 'a13-onelander' ),
		'desc'       => esc_html__( 'Settings for cart, checkout, order received and my account pages.', 'a13-onelander' ),
		'id'         => 'subsection_shop_no_major_pages',
		'icon'       => 'fa fa-cog',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'shop_no_major_pages_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'shop_no_major_pages_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'shop_no_major_pages_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'a13-onelander' ),
				'options' => $content_layouts,
				'default' => 'full_fixed',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'desc'       => esc_html__( 'Settings for cart, checkout, order received and my account pages.', 'a13-onelander' ),
		'title'      => esc_html__( 'Other shop pages', 'a13-onelander' ). ' - ' .esc_html__( 'Title bar', 'a13-onelander' ),
		'id'         => 'subsection_shop_no_major_pages_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'shop_no_major_pages_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'a13-onelander' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'a13-onelander' ),
					'centered' => esc_html__( 'Centered', 'a13-onelander' ),
				),
				'default'  => 'classic',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'a13-onelander' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'a13-onelander' ),
					'boxed' => esc_html__( 'Boxed', 'a13-onelander' ),
				),
				'default'  => 'full',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'          => 'shop_no_major_pages_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Type', 'a13-onelander' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'a13-onelander' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'shop_no_major_pages_title', '=', 'on' ),
					array( 'shop_no_major_pages_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'shop_no_major_pages_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Speed', 'a13-onelander' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'shop_no_major_pages_title', '=', 'on' ),
					array( 'shop_no_major_pages_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'shop_no_major_pages_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'a13-onelander' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'          => 'shop_no_major_pages_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'a13-onelander' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
			array(
				'id'       => 'shop_no_major_pages_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'shop_no_major_pages_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Pop up basket', 'a13-onelander' ),
		'desc'       => esc_html__( 'When WooCommerce is activated, button opening this basket will appear in the header. There also have to be some active widgets in "Basket sidebar" for this.', 'a13-onelander' ),
		'id'         => 'subsection_basket_sidebars',
		'icon'       => 'fa fa-shopping-basket',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'      => 'basket_sidebar_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'a13-onelander' ),
				'default' => '',
			),
			array(
				'id'      => 'basket_sidebar_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'a13-onelander' ),
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => '',
			),
			array(
				'id'          => 'basket_sidebar_widgets_color',
				'type'        => 'radio',
				'title'       => esc_html__( 'Widgets colors', 'a13-onelander' ),
				'description' => esc_html__( 'Depending on what background you have set up, choose proper option.', 'a13-onelander' ),
				'options'     => array(
					'dark-sidebar'  => esc_html__( 'On dark', 'a13-onelander' ),
					'light-sidebar' => esc_html__( 'On light', 'a13-onelander' ),
				),
				'default'     => 'light-sidebar',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Buttons', 'a13-onelander' ),
		'desc'       => esc_html__( 'You can change here the colors of buttons used in the shop. Alternative buttons colors are used in various places in the shop.', 'a13-onelander' ),
		'id'         => 'subsection_buttons_shop',
		'icon'       => 'fa fa-arrow-down',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'button_shop_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'a13-onelander' ),
				'default' => '#524F51',
			),
			array(
				'id'      => 'button_shop_bg_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Background color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'button_shop_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'a13-onelander' ),
				'default' => '#cccccc'
			),
			array(
				'id'      => 'button_shop_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default' => '#ffffff'
			),
			array(
				'id'      => 'button_shop_alt_bg_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Alternative button', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'default' => '#524F51',
			),
			array(
				'id'      => 'button_shop_alt_bg_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Alternative button', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default' => '#000000',
			),
			array(
				'id'      => 'button_shop_alt_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Alternative button', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default' => '#cccccc'
			),
			array(
				'id'      => 'button_shop_alt_hover_color',
				'type'    => 'color',
				'title'   => esc_html__( 'Alternative button', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'default' => '#ffffff'
			),
			array(
				'id'      => 'button_shop_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'a13-onelander' ),
				'min'     => 10,
				'max'     => 60,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 13,
			),
			array(
				'id'      => 'button_shop_weight',
				'type'    => 'select',
				'title'   => esc_html__( 'Font weight', 'a13-onelander' ),
				'options' => $font_weights,
				'default' => 'bold',
			),
			array(
				'id'      => 'button_shop_transform',
				'type'    => 'radio',
				'title'   => esc_html__( 'Text transform', 'a13-onelander' ),
				'options' => $font_transforms,
				'default' => 'uppercase',
			),
			array(
				'id'      => 'button_shop_padding',
				'type'    => 'spacing',
				'title'   => esc_html__( 'Padding', 'a13-onelander' ),
				'mode'    => 'padding',
				'sides'   => array( 'left', 'right' ),
				'units'   => array( 'px', 'em' ),
				'default' => array(
					'padding-left'  => '30px',
					'padding-right' => '30px',
					'units'         => 'px'
				),
			),
		)
	) );

//PAGE SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Page settings', 'a13-onelander' ),
		'desc'     => '',
		'id'       => 'section_page',
		'icon'     => 'el el-file-edit',
		'priority' => 15,
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single page', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_page',
		'icon'       => 'el el-file-edit',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'page_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Comments', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'page_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'page_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'page_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'a13-onelander' ),
				'options' => $content_layouts,
				'default' => 'center',
			),
			array(
				'id'          => 'page_sidebar',
				'type'        => 'select',
				'title'       => esc_html__( 'Sidebar', 'a13-onelander' ),
				'description' => esc_html__( 'You can change it in each page settings.', 'a13-onelander' ),
				'options'     => array(
					'left-sidebar'          => esc_html__( 'Sidebar on the left', 'a13-onelander' ),
					'left-sidebar_and_nav'  => esc_html__( 'Children Navigation + sidebar on the left', 'a13-onelander' ),
					'left-nav'              => esc_html__( 'Only children Navigation on the left', 'a13-onelander' ),
					'right-sidebar'         => esc_html__( 'Sidebar on the right', 'a13-onelander' ),
					'right-sidebar_and_nav' => esc_html__( 'Children Navigation + sidebar on the right', 'a13-onelander' ),
					'right-nav'             => esc_html__( 'Only children Navigation on the right', 'a13-onelander' ),
					'off'                   => esc_html__( 'Off', 'a13-onelander' ),
				),
				'default'     => 'off',
			),
			array(
				'id'          => 'page_sidebar_rtl',
				'type'        => 'select',
				'title'       => esc_html__( 'Sidebar', 'a13-onelander' ). ' - ' .esc_html__( 'in RTL languages', 'a13-onelander' ),
				'description' => esc_html__( 'You can change it in each page settings.', 'a13-onelander' ),
				'options'     => array(
					'left-sidebar'          => esc_html__( 'Sidebar on the left', 'a13-onelander' ),
					'left-sidebar_and_nav'  => esc_html__( 'Children Navigation + sidebar on the left', 'a13-onelander' ),
					'left-nav'              => esc_html__( 'Only children Navigation on the left', 'a13-onelander' ),
					'right-sidebar'         => esc_html__( 'Sidebar on the right', 'a13-onelander' ),
					'right-sidebar_and_nav' => esc_html__( 'Children Navigation + sidebar on the right', 'a13-onelander' ),
					'right-nav'             => esc_html__( 'Only children Navigation on the right', 'a13-onelander' ),
					'off'                   => esc_html__( 'Off', 'a13-onelander' ),
				),
				'default'     => 'off',
			),
			array(
				'id'      => 'page_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'page_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'a13-onelander' ),
				'required' => array( 'page_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'page_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'page_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'page_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'a13-onelander' ),
				'required' => array( 'page_custom_background', '=', 'on' ),
				'default'  => '',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single page', 'a13-onelander' ). ' - ' .esc_html__( 'Title bar', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_page_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'page_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'page_title_bar_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title position', 'a13-onelander' ),
				'options'  => array(
					'outside' => esc_html__( 'Before the content', 'a13-onelander' ),
					'inside'  => esc_html__( 'Inside the content', 'a13-onelander' ),
				),
				'default'  => 'outside',
				'required' => array( 'page_title', '=', 'on' ),
			),
			array(
				'id'       => 'page_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'a13-onelander' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'a13-onelander' ),
					'centered' => esc_html__( 'Centered', 'a13-onelander' ),
				),
				'default'  => 'classic',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'a13-onelander' ),
				'default'  => '',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'page_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Type', 'a13-onelander' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'a13-onelander' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
					array( 'page_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'page_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Speed', 'a13-onelander' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
					array( 'page_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'page_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'a13-onelander' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'page_title', '=', 'on' ),
			),
			array(
				'id'       => 'page_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'          => 'page_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'a13-onelander' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => '40',
				'required' => array(
					array( 'page_title', '=', 'on' ),
					array( 'page_title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'id'       => 'page_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'page_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( '404 page template', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_404_page',
		'icon'       => 'fa fa-exclamation-triangle',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'page_404_template_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Type', 'a13-onelander' ),
				'options' => array(
					'default' => esc_html__( 'Default', 'a13-onelander' ),
					'custom'  => esc_html__( 'Custom', 'a13-onelander' ),
				),
				'default' => 'default',
			),
			array(
				'id'       => 'page_404_bg_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Default but I want to change the background image', 'a13-onelander' ),
				'required' => array( 'page_404_template_type', '=', 'default' ),
			),
			array(
				'id'       => 'page_404_template',
				'type'     => 'dropdown-pages',
				'title'    => esc_html__( 'Choose the page as your template', 'a13-onelander' ),
				'required' => array( 'page_404_template_type', '=', 'custom' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Maintenance mode', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_maintenance_page',
		'icon'       => 'fa fa-wrench',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'maintenance_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'Maintenance mode', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'       => 'maintenance_mode_page',
				'type'     => 'dropdown-pages',
				'title'    => esc_html__( 'Choose the page as your template', 'a13-onelander' ),
				'required' => array( 'maintenance_mode', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Password protected page template', 'a13-onelander' ),
		'id'         => 'subsection_password_page',
		'icon'       => 'fa fa-lock',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'page_password_template_type',
				'type'    => 'radio',
				'title'   => esc_html__( 'Type', 'a13-onelander' ),
				'options' => array(
					'default' => esc_html__( 'Default', 'a13-onelander' ),
					'custom'  => esc_html__( 'Custom', 'a13-onelander' ),
				),
				'default' => 'default',
			),
			array(
				'id'       => 'page_password_bg_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Default but I want to change the background image', 'a13-onelander' ),
				'required' => array( 'page_password_template_type', '=', 'default' ),
			),
			array(
				'id'       => 'page_password_template',
				'type'     => 'dropdown-pages',
				'title'    => esc_html__( 'Choose the page as your template', 'a13-onelander' ),
				'required' => array( 'page_password_template_type', '=', 'custom' ),
			),
		)
	) );

//WORKS SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Works settings', 'a13-onelander' ),
		'desc'     => '',
		'id'       => 'section_works',
		'icon'     => 'fa fa-cogs',
		'priority' => 18,
		'companion_required' => true,//only visible with companion plugin being available
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Background', 'a13-onelander' ),
		'desc'       => esc_html__( 'These will work for Works list and single work.', 'a13-onelander' ),
		'id'         => 'subsection_works_general',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'works_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'works_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'a13-onelander' ),
				'required' => array( 'works_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'works_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'works_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'works_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'works_custom_background', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Works list', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_works_list',
		'icon'       => 'fa fa-list',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'works_list_page',
				'type'        => 'dropdown-pages',
				'title'       => esc_html__( 'Works list', 'a13-onelander' ). ' - ' .esc_html__( 'Main page', 'a13-onelander' ),
				'description' => esc_html__( 'This page will list all your works and also give the main title for "work category" pages.', 'a13-onelander' ),
			),
			array(
				'id'          => 'works_list_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'works_list_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'works_list_work_how_to_open',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to open work', 'a13-onelander' ),
				'description' => esc_html__( '"In lightbox" will load work content dynamically with JavaScript. Cause of that use JavaScripts plugins is very limited in such works. If you need page builder elements, then use normal mode.', 'a13-onelander' ),
				'options'     => array(
					'normal'      => esc_html__( 'Normal', 'a13-onelander' ),
					'in-lightbox' => esc_html__( 'In lightbox', 'a13-onelander' ),
				),
				'default'     => 'normal',
			),
			array(
				'id'       => 'works_list_protected_titles',
				'type'     => 'radio',
				'title'    => esc_html__( 'Hide titles of password protected items', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
			),
			array(
				'id'      => 'works_list_work_look',
				'type'    => 'radio',
				'title'   => esc_html__( 'Work look', 'a13-onelander' ),
				'options' => array(
					'overlay' => esc_html__( 'Title over photo', 'a13-onelander' ),
					'under'   => esc_html__( 'Title under photo', 'a13-onelander' ),
				),
				'default' => 'overlay',
			),
			array(
				'id'       => 'works_list_work_overlay_title_position',
				'type'     => 'select',
				'title'    => esc_html__( 'Texts position', 'a13-onelander' ),
				'options'  => array(
					'top_left'      => esc_html__( 'Top left', 'a13-onelander' ),
					'top_center'    => esc_html__( 'Top center', 'a13-onelander' ),
					'top_right'     => esc_html__( 'Top right', 'a13-onelander' ),
					'mid_left'      => esc_html__( 'Middle left', 'a13-onelander' ),
					'mid_center'    => esc_html__( 'Middle center', 'a13-onelander' ),
					'mid_right'     => esc_html__( 'Middle right', 'a13-onelander' ),
					'bottom_left'   => esc_html__( 'Bottom left', 'a13-onelander' ),
					'bottom_center' => esc_html__( 'Bottom center', 'a13-onelander' ),
					'bottom_right'  => esc_html__( 'Bottom right', 'a13-onelander' ),
				),
				'default'  => 'top_left',
				'required' => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'works_list_work_overlay_cover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show overlay', 'a13-onelander' ). ' - ' .esc_html__( 'without hover', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'works_list_work_overlay_cover_hover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show overlay', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'          => 'works_list_work_overlay_gradient',
				'type'        => 'radio',
				'title'       => esc_html__( 'Show gradient', 'a13-onelander' ). ' - ' .esc_html__( 'without hover', 'a13-onelander' ),
				'description' => esc_html__( 'Its main function is to make texts more visible', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'          => 'works_list_work_overlay_gradient_hover',
				'type'        => 'radio',
				'title'       => esc_html__( 'Show gradient', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'description' => esc_html__( 'Its main function is to make texts more visible', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'works_list_work_overlay_texts',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show texts', 'a13-onelander' ). ' - ' .esc_html__( 'without hover', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'works_list_work_overlay_texts_hover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show texts', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'works_list_work_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'works_list_work_under_title_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Texts position', 'a13-onelander' ),
				'options'  => $text_align,
				'default'  => 'left',
				'required' => array( 'works_list_work_look', '=', 'under' ),
			),
			array(
				'id'          => 'works_list_bricks_hover',
				'type'        => 'select',
				'title'       => esc_html__( 'Hover effect', 'a13-onelander' ),
				'options'     => $bricks_hover,
				'default'     => 'cross',
			),
			array(
				'id'      => 'works_list_items_per_page',
				'type'    => 'slider',
				'title'   => esc_html__( 'Items per page', 'a13-onelander' ),
				'min'     => 1,
				'max'     => 30,
				'step'    => 1,
				'unit'    => '',
				'default' => 12,
			),
			array(
				'id'          => 'works_list_layout_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to place items in rows', 'a13-onelander' ),
				'description' => esc_html__( 'If your items have different heights, you can start each row of items from a new line instead of the masonry style.', 'a13-onelander' ),
				'options'     => array(
					'packery' => esc_html__( 'Masonry', 'a13-onelander' ),
					'fitRows' => esc_html__( 'Each row from new line', 'a13-onelander' ),
				),
				'default'     => 'packery',
			),
			array(
				'id'          => 'works_list_brick_columns',
				'type'        => 'slider',
				'title'       => esc_html__( 'Bricks columns', 'a13-onelander' ),
				'description' => esc_html__( 'It is a maximum number of columns displayed on larger devices. On smaller devices, it can be a lower number of columns.', 'a13-onelander' ),
				'min'         => 1,
				'max'         => 4,
				'step'        => 1,
				'default'     => 3,
				'unit'        => '',
			),
			array(
				'id'          => 'works_list_bricks_max_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'The maximum width of the brick layout', 'a13-onelander' ),
				'description' => esc_html__( 'Depending on the actual width of the screen, the available space for bricks may be smaller, but never greater than this number.', 'a13-onelander' ),
				'min'         => 200,
				'max'         => 2500,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 2000,
			),
			array(
				'id'      => 'works_list_brick_margin',
				'type'    => 'slider',
				'title'   => esc_html__( 'Brick margin', 'a13-onelander' ),
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 10,
			),
			array(
				'id'      => 'works_list_bricks_proportions_size',
				'type'    => 'select',
				'title'   => esc_html__( 'Choose the proportions of the bricks', 'a13-onelander' ),
				'options' => array(
					'0'    => esc_html__( 'Original size', 'a13-onelander' ),
					'1/1'  => esc_html__( '1:1', 'a13-onelander' ),
					'2/3'  => esc_html__( '2:3', 'a13-onelander' ),
					'3/2'  => esc_html__( '3:2', 'a13-onelander' ),
					'3/4'  => esc_html__( '3:4', 'a13-onelander' ),
					'4/3'  => esc_html__( '4:3', 'a13-onelander' ),
					'9/16' => esc_html__( '9:16', 'a13-onelander' ),
					'16/9' => esc_html__( '16:9', 'a13-onelander' ),
				),
				'default' => '0',
			),
			array(
				'id'      => 'works_list_lazy_load',
				'type'    => 'radio',
				'title'   => esc_html__( 'Lazy load', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'works_list_lazy_load_mode',
				'type'     => 'radio',
				'title'    => esc_html__( 'Lazy load', 'a13-onelander' ). ' : ' . esc_html__( 'Type', 'a13-onelander' ),
				'options'  => array(
					'button' => esc_html__( 'By clicking button', 'a13-onelander' ),
					'auto'   => esc_html__( 'On scroll', 'a13-onelander' ),
				),
				'default'  => 'button',
				'required' => array( 'works_list_lazy_load', '=', 'on' ),
			),
			array(
				'id'      => 'works_list_categories',
				'type'    => 'radio',
				'title'   => esc_html__( 'Work info', 'a13-onelander' ). ' : ' .esc_html__( 'Categories', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'works_list_header_custom_sidebar',
				'type'        => 'select',
				'title'       => esc_html__( 'Header', 'a13-onelander' ). ' : ' .esc_html__( 'Custom sidebar', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the vertical header.', 'a13-onelander' ),
				'options'     => $header_sidebars_off_global,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Works list', 'a13-onelander' ). ' - ' .esc_html__( 'Title bar', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_works_list_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'works_list_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'works_list_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'a13-onelander' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'a13-onelander' ),
					'centered' => esc_html__( 'Centered', 'a13-onelander' ),
				),
				'default'  => 'classic',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'a13-onelander' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'a13-onelander' ),
					'boxed' => esc_html__( 'Boxed', 'a13-onelander' ),
				),
				'default'  => 'full',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'a13-onelander' ),
				'default'  => 'off',
				'options'  => $on_off,
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'          => 'works_list_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Type', 'a13-onelander' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'a13-onelander' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'works_list_title', '=', 'on' ),
					array( 'works_list_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'works_list_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Speed', 'a13-onelander' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'works_list_title', '=', 'on' ),
					array( 'works_list_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'works_list_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'a13-onelander' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'          => 'works_list_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'a13-onelander' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 40,
				'required' => array( 'works_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'works_list_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Works list', 'a13-onelander' ). ' - ' .esc_html__( 'Filter', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_works_list_filter',
		'icon'       => 'fa fa-filter',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'works_list_filter',
				'type'    => 'radio',
				'title'   => esc_html__( 'Filter', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'works_list_filter_default_filter',
				'type'     => 'wp_dropdown_cpt_terms',
				'title'    => esc_html__( 'Default filter', 'a13-onelander' ),
				'for'      => 'work',
				'default'  => '__all',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_all_filter',
				'type'     => 'radio',
				'title'    => esc_html__( 'Display "All" filter', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required'    => array(
					array( 'works_list_filter', '=', 'on' ),
					array( 'works_list_filter_default_filter', '!=', '__all' ),
				)
			),
			array(
				'id'       => 'works_list_filter_padding',
				'type'     => 'spacing',
				'title'    => esc_html__( 'Padding', 'a13-onelander' ),
				'mode'     => 'padding',
				'sides'    => array( 'top', 'bottom' ),
				'units'    => array( 'px', 'em' ),
				'default'  => array(
					'padding-top'    => '40px',
					'padding-bottom' => '40px',
					'units'          => 'px'
				),
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '#000000',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'required' => array( 'works_list_filter', '=', 'on' ),
				'default'  => '#000000',
			),
			array(
				'id'      => 'works_list_filter_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'a13-onelander' ),
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => '',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'a13-onelander' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'a13-onelander' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'works_list_filter_text_align',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text align', 'a13-onelander' ),
				'options'  => $text_align,
				'default'  => 'center',
				'required' => array( 'works_list_filter', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single work', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_single_work',
		'icon'       => 'fa fa-th',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'work_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Comments', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'work_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'work_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'      => 'work_content_layout',
				'type'    => 'select',
				'title'   => esc_html__( 'Content Layout', 'a13-onelander' ),
				'options' => $content_layouts,
				'default' => 'center',
			),
			array(
				'id'      => 'work_content_categories',
				'type'    => 'radio',
				'title'   => esc_html__( 'Categories in content', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'      => 'work_navigation',
				'type'    => 'radio',
				'title'   => esc_html__( 'Works navigation', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'work_navigate_by_categories',
				'type'        => 'radio',
				'title'       => esc_html__( 'Navigate by categories', 'a13-onelander' ),
				'description' => esc_html__( 'If enabled, navigation leads to the next/previous item in the same category. If disabled, it will navigate through items according to the order of the "publication date".', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'work_navigation', '=', 'on' ),
			),
			array(
				'id'          => 'work_similar_works',
				'type'        => 'radio',
				'title'       => esc_html__( 'Similar works', 'a13-onelander' ),
				'description' => esc_html__( 'Will display list(up to 3 items) of similar works at bottom of work content.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'work_bricks_thumb_video',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display thumbnails instead of video', 'a13-onelander' ),
				'description' => esc_html__( 'If enabled, the video will be displayed in the lightbox.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single work', 'a13-onelander' ). ' - ' .esc_html__( 'Title bar', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_single_work_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'work_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'work_title_bar_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title position', 'a13-onelander' ),
				'options'  => array(
					'outside' => esc_html__( 'Before the content', 'a13-onelander' ),
//				'inside'  => esc_html__( 'Inside the content', 'a13-onelander' ), //for future if inside title will be also needed
				),
				'default'  => 'outside',
				'required' => array( 'work_title', '=', 'it_is_hidden' ),
				//way to make it hidden, but still have value, as we don't have "hidden" type of field
			),
			array(
				'id'       => 'work_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'a13-onelander' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'a13-onelander' ),
					'centered' => esc_html__( 'Centered', 'a13-onelander' ),
				),
				'default'  => 'classic',
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'a13-onelander' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'a13-onelander' ),
					'boxed' => esc_html__( 'Boxed', 'a13-onelander' ),
				),
				'default'  => 'full',
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'a13-onelander' ),
				'default'  => 'off',
				'options'  => $on_off,
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'          => 'work_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Type', 'a13-onelander' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'a13-onelander' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'work_title', '=', 'on' ),
					array( 'work_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'work_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Speed', 'a13-onelander' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'work_title', '=', 'on' ),
					array( 'work_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'work_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'a13-onelander' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'          => 'work_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'a13-onelander' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 40,
				'required' => array( 'work_title', '=', 'on' ),
			),
			array(
				'id'       => 'work_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'work_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single work', 'a13-onelander' ). ' - ' .esc_html__( 'Slider', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_single_work_slider',
		'icon'       => 'fa fa-exchange',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'work_slider_autoplay',
				'type'        => 'radio',
				'title'       => esc_html__( 'Autoplay', 'a13-onelander' ),
				'description' => esc_html__( 'If autoplay is on, slider will run on page load.', 'a13-onelander' ). ' ' . esc_html__( 'Can be overridden in each work.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'work_slider_slide_interval',
				'type'        => 'slider',
				'title'       => esc_html__( 'Time between slides', 'a13-onelander' ),
				'description' => esc_html__( 'Global for all works.', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 15000,
				'step'        => 1,
				'unit'        => 'ms',
				'default'     => 7000,
			),
			array(
				'id'          => 'work_slider_transition_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Transition', 'a13-onelander' ). ' : ' .esc_html__( 'Type', 'a13-onelander' ),
				'description' => esc_html__( 'Animation between slides.', 'a13-onelander' ),
				'options'     => array(
					'0' => esc_html__( 'None', 'a13-onelander' ),
					'1' => esc_html__( 'Fade', 'a13-onelander' ),
					'2' => esc_html__( 'Carousel', 'a13-onelander' ),
					'3' => esc_html__( 'Zooming', 'a13-onelander' ),
				),
				'default'     => '2',
			),
			array(
				'id'          => 'work_slider_transition_time',
				'type'        => 'slider',
				'title'       => esc_html__( 'Transition', 'a13-onelander' ). ' : ' .esc_html__( 'Speed', 'a13-onelander' ),
				'description' => esc_html__( 'Speed of transition.', 'a13-onelander' ) . ' ' . esc_html__( 'Global for all works.', 'a13-onelander' ),
				'min'         => 0,
				'step'        => 1,
				'max'         => 10000,
				'unit'        => 'ms',
				'default'     => 600,
			),
			array(
				'id'          => 'work_slider_thumbs',
				'type'        => 'radio',
				'title'       => esc_html__( 'Thumbnails', 'a13-onelander' ),
				'description' => esc_html__( 'Global for all works.', 'a13-onelander' ) . ' ' . esc_html__( 'Can be overridden in each work.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),

		)
	) );

//ALBUMS SETTINGS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Albums settings', 'a13-onelander' ),
		'desc'     => '',
		'id'       => 'section_albums',
		'icon'     => 'fa fa-picture-o',
		'priority' => 21,
		'companion_required' => true,//only visible with companion plugin being available
		'fields'   => array()
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Background', 'a13-onelander' ),
		'desc'       => esc_html__( 'These will work for Albums list and single album.', 'a13-onelander' ),
		'id'         => 'subsection_albums_general',
		'icon'       => 'fa fa-picture-o',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'albums_custom_background',
				'type'    => 'radio',
				'title'   => esc_html__( 'Custom background', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'albums_body_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'a13-onelander' ),
				'required' => array( 'albums_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'albums_body_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'cover',
				'required' => array( 'albums_custom_background', '=', 'on' ),
			),
			array(
				'id'       => 'albums_body_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'albums_custom_background', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Albums list', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_albums_list',
		'icon'       => 'fa fa-list',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'albums_list_page',
				'type'        => 'dropdown-pages',
				'title'       => esc_html__( 'Albums list', 'a13-onelander' ). ' - ' .esc_html__( 'Main page', 'a13-onelander' ),
				'description' => esc_html__( 'This page will list all your albums and also give the main title for "album category" pages.', 'a13-onelander' ),
			),
			array(
				'id'          => 'albums_list_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $content_under_header,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'albums_list_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'       => 'albums_list_protected_titles',
				'type'     => 'radio',
				'title'    => esc_html__( 'Hide titles of password protected items', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
			),
			array(
				'id'      => 'albums_list_album_look',
				'type'    => 'radio',
				'title'   => esc_html__( 'Album look', 'a13-onelander' ),
				'options' => array(
					'overlay' => esc_html__( 'Title over photo', 'a13-onelander' ),
					'under'   => esc_html__( 'Title under photo', 'a13-onelander' ),
				),
				'default' => 'overlay',
			),
			array(
				'id'       => 'albums_list_album_overlay_title_position',
				'type'     => 'select',
				'title'    => esc_html__( 'Texts position', 'a13-onelander' ),
				'options'  => array(
					'top_left'      => esc_html__( 'Top left', 'a13-onelander' ),
					'top_center'    => esc_html__( 'Top center', 'a13-onelander' ),
					'top_right'     => esc_html__( 'Top right', 'a13-onelander' ),
					'mid_left'      => esc_html__( 'Middle left', 'a13-onelander' ),
					'mid_center'    => esc_html__( 'Middle center', 'a13-onelander' ),
					'mid_right'     => esc_html__( 'Middle right', 'a13-onelander' ),
					'bottom_left'   => esc_html__( 'Bottom left', 'a13-onelander' ),
					'bottom_center' => esc_html__( 'Bottom center', 'a13-onelander' ),
					'bottom_right'  => esc_html__( 'Bottom right', 'a13-onelander' ),
				),
				'default'  => 'top_left',
				'required' => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'albums_list_album_overlay_cover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show overlay', 'a13-onelander' ). ' - ' .esc_html__( 'without hover', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'albums_list_album_overlay_cover_hover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show overlay', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'          => 'albums_list_album_overlay_gradient',
				'type'        => 'radio',
				'title'       => esc_html__( 'Show gradient', 'a13-onelander' ). ' - ' .esc_html__( 'without hover', 'a13-onelander' ),
				'description' => esc_html__( 'Its main function is to make texts more visible', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
				'required'    => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'          => 'albums_list_album_overlay_gradient_hover',
				'type'        => 'radio',
				'title'       => esc_html__( 'Show gradient', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'description' => esc_html__( 'Its main function is to make texts more visible', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'albums_list_album_overlay_texts',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show texts', 'a13-onelander' ). ' - ' .esc_html__( 'without hover', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'albums_list_album_overlay_texts_hover',
				'type'     => 'radio',
				'title'    => esc_html__( 'Show texts', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'albums_list_album_look', '=', 'overlay' ),
			),
			array(
				'id'       => 'albums_list_album_under_title_position',
				'type'     => 'radio',
				'title'    => esc_html__( 'Texts position', 'a13-onelander' ),
				'options'  => $text_align,
				'default'  => 'left',
				'required' => array( 'albums_list_album_look', '=', 'under' ),
			),
			array(
				'id'          => 'albums_list_bricks_hover',
				'type'        => 'select',
				'title'       => esc_html__( 'Hover effect', 'a13-onelander' ),
				'options'     => $bricks_hover,
				'default'     => 'cross',
			),
			array(
				'id'      => 'albums_list_items_per_page',
				'type'    => 'slider',
				'title'   => esc_html__( 'Items per page', 'a13-onelander' ),
				'min'     => 1,
				'max'     => 30,
				'step'    => 1,
				'default' => 12,
				'unit'    => '',
			),
			array(
				'id'          => 'albums_list_layout_mode',
				'type'        => 'radio',
				'title'       => esc_html__( 'How to place items in rows', 'a13-onelander' ),
				'description' => esc_html__( 'If your items have different heights, you can start each row of items from a new line instead of the masonry style.', 'a13-onelander' ),
				'options'     => array(
					'packery' => esc_html__( 'Masonry', 'a13-onelander' ),
					'fitRows' => esc_html__( 'Each row from new line', 'a13-onelander' ),
				),
				'default'     => 'packery',
			),
			array(
				'id'          => 'albums_list_brick_columns',
				'type'        => 'slider',
				'title'       => esc_html__( 'Bricks columns', 'a13-onelander' ),
				'description' => esc_html__( 'It is a maximum number of columns displayed on larger devices. On smaller devices, it can be a lower number of columns.', 'a13-onelander' ),
				'min'         => 1,
				'max'         => 4,
				'step'        => 1,
				'default'     => 3,
				'unit'        => '',
			),
			array(
				'id'          => 'albums_list_bricks_max_width',
				'type'        => 'slider',
				'title'       => esc_html__( 'The maximum width of the brick layout', 'a13-onelander' ),
				'description' => esc_html__( 'Depending on the actual width of the screen, the available space for bricks may be smaller, but never greater than this number.', 'a13-onelander' ),
				'min'         => 200,
				'max'         => 2500,
				'step'        => 1,
				'unit'        => 'px',
				'default'     => 2000,
			),
			array(
				'id'      => 'albums_list_brick_margin',
				'type'    => 'slider',
				'title'   => esc_html__( 'Brick margin', 'a13-onelander' ),
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 10,
			),
			array(
				'id'      => 'albums_list_bricks_proportions_size',
				'type'    => 'select',
				'title'   => esc_html__( 'Choose the proportions of the bricks', 'a13-onelander' ),
				'options' => array(
					'0'    => esc_html__( 'Original size', 'a13-onelander' ),
					'1/1'  => esc_html__( '1:1', 'a13-onelander' ),
					'2/3'  => esc_html__( '2:3', 'a13-onelander' ),
					'3/2'  => esc_html__( '3:2', 'a13-onelander' ),
					'3/4'  => esc_html__( '3:4', 'a13-onelander' ),
					'4/3'  => esc_html__( '4:3', 'a13-onelander' ),
					'9/16' => esc_html__( '9:16', 'a13-onelander' ),
					'16/9' => esc_html__( '16:9', 'a13-onelander' ),
				),
				'default' => '0',
			),
			array(
				'id'      => 'albums_list_lazy_load',
				'type'    => 'radio',
				'title'   => esc_html__( 'Lazy load', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'albums_list_lazy_load_mode',
				'type'     => 'radio',
				'title'    => esc_html__( 'Lazy load', 'a13-onelander' ). ' : ' . esc_html__( 'Type', 'a13-onelander' ),
				'options'  => array(
					'button' => esc_html__( 'By clicking button', 'a13-onelander' ),
					'auto'   => esc_html__( 'On scroll', 'a13-onelander' ),
				),
				'default'  => 'button',
				'required' => array( 'albums_list_lazy_load', '=', 'on' ),
			),
			array(
				'id'      => 'albums_list_categories',
				'type'    => 'radio',
				'title'   => esc_html__( 'Album meta: Categories', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'albums_list_header_custom_sidebar',
				'type'        => 'select',
				'title'       => esc_html__( 'Header', 'a13-onelander' ). ' : ' .esc_html__( 'Custom sidebar', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the vertical header.', 'a13-onelander' ),
				'options'     => $header_sidebars_off_global,
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'vertical' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Albums list', 'a13-onelander' ). ' - ' .esc_html__( 'Title bar', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_albums_list_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'albums_list_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'albums_list_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'a13-onelander' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'a13-onelander' ),
					'centered' => esc_html__( 'Centered', 'a13-onelander' ),
				),
				'default'  => 'classic',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'a13-onelander' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'a13-onelander' ),
					'boxed' => esc_html__( 'Boxed', 'a13-onelander' ),
				),
				'default'  => 'full',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'off',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'          => 'albums_list_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Type', 'a13-onelander' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'a13-onelander' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'albums_list_title', '=', 'on' ),
					array( 'albums_list_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'albums_list_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Speed', 'a13-onelander' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'albums_list_title', '=', 'on' ),
					array( 'albums_list_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'albums_list_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'a13-onelander' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'          => 'albums_list_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'a13-onelander' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 40,
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'albums_list_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Albums list', 'a13-onelander' ). ' - ' .esc_html__( 'Filter', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_albums_list_filter',
		'icon'       => 'fa fa-filter',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'albums_list_filter',
				'type'    => 'radio',
				'title'   => esc_html__( 'Filter', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'albums_list_filter_default_filter',
				'type'     => 'wp_dropdown_cpt_terms',
				'title'    => esc_html__( 'Default filter', 'a13-onelander' ),
				'for'      => 'album',
				'default'  => '__all',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_all_filter',
				'type'     => 'radio',
				'title'    => esc_html__( 'Display "All" filter', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required'    => array(
					array( 'albums_list_filter', '=', 'on' ),
					array( 'albums_list_filter_default_filter', '!=', '__all' ),
				)
			),
			array(
				'id'       => 'albums_list_filter_padding',
				'type'     => 'spacing',
				'title'    => esc_html__( 'Padding', 'a13-onelander' ),
				'mode'     => 'padding',
				'sides'    => array( 'top', 'bottom' ),
				'units'    => array( 'px', 'em' ),
				'default'  => array(
					'padding-top'    => '40px',
					'padding-bottom' => '40px',
					'units'          => 'px'
				),
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '#000000',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'default'  => '#000000',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'      => 'albums_list_filter_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'a13-onelander' ),
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => '',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'a13-onelander' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'a13-onelander' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
			array(
				'id'       => 'albums_list_filter_text_align',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text align', 'a13-onelander' ),
				'options'  => $text_align,
				'default'  => 'center',
				'required' => array( 'albums_list_filter', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album', 'a13-onelander' ). ' - ' .esc_html__( 'Title bar', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_single_album_title',
		'icon'       => 'fa fa-text-width',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'album_title',
				'type'    => 'radio',
				'title'   => esc_html__( 'Title', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'off',
			),
			array(
				'id'       => 'album_title_bar_variant',
				'type'     => 'radio',
				'title'    => esc_html__( 'Variant', 'a13-onelander' ),
				'options'  => array(
					'classic'  => esc_html__( 'Classic(to side)', 'a13-onelander' ),
					'centered' => esc_html__( 'Centered', 'a13-onelander' ),
				),
				'default'  => 'classic',
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_width',
				'type'     => 'radio',
				'title'    => esc_html__( 'Width', 'a13-onelander' ),
				'options'  => array(
					'full'  => esc_html__( 'Full', 'a13-onelander' ),
					'boxed' => esc_html__( 'Boxed', 'a13-onelander' ),
				),
				'default'  => 'full',
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_image',
				'type'     => 'image',
				'title'    => esc_html__( 'Background image', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_image_fit',
				'type'     => 'select',
				'title'    => esc_html__( 'How to fit the background image', 'a13-onelander' ),
				'options'  => $image_fit,
				'default'  => 'repeat',
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_parallax',
				'type'     => 'radio',
				'title'    => esc_html__( 'Parallax', 'a13-onelander' ),
				'default'  => 'off',
				'options'  => $on_off,
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'          => 'album_title_bar_parallax_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Type', 'a13-onelander' ),
				'description' => esc_html__( 'It defines how the image will scroll in the background while the page is scrolled down.', 'a13-onelander' ),
				'options'     => $parallax_types,
				'default'     => 'tb',
				'required'    => array(
					array( 'album_title', '=', 'on' ),
					array( 'album_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'album_title_bar_parallax_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Speed', 'a13-onelander' ),
				'description' => esc_html__( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 1,
				'step'        => 0.01,
				'default'     => '1.00',
				'required'    => array(
					array( 'album_title', '=', 'on' ),
					array( 'album_title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'id'          => 'album_title_bar_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Overlay color', 'a13-onelander' ),
				'description' => esc_html__( 'Will be placed above the image(if used)', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_title_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Titles', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'          => 'album_title_bar_color_1',
				'type'        => 'color',
				'title'       => esc_html__( 'Other elements', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'description' => esc_html__( 'Used in breadcrumbs.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_title_bar_space_width',
				'type'     => 'slider',
				'title'    => esc_html__( 'Top/bottom padding', 'a13-onelander' ),
				'min'      => 0,
				'max'      => 600,
				'step'     => 1,
				'unit'     => 'px',
				'default'  => 40,
				'required' => array( 'album_title', '=', 'on' ),
			),
			array(
				'id'       => 'album_breadcrumbs',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
				'required' => array( 'album_title', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_single_album',
		'icon'       => 'fa fa-th',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'album_comments',
				'type'    => 'radio',
				'title'   => esc_html__( 'Comments', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'album_content_under_header',
				'type'        => 'select',
				'title'       => esc_html__( 'Hide content under the header', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => array(
					'content' => esc_html__( 'Yes, hide the content', 'a13-onelander' ),
					'off'     => esc_html__( 'Turn it off', 'a13-onelander' ),
				),
				'default'     => 'off',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'album_horizontal_header_color_variant',
				'type'        => 'select',
				'title'       => esc_html__( 'Header color variant', 'a13-onelander' ),
				'description' => esc_html__( 'Works only with the horizontal header.', 'a13-onelander' ),
				'options'     => $header_color_variants,
				'default'     => 'normal',
				'required'    => array( 'header_type', '=', 'horizontal' ),
			),
			array(
				'id'          => 'album_slider_scroller_content',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display text content in slider or scroller albums', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'       => 'album_content_title',
				'type'     => 'radio',
				'title'    => esc_html__( 'Title in content', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
			),
			array(
				'id'       => 'album_content_categories',
				'type'     => 'radio',
				'title'    => esc_html__( 'Categories in content', 'a13-onelander' ),
				'options'  => $on_off,
				'default'  => 'on',
			),
			array(
				'id'      => 'album_navigation',
				'type'    => 'select',
				'title'   => esc_html__( 'Albums navigation', 'a13-onelander' ),
				'options'     => array(
					'on'          => esc_html__( 'Displayed in text content', 'a13-onelander' ),
					'after_title' => esc_html__( 'At the top of an album', 'a13-onelander' ),
					'after_album' => esc_html__( 'At the end of an album', 'a13-onelander' ),
					'off'         => esc_html__( 'Do not display it', 'a13-onelander' ),
				),
				'default' => 'on',
			),
			array(
				'id'          => 'album_navigate_by_categories',
				'type'        => 'radio',
				'title'       => esc_html__( 'Navigate by categories', 'a13-onelander' ),
				'description' => esc_html__( 'If enabled, navigation leads to the next/previous item in the same category. If disabled, it will navigate through items according to the order of the "publication date".', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
				'required'    => array( 'album_navigation', '!=', 'off' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album', 'a13-onelander' ). ' - ' .esc_html__( 'Bricks', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_album_bricks',
		'icon'       => 'fa fa-th',
		'subsection' => true,
		'fields'     => array(

			array(
				'id'          => 'album_content',
				'type'        => 'select',
				'title'       => esc_html__( 'Content column', 'a13-onelander' ),
				'description' => esc_html__( 'This will display separate block with title and text about the album.', 'a13-onelander' ),
				'options'     => array(
					'left'  => esc_html__( 'Show on the left', 'a13-onelander' ),
					'right' => esc_html__( 'Show on the right', 'a13-onelander' ),
					'off'   => esc_html__( 'Do not display it', 'a13-onelander' ),
				),
				'default'     => 'right',
			),
			array(
				'id'          => 'album_bricks_thumb_video',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display thumbnails instead of video', 'a13-onelander' ),
				'description' => esc_html__( 'If enabled, the video will be displayed in the lightbox.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album', 'a13-onelander' ). ' - ' .esc_html__( 'Bricks filter', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_album_bricks_filter',
		'icon'       => 'fa fa-filter',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'album_bricks_filter',
				'type'    => 'radio',
				'title'   => esc_html__( 'Filter', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'       => 'album_bricks_filter_padding',
				'type'     => 'spacing',
				'title'    => esc_html__( 'Padding', 'a13-onelander' ),
				'mode'     => 'padding',
				'sides'    => array( 'top', 'bottom' ),
				'units'    => array( 'px', 'em' ),
				'default'  => array(
					'padding-top'    => '40px',
					'padding-bottom' => '40px',
					'units'          => 'px'
				),
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'       => 'album_bricks_filter_bg_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background color', 'a13-onelander' ),
				'default'  => '',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'       => 'album_bricks_filter_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'default'  => '#000000',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'       => 'album_bricks_filter_hover_color',
				'type'     => 'color',
				'title'    => esc_html__( 'Links', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ). ' - ' .esc_html__( 'on hover/active', 'a13-onelander' ),
				'default'  => '#000000',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'      => 'album_bricks_filter_font_size',
				'type'    => 'slider',
				'title'   => esc_html__( 'Font size', 'a13-onelander' ),
				'min'     => 5,
				'max'     => 30,
				'step'    => 1,
				'unit'    => 'px',
				'default' => '',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'       => 'album_bricks_filter_weight',
				'type'     => 'select',
				'title'    => esc_html__( 'Font weight', 'a13-onelander' ),
				'options'  => $font_weights,
				'default'  => 'bold',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'       => 'album_bricks_filter_transform',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text transform', 'a13-onelander' ),
				'options'  => $font_transforms,
				'default'  => 'uppercase',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
			array(
				'id'       => 'album_bricks_filter_text_align',
				'type'     => 'radio',
				'title'    => esc_html__( 'Text align', 'a13-onelander' ),
				'options'  => $text_align,
				'default'  => 'center',
				'required' => array( 'album_bricks_filter', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Photo Proofing', 'a13-onelander' ),
		'id'         => 'subsection_albums_proofing',
		'icon'       => 'fa fa-check',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'proofing_send_email',
				'type'        => 'radio',
				'title'       => esc_html__( 'Send an e-mail after accepting the album', 'a13-onelander' ),
				'description' => esc_html__( 'Sends an email after your client has marked the album as completed in the photo proofing process.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'proofing_email',
				'type'        => 'text',
				'title'       => esc_html__( 'Where to send?', 'a13-onelander' ),
				'description' => esc_html__( 'If the field is left blank, it will use the administrator\'s email address.', 'a13-onelander' ),
				'default'     => '',
				'required'    => array( 'proofing_send_email', '=', 'on' ),
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album', 'a13-onelander' ). ' - ' .esc_html__( 'Slider', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_album_slider',
		'icon'       => 'fa fa-exchange',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'album_slider_autoplay',
				'type'        => 'radio',
				'title'       => esc_html__( 'Autoplay', 'a13-onelander' ),
				'description' => esc_html__( 'If autoplay is on, slider will run on page load.', 'a13-onelander' ). ' ' . esc_html__( 'Can be overridden in each album.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
			array(
				'id'          => 'album_slider_slide_interval',
				'type'        => 'slider',
				'title'       => esc_html__( 'Time between slides', 'a13-onelander' ),
				'description' => esc_html__( 'Global for all albums.', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 15000,
				'step'        => 1,
				'unit'        => 'ms',
				'default'     => 7000,
			),
			array(
				'id'          => 'album_slider_transition_type',
				'type'        => 'select',
				'title'       => esc_html__( 'Transition', 'a13-onelander' ). ' : ' .esc_html__( 'Type', 'a13-onelander' ),
				'description' => esc_html__( 'Animation between slides.', 'a13-onelander' ),
				'options'     => array(
					'0' => esc_html__( 'None', 'a13-onelander' ),
					'1' => esc_html__( 'Fade', 'a13-onelander' ),
					'2' => esc_html__( 'Carousel', 'a13-onelander' ),
					'3' => esc_html__( 'Zooming', 'a13-onelander' ),
				),
				'default'     => '2',
			),
			array(
				'id'          => 'album_slider_transition_time',
				'type'        => 'slider',
				'title'       => esc_html__( 'Transition', 'a13-onelander' ). ' : ' .esc_html__( 'Speed', 'a13-onelander' ),
				'description' => esc_html__( 'Speed of transition.', 'a13-onelander' ) . ' ' . esc_html__( 'Global for all albums.', 'a13-onelander' ),
				'min'         => 0,
				'max'         => 10000,
				'step'        => 1,
				'unit'        => 'ms',
				'default'     => 600,
			),
			array(
				'id'          => 'album_slider_thumbs',
				'type'        => 'radio',
				'title'       => esc_html__( 'Thumbnails', 'a13-onelander' ),
				'description' => esc_html__( 'Can be overridden in each album.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),

		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Single album', 'a13-onelander' ). ' - ' .esc_html__( 'Social icons', 'a13-onelander' ),
		'desc'       => esc_html__( 'If you are using AddToAny plugin for sharing, then you should check these options.', 'a13-onelander' ),
		'id'         => 'subsection_album_socials',
		'icon'       => 'fa fa-facebook-official',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'      => 'album_social_icons',
				'type'    => 'radio',
				'title'   => esc_html__( 'Use social icons in albums', 'a13-onelander' ),
				'options' => $on_off,
				'default' => 'on',
			),
			array(
				'id'          => 'album_share_type',
				'type'        => 'radio',
				'title'       => esc_html__( 'Share a link to the album or to the attachment page', 'a13-onelander' ),
				'description' => esc_html__( 'When using the share plugin choose one way of sharing. More details in the documentation.', 'a13-onelander' ),
				'options'     => array(
					'album'           => esc_html__( 'Album', 'a13-onelander' ),
					'attachment_page' => esc_html__( 'Attachment page', 'a13-onelander' ),
				),
				'default'     => 'album',
				'required'    => array( 'album_social_icons', '=', 'on' ),
			),
		)
	) );

//MISCELLANEOUS
	$apollo13framework_a13->set_sections( array(
		'title'    => esc_html__( 'Miscellaneous', 'a13-onelander' ),
		'desc'     => '',
		'id'       => 'section_miscellaneous',
		'icon'     => 'fa fa-question',
		'priority' => 24,
		'fields'   => array(),
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Anchors', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_anchors',
		'icon'       => 'fa fa-external-link',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'anchors_in_bar',
				'type'        => 'radio',
				'title'       => esc_html__( 'Display anchors in address bar', 'a13-onelander' ),
				/* translators: %1$s: Link example, %2$s: Link example */
				'description' => sprintf( esc_html__( 'If disabled it will not show anchors, in the address bar of your browser, when they are clicked or entered. So address like %1$s will be displayed as %2$s.', 'a13-onelander' ), '<code>https://apollo13themes.com/rife/#downloads</code>', '<code>https://apollo13themes.com/rife/</code>' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'scroll_to_anchor',
				'type'        => 'radio',
				'title'       => esc_html__( 'Scroll to anchor handling', 'a13-onelander' ),
				'description' => esc_html__( 'If enabled it will scroll to anchor after it is clicked on the same page. It can, however, conflict with plugins that uses the same mechanism, and the page can scroll in a weird way. In such case disable this feature.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Writing effect', 'a13-onelander' ),
		'desc'       => '',
		'id'         => 'subsection_writing_effect',
		'icon'       => 'fa fa-pencil',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'writing_effect_mobile',
				'type'        => 'radio',
				'title'       => esc_html__( 'Writing effect', 'a13-onelander' ). ' - ' .esc_html__( 'on mobiles', 'a13-onelander' ),
				'description' => esc_html__( 'If disabled it will show all written lines as separate paragraphs on small devices(less than 600 pixels wide). It is good to disable it to save CPU of your user devices, and to remove "jumping screen" effect on smaller screens.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'off',
			),
			array(
				'id'          => 'writing_effect_speed',
				'type'        => 'slider',
				'title'       => esc_html__( 'Writing effect', 'a13-onelander' ). ' : ' .esc_html__( 'Text write speed', 'a13-onelander' ),
				'description' => esc_html__( 'How many ms should pass between printing each character. Bigger value is slower writing.', 'a13-onelander' ),
				'default'     => 10,
				'min'         => 10,
				'max'         => 1000,
				'step'        => 1,
				'unit'        => 'ms',
			),
		)
	) );

	$apollo13framework_a13->set_sections( array(
		'title'      => esc_html__( 'Optimization', 'a13-onelander' ),
		'id'         => 'subsection_optimization',
		'icon'       => 'fa fa-pencil',
		'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'use_webfontloader',
				'type'        => 'radio',
				'title'       => esc_html__( 'Use the web-font loading script', 'a13-onelander' ),
				'description' => esc_html__( 'Once enabled, web-fonts will be loaded using the "Web Font Loader" script. If you want to use the plugin to combine web-fonts added by plugins and the theme, you should disable this.', 'a13-onelander' ),
				'options'     => $on_off,
				'default'     => 'on',
			),
		)
	) );

	/*
 * <--- END SECTIONS
 */

	do_action( 'apollo13framework_additional_theme_options' );
}

apollo13framework_setup_theme_options();