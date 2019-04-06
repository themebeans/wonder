<?php
/**
 * The file for displaying the related portfolio loop below the portfolio single view.
 * It is called via the single-portfolio.php.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

// RELATED QUERY
$related_items_count = -1;
$related             = wonder_get_related_posts( $post->ID, 'portfolio_category', array( 'posts_per_page' => $related_items_count ) );

$no_related = '';

if ( $related->post_count == 0 ) {
	$no_related = 'no-related'; } ?>

<div class="related-title <?php echo esc_attr( $no_related ); ?>">
	<div class="row">
		<h1>
			<?php
			// IF NO RELATED POSTS
			if ( $related->post_count == 0 ) {
				esc_html_e( 'No Related Work', 'wonder' );
			} else {

				// IF POST IS NOT PASSWORD PROTECTED
				if ( ! post_password_required() ) {
					echo get_theme_mod( 'related_portfolio_title', 'Related Work' );
				} // TITLE FOR RELATED IF POST IS PROTECTED
				else {
					esc_html_e( 'View some other works', 'wonder' );
				}
			?>
		</h1>
	</div><!-- END .row -->
</div><!-- END .related-title -->

<div id="isotope-container">

	<div class="grid-sizer"></div>

	<div class="gutter-sizer"></div>

	<?php
	while ( $related->have_posts() ) :
		$related->the_post();

		get_template_part( 'loop-portfolio' ); // PULL CONTENT-PORTFOLIO-LOOP.PHP

	endwhile;
	wp_reset_postdata(); }
	?>

</div><!-- END #isotope-container -->
