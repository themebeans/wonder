<?php
/**
 * The file is for displaying the single portfolio media
 * It is called via single-portfolio.php
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

// SETTING UP PORTFOLIO
$gallery_layout = get_post_meta( $post->ID, '_bean_gallery_layout', true );
$portfolio_type = get_post_meta( $post->ID, '_bean_portfolio_type', true );

// RANDOMIZE
$orderby = get_post_meta( $post->ID, '_bean_portfolio_randomize', true );
$orderby = ( $orderby == 'off' ) ? 'post__in' : 'rand';

// AUDIO META
$audio_poster = get_post_meta( $post->ID, '_bean_audio_poster_url', true );
if ( $audio_poster == '' ) {
	$audio_poster_class = 'audio-no-feat'; }

// VIDEO META
$embed = get_post_meta( $post->ID, '_bean_portfolio_embed_code', true );

if ( $portfolio_type == 'gallery' ) {
	bean_gallery( $post->ID, 'portfolio-single', $gallery_layout, $orderby, true );
} // END if ( $portfolio_type == 'gallery')

if ( $portfolio_type == 'audio' ) {
	if ( $audio_poster ) { ?>
		<li class="stacked-image">
			<img src="<?php echo esc_url( $audio_poster ); ?>" class="wp-post-image"/>
			<?php bean_audio( $post->ID ); ?>
		</li><!-- END .stacked-image -->

	<?php } else { ?>
		<div class="audio-no-feat">
			<?php bean_audio( $post->ID ); ?>
		</div><!-- END .audio-no-feat -->
	<?php
} //END else ( $audio_poster )
} // END if ( $portfolio_type == 'audio')

if ( $portfolio_type == 'video' ) {
	$video_class = '';
	if ( $embed == '' ) {
		$video_class = 'self-hosted-video'; }
	?>

	<div class="row portfolio-slideshow video-frame <?php echo esc_attr( $video_class ); ?> fadein">

		<?php
		if ( ! empty( $embed ) ) {
			echo stripslashes( htmlspecialchars_decode( $embed ) );
		} else {
			bean_video( $post->ID );
		}
		?>
	</div><!-- END .video-frame -->

<?php
} // END if ( $portfolio_type == 'video')
