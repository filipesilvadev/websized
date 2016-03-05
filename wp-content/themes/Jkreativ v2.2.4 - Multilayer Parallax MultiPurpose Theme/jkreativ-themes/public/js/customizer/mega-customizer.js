(function ($) {
    "use strict";

    wp.customize('mega_arrow_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('mega_arrow_color', "#leftsidebar #mega_main_menu.direction-vertical > .menu_holder > .menu_inner > ul > li > .mega_dropdown:before { border-right-color :", to);
            $.jstyleme('mega_arrow_color_top', ".topnavigation #mega_main_menu > .menu_holder > .menu_inner > ul > li > .mega_dropdown:before { border-bottom-color :", to);
        });
    });

    wp.customize('mega_bg_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('mega_bg_color',
                ".mega_dropdown," +
                "#leftsidebar #mega_main_menu.side_navigation > .menu_holder > .menu_inner > ul > li.default_dropdown .mega_dropdown," +
                "#leftsidebar #mega_main_menu.side_navigation > .menu_holder > .menu_inner > ul > li > .mega_dropdown, " +
                "#leftsidebar #mega_main_menu.side_navigation > .menu_holder > .menu_inner > ul > li .mega_dropdown > li .post_details, " +
                ".topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li.default_dropdown .mega_dropdown, " +
                ".topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li > .mega_dropdown, " +
                ".topnavigation #mega_main_menu.top_navigation > .menu_holder > .menu_inner > ul > li .mega_dropdown > li .post_details   { background : ", to);
        });
    });

    wp.customize('mega_text_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('mega_text_color',
                "#leftsidebar #mega_main_menu.side_navigation ul li.default_dropdown .mega_dropdown > li > .item_link *," +
                "#leftsidebar #mega_main_menu.side_navigation ul li.multicolumn_dropdown .mega_dropdown > li > .item_link *," +
                "#leftsidebar #mega_main_menu.side_navigation ul li.multicolumn_dropdown .mega_dropdown > li > .item_link *," +
                ".topnavigation #mega_main_menu.top_navigation ul li.default_dropdown .mega_dropdown > li > .item_link *," +
                ".topnavigation #mega_main_menu.top_navigation ul li.multicolumn_dropdown .mega_dropdown > li > .item_link *," +
                ".topnavigation #mega_main_menu.top_navigation ul li.multicolumn_dropdown .mega_dropdown > li > .item_link *  { color :", to);
        });
    });

    wp.customize('mega_text_hover_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('mega_text_hover_color',
                "#leftsidebar #mega_main_menu.side_navigation ul li.default_dropdown .mega_dropdown > li:hover > .item_link *, " +
                "#leftsidebar #mega_main_menu.side_navigation ul li.default_dropdown .mega_dropdown > li.current-menu-item > .item_link *," +
                "#leftsidebar #mega_main_menu.side_navigation ul li.multicolumn_dropdown .mega_dropdown > li > .item_link:hover *, " +
                "#leftsidebar #mega_main_menu.side_navigation ul li.multicolumn_dropdown .mega_dropdown > li.current-menu-item > .item_link *," +
                ".topnavigation #mega_main_menu.top_navigation ul li.default_dropdown .mega_dropdown > li:hover > .item_link *, " +
                ".topnavigation #mega_main_menu.top_navigation ul li.default_dropdown .mega_dropdown > li.current-menu-item > .item_link *," +
                ".topnavigation #mega_main_menu.top_navigation ul li.multicolumn_dropdown .mega_dropdown > li > .item_link:hover *, " +
                ".topnavigation #mega_main_menu.top_navigation ul li.multicolumn_dropdown .mega_dropdown > li.current-menu-item > .item_link *  { color :", to);
        });
    });

    wp.customize('mega_heading_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('mega_heading_color',
                "#leftsidebar #mega_main_menu > .menu_holder > .menu_inner > ul > li.multicolumn_dropdown > .mega_dropdown > li > a > span > span," +
                "#leftsidebar #mega_main_menu > .menu_holder > .menu_inner > ul > li.multicolumn_dropdown > .mega_dropdown > li > span > span > span," +
                ".topnavigation #mega_main_menu > .menu_holder > .menu_inner > ul > li.multicolumn_dropdown > .mega_dropdown > li > a > span > span," +
                ".topnavigation #mega_main_menu > .menu_holder > .menu_inner > ul > li.multicolumn_dropdown > .mega_dropdown > li > span > span > span  { color :", to);
        });
    });

    wp.customize('mega_border_color', function (value) {
        value.bind(function (to) {
            $.jstyleme('mega_border_color', "#mega_main_menu > .menu_holder > .menu_inner > ul > li.default_dropdown .mega_dropdown > li > .item_link { border-color :", to);
        });
    });


})(jQuery);