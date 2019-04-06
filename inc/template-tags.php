<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

if ( ! function_exists( 'wonder_site_logo' ) ) :
	/**
	 * Displays the optional custom logo.
	 * Outputs an H1, if there is no logo uploaded.
	 */
	function wonder_site_logo() {

		if ( has_custom_logo() ) {

			echo '<div itemscope itemtype="http://schema.org/Organization">';
				the_custom_logo();
			echo '</div>';

		} else { ?>
			<h1 class="site-logo-link" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
		<?php
		}
	}
endif;

if ( ! function_exists( 'bean_gallery' ) ) {
	function bean_gallery( $postid, $imagesize = '', $layout = '', $orderby = '', $single = false ) {
		$thumb_ID      = get_post_thumbnail_id( $postid );
		$image_ids_raw = get_post_meta( $postid, '_bean_image_ids', true );

		if ( $image_ids_raw != '' ) {
			$image_ids   = explode( ',', $image_ids_raw );
			$post_parent = null;
		} else {
			$image_ids   = '';
			$post_parent = $postid;
		}

		// PULL THE IMAGE ATTACHMENTS
		$args        = array(
			'exclude'        => $thumb_ID,
			'include'        => $image_ids,
			'numberposts'    => -1,
			'orderby'        => $orderby,
			'order'          => 'ASC',
			'post_type'      => 'attachment',
			'post_parent'    => $post_parent,
			'post_mime_type' => 'image',
			'post_status'    => null,
		);
		$attachments = get_posts( $args );

		// IF THE FUNCTION'S LAYOUT IS CALLING FOR THE SLIDER
		if ( $layout == 'slider' ) {
			// TRANSFER RANDO META FOR TRUE/FALSE SLIDE RANDOMIZE
			if ( $orderby == 'rand' ) {
				$orderby_slides = 'true';
			} else {
				$orderby_slides = 'false';
			}
			?>

			  <div class="row portfolio-slideshow">
				  <script type="text/javascript">
					  jQuery(document).ready(function($){
						  jQuery('#slider-<?php echo esc_js( $postid ); ?>').flexslider({
							  namespace: "bean-",
							  animation: "fade",
							  slideshowSpeed: 5000,
							  slideshow: true,
							  animationLoop: true,
							  animationSpeed: 750,
							  randomize: <?php echo esc_js( $orderby_slides ); ?>,
							  directionNav: false,
							  smoothHeight: false,
							  controlNav: true,
							  touch: true,
							  pauseOnHover: false,
						   });

						   jQuery('#slider-<?php echo esc_js( $postid ); ?>').css({ display : 'block' });
						   jQuery('#slider-<?php echo esc_js( $postid ); ?>').addClass('loaded');
					  });
				  </script>

				<div class="slider-wrapper">
					<div class="post-slider">
						<div id="slider-<?php echo esc_attr( $postid ); ?>">
							<ul class="slides">
								<?php
								if ( ! empty( $attachments ) ) {
									$i = 0;
									foreach ( $attachments as $attachment ) {
										$src     = wp_get_attachment_image_src( $attachment->ID, $imagesize );
										$caption = $attachment->post_excerpt;
										$caption = ( $caption ) ? "<div class='bean-slide-caption'>$caption</div>" : '';
										$alt     = ( ! empty( $attachment->post_content ) ) ? $attachment->post_content : $attachment->post_title;
										echo "<li>$caption<img height='$src[2]' src='$src[0]' alt='$alt'/></li>";
									}
								} // END if( !empty($attachments) )
								?>
							</ul><!-- END .slides -->
						</div><!-- END #slider-$postid -->
					</div><!-- END .post-slider -->
				</div><!-- END .slider-wrapper -->
			</div><!-- END .row.portfolio-slideshow -->

		<?php
		} // END if( $layout == 'slider' )

		// IF THE FUNCTION'S LAYOUT IS CALLING FOR STACKED IMAGES
		if ( $layout == 'stacked' ) {
			if ( ! empty( $attachments ) ) {
				foreach ( $attachments as $attachment ) {
					$src     = wp_get_attachment_image_src( $attachment->ID, $imagesize );
					$caption = $attachment->post_excerpt;
					$caption = ( $caption ) ? "<div class='bean-image-caption'>$caption</div>" : '';
					$alt     = ( ! empty( $attachment->post_content ) ) ? $attachment->post_content : $attachment->post_title;
					echo "<li class='stacked-image'><img height='$src[2]' width='$src[1]' src='$src[0]' alt='$alt' />$caption</li>";
				}
			} // END if( !empty($attachments) )
		} // END if( $layout == 'stacked' )

		if ( $layout == 'view' ) {
			if ( ! empty( $attachments ) ) {
				foreach ( $attachments as $attachment ) {
					$src     = wp_get_attachment_image_src( $attachment->ID, $imagesize );
					$caption = $attachment->post_excerpt;
					echo "<li class='stacked-image'><a href='$src[0]' class='view' rel='wonder'><img src='$src[0]'/></a></li>";
				}
			} // END if( !empty($attachments) )
		} // END if( $layout == 'view' )

	} // END function bean_gallery
} // END if ( !function_exists( 'bean_gallery' ) )

if ( ! function_exists( 'bean_audio' ) ) {
	function bean_audio( $postid ) {
		// MP3 FROM POST/PORTFOLIO
		$mp3 = get_post_meta( $postid, '_bean_audio_mp3', true );
		?>

		<script type="text/javascript">
			jQuery(document).ready(function(){
				if(jQuery().jPlayer) {
					jQuery('#jquery_jplayer_<?php echo esc_attr( $postid ); ?>').jPlayer( {
						ready : function () {
								jQuery(this).jPlayer("setMedia", {
								<?php if ( $mp3 != '' ) : ?>
								mp3: "<?php echo esc_js( $mp3 ); ?>",
								<?php endif; ?>
								end: ""
							});
						},
						size: {
							width: "100%",
						},
						swfPath: "<?php echo get_template_directory_uri(); ?>/assets/js",
						cssSelectorAncestor: "#jp_container_<?php echo esc_attr( $postid ); ?>",
						supplied: "
						<?php
						if ( $mp3 != '' ) :
?>
mp3, <?php endif; ?> all"
					});
				}
				jQuery("#jp_container_<?php echo $postid; ?> .jp-interface").css("display", "block");
			});
		</script>

		<div id="jp_container_<?php echo esc_attr( $postid ); ?>" class="jp-audio fullwidth">
			<div id="jquery_jplayer_<?php echo esc_attr( $postid ); ?>" class="jp-jplayer"></div>
			<div class="jp-interface" style="display: none;">
				<ul class="jp-controls">
					<li><a href="javascript:;" class="jp-play" tabindex="1" title="Play"><span><?php esc_html_e( 'Play', 'wonder' ); ?></span></a></li>
					<li><a href="javascript:;" class="jp-pause" tabindex="1" title="Pause"><span><?php esc_html_e( 'Pause', 'wonder' ); ?></span></a></li>
				</ul><!-- END .jp-controls -->
				<div class="jp-progress">
					<div class="jp-seek-bar">
						<div class="jp-play-bar"></div>
					</div><!-- END .jp-seek-bar -->
				</div><!-- END .jp-progress -->
			</div><!-- END .jp-interface -->
		</div>

	<?php
	} // END function bean_audio($postid)
} // END if ( !function_exists( 'bean_audio' ) )

if ( ! function_exists( 'bean_video' ) ) {
	function bean_video( $postid ) {
		$m4v    = get_post_meta( $postid, '_bean_video_m4v', true );
		$poster = get_post_meta( $postid, '_bean_video_poster', true );
		?>

		 <script type="text/javascript">
			jQuery(document).ready(function () {
				jQuery('#jquery_jplayer_<?php echo esc_attr( $postid ); ?>').jPlayer( { ready : function () {
					jQuery(this).jPlayer(
						'setMedia', {
								<?php if ( $m4v != '' ) : ?>
									m4v: "<?php echo $m4v; ?>",
								<?php endif; ?>
								<?php if ( $poster != '' ) : ?>
									poster: "<?php echo $poster; ?>"
								<?php endif; ?>
								}
							);
						},
						preload: 'auto',
						cssSelectorAncestor : '#jp_container_<?php echo esc_js( $postid ); ?>',
						swfPath: "<?php echo get_template_directory_uri(); ?>/assets/js",
						supplied: "
						<?php
						if ( $m4v != '' ) :
?>
m4v, <?php endif; ?> all",
						size : {
							width : '100%',
							height: "100%"
						},
						wmode : 'window'
					}
				);
				jQuery("#jp_container_<?php echo esc_js( $postid ); ?> .jp-interface").css("display", "block");
			});
		</script>

		<div id="jp_container_<?php echo esc_attr( $postid ); ?>" class="jp-video fullwidth">
			<div class="jp-type-single">
				<div id="jquery_jplayer_<?php echo esc_attr( $postid ); ?>" class="jp-jplayer">
				</div>
				<div class="jp-interface" style="display: none;">
					<ul class="jp-controls">
						<li><a href="javascript:;" class="jp-play" tabindex="1" title="Play"><span><?php esc_html_e( 'Play', 'wonder' ); ?></span></a></li>
						<li><a href="javascript:;" class="jp-pause" tabindex="1" title="Pause"><span><?php esc_html_e( 'Pause', 'wonder' ); ?></span></a></li>
					</ul><!-- END .jp-controls -->
					<div class="jp-progress">
						<div class="jp-seek-bar">
							<div class="jp-play-bar"></div>
						</div><!-- END .jp-seek-bar -->
					</div><!-- END .jp-progress -->
				</div><!-- END .jp-interface -->
			</div><!-- END .jp-type-single -->
		</div>

	<?php
	}
}
