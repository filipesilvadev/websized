<?php
/**
Template Name: Page - Wide Page Layout
 */
get_header();
if ( ! post_password_required() )
{
	global $pageoption;
	$shareclass = ( $pageoption['hideshare'] === '1') ? "hideshare" : "";
?>
<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<div class="blog-normal-wrapper">
	<div class="blog-big-wrapper">
		<div class="blog-main-content <?php echo $shareclass; ?>">
			<?php
				if( have_posts() ) {
					while(have_posts()){
						the_post();
						$featured = jeg_get_featured_heading(get_the_ID(), 1200, 750);
			?>
			<div class="blog-normal-article">
				<div class="article">
					<div class="article-header">
						<h1><?php echo get_the_title(); ?></h1>
						<?php if( !$pageoption['hidemeta']  && !post_password_required() ) { ?>
						<span class="meta-top">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>, <?php echo get_the_date(); ?></span>
						<?php } ?>
					</div>

					<div class="article-inner-wrapper">

						<?php if(!$pageoption['hideshare']) { ?>
						<div class="article-share">
							<?php jeg_get_template_part('template/blogpost/article-sharing-big'); ?>
						</div>
						<?php } ?>

						<div class="article-wrapper">
							<?php
							if($featured !== '' && !post_password_required()) {
								echo "<div class='featured'>{$featured}</div>";
							}
							?>
							<div class="article-content">
								<?php the_content() ?>
								<?php wp_link_pages(array('before'=>'<div class="post-pages">'.__('Pages:','jeg_textdomain'),'after'=>'</div>')); ?>
							</div>

                            <?php jeg_get_template_part('template/blogpost/article-meta'); ?>

						</div>
					</div>

				</div>
			</div>

			<div class="clearfix">
				<?php comments_template(); ?>
			</div>
			<?php
					}
				}
			?>

			<div class="blog-right-content-float"></div>
		</div>
		<div class="blog-right-content">
			<div class="blog-right-content-wrapper">
				<?php
					if(function_exists('dynamic_sidebar')) {
						$sidebarname = $pageoption['sidebarname'];
						dynamic_sidebar($sidebarname);
					}
				?>
			</div>
			<div class="blog-right-content-float"></div>
		</div>
	</div>
</div>
<script>
	(function($) {
		$(document).ready(function() {
			$(".blog-normal-wrapper").jnormalblog({
				followlike : 1
			});
		});
	})(jQuery);
</script>

<?php
} else {
    jeg_get_template_part('template/password-form');
}

get_footer();
?>