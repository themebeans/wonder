<?php
/**
 * The template for displaying Search Results pages
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

get_header();
wonder_blog_sidebar_loader(); ?>

<?php
// FEATURED IMAGE, IF FULLWIDTH BLOG
$bean_blog_sidebar_location = get_theme_mod( 'blog_sidebar_selector' );
if ( $bean_blog_sidebar_location === 'none' ) {
	$thumbnail = 'post-full';
} else {
	$thumbnail = 'post-feat';
} // END $bean_blog_sidebar_location
?>

<div id="primary-container" class="fadein">

	<div class="row">

		<form id="searchform" class="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

			<div class="clearfix default_searchform results">

				<input type="text" name="s" class="s" onblur="if (this.value == '') {this.value = '<?php esc_html_e( 'To search again, click here, type & hit enter... ', 'wonder' ); ?>';}" onfocus="if (this.value == '<?php esc_html_e( 'To search again, click here, type & hit enter... ', 'wonder' ); ?>') {this.value = '';}" value="<?php esc_html_e( 'To search again, click here, type & hit enter... ', 'wonder' ); ?>" />

				<button type="submit" class="button"></button>

			</div><!-- END .clearfix defaul_searchform -->

		</form><!-- END #searchform -->

		<div class="<?php echo esc_attr( $bean_blog_content_class ); ?> mobile-four">

			<?php
			global $query_string;
			query_posts( $query_string . '&posts_per_page=' . get_option( 'posts_per_page' ) . '' );
?>

			<?php
			// IF SEARCH RESULTS
			if ( have_posts() ) {
				$i = 0;

				// THE LOOP
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						$format = get_post_format();
						if ( false === $format ) {
							$format = 'standard'; }
						if ( $format == 'aside' || $format == 'gallery' || $format == 'image' || $format == 'link' || $format == 'quote' || $format == 'video' ) {
						}
						get_template_part( 'inc/post-formats/content' );
				endwhile;
endif;

			} // IF NO SEARCH RESULTS
			else {
			?>
			<h1 class="entry-title"><?php printf( __( 'Nothing Found.', 'wonder' ), get_search_query() ); ?></h1>
			<p><?php printf( __( 'Sorry, we couldn&#39;t find anything for "%s".', 'wonder' ), get_search_query() ); ?></p>

		<?php } // END IF NO RESULTS ?>

			<div class="pagination index">

				<span class="page-previous">
					<?php next_posts_link( '' ); ?>
				</span><!-- END .nav-previous -->
				<span class="page-next">
					<?php previous_posts_link( '' ); ?>
				</span><!-- END .nav-next -->

			</div><!-- END .pagination index -->

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

<?php get_footer(); ?>
