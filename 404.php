<?php
/**
 * The template for displaying the 404 error page
 * This page is set automatically, not through the use of a template
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

get_header(); ?>

<div id="primary-container" class="fadein">

	<div class="row">

		<div class="twelve columns centered">

			<div class="entry-content">

				<h1 class="entry-title"><?php echo get_theme_mod( 'error_title' ); ?></h1>

				 <p><?php echo get_theme_mod( 'error_text' ); ?></p>

				 <p>&larr; <b><a href="javascript:javascript:history.go(-1)"><?php esc_html_e( 'Go Back', 'wonder' ); ?></a></b><?php esc_html_e( ' or ', 'wonder' ); ?><b><a href="<?php echo home_url(); ?>"><?php esc_html_e( 'Go Home', 'wonder' ); ?></a></b> &rarr;</p>

			</div><!-- END .entry-content -->

		</div><!-- END .twelve columns centered -->

	</div><!-- END .row -->

</div><!-- END #primary-container -->

<?php
get_footer();
