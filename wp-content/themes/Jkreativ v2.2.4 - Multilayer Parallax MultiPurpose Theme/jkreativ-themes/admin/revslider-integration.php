<?php


if(function_exists( 'set_revslider_as_theme' )){
    add_action( 'init', 'jeg_set_revslider_as_theme' );
    function jeg_set_revslider_as_theme() {
        set_revslider_as_theme();
    }
}
