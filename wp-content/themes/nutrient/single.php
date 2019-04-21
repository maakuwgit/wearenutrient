<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 0.9
 */

get_header(); ?>
<?php
// Start the loop.
while ( have_posts() ) : the_post();
	
	function filter_where( $where = '' ) {
    $where .= " AND post_date < '".get_the_date('Y-m-d')."'";
    return $where;
	}
	// Include the single post content template.
	get_template_part( 'template-parts/content', 'single' );

	$args = array(
						'posts_per_page' 	=> 3,
						'post_type' 			=> 'post'
					);

	add_filter( 'posts_where', 'filter_where' );
	$post_query = new WP_Query( $args );
	remove_filter( 'posts_where', 'filter_where' );

	if ( $post_query->have_posts() ) :
		
		while ( $post_query->have_posts() ) : $post_query->the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		endwhile;
		wp_reset_postdata();

	endif;

endwhile;
?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>