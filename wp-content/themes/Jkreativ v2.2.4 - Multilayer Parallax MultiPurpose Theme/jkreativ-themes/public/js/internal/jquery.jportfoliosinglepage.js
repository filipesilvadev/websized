/**
 * jquery.jportfoliosinglepage.js
 */
(function ($) {
    "use strict";
    $.fn.jportfoliosinglepage = function (options) {

        options = $.extend({
            imgfsmode: 'zoom'
        }, options);

        return $(this).each(function () {
            var element = this;
            var loader = $('.portfolioloader');

            var prevargs = null;
            var args = null;

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

            var get_portfolio_type = function (args) {
                var curobj = args.currentSlideObject;
                return $(curobj).attr('data-type');
            };

            var open_portfolio_video = function (event) {
                var curobj = $(event.target).parents(".portfolio-content-holder");
                var type = $(curobj).attr('data-type');

                $(".closeportfoliovideo").bind('click', close_portfolio_video);
                $(".portfolio-navigation, .portfoliobottombar").fadeOut();
                $(".portfoliovideo-container").fadeIn();
                $(".closeportfoliovideo").slideDown();
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
                }
                ;
            };

            var close_portfolio_video = function () {
                $(".video-container", element).html("");
                $(".html5-video-container").html("");
                $(".closeportfoliovideo").unbind('click', close_portfolio_video).slideUp();
                $(".portfolio-navigation, .portfoliobottombar").fadeIn();

                setTimeout(function () {
                    $(".portfoliovideo-container").fadeOut("slow");
                }, 500);
            };

            var check_portfolio_type = function (args, prevargs) {
                var prevobj = prevargs.currentSlideObject;
                var type = $(prevobj).attr('data-type');

                if (type == 'youtube' || type == 'vimeo' || type == 'soundcloud') {
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

            var single_portfolio_arrange = function () {
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
                        // set_portfolio_item_title(args);
                        navigatoin_show_hide(args);

                        load_next_image(args.currentSlideNumber, args.sliderObject);
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
                                        'max-width': 'inherit',
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
                        // set_portfolio_item_title(args);
                        navigatoin_show_hide(args);
                    }
                });
            };

            single_portfolio_arrange();
        });
    };
})(jQuery);