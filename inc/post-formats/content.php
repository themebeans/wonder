<?php
/**
 * The default template for displaying content for the standard post.
 *
 * @package WordPress
 * @subpackage Wonder
 * @author ThemeBeans
 * @since Wonder 1.0
 */

// FEATURED IMAGE, IF FULLWIDTH BLOG
$bean_blog_sidebar_location = get_theme_mod( 'blog_sidebar_selector' );
if ( $bean_blog_sidebar_location === 'none' ) {
	$thumbnail = 'post-full';
} else {
	$thumbnail = 'post-feat';
} ?>

<section id="post-<?php the_ID(); ?>" <?php post_class( $thumbnail ); ?>>

		<?php if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) { // FEATURED IMAGE ?>

		<div class="entry-content-media">

			<div class="post-thumb">

				<?php
				if ( is_singular() ) {
					the_post_thumbnail( 'post-full' ); // DIMENSIONS IN /LIB/FUNCTIONS/THEME-SETUP.PHP
?>

				<?php } else { // IF NOT SINGLE ?>

				<a title="<?php printf( __( 'Permanent Link to %s', 'wonder' ), get_the_title() ); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-full' ); ?></a>

				<?php } ?>

			</div><!-- END .post-thumb -->

		</div><!-- END .entry-content-media -->

	<?php } // END has_post_thumbnail ?>

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
