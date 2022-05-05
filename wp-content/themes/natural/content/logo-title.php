<?php
/**
* This content part displays the logo and/or site title, and is pulled from header.php.
*
* @package Natural
* @since Natural 1.0
*
*/
?>

<div id="masthead">

	<?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) { ?>

		<div id="logo">

			<?php the_custom_logo(); ?>

		</div>

	<?php } ?>

	<?php if ( get_theme_mod( 'header_text', true ) ) { ?>

		<div id="site-info">

			<?php if ( is_front_page() ) { ?>

			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
			</h1>

			<h2 class="site-description">
				<?php echo wp_kses_post( get_bloginfo( 'description', 'display' ) ); ?>
			</h2>

		<?php } else { ?>

			<h4 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
			</h4>

			<p class="site-description">
				<?php echo wp_kses_post( get_bloginfo( 'description', 'display' ) ); ?>
			</p>

		<?php } ?>

		</div>

	<?php } ?>

</div>
