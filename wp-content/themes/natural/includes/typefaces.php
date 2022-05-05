<?php
/**
 * Google Fonts Implementation
 *
 * @package Natural
 * @since Natural 1.0
 */

/**
 * Set Google Fonts Urls
 *
 * @since Natural 1.0
 */
function natural_fonts_url() {
	$fonts_url = '';

	/*
	Translators: If there are characters in your language that are not
	* supported by Lora, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$montserrat   = _x( 'on', 'Montserrat font: on or off', 'natural' );
	$roboto       = _x( 'on', 'Roboto font: on or off', 'natural' );
	$merriweather = _x( 'on', 'Merriweather font: on or off', 'natural' );
	$roboto_slab  = _x( 'on', 'Roboto Slab font: on or off', 'natural' );

	if ( 'off' !== $montserrat || 'off' !== $roboto || 'off' !== $merriweather || 'off' !== $roboto_slab ) {
		$font_families = array();

		if ( 'off' !== $montserrat ) {
			$font_families[] = 'Montserrat:400,700';
		}

		if ( 'off' !== $roboto ) {
			$font_families[] = 'Roboto:400,300italic,300,500,400italic,500italic,700,700italic';
		}

		if ( 'off' !== $merriweather ) {
			$font_families[] = 'Merriweather:400,700,300,900';
		}

		if ( 'off' !== $roboto_slab ) {
			$font_families[] = 'Roboto Slab:400,700,300,100';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue Google Fonts on Front End
 *
 * @since Natural 1.0
 */
function natural_scripts_styles() {
	wp_enqueue_style( 'natural-fonts', natural_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'natural_scripts_styles' );

/**
 * Add Google Scripts for use with the editor
 *
 * @since natural 1.0
 */
function natural_editor_styles() {
	add_editor_style( array( 'css/style-editor.css', natural_fonts_url() ) );
}
add_action( 'after_setup_theme', 'natural_editor_styles' );

if ( ! function_exists( 'natural_block_editor_styles' ) ) {

	/**
	 * Add Google Scripts for use with the block editor
	 *
	 * @since Natural 1.0
	 */
	function natural_block_editor_styles() {
		wp_enqueue_style( 'natural-fonts', natural_fonts_url(), array(), '1.0' );
	}
}
add_action( 'enqueue_block_editor_assets', 'natural_block_editor_styles' );
