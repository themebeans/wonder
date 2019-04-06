<?php
/**
 * Template Name: Portfolio
 * The template for displaying the portfolio grid layout.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

get_header();

// PULL PAGINATION FROM READING SETTINGS
$paged = 1;
if ( get_query_var( 'paged' ) ) {
	$paged = get_query_var( 'paged' );
}
if ( get_query_var( 'page' ) ) {
	$paged = get_query_var( 'page' );
}

// PULL PAGINATION FROM CUSTOMIZATION
$portfolio_posts_count = get_theme_mod( 'portfolio_posts_count' );

$content = $post->post_content;

if ( $content ) {
	while ( have_posts() ) :
		the_post(); ?>

	<div class="row portfolio-top-content">

		<?php
		// IF PAGE TITLE OPTION IN META IS CHECKED
		$page_title = get_post_meta( $post->ID, '_bean_page_title', true );
		if ( $page_title == 'on' ) {

	?>
	<h1 class="entry-title"><?php the_title( '' ); ?></h1>
		<?php } ?>

		<div class="entry-content">
			<?php echo get_the_content(); ?>
		</div>
	</div>

	<?php
	endwhile;
}
?>

<div id="isotope-container" class="fadein">

	<div class="grid-sizer"></div>

	<div class="gutter-sizer"></div>

	<?php
	$orderby = get_theme_mod( 'portfolio_rando' );
	$orderby = ( $orderby == false ) ? 'menu_order' : 'rand';

	// LOAD PORTFOLIO QUERY - NEED BEAN PORTFOLIO POST TYPE PLUGIN
	$args = array(
		'post_type'      => 'portfolio',
		'order'          => 'ASC',
		'orderby'        => $orderby,
		'paged'          => $paged,
		'posts_per_page' => $portfolio_posts_count,
	);

	query_posts( $args );
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			get_template_part( 'loop-portfolio' ); // PULL CONTENT-PORTFOLIO-LOOP.PHP

		endwhile;
endif;
	?>

</div><!-- END #isotope-container -->

<?php
get_footer();
