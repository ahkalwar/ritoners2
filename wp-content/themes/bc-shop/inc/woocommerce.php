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


remove_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5 );
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb',20 );
remove_action( 'woocommerce_sidebar','woocommerce_get_sidebar',10 );

add_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_single_excerpt',84 );

remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_title',5 );
remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_rating',10 );
remove_action( 'woocommerce_single_product_summary','woocommerce_template_single_price',10 );

remove_action( 'woocommerce_cart_collaterals','woocommerce_cross_sell_display' );
add_action( 'bcshop_shop_cross_sell_display','woocommerce_cross_sell_display');


function woocommerce_show_page_title_callback( $title ) {
    return false;
}
add_filter( 'woocommerce_show_page_title', 'woocommerce_show_page_title_callback' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function bcshop_woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'bcshop_woocommerce_products_per_page' );

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function bcshop_shop_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'bcshop_shop_woocommerce_setup' );


/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
 
function bcshop_register_post_type_product_filter( $filters ){
	$filters['description'] = '';
	return $filters;
}
add_filter('woocommerce_register_post_type_product','bcshop_register_post_type_product_filter');


function bcshop_shop_woocommerce_scripts() {
	
	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'bcshop-woocommerce-style', $inline_font );
	
	wp_enqueue_style( 'bcshop-woocommerce-style', get_stylesheet_directory_uri() . '/assets/woocommerce/woocommerce.css' );
}
add_action( 'wp_enqueue_scripts', 'bcshop_shop_woocommerce_scripts' );

/**
 * WooCommerce Theme Layout.
 *
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'bcshop_shop_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function bcshop_shop_woocommerce_wrapper_before() {
		/**
		* Hook - bcshop_page_container_start.
		*
		* @hooked bcshop_page_wrp_container_start - 10
		* @hooked bcshop_page_column - 20
		*/
		//Shop Page Layout Style 
		 
		do_action('bc_business_consulting_page_layout_start','no-sidebar');
	}
}
add_action( 'woocommerce_before_main_content', 'bcshop_shop_woocommerce_wrapper_before' );

if ( ! function_exists( 'bcshop_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function bcshop_woocommerce_wrapper_after() {
		/**
		* Hook - bcshop_page_container_end.
		*
		* @hooked bcshop_page_column_end - 10
		* @hooked bcshop_page_sidebar - 20
		* @hooked bcshop_page_wrp_container_end - 30
		*/
		do_action('bc_business_consulting_page_layout_end','no-sidebar');
		
	}
}
add_action( 'woocommerce_after_main_content', 'bcshop_woocommerce_wrapper_after' );


/**
 * WooCommerce Shop Loop.
 *
 */
 
 /* 
 BASE ON LOOP PRODUCT ( content-product.php )
*/

if ( ! function_exists( 'bcshop_woocommerce_template_loop_product_link_open' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function bcshop_woocommerce_template_loop_product_link_open() {
		echo '<div class="product-wrap">';
	}
	remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);
	add_action('woocommerce_before_shop_loop_item','bcshop_woocommerce_template_loop_product_link_open',40);
}

if ( ! function_exists( 'bcshop_woocommerce_template_loop_product_link_close' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function bcshop_woocommerce_template_loop_product_link_close() {
		
		echo '</div><div class="clearfix"></div> ';
	}
	remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',10);
	add_action('woocommerce_after_shop_loop_item','bcshop_woocommerce_template_loop_product_link_close',10);
}


if ( ! function_exists( 'bcshop_thumbnail_template_loop_add_to_cart' ) ) {

	/**
	 * Get the add to cart template for the loop.
	 *
	 * @param array $args Arguments.
	 */
	function bcshop_thumbnail_template_loop_add_to_cart( $args = array() ) {
		global $product;

		if ( $product ) {
			$defaults = array(
				'quantity'   => 1,
				'class'      => implode( ' ', array_filter( array(
					'',
					'product_type_' . $product->get_type(),
					$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
					$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
				) ) ),
				'attributes' => array(
					'data-product_id'  => $product->get_id(),
					'data-product_sku' => $product->get_sku(),
					'aria-label'       => $product->add_to_cart_description(),
					'rel'              => 'nofollow',
				),
			);

			$args = apply_filters( 'bcshop_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

			wc_get_template( 'loop/add-to-cart-thumbnail.php', $args );
		}
	}
}

if ( ! function_exists( 'bcshop_woocommerce_template_loop_product_thumbnail' ) ) {
	
	//remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		
	add_action( 'bcshop_loop_add_to_cart', 'bcshop_thumbnail_template_loop_add_to_cart', 10 );

	/**
	 * Get the product thumbnail for the loop.
	 */
	function bcshop_woocommerce_template_loop_product_thumbnail() {
		global $product;
		$attachment_ids   = $product->get_gallery_image_ids();
		
		
		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
		echo '<div class="product-image">';
		
			if( isset( $attachment_ids[0] ) && $attachment_ids[0] != "" ) {
			
				$img_tag = array(
				'class'         => 'woo-entry-image-secondary',
				'alt'           => get_the_title(),
				);
				
			
				echo '<figure class="hover_hide">'. woocommerce_get_product_thumbnail() . wp_get_attachment_image( $attachment_ids[0], 'shop_catalog', '', $img_tag ) .'</figure>';

			}else{
				echo '<figure>'.woocommerce_get_product_thumbnail().'</figure>';	
			}
			
			
			
			echo '<div class="product-caption"> <ul class="caption-list-product">';
			
			echo '<li>';
				do_action( 'bcshop_loop_add_to_cart' );
			echo '</li>';
				
			echo '<li><a href="' . esc_url( $link ) . '" data-toggle="tooltip" title="'.esc_html__( 'Read more', 'bc-shop' ).'"><i class="fa fa-eye" aria-hidden="true"></i></a></li>';
				
				
			  echo '</ul></div>';	
			
			
		echo '</div>';
	}
	remove_action( 'woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10 );
	
	add_action( 'woocommerce_before_shop_loop_item_title','bcshop_woocommerce_template_loop_product_thumbnail',10 );
	

	
}



if ( ! function_exists( 'bcshop_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function bcshop_template_loop_product_title() {
		
		echo '<h5 class="theme-loop-product__title"><a href="'.esc_url( get_the_permalink() ).'" rel="bookmark">' . get_the_title() . '</a></h5>';
	}
	
	remove_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10 );
	add_action( 'woocommerce_shop_loop_item_title','bcshop_template_loop_product_title',10 );
}


if ( ! function_exists( 'bcshop_loop_item_title' ) ) {
	
	add_action( 'woocommerce_shop_loop_item_title', 'bcshop_loop_item_title', 1 );
	function bcshop_loop_item_title(){
		echo '<div class="loop-product-details">';
	}
	
}

if ( ! function_exists( 'bcshop_template_loop_price' ) ) {
	
	add_action( 'woocommerce_template_loop_price', 'bcshop_template_loop_price', 99 );
	function bcshop_template_loop_price(){
		echo '</div>';
	}
	
}



add_filter( 'woocommerce_upsell_display_args', 'custom_woocommerce_upsell_display_args' );

function custom_woocommerce_upsell_display_args( $args ) {
  $args['posts_per_page'] = 6; // Change this number
  $args['columns']        = 3; // This is the number shown per row.
  return $args;
}

add_filter( 'woocommerce_cross_sells_columns', 'bcshop_change_cross_sells_columns' );
 
function bcshop_change_cross_sells_columns( $columns ) {
	return 3;
}


if ( ! function_exists( 'bcshop_loop_shop_per_page' ) ) :
	/**
	 * Returns correct posts per page for the shop
	 *
	 * @since 1.0.0
	 */
	function bcshop_loop_shop_per_page() {
		
		$posts_per_page = ( isset( $_GET['products-per-page'] ) ) ? sanitize_text_field( wp_unslash( $_GET['products-per-page'] ) ) : get_theme_mod( 'shopstore_woo_shop_posts_per_page',12 );

		if ( $posts_per_page == 'all' ) {
			$posts_per_page = wp_count_posts( 'product' )->publish;
		}
		
		return $posts_per_page;
	}
	add_filter( 'loop_shop_per_page', 'bcshop_loop_shop_per_page', 20 );
endif;