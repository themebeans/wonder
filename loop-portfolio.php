<?php
/**
 * The template for displaying the portfolio template/grid loop.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

$postdate   = the_date( 'Y-m-d', '', '', false );
$tendaysago = date( 'Y-m-d', mktime( 0, 0, 0, date( 'm' ), date( 'd' ) - 10, date( 'Y' ) ) );
$terms      = get_the_terms( $post->ID, 'portfolio_category' );
$term_list  = null;
if ( is_array( $terms ) ) {
	foreach ( $terms as $term ) {
		$term_list .= $term->slug;
		$term_list .= ' ';
	}
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "$term_list isotope-item portfolio-item" ); ?>>

	<?php
	if ( get_theme_mod( 'portfolio_overlay' ) == true ) {
	?>
		<div class="portfolio-overlay">
			<h5><?php echo get_the_title(); ?></h5>
		</div><!-- END .porfolio-overlay -->
	<?php
	} // END portfolio_overlay
?>

	<?php
	if ( get_theme_mod( 'portfolio_new_tag' ) == true && $postdate > $tendaysago ) {
		?>
	<div class="new-tag-wrapper">
		<div class="new-tag"><?php esc_html_e( 'New', 'wonder' ); ?></div>
	</div>
	<?php
	} // END portfolio_new_tag
	?>

	<a title="<?php printf( __( 'Permanent Link to %s', 'wonder' ), get_the_title() ); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'portfolio-feat' ); ?></a>

</article><!-- END post-<?php the_ID(); ?> -->
