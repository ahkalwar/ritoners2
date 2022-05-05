<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Buzzstore Pro
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('wow fadeInUp'); ?> data-wow-delay="0.3s" itemtype="http://schema.org/BlogPosting" itemtype="http://schema.org/BlogPosting">						
	
    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="post-thumbnail">
            <?php the_post_thumbnail('large'); ?>
        </a>
    <?php endif; ?> 
         
    <div class="text-holder">    
        <span class="category"><?php the_category(', '); ?></span>        
        <header class="entry-header">
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="headline">
                    <?php the_title(); ?>
                </a>
            </h2>           
            <div class="entry-meta">
                <div class="entry-meta">                
                    <span class="byline" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"> 
                        <span class="author vcard" itemprop="name">
                            <a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a>
                        </span>
                    </span>
                    <span class="posted-on">
                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                            <time datetime="<?php echo get_the_date(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>
                        </a>
                    </span>
                    <span class="comments-link">
                        <?php comments_popup_link(); ?>
                    </span>        
                </div>          
            </div><!-- .entry-meta -->
        </header><!-- .entry-header -->
    
    
        <div class="entry-content">
            <?php the_excerpt(); ?>          
        </div><!-- .entry-content -->
         
        <a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e('Continue Reading','buzzstore-pro'); ?></a>
    
    </div><!-- .text-holder -->

</article><!-- #post-## -->