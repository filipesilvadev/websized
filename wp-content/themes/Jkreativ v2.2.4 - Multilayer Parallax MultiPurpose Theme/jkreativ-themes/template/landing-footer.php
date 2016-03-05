<?php

$footerlayout = vp_option('joption.footerlayout', '3column');

switch ($footerlayout) {
	case '3column':
?>
		<div class="row-fluid layout-<?php echo $footerlayout ?>">
			<div class="span4"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_1); ?> </div>
			<div class="span4"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_2); ?> </div>
			<div class="span4"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_3); ?> </div>
		</div>
<?php
		break;
	case '4column':
?>
		<div class="row-fluid layout-<?php echo $footerlayout ?>">
			<div class="span3"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_1); ?> </div>
			<div class="span3"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_2); ?> </div>
			<div class="span3"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_3); ?> </div>
			<div class="span3"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_4); ?> </div>
		</div>
<?php
		break;
	case '3column1':
?>
		<div class="row-fluid layout-<?php echo $footerlayout ?>">
			<div class="span6"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_1); ?> </div>
			<div class="span3"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_2); ?> </div>
			<div class="span3"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_3); ?> </div>
		</div>
<?php
		break;
	case '3column2':
?>
		<div class="row-fluid layout-<?php echo $footerlayout ?>">
			<div class="span3"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_1); ?> </div>
			<div class="span6"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_2); ?> </div>
			<div class="span3"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_3); ?> </div>
		</div>
<?php
		break;
	case '3column3':
?>
		<div class="row-fluid layout-<?php echo $footerlayout ?>">
			<div class="span3"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_1); ?> </div>
			<div class="span3"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_2); ?> </div>
			<div class="span6"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_3); ?> </div>
		</div>
<?php
		break;
}