<?php
/**
 * This template is used to display blog post content on the home page.
 *
 * @package Natural
 * @since Natural 1.0
 */
?>

<?php $cat = get_theme_mod( 'natural_category_news', '0' ); ?>
<?php $description = category_description( $cat ); ?>

<?php if ( ! empty( $description ) ) { ?>
	<div class="cat-description"><h4 class="title text-center"><?php echo $description ?></h4></div>
<?php } ?>

<?php if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' );
} elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' );
} else { $paged = 1; } ?>
<?php $query_args = array(
	'cat' => $cat,
	'posts_per_page' => '3',
	'paged' => $paged,
	); ?>
<?php $news = new WP_Query( $query_args ); ?>

<?php
//If there are any posts in the News Post query
if ( $news->have_posts() ) : ?>

<!-- BEGIN .row -->
<div class="row">

	<!-- BEGIN .featured-posts -->
	<div class="featured-posts">

		<!-- BEGIN .home-news -->
		<div class="home-news radius-full shadow">

			<?php while ( $news->have_posts() ) : $news->the_post(); ?>
			<?php if ( has_post_thumbnail() ) { $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'featured-medium' ); } ?>
			<?php global $more;
			$more = 0; ?>

			<!-- BEGIN .information -->
			<div <?php post_class( 'information' ); ?>>

			<?php if ( has_post_thumbnail() ) { ?>

				<!-- BEGIN .six columns -->
				<div class="six columns">

						<a class="feature-img background-cover" style="background-image: url(<?php echo $thumb[0]; ?>);" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'natural' ), the_title_attribute( 'echo=0' ) ) ); ?>">
							<?php the_post_thumbnail( 'featured-medium' ); ?>
						</a>

				<!-- END .six columns -->
				</div>

				<!-- BEGIN .ten columns -->
				<div class="ten columns">

					<div class="holder">

					<!-- BEGIN .article -->
					<div class="article">

						<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

						<div class="excerpt">
							<?php the_excerpt(); ?>
						</div>

						<?php $featured_img = false; ?>
						<?php natural_render_post_meta( $featured_img ); ?>

					<!-- END .article -->
					</div>

					</div>

				<!-- END .ten columns -->
				</div>

			<?php } else { ?>

				<!-- BEGIN .sixteen columns -->
				<div class="sixteen columns">

					<!-- BEGIN .article -->
					<div class="article">

						<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

						<div class="excerpt">
							<?php the_excerpt(); ?>
						</div>

						<?php $featured_img = false; ?>
						<?php natural_render_post_meta( $featured_img ); ?>

					<!-- END .article -->
					</div>

				<!-- END .sixteen columns -->
				</div>

			<?php } ?>

			<!-- END .information -->
			</div>

			<?php endwhile; ?>

			<?php if ( $cat ) { ?>
				<?php $more_posts_link = get_category_link( $cat ); ?>
			<?php } elseif ( get_option( 'page_for_posts' ) ) { ?>
				<?php $more_posts_link = get_permalink( get_option( 'page_for_posts' ) );?>
			<?php } else { ?>
				<?php $more_posts_link = false; ?>
			<?php } ?>

			<?php if ( $more_posts_link && $news->max_num_pages > 1 ) { ?>
				<a class="category-link" href="<?php echo esc_url( $more_posts_link ); ?>"><?php esc_html_e( 'More Posts', 'natural' ); ?></a>
			<?php } ?>



		<!-- END .home-news -->
		</div>

	<!-- END .featured-posts -->
	</div>

<!-- END .row -->
</div>

<?php endif; ?>

<?php wp_reset_postdata(); ?>
