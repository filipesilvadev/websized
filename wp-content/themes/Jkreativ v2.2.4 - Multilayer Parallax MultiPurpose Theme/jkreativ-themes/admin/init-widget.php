<?php


// add additional add button on widget
defined('JEG_WIDGET_NAME') or define('JEG_WIDGET_NAME', 'jeg-widget-list');
defined('JEG_DEFAULT_WIDGET') or define('JEG_DEFAULT_WIDGET', 'Default Widget');
defined('JEG_NAVI_WIDGET') or define('JEG_NAVI_WIDGET', 'Side  Navigation Widget');

defined('JEG_FOOTER_WIDGET_1') or define('JEG_FOOTER_WIDGET_1', 'Footer Widget 1');
defined('JEG_FOOTER_WIDGET_2') or define('JEG_FOOTER_WIDGET_2', 'Footer Widget 2');
defined('JEG_FOOTER_WIDGET_3') or define('JEG_FOOTER_WIDGET_3', 'Footer Widget 3');
defined('JEG_FOOTER_WIDGET_4') or define('JEG_FOOTER_WIDGET_4', 'Footer Widget 4');

function jeg_get_all_widget_list_plugin() 
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

/*** additional widget **/

function jeg_is_widget_page() {
    return in_array($GLOBALS['pagenow'], array('widgets.php'));
}

function jeg_load_widget_script() {
    if(jeg_is_widget_page()) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('jeg-widget-js', get_template_directory_uri() . '/assets/js/widgets.js', null, null);
        wp_enqueue_style ('jeg-fontawesome', get_template_directory_uri() . '/framework/public/css/vendor/font-awesome.min.css', null, null);
        wp_enqueue_style ('jeg-widget-css', get_template_directory_uri() . '/assets/css/widgets.css', null, null);
    }
}

function jeg_additional_widget_button() {
    if(jeg_is_widget_page()) {
        echo "<a class='sidebarwidget add-new-h2'>" . 'Add or remove widget area' . "</a><div class='clearfix'></div>";
    }
}

function jeg_save_widgetlist() {
    if(jeg_is_widget_page()) {
        if(isset($_POST['modifwidget'])) {
            if(isset($_POST['widgetlist'])) {
                update_option(JEG_WIDGET_NAME, $_POST['widgetlist'] );
            } else {
                delete_option(JEG_WIDGET_NAME);
            }
        }
    }
}

function jeg_populate_widget () {
    $widgetlist = get_option(JEG_WIDGET_NAME);
    $html = '';
    if( $widgetlist) {
        foreach($widgetlist as $widget) {
            $html .= "<li><span>" . $widget . "</span><input type='hidden' name='widgetlist[]' value='" . $widget . "'><div class='remove fa fa-ban'></div></li>";
        }
        return $html;
    }
}


function jeg_widget_admin_page() {
    if(jeg_is_widget_page()) {
        echo
            "<div class='widget-overlay'>
                <form method='POST'>
                    <div class='widget-overlay-wrapper'>
                        <h3>" . 'Edit widget Area'. "</h3>
					<div class='close fa fa-times'></div>
					<div class='widget-content-list'>
						<div class='widget-content-wrapper'>
							<h4>Widget Area List</h4>
							<ul> " . jeg_populate_widget() .  "</ul>
						</div>
						<div class='widget-confirm'>
							<input type='button' class='addwidget' value='" .  'Create Widget Area' . "'>
							<input type='submit' class='savewidget' style='background-color: #5CB85C;' value='" .  'Save Widget'  . "'>
						</div>
					</div>
					<div class='widget-adding-content'>
						<div class='widget-additional'>
							<h4>" .  'Create Widget Area' . "</h4>
							<input type='text' class='textwidgetconfirm' placeholder='" .  'Enter name of widget'  . "'>
						</div>
						<div class='widget-confirm'>
							<input type='button' class='addwidgetconfirm' value='" .  'Add Widget'  . "'>
						</div>
					</div>
				</div>
				<input type='hidden' name='modifwidget' value='1'/>
				" . wp_nonce_field( 'edit-widgetlist' ) . "
			</form>
		</div>";
    }
}

add_action('widgets_admin_page', 'jeg_additional_widget_button');
add_action('sidebar_admin_page', 'jeg_widget_admin_page');
add_action('after_setup_theme', 'jeg_save_widgetlist');
add_action('admin_enqueue_scripts', 'jeg_load_widget_script');
