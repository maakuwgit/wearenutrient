<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 1
 */

$widgettitle = get_option( 'nu_setting_widgettitle' );
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
<section rel="widgets" class="content-area purple">
	<article class="row relative">
		<ul class="absolute no-bullet" id="widget-triangle">
			<li class="layer" data-depth="0.30">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 511.9 551.1" enable-background="new 0 0 511.9 551.1" xml:space="preserve">
					<g>
						<path fill="#27105a" d="M511.9,143.4L134.8,551.1L0,0L511.9,143.4z"></path>
					</g>
				</svg>
			</li>
		</ul>
		<h4 class="widgets-title column small-12 medium-6 medium-offset-1 end"><?php echo $widgettitle; ?></h4>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</article>
</section>
<?php endif; ?>