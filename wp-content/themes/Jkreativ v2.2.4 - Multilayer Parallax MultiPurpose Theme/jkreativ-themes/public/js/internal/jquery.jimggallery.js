/***
 * @author : jegbagus
 * file name : jquery.jimggallery.js
 */

(function ($, PhotoSwipe, window, document) {
    "use strict";
    $.fn.jimggallery = function (options) {

        options = $.extend({
            loadcount: 10,
            totalpage: 1,
            loadAnimation: 'seqfade', // normal | fade | seqfade | upfade | sequpfade | randomfade | randomupfade
            gallerysize: 400,
            galleryexpand: 'magnific',
            slidedelay: 1000,
            dimension: 0.6,
            tiletype: 'normal', // normal || masonry
            photoswipeslideautoplay: 1,
            photoswipeslidedelay: 4000,
            photoswipehidetitle: 0,
            justifiedheight: 250,
            action: 'get_gallery_pagemore',
            imageScaleMethod: 'fit',
            gallerytype: 'isotopewrapper',
            photoswipescale: ''
        }, options);

        return $(this).each(function () {
            var element = $(this),
                container = $(this).find('.imagelist-content-wrapper ').find('> div'),
                loader = $('.portfolioloader'),
                photoswipe = null,
                curpage = 0,

                get_image_column_number = function (ww) {
                    ww = ww > 1920 ? 1920 : ww;
                    return Math.round(ww / options.gallerysize);
                },

                calc_normal_height = function (itemwidth, thisheight) {
                    var imgwidth = itemwidth * options.dimension;
                    return {
                        'itemheight': imgwidth * thisheight
                    };
                },

                checkdimension = function (element) {
                    var elementdim = $(element).height() / $(element).width(),
                        imagedim = $(element).find('img').height() / $(element).find('img').width();

                    $(element).find('img').removeClass('fixwidthportfolio');
                    if (elementdim > imagedim) {
                        $(element).find('img').addClass('fixwidthportfolio');
                    }
                },

                resize_gallery_item_list = function () {
                    var wrapperwidth = $('.imagelist-content-wrapper > div').width();

                    if (options.tiletype === 'normal' || options.tiletype === 'masonry') {
                        var portfolionumber = get_image_column_number(wrapperwidth),
                            itemwidth = Math.floor(wrapperwidth / portfolionumber);

                        $(".imggalitem", element).each(function () {
                            var thiswidth = parseFloat($(this).data('width')),
                                thisheight = parseFloat($(this).data('height'));

                            while ((  thiswidth * itemwidth > $(container).width() + 5  ) && thiswidth > 1) {
                                thiswidth = thiswidth - 1;
                            }

                            $(this).width(Math.floor(itemwidth * thiswidth) - ( options.margin * 2) - 1);

                            if (options.tiletype === 'normal') {
                                var res = calc_normal_height(itemwidth, thisheight);
                                $(this).css({ height: res.itemheight });

                                // check image
                                checkdimension(this);
                            }
                        });
                    } else if (options.tiletype === 'justified') {
                        var justifiedheight = options.justifiedheight,
                            imgarray = $(".imggalitem", element).find('img'),
                            dimension = [];

                        // get image dimension
                        $(imgarray).each(function (i) {
                            var imgwidth = $(imgarray[i]).get(0).naturalWidth,
                                imgheight = $(imgarray[i]).get(0).naturalHeight;

                            dimension[i] = {
                                'width': Math.floor(justifiedheight * imgwidth / imgheight),
                                'height': justifiedheight,
                                'img': this
                            };
                        });

                        // build row
                        var row = [],
                            rowcount = 0,
                            cachewrapperwidth = wrapperwidth;
                        row[rowcount] = [];

                        $(dimension).each(function () {
                            cachewrapperwidth = cachewrapperwidth - this.width;
                            if (cachewrapperwidth > 0) {
                                // use available row
                                row[rowcount].push(this);
                            } else {
                                // create another row
                                cachewrapperwidth = wrapperwidth - this.width;
                                row[++rowcount] = [];
                                row[rowcount].push(this);
                            }
                        });

                        // now begin to resize row content
                        var do_block_resize = function (element, ratio, height) {
                            $(element).each(function () {
                                var width = Math.floor(ratio * this.width);

                                $(this.img).parents('.imggalitem').css({
                                    'width': width,
                                    'height': height
                                });
                            });
                        };

                        var block_resize = function (element, totalwidth) {
                            var ratio = wrapperwidth / totalwidth,
                                height = Math.floor(justifiedheight * ratio);
                            do_block_resize(element, ratio, height);
                        };

                        $(row).each(function (i) {
                            // get current total width
                            var newelement = this,
                                totalwidth = 0;

                            $(newelement).each(function () {
                                totalwidth += this.width;
                            });

                            if (($(row).length - 1 ) === i) {
                                // last row, need to check if width we able to make it fullwidth
                                if ((wrapperwidth / totalwidth) < 1.5) {
                                    block_resize(newelement, totalwidth, i);
                                } else {
                                    do_block_resize(newelement, 1.10, justifiedheight * 1.1);
                                }
                            } else {
                                block_resize(newelement, totalwidth, i);
                            }
                        });
                    }
                },

                initialize_gallery = function () {

                    $(container).imagesLoaded(function () {

                        // image loaded check on ie
                        $(".isotopewrapper").checkimageloaded();

                        resize_gallery_item_list();

                        if (options.gallerytype === 'isotopewrapper') {
                            $(container).isotope({
                                itemSelector: ".imggalitem",
                                masonry: {
                                    columnWidth: 1
                                }
                            });
                        }

                        window.setTimeout(function () {
                            $(loader).fadeOut("slow");
                            $.animate_load(options.loadAnimation, container, $(container).find('.imggalitem.notloaded'), function () {
                                bind_load_more();
                                $(container).find('.imggalitem').removeClass('notloaded');
                            });
                        }, 500);


                        if (options.galleryexpand === 'magnific') {
                            $(container).magnificPopup({
                                type: 'image',
                                delegate: 'a',
                                mainClass: 'mfp-fade',
                                removalDelay: 160,
                                preloader: false,
                                gallery: {enabled: true},
                                callbacks: {
                                    elementParse: function (item) {

                                        if ($(item.el).data('type') === 'image') {
                                            item.type = 'image';
                                        } else if ($(item.el).data('type') === 'html5video') {
                                            item.type = 'inline';

                                            // video type
                                            var dummyvideotest = "<video></video>",
                                                canplaymp4 = $(dummyvideotest).get(0).canPlayType("video/mp4"),
                                                canplaywebm = $(dummyvideotest).get(0).canPlayType("video/webm"),
                                                canplayogg = $(dummyvideotest).get(0).canPlayType("video/ogg");

                                            // options
                                            options = {
                                                videoWidth: '100%',
                                                videoHeight: '100%'
                                            };

                                            // option video player (force to use flash)
                                            if (!window.joption.ismobile && ((canplaymp4 === 'maybe' || canplaymp4 === '') && (canplaywebm === 'maybe' || canplaywebm === '') && (canplayogg === 'maybe' || canplayogg === ''))) {
                                                options.mode = 'shim';
                                            }

                                            // option feature
                                            options.features = ['playpause', 'progress', 'current', 'duration', 'tracks', 'volume', 'fullscreen'];

                                            // exec media element player
                                            $(".html5popup-wrapper video").mediaelementplayer(options);
                                        } else if ($(item.el).data('type') === 'soundcloud-gallery') {
                                            item.type = 'iframe';
                                            item.src = "https://w.soundcloud.com/player/?url=" + encodeURIComponent(item.src);
                                        } else {
                                            item.type = 'iframe';
                                        }
                                    }
                                }
                            });
                        } else if (options.galleryexpand === 'photoswipe') {
                            // photoswipe

                            photoswipe = $(container).find('.imggalitem a[data-type="image"]').photoSwipe({
                                autoStartSlideshow: options.photoswipeslideautoplay,
                                slideshowDelay: options.photoswipeslidedelay,
                                captionAndToolbarShowEmptyCaptions: options.photoswipehidetitle,
                                imageScaleMethod: options.photoswipescale,
                                margin: 0,
                                nextPreviousSlideSpeed: 400,
                                slideSpeed: 400,
                                captionAndToolbarOpacity: 1,
                                captionAndToolbarFlipPosition: true,
                                getImageSource: function (obj) {
                                    return $(obj).attr('href');
                                },
                                getImageCaption: function (obj) {
                                    return $(obj).find('a').attr('title');
                                }
                            });

                            photoswipe.addEventHandler(PhotoSwipe.EventTypes.onHide, function () {
                                $(window).trigger('resize');
                            });
                        } else if (options.galleryexpand === 'swipebox') {
                            $(container).find('a').swipebox({
                                useCSS: true,
                                useSVG: true,
                                hideBarsOnMobile: true,
                                hideBarsDelay: 3000,
                                videoMaxWidth: 1400,
                                beforeOpen: function () {
                                },
                                afterClose: function () {
                                }
                            });
                        }
                    });
                },

                do_loadmore = function () {
                    if (curpage < (options.totalpage - 1)) {
                        $(".galleryloadmore").fadeIn();

                        $.ajax({
                            url: options.adminurl,
                            type: "post",
                            dataType: "html",
                            data: {
                                'page': ++curpage,
                                'action': options.action,
                                'pageid': options.pageid
                            },
                            success: function (data) {
                                if (data === '') {
                                    $(".galleryloadmore").fadeOut();
                                } else {
                                    var $newEls = $(data);
                                    $(container).append($newEls);
                                    $(container).imagesLoaded(function () {
                                        // image loaded check on ie
                                        $(".isotopewrapper").checkimageloaded();
                                        $(".galleryloadmore").fadeOut();
                                        if (options.gallerytype === 'isotopewrapper') {
                                            resize_gallery_item_list();

                                            $newEls.each(function(){
                                                $(this).removeClass('notloaded').addClass('alreadyloaded');;
                                            });

                                            $(container).append($newEls).isotope('appended', $newEls);

                                            window.setTimeout(function () {
                                                resize_gallery_item_list();
                                                $(container).isotope('layout');
                                                window.setTimeout(function () {
                                                    $(window).trigger('resize');
                                                }, 2000);
                                                bind_load_more();
                                            }, 1000);

                                            if (options.galleryexpand === 'photoswipe') {
                                                window.Code.PhotoSwipe.unsetActivateInstance(photoswipe);
                                                window.Code.PhotoSwipe.detatch(photoswipe);

                                                photoswipe = $(container).find('.imggalitem a[data-type="image"]').photoSwipe({
                                                    autoStartSlideshow: options.photoswipeslideautoplay,
                                                    slideshowDelay: options.photoswipeslidedelay,
                                                    captionAndToolbarShowEmptyCaptions: options.photoswipehidetitle,
                                                    imageScaleMethod: options.photoswipescale,
                                                    margin: 0,
                                                    nextPreviousSlideSpeed: 400,
                                                    slideSpeed: 400,
                                                    captionAndToolbarOpacity: 1,
                                                    captionAndToolbarFlipPosition: true,
                                                    getImageSource: function (obj) {
                                                        return $(obj).attr('href');
                                                    },
                                                    getImageCaption: function (obj) {
                                                        return $(obj).find('img').attr('alt');
                                                    }
                                                });

                                                photoswipe.addEventHandler(PhotoSwipe.EventTypes.onHide, function () {
                                                    $(window).trigger('resize');
                                                });
                                            }

                                        } else {
                                            $(container).append($newEls);
                                            $(container).find('.imggalitem').removeClass('notloaded');
                                        }
                                    });
                                }
                            }
                        });
                    }
                };

            var loadmorecheckrange = 100;
            var check_loadmore = function () {
                if (window.jpobj.globaltop + $(window).height() > $(document).height() - loadmorecheckrange) {
                    $(window).unbind('jscroll', check_loadmore);
                    do_loadmore();
                }
            };


            var bind_load_more = function () {
                $(window).bind('jscroll', check_loadmore);
                check_loadmore();
            };


            initialize_gallery();
            $(window).bind({
                resize: function () {
                    resize_gallery_item_list();
                }
            });

        });
    };
})(jQuery, window.Code.PhotoSwipe, window, document);