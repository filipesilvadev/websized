<?php
	$featured = jeg_get_featured_heading(get_the_ID(), 925, '');
?>

<div class="clean-blog-article">
	<div class="clean-blog-content">
		<div class="clean-blog-content-wrapper">
			<div class="article-header">
				<a href="<?php echo get_permalink() ?>"><h2><?php echo get_the_title(); ?></h2></a>
			</div>
			<div class="article-content">
				<p class="post-excerpt">
					<?php echo get_the_excerpt() ?>
				</p>
			</div>
			<?php if(!post_password_required() && !empty($featured)) { ?>
			<div class='featured'>
				<?php echo $featured ?>
			</div>
			<?php } ?>
			<?php
				if(!vp_metabox('jkreativ_page_meta_btm.hide_bottom_meta', null, JEG_PAGE_ID) && !post_password_required() ) {
                    jeg_get_template_part('template/blogpost/article-bottom-meta');
				}
			?>
		</div>
	</div>
    <div class="clean-blog-meta">
        <div class="clean-blog-meta-wrapper">
            <div class="clean-meta-top"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>, <?php echo get_the_date(); ?></div>

            <?php if(!vp_metabox('jkreativ_page_share.hide_share_button', null, JEG_PAGE_ID) && !post_password_required() ) { ?>
                <div class="article-sharing">
                    <?php jeg_get_template_part('template/blogpost/article-sharing-clean'); ?>
                </div> <!-- article sharing -->
            <?php } ?>
        </div>
    </div>
</div>
