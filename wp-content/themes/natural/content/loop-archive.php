<?php
/**
 * This template shows an archive of blog posts.
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

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<h2 class="headline small"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php natural_render_post_meta(); ?>

		<?php the_excerpt(); ?>

		<?php if ( function_exists( 'natural_button_post_flair' ) ) : ?>

			<!-- BEGIN .entry-flair -->
			<div class="entry-flair">
					<?php natural_button_post_flair(); ?>
			<!-- END .entry-flair -->
			</div>

		<?php endif; ?>

		<?php natural_render_cats_tags(); ?>

<!-- END .post class -->
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

<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'natural' ); ?></p>

<?php endif; ?>
