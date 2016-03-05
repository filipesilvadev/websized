/**
 * jquery.jportfoliosingle.js
 */
(function ($) {
    "use strict";
    $.fn.jportfoliosingle = function (options) {

        options = $.extend({
            adminurl: '',
            imgfsmode: 'fit' // fit || fitNoUpscale || zoom
        }, options);

        return $(this).each(function () {
            var element = this;
            var loader = $('.portfolioloader');
            var prevargs = null;
            var args = null;

            var resize_portfolio_content = function () {
                var ww = $(window).width();
                if (ww > 1024) {
                    $(".portfoliocontent").height($(window).height());
                }
                else {
                    $(".portfoliocontent").height($(window).height() - $(".responsiveheader").height());
                }

                if ($('body').hasClass('horizontalnav')) {
                    if (ww > 1024) {
                        $(".portfolioholderwrap").height($(".portfoliocontent").height() - $(".topnavigation").height());
                    } else {
                        $(".portfolioholderwrap").height($(".portfoliocontent").height() - $(".portfolionavbar").height());
                    }
                } else {
                    $(".portfolioholderwrap").height($(".portfoliocontent").height() - $(".portfolionavbar").height());
                }
            };

            // reset
            var portfolionormalcontentpos = function () {
                $(".portfolionavbar").hide();
                if (!$('body').hasClass('horizontalnav')) {
                    $(".portfolionavbar").css('top', '-50px');
                }
                $(".portfoliobottombar").hide().css('bottom', '-45px');
                $(".portfolioholderwrap").hide().css("margin-left", "-100%");
                $(".portfolioinfo").show().removeClass("opened");
                $(".portfoliolove").show();
                $(".portfolionavnext").show();
                $(".portfolionavprev").show();
            };

            var single_portfolio_resize = function () {
                $(".portfolio-content-holder").each(function () {
                    var curimg = $("img", this).get(0);

                    if ($(curimg).hasClass('loaded')) {
                        /** parameter crop data ***/
                        var size = $.new_get_image_container_size(curimg, $(".portfolio-slider-holder"), options.imgfsmode);
                        $(curimg).css({
                            'height': size[0],
                            'width': size[1],
                            'max-width': 'inherit'
                        });

                        jpobj.doTranslate(curimg, size[2] + "px", size[3] + "px");

                    }
                });
            };

            var open_portfolio_video = function (event) {
                var curobj = $(event.target).parents(".portfolio-content-holder");
                var type = $(curobj).attr('data-type');

                $(".portfoliovideoclose").fadeIn();
                $(".portfoliovideo-container").fadeIn();
                $(".portfolio-navigation, .portfoliobottombar").fadeOut();
                switch (type) {
                    case 'youtube' :
                        $.type_video_youtube(curobj, true, false);
                        break;
                    case 'vimeo' :
                        $.type_video_vimeo(curobj, true, false);
                        break;
                    case 'html5video' :
                        $.type_video_html5(curobj, true, {
                            enableAutosize: true,
                            videoWidth: '100%',
                            videoHeight: '100%',
                            followContainerHeight: true,
                            features: ['playpause', 'progress', 'current', 'duration', 'tracks', 'volume']
                        }, '.html5-video-container');
                        break;
                    case 'soundcloud' :
                        $.type_soundcloud(curobj);
                        break;
                    default :
                        break;
                };
            };

            var close_portfolio_video = function () {
                $(".video-container").html("");
                $(".html5-video-container").html("");
                $(".portfoliovideoclose").unbind('click', close_portfolio_video).fadeOut("slow");
                $(".portfolio-navigation, .portfoliobottombar").fadeIn();

                setTimeout(function () {
                    $(".portfoliovideo-container").fadeOut("slow");
                }, 500);
            };

            var check_portfolio_type = function (args, prevargs) {
                var prevobj = prevargs.currentSlideObject;
                var type = $(prevobj).attr('data-type');

                if (type == 'youtube' || type == 'vimeo' || type === 'html5video') {
                    $(".videooverlay", prevobj).unbind('click', open_portfolio_video);
                    close_portfolio_video();
                }

                if (get_portfolio_type(args) !== 'image') {
                    // build current object
                    var curobj = args.currentSlideObject;
                    var type = $(curobj).attr('data-type');

                    /*** load image ***/
                    if ($("img", curobj).hasClass('notloaded')) {
                        var datasrc = $("img", curobj).data('src');
                        var img = new Image();

                        $(img).load(function () {
                            $("img", curobj).attr('src', datasrc);
                            var size = $.new_get_image_container_size($("img", curobj), $(".portfolio-slider-holder"), options.imgfsmode);
                            $("img", curobj).css({
                                'height': size[0],
                                'width': size[1],
                                'max-width': 'inherit'
                            });
                            jpobj.doTranslate($("img", curobj), size[2] + "px", size[3] + "px");
                            $("img", curobj).removeClass('notloaded').addClass('loaded');

                            load_next_image(args.currentSlideNumber, args.sliderObject);
                        }).attr('src', datasrc);
                    }

                    if (type == 'youtube' || type == 'vimeo' || type === 'html5video') {
                        $(".videooverlay", curobj).bind('click', open_portfolio_video);
                    } else if (type == 'soundcloud') {
                        $.type_soundcloud(curobj);
                    }
                }
            };

            var set_portfolio_item_title = function (args) {
                var obj = args.currentSlideObject;
                var title = $(obj).data('title');
                var sequence = args.currentSlideNumber;
                var total = $(".portfolio-content-holder").length;
                var itemtitle = title + " (" + sequence + "/" + total + ")";

                $(".portfoliobottombar .portfolionavtitle").text(itemtitle);
            };

            var get_portfolio_type = function (args) {
                var curobj = args.currentSlideObject;
                return $(curobj).attr('data-type');
            };

            var navigatoin_show_hide = function (args) {
                $(".portfolionavprev").fadeIn();
                $(".portfolionavnext").fadeIn();

                /** thumb **/
                var prevthumb = $($(args.currentSlideObject).prev()).data('thumb');
                var nextthumb = $($(args.currentSlideObject).next()).data('thumb');

                if (typeof prevthumb !== 'undefined') $(".pt-prev-bg").css({ backgroundImage: 'url(' + prevthumb + ')'});
                if (typeof nextthumb !== 'undefined') $(".pt-next-bg").css({ backgroundImage: 'url(' + nextthumb + ')'});

                /** navigation **/
                var total = $(".portfolio-content-holder").length;

                if (args.currentSlideNumber == 1) {
                    $(".portfolionavprev").stop().fadeOut();
                }

                if (args.currentSlideNumber == total) {
                    $(".portfolionavnext").stop().fadeOut();
                }
            };

            var load_next_image = function(currentslide, slidercontainer){
                var nextslide = ($(slidercontainer).find('.item').get(currentslide));
                var thumb = $(nextslide).data('thumb');
                var nextimage = $(nextslide).find('img');
                if($(nextimage).hasClass('notloaded')){
                    // load image
                    var fullimg = new Image();
                    $(fullimg).attr('src', $(nextimage).data('src'));
                    // load thumb
                    var thumbimg = new Image();
                    $(thumbimg).attr('src', thumb);
                }
            };

            var single_portfolio_arrange = function (callback) {
                $('.portfolio-slider-holder').iosSlider({
                    snapToChildren: true,
                    desktopClickDrag: true,
                    autoSlide: false,

                    navNextSelector: $('.portfolionavnext'),
                    navPrevSelector: $('.portfolionavprev'),

                    onSliderResize: function () {
                        single_portfolio_resize();

                        if (get_portfolio_type(prevargs) === 'image') {
                            panme(prevargs.currentSlideObject, $(".portfolio-slider-holder"));
                        }
                    },
                    onSliderLoaded: function (args) {
                        $(loader).fadeOut();
                        single_portfolio_resize();

                        // need to check first if element is image
                        if (get_portfolio_type(args) === 'image')
                            panme(args.currentSlideObject, $(".portfolio-slider-holder"));

                        // check previous portfolio type & delete element
                        prevargs = args;

                        // set item title
                        set_portfolio_item_title(args);
                        navigatoin_show_hide(args);

                        load_next_image(args.currentSlideNumber, args.sliderObject);
                        callback.call();
                    },
                    onSlideChange: function (args) {
                        if (get_portfolio_type(args) === 'image') {
                            var curslideobj = args.currentSlideObject;
                            var imgobj = $('img', curslideobj).get(0);

                            if ($(imgobj).hasClass('notloaded')) {
                                var datasrc = $(imgobj).data('src');
                                var img = new Image();

                                $(img).load(function () {
                                    $(imgobj).attr('src', datasrc);
                                    var size = $.new_get_image_container_size(imgobj, $(".portfolio-slider-holder"), options.imgfsmode);
                                    $(imgobj).css({
                                        'height': size[0],
                                        'width': size[1],
                                        'max-width': 'inherit'
                                    });
                                    jpobj.doTranslate(imgobj, size[2] + "px", size[3] + "px");
                                    $(imgobj).addClass('loaded').removeClass('notloaded');

                                    // attach panning method after item loaded
                                    panme(curslideobj, $(".portfolio-slider-holder"));
                                    load_next_image(args.currentSlideNumber, args.sliderObject);
                                }).attr('src', datasrc);
                            }

                            // attach panning automatically when item is already loaded
                            panme(curslideobj, $(".portfolio-slider-holder"));
                        }

                        // if in case portfolio is not an image
                        check_portfolio_type(args, prevargs);

                        // set item title
                        prevargs = args;
                        set_portfolio_item_title(args);
                        navigatoin_show_hide(args);
                    }
                });
            };


            /** pan image functionality ***/
            var paneimage = function (event) {
                var holder = $(event.target).parent('.portfolio-content-holder');
                var image = $(event.target);

                var mouseX = (event.pageX - holder.offset().left);
                var mouseY = (event.pageY - holder.offset().top);

                var topposition = ( $(image).height() - $(holder).height() ) * ( mouseY / $(holder).height() );
                var leftposition = ( $(image).width() - $(holder).width() ) * ( mouseX / $(holder).width() );

                jpobj.doTranslate(image, "-" + leftposition + "px", "-" + topposition + "px");
            };

            var prevelement = null;
            var dopane = function (element, container) {

                if (prevelement !== null) {
                    prevelement.unbind('mousemove', paneimage);
                }

                prevelement = element;
                element.bind('mousemove', paneimage);
            };

            var panetimeout = null;
            var panme = function (element, container) {
                if (options.imgfsmode === 'zoom' && !joption.ismobile) {
                    clearTimeout(panetimeout);
                    panetimeout = setTimeout(function () {
                        dopane(element, container.find('.item'));
                    }, 500);
                }
            };
            /** pan image end ***/

            var portfolio_content_nav_show = function (callback) {
                /** portfolio content animation */
                $(".portfolioholderwrap").show().animate({ 'margin-left': '0%' }, 800, 'easeInOutQuart', function () {
                    callback.call();
                });

                /** navigation bar **/
                if ($("body").hasClass('horizontalnav')) {
                    $(".portfolionavbar").fadeIn();
                } else {
                    $(".portfolionavbar").show().animate({ 'top': '0' }, 800, 'easeInOutQuart');
                }
                $(".portfoliobottombar").show().animate({ 'bottom': '0' }, 800, 'easeInOutQuart');
            };

            var show_password_form = function (url, from) {
                /** portfolio hide element **/
                $(".portfolioinfo").hide();
                $(".portfoliolove").hide();
                $(".portfolionavprev").hide();
                $(".portfolionavnext").hide();

                /** hide loader **/
                $(loader).fadeOut();

                /** show portfolio holder first to fix bug zero width **/
                if (from == 'left')    $(".portfolioholderwrap").css("margin-left", "-100%");
                else $(".portfolioholderwrap").css("margin-left", "100%");
                $(".portfolioholderwrap").show();

                portfolio_content_nav_show(function () {
                    /** give focus **/
                    $(".portfolio-form-body [name='password']").focus();
                });
            };

            var show_single_portfolio = function (url, from) {
                /** show portfolio holder first to fix bug zero width **/
                if (from == 'left')    $(".portfolioholderwrap").css("margin-left", "-100%");
                else $(".portfolioholderwrap").css("margin-left", "100%");
                $(".portfolioholderwrap").show();

                /** single portfolio IOS slider **/
                single_portfolio_arrange(function () {
                    portfolio_content_nav_show(function () {
                    });
                });
            };

            var animate_portfolio_content = function (url, from) {
                portfolionormalcontentpos();

                $(".portfolioholderwrap").imagesLoaded(function () {
                    if ($(".portfolio-content-slider").length) {
                        show_single_portfolio(url, from);
                    } else if ($(".portfolio-password-overlay").length) {
                        show_password_form(url, from);
                    }
                });
            };

            var initialize_portfolio = function () {
                $(element).imagesLoaded(function () {
                    resize_portfolio_content();
                    animate_portfolio_content(document.URL, 'left');
                });
            };


            var portfolioinfosize = function () {
                var ww = $(window).width();
                if (ww <= 640) return 100;
                if (ww <= 800) return 70;
                if (ww <= 1280) return 50;
                if (ww <= 1600) return 40;
                return 35;
            };

            var portfolioinfo = function (event) {
                event.preventDefault();
                var element = $(event.currentTarget);
                var parent = $(element).parent();

                if ($(parent).hasClass('opened')) {
                    $(parent).removeClass('opened');
                    $(".portfolio-content-wrapper").animate({ 'left': '100%' }, 1000, 'easeInOutQuart');
                    /*
                     $(".portfolio-content-slider").animate({width: '100%'},{
                     step: function(now, fx) {
                     $(window).trigger('resize');
                     },
                     duration : 1000,
                     easing : 'easeInOutQuart'
                     });
                     */
                } else {
                    $(parent).addClass('opened');
                    var size = portfolioinfosize();
                    var widthsize = size + "%";
                    var leftpost = ( 100 - size ) + "%";

                    $(".portfolio-content-wrapper").css('width', widthsize).animate({ 'left': leftpost }, 1000, 'easeInOutQuart');
                    if (!joption.ismobile) {
                        /*
                         $(".portfolio-content-slider").animate({width: leftpost},{
                         step: function(now, fx) {
                         $(window).trigger('resize');
                         },
                         duration : 1000,
                         easing : 'easeInOutQuart'
                         });
                         */
                    }
                }
            };

            var portfoliolove = function (event) {
                event.preventDefault();
                $(".portfolio-share-overlay").fadeIn();
            };

            var portfolioloveclose = function (event) {
                event.preventDefault();
                $(".portfolio-share-overlay").fadeOut();
            };

            var opensharing = function (event) {
                var element = event.currentTarget;
                var type = $(element).data('id');
                var urlsharing = '';

                var sharetitle = $(".portfoliolove").data('title');
                var shareurl = $(".portfoliolove").data('url');
                var sharecover = $(".portfoliolove").data('cover');

                switch (type) {
                    case "facebook":
                        urlsharing = "http://www.facebook.com/sharer.php?u=" + encodeURIComponent(shareurl);
                        break;
                    case "twitter":
                        urlsharing = "http://twitter.com/intent/tweet?url=" + encodeURIComponent(shareurl) + "&text=" + sharetitle;
                        break;
                    case "googleplus":
                        urlsharing = "https://plus.google.com/share?url=" + encodeURIComponent(shareurl);
                        break;
                    case "pinterest":
                        urlsharing = "http://pinterest.com/pin/create/button/?url=" + encodeURIComponent(shareurl)
                        + "&media=" + encodeURIComponent(sharecover)
                        + "&description=" + encodeURIComponent(sharetitle);
                        break;
                }

                $.open_in_new_tab(urlsharing);
                return false;
            };

            var password_keypress = function (e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                if (code == 13) {
                    submit_password();
                }
            };

            var submit_password = function (event) {
                var url = $(".portfolio-form-body [name='url']").val();
                var password = $(".portfolio-form-body [name='password']").val();
                portfolionextprev('left', url, password);
            };

            var portfolionextprev = function (dir, url, password) {
                var marginleft = ( dir == 'left' ) ? '100%' : '-100%';
                $(".portfolioinfo").removeClass("opened");

                /** navigation bar **/
                if ($("body").hasClass('horizontalnav')) {
                    $(".portfolionavbar").fadeOut();
                } else {
                    $(".portfolionavbar").show().animate({ 'top': '-50px' }, 800, 'easeInOutQuart');
                }
                $(".portfoliobottombar").animate({ 'bottom': '-45px' }, 800, 'easeInOutQuart');

                $(".portfolioholderwrap").show().animate({ 'margin-left': marginleft }, 800, 'easeInOutQuart', function () {
                    // reset all element first
                    portfolionormalcontentpos();
                    $(loader).fadeIn();

                    $.ajax({
                        url: url,
                        type: "post",
                        data: {
                            'password': password
                        },
                        success: function (data) {
                            var content = $(".portfolioholderwrap", data).html();

                            if ($(".portfolio-content-slider", data).length) {
                                var portfoliotitle = $(".portfolionavbar .portfolionavtitle", data).text();
                                var bottomtitle = $(".portfoliobottombar .portfolionavtitle", data).text();
                                var portfolionext = $(".portfolionext a", data).attr('href');
                                var portfolioprev = $(".portfolioprev a", data).attr('href');
                                var title = data.match("<title>(.*?)</title>")[1];

                                /** portfolio share parameter **/
                                var sharetitle = $(".portfoliolove", data).data('title');
                                var shareurl = $(".portfoliolove", data).data('url');
                                var sharecover = $(".portfoliolove", data).data('cover');
                                $(".portfoliolove")
                                    .attr('data-title', sharetitle)
                                    .attr('data-url', shareurl)
                                    .attr('data-cover', sharecover);

                                /** manage content **/
                                $(".portfolionext a").attr('href', portfolionext);
                                $(".portfolioprev a").attr('href', portfolioprev);
                                $(".portfolionavbar .portfolionavtitle").text(portfoliotitle);
                                $(".portfoliobottombar .portfolionavtitle").text(bottomtitle);
                            } else if ($(".portfolio-password-overlay", data).length) {
                                var portfoliotitle = $(".portfolionavbar .portfolionavtitle", data).text();
                                $(".portfolionavbar .portfolionavtitle").text(portfoliotitle);
                            }

                            $(".portfolioholderwrap").html(content);
                            animate_portfolio_content(url, dir);
                        }
                    });
                });
            };

            var portfolioprev = function (event) {
                var url = $(event.currentTarget).attr('href');
                portfolionextprev('right', url, null);
                event.preventDefault();
            };

            var portfolionext = function (event) {
                var url = $(event.currentTarget).attr('href');
                portfolionextprev('left', url, null);
                event.preventDefault();
            };

            // content portfolio clicked
            /* portfolio prev & next dibikin ga pake ajax lagi
             $(".portfoliocontent").on("click", ".portfolioprev a"  , portfolioprev);
             $(".portfoliocontent").on("click", ".portfolionext a"  , portfolionext);
             */
            $(".portfoliocontent").on("click", ".portfolioinfo a", portfolioinfo);
            $(".portfoliocontent").on('click', ".portfoliovideoclose a", close_portfolio_video);

            /** portfolio share **/
            $(".portfoliocontent").on("click", ".portfoliolove a", portfoliolove);
            $(".portfoliocontent").on("click", ".share-close", portfolioloveclose);
            $(".portfoliocontent").on("click", ".share-body > div", opensharing);

            // password bind
            $(".portfoliocontent").on("keypress", ".portfolio-form-body [name='password']", password_keypress);
            $(".portfoliocontent").on("click", ".portfolio-form-body .slider-button", submit_password);

            // bind element
            $(window).bind("resize", function (event) {
                resize_portfolio_content();
            });
            if (!joption.ismobile) $.portfolio_popup();
            initialize_portfolio();
        });


    };
})(jQuery);