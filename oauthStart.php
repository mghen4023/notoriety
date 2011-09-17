<?php

/*
 * Description: this file gets the requestToken for the application.
 */

include_once 'includes/twitteroauth.php';

session_start();

$appTokenConnection = new TwitterOAuth(
    'ward0Wz6G6I7UlbSSeZiQ', 
    'IYqEHAekTYi53yp9wsaWVpTT1YS56UUUsvafZtU');
$appTempCredentials = $appTokenConnection->getRequestToken(
    'http://www.sanguineshuriken.com/oauthCallback.php');

$_SESSION['application_oauth_token'] = $appTempCredentials['oauth_token'];
$_SESSION['application_oauth_token_secret'] = $appTempCredentials['oauth_token_secret'];

echo '(DEBUG) app temp credentials are: ';
print_r($appTempCredentials);
echo '<br><hr>';

$registerURL = $appTokenConnection->getAuthorizeURL($appTempCredentials, TRUE);

echo '<a href="' . $registerURL . '"> Authenticate through Twitter</a>';
?>
