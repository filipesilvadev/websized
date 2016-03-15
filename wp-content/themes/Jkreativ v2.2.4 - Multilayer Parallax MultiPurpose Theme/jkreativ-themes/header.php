<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="no-js lt-ie10" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
  	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  	<?php wp_head(); ?>
  	<link rel="stylesheet" href="public/css/websized-style.css">
</head>
<?php $additionalclass = jeg_get_additional_body_class(); ?>
<body <?php body_class($additionalclass); ?>>
<!--[if lt IE 9]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->
<?php get_template_part('template/loading', jeg_get_loading_type()); ?>
<div class="jviewport">
	<?php get_template_part('template/mobilemenu'); ?>
	<div class="container">
		<div class="containerwrapper">
			<?php get_template_part('template/responsiveheader'); ?>
			<?php get_template_part('template/navigation'); ?>
			<div id="rightsidecontainer">
				<div class="contentholder">
					<div class="content">
