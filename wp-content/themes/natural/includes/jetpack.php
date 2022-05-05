<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Natural
 * @since Natural 1.0
 */

/**
 * Add support for Jetpack's Featured Content and Infinite Scroll
 */
function natural_jetpack_setup() {

	// See: http://jetpack.me/support/infinite-scroll/
	add_theme_support( 'infinite-scroll', array(
		'container' 			=> 'infinite-container',
		'footer'         	=> 'wrap',
		'wrapper'					=> false,
		'render' 					=> 'natural_render_IS',
		'footer_widgets' 	=> array( 'footer' ),
	) );

	// See: http://jetpack.me/support/featured-content/
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'natural_get_featured_posts',
		'max_posts' => 10,
	) );

	// See: https://jetpack.me/support/responsive-videos/
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Portfolio Custom Post Type.
	add_theme_support( 'jetpack-portfolio' );

}
add_action( 'after_setup_theme', 'natural_jetpack_setup' );

/**
 * Infinite Scroll: function for rendering posts
 */
function natural_render_IS() {

	if ( class_exists( 'WooCommerce' ) && ( natural_woocommerce_is_shop_page() || is_product_taxonomy() || is_product_category() || is_product_tag() ) ) {
		woocommerce_product_loop_start();
	} elseif ( is_archive() || is_search() ) {
		echo '<div class="infinite-rendered">';
	}

	if ( class_exists( 'WooCommerce' ) && ( natural_woocommerce_is_shop_page() || is_product_taxonomy() || is_product_category() || is_product_tag() ) ) {
		while ( have_posts() ) :
			the_post();
			wc_get_template_part( 'content', 'product' );
		endwhile; // end of the loop.
		wp_reset_postdata();
	} elseif ( is_archive() || is_search() ) {
		get_template_part( 'content/loop', 'archive' );
	} else {
		get_template_part( 'content/loop', 'blog' );
	}

	if ( class_exists( 'WooCommerce' ) && ( natural_woocommerce_is_shop_page() || is_product_taxonomy() || is_product_category() || is_product_tag() ) ) {
		woocommerce_product_loop_end();
	} elseif ( is_archive() || is_search() ) {
		echo '</div>';
	}

}

/**
 * Featured Content: get our featured posts
 */
function natural_get_featured_posts() {
	return apply_filters( 'natural_get_featured_posts', array() );
}

/**
 * Featured Content: check if we have at least one post in our FC tag
 */
function natural_has_featured_posts( $minimum = 1 ) {
	if ( is_paged() ) {
		return true; }

	$minimum = absint( $minimum );
	$featured_posts = apply_filters( 'natural_get_featured_posts', array() );

	if ( ! is_array( $featured_posts ) ) {
		return false; }

	if ( $minimum > count( $featured_posts ) ) {
		return false; }

	return true;
}
