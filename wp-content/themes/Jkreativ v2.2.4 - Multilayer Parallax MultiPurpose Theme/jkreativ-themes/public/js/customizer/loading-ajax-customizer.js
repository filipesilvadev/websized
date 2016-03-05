(function ($) {
    "use strict";
    wp.customize('ajax_loading_big', function (value) {
        value.bind(function (logo) {

            var createelement = function (logo) {
                $("#ajax_loading_big").remove();
                if (logo !== '') {
                    var createelement = "<style id='ajax_loading_big'> .bigloader, .portfolio-content-holder, .article-slider-wrapper.loading, .mapoverlay:after, div.ps-carousel-item-loading, .mejs-overlay-loading span " +
                        "{ background-image: url(" + logo + ") }" +
                        "</style>";
                    $('body').append(createelement);
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


    wp.customize('ajax_loading_small', function (value) {
        value.bind(function (logo) {

            var createelement = function (logo) {
                $("#ajax_loading_small").remove();
                if (logo !== false) {
                    var createelement = "<style id='ajax_loading_small'> div.ps-carousel-item-loading " +
                        "{ background-image: url(" + logo + ") }" +
                        "</style>";
                    $('body').append(createelement);
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

    wp.customize('ajax_loading_horizontal', function (value) {
        value.bind(function (logo) {

            var createelement = function (logo) {
                $("#ajax_loading_horizontal").remove();
                if (logo !== false) {
                    var createelement = "<style id='ajax_loading_horizontal'>.galleryloaderinner " +
                        "{ background-image: url(" + logo + ") }" +
                        "</style>";
                    $('body').append(createelement);
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

})(jQuery);