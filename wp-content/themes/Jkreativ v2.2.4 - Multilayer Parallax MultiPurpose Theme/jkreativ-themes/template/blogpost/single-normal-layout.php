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
<div class="contentheaderspace"></div>
<div class="pagewrapper <?php echo $pageoption['blogwidth'] ?>  <?php echo $pageoption['pageposition'] ?>  <?php echo ( $pageoption['usesidebar'] === '1' ) ? 'withsidebar' : 'nosidebar' ; ?>">
	<div class="pageholder">
		<div class="pageholdwrapper">
			<div class="mainpage blog-normal-article">
				<!-- article -->
				<?php
					if( have_posts() ) {
						while(have_posts()){
							the_post();
				?>
				<div class="pageinnerwrapper">
					<?php
						$blogitemtype = vp_metabox('jkreativ_blog_format.format', null, get_the_ID());
						if($featured !== '' && !post_password_required()) {
							echo "<div class='featured post-format-{$blogitemtype}'>{$featured}</div>";
						}
					?>
					<div class="article-header">
						<h1><?php echo get_the_title(); ?></h1>
						<?php if( !$pageoption['hidemeta']  && !post_password_required() ) { ?>
						<span class="meta-top">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>, <?php the_date(); ?></span>
						<?php } ?>
					</div> <!-- article header -->

					<div class="article-content">
						<?php the_content() ?>
						<?php wp_link_pages(array('before'=>'<div class="post-pages">'.__('Pages:','jeg_textdomain'),'after'=>'</div>')); ?>
					</div> <!-- article content -->

                    <?php jeg_get_template_part('template/blogpost/article-meta'); ?>

					<?php
						if(!$pageoption['hideshare'] && !post_password_required() ) {
							echo "<div class='article-sharing'>" . jeg_get_template_part('template/blogpost/article-sharing') .  "</div>";
						}
					?>

					<div class="clearfix">
						<?php comments_template(); ?>
					</div>
				</div> <!-- page inner wrapper -->
				<?php
						}
					}
				?>
			</div>
			<?php if($pageoption['usesidebar'] === '1' ) : ?>
				<div class="mainsidebar">
					<div class="mainsidebar-wrapper">
						<?php
							if(function_exists('dynamic_sidebar')) {
								$sidebarname = $pageoption['sidebarname'];
								dynamic_sidebar($sidebarname);
							}
						?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<script>
	(function($) {
		$(document).ready(function() {
			$(".mainpage").jnormalblog();
		});
	})(jQuery);
</script>

<?php
} else {
    jeg_get_template_part('template/password-form');
}

get_footer();
?>