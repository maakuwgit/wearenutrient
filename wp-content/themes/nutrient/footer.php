<?php
/**
 * The template for displaying the footer
 *
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 0.9
 */
?>
				<aside id="secondary" rel="social" class="content-area purple semi space" data-magellan-target="footer">
					<div class="row">
					<?php if ( has_nav_menu( 'secondary' ) ) : ?>
						<nav id="secondary-nav" role="navigation" rel="secondary" class="columns small-12 medium-6">
							<?php
								wp_nav_menu( array(
									'theme_location' 	=> 'secondary',
									'menu_class'     	=> 'menu',
									'container' 			=> false,
									'depth'          	=> 1
								) );
							?>
						</nav>
					<?php elseif ( is_active_sidebar( 'footer-widgets' )  ) : ?>
						<?php dynamic_sidebar( 'footer-widgets' ); ?>
					<?php endif; ?>
						<figure class="columns small-12 medium-3" rel="logo">
							<a class="block" href="<?php echo bloginfo('url'); ?>">
								<?php nutrient_logo('logo-footer','white'); ?>
							</a>
							<figcaption><?php echo html_entity_decode(get_bloginfo('description')); ?></figcaption>
						</figure>
					</div>
				</aside>
			</main><!-- .site-content -->
		</div>
	</div>
	<footer role="contentinfo">
		<div class="row collapse">
			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav id="bottom-bar" rel="footer-nav" class="column small-12 medium-8 large-offset-1">
					<?php
						wp_nav_menu( array(
							'theme_location' 	=> 'footer',
							'menu_class'     	=> 'menu',
							'items_wrap' 			=> nutrient_footer_nav(),
							'container' 			=> false,
							'depth'          	=> 1
						) );
					?>
				</nav>
			<?php endif; ?>
		</div>
		<ul class="show-for-small-only row collapse text-center inline-list no-bullet small-up-2">
			<li class="site-info column"><?php echo get_option('nu_setting_copyright');?></li>
			<li class="site-info column">Copyright <?php echo date("Y");?></li>
		</ul>
	</footer>

<?php wp_footer(); ?>
</body>
</html>
