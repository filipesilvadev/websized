<?php
/**
Template Name: Gallery - Media Gallery
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
	$paddingsize = '';
	$althidetitle = vp_metabox('jkreativ_page_mediagallery.photoswipe_setting.0.photoswipe_hide_title');

	$mediagallery = get_post_meta(JEG_PAGE_ID, 'jkreativ_gallery', true);
	$limitload = vp_metabox('jkreativ_page_mediagallery.load_limit', 50, JEG_PAGE_ID);	
	$gallerylayout 	= vp_metabox('jkreativ_page_mediagallery.gallery_type', null, JEG_PAGE_ID);
	
	if($usemargin) {
		$marginsize = vp_metabox('jkreativ_page_mediagallery.margin_size');
		$paddingsize = 1 * $marginsize;
		$additionalmarginclass = "marginimg";
	}
?>

<div class="imagelist-wrapper <?php echo $additionalmarginclass; ?> <?php echo $gallerylayout; ?>_layout">
	<div class="contentheaderspace"></div>
	<div class="imagelist-content-wrapper" style="<?php echo "padding: {$paddingsize}px"; ?>">
		<div class="isotopewrapper">
			<?php jeg_get_template_part('template/media-gallery') ?>
		</div>
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


<div class="galleryloadmore"><div class="galleryloaderinner"></div></div>
<div class="portfolioloader bigloader"></div>
<script>
	(function($){
		$(document).ready(function(){
			$(".imagelist-wrapper").jimggallery({
				adminurl : '<?php echo admin_url("admin-ajax.php"); ?>',
				pageid : <?php echo get_the_ID() ?>,
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