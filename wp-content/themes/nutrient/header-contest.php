<?php
/**
 * The template for displaying a contest header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @since Nutrient 1.2
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
	<!--
	<style>
		body.custom-background {
			background-position: top center;
			background-image: url(<?php echo get_template_directory_uri();?>/img/trace.jpg);
		}
	</style>
-->
</head>
<body id="top" <?php body_class();?>>
	<div data-sticky-container>
		<header id="contest_head" class="site-header fixed" data-sticky data-margin-top="0">
			<div class="row">
				<figure class="columns small-5 small-offset-1 medium-4 large-3" rel="logo" data-magellan>
					<a class="block" href="#top">
						<?php nutrient_logo('logo-main','blue'); ?>
					</a>
					<figcaption class="hide"><?php echo html_entity_decode(get_bloginfo('description')); ?></figcaption>
				</figure>
				<div id="site-header-menu" class="top-bar columns small-5 medium-7 large-8">
					<nav id="site-navigation" class="main-navigation top-bar-right menu" aria-label="<?php esc_attr_e( 'Primary Menu', 'nutrient' ); ?>" data-magellan>
						<div class="menu-primary-container">
							<ul id="menu-primary" class="menu">
								<li class="menu-item hide"><a href="#primary">Top</a></li>
								<li class="menu-item"><a href="#welcome">What is it?</a></li>
								<li class="menu-item"><a href="#rules">How does it work?</a></li>
								<li class="menu-item"><a href="#sequence_form">Sign me up!</a></li>
								<li class="menu-item hide"><a href="#footer">Footer</a></li>
							</ul>
						</div>
					</nav><!-- .main-navigation -->
				</div><!-- .site-header-menu -->
			</div><!-- .row -->
		</header><!-- .site-header -->
	</div>
	<div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
			<main id="content" class="site-content off-canvas-content" data-off-canvas-content>