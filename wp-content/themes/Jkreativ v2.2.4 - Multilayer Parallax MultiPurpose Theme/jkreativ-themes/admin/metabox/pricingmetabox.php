<?php

return array(
    'id'          => 'jkreativ_pricing',
    'types'       => array('pricing'),
    'title'       => 'Jkreativ Pricing Detail',
    'priority'    => 'low',
    'template'    => array(
        array(
            'type' => 'toggle',
            'name' => 'highlight',
            'label' => 'Highlight this pricing',
            'default' => '0',
        ),
        array(
            'type' => 'textbox',
            'name' => 'subtitle',
            'label' => 'Hightlight Subtitle',
            'description' => 'example : Popular Product',
            'dependency' => array(
                'field'    => 'highlight',
                'function' => 'vp_dep_boolean',
            ),
        ),


        array(
            'type' => 'textbox',
            'name' => 'price',
            'label' => 'Price',
        ),
        array(
            'type' => 'textbox',
            'name' => 'pricesign',
            'label' => 'Price Sign',
            'description' => 'Example : $',
        ),
        array(
            'type' => 'textbox',
            'name' => 'pricerange',
            'label' => 'Price Range',
            'description' => 'Per Month'
        ),


        array(
            'type'      => 'group',
            'repeating' => true,
            'length'    => 1,
            'name'      => 'feature',
            'title'     => 'Pricing Feature',
            'fields'    => array(
                array(
                    'type' => 'textbox',
                    'name' => 'title',
                    'label' => 'Title'
                ),
            ),
        ),


        array(
            'type' => 'toggle',
            'name' => 'showbutton',
            'label' => 'Show Button',
            'default' => '0',
        ),
        array(
            'type'      => 'group',
            'repeating' => false,
            'length'    => 1,
            'name'      => 'button',
            'title'     => 'Pricing Button',
            'fields'    => array(
                array(
                    'type' => 'textbox',
                    'name' => 'url',
                    'label' => 'Button URL'
                ),
                array(
                    'type' => 'textbox',
                    'name' => 'title',
                    'label' => 'Button Title'
                ),
            ),
            'dependency' => array(
                'field'    => 'showbutton',
                'function' => 'vp_dep_boolean',
            ),
        ),
    ),
);