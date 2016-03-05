<?php
/*
	Plugin Name: Jkreativ Plugin
	Plugin URI: http://jegtheme.com/
	Description: Mandatory Plugin for JKreativ Themes
	Version: 1.2.1
	Author: Agung Bayu Iswara
	Author URI: http://jegtheme.com
	License: GPL2
*/

defined( 'JEG_PLUGIN_VERSION' ) 	    or define( 'JEG_PLUGIN_VERSION', '1.2.1' );
defined( 'JEG_PLUGIN_URL' ) 		    or define( 'JEG_PLUGIN_URL', plugins_url('jkreativ-plugin'));
defined( 'JEG_PLUGIN_DIR' ) 		    or define( 'JEG_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
defined( 'JEG_PLUGIN_JKREATIV' )        or define( 'JEG_PLUGIN_JKREATIV', true);

/** load vafpress */
require_once JEG_PLUGIN_DIR . 'framework/bootstrap.php';

/** load jtemplate */
require_once JEG_PLUGIN_DIR . 'lib/jtemplate.php';
require_once JEG_PLUGIN_DIR . 'lib/jeg-metabox.php';
