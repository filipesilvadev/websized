<?php

$joptionglobal = null;
function jeg_dashboard() {
    global $joptionglobal;

    locate_template(array('admin/data_sources.php'), true, true);
    $dashboard_option  = get_template_directory() . '/admin/option/main.php';
    $joptionglobal =
        new VP_Option(array(
            'is_dev_mode'           => false,
            'option_key'            => 'joption',
            'page_slug'             => 'jeg_option',
            'template'              => $dashboard_option,
            'menu_page'             => array(
                'icon_url'      => get_template_directory_uri() . '/assets/img/tf_profile.png',
                'position'      => 90
            ),
            'use_auto_group_naming' => true,
            'use_util_menu'         => true,
            'minimum_role'          => 'edit_theme_options',
            'layout'                => 'fixed',
            'page_title'            => 'Jkreativ Theme Options',
            'menu_label'            => 'Jkreativ',
        ));
}
add_action('after_setup_theme', 'jeg_dashboard');


/** customize */
function jeg_customizer_menu() {

    // dashboard
    add_submenu_page('jeg_option','Jkreativ Dashboard' ,'Jkreativ Dashboard' ,'edit_theme_options' ,'jeg_option');

    // customize
    add_submenu_page('jeg_option', "Import Dummy Data" , "Import Dummy Data" ,'switch_themes', 'jeg_import_content' , 'jeg_import_view');

    // customize
    add_submenu_page('jeg_option','Customize Style' ,'Customize Style' ,'edit_theme_options' ,'customize.php');
}

add_action('admin_menu', 'jeg_customizer_menu', 50);
