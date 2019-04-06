<?php
/**
 * Wonder functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

if ( ! defined( 'WONDER_DEBUG' ) ) :
	/**
	 * Check to see if development mode is active.
	 * If set to false, the theme will load un-minified assets.
	 */
	define( 'WONDER_DEBUG', true );
endif;

if ( ! defined( 'WONDER_ASSET_SUFFIX' ) ) :
	/**
	 * If not set to true, let's serve minified .css and .js assets.
	 * Don't modify this, unless you know what you're doing!
	 */
	if ( ! defined( 'WONDER_DEBUG' ) || true === WONDER_DEBUG ) {
		define( 'WONDER_ASSET_SUFFIX', null );
	} else {
		define( 'WONDER_ASSET_SUFFIX', '-min' );
	}
endif;

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wonder_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Wonder, use a find and replace
	 * to change 'wonder' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wonder', get_parent_theme_file_path( '/languages' ) );

	/*
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 */
	add_theme_support(
		'custom-logo', array(
			'flex-height' => true,
		)
	);

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 140, 140, true );
	add_image_size( 'sml-thumbnail', 50, 50, true );
	add_image_size( 'post-full', 780, 9999 );
	add_image_size( 'post-feat', 535, 9999 );
	add_image_size( 'portfolio-feat', 400, 9999, false );

	/*
	 * This theme uses wp_nav_menu() in the following locations.
	 */
	register_nav_menus(
		array(
			'primary-menu' => esc_html__( 'Primary Menu', 'wonder' ),
		)
	);

	/**
	 * Filter Wonder Post Format support arguments.
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats', apply_filters(
			'wonder_post_formats', array(
				'aside',
				'gallery',
				'link',
				'image',
				'quote',
				'video',
				'audio',
			)
		)
	);

	/*
	 * Enable support responsive embedded content
	 * See: https://wordpress.org/gutenberg/handbook/extensibility/theme-support/#responsive-embedded-content
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

}
add_action( 'after_setup_theme', 'wonder_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wonder_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wonder_content_width', 700 );
}
add_action( 'after_setup_theme', 'wonder_content_width', 0 );

/**
 * Register widget areas.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wonder_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Internal Sidebar', 'wonder' ),
			'description'   => __( 'Widget area for the primary sidebar.', 'wonder' ),
			'id'            => 'internal-sidebar',
			'before_widget' => '<div class="widget %2$s clearfix">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Contact Sidebar', 'wonder' ),
			'description'   => __( 'Widget area for the contact sidebar.', 'wonder' ),
			'id'            => 'contact-sidebar',
			'before_widget' => '<div class="widget %2$s clearfix">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);

	if ( true === get_theme_mod( 'header_overlay' ) ) {
		register_sidebar(
			array(
				'name'          => __( 'Overlay Left', 'wonder' ),
				'description'   => __( 'Widget area for the first overlay column.', 'wonder' ),
				'id'            => 'overlay_left',
				'before_widget' => '<div class="widget %2$s clearfix">',
				'after_widget'  => '</div>',
				'before_title'  => '<h6 class="widget-title">',
				'after_title'   => '</h6>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Overlay Middle', 'wonder' ),
				'description'   => __( 'Widget area for the second overlay column.', 'wonder' ),
				'id'            => 'overlay_middle',
				'before_widget' => '<div class="widget %2$s clearfix">',
				'after_widget'  => '</div>',
				'before_title'  => '<h6 class="widget-title">',
				'after_title'   => '</h6>',
			)
		);

		register_sidebar(
			array(
				'name'          => __( 'Overlay Right', 'wonder' ),
				'description'   => __( 'Widget area for the first overlay column.', 'wonder' ),
				'id'            => 'overlay_right',
				'before_widget' => '<div class="widget %2$s clearfix">',
				'after_widget'  => '</div>',
				'before_title'  => '<h6 class="widget-title">',
				'after_title'   => '</h6>',
			)
		);
	}
}
add_action( 'widgets_init', 'wonder_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wonder_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'wonder-fonts', wonder_fonts_url(), false, '@@pkg.version', 'all' );

	// Load theme styles.
	if ( is_child_theme() ) {
		wp_enqueue_style( 'wonder-style', get_parent_theme_file_uri( '/style' . WONDER_ASSET_SUFFIX . '.css' ), false, '@@pkg.version' );
		wp_enqueue_style( 'wonder-child-style', get_theme_file_uri( '/style.css' ), false, '@@pkg.version', 'all' );
	} else {
		wp_enqueue_style( 'wonder-style', get_theme_file_uri( '/style' . WONDER_ASSET_SUFFIX . '.css' ), false, '@@pkg.version' );
	}

	/**
	 * Now let's check the same for the scripts.
	 */
	if ( WONDER_DEBUG ) {

		// Vendor scripts.
		wp_enqueue_script( 'fitvids', get_theme_file_uri( '/assets/js/vendors/fitvids.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'isotope', get_theme_file_uri( '/assets/js/vendors/isotope.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'harbor-custom-libraries', get_theme_file_uri( '/assets/js/vendors/custom-libraries.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'superfish', get_theme_file_uri( '/assets/js/vendors/superfish.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'uitotop', get_theme_file_uri( '/assets/js/vendors/uitotop.js' ), array( 'jquery' ), '@@pkg.version', true );

		// Custom scripts.
		wp_enqueue_script( 'wonder-coming-soon', get_theme_file_uri( '/assets/js/custom/coming-soon.js' ), array( 'jquery' ), '@@pkg.version', true );
		wp_enqueue_script( 'wonder-global', get_theme_file_uri( '/assets/js/custom/global.js' ), array( 'jquery', 'imagesloaded' ), '@@pkg.version', true );

	} else {
		wp_enqueue_script( 'wonder-vendors-min', get_theme_file_uri( '/assets/js/vendors.min.js' ), array( 'jquery', 'imagesloaded' ), '@@pkg.version', true );
		wp_enqueue_script( 'wonder-custom-min', get_theme_file_uri( '/assets/js/custom.min.js' ), array( 'jquery', 'imagesloaded' ), '@@pkg.version', true );
	}

	wp_enqueue_script( 'waypoints', get_theme_file_uri( '/assets/js/vendors/waypoints.js' ), array( 'jquery' ), '@@pkg.version', true );
	wp_enqueue_script( 'waypoints-sticky', get_theme_file_uri( '/assets/js/vendors/waypoints-sticky.js' ), array( 'jquery' ), '@@pkg.version', true );

	// Load the standard WordPress comments reply javascript.
	if ( is_singular( 'post' ) && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wonder_scripts' );

/**
 * Enqueue a script in the WordPress admin, for edit.php, post.php and post-new.php.
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function wonder_enqueue_admin_script( $hook ) {
	global $pagenow, $wp_customize;

	if ( 'edit.php' !== $hook ) {
		wp_enqueue_script( 'harbor-post-meta', get_theme_file_uri( '/assets/js/admin/post-meta.js' ), array( 'jquery' ), '@@pkg.version', true );
	}
}
add_action( 'admin_enqueue_scripts', 'wonder_enqueue_admin_script' );

/**
 * Register Google fonts for Wonder.
 *
 * @return string Google fonts URL for the theme.
 */
function wonder_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = '';

	/* translators: If there are characters in your language that are not supported by this font, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== esc_html_x( 'on', 'Lato font: on or off', 'harbor' ) ) {
		$fonts[] = 'Lato:300,400,900';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg(
			array(
				'family' => rawurlencode( implode( '|', $fonts ) ),
				'subset' => rawurlencode( $subsets ),
			), 'https://fonts.googleapis.com/css'
		);
	}

	return $fonts_url;
}

function wonder_sidebar_loader() {
	global $post, $bean_sidebar_location, $bean_sidebar_class, $bean_content_class;

	$bean_sidebar_location = get_post_meta( $post->ID, '_bean_page_layout', true );
	$bean_sidebar_class    = '';
	$bean_content_class    = '';

	if ( $bean_sidebar_location === 'right' ) {
		$bean_sidebar_class = 'three columns sidebar-right';
		$bean_content_class = 'nine columns page-container sidebar-right';

	} elseif ( $bean_sidebar_location === 'left' ) {
		$bean_sidebar_class = 'three columns pull-nine sidebar-left';
		$bean_content_class = 'nine columns page-container push-three sidebar-left';

	} else {
		$bean_content_class = 'twelve columns';
	}
}

function wonder_blog_sidebar_loader() {
	global $post, $bean_blog_sidebar_location, $bean_blog_sidebar_class, $bean_blog_content_class;

	$bean_blog_sidebar_location = get_theme_mod( 'blog_sidebar_selector' );
	$bean_blog_sidebar_class    = '';
	$bean_blog_content_class    = '';

	if ( $bean_blog_sidebar_location === 'right' ) {
		 $bean_blog_sidebar_class = 'three columns sidebar-right';
		 $bean_blog_content_class = 'nine columns page-container sidebar-right';

	} elseif ( $bean_blog_sidebar_location === 'left' ) {
		$bean_blog_sidebar_class = 'three columns pull-nine sidebar-left';
		$bean_blog_content_class = 'nine columns page-container push-three sidebar-left';

	} elseif ( $bean_blog_sidebar_location === 'none' ) {
		$bean_blog_content_class = 'twelve columns';

	} else {
		$bean_blog_content_class = 'twelve columns';
	}
}

function wonder_has_shortcode( $shortcode = '' ) {
	global $post;
	$post_obj = get_post( $post->ID );
	$found    = false;
	if ( ! $shortcode ) {
		return $found;
	}
	if ( stripos( $post_obj->post_content, '[' . $shortcode ) !== false ) {
		$found = true;
	}
	return $found;
}

function wonder_excerpt_length( $length ) {
	 // GET VALUE FROM CUSTOMIZER
	$excerpt_length = get_theme_mod( 'post_excerpt', '25' );

	return $excerpt_length;
}
add_filter( 'excerpt_length', 'wonder_excerpt_length', 999 );

function wonder_new_excerpt_more( $more ) {
	global $post;
	return '...&nbsp;';
}
add_filter( 'excerpt_more', 'wonder_new_excerpt_more' );

if ( ! function_exists( 'wonder_post_sharing' ) ) {
	function wonder_post_sharing() {
		if ( is_single() ) {

			// SOCIAL META
			global $post;
			$postid = $post->ID;

			$feat_image      = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
			$twitter_profile = get_theme_mod( 'twitter_profile' ); ?>

			  <div class="post-share">
						 <h6><?php esc_html_e( 'Share via:&nbsp;', 'wonder' ); ?>	</h6>
					 <ul>
						 <li class="twitter"><a href="http://twitter.com/share?text=<?php the_title(); ?> <?php
							if ( $twitter_profile != '' ) {
								echo 'via @' . $twitter_profile . ''; }
?>
" target="_blank" class="button small twitter"><?php esc_html_e( 'Twitter', 'wonder' ); ?></a></li>
						 <li class="facebook"><a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" class="button small facebook" target="blank"><?php esc_html_e( 'Facebook', 'wonder' ); ?></a></li>
						 <li class="google-plus"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="button small google-plus"><?php esc_html_e( 'Google Plus', 'wonder' ); ?></a></li>
						 <li class="pinterest"><a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo esc_url( $feat_image ); ?>&url=<?php the_permalink(); ?>&is_video=false&description=<?php the_title(); ?>" class="button small pinterest" target="blank"><?php esc_html_e( 'Pinterest', 'wonder' ); ?></a></li>
					 </ul>

			  </div><!-- END .post-share -->

			<?php
		}
	}
	add_action( 'wonder_post_sharing', 'wonder_post_sharing' );
}

if ( ! function_exists( 'wonder_get_related_posts' ) ) {
	function wonder_get_related_posts( $post_id, $taxonomy, $args = array() ) {
		$terms = wp_get_object_terms( $post_id, $taxonomy );

		if ( count( $terms ) ) {
			$post      = get_post( $post_id );
			$our_terms = array();
			foreach ( $terms as $term ) {
				$our_terms[] = $term->slug;
			}
			$args  = wp_parse_args(
				$args, array(
					'post_type'    => $post->post_type,
					'post__not_in' => array( $post_id ),
					'tax_query'    => array(
						array(
							'taxonomy' => $taxonomy,
							'terms'    => $our_terms,
							'field'    => 'slug',
							'operator' => 'IN',
						),
					),
					'orderby'      => 'rand',
					'meta_key'     => '_thumbnail_id', // LOAD POSTS ONLY WITH FEAT IMAGES
				)
			);
			$query = new WP_Query( $args );
			return $query;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'wonder_background_styles' ) ) {
	function wonder_background_styles() {
		 $bgimage      = get_post_meta( get_the_ID(), '_bean_bgimage', true );
		 $bgcolor      = get_post_meta( get_the_ID(), '_bean_bgcolor', true );
		 $bgwidth      = get_post_meta( get_the_ID(), '_bean_bgwidth', true );
		 $bgattachment = get_post_meta( get_the_ID(), '_bean_bgattachment', true );
		 $bgrepeat     = get_post_meta( get_the_ID(), '_bean_bgrepeat', true );

		 echo '<style type="text/css" media="all">';

			echo '#media-container {';
		if ( $bgcolor !== '' ) {
			echo 'background-color: ' . $bgcolor . ';'; }
		if ( $bgwidth == 'pattern' && $bgimage ) {
			echo 'background-image: ' . 'url(' . $bgimage . ');'; }
		if ( $bgwidth == 'fullwidth' && $bgimage ) {
			echo 'background-image: ' . 'url(' . $bgimage . ');'; }
		if ( $bgwidth == 'fullwidth' && $bgimage ) {
			echo '-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;'; }
		if ( $bgimage && $bgattachment ) {
			echo 'background-attachment: ' . $bgattachment . ';'; }
		if ( $bgimage && $bgrepeat ) {
			echo 'background-repeat: ' . $bgrepeat . ';'; }

			echo '}';

		echo '</style>';

	} //END function wonder_background_styles()
	add_action( 'wp_head', 'wonder_background_styles' );
} //END if ( !function_exists('wonder_background_styles') )

if ( ! function_exists( 'wonder_sticky_header' ) ) {
	function wonder_sticky_header() {
		if ( get_theme_mod( 'sticky_navigation' ) == true ) {
			?>
			<script>
			jQuery(document).ready(function($) {
				//STICKY NAV - WAYPOINTS
				$('#primary-nav').waypoint('sticky');
				$('.logged-in #primary-nav').waypoint('sticky', {
				  offset: 28
				});
			});
			</script>

		<?php
		}
	}
}
add_action( 'wp_head', 'wonder_sticky_header' );

function wonder_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		extract( $args, EXTR_SKIP );

	if ( 'div' == $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">

	<?php if ( 'div' != $args['style'] ) : ?>

		<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">

	<?php endif; ?>

	<div class="two columns hide-for-small">
		<div class="comment-avatar">
			<?php
			if ( $args['avatar_size'] != 0 ) {
				echo get_avatar( $comment );}
?>
		</div>
	</div>

	<div class="ten columns mobile-four">
		<div class="comment-author vcard">
			<?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
			<div class="comment-meta commentmetadata">
				<?php
				// AUTHOR TAG
				$isByAuthor = false;
				if ( $comment->comment_author_email == get_the_author_meta( 'email' ) ) {
					$isByAuthor = true; }
				?>

				<?php
				if ( $isByAuthor ) {
?>
<span class="author-tag"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php esc_html_e( '(Author)', 'wonder' ); ?></a></span><?php } ?>

				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf( __( '%1$s', 'wonder' ), get_comment_date() ); ?></a>&nbsp;&middot&nbsp;</span>
									<?php
									comment_reply_link(
										array_merge(
											$args, array(
												'add_below' => $add_below,
												'depth' => $depth,
												'max_depth' => $args['max_depth'],
											)
										)
									);
?>
<?php edit_comment_link( __( 'Edit', 'wonder' ), '&nbsp;&middot&nbsp;', '' ); ?>
			</div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<span class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'wonder' ); ?></span>
		<?php endif; ?>
		</div>

		<?php comment_text(); ?>

		<?php
		if ( 'div' != $args['style'] ) :
?>
</div><?php endif; ?>
	</div>
<?php
}


if ( ! function_exists( 'wonder_ping' ) ) {
	function wonder_ping( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		?>

		<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>

		<?php
	} //END //function wonder_ping($comment, $args, $depth)
}//END if ( !function_exists( 'wonder_ping' ) )


function wonder_custom_form_filters( $args = array(), $post_id = null ) {

	global $id;

	if ( null === $post_id ) {
		$post_id = $id;
	} else {
		$id = $post_id;
	}

	$commenter     = wp_get_current_commenter();
	$user          = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$req = get_option( 'require_name_email' );

	$fields = array(
		'author' => '
			<div class="comment-form-author clearfix">
			<label for="author">' . __( 'Name:', 'wonder' ) . ( '<span class="required">*</span>' ) . '</label>
			<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required/>
			</div>',

		'email'  => '
			<div class="comment-form-email clearfix">
			<label for="email">' . __( 'Email:', 'wonder' ) . ( '<span class="required">*</span>' ) . '</label>
			<input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" required/>
			</div>',

		'url'    => '
			<div class="comment-form-url clearfix">
			<label for="url">' . __( 'Website:', 'wonder' ) . '</label>
			<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"/>

			</div>',

	);

	$required_text = sprintf( ' ' . __( 'Required fields are marked %s', 'wonder' ), '<span class="required">*</span>' );

	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<label for="comment">' . __( 'Comment:', 'wonder' ) . ( '<span class="required">*</span>' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea>',
		'',

		'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'wonder' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Currently logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Logout</a>.', 'wonder' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => null,
		'comment_notes_after'  => null,
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'class_submit'         => 'submit',
		'name_submit'          => 'submit',
		'submit_field'         => '<p class="form-submit">%1$s %2$s</a>',
		'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
		'title_reply'          => sprintf( __( 'Leave a Comment.', 'wonder' ) ),
		'title_reply_to'       => __( 'Leave a Reply to %s', 'wonder' ),
		'cancel_reply_link'    => __( 'Cancel', 'wonder' ),
		'label_submit'         => __( 'Submit Comment', 'wonder' ),
	);

	return $defaults;

}
add_filter( 'comment_form_defaults', 'wonder_custom_form_filters' );

if ( ! function_exists( 'wonder_pingback_header' ) ) :
	/**
	 * Add a pingback url auto-discovery header for singularly identifiable articles.
	 */
	function wonder_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
		}
	}
	add_action( 'wp_head', 'wonder_pingback_header' );
endif;

/**
 * Customizer.
 */
require get_theme_file_path( '/inc/customizer/customizer.php' );
require get_theme_file_path( '/inc/customizer/customizer-css.php' );

/**
 * Template tags.
 */
require get_theme_file_path( '/inc/template-tags.php' );

/**
 * Widgets.
 */
require get_theme_file_path( '/inc/widgets/widget-flickr.php' );
require get_theme_file_path( '/inc/widgets/widget-newsletter.php' );
require get_theme_file_path( '/inc/widgets/widget-portfolio.php' );
require get_theme_file_path( '/inc/widgets/widget-portfolio-menu.php' );
require get_theme_file_path( '/inc/widgets/widget-portfolio-taxonomy.php' );

/**
 * Metaboxes.
 */
if ( is_admin() ) {
	require get_theme_file_path( '/inc/meta/meta-page.php' );
	require get_theme_file_path( '/inc/meta/meta-post.php' );
	require get_theme_file_path( '/inc/meta/meta-portfolio.php' );
}

/**
 * Admin specific functions.
 */
require get_parent_theme_file_path( '/inc/admin/init.php' );

/**
 * Disable Merlin WP.
 */
function themebeans_merlin() {}

/**
 * Disable Dashboard Doc.
 */
function themebeans_guide() {}
