<?php

/*** Remove frontend editor ***/
if(function_exists('vc_disable_frontend')){
    vc_disable_frontend();
}

/**
 * create additional parameter
 * 1. Slider
 * 2. File Upload
 * 3. ID section
 * 4. Font Awesome
 */

// slider
function jeg_vc_slider($settings, $value) {
    return
    "<div class='slider-input-wrapper'>
        <input name='" . $settings['param_name'] . "' class='wpb_vc_param_value wpb-input slider-input " . $settings['param_name'] . " " . $settings['type'] . "_field' type='text' disabled='disabled' value='$value' />
        <div class='slider-wrapper'>
            <div class='slider-element' data-min='" . $settings['min'] . "' data-max='" . $settings['max'] . "' data-step='" . $settings['step'] . "' data-value='$value'></div>
        </div>
    </div>";
}

add_shortcode_param('slider' , 'jeg_vc_slider', get_template_directory_uri() . '/public/js/vc/slider.js');

// attach_file
function jeg_vc_attach_file($settings, $value) {
    return
        "<div class='input-uploadfile'>
        <input name='" . $settings['param_name'] . "' class='wpb_vc_param_value wpb-input" . $settings['param_name'] . " " . $settings['type'] . "_field' type='text' value='$value' />
        <div class='buttons'>
            <input type='button' value='Select File' class='selectfileimage btn'/>
        </div>
    </div>";
}

add_shortcode_param('attach_file' , 'jeg_vc_attach_file', get_template_directory_uri() . '/public/js/vc/file.js');

// sectionid
function jeg_vc_sectionid($settings, $value) {
    return
        "<div class='sectionid-input'>
        <input name='" . $settings['param_name'] . "' class='wpb_vc_param_value wpb-input" . $settings['param_name'] . " " . $settings['type'] . "_field' type='text' value='$value' />
    </div>";
}

add_shortcode_param('sectionid' , 'jeg_vc_sectionid', get_template_directory_uri() . '/public/js/vc/sectionid.js');


// fontawesome
function jeg_vc_fontawesome($settings, $value) {
    $fontawesomelist = vp_get_fontawesome_icons();
    $fontlisttext = '';

    foreach($fontawesomelist as $fontid) {
        if($value == $fontid['value']) {
            $fontlisttext .= "<option selected value='{$fontid['value']}'>{$fontid['value']}</option>";
        } else {
            $fontlisttext .= "<option value='{$fontid['value']}'>{$fontid['value']}</option>";
        }
    }

    return
    "<div class='sectionid-input'>
        <select name='" . $settings['param_name'] . "' class='wpb_vc_param_value wpb-input" . $settings['param_name'] . " " . $settings['type'] . "_field'>
            " . $fontlisttext . "
        </select>
    </div>";
}

add_shortcode_param('fontawesome' , 'jeg_vc_fontawesome', get_template_directory_uri() . '/public/js/vc/select2.js');
