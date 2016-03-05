<?php

/*** Navigation Styling **/
function jeg_customize_nav($wp_customize) 
{
	new Jeg_Customizer_Framework(array(
		'name'			=> 'jeg_navigation',
		'title'			=> 'Navigation Position',
		'priority' 		=> 20,
		'description'	=> 'Choose navigation option right here. Live preview will only work if you not overwrite option on single page'
	), array(
		array(
			'type' 		=> 'radio',
			'name' 		=> 'default_navigation',
			'title' 	=> 'Navigation',
			'transport'	=> 'refresh',
			'default' 	=> 'side',
			'choices'	=> array(
				'side'		        => 'Side Navigation',
				'top'		        => 'Top Navigation',
                'transparent'		=> 'Transparent Top Navigation',
			)
		),

        /*** side navigation **/
		array(
			'type' 		=> 'checkbox',
			'name' 		=> 'default_collapse_navigator',
			'title' 	=> 'Collapse Navigator',
			'transport'	=> 'refresh',
			'default' 	=> false
		),
		
		array(
			'type' 		=> 'checkbox',
			'name' 		=> 'default_menuheader_navigator',
			'title' 	=> 'Show top menu navigator',
			'transport'	=> 'refresh',
			'default' 	=> true
		),


        /*** top navigation **/
		array(
			'type' 		=> 'checkbox',
			'name' 		=> 'centering_top_navigator',
			'title' 	=> 'Put Navigator on narrow size',
			'transport'	=> 'refresh',
			'default' 	=> false
		),
		
		array(
			'type' 		=> 'checkbox',
			'name' 		=> 'twoline_top_navigator',
			'title' 	=> 'Use two line top navigation',
			'transport'	=> 'refresh',
			'default' 	=> false
		),
		
		array(
			'type' 		=> 'checkbox',
			'name' 		=> 'smaller_navigator',
			'title' 	=> 'Make menu smaller when scrolling',
			'transport'	=> 'refresh',
			'default' 	=> false
		),

        array(
            'type' 		=> 'checkbox',
            'name' 		=> 'boxed_content',
            'title' 	=> 'Boxed Content',
            'transport'	=> 'refresh',
            'default' 	=> false
        ),


        /*** top navigation transparent **/
        array(
            'type' 		=> 'checkbox',
            'name' 		=> 'centering_top_navigator_transparent',
            'title' 	=> 'Put Navigator on narrow size',
            'transport'	=> 'refresh',
            'default' 	=> false
        ),

        array(
            'type' 		=> 'checkbox',
            'name' 		=> 'smaller_navigator_transparent',
            'title' 	=> 'Make menu smaller when scrolling',
            'transport'	=> 'refresh',
            'default' 	=> false
        ),

        array(
            'type' 		=> 'checkbox',
            'name' 		=> 'boxed_content_transparent',
            'title' 	=> 'Boxed Content',
            'transport'	=> 'refresh',
            'default' 	=> false
        ),

	), $wp_customize);	
}