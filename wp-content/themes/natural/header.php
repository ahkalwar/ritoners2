<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="wrap">
 *
 * @package Natural
 * @since Natural 1.0
 */
?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="profile" href="<?php echo esc_url( 'http://gmpg.org/xfn/11' ); ?>">
<link rel="pingback" href="<?php echo esc_url( bloginfo( 'pingback_url' ) ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- BEGIN #wrap -->
<div id="wrap">

	<!-- BEGIN .container -->
	<div class="container clearfix">

		<!-- BEGIN #header -->
		<div id="header" class="radius-full">

			<!-- BEGIN .row -->
			<div class="row">

				<?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) { ?>

					<div id="custom-header" class="radius-top">

						<div class="header-img background-cover"
						<?php
						if ( ! empty( $header_image ) ) {
							?>
							 style="background-image: url(<?php header_image(); ?>);"<?php } ?>>

							<?php get_template_part( 'content/logo', 'title' ); ?>

						</div>

					</div>

				<?php } else { ?>

					<div id="custom-header">

						<?php get_template_part( 'content/logo', 'title' ); ?>

					</div>

				<?php } ?>

			<!-- END .row -->
			</div>

			<!-- BEGIN .row -->
			<div class="row">

				<!-- BEGIN #navigation -->
				<nav id="navigation" class="navigation-main
				<?php
				if ( ! empty( $header_image ) ) {
					?>
					radius-bottom
					<?php
				} else {
					?>
					radius-full<?php } ?>" role="navigation">

					<p class="menu-toggle"><span><?php esc_html_e( 'Menu', 'natural' ); ?></span></p>

					<?php
					if ( has_nav_menu( 'header-menu' ) ) {
						wp_nav_menu(
							array(
								'theme_location'  => 'header-menu',
								'title_li'        => '',
								'depth'           => 4,
								'container_class' => 'menu-container',
								'menu_class'      => 'menu',
							)
						);
					} else {
						?>
						<div class="default-menu"><ul class="menu">
						<?php
						wp_list_pages(
							array(
								'depth'    => '4',
								'title_li' => '',
							)
						);
						?>
																	</ul></div>
					<?php } ?>

					<?php
					if ( function_exists( 'natural_woocommerce_header_cart' ) ) {
						natural_woocommerce_header_cart();
					}
					?>

				<!-- END #navigation -->
				</nav>

			<!-- END .row -->
			</div>

		<!-- END #header -->
		</div>
