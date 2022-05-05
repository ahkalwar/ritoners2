<?php
/**
 * WooCommerce Setup Functions
 * See: http:///woothemes.com/woocommerce/
 *
 * @package Natural
 * @since Natural 1.0
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function natural_woocommerce_setup() {

	add_theme_support( 'woocommerce', apply_filters( 'natural_woocommerce_args', array(
		'single_image_width'    => 900,
		'thumbnail_image_width' => 498,
		'gallery_thumbnail_image_width' => 180,
		'product_grid'          => array(
			'default_columns' => 3,
			'default_rows'    => 4,
			'min_columns'     => 2,
			'max_columns'     => 5,
			'min_rows'        => 1
		)
	) ) );

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

}
add_action( 'after_setup_theme', 'natural_woocommerce_setup' );

/**
 * WooCommerce content wrappers.
 *
 * @return void
 */
function natural_prepare_woocommerce_wrappers() {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
}
add_action( 'wp_head', 'natural_prepare_woocommerce_wrappers' );

function natural_open_woocommerce_content_wrappers() {
	?>
	<div class="row">
		<div class="content shop">
		<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
			<div class="eleven columns">
		<?php } else { ?>
			<div class="sixteen columns">
		<?php } ?>
				<div <?php if ( is_shop() ) { ?>id="infinite-container"<?php } ?> class="postarea clearfix">
	<?php
}
function natural_close_woocommerce_content_wrappers() {
	?>
				</div>
			</div>

		<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
			<div class="five columns">
				<div class="sidebar">
					<?php dynamic_sidebar( 'shop-sidebar' ); ?>
				</div>
			</div>
		<?php } ?>

		</div>
	</div>
	<?php
}
add_action( 'woocommerce_before_main_content', 'natural_open_woocommerce_content_wrappers', 10 );
add_action( 'woocommerce_after_main_content', 'natural_close_woocommerce_content_wrappers', 10 );

// Remove WC sidebar.
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// Add the WC sidebar in the right place.
add_action( 'woo_main_after', 'woocommerce_get_sidebar', 10 );

/**
 * WooCommerce specific sidebars.
 *
 * @return void
 */
function natural_woocommerce_widgets_init() {
	register_sidebar(array(
		'name'=> __( "Shop Sidebar", 'natural' ),
		'id' => 'shop-sidebar',
		'before_widget'=>'<div id="%1$s" class="widget %2$s">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
}
add_action( 'widgets_init', 'natural_woocommerce_widgets_init' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function natural_woocommerce_scripts() {

	wp_register_script( 'natural-header-cart', get_template_directory_uri() . '/js/woocommerce.js', '', '1.0', true );
	wp_enqueue_script( 'natural-header-cart' );

	wp_enqueue_style( 'natural-woocommerce-style', get_template_directory_uri() . '/css/woocommerce.css' );

	wp_dequeue_style( 'selectWoo' );
	wp_deregister_style( 'selectWoo' );
	wp_dequeue_script( 'selectWoo');
	wp_deregister_script('selectWoo');

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

	wp_add_inline_style( 'natural-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'natural_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function natural_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'natural_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function natural_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'natural_woocommerce_related_products_args' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'natural_woocommerce_header_cart' ) ) {
			natural_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'natural_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function natural_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		natural_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'natural_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'natural_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function natural_woocommerce_cart_link() {
		?>
			<a class="cart-contents sf-with-ul" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'natural' ); ?>">
				<?php /* translators: number of items in the mini cart. */ ?>
				<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
				<span class="count"><?php echo wp_kses_data( sprintf( '%d', WC()->cart->get_cart_contents_count() ) );?></span>
			</a>
		<?php
	}
}

if ( ! function_exists( 'natural_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function natural_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item menu-item';
		} else {
			$class = 'menu-item';
		}
		?>
		<div id="site-header-cart" class="site-header-cart">
			<div class="<?php echo esc_attr( $class ); ?>">
				<?php natural_woocommerce_cart_link(); ?>
			</div>
				<?php
					$instance = array(
						'title' => '',
					);
					the_widget( 'WC_Widget_Cart', $instance );
				?>
		</div>
		<?php
	}
}

/**
 * Workaround to prevent is_shop() from failing due to WordPress core issue
 *
 * @link https://core.trac.wordpress.org/ticket/21790
 * @param  array $args infinite scroll args.
 * @return array       infinite scroll args.
 */
function natural_woocommerce_is_shop_page() {
	global $wp_query;
	$front_page_id        = get_option( 'page_on_front' );
	$current_page_id      = $wp_query->get( 'page_id' );
	$shop_page_id         = apply_filters( 'woocommerce_get_shop_page_id', get_option( 'woocommerce_shop_page_id' ) );
	$is_static_front_page = 'page' === get_option( 'show_on_front' );
	if ( $is_static_front_page && $front_page_id === $current_page_id  ) {
		$is_shop_page = ( $current_page_id === wc_get_page_id( 'shop' ) ) ? true : false;
	} else {
		$is_shop_page = is_shop();
	}
	return $is_shop_page;
}
