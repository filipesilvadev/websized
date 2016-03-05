<?php

/**
 * @author jegbagus
 */

// section navigator need here to be global
$sectionnavigator = array();
$jkreativplugincompatible = '1.2.1';

locate_template(array('lib/init.php'), true, true);								// initialize
locate_template(array('lib/init-widget.php'), true, true);						// widget
locate_template(array('lib/init-image.php'), true, true);						// image functionality
locate_template(array('lib/themes-functionality.php'), true, true);				// additional themes functionality
locate_template(array('lib/build-shortcode.php'), true, true);					// build shortcode
locate_template(array('lib/init-menu.php'), true, true);						// initialize menu
locate_template(array('lib/admin.php'), true, true);							// back end
locate_template(array('lib/ajax-response.php'), true, true);					// response ajax
locate_template(array('lib/scriptstyle.php'), true);						    // loading style & script
locate_template(array('lib/jkreativ-customizer.php'), true, true);				// customizer
locate_template(array('tgm/class-tgm-plugin-activation.php'), true, true);		// tgm plugin
locate_template(array('tgm/plugin-list.php'), true, true);						// tgm plugin list
locate_template(array('lib/update-notice.php'), true, true);					// jkreativ plugin check

/** for demo purpose
require_once locate_template('/demo/demo.php');
*/