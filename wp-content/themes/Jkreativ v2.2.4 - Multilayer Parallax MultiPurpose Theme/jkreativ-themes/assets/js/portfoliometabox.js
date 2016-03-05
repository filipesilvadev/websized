(function($){
	$(document).ready(function(){


		var get_template_value = function() {
			var element = $("select[name='jkreativ_portfolio_setting[portfolio_layout]']");
			return $(element).val();
		};


        var page_metabox_visibililty = function() {
            var template = get_template_value();
            if(template === jpageoption.portfoliolayout) {
                $("#jkreativ_switch_template_notice_metabox").hide();

                if(template === 'ajax') {
                    $("#postdivrich").show();
                    $("#jkreativ_portfolio_media_gallery").show();
                    $("#jkreativ_portfolio_meta_metabox").show();
                    $("#jkreativ_portfolio_ajax_metabox").show();
                } else if(template === 'cover') {
                    $("#postdivrich").show();
                    $("#jkreativ_portfolio_media_gallery").show();
                    $("#jkreativ_portfolio_cover_metabox").show();
                    $("#jkreativ_portfolio_cover_meta_metabox").show();
                } else if(template === 'sidecontent') {
                    $("#postdivrich").show();
                    $("#jkreativ_portfolio_media_gallery").show();
                    $("#jkreativ_portfolio_meta_metabox").show();
                    $("#jkreativ_portfolio_sidecontent_metabox").show();
                } else if(template === 'landingpage') {
                    $("#postdivrich").hide();
                    $("#jkreativ_portfolio_landing_metabox").show();
                    $("#jkreativ_legacy_page_builder_metabox").show();
                } else if(template === 'landingpagevc') {
                    $("#postdivrich").show();
                    $(".composer-switch").show();
                    $("#wpb_visual_composer").show();
                    $("#jkreativ_portfolio_landing_vc_metabox").show();

                    if($(".composer-switch").hasClass('vc-backend-status') || $(".composer-switch").hasClass('vc_backend-status')) {
                        $("#postdivrich").hide();
                        $("#wpb_visual_composer").show();
                    } else {
                        $("#postdivrich").show();
                        $("#wpb_visual_composer").hide();
                    }
                } else if(template === 'anotherpage') {
                    $("#postdivrich").hide();
                    $("#jkreativ_portfolio_link_metabox").show();
                }

                if(template !== "landingpagevc") {
                    $("#wpb_visual_composer").hide();
                }
            } else {
                $("#postdivrich").hide();
                $("#wpb_visual_composer").hide();
                $(".composer-switch").hide();
                $("#normal-sortables > div").each(function(){
                    $(this).attr('style', '');
                });
                $("#jkreativ_switch_template_notice_metabox").show();
            }
        };

        setTimeout(function(){ page_metabox_visibililty(); }, 500);
        $("select[name='jkreativ_portfolio_setting[portfolio_layout]']").bind('change', page_metabox_visibililty);
	});
})(jQuery);
