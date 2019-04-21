<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 1
 */

$post_icon;
$header_color;
$format 		= get_post_format();
$h2_class 	= 'entry-title';
$has_icon 	= get_post_meta( get_the_ID(), '_nutrient_use_icon', true);
$has_color 	= get_post_meta( get_the_ID(), '_nutrient_header_color', true);

if($format == 'video' || $has_icon){
	if($format == 'video') $has_icon = 'play-circle-o';
	$post_icon = '<em class="block fa fa-' . $has_icon . '"></em>';
	$h2_class .= ' has-icon';
}
if($has_color){
	if(!$format == 'video'){
		$header_color = ' ' . $has_color;
		$h2_class .= $header_color;
	}else{
		$header_color = ' pink';
		$h2_class .= ' pink';
	}
}

?>
	<section <?php post_class(); ?>>
		<article class="row text-center">
			<figure id="post-<?php the_ID(); ?>" class="columns relative post-background<?php echo $header_color;?>" data-clickable>
				<?php nutrient_post_thumbnail(); ?>
				<?php nutrient_post_thumbnail('medium'); ?>
				<?php nutrient_post_thumbnail('thumbnail'); ?>
				<figcaption>
					<?php the_title( sprintf( '<h2 class="' . $h2_class . '">' . $post_icon . '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					<?php twentysixteen_excerpt(); ?>
				</figcaption>
			</figure>
		</article>
	</section>