<?php

/*
 * This file gets the access token for the application
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

$_SESSION['tokenCredentials'] = $tokenCredentials;      

echo '<a href="' . 'restRequest.php' . '"> do request! </a>';
?>