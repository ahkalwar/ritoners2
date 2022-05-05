<?php
/**
* This template is used when no content is present.
*
* @package Natural
* @since Natural 1.0
*
*/
?>

<!-- BEGIN .no-results -->
<div class="no-results">

<?php if ( is_front_page() && current_user_can( 'publish_posts' ) ) { ?>

	<h2 class="headline text-center"><?php esc_html_e("No Options Saved", 'natural'); ?></h2>
	<p class="text-center"><?php printf( wp_kses( __( 'Please set and save the theme options for the home page within the <a href="%1$s">Customizer</a>.', 'natural' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'customize.php' ) ) ); ?></p>

<?php } else { ?>

	<h2 class="headline"><?php esc_html_e("No Results Found", 'natural'); ?></h2>
	<p><?php esc_html_e("It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.", 'natural'); ?></p>
	<div class="no-result-search"><?php get_template_part( 'searchform' ); ?></div>

<?php } ?>

<!-- END .no-results -->
</div>
