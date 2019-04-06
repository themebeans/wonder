<?php
/**
 * The template for displaying the portfolio singular page
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

get_header();

// SETTING UP META
$portfolio_type     = get_post_meta( $post->ID, '_bean_portfolio_type', true );
$portfolio_date     = get_post_meta( $post->ID, '_bean_portfolio_date', true );
$portfolio_url      = get_post_meta( $post->ID, '_bean_portfolio_url', true );
$portfolio_url_text = get_post_meta( $post->ID, '_bean_portfolio_url_text', true );
$portfolio_client   = get_post_meta( $post->ID, '_bean_portfolio_client', true );
$portfolio_cats     = get_post_meta( $post->ID, '_bean_portfolio_cats', true );
$portfolio_tags     = get_post_meta( $post->ID, '_bean_portfolio_tags', true );
$gallery_layout     = get_post_meta( $post->ID, '_bean_gallery_layout', true );

// RELATED POSTS
$terms = get_the_terms( $post->ID, 'portfolio_category' );
?>

<div id="primary-container">

	<div class="portfolio-title-container fadein">

		<div class="row">

			<h1 class="entry-title"><?php the_title(); ?></h1>

			<div class="entry-meta">

				<ul class="portfolio-meta-list">

					<?php if ( $portfolio_date == 'on' ) { // DISPLAY DATE ?>

						<li><span><?php esc_html_e( 'Date: ', 'wonder' ); ?></span><?php echo the_time( 'M Y' ); ?></li>

					<?php } // END DATE ?>

					<?php if ( $portfolio_client ) { // DISPLAY CLIENT ?>

						<li>
							<span><?php esc_html_e( 'Client:', 'wonder' ); ?></span>
							<?php if ( $portfolio_url ) { // DISPLAY PORTFOLIO URL ?>
								<a href="<?php echo esc_url( $portfolio_url ); ?>" target="blank"><?php echo esc_html( $portfolio_client ); ?></a>
							<?php
} else {
	echo esc_html( $portfolio_client ); } // IF NO URL
?>
						</li>

					<?php } // END CLIENT ?>

					<?php if ( $portfolio_cats == 'on' ) { // DISPLAY CATEGORY ?>

						<li><span><?php esc_html_e( 'Skills:&nbsp;', 'wonder' ); ?></span><?php the_terms( $post->ID, 'portfolio_category', '', ', ', '' ); ?></li>

					<?php } // END CATEGORY ?>

					<?php if ( $portfolio_tags == 'on' ) { // DISPLAY TAGS ?>

						<li><span><?php esc_html_e( 'Tags:&nbsp;', 'wonder' ); ?></span><?php the_terms( $post->ID, 'portfolio_tag', '', ', ', '' ); ?></li>

					<?php } // END TAGS ?>

				</ul><!--END .portfolio-meta-list -->

			</div><!-- END .entry-meta-->

		</div><!-- END .row -->

		<?php if ( get_theme_mod( 'portfolio_pagination' ) == true ) { ?>

			<div class="pagination hide-for-small">
				<span class="page-previous BeanFadeInLeft">
					<?php previous_post_link( '%link', '' ); ?>
				</span><!-- END .page-previous -->
				<span class="page-next BeanFadeInRight">
					<?php next_post_link( '%link', '' ); ?>
				</span><!-- END .page-next -->
			</div><!-- END .pagination -->

		<?php } //END IF PORTFOLIO PAGINATION ?>

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
?>

					<div class="row">

			<div class="entry-content">

				<?php the_content(); // CONTENT ?>

			</div><!-- END .entry-content-->

					</div><!-- END .row -->

				</div><!-- END .portfolio-title-container-->

					<?php
					// BACKSTRECH IMAGE
					$bgwidth = get_post_meta( get_the_ID(), '_bean_bgwidth', true );
					$bgimage = get_post_meta( get_the_ID(), '_bean_bgimage', true );

					$bg_class = '';
					$data_url = '';

					if ( $bgwidth == 'backstretch' && $bgimage !== '' ) {

						$data_url = " data-url='$bgimage'";
						$bg_class = " class= 'backstretch'";

					}
					?>

					<div id="media-container"
					<?php
					echo esc_attr( $bg_class );
					echo esc_attr( $data_url );
?>
>

						<?php if ( ! post_password_required() ) { // START PASSWORD PROTECTED MEDIA ?>

				<div class="entry-content-media portfolio-<?php echo esc_attr( $portfolio_type ); ?> <?php echo esc_attr( $gallery_layout ); ?>">

					<?php get_template_part( 'content', 'portfolio-media' ); // PULL CONTENT-PORTFOLIO-MEDIA.PHP ?>

				</div><!-- END .entry-content-media -->

			<?php } //END PASSWORD PROTECTED MEDIA ?>

					</div><!-- END #media-container -->

				<?php
	endwhile;
endif;
		wp_reset_postdata();
?>

	<?php
	if ( $terms && ! is_wp_error( $terms ) ) : // IF NO CATEGORY - DONT GET TEMPLATE PART
		if ( get_theme_mod( 'show_related_portfolio_posts' ) == true ) {
			get_template_part( 'content', 'portfolio-related' ); // PULL CONTENT-PORTFOLIO-RELATED.PHP
		} //END IF SHOW RELATED POSTS
	endif;
	?>

</div><!-- END #primary-container -->

<?php
get_footer();
