<?php
/**
 * The template used for displaying our services content
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 0.9
 */

	$services_header 	= get_post_meta( get_the_ID(), '_nutrient_services_header', true );
	$services_copy 		= get_post_meta( get_the_ID(), '_nutrient_services_copy', true );
	$services_title 	= get_post_meta( get_the_ID(), '_nutrient_header_copy', true );
	if( '' == $services_title ) $services_title = get_the_title();
?>
<section id="primary" class="content-area turquoise semi" role="main">
	<article class="row text-center relative">
		<figure>
			<?php nutrient_post_thumbnail(); ?>
			<figcaption>
				<h1 class="animate"><?php echo html_entity_decode($services_title); ?>
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
				<hr class="turquoise animate">
				<?php nutrient_excerpt(); ?>
			</figcaption>
		</figure>
	</article>
</section>
<section rel="services" class="content-area white">
	<article class="row">
	<?php if($services_header):?>
		<div class="entry-content columns small-12">
			<h2><?php echo $services_header;?></h2>
			<p><?php echo html_entity_decode($services_copy);?></p>
		</div>
	<?php endif;?>
	<?php 
			$lis  	= '';
			$mlis 	= '';
			$args = array( 'post_type' 		=> 'service',
										 'order' 				=> ASC,
										 'post_parent' 	=> 0 ); 

			$services_query = query_posts( $args );

			if($services_query) {
				foreach( $services_query as $service ) {

					$color 		= get_post_meta( $service->ID, '_nutrient_services_header_color', false )[0];
					$slug 		= $service->post_name;
					$title 		= $service->post_title;
					$excerpt 	= $service->post_excerpt;

					if(count($color) <= 0){
						$color = '000000';
					}else{
						$color = $color;
					}

					$sargs = array( 'post_type' 		=> 'service',
												 	'order' 				=> ASC,
												 	'posts_per_page'=> -1, 
												 	'post_parent' 	=> $service->ID ); 

					$subservices_query = query_posts( $sargs );

					if( sizeof( $subservices_query ) == 1 ){
						$sclass = ' collapse';
					}else{
						if ( sizeof( $subservices_query ) > 3) {
							$class 	= ' large-up-4';
						}else{
							$class 	= ' large-up-3';
						}
					}

					$lis .= '<li rel="' . $slug . '" class="accordion-item column ' . $slug . '" data-accordion-item>';
					
					$mlis .= '<li rel="' . $slug . '" class="accordion-item column ' . $slug . '" data-accordion-item>';

					$lis .= background_circles($slug, $color, false);
					$mlis .= background_circles($slug, $color, false, true);

					$lis .= '<a href="#' . $slug . '" class="accordion-title success" id="' . $slug . '-heading" aria-controls="' . $slug . '">';
					$mlis .= '<a href="#' . $slug . '_mobile" class="accordion-title success" id="' . $slug . '_mobile-heading" aria-controls="' . $slug . '_mobile">';

					$lis .= '<div>' . $title . '<span>' . $excerpt . '</span><i class="fa fa-plus"></i><i class="fa fa-minus"></i></div></a>';
					$mlis .= '<div>' . $title . '<span>' . $excerpt . '</span><i class="fa fa-plus"></i><i class="fa fa-minus"></i></div></a>';

					$lis .=	'<div id="' . $slug . '" class="accordion-content row' . $sclass .' small-up-1 medium-up-2' . $class . '" data-tab-content aria-labelledby="' . $slug . '-heading">';
					$mlis .=	'<div id="' . $slug . '_mobile" class="accordion-content row' . $sclass .' small-up-1 medium-up-2' . $class . '" data-tab-content aria-labelledby="' . $slug . '_mobile-heading">';

				  $lis .= '<h3 class="text-center">' . $title . ': <br class="show-for-small-only">' . $excerpt . '</h3>';
				  $mlis .= '<h3 class="text-center">' . $title . ': <br class="show-for-small-only">' . $excerpt . '</h3>';

					if($subservices_query) {
						foreach( $subservices_query as $subservice ) {
							$sub_slug 		= $subservice->post_name;
							$sub_title 		= $subservice->post_title;
							$sub_excerpt 	= $subservice->post_excerpt;

					  	$wrapper = '<dl class="column">';
					    $wrapper .= '<dt>' . html_entity_decode( htmlspecialchars_decode( $sub_title ) ) . '</dt>';
					    $wrapper .= '<dd>' . html_entity_decode( htmlspecialchars_decode( $sub_excerpt ) ) . '</dd></dl>';

					  	$lis .= $wrapper;
					  	$mlis .= $wrapper;

			    	}
			    }
			  	$lis .= '</div></li>';
			  	$mlis .= '</div></li>';
			  }
				wp_reset_query();
			}
		?>
		<nav class="columns medium-12 relative">
			<?php background_circles('services', '000000'); ?>
			<ul class="accordion row collapse medium-up-1 large-up-3 hide-for-small-only" data-accordion data-allow-all-closed="true">
				<?php echo $lis; ?>
			</ul>
			<ul class="accordion row collapse small-up-1 show-for-small-only" data-accordion data-allow-all-closed="true" data-multi-expand="true">
				<?php echo $mlis; ?>
			</ul>
		</nav>
	</article>
</section>