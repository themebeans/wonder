<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #theme-wrapper and gets the hidden sidebar.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

if ( true === get_theme_mod( 'display_footer' ) && ! is_page_template( 'template-underconstruction.php' ) && ! is_page_template( 'template-comingsoon.php' ) ) { ?>

	<div id="footer-container" class="fadein">
		<div class="row">
			<h5 class="copyright">
				<?php echo get_theme_mod( 'footer_copyright' ); ?>
			</h5>
		</div>
	</div>

	<?php } ?>

</div>

<?php wp_footer(); ?>

</body>
</html>
