<?php

/*** Navigation Styling **/
function jeg_customize_portfolio_list($wp_customize) 
{
	new Jeg_Customizer_Framework(array(
		'name'			=> 'jeg_portfolio_list',
		'title'			=> 'Portfolio - Portfolio List Page',
		'priority' 		=> 35,
		'description'	=> 'Style of portfolio list page'
	), array(
		
		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_pl_filter_flag',
			'title' 	=>  'Portfolio Filter (only if you are using top menu)',
		),		
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_filter_color',
			'title' 	=> 'Filter text color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_filter_bg',
			'title' 	=> 'Filter background color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_active_filter_color',
			'title' 	=> 'Active Filter text color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_active_filter_bg',
			'title' 	=> 'Active Filter background color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_filter_drop_color',
			'title' 	=> 'Drop filter text color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_filter_drop_hover_color',
			'title' 	=> 'Drop filter hovered text color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_filter_drop_bg',
			'title' 	=> 'Drop filter background',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		
		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_pl_filter_flag',
			'title' 	=>  'Portfolio Pinterest Style',
		),	
		
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_pin_border_color',
			'title' 	=> 'Border color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_pin_background',
			'title' 	=> 'Background Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_pin_title',
			'title' 	=> 'Title Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_pin_border',
			'title' 	=> 'Border line color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_pin_alt',
			'title' 	=> 'Category color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		
		array(
			'type' 		=> 'flag',
			'name' 		=> 'jeg_pl_paging_flag',
			'title' 	=>  'Portfolio Paging',
		),	
		
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_page_bg',
			'title' 	=> 'Background color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_page_text',
			'title' 	=> 'Text Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_page_dot',
			'title' 	=> 'Dot Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_page_dot_active',
			'title' 	=> 'Dot active color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'jeg_pl_page_line',
			'title' 	=> 'Line between page & dot color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		
	), $wp_customize);	
}