<?php
/**
 * Dulce, encrypt all of these.
 */
 
$contents = ob_get_contents(); 
ob_get_clean();

global $padd_guid;

if (!empty($padd_guid)) {
	if ($padd_guid === '52dfc4b4-eb04-4588-a331-38611858c43f') {
		echo $contents;
	} else {
		echo '';
	}
} else {
	echo '';
}