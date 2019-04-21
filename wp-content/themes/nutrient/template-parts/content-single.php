<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 0.9
 */

$post_icon;
$header_color;
$format 		= get_post_format();
$h1_class 	= 'entry-title';
$upload_dir = wp_upload_dir();
$upload_dir = $upload_dir['url'];
$has_icon 	= get_post_meta( get_the_ID(), '_nutrient_use_icon', true);
$has_color 	= get_post_meta( get_the_ID(), '_nutrient_header_color', true);
$download 	= get_post_meta( get_the_ID(), '_nutrient_download_link', true);

if($format != 'video'){
	if($has_icon){
		$post_icon = '<em class="block fa fa-' . $has_icon . '"></em>';
		$h1_class .= ' has-icon';
	}
}else{
	$post_icon = '<em class="block fa fa-play-o hidden"></em>';
}

if($has_color){
	$header_color = ' ' . $has_color;
	$h1_class .= $header_color;
}

switch($format){
	case 'video': 
	?>
<section id="primary" <?php post_class(); ?> role="main">
	<article class="row text-center">
		<figure id="post-<?php echo the_ID(); ?>" class="columns relative post-background white">
			<?php nutrient_post_thumbnail(); ?>
			<?php nutrient_post_thumbnail('medium'); ?>
			<?php nutrient_post_thumbnail('thumbnail'); ?>
			<figcaption>
				<?php the_title( sprintf( '<h1 class="animate">' . $post_icon, esc_url( get_permalink() ) ), '</h1>' ); ?>
				<?php twentysixteen_excerpt(); ?>
				<a class="icon-link block" href="<?php echo get_post_type_archive_link( 'post' ); ?>"><em class="fa fa-angle-double-left"></em>Back to our obsessions</a>
			</figcaption>
		</figure>
	</article>
</section>
<section rel="download-top" class="content-area white" role="post-download-navigation">
	<div class="row">
		<nav class="columns small-12 text-center">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						__( '<em class="fa fa-pencil"></em>', 'nutrient' ),
						get_the_title()
					),
					'',
					'', get_the_id(), 'button success edit-post'
				);
			?>
		</nav>
	</div>
</section>
<section rel="the_content" class="content-area white post" role="post-content">
	<article class="row">
		<div class="entry-content columns small-12">
			<?php the_content(); ?>
		</div>
	</article>
</section>
<?php
	break;
	default:
?>
<section id="primary" <?php post_class(); ?> role="main">
	<article class="row text-center">
		<figure id="post-<?php echo the_ID(); ?>" class="columns relative post-background<?php echo $header_color;?>">
			<?php nutrient_post_thumbnail(); ?>
			<?php nutrient_post_thumbnail('medium'); ?>
			<?php nutrient_post_thumbnail('thumbnail'); ?>
			<figcaption>
				<?php the_title( sprintf( '<h1 class="' . $h1_class . '">' . $post_icon, esc_url( get_permalink() ) ), '</h1>' ); ?>
				<?php twentysixteen_excerpt(); ?>
				<a class="icon-link block" href="<?php echo get_post_type_archive_link( 'post' ); ?>"><em class="fa fa-angle-double-left"></em>Back to our obsessions</a>
			</figcaption>
		</figure>
	</article>
</section>
<?php if('' !== $download) : ?>
<section rel="download-top" class="content-area white" role="post-download-navigation">
	<div class="row">
		<nav class="columns small-12 text-center">
			<button class="button" data-gaq-label data-gaq-action data-gaq-category data-href="<?php echo $upload_dir . '/' . html_entity_decode( $download );?>" data-target="_blank">Download the Study</button>
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						__( '<em class="fa fa-pencil"></em>', 'nutrient' ),
						get_the_title()
					),
					'',
					'', get_the_id(), 'button success edit-post'
				);
			?>
		</nav>
	</div>
</section>
<?php endif; ?>
<section rel="the_content" class="content-area white post" role="post-content">
	<article class="row">
		<div class="entry-content columns small-12">
			<?php the_content(); ?>
		</div>
	</article>
</section>
<?php if('' !== $download) : ?>
<section rel="download-bottom" class="content-area white" role="post-download-navigation">
	<div class="row">
		<nav class="columns small-12 text-center">
			<button class="button" data-gaq-label data-gaq-action data-gaq-category data-href="<?php echo $upload_dir . '/' . html_entity_decode( $download );?>" data-target="blank">Download the Study</button>
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						__( '<em class="fa fa-pencil"></em>', 'nutrient' ),
						get_the_title()
					),
					'',
					'', get_the_id(), 'button success edit-post'
				);
			?>
		</nav>
	</div>
</section>
<?php endif; ?>
<?php
	break;
}
?>