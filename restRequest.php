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

echo 'TOKEN: ' . $_SESSION['tokenCredentials']['oauth_token'] . '<br/>'; 
echo 'SECRET: ' . $_SESSION['tokenCredentials']['oauth_token_secret'] . '<br/>';

$content = $requestConnection->get('account/verify_credentials');
if( isset( $content ) )
{
	//echo('<hr><br><b> verify_credentials </b><br>');
	//var_dump($content);
	//GOES IN verify_credentials
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
	//echo('<hr><br><b> rate limit status </b><br>');
	//var_dump($content);
	//GOES IN rate limit status
	echo 'RATE LIMIT (REMAINING HITS): ';
	echo $content->remaining_hits . '<br />';

} else {
	echo('an error occurred: content variable was not set');
	exit(1);
}

$content = $requestConnection->get('geo/search', array('ip' => $_SERVER['REMOTE_ADDR']) );
if( isset( $content ) )
{
	//echo('<hr><br><b> ip-based geo lookup </b><br><hr>');
	//var_dump($content);

	//GOES IN ip-based geo lookup
	echo 'COUNTRY CODE: ';
	echo $content->result->places[0]->country_code . '<br />';
	echo 'CITY: ';
	echo $content->result->places[0]->full_name . '<br/>';


} else {
	echo('an error occurred: content variable was not set');
	exit(1);
}

//echo '<hr><br><b> for js: </b><br><hr>';


?>

<!--  <script
	src="http://platform.twitter.com/anywhere.js?id=ward0Wz6G6I7UlbSSeZiQ&v=1"
	type="text/javascript">
</script> -->

<!--  <script 
	src="includes/jquery-1.6.4.js" 
	type="text/javascript">
 </script> -->

<script
	src="includes/jsOAuth-1.3.1.min.js"
	type="text/javascript">
</script>
 
<div id="debug">
</div>

<!--  <script type="text/javascript">
document.getElementById('debug').innerHTML += 'loaded page<br>';

var config = {
     consumerKey: "MY-KEY",
     consumerSecret: "MY-SECRET"
};
 
var oauth = OAuth(config);


</script>
 -->
