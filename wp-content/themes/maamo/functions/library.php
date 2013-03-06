<?php

function padd_widget_funct_subscribe() {
	$padd_sb_feedburner = unserialize(get_option(PADD_THEME_SLUG . '_sn_username_feedburner'));
	$padd_sb_twitter = unserialize(get_option(PADD_THEME_SLUG . '_sn_username_twitter'));
	$padd_sb_facebook = unserialize(get_option(PADD_THEME_SLUG . '_sn_username_facebook'));
?>
<ul>
	<li class="rss">
		<a href="<?php echo $padd_sb_feedburner; ?>" title="RSS Feed">Get the latest via RSS</a> |
		<a href="http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $padd_sb_feedburner->get_username(); ?>" title="RSS Email">Email</a>
	</li>
	<li class="twitter"><a href="<?php echo $padd_sb_twitter; ?>" class="icon-twitter">Want to know my tweets?</a></li>
	<li class="facebook"><a href="<?php echo $padd_sb_facebook; ?>" class="icon-facebook">Join me at Facebook</a></li>
</ul>
<?php
}



/**
 * Renders the Feedburner subscription form.
 *
 * @param string $description
 */
function padd_widget_funct_feedburner($description='Sign up for the email subscription.') {
	$sbfb = unserialize(get_option(PADD_THEME_SLUG . '_sn_username_feedburner'));
?>
<p><?php echo $description; ?></p>
<form id="subscribe" action="http://www.feedburner.com/fb/a/emailverify" method="post" target="popupwindow" onsubmit="window.open('http://www.feedburner.com', 'popupwindow', 'scrollbars=yes,width=550,height=520'); return true">
	<span><input type="text" value="Email address" onfocus="if (this.value == 'Email address') {this.value = '';}" onblur="if (this.value == '') { this.value = 'Email address'; }" name="email" /></span>
	<input type="hidden" value="http://feeds.feedburner.com/~e?ffid=<?php echo $sbfb->get_username(); ?>" name="url" />
	<input type="hidden" value="News Subscribe" name="title" />
</form>
<?php
}


function padd_widget_funct_sponsors() {
	global $ad_default_250, $ad_default_125;
?>
<div class="ads0">
	<?php
		$sqbtn_0 = unserialize(get_option(PADD_THEME_SLUG . '_ads_250250_1'));
		$sqbtn_0 = $sqbtn_0->is_empty() ? $ad_default_250 : $sqbtn_0; 
		$sqbtn_0->set_css_class('ads0');
		echo $sqbtn_0;
	?>
</div>
<div>
	<?php
		$sqbtn_1 = unserialize(get_option(PADD_THEME_SLUG . '_ads_125125_1'));
		$sqbtn_1 = $sqbtn_1->is_empty() ? $ad_default_125 : $sqbtn_1; 
		$sqbtn_1->set_css_class('ads1');
		$sqbtn_2 = unserialize(get_option(PADD_THEME_SLUG . '_ads_125125_2'));
		$sqbtn_2 = $sqbtn_2->is_empty() ? $ad_default_125 : $sqbtn_2; 
		$sqbtn_2->set_css_class('ads2');
		echo $sqbtn_1 . $sqbtn_2;
	?>
</div>	
<div>
	<?php
		$sqbtn_3 = unserialize(get_option(PADD_THEME_SLUG . '_ads_125125_3'));
		$sqbtn_3 = $sqbtn_3->is_empty() ? $ad_default_125 : $sqbtn_3; 
		$sqbtn_3->set_css_class('ads3');
		$sqbtn_4 = unserialize(get_option(PADD_THEME_SLUG . '_ads_125125_4'));
		$sqbtn_4 = $sqbtn_4->is_empty() ? $ad_default_125 : $sqbtn_4; 
		$sqbtn_4->set_css_class('ads4');
		echo $sqbtn_3 . $sqbtn_4;
	?>	
</div>
<?php
}

function padd_widget_funct_featured_video() {
	$featured = get_option(PADD_THEME_SLUG . '_featured_video');
	echo stripslashes($featured);
}

?>
