<?php
get_header(); 
global $pageoption;
?>
<div class="headermenu">
	<div class="topheadertitle topleftmenu"><?php echo $pageoption['title']; ?></div>
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->
<div class="contentheaderspace"></div>
<div class="pagewrapper fullwidth  pagecenter <?php echo ( $pageoption['usesidebar'] === '1' ) ? 'withsidebar' : 'nosidebar' ; ?>">
	<div class="pageholder">
		<div class="pageholdwrapper">
			<div class="mainpage blog-normal-article">
				<!-- article -->
				<?php
					if( have_posts() ) {
						echo 
						"<div class='pageinnerwrapper postnormaltitle'>
							<div class='blognormalpagingwrapper'>
								<div class='pagetext'>
									<span class='pagetotal'>
									" . $pageoption['title'] . "
									</span>
								</div>
							</div>
						</div>";
						
						while(have_posts()) 
						{
							the_post();
							$blogitemtype = vp_metabox('jkreativ_blog_format.format', null, get_the_ID());
                            jeg_get_template_part('template/blogpost/normal', $blogitemtype);
						}
					} else {
						echo 
						"<div class='pageinnerwrapper postnotfound'>
							<div class='blognormalpagingwrapper'>
								<div class='pagetext'>
									<span class='pagetotal'>
									" . __('Post Not Found','jeg_textdomain') . "
									</span>
								</div>
							</div>
						</div>";
					}

					global $wp_query;
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					if($wp_query->max_num_pages > 1) {
						echo 
						"<div class='blognormalpaging blogpagingholder'>
							<div class='blognormalpagingwrapper'>
							" . jeg_new_pagination(get_the_ID(), $paged, $wp_query->max_num_pages) . "
							</div>
						</div>";
					}
										
					wp_reset_postdata();
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
get_footer(); 
?>