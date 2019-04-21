<?php
/**
 * The template used for variable and initial markup for the homepage
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 1
 */

	$slug = get_page_template_slug();

	$home_title 	= get_post_meta( get_the_ID(), '_nutrient_header_copy', true );
	if( '' == $home_title ) $home_title = get_the_title();

	/* Banner */
	$banner_copy 				= get_post_meta( get_the_ID(), '_nutrient_banner_copy', true );

	$banner_btn_copy 		= get_post_meta( get_the_ID(), '_nutrient_banner_btn_copy', true );
	$banner_btn_href 		= get_post_meta( get_the_ID(), '_nutrient_banner_btn_href', true );
	$banner_btn_gaq_act = get_post_meta( get_the_ID(), '_nutrient_banner_gaq_act', true );
	$banner_btn_gaq_cat = get_post_meta( get_the_ID(), '_nutrient_banner_gaq_cat', true );
	$banner_btn_gaq_lab = get_post_meta( get_the_ID(), '_nutrient_banner_gaq_lab', true );

	/* Our Approach */
	$approach_heading 		= get_post_meta( get_the_ID(), '_nutrient_approach_heading', true );
	$approach_copy 				= get_post_meta( get_the_ID(), '_nutrient_approach_copy', true );
	$approach_btn_copy 		= get_post_meta( get_the_ID(), '_nutrient_approach_btn_copy', true );
	$approach_btn_href 		= get_post_meta( get_the_ID(), '_nutrient_approach_btn_href', true );
	$approach_btn_gaq_act = get_post_meta( get_the_ID(), '_nutrient_approach_gaq_act', true );
	$approach_btn_gaq_cat = get_post_meta( get_the_ID(), '_nutrient_approach_gaq_cat', true );
	$approach_btn_gaq_lab = get_post_meta( get_the_ID(), '_nutrient_approach_gaq_lab', true );

	/* Fresh Thinking */
	$fresh_heading 			= get_post_meta( get_the_ID(), '_nutrient_fresh_heading', true );
	$fresh_copy 				= get_post_meta( get_the_ID(), '_nutrient_fresh_copy', true );
	$fresh_btn_copy 		= get_post_meta( get_the_ID(), '_nutrient_fresh_btn_copy', true );
	$fresh_btn_href 		= get_post_meta( get_the_ID(), '_nutrient_fresh_btn_href', true );
	$fresh_btn_gaq_act 	= get_post_meta( get_the_ID(), '_nutrient_fresh_gaq_act', true );
	$fresh_btn_gaq_cat 	= get_post_meta( get_the_ID(), '_nutrient_fresh_gaq_cat', true );
	$fresh_btn_gaq_lab 	= get_post_meta( get_the_ID(), '_nutrient_fresh_gaq_lab', true );
?>
			<figcaption>
				<h1 class="animate"><?php echo html_entity_decode($home_title); ?><?php
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
				<hr class="pink">
				<?php nutrient_excerpt(); ?>
			</figcaption>
		</figure>
	</article>
</section>
<?php if ( $banner_copy ) : ?>
<section rel="our_approach" class="content-area plum banner semi space" role="post-content">
	<?php if( $slug == 'template-home_w_video.php' ): ?>
	<div class="scroll-indicator">
		<img class="mouse" src="<?php echo get_template_directory_uri();?>/img/mouse.png" alt="" />
		<img class="dot" src="<?php echo get_template_directory_uri();?>/img/dot.png" alt="" />
	</div>
	<?php endif; ?>
	<article class="row">
		<div class="entry-content columns small-12 medium-8 large-9 cell">
			<?php echo html_entity_decode( $banner_copy );?>
		</div>
		<?php if ( $banner_btn_href ) : ?>
		<nav class="columns small-12 medium-4 large-3 cell">
			<button class="button success" data-gaq-label="<?php echo $banner_btn_gaq_lab;?>" data-gaq-action="<?php echo $banner_btn_gaq_act;?>" data-gaq-category="<?php echo $banner_btn_gaq_cat;?>" data-href="<?php echo bloginfo('url') . $banner_btn_href;?>"><?php echo  html_entity_decode( $banner_btn_copy );?></button>
		</nav>
		<?php endif; ?>
	</article>
</section>
<?php endif;?>
<section rel="our_approach" class="content-area orange" role="post-content">
	<article class="row relative">
		<ul id="our_approach-decision_tree" class="no-bullet absolute">
			<li class="layer" data-depth="0.2">
				<svg class="our_approach-decision_tree" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 126 147" enable-background="new 0 0 126 147" xml:space="preserve">
					<circle id="oadt_ring2b" fill="none" stroke="#F57345" stroke-width="2" stroke-miterlimit="10" cx="65.7" cy="84.3" r="6.4"></circle>
				</svg>
			</li>
			<li class="layer" data-depth="0.6">
				<svg class="our_approach-decision_tree" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 126 147" enable-background="new 0 0 126 147" xml:space="preserve">
					<circle id="oadt_ring1" fill="none" stroke="#F57345" stroke-width="2" stroke-miterlimit="10" cx="105.9" cy="18" r="17"></circle>
					<circle id="oadt_ring2" fill="none" stroke="#F57345" stroke-width="2" stroke-miterlimit="10" cx="71" cy="93.8" r="10.4"></circle>
				</svg>
			</li>
			<li class="layer" data-depth="0.4">
				<svg class="our_approach-decision_tree" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 126 147" enable-background="new 0 0 126 147" xml:space="preserve">
					<line id="oadt_line1" fill="none" stroke="#F57345" stroke-miterlimit="10" x1="106.6" y1="17.4" x2="71" y2="93.8"></line>
					<line id="oadt_line2" fill="none" stroke="#F57345" stroke-miterlimit="10" x1="71" y1="93.8" x2="4.6" y2="142.4"></line>
					<circle id="oadt_dot3" fill="#F57345" cx="4.6" cy="142.4" r="3.6"></circle>
					<circle id="oadt_dot2" fill="#F57345" cx="70.6" cy="92.4" r="3.6"></circle>
					<circle id="oadt_dot1" fill="#F57345" cx="106.6" cy="17.4" r="3.6"></circle>
				</svg>
			</li>
		</ul>
		<ul id="our_approach-circles" class="no-bullet absolute">
			<li class="layer">
				<img id="our_approach-midground-circles" alt="" src="<?php echo get_template_directory_uri();?>/img/midground-our_approach-circles.png">
			</li>
			<li class="layer" data-depth="0.3">
				<svg version="1.1" id="our_approach-foreground-circles" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 403 403"
enable-background="new 0 0 403 403" xml:space="preserve">
					<g>
						<circle fill="none" stroke="#F34F39" stroke-width="55" stroke-miterlimit="10" cx="201.5" cy="201.5" r="172.5"></circle>
					</g>
				</svg>
			</li>
		</ul>
	<?php if ( $approach_heading ) : ?>
		<h2 class="column medium-offset-1 large-offset-2"><?php echo  html_entity_decode( $approach_heading );?></h2>
	<?php endif;?>
		<figure class="entry-content columns medium-offset-1 large-offset-2">
			<div class="row collapse">
			<?php if ( $approach_copy ) : ?>
				<figcaption class="columns small-9 medium-6 relative">
					<?php echo  html_entity_decode( $approach_copy ); ?>
				</figcaption>
			<?php endif;?>
				<div class="columns small-3 medium-5 large-4" rel="hm_logo">
					<?php hm_logo('hm');?>
				</div>
			</div>
		</figure>
	<?php if ( $approach_btn_href ) : ?>
		<nav class="column medium-offset-1 large-offset-2 end relative">
			<button class="button secondary" data-gaq-label="<?php echo $approach_btn_lab;?>" data-gaq-action="<?php echo $approach_btn_act;?>" data-gaq-category="<?php echo $approach_btn_cat;?>" data-href="<?php echo bloginfo('url') . $approach_btn_href;?>"><?php echo  html_entity_decode( $approach_btn_copy );?></button>
		</nav>
	<?php endif;?>
	</article>
</section>
<section rel="fresh_thinking" class="content-area pink semi space" role="post-content">
	<article class="row relative">
		<div class="entry-content columns small-12 medium-4 large-5 medium-offset-1 large-offset-1">
		<?php if ( $fresh_heading ) : ?>
			<h3><?php echo  html_entity_decode( $fresh_heading );?></h3>
		<?php endif; ?>
		<?php if ( $fresh_btn_href ) : ?>
			<nav class="hide-for-small-only">
				<button class="button primary" data-gaq-label data-gaq-action data-gaq-category data-href="<?php echo bloginfo('url') . $fresh_btn_href;?>"><?php echo  html_entity_decode( $fresh_btn_copy );?></button>
			</nav>
		<?php endif; ?>
		</div>
		<figure class="entry-content columns small-offset-1 small-10 medium-offset-0 medium-7 large-6">
			<div class="absolute hide-for-small-only">
				<img alt="" src="<?php echo get_template_directory_uri();?>/img/background-fresh_thinking.png" width="666" height="578">
			</div>
		<?php if ( $fresh_copy ) : ?>
			<figcaption>
				<?php echo  html_entity_decode( $fresh_copy ); ?>
			</figcaption>
		<?php endif; ?>
		</figure>
	<?php if ( $fresh_btn_href ) : ?>
		<nav class="show-for-small-only columns relative z-1">
			<button class="button primary" data-gaq-label="<?php echo $fresh_btn_gaq_lab;?>" data-gaq-action="<?php echo $fresh_btn_gaq_act;?>" data-gaq-category="<?php echo $fresh_btn_gaq_cat;?>" data-href="<?php echo bloginfo('url') . $fresh_btn_href;?>"><?php echo  html_entity_decode( $fresh_btn_copy );?></button>
		</nav>
	<?php endif; ?>
	</article>
</section>