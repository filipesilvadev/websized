(function ($, window, document, MediaElement) {
    "use strict";

    function dispatch() {

        /*************************
         * right click
         *************************/

        if (window.joption.rightclick === "1") {

            var transformx = 0.90;
            var transformy = 0.90;
            var transformdelay = 500;
            var rightclickactive = false;
            var ccinterval = null;
            var cctop = 0;
            var ccheight = $(".creditcontainer").height();
            var musicenabled = false;

            if ($(".creditaudio").length) {
                musicenabled = true;
                $('#creditaudioplayer').mediaelementplayer({
                    pauseOtherPlayers: false,
                    success: function(me) {}
                });
            }

            var movecc = function () {
                cctop = cctop - 1;
                if ((ccheight * -1) > cctop) { cctop = $(window).height(); }
                window.jpobj.doTranslate($(".creditcontainer"), "0px", cctop + "px");
                ccinterval = window.requestAnimationFrame(movecc);
            };

            var openmovieoverlay = function(e){
                if (!rightclickactive) {
                    cctop = $(window).height();
                    window.jpobj.doTranslate($(".creditcontainer"), "0px", cctop + "px");

                    rightclickactive = true;
                    $('html, body').animate({
                        scrollTop: 0
                    }, window.jpobj.globaltop / 4, "easeInOutQuad", function () {
                        window.setTimeout(function () {
                            if (musicenabled) {
                                $('#creditaudioplayer')[0].player.play();
                                $(window).trigger('jmusicstop');
                            }
                            $(".rightclickoverlay").fadeIn(transformdelay);
                            $(".jviewport").css('transform', "matrix(1, 0, 0, 1, 0, 0)").addClass('overflowhide');
                            $({ property: 0 }).animate({ property: 100 }, {
                                duration: transformdelay,
                                step: function (now) {
                                    var difx = 1 - (( 1 - transformx ) * now / 100);
                                    var dify = 1 - (( 1 - transformy ) * now / 100);
                                    $(".jviewport").css('transform', "matrix(" + difx + ", 0, 0, " + dify + ", 0, 0)");
                                },
                                complete: function () {
                                    ccheight = $(".creditcontainer").height();
                                    ccinterval = window.requestAnimationFrame(movecc);
                                }
                            });
                        }, 250);
                    });
                }
                return false;
            };


            $(document).bind('contextmenu', function (e) {
                if (e.button === 2) {
                    e.preventDefault();
                    openmovieoverlay(e);
                }
                return true;
            });

            $(".moviecredit a").bind('click', function(e){
                e.preventDefault();
                openmovieoverlay(e);
            });


            $(".roverlayclose").bind('click', function () {
                if (musicenabled) {
                    $('#creditaudioplayer')[0].player.pause();
                    $(window).trigger('jmusicstart');
                }
                $(".rightclickoverlay").fadeOut(transformdelay);
                $(".jviewport").removeClass('overflowhide');
                $({ property: 0 }).animate({ property: 100 }, {
                    duration: transformdelay,
                    step: function (now) {
                        var difx = transformx + (( 1 - transformx ) * now / 100);
                        var dify = transformx + (( 1 - transformy ) * now / 100);

                        $(".jviewport").css('transform', "matrix(" + difx + ", 0, 0, " + dify + ", 0, 0)");
                    },
                    complete: function () {
                        $(".jviewport").attr('style', '');
                        rightclickactive = false;
                        window.cancelAnimationFrame(ccinterval);
                    }
                });
            });
        }

        /*************************
         * loading
         *************************/

        if ($("#loading").length) {
            var loadingtype = $("#loading").data('type');
            if (loadingtype === 'circle') {
                $.jpageload();
            } else if (loadingtype === 'linear') {
                $.jpageloadlinear();
            } else if (loadingtype === 'linearinline') {
                $.jpageloadlinearinline();
            }
        }

        /*************************
         * fix anything
         *************************/

        $(window).bind('load', function () {
            $(window).trigger('resize');

            if($(".landingpagewrapper").length) {
                setTimeout(function(){
                    $(window).trigger('resize');
                }, 3000);
            }
        });

        /**************************
         * header menu fade
         *************************/

        if ($(".headermenu").length) {
            var fadeheadermenu = function () {
                if (window.jpobj.globaltop > 100) {
                    $(".headermenu").addClass('fademe');
                } else {
                    $(".headermenu").removeClass('fademe');
                }
            };

            $(window).bind('jscroll', fadeheadermenu);
        }

        /**************************
         * Collapsible Navigation
         *************************/

        if ($(".sidebarcollapse").length) {
            var showcollapsiblemenu = function (e) {
                if (this === e.target) {
                    $("#leftsidebar").animate({
                        "left": 0
                    });

                    $(".csbwrapper").fadeOut();
                    $(".lefttop, .leftfooter").fadeIn();
                }
            };
            $(".csbwrapper, .csbhicon, .cbsheader").bind('click', showcollapsiblemenu);

            var hidecollapsiblemenu = function () {
                var leftpos = "-210px";
                if ($(window).width() <= 1024) { leftpos = "-190px"; }

                $("#leftsidebar").animate({
                    "left": leftpos
                });
                $(".lefttop, .leftfooter").fadeOut(function () {
                    $(".csbwrapper").fadeIn();
                });
            };

            $(".sidebarcollapse #leftsidebar").hoverIntent({
                over: function () {
                },
                out: function () {
                    hidecollapsiblemenu();
                },
                timeout: 500
            });

            $(window).bind('resize', hidecollapsiblemenu);
        }

        /**************************
         * search function
         **************************/

        var toogle_search = function (event) {
            event.preventDefault();
            if ($("body").hasClass('opensearch')) {
                $("body").removeClass('opensearch');
                $(".topsearchwrapper").fadeOut();
            } else {
                $("body").addClass('opensearch');
                $(".searchcontent input").focus();
                $(".topsearchwrapper input").focus();
                $(".topsearchwrapper").fadeIn();
            }
        };

        $(".searchheader, .topnavigationsearch").bind('click', toogle_search);
        $(".closesearch").bind('click', toogle_search);
        $(".searchcontent input").width($("#rightsidecontainer").width() - 70);


        /**************************
         * two line navigation
         **************************/

        var twolinenavigator = function () {
            if ($(".horizontalnav.topnavtwoline").length) {
                var topnavigation = $(".horizontalnav .topnavigation");
                var twaheight = $(".topwrapperabove").height();
                var topheight = null;
                var isbottom = $(".landing-bottom-nav").length;

                if (isbottom) {
                    var height_change = function () {
                        topheight = $(".navigation-flag").offset().top;
                    };
                    $(window).bind('resize load', height_change);
                } else {
                    topheight = window.joption.menucollapsed;
                }


                var twolinescrolleffect = function () {
                    if (window.jpobj.globaltop <= topheight) {
                        window.jpobj.doTranslate($(topnavigation), "0px", "0px");
                    } else if (window.jpobj.globaltop > topheight) {
                        window.jpobj.doTranslate($(topnavigation), "0px", "-" + twaheight + "px");
                    }
                };

                $(window).bind('jscroll', twolinescrolleffect);
            }
        };

        /**************************
         * make menu smaller
         **************************/

        var menusmaller = function () {
            if ($(".topnavsmaller").length) {
                var istwoline = $(".horizontalnav.topnavtwoline").length;
                var isbottom = $(".landing-bottom-nav").length;
                var scrolltosmall = 0;
                var topnavigation = $(".horizontalnav .topnavigation");
                var smallnavclass = 'topnavsmall';

                var setscrolltosmall = function() {
                    if (!istwoline && !isbottom) {
                        // single line & top
                        scrolltosmall = window.joption.menucollapsed;
                    } else if (istwoline && !isbottom) {
                        // two line & top
                        scrolltosmall = window.joption.menucollapsed;
                    } else if (!istwoline && isbottom) {
                        // single line & bottom
                        scrolltosmall = $(".navigation-flag").offset().top;
                    } else if (istwoline && isbottom) {
                        // two line & bottom
                        scrolltosmall = $(".navigation-flag").offset().top;
                    }
                };

                var smallnaveffect = function () {
                    if (window.jpobj.globaltop > scrolltosmall) {
                        $(topnavigation).addClass(smallnavclass);
                    } else {
                        $(topnavigation).removeClass(smallnavclass);
                    }
                };

                $(window).bind('jscroll', smallnaveffect);
                $(window).bind('load resize', setscrolltosmall);
            }
        };

        /**************************
         * transparent
         **************************/

        var transparenteffect = function () {
            if ($(".toptransparent").length) {
                var topnavigation = $(".horizontalnav .topnavigation");
                var transparenteffectcss = 'transparentbg';

                var transparentscrolleffect = function () {
                    if (window.jpobj.globaltop > window.joption.menucollapsed) {
                        $(topnavigation).addClass(transparenteffectcss);
                    } else {
                        $(topnavigation).removeClass(transparenteffectcss);
                    }
                };

                $(window).bind('jscroll', transparentscrolleffect);
            }
        };


        if ($(window).width() > 1024) {
            twolinenavigator();
            menusmaller();
            transparenteffect();
        }

        /**************************
         * horizontal menu
         **************************/

        if (window.joption.enablemegamenu !== "1") {
            $(".navcontent li").hover(function () {
                $(this).addClass('hovered');
            }, function () {
                $(this).removeClass('hovered');
            });

            $("#mega_main_menu_ul > li").hover(function () {
                $(this).addClass('hovered');
            }, function () {
                $(this).removeClass('hovered');
            });

            $(".navcontent li").hoverIntent({
                over: function () {
                    var parent = $(this);
                    var childmenu = $(this).find('> .childmenu');

                    // check parent is part of child menu
                    var grandparent = $(parent).parent();

                    if ($(grandparent).hasClass('childmenu')) {
                        var offset = $(childmenu).joffset();
                        if (typeof offset !== 'undefined') {
                            var ww = $(window).width();
                            var cw = $(childmenu).width();
                            if (( ww - (Math.floor(offset.left) + cw) ) < 0) {
                                $(childmenu).addClass('goright');
                            }
                        }
                    }

                    if ($(childmenu).length) {
                        $(childmenu).css("margin-left", ($(parent).width() - $(childmenu).width()) / 2);
                        $(parent).addClass("menudown");
                        $(childmenu).slideDown("fast");
                    }
                },
                out: function () {
                    var parent = $(this);
                    var childmenu = $(this).find('> .childmenu');
                    if ($(childmenu).length) {
                        $(childmenu).slideUp("fast", function () {
                            $(parent).removeClass("menudown");
                        });
                    }
                },
                timeout: 300
            });
        }

        /**************************
         * Main Mega Menu Top
         **************************/

        if ($(".top_navigation.direction-horizontal").length && $(window).width() > 1024) {

            $(".top_navigation.direction-horizontal .multicolumn_dropdown > .mega_dropdown").each(function () {
                var element = this;
                var parent = $(element).parent();
                var container = $(element).parents('.topwrapperbottom');
                var megacontainer = $(element).parents('#mega_main_menu');

                var containervar = {
                    'left': $(container).offset().left,
                    'width': $(container).outerWidth()
                };

                var elementvar = {
                    'left': $(element).joffset().left
                };

                if ($(megacontainer).hasClass("dropdowns_animation-none")) {
                    elementvar.width = $(element).jwidth();
                } else {
                    if (parent.hasClass('columns1')) {
                        elementvar.width = $(element).jwidth() + 250;
                    } else if (parent.hasClass('columns2')) {
                        elementvar.width = $(element).jwidth() + 450;
                    } else if (parent.hasClass('columns3')) {
                        elementvar.width = $(element).jwidth() + 650;
                    } else if (parent.hasClass('columns4')) {
                        elementvar.width = $(element).jwidth() + 850;
                    }
                }

                var parentpos = {
                    'left': $(parent).offset().left,
                    'width': $(parent).outerWidth(),
                    'id': $(parent).attr('id')
                };

                // normalize
                $(element).css({'display': ''});

                // calculate position of menu
                var maxcontainer = containervar.left + containervar.width;
                var rightelement = ( parentpos.left + ( parentpos.width / 2 )) + ( elementvar.width / 2 );
                var elementposition = null;

                if (maxcontainer < rightelement) {
                    rightelement = maxcontainer;
                    elementposition = ( rightelement - elementvar.width ) - elementvar.left - 5;
                } else {
                    elementposition = ( rightelement - elementvar.width ) - elementvar.left - 5;
                }

                var arrowposition = Math.floor((parentpos.left + ( parentpos.width / 2 )) - ( rightelement - elementvar.width ) - 5);
                $('body').remove("#" + parentpos.id + "-arrow");
                $('body').append("<style id='" + parentpos.id + "-arrow'>" +
                ".topnavigation #mega_main_menu > .menu_holder > .menu_inner > ul > #" + parentpos.id + " > .mega_dropdown:before { left : " + arrowposition + "px;} " +
                " </style>");

                $(element).css({
                    'left': elementposition + 'px',
                    'right': 'auto'
                });
            });


            $(".top_navigation.direction-horizontal .multicolumn_dropdown").each(function () {
                var element = this;
                $(element).hover(function (e) {
                    $(this).find('> .mega_dropdown').css({'z-index': 10});
                }, function () {
                    $(this).find('> .mega_dropdown').css({'z-index': -1});
                });
            });
        }

        /**************************
         * Mega dropdown Image
         **************************/
        if($(".mega_dropdown").length){
            $(".mega_dropdown").each(function(){
                var bg = $(this).css('background-image');
                bg = bg.replace('url(','').replace(')','').replace(/"/g, "").replace(/"/g, "");

                if(bg !== 'none') {
                    var img = new Image();
                    $(img).load(function () {
                    }).attr('src', bg);
                }
            });
        }

        /**************************
         * menu
         **************************/

        if (window.joption.enablemegamenu !== "1") {
            $(".mainnav li").bind('click', function (e) {
                var element = $(e.target).parents('li').get(0);

                if (e.currentTarget === element) {
                    if ($(element).find("> .childmenu").length) {
                        e.preventDefault();
                        $(element).siblings().each(function () {
                            $(this).removeClass("menudown")
                                .find('> .childmenu')
                                .slideUp("fast");
                        });

                        if ($(element).hasClass("menudown")) {
                            $(element).removeClass("menudown")
                                .find('> .childmenu')
                                .slideUp("fast", function () {
                                    $(window).trigger('navchange');
                                });
                        } else {
                            $(element).addClass("menudown")
                                .find('> .childmenu')
                                .slideDown("fast", function () {
                                    $(window).trigger('navchange');
                                });
                        }
                    } else {
                        return true;
                    }
                }
            });


            $(".childmenu").each(function () {
                var element = $(this).prev();
                $(element).append('<span class="arrow"></span>');
            });
        }


        /**************************
         * navigation scroll
         **************************/

        if (!$('body').hasClass('horizontalnav')) {
            $('.lefttop').jScrollPane({
                mouseWheelSpeed: 50,
                contentWidth: '0px'
            });
            var navscrolpane = $('.lefttop').data('jsp');

            var calculate_lefttop = function () {
                var ww = $(window).height();
                var leftfooterheight = $(".leftfooter").height();
                var lefttopheight = ww - leftfooterheight;
                $(".lefttop").height(lefttopheight);
                navscrolpane.reinitialise();
            };

            $(window).bind('resize navchange', calculate_lefttop);
            calculate_lefttop();
        }

        /**************************
         * mobile menu
         **************************/

        var mobilemenu = function (element) {
            var role = "main-mobile-menu";
            $(".mobile-menu-trigger").removeClass('active');

            if ($('body').hasClass('menuopen')) {
                $('body').removeClass('menuopen').attr('role', '');
                $(".contentoverflow").hide();
            } else {
                $(element).addClass('active');
                $('body').addClass('menuopen').attr('role', role);
                $(".contentoverflow").show();
            }
        };

        $(".mobile-menu-trigger").bind('click', function () {
            mobilemenu(this);
        });
        $(".contentoverflow").bind('click', function () {
            mobilemenu(null);
        });

        /**************************
         * mobile search
         **************************/

        $(".mobile-search-trigger").bind('click', function () {
            $(".mobilesearch").show();
            $(".mobilesearch input").focus();
        });
        $(".closemobilesearch").bind('click', function () {
            $(".mobilesearch").hide();
        });


        /**************************
         * mobile wrapper
         *************************/
        var responsiveheaderheight = $(".responsiveheader").height();
        $(".responsiveheader-wrapper").height(responsiveheaderheight);

        /**************************
         * Cart Open
         *************************/

        if ($(".horizontalnav").length) {
            if ($(".horizontalnav .topcart").length) {
                var horizontalcart = function () {
                    var selector = $(".topcartcontent");
                    var leftpos = $(selector).joffset().left;
                    var topwidth = $(selector).outerWidth();
                    var ww = $(window).width();

                    if (( leftpos + topwidth ) >= ww) {
                        $(selector).addClass("normalizeposition");
                    } else {
                        $(selector).removeClass("normalizeposition");
                    }
                };

                horizontalcart();
                $(window).bind('resize', horizontalcart);
                $(".topcart > a").bind('click', function (e) {
                    e.preventDefault();
                });

                $(".topcart").hoverIntent({
                    over: function () {
                        $(".topcartcontent").slideDown("fast");
                    },
                    out: function () {
                        $(".topcartcontent").slideUp("fast");
                    },
                    timeout: 500
                });
            }
        } else {
            var cartelement = $(".topcart > a");
            $(document).mouseup(function(e){
                var cartparent = $(cartelement).parent(".topcart");
                if($(e.target).parents('.topcart > a').length > 0 || cartelement.is(e.target)) {
                    if ($(cartparent).hasClass('active')) {
                        $(cartparent).removeClass('active');
                    } else {
                        $(cartparent).addClass('active');
                    }
                } else {
                    $(cartparent).removeClass('active');
                }
            });
        }

        /**************************
         * My Account Open
         *************************/

        if ($(".horizontalnav").length) {
            if ($(".horizontalnav .topaccount").length) {
                var horizontaloffset = function () {
                    var selector = $(".accountdrop");
                    var leftpos = $(selector).joffset().left;
                    var topwidth = $(selector).width();
                    var ww = $(window).width();

                    if (( leftpos + topwidth ) >= ww) {
                        $(selector).addClass("normalizeposition");
                    } else {
                        $(selector).removeClass("normalizeposition");
                    }
                };

                horizontaloffset();
                $(window).bind('resize', horizontaloffset);

                $(".topaccount > a").bind('click', function (e) {
                    e.preventDefault();
                });

                $(".topaccount").hoverIntent({
                    over: function (e) {
                        $(".accountdrop").slideDown("fast");
                    },
                    out: function (e) {
                        $(".accountdrop").slideUp("fast");
                    },
                    timeout: 300
                });
            }
        } else {
            var myaccelement = $(".topaccount > a");
            $(document).mouseup(function(e){
                var myaccparent = $(myaccelement).parent(".topaccount");
                if($(e.target).parents('.topaccount > a').length > 0 || myaccelement.is(e.target)) {
                    if ($(myaccparent).hasClass('active')) {
                        $(myaccparent).removeClass('active');
                    } else {
                        $(myaccparent).addClass('active');
                    }
                } else {
                    $(myaccparent).removeClass('active');
                }
            });
        }

        /**************************
         * sidebar follow
         *************************/

        if ($(".mainsidebar-wrapper").length) {
            var sidebar = $(".mainsidebar-wrapper");
            var parentsidebar = $(".mainsidebar");
            var parentpos, sidebarheight, sidebarwidth, wh, ww, sidebarmode, headermenuheight;
            var margin = 15;
            var bottommargin = 0;
            var enabled = true;

            var ishorizontal = $(".horizontalnav").length;
            var istwoline = $(".topnavtwoline").length;
            var issmallnav = $(".topnavsmaller").length;
            var issidenav = $(".sidenav").length;
            var issidenoheadermenu = $(".noheadermenu").length;

            var getheadermenuposition = function(){
                if(issidenav) {
                    if(issidenoheadermenu) {
                        headermenuheight = 0;
                    } else {
                        headermenuheight = $(".headermenu").height();
                    }
                } else if(ishorizontal) {
                    bottommargin = $(".footercontent").height();
                    headermenuheight = $(".topnavigation").height();

                    if(window.jpobj.globaltop > window.joption.menucollapsed) {
                        if (istwoline && !issmallnav) {
                            headermenuheight = $(".topwrapperbottom").height();
                        } else if( ( issmallnav && !istwoline ) || ( istwoline && issmallnav ) ) {
                            headermenuheight = window.joption.smallmenuheight;
                        }
                    }
                }

                headermenuheight = parseInt(headermenuheight, 10);
            };


            var setupsidebar = function () {
                getheadermenuposition();
                parentpos = $(parentsidebar).offset().top;
                sidebarheight = $(sidebar).height();
                sidebarwidth = $(sidebar).attr('style', '').css({
                    'position': 'relative'
                }).width();
                $(sidebar).width(sidebarwidth);

                wh = $(window).height();
                ww = $(window).width();

                if ((sidebarheight + margin + headermenuheight) < wh) {
                    sidebarmode = 'sticktop';
                } else {
                    sidebarmode = 'stickbottom';
                }

                if (sidebarheight > $('.mainpage').height()) {
                    enabled = false;
                } else {
                    enabled = true;
                }
            };

            var followsidebar = function () {
                getheadermenuposition();
                var sidebarpos;
                if (ww > 1152 && enabled) {
                    if (sidebarmode === 'stickbottom') {
                        sidebarpos = (window.jpobj.globaltop + wh) - sidebarheight - parentpos - bottommargin;

                        if (sidebarpos > 0) {
                            $(sidebar).css({
                                'top': -(sidebarheight + bottommargin - wh),
                                'position': 'fixed'
                            }).addClass('fixedelement');
                        } else {
                            $(sidebar).css({
                                'top': 0,
                                'position': 'relative'
                            }).removeClass('fixedelement');
                        }
                    } else {
                        sidebarpos = (window.jpobj.globaltop + headermenuheight + margin) - parentpos;

                        if (sidebarpos > 0) {
                            $(sidebar).css({
                                'top': parseInt(margin, 10) + parseInt(headermenuheight, 10),
                                'position': 'fixed'
                            }).addClass('fixedelement');
                        } else {
                            $(sidebar).css({
                                'top': 0,
                                'position': 'relative'
                            }).removeClass('fixedelement');
                        }
                    }
                } else {
                    $(sidebar).css({
                        'top': 0,
                        'position': 'relative'
                    });
                }
            };

            var dofollowsidebar = function () {
                setupsidebar();
                followsidebar();
            };

            $(window).bind('load', function () {
                dofollowsidebar();
                window.setTimeout(dofollowsidebar, 2000);
            });

            $(document).bind('ready', function () {
                dofollowsidebar();
                window.setTimeout(dofollowsidebar, 2000);
            });

            $(window).bind('resize', function () {
                dofollowsidebar();
                window.setTimeout(dofollowsidebar, 2000);
            });

            $(window).bind('jscroll', followsidebar);
        }


        /********
         * share
         */


        var googleshare = joption.themesurl + "/lib/sharrre.php";
        var currenturl = joption.currenturl;

        if ($(".sharrre-container-big").length) {
            $(".sharrre-container-big").each(function () {
                var element = $(this);

                // twitter share
                $(element).find(".twitter-share").sharrre({
                    share: {
                        twitter: true
                    },
                    url: currenturl,
                    template: '<a class="boxed" href="#"><div class="count" href="#">{total}</div><div class="whitearr"></div><div class="share"><i class="fa fa-twitter"></i></div></a>',
                    enableHover: false,
                    enableTracking: true,
                    buttons: {
                        twitter: {
                            url: currenturl
                        }
                    },
                    click: function (api) {
                        api.simulateClick();
                        api.openPopup('twitter');
                    }
                });

                // facebook share
                $(element).find(".facebook-share").sharrre({
                    share: {
                        facebook: true
                    },
                    url: currenturl,
                    template: '<a class="boxed" href="#"><div class="count" href="#">{total}</div><div class="whitearr"></div><div class="share"><i class="fa fa-facebook-square"></i></div></a>',
                    enableHover: false,
                    enableTracking: true,
                    click: function (api) {
                        api.simulateClick();
                        api.openPopup('facebook');
                    }
                });


                // google share
                $(element).find(".googleplus-share").sharrre({
                    share: {
                        googlePlus: true
                    },
                    url: currenturl,
                    template: '<a class="boxed" href="#"><div class="count" href="#">{total}</div><div class="whitearr"></div><div class="share"><i class="fa fa-google-plus-square"></i></div></a>',
                    enableHover: false,
                    enableTracking: true,
                    urlCurl: googleshare,
                    click: function (api) {
                        api.simulateClick();
                        api.openPopup('googlePlus');
                    }
                });

                // pinterest share
                $(element).find(".pinterest-share").sharrre({
                    share: {
                        pinterest: true
                    },
                    url: currenturl,
                    template: '<a class="boxed" href="#" rel="nofollow"><div class="count" href="#">{total}</div><div class="whitearr"></div><div class="share"><i class="fa fa-pinterest"></i></div></a>',
                    enableHover: false,
                    enableTracking: true,
                    buttons: {
                        pinterest: {
                            url: $(element).find(".pinterest-share").data('url'),
                            media: $(element).find(".pinterest-share").data('image'),
                            description: $(element).find(".pinterest-share").data('text')
                        }
                    },
                    click: function (api) {
                        api.simulateClick();
                        api.openPopup('pinterest');
                    }
                });
            });
        }

        /********
         * share container
         */
        if ($(".sharrre-container").length) {
            $(".sharrre-container").each(function () {
                var element = $(this);

                // twitter share
                $(element).find(".twitter-share").sharrre({
                    share: {
                        twitter: true
                    },
                    url: currenturl,
                    template: '<a class="boxed grouped" href="#"><div class="count" href="#">{total}</div><div class="whitearr"></div><div class="share"><i class="fa fa-twitter"></i></div></a>',
                    enableHover: false,
                    enableTracking: true,
                    buttons: {
                        twitter: {
                            url: currenturl
                        }
                    },
                    click: function (api) {
                        api.simulateClick();
                        api.openPopup('twitter');
                    }
                });

                // facebook share
                $(element).find(".facebook-share").sharrre({
                    share: {
                        facebook: true
                    },
                    url: currenturl,
                    template: '<a class="boxed grouped" href="#"><div class="count" href="#">{total}</div><div class="whitearr"></div><div class="share"><i class="fa fa-facebook-square"></i></div></a>',
                    enableHover: false,
                    enableTracking: true,
                    click: function (api) {
                        api.simulateClick();
                        api.openPopup('facebook');
                    }
                });


                // google share
                $(element).find(".googleplus-share").sharrre({
                    share: {
                        googlePlus: true
                    },
                    url: currenturl,
                    template: '<a class="boxed grouped" href="#"><div class="count" href="#">{total}</div><div class="whitearr"></div><div class="share"><i class="fa fa-google-plus-square"></i></div></a>',
                    enableHover: false,
                    enableTracking: true,
                    urlCurl: googleshare,
                    click: function (api) {
                        api.simulateClick();
                        api.openPopup('googlePlus');
                    }
                });

                // pinterest share
                $(element).find(".pinterest-share").sharrre({
                    share: {
                        pinterest: true
                    },
                    url: currenturl,
                    template: '<a class="boxed grouped" href="#" rel="nofollow"><div class="count" href="#">{total}</div><div class="whitearr"></div><div class="share"><i class="fa fa-pinterest"></i></div></a>',
                    enableHover: false,
                    enableTracking: true,
                    buttons: {
                        pinterest: {
                            url: $(element).find(".pinterest-share").data('url'),
                            media: $(element).find(".pinterest-share").data('image'),
                            description: $(element).find(".pinterest-share").data('text')
                        }
                    },
                    click: function (api) {
                        api.simulateClick();
                        api.openPopup('pinterest');
                    }
                });
            });
        }

        /********
         * clean blog share container
         */
        if ($(".sharrre-container-clean").length) {
            $(".sharrre-container-clean").each(function () {
                var element = $(this);

                // twitter share
                $(element).find(".twitter-share").sharrre({
                    share: {
                        twitter: true
                    },
                    url: currenturl,
                    template: '<a class="circle" href="#"><span class="share"><i class="fa fa-twitter"></i></span><span class="count" href="#">{total}</span></a>',
                    enableHover: false,
                    enableTracking: true,
                    buttons: {
                        twitter: {
                            url: currenturl
                        }
                    },
                    click: function (api) {
                        api.simulateClick();
                        api.openPopup('twitter');
                    }
                });

                // facebook share
                $(element).find(".facebook-share").sharrre({
                    share: {
                        facebook: true
                    },
                    url: currenturl,
                    template: '<a class="circle" href="#"><span class="share"><i class="fa fa-facebook"></i></span><span class="count" href="#">{total}</span></a>',
                    enableHover: false,
                    enableTracking: true,
                    click: function (api) {
                        api.simulateClick();
                        api.openPopup('facebook');
                    }
                });


                // google share
                $(element).find(".googleplus-share").sharrre({
                    share: {
                        googlePlus: true
                    },
                    url: currenturl,
                    template: '<a class="circle" href="#"><span class="share"><i class="fa fa-google-plus"></i></span><span class="count" href="#">{total}</span></a>',
                    enableHover: false,
                    enableTracking: true,
                    urlCurl: googleshare,
                    click: function (api) {
                        api.simulateClick();
                        api.openPopup('googlePlus');
                    }
                });

                // pinterest share
                $(element).find(".pinterest-share").sharrre({
                    share: {
                        pinterest: true
                    },
                    url: currenturl,
                    template: '<a class="circle" href="#"><span class="share"><i class="fa fa-pinterest"></i></span><span class="count" href="#">{total}</span></a>',
                    enableHover: false,
                    enableTracking: true,
                    buttons: {
                        pinterest: {
                            url: $(element).find(".pinterest-share").data('url'),
                            media: $(element).find(".pinterest-share").data('image'),
                            description: $(element).find(".pinterest-share").data('text')
                        }
                    },
                    click: function (api) {
                        api.simulateClick();
                        api.openPopup('pinterest');
                    }
                });
            });
        }


        /********
         * Product Share
         */
        if ($(".normal-sharrre-container").length) {
            $(".normal-sharrre-container").each(function () {
                var element = $(this);
                var twittertext = $(element).find(".twitter-share-block").data('title');
                var facebooktext = $(element).find(".facebook-share-block").data('title');
                var googletext = $(element).find(".googleplus-share-block").data('title');
                var pinteresttext = $(element).find(".pinterest-share-block").data('title');

                // twitter share
                $(element).find(".twitter-share-block").sharrre({
                    share: {
                        twitter: true
                    },
                    url: currenturl,
                    template: '<a class="share-block" href="#"><div class="share-icon"><i class="fa fa-twitter"></i></div><div class="share-count">{total} ' + twittertext + '</div></a>',
                    enableHover: false,
                    enableTracking: true,
                    buttons: {
                        twitter: {
                            url: currenturl
                        }
                    },
                    click: function (api) {
                        api.simulateClick();
                        api.openPopup('twitter');
                    }
                });

                // facebook share
                $(element).find(".facebook-share-block").sharrre({
                    share: {
                        facebook: true
                    },
                    url: currenturl,
                    template: '<a class="share-block" href="#"><div class="share-icon"><i class="fa fa-facebook-square"></i></div><div class="share-count">{total} ' + facebooktext + '</div></a>',
                    enableHover: false,
                    enableTracking: true,
                    click: function (api) {
                        api.simulateClick();
                        api.openPopup('facebook');
                    }
                });


                // google share
                $(element).find(".googleplus-share-block").sharrre({
                    share: {
                        googlePlus: true
                    },
                    url: currenturl,
                    template: '<a class="share-block" href="#"><div class="share-icon"><i class="fa fa-google-plus-square"></i></div><div class="share-count">{total} ' + googletext + '</div></a>',
                    enableHover: false,
                    enableTracking: true,
                    urlCurl: googleshare,
                    click: function (api) {
                        api.simulateClick();
                        api.openPopup('googlePlus');
                    }
                });

                // pinterest share
                $(element).find(".pinterest-share-block").sharrre({
                    share: {
                        pinterest: true
                    },
                    url: currenturl,
                    template: '<a class="share-block" href="#"><div class="share-icon"><i class="fa fa-pinterest"></i></div><div class="share-count">{total} ' + pinteresttext + '</div></a>',
                    enableHover: false,
                    enableTracking: true,
                    buttons: {
                        pinterest: {
                            url: $(element).find(".pinterest-share-block").data('url'),
                            media: $(element).find(".pinterest-share-block").data('image'),
                            description: $(element).find(".pinterest-share-block").data('text')
                        }
                    },
                    click: function (api) {
                        api.simulateClick();
                        api.openPopup('pinterest');
                    }
                });
            });
        }

        var tweetticker = function () {
            $('.jeg-tweets').each(function () {
                var element = $(this),
                    $tweet = null,
                    $next = null;
                $(element).height($(element).find('li:first').outerHeight());

                window.setInterval(function () {
                    $tweet = $(element).find('li:first');
                    $next = $tweet.next();

                    $(element).animate({height: ($next.outerHeight()) + 'px'}, 800);
                    $tweet.animate({marginTop: '-' + $tweet.outerHeight() + 'px'}, 400, function () {
                        $(this).detach().appendTo($(element).find('ul')).removeAttr('style');
                    });
                }, 4000);
            });
        };

        tweetticker();

    }


    // document ready to dispatch
    $(document).ready(dispatch);

})(jQuery, window, document, window.MediaElement);