<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

get_header();
wonder_blog_sidebar_loader(); ?>

<div id="primary-container" class="fadein">

	<div class="row">

		<div class="<?php echo esc_attr( $bean_blog_content_class ); ?> mobile-four">

			<?php if ( is_archive() ) { // CHECK FOR ARCHIVES ?>
				<h1 class="entry-title archive-title">
					<?php
					// OUTPUT AUTHOR'S NAME
					if ( is_author() ) :

						// PULL AUTHOR INFO
						global $authordata, $curauth;
						if ( isset( $_GET['author_name'] ) ) :
							$curauth = get_userdatabylogin( $author_name );
						else :
							$curauth = get_userdata( intval( $author ) );
						endif;

						// VARIABLES
						$description = $curauth->user_description;
						$name        = $curauth->nickname;

						// OUTPUT NAME
						echo $name;
						_e( '&#39;s Posts.', 'wonder' );
						?>
						</h1>
						<p class="archive-title">
						<?php

						// OUTPUT AUTHOR'S BIO IF ENTERED
						if ( $description != '' ) {
							echo esc_html( $description ); } // OUTPUT THE FOLLOWING IF NO BIO ENTERED
						else {
							_e( 'This author has not added a biography yet. Meanwhile he/she has contributed ', 'wonder' );
							the_author_posts();
							_e( ' posts. Check them out below:', 'wonder' ); }
					?>
					   </p>
					<?php
					elseif ( is_tag() ) :
						printf( __( 'Tagged: %s', 'wonder' ), single_tag_title( '', false ) . '' );
					elseif ( is_category() ) :
						printf( __( 'Category:&nbsp;%s', 'wonder' ), '' . single_cat_title( '', false ) . '' );
					elseif ( is_day() ) :
						 printf( __( 'Archives: %s', 'wonder' ), '' . get_the_date() . '' );
					elseif ( is_month() ) :
						printf( __( 'Archives: %s', 'wonder' ), '' . get_the_date( _x( 'F Y', 'monthly archives date format', 'wonder' ) ) . '' );
					elseif ( is_year() ) :
						printf( __( 'Archives: %s', 'wonder' ), '' . get_the_date( _x( 'Y', 'yearly archives date format', 'wonder' ) ) . '' );
					else :
						printf( __( 'Archives', 'wonder' ) );
					endif;
					?>
				</h1>
			<?php } // END is_archive() ?>

			<?php
			// THE LOOP
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					$format = get_post_format();
					if ( false === $format ) {
						$format = 'standard'; }
					if ( $format == 'aside' || $format == 'gallery' || $format == 'image' || $format == 'link' || $format == 'quote' ) {
					}
					get_template_part( 'inc/post-formats/content', $format );
			endwhile;
endif;
			?>

			<div class="pagination index">

				<span class="page-previous">
					<?php next_posts_link( '' ); ?>
				</span><!-- END .nav-previous -->
				<span class="page-next">
					<?php previous_posts_link( '' ); ?>
				</span><!-- END .nav-next -->

			</div><!-- END .pagination index -->

		</div>

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
