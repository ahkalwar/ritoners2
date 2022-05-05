<?php
/**
* This slider displays the Jetpack featured posts.
*
* @package Natural
* @since Natural 1.0
*
*/
?>

<?php $thumb = ( has_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'natural-featured-large' ) : false; ?>

<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <?php if ( has_post_thumbnail()) { ?>
    <a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'natural' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'featured-large' ); ?></a>
  <?php } else { ?>
    <a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'natural' ), the_title_attribute( 'echo=0' ) ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/natural-default-image.jpg" alt="<?php the_title(); ?>" /></a>
  <?php } ?>

  <?php if ( ! empty( $post->post_excerpt ) ) { ?>

    <!-- BEGIN .information -->
    <div class="information absolute-center">

        <!-- BEGIN .excerpt -->
        <div class="excerpt">

          <h2 class="headline text-center"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_excerpt(); ?></a></h2>

        <!-- END .excerpt -->
        </div>

    <!-- END .information -->
    </div>

  <?php } ?>

</li>
