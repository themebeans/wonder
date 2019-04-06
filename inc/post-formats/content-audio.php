<?php
/**
 * The template for displaying posts in the Audio post format.
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

// AUDIO META
$audio_poster = get_post_meta( $post->ID, '_bean_audio_poster_url', true );

// ADD CLASS IF NO FEATURED IMAGE, SO IT STILL LOOKS NICE
if ( ! $audio_poster ) {
	$thumbnail = 'audio_no_feat';
}
?>

<section id="post-<?php the_ID(); ?> " <?php post_class( $thumbnail ); ?>>

	<div class="entry-content-media">

		<div class="post-thumb">

			<?php
			if ( $audio_poster ) {
				if ( is_singular() ) {
					echo '<img src=' . $audio_poster . ' class="wp-post-image"/>'; } else {
				?>
					<a title="<?php printf( __( 'Permanent Link to %s', 'wonder' ), get_the_title() ); ?>" href="<?php the_permalink(); ?>"><?php echo '<img src=' . $audio_poster . ' class="wp-post-image"/>'; ?></a>
				<?php
					}
			}

			// AUDIO
			bean_audio( $post->ID );
			?>

		</div><!-- END .post-thumb -->

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
