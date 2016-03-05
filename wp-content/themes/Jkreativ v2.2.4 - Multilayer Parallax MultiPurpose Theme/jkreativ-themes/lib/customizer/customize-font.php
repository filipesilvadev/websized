<?php

/*** Navigation Styling **/
function jeg_customize_font($wp_customize) 
{	
	$googlefont = jeg_get_google_font();
	new Jeg_Customizer_Framework(array(
		'name'			=> 'jeg_font',
		'title'			=> 'Font Switcher',
		'priority' 		=> 21,
		'description'	=> 'Switch themes font'
	), array(
		array(
			'type' 		=> 'select',
			'name' 		=> 'first_font',
			'title' 	=> 'First section font',
			'transport'	=> 'postMessage',
			'default' 	=> null,
			'choices'	=> $googlefont
		),
		array(
			'type' 		=> 'select',
			'name' 		=> 'second_font',
			'title' 	=> 'Second section font',
			'transport'	=> 'postMessage',
			'default' 	=> null,
			'choices'	=> $googlefont
		),
		array(
			'type' 		=> 'select',
			'name' 		=> 'third_font',
			'title' 	=> 'Third section font',
			'transport'	=> 'postMessage',
			'default' 	=> null,
			'choices'	=> $googlefont
		),
		
	), $wp_customize);	
}