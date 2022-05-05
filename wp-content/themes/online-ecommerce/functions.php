<?php
/**
 * Describe child theme functions
 *
 * @package Buzzstore
 * @subpackage Online eCommerce
 * 
 */

/*-------------------------------------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'online_eCommerce_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function online_eCommerce_setup() {
    
    $online_eCommerce_theme_info = wp_get_theme();
    $GLOBALS['online_eCommerce_version'] = $online_eCommerce_theme_info->get( 'Version' );
}
endif;

add_action( 'after_setup_theme', 'online_eCommerce_setup' );

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Managed the theme default color
 */
function online_eCommerce_customize_register( $wp_customize ) {

		global $wp_customize;

        /**
          * Theme Primary Color
        */
        $wp_customize->add_section( 'online_eCommerce_primary_theme_color', array(
          'title'    => esc_html__('Primary Color Options', 'online-eCommerce'),
          'priority' => 2,
        ));

            $wp_customize->add_setting('online_eCommerce_primary_theme_color_options', array(
                'default' => '#e63737',
                'sanitize_callback' => 'sanitize_hex_color',        
            ));

            $wp_customize->add_control('online_eCommerce_primary_theme_color_options', array(
                'type'     => 'color',
                'label'    => esc_html__('Primary Colors', 'online-eCommerce'),
                'section'  => 'online_eCommerce_primary_theme_color',
                'setting'  => 'online_eCommerce_primary_theme_color_options',
            ));

	}

add_action( 'customize_register', 'online_eCommerce_customize_register', 20 );

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue child theme styles and scripts
 */
add_action( 'wp_enqueue_scripts', 'online_eCommerce_scripts', 20 );

function online_eCommerce_scripts() {
    
    global $online_eCommerce_version;
    
    wp_dequeue_style( 'buzzstore-style' );
    
	wp_enqueue_style( 'buzzstore-parent-style', get_template_directory_uri() . '/style.css', array(), esc_attr( $online_eCommerce_version ) );

    wp_enqueue_style( 'online-eCommerce-style', get_stylesheet_uri(), array(), esc_attr( $online_eCommerce_version ) );
    
    
    $online_eCommerce_primary_theme_color = get_theme_mod( 'online_eCommerce_primary_theme_color_options', '#e63737' );
    
    $output_css = '';
    

    $output_css .= "button, input[type='button'], input[type='reset'], input[type='submit'], .buzz-cart-main:before, .buzz-menulink, .buzz-menulink ul ul, .buzz-menulink ul ul li:hover, .starSeparator:before, .starSeparator:after, #main-slider .main-slider_buttons a:before, .widget_buzzstore_cat_widget_area .product-item .buzz-categorycount, .product-filter li a:before, .buzz-sale-label, .woocommerce a.button.add_to_cart_button, .woocommerce a.added_to_cart, .woocommerce a.button.product_type_grouped, .woocommerce a.button.product_type_external, .woocommerce a.button.product_type_variable, .woocommerce a.added_to_cart:before, .woocommerce a.button.add_to_cart_button:before, .woocommerce a.button.product_type_grouped:before, .woocommerce a.button.product_type_external:before, .woocommerce a.button.product_type_variable:before, .payment_card .buzz-socila-link li a, .goToTop, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .widget_search .search-form .search-submit, .buzz-news-tag ul li:first-child, .buzz-news-tag ul li:hover, .nav-previous a, .nav-next a, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #payment #place_order, .woocommerce-page #payment #place_order, .woocommerce-account .woocommerce-MyAccount-navigation ul li a, .product-item_tip, .wishlist_table td.product-name a.button:hover, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .buzz-block-subtitle, .widget_shopping_cart_content .buttons a.wc-forward:before, .woocommerce .widget_shopping_cart .cart_list li a.remove:hover, .woocommerce.widget_shopping_cart .cart_list li a.remove:hover, .woocommerce-loop-category__title, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle { background-color: ". esc_attr( $online_eCommerce_primary_theme_color ) ."}\n";

    $output_css .= ".woocommerce div.product .woocommerce-tabs ul.tabs li:hover, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .gridlist-toggle a.active, .gridlist-toggle a:hover, .gridlist-toggle a:focus, .gridlist-toggle a { background-color: ". esc_attr( $online_eCommerce_primary_theme_color ) ." !important; }\n";
    
    $output_css .= ".buzz-site-title a, .buzz-topheader .buzz-topright ul li span, .buzz-topheader .buzz-topleft ul li a:hover, .buzz-topheader .buzz-topright ul li a:hover, .buzz-topheader .buzz-topleft ul.buzz-socila-link li span:hover, .buzz-topheader .buzz-topleft ul li span, .owl-main-slider.owl-carousel .owl-controls .owl-buttons div:hover i, .starSeparator .icon-star, .woocommerce a.button.add_to_cart_button:hover, li.product a.added_to_cart:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce .widget-area a.clear-all:hover, .woocommerce input.button:hover, .woocommerce a.button.product_type_grouped:hover, .woocommerce a.button.product_type_external:hover, .woocommerce a.button.product_type_variable:hover, .product-item-details .product-title:hover, .woocommerce ul.products li.product .price, ins, .owl-product-slider.owl-theme .owl-controls .owl-buttons div, .widget_buzzstore_blog_widget_area .header-title a:hover, .widget_buzzstore_blog_widget_area .buzzstore-blogwrap li a.btn-readmore:hover, .widget_buzzstore_blog_widget_area .buzzstore-blogwrap li a.btn-readmore:after, .buzz-services-item span, .footer .widget a:hover, .footer .widget a:hover::before, .footer .widget li:hover::before, .subfooter a:hover, .payment_card .buzz-socila-link li a:hover, .woocommerce .woocommerce-breadcrumb a, .widget a:hover, .widget a:hover::before, .widget li:hover::before, .woocommerce nav.woocommerce-pagination ul li .page-numbers, .widget_search .search-form .search-submit:hover, .breadcrumbswrap ul li a, a:hover, a:focus, a:active, .woocommerce ul.cart_list li a:hover, .woocommerce ul.product_list_widget li a:hover, .woocommerce #payment #place_order:hover, .woocommerce-page #payment #place_order:hover, .woocommerce-info:before, .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a, .woocommerce-account .woocommerce-MyAccount-navigation ul li:hover a, .woocommerce-error a.button:hover, .woocommerce-info a.button:hover, .woocommerce-message a.button:hover, .woocommerce-Message--info a.button:hover, .wishlist_table td.product-name a.button, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, button:hover, input[type='button']:hover, input[type='reset']:hover, input[type='submit']:hover, .content-area .site-main .buzz-news .buzz-content .buzz-title:hover, .widget-area ul.buzz-social-list li a, .bx-wrapper .bx-controls-direction a:hover, .widget_buzzstore_testimonial_widget_area .comment-slide-item_author i, .widget-area .widget_buzzstore_contact_info_area ul.buzz-contactwrap li span, .woocommerce-loop-category__title:hover, .woocommerce-loop-category__title:hover .count { color: ". esc_attr( $online_eCommerce_primary_theme_color ) ."}\n";
    
    $output_css .= "button, input[type='button'], input[type='reset'], input[type='submit'], .view-cart a, .owl-main-slider.owl-carousel .owl-controls .owl-buttons div:hover, #main-slider .main-slider_buttons a, #main-slider .main-slider_buttons a:hover, .product-filter li a:hover, .product-filter li a.current, .product-filter li a, .woocommerce a.button.add_to_cart_button, .woocommerce a.added_to_cart, .woocommerce a.button.product_type_grouped, .woocommerce a.button.product_type_external, .woocommerce a.button.product_type_variable, .buzz-services-item span, .footer-widget .widget-title, ul.buzz-social-list li a:hover, .payment_card .buzz-socila-link li a, .widget-area .widget .widget-title, .cross-sells h2, .cart_totals h2, .woocommerce-billing-fields h3, .woocommerce-shipping-fields h3, #order_review_heading, .u-column1 h2, .u-column2 h2, .upsells h2, .related h2, .woocommerce-additional-fields h3, .woocommerce-Address-title h3, .woocommerce nav.woocommerce-pagination ul li, .nav-previous a:after, .nav-next a:after, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce-info, .woocommerce-account .woocommerce-MyAccount-navigation ul li a , .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a, .woocommerce-account .woocommerce-MyAccount-navigation ul li:hover a, .woocommerce-account .woocommerce-MyAccount-content, .wishlist_table td.product-name a.button, button:hover, input[type='button']:hover, input[type='reset']:hover, input[type='submit']:hover, .woocommerce div.product .woocommerce-tabs .panel, .woocommerce div.product .woocommerce-tabs ul.tabs:before, .buzz-viewcartproduct .widget_shopping_cart, .widget-area ul.buzz-social-list li a, .widget-area .widget_buzzstore_contact_info_area ul.buzz-contactwrap li span, .woocommerce-loop-category__title { border-color: ". esc_attr( $online_eCommerce_primary_theme_color ) ."}\n";


    $output_css .= "ul.product-item-info li a:before{ border-top: 8px solid ". esc_attr( $online_eCommerce_primary_theme_color ) ."}\n";

    $output_css .= "@media screen and (max-width: 880px){ .buzz-menulink #primary-menu, .buzz-menulink>div>div>ul ul, .header-search_filter i {  background-color: ". esc_attr( $online_eCommerce_primary_theme_color )."}}\n";

    $output_css .= "@media screen and (max-width: 880px){ .buzz-menulink .buzz-toggle div {  background-color: #fff; }}\n";
                
    wp_add_inline_style( 'online-eCommerce-style', $output_css );
    
}