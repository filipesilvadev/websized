<?php 

/** Jkreativ Admin Page */
if( defined('JEG_PLUGIN_JKREATIV') ) {
    locate_template(array('admin/import/import-content.php'), true, true);
    locate_template(array('admin/init-dashboard.php'), true, true);
    locate_template(array('admin/init-widget.php'), true, true);
    locate_template(array('admin/additional-widget.php'), true, true);
    locate_template(array('admin/admin-functionality.php'), true, true);
    locate_template(array('admin/post-type.php'), true, true);
    locate_template(array('admin/plugin-metabox.php'), true, true);
    locate_template(array('admin/shortcode.php'), true, true);
    locate_template(array('admin/additional-shortcode.php'), true, true);
    locate_template(array('admin/google-authorship.php'), true, true);
    locate_template(array('admin/vc-integration.php'), true, true);
    locate_template(array('admin/revslider-integration.php'), true, true);
}