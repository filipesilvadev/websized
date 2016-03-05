<?php
    $postid = get_the_ID();
    $cover = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
    $coverimage = '';
    if(is_array($cover)) {
        $coverimage = $cover[0];
    }
?>
<div class="sharrre-container-clean clean-post-sharrre">
	<div class="twitter-share"
		data-url="<?php echo get_permalink($postid); ?>"
		data-text="<?php echo get_the_title(); ?>"
		data-title="<?php _e('Tweet','jeg_textdomain') ?>"></div>
	<div class="facebook-share"
		data-url="<?php echo get_permalink($postid); ?>"
		data-text="<?php echo get_the_title(); ?>"
		data-title="<?php _e('Like','jeg_textdomain') ?>"></div>
	<div class="googleplus-share"
		data-url="<?php echo get_permalink($postid); ?>"
		data-text="<?php echo get_the_title(); ?>"
		data-title="<?php _e('+1','jeg_textdomain') ?>"></div>
	<div class="pinterest-share"
         data-url="<?php echo get_permalink($postid); ?>"
         data-text="<?php echo get_the_title(); ?>"
         data-image="<?php echo $coverimage; ?>"
		data-title="<?php _e('Pin It','jeg_textdomain') ?>"></div>
</div>
<div class='clearfix'></div>