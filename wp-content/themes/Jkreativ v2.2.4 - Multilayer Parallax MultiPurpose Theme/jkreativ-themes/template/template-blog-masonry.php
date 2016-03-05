<?php
/**
Template Name: Blog - Masonry Layout
 */
get_header();

if ( ! post_password_required() )
{
	$categories = get_categories( array(
		'type'                     => 'post',
		'orderby'                  => 'name',
		'order'                    => 'ASC',
		'hide_empty'               => 1,
	));
?>

<div class="headermenu">

	<?php  if(!vp_metabox('jkreativ_page_blogmasonry.hide_filter')) { ?>
	<!-- filter header -->
	<div class="blogfilter topleftmenu">

		<div class="blogfilterbutton" data-text="<?php _e("Blog Sort &amp; Filter", "jeg_textdomain") ?>">
			<span><?php _e("Blog Sort &amp; Filter", "jeg_textdomain") ?></span>
		</div>


		<div class="blogfilterlist">
			<h3><?php _e("Sort blog by :", "jeg_textdomain") ?></h3>
			<ul class="blogsortul" data-title="<?php _e("Sort by", "jeg_textdomain") ?>">
				<li data-type ="sort" data-sortby="popular"><?php _e("Popularity", "jeg_textdomain") ?></li>
				<li data-type ="sort" data-sortby="date"><?php _e("Date", "jeg_textdomain") ?></li>
			</ul>
			<?php if(vp_metabox('jkreativ_page_blogcontent.toggle_filtering') !== '1') { ?>
				<h3><?php _e("Filter blog category :", "jeg_textdomain") ?></h3>
				<ul class="blogfilterul" data-title="<?php _e("Filter by", "jeg_textdomain") ?>">
					<li data-type="category" data-filter=""><?php _e("All Category", "jeg_textdomain") ?></li>
					<?php
						foreach($categories as $category) {
							echo "<li data-type='category' data-filter='{$category->term_id}'>{$category->name}</li>";
						}
					?>
				</ul>
			<?php } ?>
		</div>

	</div>
	<!-- filter header end -->
	<?php } ?>


	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<div class="contentheaderspace"></div>

<div class="blog-masonry-wrapper">

	<?php  if(!vp_metabox('jkreativ_page_blogmasonry.hide_filter')) { ?>
	<!-- filter body -->
	<div class="filterfloat">

		<div class="filterfloatbutton">
			<span><?php _e("Blog Sort &amp; Filter", "jeg_textdomain") ?></span>
		</div>

		<div class="filterfloatlist">
			<h3><?php _e("Sort blog by :", "jeg_textdomain") ?></h3>
			<ul class="blogsortul" data-title="<?php _e("Sort by", "jeg_textdomain") ?>">
				<li data-type ="sort" data-sortby="popular"><?php _e("Popularity", "jeg_textdomain") ?></li>
				<li data-type ="sort" data-sortby="date"><?php _e("Date", "jeg_textdomain") ?></li>
			</ul>

			<?php if(vp_metabox('jkreativ_page_blogcontent.toggle_filtering') !== '1') { ?>
				<h3><?php _e("Filter blog category :", "jeg_textdomain") ?></h3>
				<ul class="blogfilterul" data-title="<?php _e("Filter by", "jeg_textdomain") ?>">
					<li data-type="category" data-filter=""><?php _e("All Category", "jeg_textdomain") ?></li>
					<?php
						foreach($categories as $category) {
							echo "<li data-type='category' data-filter='{$category->term_id}'>{$category->name}</li>";
						}
					?>
				</ul>
			<?php } ?>

		</div>
	</div>
	<!-- filter body end -->
	<?php } ?>

	<div class="isotopewrapper">
		<?php
			add_filter( 'excerpt_length', 'jeg_excerpt_masonry_length' );

			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

			$statement = array(
				'post_type'				=> 'post',
			    'orderby'				=> "date",
			    'order'					=> "DESC",
				'paged' 				=> $paged,
				'posts_per_page'		=> vp_metabox('jkreativ_page_blogcontent.post_perpage')
			);


			if(vp_metabox('jkreativ_page_blogcontent.toggle_filtering') === '1')
			{
				$filter = vp_metabox('jkreativ_page_blogcontent.filtering_group.0');
				$filter_rule = $filter['filter_rule'];

				if($filter['filter_type'] === 'category')
				{
					if($filter_rule === 'include') {
						$statement['category__in'] = $filter['filter_category'];
					} else {
						$statement['category__not_in'] = $filter['filter_category'];
					}

				} else if($filter['filter_type'] === 'tags')
				{
					if($filter_rule === 'include') {
						$statement['tag__in'] = $filter['filter_tags'];
					} else {
						$statement['tag__not_in'] = $filter['filter_tags'];
					}
				}
			}

			$query = new WP_Query($statement);
			if ( $query->have_posts() ) {
				while ( $query->have_posts() )
				{
					$query->the_post();
					$blogitemtype = vp_metabox('jkreativ_blog_format.format');
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
		if($query->max_num_pages > 1) {
			echo
			"<div class='blogpagingholder'>
				<div class='blogpagingwrapper hideme'>
				" . jeg_new_pagination(get_the_ID(), $paged, $query->max_num_pages) . "
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
				pagingajax : true
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