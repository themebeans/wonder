<?php
/**
 * Template Name: Site Map
 * The template for displaying the site map template.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

get_header();
wonder_sidebar_loader(); ?>

<div id="primary-container" class="fadein">

	<div class="row">

		<div class="<?php echo $bean_content_class; ?> mobile-four">

			<?php
			// IF PAGE TITLE OPTION IN META IS CHECKED
			$page_title = get_post_meta( $post->ID, '_bean_page_title', true );
			if ( $page_title == 'on' ) {

			?>
			<h1 class="entry-title"><?php wp_title( '' ); ?></h1>
			<?php } ?>

			<div class="entry-content">

				<div class="archives-list">

					   <h6><?php esc_html_e( 'Pages', 'wonder' ); ?></h6>
					<ul><?php wp_list_pages( 'title_li=' ); ?></ul>

				</div><!-- END .archives-list -->

			</div><!-- END .entry-content -->

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
