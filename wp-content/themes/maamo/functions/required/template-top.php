<?php

$padd_guid = '';
function padd_hooked_theme_credits() {
	global $padd_guid;
?>
<p class="annotation">Designed by <a href="http://www.webhostingrally.com/green-web-hosting.html" title="Green Hosting" target="_blank">Green Hosting</a>. In collaboration with <a href="http://www.ifreecellphones.com/" title="Free Cell Phones" target="_blank">Free Cell Phones</a> | <a href="http://aboutwheelchairlift.com/" title="Wheelchair Stair Lifts" target="_blank">Wheelchair Stair Lifts</a> | <a href="http://fatburningrules.com/" title="Fat Burning Furnace" target="_blank">Fat Burning Furnace</a>.</p>
<?php
	$padd_guid = '52dfc4b4-eb04-4588-a331-38611858c43f';
}
add_action('padd_theme_credits','padd_hooked_theme_credits');

ob_start(); 
