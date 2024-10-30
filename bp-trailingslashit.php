<?php
/*
Plugin Name: BP Trailingslashit
Plugin URI: http://philippe.bp-fr.net/2011/09/17/bp-trailingslashit-pour-niquer-google/
Description: Check if a slash exists at the end of any buddypress URI and redirect permanently non logged in users to one with, if it doesn't. Done especialy for crawlers !
Author: Philippe Gras
Version: 1.0
Author URI: http://www.paul-emploi.biz/
*/

add_action('init', 'my_redirection_type');

function my_redirection_type() {
	global $bp;

	$path = $_SERVER["REQUEST_URI"];

	if ( strpos ( strrev ( $path ), '.' ) == null ) {
		if ( empty ( $_SERVER["QUERY_STRING"] ) ) {
			if ( !$bp->loggedin_user->id ) {
				if ( strpos ( strrev ( $path ), '/' ) > 0 ) {
					wp_redirect ( $path . '/', 301 );
					exit;
				}
			}
		}
	}
}

?>
