<?php

/*** Navigation Styling **/
function jeg_customize_style($wp_customize) 
{
	new Jeg_Customizer_Framework(array(
		'name'			=> 'jeg_styling',
		'title'			=> 'Switch Style',
		'priority' 		=> 18,
		'description'	=> 'Style themes style'
	), array(
		
		array(
			'type' 		=> 'select',
			'name' 		=> 'switch_style',
			'title' 	=> 'Switch Style',
			'transport'	=> 'refresh',
			'default' 	=> 'center',
			'choices'	=> array(
				'clean'		=> 'Clean Style',
				'hotel'		=> 'Clean Style for Hotel',
				'flat'		=> 'Flat Style',
				'dark'		=> 'Dark Style',
			)
		),
		
	), $wp_customize);	
}