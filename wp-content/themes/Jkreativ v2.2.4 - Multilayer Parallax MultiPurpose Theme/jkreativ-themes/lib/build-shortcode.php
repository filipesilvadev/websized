<?php

/** row fluid **/
$enablegridanimation;
function jeg_row($atts, $content = null) {

	$atts = shortcode_atts(
		array(
			'class' => '',
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

	if($atts['enable_animation'] === 'true' && !wp_is_mobile()) {
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

	return "<div class='row-fluid {$atts['class']} {$additionalcss}' {$additionaldata}>"
		. do_shortcode($content) .
	"</div>";
}

add_shortcode('row' , 'jeg_row');

function jeg_span($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'size' => '',
			'offset' => '0',
            'hideipad' => '0',
            'hideiphone' => '0',
			'fadein' => '',
			'scale' => '',
			'position' => '',
			'class' => '',
		),
		$atts
	);

	global $enablegridanimation;
	$fadein = '';
	$position = '';
	$scale = '';
	$additionalclass = '';

	$offset = ( $atts['offset'] !== '0' ) ? "offset{$atts['offset']}" : "";
	$atts['hideipad'] = ( $atts['hideipad'] === 'true' ) ? "hideipad" : "";
    $atts['hideiphone'] = ( $atts['hideiphone'] === 'true') ? "hideiphone" : "";


	if($enablegridanimation && !wp_is_mobile()) {
		if($atts['fadein'] === 'true') {
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

		if($atts['scale'] === 'true') {
			$scale = ' data-transform="janimate-scale" ';
		}

		$additionalclass = 'jeg_do_animate';
	}

	return "<div class='span{$atts['size']} {$atts['class']} {$additionalclass} {$offset} {$atts['hideipad']} {$atts['hideiphone']}' {$fadein} {$scale} {$position}>"
		. do_shortcode($content) .
	"</div>";
}
/** row fluid **/


add_shortcode('column' , 'jeg_span');

/** dropcaps **/
function jeg_dropcap($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'class' => '',
		),
		$atts
	);

	return '<span class="dropcaps ' . $atts['class'] . '">' . do_shortcode($content) . '</span>';
}

add_shortcode('dropcap' , 'jeg_dropcap');



/** hr **/
function jeg_doublehr($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'class' => '',
		),
		$atts
	);

	return '<hr class="doubleline ' . $atts['class'] . '">';
}

add_shortcode('doublehr' , 'jeg_doublehr');

function jeg_shorthr($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'class' => '',
		),
		$atts
	);

	return '<hr class="shorthr ' . $atts['class'] . '">';
}

add_shortcode('shorthr' , 'jeg_shorthr');


function jeg_hr($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'class' => '',
		),
		$atts
	);

	return '<hr class="' . $atts['class'] . '">';
}

add_shortcode('hr' , 'jeg_hr');

/** spacing **/

function jeg_spacing($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'size' => '10',
			'class' => '',
		),
		$atts
	);

	return "<div class='clearfix {$atts['class']}' style='padding-bottom: {$atts['size']}px'></div>";
}

add_shortcode('spacing' , 'jeg_spacing');


/** Highlight **/
function jeg_highlight($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'text_color' => 'fff',
			'bg_color' => '000',
			'class' => '',
		),
		$atts
	);

	return "<span class='highlight {$atts['class']}' style='background-color: {$atts['bg_color']}; color: {$atts['text_color']};'>" . do_shortcode($content) . "</span>";
}

add_shortcode('highlight' , 'jeg_highlight');


/** tooltip **/
function jeg_tooltip($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'text' => '',
			'url' => '',
			'class' => '',
		),
		$atts
	);

	return "<a data-original-title='{$atts['text']}' href='{$atts['url']}' data-toggle='tooltip' data-animation='fade' class=' {$atts['class']}'>" . do_shortcode($content) . "</a>";
}

add_shortcode('tooltip' , 'jeg_tooltip');


/** vimeo **/
function jeg_vimeo($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'url' => '',
            'autoplay' => '',
            'repeat' => '',
			'class' => '',
		),
		$atts
	);

	return "<div data-src='{$atts['url']}' data-repeat='{$atts['repeat']}' data-autoplay='{$atts['autoplay']}' data-type='vimeo' class='{$atts['class']}'><div class='video-container'></div></div>";
}

add_shortcode('vimeo' , 'jeg_vimeo');


/** youtube **/
function jeg_youtube($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'url' => '',
            'autoplay' => '',
            'repeat' => '',
			'class' => '',
		),
		$atts
	);

	return "<div data-src='{$atts['url']}' data-type='youtube' data-repeat='{$atts['repeat']}' data-autoplay='{$atts['autoplay']}' class='{$atts['class']}'><div class='video-container'></div></div>";
}

add_shortcode('youtube' , 'jeg_youtube');



/** soundcloud **/
function jeg_soundcloud($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'url' => '',
			'class' => '',
		),
		$atts
	);

	return "<div data-src='{$atts['url']}' data-type='soundcloud' class='{$atts['class']}'><div class='video-container'></div></div>";
}

add_shortcode('soundcloud' , 'jeg_soundcloud');


/** HTML 5 Video **/
function jeg_html5video($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'cover' => '',
			'videomp4' => '',
			'videowebm' => '',
			'videoogg' => '',
			'class' => '',
		),
		$atts
	);

	$imageurl = $atts['cover'];
	if(ctype_digit($imageurl) || is_int($imageurl)) {
		$imageurl = jeg_get_image_attachment($atts['cover']);
	}

	return "<div class='{$atts['class']}' data-type='html5video' data-mp4='{$atts['videomp4']}' data-webm='{$atts['videowebm']}' data-ogg='{$atts['videoogg']}' data-cover='{$imageurl}'>
			<div class='video-container'></div>
		</div>";
}

add_shortcode('html5video' , 'jeg_html5video');


/** singleimage **/
function jeg_singleimage($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'image' => '',
			'title' => '',
			'float' => 'center',
			'size' => '12',
			'zoom' => '',
			'class' => '',
		),
		$atts
	);

	if($atts['zoom'] === 'true') $atts['zoom'] = 'photoswipe';
	else  $atts['zoom']  = '';

	$imageurl = $atts['image'];
	if(ctype_digit($imageurl) || is_int($imageurl)) {
		$imageurl = jeg_get_image_attachment($atts['image']);
	}

	return "<a data-title='{$atts['title']}' href='" . $imageurl . "' class='{$atts['zoom']} {$atts['class']}'><img alt='{$atts['title']}' src='" . $imageurl . "' class='span{$atts['size']} align{$atts['float']}'></a>";
}

add_shortcode('singleimage' , 'jeg_singleimage');



/** googlemap **/
function jeg_googlemap($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'title' => '',
			'lat' => '',
			'lng' => '',
			'zoom' => '14',
			'ratio' => '0.1',
			'popup' => '',
			'class' => '',
		),
		$atts
	);

	return
	"<div id='" . uniqid() . "' class='jrmap {$atts['class']}' data-lat='{$atts['lat']}' data-lng='{$atts['lng']}' data-zoom='{$atts['zoom']}' data-ratio='{$atts['ratio']}' data-showpopup='{$atts['popup']}' data-title='{$atts['title']}'><div class='contenthidden'>"
		. do_shortcode($content) .
	"</div></div>";
}

add_shortcode('googlemap' , 'jeg_googlemap');

/** testimonial  **/
function jeg_testimonial ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'image' => '',
			'author' => '',
			'author_position' => '',
			'float' => 'left',
			'text' => '',
			'class' => '',
		),
		$atts
	);

	$imageurl = $atts['image'];
	if(ctype_digit($imageurl) || is_int($imageurl)) {
		$imageurl = jeg_get_image_attachment($atts['image']);
	}

	return
	"<div class='testimonialblock {$atts['class']} testi{$atts['float']}'>
		<p>{$atts['text']}</p>
		<div class='author'><strong class='name'>{$atts['author']}</strong> <span class='position'> {$atts['author_position']}</span></div>
		<img src='{$imageurl}'>
	</div>";
}

add_shortcode('testimonial' , 'jeg_testimonial');

/** quote  **/
function jeg_quote ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'text' => '',
			'author' => '',
			'author_additional' => '',
			'float' => 'left',
			'size' => '',
			'class' => '',
		),
		$atts
	);

	return
	"<blockquote class='{$atts['class']} pull-{$atts['float']} span{$atts['size']}'>
	  <p>{$atts['text']}</p>
	  <small>{$atts['author']}<cite title='{$atts['author_additional']}'>{$atts['author_additional']}</cite></small>
	</blockquote>	";
}

add_shortcode('quote' , 'jeg_quote');



/** alert  **/
function jeg_alert ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'type' => 'success',
			'main_text' => '',
			'second_text' => '',
			'show_close' => 'false',
			'class' => '',
		),
		$atts
	);

	$closebutton = '';
	if($atts['show_close'] === 'true') $closebutton = "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";

	return
	"<div class='{$atts['class']} alert alert-{$atts['type']} alert-dismissable'>
		{$closebutton}
		<strong>{$atts['main_text']}</strong> {$atts['second_text']}
	</div>";
}

add_shortcode('alert' , 'jeg_alert');


/** alert  **/
function jeg_button ($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'type' => 'default',
            'text' => '',
            'url' => '#',
            'open_new_tab' => 'false',
            'class' => '',
        ),
        $atts
    );


    $target = '';
    if($atts['open_new_tab'] === 'true') $target = 'target="_blank"';

    return
        "<a href='{$atts['url']}' {$target} class='btn {$atts['class']} btn-{$atts['type']}'>{$atts['text']}</a>";
}

add_shortcode('button' , 'jeg_button');



/*** accordion ***/
$accordionid = '';
function jeg_accordion ($atts, $content = null) {
	global $accordionid;
	$accordionid = uniqid();

	$atts = shortcode_atts(
		array(
			'class' => '',
		),
		$atts
	);

	return"<div class='panel-group {$atts['class']}' id='" . $accordionid  . "'>" . do_shortcode($content) . "</div>";
}

add_shortcode('accordion' , 'jeg_accordion');



/*** accordion element ***/
function jeg_accordion_element ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'title' => 'Accordion Title',
			'collapsed' => 'false',
			'class' => '',
		),
		$atts
	);

	global $accordionid;
	$uniqueid = uniqid();
	$collapsed = ( $atts['collapsed'] === 'true' ) ? "in" : "";

	return
	"<div class='panel panel-default {$atts['class']}'>
		<div class='panel-heading'>
	  		<h4 class='panel-title'>
	    		<a class='accordion-toggle' data-toggle='collapse' data-parent='#{$accordionid}' href='#{$uniqueid}'>
	      			{$atts['title']}
	    		</a>
	  		</h4>
		</div>
		<div id='{$uniqueid}' class='panel-collapse collapse {$collapsed}'>
  			<div class='panel-body'>
    			" . do_shortcode($content) . "
			</div>
		</div>
  	</div>";
}

add_shortcode('accordion-element' , 'jeg_accordion_element');




/** tab heading wrapper **/

function jeg_tab_heading_wrapper ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'class' => '',
		),
		$atts
	);
	return"<ul class='nav nav-tabs {$atts['class']}'>" . do_shortcode($content) . "</ul>";
}

add_shortcode('tab-heading-wrapper' , 'jeg_tab_heading_wrapper');



/** tab heading  **/

function jeg_tab_heading ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'id' => '',
			'active' => 'false',
			'title' => '',
		),
		$atts
	);

	$active = ( $atts['active'] === 'true' ) ? "active" : "";

	return
	"<li class='{$active }'><a href='#{$atts['id']}' data-toggle='tab'>{$atts['title']}</a></li>";
}

add_shortcode('tab-heading' , 'jeg_tab_heading');



/** tab content wrapper **/

function jeg_tab_content_wrapper ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'class' => '',
		),
		$atts
	);
	return"<div class='tab-content {$atts['class']}'>" . do_shortcode($content) . "</div>";
}

add_shortcode('tab-content-wrapper' , 'jeg_tab_content_wrapper');



/** tab content **/

function jeg_tab_content ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'id' => '',
			'active' => 'false',
		),
		$atts
	);

	$active = ( $atts['active'] === 'true' ) ? " in active " : "";

	return
	"<div class='tab-pane fade {$active}' id='{$atts['id']}'><p>" . do_shortcode($content) . "</p></div>";
}

add_shortcode('tab-content' , 'jeg_tab_content');


/** image slider wrapper **/

function jeg_imageslider_wrapper ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'class' => '',
		),
		$atts
	);

	return "<div class='article-slider-wrapper loading slider-inside-post {$atts['class']}'><div class='article-image-slider'>" .do_shortcode($content) .  "</div></div>";
}

add_shortcode('imgslider-wrapper' , 'jeg_imageslider_wrapper');


/** imgslider  **/

function jeg_imgslider ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'imgurl' => ''
		),
		$atts
	);

	$imageurl = $atts['imgurl'];
	if(ctype_digit($imageurl) || is_int($imageurl)) {
		$imageurl = jeg_get_image_attachment($atts['imgurl']);
	}

	return
	"<img src='{$imageurl}' />";
}

add_shortcode('imgslider' , 'jeg_imgslider');



/** team wrapper **/


function jeg_team_block ($atts) {

    $atts = shortcode_atts(
        array(
            'member' => ''
        ),
        $atts
    );

    $memberlist = explode(',',$atts['member']);
    $statement = array(
        'post__in'              => $memberlist,
        'post_type'				=> "team",
        'paged' 				=> 'nopaging',
        'orderby'               => 'menu_order',
        'order'                 => 'ASC'
    );
    $query = new WP_Query($statement);
    $teamblock = '';

    $sequence = 0;
    if ( $query->have_posts() ) {
        while ( $query->have_posts() )
        {
            $query->the_post();
            if($sequence%2 === 0) $teamblock .= '<div class="teamrow">';

            // title, subtitle, description
            $teamname = get_the_title();
            $teamsubtitle = vp_metabox('jkreativ_team.position');
            $teamdescription = vp_metabox('jkreativ_team.description');

            // image url
            $imageurl = jeg_get_image_attachment(vp_metabox('jkreativ_team.image'));
            $imageurl = jeg_image_resizer($imageurl, 110, 110);

            // team social
            $teamsocial = '';
            $teamsocialarray = vp_metabox('jkreativ_team.social');
            foreach($teamsocialarray as $social) {
                $teamsocial .= '<a href="'. $social['socialurl'] .'" target="_blank">'. $social['socialname'] .'</a>';
            }

            $teamblock .=
            "<div class='teamlist'>
                <div class='teamimage'>
                    <img src='{$imageurl}' alt='{$teamname}'>
                </div>
                <div class='teammeta'>
                    <strong>{$teamname}</strong>
                    <span>{$teamsubtitle}</span>
                </div>
                <div class='teamword'>{$teamdescription}</div>
                <div class='teamsocial'>{$teamsocial}</div>
            </div>";

            if($sequence%2 === 1) $teamblock .= '</div>';
            $sequence++;
        }
    }
    wp_reset_postdata();

    if($sequence%2 === 1) $teamblock .= '</div>';

    return
    '<div class="teamwrapper noswitch">'.
        $teamblock .
    '</div>';
}

add_shortcode('teamblock' , 'jeg_team_block');

function jeg_team_wrapper ($atts, $content = null) {
	return"<div class='teamwrapper noswitch'>" . do_shortcode($content) . "</div>";
}

add_shortcode('team-wrapper' , 'jeg_team_wrapper');


/** team row **/

function jeg_team_row ($atts, $content = null) {
	return"<div class='teamrow'>" . do_shortcode($content) . "</div>";
}

add_shortcode('team-row' , 'jeg_team_row');


/** imgslider  **/

function jeg_team_content ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'imgurl' => '',
			'teamname' => '',
			'secondline' => '',
		),
		$atts
	);

	$imageurl = $atts['imgurl'];
	if(ctype_digit($imageurl) || is_int($imageurl)) {
		$imageurl = jeg_get_image_attachment($atts['imgurl']);
	}

	$imageurl = jeg_image_resizer($imageurl, 110, 110);

	return
	"<div class='teamlist'>
		<div class='teamimage'>
			<img src='{$imageurl}' alt='{$atts['teamname']}'>
		</div>
		<div class='teammeta'>
			<strong>{$atts['teamname']}</strong>
			<span>{$atts['secondline']}</span>
		</div>
		" . do_shortcode($content) . "
	</div>";
}

add_shortcode('team-content' , 'jeg_team_content');

function jeg_team_content_text($atts, $content = null) {
	return
	"<div class='teamword'>
		" . do_shortcode($content) . "
	</div>";
}

add_shortcode('team-content-text', 'jeg_team_content_text');



function jeg_team_social($atts, $content = null) {
	return
	"<div class='teamsocial'>
		" . do_shortcode($content) . "
	</div>";
}

add_shortcode('team-social', 'jeg_team_social');

function jeg_team_social_item($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'url' => '',
			'text' => '',
		),
		$atts
	);

	return
	"<a target='_blank' href='{$atts['url']}'>{$atts['text']}</a>";
}

add_shortcode('team-social-item', 'jeg_team_social_item');


/** em  **/

function jeg_em ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'color' => ''
		),
		$atts
	);

	return
	"<em style='color : #{$atts['color']};'>{$content}</em>";
}

add_shortcode('em' , 'jeg_em');


function jeg_strong ($atts, $content = null) {
    $atts = shortcode_atts(
        array(
            'color' => '',
        ),
        $atts
    );

    return
        "<strong style='color : {#{$atts['color']};'>{$content}</strong>";
}

add_shortcode('strong' , 'jeg_strong');


function jeg_br ($atts, $content = null) {
    return
        "<br/>";
}

add_shortcode('br' , 'jeg_br');


/****
 * landing page builder
 ******/

/** heading **/
function jeg_heading ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'title' => '',
			'alt' => '',
			'class' => '',
			'type' =>  'h1',
			'float' => 'center'
		),
		$atts
	);

	return
	"<div class='section-header {$atts['class']} position-{$atts['float']}'>
		<{$atts['type']}>${atts['title']}</{$atts['type']}>
		<span class='sectionline'></span>
		<em>{$atts['alt']}</em>
	</div>";
}

add_shortcode('heading' , 'jeg_heading');



/** service image **/

function jeg_service_wrap ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'class' => '',
		),
		$atts
	);

	$additionalcss = '';
	global $is_safari;
	if(!wp_is_mobile() && !$is_safari) {
		$additionalcss = " jeg_animate_sequence jeg_animate_slow ";
	}

	return
	"<div class='{$atts['class']} service-slide {$additionalcss} grab' data-position='0' data-speed='300' data-animation='janimate-fadein'>
		" . do_shortcode($content) . "
	</div>";
}

add_shortcode('service-wrap' , 'jeg_service_wrap');



function jeg_service_item ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'image' => '',
			'title' => '',
			'alt' => '',
			'background_color' => '',
			'text_color' => '',
			'class' => '',
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
		<div class='service-item {$atts['class']}' style='{$bgcolor}'>
			<div class='serviceicon'>
				<img src='{$imageurl}' alt='{$atts['alt']}'>
			</div>
			<h3 style='{$txtcolor}'>{$atts['title']}</h3>
			<span class='sectionline' style='{$borderline}'></span>
			<p style='{$txtcolor}'>{$atts['alt']}</p>
		</div>
	</div>";
}

add_shortcode('service-item' , 'jeg_service_item');


/** skill bar **/

function jeg_skill_bar_wrap ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'class' => '',
		),
		$atts
	);

	return
	"<div class='skillgraph {$atts['class']}'>
		" . do_shortcode($content) . "
	</div>";
}

add_shortcode('skill-bar-wrap' , 'jeg_skill_bar_wrap');



function jeg_skill_bar_item ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'title' => '',
			'percentage' => '',
			'graphcolor' => '',
			'class' => '',
		),
		$atts
	);

	$graphcolor = '';
	if(!empty($atts['graphcolor'])) {
		$graphcolor = "background-color : " . $atts['graphcolor'] . ";";
	}

	return
	"<div class='skillgraph-wrapper {$atts['class']}'>
		<p>{$atts['title']}</p>
		<div class='graphwrap'>
			<div class='grapholder' data-width='{$atts['percentage']}' style='{$graphcolor}'>
				<strong>{$atts['percentage']}%</strong>
			</div>
		</div>
	</div>";
}

add_shortcode('skill-bar-item' , 'jeg_skill_bar_item');



/** landing page quote **/


function jeg_landing_quote ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'text' => '',
			'author' => '',
			'class' => '',
		),
		$atts
	);

	return
	"</div>
	<quote class='{$atts['class']}'>
		<div class='quote-content'><sup class='fa fa-quote-left'></sup>{$atts['text']}<sup class='fa fa-quote-right'></sup></div>
		<cite>{$atts['author']}</cite>
	</quote>
	<div class='sectioncontainer'>";
}

add_shortcode('landing-quote' , 'jeg_landing_quote');


/** service icon **/


function jeg_service_icon_wrap ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'itemwidth' => '',
			'class' => '',
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
	"<div class='{$atts['class']} service-extend {$additionalcss} {$sizeclass}' data-position='90' data-speed='200'>
		<div class='service-extend-wrapper'>
		" . do_shortcode($content) . "
		</div>
	</div>";
}

add_shortcode('service-icon-wrap' , 'jeg_service_icon_wrap');

function jeg_service_icon_item ($atts, $content = null) {
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

add_shortcode('service-icon-item' , 'jeg_service_icon_item');


/** service block **/


function jeg_service_block_wrap ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'itemwidth' => '',
			'class' => '',
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
	"<div class='{$atts['class']} service-extend {$additionalcss} {$sizeclass}' data-position='90' data-speed='200'>
		<div class='service-extend-wrapper'>
		" . do_shortcode($content) . "
		</div>
	</div>";
}

add_shortcode('service-block-wrap' , 'jeg_service_block_wrap');

function jeg_service_block_item ($atts, $content = null) {
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
	"<div class='{$atts['class']} serviceblock serviceitem {$additionalcss}' data-animation='janimate-fadein'>
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

add_shortcode('service-block-item' , 'jeg_service_block_item');





/** counter block **/


function jeg_counter_block ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'itemwidth' => '',
			'class' => '',
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
	"<div class='{$atts['class']} {$sizeclass} counter-wrapper'>
		" . do_shortcode($content) . "
	</div>";
}

add_shortcode('counter-block' , 'jeg_counter_block');


function jeg_counter_block_item ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'number' => '',
			'text' => '',
			'class' => '',
		),
		$atts
	);

	$count = "&nbsp";
	if(wp_is_mobile()) {
		$count = $atts['number'];
	}

	return
	"<div class='{$atts['class']} counterblock serviceitem'>
		<div class='counter-block-wrapper'>
			<div class='counternumber odometer' data-number='{$atts['number']}'>{$count}</div>
			<div class='title'>{$atts['text']}</div>
		</div>
	</div>";

}

add_shortcode('counter-item' , 'jeg_counter_block_item');



/** testi **/

function jeg_testi_slide_wrap($atts, $content = null)
{
	$atts = shortcode_atts(
		array(
			'class' => '',
		),
		$atts
	);

	return
	"</div>
	 <div class='{$atts['class']} testislide owl-carousel owl-theme grab'>
		" . do_shortcode($content) . "
	 </div>
	 <div class='sectioncontainer'>";
}

add_shortcode('testi-slide-wrap' , 'jeg_testi_slide_wrap');


function jeg_testi_slide_item ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'text' => '',
			'image' => '',
			'name' => '',
			'position' => '',
			'class' => '',
		),
		$atts
	);

	$imageurl = $atts['image'];

	if(ctype_digit($imageurl) || is_int($imageurl)) {
		$imageurl = jeg_get_image_attachment($atts['image']);
	}

	$imageurl = jeg_image_resizer($imageurl, 160, 160);

	return
	"<div class='{$atts['class']} item'>
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

add_shortcode('testi-slide-item' , 'jeg_testi_slide_item');


/** client **/


function jeg_client_list ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'number' => '5',
			'class' => '',
		),
		$atts
	);

	return
	"<div class='{$atts['class']} clientslider grab' data-number='{$atts['number']}'>
		" . do_shortcode($content) . "
	</div>";
}

add_shortcode('client-list' , 'jeg_client_list');



function jeg_client_image ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'name' => '',
			'image' => '',
			'class' => '',
		),
		$atts
	);

	$imageurl = $atts['image'];
	if(ctype_digit($imageurl) || is_int($imageurl)) {
		$imageurl = jeg_get_image_attachment($atts['image']);
	}

	return
	"<div class='{$atts['class']} item'><img src='{$imageurl}' alt='{$atts["name"]}'></div>";
}

add_shortcode('client-image' , 'jeg_client_image');


/** call out button **/

function jeg_callout ($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'text' => '',
			'buttontext' => '',
			'buttonurl' => '',
			'buttonstyle' => '',
			'center' => '',
			'class' => '',
		),
		$atts
	);

	$posstatus = 'text-normal';
	if($atts['center'] === 'true') {
		$posstatus = 'text-center';
	}

	return
	"<div class='{$atts['class']} calloutinner sectioncontainer {$posstatus}'>
		<h3>{$atts['text']}</h3>
		<a href='{$atts['buttonurl']}' class='btn btn-{$atts['buttonstyle']}'>{$atts['buttontext']}</a>
	</div>";
}

add_shortcode('callout' , 'jeg_callout');

/*** iframe **/

function jeg_iframe($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'text' => '',
			'width' => '',
		),
		$atts
	);

	return
	"</div>
	<div class='jkiframe' style='height: {$atts['width']}px;'>
		<iframe src='{$atts['text']}' width='100%' height='{$atts['width']}' frameborder='0'></iframe>
	</div>
	<div class='sectioncontainer'>";
}

add_shortcode('iframe' , 'jeg_iframe');


/*** image sequence ***/
function jeg_image_seq($atts, $content = null) {
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


add_shortcode('image-seq', 'jeg_image_seq');


function jeg_image_seq_item($atts, $content = null) {
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
	if($atts['fadein'] === 'true') {
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
	if($atts['scale'] === 'true') {
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


add_shortcode('image-seq-item', 'jeg_image_seq_item');


/** portfolio **/

function jeg_portfolio_wrapper($atts, $content = null) {
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


add_shortcode('portfolio-wrapper', 'jeg_portfolio_wrapper');


function jeg_portfolio_item($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'id' => '',
			'image' => '',
			'width' => '',
			'height' => '',
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

	switch ($atts['width']) {
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

	switch ($atts['height']) {
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
	"<div class='landingmasonryitem {$additionalcss}' data-animation='janimate-fadein' data-width='{$atts['width']}' data-height='{$atts['height']}'>
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


add_shortcode('portfolio-item', 'jeg_portfolio_item');



/** pricing table ***/


function jeg_pricingblock($atts) {
    $atts = shortcode_atts(
        array(
            'content' => '',
        ),
        $atts
    );

    $pricinglist = explode(',',$atts['content']);
    $statement = array(
        'post__in'              => $pricinglist,
        'post_type'				=> "pricing",
        'paged' 				=> "nopaging",
        'orderby'               => 'menu_order',
        'order'                 => 'ASC'

    );
    $query = new WP_Query($statement);
    $pricingblock = '';

    if ( $query->have_posts() ) {
        while ($query->have_posts()) {
            $query->the_post();

            //  header
            $pricingtitle = get_the_title();
            $highlight = "";
            $subtitle = "";
            if(vp_metabox('jkreativ_pricing.highlight')) {
                $highlight = "pricehighlight";
                $subtitle = "<span>". vp_metabox('jkreativ_pricing.subtitle') ."</span>";
            }

            // pricing sign & range
            $pricesign = vp_metabox('jkreativ_pricing.pricesign');
            $pricenumber = vp_metabox('jkreativ_pricing.price');
            $pricerange = vp_metabox('jkreativ_pricing.pricerange');

            // feature list
            $pricefeature = '';
            $pricefeaturearray = vp_metabox('jkreativ_pricing.feature');
            foreach($pricefeaturearray as $pricearr) {
                $pricefeature .= '<li>' . $pricearr['title'] . '</li>';
            }

            // price button
            $pricebutton = '';
            if(vp_metabox('jkreativ_pricing.showbutton')){
                $pricebutton = '<a class="btn" href="'. vp_metabox('jkreativ_pricing.button.0.url') .'">'. vp_metabox('jkreativ_pricing.button.0.title') .'</a>';
            }

            $pricingblock .=
                "<div class='pricing-col {$highlight}'>
                    <div class='pricing-col-wrapper'>
                        <div class='price-heading'>
                            <h3>
                                {$pricingtitle}
                                {$subtitle}
                            </h3>
                        </div>
                        <div class='pricing-content'>
                            <div class='price'>
                                <h4>
                                    <span class='sign'>{$pricesign}</span>
                                    {$pricenumber}
                                </h4>
                                <em>{$pricerange}</em>
                            </div>
                            <ul class='pricing-list'>
                                {$pricefeature}
                            </ul>
                        </div>
                        <div class='price-btn'>
                            {$pricebutton}
                        </div>
                    </div>
                </div>";
        }
    }
    wp_reset_postdata();

    $column = '';
    if(sizeof($query->posts) === 3) {
        $column = 'three-col';
    } else if(sizeof($query->posts) === 4) {
        $column = 'four-col';
    } else if(sizeof($query->posts) === 5) {
        $column = 'five-col';
    } else if(sizeof($query->posts) < 3) {
        $column = 'three-col';
    } else if(sizeof($query->posts) > 5) {
        $column = 'five-col';
    }

    return "<div class='pricing-table {$column} clearfix'>
	" . $pricingblock . "
	</div>";
}

add_shortcode('pricingblock', 'jeg_pricingblock');

function jeg_pricing_table ($atts, $content = null){
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

add_shortcode('pricing-table', 'jeg_pricing_table');

function jeg_pricing_column ($atts, $content = null){
	$atts = shortcode_atts(
		array(
			'title' => '',
			'alt' => '',
			'sign' => '',
			'price' => '',
			'duration' => '',
			'highlight' => '',
		),
		$atts
	);

	$highlight = '';
	if($atts['highlight'] === 'true') {
		$highlight = 'pricehighlight';
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
			</div>
		</div>
	</div>";
}

add_shortcode('pricing-column', 'jeg_pricing_column');

function jeg_pricing_list_wrap($atts, $content = null) {
	return
	"<ul class='pricing-list'>
		" . do_shortcode($content) . "
	</ul>";
}

add_shortcode('pricing-list-wrap', 'jeg_pricing_list_wrap');

function jeg_pricing_list($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'title' => '',
		),
		$atts
	);

	return "<li>{$atts['title']}</li>";
}

add_shortcode('pricing-list', 'jeg_pricing_list');


function jeg_pricing_button($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'url' => '',
			'text' => '',
		),
		$atts
	);

	return
	"<div class='price-btn'>
		<a href='{$atts['url']}' class='btn'>{$atts['text']}</a>
	</div>";
}

add_shortcode('pricing-button', 'jeg_pricing_button');



/*** 360 view ***/

function jeg_360view($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'urlpattern' => '',
			'numberimage' => '',
			'autoplay' => '',
			'class' => ''
		),
		$atts
	);

	return
	"<div class='responsive360wrapper {$atts['class']}' data-imagepath='{$atts['urlpattern']}' data-imagecount='{$atts['numberimage']}' data-autoplay='{$atts['autoplay']}'>
		<div class='loadpercentage' data-percent='%'>0%</div>
	</div>";
}

add_shortcode('360view', 'jeg_360view');


/*** CREDIT ***/


function jeg_credit_heading($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'text' => '',
		),
		$atts
	);

	return
	"<p class='top'>{$atts['text']}</p>";
}

add_shortcode('credit-heading', 'jeg_credit_heading');


function jeg_credit_separator($atts, $content = null) {
	return
	"<span class='break'></span>";
}

add_shortcode('credit-separator', 'jeg_credit_separator');


function jeg_credit_title($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'text' => '',
		),
		$atts
	);

	return
	"<p class='title'>{$atts['text']}</p>";
}

add_shortcode('credit-title', 'jeg_credit_title');


function jeg_credit_name($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'text' => '',
		),
		$atts
	);

	return
	"<p class='name'>{$atts['text']}</p>";
}

add_shortcode('credit-name', 'jeg_credit_name');


/** fullwidth map **/

function jeg_fullwidthmap($atts, $content = null) {
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
						" . do_shortcode($content) . "
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

add_shortcode('fullwidthmap', 'jeg_fullwidthmap');


function jeg_fullwidthmapdetail($atts, $content = null) {
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

add_shortcode('fullwidthmapdetail', 'jeg_fullwidthmapdetail');

function jeg_singleicon($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'id' 			=> '',
			'color'			=> '',
			'size'			=> '',
			'class' 		=> ''
		),
		$atts
	);

	$additionalstyle = '';

	if(!empty($atts['color'])) 	$additionalstyle .=  "color : {$atts['color']};";
	if(!empty($atts['size'])) 	$additionalstyle .=  "font-size : {$atts['size']}em;";


	return "<i class='fa {$atts['class']} {$atts['id']}' style='{$additionalstyle}'></i>";
}

add_shortcode('singleicon', 'jeg_singleicon');


function jeg_iconlistwrapper($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'class' 		=> ''
		),
		$atts
	);
	return "<ul class='fa-ul {$atts['class']}'>" . do_shortcode($content) . "</ul>";
}

add_shortcode('iconlistwrapper', 'jeg_iconlistwrapper');


function jeg_iconlist($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'class' 		=> '',
			'id' 			=> '',
			'spin'			=> '',
			'color'			=> '',
		),
		$atts
	);

	$additionalstyle = '';
	if(!empty($atts['color'])) 	$additionalstyle .=  "color : {$atts['color']};";

	$spinclass = '';
	if($atts['spin'] === 'true') $spinclass = 'fa-spin';

	return "<li><i class='fa fa-fw {$spinclass} {$atts['id']}' style='$additionalstyle'></i> " . do_shortcode($content) . "</li>";
}

add_shortcode('iconlist', 'jeg_iconlist');


function jeg_product_slider($atts, $content = null) {
	$atts = shortcode_atts(
		array(
			'number' 			=> '',
			'column' 			=> '',
			'filter_category' 	=> array(),
			'image_dimension'	=> '',
			'class' 			=> ''
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
	"<div data-column='{$atts['column']}' class='{$atts['class']} woocommerce jkreativ-woocommerce product-slide {$additionalcss} grab' data-position='0' data-speed='300' data-animation='janimate-fadein'>
		" . ob_get_clean() . "
	</div>";
}

add_shortcode('product-slider', 'jeg_product_slider');



function jeg_blog_list ($atts, $content = null) {
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


add_shortcode('jeg-blog-list', 'jeg_blog_list');



