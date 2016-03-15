<?php
/**
 * @package MegaMain
 * @subpackage MegaMain
 * @since mm 1.0
 */

    function mmpm_menu_options_array(){
        /* Additional styles */
        $additional_styles_presets = mmpm_get_option( 'additional_styles_presets' );
        unset( $additional_styles_presets['0'] );
        $additional_styles[ __( 'Default', MMPM_TEXTDOMAIN_ADMIN ) ] = 'default_style';
        if ( is_array( $additional_styles_presets ) ) {
            foreach ( $additional_styles_presets as $key => $value) {
                $additional_styles[ $key . '. ' . $value['style_name'] ] = 'additional_style_' . $key;
            }
        }
        /* Submenu types */
        $number_of_widgets = mmpm_get_option( 'number_of_widgets', '1' );
        if ( is_numeric( $number_of_widgets ) ) {
            for ( $i=1; $i <= $number_of_widgets; $i++ ) { 
                $submenu_widgets[ __( 'Widgets area ', MMPM_TEXTDOMAIN_ADMIN ) . $i ] = MMPM_PREFIX . '_menu_widgets_area_' . $i;
            }
        }
        $submenu_types = array(
            __( 'Standard Dropdown', MMPM_TEXTDOMAIN_ADMIN ) => 'default_dropdown',
            __( 'Multicolumn Dropdown', MMPM_TEXTDOMAIN_ADMIN ) => 'multicolumn_dropdown',
        );
        /* options */
        $options = array(
                array(
                    'descr' => __( 'Icon of This item', MMPM_TEXTDOMAIN_ADMIN ),
                    'key' => 'item_icon',
                    'type' => 'icons',
                ),
                array(
                    'key' => 'disable_icon',
                    'type' => 'checkbox',
                    'values' => array(
                        __( 'Hide Icon of This Item', MMPM_TEXTDOMAIN_ADMIN ) => 'true',
                    ),
                ),
                array(
                    'key' => 'disable_text',
                    'type' => 'checkbox',
                    'values' => array(
                        __( 'Hide Text of This Item', MMPM_TEXTDOMAIN_ADMIN ) => 'true',
                    ),
                ),
                array(
                    'key' => 'disable_link',
                    'type' => 'checkbox',
                    'values' => array(
                        __( 'Disable Link', MMPM_TEXTDOMAIN_ADMIN ) => 'true',
                    ),
                ),
                array(
                    'name' => __( 'Options of Dropdown', MMPM_TEXTDOMAIN_ADMIN ),
                    'descr' => __( 'Submenu Type', MMPM_TEXTDOMAIN_ADMIN ),
                    'key' => 'submenu_type',
                    'type' => 'select',
                    'values' => $submenu_types,
                    'dependency' => array(
                        'element' => array( 
                            'submenu_post_type', 
                        ),
                        'value' => 'post_type_dropdown',
                    ),

               ),
                array(
                    'key' => 'submenu_post_type',
                    'descr' => __( 'Post Type For Display In Dropdown', MMPM_TEXTDOMAIN_ADMIN ),
                    'type' => 'select',
                    'values' => mmpm_get_all_taxonomies(),
                ),
                array(
                    'key' => 'submenu_drops_side',
                    'descr' => __( 'Side of dropdown elements', MMPM_TEXTDOMAIN_ADMIN ),
                    'type' => 'select',
                    'values' => array(
                        __( 'Drop To Right Side', MMPM_TEXTDOMAIN_ADMIN ) => 'drop_to_right',
                    ),
                ),
                array(
                    'descr' => __( 'Submenu Columns (Not For Standard Drops)', MMPM_TEXTDOMAIN_ADMIN ),
                    'key' => 'submenu_columns',
                    'type' => 'select',
                    'values' => range(1, 5),
                ),
				array(
                    'descr' => __( 'Additional Right Padding', MMPM_TEXTDOMAIN_ADMIN ),
                    'key' => 'submenu_additional_right_margin',
                    'type' => 'number',
					'min' => 10,
					'max' => 200,
					'units' => 'px',
					'default' => 10,
                ),
                
				array(
                    'descr' => __( 'Additional Bottom Padding', MMPM_TEXTDOMAIN_ADMIN ),
                    'key' => 'submenu_additional_bottom_margin',
                    'type' => 'number',
					'min' => 10,
					'max' => 200,
					'units' => 'px',
					'default' => 10,
                ),
                array(
                    'name' => __( 'Dropdown Background Image', MMPM_TEXTDOMAIN_ADMIN ),
                    'descr' => __( '', MMPM_TEXTDOMAIN_ADMIN ),
                    'key' => 'submenu_bg_image',
                    'type' => 'background_image',
                    'default' => '',
                ),
        );

        if ( count( $additional_styles ) > 1 ) {
            array_unshift( 
                $options, 
                array(
                    'descr' => __( 'Style of This Item', MMPM_TEXTDOMAIN_ADMIN ),
                    'key' => 'item_style',
                    'type' => 'select',
                    'values' => $additional_styles,
                    'default' => 'default',
                )
            );
        }

        return $options;
    }
?>