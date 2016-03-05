(function ($) {
    "use strict";

    wp.customize('general_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('general_color', "body { color : ", to);
        });
    });

    wp.customize('general_heading_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('general_heading_color', "h1 , h2 , h3 , h4 , h5 , h6 { color :", to);
        });
    });

    wp.customize('general_link_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('general_link_color', "a, .jkreativ .jkreativ-woocommerce .star-rating span:after, .replycomment, .closecommentform, .slide-dot.selected { color :", to);
        });
    });

    wp.customize('general_hover_link_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('general_hover_link_color', "a:hover { color :", to);
        });
    });


})(jQuery);