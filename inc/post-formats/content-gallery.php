<?php
/**
 * The template for displaying posts in the Gallery post format.
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

// POST META
$orderby = get_post_meta( $post->ID, '_bean_post_randomize', true );
$orderby = ( $orderby == 'off' ) ? 'post__in' : 'rand';
?>

<section id="post-<?php the_ID(); ?>" <?php post_class( $thumbnail ); ?>>

	<div class="entry-content-media">
		<?php bean_gallery( $post->ID, 'post-full', 'slider', $orderby, true ); ?>
	</div><!-- END .entry-content-media -->

	<div class="row">

		<div class="twelve columns">

			<header class="entry-header">

				<h1 class="entry-title">

					<?php
					if ( is_singular() ) {
						the_title(); // IF SINGLE
?>

					<?php } else { // IF NOT SINGLE ?>

						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wonder' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>

					<?php } ?>

				</h1><!-- END .entry-title -->

			</header><!-- END .entry-header -->

			<?php get_template_part( 'content', 'post-meta' ); // PULL FROM CONTENT-POST-META.PHP ?>

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
