(function($){
	$('document').ready(function(){

		var get_blog_format = function(){
			var format = '';
			if( $("input[name='jkreativ_blog_format[format]']:checked").length > 0 ) {
				return $("input[name='jkreativ_blog_format[format]']:checked").val();
			}
			return format;
		};

		var reset_show_hide_element = function()
		{
			$("#postdivrich").show();
			$("#tagsdiv-post_tag").show();
			$("#categorydiv").show();
			$("#normal-sortables > div").each(function(){
				$(this).attr('style', '');
			});
		};

		var showhide_format_element = function(format) {

			reset_show_hide_element();

			if(format === 'standard')
			{
			}
			else if(format === 'quote')
			{
				$("#postdivrich").hide();
				$("#jkreativ_blog_quote_metabox").show();
				$("#tagsdiv-post_tag").hide();
				$("#categorydiv").hide();
			}
			else if(format === 'soundcloud')
			{
				$("#jkreativ_blog_soundcloud_metabox").show();
			}
			else if(format === 'imgslider')
			{
				$("#jkreativ_blog_slider_metabox").show();
			}
			else if(format === 'vimeo')
			{
				$("#jkreativ_blog_vimeo_metabox").show();
			}
			else if(format === 'youtube')
			{
				$("#jkreativ_blog_youtube_metabox").show();
			}
			else if(format === 'html5video')
			{
				$("#jkreativ_blog_html5video_metabox").show();
			}
			else if(format === 'ads')
			{
				$("#postdivrich").hide();
				$("#jkreativ_blog_ads_metabox").show();
				$("#tagsdiv-post_tag").hide();
				$("#categorydiv").hide();
				$("#jkreativ_blog_template_metabox").hide();
			}
		};

		var setup_blog_format = function() {
			var format = get_blog_format();
			showhide_format_element(format);
		};

		setup_blog_format();
		$("input[name='jkreativ_blog_format[format]']").bind('click', setup_blog_format);
	});
})(jQuery);
