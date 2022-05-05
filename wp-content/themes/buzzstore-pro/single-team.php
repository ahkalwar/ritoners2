<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Buzzstore Pro
 */

get_header(); ?>

<?php do_action( 'buzzstorepro-breadcrumb-page' ); ?>

<div class="buzz-container buzz-clearfix">
	<div class="buzz-row buzz-clearfix">

	    <div id="primary" class="content-area">
	      	<main id="main" class="site-main" role="main">
				<div class="single-team-container">
					<?php
						while ( have_posts() ) : the_post();
						$team_member_position   = esc_attr(get_post_meta( $post->ID, 'team_member_position', true ));
						$team_member_email      = esc_attr(get_post_meta( $post->ID, 'team_member_email', true ));
						$team_member_weblink    = esc_url(get_post_meta( $post->ID, 'team_member_weblink', true ));
						$team_member_facebook   = esc_url(get_post_meta( $post->ID, 'team_member_facebook', true ));
						$team_member_twitter    = esc_url(get_post_meta( $post->ID, 'team_member_twitter', true ));
						$team_member_googleplus = esc_url(get_post_meta( $post->ID, 'team_member_googleplus', true ));
						$team_member_linkedin   = esc_url(get_post_meta( $post->ID, 'team_member_linkedin', true ));
						$team_member_instagram  = esc_url(get_post_meta( $post->ID, 'team_member_instagram', true ));
					?>
					<div class="single-team-wrap buzz-clearfix">
						<div class="single-team-image">
							<?php
								if( has_post_thumbnail() ){
									$image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'buzzstorepro-team-image', true);
							?>
								<div class="team-image">
									<img src="<?php echo esc_url( $image[0] ); ?>" alt="" class="img-responsive">
								</div>
							<?php } ?>
							<div class="team-details">
								<h4><?php the_title(); ?></h4>
								<span class="team-post-title"><?php echo esc_attr( $team_member_position ); ?></span>
								<a href="mailto:<?php echo esc_attr( antispambot( $team_member_email ) ); ?>" class="team-email-address">
									<?php echo esc_attr( antispambot( $team_member_email ) ); ?>
								</a>
								<ul class="social-icons">
								    <?php if(!empty( $team_member_facebook) ) { ?><li><a href="<?php echo esc_url( $team_member_facebook ); ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
								    <?php if(!empty( $team_member_twitter) ) { ?><li><a href="<?php echo esc_url( $team_member_twitter ); ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
								    <?php if(!empty( $team_member_googleplus) ) { ?><li><a href="<?php echo esc_url( $team_member_googleplus ); ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>
								    <?php if(!empty( $team_member_linkedin) ) { ?><li><a href="<?php echo esc_url( $team_member_linkedin ); ?>"><i class="fa fa-linkedin"></i></a></li><?php } ?>
								    <?php if(!empty( $team_member_instagram) ) { ?><li><a href="<?php echo esc_url( $team_member_instagram ); ?>"><i class="fa fa-instagram"></i></a></li><?php } ?>
								    <?php if(!empty( $team_member_weblink) ) { ?><li><a href="<?php echo esc_url( $team_member_weblink ); ?>"><i class="fa fa-link"></i></a></li><?php } ?>
								</ul>
							</div>
						</div>
						<div class="single-team-desc">
							<div class="description">
								<?php
									the_content( sprintf(
										/* translators: %s: Name of current post. */
										wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'buzzstore-pro' ), array( 'span' => array( 'class' => array() ) ) ),
										the_title( '<span class="screen-reader-text">"', '"</span>', false )
									) );

									wp_link_pages( array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'buzzstore-pro' ),
										'after'  => '</div>',
									) );
								?>
							</div>
						</div>
					</div>
					<?php endwhile; wp_reset_postdata(); // End of the loop. ?>
					<div class="buzz-clearfix"></div>
					<div class="single-team-related ">
						<ul class="buzz-clearfix">
						<?php
							global $post;
							$args = array( 'post_type' => 'team', 'numberposts' => 3, 'post__not_in' => array($post->ID));
							$related = new WP_Query($args);
							if( $related->have_posts() ) { while ($related->have_posts()){ $related->the_post();
							$team_member_position   = esc_attr(get_post_meta( get_the_ID(), 'team_member_position', true ));
							$team_member_email      = esc_attr(get_post_meta( get_the_ID(), 'team_member_email', true ));
							$team_member_weblink    = esc_url(get_post_meta( get_the_ID(), 'team_member_weblink', true ));
							$team_member_facebook   = esc_url(get_post_meta( get_the_ID(), 'team_member_facebook', true ));
							$team_member_twitter    = esc_url(get_post_meta( get_the_ID(), 'team_member_twitter', true ));
							$team_member_googleplus = esc_url(get_post_meta( get_the_ID(), 'team_member_googleplus', true ));
							$team_member_linkedin   = esc_url(get_post_meta( get_the_ID(), 'team_member_linkedin', true ));
							$team_member_instagram  = esc_url(get_post_meta( get_the_ID(), 'team_member_instagram', true ));
						?>
					        <li>
					        	<?php
					        		if( has_post_thumbnail() ){
					        			$image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'buzzstorepro-team-image', true);
					        	?>
					        		<div class="related-team-image">
					        			<a href="<?php the_permalink(); ?>">
					        				<img src="<?php echo esc_url( $image[0] ); ?>" alt="" class="img-responsive">
					        			</a>
					        		</div>
					        	<?php } ?>
					        	<div class="team-details">
					        		<h4><?php the_title(); ?></h4>
									<span class="team-post-title"><?php echo esc_attr( $team_member_position ); ?></span>
					        		<a href="mailto:<?php echo esc_attr( antispambot( $team_member_email ) ); ?>" class="team-email-address">
					        			<?php echo esc_attr( antispambot( $team_member_email ) ); ?>
					        		</a>
					        		<ul class="social-icons">
					        		    <?php if(!empty( $team_member_facebook) ) { ?><li><a href="<?php echo esc_url( $team_member_facebook ); ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
					        		    <?php if(!empty( $team_member_twitter) ) { ?><li><a href="<?php echo esc_url( $team_member_twitter ); ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
					        		    <?php if(!empty( $team_member_googleplus) ) { ?><li><a href="<?php echo esc_url( $team_member_googleplus ); ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>
					        		    <?php if(!empty( $team_member_linkedin) ) { ?><li><a href="<?php echo esc_url( $team_member_linkedin ); ?>"><i class="fa fa-linkedin"></i></a></li><?php } ?>
					        		    <?php if(!empty( $team_member_instagram) ) { ?><li><a href="<?php echo esc_url( $team_member_instagram ); ?>"><i class="fa fa-instagram"></i></a></li><?php } ?>
					        		    <?php if(!empty( $team_member_weblink) ) { ?><li><a href="<?php echo esc_url( $team_member_weblink ); ?>"><i class="fa fa-link"></i></a></li><?php } ?>
					        		</ul>
					        	</div>
					        </li>
						<?php } } wp_reset_postdata();  ?>
						</ul>
					</div>
				</div>
			</main>
		</div>
	</div>
</div>

<?php get_footer();
