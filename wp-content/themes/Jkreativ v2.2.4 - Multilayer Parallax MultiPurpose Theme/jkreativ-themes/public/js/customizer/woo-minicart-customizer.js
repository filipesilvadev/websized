(function ($) {
    "use strict";

    /** mini cart **/

        // navigation line color
    wp.customize('mini_woo_bg', function (value) {
        value.bind(function (to) {
            $.jstyleme('mini_woo_bg', ".topcartcontent { background-color :", to);
        });
    });

    wp.customize('mini_woo_text', function (value) {
        value.bind(function (to) {
            $.jstyleme('mini_woo_text', ".topcartheader, .topcart_desc a strong, .topcart_price span.amount, .topcart_subtotal, .topcart_subtotal strong .amount { color :", to);
        });
    });


    wp.customize('mini_woo_alt_text', function (value) {
        value.bind(function (to) {
            $.jstyleme('mini_woo_alt_text', ".topcart_desc > span, .topcartlist .variation, .toplink li .topcart_product_remove > a, .topnavigationwoo li .topcart_product_remove > a { color :", to);
        });
    });


    wp.customize('mini_woo_line_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('mini_woo_line_color', ".topcartheader, .topcartlist_product, .topcart_subtotal { border-color :", to);
        });
    });

    wp.customize('mini_woo_btn_bg', function (value) {
        value.bind(function (to) {
            $.jstyleme('mini_woo_btn_bg', ".toplink li a.topcart_btn, .topnavigationwoo li a.topcart_btn { background-color :", to);
        });
    });

    wp.customize('mini_woo_btn_text', function (value) {
        value.bind(function (to) {
            $.jstyleme('mini_woo_btn_text', ".toplink li a.topcart_btn, .topnavigationwoo li a.topcart_btn { color :", to);
        });
    });

    wp.customize('mini_woo_btn_border', function (value) {
        value.bind(function (to) {
            $.jstyleme('mini_woo_btn_border', ".toplink li a.topcart_btn, .topnavigationwoo li a.topcart_btn { border-color :", to);
        });
    });

})(jQuery);