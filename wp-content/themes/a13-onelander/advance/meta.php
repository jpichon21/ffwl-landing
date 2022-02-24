<?php

function apollo13framework_meta_boxes_post() {
	$header_sidebars = array_merge(
		array(
			'G'   => __( 'Global settings', 'a13-onelander' ),
			'off' => __( 'Off', 'a13-onelander' ),
		),
		apollo13framework_meta_get_user_sidebars()
	);

	$meta = array(
		/*
		 *
		 * Tab: Posts list
		 *
		 */
		'posts_list' => array(
			array(
				'name' => __('Posts list', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-list'
			),
			array(
				'name'        => __( 'Size of brick', 'a13-onelander' ),
				'description' => __( 'What should be the width of this post on the Posts list?', 'a13-onelander' ),
				'id'          => 'brick_ratio_x',
				'default'     => 1,
				'unit'        => '',
				'min'         => 1,
				'max'         => 4,
				'type'        => 'slider'
			),
		),


		/*
		 *
		 * Tab: Featured media
		 *
		 */
		'featured_media' => array(
			array(
				'name' => __('Featured media', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-star'
			),
			array(
				'name'        => __( 'Post media', 'a13-onelander' ),
				'description' => __( 'Choose between image, video and images slider. For the image use the Featured Image option. For the <strong>Images slider</strong> you need plugin the <a href="https://wordpress.org/plugins/featured-galleries/" target="_blank">Featured galleries</a>.', 'a13-onelander' ),
				'id'          => 'image_or_video',
				'default'     => 'post_image',
				'options'     => array(
					'post_image'  => __( 'Image', 'a13-onelander' ),
					'post_slider' => __( 'Images slider', 'a13-onelander' ),
				),
				'type'        => 'radio',
			),
			array(
				'name'        => __( 'Featured Image ', 'a13-onelander' ). ' : ' . __( 'Parallax', 'a13-onelander' ),
				'id'          => 'image_parallax',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'required'    => array( 'image_or_video', '=', 'post_image' ),
			),
			array(
				'name'     => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Area height', 'a13-onelander' ),
				'description' => __( 'This limits the height of the image so that the parallax can work.', 'a13-onelander' ),
				'id'       => 'image_parallax_height',
				'default'  => '260',
				'unit'     => 'px',
				'min'      => 100,
				'max'      => 600,
				'type'     => 'slider',
				'required' => array(
					array( 'image_or_video', '=', 'post_image' ),
					array( 'image_parallax', '=', 'on' ),
				)
			),
		),

		/*
		 *
		 * Tab: Header
		 *
		 */
		'header' => array(
			array(
				'name' => __('Header', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-cogs'
			),
			array(
				'name'          => __( 'Hide content under the header', 'a13-onelander' ),
				'description'   => __( 'Works only with the horizontal header.', 'a13-onelander' ),
				'id'            => 'content_under_header',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'post_content_under_header',
				'type'          => 'select',
				'options'       => array(
					'G'       => __( 'Global settings', 'a13-onelander' ),
					'content' => __( 'Yes, hide the content', 'a13-onelander' ),
					'title'   => __( 'Yes, hide the content and add top padding to the outside title bar.', 'a13-onelander' ),
					'off'     => __( 'Turn it off', 'a13-onelander' ),
				),
			),
			array(
				'name'          => __( 'Header color variant', 'a13-onelander' ),
				'description'   => __( 'Works only with the horizontal header.', 'a13-onelander' ),
				'id'            => 'horizontal_header_color_variant',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'post_horizontal_header_color_variant',
				'type'          => 'select',
				'options'       => array(
					'G'      => __( 'Global settings', 'a13-onelander' ),
					'normal' => __( 'Normal', 'a13-onelander' ),
					'light'  => __( 'Light', 'a13-onelander' ),
					'dark'   => __( 'Dark', 'a13-onelander' ),
				),
			),
			array(
				'name'          => __( 'Custom sidebar', 'a13-onelander' ),
				'description'   => esc_html__( 'Works only with the vertical header.', 'a13-onelander' ) .' '. __( 'Special widgets that should be displayed on this page in the header.', 'a13-onelander' ),
				'id'            => 'header_custom_sidebar',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'header_custom_sidebar',
				'options'       => $header_sidebars,
				'type'          => 'select',
			),
		),

		/*
		 *
		 * Tab: Title bar
		 *
		 */
		'title_bar' => array(
			array(
				'name' => __('Title bar', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-text-width'
			),
			array(
				'name'        => __( 'Title bar', 'a13-onelander' ),
				'description' => __( 'You can use global settings or override them here', 'a13-onelander' ),
				'id'          => 'title_bar_settings',
				'default'     => 'global',
				'type'        => 'radio',
				'options'     => array(
					'global' => __( 'Global settings', 'a13-onelander' ),
					'custom' => __( 'Use custom settings', 'a13-onelander' ),
					'off'    => __( 'Turn it off', 'a13-onelander' ),
				),
			),
			array(
				'name'        => __( 'Position', 'a13-onelander' ),
				'id'          => 'title_bar_position',
				'default'     => 'outside',
				'type'        => 'radio',
				'options'     => array(
					'outside' => __( 'Before the content', 'a13-onelander' ),
					'inside'  => __( 'Inside the content', 'a13-onelander' ),
				),
				'description' => __( 'To set the background image for the "Before the content" option, use the <strong>featured image</strong>.', 'a13-onelander' ),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
			array(
				'name'        => __( 'Variant', 'a13-onelander' ),
				'description' => '',
				'id'          => 'title_bar_variant',
				'default'     => 'classic',
				'options'     => array(
					'classic'  => __( 'Classic(to side)', 'a13-onelander' ),
					'centered' => __( 'Centered', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Width', 'a13-onelander' ),
				'description' => '',
				'id'          => 'title_bar_width',
				'default'     => 'full',
				'options'     => array(
					'full'  => __( 'Full', 'a13-onelander' ),
					'boxed' => __( 'Boxed', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => __( 'How to fit the background image', 'a13-onelander' ),
				'id'       => 'title_bar_image_fit',
				'default'  => 'repeat',
				'options'  => array(
					'cover'    => __( 'Cover', 'a13-onelander' ),
					'contain'  => __( 'Contain', 'a13-onelander' ),
					'fitV'     => __( 'Fit Vertically', 'a13-onelander' ),
					'fitH'     => __( 'Fit Horizontally', 'a13-onelander' ),
					'center'   => __( 'Just center', 'a13-onelander' ),
					'repeat'   => __( 'Repeat', 'a13-onelander' ),
					'repeat-x' => __( 'Repeat X', 'a13-onelander' ),
					'repeat-y' => __( 'Repeat Y', 'a13-onelander' ),
				),
				'type'     => 'select',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'a13-onelander' ),
				'description' => '',
				'id'          => 'title_bar_parallax',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'a13-onelander' ). ' : ' . __( 'Type', 'a13-onelander' ),
				'description' => __( 'It defines how the image will scroll in the background while the page is scrolled down.', 'a13-onelander' ),
				'id'          => 'title_bar_parallax_type',
				'default'     => 'tb',
				'options'     => array(
					"tb"   => __( 'top to bottom', 'a13-onelander' ),
					"bt"   => __( 'bottom to top', 'a13-onelander' ),
					"lr"   => __( 'left to right', 'a13-onelander' ),
					"rl"   => __( 'right to left', 'a13-onelander' ),
					"tlbr" => __( 'top-left to bottom-right', 'a13-onelander' ),
					"trbl" => __( 'top-right to bottom-left', 'a13-onelander' ),
					"bltr" => __( 'bottom-left to top-right', 'a13-onelander' ),
					"brtl" => __( 'bottom-right to top-left', 'a13-onelander' ),
				),
				'type'        => 'select',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'a13-onelander' ). ' : ' . __( 'Speed', 'a13-onelander' ),
				'description' => __( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'a13-onelander' ),
				'id'          => 'title_bar_parallax_speed',
				'default'     => '1.00',
				'type'        => 'text',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Overlay color', 'a13-onelander' ),
				'description' => __( 'Will be placed above the image(if used)', 'a13-onelander' ),
				'id'          => 'title_bar_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => esc_html__( 'Titles', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'id'       => 'title_bar_title_color',
				'default'  => '',
				'type'     => 'color',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => esc_html__( 'Other elements', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'description' => __( 'Used in breadcrumbs.', 'a13-onelander' ),
				'id'          => 'title_bar_color_1',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Top/bottom padding', 'a13-onelander' ),
				'description' => '',
				'id'          => 'title_bar_space_width',
				'default'     => '40px',
				'unit'        => 'px',
				'min'         => 0,
				'max'         => 600,
				'type'        => 'slider',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Breadcrumbs', 'a13-onelander' ),
				'description' => '',
				'id'          => 'breadcrumbs',
				'default'     => 'on',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
		),

		/*
		 *
		 * Tab: Page background
		 *
		 */
		'background' => array(
			array(
				'name' => __('Page background', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-picture-o',
				'companion_required' => true
			),
		),
	);

	return apply_filters( 'apollo13framework_meta_boxes_post', $meta );
}



function apollo13framework_meta_boxes_page() {
	$user_sidebars = apollo13framework_meta_get_user_sidebars();
	$sidebars = array_merge(
		array(
			'default' => __( 'Default for pages', 'a13-onelander' ),
		),
		$user_sidebars
	);
	$header_sidebars = array_merge(
		array(
			'G'   => __( 'Global settings', 'a13-onelander' ),
			'off' => __( 'Off', 'a13-onelander' ),
		),
		$user_sidebars
	);

	$meta = array(
		/*
		 *
		 * Tab: Layout &amp; Sidebar
		 *
		 */
		'layout' => array(
			array(
				'name' => __('Layout &amp; Sidebar', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-wrench'
			),
			array(
				'name'          => __( 'Content Layout', 'a13-onelander' ),
				'id'            => 'content_layout',
				'default'       => 'global',
				'global_value'  => 'global',
				'parent_option' => 'page_content_layout',
				'type'          => 'select',
				'options'       => array(
					'global'        => __( 'Global settings', 'a13-onelander' ),
					'center'        => __( 'Center fixed width', 'a13-onelander' ),
					'left'          => __( 'Left fixed width', 'a13-onelander' ),
					'left_padding'  => __( 'Left fixed width + padding', 'a13-onelander' ),
					'right'         => __( 'Right fixed width', 'a13-onelander' ),
					'right_padding' => __( 'Right fixed width + padding', 'a13-onelander' ),
					'full_fixed'    => __( 'Full width + fixed content', 'a13-onelander' ),
					'full_padding'  => __( 'Full width + padding', 'a13-onelander' ),
					'full'          => __( 'Full width', 'a13-onelander' ),
				),
			),
			array(
				'name'        => esc_html__( 'Content', 'a13-onelander' ). ' : ' .esc_html__( 'Top/bottom padding', 'a13-onelander' ),
				'id'          => 'content_padding',
				'default'     => 'both',
				'type'        => 'select',
				'options'     => array(
					'both'   => __( 'Both on', 'a13-onelander' ),
					'top'    => __( 'Only top', 'a13-onelander' ),
					'bottom' => __( 'Only bottom', 'a13-onelander' ),
					'off'    => __( 'Both off', 'a13-onelander' ),
				),
			),
			array(
				'name'        => __( 'Content', 'a13-onelander' ). ' : ' .esc_html__( 'Left/right padding', 'a13-onelander' ),
				'id'          => 'content_side_padding',
				'default'     => 'both',
				'type'        => 'radio',
				'options'     => array(
					'both'   => __( 'Both on', 'a13-onelander' ),
					'off'    => __( 'Both off', 'a13-onelander' ),
				),
			),
			array(
				'name'          => __( 'Sidebar', 'a13-onelander' ),
				'id'            => 'widget_area',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'page_sidebar',
				'options'       => array(
					'G'                     => __( 'Global settings', 'a13-onelander' ),
					'left-sidebar'          => __( 'Sidebar on the left', 'a13-onelander' ),
					'left-sidebar_and_nav'  => __( 'Children Navigation', 'a13-onelander' ) . ' + ' . __( 'Sidebar on the left', 'a13-onelander' ),
					/* translators: %s: Children Navigation */
					'left-nav'             => sprintf( __( 'Only %s on the left', 'a13-onelander' ), __( 'Children Navigation', 'a13-onelander' ) ),
					'right-sidebar'         => __( 'Sidebar on the right', 'a13-onelander' ),
					'right-sidebar_and_nav' => __( 'Children Navigation', 'a13-onelander' ) . ' + ' . __( 'Sidebar on the right', 'a13-onelander' ),
					/* translators: %s: Children Navigation */
					'right-nav'             => sprintf( __( 'Only %s on the right', 'a13-onelander' ), __( 'Children Navigation', 'a13-onelander' ) ),
					'off'                   => __( 'Off', 'a13-onelander' ),
				),
				'type'          => 'select',
			),
			array(
				'name'     => __( 'Sidebar to show', 'a13-onelander' ),
				'id'       => 'sidebar_to_show',
				'default'  => 'default',
				'options'  => $sidebars,
				'type'     => 'select',
				'required' => array( 'widget_area', '!=', 'off' ),
			),
		),

		/*
		 *
		 * Tab: Header
		 *
		 */
		'header' => array(
			array(
				'name' => __('Header', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-cogs'
			),
			array(
				'name'          => __( 'Hide content under the header', 'a13-onelander' ),
				'description'   => __( 'Works only with the horizontal header.', 'a13-onelander' ),
				'id'            => 'content_under_header',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'page_content_under_header',
				'type'          => 'select',
				'options'       => array(
					'G'       => __( 'Global settings', 'a13-onelander' ),
					'content' => __( 'Yes, hide the content', 'a13-onelander' ),
					'title'   => __( 'Yes, hide the content and add top padding to the outside title bar.', 'a13-onelander' ),
					'off'     => __( 'Turn it off', 'a13-onelander' ),
				),
			),
			array(
				'name'          => __( 'Header color variant', 'a13-onelander' ),
				'description'   => __( 'Works only with the horizontal header.', 'a13-onelander' ),
				'id'            => 'horizontal_header_color_variant',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'page_horizontal_header_color_variant',
				'type'          => 'select',
				'options'       => array(
					'G'      => __( 'Global settings', 'a13-onelander' ),
					'normal' => __( 'Normal', 'a13-onelander' ),
					'light'  => __( 'Light', 'a13-onelander' ),
					'dark'   => __( 'Dark', 'a13-onelander' ),
				),
			),
			array(
				'name'          => __( 'Show header from the Nth row', 'a13-onelander' ),
				'description'   => __( 'Works only with the horizontal header.', 'a13-onelander' ). '<br />' . __( 'If you use Elementor or WPBakery Page Builder, then you can decide to show header after the content is scrolled to Nth row. Thanks to that you can have a clean welcome screen.', 'a13-onelander' ),
				'id'            => 'horizontal_header_show_header_at',
				'default'       => '0',
				'type'          => 'select',
				'options'       => array(
					'0' => __( 'Show always', 'a13-onelander' ),
					'1' => __( 'from 1st row', 'a13-onelander' ),
					'2' => __( 'from 2nd row', 'a13-onelander' ),
					'3' => __( 'from 3rd row', 'a13-onelander' ),
					'4' => __( 'from 4th row', 'a13-onelander' ),
					'5' => __( 'from 5th row', 'a13-onelander' ),
				),
			),
			array(
				'name'          => __( 'Custom sidebar', 'a13-onelander' ),
				'description'   => esc_html__( 'Works only with the vertical header.', 'a13-onelander' ) .' '. __( 'Special widgets that should be displayed on this page in the header.', 'a13-onelander' ),
				'id'            => 'header_custom_sidebar',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'header_custom_sidebar',
				'options'       => $header_sidebars,
				'type'          => 'select',
			),
		),

		/*
		 *
		 * Tab: Title bar
		 *
		 */
		'title_bar' => array(
			array(
				'name' => __('Title bar', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-text-width'
			),
			array(
				'name'        => __( 'Title bar', 'a13-onelander' ),
				'description' => __( 'You can use global settings or override them here', 'a13-onelander' ),
				'id'          => 'title_bar_settings',
				'default'     => 'global',
				'type'        => 'radio',
				'options'     => array(
					'global' => __( 'Global settings', 'a13-onelander' ),
					'custom' => __( 'Use custom settings', 'a13-onelander' ),
					'off'    => __( 'Turn it off', 'a13-onelander' ),
				),
			),
			array(
				'name'        => __( 'Position', 'a13-onelander' ),
				'id'          => 'title_bar_position',
				'default'     => 'outside',
				'type'        => 'radio',
				'options'     => array(
					'outside' => __( 'Before the content', 'a13-onelander' ),
					'inside'  => __( 'Inside the content', 'a13-onelander' ),
				),
				'description' => __( 'To set the background image for the "Before the content" option, use the <strong>featured image</strong>.', 'a13-onelander' ),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
			array(
				'name'        => __( 'Variant', 'a13-onelander' ),
				'description' => '',
				'id'          => 'title_bar_variant',
				'default'     => 'classic',
				'options'     => array(
					'classic'  => __( 'Classic(to side)', 'a13-onelander' ),
					'centered' => __( 'Centered', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Width', 'a13-onelander' ),
				'description' => '',
				'id'          => 'title_bar_width',
				'default'     => 'full',
				'options'     => array(
					'full'  => __( 'Full', 'a13-onelander' ),
					'boxed' => __( 'Boxed', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => __( 'How to fit the background image', 'a13-onelander' ),
				'id'       => 'title_bar_image_fit',
				'default'  => 'repeat',
				'options'  => array(
					'cover'    => __( 'Cover', 'a13-onelander' ),
					'contain'  => __( 'Contain', 'a13-onelander' ),
					'fitV'     => __( 'Fit Vertically', 'a13-onelander' ),
					'fitH'     => __( 'Fit Horizontally', 'a13-onelander' ),
					'center'   => __( 'Just center', 'a13-onelander' ),
					'repeat'   => __( 'Repeat', 'a13-onelander' ),
					'repeat-x' => __( 'Repeat X', 'a13-onelander' ),
					'repeat-y' => __( 'Repeat Y', 'a13-onelander' ),
				),
				'type'     => 'select',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'a13-onelander' ),
				'description' => '',
				'id'          => 'title_bar_parallax',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'a13-onelander' ). ' : ' . __( 'Type', 'a13-onelander' ),
				'description' => __( 'It defines how the image will scroll in the background while the page is scrolled down.', 'a13-onelander' ),
				'id'          => 'title_bar_parallax_type',
				'default'     => 'tb',
				'options'     => array(
					"tb"   => __( 'top to bottom', 'a13-onelander' ),
					"bt"   => __( 'bottom to top', 'a13-onelander' ),
					"lr"   => __( 'left to right', 'a13-onelander' ),
					"rl"   => __( 'right to left', 'a13-onelander' ),
					"tlbr" => __( 'top-left to bottom-right', 'a13-onelander' ),
					"trbl" => __( 'top-right to bottom-left', 'a13-onelander' ),
					"bltr" => __( 'bottom-left to top-right', 'a13-onelander' ),
					"brtl" => __( 'bottom-right to top-left', 'a13-onelander' ),
				),
				'type'        => 'select',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'a13-onelander' ). ' : ' . __( 'Speed', 'a13-onelander' ),
				'description' => __( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'a13-onelander' ),
				'id'          => 'title_bar_parallax_speed',
				'default'     => '1.00',
				'type'        => 'text',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Overlay color', 'a13-onelander' ),
				'description' => __( 'Will be placed above the image(if used)', 'a13-onelander' ),
				'id'          => 'title_bar_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => esc_html__( 'Titles', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'id'       => 'title_bar_title_color',
				'default'  => '',
				'type'     => 'color',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => esc_html__( 'Other elements', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'description' => __( 'Used in breadcrumbs.', 'a13-onelander' ),
				'id'          => 'title_bar_color_1',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Top/bottom padding', 'a13-onelander' ),
				'description' => '',
				'id'          => 'title_bar_space_width',
				'default'     => '40px',
				'unit'        => 'px',
				'min'         => 0,
				'max'         => 600,
				'type'        => 'slider',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Breadcrumbs', 'a13-onelander' ),
				'description' => '',
				'id'          => 'breadcrumbs',
				'default'     => 'on',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
		),

		/*
		 *
		 * Tab: Featured media
		 *
		 */
		'featured_media' => array(
			array(
				'name' => __('Featured media', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-star'
			),
			array(
				'name'        => __( 'Post media', 'a13-onelander' ),
				'description' => __( 'Choose between image, video and images slider. For the image use the Featured Image option. For the <strong>Images slider</strong> you need plugin the <a href="https://wordpress.org/plugins/featured-galleries/" target="_blank">Featured galleries</a>.', 'a13-onelander' ),
				'id'          => 'image_or_video',
				'default'     => 'post_image',
				'options'     => array(
					'post_image'  => __( 'Image', 'a13-onelander' ),
					'post_slider' => __( 'Images slider', 'a13-onelander' ),
				),
				'type'        => 'radio',
			),
			array(
				'name'        => __( 'Featured Image ', 'a13-onelander' ). ' : ' . __( 'Parallax', 'a13-onelander' ),
				'id'          => 'image_parallax',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'required'    => array( 'image_or_video', '=', 'post_image' ),
			),
			array(
				'name'     => esc_html__( 'Parallax', 'a13-onelander' ). ' : ' . esc_html__( 'Area height', 'a13-onelander' ),
				'description' => __( 'This limits the height of the image so that the parallax can work.', 'a13-onelander' ),
				'id'       => 'image_parallax_height',
				'default'  => '260',
				'unit'     => 'px',
				'min'      => 100,
				'max'      => 600,
				'type'     => 'slider',
				'required' => array(
					array( 'image_or_video', '=', 'post_image' ),
					array( 'image_parallax', '=', 'on' ),
				)
			),
		),

		/*
		 *
		 * Tab: Page background
		 *
		 */
		'background' => array(
			array(
				'name' => __('Page background', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-picture-o',
				'companion_required' => true
			),
		),

		/*
		 *
		 * Tab: Sticky one page mode
		 *
		 */
		'sticky_one_page' => array(
			array(
				'name' => __('Sticky One Page mode', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-anchor'
			),
			array(
				'name'        => __( 'Sticky One Page mode', 'a13-onelander' ),
				'description' => __( 'This works only when page is designed with WPBakery Page Builder. With this option enabled, the page will turn into a vertical slider to the full height of the browser window, and each row created in the WPBakery Page Builder is a single slide.', 'a13-onelander' ),
				'id'          => 'content_sticky_one_page',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
			),
			array(
				'name'     => __( 'Color of navigation bullets', 'a13-onelander' ),
				'id'       => 'content_sticky_one_page_bullet_color',
				'default'  => 'rgba(0,0,0,1)',
				'type'     => 'color',
				'required' => array(
					array( 'content_sticky_one_page', '=', 'on' )
				)
			),
			array(
			'name'        => __( 'Default bullets icon', 'a13-onelander' ),
			'id'          => 'content_sticky_one_page_bullet_icon',
			'default'     => '',
			'type'        => 'text',
			'input_class' => 'a13-fa-icon a13-full-class',
			'required'    => array(
				array( 'content_sticky_one_page', '=', 'on' )
			)
		),
		),
	);

	return apply_filters( 'apollo13framework_meta_boxes_page', $meta );
}



function apollo13framework_meta_boxes_album() {
	$header_sidebars = array_merge(
		array(
			'G'   => __( 'Global settings', 'a13-onelander' ),
			'off' => __( 'Off', 'a13-onelander' ),
		),
		apollo13framework_meta_get_user_sidebars()
	);

	$meta = array(
		/*
		 *
		 * Tab: Albums list
		 *
		 */
		'albums_list' => array(
			array(
				'name' => __('Albums list', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-list'
			),

			array(
				'name'        => __( 'Size of brick', 'a13-onelander' ),
				'description' => __( 'What should be the width of this album on the Albums list?', 'a13-onelander' ),
				'id'          => 'brick_ratio_x',
				'default'     => 1,
				'unit'        => '',
				'min'         => 1,
				'max'         => 4,
				'type'        => 'slider'
			),
			array(
				'name'        => __( 'Overlay color', 'a13-onelander' ),
				'id'          => 'cover_color',
				'description' => __( 'Works only when titles are displayed over images in the Albums list.', 'a13-onelander' ),
				'default'     => 'rgba(0,0,0, 0.7)',
				'type'        => 'color'
			),
			array(
				'name'        => __( 'Exclude from the Albums list page', 'a13-onelander' ),
				'description' => __( 'If enabled, then this Album will not be listed on the Albums list page, but you can still select it for the front page or in other places.', 'a13-onelander' ),
				'id'          => 'exclude_in_albums_list',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
			),
		),

		/*
		 *
		 * Tab: Album media
		 *
		 */
		'album_media' => array(
			array(
				'name' => __('Album media', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-th',
			),
			array(
				'name'        => __( 'Items order', 'a13-onelander' ),
				'description' => __( 'It will display your images/videos from the first to the last or in a different way.', 'a13-onelander' ),
				'id'          => 'order',
				'default'     => 'ASC',
				'options'     => array(
					'ASC'    => __( 'First on the list, first displayed', 'a13-onelander' ),
					'DESC'   => __( 'First on the list, last displayed', 'a13-onelander' ),
					'random' => __( 'Random', 'a13-onelander' ),
				),
				'type'        => 'select',
			),
			array(
				'name'        => __( 'Show title and description of album items', 'a13-onelander' ),
				'description' => __( 'If enabled, then it will affect displaying in bricks and slider option, and also in lightbox.', 'a13-onelander' ),
				'id'          => 'enable_desc',
				'default'     => 'on',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
			),
			array(
				'name'    => __( 'Show media in', 'a13-onelander' ),
				'description'   => __( 'Slider and Bricks work for both images and videos.', 'a13-onelander' ) .' '. __( 'Scrollers only work with images.', 'a13-onelander' ),
				'id'      => 'theme',
				'default' => 'bricks',
				'options' => array(
					'bricks' => __( 'Bricks', 'a13-onelander' ),
					'slider' => __( 'Slider', 'a13-onelander' ),
					'scroller' => __( 'Scroller', 'a13-onelander' ),
					'scroller-parallax' => __( 'Scroller with parallax', 'a13-onelander' ),
				),
				'type'    => 'radio',
			),
			array(
				'name'          => __( 'Content column', 'a13-onelander' ),
				'description'   => __( 'This will display separate block with title and text about the album.', 'a13-onelander' ),
				'id'            => 'album_content',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'album_content',
				'options'       => array(
					'G'     => __( 'Global settings', 'a13-onelander' ),
					'left'  => __( 'Show on the left', 'a13-onelander' ),
					'right' => __( 'Show on the right', 'a13-onelander' ),
					'off'   => __( 'Do not display it', 'a13-onelander' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'        => __( 'Bricks columns', 'a13-onelander' ),
				'id'          => 'brick_columns',
				'default'     => '3',
				'unit'        => '',
				'min'         => 1,
				'max'         => 6,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'        => __( 'The maximum width of the brick layout', 'a13-onelander' ),
				'description' => __( 'Depending on the actual width of the screen, the available space for bricks may be smaller, but never greater than this number.', 'a13-onelander' ),
				'id'          => 'bricks_max_width',
				'default'     => '1920px',
				'unit'        => 'px',
				'min'         => 200,
				'max'         => 2500,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Brick margin', 'a13-onelander' ),
				'id'       => 'brick_margin',
				'default'  => '10px',
				'unit'     => 'px',
				'min'      => 0,
				'max'      => 100,
				'type'     => 'slider',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Choose the proportions of the bricks', 'a13-onelander' ),
				'description' => __( 'It works only for images. If you change the theme option, which is called "Display thumbnails instead of video", then for videos that have set a featured image, it will also work.', 'a13-onelander' ),
				'id'       => 'bricks_proportions_size',
				'default'  => '0',
				'options' => array(
					'0'    => __( 'Original size', 'a13-onelander' ),
					'1/1'  => __( '1:1', 'a13-onelander' ),
					'2/3'  => __( '2:3', 'a13-onelander' ),
					'3/2'  => __( '3:2', 'a13-onelander' ),
					'3/4'  => __( '3:4', 'a13-onelander' ),
					'4/3'  => __( '4:3', 'a13-onelander' ),
					'9/16' => __( '9:16', 'a13-onelander' ),
					'16/9' => __( '16:9', 'a13-onelander' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_lightbox',
				'type'     => 'radio',
				'name'     => __( 'Open bricks to lightbox', 'a13-onelander' ),
				'options'  => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'default'  => 'on',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'          => 'bricks_lightbox_mobile',
				'type'        => 'radio',
				'name'        => __( 'Open bricks to lightbox', 'a13-onelander' ) . ' - ' . esc_html__( 'on mobiles', 'a13-onelander' ),
				'description' => __( 'Works on devices less than 600 pixels wide.', 'a13-onelander' ),
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'default'     => 'on',
				'required'    => array(
					array( 'theme', '=', 'bricks' ),
					array( 'bricks_lightbox', '=', 'on' )
				),
			),
			array(
				'name'        => __( 'Overlay color', 'a13-onelander' ),
				'description' => __( 'Leave empty to not set any background', 'a13-onelander' ),
				'id'          => 'slide_cover_color',
				'default'     => 'rgba(0,0,0, 0.7)',
				'type'        => 'color',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Hover effect', 'a13-onelander' ),
				'id'       => 'bricks_hover',
				'default'  => 'cross',
				'options'  => array(
					'cross'  => __( 'Show cross', 'a13-onelander' ),
					'drop'   => __( 'Drop', 'a13-onelander' ),
					'shift'  => __( 'Shift', 'a13-onelander' ),
					'pop'    => __( 'Pop', 'a13-onelander' ),
					'border' => __( 'Border', 'a13-onelander' ),
					'none'   => __( 'None', 'a13-onelander' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_title_position',
				'type'     => 'select',
				'name'     => __( 'Texts position', 'a13-onelander' ),
				'options'  => array(
					'top_left'      => __( 'Top left', 'a13-onelander' ),
					'top_center'    => __( 'Top center', 'a13-onelander' ),
					'top_right'     => __( 'Top right', 'a13-onelander' ),
					'mid_left'      => __( 'Middle left', 'a13-onelander' ),
					'mid_center'    => __( 'Middle center', 'a13-onelander' ),
					'mid_right'     => __( 'Middle right', 'a13-onelander' ),
					'bottom_left'   => __( 'Bottom left', 'a13-onelander' ),
					'bottom_center' => __( 'Bottom center', 'a13-onelander' ),
					'bottom_right'  => __( 'Bottom right', 'a13-onelander' ),
				),
				'default'  => 'top_left',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_cover',
				'type'     => 'radio',
				'name'     => __( 'Show overlay', 'a13-onelander' ). ' - ' .esc_html__( 'without hover', 'a13-onelander' ),
				'options'  => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'default'  => 'on',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_cover_hover',
				'type'     => 'radio',
				'name'     => __( 'Show overlay', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'default'  => 'off',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'          => 'bricks_overlay_gradient',
				'type'        => 'radio',
				'name'        => __( 'Show gradient', 'a13-onelander' ). ' - ' .esc_html__( 'without hover', 'a13-onelander' ),
				'description' => __( 'The main use of this function is to make the texts more readable.', 'a13-onelander' ),
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'default'     => 'on',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'          => 'bricks_overlay_gradient_hover',
				'type'        => 'radio',
				'name'        => __( 'Show gradient', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'description' => __( 'The main use of this function is to make the texts more readable.', 'a13-onelander' ),
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'default'     => 'off',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_texts',
				'type'     => 'radio',
				'name'     => __( 'Show texts', 'a13-onelander' ). ' - ' .esc_html__( 'without hover', 'a13-onelander' ),
				'options'  => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'default'  => 'on',
				'required' => array(
					array( 'theme', '=', 'bricks' ),
					array( 'enable_desc', '=', 'on' )
				),
			),
			array(
				'id'       => 'bricks_overlay_texts_hover',
				'type'     => 'radio',
				'name'     => __( 'Show texts', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'default'  => 'on',
				'required' => array(
					array( 'theme', '=', 'bricks' ),
					array( 'enable_desc', '=', 'on' )
				),
			),
			array(
				'name'        => __( 'Fit images', 'a13-onelander' ),
				'description' => __( 'How pictures will fit in the area of the slider. <strong>Fit when needed</strong> is best suited for small images that should not be stretched to larger sizes, only to smaller ones (so that they are always completely visible).', 'a13-onelander' ),
				'id'          => 'fit_variant',
				'default'     => '0',
				'options'     => array(
					'0' => __( 'Fit always', 'a13-onelander' ),
					'1' => __( 'Fit landscape', 'a13-onelander' ),
					'2' => __( 'Fit portrait', 'a13-onelander' ),
					'3' => __( 'Fit when needed', 'a13-onelander' ),
					'4' => __( 'Cover the whole screen', 'a13-onelander' ),
				),
				'type'        => 'select',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'Autoplay', 'a13-onelander' ),
				'description'   => __( 'If autoplay is on, slider will run on page load.', 'a13-onelander' ),
				'id'            => 'autoplay',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'album_slider_autoplay',
				'options'       => array(
					'G'   => __( 'Global settings', 'a13-onelander' ),
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'Transition', 'a13-onelander' ). ' : ' .esc_html__( 'Type', 'a13-onelander' ),
				'description'   => __( 'Animation between slides.', 'a13-onelander' ),
				'id'            => 'transition',
				'default'       => '-1',
				'global_value'  => '-1',
				'parent_option' => 'album_slider_transition_type',
				'options'       => array(
					'-1' => __( 'Global settings', 'a13-onelander' ),
					'0'  => __( 'None', 'a13-onelander' ),
					'1'  => __( 'Fade', 'a13-onelander' ),
					'2'  => __( 'Carousel', 'a13-onelander' ),
					'3'  => __( 'Zooming', 'a13-onelander' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Zoom in %', 'a13-onelander' ),
				'description' => __( 'How big the zooming effect will be', 'a13-onelander' ),
				'id'          => 'ken_scale',
				'default'     => 120,
				'unit'        => '%',
				'min'         => 100,
				'max'         => 200,
				'type'        => 'slider',
				'required'    => array(
					array( 'theme', '=', 'slider' ),
					array( 'transition', '=', '3' ),
				)
			),
			array(
				'name'        => __( 'Gradient above photos', 'a13-onelander' ),
				'description' => __( 'Good for better readability of slide titles.', 'a13-onelander' ),
				'id'          => 'gradient',
				'default'     => 'on',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Title', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'description' => __( 'Leave empty to not set any background', 'a13-onelander' ),
				'id'          => 'slide_title_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'enable_desc', '=', 'on' ),
					array( 'theme', '=', 'slider' )
				)
			),
			array(
				'name'     => __( 'Pattern above photos', 'a13-onelander' ),
				'id'       => 'pattern',
				'default'  => '0',
				'options'  => array(
					'0' => __( 'None', 'a13-onelander' ),
					'1' => __( 'Type 1', 'a13-onelander' ),
					'2' => __( 'Type 2', 'a13-onelander' ),
					'3' => __( 'Type 3', 'a13-onelander' ),
					'4' => __( 'Type 4', 'a13-onelander' ),
					'5' => __( 'Type 5', 'a13-onelander' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'Thumbnails', 'a13-onelander' ),
				'id'            => 'thumbs',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'album_slider_thumbs',
				'options'       => array(
					'G'   => __( 'Global settings', 'a13-onelander' ),
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Thumbnails', 'a13-onelander' ). ' : ' .esc_html__( 'Open', 'a13-onelander' ),
				'description' => __( 'If thumbnails are enabled, should they be open by default?', 'a13-onelander' ),
				'id'          => 'thumbs_on_load',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			//scroller
			array(
				'name'     => __( 'Cell width', 'a13-onelander' ),
				'id'       => 'scroller_cell_width',
				'default'  => '33',
				'options'  => array(
					'20' => '20%',
					'25' => '25%',
					'33' => '33%',
					'50' => '50%',
					'66' => '66%',
					'75' => '75%',
					'90' => '90%',
				),
				'type'     => 'select',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'     => __( 'Cell width', 'a13-onelander' ). ' - ' .esc_html__( 'on mobiles', 'a13-onelander' ),
				'description' => __( 'Works on devices less than 600 pixels wide.', 'a13-onelander' ),
				'id'       => 'scroller_cell_width_mobile',
				'default'  => '75',
				'options'  => array(
					'20' => '20%',
					'25' => '25%',
					'33' => '33%',
					'50' => '50%',
					'66' => '66%',
					'75' => '75%',
					'90' => '90%',
				),
				'type'     => 'select',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Effect on inactive elements', 'a13-onelander' ),
				'description' => esc_html__( 'It works only on large screens(1025px wide or more).', 'a13-onelander' ) .' '. __( 'Effects on images require high computing power, therefore they are disabled on mobile devices.', 'a13-onelander' ),
				'id'          => 'scroller_effect',
				'default'     => 'off',
				'options'     => array(
					'off'        => __( 'Disable', 'a13-onelander' ),
					'opacity'    => __( 'Opacity', 'a13-onelander' ),
					'scale-down' => __( 'Scale down', 'a13-onelander' ),
					'grayscale'  => __( 'Grayscale', 'a13-onelander' ),
					'blur'       => __( 'Blur', 'a13-onelander' ),
				),
				'type'        => 'select',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Space between cells', 'a13-onelander' ),
				'id'          => 'scroller_cell_margin',
				'default'     => '10px',
				'unit'        => 'px',
				'min'         => 0,
				'max'         => 100,
				'type'        => 'slider',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Fit images', 'a13-onelander' ),
				'description' => __( 'How pictures will fit in the area of the cell.', 'a13-onelander' ),
				'id'          => 'scroller_photo_cover',
				'default'     => 'cover',
				'options'     => array(
					'cover'  => __( 'Cover', 'a13-onelander' ),
					'contain' => __( 'Contain', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        =>__( 'Fit images', 'a13-onelander' ). ' - ' .esc_html__( 'after opening', 'a13-onelander' ),
				'id'          => 'scroller_opened_photo_behavior',
				'default'     => 'cover',
				'options'     => array(
					'cover'  => __( 'Cover', 'a13-onelander' ),
					'contain' => __( 'Contain', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Loop', 'a13-onelander' ),
				'description' => __( 'Combine both ends for infinite scrolling.', 'a13-onelander' ),
				'id'          => 'scroller_wrap_around',
				'default'     => 'on',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Contain', 'a13-onelander' ),
				'description' => __( 'Eliminate the empty space at the ends. Has no effect if "Loop" is enabled.', 'a13-onelander' ),
				'id'          => 'scroller_contain',
				'default'     => 'on',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
					array( 'scroller_wrap_around', '=', 'off' ),
				)
			),
			array(
				'name'        => __( 'Free scroll', 'a13-onelander' ),
				'id'          => 'scroller_free_scroll',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => esc_html__( 'Slides navigation', 'a13-onelander' ),
				'id'          => 'scroller_arrows',
				'default'     => 'on',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => esc_html__( 'Points navigation', 'a13-onelander' ),
				'id'          => 'scroller_dots',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Autoplay', 'a13-onelander' ),
				'id'          => 'scroller_autoplay',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
				)
			),
			array(
				'name'        => __( 'Autoplay', 'a13-onelander' ). ' : ' .esc_html__( 'Time between slides', 'a13-onelander' ). ' - ' .esc_html__( 'in seconds', 'a13-onelander' ),
				'id'          => 'scroller_autoplay_time',
				'default'     => 3,
				'step'        => 0.1,
				'unit'        => '',
				'min'         => 0.1,
				'max'         => 10,
				'type'        => 'slider',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
					array( 'scroller_autoplay', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Autoplay', 'a13-onelander' ). ' : ' .esc_html__( 'Pause', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'id'          => 'scroller_pause_autoplay',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'theme', '!=', 'slider' ),
					array( 'theme', '!=', 'bricks' ),
					array( 'scroller_autoplay', '=', 'on' ),
				)
			),
		),



		/*
		 *
		 * Tab: Photo Proofing
		 *
		 */
		'photo_proofing' => array(
			array(
				'name' => __('Photo Proofing', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-thumb-tack',
				'notice' => __( 'This option works only if the album is displayed in bricks mode.', 'a13-onelander' )
			),
			array(
				'name'        => __( 'Photo Proofing', 'a13-onelander' ),
				'description' => __( 'Allows you to comment and select photos and videos from this album.', 'a13-onelander' ),
				'id'          => 'proofing',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
			),
			array(
				'name'        => __( 'List of selected files', 'a13-onelander' ),
				'id'          => 'proofing_items',
				'type'        => 'proofing_items',
				'required'    => array( 'proofing', '=', 'on' ),
			),
			array(
				'name'        => __( 'Client selected items', 'a13-onelander' ),
				'id'          => 'proofing_ids',
				'description' => __( 'The IDs for YouTube and Vimeo videos can only be manually added.', 'a13-onelander' ),
				'default'     => 'auto',
				'options'     => array(
					'auto'   => __( 'Automatic', 'a13-onelander' ),
					'manual' => __( 'Manual', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array( 'proofing', '=', 'on' ),
			),
		),


		/*
		 *
		 * Tab: Header
		 *
		 */
		'header' => array(
			array(
				'name' => __('Header', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-cogs',
			),
			array(
				'name'          => __( 'Hide content under the header', 'a13-onelander' ),
				'description'   => __( 'Works only with the horizontal header.', 'a13-onelander' ),
				'id'            => 'content_under_header',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'album_content_under_header',
				'type'          => 'select',
				'options'       => array(
					'G'       => __( 'Global settings', 'a13-onelander' ),
					'content' => __( 'Yes, hide the content', 'a13-onelander' ),
					'off'     => __( 'Turn it off', 'a13-onelander' ),
				),
			),
			array(
				'name'          => __( 'Header color variant', 'a13-onelander' ),
				'description'   => __( 'Works only with the horizontal header.', 'a13-onelander' ),
				'id'            => 'horizontal_header_color_variant',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'album_horizontal_header_color_variant',
				'type'          => 'select',
				'options'       => array(
					'G'      => __( 'Global settings', 'a13-onelander' ),
					'normal' => __( 'Normal', 'a13-onelander' ),
					'light'  => __( 'Light', 'a13-onelander' ),
					'dark'   => __( 'Dark', 'a13-onelander' ),
				),
			),
			array(
				'name'          => __( 'Custom sidebar', 'a13-onelander' ),
				'description'   => esc_html__( 'Works only with the vertical header.', 'a13-onelander' ) .' '. __( 'Special widgets that should be displayed on this page in the header.', 'a13-onelander' ),
				'id'            => 'header_custom_sidebar',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'header_custom_sidebar',
				'options'       => $header_sidebars,
				'type'          => 'select',
			),
		),
	);

	return apply_filters( 'apollo13framework_meta_boxes_album', $meta );
}



function apollo13framework_meta_boxes_images_manager() {
	return apply_filters( 'apollo13framework_meta_boxes_images_manager', array('images_manager' => array()) );
}



function apollo13framework_get_socials_array() {
	global $apollo13framework_a13;

	$tmp_arr = array();
	$socials = $apollo13framework_a13->get_social_icons_list();
	foreach ( $socials as $id => $social ) {
		array_push( $tmp_arr, array( 'name' => $social, 'id' => $id, 'type' => 'text' ) );
	}
	return $tmp_arr;
}



function apollo13framework_meta_boxes_people() {
	$meta =
		array(
			/*
			 *
			 * Tab: General
			 *
			 */
			'general' => array(
				array(
					'name' => __('General', 'a13-onelander'),
					'type' => 'fieldset',
					'tab'   => true,
					'icon'  => 'fa fa-wrench'
				),
				array(
						'name'        => __( 'Subtitle', 'a13-onelander' ),
						'description' => __( 'You can use HTML here.', 'a13-onelander' ),
						'id'          => 'subtitle',
						'default'     => '',
						'type'        => 'text'
				),
				array(
						'name'    => __( 'Testimonial', 'a13-onelander' ),
						'desc'    => '',
						'id'      => 'testimonial',
						'default' => '',
						'type'    => 'textarea'
				),
				array(
						'name'        => __( 'Overlay color', 'a13-onelander' ),
						'id'          => 'overlay_bg_color',
						'default'     => 'rgba(0,0,0,0.5)',
						'type'        => 'color'
				),
				array(
						'name'        => __( 'Overlay', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
						'id'          => 'overlay_font_color',
						'default'     => 'rgba(255,255,255,1)',
						'type'        => 'color'
				),
			),
			/*
			 *
			 * Tab: Socials
			 *
			 */
			'socials' => array_merge(
				array(
					array(
						'name' => __('Social icons', 'a13-onelander'),
						'type' => 'fieldset',
						'tab'   => true,
						'icon'  => 'fa fa-facebook-official'
					),
				),
				apollo13framework_get_socials_array()
			),
		);

	return $meta;
}



function apollo13framework_meta_boxes_work() {
	$header_sidebars = array_merge(
		array(
			'G'   => __( 'Global settings', 'a13-onelander' ),
			'off' => __( 'Off', 'a13-onelander' ),
		),
		apollo13framework_meta_get_user_sidebars()
	);

	$meta = array(
		/*
		 *
		 * Tab: Works list
		 *
		 */
		'works_list' => array(
			array(
				'name' => __('Works list', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-list'
			),
			array(
				'name'        => __( 'Size of brick', 'a13-onelander' ),
				'description' => __( 'What should be the width of this work on the Works list?', 'a13-onelander' ),
				'id'          => 'brick_ratio_x',
				'default'     => 1,
				'unit'        => '',
				'min'         => 1,
				'max'         => 4,
				'type'        => 'slider'
			),
			array(
				'name'        => __( 'Overlay color', 'a13-onelander' ),
				'id'          => 'cover_color',
				'description' => __( 'Works only when titles are displayed over images in the Works list.', 'a13-onelander' ),
				'default'     => 'rgba(0,0,0, 0.7)',
				'type'        => 'color'
			),
			array(
				'name'        => __( 'Exclude from the Works list page', 'a13-onelander' ),
				'description' => __( 'If enabled, then this Work will not be listed on the Works list page, but you can still select it for the front page or in other places.', 'a13-onelander' ),
				'id'          => 'exclude_in_works_list',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
			),
		),
		/*
		 *
		 * Tab: Work media
		 *
		 */
		'works_media' => array(
			array(
				'name' => __('Work media', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-th'
			),
			array(
				'name'        => __( 'Items order', 'a13-onelander' ),
				'description' => __( 'It will display your images/videos from the first to the last or in a different way.', 'a13-onelander' ),
				'id'          => 'order',
				'default'     => 'ASC',
				'options'     => array(
					'ASC'    => __( 'First on the list, first displayed', 'a13-onelander' ),
					'DESC'   => __( 'First on the list, last displayed', 'a13-onelander' ),
					'random' => __( 'Random', 'a13-onelander' ),
				),
				'type'        => 'select',
			),
			array(
				'name'        => __( 'Show title and description of work items', 'a13-onelander' ),
				'description' => __( 'If enabled, then it will affect displaying in bricks and slider option, and also in lightbox.', 'a13-onelander' ),
				'id'          => 'enable_desc',
				'default'     => 'off',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
			),
			array(
				'name'    => __( 'Show media in', 'a13-onelander' ),
				'id'      => 'theme',
				'default' => 'bricks',
				'options' => array(
					'bricks' => __( 'Bricks', 'a13-onelander' ),
					'slider' => __( 'Slider', 'a13-onelander' ),
					'off' => __( 'Do not display it', 'a13-onelander' ),
				),
				'type'    => 'radio',
			),
			array(
				'name'        => __( 'Bricks columns', 'a13-onelander' ),
				'id'          => 'brick_columns',
				'default'     => '3',
				'unit'        => '',
				'min'         => 1,
				'max'         => 6,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'        => __( 'The maximum width of the brick layout', 'a13-onelander' ),
				'description' => __( 'Depending on the actual width of the screen, the available space for bricks may be smaller, but never greater than this number.', 'a13-onelander' ),
				'id'          => 'bricks_max_width',
				'default'     => '1920px',
				'unit'        => 'px',
				'min'         => 200,
				'max'         => 2500,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Brick margin', 'a13-onelander' ),
				'id'       => 'brick_margin',
				'default'  => '0px',
				'unit'     => 'px',
				'min'      => 0,
				'max'      => 100,
				'type'     => 'slider',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Choose the proportions of the bricks', 'a13-onelander' ),
				'description' => __( 'It works only for images. If you change the theme option, which is called "Display thumbnails instead of video", then for videos that have set a featured image, it will also work.', 'a13-onelander' ),
				'id'       => 'bricks_proportions_size',
				'default'  => '0',
				'options' => array(
					'0'    => __( 'Original size', 'a13-onelander' ),
					'1/1'  => __( '1:1', 'a13-onelander' ),
					'2/3'  => __( '2:3', 'a13-onelander' ),
					'3/2'  => __( '3:2', 'a13-onelander' ),
					'3/4'  => __( '3:4', 'a13-onelander' ),
					'4/3'  => __( '4:3', 'a13-onelander' ),
					'9/16' => __( '9:16', 'a13-onelander' ),
					'16/9' => __( '16:9', 'a13-onelander' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_lightbox',
				'type'     => 'radio',
				'name'     => __( 'Open bricks to lightbox', 'a13-onelander' ),
				'options'  => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'default'  => 'on',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'          => 'bricks_lightbox_mobile',
				'type'        => 'radio',
				'name'        => __( 'Open bricks to lightbox', 'a13-onelander' ) . ' - ' . esc_html__( 'on mobiles', 'a13-onelander' ),
				'description' => __( 'Works on devices less than 600 pixels wide.', 'a13-onelander' ),
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'default'     => 'on',
				'required'    => array(
					array( 'theme', '=', 'bricks' ),
					array( 'bricks_lightbox', '=', 'on' )
				),
			),
			array(
				'name'        => __( 'Overlay color', 'a13-onelander' ),
				'description' => __( 'Leave empty to not set any background', 'a13-onelander' ),
				'id'          => 'slide_cover_color',
				'default'     => 'rgba(0,0,0, 0.7)',
				'type'        => 'color',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'name'     => __( 'Hover effect', 'a13-onelander' ),
				'id'       => 'bricks_hover',
				'default'  => 'cross',
				'options'  => array(
					'cross'  => __( 'Show cross', 'a13-onelander' ),
					'drop'   => __( 'Drop', 'a13-onelander' ),
					'shift'  => __( 'Shift', 'a13-onelander' ),
					'pop'    => __( 'Pop', 'a13-onelander' ),
					'border' => __( 'Border', 'a13-onelander' ),
					'none'   => __( 'None', 'a13-onelander' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_title_position',
				'type'     => 'select',
				'name'     => __( 'Texts position', 'a13-onelander' ),
				'options'  => array(
					'top_left'      => __( 'Top left', 'a13-onelander' ),
					'top_center'    => __( 'Top center', 'a13-onelander' ),
					'top_right'     => __( 'Top right', 'a13-onelander' ),
					'mid_left'      => __( 'Middle left', 'a13-onelander' ),
					'mid_center'    => __( 'Middle center', 'a13-onelander' ),
					'mid_right'     => __( 'Middle right', 'a13-onelander' ),
					'bottom_left'   => __( 'Bottom left', 'a13-onelander' ),
					'bottom_center' => __( 'Bottom center', 'a13-onelander' ),
					'bottom_right'  => __( 'Bottom right', 'a13-onelander' ),
				),
				'default'  => 'bottom_center',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_cover',
				'type'     => 'radio',
				'name'     => __( 'Show overlay', 'a13-onelander' ). ' - ' .esc_html__( 'without hover', 'a13-onelander' ),
				'options'  => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'default'  => 'off',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_cover_hover',
				'type'     => 'radio',
				'name'     => __( 'Show overlay', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'default'  => 'on',
				'required' => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'          => 'bricks_overlay_gradient',
				'type'        => 'radio',
				'name'        => __( 'Show gradient', 'a13-onelander' ). ' - ' .esc_html__( 'without hover', 'a13-onelander' ),
				'description' => __( 'The main use of this function is to make the texts more readable.', 'a13-onelander' ),
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'default'     => 'off',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'          => 'bricks_overlay_gradient_hover',
				'type'        => 'radio',
				'name'        => __( 'Show gradient', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'description' => __( 'The main use of this function is to make the texts more readable.', 'a13-onelander' ),
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'default'     => 'off',
				'required'    => array( 'theme', '=', 'bricks' ),
			),
			array(
				'id'       => 'bricks_overlay_texts',
				'type'     => 'radio',
				'name'     => __( 'Show texts', 'a13-onelander' ). ' - ' .esc_html__( 'without hover', 'a13-onelander' ),
				'options'  => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'default'  => 'off',
				'required' => array(
					array( 'theme', '=', 'bricks' ),
					array( 'enable_desc', '=', 'on' )
				),
			),
			array(
				'id'       => 'bricks_overlay_texts_hover',
				'type'     => 'radio',
				'name'     => __( 'Show texts', 'a13-onelander' ). ' - ' .esc_html__( 'on hover', 'a13-onelander' ),
				'options'  => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'default'  => 'on',
				'required' => array(
					array( 'theme', '=', 'bricks' ),
					array( 'enable_desc', '=', 'on' )
				),
			),

			array(
				'name'          => __( 'Stretch the slider to the window height', 'a13-onelander' ),
				'id'            => 'slider_window_high',
				'default'     => 'off',
				'options'       => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'          => 'radio',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Slider - width proportion', 'a13-onelander' ),
				'id'          => 'slider_width_proportion',
				'default'     => '16',
				'unit'        => '',
				'min'         => 1,
				'max'         => 20,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Slider - height proportion', 'a13-onelander' ),
				'id'          => 'slider_height_proportion',
				'default'     => '9',
				'unit'        => '',
				'min'         => 1,
				'max'         => 20,
				'type'        => 'slider',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Fit images', 'a13-onelander' ),
				'description' => __( 'How pictures will fit in the area of the slider. <strong>Fit when needed</strong> is best suited for small images that should not be stretched to larger sizes, only to smaller ones (so that they are always completely visible).', 'a13-onelander' ),
				'id'          => 'fit_variant',
				'default'     => '4',
				'options'     => array(
					'0' => __( 'Fit always', 'a13-onelander' ),
					'1' => __( 'Fit landscape', 'a13-onelander' ),
					'2' => __( 'Fit portrait', 'a13-onelander' ),
					'3' => __( 'Fit when needed', 'a13-onelander' ),
					'4' => __( 'Cover the whole screen', 'a13-onelander' ),
				),
				'type'        => 'select',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'Autoplay', 'a13-onelander' ),
				'description'   => __( 'If autoplay is on, slider will run on page load.', 'a13-onelander' ),
				'id'            => 'autoplay',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'work_slider_autoplay',
				'options'       => array(
					'G'   => __( 'Global settings', 'a13-onelander' ),
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'Transition', 'a13-onelander' ). ' : ' .esc_html__( 'Type', 'a13-onelander' ),
				'description'   => __( 'Animation between slides.', 'a13-onelander' ),
				'id'            => 'transition',
				'default'       => '-1',
				'global_value'  => '-1',
				'parent_option' => 'work_slider_transition_type',
				'options'       => array(
					'-1' => __( 'Global settings', 'a13-onelander' ),
					'0'  => __( 'None', 'a13-onelander' ),
					'1'  => __( 'Fade', 'a13-onelander' ),
					'2'  => __( 'Carousel', 'a13-onelander' ),
					'3'  => __( 'Zooming', 'a13-onelander' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Zoom in %', 'a13-onelander' ),
				'description' => __( 'How big the zooming effect will be', 'a13-onelander' ),
				'id'          => 'ken_scale',
				'default'     => 120,
				'unit'        => '%',
				'min'         => 100,
				'max'         => 200,
				'type'        => 'slider',
				'required'    => array(
					array( 'theme', '=', 'slider' ),
					array( 'transition', '=', '3' ),
				)
			),
			array(
				'name'        => __( 'Gradient above photos', 'a13-onelander' ),
				'description' => __( 'Good for better readability of slide titles.', 'a13-onelander' ),
				'id'          => 'gradient',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Title', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'description' => __( 'Leave empty to not set any background', 'a13-onelander' ),
				'id'          => 'slide_title_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'enable_desc', '=', 'on' ),
					array( 'theme', '=', 'slider' )
				)
			),
			array(
				'name'     => __( 'Pattern above photos', 'a13-onelander' ),
				'id'       => 'pattern',
				'default'  => '0',
				'options'  => array(
					'0' => __( 'None', 'a13-onelander' ),
					'1' => __( 'Type 1', 'a13-onelander' ),
					'2' => __( 'Type 2', 'a13-onelander' ),
					'3' => __( 'Type 3', 'a13-onelander' ),
					'4' => __( 'Type 4', 'a13-onelander' ),
					'5' => __( 'Type 5', 'a13-onelander' ),
				),
				'type'     => 'select',
				'required' => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'          => __( 'Thumbnails', 'a13-onelander' ),
				'id'            => 'thumbs',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'work_slider_thumbs',
				'options'       => array(
					'G'   => __( 'Global settings', 'a13-onelander' ),
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'          => 'select',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'        => __( 'Thumbnails', 'a13-onelander' ). ' : ' .esc_html__( 'Open', 'a13-onelander' ),
				'description' => __( 'If thumbnails are enabled, should they be open by default?', 'a13-onelander' ),
				'id'          => 'thumbs_on_load',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'     => __( 'Slider', 'a13-onelander' ). ' : ' .esc_html__( 'Background color', 'a13-onelander' ),
				'id'       => 'slider_bg_color',
				'default'  => '',
				'type'     => 'color',
				'required'      => array( 'theme', '=', 'slider' ),
			),
			array(
				'name'     => __( 'Media top margin', 'a13-onelander' ),
				'id'       => 'media_margin_top',
				'default'  => '0px',
				'unit'     => 'px',
				'min'      => 0,
				'max'      => 100,
				'type'     => 'slider',
				'required' => array( 'theme', '!=', 'off' ),
			),
			array(
				'name'     => __( 'Media bottom margin', 'a13-onelander' ),
				'id'       => 'media_margin_bottom',
				'default'  => '0px',
				'unit'     => 'px',
				'min'      => 0,
				'max'      => 100,
				'type'     => 'slider',
				'required' => array( 'theme', '!=', 'off' ),
			),
		),

		/*
		 *
		 * Tab: Layout
		 *
		 */
		'layout' => array(
			array(
				'name' => __('Layout', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-wrench'
			),
			array(
				'name'          => __( 'Content Layout', 'a13-onelander' ),
				'id'            => 'content_layout',
				'default'       => 'global',
				'global_value'  => 'global',
				'parent_option' => 'work_content_layout',
				'type'          => 'select',
				'options'       => array(
					'global'        => __( 'Global settings', 'a13-onelander' ),
					'center'        => __( 'Center fixed width', 'a13-onelander' ),
					'left'          => __( 'Left fixed width', 'a13-onelander' ),
					'left_padding'  => __( 'Left fixed width + padding', 'a13-onelander' ),
					'right'         => __( 'Right fixed width', 'a13-onelander' ),
					'right_padding' => __( 'Right fixed width + padding', 'a13-onelander' ),
					'full_fixed'    => __( 'Full width + fixed content', 'a13-onelander' ),
					'full_padding'  => __( 'Full width + padding', 'a13-onelander' ),
					'full'          => __( 'Full width', 'a13-onelander' ),
				),
			),
			array(
				'name'        => esc_html__( 'Content', 'a13-onelander' ). ' : ' .esc_html__( 'Top/bottom padding', 'a13-onelander' ),
				'id'          => 'content_padding',
				'default'     => 'both',
				'type'        => 'select',
				'options'     => array(
					'both'   => __( 'Both on', 'a13-onelander' ),
					'top'    => __( 'Only top', 'a13-onelander' ),
					'bottom' => __( 'Only bottom', 'a13-onelander' ),
					'off'    => __( 'Both off', 'a13-onelander' ),
				),
			),
			array(
				'name'        => __( 'Content', 'a13-onelander' ). ' : ' .esc_html__( 'Left/right padding', 'a13-onelander' ),
				'id'          => 'content_side_padding',
				'default'     => 'both',
				'type'        => 'radio',
				'options'     => array(
					'both'   => __( 'Both on', 'a13-onelander' ),
					'off'    => __( 'Both off', 'a13-onelander' ),
				),
			),
		),

		/*
		 *
		 * Tab: Header
		 *
		 */
		'header' => array(
			array(
				'name' => __('Header', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-cogs'
			),
			array(
				'name'          => __( 'Hide content under the header', 'a13-onelander' ),
				'description'   => __( 'Works only with the horizontal header.', 'a13-onelander' ),
				'id'            => 'content_under_header',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'work_content_under_header',
				'type'          => 'select',
				'options'       => array(
					'G'       => __( 'Global settings', 'a13-onelander' ),
					'content' => __( 'Yes, hide the content', 'a13-onelander' ),
					'title'   => __( 'Yes, hide the content and add top padding to the outside title bar.', 'a13-onelander' ),
					'off'     => __( 'Turn it off', 'a13-onelander' ),
				),
			),
			array(
				'name'          => __( 'Header color variant', 'a13-onelander' ),
				'description'   => __( 'Works only with the horizontal header.', 'a13-onelander' ),
				'id'            => 'horizontal_header_color_variant',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'work_horizontal_header_color_variant',
				'type'          => 'select',
				'options'       => array(
					'G'      => __( 'Global settings', 'a13-onelander' ),
					'normal' => __( 'Normal', 'a13-onelander' ),
					'light'  => __( 'Light', 'a13-onelander' ),
					'dark'   => __( 'Dark', 'a13-onelander' ),
				),
			),
			array(
				'name'          => __( 'Custom sidebar', 'a13-onelander' ),
				'description'   => esc_html__( 'Works only with the vertical header.', 'a13-onelander' ) .' '. __( 'Special widgets that should be displayed on this page in the header.', 'a13-onelander' ),
				'id'            => 'header_custom_sidebar',
				'global_value'  => 'G',
				'default'       => 'G',
				'parent_option' => 'header_custom_sidebar',
				'options'       => $header_sidebars,
				'type'          => 'select',
			),
		),

		/*
		 *
		 * Tab: Title bar
		 *
		 */
		'title_bar' => array(
			array(
				'name' => __('Title bar', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-text-width'
			),
			array(
				'name'        => __( 'Title bar', 'a13-onelander' ),
				'description' => __( 'You can use global settings or override them here', 'a13-onelander' ),
				'id'          => 'title_bar_settings',
				'default'     => 'global',
				'type'        => 'radio',
				'options'     => array(
					'global' => __( 'Global settings', 'a13-onelander' ),
					'custom' => __( 'Use custom settings', 'a13-onelander' ),
					'off'    => __( 'Turn it off', 'a13-onelander' ),
				),
			),
			array(
				'name'        => __( 'Position', 'a13-onelander' ),
				'id'          => 'title_bar_position',
				'default'     => 'outside',
				'type'        => 'hidden',//no switching in options, but we leave it as option so it will be future ready, and to not make exceptions for Works
				'options'     => array(
					'outside' => __( 'Before the content', 'a13-onelander' ),
					'inside'  => __( 'Inside the content', 'a13-onelander' ),
				),
				'description' => __( 'To set the background image for the "Before the content" option, use the <strong>featured image</strong>.', 'a13-onelander' ),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
			array(
				'name'        => __( 'Variant', 'a13-onelander' ),
				'description' => '',
				'id'          => 'title_bar_variant',
				'default'     => 'classic',
				'options'     => array(
					'classic'  => __( 'Classic(to side)', 'a13-onelander' ),
					'centered' => __( 'Centered', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Width', 'a13-onelander' ),
				'description' => '',
				'id'          => 'title_bar_width',
				'default'     => 'full',
				'options'     => array(
					'full'  => __( 'Full', 'a13-onelander' ),
					'boxed' => __( 'Boxed', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => __( 'How to fit the background image', 'a13-onelander' ),
				'id'       => 'title_bar_image_fit',
				'default'  => 'repeat',
				'options'  => array(
					'cover'    => __( 'Cover', 'a13-onelander' ),
					'contain'  => __( 'Contain', 'a13-onelander' ),
					'fitV'     => __( 'Fit Vertically', 'a13-onelander' ),
					'fitH'     => __( 'Fit Horizontally', 'a13-onelander' ),
					'center'   => __( 'Just center', 'a13-onelander' ),
					'repeat'   => __( 'Repeat', 'a13-onelander' ),
					'repeat-x' => __( 'Repeat X', 'a13-onelander' ),
					'repeat-y' => __( 'Repeat Y', 'a13-onelander' ),
				),
				'type'     => 'select',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'a13-onelander' ),
				'description' => '',
				'id'          => 'title_bar_parallax',
				'default'     => 'off',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'type'        => 'radio',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'a13-onelander' ). ' : ' . __( 'Type', 'a13-onelander' ),
				'description' => __( 'It defines how the image will scroll in the background while the page is scrolled down.', 'a13-onelander' ),
				'id'          => 'title_bar_parallax_type',
				'default'     => 'tb',
				'options'     => array(
					"tb"   => __( 'top to bottom', 'a13-onelander' ),
					"bt"   => __( 'bottom to top', 'a13-onelander' ),
					"lr"   => __( 'left to right', 'a13-onelander' ),
					"rl"   => __( 'right to left', 'a13-onelander' ),
					"tlbr" => __( 'top-left to bottom-right', 'a13-onelander' ),
					"trbl" => __( 'top-right to bottom-left', 'a13-onelander' ),
					"bltr" => __( 'bottom-left to top-right', 'a13-onelander' ),
					"brtl" => __( 'bottom-right to top-left', 'a13-onelander' ),
				),
				'type'        => 'select',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Parallax', 'a13-onelander' ). ' : ' . __( 'Speed', 'a13-onelander' ),
				'description' => __( 'It will be only used for the background that is repeated. If the background is set to not repeat this value will be ignored.', 'a13-onelander' ),
				'id'          => 'title_bar_parallax_speed',
				'default'     => '1.00',
				'type'        => 'text',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
					array( 'title_bar_parallax', '=', 'on' ),
				)
			),
			array(
				'name'        => __( 'Overlay color', 'a13-onelander' ),
				'description' => __( 'Will be placed above the image(if used)', 'a13-onelander' ),
				'id'          => 'title_bar_bg_color',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'     => esc_html__( 'Titles', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'id'       => 'title_bar_title_color',
				'default'  => '',
				'type'     => 'color',
				'required' => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => esc_html__( 'Other elements', 'a13-onelander' ). ' : ' .esc_html__( 'Text color', 'a13-onelander' ),
				'description' => __( 'Used in breadcrumbs.', 'a13-onelander' ),
				'id'          => 'title_bar_color_1',
				'default'     => '',
				'type'        => 'color',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Top/bottom padding', 'a13-onelander' ),
				'description' => '',
				'id'          => 'title_bar_space_width',
				'default'     => '40px',
				'unit'        => 'px',
				'min'         => 0,
				'max'         => 600,
				'type'        => 'slider',
				'required'    => array(
					array( 'title_bar_settings', '=', 'custom' ),
					array( 'title_bar_position', '!=', 'inside' ),
				)
			),
			array(
				'name'        => __( 'Breadcrumbs', 'a13-onelander' ),
				'description' => '',
				'id'          => 'breadcrumbs',
				'default'     => 'on',
				'type'        => 'radio',
				'options'     => array(
					'on'  => __( 'Enable', 'a13-onelander' ),
					'off' => __( 'Disable', 'a13-onelander' ),
				),
				'required'    => array( 'title_bar_settings', '=', 'custom' ),
			),
		),

		/*
		 *
		 * Tab: Content
		 *
		 */
		'content' => array(
			array(
				'name' => __('Content', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-align-left'
			),
			array(
				'name'          => __( 'Categories in content', 'a13-onelander' ),
				'id'            => 'content_categories',
				'default'       => 'G',
				'global_value'  => 'G',
				'parent_option' => 'work_content_categories',
				'type'          => 'radio',
				'options'       => array(
					'G'   => __( 'Global settings', 'a13-onelander' ),
					'on'  => __( 'On', 'a13-onelander' ),
					'off' => __( 'Off', 'a13-onelander' ),
				),
			),
		),

		/*
		 *
		 * Tab: Page background
		 *
		 */
		'background' => array(
			array(
				'name' => __('Page background', 'a13-onelander'),
				'type' => 'fieldset',
				'tab'   => true,
				'icon'  => 'fa fa-picture-o'
			),
			array(
				'name'        => __( 'Page background', 'a13-onelander' ),
				'description' => __( 'You can use global settings or override them here', 'a13-onelander' ),
				'id'          => 'page_bg_settings',
				'default'     => 'global',
				'type'        => 'radio',
				'options'     => array(
					'global' => __( 'Global settings', 'a13-onelander' ),
					'custom' => __( 'Use custom settings', 'a13-onelander' ),
				),
			),
			array(
				'name'        => __( 'Background image', 'a13-onelander' ),
				'id'          => 'page_image',
				'default'     => '',
				'button_text' => __( 'Upload Image', 'a13-onelander' ),
				'type'        => 'upload',
				'required'    => array( 'page_bg_settings', '=', 'custom' ),
			),
			array(
				'name'     => __( 'How to fit the background image', 'a13-onelander' ),
				'id'       => 'page_image_fit',
				'default'  => 'cover',
				'options'  => array(
					'cover'    => __( 'Cover', 'a13-onelander' ),
					'contain'  => __( 'Contain', 'a13-onelander' ),
					'fitV'     => __( 'Fit Vertically', 'a13-onelander' ),
					'fitH'     => __( 'Fit Horizontally', 'a13-onelander' ),
					'center'   => __( 'Just center', 'a13-onelander' ),
					'repeat'   => __( 'Repeat', 'a13-onelander' ),
					'repeat-x' => __( 'Repeat X', 'a13-onelander' ),
					'repeat-y' => __( 'Repeat Y', 'a13-onelander' ),
				),
				'type'     => 'select',
				'required' => array( 'page_bg_settings', '=', 'custom' ),
			),
			array(
				'name'     => __( 'Background color', 'a13-onelander' ),
				'id'       => 'page_bg_color',
				'default'  => '',
				'type'     => 'color',
				'required' => array( 'page_bg_settings', '=', 'custom' ),
			),
		)
	);

	return apply_filters( 'apollo13framework_meta_boxes_work', $meta );
}
