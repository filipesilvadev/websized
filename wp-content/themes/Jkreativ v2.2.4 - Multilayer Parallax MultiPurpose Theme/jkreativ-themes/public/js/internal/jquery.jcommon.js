/** jquery.jcommon.js **/
(function ($, window) {
    "use strict";

    $.fn.checkimageloaded = function () {
        $(this).find("img").each(function(i){
            var element = this;
            setTimeout(function(){
                var src = $(element).attr('src');
                var img = new Image();
                $(img).load(function () {}).attr('src', src);
            }, i * 200);
        });
    };

    /** reduced element **/
    $.jreducedtop = function () {
        var reducedelement = ['.headermenu', '.responsiveheader', '.topnavigation'];
        var ofset = 0;

        $(reducedelement).each(function () {
            var ele = $(this);
            if ($(ele).is(":visible")) {
                ofset -= $(ele).height();
            }
        });

        if($(".toptransparent").length && $(window).width() > 1024) {
            return 0;
        }

        return ofset;
    };

    $.jreducedtoplanding = function () {
        var ishorizontal = $(".horizontalnav").length;
        var istwoline = $(".topnavtwoline").length;
        var issmallnav = $(".topnavsmaller").length;
        var issidenav = $(".sidenav").length;
        var issidenoheadermenu = $(".noheadermenu").length;
        var offset = 0;

        if ($(window).width() > 1024) {
            if (issidenav) {
                if (issidenoheadermenu) {
                    offset = 0;
                } else {
                    offset = $(".headermenu").height();
                }
            } else if (ishorizontal) {
                if (!issmallnav && !istwoline) {
                    offset = $(".topnavigation").height();
                } else if (istwoline && !issmallnav) {
                    offset = $(".topwrapperbottom").height();
                } else if (issmallnav && !istwoline) {
                    offset = window.joption.smallmenuheight;
                } else if (istwoline && issmallnav) {
                    offset = window.joption.smallmenuheight;
                }
            }
        } else {
            offset = $('.responsiveheader').height();
        }

        return -1 * offset;
    };

    $.fn.joffset = function () {
        $(this).show();
        var offset = $(this).offset();
        $(this).hide();
        return offset;
    };

    $.fn.jwidth = function () {
        $(this).show();
        var width = $(this).outerWidth();
        $(this).hide();
        return width;
    };

    /** accordion page **/
    $.fn.jaccordionpage = function () {
        var element = $(this);
        var firstelement = $(".halfpagepanel", element).get(0);

        var initialize = function () {
            $(firstelement).addClass('active');
            $(".halfpagepanel-body").stop().slideUp("fast", function () {
                $(window).trigger('resize');
            });
            $(".halfpagepanel-body", firstelement).stop().slideDown("fast");
        };

        var collapseme = function (e) {
            var target = e.target;
            var targetelement = $(target).parent(".halfpagepanel");

            var slidetargetelement = function (target) {
                $(".halfpagepanel", element).removeClass('active');
                $(".halfpagepanel-body", element).stop().slideUp("fast");
                $(".halfpagepanel-body", target).stop().slideDown("fast");
                $(target).addClass('active');
            };

            if ($(targetelement).hasClass('active')) {
                target = $(targetelement).next().length > 0 ? $(targetelement).next() : $(targetelement).prev();
                slidetargetelement(target);
            } else {
                slidetargetelement(targetelement);
            }
        };

        initialize();
        $(".halfpagepanel-header", element).bind('click', collapseme);
    };

    /**** fullscreen ****/
    $.fn.fsfullheight = function (topelements) {
        var element = this;
        var calculateheight = function () {
            var wh = $(window).height();

            if(!$(".toptransparent").length) {
                $(topelements).each(function () {
                    var ele = $(this);
                    if ($(ele).is(":visible")) {
                        wh -= $(ele).outerHeight();
                    }
                });
            }

            if (wh < 320) {
                wh = 320;
            }
            $(element).css({ 'height': wh });
        };

        $(window).bind('resize load', calculateheight);
        $(document).bind('ready', calculateheight);
    };

    /**** share function ****/


    $.youtube_parser = function (url) {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
        var match = url.match(regExp);

        if (match && match[7].length === 11) {
            return match[7];
        }
        /*jshint latedef: true */
        window.alert("Url Incorrect");
    };

    $.vimeo_parser = function (url) {
        var regExp = /http:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
        var match = url.match(regExp);

        if (match) {
            return match[2];
        }

        // check if using https
        regExp = /https:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
        match = url.match(regExp);

        if (match) {
            return match[2];
        }

        /*jshint latedef: true */
        window.alert("not a vimeo url");
    };

    $.type_video_youtube = function (ele, autoplay, repeat) {
        var youtube_id = $.youtube_parser($(ele).attr('data-src'));
        var additionalstring = '';
        var iframe = '';
        if(repeat) {
            additionalstring += ( autoplay === true ) ? "autoplay=1&" : "";
            additionalstring += (repeat === true ) ? "loop=1&playlist=" + youtube_id : "";
            iframe = '<iframe width="700" height="500" src="http://www.youtube.com/v/' + youtube_id + '?version=3&' + additionalstring + 'showinfo=1&theme=light&autohide=1&rel=0&wmode=opaque" frameborder="0" allowfullscreen></iframe>';
        } else {
            additionalstring += ( autoplay === true ) ? "autoplay=1&" : "";
            iframe = '<iframe width="700" height="500" src="http://www.youtube.com/embed/' + youtube_id + '?' + additionalstring + 'showinfo=1&theme=light&autohide=1&rel=0&wmode=opaque" frameborder="0" allowfullscreen></iframe>';
        }
        $('.video-container', ele).append(iframe);
    };

    $.type_video_vimeo = function (ele, autoplay, repeat) {
        var vimeo_id = $.vimeo_parser($(ele).attr('data-src'));
        var additionalstring = '';
        additionalstring += ( autoplay === true ) ? "autoplay=1&" : "";
        additionalstring += (repeat === true ) ? "loop=1&" : "";
        var iframe = '<iframe src="http://player.vimeo.com/video/' + vimeo_id + '?' + additionalstring + 'title=0&byline=0&portrait=0" width="700" height="500" frameborder="0"></iframe>';
        $('.video-container', ele).append(iframe);
    };

    $.type_soundcloud = function (ele) {
        var soundcloudurl = $(ele).attr('data-src');
        var iframe = '<iframe src="https://w.soundcloud.com/player/?url=' + encodeURIComponent(soundcloudurl) + '" width="700" height="500" frameborder="0"></iframe>';
        $('.video-container', ele).append(iframe);
    };

    $.type_video_html5 = function (ele, autoplay, options, container) {
        var cover = $(ele).data('cover');

        options.pauseOtherPlayers = false;

        var videomp4 = '';
        var videowebm = '';
        var videoogg = '';

        /*
        var dummyvideotest = "<video></video>";
        var canplaymp4 = $(dummyvideotest).get(0).canPlayType("video/mp4");
        var canplaywebm = $(dummyvideotest).get(0).canPlayType("video/webm");
        var canplayogg = $(dummyvideotest).get(0).canPlayType("video/ogg");

        if (!window.joption.ismobile && ((canplaymp4 === 'maybe' || canplaymp4 === '') && (canplaywebm === 'maybe' || canplaywebm === '') && (canplayogg === 'maybe' || canplayogg === ''))) {
            options.mode = 'shim';
            options.pluginPath = window.joption.themesurl + "/public/mediaelementjs/";
            options.flashName = 'flashmediaelement.swf';
        }
        */

        if ($(ele).data('mp4') !== '') {
            videomp4 = "<source type='video/mp4' src='" + $(ele).data('mp4') + "' />";
        }

        if ($(ele).data('webm') !== '') {
            videowebm = "<source type='video/webm' src='" + $(ele).data('webm') + "' />";
        }

        if ($(ele).data('ogg') !== '') {
            videoogg = "<source type='video/ogg' src='" + $(ele).data('ogg') + "' />";
        }

        var preload = autoplay ? "preload='auto'" : "preload='none'";
        var object = "<object width='100%' height='100%' type='application/x-shockwave-flash' data='" + window.joption.themesurl + "/public/mediaelementjs/flashmediaelement.swf'>" +
            "<param name='movie' value='" + window.joption.themesurl + "/public/mediaelementjs/flashmediaelement.swf' />" +
            "<param name='flashvars' value='controls=true&file=" + $(ele).data('mp4') + "' />" +
            "<img src='" + cover + "' alt='No video playback capabilities' title='No video playback capabilities' />" +
            "</object>";
        var iframe = "<video id='player' poster='" + cover + "' controls='controls' " + preload + ">" +
            videomp4 + videowebm + videoogg +
            // object +
            "</video>";

        $(container, ele).append(iframe);
        if (autoplay) {
            options.success = function (mediaElement) {
                if (mediaElement.pluginType === 'flash') {
                    mediaElement.addEventListener('canplay', function () {
                        mediaElement.play();
                    }, false);
                } else {
                    mediaElement.play();
                }
            };
        }

        $(ele).find('video').mediaelementplayer(options);
    };

    $.get_image_container_size = function (img, container, nocrop) {
        var nh, nw, nt, nl;

        var h = $(img).get(0).naturalHeight;
        var w = $(img).get(0).naturalWidth;

        if (h === 0) {
            h = $(img).data('height');
            w = $(img).data('width');
        }

        var r = ( h / w );
        var wh = $(container).height();
        var ww = $(container).width();
        var wr = wh / ww;

        var resizeWidth = function () {
            nw = ww;
            nh = ww * r;
            nl = ( ww - nw ) / 2;
            nt = ( wh - nh ) / 2;

            return [nh, nw, nl, nt];
        };

        var resizeHeight = function () {
            nw = wh / r;
            nh = wh;
            nl = ( ww - nw ) / 2;
            nt = ( wh - nh ) / 2;
            return [nh, nw, nl, nt];
        };

        if (nocrop) {
            if (wr > r) {
                return resizeWidth();
            }
            return resizeHeight();
        }
        if (wr > r) {
            return resizeHeight();
        }
        return resizeWidth();

    };

    $.new_get_image_container_size = function (img, container, mode) {
        var nh, nw, nt, nl;

        var h = $(img).get(0).naturalHeight;
        var w = $(img).get(0).naturalWidth;

        if (h === 0) {
            h = $(img).data('height');
            w = $(img).data('width');
        }

        var r = ( h / w );
        var wh = $(container).height();
        var ww = $(container).width();
        var wr = wh / ww;

        var resizeWidth = function () {
            nw = ww;
            nh = ww * r;
            nl = ( ww - nw ) / 2;
            nt = ( wh - nh ) / 2;

            return [nh, nw, nl, nt];
        };

        var resizeHeight = function () {
            nw = wh / r;
            nh = wh;
            nl = ( ww - nw ) / 2;
            nt = ( wh - nh ) / 2;
            return [nh, nw, nl, nt];
        };

        var resizenoupscale = function () {
            nw = w;
            nh = h;
            nl = ( ww - nw ) / 2;
            nt = ( wh - nh ) / 2;
            return [nh, nw, nl, nt];
        };

        if (mode === 'fit') {
            if (wr > r) {
                return resizeWidth();
            }
            return resizeHeight();
        }

        if (mode === 'zoom') {
            if (wr > r) {
                return resizeHeight();
            }
            return resizeWidth();
        }

        if (mode === 'fitNoUpscale') {
            if (h > wh || w > ww) {
                return $.new_get_image_container_size(img, container, "fit");
            }

            return resizenoupscale();
        }
    };

    $.portfolio_popup = function () {
        $(".ppopup a").hoverIntent({
            over: function () {
                var parent = $(this).parent();
                var element = $(parent).find('.portfoliopopup');
                var offset = $(parent).position();
                var h = $(parent).height();
                var w = $(parent).width();

                $(element).css({
                    'display': 'block',
                    'position': 'fixed',
                    'top': 0,
                    'left': 0
                });
                var ew = $(element).width();
                $(element).css({'width': ew + 2});

                if (element.hasClass('ppopup-left')) {
                    $(element).css({
                        'position': 'absolute',
                        'display': 'block',
                        'left': offset.left - 8,
                        'top': h + 30
                    }).animate({
                        'opacity': 1,
                        'top': h
                    }, 300);

                } else {

                    $(element).css({
                        'position': 'absolute',
                        'display': 'block',
                        'left': offset.left - ew + ( w / 2 ) - 2,
                        'top': h + 30
                    }).animate({
                        'opacity': 1,
                        'top': h
                    }, 300);
                }
            },
            out: function () {
                var parent = $(this).parent();
                var element = $(parent).find('.portfoliopopup');
                var h = $(parent).height();
                $(element).animate({
                    'top': h + 30,
                    'opacity': 0
                }, 300, function () {
                    $(element).css({
                        'display': 'none',
                        'top': 0,
                        'left': 0,
                        'opacity': 0
                    });
                });
            },
            timeout: 250
        });

        if ($(".portfoliobottomnav").length) {
            $(".portfoliobottomnav  > div").hoverIntent({
                over: function () {
                    var element = $(this).find('.portfoliopopup');
                    var offset = $(this).position();
                    var h = $(this).height();
                    var w = $(this).width();

                    if ($(element).hasClass('leftpopup')) {
                        $(element).css({
                            'display': 'block',
                            'left': offset.left + 2,
                            'top': ( h * -1 ) - 30
                        }).animate({
                            'opacity': 1,
                            'top': ( h * -1 )
                        }, 300);
                    } else {
                        $(element).css({
                            'display': 'block',
                            'left': offset.left - $(element).width() + ( w / 2 ) - 2,
                            'top': ( h * -1 ) - 30
                        }).animate({
                            'opacity': 1,
                            'top': ( h * -1 )
                        }, 300);
                    }
                },
                out: function () {
                    var element = $(this).find('.portfoliopopup');
                    var h = $(this).height();

                    $(element).animate({
                        'top': ( h * -1 ) - 30,
                        'opacity': 0
                    }, 300, function () {
                        $(element).css({
                            'display': 'none',
                            'top': 0,
                            'left': 0,
                            'opacity': 0
                        });
                    });
                },
                timeout: 250
            });
        }
    };

    $.open_in_new_tab = function (url) {
        // var win = window.open(url, '_blank');
        var win = window.open(url, '_blank', 'location=yes,height=400,width=800,scrollbars=yes,status=yes');
        win.focus();
    };

    $.setuptop = function (animarr) {
        // setup item
        $(animarr).each(function () {
            var $item = $(this),
                t = parseInt($item.css('top'), 10) + ( $item.height() / 2);
            $item.css({
                top: t + 'px',
                opacity: 0
            });
        });
    };


    $.shuffleitem = function (animarr) {
        var array = [];
        $(animarr).each(function (i) {
            array[i] = $(this);
        });

        // shuffle
        var copy = [], n = array.length, i;
        while (n) {
            i = Math.floor(Math.random() * array.length);
            if (i in array) {
                copy.push(array[i]);
                delete array[i];
                n--;
            }
        }

        return copy;
    };

    $.animate_hide = function (animation, container, animarr, callback) {
        var animationtimeout = 0;

        if (animation === "fade" || animation === "normal") {
            $(animarr).each(function () {
                var element = $(this);
                $(this).animate({
                    "opacity": 0
                }, 800, function(){
                    $(element).addClass('isotope-hide-element');
                    $(element).remove();
                    // $(container).isotope('remove', $(element));
                });
            });
            animationtimeout = 1000;
        } else if (animation === "seqfade" || animation === "upfade" || animation === "sequpfade") {
            $($(animarr).get().reverse()).each(function (i) {
                var element = $(this);
                window.setTimeout(function () {
                    $(element).show().animate({
                        "opacity": 0
                    }, 800, function(){
                        $(element).addClass('isotope-hide-element');
                        $(element).remove();
                        // $(container).isotope('remove', $(element));
                    });
                }, 100 + i * 50);
            });
            animationtimeout = 1000 + $(animarr).length * 50;
        } else if (animation === "randomfade" || animation === "randomupfade") {
            var shufflearray = $.shuffleitem(animarr);
            $(shufflearray).each(function (i) {
                var element = $(this);
                window.setTimeout(function () {
                    $(element).show().animate({
                        "opacity": 0
                    }, 800, function(){
                        $(element).addClass('isotope-hide-element');
                        $(element).remove();
                        // $(container).isotope('remove', $(element));
                    });
                }, 100 + i * 50);
            });
            animationtimeout = 1000 + $(animarr).length * 50;
        }

        window.setTimeout(function () {
            $(container).isotope('remove', $(animarr));
            callback.call();
        }, animationtimeout);
    };

    $.animate_load = function (animation, container, animarr, callback) {
        var animationtimeout = 0;
        var shufflearray;
        var i;

        // hide all element that not yet loaded
        $(animarr).each(function () {
            $(this).css({"opacity": 0});
        });

        if (animation === "normal") {
            $(animarr).each(function () {
                $(this).css({"opacity": 1});
            });
            animationtimeout = 1000;
        } else if (animation === "fade") {
            $(animarr).each(function () {
                $(this).animate({
                    "opacity": 1
                }, 1000);
            });
            animationtimeout = 1000;
        } else if (animation === "seqfade") {
            $(animarr).each(function (i) {
                var element = $(this);
                window.setTimeout(function () {
                    $(element).show().animate({
                        "opacity": 1
                    }, 1000);
                }, 100 + i * 50);
            });
            animationtimeout = 500 + ($(animarr).length * 50);
        } else if (animation === "upfade") {
            $.setuptop(animarr);
            $(animarr).each(function () {
                var element = $(this);
                $(element).animate({
                    top: parseInt($(element).css('top'), 10) - ( $(element).height() / 2),
                    opacity: 1
                }, 1500);
            });
            animationtimeout = 2000;
        } else if (animation === "sequpfade") {
            $.setuptop(animarr);
            $(animarr).each(function (i) {
                var element = $(this);
                window.setTimeout(function () {
                    $(element).animate({
                        top: parseInt($(element).css('top'), 10) - ( $(element).height() / 2),
                        opacity: 1
                    }, 1000);
                }, 100 + i * 50);
            });
            animationtimeout = 500 + ($(animarr).length * 50);
        } else if (animation === "randomfade") {
            shufflearray = $.shuffleitem(animarr);
            var animaterandomfade = function () {
                var element = shufflearray.pop();
                $(element).animate({
                    "opacity": 1
                }, 1000);
            };
            for (i = 0; i < shufflearray.length; i++) {
                window.setTimeout(animaterandomfade, 75 + i * 50);
            }
            animationtimeout = 500 + ($(animarr).length * 50);
        } else if (animation === "randomupfade") {
            shufflearray = $.shuffleitem(animarr);
            $.setuptop();
            var animaterandomupfade = function () {
                var element = shufflearray.pop();
                $(element).animate({
                    top: parseInt($(element).css('top'), 10) - ( $(element).height() / 2),
                    opacity: 1
                }, 1000);
            };
            for (i = 0; i < shufflearray.length; i++) {
                window.setTimeout(animaterandomupfade, 75 + i * 50);
            }
            animationtimeout = 500 + ($(animarr).length * 50);
        }

        window.setTimeout(function () {
            callback.call();
        }, (animationtimeout + 1000));
    };

    $.bindComment = function () {
        $(".replycomment").click(function () {
            var i = $(this).parents(".coment-box").parent();
            var f = $("#respond");
            var x = $("<div id='comment-box-reply'></div>");
            var t = $("<div id='temp-comment-holder' style='display:none;'></div>");
            var p = $("#comment_parent");
            var c = "data-comment-id";

            $(".closecommentform").removeClass('liststyle');
            $(".replycomment").show();
            $("#comment-box-reply").remove();

            if (!$("#temp-comment-holder").length) {
                t.insertBefore(f);
            }

            x.insertAfter($(i).find('.coment-box-inner')).append(f);
            p.val($(this).attr(c));

            $(this).hide();

            $(i).find(".closecommentform").addClass('liststyle').click(function () {
                f.insertAfter("#temp-comment-holder");
                $("#temp-comment-holder").remove();
                $("#comment-box-reply").remove();
                $(this).removeClass('liststyle');
                $(i).find('.replycomment').show();
                $("#comment_parent").val(0);
            });
        });
    };

    $.fn.jsharefollow = function () {
        return $(this).each(function () {
            var element = this;
            var parent = $(element).parents(".article-inner-wrapper");
            var posmeta = {};
            var addmargin = 15;

            var ishorizontal = $(".horizontalnav").length;
            var istwoline = $(".topnavtwoline").length;
            var issmallnav = $(".topnavsmaller").length;
            var issidenav = $(".sidenav").length;
            var issidenoheadermenu = $(".noheadermenu").length;

            var updateposmeta = function () {
                var topmargin = 0;

                if(issidenav) {
                    if(issidenoheadermenu) {
                        topmargin = 0;
                    } else {
                        topmargin = $(".headermenu").height();
                    }
                } else if(ishorizontal) {
                    topmargin = $(".topnavigation").height();

                    if(window.jpobj.globaltop > window.joption.menucollapsed) {
                        if (istwoline && !issmallnav) {
                            topmargin = $(".topwrapperbottom").height();
                        } else if( ( issmallnav && !istwoline ) || ( istwoline && issmallnav ) ) {
                            topmargin = window.joption.smallmenuheight;
                        }
                    }
                }

                topmargin = parseInt(topmargin, 10);

                posmeta = {
                    scrollbegin: parent.offset().top - topmargin,
                    scrollstop: parent.offset().top - topmargin + parent.height() - $(element).outerHeight(true)
                };
            };

            var updateposition = function () {
                updateposmeta();
                var scrollpos = window.jpobj.globaltop;

                if (scrollpos > posmeta.scrollbegin - addmargin && scrollpos < posmeta.scrollstop) {
                    var topposition = scrollpos - posmeta.scrollbegin + addmargin;
                    $(element).css({ 'top': topposition });
                } else if (scrollpos < posmeta.scrollbegin - addmargin) {
                    $(element).css({ 'top': 0 });
                } else if (scrollpos > posmeta.scrollstop) {
                    $(element).css({ 'top': parent.height() - $(element).outerHeight(true) });
                }

            };

            updateposmeta();
            $(window).bind('jscroll', updateposition);
            $(window).bind('resize', function () {
                updateposmeta();
                updateposition();
            });
        });
    };

    $.fn.jrmap = function () {
        return $(this).each(function () {
            var element = this;
            var content = $(element).find('.contenthidden').html();
            var options = {
                lat: $(element).data('lat'),
                lng: $(element).data('lng'),
                zoom: $(element).data('zoom'),
                ratio: $(element).data('ratio'),
                showpopup: $(element).data('showpopup'),
                title: $(element).data('title')
            };

            var mapresize = function () {
                var elewidth = $(element).width();
                $(element).height(elewidth * options.ratio);
            };

            var createmap = function () {

                var eleid = $(element).attr('id');
                var mapOptions = {
                    zoom: parseInt(options.zoom, 10),
                    center: new google.maps.LatLng(parseFloat(options.lat), parseFloat(options.lng)),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    zoomControl: true,
                    scaleControl: false,
                    panControl: false,
                    scrollwheel: false
                };
                var map = new google.maps.Map(document.getElementById(eleid), mapOptions);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(parseFloat(options.lat), parseFloat(options.lng)),
                    map: map,
                    zIndex: 10,
                    title: options.title
                });


                if (options.showpopup === true) {

                    var contentString = '<div id="mapcontent">' +
                        '<h3>' + options.title + '</h3>' +
                        '<div id="bodyContent">' +
                        content +
                        '</div>' +
                        '</div>';

                    var infowindow = new google.maps.InfoWindow({
                        content: contentString,
                        maxWidth: 300
                    });

                    google.maps.event.addListener(marker, 'click', function () {
                        infowindow.open(map, marker);
                    });

                    window.setTimeout(function () {
                        infowindow.open(map, marker);
                    }, 5000);
                }

            };

            $(window).bind('resize', mapresize);
            mapresize();
            google.maps.event.addDomListener(window, 'load', createmap);
        });
    };

    $.fn.jskill = function () {
        return $(this).each(function () {
            var element = $(this);

            window.setTimeout(function () {
                element.waypoint(function (direction) {
                    var grapwrap = $(this).find('.graphwrap');

                    $(grapwrap).each(function (i) {
                        var ele = $(this);

                        window.setTimeout(function () {
                            var width = $(ele).find('.grapholder').attr('data-width') + '%';
                            $(ele).find('.grapholder').css('width', width);
                            $(ele).find('strong').css('opacity', 1);
                        }, 200 * i);
                    });
                }, {
                    offset: '80%',
                    triggerOnce: true,
                    context: window
                });
            }, 1000);
        });
    };


    $.fn.jfsvideo = function (autoplay) {
        return $(this).each(function () {
            var element = this;

            if ($(element).data('type') === 'youtube') {
                $.type_video_youtube($("[data-type='youtube']"), autoplay);
            }

            if ($("[data-type='vimeo']").length) {
                $.type_video_vimeo($("[data-type='vimeo']"), autoplay);
            }

            if ($("[data-type='soundcloud']").length) {
                $.type_soundcloud($("[data-type='soundcloud']"));
            }
        });
    };

    $.jgetbrowser = function () {
        var e = navigator.appName, t = navigator.userAgent, n;
        var r = t.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
        if (r && ( n = t.match(/version\/([\.\d]+)/i)) !== null) {
            r[2] = n[1];
        }
        r = r ? [r[1], r[2]] : [e, navigator.appVersion, "-?"];
        return r[0];
    };


    $.fn.jfullvideo = function () {
        return $(this).each(function () {
            var element = $(this);
            var video = $(this).find('video');
            var vparent = $(video).parent();
            var dimvid = $(video).data('height') / $(video).data('width');
            var parallax_enabled = $(this).hasClass('parallaxvideo');

            var calculatevideo = function () {
                $(element).find(".mejs-video").css({
                    'width' :  $(vparent).width(),
                    'height' : $(vparent).height()
                });

                var videotopposition, videoleftposition, elementdim;
                if(parallax_enabled) {
                    elementdim = $(window).height() / $(window).width();
                } else {
                    elementdim = $(element).height() / $(element).width();
                }

                $(video).attr('style', '');
                if (elementdim > dimvid) {
                    $(video).removeClass("heightauto").addClass("widthauto");
                    videoleftposition = ( $(video).width() - $(vparent).width() ) / 2;
                    $(video).css('left', "-" + videoleftposition + "px");
                } else {
                    $(video).removeClass("widthauto").addClass("heightauto");
                    videotopposition = ( $(video).height() - $(vparent).height() ) / 2;
                    $(video).css('top', "-" + videotopposition + "px");
                }
            };

            if (!window.joption.ismobile) {

                var videomedia = $(video).mediaelementplayer({
                    enableAutosize: true,
                    videoWidth: '100%',
                    videoHeight: '100%',
                    followContainerHeight: true,
                    pauseOtherPlayers: false,
                    features: []
                });

                $(videomedia).bind('play', function(){
                    var resizetimeout = 0;
                    $(window).bind('resize', function(){
                        window.clearTimeout(resizetimeout);
                        resizetimeout = window.setTimeout(function(){
                            calculatevideo();
                        }, 200);
                    });
                });

            } else {
                $(element).find('.video-fallback').show();
            }

        });
    };

})(jQuery, window);


/** jpobj **/
jpobj = {
    supportTranslate3d: null,
    supportTransition: null,
    isMobile: null,
    doTranslate: null,
    browser: null,
    isIphone: false,
    isAndroid: false
};

(function ($, window, document) {
    "use strict";

    var isSupport3d = function () {
        var el = document.createElement('div'),
            supportsTranslate3D, transforms = {
                'WebkitTransform': '-webkit-transform',
                'OTransform': '-o-transform',
                'MSTransform': '-ms-transform',
                'MozTransform': '-moz-transform',
                'Transform': 'transform'
            };

        // Add it to the body to get the computed style.
        document.body.insertBefore(el, null);

        var t;
        for (t in transforms) {
            if (el.style[t] !== undefined) {
                el.style[t] = "translate3d(1px,1px,1px)";
                supportsTranslate3D = window.getComputedStyle(el).getPropertyValue(transforms[t]);
            }
        }

        document.body.removeChild(el);

        return (supportsTranslate3D !== undefined && supportsTranslate3D !== null && supportsTranslate3D.length > 0 && supportsTranslate3D !== "none");
    };

    var supportsTransition = function () {
        var div = document.createElement("div");
        var p, ext, pre = ["ms", "O", "Webkit", "Moz"];
        for (p in pre) {
            if (div.style[pre[p] + "Transition"] !== undefined) {
                ext = pre[p];
                break;
            }
        }
        return ext;
    };


    var getBrowserDetail = function () {
        var N = navigator.appName,
            ua = navigator.userAgent,
            tem;
        var M = ua.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
        if (M && (tem = ua.match(/version\/([\.\d]+)/i)) !== null) {
            M[2] = tem[1];
        }
        M = M ? [M[1], M[2]] : [N, navigator.appVersion, '-?'];

        return M;
    };

    var do3dTranslate = function (ele, x, y) {
        $(ele).css('-' + window.jpobj.supportTransition + '-transform', 'translate3d(' + x + ', ' + y + ', 0)');
    };

    var doNormalTranslate = function (ele, x, y) {
        $(ele).css({
            "left": x,
            "top": y
        });
    };

    var checkIphone = function () {
        var ua = navigator.userAgent,
            iphone = ua.indexOf('iPhone') !== -1 || ua.indexOf('iPod') !== -1;
        return iphone;
    };

    var checkAndroid = function () {
        var ua = navigator.userAgent,
            android = ua.indexOf('Android') !== -1;

        return android;
    };

    var setupJpobj = function () {
        window.jpobj.supportTranslate3d = isSupport3d();
        window.jpobj.supportTransition = supportsTransition();
        window.jpobj.browser = getBrowserDetail();
        window.jpobj.isIphone = checkIphone();
        window.jpobj.isAndroid = checkAndroid();
        window.jpobj.globaltop = -1;

        if (window.jpobj.supportTranslate3d) {
            window.jpobj.doTranslate = do3dTranslate;
        } else {
            window.jpobj.doTranslate = doNormalTranslate;
        }
    };

    // setup jpobj
    setupJpobj();


    /***  scroll trigger ***/
    var scrolltrigger = function () {
        var scroll = window.requestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            window.mozRequestAnimationFrame ||
            window.msRequestAnimationFrame ||
            window.oRequestAnimationFrame ||
            function (callback) {
                window.setTimeout(callback, 1000 / 60);
            };

        var loop = function () {
            if (window.jpobj.globaltop === window.pageYOffset) {
                scroll(loop);
                return false;
            } else {
                window.jpobj.globaltop = window.pageYOffset;
                $(window).trigger('jscroll');
            }
            scroll(loop);
        };

        loop();
    };

    $(window).bind('load', function () {
        scrolltrigger();
    });
    /***  scroll trigger ***/

})(jQuery, window, document);


(function (window) {
    "use strict";

    var lastTime = 0;
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame'] || window[vendors[x] + 'CancelRequestAnimationFrame'];
    }

    if (!window.requestAnimationFrame) {
        window.requestAnimationFrame = function (callback) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            var id = window.setTimeout(function () {
                    callback(currTime + timeToCall);
                },
                timeToCall);
            lastTime = currTime + timeToCall;
            return id;
        };
    }

    if (!window.cancelAnimationFrame) {
        window.cancelAnimationFrame = function (id) {
            clearTimeout(id);
        };
    }
}(window));



/**
* google map load
**/
Array.prototype.unique = function() {
    var a = this;
    for(var i=0; i<a.length; ++i) {
        for(var j=i+1; j<a.length; ++j) {
            if(a[i] === a[j])
                a.splice(j--, 1);
        }
    }
    return a;
};

var mapenqueued = false;
var functionarray = [];

function do_load_googlemap(cb) {
    if(!mapenqueued) {
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' +
            'callback=executemapcallback';
        document.body.appendChild(script);
        mapenqueued = true;
    }
    functionarray.push(cb);
}

function executemapcallback() {
    functionarray  = functionarray.unique();
    for(var i = 0; i < functionarray.length; i++) {
        window[functionarray[i]]();
    }
}