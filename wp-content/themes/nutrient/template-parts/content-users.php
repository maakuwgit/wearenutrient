<?php
/**
 * The template used for displaying users
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 0.9
 */

$mailto 			= get_option( 'nu_setting_mailto' );
$read_more 		= get_option( 'nu_setting_readmore' );

$users_title 	= get_post_meta( get_the_ID(), '_nutrient_header_copy', true );
if( '' == $users_title ) $users_title = get_the_title();

// Get all users order by amount of posts
$allUsers = get_users('orderby=post_count&order=DESC');

//Dev Note: this should be filtered to only show one group, not all users
$args = array(
 'role' => 'general_user',
 'orderby' => 'ID',
 'order' => 'ASC'
);

$users = get_users( $args );

?>
<section id="primary" class="content-area plum space semi" role="main">
	<article class="row text-center">
		<figure>
			<?php nutrient_post_thumbnail(); ?>
			<?php nutrient_post_thumbnail('medium'); ?>
			<?php nutrient_post_thumbnail('thumbnail'); ?>
			<figcaption>
				<h1 class="animate"><?php echo html_entity_decode($users_title); ?>
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
				<?php nutrient_excerpt(); ?>
			</figcaption>
		</figure>
	</article>
</section>
<section rel="users" role="post-content" class="purple space semi">
	<article class="row collapse small-up-1 medium-up-2 large-up-3">
<?php if ( sizeof($users) > 0 ) : ?>
	<?php
		// Start the Loop.
		/*Dev Note: this will override the sort of the query and forct it into last_name order. Can be done with first-name too*/
		//usort($users, create_function('$a, $b', 'return strnatcasecmp($a->last_name, $b->last_name);'));
		foreach($users as $user) : 
			$gender = ( get_user_meta( $user->ID, 'gender', true ) == 'm' ? 'his' : 'her');
			$email  = $user->user_email;

			$uargs = array(
		    'author'        =>  $user->ID,
		    'orderby'       =>  'post_date',
		    'order'         =>  'ASC',
		    'posts_per_page' => 1
	    );

			$has_posts = get_posts( $uargs );
	?>
		<figure class="column">
			<div class="relative">
				<a class="thumbnail relative" data-thumbnail data-background-img data-thumbnail-hover="<?php echo get_template_directory_uri() . '/img/' . get_user_meta( $user->ID, 'photo', true);?>">
					<?php nutrient_user_avatar( $user->ID ); ?>
					<h2 class="absolute text-center"><span rel="name"><?php echo $user->display_name; ?></span><span rel="title" style="capitalize"><?php echo get_user_meta( $user->ID, 'job_title', true ); ?><em class="fa fa-angle-double-right"></em></span></h2>
				</a>
				<figcaption class="absolute hide">
					<h3><?php echo $user->display_name; ?> <span class="block subhead"><?php echo get_user_meta( $user->ID, 'job_title', true ); ?></span></h3>
					<p><?php echo get_user_meta( $user->ID, 'description', true ); ?></p>
					<nav>
					<?php if( $email ) : ?>
						<a href="mailto:<?php echo $user->user_email;?>"><?php echo $mailto . ' ' . $user->display_name; ?></a>
					<?php endif; ?>
					<?php if( $has_posts ) : ?>
						<a href="<?php echo get_author_posts_url( $user->ID ); ?>" class="right"><?php echo $read_more . ' ' . $gender;?> thoughts</a>
					<?php endif; ?>
						<a rel="close"><em class="fa fa-times-circle"></em></a>
					</nav>
				</figcaption>
			</div>
		</figure>
	<?php endforeach; ?>
<?php endif; ?>
	</article>
</section>