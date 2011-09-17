<?php

/*
 * This file gets the access token for the user
*/
include_once 'includes/twitteroauth.php';

session_start();

$requestConnection = new TwitterOAuth(
     'ward0Wz6G6I7UlbSSeZiQ', 
     'IYqEHAekTYi53yp9wsaWVpTT1YS56UUUsvafZtU',
     $_SESSION['tokenCredentials']['oauth_token'],
     $_SESSION['tokenCredentials']['oauth_token_secret']);

$content = $requestConnection->get('account/verify_credentials');

if( isset( $content ) )
{
	var_dump($content);
} else {
	echo('an error occurred: content variable was not set');
	echo '<br><hr>';
}

?>