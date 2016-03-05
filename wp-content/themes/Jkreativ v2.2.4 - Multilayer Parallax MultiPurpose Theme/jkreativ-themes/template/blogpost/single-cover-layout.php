<?php
get_header();

if ( ! post_password_required() )
{
	global $pageoption;
	$featured = jeg_get_featured_heading(get_the_ID(), 1400, 875);
?>
<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->
<div class="contentheaderspace"></div>
<div class="pagewrapper coverwidth">
	<div class="pageholder row-fluid">
		<div class="pageholdwrapper">
			<div class="mainpage blog-normal-article span8">
				<!-- content -->
				<?php
					if( have_posts() ) {
						while(have_posts()){
							the_post();
				?>
				<div class="pageinnerwrapper">
					<?php
						if($featured !== '' && !post_password_required()) {
							echo "<div class='featured'>{$featured}</div>";
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

					<?php if(!$pageoption['hideshare'] && !post_password_required() ) { ?>
					<div class="article-sharing">
						<?php jeg_get_template_part('template/blogpost/article-sharing'); ?>
					</div> <!-- article sharing -->
					<?php } ?>

					<div class="clearfix"></div>
					<?php comments_template(); ?>
				</div>
				<?php
						}
					}
				?>
			</div>
			<div class="mainsidebar span4">
				<div class="mainsidebar-wrapper">
					<?php
						if(function_exists('dynamic_sidebar')) {
							$sidebarname = $pageoption['sidebarname'];
							dynamic_sidebar($sidebarname);
						}
					?>
				</div>
			</div>
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