<?php
/**
Template Name: Full Width
*
* This template is used to display full-width pages.
*
* @package Natural
* @since Natural 1.0
*
*/
get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() ) { ?>
		<div class="feature-img banner shadow radius-full"><?php the_post_thumbnail( 'featured-large' ); ?></div>
	<?php } ?>

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

<!-- END .post class -->
</div>

<?php get_footer(); ?>
