!function($) {
    $(".sectionid-input > input").blur(function(){
        var convertToSlug = function(Text){
            return Text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
        };

        var currentval = $(this).val();
        var slugversion = convertToSlug(currentval);
        $(this).val(slugversion);
    });
}(window.jQuery);