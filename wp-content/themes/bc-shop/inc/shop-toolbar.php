<?php
/**
 * Functions hooked to post page.
 *
 * @package Bc Shop
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/* 
 TOOL BAR
*/
remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);

if ( ! function_exists( 'bcshop_header_toolbar_start' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function bcshop_header_toolbar_start() {
		echo '<div class="multipurpose-shop-toolbar clearfix">';
	}
	
	add_action('woocommerce_before_shop_loop','bcshop_header_toolbar_start',20);
}

if ( ! function_exists( 'bcshop_grid_list_buttons' ) ) :
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
function bcshop_grid_list_buttons() {

	// Titles
	$grid_view = esc_html__( 'Grid view', 'bc-shop' );
	$list_view = esc_html__( 'List view', 'bc-shop' );

	// Active class
	$grid = 'active ';
	$list = '';

	$output = sprintf( '<nav class="multipurpose-shop-grid-list"><a href="#" id="multipurpose-shop-grid" title="%1$s" class="%2$sgrid-btn"><i class="fa fa-th-large" aria-hidden="true"></i></a><a href="#" id="multipurpose-shop-list" title="%3$s" class="%4$slist-btn"><i class="fa fa-list" aria-hidden="true"></i></a></nav>', esc_html( $grid_view ), esc_attr( $grid ), esc_html( $list_view ), esc_attr( $list ) );

	echo wp_kses_post( apply_filters( 'bcshop_grid_list_buttons_output', $output ) );
}
add_action('woocommerce_before_shop_loop','bcshop_grid_list_buttons',25);
endif;


function bcshop_result_count() {
	get_template_part( 'woocommerce/result-count' );
}
add_action('woocommerce_before_shop_loop','bcshop_result_count',30);


if ( ! function_exists( 'bcshop_header_toolbar_end' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function bcshop_header_toolbar_end() {
		echo '<div class="clearfix"></div></div>';
	}
	
	add_action('woocommerce_before_shop_loop','bcshop_header_toolbar_end',30);
}





