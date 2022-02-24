<?php
global $apollo13framework_a13;

$top_bar         = $apollo13framework_a13->get_option( 'header_top_bar' ) === 'on';
$variant         = $apollo13framework_a13->get_option( 'header_horizontal_variant' );

$header_content_width = $apollo13framework_a13->get_option( 'header_content_width' );
$header_width = ' ' . $header_content_width;
if($header_content_width === 'narrow' && $apollo13framework_a13->get_option( 'header_content_width_narrow_bg') === 'on' ){
	$header_width .= ' narrow-header';
}

$header_classes = 'to-move a13-horizontal header-type-multi_line a13-'.apollo13framework_horizontal_header_color_variant().'-variant header-variant-' . $variant . $header_width;
$menu_on        = $apollo13framework_a13->get_option( 'header_main_menu' ) === 'on';
$socials        = $apollo13framework_a13->get_option( 'header_socials' ) === 'on';

$icons_no     = 0;
$header_tools = apollo13framework_get_header_toolbar( $icons_no );
if ( ! $icons_no ) {
	$header_classes .= ' no-tools';
} else {
	$header_classes .= ' tools-icons-' . $icons_no; //number of icons
}

//how sticky version will behave
$header_classes .= ' '.$apollo13framework_a13->get_option( 'header_horizontal_sticky' );

//hide until it is scrolled to
$show_header_at = $apollo13framework_a13->get_meta('_horizontal_header_show_header_at' );
if(strlen($show_header_at) && $show_header_at > 0){
	$header_classes .= ' hide-until-scrolled-to';
}

?>
<header id="header" class="<?php echo esc_attr( $header_classes ); ?>"<?php apollo13framework_schema_args( 'header' ); ?>>
	<?php if ( $top_bar ) {
		apollo13framework_header_top_bar();
	} ?>
	<div class="head">
		<?php if($variant === 'menu_below'): ?>
		<div class="top-head">
			<div class="logo-container"<?php apollo13framework_schema_args('logo'); ?>><?php apollo13framework_header_logo(); ?></div>
			<?php echo wp_kses_post( $header_tools );//escaped layout part ?>
			<?php if ( $socials ) {
				//check what color variant we use
				$color_variant = apollo13framework_horizontal_header_color_variant();
				$color_variant = $color_variant === 'normal' ? '' : '_'.$color_variant;

				echo apollo13framework_social_icons(
					$apollo13framework_a13->get_option( 'header'.$color_variant.'_socials_color' ),
					$apollo13framework_a13->get_option( 'header'.$color_variant.'_socials_color_hover' ),
					'',
					$apollo13framework_a13->get_option( 'header_socials_display_on_mobile' ) === 'off'
				);
			} ?>
		</div>

		<div class="bottom-head">
			<nav id="access" class="navigation-bar"<?php apollo13framework_schema_args('navigation'); ?>><!-- this element is need in HTML even if menu is disabled -->
				<?php if ( $menu_on ): ?>
					<?php apollo13framework_header_menu(); ?>
				<?php endif; ?>
			</nav>
			<!-- #access -->
		</div>

		<?php else: ?>
		<div class="bottom-head">
			<nav id="access" class="navigation-bar"<?php apollo13framework_schema_args('navigation'); ?>><!-- this element is need in HTML even if menu is disabled -->
				<?php if ( $menu_on ): ?>
					<?php apollo13framework_header_menu(); ?>
				<?php endif; ?>
			</nav>
			<!-- #access -->
		</div>

		<div class="top-head">
			<div class="logo-container"<?php apollo13framework_schema_args('logo'); ?>><?php apollo13framework_header_logo(); ?></div>
			<?php echo wp_kses_post( $header_tools );//escaped layout part ?>
			<?php if ( $socials ) {
				//check what color variant we use
				$color_variant = apollo13framework_horizontal_header_color_variant();
				$color_variant = $color_variant === 'normal' ? '' : '_'.$color_variant;

				echo apollo13framework_social_icons(
					$apollo13framework_a13->get_option( 'header'.$color_variant.'_socials_color' ),
					$apollo13framework_a13->get_option( 'header'.$color_variant.'_socials_color_hover' ),
					'',
					$apollo13framework_a13->get_option( 'header_socials_display_on_mobile' ) === 'off'
				);
			} ?>
		</div>

		<?php endif; ?>
	</div>
	<?php echo apollo13framework_header_search(); ?>
</header>
