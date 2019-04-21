<?php
/**
 * Template Name: Our Approach
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 0.9
 */

get_header(); ?>
<?php
// Start the loop.
while ( have_posts() ) : the_post();

	// Include the page content template.
	get_template_part( 'template-parts/content', 'our_approach' );

	// End of the loop.
endwhile;
?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>