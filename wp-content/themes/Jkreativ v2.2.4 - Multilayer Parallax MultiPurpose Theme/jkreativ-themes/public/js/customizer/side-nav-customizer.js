(function ($) {
    "use strict";

    /** side navigation setting **/
    wp.customize('website_copyright', function (value) {
        value.bind(function (to) {
            $(".footcopy").text(to);
        });
    });

    // logo
    wp.customize('side_nav_logo_image', function (value) {
        value.bind(function (logo) {

            var createelement = function (logo) {
                if (logo === '') {
                    $(".lefttop .logo img").attr('src', '').attr('style', '');
                } else {
                    var img = new Image();
                    img.onload = function () {
                        $(".lefttop .logo img").css({
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

    wp.customize('side_nav_top_padding', function (value) {
        value.bind(function (to) {
            $(".lefttop .logo").css({'padding-top': to + 'px'});
        });
    });

    wp.customize('side_nav_bottom_padding', function (value) {
        value.bind(function (to) {
            $(".lefttop .logo").css({'padding-bottom': to + 'px'});
        });
    });

    wp.customize('jeg_side_bg', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_bg', "#leftsidebar { background-color :", to);
        });
    });

    wp.customize('jeg_side_link_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_link_color', "#leftsidebar a, .mainnavigation li .arrow { color :", to);
        });
    });

    wp.customize('jeg_side_link_color_hover', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_link_color_hover', "#leftsidebar a:hover, .mainnavigation li:hover .arrow { color :", to);
        });
    });


    wp.customize('jeg_side_bottom_bg', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_bottom_bg', ".leftfooter { background-color :", to);
        });
    });

    wp.customize('jeg_side_bottom_copyright', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_bottom_copyright', ".footcopy { color :", to);
        });
    });

    wp.customize('jeg_side_social', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_social', "#leftsidebar .footsocial a i, .csbwrapper li a i { color :", to);
        });
    });

    wp.customize('jeg_side_social_border', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_social_border', "#leftsidebar .footsocial a, .csbwrapper li a  { border-color :", to);
        });
    });

    wp.customize('jeg_side_social_hover', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_social_hover', "#leftsidebar .footsocial a:hover i, .csbwrapper li a:hover i { color :", to);
        });
    });

    wp.customize('jeg_side_social_border_hovered', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_social_border_hovered', "#leftsidebar .footsocial a:hover, .csbwrapper li a:hover { border-color :", to);
        });
    });


    wp.customize('jeg_side_btm_link_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_btm_link_color', "#leftsidebar .footlink li a { color :", to);
        });
    });

    wp.customize('jeg_side_btm_link_color_hover', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_btm_link_color_hover', "#leftsidebar .footlink li a:hover { color :", to);
        });
    });

    wp.customize('jeg_side_btm_separator', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_btm_separator', "#leftsidebar .footlink .separator { color : ", to);
        });
    });


    wp.customize('jeg_side_nav_top_border', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_nav_top_border', ".mainnavigation, #leftsidebar #mega_main_menu.direction-vertical { border-color : ", to);
        });
    });

    wp.customize('jeg_side_nav_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_nav_color', ".mainnav > li > a > h2, .mainnav .childmenu h2, #leftsidebar #mega_main_menu.side_navigation > .menu_holder > .menu_inner > ul > li > .item_link > span > span { color : ", to);
        });
    });

    wp.customize('jeg_side_nav_color_active', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_nav_color_active',
                ".mainnav li.active > a > h2, .mainnav  li:hover > a > h2, .mainnav .menudown > a > h2 ," +
                ".mainnav li[class^='current'] > a > h2, .mainnav li[class*='current_'] > a > h2 ," +
                ".menu-top-navigation li[class^='current'] > a > h2, .menu-top-navigation li[class*='current_'] > a > h2, li.current-menu-parent > a > h2 , " +
                ".mainnav  li.active > a > span.arrow, .mainnav  li:hover > a > span.arrow, .menudown > a > span.arrow , " +
                ".mainnav li[class^='current'] > a > span.arrow, .mainnav li[class*='current_'] > a > span.arrow , " +
                ".menu-top-navigation li[class^='current'] > a > span.arrow, .menu-top-navigation li[class*='current_'] > a > span.arrow, " +
                "li.current-menu-parent > a > span.arrow, #leftsidebar #mega_main_menu.side_navigation > .menu_holder > .menu_inner > ul > li:hover > .item_link > span > span, " +
                "#leftsidebar #mega_main_menu.side_navigation > .menu_holder > .menu_inner > ul > li.current-menu-parent > .item_link > span > span,  " +
                "#leftsidebar #mega_main_menu.side_navigation > .menu_holder > .menu_inner > ul > li.current_page_item > .item_link > span > span  { color : ", to);
        });
    });

    wp.customize('jeg_side_nav_bottom_border', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_nav_bottom_border', ".mainnav > li > a > h2:after, .mainnav .childmenu h2:after, #leftsidebar #mega_main_menu.side_navigation > .menu_holder > .menu_inner > ul > li > .item_link > span > span:after { background-color :", to);
        });
    });


    wp.customize('jeg_side_additional_top_border', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_additional_top_border', ".additionalblock { border-top-color :", to);
        });
    });

    wp.customize('jeg_side_additional_bottom_border', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_additional_bottom_border', ".additionalblock:last-child { border-bottom-color :", to);
        });
    });

    wp.customize('jeg_side_additional_title', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_additional_title', ".additionalblock h3 { color :", to);
        });
    });

    wp.customize('jeg_side_additional_title_border', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_additional_title_border', ".additionalblock .line { background-color :", to);
        });
    });

    wp.customize('jeg_side_additional_text_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_additional_text_color', ".additionalblock { color :", to);
        });
    });


    wp.customize('jeg_side_collapse_icon_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_collapse_icon_color', ".cbsheader .csbhicon { color :", to);
        });
    });


    /*** header menu ***/
    wp.customize('jeg_side_header_bg_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_bg_color', ".headermenu { background-color :", to);
        });
    });

    wp.customize('jeg_side_header_border_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_border_color', ".headermenu { border-color :", to);
        });
    });

    wp.customize('jeg_side_header_show_search', function (value) {
        value.bind(function (to) {
            $("#jeg_side_header_show_search").remove();
            if (to === true) {
                var createelement = "<style id='jeg_side_header_show_search'> .searchheader { display : block; } </style>";
            } else {
                var createelement = "<style id='jeg_side_header_show_search'> .searchheader { display : none; } </style>";
            }
            $('body').append(createelement);
        });
    });

    wp.customize('jeg_side_header_search_bg_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_search_bg_color', ".headermenu .searchcontent input { background-color :", to);
        });
    });

    wp.customize('jeg_side_header_text_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_text_color', ".headermenu .searchcontent input, .closesearch i { color :", to);
        });
    });

    wp.customize('jeg_side_header_search_icon_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_search_icon_color', ".searchheader i { color :", to);
        });
    });


    /*** menu color ***/
    wp.customize('jeg_side_header_menu_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_menu_color', ".portfoliofilterbutton, .blogfilterbutton, .headermenu .toplink li a { color :", to);
        });
    });

    wp.customize('jeg_side_header_menu_color_bg_active', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_menu_color_bg_active', ".portfoliofilter.active .portfoliofilterbutton, .blogfilter.active .blogfilterbutton, .headermenu .toplink li.active, .headermenu .toplink li.active > a { background-color :", to);
        });
    });

    wp.customize('jeg_side_header_menu_color_text_active', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_menu_color_text_active', ".portfoliofilter.active .portfoliofilterbutton, .blogfilter.active .blogfilterbutton, .headermenu .toplink li.active, .headermenu .toplink li.active > a { color :", to);
        });
    });

    wp.customize('jeg_side_header_menu_drop_bg', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_menu_drop_bg', ".portfoliofilterlist, .blogfilterlist, .portfoliofilterlist ul, .blogfilterlist ul { background-color :", to);
        });
    });

    wp.customize('jeg_side_header_menu_drop_text', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_menu_drop_text', ".portfoliofilterlist li, .blogfilterlist li { color :", to);
        });
    });

    wp.customize('jeg_side_header_menu_drop_text_hovered', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_menu_drop_text_hovered', ".portfoliofilterlist li:hover, .portfoliofilterlist li.active, .blogfilterlist li:hover, .blogfilterlist li.active { color : ", to);
        });
    });

    wp.customize('jeg_side_header_menu_drop_acc_text', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_menu_drop_acc_text', ".headermenu .toplink .accountdrop li a { color :", to);
        });
    });

    wp.customize('jeg_side_header_menu_drop_acc_bg', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_menu_drop_acc_bg', ".accountdrop { background-color : ", to);
        });
    });

    wp.customize('jeg_side_header_menu_drop_acc_border', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_menu_drop_acc_border', ".headermenu .toplink .accountdrop li { border-color : ", to);
        });
    });

    wp.customize('jeg_side_header_menu_drop_acc_text_hover', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_menu_drop_acc_text_hover', ".headermenu .toplink .accountdrop li:hover a { color :", to);
        });
    });

    wp.customize('jeg_side_header_menu_drop_acc_bg_hover', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_menu_drop_acc_bg_hover', ".headermenu .toplink .accountdrop li:hover { background-color :", to);
        });
    });

    wp.customize('jeg_side_header_menu_drop_acc_border_hover', function (value) {
        value.bind(function (to) {
            $.jstyleme('jeg_side_header_menu_drop_acc_border_hover', ".headermenu .toplink .accountdrop li:hover { border-color :", to);
        });
    });

})(jQuery);