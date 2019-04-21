<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 0.9
 */

?>
<section id="primary" class="content-area purple semi" role="main">
	<article class="row text-center">
		<figure>
			<?php nutrient_post_thumbnail(); ?>
			<?php nutrient_post_thumbnail('thumbnail'); ?>
			<figcaption>
				<h1 class="animate"><?php the_title(); ?>
				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							__( '<em class="fa fa-pencil"></em>', 'nutrient' ),
							get_the_title()
						),
						'',
						'', get_the_id(), 'edit-post'
					);
				?></h1>
				<hr class="blue animate">
				<?php twentysixteen_excerpt(); ?>
			</figcaption>
		</figure>
	</article>
</section>
<?php if( is_user_logged_in() ) : ?>
<section rel="download-top" class="content-area white" role="post-download-navigation">
	<div class="row">
		<nav class="columns small-12 text-center">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						__( 'Edit <em class="fa fa-pencil"></em>', 'nutrient' ),
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