(function (exports, $) {
    var api = wp.customize;

    $(function () {
        api('default_navigation', function (setting) {
            var sidenavigation = ['default_collapse_navigator', 'default_menuheader_navigator'];
            var callback = function (to) {
                return 'side' === to;
            };

            $.each(sidenavigation, function (i, controlId) {
                api.control(controlId, function (control) {
                    var visibility = function (to) {
                        control.container.toggle(callback(to));
                    };

                    visibility(setting.get());
                    setting.bind(visibility);
                });
            });
        });

        api('default_navigation', function (setting) {
            var sidenavigation = ['centering_top_navigator', 'twoline_top_navigator', 'boxed_content', 'smaller_navigator'];
            var callback = function (to) {
                return 'top' === to;
            };

            $.each(sidenavigation, function (i, controlId) {
                api.control(controlId, function (control) {
                    var visibility = function (to) {
                        control.container.toggle(callback(to));
                    };

                    visibility(setting.get());
                    setting.bind(visibility);
                });
            });
        });

        api('default_navigation', function (setting) {
            var transparentnavigation = ['centering_top_navigator_transparent', 'smaller_navigator_transparent', 'boxed_content_transparent'];
            var callback = function (to) {
                return 'transparent' === to;
            };

            $.each(transparentnavigation, function (i, controlId) {
                api.control(controlId, function (control) {
                    var visibility = function (to) {
                        control.container.toggle(callback(to));
                    };

                    visibility(setting.get());
                    setting.bind(visibility);
                });
            });
        });
    });
})(wp, jQuery);