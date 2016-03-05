(function ($) {
    var api = wp.customize;

    api.NewUpload = api.Control.extend({
        ready: function () {
            var control = this,
                newupload = this.container.find('.uploadfile');

            $(newupload).each(function () {

                $(this).find(".removefile").bind("click", function () {
                    var parent = $(this).parents('.uploadfile');
                    var preview = $(parent).find('.jimg > img');
                    var input = $(parent).find('.uploadtext');

                    $(input).val('');
                    control.setting.set('');
                    $(preview).attr('src', '');
                });

                $(this).find('.selectfileimage').bind('click', function (e) {
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
                        control.setting.set(attachment.id);
                        $(preview).attr('src', attachment.sizes.full.url);
                    });

                    //Open the uploader dialog
                    custom_uploader.open();
                });
            });
        }
    });

    api.controlConstructor['newupload'] = api.NewUpload;
})(jQuery);