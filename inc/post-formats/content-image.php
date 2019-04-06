<?php
/**
 * The template for displaying posts in the Image post format.
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
}?>

<section id="post-<?php the_ID(); ?>" <?php post_class( $thumbnail ); ?>>

		<?php if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) { // FEATURED IMAGE ?>

		<div class="entry-content-media">

			<div class="post-thumb">

				<?php the_post_thumbnail( 'post-full' ); // DIMENSIONS IN /LIB/FUNCTIONS/THEME-SETUP.PHP ?>

			</div><!-- END .post-thumb -->

		</div><!-- END .entry-content-media -->

	<?php } // END has_post_thumbnail ?>

	<div class="row">

		<div class="twelve columns">

			<?php if ( is_singular() ) { ?>

				<header class="entry-header">

					<h1 class="entry-title">

						<?php the_title(); ?>

					</h1><!-- END .entry-title -->

				</header><!-- END .entry-header -->

			<?php } // END is_singular ?>

			<article class="entry-content">

				<?php
				if ( is_singular() ) {
					the_content();
				} else {
					the_excerpt(); } // DISPLAY EXCERPT ON BLOGROLL & FULL CONTENT ON SINGLE POST
?>

			</article><!-- END .entry-content -->

		</div><!-- END .twelve columns -->

	</div><!-- END .row -->

</section><!-- END #post-<?php the_ID(); ?> -->
