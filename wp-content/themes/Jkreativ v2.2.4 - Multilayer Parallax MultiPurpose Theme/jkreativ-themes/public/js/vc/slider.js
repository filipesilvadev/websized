!function($) {
    $('.slider-element').each(function(){
        var element = this;
        var sliderinput = $(element).parents('.slider-input-wrapper').find('.slider-input');
        var min = $(this).data('min');
        var max = $(this).data('max');
        var step = $(this).data('step');
        var value = $(this).data('value');

        var slider =
        $(element).slider({
            value:value,
            min: min,
            max: max,
            step: step,
            slide: function( event, ui ) {
                $(sliderinput).val(ui.value);
            }
        });
        console.log(slider);
    });
}(window.jQuery);