(function ($) {
    "use strict";

    /** side navigation setting **/
        // logo
    wp.customize('mobile_nav_logo_image', function (value) {
        value.bind(function (logo) {

            var createelement = function (logo) {
                if (logo === '') {
                    $(".responsiveheader .logo img").attr('src', '').attr('style', '');
                } else {
                    var img = new Image();
                    img.onload = function () {
                        $(".responsiveheader .logo img").css({
                            'width': this.width,
                            'height': this.height,
                        }).attr('src', logo);
                    };
                    img.src = logo;
                }
            };

            if (typeof logo === 'number') {
                $.ajax({
                    url: jkreativoption.adminurl,
                    type: "post",
                    dataType: "html",
                    data: {
                        'action': jkreativoption.imageurl,
                        'imageid': logo,
                        'size': 'full'
                    },
                    success: function (data) {
                        if (data !== '') {
                            createelement(data);
                        }
                    }
                });
            } else {
                createelement(logo);
            }

        });
    });

    wp.customize('mobile_nav_bg_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('mobile_nav_bg_color', ".responsiveheader { background-color :", to);
        });
    });

    wp.customize('mobile_nav_icon_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('mobile_nav_icon_color', ".navleftwrapper span, .navrightwrapper span { color :", to);
        });
    });

    wp.customize('mobile_nav_show_search', function (value) {
        value.bind(function (to) {
            console.log(to);
            $("#mobile_nav_show_search").remove();
            if (to === true) {
                var createelement = "<style id='mobile_nav_show_search'> .navright.mobile-search-trigger { display : block; } </style>";
            } else {
                var createelement = "<style id='mobile_nav_show_search'> .navright  .mobile-search-trigger { display : none; } </style>";
            }
            $('body').append(createelement);
        });
    });

    wp.customize('mobile_nav_search_bg_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('mobile_nav_search_bg_color', ".mobilesearch input { background-color :", to);
        });
    });

    wp.customize('mobile_nav_search_text_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('mobile_nav_search_text_color', ".mobilesearch input { color :", to);
        });
    });

    wp.customize('mobile_nav_search_icon_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('mobile_nav_search_icon_color', ".closemobilesearch span { color :", to);
        });
    });


    wp.customize('mobile_nav_col_bg_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('mobile_nav_col_bg_color', ".mobile-float { background-color :", to);
        });
    });

    wp.customize('mobile_nav_col_menu_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('mobile_nav_col_menu_color', ".mobile-menu h2 { color :", to);
        });
    });

    wp.customize('mobile_nav_col_list_bg', function (value) {
        value.bind(function (to) {
            $.jstyleme('mobile_nav_col_list_bg', ".mobile-menu li a { background-color :", to);
        });
    });

    wp.customize('mobile_nav_col_list_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('mobile_nav_col_list_color', ".mobile-menu li a { color :", to);
        });
    });

    wp.customize('mobile_nav_col_list_border_top', function (value) {
        value.bind(function (to) {
            $.jstyleme('mobile_nav_col_list_border_top', ".mobile-menu li a { border-top-color :", to);
        });
    });

    wp.customize('mobile_nav_col_list_border_bottom', function (value) {
        value.bind(function (to) {
            $.jstyleme('mobile_nav_col_list_border_bottom', ".mobile-menu li a { border-bottom-color :", to);
        });
    });


    wp.customize('mobile_nav_col_list_bg_hovered', function (value) {
        value.bind(function (to) {
            $.jstyleme('mobile_nav_col_list_bg_hovered', ".mobile-menu li a:hover, .mobile-menu li[class^='current'] > a, .mobile-menu li[class*='current_'] > a { background-color :", to);
        });
    });

    wp.customize('mobile_nav_col_list_color_hovered', function (value) {
        value.bind(function (to) {
            $.jstyleme('mobile_nav_col_list_color_hovered', ".mobile-menu li a:hover, .mobile-menu li[class^='current'] > a, .mobile-menu li[class*='current_'] > a { color :", to);
        });
    });

    wp.customize('mobile_nav_col_list_border_top_hovered', function (value) {
        value.bind(function (to) {
            $.jstyleme('mobile_nav_col_list_border_top_hovered', ".mobile-menu li a:hover, .mobile-menu li[class^='current'] > a, .mobile-menu li[class*='current_'] > a { border-top-color :", to);
        });
    });

    wp.customize('mobile_nav_col_list_border_bottom_hovered', function (value) {
        value.bind(function (to) {
            $.jstyleme('mobile_nav_col_list_border_bottom_hovered', ".mobile-menu li a:hover, .mobile-menu li[class^='current'] > a, .mobile-menu li[class*='current_'] > a { border-bottom-color :", to);
        });
    });

    wp.customize('mobile_nav_col_list_border_left_hovered', function (value) {
        value.bind(function (to) {
            $.jstyleme('mobile_nav_col_list_border_left_hovered', ".mobile-menu li a:hover, .mobile-menu li[class^='current'] > a, .mobile-menu li[class*='current_'] > a { border-left-color :", to);
        });
    });

})(jQuery);