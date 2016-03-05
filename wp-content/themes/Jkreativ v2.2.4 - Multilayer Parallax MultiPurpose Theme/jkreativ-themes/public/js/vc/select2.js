!function($) {
    function formatvc(state) {
        return "<i class='ivc fa " + state.id.toLowerCase() + "'/></i>" + state.text + "";
    }

    $(".sectionid-input > select").each(function(){
        $(this).select2({
            placeholder: "Select",
            allowClear: true,
            formatResult: formatvc,
            formatSelection: formatvc,
            escapeMarkup: function(m) { return m; }
        });
    });
}(window.jQuery);