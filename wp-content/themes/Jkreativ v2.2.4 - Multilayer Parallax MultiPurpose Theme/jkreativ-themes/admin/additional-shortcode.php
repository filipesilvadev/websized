<?php

/************************
 * Clean up shortcode
 ***********************/
function the_content_filter($content) {
    $block = join("|",
        array(
            "row", "column", "dropcap", "doublehr", "shorthr", "hr", "spacing",
            "highlight", "tooltip", "vimeo", "youtube", "soundcloud", "html5video",
            "singleimage", "googlemap", "testimonial", "quote", "alert", "button",
            "accordion", "accordion-element", "tab-heading-wrapper", "tab-heading",
            "tab-content-wrapper","tab-content", "imgslider-wrapper", "imgslider",
            "teamblock", "team-wrapper", "team-row", "team-content", "team-content-text",
            "team-social", "team-social-item", "em", "heading", "service-wrap",
            "service-item", "skill-bar-wrap", "skill-bar-item", "landing-quote",
            "service-icon-wrap", "service-icon-item", "service-block-wrap",
            "service-block-item", "counter-block", "counter-item", "testi-slide-wrap",
            "testi-slide-item", "client-list", "client-image", "callout",
            "iframe", "image-seq", "image-seq-item", "portfolio-wrapper",
            "portfolio-item", "pricingblock", "pricing-table", "pricing-column",
            "pricing-list-wrap", "pricing-list", "pricing-button", "360view",
            "credit-heading", "credit-separator", "credit-title", "credit-name",
            "fullwidthmap", "fullwidthmapdetail", "singleicon", "iconlistwrapper",
            "iconlist", "product-slider", "jeg-blog-list",
            "vc_row", "strong"
        ));

    $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
    $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);

    return $rep;
}

add_filter("the_content", "the_content_filter");

/* Plugin Name: My TinyMCE Buttons */
add_action( 'admin_init', 'jeg_tinymce_button' );

function jeg_tinymce_button() {
    if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
        add_filter( 'mce_external_plugins', 'jeg_add_tinymce_button' );
    }
}

function jeg_add_tinymce_button( $plugin_array ) {
    $plugin_array['jcode'] = get_template_directory_uri() . "/assets/tinymce/jcode.js"  ;
    return $plugin_array;
}