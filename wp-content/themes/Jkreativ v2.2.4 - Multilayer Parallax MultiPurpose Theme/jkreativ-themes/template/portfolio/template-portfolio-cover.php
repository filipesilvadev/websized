<?php
get_header();

if ( ! post_password_required() )
{
	global $post;
	$featured = jeg_get_portfolio_featured_heading($post->ID);
	$featureposition = vp_metabox('jkreativ_portfolio_cover.heading_position', 'inside');
?>
<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->
<div class="contentheaderspace"></div>
<div class="pagewrapper coverwidth">
	<div class="pageholder row-fluid">
		<?php if($featureposition === 'outside') : ?>
		<div class="featured">
			<div class="box ratio16_9">
				<div class="portfolioratio-content">
					<div class="portfolio-content-slider">
						<div class="portfolio-slider-holder">
							<div class="slider sliderhold">
								<?php echo $featured ?>
							</div>
							<div class="portfolio-navigation">
	        					<div class="pt-next portfolionavnext portfolionavprevnext">
	        						<span class="pt-bgarrow"></span>
	        						<div class="pt-next-bg pt-next-prev-bg"></div>
	        					</div>
    							<div class="pt-prev portfolionavprev portfolionavprevnext">
    								<span class="pt-bgarrow"></span>
	        						<div class="pt-prev-bg pt-next-prev-bg"></div>
    							</div>
	        				</div>
						</div>
					</div>
				</div>
			</div>
			<div class="closeportfoliovideo">
				<?php _e('Close Video', 'jeg_textdomain'); ?>
			</div>
		</div> <!-- end of featured -->
		<?php endif; ?>

		<div class="pageholdwrapper">
			<div class="mainpage blog-normal-article span8">
				<!-- content -->
				<?php
					if( have_posts() ) {
						while(have_posts()){
							the_post();
				?>
				<div class="pageinnerwrapper">
					<?php if($featureposition === 'inside') : ?>
					<div class="featured">
						<div class="box ratio16_9">
							<div class="portfolioratio-content">
								<div class="portfolio-content-slider">
	        						<div class="portfolio-slider-holder">
										<div class="slider sliderhold">
											<?php echo $featured ?>
										</div>
										<div class="portfolio-navigation">
				        					<div class="pt-next portfolionavnext portfolionavprevnext">
				        						<span class="pt-bgarrow"></span>
				        						<div class="pt-next-bg pt-next-prev-bg"></div>
				        					</div>
		        							<div class="pt-prev portfolionavprev portfolionavprevnext">
		        								<span class="pt-bgarrow"></span>
				        						<div class="pt-prev-bg pt-next-prev-bg"></div>
		        							</div>
				        				</div>
									</div>
								</div>
							</div>
						</div>
						<div class="closeportfoliovideo">
							<?php _e('Close Video', 'jeg_textdomain'); ?>
						</div>
					</div> <!-- end of featured -->
					<?php endif; ?>

					<div class="article-header">
						<h2><?php echo get_the_title(); ?></h2>
						<?php if(!vp_metabox('jkreativ_portfolio_cover.hide_top_meta', null, JEG_PAGE_ID) ) { ?>
						<span class="meta-top">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>, <?php the_date(); ?></span>
						<?php } ?>
					</div> <!-- article header -->

					<div class="article-content">
						<?php the_content() ?>
					</div> <!-- article content -->

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

					<div class="blog-sidebar">
						<div class="blog-sidebar-content">
							<div class="blog-sidebar-title">
								<h3><?php echo vp_metabox('jkreativ_portfolio_cover.pdtext'); ?></h3>
							</div>

							<div class="portfoliosidebarmeta">
								<ul>
									<?php
										$portfoliometa = vp_metabox('jkreativ_portfolio_cover_meta.portfolio_meta');
										foreach($portfoliometa as $meta ) :
											if(empty($meta['meta_title'])) {
												echo "<li><div class='portfoliocovermeta'>" . do_shortcode($meta['meta_content'])  . "</div></li>";
											} else {
												echo "<li><strong>{$meta['meta_title']} : </strong><div class='portfoliocovermeta'>" . do_shortcode($meta['meta_content'])  . "</div></li>";
											}											
										endforeach;
									?>
								</ul>
							</div>
							<?php
								$filter = isset($_REQUEST['filter']) ? $_REQUEST['filter'] : "";
							
								$currentparentid = get_post_meta($post->ID, 'portfolio_parent', true);
								$currentlink = get_page_link($currentparentid);
								
								$prevlink = jeg_next_prev_portfolio($currentparentid, $post->ID, 'prev', $filter);
								$prevpagelink = get_page_link($prevlink);
								if($filter !== '') $prevpagelink .= "?filter=" . $filter ;
							
								$nextlink = jeg_next_prev_portfolio($currentparentid, $post->ID, 'next', $filter);
								$nextpagelink = get_page_link($nextlink);
								if($filter !== '') $nextpagelink .= "?filter=" . $filter ;
							?>
							<div class="portfolio-single-nav">
								<a class="slider-button" href="<?php echo $prevpagelink; ?>">
									<span class="button-text"><i class="fa fa-angle-left singlenavicon"></i><?php _e('prev','jeg_textdomain') ?></span>
								</a>
								<a class="slider-button" href="<?php echo $currentlink ?>">
									<span class="button-text"><i class="fa fa-bars singlenavicon"></i> <?php _e('list','jeg_textdomain') ?></span>
								</a>
								<a class="slider-button" href="<?php echo $nextpagelink; ?>">
									<span class="button-text"> <i class="fa fa-angle-right singlenavicon right"></i><?php _e('next','jeg_textdomain') ?></span>
								</a>
							</div>
							<div class="article-sharing">
								<?php jeg_get_template_part('template/blogpost/article-sharing'); ?>
							</div> <!-- article sharing -->
						</div>
					</div>

					<?php
						if(function_exists('dynamic_sidebar')) {
							$sidebarname = vp_metabox('jkreativ_portfolio_cover.sidebar_name');
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
			$(".portfolioratio-content").jportfoliosinglepage();
		});
	})(jQuery);
</script>
<?php
} else {
    jeg_get_template_part('template/password-form');
}

get_footer();
?>