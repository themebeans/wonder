<?php
/**
 * Template Name: Coming Soon
 * The template for displaying the coming soon template.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

get_header();

$years  = get_theme_mod( 'comingsoon_year' );
$months = get_theme_mod( 'comingsoon_month' );
$days   = get_theme_mod( 'comingsoon_day' );

if ( ! $years ) {
	$years = '2014'; }
if ( ! $months ) {
	$months = '01';  }
if ( ! $days ) {
	$days = '01';    }
?>

<div id="primary-container" class="fadein">

	<div class="row">

		<div class="twelve columns mobile-four">

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

			</div><!-- END .entry-content -->

		</div><!-- END .twelve columns mobile-four -->

		<div class="bean-coming-soon" data-years="<?php echo esc_attr( $years ); ?>" data-months="<?php echo esc_attr( $months ); ?>" data-days="<?php echo esc_attr( $days ); ?>" data-hours="00" data-minutes="00" data-seconds="00">

			<div class="three columns mobile-two fadein days">
				<div class="count-inner">
					<div class="fadein">
						<div class="count"></div>
						<h6><div class="text"><?php esc_html_e( 'Days', 'wonder' ); ?></div></h6>
					</div><!-- END .fadein -->
				</div><!-- END .count-inner -->
			</div><!-- END .days -->

			<div class="three columns mobile-two fadein hours">
				<div class="count-inner">
					<div class="fadein">
						<div class="count"></div>
						<h6><div class="text"><?php esc_html_e( 'Hours', 'wonder' ); ?></div></h6>
					</div><!-- END .fadein -->
				</div><!-- END .count-inner -->
			</div><!-- END .hours -->

			<div class="three columns mobile-two fadein minutes">
				<div class="count-inner">
					<div class="fadein">
						<div class="count"></div>
						<h6><div class="text"><?php esc_html_e( 'Minutes', 'wonder' ); ?></div></h6>
					</div><!-- END .fadein -->
				</div><!-- END .count-inner -->
			</div><!-- END .minutes -->

			<div class="three columns mobile-two fadein seconds">
				<div class="count-inner">
					<div class="fadein">
						<div class="count"></div>
						<h6><div class="text"><?php esc_html_e( 'Seconds', 'wonder' ); ?></div></h6>
					</div><!-- END .fadein -->
				</div><!-- END .count-inner -->
			</div><!-- END .seconds -->

		</div><!-- END bean-coming-soon -->

	</div><!-- END .row -->

</div><!-- END #primary-container -->

<?php
get_footer();
