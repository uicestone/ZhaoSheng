<?php require 'functions/required/template-top.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
<!--[if IE]>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/ie.css' ?>" type="text/css" media="screen" />
<![endif]-->
<?php $scheme = get_option(PADD_THEME_SLUG . '_color_scheme','blue'); ?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/schemes/' . $scheme . '/style.css' ?>" type="text/css" media="screen" />
<?php
$icon = get_option(PADD_THEME_SLUG . '_favicon_url','');
if (!empty($icon)) {
	echo '<link rel="shortcut icon" href="' . $icon . '" />' . "\n";
}
?>
<script type="text/javascript" src="<?php echo get_option('home'); ?>/wp-includes/js/jquery/jquery.js?ver=1.3.2"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.s3slider.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.loading.js"></script>
<?php
$tracker = get_option(PADD_THEME_SLUG . '_tracker_head','');
if (!empty($tracker)) {
	echo stripslashes($tracker);
}
?>
</head>

<body>
<?php
$tracker = get_option(PADD_THEME_SLUG . '_tracker_top','');
if (!empty($tracker)) {
	echo stripslashes($tracker);
}
?>
<a name="top"></a>
<div id="container">

	<div id="header">
		<div id="header-wrapper">
			<div class="box-group box-group-0">
				<div class="box box-title">
					<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
					<p><?php bloginfo('description'); ?></p>
				</div>
				
				<div id="mainmenu" class="box box-mainmenu">
					<h2>Main Menu</h2>
					<div class="interior">
						<?php padd_theme_page_menu(); ?>
					</div>				
				</div>
			</div>
			
			<div class="box-group box-group-1">
				<div class="box box-categories">
					<h2>Categories</h2>
					<div class="interior">
						<ul>
							<?php wp_list_cats('sort_column=name&optioncount=0&hierarchical=0'); ?>
						</ul>
					</div>
				</div>
				<div class="box box-search">
					<h2>Search</h2>
					<div class="interior">
						<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
						<p><span class="no-display">Search </span><input type="text" value="Enter keywords" name="s" id="s" /><button type="submit"><span>Search</span></button></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="body">
		<div id="body-wrapper">
