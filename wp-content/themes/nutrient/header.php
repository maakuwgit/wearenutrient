<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @since Nutrient 0.4
 */

if ( is_home() ) {
	$slug = 'blog';
}else if( is_archive() ) {
	$slug = 'archive';
}else{
	$slug = get_post_field( 'post_name', get_post() );
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body id="top" <?php body_class();?> data-trace="<?php echo get_template_directory_uri() . '/img/trace/trace-' . $slug . '.jpg';?>"  data-trace-mobile="<?php echo get_template_directory_uri() . '/img/trace/trace-' . $slug . '-mobile.jpg';?>" data-magellan-target="top">
	<header id="masthead" class="site-header">
		<div class="row">
			<figure class="columns small-7 medium-4 large-3" rel="logo">
				<a class="block" href="<?php echo bloginfo('url'); ?>">
					<?php nutrient_logo('logo-main','blue'); ?>
				</a>
				<figcaption><?php echo html_entity_decode(get_bloginfo('description')); ?></figcaption>
			</figure>
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<div id="site-header-menu" class="top-bar columns show-for-large large-9 end">
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<nav id="site-navigation" class="main-navigation top-bar-right menu" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>" data-magellan>
						<?php
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_class'     => 'menu',
							 ) );
						?>
					</nav><!-- .main-navigation -->
				<?php endif; ?>
			</div><!-- .site-header-menu -->
		<?php endif; ?>
			<nav class="columns small-5 medium-4 hide-for-large" rel="mobile">
				<button class="button expanded large lilac float-right" data-toggle="mobile_menu" id="menu_btn">
					<span rel="closed">Menu</span><i rel="open" class="fa fa-close hide"></i></button>
			</nav>
		</div><!-- .row -->
	</header><!-- .site-header -->
	<div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
      <div class="off-canvas position-top" id="mobile_menu" data-off-canvas data-position="top">
        <?php if ( has_nav_menu( 'primary' ) ) : ?>
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'vertical menu',
						 ) );
					?><!-- .main-navigation -->
				<?php endif; ?>
      </div>
			<main id="content" class="site-content off-canvas-content" data-off-canvas-content>