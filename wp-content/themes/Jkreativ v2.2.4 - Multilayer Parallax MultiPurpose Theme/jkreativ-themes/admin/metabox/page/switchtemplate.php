<?php

return array(
    'id'          => 'jkreativ_switch_template_notice',
    'types'       => array('page', 'portfolio'),
    'title'       => 'Jkreativ Switch Template & New Post Notice',
    'priority'    => 'high',
    'template'    => array(
        array(
            'type' => 'notebox',
            'name' => 'nb_position',
            'label' => 'All option for this template still hidden. Please follow bellow step to show all option available.',
            'status' => 'info',
            'description' => '<ul style="list-style: circle; margin-left: 10px;">
                <li><strong>NEW PAGE</strong> : please give title and save this page to show the option</li>
                <li><strong>SWITCHING TEMPLATE</strong>  : you will need to save this page first (click publish or save draft) to get all option available</li>
            </ul>'
        ),
    ),
);