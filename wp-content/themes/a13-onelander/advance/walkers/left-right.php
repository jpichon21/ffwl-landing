<?php
/** @noinspection PhpIncludeInspection */
require_once( get_theme_file_path( 'advance/walkers/classic.php' ) );

/**
 * A13FRAMEWORK_menu_one_line_left_walker
 * Used in main menu for one line header
 */
class A13FRAMEWORK_menu_one_line_left_walker extends A13FRAMEWORK_menu_walker {
    /**
     * @param array $elements all menu items
     * @param int   $max_depth
     * @param mixed ...$args   Optional additional arguments.
     *
     * @return string items html
     */
    public function walk( $elements, $max_depth, ...$args ) {
        $number_of_root_elements = $this->get_number_of_root_elements($elements);
        //copy of source of parent::walk function

        $args = array_slice(func_get_args(), 2);
        $output = '';

        //invalid parameter or nothing to walk
        if ( $max_depth < -1 || empty( $elements ) ) {
            return $output;
        }

        $parent_field = $this->db_fields['parent'];

        // flat display
        if ( -1 == $max_depth ) {
            $empty_array = array();
            foreach ( $elements as $e )
                $this->display_element( $e, $empty_array, 1, 0, $args, $output );
            return $output;
        }

        /*
		 * Need to display in hierarchical order.
		 * Separate elements into two buckets: top level and children elements.
		 * Children_elements is two dimensional array, eg.
		 * Children_elements[10][] contains all sub-elements whose parent is 10.
		 */
        $top_level_elements = array();
        $children_elements  = array();
        foreach ( $elements as $e) {
            if ( empty( $e->$parent_field ) )
                $top_level_elements[] = $e;
            else
                $children_elements[ $e->$parent_field ][] = $e;
        }

        /*
		 * When none of the elements is top level.
		 * Assume the first one must be root of the sub elements.
		 */
        if ( empty($top_level_elements) ) {

            $first = array_slice( $elements, 0, 1 );
            $root = $first[0];

            $top_level_elements = array();
            $children_elements  = array();
            foreach ( $elements as $e) {
                if ( $root->$parent_field == $e->$parent_field )
                    $top_level_elements[] = $e;
                else
                    $children_elements[ $e->$parent_field ][] = $e;
            }
        }

        $current_index = 1;
        foreach ( $top_level_elements as $e ){
            if( $current_index <= ceil($number_of_root_elements/2) ){
                $this->display_element( $e, $children_elements, $max_depth, 0, $args, $output );
            }
            $current_index++;
        }

        return $output;
	}
}



/**
 * A13FRAMEWORK_menu_one_line_right_walker
 * Used in main menu for one line header
 */
class A13FRAMEWORK_menu_one_line_right_walker extends A13FRAMEWORK_menu_walker {
	/**
     * @param array $elements all menu items
     * @param int   $max_depth
     * @param mixed ...$args   Optional additional arguments.
     *
     * @return string items html
     */
    public function walk( $elements, $max_depth, ...$args ) {
        $number_of_root_elements = $this->get_number_of_root_elements($elements);
        //copy of source of parent::walk function

        $args = array_slice(func_get_args(), 2);
        $output = '';

        //invalid parameter or nothing to walk
        if ( $max_depth < -1 || empty( $elements ) ) {
            return $output;
        }

        $parent_field = $this->db_fields['parent'];

        // flat display
        if ( -1 == $max_depth ) {
            $empty_array = array();
            foreach ( $elements as $e )
                $this->display_element( $e, $empty_array, 1, 0, $args, $output );
            return $output;
        }

        /*
		 * Need to display in hierarchical order.
		 * Separate elements into two buckets: top level and children elements.
		 * Children_elements is two dimensional array, eg.
		 * Children_elements[10][] contains all sub-elements whose parent is 10.
		 */
        $top_level_elements = array();
        $children_elements  = array();
        foreach ( $elements as $e) {
            if ( empty( $e->$parent_field ) )
                $top_level_elements[] = $e;
            else
                $children_elements[ $e->$parent_field ][] = $e;
        }

        /*
		 * When none of the elements is top level.
		 * Assume the first one must be root of the sub elements.
		 */
        if ( empty($top_level_elements) ) {

            $first = array_slice( $elements, 0, 1 );
            $root = $first[0];

            $top_level_elements = array();
            $children_elements  = array();
            foreach ( $elements as $e) {
                if ( $root->$parent_field == $e->$parent_field )
                    $top_level_elements[] = $e;
                else
                    $children_elements[ $e->$parent_field ][] = $e;
            }
        }

        $current_index = 1;
        foreach ( $top_level_elements as $e ){
            if( $current_index > ceil($number_of_root_elements/2) ){
                $this->display_element( $e, $children_elements, $max_depth, 0, $args, $output );
            }
            $current_index++;
        }

        return $output;
	}
}