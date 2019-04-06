<?php
/**
 * The file for displaying theme mobile menu.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

if ( ! is_page_template( 'template-comingsoon.php' ) && ! is_page_template( 'template-underconstruction.php' ) ) {
	?>

	<div class="menu_container show-for-small">

	   <a id="menu-toggle" class="anchor-link" href="#mobile-nav"><?php esc_html_e( 'Menu', 'wonder' ); ?></a>

		<?php if ( is_singular( 'post' ) || is_singular( 'portfolio' ) ) { ?>

			<div class="menu-pagination">
				<span class="anchor-portolio-nav prev">
					<?php previous_post_link( '%link', '' ); ?>
				</span><!-- END .page-previous -->
				<span class="anchor-portolio-nav next">
					<?php next_post_link( '%link', '' ); ?>
				</span><!-- END .page-next -->
			</div>

		<?php
} else {
		?>
			<form id="mobile_searchform" class="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="clearfix default_searchform">
					<input type="text" name="s" class="s"/>
					<input type="submit" value="" class="button">
				</div><!-- END .clearfix defaul_searchform -->
			</form><!-- END #searchform -->
		<?php
}
		?>

	</div><!-- END .menu_container -->

<?php
}
