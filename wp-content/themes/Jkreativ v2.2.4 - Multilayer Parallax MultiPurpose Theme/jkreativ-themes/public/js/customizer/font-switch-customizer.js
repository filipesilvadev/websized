(function ($) {
    "use strict";

    var changefont = function (id, url) {
        $("#" + id).remove();
        $("head").append("<link id='" + id + "' media='all' type='text/css' href='" + url + "' rel='stylesheet'>");
    };

    // first font
    wp.customize('first_font', function (value) {
        value.bind(function (font) {
            $("#first_font").remove();

            if (font !== false) {
                $.ajax({
                    url: joption.adminurl,
                    type: "post",
                    data: {
                        'fontname': font,
                        'action': 'get_font_string'
                    },
                    success: function (data) {
                        changefont('jeg_font_0-css', data);

                        var createelement = "<style id='first_font'>" +
                            "body," +
                            ".mainnav > li > a > h2," +
                            ".footcopy," +
                            ".slider-button .button-text," +
                            ".jnpslider .slider-alternate," +
                            ".mainnav .childmenu h2" +
                            "{ font-family : '" + font + "'; }" +
                            "</style>";
                        $('body').append(createelement);
                    }
                });
            }
        });
    });


    // second font
    wp.customize('second_font', function (value) {
        value.bind(function (font) {
            $("#second_font").remove();

            if (font !== false) {
                $.ajax({
                    url: joption.adminurl,
                    type: "post",
                    data: {
                        'fontname': font,
                        'action': 'get_font_string'
                    },
                    success: function (data) {
                        changefont('jeg_font_1-css', data);

                        var createelement = "<style id='second_font'>" +
                            "h1 , h2 , h3 , h4 , h5 , h6," +
                            ".portfolioitem .info h2," +
                            ".productitem .pinfo h2," +
                            ".productitem .price > span.amount," +
                            ".jkreativ table.shop_table th," +
                            ".jkreativ .totals_table," +
                            ".blog-normal-article .readmore," +
                            ".blog-sidebar-title h3," +
                            ".highlight," +
                            ".jnpslider h2," +
                            ".item .text1, .item .text3," +
                            ".iosSlider .slider .item .text1, .iosSlider .slider .item .text2, .iosSlider .slider .item .text3," +
                            ".kenburntextcontent.item .text1, .kenburntextcontent.item .text2, .kenburntextcontent.item .text3," +
                            ".section-blog-list .note-title" +
                            "{ font-family : '" + font + "'; }" +
                            "</style>";
                        $('body').append(createelement);
                    }
                });
            }
        });
    });


    // third font
    wp.customize('third_font', function (value) {
        value.bind(function (font) {
            $("#third_font").remove();

            if (font !== false) {
                $.ajax({
                    url: joption.adminurl,
                    type: "post",
                    data: {
                        'fontname': font,
                        'action': 'get_font_string'
                    },
                    success: function (data) {
                        changefont('jeg_font_2-css', data);

                        var createelement = "<style id='third_font'>" +
                            ".mainnav .childmenu .childmenu h2," +
                            ".additionalblock p," +
                            ".filterfloatbutton," +
                            ".filterfloatlist h3," +
                            ".blogfilter h3," +
                            ".portfoliofilterbutton, .blogfilterbutton," +
                            ".portfolio-date," +
                            ".portfolio-meta-desc," +
                            ".portfolio-link > span, .portfolio-single-nav > span," +
                            ".portfolioitem .info p," +
                            ".productitem .pinfo > small," +
                            ".jkreativ .jkreativ-woocommerce .article-header > span," +
                            ".clean-blog-wrapper .article-header h2," +
                            ".jnpslider .amp," +
                            ".item .text2," +
                            ".creditcontainer .top," +
                            ".slidewrapper .item em," +
                            ".blog-normal-article .article-quote-wrapper quote," +
                            ".clean-blog-article .article-quote-wrapper quote," +
                            ".article-sidebar .article-category," +
                            ".notfoundtext," +
                            ".dropcaps," +
                            "blockquote p," +
                            ".testimonialblock p," +
                            ".imageholderdesc," +
                            ".contactheading," +
                            ".teammeta > span," +
                            ".pricing-table .price > em," +
                            ".price-heading span," +
                            ".landingmasonryitem .info p," +
                            "section quote," +
                            ".sectioncontainer .serviceitem h3," +
                            ".section-header > em," +
                            ".iosSlider em, .sl-slider em, .kenburntextcontent em , " +
                            "div.ps-caption-content , " +
                            ".topnavmsg , " +
                            ".topsearchwrapper input ," +
                            ".headermenu .searchcontent input ," +
                            ".counterblock .title ," +
                            ".footlink li a ," +
                            ".article-quote-wrapper quote span, " +
                            ".slider-header em, em, em > *, i, i > *, " +
                            ".item .text2," +
                            ".footcopy," +
                            ".section-blog-list .note-author, .section-blog-list .note-readmore" +
                            "{ font-family : '" + font + "'; }" +
                            "</style>";
                        $('body').append(createelement);
                    }
                });
            }
        });
    });


})(jQuery);