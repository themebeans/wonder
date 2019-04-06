<?php
/**
 * The template for displaying comments.
 * The area of the page that contains comments and the comment form.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */
	?>

<div id="comments">

<?php
	// PASSWORD PROTECTED
if ( post_password_required() ) {
	return;
}

	// DISPLAY COMMENTS
if ( have_comments() ) :




	/*
		===================================================================*/
	/*
		  COMMENTS
	/*===================================================================*/
	if ( ! empty( $comments_by_type['comment'] ) ) {
		?>

			<h2><?php comments_number( __( '0 Comments. ', 'wonder' ), __( '1 Comment. ', 'wonder' ), __( '% Comments. ', 'wonder' ) ); ?></h2>

			<div id="comments-list" class="comments">

				<?php
				// PAGINATION
				$total_pages = get_comment_pages_count();
				if ( $total_pages > 1 ) {
				?>

					<div id="comments-nav-above" class="comments-navigation">
						<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
					</div><!-- END #comments-nav-above -->

				<?php } ?>

					<ol class="commentlist block">
					<?php wp_list_comments( 'type=comment&callback=wonder_comment' ); ?>
					</ol>

				<?php
				$total_pages = get_comment_pages_count();
				if ( $total_pages > 1 ) {
				?>
					<div id="comments-nav-below" class="comments-navigation">
						<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
						</div><!-- END #comments-nav-below -->
				<?php } ?>

			</div><!-- END #comments-list.comments -->

		<?php
	} //END if ( ! empty($comments_by_type['comment']) )




	/*
		===================================================================*/
	/*
		  PINGS
	/*===================================================================*/
	if ( ! empty( $comments_by_type['pings'] ) ) {
		?>

			<div id="comments-list" class="comments">
				<h5 class="comments-title"><?php esc_html_e( 'Trackbacks.', 'wonder' ); ?></h5>

					<ol class="pinglist">
						<?php wp_list_comments( 'type=pings&callback=wonder_ping' ); ?>
					</ol>
				</div><!-- END #comments-list .comments -->

		<?php
	} //END if ( ! empty($comments_by_type['pings']) )

		endif; /* if ( $comments ) */



	/*
	===================================================================*/
	/*
	  RESPOND TO COMMENTS
	/*===================================================================*/
if ( comments_open() ) :
	comment_form();
endif;
if ( ! comments_open() && have_comments() && ! is_page() ) :
	?>

		<div id="respond">
			<p id="reply-title"><strong><?php esc_html_e( 'Comments have been disabled.', 'wonder' ); ?></strong></p>
		</div>

	<?php endif; ?>

</div><!-- END #comments -->
