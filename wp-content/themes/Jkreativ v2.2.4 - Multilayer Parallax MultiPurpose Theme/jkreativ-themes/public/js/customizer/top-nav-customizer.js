(function ($) {
    "use strict";

    /** top navigation setting **/

        // navigation logo
    wp.customize('jeg_top_nav_logo', function (value) {
        value.bind(function (logo) {

            var createelement = function (logo) {
                if (logo === '') {
                    $(".topnavigation .logo img").attr('src', '').attr('style', '');
                } else {
                    var img = new Image();
                    img.onload = function () {
                        $(".topnavigation .logo img").css({
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

    // navigation top position
    wp.customize('jeg_top_nav_top_position', function (value) {
        value.bind(function (to) {
            $(".topnavigation .logo img").css('margin-top', to);
        });
    });

    // navigation left position
    wp.customize('jeg_top_nav_left_position', function (value) {
        value.bind(function (to) {
            $(".topnavigation .logo").css('padding-left', to);
        });
    });

    // navigation height
    wp.customize('jeg_top_nav_height', function (value) {
        value.bind(function (navheight) {
            $("#jeg_top_nav_height").remove();
            var elementcss = '';

            if ($(".topwrapperabove").length) {
                // two line

                var additionalheight = 50;
                var toptotal = navheight + additionalheight;

                elementcss += ".topwrapperbottom { height: " + navheight + "px; }";
                elementcss += ".topwrapperabove, .topnavigation .topnavigationwoo { height: " + additionalheight + "px; line-height: " + additionalheight + "px; }";
                elementcss += ".horizontalnav .contentheaderspace, .horizontalnav .topnavigation { height : " + (toptotal + 1) + "px; line-height: " + (toptotal + 1) + "px; }";
                elementcss += ".topnavigation .logo { line-height: " + navheight + "px; }";
                elementcss += ".navcontent > ul > li, .topsearchwrapper, .topsearchwrapper .closesearch, .topnavigationsearch, .topsearchwrapper input { line-height: " + navheight + "px; height: " + navheight + "px }";
                elementcss += ".topnavigation .footsocial { height: " + additionalheight + "px; line-height: " + additionalheight + "px; padding-right: 10px; }";
                elementcss += ".topnavmsg { line-height: " + additionalheight + "px; }";
                elementcss += ".horizontalnav .portfolioholderwrap { margin-top: " + toptotal + "px; }";
                elementcss += ".horizontalnav .filterfloat, .horizontalnav .portfolionavbar { top: " + toptotal + "px; }";
                elementcss += ".horizontalnav .fs-container, .horizontalnav .blog-normal-wrapper { padding-top: " + toptotal + "px; }";

                elementcss += ".topnavigation #mega_main_menu > .menu_holder > .menu_inner > ul > li { line-height: " + navheight + "px; }";
                elementcss +=
                    ".topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > .nav_logo > .logo_link, " +
                    ".topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle, " +
                    ".topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li > .item_link, " +
                    ".topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li > .item_link > span, " +
                    ".topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li.nav_search_box,  " +
                    ".topnavigation #mega_main_menu.top_navigation.icons-left > .menu_holder > .menu_inner > ul > li > .item_link > i, " +
                    ".topnavigation #mega_main_menu.top_navigation.icons-right > .menu_holder > .menu_inner > ul > li > .item_link > i,  " +
                    ".topnavigation #mega_main_menu.top_navigation.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.disable_icon > span, " +
                    ".topnavigation #mega_main_menu.top_navigation.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.menu_item_without_text > i { line-height: " + navheight + "px; height: " + navheight + " px; }";

            } else {
                // single line
                elementcss += ".topsearchwrapper, .horizontalnav .contentheaderspace, .horizontalnav .topnavigation, .navcontent li, .topnavigationsearch { height: " + navheight + "px }";
                elementcss += ".topsearchwrapper .closesearch, .horizontalnav .contentheaderspace, .navcontent > ul > li, .topnavigationsearch { line-height: " + navheight + "px }";
                elementcss += ".topnavigation .footsocial, .topnavigation .topnavigationwoo, .topsearchwrapper input { height: " + navheight + "px; line-height: " + navheight + "px; }";
                elementcss += ".horizontalnav .portfolioholderwrap { margin-top: " + navheight + "px; }";
                elementcss += ".horizontalnav .filterfloat, .horizontalnav .portfolionavbar { top: " + navheight + "px; }";
                elementcss += ".horizontalnav .fs-container, .horizontalnav .blog-normal-wrapper { padding-top: " + navheight + "px; }";
                elementcss += ".landing-bottom-space  { height: " + navheight + "px; }";


                elementcss += ".topnavigation #mega_main_menu > .menu_holder > .menu_inner > ul > li { line-height: " + navheight + "px; }";
                elementcss +=
                    ".topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > .nav_logo > .logo_link, " +
                    ".topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle, " +
                    ".topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li > .item_link, " +
                    ".topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li > .item_link > span, " +
                    ".topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li.nav_search_box,  " +
                    ".topnavigation #mega_main_menu.top_navigation.icons-left > .menu_holder > .menu_inner > ul > li > .item_link > i, " +
                    ".topnavigation #mega_main_menu.top_navigation.icons-right > .menu_holder > .menu_inner > ul > li > .item_link > i,  " +
                    ".topnavigation #mega_main_menu.top_navigation.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.disable_icon > span, " +
                    ".topnavigation #mega_main_menu.top_navigation.icons-top > .menu_holder > .menu_inner > ul > li > .item_link.menu_item_without_text > i { line-height: " + navheight + "px; height: " + navheight + " px; }";

            }


            var createelement = "<style id='jeg_top_nav_height'> " + elementcss + " </style>";
            $('body').append(createelement);

        });
    });

    // navigation color
    wp.customize('jeg_top_nav_background_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_nav_background_color', " .horizontalnav .topnavigation { background-color : ", to);
        });
    });


    // navigation color
    wp.customize('jeg_top_nav_line_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_nav_line_color', " .horizontalnav .topnavigationwoo > ul:before, .horizontalnav .footsocial > ul:before, .horizontalnav .twolinetop .topnavigationwoo > ul:before, .horizontalnav .twolinetop .footsocial > ul:before  { background-color : ", to);
        });
    });


    // icon color
    wp.customize('jeg_top_nav_icon_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_nav_icon_color', " .topnavigationwoo .topaccount span, .topnavigationwoo .topcart a, .topnavigation .footsocial a { color : ", to);
        });
    });


    // top menu color
    wp.customize('jeg_top_menu_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_menu_color',
                ".navcontent a, .topnavigationsearch i, .topnavigation .navcontent a, .topnavigationwoo .accountdrop li a," +
                ".topnavigationwoo .topaccount span, " +
                ".topnavigationwoo .topcart a, " +
                ".topnavigation .footsocial i " +
                ".topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > .nav_logo > .mobile_toggle > .mobile_button, " +
                ".topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li > .item_link, " +
                ".topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li > .item_link * " +
                "{ color : ", to);
        });
    });

    // top menu hover color
    wp.customize('jeg_top_hover_menu_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_hover_menu_color', " .navcontent > ul > li.hovered > a, .topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li.hovered > .item_link * { color : ", to);
        });
    });

    // top menu hover bg color
    wp.customize('jeg_top_hover_bg_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_hover_bg_color', " .navcontent > ul > li.hovered, .topnavigation #mega_main_menu.top_navigation ul.mega_main_menu_ul > li.hovered { background-color : ", to);
        });
    });

    // Drop menu background color
    wp.customize('jeg_top_nav_drop_bg', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_nav_drop_bg', " .navcontent .childmenu li, .topnavigationwoo .accountdrop li { background-color : ", to);
        });
    });

    // Drop menu text color
    wp.customize('jeg_top_nav_drop_text', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_nav_drop_text', ".navcontent .childmenu li a, .topnavigationwoo .accountdrop li a { color :", to);
        });
    });

    // Drop menu line color
    wp.customize('jeg_top_nav_drop_line', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_nav_drop_line', ".navcontent .childmenu, .navcontent .childmenu li, .topnavigationwoo .accountdrop li { border-color :", to);
        });
    });

    // Drop menu hovered background color
    wp.customize('jeg_top_nav_hover_drop_bg', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_nav_hover_drop_bg', ".navcontent .childmenu li:hover, .topnavigationwoo .accountdrop li:hover { background-color :", to);
            $.jstyleme('jeg_top_nav_hover_drop_bg', ".navcontent ul li > a:after { background-color :", to);
        });
    });

    // Drop menu hovered text color
    wp.customize('jeg_top_nav_hover_drop_text', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_nav_hover_drop_text', ".navcontent .childmenu li:hover > a, .topnavigationwoo .accountdrop li:hover a { color :", to);
        });
    });

    // Drop menu hovered line color
    wp.customize('jeg_top_nav_hover_drop_line', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_nav_hover_drop_line', ".navcontent .childmenu li:hover, .topnavigationwoo .accountdrop li:hover { border-color :", to);
        });
    });

    // seach button
    wp.customize('jeg_top_nav_show_search', function (value) {
        value.bind(function (to) {
            $("#jeg_top_nav_show_search").remove();
            if (to === true) {
                var createelement = "<style id='jeg_top_nav_show_search'> .topnavigationsearch { display : block; } </style>";
            } else {
                var createelement = "<style id='jeg_top_nav_show_search'> .topnavigationsearch { display : none; } </style>";
            }
            $('body').append(createelement);
        });
    });

    wp.customize('jeg_top_nav_search_bg_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_nav_search_bg_color', ".topsearchwrapper input { background-color : ", to);
        });
    });

    wp.customize('jeg_top_nav_search_text_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_nav_search_text_color', ".topsearchwrapper input { color :", to);
        });
    });

    wp.customize('jeg_top_nav_search_icon_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_nav_search_icon_color', ".topsearchwrapper .closesearch i { color :", to);
        });
    });


    // facebook
    wp.customize('jeg_top_nav_social_hover_border', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_nav_social_hover_border', ".topnavigation .footsocial a:hover { border-color :", to);
        });
    });

    wp.customize('jeg_top_nav_social_hover_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_nav_social_hover_color', ".topnavigation .footsocial a:hover i { color :", to);
        });
    });


    // two line
    wp.customize('jeg_top_sec_background', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_sec_background', ".twolinetop { background-color :", to);
        });
    });

    // second border
    wp.customize('jeg_top_sec_border', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_sec_border', ".twolinetop { border-color :", to);
        });
    });

    wp.customize('jeg_top_sec_tagline_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_top_sec_tagline_color', ".topnavmsg { color :", to);
        });
    });

    wp.customize('jeg_top_sec_tagline', function (value) {
        value.bind(function (to) {
            $(".topnavmsg").text(to);
        });
    });


})(jQuery);