<?php
/**
* This template is used to display a gallery slider.
*
* @package Natural
* @since Natural 1.0
*
*/
?>

<!-- BEGIN .slideshow gallery-slideshow -->
<div class="slideshow gallery-slideshow shadow radius-full">

	<!-- BEGIN .flexslider -->
	<div class="flexslider loading" data-speed="12000" data-transition="fade">

		<div class="preloader"></div>

		<!-- BEGIN .slides -->
		<ul class="slides">

			<?php while ( have_posts() ) : the_post(); if ( get_post_gallery() ) : ?>

			    <?php $gallery = get_post_gallery( $post, false ); $ids = explode( ",", $gallery['ids'] ); ?>

			    <?php foreach( $ids as $id ) { ?>
			    	<?php $link = wp_get_attachment_url( $id ); ?>
			        <li><img src="<?php echo esc_url($link); ?>" class="gallery-slider-img" /></li>
			    <?php } ?>

			<?php endif; endwhile; ?>

		<!-- END .slides -->
		</ul>

	<!-- END .flexslider -->
	</div>

<!-- END .slideshow gallery-slideshow -->
</div>
