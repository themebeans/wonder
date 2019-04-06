<div class="entry-meta">
	<ul>
		<li><span><?php esc_html_e( 'Date: ', 'wonder' ); ?></span><?php echo the_time( 'M j Y' ); ?></li>
		<li><span><?php esc_html_e( 'Comments: ', 'wonder' ); ?></span><?php comments_popup_link( __( '0', 'wonder' ), __( '1', 'wonder' ), __( '%', 'wonder' ) ); ?></li>
		<li class="mobile-hide"><span><?php esc_html_e( 'Posted in: ', 'wonder' ); ?></span><?php the_category( ', ' ); ?></li>
	</ul>
</div><!-- END .entry-meta -->
