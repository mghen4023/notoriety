<?php
/*
 * This file gets the access token for the application and uses it to sign a buch of RESTful API requests.
 * note: we _may_ not need to assign as many session variables here if we use the database.
 */
include_once 'includes/twitteroauth.php';

session_start();

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

$_SESSION['TOKEN'] = $tokenCredentials['oauth_token'];
$_SESSION['SECRET'] = $tokenCredentials['oauth_token_secret'];

$content = $requestConnection->get('account/verify_credentials');
if( isset( $content ) )
{
	//INSERT THIS INTO DATABASE
	$content->name; 
	$content->screen_name;
	$content->id_str;
	
} else {
	echo('an error occurred: content variable was not set');
	exit(1);
}

$content = $requestConnection->get('account/rate_limit_status');
if( isset( $content ) )
{
	//INSERT THIS INTO DATABASE
	$content->remaining_hits;  
	
} else {
	echo('an error occurred: content variable was not set');
	exit(1);
}

$content = $requestConnection->get('geo/search', array('ip' => $_SERVER['REMOTE_ADDR']) );
if( isset( $content ) )
{
	//INSERT THIS INTO DATABASE
	$content->result->places[0]->country_code;
	$content->result->places[0]->full_name;
	
	} else {
	echo('an error occurred: content variable was not set');
	exit(1);
}


/* insert into database here so we can do xmlhttprequest from index */

header('Location: http://www.sanguineshuriken.com/index.php');
?>