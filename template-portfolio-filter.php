<?php
/**
 * Template Name: Portfolio Filtered
 * The template for displaying the portfolio grid layout with a category filter.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

get_header();

$paged = 1;
if ( get_query_var( 'paged' ) ) {
	$paged = get_query_var( 'paged' );
}
if ( get_query_var( 'page' ) ) {
	$paged = get_query_var( 'page' );
}

// PULL PAGINATION FROM CUSTOMIZATION
$portfolio_posts_count = get_theme_mod( 'portfolio_posts_count' );

// MOBILE FILTER
$terms = get_terms( 'portfolio_category' );
if ( ! empty( $terms ) ) {

	echo '<ul class="mobile-filter" data-filter="isotope-item">';
		echo '<li><a href="#all" class="active" data-filter="isotope-item">' . __( 'All', 'wonder' ) . '</a></li>';
	foreach ( $terms as $term ) {
		echo '<li><a href="' . get_term_link( $term ) . '" data-filter="' . $term->slug . '">' . $term->name . '</a></li>';
	}
	echo '</ul>';
}

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
	// FLY IN FILTER
	$terms = get_terms( 'portfolio_category' );
	if ( ! empty( $terms ) ) {

		echo '<ul id="filter" class="FilterIn hide-for-small" data-filter="isotope-item">';
			echo '<li>Filter</li>';
			echo '<li><a href="#all" class="active" data-filter="isotope-item">' . __( 'All', 'wonder' ) . '</a></li>';
		foreach ( $terms as $term ) {
			echo '<li><a href="' . get_term_link( $term ) . '" data-filter="' . $term->slug . '">' . $term->name . '</a></li>';
		}
		echo '</ul>';
	}

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

<script type="text/javascript">
jQuery(document).ready(function($) {
	//PORTFOLIO FILTER
	$(function(){
		var $container = $('#isotope-container');
			optionFilter = jQuery('#filter'),
			optionFilterLinks = optionFilter.find('a');

		optionFilterLinks.attr('href', '#');

		optionFilterLinks.click(function(){
		   var selector = jQuery(this).attr('data-filter');
		   $container.imagesLoaded( function(){
				   $container.isotope({
					filter : '.' + selector,
					itemSelector : '.isotope-item',
					layoutMode : 'masonry',
					resizesContainer: true,
			});
		  });
		  // Highlight the correct filter
		  optionFilterLinks.removeClass('active');
		  jQuery(this).addClass('active');
		  return false;
	  });
	});

	$(function(){
		var $container = $('#isotope-container');
			optionFilter = jQuery('.mobile-filter'),
			optionFilterLinks2 = optionFilter.find('a');

		optionFilterLinks2.attr('href', '#');

		optionFilterLinks2.click(function(){
		   var selector = jQuery(this).attr('data-filter');
		   $container.imagesLoaded( function(){
				   $container.isotope({
					filter : '.' + selector,
					itemSelector : '.isotope-item',
					layoutMode : 'masonry',
					resizesContainer: true,
			});
		  });
		  // Highlight the correct filter
		  optionFilterLinks2.removeClass('active');
		  jQuery(this).addClass('active');
		  return false;
	  });
	});

	//FILTER TRIGGER
	$("#filter").bind('click',function() {
		$(this).toggleClass('open');
	})
});
</script>

<?php
get_footer();
