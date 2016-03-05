<?php

/*** Navigation Styling **/
function jeg_customize_loader($wp_customize) 
{
	new Jeg_Customizer_Framework(array(
		'name'			=> 'jeg_loader',
		'title'			=> 'Loader Setup',
		'priority' 		=> 21,
		'description'	=> 'Choose loader setup for this page, Live preview will only work if you not overwrite option on single page'
	), array(
		array(
			'type' 		=> 'radio',
			'name' 		=> 'loader_general',
			'title' 	=> 'General setting for page loader',
			'transport'	=> 'refresh',
			'default' 	=> 'none',
			'choices'	=> array(
				'none'			=> 'None',
				'linear'		=> 'Linear',
				'circle'		=> 'Circle',
				'linearinline'	=> 'Inner Linear (youtube style)'
			)
		),
		
		array(
			'type' 		=> 'newupload',
			'name' 		=> 'circle_loader_image',
			'title' 	=>  'Circle Loader Logo (270x270px)',
			'transport' => 'refresh',
			'default' 	=> get_template_directory_uri() . '/public/img/logo_loading.png'
		),
		
		array(
			'type' 		=> 'newupload',
			'name' 		=> 'circle_loader_retina',
			'title' 	=> 'Retina circle Loader Logo (540x540px)',
			'transport' => 'refresh',
			'default' 	=> get_template_directory_uri() . '/public/img/logo_loading@2x.png'
		),

        array(
            'type' 		=> 'color',
            'name' 		=> 'linear_text_color',
            'title' 	=> 'Text color for linear loader',
            'transport'	=> 'refresh',
            'default' 	=> null
        ),

		array(
			'type' 		=> 'color',
			'name' 		=> 'linear_color',
			'title' 	=> 'Loader Color (for linear line and circle loader)',
			'transport'	=> 'refresh',
			'default' 	=> null
		),

        array(
            'type' 		=> 'color',
            'name' 		=> 'loader_background',
            'title' 	=> 'Loader background (for linear & cirlce)',
            'transport'	=> 'refresh',
            'default' 	=> null
        ),
		
	), $wp_customize);	
}