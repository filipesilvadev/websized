<?php
/**
Template Name: Blog - Masonry Layout
 */
get_header();
global $pageoption;
?>

<div class="headermenu">
	<div class="topheadertitle topleftmenu"> <?php echo $pageoption['title']; ?></div>
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->
<div class="contentheaderspace"></div>
<div class="blog-masonry-wrapper">
	<div class="isotopewrapper">
		<?php
			add_filter( 'excerpt_length', 'jeg_excerpt_masonry_length' );
			if( have_posts() ) {
				$navmode = jeg_get_additional_body_class();
				$navmode = implode(' ', $navmode);
				if(strpos($navmode,'noheadermenu') !== false  || strpos($navmode,'horizontalnav') !== false)
				{
					echo
					"<div class='article-masonry-container article-head-container'>
						<article class='article-masonry-box'>
							<div class='article-masonry-wrapper clearfix'>
								<div class='article-head-wrapper'>
									<span> " . $pageoption['title'] . " </span>
								</div>
							</div>
						</article>
					</div>";
				}

				while(have_posts())
				{
					the_post();
					$blogitemtype = vp_metabox('jkreativ_blog_format.format', null, get_the_ID());
                    jeg_get_template_part('template/blogpost/masonry', $blogitemtype);
				}
			} else {
				echo "
				<div class='article-masonry-container postnotfound'>
					<article class='article-masonry-box'>
						<div class='article-masonry-wrapper clearfix'>
							<div class='pagetext'>
								<span class='pagetotal'>
								" . __('Post Not Found','jeg_textdomain') . "
								</span>
							</div>
						</div>
					</article>
				</div>
				";
			}
		?>
	</div>
	<?php
		global $wp_query;
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		if($wp_query->max_num_pages > 1) {
			echo
			"<div class='blogpagingholder'>
				<div class='blogpagingwrapper hideme'>
				" . jeg_new_pagination(get_the_ID(), $paged, $wp_query->max_num_pages) . "
				</div>
			</div>";
		}
		wp_reset_postdata();
	?>
	<div class="bloginputfilter">
		<form>
			<input type="hidden" name="blogid" value="<?php echo get_the_ID() ?>"/>
			<input type="hidden" name="sort"/>
			<input type="hidden" name="category"/>
			<input type="hidden" name="paged" value="<?php echo $paged ?>"/>
			<input type="hidden" name="action" value="get_blog_filter"/>
		</form>
	</div>
</div>
<div class="blogloader bigloader"></div>
<script>
	(function($){
		$(document).ready(function(){
			$(".blog-masonry-wrapper").jmasonryblog({
				loadAnimation : 'randomfade',
				adminurl : '<?php echo admin_url("admin-ajax.php"); ?>',
				pagingajax : false
			});
		});
	})(jQuery);
</script>

<?php
get_footer();
?>