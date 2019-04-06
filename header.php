<?php
/**
 * The Header template for our theme.
 *
 * Displays all of the <head> section that is pulled on every page.
 *
 * @package     Wonder
 * @link        https://themebeans.com/themes/wonder
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}

	if ( true === get_theme_mod( 'header_overlay' ) && ! is_page_template( 'template-comingsoon.php' ) && ! is_page_template( 'template-underconstruction.php' ) ) {
		get_template_part( 'header', 'overlay' );
	}

	if ( ! is_page_template( 'template-comingsoon.php' ) && ! is_page_template( 'template-underconstruction.php' ) ) {
		?>
		<nav id="#mobile-nav" class="nav clearfix show-for-small animated" role="navigation">
			<?php
			if ( function_exists( 'wp_nav_menu' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'primary-menu',
						'sort_column'    => 'menu_order',
						'menu_class'     => 'main-menu',
					)
				);
			}
			?>
		</nav>
	<?php } ?>

	<div id="full-wrapper">

		<?php get_template_part( 'content', 'mobile-menu' ); ?>

		<div id="header-container">

			<div class="row">

				<div class="twelve columns">

					<div class="site-title">
						<?php wonder_site_logo(); ?>
					</div>

					<?php
					if ( ! is_page_template( 'template-comingsoon.php' ) && ! is_page_template( 'template-underconstruction.php' ) ) {
						?>

						<div id="primary-nav" class="main-menu hide-for-small" role="navigation">

							<?php
							if ( has_nav_menu( 'primary-menu' ) ) {
								wp_nav_menu(
									array(
										'theme_location' => 'primary-menu',
										'container'      => '',
										'menu_id'        => 'primary-menu',
										'menu_class'     => 'sf-menu main-menu',
									)
								);
							}
							?>

						</div><!-- END #primary-nav -->

						<?php
						$tagline        = get_theme_mod( 'header_tagline' );
						$global_tagline = get_theme_mod( 'display_header_tagline_global' );

						if ( $tagline ) {
							if ( false === $global_tagline ) {
								if ( is_front_page() ) {
									?>
									<div class="header-tagline eleven columns centered">
									   <p><?php echo get_theme_mod( 'header_tagline' ); ?></p>
									</div>
								<?php
								}
							} else {
								?>
								<div class="header-tagline eleven columns centered">
								   <p><?php echo get_theme_mod( 'header_tagline' ); ?></p>
								</div>

							<?php
							}
						}
					}
					?>

				</div>

			</div>

		</div>

		<?php
