<?php 
//config?
//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
//calc_rate_change - Written by Mike Ghen
//This function can be used to get the rate of change of a currency
//PARAMETERS
// -$avg_tweets: This is the average tweets a contry makes in a sampling
// -$tweets: This is the number of tweets a currency made this sampling
// -$total_tweets: This is the number of tweets in the sampling
//RETURNS
// Will return a rate of change between -1 and infinity
function calc_rate_change($avg_tweets = 0, $tweets = 0, $total_tweets = 0)
{
	//We will now prefor the first rate of change calculation
	$rate_1 = sin($tweets/$total_tweets)/2;

	//We will now preform the second rate of change calculation
	$rate_2 = ($tweets - $avg_tweets) / $avg_tweets;

	//We will now calculate the average change rate
	$avg_rate = (abs($rate_2)+$rate_1) / 2;

	//We will now use the %error's sign ($rate_2) to dictate the sign
	if($rate_2 >= 0) {
		return $avg_rate;
	}
	else { return -1 * $avg_rate ;
	}
}
//%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%



?>