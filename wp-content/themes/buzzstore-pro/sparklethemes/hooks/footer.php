<?php
/**
 * Footer Area Before
*/
if ( ! function_exists( 'buzzstorepro_footer_before' ) ) {
	function buzzstorepro_footer_before(){ ?>
		<footer id="footer" class="footer" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
	<?php
	}
}
add_action( 'buzzstorepro_footer_before', 'buzzstorepro_footer_before', 5 );

/**
 * Footer Area Goto Top
*/
if ( ! function_exists( 'buzzstorepro_footer_gototop' ) ) {
	function buzzstorepro_footer_gototop(){ ?>
		<a class="goToTop" href="#" id="scrollTop">
			<i class="fa fa-angle-up"></i>
			<span><?php esc_html_e('Top','buzzstore-pro'); ?></span>
		</a>
	<?php
	}
}
add_action( 'buzzstorepro_footer_before', 'buzzstorepro_footer_gototop', 6 );

/**
 * buzzstore Footer Widget Area
*/
if ( ! function_exists( 'buzzstorepro_footer_widget_area' ) ) {
	function buzzstorepro_footer_widget_area(){
		$top_footer_options = esc_attr( get_theme_mod( 'buzzstorepro_footer_area_two_enable_disable_section','enable' ) );
		$top_footer_bg = esc_attr( get_theme_mod( 'buzzstorepro_footer_area_two_background_color','#222222' ) );
		if(!empty( $top_footer_options ) && $top_footer_options =='enable' ) { ?>
			<div class="buzz-footerwpra" <?php if(!empty( $top_footer_bg )) { ?>style="background-color:<?php echo esc_attr( $top_footer_bg ); ?>;"<?php } ?>>
				<div class="buzz-container">

					<?php if( get_theme_mod('buzzstorepro_footer_logo_options','enable') =='enable' ){ ?>
				      	<div class="mainlogo-area buzz-clearfix">
					      	<div class="footer-logo">
					      	    <div class="footer-buzz-logo">
					      	    	<?php the_custom_logo(); ?>
					      	    </div>

					      	    <div class="footer-buzz-logo-title site-branding">
					      	    	<h2 class="footer-buzz-site-title site-title">
					      	    		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					      	    			<?php bloginfo( 'name' ); ?>
					      	    		</a>
					      	    	</h2>
					      	    	<?php
					      	    		$description = get_bloginfo( 'description', 'display' );
					      	    		if ( $description || is_customize_preview() ) { ?>
					      	    			<p class="buzz-site-description site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					      	    	<?php } ?>
					      	    </div>
					      	</div>
				      	</div>
					<?php } ?>

					<div class="buzz-footerwrap  buzz-clearfix">
						<?php if ( is_active_sidebar( 'buzzstorefooterone' ) ) { ?>
							<div class="footer-widget wow fadeInLeft" data-wow-delay="0.3s">
								<?php dynamic_sidebar( 'buzzstorefooterone' ); ?>
							</div>
						<?php } ?>

						<?php if ( is_active_sidebar( 'buzzstorefootertwo' ) ) { ?>
							<div class="footer-widget wow fadeInUp" data-wow-delay="0.3s">
								<?php dynamic_sidebar( 'buzzstorefootertwo' ); ?>
							</div>
						<?php } ?>

						<?php if ( is_active_sidebar( 'buzzstorefooterthree' ) ) { ?>
							<div class="footer-widget wow fadeInUp" data-wow-delay="0.3s">
								<?php dynamic_sidebar( 'buzzstorefooterthree' ); ?>
							</div>
						<?php } ?>

						<?php if ( is_active_sidebar( 'buzzstorefooterfour' ) ) { ?>
							<div class="footer-widget wow fadeInRight" data-wow-delay="0.3s">
								<?php dynamic_sidebar( 'buzzstorefooterfour' ); ?>
							</div>
						<?php } ?>
					</div>

					<div class="payment-logo">
						<div class="payment-card clearfix">
							<?php
								$payment_logo_one   = esc_url( get_theme_mod('paymentlogo_image_one') );
								$payment_logo_two   = esc_url( get_theme_mod('paymentlogo_image_two') );
								$payment_logo_three = esc_url( get_theme_mod('paymentlogo_image_three') );
								$payment_logo_four  = esc_url( get_theme_mod('paymentlogo_image_four') );
								$payment_logo_five  = esc_url( get_theme_mod('paymentlogo_image_five') );
								$payment_logo_six   = esc_url( get_theme_mod('paymentlogo_image_six') );
							?>
								<ul class="footer-payments wow fadeUpRight" data-wow-delay="0.3s">
								  <?php if(!empty($payment_logo_one)) { ?>
								      <li><img src="<?php echo esc_url( $payment_logo_one ); ?>" /></li>
								  <?php } ?>
								  <?php if(!empty($payment_logo_two)) { ?>
								      <li><img src="<?php echo esc_url( $payment_logo_two ); ?>" /></li>
								  <?php } ?>
								  <?php if(!empty($payment_logo_three)) { ?>
								      <li><img src="<?php echo esc_url( $payment_logo_three ); ?>"  /></li>
								  <?php } ?>
								  <?php if(!empty($payment_logo_four)) { ?>
								      <li><img src="<?php echo esc_url( $payment_logo_four ); ?>" /></li>
								  <?php } ?>
								  <?php if(!empty($payment_logo_five)) { ?>
								      <li><img src="<?php echo esc_url( $payment_logo_five ); ?>" /></li>
								  <?php } ?>
								  <?php if(!empty($payment_logo_six)) { ?>
								      <li><img src="<?php echo esc_url( $payment_logo_six ); ?>" /></li>
								  <?php } ?>
								</ul>
						</div>
					</div>

				</div>
			</div>
	    <?php
		}
	}
}
add_action( 'buzzstorepro_footer_widget', 'buzzstorepro_footer_widget_area', 10 );


/**
 * Top Footer Area
*/
if ( ! function_exists( 'buzzstorepro_button_footer_before' ) ) {
	function buzzstorepro_button_footer_before(){
		$footer_button_bg = esc_attr( get_theme_mod( 'buzzstorepro_footer_buttom_area_background_color','#333333' ) );
		?>
			<div class="footer-bottom" <?php if(!empty( $footer_button_bg )) { ?>style="background-color:<?php echo esc_attr( $footer_button_bg ); ?>;"<?php } ?>>
				<div class="buzz-container">
					<div class="copyright clearfix">
						<?php apply_filters( 'buzzstorepro_credit', 5 ); ?>
					</div>
					<div class="payment_card clearfix">
						<?php
							$footerright = get_theme_mod('buzzstorepro_footer_rightside_options','socialmedia');
							if($footerright == 'socialmedia'){
								buzzstorepro_social_links();
							}elseif($footerright == 'footermenu'){
								wp_nav_menu( array( 'theme_location' => 'footermenu', 'depth' => 1 ) );
							}else{
								apply_filters( 'buzzstorepro_payment_logo', 10 );
							}
						?>
					</div>
				</div>
			</div>
		<?php
	}
}
add_action( 'buzzstorepro_button_footer', 'buzzstorepro_button_footer_before', 15 );

/**
 * Footer Area After
*/
if ( ! function_exists( 'buzzstorepro_footer_after' ) ) {
	function buzzstorepro_footer_after(){ ?>
		</footer>
	<?php
	}
}
add_action( 'buzzstorepro_footer_after', 'buzzstorepro_footer_after', 25 );
