<?php
/**
 * Class A13FRAMEWORK_top_bar_menu_walker
 * Used in top bar of horizontal header
 */
class A13FRAMEWORK_top_bar_menu_walker extends Walker_Nav_Menu {

	/**
	 * @see   Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string       $output Passed by reference. Used to append additional content.
	 * @param object       $item   Menu item data object.
	 * @param int          $depth  Depth of menu item. Used for padding.
	 * @param array|object $args
	 * @param int          $id     Menu item ID.
	 */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        //check if this element is a OnePage Navigation Pointer
        $is_nava = $item->object === 'nava';
        if( $is_nava ){
            $home_page_id = get_option('page_on_front');
            $frontpage = get_post( $home_page_id );

            $current_page_slug = $wp_query->post->post_name;
            $nava_page_slug = get_post_meta( $item->object_id, 'a13_nava_page_slug', true );
            $nava_item_anchor = str_replace(' ', '_', $item->title);
            $classes[] = 'a13_one_page';

            //it is on different page - absolute path
            if( $nava_page_slug != $current_page_slug ){
                //if nava leads to front-page
                if( $nava_page_slug == $frontpage->post_name ){
                    $url = get_home_url();
                }
                //it is on sub-page
                else{
                    $url = get_site_url(null, $nava_page_slug);
                }
                $item->url = $url.'/#'.$nava_item_anchor;
            }
            //it is on current page - just anchor
            else{
                $item->url = '#'.$nava_item_anchor;
            }
        }

        $icon = trim( $item->a13_item_icon );
        $name = apply_filters( 'the_title', $item->title, $item->ID );


        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';


        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_url( $item->url        ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= strlen($icon)? '<i class="fa fa-'.$icon.'"></i>' : '';
        $item_output .= strlen(trim($name))? ($args->link_before . $name . $args->link_after) : '';
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}