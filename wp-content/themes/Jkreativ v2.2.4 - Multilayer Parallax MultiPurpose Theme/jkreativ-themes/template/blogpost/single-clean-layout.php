<?php
get_header();
if ( ! post_password_required() )
{
	global $pageoption;
	$featured = jeg_get_featured_heading(get_the_ID(), 1200, 750);
?>
<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<div class="clean-blog-wrapper">
	<div class="contentheaderspace"></div>

	<!-- content -->
	<?php
		if( have_posts() ) {
			while(have_posts()){
				the_post();
	?>
	<div id="main" class="clean-blog-article">
		<div class="clean-blog-content">
			<div class="clean-blog-content-wrapper">
				<div class="article-header">
					<a href="<?php echo get_permalink() ?>"><h1><?php echo get_the_title(); ?></h1></a>
				</div>

				<div class='featured'><?php echo $featured ?></div>

				<div class="article-content">
					<p>
						<?php the_content() ?>
						<?php wp_link_pages(array('before'=>'<div class="post-pages">'.__('Pages:','jeg_textdomain'),'after'=>'</div>')); ?>
					</p>
				</div>

                <?php jeg_get_template_part('template/blogpost/article-meta'); ?>

			</div>
		</div>
        <div class="clean-blog-meta">
            <div class="clean-blog-meta-wrapper">
                <div class="clean-meta-top"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>, <?php echo get_the_date(); ?></div>

                <?php if(!$pageoption['hideshare'] && !post_password_required() ) { ?>
                    <div class="article-sharing">
                        <?php jeg_get_template_part('template/blogpost/article-sharing-clean'); ?>
                    </div> <!-- article sharing -->
                <?php } ?>
            </div>
        </div>
	</div>

	<?php comments_template('/comments-blog-clean.php') ?>
	<?php
			}
		}
	?>
</div>

<script>
	(function($) {
		$(document).ready(function() {
			$("#main").jnormalblog();
		});
	})(jQuery);
</script>

<?php
} else {
    jeg_get_template_part('template/password-form');
}

get_footer();
?>