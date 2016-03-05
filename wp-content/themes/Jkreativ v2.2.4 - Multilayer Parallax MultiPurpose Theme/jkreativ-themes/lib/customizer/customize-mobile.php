<?php

/*** Navigation Styling **/
function jeg_customize_mobile($wp_customize)
{
	new Jeg_Customizer_Framework(array(
		'name'			=> 'jeg_mobile',
		'title'			=> 'Navigation - Mobile',
		'priority' 		=> 25,
		'description'	=> 'Please resize your window to see mobile navigation element'
	), array(
		array(
			'type' 		=> 'newupload',
			'name' 		=> 'mobile_nav_logo_image',
			'title' 	=> 'Mobile logo',
			'transport'	=> 'postMessage',
			'default' 	=> get_template_directory_uri() . '/public/img/logo.png',
		),
		array(
			'type' 		=> 'newupload',
			'name' 		=> 'mobile_nav_logo_image_retina',
			'title' 	=> 'Mobile logo Retina',
			'transport'	=> 'postMessage',
			'default' 	=> get_template_directory_uri() . '/public/img/logo@2x.png',
		),

		array(
			'type' 		=> 'color',
			'name' 		=> 'mobile_nav_bg_color',
			'title' 	=>  'Mobile navigation background color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),

		array(
			'type' 		=> 'color',
			'name' 		=> 'mobile_nav_icon_color',
			'title' 	=>  'Mobile navigation icon color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),

		// search
		array(
			'type' 		=> 'flag',
			'name' 		=> 'mobile_nav_search_flag',
			'title' 	=>  'Mobile navigation search',
		),
		array(
			'type' 		=> 'checkbox',
			'name' 		=> 'mobile_nav_show_search',
			'title' 	=> 'Show Search',
			'transport'	=> 'postMessage',
			'default' 	=> true
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mobile_nav_search_bg_color',
			'title' 	=> 'Search background color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mobile_nav_search_text_color',
			'title' 	=> 'Search text color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mobile_nav_search_icon_color',
			'title' 	=> 'Search close icon color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),


		array(
			'type' 		=> 'flag',
			'name' 		=> 'mobile_nav_col_flag',
			'title' 	=>  'Collapsible Navigation',
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mobile_nav_col_bg_color',
			'title' 	=> 'Background Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mobile_nav_col_menu_color',
			'title' 	=> 'Heading Menu color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mobile_nav_col_list_bg',
			'title' 	=> 'Normal - Menu list background',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mobile_nav_col_list_color',
			'title' 	=> 'Normal - Menu list color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mobile_nav_col_list_border_top',
			'title' 	=> 'Normal - Menu border top color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mobile_nav_col_list_border_bottom',
			'title' 	=> 'Normal - Menu border bottom color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),


		array(
			'type' 		=> 'color',
			'name' 		=> 'mobile_nav_col_list_bg_hovered',
			'title' 	=> 'Hover - Menu list background',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mobile_nav_col_list_color_hovered',
			'title' 	=> 'Hover - Menu list color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mobile_nav_col_list_border_top_hovered',
			'title' 	=> 'Hover - Menu border top color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mobile_nav_col_list_border_bottom_hovered',
			'title' 	=> 'Hover - Menu border bottom color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'mobile_nav_col_list_border_left_hovered',
			'title' 	=> 'Hover - Menu border left color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
	), $wp_customize);
}