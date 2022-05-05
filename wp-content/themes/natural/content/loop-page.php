<?php
/**
* This template is used to display a loop of pages.
*
* @package Natural
* @since Natural 1.0
*
*/
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<h1 class="headline"><?php the_title(); ?></h1>

<?php the_content( esc_html__("Read More", 'natural')); ?>

<?php wp_link_pages(array(
	'before' => '<p class="page-links"><span class="link-label">' . esc_html__('Pages:', 'natural') . '</span>',
	'after' => '</p>',
	'link_before' => '<span>',
	'link_after' => '</span>',
	'next_or_number' => 'next_and_number',
	'nextpagelink' => esc_html__('Next', 'natural'),
	'previouspagelink' => esc_html__('Previous', 'natural'),
	'pagelink' => '%',
	'echo' => 1 )
); ?>

<?php edit_post_link( esc_html__("(Edit)", 'natural'), '', ''); ?>

<?php if ( comments_open() || '0' != get_comments_number() ) comments_template(); ?>

<?php endwhile; else: ?>

<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'natural'); ?></p>

<?php endif; ?>
