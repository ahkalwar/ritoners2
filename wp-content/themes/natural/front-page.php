<?php
/**
* The default front page template file.
*
* Displayed if "Front page displays" is set to "Your latest posts".
*
* @package Natural
* @since Natural 1.0
*
*/

if ( 'posts' == get_option( 'show_on_front' ) ) :

	get_template_part( 'index' );

else :

global $post;

get_header(); ?>

<?php	if ( class_exists( 'Jetpack' ) && natural_has_featured_posts( 1 ) ) { ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .home-slider -->
		<div class="home-slider shadow">

			<?php get_template_part( 'content/slider', 'featured' ); ?>

		<!-- END .home-slider -->
		</div>

	<!-- END .row -->
	</div>

<?php } ?>

<!-- BEGIN .homepage -->
<div class="homepage">

<?php if ( '' != $post->post_content && get_theme_mod( 'natural_home_display_content', 0 ) ) { ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .sixteen columns -->
		<div class="sixteen columns">

			<!-- BEGIN .postarea full -->
			<div class="postarea full clearfix">

				<?php get_template_part( 'content/loop', 'page' ); ?>

			<!-- END .postarea full -->
			</div>

		<!-- END .sixteen columns -->
		</div>

	<!-- END .row -->
	</div>

<?php } ?>

<?php if ( 0 < get_theme_mod( 'natural_page_left', 0 ) || 0 < get_theme_mod( 'natural_page_mid', 0 ) || 0 < get_theme_mod( 'natural_page_right', 0 ) ) { ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .featured-pages -->
		<div class="featured-pages radius-full">

			<div class="holder third first">
				<?php if ( get_theme_mod('natural_page_left', false ) ) { ?>
					<?php $recent = new WP_Query( array( 'page_id' => (int) get_theme_mod('natural_page_left', 0 ) ) ); while($recent->have_posts()) : $recent->the_post(); ?>
						<?php get_template_part( 'content/home', 'page' ); ?>
					<?php endwhile; wp_reset_postdata(); ?>
				<?php } ?>
			</div>

			<div class="holder third">
				<?php if ( get_theme_mod('natural_page_mid', false ) ) { ?>
					<?php $recent = new WP_Query( array( 'page_id' => (int) get_theme_mod( 'natural_page_mid', 0 ) ) ); while($recent->have_posts()) : $recent->the_post(); ?>
						<?php get_template_part( 'content/home', 'page' ); ?>
					<?php endwhile; wp_reset_postdata(); ?>
				<?php } ?>
			</div>

			<div class="holder third last">
				<?php if ( get_theme_mod('natural_page_right', false ) ) { ?>
					<?php $recent = new WP_Query( array( 'page_id' => (int) get_theme_mod('natural_page_right', 0 ) ) ); while($recent->have_posts()) : $recent->the_post(); ?>
						<?php get_template_part( 'content/home', 'page' ); ?>
					<?php endwhile; wp_reset_postdata(); ?>
				<?php } ?>
			</div>

		<!-- END .featured-pages -->
		</div>

	<!-- END .row -->
	</div>

<?php } ?>

<?php if ( '0' != get_theme_mod( 'natural_category_news', '0' ) ) { ?>

				<?php get_template_part( 'content/home', 'post' ); ?>

<?php } ?>

<?php if ( ! get_theme_mod( 'natural_page_left', 0 ) && ! get_theme_mod( 'natural_page_mid', 0 ) && ! get_theme_mod( 'natural_page_right', 0 ) && ( '' == get_the_content() || ! get_theme_mod( 'natural_home_display_content', 0 ) ) ) { ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .postarea -->
		<div class="postarea full clearfix">

			<?php get_template_part( 'content/content', 'none' ); ?>

		<!-- END .postarea -->
		</div>

	<!-- END .row -->
	</div>

<?php } ?>

<!-- END .homepage -->
</div>

<?php get_footer();

endif; ?>
