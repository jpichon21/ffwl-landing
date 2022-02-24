<?php
global $apollo13framework_a13;

$top_bar         = $apollo13framework_a13->get_option( 'header_top_bar' ) === 'on';
$variant         = $apollo13framework_a13->get_option( 'header_horizontal_variant' );

$header_content_width = $apollo13framework_a13->get_option( 'header_content_width' );
$header_width = ' ' . $header_content_width;
if($header_content_width === 'narrow' && $apollo13framework_a13->get_option( 'header_content_width_narrow_bg') === 'on' ){
	$header_width .= ' narrow-header';
}

$header_classes = 'to-move a13-horizontal header-type-one_line a13-'.apollo13framework_horizontal_header_color_variant().'-variant header-variant-' . $variant . $header_width;
if($variant === 'one_line_centered'){
	$header_classes .=  ($apollo13framework_a13->get_option( 'logo_with_shield' ) === 'on') ? ' with-shield' : ' no-shield';
}
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
		<?php if($variant === 'one_line_centered'): ?>

		<div class="socials-cell">

		<?php if ( $socials ) {
			//check what color variant we use
			$color_variant = apollo13framework_horizontal_header_color_variant();
			$color_variant = $color_variant === 'normal' ? '' : '_'.$color_variant;

			//escaped on creation
			echo apollo13framework_social_icons(
				$apollo13framework_a13->get_option( 'header'.$color_variant.'_socials_color' ),
				$apollo13framework_a13->get_option( 'header'.$color_variant.'_socials_color_hover' ),
				'',
				$apollo13framework_a13->get_option( 'header_socials_display_on_mobile' ) === 'off'
			);
		} ?>
		</div>

		<div class="menu-cell">
			<?php if( $apollo13framework_a13->get_option( 'logo_with_shield' ) === 'on'){
					?><div class="logo-container shield"<?php apollo13framework_schema_args('logo'); ?>><div class="scaling-svg-container"><svg version="1.1" xmlns="http://www.w3.org/2000/svg"
			                                                  viewBox="0 0 1000.000000 1256.000000">
					<g transform="translate(0.000000,1256.000000) scale(0.100000,-0.100000)"
					   fill="#000000" stroke="none">
						<path d="M0 8062 c0 -4414 0 -4500 19 -4574 71 -276 299 -587 563 -765 57 -38
897 -582 1868 -1207 971 -626 1809 -1168 1864 -1206 112 -77 269 -158 377
-196 337 -115 635 -50 1044 230 66 45 930 604 1920 1240 990 637 1818 1170
1840 1184 22 15 88 74 146 132 170 168 291 374 339 574 20 80 20 154 20 4584
l0 4502 -5000 0 -5000 0 0 -4498z"></path>
					</g>
				</svg></div>
				<?php
				}
				else{
					echo '<div class="logo-container"'.apollo13framework_get_schema_args('logo').'>';
				}
				apollo13framework_header_logo(); ?></div>
			<nav id="access" class="navigation-bar"<?php apollo13framework_schema_args('navigation'); ?>><!-- this element is need in HTML even if menu is disabled -->
				<?php if ( $menu_on ): ?>
				<div class="menu-container clearfix">
					<?php apollo13framework_header_menu('one-line-left'); ?>
					<?php apollo13framework_header_menu('one-line-right'); ?>
				</div>
				<?php endif; ?>
			</nav>
		</div>


		<div class="tools-cell">
		<?php echo wp_kses_post( $header_tools );//escaped layout part ?>
		</div>

		<?php else: ?>

		<div class="logo-container"<?php apollo13framework_schema_args('logo'); ?>><?php apollo13framework_header_logo(); ?></div>
		<nav id="access" class="navigation-bar"<?php apollo13framework_schema_args('navigation'); ?>><!-- this element is need in HTML even if menu is disabled -->
			<?php if ( $menu_on ): ?>
				<?php apollo13framework_header_menu(); ?>
			<?php endif; ?>
		</nav>
		<!-- #access -->
		<?php echo wp_kses_post($header_tools );//escaped layout part ?>
		<?php if ( $socials ) {
			//check what color variant we use
			$color_variant = apollo13framework_horizontal_header_color_variant();
			$color_variant = $color_variant === 'normal' ? '' : '_'.$color_variant;

			//escaped on creation
			echo apollo13framework_social_icons(
				$apollo13framework_a13->get_option( 'header'.$color_variant.'_socials_color' ),
				$apollo13framework_a13->get_option( 'header'.$color_variant.'_socials_color_hover' ),
				'',
				$apollo13framework_a13->get_option( 'header_socials_display_on_mobile' ) === 'off'
			);
		} ?>

		<?php endif; ?>
	</div>
	<?php echo apollo13framework_header_search();//escaped on creation ?>
</header>
