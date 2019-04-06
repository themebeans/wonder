<?php
/**
 * The template for displaying posts in the Link post format.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

// FEATURED IMAGE, IF FULLWIDTH BLOG
$bean_blog_sidebar_location = get_theme_mod( 'blog_sidebar_selector' );
if ( $bean_blog_sidebar_location === 'none' ) {
	$thumbnail = 'post-full';
} else {
	$thumbnail = 'post-feat';
}

// LINK URL VIA POST META
$link = get_post_meta( $post->ID, '_bean_link_url', true );
?>

<section id="post-<?php the_ID(); ?>" <?php post_class( $thumbnail ); ?>>

	<div class="row">

		<div class="twelve columns">

			<header class="entry-header">

				<h1 class="entry-title">

					<?php
					if ( is_singular() ) {
						the_title(); // IF SINGLE
?>

					<?php } else { // IF NOT SINGLE ?>

						<a target="blank" href="<?php echo esc_url( $link ); ?>" class="blank-link"> <?php the_title(); ?><span class="link-icon"></span></a>

					<?php } ?>

				</h1><!-- END .entry-title -->

			</header><!-- END .entry-header -->

			<div class="entry-meta">

				<?php echo esc_url( $link ); ?>

			</div><!-- END .entry-content -->

		</div><!-- END .twelve columns -->

	</div><!-- END .row -->

</section><!-- END #post-<?php the_ID(); ?> -->
