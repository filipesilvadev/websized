<?php
/**
 * @author : Jegbagus
 */
get_header();
?>

<div class="headermenu">
	<?php get_template_part('template/rightheader'); ?>
</div> <!-- headermenu -->

<div class="contentheaderspace"></div>
<div class="pagewrapper pagecenter fullwidth nosidebar">
	<div class="pageholder">
		<div class="pageholdwrapper">
			<div class="mainpage blog-normal-article">
				<div class="pageinnerwrapper notfound">
					<h1><?php _e("404",'jeg_textdomain'); ?>	</h1>
					<div class="notfoundsec">
						<div class="notfoundtext">
							<?php _e("It look like the page you're looking for doesn't exist, sorry",'jeg_textdomain'); ?>
						</div>
						<div>
							<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
								<input type="text" placeholder="<?php _e('Type and Enter to Search', 'jeg_textdomain'); ?>" id="s" name="s" class="field">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>