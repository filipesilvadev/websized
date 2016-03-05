							</div> <!-- .content -->
						</div> <!-- contentholder -->
					</div> <!-- #rightsidecontainer -->
				</div> <!-- .containerwrapper -->
	        	<div class="contentoverflow"></div>
	        	
	        	<?php
	        		if(vp_metabox("jkreativ_portfolio_list_option.expand_type") === 'theather') { 
	        			get_template_part('template/portfolio/portfolio-fragment-theather'); 
					}
	        	?>
	        	
			</div> <!-- .container -->
 		</div> <!-- .jviewport -->
		<?php get_template_part('template/rightclickoverlay'); ?>
		<?php get_template_part('template/musicbackground') ?>
		<?php wp_footer() ?>
	</body>
</html>