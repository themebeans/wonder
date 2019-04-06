<?php
/**
 * Custom admin functions for this theme.
 *
 * @package Wonder
 */

/**
 * Load theme updater functions.
 * Action is used so that child themes can easily disable.
 */
function wonder_theme_updater() {

	// Remove if this is an Envato hosted environment.
	if ( themebeans_is_envato_hosted() ) {
		return;
	}

	require( get_template_directory() . '/inc/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'wonder_theme_updater' );
