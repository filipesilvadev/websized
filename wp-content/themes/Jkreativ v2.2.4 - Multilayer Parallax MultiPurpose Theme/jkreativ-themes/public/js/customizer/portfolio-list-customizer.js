(function ($) {
    "use strict";

    /* portfolio list */
    wp.customize('jeg_pl_filter_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_filter_color', ".filterfloatbutton { color :", to);
        });
    });

    wp.customize('jeg_pl_filter_bg', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_filter_bg', ".filterfloatbutton { background-color :", to);
        });
    });

    wp.customize('jeg_pl_active_filter_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_active_filter_color', ".filterfloat.active .filterfloatbutton { color :", to);
        });
    });

    wp.customize('jeg_pl_active_filter_bg', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_active_filter_bg', ".filterfloat.active .filterfloatbutton { background-color :", to);
        });
    });

    wp.customize('jeg_pl_filter_drop_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_filter_drop_color', ".filterfloatlist li { color :", to);
        });
    });

    wp.customize('jeg_pl_filter_drop_hover_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_filter_drop_hover_color', ".filterfloatlist li:hover, .filterfloatlist li.active { color :", to);
        });
    });

    wp.customize('jeg_pl_filter_drop_bg', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_filter_drop_bg', ".filterfloatlist, .filterfloatlist ul { background-color :", to);
        });
    });

    /* portfolio pinterest */
    wp.customize('jeg_pl_pin_border_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_pin_border_color', ".pinterestportfolio .portfolioitem a { border-color :", to);
        });
    });

    wp.customize('jeg_pl_pin_background', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_pin_background', ".pinterestportfolio .portfolioitem .mask { background-color :", to);
        });
    });

    wp.customize('jeg_pl_pin_title', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_pin_title', ".pinterestportfolio .portfolioitem .mask .info h2 { color :", to);
        });
    });

    wp.customize('jeg_pl_pin_border', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_pin_border', ".pinterestportfolio .portfolioitem .mask .info span { background-color :", to);
        });
    });

    wp.customize('jeg_pl_pin_alt', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_pin_alt', ".pinterestportfolio .portfolioitem .mask .info p { color :", to);
        });
    });


    /* portfolio pagign */
    wp.customize('jeg_pl_page_bg', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_page_bg', ".portfoliopagingwrapper { background-color :", to);
        });
    });

    wp.customize('jeg_pl_page_text', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_page_text', ".pagetext { color :", to);
        });
    });

    wp.customize('jeg_pl_page_dot', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_page_dot', ".pagedot li span { background-color :", to);
        });
    });

    wp.customize('jeg_pl_page_dot_active', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_page_dot_active', ".pagedot li.active span { background-color :", to);
        });
    });

    wp.customize('jeg_pl_page_line', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_pl_page_line', ".pagetext, .pagedot { border-color :", to);
        });
    });

})(jQuery);