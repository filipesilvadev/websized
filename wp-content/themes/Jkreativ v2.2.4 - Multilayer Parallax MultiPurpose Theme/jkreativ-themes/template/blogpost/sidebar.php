<div class="mainsidebar">
	<div class="mainsidebar-wrapper">
		<?php  
			if(function_exists('dynamic_sidebar')) {
				$sidebarname = vp_metabox('jkreativ_page_pageposition.sidebar_name');
				dynamic_sidebar($sidebarname); 
			} 
		?>
	</div>
</div>