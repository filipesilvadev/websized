(function($){
	$(document).ready(function(){
		
		var get_template_value = function() {
			return $("#page_template").val();
		};

        var page_metabox_visibililty = function() {
            var template = get_template_value();
            console.log("Template : " + template + " - Page Template : " + jpageoption.pagetemplate);

            if(template === jpageoption.pagetemplate) {
                $("#jkreativ_switch_template_notice_metabox").hide();

                if(template === 'template/template-blog.php' ) {
                    $("#postdivrich").hide();
                    $("#jkreativ_page_pageposition_metabox").show();
                    $("#jkreativ_page_blogcontent_metabox").show();
                    $("#jkreativ_page_share_metabox").show();
                    $("#jkreativ_page_meta_top_metabox").show();
                    $("#jkreativ_page_meta_btm_metabox").show();
                } else if(template === 'template/template-blog-masonry.php') {
                    $("#postdivrich").hide();
                    $("#jkreativ_page_blogcontent_metabox").show();
                    $("#jkreativ_page_blogmasonry_metabox").show();
                    $("#jkreativ_page_meta_top_metabox").show();
                    $("#jkreativ_page_meta_btm_metabox").show();
                } else if(template === 'template/template-blog-wide.php') {
                    $("#postdivrich").hide();
                    $("#jkreativ_page_blogcontent_metabox").show();
                    $("#jkreativ_page_blogwide_metabox").show();
                    $("#jkreativ_page_share_metabox").hide();
                    $("#jkreativ_page_meta_top_metabox").show();
                    $("#jkreativ_page_meta_btm_metabox").show();
                } if(template === 'template/template-blog-clean.php' ) {
                    $("#postdivrich").hide();
                    $("#jkreativ_page_blogcontent_metabox").show();
                    $("#jkreativ_page_share_metabox").show();
                    $("#jkreativ_page_meta_top_metabox").show();
                    $("#jkreativ_page_meta_btm_metabox").show();
                } else if(template === 'template/template-page-normal.php' || template === 'default' ) {
                    $("#postdivrich").show();
                    $("#jkreativ_page_pageposition_metabox").show();
                    $("#jkreativ_page_heading_metabox").show();
                    $("#jkreativ_page_share_metabox").show();
                    $("#jkreativ_page_meta_top_metabox").show();
                } else if(template === 'template/template-page-wide.php' || template === 'template/template-page-cover.php') {
                    $("#postdivrich").show();
                    $("#jkreativ_page_blogwide_metabox").show();
                    $("#jkreativ_page_heading_metabox").show();
                    $("#jkreativ_page_share_metabox").show();
                    $("#jkreativ_page_meta_top_metabox").show();
                } else if(template === 'template/template-contact-full-map.php') {
                    $("#postdivrich").show();
                    $("#jkreativ_page_fsmap_metabox").show();
                } else if(template === 'template/template-fsslider-iosslider.php') {
                    $("#postdivrich").hide();
                    $("#jkreativ_page_fsslider_content_metabox").show();
                    $("#jkreativ_page_iosslider_metabox").show();
                } else if(template === 'template/template-fsslider-kenburn.php') {
                    $("#postdivrich").hide();
                    $("#jkreativ_page_fsslider_content_metabox").show();
                    $("#jkreativ_page_kenburn_metabox").show();
                } else if(template === 'template/template-fsslider-serviceslider.php') {
                    $("#postdivrich").hide();
                    $("#jkreativ_page_sslider_metabox").show();
                } else if(template === 'template/template-fssingle-video.php') {
                    $("#postdivrich").hide();
                    $("#jkreativ_page_fssingle_video_metabox").show();
                } else if(template === 'template/template-fsslider-media.php') {
                    $("#postdivrich").hide();
                    $("#jkreativ_slider_gallery").show();
                    $("#jkreativ_page_slidermedia_metabox").show();
                } else if(template === 'template/template-media-gallery.php') {
                    $("#postdivrich").hide();
                    $("#jkreativ_page_mediagallery_metabox").show();
                    $("#jkreativ_media_gallery").show();
                } else if(template === 'template/template-media-gallery-content.php') {
                    $("#postdivrich").show();
                    $("#jkreativ_page_mediagallery_metabox").show();
                    $("#jkreativ_media_gallery").show();
                    $("#jkreativ_page_mediagallerycontent_metabox").show();
                    $("#jkreativ_page_share_metabox").show();
                    $("#jkreativ_page_meta_top_metabox").show();
                } else if(template === 'template/template-portfolio.php') {
                    $("#postdivrich").hide();
                    $("#jkreativ_portfolio_list_option_metabox").show();
                } else if(template === 'template/template-landing-page.php') {
                    $("#postdivrich").hide();
                    $("#jkreativ_page_landing_metabox").show();
                    $("#jkreativ_legacy_page_builder_metabox").show();
                }  else if(template === 'template/template-landing-page-vc.php') {
                    $(".composer-switch").show();
                    $("#jkreativ_page_landing_vc_metabox").show();
                    $("#wpb_visual_composer").show();

                    if($(".composer-switch").hasClass('vc-backend-status') || $(".composer-switch").hasClass('vc_backend-status')) {
                        $("#postdivrich").hide();
                        $("#wpb_visual_composer").show();
                    } else {
                        $("#postdivrich").show();
                        $("#wpb_visual_composer").hide();
                    }
                }

                if(template !== "template/template-landing-page-vc.php") {
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
        $("#page_template").bind('change', page_metabox_visibililty);	});
})(jQuery);
