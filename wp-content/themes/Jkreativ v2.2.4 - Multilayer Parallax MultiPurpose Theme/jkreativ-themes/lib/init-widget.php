<?php

// add additional add button on widget
defined('JEG_WIDGET_NAME') or define('JEG_WIDGET_NAME', 'jeg-widget-list');
defined('JEG_DEFAULT_WIDGET') or define('JEG_DEFAULT_WIDGET', 'Default Widget');
defined('JEG_NAVI_WIDGET') or define('JEG_NAVI_WIDGET', 'Side Navigation Widget');

defined('JEG_FOOTER_WIDGET_1') or define('JEG_FOOTER_WIDGET_1', 'Footer Widget 1');
defined('JEG_FOOTER_WIDGET_2') or define('JEG_FOOTER_WIDGET_2', 'Footer Widget 2');
defined('JEG_FOOTER_WIDGET_3') or define('JEG_FOOTER_WIDGET_3', 'Footer Widget 3');
defined('JEG_FOOTER_WIDGET_4') or define('JEG_FOOTER_WIDGET_4', 'Footer Widget 4');

/** register sidebar **/
if(!function_exists('jeg_theme_register_widget')) {
	function jeg_theme_register_widget($sidebars) {
		if($sidebars) {
			foreach($sidebars as $sidebar) {
				if($sidebar === JEG_NAVI_WIDGET) {
					// side widget
					register_sidebar(array(
						'name'			=> $sidebar,
						'id' 			=> $sidebar,
						'before_widget' => '<div class="additionalblock %2$s" id="%1$s">',
				        'before_title'	=> '<h3>',
				        'after_title' 	=> '</h3><span class="line"></span>',
				        'after_widget' 	=> '</div>',
					));
				} else if(	$sidebar === JEG_FOOTER_WIDGET_1 || 
							$sidebar === JEG_FOOTER_WIDGET_2 || 
							$sidebar === JEG_FOOTER_WIDGET_3 || 
							$sidebar === JEG_FOOTER_WIDGET_4 ) {
					// footer widget
					register_sidebar(array(
						'name'			=> $sidebar,
						'id' 			=> $sidebar,
						'before_widget' => '<div class="footerwidget %2$s" id="%1$s">',
				        'before_title'	=> '<div class="footerwidget-title"><h3>',
				        'after_title' 	=> '</h3></div>',
				        'after_widget' 	=> '</div>',
					));
				} else {
					// normal blog sidebar
					register_sidebar(array(
						'name'			=> $sidebar,
						'id' 			=> $sidebar,
						'before_widget' => '<div class="blog-sidebar %2$s" id="%1$s"><div class="blog-sidebar-content">',
				        'before_title'	=> '<div class="blog-sidebar-title"><h3>',
				        'after_title' 	=> '</h3></div>',
				        'after_widget' 	=> '</div></div>',
					));
				}
			}
		}
	}
}

function jeg_get_all_widget_list()
{
    $widgetlist = get_option(JEG_WIDGET_NAME) ? get_option(JEG_WIDGET_NAME) : array() ;
    $defaultwidget = array(
        JEG_DEFAULT_WIDGET,
        JEG_NAVI_WIDGET,
        JEG_FOOTER_WIDGET_1,
        JEG_FOOTER_WIDGET_2,
        JEG_FOOTER_WIDGET_3,
        JEG_FOOTER_WIDGET_4
    );
    return array_merge($defaultwidget, $widgetlist);
}

function jeg_register_widget_list()
{
    $widgetlist = jeg_get_all_widget_list();
    jeg_theme_register_widget($widgetlist);
}


add_action('after_setup_theme', 'jeg_register_widget_list');