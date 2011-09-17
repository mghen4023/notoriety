<?php

require_once('includes/twitteroauth.php');


$appTokenConnection = new TwitterOAuth('ward0Wz6G6I7UlbSSeZiQ', 'IYqEHAekTYi53yp9wsaWVpTT1YS56UUUsvafZtU');
$appTempCredentials = $appTokenConnection->getRequestToken();

if( isset($appTempCredentials ) )
{
	print_r($appTempCredentials);
} else {
	echo  "oh dratsikins";
}

?>
