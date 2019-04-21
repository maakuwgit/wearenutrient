<?php
/**
 * The template for displaying homepage
 *
 * This is the template that displays the homepage.
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
	if (is_page_template("template-home_w_video.php")) {
		// show video content
		get_template_part( 'template-parts/content', 'home_w_video' );
	} else {
		// show static content
		get_template_part( 'template-parts/content', 'home' );
	}

	// End of the loop.
endwhile;
?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>