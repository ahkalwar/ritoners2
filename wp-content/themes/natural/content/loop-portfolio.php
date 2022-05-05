<?php
/**
* This template is used to display portfolio items.
*
* @package Natural
* @since Natural 1.0
*
*/
?>

<!-- BEGIN .portfolio-wrap -->
<div class="portfolio-wrap">

	<?php
		$categories = get_categories( array( 'taxonomy' => 'jetpack-portfolio-type' ) );
		$count = count($categories);
		echo '<ul id="portfolio-filter" class="shadow radius-bottom">';
		echo '<li><a class="radius-full" href="javascript:void(0)" data-filter="*" title="">'.esc_html__( 'All', 'natural' ).'</a></li>';
		if ( $count > 0 ) {
			foreach ( $categories as $category ) {
				$categoryname = strtolower($category->category_nicename);
				$categoryname = str_replace(' ', '-', $categoryname);
				echo '<li><a href="javascript:void(0)" data-filter=".jetpack-portfolio-type-'.$categoryname.'" title="" rel="'.$categoryname.'">'.$category->name.'</a></li>';
			}
		}
		echo "</ul>";
	?>

	<?php
		$porfolio_query = new WP_Query(array(
			'post_type' => 'jetpack-portfolio',
			'posts_per_page'=>999,
			'suppress_filters'=>0
			)
		);
	?>

	<!-- BEGIN .portfolio -->
	<div class="portfolio radius-bottom <?php if ( 'two' == get_theme_mod('natural_portfolio_columns', 'three')) { ?>portfolio-half<?php } if ( 'three' == get_theme_mod('natural_portfolio_columns', 'three')) { ?>portfolio-third<?php } ?>">

		<!-- BEGIN .row -->
		<ul id="portfolio-list" class="row">

		<?php if ($porfolio_query->have_posts()) : while($porfolio_query->have_posts()) : $porfolio_query->the_post(); ?>

			<!-- BEGIN .portfolio-item -->
			<li class="portfolio-item <?php if ( 'one' == get_theme_mod('natural_portfolio_columns', 'three')) { ?>single<?php } if ( 'two' == get_theme_mod('natural_portfolio_columns', 'three')) { ?>half<?php } if ( 'three' == get_theme_mod('natural_portfolio_columns', 'three')) { ?>third<?php } ?> <?php $allClasses = get_post_class(); foreach ($allClasses as $class) { echo $class . " "; } ?>" data-filter="category-<?php $allClasses = get_post_class(); foreach ($allClasses as $class) { echo $class . " "; } ?>">

				<!-- BEGIN .post-holder -->
				<div class="post-holder shadow radius-full">

					<?php if ( has_post_thumbnail()) { ?>
						<a class="feature-img radius-top" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'natural' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'featured-large' ); ?></a>
					<?php } else { ?>
						<a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'natural' ), the_title_attribute( 'echo=0' ) ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/natural-default-image.jpg" alt="<?php the_title(); ?>" /></a>
					<?php } ?>

					<div class="excerpt radius-bottom">
						<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					</div><!-- END .excerpt -->

				<!-- END .post-holder -->
				</div>

			<!-- END .portfolio-item -->
			</li>

		<?php endwhile; wp_reset_postdata(); ?>

		<!-- END .row -->
		</ul>

		<?php else: ?>

		<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'natural'); ?></p>

		<?php endif; ?>

	<!-- END .portfolio -->
	</div>

<!-- END .portfolio-wrap -->
</div>
