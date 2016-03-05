(function($){
	$(document).ready(function(){
		
		
		var get_template_value = function() {
			var element = $("select[name='jkreativ_slider_setting[slider_type]']");
			return $(element).val();
		};
		
		var show_hide_default = function() {			
			$("#jkreativ_slider_splitslider_metabox").hide();
			$("#jkreativ_slider_fulltext_metabox").hide();
			$("#jkreativ_slider_parallaxslider_metabox").hide();
		};
		
		var show_hide_slider_template = function() {
			var template = get_template_value();
			show_hide_default();
			
			if(template === 'splitslider') {
				$("#jkreativ_slider_splitslider_metabox").show();
			} else if(template === 'fulltextslider') {
				$("#jkreativ_slider_fulltext_metabox").show();
			} else if(template === 'parallaxslider') {
				$("#jkreativ_slider_parallaxslider_metabox").show();
			}
		};
		
		$("select[name='jkreativ_slider_setting[slider_type]']").bind('change', show_hide_slider_template);		
		show_hide_default();
		show_hide_slider_template();
	});
})(jQuery);
