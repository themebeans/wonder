<?php
/**
 * The template for displaying portfolio category & tag pages
 *
 * Used to display archive-type pages for portfolio posts.
 * If you'd like to further customize these taxonomy views, you may create a
 * new template file for each specific one. This file has taxonomy-portfolio_category.php
 * and taxonomy-portfolio_tag.php pointing to it.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

get_header();

// LOOP QUERY
global $query_string;
query_posts( "{$query_string}&posts_per_page=-1" ); // CATEGORY QUERY ?>

<div id="isotope-container">

	<div class="grid-sizer"></div>

	<div class="gutter-sizer"></div>

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			get_template_part( 'loop-portfolio' ); // PULL CONTENT-PORTFOLIO-LOOP.PHP

	endwhile;
endif;
	wp_reset_postdata();
	?>

</div><!-- END #isotope-container -->

<?php
get_footer();
