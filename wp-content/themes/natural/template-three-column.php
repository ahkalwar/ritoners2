<?php
/**
Template Name: Three Column
*
* This template is used to display three column pages featuring two sidebars.
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

		<!-- BEGIN .four columns -->
		<div class="four columns">

			<?php get_sidebar( 'left' ); ?>

		<!-- END .four columns -->
		</div>

		<!-- BEGIN .seven columns -->
		<div class="seven columns">

			<!-- BEGIN .postarea middle -->
			<div class="postarea middle clearfix">

				<?php get_template_part( 'content/loop', 'page' ); ?>

			<!-- END .postarea middle -->
			</div>

		<!-- END .seven columns -->
		</div>

		<!-- BEGIN .five columns -->
		<div class="five columns">

			<?php get_sidebar( 'sidebar-1' ); ?>

		<!-- END .five columns -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
