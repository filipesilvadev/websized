<?php
get_header();

if ( ! post_password_required() )
{
?>
<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->


<?php
	defined( 'JEG_GALLERY_PAGE' ) or define('JEG_GALLERY_PAGE', 0);
	$usemargin =  vp_metabox('jkreativ_portfolio_sidecontent.grid.0.use_margin');
	$marginsize = 0;
	$additionalmarginclass = "";
	$althidetitle = vp_metabox('jkreativ_portfolio_sidecontent.grid.0.photoswipe_setting.0.photoswipe_hide_title');
	
	$mediagallery = get_post_meta(JEG_PAGE_ID, 'jkreativ_portfolio_gallery', true);
	$limitload = vp_metabox('jkreativ_portfolio_sidecontent.load_limit', 50, JEG_PAGE_ID);

	$overwritewidth = vp_metabox('jkreativ_portfolio_sidecontent.image_fullwidth');
	$useisotope = 'isotopewrapper';
	$gallerylayout = 'none';
	if($overwritewidth) {
		$useisotope = 'noisotope';
	} else {
		$gallerylayout 	= vp_metabox('jkreativ_portfolio_sidecontent.grid.0.gallery_type', null, JEG_PAGE_ID);
	}

	$additionalmarginclass = 'nomargin';
	if($usemargin) {
		$marginsize = vp_metabox('jkreativ_portfolio_sidecontent.grid.0.margin_size');
		$paddingsize = 1 * $marginsize;
		$additionalmarginclass = "marginimg";
	}

    // switch page holder wrapper
    $switchpageholder = vp_metabox('jkreativ_portfolio_sidecontent.switch_media_textposition');
?>
<div class="contentheaderspace"></div>
<div class="pagewrapper coverwidth <?php echo $gallerylayout; ?>_layout  <?php echo ( $switchpageholder == 1 ) ? "galleryswitchfloat":""; ?>">
	<div class="pageholder row-fluid">
		<div class="pageholdwrapper">

            <?php if($switchpageholder != 1) : ?>
			<div class="mainpage blog-normal-article span8">
				<div class="imagelist-wrapper <?php echo $additionalmarginclass; ?>">
					<div class="imagelist-content-wrapper" style="padding :0; margin: -<?php echo $marginsize; ?>px; margin-bottom: 10px;">
						<div class="<?php echo $useisotope ?>">
							<?php jeg_get_template_part('template/portfolio/portfolio-gallery') ?>
						</div>
					</div>
				</div>
				<div class="galleryloadmore"><div class="galleryloaderinner"></div></div>
				<div class="portfolioloader bigloader"></div>
			</div>
            <?php endif; ?>

			<?php  the_post(); ?>
			<div class="mainsidebar">
				<div class="mainsidebar-wrapper">
					<div class="blog-sidebar">
						<div class="blog-sidebar-content">
							<div class="article-header">
								<h2><?php the_title(); ?> </h2>
								<?php if(!vp_metabox('jkreativ_portfolio_sidecontent.hide_top_meta')) { ?>
								<span class="meta-top">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>, <?php echo get_the_date(); ?></span>
								<?php } ?>
							</div> <!-- article header -->

							<div class="article-content">
								<?php the_content(); ?>
							</div>	<!-- article content -->

							<div class="portfoliosidebarmeta withcontent">
								<ul>
									<?php
										$portfoliometa = vp_metabox('jkreativ_portfolio_meta.portfolio_meta');
										foreach($portfoliometa as $meta ) :
											if(empty($meta['meta_content_url'])) {
												echo "<li><strong>{$meta['meta_title']} : </strong>  <span> {$meta['meta_content']} </span></li>";
											} else {
												echo "<li><strong>{$meta['meta_title']} : </strong>  <span> <a target='_blank' href='{$meta['meta_content_url']}'> {$meta['meta_content']} </a> </span></li>";
											}
										endforeach;

										$enable_project_link = vp_metabox('jkreativ_portfolio_meta.enable_project_link');
										if($enable_project_link) {
											$metatite = vp_metabox('jkreativ_portfolio_meta.project_link.0.title');
											$metacontent = vp_metabox('jkreativ_portfolio_meta.project_link.0.content');
											$metaurl = vp_metabox('jkreativ_portfolio_meta.project_link.0.url');
											echo "<li><strong>{$metatite} : </strong>  <span> <a target='_blank' href='{$metaurl}'> {$metacontent} </a> </span></li>";
										}
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
							</div>	<!-- article sharing -->


							<div class="clearfix"></div>
							<?php comments_template(); ?>
						</div>
					</div>
				</div>
			</div>

            <?php if($switchpageholder == 1) : ?>
                <div class="mainpage blog-normal-article">
                    <div class="imagelist-wrapper <?php echo $additionalmarginclass; ?>">
                        <div class="imagelist-content-wrapper" style="padding :0; margin: -<?php echo $marginsize; ?>px; margin-bottom: 10px;">
                            <div class="<?php echo $useisotope ?>">
                                <?php jeg_get_template_part('template/portfolio/portfolio-gallery') ?>
                            </div>
                        </div>
                    </div>
                    <div class="galleryloadmore"><div class="galleryloaderinner"></div></div>
                    <div class="portfolioloader bigloader"></div>
                </div>
            <?php endif; ?>

		</div>
	</div>
</div>

<?php
	$overrideoverlay =  vp_metabox('jkreativ_portfolio_sidecontent.grid.0.override_overlay');
	$bgimage = '';
	if($overrideoverlay) {
		$colorarray = vp_metabox('jkreativ_portfolio_sidecontent.grid.0.gallery_overlay.0.color');
		if(vp_metabox('jkreativ_portfolio_sidecontent.grid.0.gallery_overlay.0.dark_sign')) {
			$bgimage = "background-image: url('" . get_template_directory_uri() . "/public/img/white-zoom.png');";
		}
?>
<style>
	.imggalitem .galoverlay, .imggalitem .videooverlay {
		background-color: <?php echo $colorarray; ?>;
		<?php echo $bgimage; ?>
	}
</style>
<?php
	}
?>

<script>
	(function($){
		$(document).ready(function(){
			$(".pageholder").jnormalblog();

			$(".imagelist-wrapper").jimggallery({
				adminurl : '<?php echo admin_url("admin-ajax.php"); ?>',
				pageid : <?php echo get_the_ID() ?>,
				totalpage : <?php echo floor( sizeof($mediagallery) / $limitload) + 1; ?>,
				loadcount : <?php echo vp_metabox('jkreativ_portfolio_sidecontent.load_limit', 50) ?>,
				gallerytype : '<?php echo $useisotope ?>',
				action : 'get_gallery_pagemore_portfolio',
				dimension : <?php echo vp_metabox('jkreativ_portfolio_sidecontent.grid.0.item_height', 0.6); ?>,
				tiletype : "<?php echo vp_metabox('jkreativ_portfolio_sidecontent.grid.0.gallery_type');  ?>",
				justifiedheight :  <?php echo vp_metabox('jkreativ_portfolio_sidecontent.grid.0.justified_item_height', 250); ?>,
				loadAnimation : "<?php echo vp_metabox('jkreativ_portfolio_sidecontent.grid.0.load_animation', 'randomfade'); ?>",
				gallerysize : <?php echo vp_metabox('jkreativ_portfolio_sidecontent.grid.0.item_width', 400); ?>,
				galleryexpand : "<?php echo vp_metabox('jkreativ_portfolio_sidecontent.grid.0.expand_mode'); ?>",
				margin : '<?php echo $marginsize ?>',
				photoswipeslideautoplay : <?php echo vp_metabox('jkreativ_portfolio_sidecontent.grid.0.photoswipe_setting.0.photoswipe_autoplay'); ?>,
				photoswipeslidedelay : <?php echo vp_metabox('jkreativ_portfolio_sidecontent.grid.0.photoswipe_setting.0.photoswipe_autoplay_delay'); ?>,
				photoswipescale : '<?php echo vp_metabox('jkreativ_portfolio_sidecontent.grid.0.photoswipe_setting.0.single_scale_mode', 'fit') ?>'
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