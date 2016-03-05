(function ($) {
    var api = wp.customize;

    api.SliderControl = api.Control.extend({
        ready: function () {
            var control = this,
                picker = this.container.find('.slider');

            $(picker).each(function () {
                var element = this;
                var sliderinput = $(element).parents('label').find('.slider-input');
                var min = $(this).data('min');
                var max = $(this).data('max');
                var step = $(this).data('step');
                var value = $(this).data('value');

                $(element).slider({
                    value: value,
                    min: min,
                    max: max,
                    step: step,
                    slide: function (event, ui) {
                        $(sliderinput).val(ui.value);
                        control.setting.set(ui.value);
                    }
                });
            });
        }
    });

    api.controlConstructor['slider'] = api.SliderControl;
})(jQuery);