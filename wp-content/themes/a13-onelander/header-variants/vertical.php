<?php
global $apollo13framework_a13;

$background_type = $apollo13framework_a13->get_option( 'header_widgets_color' );
$variant         = $apollo13framework_a13->get_option( 'header_vertical_variant' );
$header_classes  = 'to-move vertical ' . $background_type . ' variant-'.$variant;
$menu_on         = $apollo13framework_a13->get_option( 'header_main_menu' ) === 'on';

$icons_no       = 0;
$header_tools   = apollo13framework_get_header_toolbar($icons_no);
if(!$icons_no){
    $header_classes .= ' no-tools';
}
else{
    $header_classes .= ' tools-icons-'.$icons_no; //number of icons
}
if($apollo13framework_a13->get_option( 'header_center_content' ) === 'on'){
    $header_classes .= ' centered';
}
?>
<header id="header" class="<?php echo esc_attr($header_classes); ?>"<?php apollo13framework_schema_args( 'header' ); ?>>
    <div class="head">
        <div class="logo-container"<?php apollo13framework_schema_args('logo'); ?>><?php apollo13framework_header_logo(); ?></div>

        <?php if($menu_on): ?>
        <nav id="access" class="navigation-bar"<?php apollo13framework_schema_args('navigation'); ?>>
            <?php apollo13framework_header_menu(); ?>
        </nav><!-- #access -->
        <?php endif; ?>

        <?php echo wp_kses_post( $header_tools );//escaped layout part ?>

        <?php echo apollo13framework_header_search(); ?>
    </div>
</header>
