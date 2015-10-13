<?php
define('DRUPAL_ROOT', getcwd());
require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

/*
* Adding Social Media linking
*/
function social_media_link(){
	$facebook_url = check_plain(theme_get_setting('facebook_url','adopted'));
	$twitter_url = check_plain(theme_get_setting('twitter_url','adopted'));
	$gplus_url = check_plain(theme_get_setting('gplus_url','adopted')); 
	if (!empty($facebook_url)) : print  "<a href=\" url($facebook_url) \"><img src=\" base_path(). drupal_get_path('theme', 'adopted') . '/images/fb.png' \" /></a>";
}
	 
	
?>