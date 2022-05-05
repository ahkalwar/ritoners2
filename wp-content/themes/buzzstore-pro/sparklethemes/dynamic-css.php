<?php
/**
 * Dynamic css
*/
if ( ! function_exists( 'buzzstorepro_dynamic_css' ) ) {
    function buzzstorepro_dynamic_css() {
        
        $theme_color    = get_theme_mod('buzzstorepro_primary_color', '#86bc42');
        $rgbacolor      = buzzstorepro_hex2rgba($theme_color, 0.8);

        $buzzstorepro_colors = '';
        
        /**
         * Background Color
        */         
        $buzzstorepro_colors .= "
        .starSeparator:before, 
        .starSeparator:after,
        #main-slider .main-slider_buttons a:before,
        .layout-two .service-area .mainservices,
        .widget_buzzstorepro_promoarea_widget_area .promo-banner-section .buzz-container a.promo-banner-img .promo-banner-img-inner:hover .promo-img-info .promo-img-info-inner h3,
        .widget_buzzstorepro_team_widget_area .teaminfo .teamdetails ul.social-icons li a,
        .product-filter li a:hover, 
        .product-filter li a.current,
        .buzz-sale-label,
        .product-item_tip,
        .goToTop,
        .buzz-cart-main:before,
        .buzz-block-subtitle,
        .woocommerce .widget_shopping_cart .cart_list li a.remove:hover, 
        .woocommerce.widget_shopping_cart .cart_list li a.remove:hover,
        .widget_shopping_cart_content .buttons a.wc-forward:before,
        .sparkletheme-blogs .post .read-more:hover,
        .nav-previous a, .nav-next a,
        .buzz-comment-wrapper .buzz-media-body .buzz-prorow a:hover,
        .buzz-news-tag ul li:first-child,
        .buzz-news-tag ul li:hover,
        .not-found .buzz-backhome a,
        .woocommerce #respond input#submit.alt, 
        .woocommerce a.button.alt, 
        .woocommerce button.button.alt, 
        .woocommerce input.button.alt,
        .woocommerce #payment #place_order, 
        .woocommerce-page #payment #place_order,
        button, 
        input[type='button'], 
        input[type='reset'], 
        input[type='submit'],
        .widget_product_search .woocommerce-product-search input[type='submit'],
        .woocommerce nav.woocommerce-pagination ul li a:focus, 
        .woocommerce nav.woocommerce-pagination ul li a:hover, 
        .woocommerce nav.woocommerce-pagination ul li span.current,
        .woocommerce button.button.alt.disabled,
        .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
        .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
         body.header-four header.site-header,
        .header-four .buzz-menulink,
        .header-four .buzz-menulink ul ul,
        .buzzstorepro-slider .flex-control-nav > li > a:hover, 
        .buzzstorepro-slider .flex-control-nav > li > a.flex-active,
        .payment_card .buzz-socila-link li a,
        .wishlist_table td.product-name a.button:hover,
        .calendar_wrap caption,
        .widget_search .search-form .search-submit,
        .woocommerce-account .woocommerce-MyAccount-navigation ul li a,
        .woocommerce span.onsale,
        .page-numbers,
        .team-details .social-icons li a,
        .woocommerce a.button.add_to_cart_button, 
        .woocommerce a.added_to_cart, 
        .woocommerce a.button.product_type_grouped, 
        .woocommerce a.button.product_type_external,
        .woocommerce a.button.product_type_variable,
        .woocommerce a.added_to_cart:before, 
        .woocommerce a.button.add_to_cart_button:before, 
        .woocommerce a.button.product_type_grouped:before, 
        .woocommerce a.button.product_type_external:before,
        .woocommerce a.button.product_type_variable:before,
        .woocommerce #respond input#submit, 
        .woocommerce a.button, 
        .woocommerce button.button, 
        .woocommerce input.button,

        .wpcf7 input[type='submit'], 
        .wpcf7 input[type='button'],

        .breadcrumbswrap .entry-header h2 span,

        .bttn.sparkle-default-bttn.sparkle-outline-bttn:hover,
        .bttn.sparkle-default-bttn.sparkle-bg-bttn,
        .bttn.sparkle-default-bttn.sparkle-bg-bttn:hover,
        .sparkle_call_to_action_button,
        .sparkle_call_to_action_button:hover, 
        .sparkle_call_to_action_button:focus,
        .sparkle-dropcaps.sparkle-square,
        .social-shortcode > a:hover,
        .sparkle_tagline_box.sparkle-bg-box,
        .sparkle_toggle .sparkle_toggle_title,
        .sparkle_tab_wrap .sparkle_tab_content,
        .sparkle_tab_wrap .sparkle_tab_group .tab-title.active{
            background-color: $theme_color;
        }\n";

        /**
         * RGBA Background Color
        */         
        $buzzstorepro_colors .= "
        .widget_buzzstorepro_cat_widget_area .product-item .buzz-categorycount{
            background-color: $rgbacolor;
        }\n";


        /**
         * Responsive Background Color
        */         
        $buzzstorepro_colors .= " @media (max-width: 880px){
        .buzz-menulink .buzz-container {
            background-color: $theme_color !important;
            height:42px;
        } }\n";

        
        /**
         * RGBA Background Color
        */         
        $buzzstorepro_colors .= "
        .gridlist-toggle a{
            background-color: $rgbacolor !important;
        }\n";

        /**
         * RGBA Background Color
        */         
        $buzzstorepro_colors .= "
        .single-product .yith-wcwl-wishlistexistsbrowse.show a:hover, 
        .single-product .entry-summary .compare.button:hover, 
        .single-product .yith-wcwl-add-to-wishlist a.add_to_wishlist:hover{
            color: $theme_color !important;
        }\n";

        /**
         * Background Color ( !important )
        */         
        $buzzstorepro_colors .= "
        .gridlist-toggle a.active, 
        .gridlist-toggle a:hover, 
        .gridlist-toggle a:focus,
        .woocommerce div.product .woocommerce-tabs ul.tabs li:hover, 
        .woocommerce div.product .woocommerce-tabs ul.tabs li.active,
        .yith-woocompare-widget .compare, 
        .yith-woocompare-widget .clear-all{
            background-color: $theme_color !important;
        }\n";

        /**
         * Border Color ( !important )
        */         
        $buzzstorepro_colors .= "
        .yith-woocompare-widget .compare, 
        .yith-woocompare-widget .clear-all,
        .yith-woocompare-widget .compare:hover, 
        .yith-woocompare-widget .clear-all:hover{
            border-color: $theme_color !important;
        }\n";

        /**
         * Color ( !important )
        */         
        $buzzstorepro_colors .= "
        .yith-woocompare-widget .compare:hover, 
        .yith-woocompare-widget .clear-all:hover{
            color: $theme_color !important;
        }\n";

        /**
         * 8px Border Dynamic Color
        */         
        $buzzstorepro_colors .= "
        ul.product-item-info li a:before{
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-top: 8px solid $theme_color;
        }\n";  

        /**
         * 8px Border Dynamic Color
        */         
        $buzzstorepro_colors .= "
        .nav-previous a:after{
            border-right: 11px solid $theme_color;
            border-top: 15px solid transparent;
            border-bottom: 15px solid transparent;
        }\n";

        /**
         * 8px Border Dynamic Color
        */         
        $buzzstorepro_colors .= "
        .nav-next a:after{
            border-left: 11px solid $theme_color;
            border-top: 15px solid transparent;
            border-bottom: 15px solid transparent;
        }\n"; 
        
        $buzzstorepro_colors .= "
        body.header-two header.site-header .mainlogo_wrap .header_info_wrap > div .header_contact_details_inner .fa_icon i.fa,
        #main-slider .main-slider_buttons a,
        #main-slider .main-slider_buttons a:hover,
        .owl-main-slider.owl-carousel .owl-controls .owl-buttons div:hover,
        .product-filter li a:hover,
        .product-filter li a.current,
        .product-filter li a,
        .buzzstorepro-services-main.layout-one .service-icon i.fa,
        .footer-widget .widget-title,
        .payment_card .buzz-socila-link li a,
        .widget-area .widget .widget-title, 
        .cross-sells h2, 
        .cart_totals h2, 
        .woocommerce-billing-fields h3, 
        .woocommerce-shipping-fields h3, 
        #order_review_heading, 
        .u-column1 h2, 
        .u-column2 h2, 
        .upsells h2, 
        .related h2, 
        .woocommerce-additional-fields h3, 
        .woocommerce-Address-title h3,
        .woocommerce #respond input#submit.alt, 
        .woocommerce a.button.alt, 
        .woocommerce button.button.alt, 
        .woocommerce input.button.alt,
        .woocommerce-info,
        .team-details .social-icons li a,
        .sparkletheme-blogs .post .read-more:hover,
        .sparkletheme-blogs .post .read-more,
        .not-found .buzz-backhome a:hover,
        .not-found .buzz-backhome a,
        button, 
        input[type='button'], 
        input[type='reset'], 
        input[type='submit'],
        .widget_product_search .woocommerce-product-search input[type='submit'],
        .woocommerce nav.woocommerce-pagination ul li,
        ul.buzz-social-list li a:hover,
        .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a, 
        .woocommerce-account .woocommerce-MyAccount-navigation ul li:hover a,
        .woocommerce-account .woocommerce-MyAccount-navigation ul li a,
        .woocommerce-account .woocommerce-MyAccount-content,
        .woocommerce div.product .woocommerce-tabs .panel,
        .woocommerce div.product .woocommerce-tabs ul.tabs:before,
        .wishlist_table td.product-name a.button,
        .page-numbers:hover,
        .page-numbers,
        button:hover, 
        input[type='button']:hover, 
        input[type='reset']:hover, 
        input[type='submit']:hover,
        .buzz-viewcartproduct .widget_shopping_cart,
        .buzzstorepro-slider .flex-control-nav > li > a:hover, 
        .buzzstorepro-slider .flex-control-nav > li > a.flex-active,
        .woocommerce a.button.add_to_cart_button, 
        .woocommerce a.added_to_cart, 
        .woocommerce a.button.product_type_grouped, 
        .woocommerce a.button.product_type_external,
        .woocommerce a.button.product_type_variable,
        .woocommerce #respond input#submit, 
        .woocommerce a.button, 
        .woocommerce button.button, 
        .woocommerce input.button,

        .woocommerce-message,
        .wpcf7 input[type='submit']:hover, 
        .wpcf7 input[type='button']:hover,
        .wpcf7 input[type='submit'], 
        .wpcf7 input[type='button'],

        .bttn.sparkle-default-bttn.sparkle-outline-bttn,
        .bttn,
        .sparkle_call_to_action_button:before,
        .social-shortcode > a,
        .social-shortcode > a:hover,
        .social-shortcode > a:hover:before,
        .sparkle_tagline_box.sparkle-top-border-box,
        .sparkle_tagline_box.sparkle-left-border-box,
        .widget-area ul.buzz-social-list li a{
            border-color: $theme_color;
        }\n";

        
        /**
         * Text Color
        */
        $buzzstorepro_colors .= "
        .buzz-site-title a,
        body.header-two header.site-header .mainlogo_wrap .header_info_wrap > div .header_contact_details_inner .fa_icon i.fa,
        .header_info_wrap .phone_header a:hover span, 
        .header_info_wrap .email_header a:hover span,
        .buzz-topheader .buzz-topright ul li span,
        .buzz-topheader .buzz-topright ul li a:hover,
        .buzz-menulink ul li:hover > a, 
        .buzz-menulink ul ul > li:hover > a, 
        .buzz-menulink ul ul > li.current_page_item a, 
        .buzz-menulink ul > li.current-menu-item > a,
        .buzz-menulink ul > li.menu-item-has-children > a:after, 
        .buzz-menulink ul > li.page_item_has_children > a:after,
        .starSeparator .icon-star,
        .owl-main-slider.owl-carousel .owl-controls .owl-buttons div:hover i,
        .layout-two .service-area:hover .service-icon i, 
        .layout-two .service-area:hover .service-icon-info p, 
        .layout-two .service-area:hover .service-icon-info h5,
        .widget_buzzstorepro_team_widget_area .teaminfo .teamdetails ul.social-icons li a:hover,
        .owl-product-slider.owl-theme .owl-controls .owl-buttons div,
        .widget_buzzstorepro_blog_widget_area .header-title a:hover,
        .widget_buzzstorepro_blog_widget_area .buzzstorepro-blogwrap li a.btn-readmore:hover,
        .widget_buzzstorepro_blog_widget_area .buzzstorepro-blogwrap li a.btn-readmore:after,
        .widget_buzzstorepro_testimonial_widget_area .comment-slide-item_author i,
        .bx-wrapper .bx-controls-direction a:hover,
        .product-item-details .product-title:hover,
        .woocommerce ul.products li.product .price, ins,
        .buzzstorepro-services-main.layout-one .service-icon i.fa,
        .mainlogo-area .footer-logo .footer-buzz-logo-title h1 a,
        .footer .widget a:hover, 
        .footer .widget a:hover::before, 
        .footer .widget li:hover::before,
        .subfooter a:hover,
        .buzz-topheader .buzz-topright ul li a:hover span,
        .buzz-topheader .buzz-topleft ul li a:hover,
        .payment_card .buzz-socila-link li a:hover,
        .payment_card li a:hover span,
        .woocommerce .woocommerce-breadcrumb a,
        .breadcrumbswrap ul li a,
        .woocommerce nav.woocommerce-pagination ul li .page-numbers,
        button:hover, 
        input[type='button']:hover, 
        input[type='reset']:hover, 
        input[type='submit']:hover,
        a:hover, a:focus, a:active,
        .woocommerce-info:before,
        .widget_product_search .woocommerce-product-search input[type='submit']:hover,
        .buzz-topheader .buzz-topleft ul.buzz-socila-link li span:hover,
        .buzz-topheader .buzz-topleft ul li span,
        body.header-four header.site-header button.product-search i.fa,
        body.header-four header.site-header .buzz-cart-main:before,
        .woocommerce ul.cart_list li a:hover, 
        .woocommerce ul.product_list_widget li a:hover,
        .buzzstorepro-slider a.buzzstorepro-button:hover,
        .payment_card li a:hover,
        .woocommerce #payment #place_order:hover, 
        .woocommerce-page #payment #place_order:hover,
        .team-details h4,
        .team-details .social-icons li:hover a,
        .woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a, 
        .woocommerce-account .woocommerce-MyAccount-navigation ul li:hover a,
        .woocommerce .woocommerce-message .button,
        .wishlist_table tr td.product-stock-status span.wishlist-in-stock,
        .wishlist_table td.product-name a.button,
        .woocommerce-error a.button:hover, 
        .woocommerce-info a.button:hover, 
        .woocommerce-message a.button:hover, 
        .woocommerce-Message--info a.button:hover,
        .woocommerce-MyAccount-content a:hover, 
        .woocommerce-MyAccount-content a:hover,
        .widget_search .search-form .search-submit:hover,
        .page-numbers:hover,
        .page-numbers.current,
        .sparkletheme-blogs .post .category a,
        .sparkletheme-blogs .post .entry-title a:hover, 
        .sparkletheme-blogs .post .entry-title a:focus, 
        .sparkletheme-blogs .page .entry-title a:focus,
        .sparkletheme-blogs .post .entry-meta span a,
        .sparkletheme-blogs .post .read-more,
        .not-found .page-header h1,
        .not-found .buzz-backhome a:hover,
        .buzz-comment-left a:hover, 
        .buzz-comment-left a:hover:before, 
        .buzz-comment-wrapper .buzz-media-body a:hover,
        .widget a:hover, 
        .widget a:hover::before, 
        .widget li:hover::before,
        .woocommerce #respond input#submit.alt:hover, 
        .woocommerce a.button.alt:hover, 
        .woocommerce button.button.alt:hover, 
        .woocommerce input.button.alt:hover,
        .woocommerce div.product p.price, 
        .woocommerce div.product span.price,
        .woocommerce button.button.alt.disabled:hover,
        .footer .widget_top_rated_products .product_list_widget .product-title:hover,
        .woocommerce a.button.add_to_cart_button:hover, 
        li.product a.added_to_cart:hover, 
        .woocommerce #respond input#submit:hover, 
        .woocommerce button.button:hover, 
        .woocommerce .widget-area a.clear-all:hover, 
        .woocommerce input.button:hover, 
        .woocommerce a.button.product_type_grouped:hover, 
        .woocommerce a.button.product_type_external:hover,
        .woocommerce a.button.product_type_variable:hover,

        .woocommerce-message:before,
        .wpcf7 input[type='submit']:hover, 
        .wpcf7 input[type='button']:hover,

        .content-area .site-main .sparkletheme-blogs .post .entry-content a,

        .bttn.sparkle-default-bttn.sparkle-outline-bttn,
        .sparkle-team .sparkle-member-position, 
        .sparkle-testimonial .sparkle-client-position,
        .widget-area ul.buzz-social-list li a{
            color: $theme_color;
        }\n";

       
        wp_add_inline_style( 'buzzstorepro-style', $buzzstorepro_colors );
    }
}
add_action( 'wp_enqueue_scripts', 'buzzstorepro_dynamic_css', 99 );