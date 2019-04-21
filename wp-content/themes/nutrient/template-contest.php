<?php
/**
 * Template Name: Contest
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 1.2
 */

get_header('contest'); ?>
<?php
// Start the loop.
while ( have_posts() ) : the_post();

	// Include the page content template.
	get_template_part( 'template-parts/content', 'contest' );

	// End of the loop.
endwhile;
?>
<?php get_sidebar('contest'); ?>
<?php get_footer('contest'); ?>