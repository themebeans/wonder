<?php
/**
 * The template for displaying posts in the Aside post format.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */
	?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row">

		<div class="twelve columns">

			<article class="entry-content">

				<?php the_content(); ?>

			</article><!-- END .entry-content -->

		</div><!-- END .twelve columns -->

	</div><!-- END .row -->

</section><!-- END #post-<?php the_ID(); ?> -->
