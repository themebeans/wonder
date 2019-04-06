<?php
/**
 * The template for displaying all single posts.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

get_header();
wonder_blog_sidebar_loader(); ?>

<div id="primary-container" class="fadein">

	<div class="row">

		<div class="<?php echo esc_attr( $bean_blog_content_class ); ?> mobile-four">

			<?php
			// THE LOOP
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					$format = get_post_format();
					if ( false === $format ) {
						$format = 'standard'; }
					if ( $format == 'aside' || $format == 'gallery' || $format == 'image' || $format == 'link' || $format == 'quote' || $format == 'video' ) {
					}
					get_template_part( 'inc/post-formats/content', $format );
			endwhile;

				wp_link_pages(
					array(
						'before'         => '<p><strong>' . __( 'Pages:', 'wonder' ) . '</strong> ',
						'after'          => '</p>',
						'next_or_number' => 'number',
					)
				);

				// DISPLAY SOCIAL SHARING
				if ( get_theme_mod( 'post_sharing' ) == true && is_singular() ) {
					wonder_post_sharing();
				}

				// DISPLAY TAGS
				if ( get_theme_mod( 'show_tags' ) == true && has_tag() && is_singular() ) {
					echo '<div class="entry-meta">';
					echo __( '<span>Tagged: </span>', 'wonder' );
					the_tags( '', ', ', '' );
					echo '</div>';
				}

				// COMMENTS & COMMENT FORM
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endif;

			// IF SINGLE POST PAGINATION
			if ( get_theme_mod( 'show_pagination' ) == true ) {
			?>

				<div class="twelve columns">

					<div class="pagination index">

						<span class="page-previous">
							<?php next_post_link( '%link', '' ); ?>
						</span><!-- END .nav-previous -->
						<span class="page-next">
							<?php previous_post_link( '%link', '' ); ?>
						</span><!-- END .nav-next -->

					</div><!-- END .pagination index -->

				</div><!-- END .twelve columns -->

			<?php } // END get_theme_mod( 'show_pagination' ) ?>

		</div><!-- END $bean_blog_content_class -->

		<?php if ( $bean_blog_sidebar_location === 'left' || $bean_blog_sidebar_location === 'right' ) { ?>

			<div class="<?php echo esc_attr( $bean_blog_sidebar_class ); ?> hide-for-small">

				<aside class="sidebar " role="complementary">

					<?php dynamic_sidebar( 'internal-sidebar' ); ?>

				</aside><!-- END .sidebar -->

			</div><!-- END $bean_blog_sidebar_class -->

		<?php } // END SIDEBAR LEFT OR RIGHT ?>

	</div><!-- END .row -->

</div><!-- END #primary-container -->

<?php
get_footer();
