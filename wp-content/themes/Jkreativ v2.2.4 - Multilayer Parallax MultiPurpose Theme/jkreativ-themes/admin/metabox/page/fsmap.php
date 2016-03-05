<?php

return array(
	'id'          => 'jkreativ_page_fsmap',
	'types'       => array('page'),
    'include_template'  => array(
        'template/template-contact-full-map.php'
    ),
	'title'       => 'Jkreativ Fullscreen Map Contact',
	'priority'    => 'high',
	'template'    => array(
		
		 array(
	        'type' => 'notebox',
	        'name' => 'nb1',
	        'label' => 'Info',
	        'description' => 'Put your content (including with contact form on textbox above)',
	        'status' => 'info',
	    ),
	    		
		array(
			'type' => 'slider',
			'name' => 'mapzoom',
			'label' => 'Map zoom level',
			'description' => 'zoom level on map (only applicable if you are only having 1 (one) map locatoin)',
			'min' => '1',
	        'max' => '20',
	        'step' => '1',
	        'default' => '14',
		),
		
		
		array(
			'type'      => 'group',
			'repeating' => true,
			'sortable'  => true,
			'name'      => 'location',
			'title'     => 'Location item',
			'fields'    => array(		
				array(
			        'type' => 'notebox',
			        'name' => 'nb2',
			        'label' => 'How To find Maps Coordinate',
			        'description' => 'To find Map coordinate,  <br>  > go to <a target="_blank" href="http://maps.google.com">http://maps.google.com</a> <br>  > find where you want to locate your map  <br>  > right mouse click on those position  <br>  >  click what\'s here > click on green arrow  <br>  > copy first line to x coordinate, and second to y coordinate',
			        'status' => 'success',
			    ),
				array(
					'type' => 'textbox',
					'name' => 'x',
					'label' => 'X Coordinate',
					'description' => 'ex : 42.228517',
				),
				array(
					'type' => 'textbox',
					'name' => 'y',
					'label' => 'Y Coordinate',				
					'description' => 'ex : -102.757874‎',					
				),		
				array(
					'type' => 'textbox',
					'name' => 'title_leading',
					'label' => 'Title Leading',
					'description' => 'Title leading, ex : Main Branch',
				),
				array(
					'type' => 'textbox',
					'name' => 'title',
					'label' => 'Title',
					'description' => 'Your address main title, ex : New York Studio',
				),
				array(
					'type' => 'textbox',
					'name' => 'address',
					'label' => 'Address First line',					
				),
				array(
					'type' => 'textbox',
					'name' => 'address_second',
					'label' => 'Address Second line',					
				),
				array(
					'type' => 'textbox',
					'name' => 'phone',
					'label' => 'Phone Number',					
				),
				array(
					'type' => 'textbox',
					'name' => 'email',
					'label' => 'Email address',					
				),
				array(
					'type' => 'textbox',
					'name' => 'website',
					'label' => 'Website URL',					
				),
			),
		),
		
		
	),
);