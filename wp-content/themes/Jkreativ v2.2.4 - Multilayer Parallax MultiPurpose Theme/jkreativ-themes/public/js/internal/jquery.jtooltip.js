/**
 * jtooltip by Jegbagus
 */
(function ($, window, document) {
    "use strict";
    $.fn.jtooltip = function (options) {
        options = $.extend({
            holder: null,
            timeout: 500
        }, options);

        var element = $("<div id='jtooltip'><div class='triangle-border'></div><div class='triangle'></div><div class='torapper'></div><div class='rtriangle-border'></div><div class='rtriangle'></div></div>");
        var jtooltip = null;
        var timer;

        $(document).ready(function () {
            if ($("#jtooltip").length <= 0) {
                $('body').append(element);
            }
            jtooltip = $("#jtooltip");

            // only for jkreativ            
            $(jtooltip).css({
                'top': $(window).height() / 2,
                'left': $(window).width() - $(jtooltip).width() - 43
            });
        });

        return this.each(function () {
            $(this).mousemove(function (e) {
                $(".torapper", jtooltip).text($(this).attr("data-title"));
                var w = $(jtooltip).width();
                var ww = $(window).width();
                var pos = ((e.pageX + w + 55) > ww) ? "left" : "right";
                var curpos = null;

                if (pos === "right") {
                    $('.triangle, .triangle-border', jtooltip).show();
                    $('.rtriangle, .rtriangle-border', jtooltip).hide();
                } else {
                    $('.triangle, .triangle-border', jtooltip).hide();
                    $('.rtriangle-border, rtriangle', jtooltip).show();
                }

                var curtop = (e.clientY - ($(jtooltip).height() / 2));
                if (curtop < 5) {
                    curtop = 5;
                }

                curpos = $(options.holder).position().left - w - 20;

                if (timer) {
                    window.clearTimeout(timer);
                    timer = 0;
                }

                $(jtooltip).show().stop().animate({
                    'top': curtop,
                    'left': curpos,
                    'opacity': 1
                }, 300);

            });

            $(this).mouseout(function () {
                if (timer) {
                    window.clearTimeout(timer);
                }

                timer = window.setTimeout(function () {
                    $(jtooltip).show().animate({
                        'opacity': 0
                    }, 200, function () {
                        $(jtooltip).hide();
                    });
                }, 1000);

            });

        });
    };
})(jQuery, window, document);