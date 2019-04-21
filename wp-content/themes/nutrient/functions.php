<?php
/**
 * Nutrient functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 1
 */

/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'nutrient_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own nutrient_setup() function to override in a child theme.
 *
 * @since Nutrient 0.9
 */
function nutrient_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'nutrient', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	//Infinite scroll for the blog section
	add_theme_support( 'infinite-scroll', array(
		'type' 						=> 'click',
    'container' 			=> 'content',
    'posts_per_page' 	=> 3
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 900, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' 	=> __( 'Primary Menu', 'nutrient' ),
		'secondary' => __( 'Secondary Menu', 'nutrient' ),
		'footer'  	=> __( 'Footer Menu', 'nutrient' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'video',
	) );

}
endif; // nutrient_setup
add_action( 'after_setup_theme', 'nutrient_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Nutrient 0.7
 */
function nutrient_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Prefooter', 'nutrient' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears at the bottom of every post and page, just above the footer.', 'nutrient' ),
		'before_widget' => '<aside id="%1$s" class="widget columns small-12 medium-offset-1 medium-10 large-5 end %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );

	register_sidebar( array(
		'name'          => __( 'Contest Prefooter', 'nutrient' ),
		'id'            => 'sidebar-contest',
		'description'   => __( 'Appears at the bottom of a "contest" templated page, just above the footer.', 'nutrient' ),
		'before_widget' => '<aside id="%1$s" class="widget columns small-12 medium-offset-1 medium-10 large-5 end %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'nutrient' ),
		'id'            => 'footer-widgets',
		'description'   => __( 'Appears in the footer, floated left on desktop and centered on tablet down.', 'nutrient' ),
		'before_widget' => '<aside id="%1$s" class="widget footer columns small-12 medium-9 large-offset-1 large-6 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );

	register_sidebar( array(
		'name'          => __( 'Contest Widgets', 'nutrient' ),
		'id'            => 'contest-widgets',
		'description'   => __( 'Appears in the footer, floated left on desktop and centered on tablet down. ONLY on contest pages', 'nutrient' ),
		'before_widget' => '<aside id="%1$s" class="widget footer columns small-12 medium-9 large-offset-1 large-6 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<p class="widget-title">',
		'after_title'   => '</p>',
	) );
}

add_action( 'widgets_init', 'nutrient_widgets_init' );

if ( ! function_exists( 'nutrient_widget_title' ) ) :
/**
 * @since Nutrient 0.9
 */
function nutrient_widget_title( $title ) {
    $title = str_replace( '__br__', '<br>', $title );
    return $title;
}    
add_filter( 'widget_title', 'nutrient_widget_title' );
endif;

if ( ! function_exists( 'nutrient_footer_nav' ) ) :
function nutrient_footer_nav() {
  // default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
  
  // open the <ul>, set 'menu_class' and 'menu_id' values
  $wrap  = '<ul id="%1$s" class="%2$s">';
  
  // get nav items as configured in /wp-admin/
  $wrap .= '%3$s';
  
  // the static link 
  $wrap .= '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-255 hide-for-small-only">';
  $wrap .= '<p class="site-info float-left">' . get_option('nu_setting_copyright') . '</p><p class="site-info float-left">Copyright ' . date("Y") . '</p>';
 	$wrap .= '</li>';
  
  // close the <ul>
  $wrap .= '</ul>';
  // return the result
  return $wrap;
}

endif;
			
/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );

/**
 * @todo Remove from template with find/replace across files
 */
function nutrient_scripts() {

	// Add Icomoon Fonts, used for our custom icon font stylesheet.
	wp_enqueue_style( 'icons', get_template_directory_uri() . '/css/icons.css', array(), '1.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'nutrient-style', get_stylesheet_uri() );

	// Foundation stylesheet.
	wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/app.css', array(), '6.1' );
	
	// Foundation scripts
	wp_enqueue_script( 'foundation-core', get_template_directory_uri() . '/bower_components/foundation-sites/js/foundation.core.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'foundation-magellan', get_template_directory_uri() . '/bower_components/foundation-sites/js/foundation.magellan.js', array( 'jquery', 'foundation-core' ));
	wp_enqueue_script( 'foundation-equalizer', get_template_directory_uri() . '/bower_components/foundation-sites/js/foundation.equalizer.js', array( 'jquery', 'foundation-core' ));
	wp_enqueue_script( 'foundation-offcanvas', get_template_directory_uri() . '/bower_components/foundation-sites/js/foundation.offcanvas.js', array( 'jquery', 'foundation-core', 'foundation-motion', 'foundation-triggers', 'foundation-mediaQuery' ));
	wp_enqueue_script( 'foundation-accordion', get_template_directory_uri() . '/bower_components/foundation-sites/js/foundation.accordion.js', array( 'jquery', 'foundation-core', 'foundation-motion', 'foundation-keyboard' ));
	wp_enqueue_script( 'foundation-accordionMenu', get_template_directory_uri() . '/bower_components/foundation-sites/js/foundation.accordion.js', array( 'jquery', 'foundation-core', 'foundation-motion', 'foundation-keyboard', 'foundation-nest' ));
	wp_enqueue_script( 'foundation-sticky', get_template_directory_uri() . '/bower_components/foundation-sites/js/foundation.sticky.js', array( 'jquery', 'foundation-core' ));
	wp_enqueue_script( 'foundation-keyboard', get_template_directory_uri() . '/bower_components/foundation-sites/js/foundation.util.keyboard.js', array( 'jquery', 'foundation-core' ));
	wp_enqueue_script( 'foundation-box', get_template_directory_uri() . '/bower_components/foundation-sites/js/foundation.util.box.js', array( 'jquery', 'foundation-core' ));
	wp_enqueue_script( 'foundation-tooltip', get_template_directory_uri() . '/bower_components/foundation-sites/js/foundation.tooltip.js', array( 'jquery', 'foundation-core', 'foundation-mediaQuery', 'foundation-box', 'foundation-triggers' ));
	wp_enqueue_script( 'foundation-nest', get_template_directory_uri() . '/bower_components/foundation-sites/js/foundation.util.nest.js', array( 'jquery', 'foundation-core' ));
	wp_enqueue_script( 'foundation-motion', get_template_directory_uri() . '/bower_components/foundation-sites/js/foundation.util.motion.js', array( 'jquery', 'foundation-core' ));
	wp_enqueue_script( 'foundation-triggers', get_template_directory_uri() . '/bower_components/foundation-sites/js/foundation.util.triggers.js', array( 'jquery', 'foundation-core' ));
	wp_enqueue_script( 'foundation-mediaQuery', get_template_directory_uri() . '/bower_components/foundation-sites/js/foundation.util.mediaQuery.js', array( 'jquery', 'foundation-core' ));

	// SmoothState for seemless AJAX loaded pages
	wp_enqueue_script( 'smoothState', get_template_directory_uri() . '/js/jquery.smoothState.min.js', array( 'jquery' ), '1', true );

	// Matt Wagerfield Parallax
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.js', array( 'jquery' ), '1', true );

	// Waypointing
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array( 'jquery' ), '1', true );

	// ScrollMagic
	wp_enqueue_script( 'tweenmax', get_template_directory_uri() . '/js/plugins/greensock/TweenMax.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'scrollmagic', get_template_directory_uri() . '/js/ScrollMagic.min.js', array( 'jquery', 'tweenmax' ), '1', true );
	wp_enqueue_script( 'gsap', get_template_directory_uri() . '/js/plugins/animation.gsap.min.js', array( 'jquery', 'scrollmagic' ), '1', true );
	wp_enqueue_script( 'velocity', get_template_directory_uri() . '/js/plugins/animation.velocity.min.js', array( 'jquery', 'scrollmagic' ), '1', true );
	wp_enqueue_script( 'indicators', get_template_directory_uri() . '/js/plugins/debug.addIndicators.min.js', array( 'jquery', 'scrollmagic' ), '1', true );

	// Global JS
	wp_enqueue_script( 'global', get_template_directory_uri() . '/js/functions.js', array(  'jquery', 'smoothState', 'foundation-core', 'foundation-equalizer', 'waypoints'), '20160522', true );
	
	// Frontpage

	if (is_front_page()) {
		wp_enqueue_script( 'home_shared', get_template_directory_uri() . '/js/home_shared.js', array( 'jquery' ), '1', true );
		if (is_page_template("template-home_w_video.php")) {
			// use one with video
			wp_enqueue_script( 'home_w_video', get_template_directory_uri() . '/js/home_w_video.js', array( 'jquery' ), '1', true );
		} else {
			// without video
			wp_enqueue_script( 'home', get_template_directory_uri() . '/js/home.js', array( 'jquery' ), '1', true );
		}
	}

	// Our Approach
	if (is_page_template("template-our_approach.php")) {
		wp_enqueue_script( 'approach', get_template_directory_uri() . '/js/our-approach.js', array( 'jquery' ), '10', true );
	}

	// Our Services
	if (is_page_template("template-our_services.php")) {
		wp_enqueue_script( 'services', get_template_directory_uri() . '/js/our-services.js', array( 'jquery' ), '3', true );
	}

	// Our Approach
	if (is_home()) {
		wp_enqueue_script( 'obsessions', get_template_directory_uri() . '/js/blog.js', array( 'jquery' ), '1', true );
	}
	
	//Single Post
	if (is_single()) {
		wp_enqueue_script( 'obsessions-single', get_template_directory_uri() . '/js/single.js', array( 'jquery' ), '1', true );
	}

	// Contest
	if (is_page_template("template-contest.php")) {
		wp_enqueue_style( 'contest-style', get_template_directory_uri() . '/css/contest.css', array(), '0.1' );
	}
}
add_action( 'wp_enqueue_scripts', 'nutrient_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Nutrient 0.9
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function nutrient_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'nutrient_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return false;//$sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {/*
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}*/
	return $attr;
}
//add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies roles to add a level below Super Admin that can edit their profile and other profiles only
 * Removed extraneous blog roles
 *
 * @since Nutrient 0.1
 *
 */
function nutrient_roles() {
	//Can do anything with users
	add_role( 'master_user', 
						'Super User', 
						array( 	'read' => true, 
										'create_users' => true,
										'delete_users' => true,
										'edit_users' => true,
										'list_users' => true,
										'promote_users' => true,
										'remove_users' => true ) );
	//Replaces the "Subscriber" role
	add_role( 'general_user', 
						'User', 
						array( 	'read' => true ) );
}
/*Dev note: this needs a different hook. fails on first install, because you're not actually CHANGING themes*/
add_action('switch_theme', 'nutrient_roles');


/**
* Custom post types
*
* @since Nutrient 0.9
* @author MaakuW
*/
function nutrient_register_posttypes() {
	//Redefine the labelling for the default "Media" type so we can use the name for another section
	global $wp_post_types;
	$a_labels = &$wp_post_types['attachment']->labels;
	$a_labels->name = 'Assets';
	$a_labels->singular_name = 'Asset';
	$a_labels->add_new = 'Add Asset';
	$a_labels->add_new_item = 'Add Asset';
	$a_labels->edit_item = 'Edit Asset';
	$a_labels->new_item = 'Asset';
	$a_labels->view_item = 'View Asset';
	$a_labels->search_items = 'Search Assets';
	$a_labels->not_found = 'No Asset found';
	$a_labels->not_found_in_trash = 'No Asset found in Trash';

	//Redefine the labelling for the default "Post" type so we can use it, instead, for "Thoughts"
	$p_labels = &$wp_post_types['post']->labels;
	$p_labels->name = 'Thoughts';
	$p_labels->singular_name = 'Thought';
	$p_labels->add_new = 'Add Thought';
	$p_labels->add_new_item = 'Add Thought';
	$p_labels->edit_item = 'Edit Thought';
	$p_labels->new_item = 'Thought';
	$p_labels->view_item = 'View Thought';
	$p_labels->search_items = 'Search Thoughts';
	$p_labels->not_found = 'No Thought found';
	$p_labels->not_found_in_trash = 'No Thought found in Trash';

	//Adding Services (more robust than we need, likely)
	$labels = array(
		'name'               => _x( 'Services', 'services general name', 'nutrient' ),
		'singular_name'      => _x( 'Service', 'services type singular name', 'nutrient' ),
		'add_new'            => _x( 'Add New', 'services', 'nutrient' ),
		'add_new_item'       => __( 'Add New Service', 'nutrient' ),
		'edit_item'          => __( 'Edit Service', 'nutrient' ),
		'new_item'           => __( 'New Service', 'nutrient' ),
		'all_items'          => __( 'All Services', 'nutrient' ),
		'view_item'          => __( 'View Service', 'nutrient' ),
		'search_items'       => __( 'Search Services', 'nutrient' ),
		'not_found'          => __( 'Nothing found', 'nutrient' ),
		'not_found_in_trash' => __( 'Nothing found in Trash', 'nutrient' ),
		'parent_item_colon'  => '',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'can_export'         => true,
		'show_in_nav_menus'  => true,
		'query_var'          => true,
		'has_archive'        => true,
		'rewrite'            => apply_filters( 'nutrient_services_posttype_rewrite_args', array(
			'slug'       => 'service',
			'with_front' => true,
		) ),
		'capability_type'    => 'post',
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'excerpt', 'page-attributes' ),
	);

	register_post_type( 'service', apply_filters( 'nutrient_services_posttype_args', $args ) );
}
add_action( 'init', 'nutrient_register_posttypes', 0 );

/**
 * Simplifies the post menu names in the admin so they make sense with our theme
 *
 * @since Nutrient 0.9
 * @author MaakuW
 *
 */
function nutrient_rename_post_menus() {
	global $menu, $submenu;
	$menu[5][0] = 'Thoughts';
	$menu[10][0] = 'Assets';
	$submenu['edit.php'][5][0] = 'Thoughts';
	$submenu['edit.php'][10][0] = 'Add Thought';
	$submenu['edit.php'][16][0] = 'Thought Tags';
	$submenu['edit.php'][10][0] = 'Assets';
	echo '';
}
add_action( 'admin_menu', 'nutrient_rename_post_menus' );

/**
 * Creates a shortcode for anchors that are relative to the server automatically
 *
 * @since Nutrient 1.0
 *
 * @param array $atts Attributes for the anchor.
 * @author MaakuW
 * @return array $content what the anchor tag wraps.
 */
function local_anchor( $atts, $content = "" ) {
	$atts = shortcode_atts( array(
		'id' 			=> '',
		'href' 		=> '#',
		'slug' 		=> '',
		'title' 	=> '',
		'class' 	=> '',
		'target' 	=> '',
		'rel' 		=> ''
	), $atts, 'local_anchor' );
	if ( $atts['id'] != '' ) $id = ' id="' . $atts['id'] . '"';
	if ( $atts['slug'] != '' ) $slug = $atts['slug'] . '/';
	if ( $atts['href'] != '#' ) $href = home_url($slug . $atts['href']);
	if ( $atts['title'] != '' ) $title = ' title="' . $atts['title'] . '"';
	if ( $atts['class'] != '' ) $class = ' class="' . $atts['class'] . '"';
	if ( $atts['target'] != '' ) $target = ' target="' . $atts['target'] . '"';
	if ( $atts['rel'] != '' ) $rel = ' rel="' . $atts['rel'] . '"';
	if($content){
		return '<a href="' . $href .'"' . $id . $class . $title . $target . $rel .'>' . $content . '</a>';
	}else{
		return $href;
	}
}
add_shortcode( 'local_anchor', 'local_anchor' );

/**
 * Creates a shortcode for anchors that are relative to the server automatically
 *
 * @since Nutrient 1.0
 *
 * @param array $atts Attributes for the anchor.
 * @author MaakuW
 * @return array $content what the anchor tag wraps.
 */
function nu_social_twitter( $atts, $content = "" ) {
	$href = get_option('nu_setting_social_twitter_href');
	return '<a class="left" href="' . $href .'" target="_blank"><em class="fa fa-twitter"></em></a>';
}
add_shortcode( 'nu_social_twitter', 'nu_social_twitter' );

function nu_social_facebook( $atts, $content = "" ) {
	$href = get_option('nu_setting_social_facebook_href');
	return '<a class="left" href="' . $href .'" target="_blank"><em class="fa fa-facebook"></em></a>';
}
add_shortcode( 'nu_social_facebook', 'nu_social_facebook' );

function nu_social_instagram( $atts, $content = "" ) {
	$href = get_option('nu_setting_social_instagram_href');
	return '<a class="left" href="' . $href .'" target="_blank"><em class="fa fa-instagram"></em></a>';
}
add_shortcode( 'nu_social_instagram', 'nu_social_instagram' );

function nu_social_linkedin( $atts, $content = "" ) {
	$href = get_option('nu_setting_social_linkedin_href');
	return '<a class="left" href="' . $href .'" target="_blank"><em class="fa fa-linkedin"></em></a>';
}
add_shortcode( 'nu_social_linkedin', 'nu_social_linkedin' );

/**
* Admin Redesign
*
* @since Nutrient 0.1
* @author MaakuW
* @todo This should hook into the admin so this info can be changes via WP. They should also be updated
*/
function nutrient_admin_color_schemes() {  
    //Get the theme directory  
    $theme_dir = get_template_directory_uri();  

    //Nutrient Custom Colors
    wp_admin_css_color( 'nutrient', __( 'Nutrient' ),  
        $theme_dir . '/css/admin.css',  
        array( '#000000', '#666666', '#333333', '#ffffff' )  
    );
}
add_action('admin_init', 'nutrient_admin_color_schemes');

function nutrient_default_admin_color($user_id) {  
    $args = array(  
        'ID' => $user_id,  
        'admin_color' => 'nutrient'  
    );  
    wp_update_user( $args );  
}  

add_action('user_register', 'nutrient_default_admin_color');


/**
* Removes the auto paragraphs, which can throw off the grid and cause nested paragraphs
* and random, unnecessary br tag inserts
*
* @since Nutrient 1
* @author MaakuW
*/
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


/**
 * Adds SEO meta tags to the head tag content
 *
 * @since Nutrient 1
 * @author MaakuW
 */
function nu_seo_tags() {
	$obj = get_queried_object();
	if ($obj) {
		$id = $obj->ID;
		$seo_description = get_post_meta( $id, '_nutrient_seo_description', true );

		if( $seo_description ) {
			echo '<meta property="description" content="' . $seo_description . '">';
			echo '<meta name="twitter:description" content="' . $seo_description . '">';
			echo '<meta property="og:description" content="' . $seo_description . '">';
		}
	}
	echo '<meta property="og:locale" content="en_US">';
	echo '<meta property="og:type" content="article">';
	echo '<meta property="og:title" content="' . get_the_title() . '">';
	echo '<meta property="og:url" content="' . get_bloginfo('siteurl') . '">';
	echo '<meta property="og:site_name" content="' . get_bloginfo('sitename') . '">';
	echo '<meta name="twitter:card" content="summary">';
	echo '<meta name="twitter:title" content="' . get_the_title() . '">';
	echo '<script>';
  echo "     (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');";

	echo ' ga("create", "UA-83171634-1", "auto");';
  echo ' ga("send", "pageview");';
  echo '</script>';
  
	/*Dev Note: need to put a Setting in for this (below)*/
	//echo '<meta name="twitter:image" content="http://zyflocr.wpengine.com/wp-content/uploads/connect-bug1.png">';
	
}
add_action( 'wp_head', 'nu_seo_tags', 0 );

/**
 * Adds a hook for meta box(es) to pages post-type.
 *
 * @since Nutrient 0.9
 *
 */
function nutrient_add_post_meta_box() {
	$post_id 	= get_the_ID();
	$template = get_post_meta( $post_id, '_wp_page_template', true );
	$type 		= get_post_type();

	//All Types
	add_meta_box( 'nutrient_header_copy_meta_box', __( 'Header Text', 'nutrient' ), 'nutrient_header_copy', ['page','post'], 'normal', 'high' );
	add_meta_box( 'nutrient_seo_description_meta_box', __( 'Meta Description', 'nutrient' ), 'nutrient_seo_description', ['page','post'], 'normal', 'high' );

	//Post Boxes
	add_meta_box( 'nutrient_header_color_meta_box', __( 'Header Color', 'nutrient' ), 'nutrient_header_color', 'post', 'side', 'high' );
	add_meta_box( 'nutrient_use_icon_meta_box', __( 'Use Icon', 'nutrient' ), 'nutrient_use_icon', 'post', 'side', 'high' );
	add_meta_box( 'nutrient_has_download_meta_box', __( 'Downloadable Content', 'nutrient' ), 'nutrient_has_download', 'post', 'side', 'high' );

	//Template Boxes
	if ( $template == 'template-our_services.php') {
		//Template 'Services'
		add_meta_box( 'nutrient_template_services_options_meta_box', __( 'Copy Options', 'nutrient' ), 'nutrient_template_services_options', 'page', 'normal' );
	}else if( $template == 'template-our_approach.php' ) {
		//Template 'Our Approach'
		add_meta_box( 'nutrient_template_approach_feature0_meta_box', __( 'Featured Page Options', 'nutrient' ), 'nutrient_template_approach_feature0', 'page', 'normal' );
		add_meta_box( 'nutrient_template_approach_feature1_meta_box', __( 'Featured Post Options', 'nutrient' ), 'nutrient_template_approach_feature1', 'page', 'normal' );
		add_meta_box( 'nutrient_template_approach_hm_options_meta_box', __( 'Section Heading Options', 'nutrient' ), 'nutrient_template_approach_hm_options', 'page', 'normal' );
		add_meta_box( 'nutrient_template_approach_dvm_options_meta_box', __( 'Decision Section Options', 'nutrient' ), 'nutrient_template_approach_dvm_options', 'page', 'normal' );
		add_meta_box( 'nutrient_template_approach_bb_options_meta_box', __( 'Brand Blueprint Section Options', 'nutrient' ), 'nutrient_template_approach_bb_options', 'page', 'normal' );
		add_meta_box( 'nutrient_template_approach_sp_options_meta_box', __( 'Healthy Motivation Section Options', 'nutrient' ), 'nutrient_template_approach_sp_options', 'page', 'normal' );
	}else if( $type == 'services' ) {
		//Services
		add_meta_box( 'nutrient_services_options_meta_box', __( 'Background Circles', 'nutrient' ), 'nutrient_services_options', 'services', 'side', 'high' );
	}else if ( get_option('page_for_posts') != $post_id && ( $template == 'default' || $template == 'template-home_w_video.php' ) ) {
		//Template 'Homepage'/frontpage
		add_meta_box( 'nutrient_home_options_meta_box', __( 'Homepage Options', 'nutrient' ), 'nutrient_home_options', 'page', 'normal' );
	}

}
add_action( 'add_meta_boxes', 'nutrient_add_post_meta_box' );

/**
 * This callback adds the markup for the Header Copy meta box
 *
 * @since Nutrient 1
 *
 */
function nutrient_header_copy( $post ) {
	$post_id 	= get_the_ID();
	$header_copy 	= get_post_meta( $post_id, '_nutrient_header_copy', true );

	wp_nonce_field( basename( __FILE__ ), 'nutrient_settings_nonce' );?>

	<p>
		<input name="nutrient_header_copy" id="nutrient_header_copy" style="width: 100%;" value="<?php echo $header_copy; ?>">
	</p>
<?php
}

/**
 * This callback adds the markup for the Description Meta Tag meta box
 *
 * @since Nutrient 1
 *
 */
function nutrient_seo_description( $post ) {
	$post_id 	= get_the_ID();
	$seo_description 	= get_post_meta( $post_id, '_nutrient_seo_description', true );

	wp_nonce_field( basename( __FILE__ ), 'nutrient_settings_nonce' );?>

	<p>
		<textarea name="nutrient_seo_description" id="nutrient_seo_description" style="width: 100%;" col="10"><?php echo $seo_description; ?></textarea>
	</p>
<?php
}

/**
 * This callback adds the markup for the Header Color meta box
 *
 * @since Nutrient 0.9
 *
 */
function nutrient_header_color( $post ) {
	$post_id 	= get_the_ID();
	$selected 	= get_post_meta( $post_id, '_nutrient_header_color', true );

	wp_nonce_field( basename( __FILE__ ), 'nutrient_settings_nonce' );?>

	<p><small>Would you like to use the default title, or create your own?</small></p>
	<p>
	  <select name="nutrient_header_color" id="nutrient_header_color" style="margin: 0;width: 100%;">
	  	<option value="">Aquamarine</option>
	  	<option value="violet-blue"<?php if($selected == 'violet-blue') echo ' selected';?>>Violet Blue</option>
	  	<option value="orange-yellow"<?php if($selected == 'orange-yellow') echo ' selected';?>>Orange-Yellow</option>
	  	<option value="red-orange"<?php if($selected == 'red-orange') echo ' selected';?>>Red-Orange</option>
	  	<option value="pink"<?php if($selected == 'pink') echo ' selected';?>>Pink</option>
	  </select>
	</p>
<?php
}

/**
 * This callback adds the markup for the Use Icon meta box
 *
 * @since Nutrient 0.8
 *
 */
function nutrient_use_icon( $post ) {
	$post_id 	= get_the_ID();
	$selected 	= get_post_meta( $post_id, '_nutrient_use_icon', true );

	wp_nonce_field( basename( __FILE__ ), 'nutrient_settings_nonce' );?>

	<p><small>Would you like to use the default title, or create your own?</small></p>
	<p>
	  <select name="nutrient_use_icon" id="nutrient_use_icon" style="margin: 0;width: 100%;">
	  	<option value="">No Icon</option>
	  	<option value="exclaimation"<?php if($selected == 'exclaimation') echo ' selected';?>>Exclaimation</option>
	  	<option value="stroller"<?php if($selected == 'stroller') echo ' selected';?>>Stroller</option>
			<option value="timer"<?php if($selected == 'timer') echo ' selected';?>>Timer</option>
	  </select>
	</p>
<?php
}
/**
 * This callback adds the markup for the Has Downloadable PDF meta box
 *
 * @since Nutrient 1
 *
 */
function nutrient_has_download( $post ) {
	$post_id 	= get_the_ID();
	$download_link 	= get_post_meta( $post_id, '_nutrient_download_link', true );

	wp_nonce_field( basename( __FILE__ ), 'nutrient_settings_nonce' );?>

	<p><small>If you would like to include a downloadable PDF that corresponds to this Thought, paste the full name below?</small></p>
	<p>
		<input name="nutrient_download_link" id="nutrient_download_link" style="width: 100%;" value="<?php echo $download_link; ?>">
	</p>
<?php
}

/**
 * This callback adds the markup for the Services Options meta box
 *
 * @since Nutrient 0.9
 *
 */
function nutrient_services_options( $post ) {
	$post_id 	= get_the_ID();
	$selected = get_post_meta( $post_id, '_nutrient_services_header_color', true );

	wp_nonce_field( basename( __FILE__ ), 'nutrient_settings_nonce' );?>

	<p>
	  <select name="nutrient_services_header_color" id="nutrient_services_header_color" style="margin: 0;width: 100%;">
	  	<option value="">Default (black)</option>
	  	<option value="5eb5a6"<?php if($selected == '5eb5a6') echo ' selected';?>>Seafoam</option>
	  	<option value="5b81e0"<?php if($selected == '5b81e0') echo ' selected';?>>Cerulean</option>
			<option value="dd84b4"<?php if($selected == 'dd84b4') echo ' selected';?>>Magenta</option>
	  </select>
	</p>
<?php
}

/**
 * This callback adds the markup for the Template Type Services Options meta box
 *
 * @since Nutrient 0.9
 *
 */
function nutrient_template_services_options( $post ) {
	$post_id 	= get_the_ID();
	$header = get_post_meta( $post_id, '_nutrient_services_header', true );
	$copy = get_post_meta( $post_id, '_nutrient_services_copy', true );

	wp_nonce_field( basename( __FILE__ ), 'nutrient_settings_nonce' );?>

	<p>
		<label><b>Heading</b><br>
			<input name="nutrient_services_header" id="nutrient_services_header" style="width: 100%;" value="<?php echo $header; ?>">
		</label>
	</p>
	<p>
		<label><b>Copy</b><br>
			<textarea  name="nutrient_services_copy" id="nutrient_services_copy" id="nutrient_services_copy" id="nutrient_banner_copy" style="width: 100%;" rows="10"><?php echo $copy; ?></textarea>
		</label>
	</p>
<?php
}

/**
 * This callback adds the markup for the Template Type Services Featured Page Options meta boxes
 *
 * @since Nutrient 1
 *
 */
function nutrient_template_approach_feature0( $post ) {
	$post_id 		= get_the_ID();
	$selected0 	= get_post_meta( $post_id, '_nutrient_template_approach_feat0', true );
	$btn0 			= get_post_meta( $post_id, '_nutrient_template_approach_feat0_btn', true );
	$act0 			= get_post_meta( $post_id, '_nutrient_template_approach_feat0_gaq_act', true );
	$cat0 			= get_post_meta( $post_id, '_nutrient_template_approach_feat0_gaq_cat', true );
	$lab0 			= get_post_meta( $post_id, '_nutrient_template_approach_feat0_gaq_lab', true );
	$copy0 			= get_post_meta( $post_id, '_nutrient_template_approach_feat0_copy', true );
	$img0 			= get_post_meta( $post_id, '_nutrient_template_approach_feat0_img', true );

	wp_nonce_field( basename( __FILE__ ), 'nutrient_settings_nonce' );?>

	<p>
		<label><b>Page</b>
		  <select name="nutrient_template_approach_feat0" id="nutrient_template_approach_feat0" style="margin: 0;width: 100%;">
		  <?php
		  	$pages = get_pages(); 
			  foreach ( $pages as $page ) {
			  	$val = get_page_link( $page->ID );
			  	$option = '<option value="' . $val . '"';
			  	if($selected0 == $val) $option .=' selected';
			  	$option .= '>';
					$option .= $page->post_title;
					$option .= '</option>';
					echo $option;
			  }
			?>
		  </select>
		</label>
	</p>
	<p><small>Which page would you like to use for the first feature?</small></p>
	<p>
		<label><b>Image</b><br>
			<input name="nutrient_template_approach_feat0_img" id="nutrient_template_approach_feat0_img" style="width: 100%;" value="<?php echo $img0; ?>">
		</label>
	</p>
	<p>
		<label><b>Excerpt</b><br>
			<input name="nutrient_template_approach_feat0_copy" id="nutrient_template_approach_feat0_copy" style="width: 100%;" value="<?php echo $copy0; ?>">
		</label>
	</p>
	<p>
		<label><b>Button Text</b><br>
			<input name="nutrient_template_approach_feat0_btn" id="nutrient_template_approach_feat0_btn" style="width: 100%;" value="<?php echo $btn0; ?>">
		</label>
	</p>
	<p>
		<label><b>Tracking Action</b><br>
			<input name="nutrient_template_approach_feat0_gaq_act" id="nutrient_template_approach_feat0_gaq_act" style="width: 100%;" value="<?php echo $act0; ?>">
		</label>
	</p>
	<p>
		<label><b>Tracking Category</b><br>
			<input name="nutrient_template_approach_feat0_gaq_cat" id="nutrient_template_approach_feat0_gaq_cat" style="width: 100%;" value="<?php echo $cat0; ?>">
		</label>
	</p>
	<p>
		<label><b>Tracking Label</b><br>
			<input name="nutrient_template_approach_feat0_gaq_lab" id="nutrient_template_approach_feat0_gaq_lab" style="width: 100%;" value="<?php echo $lab0 ?>">
		</label>
	</p>
<?php
}

/**
 * This callback adds the markup for the Template Type Services Featured Post Options meta boxes
 *
 * @since Nutrient 1
 *
 */
function nutrient_template_approach_feature1( $post ) {
	$post_id 		= get_the_ID();
	$selected1 	= get_post_meta( $post_id, '_nutrient_template_approach_feat1', true );
	$btn1 			= get_post_meta( $post_id, '_nutrient_template_approach_feat1_btn', true );
	$act1 			= get_post_meta( $post_id, '_nutrient_template_approach_feat1_gaq_act', true );
	$cat1 			= get_post_meta( $post_id, '_nutrient_template_approach_feat1_gaq_cat', true );
	$lab1 			= get_post_meta( $post_id, '_nutrient_template_approach_feat1_gaq_lab', true );
	$copy1 			= get_post_meta( $post_id, '_nutrient_template_approach_feat1_copy', true );
	$img1 			= get_post_meta( $post_id, '_nutrient_template_approach_feat1_img', true );

	wp_nonce_field( basename( __FILE__ ), 'nutrient_settings_nonce' );?>

	<p>
		<label><b>Post</b>
		  <select name="nutrient_template_approach_feat1" id="nutrient_template_approach_feat1" style="margin: 0;width: 100%;">
		  <?php 
		  	$posts = get_posts();
			  foreach ( $posts as $page ) {
			  	$val = get_page_link( $page->ID );
			  	$option = '<option value="' . $val . '"';
			  	if($selected1 == $val) $option .= ' selected';
			  	$option .= '>';
					$option .= $page->post_title;
					$option .= '</option>';
					echo $option;
			  }
			?>
		  </select>
		 </label>
	</p>
	<p><small>Which post would you like to use for the second feature?</small></p>
	<p>
		<label><b>Image</b><br>
			<input name="nutrient_template_approach_feat1_img" id="nutrient_template_approach_feat1_img" style="width: 100%;" value="<?php echo $img1; ?>">
		</label>
	</p>
	<p>
		<label><b>Excerpt</b><br>
			<input name="nutrient_template_approach_feat1_copy" id="nutrient_template_approach_feat1_copy" style="width: 100%;" value="<?php echo $copy1; ?>">
		</label>
	</p>
	<p>
		<label><b>Button Text</b><br>
			<input name="nutrient_template_approach_feat1_btn" id="nutrient_template_approach_feat1_btn" style="width: 100%;" value="<?php echo $btn1; ?>">
		</label>
	</p>
	<p>
		<label><b>Tracking Action</b><br>
			<input name="nutrient_template_approach_feat1_gaq_act" id="nutrient_template_approach_feat1_gaq_act" style="width: 100%;" value="<?php echo $act1; ?>">
		</label>
	</p>
	<p>
		<label><b>Tracking Category</b><br>
			<input name="nutrient_template_approach_feat1_gaq_cat" id="nutrient_template_approach_feat1_gaq_cat" style="width: 100%;" value="<?php echo $cat1; ?>">
		</label>
	</p>
	<p>
		<label><b>Tracking Label</b><br>
			<input name="nutrient_template_approach_feat1_gaq_lab" id="nutrient_template_approach_feat1_gaq_lab" style="width: 100%;" value="<?php echo $lab1 ?>">
		</label>
	</p>
<?php
}

/**
 * This callback adds the markup for the Template Type Services Options meta boxes
 *
 * @since Nutrient 0.9
 *
 */
function nutrient_template_approach_hm_options( $post ) {
	$post_id 	= get_the_ID();
	$hm_header 		= get_post_meta( get_the_ID(), '_nutrient_hm_header', true );
	$hm_subheader = get_post_meta( get_the_ID(), '_nutrient_hm_subheader', true );
	
	if( $hm_header == '' ) $hm_header = 'Healthy Motivation';
	if( $hm_subheader == '' ) $hm_subheader = 'Uncover hidden truths. Build your story. Motivate customer action.';
	
	wp_nonce_field( basename( __FILE__ ), 'nutrient_settings_nonce' );?>

	<p>
		<label><b>Heading</b><br>
			<input name="nutrient_hm_header" id="nutrient_hm_header" style="width: 100%;" value="<?php echo $hm_header; ?>">
		</label>
	</p>
	<p>
		<label><b>Subheading</b><br>
			<textarea name="nutrient_hm_subheader" id="nutrient_hm_subheader" style="width: 100%;" rows="10"><?php echo $hm_subheader; ?></textarea>
		</label>
	</p>
<?php
}
function nutrient_template_approach_dvm_options( $post ) {
	$post_id 	= get_the_ID();
	$dvm_header 	= get_post_meta( get_the_ID(), '_nutrient_dvm_header', true );
	$dvm_copy 		= get_post_meta( get_the_ID(), '_nutrient_dvm_copy', true );
	
	if( $dvm_header == '' ) $dvm_header = 'decision &amp; vulnerability mapping';
	if( $dvm_copy == '' ) $dvm_copy = 'We analyze the brand, product category and target customer. Using a combination of research techniques and proprietary tools, we uncover the deep-seated anxieties that really drive your customers\'&nbsp;behavior.';
	
	wp_nonce_field( basename( __FILE__ ), 'nutrient_settings_nonce' );?>

	<p>
		<label><b>Heading</b><br>
			<input name="nutrient_dvm_header" id="nutrient_dvm_header" style="width: 100%;" value="<?php echo $dvm_header; ?>">
		</label>
	</p>
	<p>
		<label><b>Copy</b><br>
			<textarea name="nutrient_dvm_copy" id="nutrient_dvm_copy" style="width: 100%;" rows="10"><?php echo $dvm_copy; ?></textarea>
		</label>
	</p>
<?php
}
function nutrient_template_approach_bb_options( $post ) {
	$post_id 	= get_the_ID();
	$bb_header 		= get_post_meta( get_the_ID(), '_nutrient_bb_header', true );
	$bb_copy 			= get_post_meta( get_the_ID(), '_nutrient_bb_copy', true );

	if( $bb_header == '' ) $bb_header = 'brand blueprint';
	if( $bb_copy == '' ) $bb_copy = 'We develop an expression of the brand\'s best self in a way that resolves the insecurities we uncovered during Decision &amp; Vulnerability Mapping. This alignment is the basis for your brand story: a brand uniquely qualified to resolve those hidden&nbsp;insecurities.';
	
	wp_nonce_field( basename( __FILE__ ), 'nutrient_settings_nonce' );?>

	<p>
		<label><b>Heading</b><br>
			<input name="nutrient_bb_header" id="nutrient_bb_header" style="width: 100%;" value="<?php echo $bb_header; ?>">
		</label>
	</p>
	<p>
		<label><b>Copy</b><br>
			<textarea name="nutrient_bb_copy" id="nutrient_bb_copy" style="width: 100%;" rows="10"><?php echo $bb_copy; ?></textarea>
		</label>
	</p>
<?php
}
function nutrient_template_approach_sp_options( $post ) {
	$post_id 	= get_the_ID();
	$sp_header 		= get_post_meta( get_the_ID(), '_nutrient_sp_header', true );
	$sp_copy 			= get_post_meta( get_the_ID(), '_nutrient_sp_copy', true );

	if( $sp_header == '' ) $sp_header = '<strong>Healthy Motivation<sup>&trade;</sup></strong><br>Strategic Platform';
	if( $sp_copy == '' ) $sp_copy = 'The result of this process is an actionable strategic platform and bold creative ideas you can use to take your brand off the shelf and into the cart.';

	
	wp_nonce_field( basename( __FILE__ ), 'nutrient_settings_nonce' );?>

	<p>
		<label><b>Heading</b><br>
			<input name="nutrient_sp_header" id="nutrient_sp_header" style="width: 100%;" value="<?php echo $sp_header; ?>">
		</label>
	</p>
	<p>
		<label><b>Copy</b><br>
			<textarea name="nutrient_sp_copy" id="nutrient_sp_copy" style="width: 100%;" rows="10"><?php echo $sp_copy; ?></textarea>
		</label>
	</p>
<?php
}

/**
 * This callback adds the markup for the Home Options meta box
 *
 * @since Nutrient 0.9
 *
 */
function nutrient_home_options( $post ) {
	$post_id 	= get_the_ID();

	/* Banner */
	$banner_copy 					= esc_attr( get_post_meta( get_the_ID(), '_nutrient_banner_copy', true ) );
	$banner_btn_copy 			= esc_attr( get_post_meta( get_the_ID(), '_nutrient_banner_btn_copy', true ) );
	$banner_btn_href 			= esc_attr( get_post_meta( get_the_ID(), '_nutrient_banner_btn_href', true ) );
	$banner_btn_gaq_act 	= esc_attr( get_post_meta( get_the_ID(), '_nutrient_banner_btn_gaq_act', true ) );
	$banner_btn_gaq_cat 	= esc_attr( get_post_meta( get_the_ID(), '_nutrient_banner_btn_gaq_cat', true ) );
	$banner_btn_gaq_lab 	= esc_attr( get_post_meta( get_the_ID(), '_nutrient_banner_btn_gaq_lab', true ) );

	if ( $banner_copy == '' ) $banner_copy = esc_attr( '<p>Since these decisions are unique, a new approach is needed for&nbsp;reaching them. Get there with <strong>Healthy Motivation<sup>&trade;</sup></strong>.</p>' );
	if ( $banner_btn_copy == '' ) $banner_btn_copy = esc_attr( 'Get inside our heads' );
	if ( $banner_btn_href == '' ) $banner_btn_href = esc_attr( '/our-approach/' );

	/* Our Approach */
	$approach_heading 		= esc_attr( get_post_meta( get_the_ID(), '_nutrient_approach_heading', true ) );
	$approach_copy 				= esc_attr( get_post_meta( get_the_ID(), '_nutrient_approach_copy', true ) );
	$approach_btn_copy 		= esc_attr( get_post_meta( get_the_ID(), '_nutrient_approach_btn_copy', true ) );
	$approach_btn_href 		= esc_attr( get_post_meta( get_the_ID(), '_nutrient_approach_btn_href', true ) );
	$approach_btn_gaq_act = esc_attr( get_post_meta( get_the_ID(), '_nutrient_approach_btn_gaq_act', true ) );
	$approach_btn_gaq_cat = esc_attr( get_post_meta( get_the_ID(), '_nutrient_approach_btn_gaq_cat', true ) );
	$approach_btn_gaq_lab = esc_attr( get_post_meta( get_the_ID(), '_nutrient_approach_btn_gaq_lab', true ) );
	
	if ( $approach_heading == '' ) $approach_heading = esc_attr( 'We are nutrient' );
	if ( $approach_copy == '' ) $approach_copy = esc_attr( '<p>Nutrient is a creative consultancy built around <strong>Healthy Motivation<sup>&trade;</sup></strong>, the foundation of everything we do. Health &amp; wellness decisions are complex, personal and make people feel vulnerable. Uncovering these underlying vulnerabilities, we create strategies and experiences that reach customers at a critical point of need and draw them in with stories that resonate.</p>' );
	if ( $approach_btn_copy == '' ) $approach_btn_copy = esc_attr( 'See how we get&nbsp;it done' );
	if ( $approach_btn_href == '' ) $approach_btn_href = esc_attr( '/our-approach/#healthy-motivation' );
	if ( $approach_btn_gaq_act == '' ) $approach_btn_gaq_act = '';
	if ( $approach_btn_gaq_cat == '' ) $approach_btn_gaq_cat = '';
	if ( $approach_btn_gaq_lab == '' ) $approach_btn_gaq_lab = '';

	/* Fresh Thinking */
	$fresh_heading 				= esc_attr( get_post_meta( get_the_ID(), '_nutrient_fresh_heading', true ) );
	$fresh_copy 					= esc_attr( get_post_meta( get_the_ID(), '_nutrient_fresh_copy', true ) );
	$fresh_btn_copy 			= esc_attr( get_post_meta( get_the_ID(), '_nutrient_fresh_btn_copy', true ) );
	$fresh_btn_href 			= esc_attr( get_post_meta( get_the_ID(), '_nutrient_fresh_btn_href', true ) );
	$fresh_btn_gaq_act 		= esc_attr( get_post_meta( get_the_ID(), '_nutrient_fresh_btn_gaq_act', true ) );
	$fresh_btn_gaq_cat 		= esc_attr( get_post_meta( get_the_ID(), '_nutrient_fresh_btn_gaq_cat', true ) );
	$fresh_btn_gaq_lab 		= esc_attr( get_post_meta( get_the_ID(), '_nutrient_fresh_btn_gaq_lab', true ) );

	if ( $fresh_heading == '' ) $fresh_heading = esc_attr( '1,400 reasons to&nbsp;believe' );
	if ( $fresh_copy == '' ) $fresh_copy = esc_attr( '<p><span class="block huge invisible">71%</span>agree choosing health &amp; wellness products is more important than choosing other types of products.</p><p><small>In a nationwide, online quantitative study <br class="hide-for-small">of 1015 men and women, 18-65+ years of age<span class="show-for-small-only"> plus personal interviews with 400 women age 18-65.</span></small></p>' );
	if ( $fresh_btn_copy == '' ) $fresh_btn_copy = esc_attr( 'See more illuminating<span class="show-for-small-only">&nbsp;</span>stats' );
	if ( $fresh_btn_href == '' ) $fresh_btn_href = esc_attr( '/our-obsessions/' );
	if ( $fresh_btn_gaq_act == '' ) $fresh_btn_gaq_act = '';
	if ( $fresh_btn_gaq_cat == '' ) $fresh_btn_gaq_cat = '';
	if ( $fresh_btn_gaq_lab == '' ) $fresh_btn_gaq_lab = '';

	wp_nonce_field( basename( __FILE__ ), 'nutrient_settings_nonce' );?>
	<h3>Hero Banner</h3>
	<p>
		<label><b>Copy</b><br>
			<textarea name="nutrient_banner_copy" id="nutrient_banner_copy" style="width: 100%;" rows="10"><?php echo $banner_copy; ?></textarea>
	</label>
	</p>
	<p>
		<label><b>Button Text</b><br>
			<input name="nutrient_banner_btn_copy" id="nutrient_banner_btn_copy" style="width: 100%;" value="<?php echo $banner_btn_copy; ?>">
		</label>
	</p>
	<p>
		<label><b>Button HREF</b><br>
			<input name="nutrient_banner_btn_href" id="nutrient_banner_btn_href" style="width: 100%;" value="<?php echo $banner_btn_href; ?>">
		</label>
	</p>
	<p>
		<label><b>Tracking Action</b><br>
			<input name="nutrient_banner_btn_gaq_act" id="nutrient_banner_btn_gaq_act" style="width: 100%;" value="<?php echo $banner_btn_gaq_act; ?>">
		</label>
	</p>
	<p>
		<label><b>Tracking Category</b><br>
			<input name="nutrient_banner_btn_gaq_cat" id="nutrient_banner_btn_gaq_cat" style="width: 100%;" value="<?php echo $banner_btn_gaq_cat; ?>">
		</label>
	</p>
	<p>
		<label><b>Tracking Label</b><br>
			<input name="nutrient_banner_btn_gaq_lab" id="nutrient_banner_btn_gaq_lab" style="width: 100%;" value="<?php echo $banner_btn_gaq_lab ?>">
		</label>
	</p>
	<hr style="margin-top:16px;">
	<h3>Our Approach</h3>
	<p>
		<label><b>Heading</b><br>
			<input name="nutrient_approach_heading" id="nutrient_approach_heading" style="width: 100%;" value="<?php echo $approach_heading; ?>">
		</label>
	</p>
	<p>
		<label><b>Copy</b><br>
			<textarea name="nutrient_approach_copy" id="nutrient_approach_copy" style="width: 100%;" rows="10"><?php echo $approach_copy; ?></textarea>
		</label>
	</p>
	<p>
		<label><b>Button Text</b><br>
			<input name="nutrient_approach_btn_copy" id="nutrient_approach_btn_copy" style="width: 100%;" value="<?php echo $approach_btn_copy; ?>">
		</label>
	</p>
	<p>
		<label><b>Button HREF</b><br>
			<input name="nutrient_approach_btn_href" id="nutrient_approach_btn_href" style="width: 100%;" value="<?php echo $approach_btn_href; ?>">
		</label>
	</p>
	<p>
		<label><b>Tracking Action</b><br>
			<input name="nutrient_approach_btn_gaq_act" id="nutrient_approach_btn_gaq_act" style="width: 100%;" value="<?php echo $approach_btn_gaq_act; ?>">
		</label>
	</p>
	<p>
		<label><b>Tracking Category</b><br>
			<input name="nutrient_approach_btn_gaq_cat" id="nutrient_approach_btn_gaq_cat" style="width: 100%;" value="<?php echo $approach_btn_gaq_cat; ?>">
		</label>
	</p>
	<p>
		<label><b>Tracking Label</b><br>
			<input name="nutrient_approach_btn_gaq_lab" id="nutrient_approach_btn_gaq_lab" style="width: 100%;" value="<?php echo $approach_btn_gaq_lab; ?>">
		</label>
	</p>
	<hr style="margin-top:16px;">
	<h3>Fresh Thinking</h3>
	<p>
		<label><b>Heading</b><br>
			<input name="nutrient_fresh_heading" id="nutrient_fresh_heading" style="width: 100%;" value="<?php echo $fresh_heading; ?>">
		</label>
	</p>
	<p>
		<label><b>Copy</b><br>
		<textarea name="nutrient_fresh_copy" id="nutrient_fresh_copy" style="width: 100%;" rows="10"><?php echo $fresh_copy; ?></textarea>
		</label>
	</p>
	<p>
		<label><b>Button Text</b><br>
			<input name="nutrient_fresh_btn_copy" id="nutrient_fresh_btn_copy" style="width: 100%;" value="<?php echo $fresh_btn_copy; ?>">
		</label>
	</p>
	<p>
		<label><b>Button HREF</b><br>
			<input name="nutrient_fresh_btn_href" id="nutrient_fresh_btn_href" style="width: 100%;" value="<?php echo $fresh_btn_href; ?>">
		</label>
	</p>
	<p>
		<label><b>Tracking Action</b><br>
			<input name="nutrient_fresh_btn_gaq_act" id="nutrient_fresh_btn_gaq_act" style="width: 100%;" value="<?php echo $fresh_btn_gaq_act; ?>">
		</label>
	</p>
	<p>
		<label><b>Tracking Category</b><br>
			<input name="nutrient_fresh_btn_gaq_cat" id="nutrient_fresh_btn_gaq_cat" style="width: 100%;" value="<?php echo $fresh_btn_gaq_cat; ?>">
		</label>
	</p>
	<p>
		<label><b>Tracking Label</b><br>
			<input name="nutrient_fresh_btn_gaq_lab" id="nutrient_fresh_btn_gaq_lab" style="width: 100%;" value="<?php echo $fresh_btn_gaq_lab; ?>">
		</label>
	</p>
<?php
}

if ( ! function_exists( 'nutrient_user_fields' ) ) :
/**
 * Create additional User fields
 *
 * @since Nutrient 1
 * @author MaakuW
 *
 */
  function nutrient_user_fields( $user ) { 
	
		$gender = esc_attr( get_the_author_meta( 'gender', $user->ID ) );
		
	?>
  <h3>Nutrient specific info</h3>
  <table class="form-table">
  	<tr class="form-required">
			<th scope="row"><label for="user_title">Title <span class="description">(required)</span></label></th>
			<td><input class="regular-text ltr" name="job_title" type="text" id="job_title" value="<?php echo esc_attr( get_the_author_meta( 'job_title', $user->ID ) ); ?>" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60"></td>
		</tr>
  	<tr>
			<th scope="row"><label for="user_title">Photo</label></th>
			<td><input class="regular-text ltr" name="photo" type="text" id="photo" value="<?php echo esc_attr( get_the_author_meta( 'photo', $user->ID ) ); ?>" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60"></td>
		</tr>
  	<tr>
			<th scope="row"><label for="user_title">Photo (hover)</label></th>
			<td><input class="regular-text ltr" name="photo_hover" type="text" id="photo_hover" value="<?php echo esc_attr( get_the_author_meta( 'photo_hover', $user->ID ) ); ?>" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60"></td>
		</tr>
  	<tr>
			<th scope="row"><label for="user_title">Gender (used to determine the appropriate pronoun 'his' or 'her' in the Team page links)</label></th>
			<td><select class="regular-text ltr" name="gender" type="text" id="gender" cols="10">
				<option value="m" <?php if( $gender == 'm' ) echo ' selected'; ?>>Male</option>
				<option value="f" <?php if( $gender == 'f' ) echo ' selected'; ?>>Female</option>
			</td>
		</tr>
  </table>
<?php
	}
  add_action( 'show_user_profile', 'nutrient_user_fields' );
  add_action( 'edit_user_profile', 'nutrient_user_fields' );
endif;

if ( ! function_exists( 'nutrient_save_user_fields' ) ) :

  function nutrient_save_user_fields( $user_id ) {
  	if ( !current_user_can( 'edit_user', $user_id ) )
      return false;

  	update_usermeta( $user_id, 'job_title', $_POST['job_title'] );
  	update_usermeta( $user_id, 'gender', $_POST['gender'] );
  	update_usermeta( $user_id, 'photo', $_POST['photo'] );
  	update_usermeta( $user_id, 'photo_hover', $_POST['photo_hover'] );
  }
	
	add_action( 'personal_options_update', 'nutrient_save_user_fields' );
  add_action( 'edit_user_profile_update', 'nutrient_save_user_fields' );
endif;

if ( ! function_exists( 'nutrient_metabox_settings_save_details' ) ) :
/**
 * Save all metabox settings
 *
 * @since Nutrient 1
 * @author MaakuW
 *
 */
function nutrient_metabox_settings_save_details( $post_id, $post ){
	global $pagenow;

	if ( 'post.php' != $pagenow ) return $post_id;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;

	$post_type = get_post_type_object( $post->post_type );
	if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

	if ( !isset( $_POST['nutrient_settings_nonce'] ) || ! wp_verify_nonce( $_POST['nutrient_settings_nonce'], basename( __FILE__ ) ) )
		return $post_id;

/* All */
	if ( isset( $_POST['nutrient_header_copy'] ) ) {
		update_post_meta( $post_id, '_nutrient_header_copy',  htmlentities( $_POST['nutrient_header_copy'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_header_copy' );
	}

	if ( isset( $_POST['nutrient_seo_description'] ) ) {
		update_post_meta( $post_id, '_nutrient_seo_description',  htmlentities( $_POST['nutrient_seo_description'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_seo_description' );
	}

/* Obsessions (Post Archive Page) */
	if ( isset( $_POST['nutrient_use_icon'] ) ) {
		update_post_meta( $post_id, '_nutrient_use_icon', $_POST['nutrient_use_icon'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_use_icon' );
	}

	if ( isset( $_POST['nutrient_header_color'] ) ) {
		update_post_meta( $post_id, '_nutrient_header_color', $_POST['nutrient_header_color'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_header_color' );
	}

	if ( isset( $_POST['nutrient_download_link'] ) ) {
		update_post_meta( $post_id, '_nutrient_download_link', $_POST['nutrient_download_link'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_download_link' );
	}

/* Services */
	if ( isset( $_POST['nutrient_services_header_color'] ) ) {
		update_post_meta( $post_id, '_nutrient_services_header_color', htmlentities( $_POST['nutrient_services_header_color'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_services_header_color' );
	}
	
	if ( isset( $_POST['nutrient_services_header'] ) ) {
		update_post_meta( $post_id, '_nutrient_services_header', htmlentities( $_POST['nutrient_services_header'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_services_header' );
	}
	
	if ( isset( $_POST['nutrient_services_copy'] ) ) {
		update_post_meta( $post_id, '_nutrient_services_copy', htmlentities( $_POST['nutrient_services_copy'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_services_copy' );
	}

/* Our Approach*/
	//Feature Page 1
	if ( isset( $_POST['nutrient_template_approach_feat0'] ) ) {
		update_post_meta( $post_id, '_nutrient_template_approach_feat0', $_POST['nutrient_template_approach_feat0'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_template_approach_feat0' );
	}
	if ( isset( $_POST['nutrient_template_approach_feat0_btn'] ) ) {
		update_post_meta( $post_id, '_nutrient_template_approach_feat0_btn', $_POST['nutrient_template_approach_feat0_btn'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_template_approach_feat0_btn' );
	}
	if ( isset( $_POST['nutrient_template_approach_feat0_act'] ) ) {
		update_post_meta( $post_id, '_nutrient_template_approach_feat0_gaq_act', $_POST['nutrient_template_approach_feat0_gaq_act'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_template_approach_feat0_gaq_act' );
	}
	if ( isset( $_POST['nutrient_template_approach_feat0_cat'] ) ) {
		update_post_meta( $post_id, '_nutrient_template_approach_feat0_gaq_cat', $_POST['nutrient_template_approach_feat0_gaq_cat'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_template_approach_feat0_gaq_cat' );
	}
	if ( isset( $_POST['nutrient_template_approach_feat0_lab'] ) ) {
		update_post_meta( $post_id, '_nutrient_template_approach_feat0_gaq_lab', $_POST['nutrient_template_approach_feat0_gaq_lab'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_template_approach_feat0_gaq_lab' );
	}
	if ( isset( $_POST['nutrient_template_approach_feat0_copy'] ) ) {
		update_post_meta( $post_id, '_nutrient_template_approach_feat0_copy', $_POST['nutrient_template_approach_feat0_copy'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_template_approach_feat0_copy' );
	}
	if ( isset( $_POST['nutrient_template_approach_feat0_img'] ) ) {
		update_post_meta( $post_id, '_nutrient_template_approach_feat0_img', $_POST['nutrient_template_approach_feat0_img'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_template_approach_feat0_img' );
	}
	//Feature Page 2
	if ( isset( $_POST['nutrient_template_approach_feat1'] ) ) {
		update_post_meta( $post_id, '_nutrient_template_approach_feat1', $_POST['nutrient_template_approach_feat1'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_template_approach_feat1' );
	}
	if ( isset( $_POST['nutrient_template_approach_feat1_btn'] ) ) {
		update_post_meta( $post_id, '_nutrient_template_approach_feat1_btn', $_POST['nutrient_template_approach_feat1_btn'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_template_approach_feat1_btn' );
	}
	if ( isset( $_POST['nutrient_template_approach_feat1_act'] ) ) {
		update_post_meta( $post_id, '_nutrient_template_approach_feat1_gaq_act', $_POST['nutrient_template_approach_feat1_gaq_act'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_template_approach_feat1_gaq_act' );
	}
	if ( isset( $_POST['nutrient_template_approach_feat1_cat'] ) ) {
		update_post_meta( $post_id, '_nutrient_template_approach_feat1_gaq_cat', $_POST['nutrient_template_approach_feat1_gaq_cat'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_template_approach_feat1_gaq_cat' );
	}
	if ( isset( $_POST['nutrient_template_approach_feat1_lab'] ) ) {
		update_post_meta( $post_id, '_nutrient_template_approach_feat1_gaq_lab', $_POST['nutrient_template_approach_feat1_gaq_lab'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_template_approach_feat1_gaq_lab' );
	}
	if ( isset( $_POST['nutrient_template_approach_feat1_copy'] ) ) {
		update_post_meta( $post_id, '_nutrient_template_approach_feat1_copy', $_POST['nutrient_template_approach_feat1_copy'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_template_approach_feat1_copy' );
	}
	if ( isset( $_POST['nutrient_template_approach_feat1_img'] ) ) {
		update_post_meta( $post_id, '_nutrient_template_approach_feat1_img', $_POST['nutrient_template_approach_feat1_img'] );
	}else{
		delete_post_meta( $post_id, '_nutrient_template_approach_feat1_img' );
	}
	//Main heading
	if ( isset( $_POST['nutrient_hm_header'] ) ) {
		update_post_meta( $post_id, '_nutrient_hm_header', htmlentities( $_POST['nutrient_hm_header'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_hm_header' );
	}
	//Main copy
	if ( isset( $_POST['nutrient_hm_subheader'] ) ) {
		update_post_meta( $post_id, '_nutrient_hm_subheader', htmlentities( $_POST['nutrient_hm_subheader'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_hm_subheader' );
	}
	//Decision Vulnerability Mapping Header
	if ( isset( $_POST['nutrient_dvm_header'] ) ) {
		update_post_meta( $post_id, '_nutrient_dvm_header', htmlentities( $_POST['nutrient_dvm_header'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_dvm_header' );
	}
	//Decision Vulnerability Mapping Copy
	if ( isset( $_POST['nutrient_dvm_copy'] ) ) {
		update_post_meta( $post_id, '_nutrient_dvm_copy', htmlentities( $_POST['nutrient_dvm_copy'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_dvm_copy' );
	}
	//Brand Blueprint Header
	if ( isset( $_POST['nutrient_bb_header'] ) ) {
		update_post_meta( $post_id, '_nutrient_bb_header', htmlentities( $_POST['nutrient_bb_header'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_bb_header' );
	}
	//Brand Blueprint Copy
	if ( isset( $_POST['nutrient_bb_copy'] ) ) {
		update_post_meta( $post_id, '_nutrient_bb_copy', htmlentities( $_POST['nutrient_bb_copy'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_bb_copy' );
	}
	//Strategy Platform Header
	if ( isset( $_POST['nutrient_sp_header'] ) ) {
		update_post_meta( $post_id, '_nutrient_sp_header', htmlentities( $_POST['nutrient_sp_header'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_sp_header' );
	}
	//Strategy Platform Copy
	if ( isset( $_POST['nutrient_sp_copy'] ) ) {
		update_post_meta( $post_id, '_nutrient_sp_copy', htmlentities( $_POST['nutrient_sp_copy'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_sp_copy' );
	}

/* Homepage */
	if ( isset( $_POST['nutrient_banner_heading'] ) ) {
		update_post_meta( $post_id, '_nutrient_banner_heading', htmlentities( $_POST['nutrient_banner_heading'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_banner_heading' );
	}
	
	if ( isset( $_POST['nutrient_banner_copy'] ) ) {
		update_post_meta( $post_id, '_nutrient_banner_copy', htmlentities( $_POST['nutrient_banner_copy'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_banner_copy' );
	}

	if ( isset( $_POST['nutrient_banner_btn_copy'] ) ) {
		update_post_meta( $post_id, '_nutrient_banner_btn_copy', htmlentities( $_POST['nutrient_banner_btn_copy'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_banner_btn_copy' );
	}
	
	if ( isset( $_POST['nutrient_banner_btn_href'] ) ) {
		update_post_meta( $post_id, '_nutrient_banner_btn_href', htmlentities( $_POST['nutrient_banner_btn_href'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_banner_btn_href' );
	}
	
	if ( isset( $_POST['nutrient_banner_btn_gaq_lab'] ) ) {
		update_post_meta( $post_id, '_nutrient_banner_btn_gaq_lab', htmlentities( $_POST['nutrient_banner_btn_gaq_lab'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_banner_btn_gaq_lab' );
	}
	
	if ( isset( $_POST['nutrient_banner_btn_gaq_act'] ) ) {
		update_post_meta( $post_id, '_nutrient_banner_btn_gaq_act', htmlentities( $_POST['nutrient_banner_btn_gaq_act'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_banner_btn_gaq_act' );
	}
	
	if ( isset( $_POST['nutrient_banner_btn_gaq_cat'] ) ) {
		update_post_meta( $post_id, '_nutrient_banner_btn_gaq_cat', htmlentities( $_POST['nutrient_banner_btn_gaq_cat'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_banner_btn_gaq_cat' );
	}
	
	if ( isset( $_POST['nutrient_approach_heading'] ) ) {
		update_post_meta( $post_id, '_nutrient_approach_heading', htmlentities( $_POST['nutrient_approach_heading'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_approach_heading' );
	}
	
	if ( isset( $_POST['nutrient_approach_copy'] ) ) {
		update_post_meta( $post_id, '_nutrient_approach_copy', htmlentities( $_POST['nutrient_approach_copy'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_approach_copy' );
	}
	
	if ( isset( $_POST['nutrient_approach_btn_copy'] ) ) {
		update_post_meta( $post_id, '_nutrient_approach_btn_copy', htmlentities( $_POST['nutrient_approach_btn_copy'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_approach_btn_copy' );
	}
	
	if ( isset( $_POST['nutrient_approach_btn_href'] ) ) {
		update_post_meta( $post_id, '_nutrient_approach_btn_href', htmlentities( $_POST['nutrient_approach_btn_href'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_approach_btn_href' );
	}
	
	if ( isset( $_POST['nutrient_approach_btn_gaq_lab'] ) ) {
		update_post_meta( $post_id, '_nutrient_approach_btn_gaq_lab', htmlentities( $_POST['nutrient_approach_btn_gaq_lab'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_approach_btn_gaq_lab' );
	}
	
	if ( isset( $_POST['nutrient_approach_btn_gaq_act'] ) ) {
		update_post_meta( $post_id, '_nutrient_approach_btn_gaq_act', htmlentities( $_POST['nutrient_approach_btn_gaq_act'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_approach_btn_gaq_act' );
	}
	
	if ( isset( $_POST['nutrient_approach_btn_gaq_cat'] ) ) {
		update_post_meta( $post_id, '_nutrient_approach_btn_gaq_cat', htmlentities( $_POST['nutrient_approach_btn_gaq_cat'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_approach_btn_gaq_cat' );
	}
	
	if ( isset( $_POST['nutrient_fresh_heading'] ) ) {
		update_post_meta( $post_id, '_nutrient_fresh_heading', htmlentities( $_POST['nutrient_fresh_heading'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_fresh_heading' );
	}
	
	if ( isset( $_POST['nutrient_fresh_copy'] ) ) {
		update_post_meta( $post_id, '_nutrient_fresh_copy', htmlentities( $_POST['nutrient_fresh_copy'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_fresh_copy' );
	}
	
	if ( isset( $_POST['nutrient_fresh_btn_copy'] ) ) {
		update_post_meta( $post_id, '_nutrient_fresh_btn_copy', htmlentities( $_POST['nutrient_fresh_btn_copy'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_fresh_btn_copy' );
	}
	
	if ( isset( $_POST['nutrient_fresh_btn_href'] ) ) {
		update_post_meta( $post_id, '_nutrient_fresh_btn_href', htmlentities( $_POST['nutrient_fresh_btn_href'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_fresh_btn_href' );
	}
	
	if ( isset( $_POST['nutrient_fresh_btn_gaq_lab'] ) ) {
		update_post_meta( $post_id, '_nutrient_fresh_btn_gaq_lab', htmlentities( $_POST['nutrient_fresh_btn_gaq_lab'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_fresh_btn_gaq_lab' );
	}
	
	if ( isset( $_POST['nutrient_fresh_btn_gaq_act'] ) ) {
		update_post_meta( $post_id, '_nutrient_fresh_btn_gaq_act', htmlentities( $_POST['nutrient_fresh_btn_gaq_act'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_fresh_btn_gaq_act' );
	}
	
	if ( isset( $_POST['nutrient_fresh_btn_gaq_cat'] ) ) {
		update_post_meta( $post_id, '_nutrient_fresh_btn_gaq_cat', htmlentities( $_POST['nutrient_fresh_btn_gaq_cat'] ) );
	}else{
		delete_post_meta( $post_id, '_nutrient_fresh_btn_gaq_cat' );
	}
}
add_action( 'save_post', 'nutrient_metabox_settings_save_details', 10, 2 );
endif;

/**
 * Enqueues adminscripts and styles.
 *
 * @since Nutrient 1
 */
function nutrient_admin_scripts() {
	// Core Functions.
	wp_enqueue_script( 'admin-functions', get_template_directory_uri() . '/js/admin-functions.js', array(), '0.3' );
}

add_action( 'admin_enqueue_scripts', 'nutrient_admin_scripts' );

function nu_settings_api_init() {

 	add_settings_field(
		'nu_setting_widgettitle',
		'Widget Title Text',
		'nu_setting_widgettitle_cb',
		'general'
	);

 	add_settings_field(
		'nu_setting_copyright',
		'Copyright Information',
		'nu_setting_copyright_cb',
		'general'
	);

	add_settings_field(
		'nu_setting_mailto',
		'Email Link Text',
		'nu_setting_mailto_cb',
		'general',
		'nu_setting_section_team'
	);

	add_settings_field(
		'nu_setting_readmore',
		'Blog Link Text',
		'nu_setting_readmore_cb',
		'general',
		'nu_setting_section_team'
	);

	add_settings_section(
		'nu_setting_section_team',
		'Team Page Copy',
		'nu_setting_section_team_cb',
		'general'
	);

 	add_settings_section(
		'nu_setting_section_social',
		'Social Page URLs',
		'nu_setting_section_social_cb',
		'general'
	);
 	
 	add_settings_field(
		'nu_setting_social_twitter_href',
		'Twitter',
		'nu_setting_social_twitter_cb',
		'general',
		'nu_setting_section_social'
	);
 	add_settings_field(
		'nu_setting_social_facebook_href',
		'Facebook',
		'nu_setting_social_facebook_cb',
		'general',
		'nu_setting_section_social'
	);
 	add_settings_field(
		'nu_setting_social_instagram_href',
		'Instagram',
		'nu_setting_social_instagram_cb',
		'general',
		'nu_setting_section_social'
	);
 	add_settings_field(
		'nu_setting_social_linkedin_href',
		'Linkedin',
		'nu_setting_social_linkedin_cb',
		'general',
		'nu_setting_section_social'
	);

	//Social 	
 	register_setting( 'general', 'nu_setting_social_twitter_href' );
 	register_setting( 'general', 'nu_setting_social_facebook_href' );
 	register_setting( 'general', 'nu_setting_social_instagram_href' );
 	register_setting( 'general', 'nu_setting_social_linkedin_href' );

 	register_setting( 'general', 'nu_setting_copyright' );

 	register_setting( 'general', 'nu_setting_widgettitle' );

 	register_setting( 'general', 'nu_setting_mailto' );
 	register_setting( 'general', 'nu_setting_readmore' );

 } // eg_settings_api_init()
 
 add_action( 'admin_init', 'nu_settings_api_init' );
 
 function nu_setting_copyright_cb() {
 	echo '<input name="nu_setting_copyright" id="nu_setting_copyright" type="text" value="' . get_option( 'nu_setting_copyright' ) . '" class="regular-text" />';
 }

 function nu_setting_widgettitle_cb() {
 	echo '<input name="nu_setting_widgettitle" id="nu_setting_widgettitle" type="text" value="' . get_option( 'nu_setting_widgettitle' ) . '" class="regular-text" />';
 }

 function nu_setting_mailto_cb() {
 	echo '<input name="nu_setting_mailto" id="nu_setting_mailto" type="text" value="' . get_option( 'nu_setting_mailto' ) . '" class="regular-text" />';
 }

 function nu_setting_readmore_cb() {
 	echo '<input name="nu_setting_readmore" id="nu_setting_readmore" type="text" value="' . get_option( 'nu_setting_readmore' ) . '" class="regular-text" />';
 }

 function nu_setting_section_social_cb() {
 	echo '<p>A social link can be created with the shortcode name (nu_social) and the share name, like so: [nu_social_twitter]</p>';
 }

 function nu_setting_section_team_cb() {
 	echo '<p>Select UI elements from the users archive page can be customized below</p>';
 }

 function nu_setting_social_twitter_cb() {
 	echo '<input name="nu_setting_social_twitter_href" id="nu_setting_social_twitter_href" type="text" value="' . get_option( 'nu_setting_social_twitter_href' ) . '" class="regular-text" />';
 }

 function nu_setting_social_facebook_cb() {
 	echo '<input name="nu_setting_social_facebook_href" id="nu_setting_social_facebook_href" type="text" value="' . get_option( 'nu_setting_social_facebook_href' ) . '" class="regular-text" />';
 }

 function nu_setting_social_linkedin_cb() {
 	echo '<input name="nu_setting_social_linkedin_href" id="nu_setting_social_linkedin_href" type="text" value="' . get_option( 'nu_setting_social_linkedin_href' ) . '" class="regular-text" />';
 }

 function nu_setting_social_instagram_cb() {
 	echo '<input name="nu_setting_social_instagram_href" id="nu_setting_social_instagram_href" type="text" value="' . get_option( 'nu_setting_social_instagram_href' ) . '" class="regular-text" />';
 }

/**
 * Take our link and add 'saml_sso=false' to prevent us from being re-locked out of the admin
 *
 * @since Nutrient 0.9
 */
function nu_edit_post_link( $url ) {
  $url .= '&saml_sso=false';
  return $url;
}
add_filter( 'get_edit_post_link', 'nu_edit_post_link' );

/**
 * 
 *
 * @since Nutrient 1
 */
function nu_seo_single_post_title() {
	$id = get_queried_object_id();
	$seo_title = get_post_meta( $id, '_nutrient_header_copy' );
	if( $seo_title ) {
		$title = $seo_title[0];
	}else{
		$title = get_the_title();
	}
  return $title;
}

/**
 * 
 *
 * @since Nutrient 1
 */
function nu_seo_separator( $sep ) {
  return '|';
}
add_filter( 'document_title_separator', 'nu_seo_separator' );

/**
 * 
 *
 * @since Nutrient 1
 */
function nu_seo_title( $title ) {
	$id = get_queried_object_id();
  
  $seo_title['title'] = get_bloginfo('sitename'); 
  $seo_title['page'] = get_the_title($id);

  return $seo_title; 
}
add_filter( 'document_title_parts', 'nu_seo_title' );

?>