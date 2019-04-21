<?php
/**
 * The template for displaying 404 pages (not found)
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 0.8
 */

get_header(); ?>
<section id="primary" class="content-area purple semi" role="main">
	<article class="row text-center">
		<h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentysixteen' ); ?></h1>
		<hr class="red">
		<p><?php _e( 'I got nothin\'', 'nutrient' ); ?></p>
	</article>
</section><!-- .content-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>