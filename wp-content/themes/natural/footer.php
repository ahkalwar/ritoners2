<?php
/**
* The footer for our theme.
* This template is used to generate the footer for the theme.
*
* @package Natural
* @since Natural 1.0
*
*/
?>

<!-- BEGIN .footer -->
<div class="footer radius-top shadow">

	<?php if ( is_active_sidebar('footer') ) { ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .footer-widgets -->
		<div class="footer-widgets">

			<?php dynamic_sidebar('footer'); ?>

		<!-- END .footer-widgets -->
		</div>

	<!-- END .row -->
	</div>

	<?php } ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .footer-information -->
		<div class="footer-information">

			<!-- BEGIN .footer-content -->
			<div class="footer-content">

				<footer id="colophon" class="align-left" role="contentinfo">
					<div class="site-info">
							<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'natural' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'natural' ), 'WordPress' ); ?></a>
							<span class="sep"> | </span>
							<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'natural' ), 'Natural', '<a href="http://www.organicthemes.com/themes/natural" rel="designer">Organic Themes</a>' ); ?>
					</div><!-- .site-info -->
				</footer><!-- #colophon -->

				<?php if ( has_nav_menu( 'social-menu' ) ) { ?>

				<div class="align-right">

					<?php wp_nav_menu( array(
						'theme_location' => 'social-menu',
						'title_li' => '',
						'depth' => 1,
						'container_class' => 'social-menu',
						'menu_class'      => 'social-icons',
						'link_before'     => '<span>',
						'link_after'      => '</span>',
						)
					); ?>

				</div>

				<?php } ?>

			<!-- END .footer-content -->
			</div>

		<!-- END .footer-information -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .footer -->
</div>

<!-- END .container -->
</div>

<!-- END #wrap -->
</div>

<?php wp_footer(); ?>

</body>
</html>
