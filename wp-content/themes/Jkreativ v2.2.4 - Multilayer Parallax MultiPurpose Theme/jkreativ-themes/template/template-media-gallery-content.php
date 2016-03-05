<?php
/**
Template Name: Gallery - Media Gallery ( Side - content )
 */
get_header();

if ( ! post_password_required() )
{
?>
<div class="headermenu">
	<?php jeg_get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<?php
	defined( 'JEG_GALLERY_PAGE' ) or define('JEG_GALLERY_PAGE', 0);

	$usemargin =  vp_metabox('jkreativ_page_mediagallery.use_margin');
	$marginsize = 0;
	$additionalmarginclass = "";
	$althidetitle = vp_metabox('jkreativ_page_mediagallery.photoswipe_setting.0.photoswipe_hide_title');

	$mediagallery = get_post_meta(JEG_PAGE_ID, 'jkreativ_gallery', true);
	$limitload = vp_metabox('jkreativ_page_mediagallery.load_limit', 50, JEG_PAGE_ID);

	$overwritewidth = vp_metabox('jkreativ_page_mediagallerycontent.image_fullwidth');
	$useisotope = 'isotopewrapper';
	$gallerylayout = 'none';
	if($overwritewidth) {
		$useisotope = '';
	} else {
		$gallerylayout 	= vp_metabox('jkreativ_page_mediagallery.gallery_type', null, JEG_PAGE_ID);
	}

	$additionalmarginclass = 'nomargin';
	if($usemargin) {
		$marginsize = vp_metabox('jkreativ_page_mediagallery.margin_size');
		$paddingsize = 1 * $marginsize;
		$additionalmarginclass = "marginimg";
	}

    // switch page holder wrapper
    $switchpageholder = vp_metabox('jkreativ_page_mediagallerycontent.switch_media_textposition');
?>
<div class="contentheaderspace"></div>
<div class="pagewrapper coverwidth <?php echo $gallerylayout; ?>_layout  <?php echo ( $switchpageholder == 1 ) ? "galleryswitchfloat":""; ?>">
	<div class="pageholder row-fluid">


        <?php if($switchpageholder != 1) : ?>
        <div class="pageholdwrapper">
			<div class="mainpage blog-normal-article span8">
				<div class="imagelist-wrapper <?php echo $additionalmarginclass; ?>">
					<div class="imagelist-content-wrapper" style="padding :0; margin: -<?php echo $marginsize; ?>px; margin-bottom: 10px;">
						<div class="<?php echo $useisotope ?>">
							<?php jeg_get_template_part('template/media-gallery') ?>
						</div>
					</div>
				</div>
				<div class="galleryloadmore"><div class="galleryloaderinner"></div></div>
				<div class="portfolioloader bigloader"></div>
			</div>
		</div>
        <?php endif; ?>

		<?php  the_post(); ?>
		<div class="mainsidebar">
			<div class="mainsidebar-wrapper">
				<div class="blog-sidebar">
					<div class="blog-sidebar-content">
						<div class="article-header">
							<h2><?php the_title(); ?> </h2>
							<?php if(!vp_metabox('jkreativ_page_meta_top.hide_top_meta', null, JEG_PAGE_ID)) { ?>
							<span class="meta-top">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a>, <?php echo get_the_date(); ?></span>
							<?php } ?>
						</div> <!-- article header -->

						<div class="article-content">
							<?php the_content(); ?>
						</div>	<!-- article content -->

						<?php if(!vp_metabox('jkreativ_page_share.hide_share_button', null, JEG_PAGE_ID)) { ?>
						<div class="article-sharing">
						<?php jeg_get_template_part('template/blogpost/article-sharing'); ?>
						</div>	<!-- article sharing -->
						<?php } ?>

						<div class="clearfix"></div>
						<?php comments_template(); ?>
					</div>
				</div>
				<?php
					if(function_exists('dynamic_sidebar')) {
						$sidebarname = vp_metabox('jkreativ_page_mediagallerycontent.sidebar_name');
						dynamic_sidebar($sidebarname);
					}
				?>
			</div>
		</div>


        <?php if($switchpageholder == 1) : ?>
            <div class="pageholdwrapper">
                <div class="mainpage blog-normal-article span8">
                    <div class="imagelist-wrapper <?php echo $additionalmarginclass; ?>">
                        <div class="imagelist-content-wrapper" style="padding :0; margin: -<?php echo $marginsize; ?>px; margin-bottom: 10px;">
                            <div class="<?php echo $useisotope ?>">
                                <?php jeg_get_template_part('template/media-gallery') ?>
                            </div>
                        </div>
                    </div>
                    <div class="galleryloadmore"><div class="galleryloaderinner"></div></div>
                    <div class="portfolioloader bigloader"></div>
                </div>
            </div>
        <?php endif; ?>

	</div>
</div>

<?php
	$overrideoverlay =  vp_metabox('jkreativ_page_mediagallery.override_overlay');
	$bgimage = '';
	if($overrideoverlay) {
		$colorarray = vp_metabox('jkreativ_page_mediagallery.gallery_overlay.0.color');
		if(vp_metabox('jkreativ_page_mediagallery.gallery_overlay.0.dark_sign')) {
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
			$(".mainpage").jnormalblog();

			$(".imagelist-wrapper").jimggallery({
				adminurl : '<?php echo admin_url("admin-ajax.php"); ?>',
				pageid : <?php echo get_the_ID() ?>,
				gallerytype : '<?php echo $useisotope ?>',
				totalpage : <?php echo floor( sizeof($mediagallery) / $limitload) + 1; ?>,
				loadcount : <?php echo vp_metabox('jkreativ_page_mediagallery.load_limit', 50) ?>,
				dimension : <?php echo vp_metabox('jkreativ_page_mediagallery.item_height', 0.6); ?>,
				tiletype : "<?php echo vp_metabox('jkreativ_page_mediagallery.gallery_type');  ?>",
				justifiedheight :  <?php echo vp_metabox('jkreativ_page_mediagallery.justified_item_height', 250); ?>,
				loadAnimation : "<?php echo vp_metabox('jkreativ_page_mediagallery.load_animation', 'randomfade'); ?>",
				gallerysize : <?php echo vp_metabox('jkreativ_page_mediagallery.item_width', 400); ?>,
				galleryexpand : "<?php echo vp_metabox('jkreativ_page_mediagallery.expand_mode'); ?>",
				margin : '<?php echo $marginsize ?>',
				photoswipeslideautoplay : <?php echo vp_metabox('jkreativ_page_mediagallery.photoswipe_setting.0.photoswipe_autoplay'); ?>,
				photoswipeslidedelay : <?php echo vp_metabox('jkreativ_page_mediagallery.photoswipe_setting.0.photoswipe_autoplay_delay'); ?>,
				photoswipescale : '<?php echo vp_metabox('jkreativ_page_mediagallery.photoswipe_setting.0.single_scale_mode', 'fit') ?>'
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