<?php
/**
 * Template Name: Homepage W/Video
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 0.8
 */

get_header(); ?>
<?php
// Start the loop.
while ( have_posts() ) : the_post();

	// Include the page content template.
	get_template_part( 'template-parts/content', 'home_w_video' );

	// End of the loop.
endwhile;
?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>