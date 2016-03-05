<?php
/***
 * @author jegbagus
 */

/** register support for wordpress menu **/
add_action('after_setup_theme', 'jeg_register_menu');

function jeg_register_menu() {
	add_theme_support( 'menus' );
	if(function_exists('register_nav_menu')):
		if(function_exists('is_woocommerce')) {
			register_nav_menus(array(
				'side_navigation' => 'Side Navigation',
				'side_btm_navigation' => 'Side Navigation Bottom',
				'top_navigation' => 'Top Navigation',
				'mobile_navigation' => 'Mobile Navigation',
				'account_navigation' => 'Account Navigation',
			));
		} else {
			register_nav_menus(array(
				'side_navigation' => 'Side Navigation',
				'side_btm_navigation' => 'Side Navigation Bottom',
				'top_navigation' => 'Top Navigation',
				'mobile_navigation' => 'Mobile Navigation',
			));
		}

	endif;
};

/******************************************************************
 * mobile navigation
 ******************************************************************/


function jeg_mobile_navigation() {
	if(function_exists('wp_nav_menu')) {
		wp_nav_menu(
			array(
				'theme_location' => 'mobile_navigation',
				'container' => false,
				'menu_class' => '',
				'depth' => 3,
				'walker' => new jeg_mobile_navigation_walker(),
				'fallback_cb'     => ''
			)
		);
	}
}

class jeg_mobile_navigation_walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "";
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "";
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= "";
    }

	function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0)
	{
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$classes[] = 'bgnav';

		$additionalclass 	= ( $depth > 0 ) ? " childindent " : "";
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . $additionalclass .'"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$nav_description = ! empty($item->description) ? '<span>' . esc_attr( $item->description ) . '</span>' : '';

		$indent 	 = str_repeat("&nbsp;", $depth * 2);
		$dash 		 = ( $depth > 0 ) ? '— &nbsp;&nbsp;' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $indent . $dash . $args->link_before  . apply_filters( 'the_title', $item->title, $item->ID )  ;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args ) . '</li>';
	}
}


/******************************************************************
 * Top Navigation
 ******************************************************************/


function jeg_top_navigation() {
	if(function_exists('wp_nav_menu')) {
		wp_nav_menu(
			array(
				'theme_location' => 'top_navigation',
				'container' => 'div',
				'container_class' => 'navcontent',
				'menu_class' => '',
				'depth' => 3,
				'walker' => new jeg_top_navigation_walker(),
				'fallback_cb'     => ''
			)
		);
	}
}

class jeg_top_navigation_walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0)
	{
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$classes[] = 'bgnav';

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$nav_description = ! empty($item->description) ? '<span>' . esc_attr( $item->description ) . '</span>' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before  . apply_filters( 'the_title', $item->title, $item->ID )  ;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"childmenu\">\n";
	}
}


/******************************************************************
 * Side Navigation Bottom
 ******************************************************************/

function jeg_side_bottom_navigation() {
	if(function_exists('wp_nav_menu')) {
		wp_nav_menu(
			array(
				'theme_location' => 'side_btm_navigation',
				'container' => 'div',
				'container_class' => 'footlink',
				'menu_class' => '',
				'depth' => -1,
				'walker' => new jeg_side_btm_navigation_walker(),
				'fallback_cb'     => ''
			)
		);
	}
}

class jeg_side_btm_navigation_walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0)
	{
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$classes[] = 'bgnav';

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$nav_description = ! empty($item->description) ? '<span>' . esc_attr( $item->description ) . '</span>' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before  . apply_filters( 'the_title', $item->title, $item->ID )  ;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args ) . "</li><li class='separator'>&nbsp;";
	}
}



/******************************************************************
 * Main side navigation
 ******************************************************************/

function jeg_main_side_navigation() {
	if(function_exists('wp_nav_menu')) {
		wp_nav_menu(
			array(
				'theme_location' => 'side_navigation',
				'container' => 'div',
				'container_class' => 'mainnavigation',
				'menu_class' => 'mainnav',
				'depth' => 3,
				'walker' => new jeg_side_navigation_walker(),
				'fallback_cb'     => ''
			)
		);
	}
}

class jeg_side_navigation_walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0)
	{
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$classes[] = 'bgnav';

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$nav_description = ! empty($item->description) ? '<span>' . esc_attr( $item->description ) . '</span>' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . '<h2>' . apply_filters( 'the_title', $item->title, $item->ID ) . '</h2>' ;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"childmenu\">\n";
	}
}



/******************************************************************
 * Account Navigation
 ******************************************************************/

function jeg_account_navigation() {
	if(function_exists('wp_nav_menu')) {
		wp_nav_menu(
			array(
				'theme_location' => 'account_navigation',
				'container' => false,
				'depth' => -1,
				'walker' => new jeg_account_navigation_walker(),
				'items_wrap'      => '%3$s',
				'fallback_cb'     => ''
			)
		);
	}
}

class jeg_account_navigation_walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0)
	{
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$classes[] = 'bgnav';

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$nav_description = ! empty($item->description) ? '<span>' . esc_attr( $item->description ) . '</span>' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before  . apply_filters( 'the_title', $item->title, $item->ID )  ;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
