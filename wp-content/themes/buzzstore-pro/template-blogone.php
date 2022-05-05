<?php
/**
 * Template Name: Blog Layout One
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Buzzstore Pro
 */
get_header();  ?>

<?php do_action( 'buzzstorepro-breadcrumb-page' ); ?>

<div class="buzz-container buzz-clearfix">
    <div class="buzz-row buzz-clearfix">

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div class="sparkletheme-blogs">
                    <?php

                        $args = array(
                            'posts_per_page' => 6,
                            'post_type' => 'post',
                            'paged'     => get_query_var( 'paged' )
                        );

                        query_posts( $args );

                        if (have_posts()) : while ( have_posts()) : the_post(); 

                            get_template_part('template-parts/content', get_post_format());
                                                
                        endwhile; endif; wp_reset_postdata(); // End of the loop.

                        the_posts_pagination( 
                            array(
                                'prev_text' => esc_html__( 'Prev', 'buzzstore-pro' ),
                                'next_text' => esc_html__( 'Next', 'buzzstore-pro' ),
                            )
                        );
                    ?>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->

        <?php get_sidebar(); ?>

    </div>
</div>

<?php get_footer();
