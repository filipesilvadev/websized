(function ($) {
    "use strict";

    wp.customize('footer_background', function (value) {
        value.bind(function (to) {
            $.jstyleme('footer_background', ".landing-footer { background-color : ", to);
        });
    });

    wp.customize('footer_text_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('footer_text_color', ".landing-footer { color :", to);
        });
    });

    wp.customize('footer_heading_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('footer_heading_color', ".footerwidget-title h3 { color : ", to);
        });
    });

    wp.customize('footer_link_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('footer_link_color', ".landing-footer a { color :", to);
        });
    });

    wp.customize('footer_hover_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('footer_hover_color', ".landing-footer li a:hover { color :", to);
        });
    });

    wp.customize('footer_copyright_background', function (value) {
        value.bind(function (to) {
            $.jstyleme('footer_copyright_background', ".landing-btm-footer { background-color : ", to);
        });
    });

    wp.customize('footer_copyright_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('footer_copyright_color', ".landing-footer-copyright { color : ", to);
        });
    });

})(jQuery);