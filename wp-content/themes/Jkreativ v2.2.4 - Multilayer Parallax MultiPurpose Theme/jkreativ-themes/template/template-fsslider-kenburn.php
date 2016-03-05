<?php
/** 
Template Name: Fullscreen (Slider) - Kenburn Slider
 */
 
get_header();

if ( ! post_password_required() ) 
{
?>
<div class="headermenu">
    <?php get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->


<!-- begin IOS Slider -->
<div class="fs-container">
    <div class="kenburnwrapper"></div>
    <div class="kenburntext">

        <?php
        $slideritem = vp_metabox('jkreativ_page_fsslider_content.slideritem');
        foreach($slideritem as $id => $slider) {
            echo "<div class='kenburntextcontent ioscontainer item'>";
            echo "<div class='text1'>" . do_shortcode($slider['firstline']) . "</div>\n";
            if($slider['secondline']) {
                echo "<div class='text2'>{$slider['secondline']}</div>\n";
            }
            if($slider['show_thirdline']) {
                echo "<div class='text3'><a class='slider-button' href='{$slider['buttonurl']}'><span class='button-text'>{$slider['buttontext']}</span></a></div>\n";
            }
            echo "</div>\n";
        }
        ?>

    </div>
    <div class="kennav">
        <ul>
            <?php
            foreach($slideritem as $id => $slider) {
                echo "<li data-seq='$id'>" . ( $id + 1 ) . "</li>";
            }
            ?>
        </ul>
    </div>
</div>
<div class="sliderloader bigloader"></div>

<script>
    (function($){
        $(document).ready(function(){

            if($(".fs-container").length) {
                $(".fs-container").fsfullheight(['.headermenu', '.responsiveheader', '.topnavigation']);
                $(".sliderloader").show();
            }

            var instance = null;
            var resizetimeout = null;

            /** Kenburn slider **/
            var recreate_slider = function(){
                if(instance !== null) instance.stop();
                $(".kenburntextcontent").hide();
                $(".kenburntextcontent > div").attr('style', '');

                $(".kenburns").remove();
                $(".kenburnwrapper").append("<canvas class='kenburns'></canvas>");
                $('.kenburns').attr('width',$(".fs-container").width()).attr('height',$(".fs-container").height());

                instance = $('.kenburns').kenburned({
                    images:[
                        <?php foreach($slideritem as $id => $slider) {
                            echo "'" . jeg_get_image_attachment($slider['background']) . "',";
                        } ?>
                    ],
                    frames_per_second: 30,
                    display_time: <?php echo vp_metabox('jkreativ_page_kenburn.displaytime') ?>,
                    fade_time: <?php echo vp_metabox('jkreativ_page_kenburn.fadetime') ?>,
                    zoom: <?php echo vp_metabox('jkreativ_page_kenburn.zoom') ?>,
                    background_color:'#<?php echo vp_metabox('jkreativ_page_kenburn.color') ?>'
                });
            };

            $(window).bind('resize load', function(){
                clearTimeout(resizetimeout);
                resizetimeout = setTimeout(function(){
                    recreate_slider();
                }, 250);
            });
        });
    })(jQuery);
</script>
<!-- end IOS Slider -->

<?php
} else {
    jeg_get_template_part('template/password-form');
}
get_footer(); 
?>