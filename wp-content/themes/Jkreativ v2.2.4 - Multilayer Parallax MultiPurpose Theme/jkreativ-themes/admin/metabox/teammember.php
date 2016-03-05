<?php

return array(
    'id'          => 'jkreativ_team',
    'types'       => array('team'),
    'title'       => 'Jkreativ Team Member Detail',
    'priority'    => 'low',
    'template'    => array(
        array(
            'type' => 'textbox',
            'name' => 'position',
            'label' => 'Team Member Subtitle',
        ),
        array(
            'type' => 'imageupload',
            'name' => 'image',
            'label' => 'Team Member Image',
            'description' => 'Team Member Potrait Image',
        ),
        array(
            'type' => 'textarea',
            'name' => 'description',
            'label' => 'Description',
            'description' => 'Team Member Short Description',
        ),
        array(
            'type'      => 'group',
            'repeating' => true,
            'length'    => 1,
            'name'      => 'social',
            'title'     => 'Team Member Social',
            'fields'    => array(
                array(
                    'type' => 'textbox',
                    'name' => 'socialname',
                    'label' => 'Social Name',
                    'description' => 'ex : facebook, twitter, Linkedin, etc'
                ),
                array(
                    'type' => 'textbox',
                    'name' => 'socialurl',
                    'label' => 'Social URL',
                ),
            ),
        ),
    ),
);