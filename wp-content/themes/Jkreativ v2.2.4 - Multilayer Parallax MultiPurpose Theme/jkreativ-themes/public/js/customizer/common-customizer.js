(function ($) {
    "use strict";

    $.jstyleme = function (id, str, to) {
        $("#" + id).remove();
        if (to !== false) {
            var createelement = "<style id='" + id + "'> " + str + to + " } </style>";
            $('body').append(createelement);
        }
    };

})(jQuery);