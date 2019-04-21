<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 0.8
 */

get_header();

// Start the loop.
while ( have_posts() ) : the_post();

	// Include the page content template.
	get_template_part( 'template-parts/content', 'page' );

	// End of the loop.
endwhile;
?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>