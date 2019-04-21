<?php
/**
 * The template used for displaying tweets
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 1.2
 */
if ( shortcode_exists( 'nu_tweets' ) ) {
	echo do_shortcode('[nu_tweets max="1" user="wearenutrient"]');
}
?>