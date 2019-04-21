<?php
/**
 * The template used for variable and initial markup for the homepage
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 1
 */
$slug = get_page_template_slug();
?>
<section id="primary" class="content-area purple semi" role="main">
	<article class="row text-center">
		<figure>
			<?php if( $slug !== 'template-home_w_video.php' ): ?>
			<?php nutrient_post_thumbnail(); ?>
			<?php nutrient_post_thumbnail('medium'); ?>
			<?php nutrient_post_thumbnail('thumbnail'); ?>
			<?php endif; ?>