<?php

// enqueue style
wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
wp_enqueue_style('js_composer_custom_css');

// output && element class
$output = $el_class = '';
$attsarray = array(
    'section_id'                        => '',
    'section_name'                      => '',
    'section_top_margin'                => '',
    'section_bottom_margin'             => '',
    'section_schema'                    => '',

    'enable_top_ribon'                  => '',
    'top_ribon_bg'                      => '',
    'enable_bottom_ribon'               => '',
    'bottom_ribon_bg'                   => '',

    'section_background'                => 'color',

    'background_color'                  => '#f0f0f0',

    'background_overlay'                => '',
    'image_background'                  => '',
    'background_vertical_position'      => '',
    'background_horizontal_position'    => '',
    'background_repeat'                 => '',
    'background_fullscreen'             => '',

    'moving_overlay'                    => '',
    'moving_direction'                  => '',
    'moving_image_background'           => '',

    'video_fallback_background'         => '',
    'video_mp4'                         => '',
    'video_webm'                        => '',
    'video_ogg'                         => '',
    'video_overlay'                     => '',
    'video_parallax'                    => '',
    'video_height'                      => '',
    'video_width'                       => '',

    'parallax_overlay'                  => '',
);

for($i = 1; $i <= 10; $i++){
    $attsarray["parallax_enable_$i"] = false;
    $attsarray["parallax_image_$i"] = '';
    $attsarray["parallax_background_$i"] = '';
    $attsarray["parallax_cover_$i"] = '';
    $attsarray["parallax_speed_$i"] = '';
}

$atts = shortcode_atts($attsarray, $atts);

// push section id detail
global $sectionnavigator;
array_push($sectionnavigator, array(
    'section_id'    => $atts['section_id'],
    'section_name'  => $atts['section_name']
));

// build data
$additionalstyle = '';
$overlaybackground = '';
$additionalclass = '';
$additionalsectiondata = '';
$parallaxhtml = '';

// text schema
$textschema = ' ';
if($atts['section_schema'] === 'light') {
    $textschema = ' light ';
}

$sectionid = jeg_to_slug($atts['section_id']);

switch($atts['section_background']) {
    case 'color' :
        $additionalstyle .= " background-color: {$atts['background_color']}; ";
        break;
    case 'imagebg' :
        $additionalstyle .= "background-image : url(" . jeg_get_image_attachment($atts['image_background']) . ");";
        $additionalstyle .= "background-position : {$atts['background_vertical_position']} {$atts['background_horizontal_position']};";
        $additionalstyle .= "background-repeat	: {$atts['background_repeat']};";
        $additionalstyle .=  ( $atts['background_fullscreen'] ) ? "background-size : cover;" : "" ;

        if($atts['background_overlay']) {
            $overlaybackground = "<div class='parallaxoverlay' style='background:" . $atts['background_overlay'] . ";'></div>";
        }
        break;
    case 'movingbg' :
        $additionalstyle .= " background-image : url(" . jeg_get_image_attachment($atts['moving_image_background']) . ");";
        if(wp_is_mobile()) {
            $additionalclass .= " movingbgmobile ";
        } else {
            $additionalclass .= " movingbg ";
        }
        $additionalsectiondata .= " data-direction='" . $atts['moving_direction']  . "' ";

        if($atts['moving_overlay']) {
            $overlaybackground = "<div class='parallaxoverlay' style='background: " . $atts['moving_overlay'] . ";'></div>";
        }
        break;
    case 'video' :
        if($atts['video_overlay']) {
            $overlaybackground = "<div class='parallaxoverlay' style='background: " . $atts['video_overlay'] . ";'></div>";
        }
        break;
    case 'parallaxbg' :
        if(!wp_is_mobile()) {
            global $is_IE;
            $mode =  $is_IE ? 1 : 2;

            if($mode == 1) {
                // IE
                $additionalclass 		= " parallax parallaxbackground ";
                $additionalsectiondata 	= " data-speed='" . $atts['parallax_speed_1'] . "' data-position='" . $atts["parallax_background_1"] . "' ";

                $additionalstyle 	    .= "background-image : url(" . jeg_get_image_attachment($atts["parallax_image_1"]) . ");";
                $additionalstyle 		.=  ( $atts["parallax_cover_1"] ) ? "background-size : cover;" : "" ;

                if($atts['parallax_overlay']) {
                    $overlaybackground = "\n\t<div class='parallaxoverlay' style='background: " . $atts['parallax_overlay'] . ";'></div>";
                }

                for($i = 2; $i < 10; $i++) {
                    if($atts["parallax_enable_$i"]) {
                        $parallaxstlye = '';
                        $parallaxstlye .= "background-image : url(" . jeg_get_image_attachment($atts["parallax_image_$i"]) . ");";
                        $parallaxstlye .= ( $atts["parallax_cover_$i"] ) ? "background-size : cover;" : "";

                        $parallaxsection = " data-speed='" . $atts["parallax_speed_$i"] . "' data-position='" . $atts["parallax_background_$i"] . "' ";
                        $parallaxhtml .= "<div class='parallax parallaxbackground' style='" . $parallaxstlye . "' " . $parallaxsection . "></div>";
                    }
                }

            } else {
                // Another Browser, Chrome, Firefox, Safari, etc
                for($i = 1; $i <= 10; $i++){
                    if($atts["parallax_enable_$i"]){
                        $datasize = ( $atts["parallax_cover_$i"] ) ? "cover;" : "nostretch";
                        $parallaxhtml .= "<img class='newparallax' alt='" . __("parallax layer", "jeg_textdomain") . "' src='" . jeg_get_image_attachment($atts["parallax_image_$i"]) . "' data-speed='{$atts["parallax_speed_$i"]}' data-sizemode='{$datasize}' data-position='{$atts["parallax_background_$i"]}'/>";
                    }
                }

                if($atts['parallax_overlay']) {
                    $overlaybackground = "\n\t<div class='parallaxoverlay' style='background: " . $atts['parallax_overlay'] . ";'></div>";
                }
            }
        } else {
            // switch to this background
            $additionalclass .= " parallaxfallback ";
            $additionalstyle .= " background-image : url(" . jeg_get_image_attachment($atts['parallax_image_1']) . "); ";

            if($atts['parallax_overlay']) {
                $overlaybackground = "\n\t<div class='parallaxoverlay' style='background: " . $atts['parallax_overlay'] . ";'></div>";
            }
        }
        break;
}

?>

<section
    class="<?php echo $atts['section_top_margin']; ?> <?php echo $atts['section_bottom_margin']; ?> <?php echo $textschema ?> <?php echo $additionalclass ?> "
    data-id="<?php echo $sectionid; ?>"
    data-title="<?php echo $atts['section_name'] ?>"
    <?php echo $additionalsectiondata; ?>
    style="<?php echo $additionalstyle ?>">

    <?php if($atts['section_background'] === 'video') { ?>
        <div class="video-wrap video-fixed video-fullscreen <?php echo ( $atts['video_parallax'] ) ? "parallaxvideo" : "" ?>">
            <div class="video-fallback" style="background-image: url('<?php echo jeg_get_image_attachment($atts['video_fallback_background']); ?>')"></div>
            <video autoplay="autoplay" loop="loop" autobuffer="autobuffer" poster="<?php echo jeg_get_image_attachment($atts['video_fallback_background']); ?>" muted
                   data-height="<?php echo $atts['video_height']; ?>"
                   data-width="<?php echo $atts['video_width']; ?>">
                <?php if($atts['video_mp4']) : ?>
                    <source src="<?php echo $atts['video_mp4'] ?>" type="video/mp4" />
                <?php endif; ?>

                <?php if($atts['video_webm']) : ?>
                    <source src="<?php echo $atts['video_webm'] ?>" type="video/webm" />
                <?php endif; ?>

                <?php if($atts['video_ogg']) : ?>
                    <source src="<?php echo $atts['video_ogg'] ?>" type="video/ogg" />
                <?php endif; ?>
            </video>
        </div>
    <?php } ?>

    <?php echo $parallaxhtml; ?>
    <?php echo $overlaybackground; ?>

    <?php
        if(isset($atts['enable_top_ribon']) && $atts['enable_top_ribon']) {
            $topribonsize = wp_get_attachment_image_src($atts['top_ribon_bg']);
            echo "<div class='section-top-ribon' style='background-image:url(" . jeg_get_image_attachment($atts['top_ribon_bg']) . "); height: {$topribonsize[2]}px;'></div>";
        }

        if(isset($atts['enable_bottom_ribon']) && $atts['enable_bottom_ribon']) {
            $bottomribonsize = wp_get_attachment_image_src($atts['bottom_ribon_bg']);
            echo "<div class='section-bottom-ribon' style='background-image:url(" . jeg_get_image_attachment ( $atts['bottom_ribon_bg'] ) . "); height: {$bottomribonsize[2]}px;'></div>";
        }
    ?>

    <?php echo wpb_js_remove_wpautop($content); ?>
</section>