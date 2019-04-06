<?php
/**
 * The template for displaying the default searchform whenever it is called in the theme.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */
	?>
 <form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	 <input type="text" name="s" id="s" value="<?php esc_html_e( 'Search here...', 'wonder' ); ?>" onfocus="if(this.value=='<?php esc_html_e( 'Search here...', 'wonder' ); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php esc_html_e( 'Search here...', 'wonder' ); ?>';" />
 </form><!-- END #searchform -->
