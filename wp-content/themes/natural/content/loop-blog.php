<?php
/**
 * This template is used to display the blog loop.
 *
 * @package Natural
 * @since Natural 1.0
 */

?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		?>

	<!-- BEGIN .blog-holder -->
	<div class="blog-holder">

		<!-- BEGIN .post class -->
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

			<h2 class="headline"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<?php natural_render_post_meta(); ?>

			<!-- BEGIN .article -->
			<div class="article">
				<?php the_content( esc_html__( 'Read More', 'natural' ) ); ?>
			<!-- END .article -->
			</div>

		<!-- END .post class -->
		</div>

	<!-- END .blog-holder -->
	</div>

	<?php endwhile; ?>

	<?php if ( $wp_query->max_num_pages > 1 ) { ?>
		<!-- BEGIN .pagination -->
		<div class="pagination">
			<?php echo natural_get_pagination_links(); ?>
		<!-- END .pagination -->
		</div>
	<?php } ?>

<?php else : ?>

	<div class="error-404">
		<h1 class="headline"><?php esc_html_e( 'No Posts Found', 'natural' ); ?></h1>
		<p><?php esc_html_e( "We're sorry, but no posts have been found. Create a post to be added to this section, and configure your theme options.", 'natural' ); ?></p>
	</div>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
