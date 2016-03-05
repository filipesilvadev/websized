(function (window, $) {

    /** fix for jquery clone function **/
    (function (original) {
        jQuery.fn.clone = function () {
            var result = original.apply(this, arguments),
                my_textareas = this.find('textarea').add(this.filter('textarea')),
                result_textareas = result.find('textarea').add(result.filter('textarea')),
                my_selects = this.find('select').add(this.filter('select')),
                result_selects = result.find('select').add(result.filter('select'));

            for (var i = 0, l = my_textareas.length; i < l; ++i) $(result_textareas[i]).val($(my_textareas[i]).val());
            for (var i = 0, l = my_selects.length; i < l; ++i) result_selects[i].selectedIndex = my_selects[i].selectedIndex;

            return result;
        };
    })(jQuery.fn.clone);

    window.jmetabox = (function () {
        var version = '1.0.0';
        var custom_uploader;

        var api = {

            init: function (options) {
                if ($(".jeg-meta-tab").length) {
                    jmetabox.beforeinit();

                    jmetabox.setTabs();
                    jmetabox.setSlider();
                    jmetabox.attachUpload();
                    jmetabox.attachGallery();
                    jmetabox.setSwitchtoogle();
                    jmetabox.setAnchor();
                    jmetabox.setColorpicker();

                    // portfolio
                    jmetabox.setMediaGallery();
                    jmetabox.afterinit();
                }
            },

            /** scroll to top **/
            scrollto: function (element) {
                $("html, body").animate({
                    scrollTop: $(element).offset().top - 30
                });
            },

            setMediaGallery: function () {
                if ($("div[data-type='mediagallery']").length) {

                    var get_highest_portfolio_number = function (parent) {
                        var highest = 0;

                        if ($(".imageresult-inner > div", parent).length > 0) {
                            $(".imageresult-inner > div", parent).each(function (i) {
                                var curidx = $(this).data("index");
                                if (curidx > highest) highest = $(this).data('index');
                            });
                        }

                        return ++highest;
                    };

                    var set_media_index = function (element, cloned) {
                        var currentindex = get_highest_portfolio_number(element);
                        $(cloned).data('index', currentindex);

                        $(".replaceindex", cloned).each(function () {
                            var name = $(this).attr('name').replace('index', currentindex);
                            $(this).attr('name', name);
                        });
                    };

                    var attach_accordion = function (element) {
                        $(".accordionheader", element).bind('click', function () {
                            $(element).find('.accordionbody').removeClass('open');
                            $(this).parent('.accordionwrapper').find('.accordionbody').addClass('open');
                        });
                    };

                    var attach_image_list_behaviour = function (element) {

                        $(element).on('click', '.imggalselect', function (e) {
                            var ele = $(this);
                            var title = $(this).val();
                            var imageresultcontainer = $(element).find('.imageresult-inner');

                            custom_uploader = wp.media.frames.file_frame = wp.media({
                                title: "Select Multiple Image ",
                                button: {
                                    text: "Select Image"
                                },
                                multiple: true,
                                library: {
                                    type: 'image'
                                },
                            });

                            custom_uploader.on('select', function () {
                                var selection = custom_uploader.state().get('selection');
                                selection.map(function (attachment) {
                                    attachment = attachment.toJSON();

                                    var cloned = $(element).find('.template-image .imageresult-list').clone();
                                    set_media_index(element, cloned);

                                    if ( 'undefined' === typeof attachment.sizes.thumbnail ) {
                                        attachment.sizes.thumbnail = attachment.sizes.full;
                                    }

                                    $(".imageresult-header-thumb", cloned).attr('src', attachment.sizes.thumbnail.url);
                                    $(".imageresult-body-thumb", cloned).attr('src', attachment.sizes.thumbnail.url);
                                    $(".imageresult-header-title", cloned).text(attachment.title);
                                    $(".image-index", cloned).val(attachment.id);
                                    $(".image-title", cloned).val(attachment.title);

                                    $(imageresultcontainer).append(cloned);
                                });

                                $("html, body").animate({scrollTop: $(imageresultcontainer).offset().top - $("#wpadminbar").height()}, 200);
                            });

                            //Open the uploader dialog
                            custom_uploader.open();
                            return false;
                        });

                    };


                    var attach_result_list_behaviour = function (element) {
                        $(element).on('click', '.imageresult-header-toogle', function (event) {
                            event.preventDefault();
                            var $this = $(this);
                            var $parent = $(this).parents('.imageresult-list');
                            var resvisible = $(".imageresult-body", $parent).is(":visible");
                            var type = $parent.attr('data-result');

                            if (resvisible) {
                                $(".imageresult-body", $parent).hide("fast");
                                $(this).text('detail');

                                var headertext = $parent.find('.showonlist').val();
                                $(this).parents('.imageresult-header').find('.imageresult-header-title').text(headertext);
                            } else {
                                $(".imageresult-body", $parent).show("fast");
                                $(this).text('less');
                            }
                        });

                        $(element).on('click', '.imageresult-header-delete', function (event) {
                            event.preventDefault();
                            $(this).parents('.imageresult-list').fadeOut(function () {
                                $(this).remove();
                            });
                        });
                    };

                    var attach_result_drag_behaviour = function (element) {
                        $(".imageresult-inner", element).sortable({
                            forcePlaceholderSize: true,
                            placeholder: 'imageresult-placeholder',
                            stop: function (event, ui) {
                            }
                        });
                    };

                    var attach_youtube_list_behaviour = function (element) {
                        $(".youtubesubmit", element).bind('click', function (event) {
                            event.preventDefault();
                            var parent = $(this).parents(".accordionbody");
                            var imageresultcontainer = $(element).find('.imageresult-inner');
                            var cloned = $(element).find('.template-youtube .imageresult-list').clone();

                            set_media_index(element, cloned);

                            // url
                            var url = $(parent).find(".youtubeurl").val();
                            $(".youtube-url", cloned).val(url);
                            $(".imageresult-header-title", cloned).text(url);
                            $(parent).find(".youtubeurl").val('');

                            // title
                            var title = $(parent).find(".videotitle").val();
                            $(".videotitle", cloned).val(title);
                            $(parent).find(".videotitle").val('');

                            // cover id
                            var cover = $(parent).find(".videocover").val();
                            $(".videocover", cloned).val(cover);
                            $(parent).find(".videocover").val('');

                            // cover image
                            var coverimage = $(parent).find(".jimg > img").attr('src');
                            $(".jimg > img", cloned).attr('src', coverimage);
                            $(parent).find(".jimg > img").attr('src', '');

                            // thumbsize
                            var width = $(parent).find('.width').val();
                            var height = $(parent).find('.height').val();
                            $(".widthsize select", cloned).val(width);
                            $(".heightsize select", cloned).val(height);

                            $(imageresultcontainer).append(cloned);
                            $("html, body").animate({scrollTop: $(cloned).offset().top - $("#wpadminbar").height()}, 200);
                            return false;
                        });
                    };

                    var attach_vimeo_list_behaviour = function (element) {
                        $(".vimeosubmit", element).bind('click', function (event) {
                            event.preventDefault();
                            var parent = $(this).parents(".accordionbody");
                            var imageresultcontainer = $(element).find('.imageresult-inner');
                            var cloned = $(element).find('.template-vimeo .imageresult-list').clone();

                            set_media_index(element, cloned);

                            // url
                            var url = $(parent).find(".vimeourl").val();
                            $(".vimeo-url", cloned).val(url);
                            $(".imageresult-header-title", cloned).text(url);
                            $(parent).find(".vimeourl").val('');

                            // title
                            var title = $(parent).find(".videotitle").val();
                            $(".videotitle", cloned).val(title);
                            $(parent).find(".videotitle").val('');

                            // cover id
                            var cover = $(parent).find(".videocover").val();
                            $(".videocover", cloned).val(cover);
                            $(parent).find(".videocover").val('');

                            // cover image
                            var coverimage = $(parent).find(".jimg > img").attr('src');
                            $(".jimg > img", cloned).attr('src', coverimage);
                            $(parent).find(".jimg > img").attr('src', '');

                            // thumbsize
                            var width = $(parent).find('.width').val();
                            var height = $(parent).find('.height').val();
                            $(".widthsize select", cloned).val(width);
                            $(".heightsize select", cloned).val(height);

                            $(imageresultcontainer).append(cloned);
                            $("html, body").animate({scrollTop: $(cloned).offset().top - $("#wpadminbar").height()}, 200);
                            return false;
                        });
                    };

                    var attach_soundcloud_list_behaviour = function (element) {
                        $(".soundcloudsubmit", element).bind('click', function (event) {
                            event.preventDefault();
                            var parent = $(this).parents(".accordionbody");
                            var imageresultcontainer = $(element).find('.imageresult-inner');
                            var cloned = $(element).find('.template-soundcloud .imageresult-list').clone();

                            set_media_index(element, cloned);

                            // url
                            var url = $(parent).find(".soundcloudurl").val();
                            $(".soundcloud-url", cloned).val(url);
                            $(".imageresult-header-title", cloned).text(url);
                            $(parent).find(".soundcloudurl").val('');

                            // title
                            var title = $(parent).find(".videotitle").val();
                            $(".videotitle", cloned).val(title);
                            $(parent).find(".videotitle").val('');

                            // cover id
                            var cover = $(parent).find(".videocover").val();
                            $(".videocover", cloned).val(cover);
                            $(parent).find(".videocover").val('');

                            // cover image
                            var coverimage = $(parent).find(".jimg > img").attr('src');
                            $(".jimg > img", cloned).attr('src', coverimage);
                            $(parent).find(".jimg > img").attr('src', '');

                            // thumbsize
                            var width = $(parent).find('.width').val();
                            var height = $(parent).find('.height').val();
                            $(".widthsize select", cloned).val(width);
                            $(".heightsize select", cloned).val(height);

                            $(imageresultcontainer).append(cloned);
                            $("html, body").animate({scrollTop: $(cloned).offset().top - $("#wpadminbar").height()}, 200);
                            return false;
                        });
                    };

                    var attach_html5_list_behaviour = function (element) {
                        $(".html5videosubmit", element).bind('click', function (event) {
                            event.preventDefault();
                            var parent = $(this).parents(".accordionbody");
                            var imageresultcontainer = $(element).find('.imageresult-inner');
                            var cloned = $(element).find('.template-html5video .imageresult-list').clone();

                            set_media_index(element, cloned);

                            // title
                            var title = $(parent).find(".videotitle").val();
                            $(".videotitle", cloned).val(title);
                            $(".imageresult-header-title", cloned).text(title);
                            $(parent).find(".videotitle").val('');

                            // mp4
                            var mp4 = $(parent).find(".video-mp4").val();
                            $(".videomp4", cloned).val(mp4);
                            $(parent).find(".video-mp4").val('');

                            // webm
                            var webm = $(parent).find(".video-webm").val();
                            $(".videowebm", cloned).val(webm);
                            $(parent).find(".video-webm").val('');

                            // ogg
                            var ogg = $(parent).find(".video-ogg").val();
                            $(".videoogg", cloned).val(ogg);
                            $(parent).find(".video-ogg").val('');

                            // cover id
                            var cover = $(parent).find(".videocover").val();
                            $(".videocover", cloned).val(cover);
                            $(parent).find(".videocover").val('');

                            // cover image
                            var coverimage = $(parent).find(".jimg > img").attr('src');
                            $(".jimg > img", cloned).attr('src', coverimage);
                            $(parent).find(".jimg > img").attr('src', '');

                            // thumbsize
                            var width = $(parent).find('.width').val();
                            var height = $(parent).find('.height').val();
                            $(".widthsize select", cloned).val(width);
                            $(".heightsize select", cloned).val(height);

                            $(imageresultcontainer).append(cloned);
                            $("html, body").animate({scrollTop: $(cloned).offset().top - $("#wpadminbar").height()}, 200);
                            return false;
                        });
                    };

                    $("div[data-type='mediagallery']").each(function () {
                        var parent = $(this);

                        // attach behaviour
                        attach_accordion($('.typeaccordion', this));
                        attach_image_list_behaviour(this);
                        attach_result_list_behaviour(this);
                        attach_result_drag_behaviour(this);
                        attach_youtube_list_behaviour(this);
                        attach_vimeo_list_behaviour(this);
                        attach_soundcloud_list_behaviour(this);
                        attach_html5_list_behaviour(this);
                    });

                }
            },

            setColorpicker: function () {
                if ($('.meta-colorpicker').length) {
                    $('.meta-colorpicker').each(function (idx, val) {
                        var $this = $(this).find('.pickcolor');
                        var $text = $(this).find('.pickcolor-text');
                        var $thiscolor = $text.val();
                        $this.ColorPicker({
                            color: '#' + $thiscolor,
                            onShow: function (colpkr) {
                                $(colpkr).fadeIn(500);
                                return false;
                            },
                            onHide: function (colpkr) {
                                $(colpkr).fadeOut(500);
                                return false;
                            },
                            onChange: function (hsb, hex, rgb) {
                                $this.find('div').css('backgroundColor', '#' + hex);
                                $text.val(hex);
                            }
                        });
                    });
                }
            },

            /** set tab **/
            setTabs: function (options) {
                if ($('.jeg-meta-tab > .jeg-tab').length) {
                    var taboption = {};
                    jmetabox.metatab = $('.jeg-meta-tab > .jeg-tab').tabs(taboption);
                }
            },

            /** slider **/
            setSlider: function () {
                if ($(".sliderbar").length) {
                    $(".sliderbar").each(function () {
                        var slidebar = $(this);
                        var minval = parseInt(slidebar.attr('min'), 10);
                        var maxval = parseInt(slidebar.attr('max'), 10);
                        var val = parseInt(slidebar.attr('value'), 10);
                        var stepval = parseInt(slidebar.attr('step'), 10);
                        slidebar.slider({
                            range: "min",
                            value: val,
                            min: minval,
                            max: maxval,
                            step: stepval,
                            slide: function (event, ui) {
                                var slidertext = $(this).parent().find('.slidertext');
                                $(slidertext).val(ui.value);
                            }
                        });
                    });
                }
            },

            /**
             * jkreativ use here...
             ***/
            attachUpload: function () {

                $(document).on('click', ".uploadfile .removefile", function () {
                    var element = $(this);
                    var parent = $(this).parents('.uploadfile');
                    var preview = $(parent).find('.jimg > img');
                    var input = $(parent).find('.uploadtext');

                    $(input).val('');
                    $(preview).attr('src', '');
                });

                $(document).on('click', ".uploadfile .selectfileimage", function (e) {
                    var element = $(this);
                    var title = $(this).val();
                    var parent = $(this).parents('.uploadfile');
                    var preview = $(parent).find('.jimg > img');
                    var input = $(parent).find('.uploadtext');

                    e.preventDefault();

                    //Extend the wp.media object
                    custom_uploader = wp.media.frames.file_frame = wp.media({
                        title: title,
                        button: {
                            text: title
                        },
                        multiple: false
                    });

                    //When a file is selected, grab the URL and set it as the text field's value
                    custom_uploader.on('select', function () {
                        attachment = custom_uploader.state().get('selection').first().toJSON();
                        $(input).val(attachment.id);
                        $(preview).attr('src', attachment.sizes.thumbnail.url);
                    });

                    //Open the uploader dialog
                    custom_uploader.open();
                });

                $(document).on('click', ".uploadfile .selectfile", function (e) {

                    var element = $(this);
                    var title = $(this).val();
                    e.preventDefault();

                    //Extend the wp.media object
                    custom_uploader = wp.media.frames.file_frame = wp.media({
                        title: title,
                        button: {
                            text: title
                        },
                        multiple: false
                    });

                    //When a file is selected, grab the URL and set it as the text field's value
                    custom_uploader.on('select', function () {
                        attachment = custom_uploader.state().get('selection').first().toJSON();
                        $(element).parent().find('.uploadtext').val(attachment.url);
                    });

                    //Open the uploader dialog
                    custom_uploader.open();
                });
            },

            /** attach gallery **/
            attachGallery: function () {
                if ($(".attachgallery").length) {
                    $(".attachgallery").click(function () {
                        var postid = $("#post_ID").val();
                        tb_show('', 'media-upload.php?post_id=' + postid + '&type=file&TB_iframe=true'); // type= can be image too, browse codex for another option
                        // tinymce.DOM.setStyle( ['TB_overlay','TB_window','TB_load'], 'z-index', '999999' );
                        tinymce.DOM.setStyle(['TB_window'], 'z-index', '999999');
                        return false;
                    });
                }
            },

            /** set switch toogle **/
            setSwitchtoogle: function () {
                if ($(".switchtoogle").length) {
                    $(".switchtoogle").iButton();
                }
            },

            /** switch tab **/
            switchtab: function (enable, disable) {
                jmetabox.metatab.tabs("option", "disabled", []);
                jmetabox.metatab.tabs("option", "active", enable);
                jmetabox.metatab.tabs("option", "disabled", disable);
            },

            /** set metabox anchor if enabled **/
            setAnchor: function () {
                jmetabox.anchorSwitch();
                if ($('#janchor').length) {
                    jmetabox.metatab.bind("tabsselect", function (event, ui) {
                        var url = $(ui.tab).attr('href').substring(1);
                        $("#janchor").val(url);
                    });
                }
            },

            anchorSwitch: function () {
                var portfoliomedia = $("#janchor").val();
                $(".jeg-meta-tab .ui-state-default a").each(function (index, ele) {
                    if ($(ele).attr('href').substring(1) == $("#janchor").val()) {
                        jmetabox.switchtab(index, []);
                    }
                });
            },

            /** get jadmin version **/
            getversion: function () {
                return version;
            },

            /** convert to slug **/
            convertToSlug: function (Text) {
                return Text
                    .toLowerCase()
                    .replace(/ /g, '-')
                    .replace(/[^\w-]+/g, '');
            },

            /** hook list **/
            beforeinit: function () {
            },
            afterinit: function () {
            }
        };

        return api;
    }());

    $(document).ready(function () {
        jmetabox.init();
    });
})(window, jQuery);