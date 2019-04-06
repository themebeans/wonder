<?php
/**
 *  The template for displaying all pages
 *
 *  This is the template that displays all pages by default.
 *  Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

get_header();
wonder_sidebar_loader(); ?>

<div id="primary-container" class="fadein">

	<div class="row">

		<div class="<?php echo esc_attr( $bean_content_class ); ?> mobile-four">

			<?php
			$page_title = get_post_meta( $post->ID, '_bean_page_title', true );
			if ( $page_title == 'on' ) {
			?>
				<h1 class="entry-title"><?php the_title( '' ); ?></h1>
			<?php } ?>

			<div class="entry-content">

				<?php
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile;

				wp_link_pages(
					array(
						'before' => '<div class="page-link"><span>' . __( 'Pages:', 'wonder' ) . '</span>',
						'after'  => '</div>',
					)
				);
				?>

			</div>

		</div><!-- END $bean_content_class -->

		<?php if ( $bean_sidebar_location === 'left' || $bean_sidebar_location === 'right' ) { ?>

			<div class="<?php echo esc_attr( $bean_sidebar_class ); ?> hide-for-small">

				<aside class="sidebar " role="complementary">

					<?php dynamic_sidebar( 'internal-sidebar' ); ?>

				</aside><!-- END .sidebar -->

			</div><!-- END $bean_sidebar_class -->

		<?php } // END SIDEBAR LEFT OR RIGHT ?>

	</div><!-- END .row -->

</div><!-- END #primary-container -->

<?php
get_footer();
