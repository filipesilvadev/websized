<?php
/** 
Template Name: Page - Cover Page Layout
 */
get_header(); 

if ( ! post_password_required() ) 
{
	$featured = jeg_get_page_featured_heading(1400, 875);
?>
<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<div class="contentheaderspace"></div>
<div class="pagewrapper coverwidth <?php echo vp_metabox('jkreativ_page_heading.heading_position', 'inside'); ?>">
	<div class="pageholder row-fluid">
		<?php 
			if($featured !== '' && vp_metabox('jkreativ_page_heading.heading_position', 'inside') === 'outside' && !post_password_required()) {
				echo "<div class='featured'>{$featured}</div>";
			}
		?>
		
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
						if($featured !== '' && vp_metabox('jkreativ_page_heading.heading_position', 'inside') === 'inside' && !post_password_required()) {							
							echo "<div class='featured'>{$featured}</div>";
						}
					?>
					
					<div class="article-header">
						<h2><?php echo get_the_title(); ?></h2>
						<?php if(!vp_metabox('jkreativ_page_meta_top.hide_top_meta', null, JEG_PAGE_ID) && !post_password_required() ) { ?>
						<span class="meta-top">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>, <?php the_date(); ?></span>
						<?php } ?>
					</div> <!-- article header -->
					
					<div class="article-content">							
						<?php the_content() ?>
						<?php wp_link_pages(array('before'=>'<div class="post-pages">'.__('Pages:','jeg_textdomain'),'after'=>'</div>')); ?>
					</div> <!-- article content -->
					
					<?php if(!vp_metabox('jkreativ_page_share.hide_share_button', null, JEG_PAGE_ID)) { ?>
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
							$sidebarname = vp_metabox('jkreativ_page_blogwide.sidebar_name');
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