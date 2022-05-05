<?php
/**
Template Name: Portfolio
 *
 * This template is used to display a 4-column portfolio.
 *
 * @package Natural
 * @since Natural 1.0
 */
get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class( 'portfolio-archive' ); ?> id="page-<?php the_ID(); ?>">

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .sixteen columns -->
		<div class="sixteen columns">

			<?php get_template_part( 'content/loop', 'portfolio' ); ?>

		<!-- END .sixteen columns -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
