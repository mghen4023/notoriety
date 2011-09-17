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
	echo('<hr><br><b> verify_credentials </b><br>');
	var_dump($content);
} else {
	echo('an error occurred: content variable was not set');
	exit(1);
}

$content = $requestConnection->get('account/rate_limit_status');
if( isset( $content ) )
{
	echo('<hr><br><b> rate limit status </b><br>');
	var_dump($content);
} else {
	echo('an error occurred: content variable was not set');
	exit(1);
}

$content = $requestConnection->get('geo/search', array('ip' => $_SERVER['REMOTE_ADDR']) );
if( isset( $content ) )
{
	echo('<hr><br><b> ip-based geo lookup </b><br><hr>');
	var_dump($content);
} else {
	echo('an error occurred: content variable was not set');
	exit(1);
}

echo '<hr><br><b> for js: </b><br><hr>';



</script>


?>

<!-- 
<span id="login"></span>
<script type="text/javascript">


twttr.anywhere(function (T) {
	T("#login").connectButton({
		authComplete: function(user) {
			// triggered when auth completed successfully
		},
		signOut: function() {
			// triggered when user logs out
		}
	});
});



</script>
 -->