!function($) {
    $(".input-uploadfile").each(function(){
        var element = this;
        var input = $(element).find('input[type="text"]');

        $(this).find('.selectfileimage').bind('click', function(e){
            e.preventDefault();

            //Extend the wp.media object
            custom_uploader = wp.media.frames.file_frame = wp.media({
                multiple: false
            });

            //When a file is selected, grab the URL and set it as the text field's value
            custom_uploader.on('select', function() {
                attachment = custom_uploader.state().get('selection').first().toJSON();
                var url = attachment.url;
                input.val(url);
            });

            //Open the uploader dialog
            custom_uploader.open();
        });
    });
}(window.jQuery);