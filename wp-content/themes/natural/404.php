<?php
/**
* This page template is used to display a 404 error message.
*
* @package Natural
* @since Natural 1.0
*
*/
get_header(); ?>

<!-- BEGIN .row -->
<div class="row">

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

		<!-- BEGIN .eleven columns -->
		<div class="eleven columns">

		<div class="postarea clearfix">
			<h1 class="headline"><?php esc_html_e("Not Found, Error 404", 'natural'); ?></h1>
			<p><?php esc_html_e("The page you are looking for no longer exists.", 'natural'); ?></p>
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

		<div class="postarea full clearfix">
			<h1 class="headline"><?php esc_html_e("Not Found, Error 404", 'natural'); ?></h1>
			<p><?php esc_html_e("The page you are looking for no longer exists.", 'natural'); ?></p>
		</div>

		<!-- END .sixteen columns -->
		</div>

	<?php endif; ?>

<!-- END .row -->
</div>

<?php get_footer(); ?>
