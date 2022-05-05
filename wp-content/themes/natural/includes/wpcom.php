<?php
/**
 * WordPress.com-specific functions and definitions
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package Natural
 */

/**
 * Adds support for WP.com print styles and responsive videos
 */
function natural_theme_support() {

        global $themecolors;

	/**
	 * Set a default theme color array for WP.com.
	 *
	 * @global array $themecolors
	 */
	if ( ! isset( $themecolors ) ) :
		$themecolors = array(
			'bg'     => 'f1ede6',
			'border' => 'dddddd',
			'text'   => '666666',
			'link'   => '99cc33',
			'url'    => '99cc33'
		);
	endif;

	add_theme_support( 'print-style' );
}
add_action( 'after_setup_theme', 'natural_theme_support' );
