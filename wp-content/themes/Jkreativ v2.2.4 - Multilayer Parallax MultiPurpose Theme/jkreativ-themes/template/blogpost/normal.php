<?php
	$featured = jeg_get_featured_heading(get_the_ID(), 1200, 750);
	$blogitemtype = vp_metabox('jkreativ_blog_format.format', null, get_the_ID());
?>
<div class="pageinnerwrapper">
	<?php if(!post_password_required() && !empty($featured)) {?>
	<div class="featured post-format-<?php echo $blogitemtype ?>">
		<?php echo $featured ?>
	</div>
	<?php } ?>
	<div class="article-header">
		<a href="<?php echo get_permalink() ?>"><h2><?php echo get_the_title(); ?></h2></a>

		<?php if(!vp_metabox('jkreativ_page_meta_top.hide_top_meta', null, JEG_PAGE_ID) && !post_password_required() ) { ?>
		<span class="meta-top">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>, <?php echo get_the_date(); ?></span>
		<?php } ?>

	</div>
	<div class="article-content">
		<p class="post-excerpt">
			<?php echo get_the_excerpt() ?>
		</p>
	</div>
	<?php
		if(!vp_metabox('jkreativ_page_meta_btm.hide_bottom_meta', null, JEG_PAGE_ID) && !post_password_required() ) {
            jeg_get_template_part('template/blogpost/article-bottom-meta');
		}
	?>
	<div class="clearfix"></div>
</div>