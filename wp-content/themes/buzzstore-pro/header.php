<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Buzzstore Pro
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php buzzstorepro_html_tag_schema(); ?> >
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<?php
    $preloader = esc_attr( get_theme_mod( 'buzzstorepro_preloader_options', 0 ) );
    if( $preloader == 0 ) {
?>
    <div class="buzzstorepro-preloader"></div>
<?php } ?>

<body <?php body_class(); ?> data-scrolling-animations="true">

<div id="page" class="site">

	<?php
		/**
		 * @see  buzzstorepro_skip_links() - 5
		*/
		do_action( 'buzzstorepro_header_before' );

		$header_type = esc_attr( get_theme_mod( 'buzzstorepro_header_type_options','header-one' ) );
		if($header_type == 'header-one'){
			get_template_part('header/header', 'one');
		}else if($header_type == 'header-two'){
			get_template_part('header/header', 'two');
		}else if($header_type == 'header-three'){
			get_template_part('header/header', 'three');
		}else if($header_type == 'header-four'){
			get_template_part('header/header', 'four');
		}else{ get_template_part('header/header', 'one');
		}

	 	do_action( 'buzzstorepro_header_after' );
	?>

<?php
	$align        = get_theme_mod( 'buzzstorepro_menu_layout','text-left' );
	$hover_effect = get_theme_mod( 'buzzstorepro_menu_hover_effect','hove-style-bg' );
	$submenuleft  = get_theme_mod( 'buzzstorepro_submenu_style','sub-menu-right' );
?>
<nav class="buzz-menulink <?php echo esc_attr( $align ); ?>">
	<div class="buzz-container buzz-clearfix">
		<div class="buzz-toggle">
            <div class="one"></div>
            <div class="two"></div>
            <div class="three"></div>
        </div>
        <?php if ( buzzstorepro_is_woocommerce_activated() ) { ?>
                      <div class="buzz-cart-main nav-cart">
            <div class="view-cart">
              <?php buzzstorepro_cart_link(); ?>
            </div>
            <div class="buzz-viewcartproduct">
              <div class="buzz-block-subtitle"><?php esc_html_e('Recently added item(s)','buzzstore-pro'); ?></div>
              <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
            </div>
                      </div>
        <?php  } ?>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	</div>
</nav>

<?php
	/**
	 * Main Slider Funciton Area
	*/
	if( is_front_page() ){
		$slider_options = esc_attr( get_theme_mod( 'buzzstorepro_slider_section', 'enable' ) );
		if( !empty( $slider_options ) && $slider_options == 'enable' ){
			$slidertype = get_theme_mod( 'buzzstorepro_homepage_slider_type', 'normal' );
			$sliderlayout = get_theme_mod( 'buzzstorepro_slider_layout', 'fullwidth' );
			if($sliderlayout == 'fullwidth'){

				if($slidertype == 'normal'){
					//Normal Slider
					do_action( 'buzzstorepro_normal_slider' );

				}elseif( $slidertype == 'category' ){
					//Category Slider
					do_action( 'buzzstorepro_slider' );

				}elseif( $slidertype == 'revolution' ){
					//Revolution Slider
					do_action( 'buzzstorepro_revolution' );

				}else{
					//Category Slider
					do_action( 'buzzstorepro_slider' );
				}
			}elseif( $sliderlayout == 'boxed' ){ ?>
				<div class="buzz-container">
					<?php
						if($slidertype == 'normal'){
							//Normal Slider
							do_action( 'buzzstorepro_normal_slider' );

						}elseif( $slidertype == 'category' ){
							//Category Slider
							do_action( 'buzzstorepro_slider' );

						}elseif( $slidertype == 'revolution' ){
							//Revolution Slider
							do_action( 'buzzstorepro_revolution' );

						}else{
							//Category Slider
							do_action( 'buzzstorepro_slider' );
						}
					?>
				</div>
			<?php }elseif( $sliderlayout == 'sliderpromoleft' ){ ?>
				<div class="buzz-container">
					<div class="main_promo_banner_slider_row">
						<div class="main_promo_banner_slider buzz-clearfix slider_promo_left">
							<div class="promosliderwrap">
								<?php
									if($slidertype == 'normal'){
										//Normal Slider
										do_action( 'buzzstorepro_normal_slider' );

									}elseif( $slidertype == 'category' ){
										//Category Slider
										do_action( 'buzzstorepro_slider' );

									}elseif( $slidertype == 'revolution' ){
										//Revolution Slider
										do_action( 'buzzstorepro_revolution' );

									}else{
										//Category Slider
										do_action( 'buzzstorepro_slider' );
									}
								?>
							</div>
							<div class="slider-promo-wrap buzz-clearfix">
								<?php do_action( 'buzzstorepro_promo_slider' ); ?>
							</div>
						</div>
					</div>
				</div>
			<?php }elseif( $sliderlayout == 'sliderpromoright' ){ ?>
				<div class="buzz-container">
					<div class="main_promo_banner_slider_row">
						<div class="main_promo_banner_slider buzz-clearfix slider_promo_right">
							<div class="promosliderwrap">
								<?php
									if($slidertype == 'normal'){
										//Normal Slider
										do_action( 'buzzstorepro_normal_slider' );

									}elseif( $slidertype == 'category' ){
										//Category Slider
										do_action( 'buzzstorepro_slider' );

									}elseif( $slidertype == 'revolution' ){
										//Revolution Slider
										do_action( 'buzzstorepro_revolution' );

									}else{
										//Category Slider
										do_action( 'buzzstorepro_slider' );
									}
								?>
							</div>
							<div class="slider-promo-wrap buzz-clearfix">
								<?php do_action( 'buzzstorepro_promo_slider' ); ?>
							</div>
						</div>
					</div>
				</div>
			<?php }
		}
	}
