<?php
/**
* Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
*/


/* visual composer integration */
function jeg_vc_update(){
    if(function_exists('vc_set_as_theme')) {
        vc_set_as_theme();
    }

    if (class_exists('WPBakeryVisualComposerAbstract')) {
        locate_template(array('admin/vc/extend.php'), true, true);
        locate_template(array('admin/vc/view.php'), true, true);
        locate_template(array('admin/vc/element.php'), true, true);
        vc_set_default_editor_post_types(array('page', 'portfolio'));
    }
}

add_action( 'init' ,  'jeg_vc_update' , 2 );

