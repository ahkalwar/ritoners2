<?php
/**
* The search template for our theme.
*
* This template is used to display search results.
*
* @package Natural
* @since Natural 1.0
*
*/
get_header(); ?>

<!-- BEGIN .post class -->
<div class="search-posts">

	<!-- BEGIN .row -->
	<div class="row">

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

			<!-- BEGIN .eleven columns -->
			<div class="eleven columns">

				<!-- BEGIN .postarea -->
				<div class="postarea clearfix">

					<h1 class="headline"><?php printf( esc_html__( 'Search Results for: %s', 'natural' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

					<?php get_template_part( 'content/loop', 'archive' ); ?>

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
				<div class="postarea full clearfix">

					<?php get_template_part( 'content/loop', 'archive' ); ?>

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
