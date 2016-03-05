<?php

/*** Navigation Styling **/
function jeg_customize_footer($wp_customize) 
{
	new Jeg_Customizer_Framework(array(
		'name'			=> 'jeg_customize_footer',
		'title'			=> 'Footer Landing',
		'priority' 		=> 27,
		'description'	=> 'if you enabling footer landing, you can customize color of it from here'
	), array(		
				
		array(
			'type' 		=> 'color',
			'name' 		=> 'footer_background',
			'title' 	=>  'Footer Background',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'footer_text_color',
			'title' 	=>  'Footer Text Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'footer_heading_color',
			'title' 	=> 'Footer Heading Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'footer_link_color',
			'title' 	=>  'Footer Link Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'footer_hover_color',
			'title' 	=>  'Fiiter link hover color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'footer_copyright_background',
			'title' 	=>  'Footer copyright Background',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		array(
			'type' 		=> 'color',
			'name' 		=> 'footer_copyright_color',
			'title' 	=>  'Footer Copyright Color',
			'transport'	=> 'postMessage',
			'default' 	=> null,
		),
		
	), $wp_customize);	
}