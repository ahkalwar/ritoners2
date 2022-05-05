<?php
/**
*
* This main blog template file.
*
* @package Natural
* @since Natural 1.0
*
*/
get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">

	<!-- BEGIN .row -->
	<div class="row">

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

		<!-- BEGIN .eleven columns -->
		<div class="eleven columns">

			<!-- BEGIN .postarea -->
			<div id="infinite-container" class="postarea clearfix">

				<?php get_template_part( 'content/loop', 'blog' ); ?>

			<!-- END .postarea -->
			</div>

		<!-- END .eleven columns -->
		</div>

		<!-- BEGIN .five columns -->
		<div class="five columns">

			<?php get_sidebar( 'sidebar-1' ); ?>

		<!-- END .five columns -->
		</div>

	<?php else : ?>

		<!-- BEGIN .sixteen columns -->
		<div class="sixteen columns">

			<!-- BEGIN .postarea full -->
			<div id="infinite-container" class="postarea full clearfix">

				<?php get_template_part( 'content/loop', 'blog' ); ?>

			<!-- END .postarea full -->
			</div>

		<!-- END .sixteen columns -->
		</div>

	<?php endif; ?>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
