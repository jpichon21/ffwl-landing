<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $onclick
 * @var $custom_links
 * @var $custom_links_target
 * @var $img_size
 * @var $images
 * @var $el_class
 * @var $el_id
 * @var $mode
 * @var $slides_per_view
 * @var $wrap
 * @var $autoplay
 * @var $hide_pagination_control
 * @var $hide_prev_next_buttons
 * @var $speed
 * @var $partial_view
 * @var $css
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_images_carousel
 */
$title = $onclick = $custom_links = $custom_links_target =
$img_size = $images = $el_class = $el_id = $mode = $slides_per_view =
$wrap = $autoplay = $hide_pagination_control =
$hide_prev_next_buttons = $speed = $partial_view = $css = $css_animation = '';

$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$gal_images = '';
$link_start = '';
$link_end = '';
$el_start = '';
$el_end = '';
$slides_wrap_start = '';
$slides_wrap_end = '';
$pretty_rand = 'link_image' === $onclick ? ' data-rel="prettyPhoto[rel-' . get_the_ID() . '-' . rand() . ']"' : '';
$image_allowed_tags =
	array( 'img' => array(
		'src' => array(),
		'alt' => array(),
		'class' => array(),
		'width' => array(),
		'height' => array(),
	) );

//this fixes issues in front editor, where carousel is "coded in"
if( vc_is_page_editable() ){
	wp_enqueue_script( 'vc_carousel_js' );
}

wp_enqueue_script('jquery-owl-carousel');
wp_enqueue_style('jquery-owl-carousel');

if ( 'link_image' === $onclick ) {
	wp_enqueue_script( 'prettyphoto' );
	wp_enqueue_style( 'prettyphoto' );
}

if ( '' === $images ) {
	$images = '-1,-2,-3';
}

if ( 'custom_link' === $onclick ) {
	$custom_links = vc_value_from_safe( $custom_links );
	$custom_links = explode( ',', $custom_links );
}

$images = explode( ',', $images );
$i = - 1;

$class_to_filter = 'wpb_images_carousel wpb_content_element vc_clearfix';
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$carousel_id = 'vc_images-carousel-' . WPBakeryShortCode_VC_images_carousel::getCarouselIndex();
$wrapper_attributes = array();
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
?>
<div <?php echo implode( ' ', $wrapper_attributes ); ?> class="<?php echo esc_attr( apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $css_class, $this->settings['base'], $atts ) ); ?>">
	<div class="wpb_wrapper">
		<?php echo wpb_widget_title( array( 'title' => $title, 'extraclass' => 'wpb_gallery_heading' ) ) ?>
		<div id="<?php echo esc_attr($carousel_id); ?>"

		     data-interval="<?php echo esc_attr( $autoplay == '1' ? $interval : 0 ) ?>"
		     data-autoplay="<?php echo esc_attr( $autoplay == '1' ? 1 : 0 ) ?>"
		     data-speed="<?php echo esc_attr($speed); ?>"
		     data-wrap="<?php echo esc_attr( $wrap == '1' ? 1 : 0 ) ?>"
		     data-scroll="<?php echo esc_attr($scroll); ?>"
		     data-hide_nav="<?php echo esc_attr($hide_prev_next_buttons); ?>"
		     data-hide_pag="<?php echo esc_attr($hide_pagination_control); ?>"
		     data-per_view="<?php echo esc_attr($slides_per_view); ?>"
		     class="vc-slide vc-carousel a13_images_carousel">
			<!-- Wrapper for slides -->
			<div class="vc_carousel-inner">
				<div class="vc_carousel-slideline">
					<div class="vc_carousel-slideline-inner owl-carousel owl-theme">
						<?php foreach ( $images as $attach_id ) :  ?>
							<?php
							$i ++;
							if ( $attach_id > 0 ) {
								$post_thumbnail = wpb_getImageBySize( array(
										'attach_id' => $attach_id,
										'thumb_size' => $img_size,
								) );
							} else {
								$post_thumbnail = array();
								$post_thumbnail['thumbnail'] = '<img src="' . vc_asset_url( 'vc/no_image.png' ) . '" />';
								$post_thumbnail['p_img_large'][0] = vc_asset_url( 'vc/no_image.png' );
							}
							$thumbnail = $post_thumbnail['thumbnail'];
							?>
							<div class="vc_item">
								<div class="vc_inner">
									<?php if ( 'link_image' === $onclick ) :  ?>
										<?php $p_img_large = $post_thumbnail['p_img_large']; ?>
										<a class="prettyphoto" href="<?php echo esc_url($p_img_large[0]); ?>" <?php echo $pretty_rand; ?>>
											<?php echo wp_kses( $thumbnail, $image_allowed_tags ); ?>
										</a>
									<?php elseif ( 'custom_link' === $onclick && isset( $custom_links[ $i ] ) && '' !== $custom_links[ $i ] ) :  ?>
										<a href="<?php echo esc_url($custom_links[ $i ]); ?>"<?php echo( ! empty( $custom_links_target ) ? ' target="' . esc_attr($custom_links_target) . '"' : '' ) ?>>
											<?php echo wp_kses( $thumbnail, $image_allowed_tags  ); ?>
										</a>
									<?php else : ?>
										<?php echo wp_kses( $thumbnail, $image_allowed_tags ); ?>
									<?php endif ?>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
