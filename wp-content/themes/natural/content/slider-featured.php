<?php
/**
* This template is used to display the featured slider.
*
* @package Natural
* @since Natural 1.0
*
*/
?>

<!-- BEGIN .slideshow -->
<div class="slideshow featured-slideshow radius-full">

	<!-- BEGIN .flexslider -->
	<div class="flexslider radius-full loading" data-speed="12000" data-transition="fade">

		<div class="preloader"></div>

		<!-- BEGIN .slides -->
		<ul class="slides">

			<?php $slider = natural_has_featured_posts( 1 ); ?>
			<?php if ( natural_has_featured_posts( 1 ) ) { ?>

				<?php $featured_posts = natural_get_featured_posts(); ?>
				<?php foreach ( (array) $featured_posts as $order => $post ) : ?>
				<?php setup_postdata( $post ); ?>

					<?php get_template_part( 'content/slide', 'info' ); ?>

				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>

			<?php } ?>

		<!-- END .slides -->
		</ul>

	<!-- END .flexslider -->
	</div>

	<ul class="flex-control-nav radius-bottom">

		<?php if ( natural_has_featured_posts( 1 ) ) { ?>
		<?php foreach ( (array) $featured_posts as $order => $post ) : ?>

			<?php setup_postdata( $post ); ?>
			<?php $trimtitle = get_the_title(); ?>
			<?php $shorttitle = wp_trim_words( $trimtitle, $num_words = 4, $more = '' ); ?>

			<li><a><?php echo esc_html( $shorttitle ); ?></a></li>

		<?php endforeach; } ?>
		<?php wp_reset_postdata(); ?>

	</ul>

<!-- END .slideshow -->
</div>
