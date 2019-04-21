<?php
/**
 * The template used for displaying our approach content
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 1
 */

$approach_title 	= get_post_meta( get_the_ID(), '_nutrient_header_copy', true );
if( '' == $approach_title ) $approach_title = get_the_title();

$hm_header 			= get_post_meta( get_the_ID(), '_nutrient_hm_header', true );
$hm_subheader 	= get_post_meta( get_the_ID(), '_nutrient_hm_subheader', true );
$dvm_header 		= get_post_meta( get_the_ID(), '_nutrient_dvm_header', true );
$dvm_copy 			= get_post_meta( get_the_ID(), '_nutrient_dvm_copy', true );
$bb_header 			= get_post_meta( get_the_ID(), '_nutrient_bb_header', true );
$bb_copy 				= get_post_meta( get_the_ID(), '_nutrient_bb_copy', true );
$sp_header 			= get_post_meta( get_the_ID(), '_nutrient_sp_header', true );
$sp_copy 				= get_post_meta( get_the_ID(), '_nutrient_sp_copy', true );
$feat0 					= get_post_meta( get_the_ID(), '_nutrient_template_approach_feat0', true );
$feat1 					= get_post_meta( get_the_ID(), '_nutrient_template_approach_feat1', true );
$feat0_btn 			= get_post_meta( get_the_ID(), '_nutrient_template_approach_feat0_btn', true );
$feat1_btn 			= get_post_meta( get_the_ID(), '_nutrient_template_approach_feat1_btn', true );
$feat0_copy 		= get_post_meta( get_the_ID(), '_nutrient_template_approach_feat0_copy', true );
$feat1_copy 		= get_post_meta( get_the_ID(), '_nutrient_template_approach_feat1_copy', true );
$feat0_img 			= get_post_meta( get_the_ID(), '_nutrient_template_approach_feat0_img', true );
$feat1_img 			= get_post_meta( get_the_ID(), '_nutrient_template_approach_feat1_img', true );
$feat0_gaq_act 	= get_post_meta( get_the_ID(), '_nutrient_template_approach_feat0_gaq_act', true );
$feat1_gaq_act 	= get_post_meta( get_the_ID(), '_nutrient_template_approach_feat1_gaq_act', true );
$feat0_gaq_cat 	= get_post_meta( get_the_ID(), '_nutrient_template_approach_feat0_gaq_cat', true );
$feat1_gaq_cat 	= get_post_meta( get_the_ID(), '_nutrient_template_approach_feat1_gaq_cat', true );
$feat0_gaq_lab 	= get_post_meta( get_the_ID(), '_nutrient_template_approach_feat0_gaq_lab', true );
$feat1_gaq_lab 	= get_post_meta( get_the_ID(), '_nutrient_template_approach_feat1_gaq_lab', true );

?>
<!-- BEOF #primary -->
<section id="primary" class="content-area purple semi space" role="main">
	<article class="row text-center" role="document">
		<figure>
			<?php nutrient_post_thumbnail(); ?>
			<?php nutrient_post_thumbnail('medium'); ?>
			<figcaption>
				<h1 class="animate"><?php echo html_entity_decode($approach_title); ?>
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
<!-- EOF #primary -->
<!-- BEOF #customers -->
<section id="customers" class="content-area white semi customers">
	<article class="row">
		<div class="small-11 medium-8 medium-offset-1 large-7 columns relative z-5">
		<?php the_content(); ?>
		</div>
		<div class="small-1 medium-3 large-4 columns">
			<ul id="decision-tree" class="no-bullet">
				<li id="decision-girl-li" class="layer" data-depth="-0.1">
					<img id="decision-girl" class="animate" src="<?php echo get_template_directory_uri() . '/img/our-approach-girl.png';?>" alt="" >
				</li>
				<li id="outer-rings-li" class="layer" data-depth="0.4">
					<svg version="1.1" id="outer-rings" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve">
						<g class="outer-ring">
							<g opacity="0.15">
								<path fill="rgba(98, 120, 154, 0.52)" d="M16,0C9.4,0,4.1,5.3,4.1,11.9S9.4,23.8,16,23.8s11.9-5.3,11.9-11.9S22.6,0,16,0z M16,18.8
									c-3.8,0-6.9-3.1-6.9-6.9s3.1-6.9,6.9-6.9s6.9,3.1,6.9,6.9S19.8,18.8,16,18.8z"></path>
							</g>
						</g>
					</svg>
				</li>
				<li id="inner-rings-li" class="layer" data-depth="0.3">
					<svg version="1.1" id="inner-rings" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve">
						<g class="inner-ring">
							<g>
								<path fill="rgba(98, 120, 154, 0.2)" d="M16.1,5.4c-3.6,0-6.5,2.9-6.5,6.5s2.9,6.5,6.5,6.5s6.5-2.9,6.5-6.5S19.6,5.4,16.1,5.4z M16.1,15.7
									c-2.1,0-3.8-1.7-3.8-3.8s1.7-3.8,3.8-3.8s3.8,1.7,3.8,3.8S18.1,15.7,16.1,15.7z"></path>
							</g>
						</g>
					</svg>
				</li>
				<li id="dot5-circle-outer-li" class="layer" data-depth="0.2">
					<svg version="1.1" id="dot5-circle-outer" class="animate" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1072.3 2419.8" enable-background="new 0 0 1072.3 2419.8" xml:space="preserve">
		 				<g>
							<path id="point5-circle-outer" opacity="0.1" fill="#7EC1C9" d="M208,1585.3c-114.9,0-208,93.1-208,208c0,114.9,93.1,208,208,208s208-93.1,208-208
										C416,1678.4,322.9,1585.3,208,1585.3z M271.4,1901.1c-59.6,35-136.2,15.1-171.2-44.4s-15.1-136.2,44.4-171.2
										c59.6-35,136.2-15.1,171.2,44.4C350.8,1789.4,331,1866.1,271.4,1901.1z"></path>
						</g>
					</svg>
				</li>
				<li id="dot2-arcs-li" class="layer" data-depth="0.1">
					<svg version="1.1" id="dot2-arcs" class="animate" x="0px" y="0px" viewBox="0 0 350 350" enable-background="new 0 0 350 350">
						<path id="point2-curve-inner" opacity="0.5" fill="none" stroke="#7EC1C9" stroke-width="2" stroke-miterlimit="10" d="M176-565.2C-291.3-251.8-494.4,206.2-328.4,613"></path>
						<path id="point2-curve-outer" opacity="0.5" fill="none" stroke="#7EC1C9" stroke-width="2" stroke-miterlimit="10" d="M176-565.2c-421.7,309.2-667.5,871.2-8.5,1382"></path>
					</svg>
				</li>
				<li id="tree-li" class="layer" data-depth="0.1">
					<svg version="1.1" id="tree" class="animate" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1072.3 2419.8" enable-background="new 0 0 1072.3 2419.8" xml:space="preserve">
		 				<g>
							<circle id="point1-circle-outer" opacity="0.5" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" cx="376.9" cy="315.7" r="168"></circle>
							<path id="point1-line1" opacity="0.5" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" d="M403.3,9.5 L374.8,312.1"></path>
							<path id="point1-line2" opacity="0.5" fill="none" stroke="#7EC1C9" stroke-width="4" stroke-miterlimit="10" d="M405.2,337.8 L681.6,570.7"></path>
							<path id="point1-line3" opacity="0.5" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" d="M372.8,308.8 L371.5,483.7"></path>
							<circle id="point1-circle2" opacity="0.5" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" cx="373.4" cy="489.1" r="44.9"></circle>
							<circle id="point1-circle3" opacity="0.5" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" cx="203" cy="559" r="63"></circle>
							<path id="point1-line4" opacity="0.5" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" d="M209.3,550.9 L374.8,312.1"></path>
							<circle id="point1b" opacity="0.5" fill="#FFFFFF" cx="203" cy="559" r="10.3"></circle>
							<path id="point1-line5" opacity="0.5" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" d="M339.8,330.4 L215.9,396.2"></path>
							<path id="point1-line6" opacity="0.5" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" d="M336.2,308.8 L209.3,281.4"></path>
							<path id="point1-line7" opacity="0.5" fill="none" stroke="#7EC1C9" stroke-width="2" stroke-miterlimit="10" d="M689.4,630.2 L658.7,672.7"></path>
							<circle id="point1" opacity="1" fill="#5a7595" stroke="#bfbac9" stroke-width="3" stroke-miterlimit="10" cx="371.2" cy="316.7" r="38.9"></circle>
							<circle id="point1-center" opacity="0.5" fill="#FFFFFF" cx="374.8" cy="313.4" r="10.3"></circle>
							<circle id="point1-circle1" opacity="0.5" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" cx="336.7" cy="310.8" r="27.4"></circle>
							<circle id="point1-point1c" opacity="1" fill="#bfbac9" cx="215.9" cy="396.2" r="10.3"></circle>
							<circle id="point1-point1d" opacity="1" fill="#bfbac9" cx="208.9" cy="281.4" r="10.3"></circle>
							<circle id="point1a" opacity="1" fill="#bfbac9" cx="403.3" cy="9.5" r="9.5"></circle>
							<path id="point2-line1" opacity="0.5" fill="none" stroke="#7EC1C9" stroke-width="4" stroke-miterlimit="10" d="M719.4,635 L841.2,1018.6"></path>
							<path id="point3-line" opacity="0.5" fill="none" stroke="#b8dde2" stroke-width="4" stroke-miterlimit="10" d="M836.1,1065.8 L689.4,1349"></path>
							<path id="point4-line1" opacity="0.5" fill="none" stroke="#b8dde2" stroke-width="2" stroke-miterlimit="10" d="M648.7,1369.5 L481.2,1329.3"></path>
							<path id="point4-line2" opacity="0.5" fill="none" stroke="#b8dde2" stroke-width="4" stroke-miterlimit="10" d="M681,1400.9 L787,1796.8"></path>
							<path id="point5-line" opacity="0.5" fill="none" stroke="#b8dde2" stroke-width="4" stroke-miterlimit="10" d="M250,1962.7 L217.1,1828.2"></path>
							<path id="point6-line" opacity="0.5" fill="none" stroke="#b8dde2" stroke-width="4" stroke-miterlimit="10" d="M667,1955.4 L277.5,1987.3"></path>
							<path id="point7-line" opacity="0.5" fill="none" stroke="#b8dde2" stroke-width="4" stroke-miterlimit="10" d="M724.1,2062.9 L495.1,2351.5"></path>
							<path id="baby-bottle" opacity="0.5" fill="#7EC1C9" d="M837.5,1953.5c0.5-0.3,2.7-1.6,2.7-1.6l-0.4-0.7c2.1,2.9,3.2,4.1,3.3,4.1c0.2,0,2.9-1.9,3-2.4
								c0.1-0.4-0.2-0.8-0.3-1.1c0.1,0,0.1,0.1,0.1,0.1s1.2-0.2,2.3-1.6c1-1.4,8.5-5,8.5-5l0-0.1c0,0,0.7-1.1,0.6-2l0-0.1
								c0,0-0.1,0-0.3-0.1c0,0,0.1,0,0.1,0c0.2-0.1-0.7-2.2-2.3-5.4c0.5-0.2,0.5-1.7,0.4-2.3c-0.2-0.7,2.5-1.7,3.8-3.2
								c1.2-1.5,2.9-5.2,6.4-8.2s9.2-5.4,9.2-5.4c3.1-1.8,4.1-5.8,2.3-8.8l-0.1-0.2c-1.8-3.1-5.8-4.1-8.8-2.3c0,0-4.8,3.8-9.2,5.4
								c-4.3,1.6-8.4,1.2-10.3,1.6c-1.9,0.4-4.1,2.2-4.6,1.7c-0.4-0.4-1.7-1.1-2.2-0.8c-2-3-3.3-4.8-3.6-4.6c0,0,0,0.1,0,0.1
								c0-0.2,0-0.3,0-0.3l0-0.1c-0.7-0.6-2-0.5-2-0.5l0-0.1c0,0-6.7,4.8-8.5,5c-1.7,0.2-2.5,1.2-2.5,1.2s0,0,0,0.1
								c-0.2-0.3-0.4-0.7-0.8-0.8c-0.5-0.2-3.5,1.3-3.6,1.4c0,0.1,0.5,1.7,2,4.9l-0.4-0.7c0,0-2.2,1.3-2.7,1.6s-5.7-6.5-16.7-0.1
								s-51.2,30.1-51.2,30.1s-6.3,4.3-0.7,13.9c5.6,9.6,7.4,12.6,7.4,12.6l0.3,0.5c0,0,1.7,3,7.4,12.6c5.6,9.6,12.5,6.2,12.5,6.2
								s40.2-23.6,51.2-30.1S837,1953.8,837.5,1953.5z"></path>
						</g>
					</svg>
				</li>
				<li id="girl-circle-outer-li" class="layer" data-depth="0.4">
					<svg version="1.1" id="girl-circle-outer" class="animate" x="0px" y="0px" viewBox="0 0 500 500" enable-background="new 0 0 500 500">
						<circle id="decision-girl-circle-outer" opacity="0.5" fill="none" stroke="#FFFFFF" stroke-width="8" stroke-miterlimit="10" cx="250" cy="250" r="240"></circle>
					</svg>
				</li>
				<li id="girl-circle-inner-li" class="layer" data-depth="0.1">
					<svg version="1.1" id="girl-circle-inner" class="animate" x="0px" y="0px" viewBox="0 0 150 150" enable-background="new 0 0 150 150">
						<circle id="decision-girl-circle-inner" opacity="0.5" fill="none" stroke="#7FC1C9" stroke-width="4" stroke-miterlimit="10" cx="75" cy="75" r="71"></circle>
					</svg>
				</li>
				<li id="dot2-li" class="layer" data-depth="0.1">
					<svg version="1.1" id="dot2" class="animate" x="0px" y="0px" viewBox="0 0 28 28" enable-background="new 0 0 28 28">
						<circle id="point2" opacity="1" fill="#5a7595" cx="14" cy="14" r="14"></circle>
					</svg>
				</li>
				<li id="dot2b-li" class="layer" data-depth="0.1">
					<svg version="1.1" id="dot2b" class="animate" x="0px" y="0px" viewBox="0 0 28 28" enable-background="new 0 0 28 28">
						<circle id="point2b" opacity="1" fill="#5a7595" cx="14" cy="14" r="14"></circle>
					</svg>
				</li>
				<li id="dot3-li" class="layer" data-depth="0.1">
					<svg version="1.1" id="dot3" class="animate" x="0px" y="0px" viewBox="0 0 28 28" enable-background="new 0 0 28 28">
						<circle id="point3" opacity="1" fill="#b8dde2" cx="14" cy="14" r="14"></circle>
					</svg>
				</li>
				<li id="dot4-li" class="layer" data-depth="0.1">
					<svg version="1.1" id="dot4" class="animate" x="0px" y="0px" viewBox="0 0 28 28" enable-background="new 0 0 28 28">
						<circle id="point4" opacity="1" fill="#b8dde2" cx="14" cy="14" r="14"></circle>
					</svg>
				</li>
				<li id="dot4b-li" class="layer" data-depth="0.1">
					<svg version="1.1" id="dot4b" class="animate" x="0px" y="0px" viewBox="0 0 28 28" enable-background="new 0 0 28 28">
						<circle id="point4b" opacity="1" fill="#b8dde2" cx="14" cy="14" r="14"></circle>
					</svg>
				</li>
				<li id="dot5-li" class="layer" data-depth="0.1">
					<svg version="1.1" id="dot5" class="animate" x="0px" y="0px" viewBox="0 0 28 28" enable-background="new 0 0 28 28">
						<circle id="point5" opacity="1" fill="#b8dde2" cx="14" cy="14" r="14"></circle>
					</svg>
				</li>
				<li id="dot5-ring-outer-li" class="layer" data-depth="0.4">
					<svg version="1.1" id="dot5-ring-outer" class="animate" x="0px" y="0px" viewBox="0 0 28 28" enable-background="new 0 0 28 28">
						<circle id="point5-ring-outer" opacity="0.5" fill="none" stroke="#7EC1C9" stroke-width="0.5" stroke-miterlimit="10" cx="14" cy="14" r="13"></circle>
					</svg>
				</li>
				<li id="dot5-ring-inner-li" class="layer" data-depth="0.3">
					<svg version="1.1" id="dot5-ring-inner" class="animate" x="0px" y="0px" viewBox="0 0 28 28" enable-background="new 0 0 28 28">
						<circle id="point5-ring-inner" opacity="0.5" fill="none" stroke="#7EC1C9" stroke-width="0.625" stroke-miterlimit="10" cx="14" cy="14" r="13"></circle>
					</svg>
				</li>
				<li id="dot6-li" class="layer" data-depth="0.1">
					<svg version="1.1" id="dot6" class="animate" x="0px" y="0px" viewBox="0 0 28 28" enable-background="new 0 0 28 28">
						<circle id="point6" opacity="1" fill="#b8dde2" cx="14" cy="14" r="14"></circle>
					</svg>
				</li>
				<li id="dot7-li" class="layer" data-depth="0.1">
					<svg version="1.1" id="dot7" class="animate" x="0px" y="0px" viewBox="0 0 28 28" enable-background="new 0 0 28 28">
						<circle id="point7" opacity="1" fill="#b8dde2" cx="14" cy="14" r="14"></circle>
					</svg>
				</li>
			</ul>
		</div>
	</article>
</section>
<!-- EOF #customers -->
<!-- BEOF #healthy-motivation -->
<section id="healthy-motivation" class="content-area lavender semi healthy-motivation" data-magellan-target="healthy-motivation">
	<article class="row text-center" role="document">
		<h2 class="museo column">
			<span class="hide"><?php echo $hm_header; ?></span>
			<svg version="1.1" width="973" height="340" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 973 340" enable-background="new 0 0 973 340" xml:space="preserve">
				<defs>
					<pattern id="galaxy" patternUnits="userSpaceOnUse" width="1102" height="340">
    				<image xlink:href="<?php echo get_template_directory_uri() . '/img/background-galaxy_gradient.jpg';?>" x="0" y="0" width="1102" height="810"></image>
  				</pattern>
				</defs>
				<path fill="url(#galaxy)" d="M156.3,20.9c0-2.9-1.6-4.3-4.3-4.3h-8.4V-0.1h19.7 c8.8,0,12.5,3.7,12.5,12.5v48.1h70V12.3c0-8.8,3.7-12.5,12.5-12.5h19.7v16.8h-8.4c-2.7,0-4.3,1.4-4.3,4.3v116.5h-19.5V77h-70v60.4 h-19.5V20.9z M340.8,36.5c27.7,0,42.5,20.7,42.5,46.2c0,2.5-0.6,7.8-0.6,7.8h-71.9c1.2,21,16.4,32.9,33.9,32.9 c17,0,28.8-11.5,28.8-11.5l8.2,13.4c0,0-14.6,14.4-38,14.4c-31.2,0-52.4-22.4-52.4-51.6C291.3,56.8,312.8,36.5,340.8,36.5z M363.8,76.7c-0.6-16.4-10.9-25.1-23.2-25.1c-14.4,0-26.1,8.8-29,25.1H363.8z M458.5,76.1h4.3v-1c0-17.3-6.4-23.6-21.8-23.6 c-4.7,0-16.2,1.2-16.2,7.6v5.7h-17.7V55c0-16.2,24.6-18.5,34.1-18.5c32,0,40.5,16.8,40.5,38.6V117c0,2.9,1.6,4.3,4.3,4.3h8v16.2 h-17.7c-8.8,0-12.3-4.3-12.3-11.3c0-3.3,0.4-5.8,0.4-5.8H464c0,0-7.8,19.5-31.4,19.5c-17,0-33.5-10.3-33.5-30 C399.1,78,442,76.1,458.5,76.1z M436.7,124.6c16,0,26.3-16.8,26.3-31.4v-3.3h-4.9c-14.2,0-40,0.8-40,18.9 C418.2,116.8,424.2,124.6,436.7,124.6z M514.1,20.3c0-2.9-1.6-4.3-4.3-4.3h-8V-0.1h18.7c8.8,0,12.5,3.7,12.5,12.5V117 c0,2.9,1.6,4.3,4.3,4.3h8v16.2h-18.7c-8.8,0-12.5-3.7-12.5-12.5V20.3z M567.5,54h-12.9V38.8h13.3V11.8h18.5v27.1h23.6V54h-23.6v45.2 c0,19.7,13.6,22.2,20.9,22.2c2.7,0,4.5-0.4,4.5-0.4v16.8c0,0-2.5,0.4-6.6,0.4c-12.5,0-37.6-3.9-37.6-36.8V54z M633.1,20.3 c0-2.9-1.6-4.3-4.3-4.3h-8V-0.1h18.7c8.8,0,12.5,3.7,12.5,12.1v38.4c0,4.7-0.4,8.2-0.4,8.2h0.4c4.3-9.5,17-22,36.6-22 c23.2,0,33.7,12.7,33.7,37.8V117c0,2.9,1.6,4.3,4.3,4.3h8v16.2h-18.5c-8.8,0-12.5-3.7-12.5-12.5V78.6c0-13.8-2.9-24.8-18.7-24.8 c-15,0-27.1,10.1-31.2,24.4c-1.4,3.9-1.8,8.4-1.8,13.1v46.2h-18.9V20.3z M759.6,162c7.6,0,13.6-5.5,17.3-14.2l4.5-10.7l-33.7-78.1 c-1.4-3.1-3.1-3.9-6.2-3.9h-2.3V38.8h11.1c8,0,10.9,2.1,14,9.9l22.4,55.5c1.9,5.1,3.5,11.9,3.5,11.9h0.4c0,0,1.4-6.8,3.3-11.9 l20.5-55.5c2.9-7.8,6.4-9.9,14.4-9.9h11.3V55h-2.5c-3.1,0-4.9,0.8-6.2,3.9l-39,96.3c-6,15.2-17.9,23.2-31.8,23.2 c-14.6,0-23.2-9.7-23.2-9.7l7.8-13.6C745.2,155.2,751.2,162,759.6,162z M2.6,269.7h6.6c2.7,0,4.1-1.6,4.3-4.3l9.4-116.5h20.1 l32.4,72.9c3.3,7.4,6.8,17.3,6.8,17.3h0.4c0,0,3.5-9.9,6.8-17.3l32.4-72.9h20.1l9.4,116.5c0.2,2.7,1.6,4.3,4.3,4.3h6.4v16.8h-17.3 c-8.8,0-11.9-3.7-12.5-12.5l-5.7-72.7c-0.6-8.2-0.4-20.3-0.4-20.3h-0.4c0,0-3.9,12.9-7.2,20.3l-27.9,60.4H74.1l-27.9-60.4 c-3.3-7.2-7.4-20.5-7.4-20.5h-0.4c0,0,0.2,12.3-0.4,20.5L32.6,274c-0.6,8.8-3.7,12.5-12.7,12.5H2.6V269.7z M225.7,185.5 c29.4,0,53.2,21.6,53.2,51.4c0,30-23.8,51.8-53.2,51.8c-29.4,0-53-21.8-53-51.8C172.7,207.1,196.3,185.5,225.7,185.5z M225.7,272.4 c18.7,0,33.9-14.8,33.9-35.5c0-20.5-15.2-35.1-33.9-35.1c-18.5,0-33.7,14.6-33.7,35.1C192,257.6,207.2,272.4,225.7,272.4z M303.3,203h-12.9v-15.2h13.3v-27.1h18.5v27.1h23.6V203h-23.6v45.2c0,19.7,13.6,22.2,20.9,22.2c2.7,0,4.5-0.4,4.5-0.4v16.8 c0,0-2.5,0.4-6.6,0.4c-12.5,0-37.6-3.9-37.6-36.8V203z M372.1,208.3c0-2.9-1.6-4.3-4.3-4.3h-8v-16.2h18.5c8.8,0,12.5,3.7,12.5,12.5 V266c0,2.9,1.6,4.3,4.3,4.3h8v16.2h-18.5c-8.8,0-12.5-3.7-12.5-12.5V208.3z M372.5,148.9h17v19.7h-17V148.9z M417.7,207.9 c-1.2-2.9-2.9-3.9-6-3.9h-1.9v-16.2h9.7c8.8,0,12.1,2.1,15,9.9l21.2,56.7c1.9,5.5,3.5,12.9,3.5,12.9h0.4c0,0,1.6-7.4,3.5-12.9 l21-56.7c2.9-7.8,6.4-9.9,15-9.9h9.2V204h-1.9c-3.3,0-5.3,1-6.4,3.9l-30,78.5h-21.8L417.7,207.9z M576.5,225.1h4.3v-1 c0-17.3-6.4-23.6-21.8-23.6c-4.7,0-16.2,1.2-16.2,7.6v5.7h-17.7V204c0-16.2,24.6-18.5,34.1-18.5c32,0,40.5,16.8,40.5,38.6V266 c0,2.9,1.6,4.3,4.3,4.3h8v16.2h-17.7c-8.8,0-12.3-4.3-12.3-11.3c0-3.3,0.4-5.8,0.4-5.8H582c0,0-7.8,19.5-31.4,19.5 c-17,0-33.5-10.3-33.5-30C517.1,227,560,225.1,576.5,225.1z M554.7,273.6c16,0,26.3-16.8,26.3-31.4v-3.3h-4.9 c-14.2,0-40,0.8-40,18.9C536.2,265.8,542.2,273.6,554.7,273.6z M633.2,203h-12.9v-15.2h13.3v-27.1h18.5v27.1h23.6V203h-23.6v45.2 c0,19.7,13.6,22.2,20.9,22.2c2.7,0,4.5-0.4,4.5-0.4v16.8c0,0-2.5,0.4-6.6,0.4c-12.5,0-37.6-3.9-37.6-36.8V203z M702,208.3 c0-2.9-1.6-4.3-4.3-4.3h-8v-16.2h18.5c8.8,0,12.5,3.7,12.5,12.5V266c0,2.9,1.6,4.3,4.3,4.3h8v16.2h-18.5c-8.8,0-12.5-3.7-12.5-12.5 V208.3z M702.4,148.9h17v19.7h-17V148.9z M798.1,185.5c29.4,0,53.2,21.6,53.2,51.4c0,30-23.8,51.8-53.2,51.8s-53-21.8-53-51.8 C745.1,207.1,768.7,185.5,798.1,185.5z M798.1,272.4c18.7,0,33.9-14.8,33.9-35.5c0-20.5-15.2-35.1-33.9-35.1 c-18.5,0-33.7,14.6-33.7,35.1C764.4,257.6,779.6,272.4,798.1,272.4z M874.9,208.3c0-2.9-1.6-4.3-4.3-4.3h-8v-16.2h18.1 c8.4,0,12.5,3.7,12.5,10.9v3.7c0,3.1-0.4,5.7-0.4,5.7h0.4c3.9-8.6,15.6-22.6,37-22.6c23.4,0,33.9,12.7,33.9,37.8V266 c0,2.9,1.6,4.3,4.3,4.3h8v16.2h-18.7c-8.8,0-12.5-3.7-12.5-12.5v-46.4c0-13.8-2.7-24.8-18.5-24.8c-15.2,0-27.3,9.9-31.2,24.2 c-1.4,3.9-1.8,8.4-1.8,13.3v46.2h-18.9V208.3z"></path>
			</svg>
		</h2>
		<?php if( $hm_subheader ) : ?>
		<h3 class="column"><?php echo html_entity_decode($hm_subheader); ?></h3>
		<?php endif; ?>
	</article>
	<div class="flowchart">
		<div class="flowchart-background hide-for-small-only">
			<div class="hm-circles">
			<?php hm_logo('hm', true, '#8589ed', false, true);?>
			</div>
			<div class="vm"><img src="<?php echo get_template_directory_uri() . '/img/vn.svg';?>" alt=""></div>
			<div class="bb"><img src="<?php echo get_template_directory_uri() . '/img/bb.svg';?>" alt=""></div>
			<div class="plus"><img src="<?php echo get_template_directory_uri() . '/img/plus.svg';?>" alt=""></div>
			<div class="vm-hm">
				<svg version="1.1" id="vn-g" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1200 1200"
	 enable-background="new 0 0 1200 1200" xml:space="preserve">
					<g>
						<path id="vn-hm" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M236,308.6C222.9,458,252.4,682.8,552.9,682.7"></path>
					</g>
				</svg>
			</div>
			<div class="bb-hm">
				<svg version="1.1" id="bb-g" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1200 1200"
					 enable-background="new 0 0 1200 1200" xml:space="preserve">
					<g>
						<path id="bb-hm" fill="none" stroke="#FFFFFF" stroke-miterlimit="10" d="M734.1,309.2C823.7,387,849.7,675.5,679,814.5"></path>
					</g>
				</svg>
			</div>
		</div>
		<div class="dvm">
			<h4><?php echo html_entity_decode( $dvm_header );?></h4>
			<p class="museo"><?php echo html_entity_decode( $dvm_copy );?></p>
			<div class="dvm-bb-line show-for-small-only">
				<img src="<?php echo get_template_directory_uri() . '/img/vm-bb-line-mobile.png';?>" alt="" >
			</div>
		</div>
		<div class="bb">
			<h4><?php echo html_entity_decode( $bb_header );?></h4>
			<p class="museo"><?php echo html_entity_decode( $bb_copy );?></p>
			<div class="bb-hm-line show-for-small-only">
				<img src="<?php echo get_template_directory_uri() . '/img/bb-hm-line-mobile.png';?>" alt="" >
			</div>
		</div>
		<div class="hm">
			<h4><?php echo html_entity_decode( $sp_header );?></h4>
			<p class="museo"><?php echo html_entity_decode( $sp_copy );?></p>
		</div>
	</div>
</section>
<!-- EOF #healthy-motivation -->
<!-- BEOF .stats -->
<section class="content-area white stats">
	<article class="row" role="document">
	<?php
		$f0ID = url_to_postid($feat0);
		if( $f0ID ) :
			$feat0_content = get_post($f0ID);
			$href = $feat0_content->post_name;
	?>
		<figure class="small-12 medium-5 large-6 columns team">
			<?php decision_tree('decision_tree-stats'); ?>
			<div class="relative">
				<img src="<?php echo get_template_directory_uri() . '/img/' . html_entity_decode( $feat0_img );?>" alt="" >
			</div>
			<figcaption class="relative">
				<p class="museo"><?php echo html_entity_decode( $feat0_copy );?></p>
				<button class="button primary success" data-gaq-cat="<?php echo html_entity_decode( $feat0_gaq_cat );?>" data-gaq-label="<?php echo html_entity_decode( $feat0_gaq_lab );?>" data-gaq-action="<?php echo html_entity_decode( $feat0_gaq_act );?>" data-href="<?php echo bloginfo('siteurl') . '/' . $href;?>"><?php echo html_entity_decode( $feat0_btn );?></button>
			</figcaption>
 		</figure>
	<?php endif; ?>
	<?php
		$f1ID = url_to_postid($feat1);
		if( $f1ID ) :
			$feat1_content = get_post($f1ID);
			$href = $feat1_content->post_name;
	?>
		<figure class="small-12 medium-offset-1 medium-5 large-5 columns story">
			<div class="relative">
				<img src="<?php echo get_template_directory_uri() . '/img/' . html_entity_decode( $feat1_img );?>" alt="" >
			</div>
			<figcaption class="relative">
				<p class="museo"><?php echo html_entity_decode( $feat1_copy );?></p>
				<button class="button primary warning" data-gaq-cat="<?php echo html_entity_decode( $feat1_gaq_cat );?>" data-gaq-label="<?php echo html_entity_decode( $feat1_gaq_lab );?>" data-gaq-action="<?php echo html_entity_decode( $feat1_gaq_act );?>" data-href="<?php echo bloginfo('siteurl') . '/' . $href;?>"><?php echo html_entity_decode( $feat1_btn );?></button>
			</figcaption>
		</figure>
	<?php endif; ?>
	</article>
</section>
<!-- EOF .stats -->