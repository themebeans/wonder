<?php
/**
 * Enqueues front-end CSS for Customizer options.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

/**
 * Set the Custom CSS via Customizer options.
 */
function wonder_customizer_css() {
		$body_custom_background_color = get_theme_mod( 'body_custom_background_color', '#FFF' );
		$body_text_color              = get_theme_mod( 'body_text_color', '#333333' );
		$theme_accent_color           = get_theme_mod( 'theme_accent_color', '#2AC176' );
		$overlay_color                = get_theme_mod( 'overlay_color', '#2AC176' );
		$overlay_text_color           = get_theme_mod( 'overlay_text_color', '#FFF' );
	?>


<style>
<?php
$customizations                       =
'
body { background-color:' . $body_custom_background_color . '!important; }

p,
body,
a:hover,
.theme-tagline p a:hover,
.entry-content p a:hover { color:' . $body_text_color . '; }

.bean-tabs .bean-tab,
.bean-toggle .target { color: ' . $body_text_color . '!important;}

a,
.cats,
blockquote,
.entry-content p a,
.entry-title a:hover,
.logged-in-as a:hover,
.comment-meta a:hover,
.comment-author a:hover,
.entry-meta-after a:hover,
.comment-meta .author-tag a,
.entry-content blockquote p,
.archives-list ul li a:hover,
.bean-tabs > li.active > a,
.entry-content .bean-panel-title > a:hover { color: ' . $theme_accent_color . '; }

.btn,
.button,
.new-tag,
.bean-shot,
.tagcloud a,
button.button,
div.jp-play-bar,
.flickr_badge_image,
.btn[type="submit"],
input[type="button"],
input[type="reset"],
input[type="submit"],
.button[type="submit"],
div.jp-volume-bar-value,
.pagination.index a:hover,
.bean-control-paging li a:hover,
.bean-control-paging li a.bean-active  { background-color: ' . $theme_accent_color . '; }

.bean-quote,
.instagram_badge_image,
.bean500px_badge_image,
.widget_bean_portfolio ul li,
.featurearea_icon .icon { background-color: ' . $theme_accent_color . '!important; }
.isotope-item, .post-thumb:hover  { background-color: ' . $overlay_color . '; }
.portfolio-overlay h5 { color: ' . $overlay_text_color . '; }
';

// IF PORTFOLIO SCALING IS CHECKED
if ( get_theme_mod( 'portfolio_scale' ) == true ) {
?>
.post-thumb a img:hover,
.isotope-item img:hover {
	-webkit-transform:scale(2.5);
	   -moz-transform:scale(2.5);
		 -o-transform:scale(2.5);
			transform:scale(2.5);
}
<?php
}

if ( get_theme_mod( 'portfolio_overlay' ) == false ) {
	echo '.isotope-item img:hover {opacity: 1!important;} ';
}

$css_filter_style = get_theme_mod( 'portfolio_css_filter' );
if ( $css_filter_style != '' ) {
	switch ( $css_filter_style ) {
		case 'none':
			break;
		case 'grayscale':
			echo '.isotope-item img{ -webkit-filter: grayscale(100%); }';
			echo '.isotope-item img:hover { -webkit-filter: grayscale(0%); }';
			break;
		case 'sepia':
			echo '.isotope-item img { -webkit-filter: sepia(80%); }';
			break;
		case 'saturation':
			echo '.isotope-item img { -webkit-filter: saturate(200%); }';
			echo '.isotope-item img:hover  { opacity: .05!important; }';
			break;
	}
}

$final_output = preg_replace( '#/\*.*?\*/#s', '', $customizations );
$final_output = preg_replace( '/\s*([{}|:;,])\s+/', '$1', $final_output );
$final_output = preg_replace( '/\s\s+(.*)/', '$1', $final_output );

echo $final_output;

$bgcolor     = get_post_meta( get_the_ID(), '_bean_bgcolor', true );
$accentcolor = get_post_meta( get_the_ID(), '_bean_accentcolor', true );

if ( is_singular( 'portfolio' ) ) {
	if ( $bgcolor != '' or $accentcolor != '' ) {
		if ( $bgcolor != '' ) {
			echo '#media-container {';
			if ( $bgcolor != '' ) {
				echo 'background-color: ' . $bgcolor . '!important;}'; }
		}
		if ( $accentcolor != '' ) {
			echo '.entry-meta a:hover { color: ' . $accentcolor . '!important;}';
			echo '.entry-content p a,.copyright a:hover, a .logo_text:hover { color: ' . $accentcolor . ';}';
			echo '.jp-play-bar,.isotope-item,div.jp-volume-bar-value,.bean-control-paging li a.bean-active,.bean-control-paging li a:hover { background-color: ' . $accentcolor . '!important;}';
		}
	}
}
	?>

</style>

<?php
}
add_action( 'wp_head', 'wonder_customizer_css', 1 );
