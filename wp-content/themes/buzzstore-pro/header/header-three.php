<?php
/**
 * @see  buzzstorepro_top_header() - 15
 * @see  buzzstorepro_main_header() - 20
*/
remove_action('buzzstorepro_header','buzzstorepro_main_header', 20 );
do_action( 'buzzstorepro_header' );
?>

<div class="buzz-container buzz-clearfix">
	<div class="header-logo-wrap clearfix">
	    <div class="buzz-site-branding">
	        <div class="buzz-logowrap buzz-clearfix">
	            <div class="buzz-logo">
	                <?php the_custom_logo(); ?>
	            </div>
	            <div class="buzz-logo-title site-branding">
	                <h1 class="buzz-site-title site-title">
	                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
	                        <?php bloginfo( 'name' ); ?>
	                    </a>
	                </h1>
	                <?php
	                    $description = get_bloginfo( 'description', 'display' );
	                    if ( $description || is_customize_preview() ) { ?>
	                        <p class="buzz-site-description site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
	                <?php } ?>
	            </div>
	        </div>
	    </div><!-- .site-branding -->
	</div>
</div>
