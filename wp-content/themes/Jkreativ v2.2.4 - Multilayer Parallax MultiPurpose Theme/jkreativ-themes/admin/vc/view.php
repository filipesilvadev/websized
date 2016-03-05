<?php


function vc_theme_vc_column($atts, $content = null) {
    return '<div class="sectioncontainer">'.wpb_js_remove_wpautop($content).'</div>';
}

$enablegridanimation;
function vc_theme_vc_row_inner($atts, $content = null)
{
    $atts = shortcode_atts(
        array(
            'el_class' => '',
            'enable_animation' => '',
            'animspeed' => '',
            'seqspeed' => '',
        ),
        $atts
    );

    // reset
    global $enablegridanimation;
    $enablegridanimation = false;
    $additionalcss = '';
    $additionaldata =  '';
    $animspeed = '';

    if($atts['enable_animation'] && !wp_is_mobile()) {
        if($atts['animspeed'] === 'fast') {
            $animspeed = 'jeg_animate_fast';
        } else if ($atts['animspeed'] === 'slow') {
            $animspeed = 'jeg_animate_slow';
        } else if ($atts['animspeed'] === 'slower') {
            $animspeed = 'jeg_animate_slower';
        }

        $enablegridanimation 	= true;
        $additionalcss 			.= " jeg_animate_sequence {$animspeed} {$atts['animspeed']} ";
        $additionaldata 		.= " data-speed='{$atts['seqspeed']}' data-offset='90' ";
    }

    return "<div class='row-fluid {$atts['el_class']} {$additionalcss}' {$additionaldata}>"
    . wpb_js_remove_wpautop($content) .
    "</div>";
}

function vc_theme_vc_column_inner($atts, $content = null)
{
    $atts = shortcode_atts(
        array(
            'hideipad' => '0',
            'hideiphone' => '0',
            'fadein' => '',
            'scale' => '',
            'position' => '',
            'el_class' => '',
            'width' => ''
        ),
        $atts
    );


    global $enablegridanimation;
    $fadein = '';
    $position = '';
    $scale = '';
    $additionalclass = '';


    if ( preg_match( '/^(\d{1,2})\/12$/', $atts['width'], $match ) ) {
        $w = "span" . $match[1];
    } else {
        switch ( $atts['width'] ) {
            case "1/12" :
                $w = "span1";
                break;
            case "1/6" :
                $w = "span2";
                break;
            case "1/4" :
                $w = "span3";
                break;
            case "1/3" :
                $w = "span4";
                break;
            case "5/12" :
                $w = "span5";
                break;
            case "1/2" :
                $w = "span6";
                break;
            case "7/12" :
                $w = "span7";
                break;
            case "2/3" :
                $w = "span8";
                break;
            case "3/4" :
                $w = "span9";
                break;
            case "5/6" :
                $w = "span10";
                break;
            case "11/12" :
                $w = "span11";
                break;
            case "1/1" :
                $w = "span12";
                break;
            default :
                $w = $atts['width'];
        }
    }

    $atts['hideipad'] = $atts['hideipad'] ? "hideipad" : "";
    $atts['hideiphone'] = $atts['hideiphone'] ? "hideiphone" : "";


    if($enablegridanimation && !wp_is_mobile()) {
        if($atts['fadein']) {
            $fadein = ' data-animation="janimate-fadein" ';
        }

        if($atts['position'] === 'top') {
            $position = ' data-position="janimpos-top" ';
        } else if($atts['position'] === 'bottom') {
            $position = ' data-position="janimpos-bottom" ';
        } else if($atts['position'] === 'left') {
            $position = ' data-position="janimpos-left" ';
        } else if($atts['position'] === 'right') {
            $position = ' data-position="janimpos-right" ';
        }

        if($atts['scale']) {
            $scale = ' data-transform="janimate-scale" ';
        }

        $additionalclass = 'jeg_do_animate';
    }

    return "<div class='{$w} {$atts['el_class']} {$additionalclass} {$atts['hideipad']} {$atts['hideiphone']}' {$fadein} {$scale} {$position}>"
    . wpb_js_remove_wpautop($content) .
    "</div>";
}


function vc_theme_jeg_hr($atts)
{
    $atts = shortcode_atts(
        array(
            'hr_type'       => '',
            'el_class'      => ''
        ),
        $atts
    );

    return '<hr class="'. $atts['hr_type'] .' ' . $atts['el_class'] . '">';
}


function vc_theme_jeg_spacing($atts) {
    $atts = shortcode_atts(
        array(
            'size' => '10',
            'el_class' => '',
        ),
        $atts
    );

    $paddingbottom = $atts['size'] . 'px';
    return "<div class='clearfix {$atts['el_class']}' style='padding-bottom: {$paddingbottom}'></div>";
}


function vc_theme_jeg_singleimage($atts) {
    $atts = shortcode_atts(
        array(
            'image'     => '',
            'title'     => '',
            'float'     => 'center',
            'size'      => '12',
            'zoom'      => '',
            'el_class'  => '',
        ),
        $atts
    );

    if($atts['zoom']) $atts['zoom'] = 'photoswipe';
    else  $atts['zoom']  = '';

    $imageurl = $atts['image'];
    if(ctype_digit($imageurl) || is_int($imageurl)) {
        $imageurl = jeg_get_image_attachment($atts['image']);
    }

    return "<a data-title='{$atts['title']}' href='" . $imageurl . "' class='{$atts['zoom']} {$atts['el_class']}'><img alt='{$atts['title']}' src='" . $imageurl . "' class='span{$atts['size']} align{$atts['float']}'></a>";
}


function vc_theme_jeg_googlemap($atts) {
    $atts = shortcode_atts(
        array(
            'title' => '',
            'lat' => '',
            'lng' => '',
            'zoom' => '14',
            'ratio' => '0.6',
            'popup' => '',
            'map_content' => '',
            'el_class' => '',
        ),
        $atts
    );

    return
        "<div id='" . uniqid() . "' class='jrmap {$atts['el_class']}' data-lat='{$atts['lat']}' data-lng='{$atts['lng']}' data-zoom='{$atts['zoom']}' data-ratio='{$atts['ratio']}' data-showpopup='{$atts['popup']}' data-title='{$atts['title']}'><div class='contenthidden'>"
        . wpb_js_remove_wpautop($atts['map_content']) .
        "</div></div>";
}


function vc_theme_jeg_testimonial($atts) {
    $atts = shortcode_atts(
        array(
            'image' => '',
            'author' => '',
            'author_position' => '',
            'float' => 'left',
            'text' => '',
            'el_class' => '',
        ),
        $atts
    );

    $imageurl = $atts['image'];
    if(ctype_digit($imageurl) || is_int($imageurl)) {
        $imageurl = jeg_get_image_attachment($atts['image']);
    }

    return
    "<div class='testimonialblock {$atts['el_class']} testi{$atts['float']}'>
		<p>{$atts['text']}</p>
		<div class='author'><strong class='name'>{$atts['author']}</strong> <span class='position'> {$atts['author_position']}</span></div>
		<img src='{$imageurl}'>
	</div>";
}


function vc_theme_jeg_alert($atts) {
    $atts = shortcode_atts(
        array(
            'type' => 'success',
            'main_text' => '',
            'second_text' => '',
            'show_close' => '',
            'el_class' => '',
        ),
        $atts
    );

    $closebutton = '';
    if($atts['show_close']) $closebutton = "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";

    return
        "<div class='{$atts['el_class']} alert alert-{$atts['type']} alert-dismissable'>
		{$closebutton}
		<strong>{$atts['main_text']}</strong> <div>{$atts['second_text']}</div>
	</div>";
}


function vc_theme_jeg_button($atts) {
    $atts = shortcode_atts(
        array(
            'type' => 'default',
            'text' => '',
            'url' => '#',
            'open_new_tab' => '',
            'align' => 'center',
            'el_class' => '',
        ),
        $atts
    );

    $target = '';
    if($atts['open_new_tab'] === 'yes') $target = 'target="_blank"';



    return
        "<div style='text-align: {$atts['align']};'><a href='{$atts['url']}' {$target} class='btn {$atts['el_class']} btn-{$atts['type']}'>{$atts['text']}</a></div>";
}


function vc_theme_jeg_youtube($atts) {
    $atts = shortcode_atts(
        array(
            'url' => '',
            'autoplay' => '',
            'repeat' => '',
            'el_class' => '',
        ),
        $atts
    );

    return "<div data-src='{$atts['url']}' data-type='youtube' data-repeat='{$atts['repeat']}' data-autoplay='{$atts['autoplay']}' class='{$atts['el_class']}'><div class='video-container'></div></div>";
}


function vc_theme_jeg_vimeo($atts) {
    $atts = shortcode_atts(
        array(
            'url' => '',
            'autoplay' => '',
            'repeat' => '',
            'el_class' => '',
        ),
        $atts
    );

    return "<div data-src='{$atts['url']}' data-repeat='{$atts['repeat']}' data-autoplay='{$atts['autoplay']}' data-type='vimeo' class='{$atts['el_class']}'><div class='video-container'></div></div>";
}

function vc_theme_jeg_soundcloud($atts) {
    $atts = shortcode_atts(
        array(
            'url' => '',
            'el_class' => '',
        ),
        $atts
    );

    return "<div data-src='{$atts['url']}' data-type='soundcloud' class='{$atts['el_class']}'><div class='video-container'></div></div>";
}


function vc_theme_jeg_html5video($atts) {
    $atts = shortcode_atts(
        array(
            'cover' => '',
            'videomp4' => '',
            'videowebm' => '',
            'videoogg' => '',
            'el_class' => '',
        ),
        $atts
    );

    $imageurl = $atts['cover'];
    if(ctype_digit($imageurl) || is_int($imageurl)) {
        $imageurl = jeg_get_image_attachment($atts['cover']);
    }

    return
    "<div class='{$atts['el_class']}' data-type='html5video' data-mp4='{$atts['videomp4']}' data-webm='{$atts['videowebm']}' data-ogg='{$atts['videoogg']}' data-cover='{$imageurl}'>
        <div class='video-container'></div>
    </div>";
}



function vc_theme_jeg_imgslider_wrapper($atts, $content) {
    $atts = shortcode_atts(
        array(
            'el_class' => '',
        ),
        $atts
    );

    return "<div class='article-slider-wrapper loading slider-inside-post {$atts['el_class']}'><div class='article-image-slider'>" .wpb_js_remove_wpautop($content) .  "</div></div>";
}

function vc_theme_jeg_imgslider ($atts) {
    $atts = shortcode_atts(
        array(
            'imgurl' => '',
            'alt' => '',
            'el_class' => ''
        ),
        $atts
    );

    $imageurl = $atts['imgurl'];
    if(ctype_digit($imageurl) || is_int($imageurl)) {
        $imageurl = jeg_get_image_attachment($atts['imgurl']);
    }

    return
        "<img src='{$imageurl}' alt='{$atts['alt']}' />";
}


function vc_theme_jeg_360view ($atts) {
    $atts = shortcode_atts(
        array(
            'urlpattern'    => '',
            'numberimage'   => '',
            'autoplay'      => '',
            'el_class'      => ''
        ),
        $atts
    );

    return
    "<div class='responsive360wrapper {$atts['el_class']}' data-imagepath='{$atts['urlpattern']}' data-imagecount='{$atts['numberimage']}' data-autoplay='{$atts['autoplay']}'>
		<div class='loadpercentage' data-percent='%'>0%</div>
	</div>";
}



$teamsequence = 0;
function vc_theme_jeg_team_wrapper($atts, $content) {
    $atts = shortcode_atts(
        array(
            'el_class' => '',
        ),
        $atts
    );

    global $teamsequence;
    $teamsequence = 0;

    $teamwrapper = "<div class='teamwrapper noswitch {$atts['el_class']}'>";
    $teamwrapper .= wpb_js_remove_wpautop($content);

    if($teamsequence%2 === 1) {
        $teamwrapper .= "</div><!-- close team tag wrapper -->";
    }
    $teamwrapper .= "</div>";

    return $teamwrapper;
}


function vc_theme_jeg_team_member($atts) {
    $atts = shortcode_atts(
        array(
            'image'             => '',
            'name'              => '',
            'subtext'           => '',
            'description'       => '',

            'enable_team_1'     => '',
            'socialname_1'      => '',
            'socialurl_1'       => '',

            'enable_team_2'     => '',
            'socialname_2'      => '',
            'socialurl_2'       => '',

            'enable_team_3'     => '',
            'socialname_3'      => '',
            'socialurl_3'       => '',
        ),
        $atts
    );

    $teamsocial = '';
    for($i = 1; $i <= 3; $i++) {
        if($atts["enable_team_$i"]) {
            $teamsocial .= '<a href="'. $atts["socialurl_$i"] .'" target="_blank">'. $atts["socialname_$i"] .'</a>';
        }
    }

    $imageurl = jeg_get_image_attachment($atts['image']);
    $imageurl = jeg_image_resizer($imageurl, 110, 110);


    $teamblock = '';

    // check sequence
    global $teamsequence;
    $teamsequence++;

    if($teamsequence%2 === 1) {
        $teamblock .= "<div class='teamrow'>";
    }

    $teamblock .=
        "<div class='teamlist' data-sequence='{$teamsequence}'>
            <div class='teamimage'>
                <img src='{$imageurl}' alt='{$atts['name']}'>
            </div>
            <div class='teammeta'>
                <strong>{$atts['name']}</strong>
                <span>{$atts['subtext']}</span>
            </div>
            <div class='teamword'>{$atts['description']}</div>
            <div class='teamsocial'>{$teamsocial}</div>
        </div>";

    // check sequence
    if($teamsequence%2 === 0) {
        $teamblock .= "</div><!-- close team tag -->";
    }

    return $teamblock;
}


function vc_theme_jeg_heading ($atts) {
    $atts = shortcode_atts(
        array(
            'title' => '',
            'alt' => '',
            'type' =>  'h1',
            'float' => 'center',
            'el_class' => '',
        ),
        $atts
    );

    return
        "<div class='section-header {$atts['el_class']} position-{$atts['float']}'>
		<{$atts['type']}>${atts['title']}</{$atts['type']}>
		<span class='sectionline'></span>
		<em>{$atts['alt']}</em>
	</div>";
}


function vc_theme_jeg_landing_quote ($atts) {
    $atts = shortcode_atts(
        array(
            'text' => '',
            'author' => '',
            'el_class' => '',
        ),
        $atts
    );

    return
        "</div>
	<quote class='{$atts['el_class']}'>
		<div class='quote-content'><sup class='fa fa-quote-left'></sup>{$atts['text']}<sup class='fa fa-quote-right'></sup></div>
		<cite>{$atts['author']}</cite>
	</quote>
	<div class='sectioncontainer'>";
}


function vc_theme_jeg_callout ($atts) {
    $atts = shortcode_atts(
        array(
            'text' => '',
            'buttontext' => '',
            'buttonurl' => '',
            'buttonstyle' => '',
            'center' => '',
            'el_class' => '',
        ),
        $atts
    );

    $posstatus = 'text-normal';
    if($atts['center']) {
        $posstatus = 'text-center';
    }

    return
        "<div class='{$atts['el_class']} calloutinner sectioncontainer {$posstatus}'>
		<h3>{$atts['text']}</h3>
		<a href='{$atts['buttonurl']}' class='btn btn-{$atts['buttonstyle']}'>{$atts['buttontext']}</a>
	</div>";
}



function vc_theme_jeg_iframe($atts) {
    $atts = shortcode_atts(
        array(
            'url' => '',
            'height' => '',
        ),
        $atts
    );

    return
        "</div>
	<div class='jkiframe' style='height: {$atts['height']}px;'>
		<iframe src='{$atts['url']}' width='100%' height='{$atts['height']}' frameborder='0'></iframe>
	</div>
	<div class='sectioncontainer'>";
}



function vc_theme_jeg_fullwidth_map_wrapper($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'lat' => '',
            'lng' => '',
            'title' => '',
            'zoom' => '',
            'height' => '',
            'nofullwidth' => ''
        ),
        $atts
    );

    $fullmap = "<div class='fullwidthmapwrapper' data-zoom='{$atts['zoom']}' style='height : {$atts['height']}px;'>
		<div class='mapoverlay'></div>
		<div class='mapcontainer' id='map_" . rand(100,1000) . "'>
			<div class='maplist'>
				<div class='infowindow' data-lat='{$atts['lat']}' data-lng='{$atts['lng']}'>
					<div class='infowindow-wrapper'>
						<h4>{$atts['title']}</h4>
						<ul>
						" . wpb_js_remove_wpautop($content) . "
						</ul>
					</div>
					<div class='closeme'></div>
				</div>
			</div>
		</div>
	</div>";

    if($atts['nofullwidth'] == 'true') {
        return $fullmap;
    } else {
        return "</div>$fullmap<div class='sectioncontainer'>";
    }

}


function vc_theme_jeg_fullwidth_map_detail($atts) {
    $atts = shortcode_atts(
        array(
            'text' => '',
            'url' => '',
        ),
        $atts
    );

    if(empty($atts['url'])) {
        return "<li><div class='detail'>{$atts['text']}</div></li>";
    } else {
        return "<li><div class='detail'><a href='{$atts['url']}'>{$atts['text']}</a></div></li>";
    }
}


function vc_theme_jeg_service_image_wrapper($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'el_class' => '',
        ),
        $atts
    );

    $additionalcss = '';
    global $is_safari;
    if(!wp_is_mobile() && !$is_safari) {
        $additionalcss = " jeg_animate_sequence jeg_animate_slow ";
    }

    return
        "<div class='{$atts['el_class']} service-slide {$additionalcss} grab' data-position='0' data-speed='300' data-animation='janimate-fadein'>
		" . wpb_js_remove_wpautop($content) . "
	</div>";
}


function vc_theme_jeg_service_image_item($atts) {
    $atts = shortcode_atts(
        array(
            'image' => '',
            'title' => '',
            'alt' => '',
            'background_color' => '',
            'text_color' => '',
            'el_class' => '',
        ),
        $atts
    );

    $bgcolor = '';
    if(!empty($atts['background_color'])) {
        $bgcolor = "background-color : " . $atts['background_color'] . ";";
    }

    $txtcolor = '';
    $borderline = '';
    if(!empty($atts['text_color'])) {
        $txtcolor = "color : " . $atts['text_color'] . ";";
        $borderline = "border-bottom-color : " . $atts['text_color'] . ";";
    }

    $additionalcss = '';
    global $is_safari;
    if(!wp_is_mobile() && !$is_safari) {
        $additionalcss = " jeg_do_animate ";
    }

    $imageurl = $atts['image'];
    if(ctype_digit($imageurl) || is_int($imageurl)) {
        $imageurl = jeg_get_image_attachment($atts['image']);
    }
    $imageurl = jeg_image_resizer($imageurl, 440, 440);

    return
    "<div class='{$additionalcss} item'>
		<div class='service-item {$atts['el_class']}' style='{$bgcolor}'>
			<div class='serviceicon'>
				<img src='{$imageurl}' alt='{$atts['alt']}'>
			</div>
			<h3 style='{$txtcolor}'>{$atts['title']}</h3>
			<span class='sectionline' style='{$borderline}'></span>
			<p style='{$txtcolor}'>{$atts['alt']}</p>
		</div>
	</div>";
}


function vc_theme_jeg_service_icon_wrapper($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'itemwidth' => '',
            'el_class' => '',
        ),
        $atts
    );

    $sizeclass = '';
    if($atts['itemwidth'] == '1') {
        $sizeclass = 'fullsize';
    } else if($atts['itemwidth'] == '2') {
        $sizeclass = 'halfsize';
    } else if($atts['itemwidth'] == '3') {
        $sizeclass = 'onethirdsize';
    }

    $additionalcss = '';
    if(!wp_is_mobile()) {
        $additionalcss = " jeg_animate_sequence jeg_animate_slow ";
    }

    return
        "<div class='{$atts['el_class']} service-extend {$additionalcss} {$sizeclass}' data-position='90' data-speed='200'>
		<div class='service-extend-wrapper'>
		" . wpb_js_remove_wpautop($content) . "
		</div>
	</div>";
}

function vc_theme_jeg_service_icon_item($atts) {
    $atts = shortcode_atts(
        array(
            'icon' => '',
            'title' => '',
            'desc' => '',
            'class' => '',
        ),
        $atts
    );


    $additionalcss = '';
    if(!wp_is_mobile()) {
        $additionalcss = " jeg_do_animate ";
    }

    return
        "<div class='{$atts['class']} serviceiconwrapper serviceitem {$additionalcss}' data-animation='janimate-fadein'>
		<div class='row-fluid'>
			<div class='span3'>
				<i class='fa {$atts['icon']}'></i>
			</div>
			<div class='span9'>
				<h3>{$atts['title']}</h3>
				<p>{$atts['desc']}</p>
			</div>
		</div>
	</div>";
}



function vc_theme_jeg_service_block_wrapper($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'itemwidth' => '',
            'el_class' => '',
        ),
        $atts
    );

    $sizeclass = '';
    if($atts['itemwidth'] == '2') {
        $sizeclass = 'halfsize';
    } else if($atts['itemwidth'] == '3') {
        $sizeclass = 'onethirdsize';
    } else if($atts['itemwidth'] == '4') {
        $sizeclass = 'oneforthsize';
    }

    $additionalcss = '';
    if(!wp_is_mobile()) {
        $additionalcss = " jeg_animate_sequence jeg_animate_slow ";
    }

    return
        "<div class='{$atts['el_class']} service-extend {$additionalcss} {$sizeclass}' data-position='90' data-speed='200'>
		<div class='service-extend-wrapper'>
		" . do_shortcode($content) . "
		</div>
	</div>";
}

function vc_theme_jeg_service_block_item($atts) {
    $atts = shortcode_atts(
        array(
            'icon' => '',
            'title' => '',
            'desc' => '',
            'el_class' => '',
        ),
        $atts
    );

    $additionalcss = '';
    if(!wp_is_mobile()) {
        $additionalcss = " jeg_do_animate ";
    }

    return
        "<div class='{$atts['el_class']} serviceblock serviceitem {$additionalcss}' data-animation='janimate-fadein'>
		<div class='service-block-wrapper'>
			<div class='heading'>
				<i class='fa {$atts['icon']}'></i>
			</div>
			<div class='content'>
				<h3>{$atts['title']}</h3>
				<p>{$atts['desc']}</p>
			</div>
		</div>
	</div>";
}




function vc_theme_jeg_blog_list ($atts) {
    $atts = shortcode_atts(
        array(
            'number' 			=> '',
            'readmorepage'      => ''
        ),
        $atts
    );

    $statement = array(
        'post_type'				=> "post",
        'orderby'				=> "date",
        'order'					=> "DESC",
        'posts_per_page'		=> $atts['number'] - 1
    );

    ob_start();
    $query = new WP_Query($statement);

    echo "</div><div class='section-blog-list'>";
    if ( $query->have_posts() ) {
        while ($query->have_posts()) {
            $query->the_post();
            $blogitemtype = vp_metabox('jkreativ_blog_format.format');
            jeg_get_template_part('template/blogpost/blog-shortcode', $blogitemtype);
        }
    }

    echo
        '<a class="notes-list-entry readmore" href="' .  get_page_link($atts['readmorepage'])  . '">' .
        '<span class="color-overlay"></span>' .
        '<div class="sectioncontainer blog-list-shortcode-content">'.
        '<h2 class="note-readmore">' . __("view all post", 'jeg_textdomain') . '</h2>'.
        '</div>'.
        '</a>';


    echo "</div><div>";
    wp_reset_postdata();

    return ob_get_clean();
}



function vc_theme_jeg_counter_block_wrapper ($atts, $content) {
    $atts = shortcode_atts(
        array(
            'itemwidth' => '',
            'el_class' => '',
        ),
        $atts
    );

    $sizeclass = '';
    if($atts['itemwidth'] == '2') {
        $sizeclass = 'halfsize';
    } else if($atts['itemwidth'] == '3') {
        $sizeclass = 'onethirdsize';
    } else if($atts['itemwidth'] == '4') {
        $sizeclass = 'oneforthsize';
    }

    return
        "<div class='{$atts['el_class']} {$sizeclass} counter-wrapper'>
		" . do_shortcode($content) . "
	</div>";
}

function vc_theme_jeg_counter_block_item ($atts) {
    $atts = shortcode_atts(
        array(
            'number' => '',
            'text' => '',
            'el_class' => '',
        ),
        $atts
    );

    $count = "&nbsp;";
    if(wp_is_mobile()) {
        $count = $atts['number'];
    }

    return
        "<div class='{$atts['el_class']} counterblock serviceitem'>
		<div class='counter-block-wrapper'>
			<div class='counternumber odometer' data-number='{$atts['number']}'>{$count}</div>
			<div class='title'>{$atts['text']}</div>
		</div>
	</div>";
}




function vc_theme_jeg_skill_bar_wrapper ($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'el_class' => '',
        ),
        $atts
    );

    return
        "<div class='skillgraph {$atts['el_class']}'>
		" . do_shortcode($content) . "
	</div>";
}


function vc_theme_jeg_skill_bar_item ($atts) {
    $atts = shortcode_atts(
        array(
            'title' => '',
            'percentage' => '',
            'graphcolor' => '',
            'el_class' => '',
        ),
        $atts
    );

    $graphcolor = '';
    if(!empty($atts['graphcolor'])) {
        $graphcolor = "background-color : " . $atts['graphcolor'] . ";";
    }

    return
        "<div class='skillgraph-wrapper {$atts['el_class']}'>
		<p>{$atts['title']}</p>
		<div class='graphwrap'>
			<div class='grapholder' data-width='{$atts['percentage']}' style='{$graphcolor}'>
				<strong>{$atts['percentage']}%</strong>
			</div>
		</div>
	</div>";
}


function vc_theme_jeg_testi_slider_wrapper ($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'el_class' => '',
        ),
        $atts
    );

    return
        "</div>
	 <div class='{$atts['el_class']} testislide owl-carousel owl-theme grab'>
		" . do_shortcode($content) . "
	 </div>
	 <div class='sectioncontainer'>";
}

function vc_theme_jeg_testi_slider_item ($atts) {
    $atts = shortcode_atts(
        array(
            'text' => '',
            'image' => '',
            'name' => '',
            'position' => '',
            'el_class' => '',
        ),
        $atts
    );

    $imageurl = $atts['image'];

    if(ctype_digit($imageurl) || is_int($imageurl)) {
        $imageurl = jeg_get_image_attachment($atts['image']);
    }

    $imageurl = jeg_image_resizer($imageurl, 160, 160);

    return
        "<div class='{$atts['el_class']} item'>
		<div class='testiwrapperinner'>
			<blockquote>
				<sup class='fa fa-quote-left'></sup><span>{$atts['text']}</span><sup class='fa fa-quote-right'></sup>
			</blockquote>
			<div class='authorimage'>
				<img src='{$imageurl}' alt='{$atts['name']}'/>
			</div>
			<div class='author'>{$atts['name']}<span>{$atts['position']}</span></div>
		</div>
	</div>";
}




function vc_theme_jeg_client_list_wrapper ($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'number' => '5',
            'el_class' => '',
        ),
        $atts
    );

    return
        "<div class='{$atts['el_class']} clientslider grab' data-number='{$atts['number']}'>
		" . do_shortcode($content) . "
	</div>";
}


function vc_theme_jeg_client_list_item ($atts) {
    $atts = shortcode_atts(
        array(
            'name' => '',
            'image' => '',
            'el_class' => '',
        ),
        $atts
    );

    $imageurl = $atts['image'];
    if(ctype_digit($imageurl) || is_int($imageurl)) {
        $imageurl = jeg_get_image_attachment($atts['image']);
    }

    return
        "<div class='{$atts['el_class']} item'><img src='{$imageurl}' alt='{$atts["name"]}'></div>";
}



function vc_theme_jeg_image_sequence_wrapper ($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'animspeed' => '',
            'seqspeed' => '',
        ),
        $atts
    );

    $animspeed = '';
    if($atts['animspeed'] === 'fast') {
        $animspeed = 'jeg_animate_fast';
    } else if ($atts['animspeed'] === 'slow') {
        $animspeed = 'jeg_animate_slow';
    } else if ($atts['animspeed'] === 'slower') {
        $animspeed = 'jeg_animate_slower';
    }


    $additionalcss = '';
    if(!wp_is_mobile()) {
        $additionalcss = " jeg_animate_sequence ";
    }

    return
        "<div class='imageanimwrap {$additionalcss} {$animspeed}' data-speed='{$atts['seqspeed']}' data-offset='90'>
		" . do_shortcode($content) . "
	</div>";
}


function vc_theme_jeg_image_sequence_item ($atts) {
    $atts = shortcode_atts(
        array(
            'image' => '',
            'fadein' => '',
            'scale' => '',
            'position' => '',
            'alt' => ''
        ),
        $atts
    );

    $fadein = '';
    if($atts['fadein']) {
        $fadein = 'data-animation="janimate-fadein"';
    }

    $position = '';
    if($atts['position'] === 'top') {
        $position = 'data-position="janimpos-top"';
    } else if($atts['position'] === 'bottom') {
        $position = 'data-position="janimpos-bottom"';
    } else if($atts['position'] === 'left') {
        $position = 'data-position="janimpos-left"';
    } else if($atts['position'] === 'right') {
        $position = 'data-position="janimpos-right"';
    }

    $scale = '';
    if($atts['scale']) {
        $scale = 'data-transform="janimate-scale"';
    }

    $additionalcss = '';
    if(!wp_is_mobile()) {
        $additionalcss = " jeg_do_animate ";
    }

    $imageurl = $atts['image'];
    if(ctype_digit($imageurl) || is_int($imageurl)) {
        $imageurl = jeg_get_image_attachment($atts['image']);
    }

    return
        "<img src='{$imageurl}' class='{$additionalcss}' {$scale} {$fadein} {$position} alt='{$atts['alt']}'>";
}



function vc_theme_jeg_product_slider ($atts) {
    $atts = shortcode_atts(
        array(
            'number' 			=> '',
            'column' 			=> '',
            'filter_category' 	=> array(),
            'image_dimension'	=> '',
            'el_class' 			=> ''
        ),
        $atts
    );

    $productquery = array(
        'post_type' 			=> 'product',
        'posts_per_page' 		=> $atts['number'],
        'post_status' 			=> 'publish',
        'ignore_sticky_posts'	=> 1,
        'meta_query' 			=> array(
            array(
                'key' 			=> '_visibility',
                'value' 		=> array('catalog', 'visible'),
                'compare' 		=> 'IN'
            )
        ),
    );

    if( !empty($atts['filter_category'])) {
        $productquery['tax_query'] =
            array(
                array(
                    'taxonomy' 	=>  'product_cat',
                    'terms' 	=>  $atts['filter_category'],
                    'field' 	=> 'id',
                    'operator' 	=> 'IN'
                )
            );
    }

    ob_start();

    $products = new WP_Query(apply_filters( 'woocommerce_shortcode_products_query', $productquery, $atts));
    if($products->have_posts())
    {
        while ( $products->have_posts() ) {
            $products->the_post();
            global $product;

            // product image
            $productimage 	= jeg_get_image_attachment(get_post_thumbnail_id($product->id));

            $defaultwidth	= 600;
            $thumbnail 		= jeg_image_resizer($productimage, $defaultwidth, $defaultwidth * $atts['image_dimension']);

            // category
            $terms 			= get_the_terms( $product->id, 'product_cat' );
            $termarray 		= array();
            if (!empty($terms)) {
                foreach ($terms as $term) {
                    $link = get_term_link($term);
                    $termarray[] =  "<a href='{$link}'>" . $term->name . "</a>";
                    break;
                }
            }

            $additionalcss = '';
            global $is_safari;
            if(!wp_is_mobile() && !$is_safari) {
                $additionalcss = " jeg_do_animate ";
            }

            ?>
            <div class='<?php $additionalcss ?> item'>
                <div class='product-item'>
                    <div class='product-cover'>
                        <img src='<?php echo $thumbnail ?>' alt='<?php echo get_the_title(); ?>'>
                    </div>
                    <span class='product-category'><?php echo implode(', ', $termarray) ?></span>
                    <a href='<?php echo get_the_permalink(); ?>'>
                        <h3><?php echo get_the_title(); ?></h3>
                    </a>
                    <span class="product-line"></span>
                    <?php
                    $rating = '';
                    if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {
                        $count   = $product->get_rating_count();
                        $average = $product->get_average_rating();
                        if ( $count > 0 ) {
                            ?>
                            <div class="review-box">
                                <div itemprop="ratingValue" title="<?php echo sprintf(__( 'Rated %.2f out of 5', 'jeg_textdomain' ), $average) ?>" class="star-rating">
                                    <span style="width:<?php echo ($average / 5 * 100) ?>%"></span>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    ?>
                    <div class='price'>
                        <span class='amount'><?php echo $product->get_price_html(); ?></span>
                    </div>
                </div>
            </div>
        <?php
        }
    }
    wp_reset_postdata();

    $additionalcss = '';
    global $is_safari;
    if(!wp_is_mobile() && !$is_safari) {
        $additionalcss = " jeg_animate_sequence jeg_animate_slow ";
    }

    return
        "<div data-column='{$atts['column']}' class='{$atts['el_class']} woocommerce jkreativ-woocommerce product-slide {$additionalcss} grab' data-position='0' data-speed='300' data-animation='janimate-fadein'>
		" . ob_get_clean() . "
	</div>";
}



function vc_theme_jeg_portfolio_wrapper ($atts, $content) {
    $atts = shortcode_atts(
        array(
            'parent' => '',
            'buttontext' => 'SHOW ALL PORTFOLIO'
        ),
        $atts
    );

    $additionalcss = '';
    if(!wp_is_mobile()) {
        $additionalcss = " jeg_animate_random jeg_animate_slower ";
    }

    return
        "<div class='landingmasonryblock'>
		<div class='landingmasonrywrapper {$additionalcss}' data-speed='600'>
		" . do_shortcode($content) . "
		</div>
		<div class='landingmasonryclear'>
			<a href='" . get_page_link($atts['parent']) . "' class='btn'>{$atts['buttontext']}</a>
		</div>
	</div>";
}


function vc_theme_jeg_portfolio_item ($atts) {
    $atts = shortcode_atts(
        array(
            'id' => '',
            'image' => '',
            'blockwidth' => '',
            'blockheight' => '',
        ),
        $atts
    );

    $post = get_post($atts['id']);
    $termlist = get_the_terms($post->ID, JEG_PORTFOLIO_CATEGORY);
    $termstring = array();

    if($termlist) {
        foreach($termlist as $term) {
            $termstring[] = $term->name;
        }
    }

    $blockwidth = 0;
    $blockheight = 0;

    switch ($atts['blockwidth']) {
        case '1/3':
            $blockwidth = 383;
            break;
        case '1/2':
            $blockwidth = 516;
            break;
        case '2/3':
            $blockwidth = 776;
            break;
    }

    switch ($atts['blockheight']) {
        case '1':
            $blockheight = 387;
            break;
        case '2':
            $blockheight = 784;
            break;
    }



    if(empty($atts['image'])) {
        $imageurl = jeg_get_image_attachment(get_post_meta($atts['id'], "coverimage", true));
    } else {
        $imageurl = $atts['image'];
        if(ctype_digit($imageurl) || is_int($imageurl)) {
            $imageurl = jeg_get_image_attachment($atts['image']);
        }
    }

    $image = jeg_image_resizer($imageurl, $blockwidth, $blockheight);


    $additionalcss = '';
    if(!wp_is_mobile()) {
        $additionalcss = " jeg_do_animate ";
    }

    return
        "<div class='landingmasonryitem {$additionalcss}' data-animation='janimate-fadein' data-width='{$atts['blockwidth']}' data-height='{$atts['blockheight']}'>
		<a href='" . get_page_link($atts['id']) . "'>
			<img src='{$image}' alt=''>
			<div class='mask'>
				<div class='info'>
					<h2>" . $post->post_title  . "</h2>
					<span></span>
					<p>" . implode(', ', $termstring)  . "</p>
				</div>
			</div>
		</a>
	</div>	";
}


function vc_theme_jeg_pricing_wrapper ($atts, $content) {
    $atts = shortcode_atts(
        array(
            'column' => '',
        ),
        $atts
    );

    $column = '';
    if($atts['column'] === '3') {
        $column = 'three-col';
    } else if($atts['column'] === '4') {
        $column = 'four-col';
    } else if($atts['column'] === '5') {
        $column = 'five-col';
    }

    return "<div class='pricing-table {$column} clearfix'>
	" . do_shortcode($content) . "
	</div>";
}

function vc_theme_jeg_pricing_item ($atts, $content) {
    $atts = shortcode_atts(
        array(
            'title' => '',
            'sign' => '',
            'price' => '',
            'duration' => '',
            'highlight' => '',
            'alt' => '',
            'showbutton' => '',
            'buttontext' => '',
            'buttonurl' => '',
        ),
        $atts
    );

    $highlight = '';
    if($atts['highlight']) {
        $highlight = 'pricehighlight';
    }

    $buttontext = '';
    if($atts['showbutton']) {
        $buttontext =
        "<div class='price-btn'>
		    <a href='{$atts['buttonurl']}' class='btn'>{$atts['buttontext']}</a>
	    </div>";
    }

    return
    "<div class='pricing-col {$highlight}'>
		<div class='pricing-col-wrapper'>
			<div class='price-heading'>
				<h3>
					{$atts['title']}
					<span>{$atts['alt']}</span>
				</h3>
			</div>
			<div class='pricing-content'>
				<div class='price'>
					<h4>
						<span class='sign'>{$atts['sign']}</span>
						{$atts['price']}
					</h4>
					<em>{$atts['duration']}</em>
				</div>
				" . do_shortcode($content) . "
				" . $buttontext . "
			</div>
		</div>
	</div>";
}
