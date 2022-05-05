<?php
/**
 * Activates default theme features
 */
 
function bcshop_shop_theme_setup(){

	// Make theme available for translation.
	load_theme_textdomain( 'bc-shop', get_stylesheet_directory_uri() . '/languages' );

}

function bcshop_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'bcshop_add_woocommerce_support' );

/**
 * Register our scripts (js/css)
 */
function bcshop_enqueue_child_styles() {
	
	$parent_style = 'bc-business-consulting-parent';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'bc-business-consulting-css', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ) );
	
	wp_enqueue_script( 'customselect', get_stylesheet_directory_uri(). '/assets/js/customselect.js', 0, '', true );
	wp_enqueue_script( 'multipurpose-shop-js', get_stylesheet_directory_uri().'/assets/js/bc-shop.js', 0, '', true );
	
	}
add_action( 'wp_enqueue_scripts', 'bcshop_enqueue_child_styles',999 );



/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	
	require get_stylesheet_directory() . '/inc/helper.php';
	require get_stylesheet_directory() . '/inc/woocommerce.php';
	require get_stylesheet_directory() . '/inc/shop-toolbar.php';
	
}

/**
 * Disable things from parent
 */
if( !function_exists('bcshop_disable_from_parent') ): 

	add_action('init','bcshop_disable_from_parent',50);
	function bcshop_disable_from_parent(){
		
		remove_action( 'bc_business_consulting_custom_static_header', 'bc_business_consulting_title_in_custom_header',20 );
		remove_action( 'bc_business_consulting_posts_formats_thumbnail', 'bc_business_consulting_posts_formats_thumbnail' );
		
		remove_action( 'bc_business_consulting_footer_layout', 'bc_business_consulting_footer_layout',10 );
		
		remove_action('woocommerce_after_shop_loop_item','xoo_qv_button',11);
	}

endif;
