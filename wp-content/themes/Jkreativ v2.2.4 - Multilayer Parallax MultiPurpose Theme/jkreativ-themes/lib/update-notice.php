<?php
/**
 * update theme check
 */
add_action('admin_notices' ,'jeg_check_plugin_compatible');

function jeg_parse_version ($version) {
    $ver = explode('.', $version);
    $vercount = $ver[0] * 1000 + $ver[1] * 100 + $ver[2] * 10;
    return $vercount;
}

function jeg_check_plugin_compatible() {
    if(defined('JEG_PLUGIN_VERSION')) {
        $jpversion = JEG_PLUGIN_VERSION;
        global $jkreativplugincompatible;

        if(jeg_parse_version($jpversion) < jeg_parse_version($jkreativplugincompatible)) {
            echo
            "<div class='updated' id='message'>
                <p>Please udpate your plugin. This themes plugin compatible with <b>jkreativ-plugin version {$jkreativplugincompatible}</b> </p>
                <p>take a look at our documentation how to update the themes <a target='_blank' href='http://jkreativ.jegtheme.com/documentation/#updates'>right here</a>.</p>
            </div>";
        }
    }
}