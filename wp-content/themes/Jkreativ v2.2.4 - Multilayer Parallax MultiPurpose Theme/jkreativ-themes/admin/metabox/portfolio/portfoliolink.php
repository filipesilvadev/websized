<?php

return array(
	'id'          => 'jkreativ_portfolio_link',
	'types'       => array(JEG_PORTFOLIO_POST_TYPE),
	'title'       => 'Jkreativ Portfolio to Another Page (Link)',
	'priority'    => 'high',
	'template'    => array(		
		
		array(
            'type' => 'textbox',
            'name' => 'portfolio_link',
            'label' => 'Link to another page',
        ),
		
		
	),
);