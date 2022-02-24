<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $source
 * @var $text
 * @var $link
 * @var $google_fonts
 * @var $font_container
 * @var $el_class
 * @var $el_id
 * @var $css
 * @var $css_animation
 * @var $font_container_data - returned from $this->getAttributes
 * @var $google_fonts_data - returned from $this->getAttributes
 * @var $letter_spacing - added by Apollo13 team
 * @var $enable_typed - added by Apollo13 team
 * @var $loop_typed - added by Apollo13 team
 * @var $enable_fit - added by Apollo13 team
 * @var $fit_compress - added by Apollo13 team
 * @var $fit_min_font_size - added by Apollo13 team
 * @var $fit_max_font_size - added by Apollo13 team
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Custom_heading
 */
$source = $text = $link = $google_fonts = $font_container = $el_id = $el_class = $css = $css_animation = $font_container_data = $google_fonts_data = '';
$letter_spacing = $enable_typed = $loop_typed = $enable_fit = $fit_compress = $fit_min_font_size = $fit_max_font_size = $extra_attr = '';
// This is needed to extract $font_container_data and $google_fonts_data
extract( $this->getAttributes( $atts ) );

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'waypoints' );

if( $enable_typed ){
	$el_class .= ' a13-typed';
}

$loop_typed = $loop_typed ? 1 : 0;
/**
 * @var $css_class
 */
extract( $this->getStyles( $el_class . $this->getCSSAnimation( $css_animation ), $css, $google_fonts_data, $font_container_data, $atts ) );

$settings = get_option( 'wpb_js_google_fonts_subsets' );
if ( is_array( $settings ) && ! empty( $settings ) ) {
	$subsets = '&subset=' . implode( ',', $settings );
} else {
	$subsets = '';
}

if ( ( ! isset( $atts['use_theme_fonts'] ) || 'yes' !== $atts['use_theme_fonts'] ) && isset( $google_fonts_data['values']['font_family'] ) ) {
	wp_enqueue_style( 'vc_google_fonts_' . vc_build_safe_css_class( $google_fonts_data['values']['font_family'] ), '//fonts.googleapis.com/css?family=' . $google_fonts_data['values']['font_family'] . $subsets );
}
if ( $letter_spacing != '' ){
	$styles[] = 'letter-spacing: '.$letter_spacing.'px;';
}

if ( ! empty( $styles ) ) {
	$style = 'style="' . esc_attr( implode( ';', $styles ) ) . '"';
} else {
	$style = '';
}
if( $enable_typed ){
	//format text for type effect
	$text_start = '{write}';
	$text_end = '{/write}';
	$write_blocks = array();

	$texts_typed   = explode( $text_start, $text );
	$text_index   = ( count( $texts_typed ) - 1 );
	if ( $text_index > 0 ) {
		for ( $y = 1; $y <= $text_index; $y ++ ) {
			$to_type     = explode( $text_end, $texts_typed[ $y ] );
			$write_blocks[] = $to_type[0];
		}
	}




	foreach( $write_blocks as $write_block){
		$junks = explode('|',$write_block,3);
		$typed_style = '';
		$typed_color = $junks[0];
		$typed_bg_color = $junks[1];
		if( $typed_color != ''){
			$typed_style .= 'color:'.$typed_color.';';
		}
		if( $typed_bg_color != ''){
			$typed_style .= 'background-color:'.$typed_bg_color.';';
		}
		if( $typed_style != ''){
			$typed_style = 'style="'.$typed_style.'"';
		}
		$sentences = explode('|',$junks[2]);
		$tmp = '';
		foreach( $sentences as $sentence ){
			$tmp .= '<span>'.$sentence.'</span>';
		}
		$text = str_replace('{write}'.$write_block.'{/write}','<span class="a13-to-type" data-loop="'.$loop_typed.'"><span class="sentences-to-type">'.$tmp.'</span><span class="typing-area" '.$typed_style.'></span></span>',$text);
	}
}

if ( $enable_fit ) {
	$css_class .= ' a13-fit_text';
	$extra_attr .= ' data-compress="' . ( ( $fit_compress != '' && (float) $fit_compress  > 0 ) ? $fit_compress : '1' ) . '"';
	if($fit_min_font_size != ''){
		$extra_attr .= ' data-min-font-size="'.(float)$fit_min_font_size.'"';
	}
	if($fit_max_font_size != ''){
		$extra_attr .= ' data-max-font-size="'.(float)$fit_max_font_size.'"';
	}
}

if ( 'post_title' === $source ) {
	$text = get_the_title( get_the_ID() );
}

if ( ! empty( $link ) ) {
	$link = vc_build_link( $link );
	$text = '<a href="' . esc_url( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . '>' . $text . '</a>';
}
$wrapper_attributes = array();
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
$output = '';
if ( apply_filters( 'vc_custom_heading_template_use_wrapper', false ) ) {
	$output .= '<div class="' . esc_attr( $css_class ) . '" ' . implode( ' ', $wrapper_attributes ) . '>';
	$output .= '<' . $font_container_data['values']['tag'] . ' ' . $style . ' >';
	$output .= $text;
	$output .= '</' . $font_container_data['values']['tag'] . '>';
	$output .= '</div>';
} else {
	$output .= '<' . $font_container_data['values']['tag'] . ' ' . $style . ' ' . $extra_attr . ' class="' . esc_attr( $css_class ) . '" ' . implode( ' ', $wrapper_attributes ) . '>';
	$output .= $text;
	$output .= '</' . $font_container_data['values']['tag'] . '>';
}

echo $output;
