<?php
/*
 * This file gets the access token for the application and uses it to sign a buch of RESTful API requests.
 */
include_once 'includes/twitteroauth.php';

session_start();

echo 'in callback with ' . 
$_SESSION['application_oauth_token'] . ' and ' . 
$_SESSION['application_oauth_token_secret'] . '<br><hr>';

$credentialsConnection = new TwitterOAuth(
     'ward0Wz6G6I7UlbSSeZiQ', 
     'IYqEHAekTYi53yp9wsaWVpTT1YS56UUUsvafZtU',
     $_SESSION['application_oauth_token'],
     $_SESSION['application_oauth_token_secret'] );

$tokenCredentials = $credentialsConnection->getAccessToken($_REQUEST['oauth_verifier']);

$requestConnection = new TwitterOAuth(
     'ward0Wz6G6I7UlbSSeZiQ', 
     'IYqEHAekTYi53yp9wsaWVpTT1YS56UUUsvafZtU',
$tokenCredentials['oauth_token'],
$tokenCredentials['oauth_token_secret']);

echo 'TOKEN: ' . $tokenCredentials['oauth_token'] . '<br/>'; 
echo 'SECRET: ' . $tokenCredentials['oauth_token_secret'] . '<br/>';

$content = $requestConnection->get('account/verify_credentials');
if( isset( $content ) )
{
	echo 'NAME: ';
	echo $content->name . '<br/>';
	echo 'SCREEN NAME: ';
	echo $content->screen_name . '<br/>';
	echo 'ID STR: ';
	echo $content->id_str . '<br/>';
	
} else {
	echo('an error occurred: content variable was not set');
	exit(1);
}

$content = $requestConnection->get('account/rate_limit_status');
if( isset( $content ) )
{
	echo 'RATE LIMIT (REMAINING HITS): ';
	echo $content->remaining_hits . '<br />';

} else {
	echo('an error occurred: content variable was not set');
	exit(1);
}

$content = $requestConnection->get('geo/search', array('ip' => $_SERVER['REMOTE_ADDR']) );
if( isset( $content ) )
{
	echo 'COUNTRY CODE: ';
	echo $content->result->places[0]->country_code . '<br />';
	echo 'CITY: ';
	echo $content->result->places[0]->full_name . '<br/>';


} else {
	echo('an error occurred: content variable was not set');
	exit(1);
}

?>