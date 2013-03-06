<?php

$socialnet = array(
	'delicious' => new Padd_SocialNetwork('Delicious','http://delicious.com/'),
	'digg' => new Padd_SocialNetwork('Digg','http://digg.com/users/'),
	'facebook' => new Padd_SocialNetwork('Facebook','http://www.facebook.com/'),
	'feedburner' => new Padd_SocialNetwork('Feedburner','http://feeds.feedburner.com/'),
	'flickr' => new Padd_SocialNetwork('Flickr','http://www.flickr.com/photos/'),
	'lastfm' => new Padd_SocialNetwork('last.fm','http://www.last.fm/user/'),
	'stumbleupon' => new Padd_SocialNetwork('StumbleUpon','http://www.stumbleupon.com/stumbler/'),
	'technorati' => new Padd_SocialNetwork('Technorati','http://technorati.com/people/technorati/'),
	'twitter' => new Padd_SocialNetwork('Twitter','http://www.twitter.com/'),
	'youtube' => new Padd_SocialNetwork('YouTube','http://www.youtube.com/'),
);

$installed = get_option(PADD_THEME_SLUG . '_installed','0');
$installed = ('0' === $installed) ? false : true;

$ad_default_468 = new Padd_Advertisement(
					get_stylesheet_directory_uri() . '/images/advertisement-468x60.jpg',
					'Padd Solutions',
					'http://www.paddsolutions.com'
				);

$ad_default_250 = new Padd_Advertisement(
					get_stylesheet_directory_uri() . '/images/advertisement-250x250.jpg',
					'Padd Solutions',
					'http://www.paddsolutions.com'
				);				

$ad_default_125 = new Padd_Advertisement(
					get_stylesheet_directory_uri() . '/images/advertisement-125x125.jpg',
					'Padd Solutions',
					'http://www.paddsolutions.com'
				);

if (!$installed) {

	// Core
	update_option(PADD_THEME_SLUG . '_installed','1');

	// General
	update_option(PADD_THEME_SLUG . '_color_scheme','orange');
	update_option(PADD_THEME_SLUG . '_favicon_url','');
	update_option(PADD_THEME_SLUG . '_featured_cat_id','1');
	update_option(PADD_THEME_SLUG . '_featured_cat_limit','3');
	update_option(PADD_THEME_SLUG . '_featured_video','');
	update_option(PADD_THEME_SLUG . '_about_us','');
	update_option(PADD_THEME_SLUG . '_tracker_head','');
	update_option(PADD_THEME_SLUG . '_tracker_top','');
	update_option(PADD_THEME_SLUG . '_tracker_bot','');

	// Social Networking
	foreach ($socialnet as $k => $v) {
		$v->set_username('paddsolutions');
		update_option(PADD_THEME_SLUG . '_sn_username_' . $k,serialize($v));
	}

	// Custom Advertisement
	update_option(PADD_THEME_SLUG . '_ads_250250_1',serialize($ad_default_250));

	for ($i=1;$i<=4;$i++) {
		update_option(PADD_THEME_SLUG . '_ads_125125_' . $i,serialize($ad_default_125));
	}

}

?>
