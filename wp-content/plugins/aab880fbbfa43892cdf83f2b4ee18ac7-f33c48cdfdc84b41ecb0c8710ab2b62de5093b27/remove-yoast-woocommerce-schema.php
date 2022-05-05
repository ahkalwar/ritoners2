<?php
/*
Plugin Name: Yoast SEO: WooCommerce Structured Data Remover
Version: 0.1.0
Description: Removes Structured Data generated from Yoast SEO for WooCommerce.
*/

add_action( 'init', 'wbud_yoast_seo_structured_data_remover' );

function wbud_yoast_seo_structured_data_remover() {
	global $wp_filter;

	if ( is_admin() ) {
		return;
	}

	if ( ! isset( $wp_filter ) ) {
		return;
	}

	if ( ! isset( $wp_filter['wp_footer'] ) ) {
		return;
	}

	$callbacks = $wp_filter['wp_footer']->callbacks;

	if ( ! is_array( $callbacks ) ) {
		return;
	}

	foreach ( $callbacks as $key => $actions ) {

		if ( ! is_array( $actions ) ) {
			continue;
		}

		foreach ( $actions as $actualKey => $priorities ) {

			if ( ! is_array( $priorities['function'] ) ) {
				continue;
			}

			if ( ! is_object( $priorities['function'][0] ) ) {
				continue;
			}

			if ( $priorities['function'][0] instanceof WPSEO_WooCommerce_Schema && $priorities['function'][1] == 'output_schema_footer' ) {
				unset( $wp_filter['wp_footer']->callbacks[ $key ][ $actualKey ] );
			}

		}

	}
}