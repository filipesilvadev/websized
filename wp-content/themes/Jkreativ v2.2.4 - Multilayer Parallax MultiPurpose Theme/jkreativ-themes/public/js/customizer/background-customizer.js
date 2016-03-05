(function ($) {
    "use strict";

    wp.customize('website_color_background', function (value) {
        value.bind(function (to) {
            $.jstyleme('website_color_background', "body { background-color :", to);
        });
    });

    wp.customize('website_image_background', function (value) {
        value.bind(function (image) {
            $("#website_image_background").remove();

            var createelement = function (image) {
                if (image !== '') {
                    var createelement = "<style id='website_image_background'> body " +
                        "{ background-image: url(" + image + ") }" +
                        "</style>";
                    $('body').append(createelement);
                } else {
                    var createelement = "<style id='website_image_background'> body { background-image: url(''); } </style>";
                    $('body').append(createelement);
                }
            };

            if (typeof image === 'number') {
                $.ajax({
                    url: jkreativoption.adminurl,
                    type: "post",
                    dataType: "html",
                    data: {
                        'action': jkreativoption.imageurl,
                        'imageid': image,
                        'size': 'full'
                    },
                    success: function (data) {
                        if (data !== '') {
                            createelement(data);
                        }
                    }
                });
            } else {
                createelement(image);
            }
        });
    });

    wp.customize('website_background_repeat', function (value) {
        value.bind(function (repeat) {
            $("#ajax_loading_horizontal").remove();
            $.jstyleme('website_background_repeat', "body { background-repeat :", repeat);
        });
    });

    wp.customize('website_background_vertical_position', function (value) {
        value.bind(function (position) {
            $("#website_background_position").remove();
            var backgroundpos = $("body").css("backgroundPosition").split(" ");
            var position = position + " " + backgroundpos[1];
            var createelement = "<style id='website_background_position'> body " +
                "{ background-position: " + position + " }" +
                "</style>";
            $('body').append(createelement);
        });
    });

    wp.customize('website_background_horizontal_position', function (value) {
        value.bind(function (position) {
            $("#website_background_position").remove();
            var backgroundpos = $("body").css("backgroundPosition").split(" ");
            var position = backgroundpos[0] + " " + position;
            var createelement = "<style id='website_background_position'> body " +
                "{ background-position: " + position + "; }" +
                "</style>";
            $('body').append(createelement);
        });
    });

    wp.customize('website_background_fullscreen', function (value) {
        value.bind(function (fs) {
            $("#website_background_fullscreen").remove();
            if (fs !== false) {
                var createelement = "<style id='website_background_fullscreen'> body { " +
                    "background-attachment: fixed;" +
                    "background-size: cover;" +
                    " } </style>";
                $('body').append(createelement);
            }
        });
    });

})(jQuery);