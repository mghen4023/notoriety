<?php

/*
 * This file gets the access token for the user
*/
include_once 'includes/twitteroauth.php';

session_start();

echo 'requesting connection with ' . 
     $_SESSION['tokenCredentials']['oauth_token'] . ' ' .
     $_SESSION['tokenCredentials']['oauth_token_secret'] . '<br>';

$requestConnection = new TwitterOAuth(
     'ward0Wz6G6I7UlbSSeZiQ', 
     'IYqEHAekTYi53yp9wsaWVpTT1YS56UUUsvafZtU',
     $_SESSION['tokenCredentials']['oauth_token'],
     $_SESSION['tokenCredentials']['oauth_token_secret']);

echo '(hopefully) valid credentials are: ';
print_r($requestConnection);
echo '<br>';

$content = $requestConnection->get('statuses/firehose');

if( isset($content ) )
{
	echo('content variable was set, dumping...<br>');
	var_dump(json_decode($content));
} else {
	echo('content variable was not set');
}

?>