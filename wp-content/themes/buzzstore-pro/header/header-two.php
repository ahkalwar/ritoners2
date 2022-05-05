<div class="topheader_text_wrap buzz-topheader">
  <div class="buzz-container">
    <div class="topheader_text_wrap_inner">
    <div class="buzz-clearfix">
        <div class="topheader_text">
            <span class="text_wrap"><?php echo esc_html( get_theme_mod( 'buzzstorepro_header_type_two_title', 'Join with us and be a part of the success' ) ); ?></span>
        </div>
            <div class="buzz-topright">
            <div class="buzz-topright-inner buzz-clearfix">
                <?php
                    $top_right_options = esc_attr( get_theme_mod( 'buzzstorepro_header_rightside_options', 'cartinfo' ) );

                    if($top_right_options =='socialicon'){

                        buzzstorepro_social_links();

                    } else if($top_right_options =='topnavmenu'){

                        wp_nav_menu( array( 'theme_location' => 'topmenu', 'depth' => 1 ) );

                    } else if($top_right_options == 'cartinfo'){
                ?>
                    <ul>
                        <?php
                            $whislist_options = intval( get_theme_mod( 'buzzstorepro_display_wishlist', 1 ) );
                            $account_options = intval( get_theme_mod('buzzstorepro_display_myaccount_login', 1 ) );
                            if( $whislist_options == 1 ){
                            if(function_exists( 'buzzstorepro_products_wishlist' )) {
                        ?>
                                <li>
                                    <?php buzzstorepro_products_wishlist(); ?>
                                </li>

                        <?php } } if( buzzstorepro_is_woocommerce_activated() ) {   if( $account_options == 1 ){  if (is_user_logged_in()) { ?>

                            <li>
                                <span class="icon-user"></span>
                                <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>"><?php esc_html_e('My Account','buzzstore-pro'); ?></a>
                            </li>
                            <li>
                                <span class="icon-logout"></span>
                                <a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>"><?php esc_html_e('Logout','buzzstore-pro'); ?></a>
                            </li>
                        <?php } else{ ?>
                            <li>
                                <span class="icon-login"></span>
                                <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>"><?php esc_html_e('Login','buzzstore-pro'); ?></a>
                            </li>
                            <li>
                                <span class="icon-user"></span>
                                <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>"><?php esc_html_e('Create Your Account','buzzstore-pro'); ?></a>
                            </li>
                        <?php } } } ?>
                    </ul>

                <?php } ?>
            </div><!-- Right section end -->
            </div><!-- Right section end -->
    </div>
    </div>
  </div>
</div>
<div class="buzz-container">


    <div class="mainlogo_wrap buzz-clearfix">
        <div class="header-logo-container">
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

        <div class="header_info_wrap buzz-clearfix">
            <?php
                $email_address    = get_theme_mod('buzzstorepro_quick_email');
                $phone_number     = get_theme_mod('buzzstorepro_quick_phone');
                $phonenumber      = preg_replace("/[^0-9]/","",$phone_number);
                $map_address      = get_theme_mod('buzzstorepro_quick_map_address');

            if(!empty( $phone_number )){ ?>
                <div class="phone_header wow fadeIn">
                  <div class="header_contact_details_inner">
                      <div class="fa_icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                      <div class="title_phone header_contact_details_inner_content">
                          <span class="pnone_title">call us<?php esc_html__('Call Support','buzzstore-pro'); ?></span>
                          <a href="tel:<?php echo esc_attr( $phonenumber ); ?>">
                              <span class="phone"><?php echo esc_attr( $phone_number ); ?></span>
                          </a>
                      </div>
                  </div>
                </div>
            <?php } if(!empty( $email_address )){ ?>
                <div class="email_header wow fadeIn">
                  <div class="header_contact_details_inner">
                    <div class="fa_icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                    <div class="title_email_wrap header_contact_details_inner_content">
                        <span class="title_email">email us<?php esc_html__('Email Support','buzzstore-pro'); ?></span>
                        <a href="mailto:<?php echo esc_attr( antispambot( $email_address ) ); ?>">
                            <span class="email_address"><?php echo esc_attr( antispambot( $email_address ) ); ?></span>
                        </a>
                    </div>
                  </div>
                </div>
            <?php } if(!empty( $map_address )){ ?>
                <div class="location_header wow fadeIn">
                  <div class="header_contact_details_inner">
                    <div class="fa_icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="title_location_wrap header_contact_details_inner_content">
                        <span class="title_location">locate us<?php esc_html__('Location','buzzstore-pro'); ?></span>
                        <span class="location"><?php echo esc_attr( $map_address ); ?></span>
                    </div>
                </div>
              </div>
            <?php } ?>
        </div>
    </div>
</div>
