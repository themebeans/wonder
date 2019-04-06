<?php
/**
 * The template for displaying posts in the Quote post format.
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
} // END $bean_blog_sidebar_location

// POST META
$quote        = get_post_meta( $post->ID, '_bean_quote', true );
$quote_source = get_post_meta( $post->ID, '_bean_quote_source', true );
?>

<section id="post-<?php the_ID(); ?>" <?php post_class( $thumbnail ); ?>>

	<div class="row">

		<div class="twelve columns">

			<header class="entry-header">

				<h1 class="entry-title">

					<?php echo stripslashes( esc_html( $quote ) ); ?>

				</h1><!-- END .entry-title -->

			</header><!-- END .entry-header -->

			<div class="entry-meta">

				<?php echo stripslashes( esc_html( $quote_source ) ); ?>

			</div><!-- END .entry-meta -->

		</div><!-- END .twelve columns -->

	</div><!-- END .row -->

</section><!-- END #post-<?php the_ID(); ?> -->
