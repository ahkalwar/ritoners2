<?php
/**
 * Buzz Store Theme Customizer.
 *
 * @package Buzzstore Pro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function buzzstorepro_customize_register( $wp_customize ) {
  $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

  $wp_customize->add_panel('buzzstorepro_general_settings', array(
    'capabitity' => 'edit_theme_options',
    'priority' => 4,
    'title' => esc_html__('General Settings', 'buzzstore-pro')
  ));

  $wp_customize->get_section('title_tagline' )->panel = 'buzzstorepro_general_settings';
  $wp_customize->get_section('title_tagline' )->priority = 1;


/**
 * Demo Import Function Area
*/
$wp_customize->add_section( 'buzzstorepro_demo_import_settings', array(
  'title'           =>      esc_html__('Import Data Demo', 'buzzstore-pro'),
  'priority'        =>      1,
));

    $wp_customize->add_setting( 'buzzstorepro_demo_import', array(
      'default' =>  1,
      'sanitize_callback'     =>  'buzzstorepro_text_sanitize'
    ));

    $wp_customize->add_control(new Buzzstorepro_WP_Customize_Demo_Control( $wp_customize, 'buzzstorepro_demo_import', array(
      'section'       =>      'buzzstorepro_demo_import_settings',
      'label'         =>      esc_html__('Import Demo', 'buzzstore-pro'),
    )));

/**
 * Important Link
*/
$wp_customize->add_section( 'buzzstorepro_implink_section', array(
  'title'       => esc_html__( 'Important Links', 'buzzstore-pro' ),
  'priority'      => 1
) );

    $wp_customize->add_setting( 'buzzstorepro_imp_links', array(
      'sanitize_callback' => 'buzzstorepro_text_sanitize'
    ));

    $wp_customize->add_control( new buzzstorepro_theme_Info_Text( $wp_customize,'buzzstorepro_imp_links', array(
        'settings'    => 'buzzstorepro_imp_links',
        'section'   => 'buzzstorepro_implink_section',
        'description' => '<a class="pro-implink" href="http://docs.sparklewpthemes.com/buzzstorepro/" target="_blank">'.esc_html__('Documentation', 'buzzstore-pro').'</a><a class="pro-implink" href="http://demo.sparklewpthemes.com/buzzstorepro/demos/" target="_blank">'.esc_html__('Live Demo', 'buzzstore-pro').'</a><a class="pro-implink" href="http://sparklewpthemes.com/support/" target="_blank">'.esc_html__('Support Forum', 'buzzstore-pro').'</a><a class="pro-implink" href="https://www.facebook.com/sparklewpthemes/" target="_blank">'.esc_html__('Like us on Facebook', 'buzzstore-pro').'</a>',
      )
    ));

    $wp_customize->add_setting( 'buzzstorepro_setup_instruction', array(
      'sanitize_callback' => 'buzzstorepro_text_sanitize'
    ));

    $wp_customize->add_control( new buzzstorepro_theme_Info_Text( $wp_customize, 'buzzstorepro_setup_instruction', array(
        'settings'    => 'buzzstorepro_setup_instruction',
        'section'   => 'buzzstorepro_implink_section',
        'description' => __( '<strong>Instruction - Setting up Home Page</strong><br/>
        1. Create a new page (any title, like Home )<br/>
        2. In right column: Page Attributes -> Template: Front Page<br/>
        3. Click on Publish<br/>
        4. Go to Appearance-> Customize -> Static Front Page<br/>
        5. Select - A static page<br/>
        6. In Front Page, select the page that you created in the step 1<br/>
        7. Save changes', 'buzzstore-pro'),
      )
    ));

/**
 * Preloader Settings Panel
*/
$wp_customize->add_section( 'buzzstorepro_per_loader_settings', array(
    'title' => esc_html__( 'Preloader Settings', 'buzzstore-pro' ),
    'priority' => 2,
));

      $wp_customize->add_setting( 'buzzstorepro_preloader_options', array( 
          'sanitize_callback' => 'buzzstorepro_checkbox_sanitize' 
      ));

      $wp_customize->add_control( 'buzzstorepro_preloader_options', array(
          'type' => 'checkbox',
          'label' => esc_html__( 'Check to Disable Preloader', 'buzzstore-pro' ),
          'section' => 'buzzstorepro_per_loader_settings',
          'settings' => 'buzzstorepro_preloader_options',
      ));

      // Preloader Select Image Options
      $wp_customize->add_setting( 'buzzstorepro_preloader' , array( 
          'default' => 'default', 
          'sanitize_callback' => 'buzzstorepro_text_sanitize'
      ));

      $wp_customize->add_control( new Buzzstorepro_Preloader_Control( $wp_customize, 'buzzstorepro_preloader', array(
          'label'      => esc_html__( 'Preloader', 'buzzstore-pro' ),
          'section'    => 'buzzstorepro_per_loader_settings',
          'settings'   => 'buzzstorepro_preloader',
      )));

  /**
    * Web Page Layout Section
  */
  $wp_customize->add_section( 'buzzstorepro_web_page_layout', array(
    'title'    => esc_html__('WebLayout Options', 'buzzstore-pro'),
    'priority' => 2,
    'panel'    => 'buzzstorepro_general_settings'
  ));

    $wp_customize->add_setting('buzzstorepro_webpage_layout_options', array(
      'default' => 'fullwidth',
      'sanitize_callback' => 'buzzstorepro_weblayout_sanitize',
    ));

    $wp_customize->add_control('buzzstorepro_webpage_layout_options', array(
      'type' => 'radio',
      'label' => esc_html__('Web Layout Options', 'buzzstore-pro'),
      'section' => 'buzzstorepro_web_page_layout',
      'settings' => 'buzzstorepro_webpage_layout_options',
        'choices' => array(
          'boxed' => esc_html__('Boxed Layout', 'buzzstore-pro'),
          'fullwidth' => esc_html__('Full Width Layout', 'buzzstore-pro')
        )
    ));

  $wp_customize->get_section('colors' )->panel = 'buzzstorepro_general_settings';
  $wp_customize->get_section('colors')->title = esc_html__( 'Themes Colors', 'buzzstore-pro' );
  $wp_customize->get_section('colors' )->priority = 3;

  $wp_customize->add_setting('buzzstorepro_primary_color', array(
      'default' => '#86bc42',
      'sanitize_callback' => 'sanitize_hex_color',        
  ));
  $wp_customize->add_control('buzzstorepro_primary_color', array(
      'type'     => 'color',
      'label'    => esc_html__('Primary Colors', 'buzzstore-pro'),
      'section'  => 'colors',
      'setting'  => 'buzzstorepro_primary_color',
  ));

  /**
   * WoW Animation Settings Area
  */
  $wp_customize->add_section('buzzstorepro_wowanimation_general_settings', array(
    'title' => esc_html__('WoW Animation Settings', 'buzzstore-pro'),
    'panel' => 'buzzstorepro_general_settings',
  ));

    $wp_customize->add_setting('buzzstorepro_wowanimation_options', array(
       'default' => 'yes',
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'buzzstorepro_radio_sanitize' // done
    ));

    $wp_customize->add_control('buzzstorepro_wowanimation_options', array(
       'type'         => 'radio',
       'label'        => esc_html__('Choose WoW Animation Options','buzzstore-pro'),
       'section'      => 'buzzstorepro_wowanimation_general_settings',
       'choices' => array(
          'yes' => esc_html__('Enable', 'buzzstore-pro'),
          'no' => esc_html__('Disable', 'buzzstore-pro'),        
       )
    ));


  /**
   * Script & Style Optimize Settings
  */
  $wp_customize->add_section('buzzstorepro_optimize_general_settings', array(
    'title' => esc_html__('Script & Style Optimize Settings', 'buzzstore-pro'),
    'panel' => 'buzzstorepro_general_settings',
  ));

    $wp_customize->add_setting('buzzstorepro_optimize_script_options', array(
      'default' => 'yes',
      'sanitize_callback' => 'buzzstorepro_radio_sanitize' // done
    ));

    $wp_customize->add_control('buzzstorepro_optimize_script_options', array(
        'type'         => 'radio',
        'label'        => esc_html__('Enable To Load Bundle Minify Script File','buzzstore-pro'),
        'section'      => 'buzzstorepro_optimize_general_settings',
        'choices' => array(
          'yes' => esc_html__('Enable', 'buzzstore-pro'),
          'no' => esc_html__('Disable', 'buzzstore-pro'),        
        )
    ));


    $wp_customize->add_setting('buzzstorepro_optimize_style_options', array(
      'default' => 'yes',
      'sanitize_callback' => 'buzzstorepro_radio_sanitize' // done
    ));

    $wp_customize->add_control('buzzstorepro_optimize_style_options', array(
        'type'         => 'radio',
        'label'        => esc_html__('Enable To Load Bundle Minify Style File','buzzstore-pro'),
        'section'      => 'buzzstorepro_optimize_general_settings',
        'choices' => array(
          'yes' => esc_html__('Enable', 'buzzstore-pro'),
          'no' => esc_html__('Disable', 'buzzstore-pro'),        
        )
    ));



  $wp_customize->get_section('header_image' )->panel = 'buzzstorepro_general_settings';
  $wp_customize->get_section('background_image' )->panel = 'buzzstorepro_general_settings';
  $wp_customize->get_section('background_image' )->priority = 4;

  $buzz_imagepath =  get_template_directory_uri() . '/assets/images/';

/************************************************************************************
** Top Header Settings Options
*************************************************************************************/
    $wp_customize->add_panel('buzzstorepro_top_header_section', array(
      'capabitity' => 'edit_theme_options',
      'description' => esc_html__('Change the top header settings here as you want', 'buzzstore-pro'),
      'priority' => 5,
      'title' => esc_html__('Top Header Settings', 'buzzstore-pro')
    ));

        /**
         * Top Header General Settings Section
        */
        $wp_customize->add_section('buzzstorepro_top_header_general_settings', array(
          'title' => esc_html__('Top Header General Settings', 'buzzstore-pro'),
          'panel' => 'buzzstorepro_top_header_section',
          'priority' => 1,
        ));

          $wp_customize->add_setting('buzzstorepro_top_header_display_options', array(
             'default' => 'yes',
             'capability' => 'edit_theme_options',
             'sanitize_callback' => 'buzzstorepro_radio_sanitize' // done
          ));

          $wp_customize->add_control('buzzstorepro_top_header_display_options', array(
             'type'         => 'radio',
             'label'        => esc_html__('Enable/Disable Top Header Section','buzzstore-pro'),
             'description'  => esc_html__('Choose the option as you want', 'buzzstore-pro'),
             'section'      => 'buzzstorepro_top_header_general_settings',
             'choices' => array(
                'yes' => esc_html__('Enable', 'buzzstore-pro'),
                'no' => esc_html__('Disable', 'buzzstore-pro'),        
             )
          ));

          $wp_customize->add_setting('buzzstorepro_top_header_background_color', array(
             'default' => '#333333',
             'capability' => 'edit_theme_options',
             'sanitize_callback' => 'sanitize_hex_color',
          ));

          $wp_customize->add_control('buzzstorepro_top_header_background_color', array(
             'type'         => 'color',
             'label'        => esc_html__('Top Header Background Colors','buzzstore-pro'),
             'description'  => esc_html__('Select top header background color as you want', 'buzzstore-pro'),
             'section'      => 'buzzstorepro_top_header_general_settings',
          ));


      /**
       * Top Header Left Side Settings Section
      */
      $wp_customize->add_section('buzzstorepro_top_header_leftside_settings', array(
        'title' => esc_html__('Top Header LeftSide Settings', 'buzzstore-pro'),
        'panel' => 'buzzstorepro_top_header_section',
        'priority' => 2,
      ));

        $wp_customize->add_setting('buzzstorepro_header_leftside_options', array(
          'default' => 'topnavmenu',
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'buzzstorepro_header_leftside_style_sanitize'  // done
        ));

        $wp_customize->add_control('buzzstorepro_header_leftside_options', array(
            'type' => 'radio',
            'label' => esc_html__('Choose options as you want', 'buzzstore-pro'),
            'description' => esc_html__('Choose any one options as you want and enter related Information', 'buzzstore-pro'),
            'section' => 'buzzstorepro_top_header_leftside_settings',
            'settings' => 'buzzstorepro_header_leftside_options',
            'choices' => array(
              'socialicon' => esc_html__('Social Icons','buzzstore-pro'),
              'topnavmenu' => esc_html__('Ton Nav Menu','buzzstore-pro'),
              'quickinfo' => esc_html__('Quick Information','buzzstore-pro')
            )
        ));

      /**
       * Top Header Right Side Settings Section
      */
      $wp_customize->add_section('buzzstorepro_top_header_rightside_settings', array(
        'title' => esc_html__('Top Header RightSide Settings', 'buzzstore-pro'),
        'panel' => 'buzzstorepro_top_header_section',
        'priority' => 3,
      ));

        $wp_customize->add_setting('buzzstorepro_header_rightside_options', array(
          'default' => 'cartinfo',
          'sanitize_callback' => 'buzzstorepro_header_rightside_style_sanitize'  // done
        ));

        $wp_customize->add_control('buzzstorepro_header_rightside_options', array(
            'type' => 'radio',
            'label' => esc_html__('Choose options as you want', 'buzzstore-pro'),
            'description' => esc_html__('Choose any one options as you want and enter related Information', 'buzzstore-pro'),
            'section' => 'buzzstorepro_top_header_rightside_settings',
            'settings' => 'buzzstorepro_header_rightside_options',
            'choices' => array(
              'socialicon' => esc_html__('Social Icons','buzzstore-pro'),
              'topnavmenu' => esc_html__('Ton Nav Menu','buzzstore-pro'),
              'cartinfo' => esc_html__('Cart/Wishlist/My Account Information','buzzstore-pro')
            )
        ));

        $wp_customize->add_setting('buzzstorepro_display_wishlist', array(
           'default' => 1,
           'capability' => 'edit_theme_options',
           'sanitize_callback' => 'buzzstorepro_checkbox_sanitize'  //done
        ));

        $wp_customize->add_control('buzzstorepro_display_wishlist', array(
           'type' => 'checkbox',
           'label' => esc_html__('Check to show the wishlist', 'buzzstore-pro'),
           'description' => esc_html__('Check to show the wishlist  (Requires WooCommerce Wishlist Plugins)', 'buzzstore-pro'),
           'section' => 'buzzstorepro_top_header_rightside_settings',
           'settings' => 'buzzstorepro_display_wishlist'
        ));

        $wp_customize->add_setting('buzzstorepro_display_myaccount_login', array(
           'default' => 1,
           'capability' => 'edit_theme_options',
           'sanitize_callback' => 'buzzstorepro_checkbox_sanitize'  //done
        ));

        $wp_customize->add_control('buzzstorepro_display_myaccount_login', array(
           'type' => 'checkbox',
           'label' => esc_html__('Check to show the my account', 'buzzstore-pro'),
           'description' => esc_html__('Check to show the my account or login/register menu (Requires WooCommerce)', 'buzzstore-pro'),
           'section' => 'buzzstorepro_top_header_rightside_settings',
           'settings' => 'buzzstorepro_display_myaccount_login'
        ));

    /**
     * Quick Contact information
    */
    $wp_customize->add_section('buzzstorepro_quick_contact_info', array(
        'title' => esc_html__('Quick Contact Information', 'buzzstore-pro'),
        'panel' => 'buzzstorepro_top_header_section',
        'priority' => 5,
    ));
        $wp_customize->add_setting('buzzstorepro_quick_map_address', array(     
           'default' => '',
           'capability' => 'edit_theme_options',
           'sanitize_callback' => 'buzzstorepro_text_sanitize' //done
        ));

        $wp_customize->add_control('buzzstorepro_quick_map_address', array(
           'type' => 'text',
           'label' => esc_html__('Enter Map Address :', 'buzzstore-pro'),
           'section' => 'buzzstorepro_quick_contact_info',
           'settings' => 'buzzstorepro_quick_map_address'
        ));

        $wp_customize->add_setting('buzzstorepro_quick_email', array(     
           'default' => '',
           'capability' => 'edit_theme_options',
           'sanitize_callback' => 'sanitize_email' //done
        ));

        $wp_customize->add_control('buzzstorepro_quick_email', array(
           'type' => 'text',
           'label' => esc_html__('Enter Email Address :', 'buzzstore-pro'),
           'section' => 'buzzstorepro_quick_contact_info',
           'settings' => 'buzzstorepro_quick_email'
        ));

        $wp_customize->add_setting('buzzstorepro_quick_phone', array(     
           'default' => '',
           'capability' => 'edit_theme_options',
           'sanitize_callback' => 'buzzstorepro_text_sanitize' //done
        ));

        $wp_customize->add_control('buzzstorepro_quick_phone', array(
           'type' => 'text',
           'label' => esc_html__('Enter Phone Number :', 'buzzstore-pro'),
           'section' => 'buzzstorepro_quick_contact_info',
           'settings' => 'buzzstorepro_quick_phone'
        ));

  /**
   * Start of the Social Link Options
  */
    $wp_customize->add_section('buzzstorepro_social_link_activate_settings', array(
      'priority' => 6,
      'title' => esc_html__('Social Media settings', 'buzzstore-pro'),
      'panel' => 'buzzstorepro_top_header_section',
    ));

          $buzzstorepro_social_links = array(
            'buzzstorepro_social_facebook' => array(
            'id' => 'buzzstorepro_social_facebook',
            'title' => esc_html__('Facebook', 'buzzstore-pro'),
            'default' => ''
          ),
            'buzzstorepro_social_twitter' => array(
            'id' => 'buzzstorepro_social_twitter',
            'title' => esc_html__('Twitter', 'buzzstore-pro'),
            'default' => ''
          ),
            'buzzstorepro_social_googleplus' => array(
            'id' => 'buzzstorepro_social_googleplus',
            'title' => esc_html__('Google-Plus', 'buzzstore-pro'),
            'default' => ''
          ),
            'buzzstorepro_social_instagram' => array(
            'id' => 'buzzstorepro_social_instagram',
            'title' => esc_html__('Instagram', 'buzzstore-pro'),
            'default' => ''
          ),
            'buzzstorepro_social_pinterest' => array(
            'id' => 'buzzstorepro_social_pinterest',
            'title' => esc_html__('Pinterest', 'buzzstore-pro'),
            'default' => ''
          ),
            'buzzstorepro_social_youtube' => array(
            'id' => 'buzzstorepro_social_youtube',
            'title' => esc_html__('YouTube', 'buzzstore-pro'),
            'default' => ''
          ),
        );

        $i = 20;

        foreach($buzzstorepro_social_links as $buzzstorepro_social_link) {

          $wp_customize->add_setting($buzzstorepro_social_link['id'], array(
            'default' => $buzzstorepro_social_link['default'],
               'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'  // done
          ));

          $wp_customize->add_control($buzzstorepro_social_link['id'], array(
            'label' => $buzzstorepro_social_link['title'],
            'section'=> 'buzzstorepro_social_link_activate_settings',
            'settings'=> $buzzstorepro_social_link['id'],
            'priority' => $i
          ));

          $wp_customize->add_setting($buzzstorepro_social_link['id'].'_checkbox', array(
            'default' => 0,
               'capability' => 'edit_theme_options',
            'sanitize_callback' => 'buzzstorepro_checkbox_sanitize'  // done
          ));

          $wp_customize->add_control($buzzstorepro_social_link['id'].'_checkbox', array(
            'type' => 'checkbox',
            'label' => esc_html__('Check to show in new tab', 'buzzstore-pro'),
            'section'=> 'buzzstorepro_social_link_activate_settings',
            'settings'=> $buzzstorepro_social_link['id'].'_checkbox',
            'priority' => $i
          ));

          $i++;

        }

/**
 * Main Header Section
*/
$wp_customize->add_panel('buzzstorepro_main_header_section', array(
  'priority' => 6,
  'title' => esc_html__('Main Header Settings', 'buzzstore-pro')
));
      
  /**
   * Main Menu Settings
  */ 
    $wp_customize->add_section( 'buzzstorepro_main_menu_area', array(
      'title'           => esc_html__('Main Menu Settings', 'buzzstore-pro'),
      'priority'        => 1,
      'panel'  => 'buzzstorepro_main_header_section'
    ));

      $wp_customize->add_setting('buzzstorepro_menu_layout', array(
        'default' => 'text-left',
        'sanitize_callback' => 'buzzstorepro_menu_layout',
      ));

      $wp_customize->add_control('buzzstorepro_menu_layout', array(
        'type' => 'select',
        'label' => esc_html__('Select MainMenu Display Position', 'buzzstore-pro'),
        'section' => 'buzzstorepro_main_menu_area',
        'settings' => 'buzzstorepro_menu_layout',
        'choices' => array( 
              'text-left' => esc_html__('Left Side','buzzstore-pro'),
              'text-right' => esc_html__('Right Side','buzzstore-pro'),
              'text-center' => esc_html__('Center','buzzstore-pro')
      )));

  /**
   * Main Header General Settings
  */
  $wp_customize->add_section('buzzstorepro_main_header_settings', array(
    'title' => esc_html__('Header General Settings', 'buzzstore-pro'),
    'priority' => 2,
    'panel'  => 'buzzstorepro_main_header_section'
  ));
      
      $wp_customize->add_setting('buzzstorepro_search_options', array(
        'default' => 1,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'buzzstorepro_checkbox_sanitize' //done
      ));

      $wp_customize->add_control('buzzstorepro_search_options', array(
        'type' => 'checkbox',
        'label' => esc_html__('Check to enable the Search', 'buzzstore-pro'),
        'section' => 'buzzstorepro_main_header_settings',
        'settings' => 'buzzstorepro_search_options'
      ));


      $wp_customize->add_setting('buzzstorepro_search_type', array(
        'default' => 'no',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'buzzstorepro_radio_sanitize' // done
      ));

      $wp_customize->add_control('buzzstorepro_search_type', array(
        'type' => 'radio',
        'label' => esc_html__('Choose the search option per as you want', 'buzzstore-pro'),
        'section' => 'buzzstorepro_main_header_settings',
        'choices' => array(
           'yes' => esc_html__('Normal Search', 'buzzstore-pro'),
           'no' => esc_html__('Advance Search With Category', 'buzzstore-pro'),        
          )
      ));


      $wp_customize->add_setting('buzzstorepro_search_options_placeholder', array(
        'default' => 'Product Search...',
        'sanitize_callback' => 'buzzstorepro_text_sanitize' //done
      ));

      $wp_customize->add_control('buzzstorepro_search_options_placeholder', array(
        'type' => 'text',
        'label' => esc_html__('Enter the search box Placeholder text', 'buzzstore-pro'),
        'section' => 'buzzstorepro_main_header_settings',
        'settings' => 'buzzstorepro_search_options_placeholder'
      ));


      $wp_customize->add_setting('buzzstorepro_header_cart_options', array(
        'default' => 1,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'buzzstorepro_checkbox_sanitize' //done
      ));

      $wp_customize->add_control('buzzstorepro_header_cart_options', array(
        'type' => 'checkbox',
        'label' => esc_html__('Check to Enable the Header Cart', 'buzzstore-pro'),
        'section' => 'buzzstorepro_main_header_settings',
        'settings' => 'buzzstorepro_header_cart_options'
      ));

  /**
   * Header Type 
  */
  $wp_customize->add_section( 'buzzstorepro_header_type', array(
    'title'      => esc_html__( 'Header Types Options', 'buzzstore-pro' ),
    'panel'  => 'buzzstorepro_main_header_section'
  ));

    $wp_customize->add_setting('buzzstorepro_header_type_options', array(
       'default' => 'header-one',
       'sanitize_callback' => 'buzzstorepro_header_type_sanitize', // done
    ));

    $wp_customize->add_control('buzzstorepro_header_type_options', array(
       'type' => 'radio',
       'label' => esc_html__('Choose Header Type or Layout', 'buzzstore-pro'),
       'section' => 'buzzstorepro_header_type',
       'setting' => 'buzzstorepro_header_type_options',
       'choices' => array(
          'header-one'   => esc_html__('Header Layout One', 'buzzstore-pro'),
          'header-two'   => esc_html__('Header Layout Two', 'buzzstore-pro'),
          'header-three' => esc_html__('Header Layout Three', 'buzzstore-pro'),
          'header-four'  => esc_html__('Header Layout Four', 'buzzstore-pro')
    )));

    $wp_customize->add_setting( 'buzzstorepro_header_type_two_title', array(
      'sanitize_callback' => 'buzzstorepro_text_sanitize'
    ));

    $wp_customize->add_control( 'buzzstorepro_header_type_two_title', array(
      'settings'    => 'buzzstorepro_header_type_two_title',
      'section'   => 'buzzstorepro_header_type',
      'description' => esc_html__('Second header leftside title options only work in header layout Two', 'buzzstore-pro'),
      'type'      => 'text',
      'label'     => esc_html__( 'Enter Second Header LeftSide Title', 'buzzstore-pro' )
    ));

/**
 * Banner/Slider Settings Panel
*/
$wp_customize->add_section('buzzstorepro_main_banner_area', array(
  'title' => esc_html__('Home Slider Settings', 'buzzstore-pro'),
  'priority' => 6,
));

    $wp_customize->add_setting('buzzstorepro_slider_section', array(
       'default' => 'enable',
       'sanitize_callback' => 'buzzstorepro_radio_enable_sanitize', // done
    ));

    $wp_customize->add_control('buzzstorepro_slider_section', array(
       'type' => 'radio',
       'label' => esc_html__('Enable/Disable Slider Section', 'buzzstore-pro'),
       'description' => esc_html__('Choose the option as you want', 'buzzstore-pro'),
       'section' => 'buzzstorepro_main_banner_area',
       'setting' => 'buzzstorepro_slider_section',
       'choices' => array(
          'enable' => esc_html__('Enable', 'buzzstore-pro'),
          'disable' => esc_html__('Disable', 'buzzstore-pro'),
    )));


    $wp_customize->add_setting('buzzstorepro_homepage_slider_type', array(
      'default' => 'normal',
      'sanitize_callback' => 'buzzstorepro_slider_type_sanitize'  //done
    ));

    $wp_customize->add_control('buzzstorepro_homepage_slider_type', array(
        'type' => 'radio',
        'label' => esc_html__('Choose Slider Type', 'buzzstore-pro'),
        'section' => 'buzzstorepro_main_banner_area',
        'setting' => 'buzzstorepro_homepage_slider_type',
        'description' => esc_html__('( Note :- 3 Different Slider Types Options, Choose any one Options and wait an moment you have get Slider Related Options and Configer it, Slider Only Working when you are create a new page & select PageTemplate: Front Page & set In Front Page that you have created )"', 'buzzstore-pro'),
        'choices' => array(
           'normal' => esc_html__('Normal Slider', 'buzzstore-pro'),
           'category' => esc_html__('Category Slider', 'buzzstore-pro'),
           'revolution' => esc_html__('Revolution Slider', 'buzzstore-pro'),
        )
    ));

    /**
     * Slider Active CallBack Function Process
    */
    if ( ! function_exists( 'buzzstorepro_revolution_slider_type' ) ) {
        function buzzstorepro_revolution_slider_type(){
          if(esc_attr(get_theme_mod('buzzstorepro_homepage_slider_type','normal')) =='revolution'){
           return true;
          }else{
            return false;
          }
        }
    }

    if ( ! function_exists( 'buzzstorepro_normal_slider_type' ) ) {
        function buzzstorepro_normal_slider_type(){
          if(esc_attr(get_theme_mod('buzzstorepro_homepage_slider_type','normal')) =='normal'){
           return true;
          }else{
            return false;
          }
        }
    }

    if ( ! function_exists( 'buzzstorepro_category_slider_type' ) ) {
        function buzzstorepro_category_slider_type(){
          if(esc_attr(get_theme_mod('buzzstorepro_homepage_slider_type','normal')) =='category'){
           return true;
          }else{
            return false;
          }
        }
    }

    /* Category Main Slider Category */
    $wp_customize->add_setting( 'buzzstorepro_slider_team_id', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control( new buzzstorepro_Category_Dropdown( $wp_customize, 'buzzstorepro_slider_team_id', array(
        'label' => esc_html__( 'Select Slide Category', 'buzzstore-pro' ),
        'description' => esc_html__('Select Category for Slider ( Note :- Slider only wroking when you are create a new page & select PageTemplate: Front Page & set In Front Page, that you created ) ', 'buzzstore-pro'),
        'section' => 'buzzstorepro_main_banner_area',
        'active_callback' => 'buzzstorepro_category_slider_type',      
    )));


      /**
       * Normal Slider Settings Area
      */
      $wp_customize->add_setting( 'buzzstorepro_banner_all_sliders', array(
          'sanitize_callback' => 'buzzstorepro_sanitize_repeater',
          'default' => json_encode( array(
            array(
                  'slider_image' => '' ,
                  'slider_title' => '',
                  'slider_desc' => '',
                  'button_text' => '',
                  'button_url' => ''
                )
          ) )        
      ));
      
      $wp_customize->add_control( new Buzzstorepro_Repeater_Controler( $wp_customize, 'buzzstorepro_banner_all_sliders', array(
          'label'   => esc_html__('Slider Settings Area','buzzstore-pro'),
          'section' => 'buzzstorepro_main_banner_area',
          'settings' => 'buzzstorepro_banner_all_sliders',
          'active_callback' => 'buzzstorepro_normal_slider_type',
          'buzzstorepro_box_label' => esc_html__('Slider Settings Options','buzzstore-pro'),
          'buzzstorepro_box_add_control' => esc_html__('Add New Slider','buzzstore-pro'),
      ),
        array(
          'slider_image' => array(
            'type'      => 'upload',
            'label'     => esc_html__( 'Upload Slider Image', 'buzzstore-pro' )
          ),
          'slider_title' => array(
            'type'      => 'text',
            'label'     => esc_html__( 'Enter Slider Title', 'buzzstore-pro' ),
            'default'   => ''
          ),
          'slider_desc' => array(
            'type'      => 'textarea',
            'label'     => esc_html__( 'Enter Slider Short Desc', 'buzzstore-pro' ),
            'default'   => ''
          ),
          'button_text' => array(
            'type'      => 'text',
            'label'     => esc_html__( 'Enter Button Text', 'buzzstore-pro' ),
            'default'   => ''
          ),
          'button_url' => array(
            'type'      => 'text',
            'label'     => esc_html__( 'Enter Button Url', 'buzzstore-pro' ),
            'default'   => ''
          )
      )));

      /* Revolution Slider Settings */
      $wp_customize->add_setting('buzzstorepro_slider_revolution', array(
        'default'       =>      '',
        'sanitize_callback' => 'buzzstorepro_text_sanitize'
      ));

      $wp_customize->add_control('buzzstorepro_slider_revolution', array(
        'section'    => 'buzzstorepro_main_banner_area',
        'label'      => esc_html__('Revolution Slider Shortcode', 'buzzstore-pro'),
        'type'       => 'textarea',
        'description'=> esc_html__('Enter the Revolution Slider Plugins Shortcode Example ([rev_slider yourslidername])','buzzstore-pro'),
        'active_callback' => 'buzzstorepro_revolution_slider_type',     
      ));


  $imagepath =  get_template_directory_uri() . '/assets/images/';
      
      /**
       * Slider Layout Settings Area
      */
      $wp_customize->add_setting('buzzstorepro_slider_layout', array(
        'default' => 'fullwidth',
        'sanitize_callback' => 'buzzstorepro_slider_layout_sanitize'  //done
      ));

      $wp_customize->add_control(new buzzstorepro_Image_Radio_Control($wp_customize, 'buzzstorepro_slider_layout', array(
        'type' => 'radio',
        'label' => esc_html__('Slider Layout Options', 'buzzstore-pro'),
        'section' => 'buzzstorepro_main_banner_area',
        'settings' => 'buzzstorepro_slider_layout',
        'description' => esc_html__('( Note :- Promo Area Only Appere When you have Choose (3 or 4) Slider Layout, and Wait an moment you have get Promo Settings Options and Configer it)', 'buzzstore-pro'),
        'choices' => array( 
                'fullwidth' => $imagepath.'fullslider.png',  
                'boxed' => $imagepath.'boxedslider.png',
                'sliderpromoleft' => $imagepath.'boxpromosliderright.png ', 
                'sliderpromoright' => $imagepath.'boxpromoslider.png',                     
              )
      )));


      if ( ! function_exists( 'buzzstorepro_promo_slider_type' ) ) {
          function buzzstorepro_promo_slider_type(){
            $promolayout = get_theme_mod('buzzstorepro_slider_layout','fullwidth');
            if( $promolayout =='sliderpromoleft' || $promolayout =='sliderpromoright'){
              return true;
            }else{
              return false;
            }
          }
      }


      /**
       * Promo Single Or Slide Image Settings Area
      */
      $wp_customize->add_setting( 'buzzstorepro_slider_promo_one', array(
          'default'       =>      '',
          'sanitize_callback' => 'esc_url_raw'
      ));

      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'buzzstorepro_slider_promo_one', array(
          'section'       => 'buzzstorepro_main_banner_area',
          'label'         => esc_html__('Upload Slider Promo Image', 'buzzstore-pro'),
          'type'          => 'image',
          'active_callback' => 'buzzstorepro_promo_slider_type',
      )));

      $wp_customize->add_setting( 'buzzstorepro_slider_promo_one_url', array(
          'default' => '',
          'sanitize_callback' => 'esc_url_raw',
      ));

      $wp_customize->add_control( 'buzzstorepro_slider_promo_one_url', array(
          'type' => 'url',
          'section' => 'buzzstorepro_main_banner_area',
          'label' => esc_html__( 'Enter Custom External URL', 'buzzstore-pro' ),
          'active_callback' => 'buzzstorepro_promo_slider_type',
      ) );

/**
 * Services Section
*/
$wp_customize->add_panel('buzzstorepro_services_settings', array(
   'priority' => 7,
   'title' => esc_html__('Services Area Settings', 'buzzstore-pro')
));
  
      $wp_customize->add_section( 'buzzstorepro_services_area', array(
        'title'           => esc_html__('Header Services Area Settings', 'buzzstore-pro'),
        'priority'        => 1,
        'panel' => 'buzzstorepro_services_settings',
        'description' => esc_html__('( Note :- Header Services Area only wroking when you are create a new page & select PageTemplate: Front Page & set In Front Page that you created )"', 'buzzstore-pro'),
      ));

          $wp_customize->add_setting('buzzstorepro_services_area_settings', array(
            'default' => 'enable',
            'sanitize_callback' => 'buzzstorepro_radio_enable_sanitize',
        ));

        $wp_customize->add_control('buzzstorepro_services_area_settings', array(
          'type' => 'radio',
          'label' => esc_html__('Enable/Disable Section', 'buzzstore-pro'),
          'section' => 'buzzstorepro_services_area',
          'settings' => 'buzzstorepro_services_area_settings',
          'choices' => array(
               'enable' => esc_html__('Enable', 'buzzstore-pro'),
               'disable' => esc_html__('Disable', 'buzzstore-pro')
              )
        ));

        $wp_customize->add_setting('buzzstorepro_services_layout', array(
          'default' => 'layout-one',
          'sanitize_callback' => 'buzzstorepro_services_layouts',
        ));

        $wp_customize->add_control('buzzstorepro_services_layout', array(
          'type' => 'select',
          'label' => esc_html__('Select Services Layout', 'buzzstore-pro'),
          'section' => 'buzzstorepro_services_area',
          'settings' => 'buzzstorepro_services_layout',
          'choices' => array( 
                'layout-one' => esc_html__('Layout One','buzzstore-pro'),
                'layout-two' => esc_html__('Layout Two','buzzstore-pro')
        )));

      /**
       * Services Area
      */
      for( $i = 1; $i < 4; $i++ ){

        $wp_customize->add_setting( 'buzzstorepro_header_services_heading'.$i, array(
          'sanitize_callback' => 'buzzstorepro_text_sanitize'
        ));

        $wp_customize->add_control( new Buzzstorepro_Customize_Heading( $wp_customize, 'buzzstorepro_header_services_heading'.$i, array(
            'settings'    => 'buzzstorepro_header_services_heading'.$i,
            'section'   => 'buzzstorepro_services_area',
            'label'     => esc_html__( 'Header Services Area ', 'buzzstore-pro' ). $i,
          )
        ));

        $wp_customize->add_setting( 'buzzstorepro_services_icon'.$i, array(
          'default'     => 'fa fa-bell',
          'sanitize_callback' => 'buzzstorepro_text_sanitize'
        ));
        
        $wp_customize->add_control( new Buzzstorepro_Fontawesome_Icon_Chooser( $wp_customize, 'buzzstorepro_services_icon'.$i, array(
            'settings'    => 'buzzstorepro_services_icon'.$i,
            'section'   => 'buzzstorepro_services_area',
            'type'      => 'icon',
            'label'     => esc_html__( 'Select Services Icon', 'buzzstore-pro' )
          )
        ));

        $wp_customize->add_setting( 'buzzstorepro_services_title'.$i, array(
          'sanitize_callback' => 'buzzstorepro_text_sanitize'
        ));

        $wp_customize->add_control( 'buzzstorepro_services_title'.$i, array(
          'settings'    => 'buzzstorepro_services_title'.$i,
          'section'   => 'buzzstorepro_services_area',
          'type'      => 'text',
          'label'     => esc_html__( 'Enter Services Title', 'buzzstore-pro' )
        ));

        $wp_customize->add_setting( 'buzzstorepro_services_desc'.$i, array(
          'sanitize_callback' => 'buzzstorepro_text_sanitize'
        ));

        $wp_customize->add_control( 'buzzstorepro_services_desc'.$i, array(
          'settings'    => 'buzzstorepro_services_desc'.$i,
          'section'   => 'buzzstorepro_services_area',
          'type'      => 'textarea',
          'label'     => esc_html__( 'Enter Services Description', 'buzzstore-pro' )
        ));
        
      }

      $wp_customize->add_section( 'buzzstorepro_services_footer_area', array(
        'title'           => esc_html__('Footer Services Area Settings', 'buzzstore-pro'),
        'priority'        => 2,
        'panel' => 'buzzstorepro_services_settings',
        'description' => esc_html__('( Note :- Footer Services Area only wroking when you are create a new page & select PageTemplate: Front Page & set In Front Page that you created )"', 'buzzstore-pro'),
      ));

          $wp_customize->add_setting('buzzstorepro_services_footer_area_settings', array(
            'default' => 'enable',
            'sanitize_callback' => 'buzzstorepro_radio_enable_sanitize',
        ));

        $wp_customize->add_control('buzzstorepro_services_footer_area_settings', array(
          'type' => 'radio',
          'label' => esc_html__('Enable/Disable Section', 'buzzstore-pro'),
          'section' => 'buzzstorepro_services_footer_area',
          'settings' => 'buzzstorepro_services_footer_area_settings',
          'choices' => array(
               'enable' => esc_html__('Enable', 'buzzstore-pro'),
               'disable' => esc_html__('Disable', 'buzzstore-pro')
              )
        ));

        $wp_customize->add_setting('buzzstorepro_footer_services_layout', array(
          'default' => 'layout-one',
          'sanitize_callback' => 'buzzstorepro_services_layouts',
        ));

        $wp_customize->add_control('buzzstorepro_footer_services_layout', array(
          'type' => 'select',
          'label' => esc_html__('Select Services Layout', 'buzzstore-pro'),
          'section' => 'buzzstorepro_services_footer_area',
          'settings' => 'buzzstorepro_footer_services_layout',
          'choices' => array( 
                'layout-one' => esc_html__('Layout One','buzzstore-pro'),
                'layout-two' => esc_html__('Layout Two','buzzstore-pro')
        )));

      /**
       * Services Area
      */
      for( $i = 1; $i < 4; $i++ ){

        $wp_customize->add_setting( 'buzzstorepro_footer_services_heading'.$i, array(
          'sanitize_callback' => 'buzzstorepro_text_sanitize'
        ));

        $wp_customize->add_control( new Buzzstorepro_Customize_Heading( $wp_customize, 'buzzstorepro_footer_services_heading'.$i, array(
            'settings'    => 'buzzstorepro_footer_services_heading'.$i,
            'section'   => 'buzzstorepro_services_footer_area',
            'label'     => esc_html__( 'Footer Services Area ', 'buzzstore-pro' ). $i,
          )
        ));

        $wp_customize->add_setting( 'buzzstorepro_footer_services_icon'.$i, array(
          'default'     => 'fa fa-bell',
          'sanitize_callback' => 'buzzstorepro_text_sanitize'
        ));
        
        $wp_customize->add_control( new Buzzstorepro_Fontawesome_Icon_Chooser( $wp_customize, 'buzzstorepro_footer_services_icon'.$i, array(
            'settings'    => 'buzzstorepro_footer_services_icon'.$i,
            'section'   => 'buzzstorepro_services_footer_area',
            'type'      => 'icon',
            'label'     => esc_html__( 'Select Services Icon', 'buzzstore-pro' )
          )
        ));

        $wp_customize->add_setting( 'buzzstorepro_footer_services_title'.$i, array(
          'sanitize_callback' => 'buzzstorepro_text_sanitize'
        ));

        $wp_customize->add_control( 'buzzstorepro_footer_services_title'.$i, array(
          'settings'    => 'buzzstorepro_footer_services_title'.$i,
          'section'   => 'buzzstorepro_services_footer_area',
          'type'      => 'text',
          'label'     => esc_html__( 'Enter Services Title', 'buzzstore-pro' )
        ));

        $wp_customize->add_setting( 'buzzstorepro_footer_services_desc'.$i, array(
          'sanitize_callback' => 'buzzstorepro_text_sanitize'
        ));

        $wp_customize->add_control( 'buzzstorepro_footer_services_desc'.$i, array(
          'settings'    => 'buzzstorepro_footer_services_desc'.$i,
          'section'   => 'buzzstorepro_services_footer_area',
          'type'      => 'textarea',
          'label'     => esc_html__( 'Enter Services Description', 'buzzstore-pro' )
        ));
        
      }   


/**
 * Home 1 - Full Width Section
*/
$buzzstorepro_home_section = $wp_customize->get_section( 'sidebar-widgets-buzzstorehomearea' );
if ( ! empty( $buzzstorepro_home_section ) ) {
    $buzzstorepro_home_section->panel = '';
    $buzzstorepro_home_section->title = esc_html__( 'Buzz : Home Main Widget Area', 'buzzstore-pro' );
    $buzzstorepro_home_section->priority = 8;
}


    /**
     * Breadcrumbs Settings
    */
    $wp_customize->add_panel('buzzstorepro_breadcrumbs_settings', array(
       'capability' => 'edit_theme_options',
       'description'=> esc_html__('Manage breadcrumbs settings here as you want', 'buzzstore-pro'),
       'priority' => 8,
       'title' => esc_html__('Breadcrumbs Settings', 'buzzstore-pro')
    ));

        $wp_customize->add_section('buzzstorepro_woocommerce_breadcrumbs_settings', array(
          'priority' => 2,
          'title' => esc_html__('WooCommerce Breadcrumbs', 'buzzstore-pro'),
          'panel' => 'buzzstorepro_breadcrumbs_settings'
        ));           

            $wp_customize->add_setting('buzzstorepro_woocommerce_enable_disable_section', array(
               'default' => 'enable',
               'capability' => 'edit_theme_options',
               'sanitize_callback' => 'buzzstorepro_radio_enable_sanitize', // done
            ));

            $wp_customize->add_control('buzzstorepro_woocommerce_enable_disable_section', array(
               'type' => 'radio',
               'label' => esc_html__('Enable/Disable Breadcrumbs Section', 'buzzstore-pro'),
               'description' => esc_html__('Choose any options as you want','buzzstore-pro'),
               'section' => 'buzzstorepro_woocommerce_breadcrumbs_settings',
               'setting' => 'buzzstorepro_woocommerce_enable_disable_section',
               'choices' => array(
                  'enable' => esc_html__('Enable', 'buzzstore-pro'),
                  'disable' => esc_html__('Disable', 'buzzstore-pro'),
            )));

            $wp_customize->add_setting('buzzstorepro_breadcrumbs_woocommerce_background_image', array(
               'default' => '',
               'capability' => 'edit_theme_options',
               'sanitize_callback' => 'esc_url_raw'
            ));

            $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'buzzstorepro_breadcrumbs_woocommerce_background_image', array(
               'label' => esc_html__('Upload Breadcrumbs Background Image', 'buzzstore-pro'),
               'section' => 'buzzstorepro_woocommerce_breadcrumbs_settings',
               'setting' => 'buzzstorepro_breadcrumbs_woocommerce_background_image'
            )));      


      $wp_customize->add_section('buzzstorepro_breadcrumbs_normal_page_section', array(
          'priority' => 4,
          'title' => esc_html__('Normal Page Settings', 'buzzstore-pro'),
          'panel' => 'buzzstorepro_breadcrumbs_settings'
       ));

          $wp_customize->add_setting('buzzstorepro_normal_page_enable_disable_section', array(
             'default' => 'enable',
             'capability' => 'edit_theme_options',
             'sanitize_callback' => 'buzzstorepro_radio_enable_sanitize', // done
          ));

          $wp_customize->add_control('buzzstorepro_normal_page_enable_disable_section', array(
             'type' => 'radio',
             'label' => esc_html__('Enable or Disable Breadcrumbs Section', 'buzzstore-pro'),
             'description' => esc_html__('Choose any options as you want','buzzstore-pro'),
             'section' => 'buzzstorepro_breadcrumbs_normal_page_section',
             'setting' => 'buzzstorepro_normal_page_enable_disable_section',
             'choices' => array(
                'enable' => esc_html__('Enable', 'buzzstore-pro'),
                'disable' => esc_html__('Disable', 'buzzstore-pro'),
          )));

          $wp_customize->add_setting('buzzstorepro_breadcrumbs_normal_page_background_image', array(
             'default' => '',
             'capability' => 'edit_theme_options',
             'sanitize_callback' => 'esc_url_raw'
          ));

          $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'buzzstorepro_breadcrumbs_normal_page_background_image', array(
             'label' => esc_html__('Upload Breadcrumbs Background Image', 'buzzstore-pro'),
             'section' => 'buzzstorepro_breadcrumbs_normal_page_section',
             'setting' => 'buzzstorepro_breadcrumbs_normal_page_background_image'
          )));

      $wp_customize->add_section('buzzstorepro_breadcrumbs_post_archive_page_section', array(
          'priority' => 5,
          'title' => esc_html__('Posts/Archive Page Settings', 'buzzstore-pro'),
          'panel' => 'buzzstorepro_breadcrumbs_settings'
       ));

          $wp_customize->add_setting('buzzstorepro_post_archive_page_enable_disable_section', array(
             'default' => 'enable',
             'capability' => 'edit_theme_options',
             'sanitize_callback' => 'buzzstorepro_radio_enable_sanitize', // done
          ));

          $wp_customize->add_control('buzzstorepro_post_archive_page_enable_disable_section', array(
             'type' => 'radio',
             'label' => esc_html__('Enable or Disable Breadcrumbs Section', 'buzzstore-pro'),
             'description' => esc_html__('Choose any options as you want','buzzstore-pro'),
             'section' => 'buzzstorepro_breadcrumbs_post_archive_page_section',
             'setting' => 'buzzstorepro_post_archive_page_enable_disable_section',
             'choices' => array(
                'enable' => esc_html__('Enable', 'buzzstore-pro'),
                'disable' => esc_html__('Disable', 'buzzstore-pro'),
          )));

          $wp_customize->add_setting('buzzstorepro_breadcrumbs_post_archive_background_image', array(
             'default' => '',
             'capability' => 'edit_theme_options',
             'sanitize_callback' => 'esc_url_raw'
          ));

          $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'buzzstorepro_breadcrumbs_post_archive_background_image', array(
             'label' => esc_html__('Upload Breadcrumbs Background Image', 'buzzstore-pro'),
             'section' => 'buzzstorepro_breadcrumbs_post_archive_page_section',
             'setting' => 'buzzstorepro_breadcrumbs_post_archive_background_image'
          )));

if( buzzstorepro_is_woocommerce_activated() ) {

  /**
   * Start of the WooCommerce Design Options
  */
  $wp_customize->add_panel('buzzstorepro_woocommerce_design_options', array(
      'capabitity' => 'edit_theme_options',
      'description' => esc_html__('Change the Design Settings and Options Settings of WooCommerce here as you want', 'buzzstore-pro'),
      'priority' => 9,
      'title' => esc_html__('WooCommerce Settings', 'buzzstore-pro')
  ));
     
    $wp_customize->add_section('buzzstorepro_woocommerce_category_page_settings', array(
      'priority' => 1,
      'title' => esc_html__('Category Pages Settings', 'buzzstore-pro'),
      'panel' => 'buzzstorepro_woocommerce_design_options'
    ));

        $wp_customize->add_setting('buzzstorepro_woocommerce_category_page_layout', array(
          'default' => 'rightsidebar',
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'buzzstorepro_layout_sanitize'  //done
        ));

        $wp_customize->add_control(new buzzstorepro_Image_Radio_Control($wp_customize, 'buzzstorepro_woocommerce_category_page_layout', array(
          'type' => 'radio',
          'label' => esc_html__('Select WooCommerce Category Layout', 'buzzstore-pro'),
          'section' => 'buzzstorepro_woocommerce_category_page_settings',
          'settings' => 'buzzstorepro_woocommerce_category_page_layout',
          'choices' => array( 
                  'leftsidebar'  => $buzz_imagepath.'left-sidebar.png',  
                  'rightsidebar' => $buzz_imagepath.'right-sidebar.png',
                  'nosidebar'    => $buzz_imagepath.'no-sidebar.png',
                )
        )));
       

        $wp_customize->add_setting('buzzstorepro_woocommerce_category_product_per_page', array(
          'default' => 3,
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'buzzstorepro_product_per_page_sanitize'  //done
        ));

        $wp_customize->add_control('buzzstorepro_woocommerce_category_product_per_page', array(
          'type' => 'select',
          'label' => esc_html__('Display Number Row', 'buzzstore-pro'),
          'section' => 'buzzstorepro_woocommerce_category_page_settings',
          'settings' => 'buzzstorepro_woocommerce_category_product_per_page',
          'choices' => array( 
                  '2' => '2',  
                  '3' => '3', 
                  '4' => '4',
        )));

        $wp_customize->add_setting('buzzstorepro_woocommerce_category_per_page_product_number', array(
          'default' => 12,
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'buzzstorepro_sanitize_number'  // done
        ));

        $wp_customize->add_control('buzzstorepro_woocommerce_category_per_page_product_number', array(
          'type' => 'number',
          'label' => esc_html__('Enter Display Number Products Per Page', 'buzzstore-pro'),
          'section' => 'buzzstorepro_woocommerce_category_page_settings',
          'settings' => 'buzzstorepro_woocommerce_category_per_page_product_number'
        ));

    /**
     * WooCommerce Product Single Page Settings
    */  
    $wp_customize->add_section('buzzstorepro_woocommerce_product_page_settings', array(
      'priority' => 2,
      'title' => esc_html__('Single Product Page Settings', 'buzzstore-pro'),
      'panel' => 'buzzstorepro_woocommerce_design_options'
    ));

        $wp_customize->add_setting('buzzstorepro_woocommerce_product_page_layout', array(
          'default' => 'rightsidebar',
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'buzzstorepro_layout_sanitize'  //done
        ));

        $wp_customize->add_control(new buzzstorepro_Image_Radio_Control($wp_customize, 'buzzstorepro_woocommerce_product_page_layout', array(
          'type' => 'radio',
          'label' => esc_html__('Select WooCommerce Single Layout', 'buzzstore-pro'),
          'section' => 'buzzstorepro_woocommerce_product_page_settings',
          'settings' => 'buzzstorepro_woocommerce_product_page_layout',
          'choices' => array( 
                  'leftsidebar'  => $buzz_imagepath.'left-sidebar.png',  
                  'rightsidebar' => $buzz_imagepath.'right-sidebar.png',
                  'nosidebar'    => $buzz_imagepath.'no-sidebar.png',
                )
        )));

        $wp_customize->add_setting('buzzstorepro_woocommerce_product_page_upsells_product_number', array(
          'default' => 3,
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'buzzstorepro_sanitize_number'  // done
        ));

        $wp_customize->add_control('buzzstorepro_woocommerce_product_page_upsells_product_number', array(
          'type' => 'number',
          'label' => esc_html__('Enter Display Number of Upsells products', 'buzzstore-pro'),
          'section' => 'buzzstorepro_woocommerce_product_page_settings',
          'settings' => 'buzzstorepro_woocommerce_product_page_upsells_product_number'
        ));

        $wp_customize->add_setting('buzzstorepro_woocommerce_product_page_related_product_number', array(
          'default' => 3,
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'buzzstorepro_sanitize_number'  // done
        ));

        $wp_customize->add_control('buzzstorepro_woocommerce_product_page_related_product_number', array(
          'type' => 'number',
          'label' => esc_html__('Enter Display Number of related products', 'buzzstore-pro'),
          'section' => 'buzzstorepro_woocommerce_product_page_settings',
          'settings' => 'buzzstorepro_woocommerce_product_page_related_product_number'
        ));
}


    /**
     * Brand Logo Settings Area
    */
    $wp_customize->add_section('buzzstorepro_brand_logo_settings', array(
      'priority' => 114,
      'title' => esc_html__('Brand/Client Logo settings', 'buzzstore-pro')
    ));

        $wp_customize->add_setting( 'buzzstorepro_brand_logo_options', array(
            'sanitize_callback' => 'buzzstorepro_sanitize_repeater',
            'default' => json_encode( array(
              array(
                    'brand_logo' => '' ,
                    'brand_logo_url' => ''
                  )
              ) )        
        ));
        
        $wp_customize->add_control( new Buzzstorepro_Repeater_Controler( $wp_customize, 'buzzstorepro_brand_logo_options', array(
            'label'   => esc_html__('Brand/Client Logo Settings','buzzstore-pro'),
            'section' => 'buzzstorepro_brand_logo_settings',
            'settings' => 'buzzstorepro_brand_logo_options',
            'buzzstorepro_box_label' => esc_html__('Brand Logo Settings Options','buzzstore-pro'),
            'buzzstorepro_box_add_control' => esc_html__('Add New Logo','buzzstore-pro'),
          ),
          array(
            'brand_logo' => array(
              'type'      => 'upload',
              'label'     => esc_html__( 'Upload Brand/Client Logo', 'buzzstore-pro' )
            ),
            'brand_logo_url' => array(
              'type'      => 'text',
              'label'     => esc_html__( 'Brand/Client Logo External Link URL', 'buzzstore-pro' ),
              'default'   => ''
            )
          )
        ));
 
    /**
     * Start Footer Section here      
    */
    $wp_customize->add_panel('buzzstorepro_footer_settings', array(
      'priority' => 115,
      'title' => esc_html__('Footer Settings', 'buzzstore-pro'),
      'capability' => 'edit_theme_options',
    ));

      /**
       * Footer Area Two Settings
      */
      $wp_customize->add_section('buzzstorepro_footer_area_two_settings', array(
         'priority' => 2,
         'title' => esc_html__('Footer Area Settings', 'buzzstore-pro'),
         'panel'=> 'buzzstorepro_footer_settings'
      ));

          $wp_customize->add_setting('buzzstorepro_footer_logo_options', array(
             'default' => 'enable',
             'sanitize_callback' => 'buzzstorepro_radio_enable_sanitize', // done
          ));

          $wp_customize->add_control('buzzstorepro_footer_logo_options', array(
             'type' => 'radio',
             'label' => esc_html__('Enable/Disable Footer Logo Area', 'buzzstore-pro'),
             'description' => esc_html__('Choose any options as you want','buzzstore-pro'),
             'section' => 'buzzstorepro_footer_area_two_settings',
             'setting' => 'buzzstorepro_footer_logo_options',
             'choices' => array(
                'enable' => esc_html__('Enable', 'buzzstore-pro'),
                'disable' => esc_html__('Disable', 'buzzstore-pro'),
          )));

          $wp_customize->add_setting('buzzstorepro_footer_area_two_enable_disable_section', array(
             'default' => 'enable',
             'capability' => 'edit_theme_options',
             'sanitize_callback' => 'buzzstorepro_radio_enable_sanitize', // done
          ));

          $wp_customize->add_control('buzzstorepro_footer_area_two_enable_disable_section', array(
             'type' => 'radio',
             'label' => esc_html__('Enable/Disable Main Footer Section', 'buzzstore-pro'),
             'description' => esc_html__('Choose any options as you want','buzzstore-pro'),
             'section' => 'buzzstorepro_footer_area_two_settings',
             'setting' => 'buzzstorepro_footer_area_two_enable_disable_section',
             'choices' => array(
                'enable' => esc_html__('Enable', 'buzzstore-pro'),
                'disable' => esc_html__('Disable', 'buzzstore-pro'),
          )));

          $wp_customize->add_setting('buzzstorepro_footer_area_two_background_color', array(
             'default' => '#222222',
             'priority' => 2,     
             'capability' => 'edit_theme_options',
             'sanitize_callback' => 'sanitize_hex_color'
          ));

          $wp_customize->add_control('buzzstorepro_footer_area_two_background_color', array(
             'type'         => 'color',
             'label'        => esc_html__('Footer Area Background Colors','buzzstore-pro'),
             'description'  => esc_html__('Select default footer area two background color as you want', 'buzzstore-pro'),
             'section'      => 'buzzstorepro_footer_area_two_settings',
          ));      

      /**
       * Footer Area One Settings
      */
      $wp_customize->add_section('buzzstorepro_footer_buttom_area_settings', array(
         'priority' => 3,
         'title' => esc_html__('Sub Footer Area Settings', 'buzzstore-pro'),
         'panel'=> 'buzzstorepro_footer_settings'
      ));
     

          $wp_customize->add_setting('buzzstorepro_footer_buttom_area_background_color', array(
             'default' => '#333333',
             'priority' => 2,     
             'capability' => 'edit_theme_options',
             'sanitize_callback' => 'sanitize_hex_color',
          ));

          $wp_customize->add_control('buzzstorepro_footer_buttom_area_background_color', array(
             'type'         => 'color',
             'label'        => esc_html__('Sub Footer Background Colors','buzzstore-pro'),
             'description'  => esc_html__('Select default footer buttom area background color as you want', 'buzzstore-pro'),
             'section'      => 'buzzstorepro_footer_buttom_area_settings',
          ));      

          $wp_customize->add_setting('buzzstorepro_footer_buttom_copyright_setting', array(
             'default' => '',
             'sanitize_callback' => 'buzzstorepro_text_sanitize'  //done
          ));

          $wp_customize->add_control('buzzstorepro_footer_buttom_copyright_setting', array(
             'type' => 'textarea',
             'label' => esc_html__('Footer Bottom Left Content (Copyright Text)', 'buzzstore-pro'),
             'section' => 'buzzstorepro_footer_buttom_area_settings',
             'settings' => 'buzzstorepro_footer_buttom_copyright_setting'
          ));


          $wp_customize->add_setting('buzzstorepro_footer_rightside_options', array(
            'default' => 'socialmedia',
            'sanitize_callback' => 'buzzstorepro_footer_rightside_sanitize'  //done
          ));

          $wp_customize->add_control('buzzstorepro_footer_rightside_options', array(
            'type' => 'radio',
            'label' => esc_html__('Sub Footer Right Side Options', 'buzzstore-pro'),
            'section' => 'buzzstorepro_footer_buttom_area_settings',
            'settings' => 'buzzstorepro_footer_rightside_options',
            'choices' => array( 
                  'socialmedia' => esc_html__('Social Media Link','buzzstore-pro'),
                  'footermenu'  => esc_html__('Footer Menu','buzzstore-pro'),
                  'paymentlogo'  => esc_html__('Payment Logo','buzzstore-pro')
          )));

      $wp_customize->add_section('buzzstorepro_payment_logo_settings', array(
         'priority' => 4,
         'title' => esc_html__('Payment Logo Settings', 'buzzstore-pro'),
         'panel'=> 'buzzstorepro_footer_settings'
      ));

          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paymentlogo_image_one', array(
            'section'       =>      'paymentlogo_images',
            'label'         =>      esc_html__('Upload Payment Logo Image', 'buzzstore-pro'),
            'type'          =>      'image',
          )));

          $wp_customize->add_setting( 'paymentlogo_image_two', array(
              'default'       =>      '',
              'sanitize_callback' => 'esc_url_raw'  // done
          ));
         
          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paymentlogo_image_two', array(
              'section'       =>      'buzzstorepro_payment_logo_settings',
              'label'         =>      esc_html__('Upload Payment Logo Image', 'buzzstore-pro'),
              'type'          =>      'image',
          )));

          $wp_customize->add_setting( 'paymentlogo_image_three', array(
              'default'       =>      '',
              'sanitize_callback' => 'esc_url_raw'  // done
          ));
         
          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paymentlogo_image_three', array(
              'section'       =>      'buzzstorepro_payment_logo_settings',
              'label'         =>      esc_html__('Upload Payment Logo Image', 'buzzstore-pro'),
              'type'          =>      'image',
          )));

          $wp_customize->add_setting( 'paymentlogo_image_four', array(
              'default'       =>      '',
              'sanitize_callback' => 'esc_url_raw'   // done
          ));
         
          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paymentlogo_image_four', array(
              'section'       =>      'buzzstorepro_payment_logo_settings',
              'label'         =>      esc_html__('Upload Payment Logo Image', 'buzzstore-pro'),
              'type'          =>      'image',
          )));

          $wp_customize->add_setting( 'paymentlogo_image_five', array(
              'default'       =>      '',
              'sanitize_callback' => 'esc_url_raw'   // done
          ));
         
          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paymentlogo_image_five', array(
              'section'       =>      'buzzstorepro_payment_logo_settings',
              'label'         =>      esc_html__('Upload Payment Logo Image', 'buzzstore-pro'),
              'type'          =>      'image',
          )));

          $wp_customize->add_setting( 'paymentlogo_image_six', array(
              'default'       =>      '',
              'sanitize_callback' => 'esc_url_raw'  // done
          ));
         
          $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'paymentlogo_image_six', array(
              'section'       =>      'buzzstorepro_payment_logo_settings',
              'label'         =>      esc_html__('Upload Payment Logo Image', 'buzzstore-pro'),
              'type'          =>      'image',
          )));    

  

    /**
     * Web layout sanitization
    */
    function buzzstorepro_web_layout_sanitize($input) {
      $valid_keys = array(
         'boxed' => esc_html__('Boxed', 'buzzstore-pro'),
         'fullwidth' => esc_html__('Full Width', 'buzzstore-pro')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
    }
   
    /**
     * Text fields sanitization
    */
    function buzzstorepro_text_sanitize( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }

    /**
     * Number fields sanitization
    */
    function buzzstorepro_sanitize_number( $input ) {
      $output = intval($input);
        return $output;
    }

    /**
     * Display Layout Sanitization
    */
    function buzzstorepro_layout_sanitize($input) {
        $buzz_imagepath =  get_template_directory_uri() . '/assets/images/';
        $valid_keys = array( 
              'leftsidebar' => $buzz_imagepath.'left-sidebar.png',  
              'rightsidebar' => $buzz_imagepath.'right-sidebar.png',
              'nosidebar' => $buzz_imagepath.'no-sidebar.png',
        );
        if ( array_key_exists( $input, $valid_keys ) ) {
           return $input;
        } else {
           return '';
        }
    }

    /**
     * Header Left Sidebar Options  Sanitization
    */
    function buzzstorepro_header_leftside_style_sanitize($input) {
      $valid_keys = array( 
        'socialicon' => esc_html__('Social Icons','buzzstore-pro'),
        'topnavmenu' => esc_html__('Ton Nav Menu','buzzstore-pro'),
        'quickinfo' => esc_html__('Quick Information','buzzstore-pro')
      );

      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
    }

    /**
     * Header Right Sidebar Options  Sanitization
    */
    function buzzstorepro_header_rightside_style_sanitize($input) {
      $valid_keys = array( 
        'socialicon' => esc_html__('Social Icons','buzzstore-pro'),
        'topnavmenu' => esc_html__('Ton Nav Menu','buzzstore-pro'),
        'cartinfo' => esc_html__('Cart/Wishlist/My Account Information','buzzstore-pro')
      );

      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
    }

  
    /**
     * Product Display Column Sanitization
    */ 
    function buzzstorepro_product_per_page_sanitize($input) {
        $valid_keys = array( 
                '2' => '2',  
                '3' => '3', 
                '4' => '4',
        );
        if ( array_key_exists( $input, $valid_keys ) ) {
           return $input;
        } else {
           return '';
        }
    }

    /**
     * Display Related Products Sanitization
    */
    function buzzstorepro_product_per_page_related_sanitize($input) {
      $valid_keys = array( 
              '2' => '2',  
              '3' => '3', 
              '4' => '4',
              '5' => '5',
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
    }  

    /**
     * Checkbox Sanitization
    */
    function buzzstorepro_checkbox_sanitize($input) {
      if ( $input == 1 ) {
         return 1;
      } else {
         return 0;
      }
    }

    /**
     * Radio Button yes/no Sanitization
    */
    function buzzstorepro_radio_sanitize($input) {
       $valid_keys = array(
         'yes'=>esc_html__('Yes', 'buzzstore-pro'),
         'no'=>esc_html__('No', 'buzzstore-pro')
       );
       if ( array_key_exists( $input, $valid_keys ) ) {
          return $input;
       } else {
          return '';
       }
    }

    /**
     * Sub Footer Right Side Sanitization
    */
    function buzzstorepro_footer_rightside_sanitize($input) {
       $valid_keys = array(
          'socialmedia' => esc_html__('Social Media Link','buzzstore-pro'),
          'footermenu'  => esc_html__('Footer Menu','buzzstore-pro'),
          'paymentlogo'  => esc_html__('Payment Logo','buzzstore-pro')
       );
       if ( array_key_exists( $input, $valid_keys ) ) {
          return $input;
       } else {
          return '';
       }
    }

    /**
     * Radio Button Enable/Disable Sanitization
    */
    function buzzstorepro_weblayout_sanitize($input) {
       $valid_keys = array(
          'boxed' => esc_html__('Boxed Layout', 'buzzstore-pro'),
          'fullwidth' => esc_html__('Full Width Layout', 'buzzstore-pro')
       );
       if ( array_key_exists( $input, $valid_keys ) ) {
          return $input;
       } else {
          return '';
       }
    }


    /**
     * Header Type or Layout Sanitization
    */
      function buzzstorepro_header_type_sanitize($input) {
          $valid_keys = array(
            'header-one'   => esc_html__('Header Layout One', 'buzzstore-pro'),
            'header-two'   => esc_html__('Header Layout Two', 'buzzstore-pro'),
            'header-three' => esc_html__('Header Layout Three', 'buzzstore-pro'),
            'header-four'  => esc_html__('Header Layout Four', 'buzzstore-pro')
          );
          if ( array_key_exists( $input, $valid_keys ) ) {
            return $input;
          } else {
            return '';
          }
      }

    /**
     * Main Main Menu Sanitization
    */
      function buzzstorepro_menu_layout($input) {
          $valid_keys = array(
            'text-left' => esc_html__('Left Side','buzzstore-pro'),
            'text-right' => esc_html__('Right Side','buzzstore-pro'),
            'text-center' => esc_html__('Center','buzzstore-pro')
          );
          if ( array_key_exists( $input, $valid_keys ) ) {
            return $input;
          } else {
            return '';
          }
      }

      
    /**
     * Services Layout Sanitization
    */
    function buzzstorepro_services_layouts($input) {
        $valid_keys = array(
            'layout-one' => esc_html__('Layout One','buzzstore-pro'),
            'layout-two' => esc_html__('Layout Two','buzzstore-pro')
        );
        if ( array_key_exists( $input, $valid_keys ) ) {
          return $input;
        } else {
          return '';
        }
    }

    /**
     * Slider Type Sanitization
    */
    function buzzstorepro_slider_type_sanitize($input) {
       $valid_keys = array(
          'normal' => esc_html__('Normal Slider', 'buzzstore-pro'),
          'category' => esc_html__('Category Slider', 'buzzstore-pro'),
          'revolution' => esc_html__('Revolution Slider', 'buzzstore-pro'),
       );
       if ( array_key_exists( $input, $valid_keys ) ) {
          return $input;
       } else {
          return '';
       }
    }

    /**
     * Slider Layout Sanitization
    */
    function buzzstorepro_slider_layout_sanitize($input) {
        $imagepath =  get_template_directory_uri() . '/assets/images/';
        $valid_keys = array(
            'fullwidth' => $imagepath.'fullslider.png',  
            'boxed' => $imagepath.'boxedslider.png',
            'sliderpromoleft' => $imagepath.'boxpromosliderright.png ', 
            'sliderpromoright' => $imagepath.'boxpromoslider.png',
        );
        if ( array_key_exists( $input, $valid_keys ) ) {
          return $input;
        } else {
          return '';
        }
    }
    

    /**
     * Single Product tab display style Sanitization
    */
    function buzzstorepro_product_page_tab_sanitize($input) {
        $valid_keys = array(
          'normaltabs' => 'Normal Tabs',  
          'verticaltabs' => 'Vertical Tabs',
        );
       
        if ( array_key_exists( $input, $valid_keys ) ) {
          return $input;
        } else {
          return '';
        }
    }

    /**
     * Display Related Product Style Types Sanitization
    */
    function buzzstorepro_page_related_product_sanitize($input) {
        $valid_keys = array(
            'none'   => 'none',  
            'slider' => 'Slider', 
            'grid'   => 'Grid'
        );

        if ( array_key_exists( $input, $valid_keys ) ) {
          return $input;
        } else {
          return '';
        }
    }


    /**
     * Enable/Disable Sanitization
    */
    function buzzstorepro_radio_enable_sanitize($input) {
        $valid_keys = array(
         'enable' => esc_html__('Enable', 'buzzstore-pro'),
         'disable' => esc_html__('Disable', 'buzzstore-pro'),
        );
        if ( array_key_exists( $input, $valid_keys ) ) {
          return $input;
        } else {
          return '';
        }
    }

    /**
     * Repeater field Sanitization
    */    
    function buzzstorepro_sanitize_repeater($input){        
      $input_decoded = json_decode( $input, true );
      $allowed_html = array(
        'br' => array(),
        'em' => array(),
        'strong' => array(),
        'a' => array(
          'href' => array(),
          'class' => array(),
          'id' => array(),
          'target' => array()
        ),
        'button' => array(
          'class' => array(),
          'id' => array()
        )
      ); 

      if(!empty($input_decoded)) {
        foreach ($input_decoded as $boxes => $box ){
          foreach ($box as $key => $value){
            $input_decoded[$boxes][$key] = sanitize_text_field( $value );
          }
        }
        return json_encode($input_decoded);
      }      
      return $input;
    }
      
}
add_action( 'customize_register', 'buzzstorepro_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
*/
function buzzstorepro_customize_preview_js() {
  wp_enqueue_script( 'buzzstorepro_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'buzzstorepro_customize_preview_js' );
