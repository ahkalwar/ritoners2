<?php
/**
 * Buzz Store functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Buzzstore Pro
 */

if ( ! function_exists( 'buzzstorepro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function buzzstorepro_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Buzz Store, use a find and replace
	 * to change 'buzzstore-pro' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'buzzstore-pro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * This theme styles the visual editor to resemble the theme style.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', buzzstorepro_fonts_url() ) );

	// WooCommerce Plugins Support
	add_theme_support( 'woocommerce' );

	// Set up the WordPress Gallery Lightbox
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	*/
	add_theme_support( 'custom-logo', array(
		'width'       => 190,
		'height'      => 60,
		'flex-width'  => true,				
		'flex-height' => true,
		'header-text' => array( '.site-title', '.site-description' ),
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	*/
	add_theme_support( 'post-thumbnails' );
	add_image_size('buzzstorepro-banner-image', 1350, 465, true); // banner
	add_image_size('buzzstorepro-news-image', 359, 230, true);
	add_image_size('buzzstorepro-cat-image', 275, 370, true);
	add_image_size('buzzstorepro-team-image', 400, 500, true); // Team Member
			

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'topmenu' => esc_html__( 'Top Menu', 'buzzstore-pro' ),
		'primary' => esc_html__( 'Primary', 'buzzstore-pro' ),
		'footermenu' => esc_html__( 'Footer Menu', 'buzzstore-pro' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'buzzstorepro_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // buzzstorepro_setup
add_action( 'after_setup_theme', 'buzzstorepro_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! function_exists( 'buzzstorepro_widgets_init' ) ) {
	function buzzstorepro_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'buzzstorepro_content_width', 640 );
	}
	add_action( 'after_setup_theme', 'buzzstorepro_content_width', 0 );
}
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if ( ! function_exists( 'buzzstorepro_widgets_init' ) ) {
	function buzzstorepro_widgets_init() {
		//sidebar-1
		register_sidebar( array(
			'name'          => esc_html__( 'Right Sidebar Widget Area', 'buzzstore-pro' ),
			'id'            => 'buzzsidebarone',
			'description'   => esc_html__( 'Add widgets here.', 'buzzstore-pro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title wow fadeInUp" data-wow-delay="0.3s">',			
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Left Sidebar Widget Area', 'buzzstore-pro' ),
			'id'            => 'buzzsidebartwo',
			'description'   => esc_html__( 'Add widgets here.', 'buzzstore-pro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title wow fadeInUp" data-wow-delay="0.3s">',
			'after_title'   => '</h2>',
		) );

		if ( is_customize_preview() ) {
            $buzzstorepro_description = sprintf( esc_html__( 'Displays widgets on home page main content area.%1$s Note : Please go to %2$s "Static Front Page"%3$s setting, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'buzzstore-pro' ), '<br />','<b><a class="sparkle-customizer" data-section="static_front_page" style="cursor: pointer">','</a></b>' );
        }
        else{
            $buzzstorepro_description = esc_html__( 'Displays widgets on Front/Home page. Note : First Create Page and Select "Page Attributes Template"( SpiderMag - FrontPage ) then Please go to Setting => Reading, Select "A static page" then "Front page" and add widgets to show on Home Page', 'buzzstore-pro' );
        }

		register_sidebar( array(
			'name'          => esc_html__( 'Buzz : Home Main Widget Area', 'buzzstore-pro' ),
			'id'            => 'buzzstorehomearea',
			'description'   => $buzzstorepro_description,
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title wow fadeInUp" data-wow-delay="0.3s">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area One', 'buzzstore-pro' ),
			'id'            => 'buzzstorefooterone',
			'description'   => esc_html__( 'Add widgets here.', 'buzzstore-pro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area Two', 'buzzstore-pro' ),
			'id'            => 'buzzstorefootertwo',
			'description'   => esc_html__( 'Add widgets here.', 'buzzstore-pro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area Three', 'buzzstore-pro' ),
			'id'            => 'buzzstorefooterthree',
			'description'   => esc_html__( 'Add widgets here.', 'buzzstore-pro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area Four', 'buzzstore-pro' ),
			'id'            => 'buzzstorefooterfour',
			'description'   => esc_html__( 'Add widgets here.', 'buzzstore-pro' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
	add_action( 'widgets_init', 'buzzstorepro_widgets_init' );
}
/*****************************************************************
** Enqueue scripts and styles.                                  **
******************************************************************/
function buzzstorepro_scripts() {

		$buzzstorepro_theme = wp_get_theme();
		$theme_version = $buzzstorepro_theme->get( 'Version' );

		/* BuzzStore Google Font */
		wp_enqueue_style( 'buzzstorepro-fonts', buzzstorepro_fonts_url(), array(), $theme_version );

		$bundle_style = get_theme_mod( 'buzzstorepro_optimize_style_options', 'yes' );
    	if( !empty( $bundle_style ) && $bundle_style == 'yes' ){
    		/**
		     * Load BuzzStore Pro All Style Bundle CSS File
		    */
		    wp_enqueue_style('buzzstorepro-bundle', get_template_directory_uri() . '/assets/css/bundle.min.css', esc_attr( $theme_version ) );

    	}else{

		    /* BuzzStore Font Awesome */
		   wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.css', $theme_version );

		    /* BuzzStore Simple Line Icons */
		   wp_enqueue_style( 'simple-line-icons', get_template_directory_uri() . '/assets/library/simple-line-icons/css/simple-line-icons.css', $theme_version );	    
		   
		   	/*BuzzStore Owl Carousel CSS*/
		   	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/library/owlcarousel/css/owl.carousel.css', $theme_version );
		    wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/assets/library/owlcarousel/css/owl.theme.css', $theme_version );

		   	/*BuzzStore Bxslider CSS*/
		   	wp_enqueue_style( 'jquery-bxslider', get_template_directory_uri() . '/assets/library/bxslider/css/jquery.bxslider.css', $theme_version );

		    /*BuzzStore Flexslider CSS*/
		    wp_enqueue_style('jquery-flexslider', get_template_directory_uri() . '/assets/library/flexslider/css/flexslider.css', esc_attr( $theme_version ));

		    /* BuzzStore Animation */
    		wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/library/animate/animate.css', $theme_version );

	   	}

	    /* BuzzStore Main Style */
	    wp_enqueue_style( 'buzzstorepro-style', get_stylesheet_uri() );

	    if ( has_header_image() ) {
	    	$custom_css = '.buzz-main-header{ background-image: url("' . esc_url( get_header_image() ) . '"); background-repeat: no-repeat; background-position: center center; background-size: cover; }';
	    	wp_add_inline_style( 'buzzstorepro-style', $custom_css );
	    }
	    	  	

    	$bundle_script = get_theme_mod( 'buzzstorepro_optimize_script_options', 'yes' );
    	if( !empty( $bundle_script ) && $bundle_script == 'yes' ){

    		/**
		     * Load BuzzStore Pro All Script Bundle Js File
		    */
		    wp_enqueue_script('buzzstorepro-bundle', get_template_directory_uri() . '/assets/js/bundle.min.js', array('jquery'), $theme_version, 'ture');

    	}else{

	 		/*BuzzStore Owl Carousel JS*/
	 		wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/library/owlcarousel/js/owl.carousel.js', array('jquery'), $theme_version, true);
	 		
	 		/* BuzzStore Sidebar Widget Ticker */
	    	wp_enqueue_script('theia-sticky-sidebar', get_template_directory_uri() . '/assets/library/theia-sticky-sidebar/js/theia-sticky-sidebar.js', array('jquery'), esc_attr( $theme_version ), true);

	    	/* BuzzStore jquery match height Ticker */
	    	wp_enqueue_script('jquery.matchHeight', get_template_directory_uri() . '/assets/library/jquery-match-height/js/jquery.matchHeight.js', array('jquery'), esc_attr( $theme_version ), true);

	 		/* Sticky Menu */
	    	wp_enqueue_script( 'jquery-sticky', get_template_directory_uri() . '/assets/js/jquery.sticky.js',array('jquery'), esc_attr( $theme_version ), true);

	 		/* BuzzStore Countdown */
	    	wp_enqueue_script('jquery-countdown', get_template_directory_uri() . '/assets/js/jquery.countdown.js', array('jquery'), esc_attr( $theme_version ), true);
	 		
	 		/*BuzzStore Bxslider*/
	 		wp_enqueue_script('jquery-bxslider', get_template_directory_uri() . '/assets/library/bxslider/js/jquery.bxslider.js', array('jquery'), '4.2.5', 1);
	  	
		    /*BuzzStore Flexslider*/
	 		wp_enqueue_script('jquery-flexslider', get_template_directory_uri() . '/assets/library/flexslider/js/jquery.flexslider.js', array('jquery'), esc_attr( $theme_version ), true);

		    /* BuzzStore html5 */
		    wp_enqueue_script('html5', get_template_directory_uri() . '/assets/library/html5shiv/html5shiv.js', array('jquery'), $theme_version, false);
		    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

		    /* BuzzStore Respond */
		    wp_enqueue_script('respond', get_template_directory_uri() . '/assets/library/respond/respond.js', array('jquery'), $theme_version, false);
		    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

	    	/*BuzzStore Wow */
	    	wp_enqueue_script('wow', get_template_directory_uri() . '/assets/library/wow/js/wow.js', array('jquery'), $theme_version, true);
	 
		    /* BuzzStore Isotope */
		    wp_enqueue_script( 'isotope-pkgd', get_template_directory_uri() . '/assets/library/isotope/js/isotope.pkgd.js', array(), $theme_version, true );
		
		}

	    /* BuzzStore Theme Custom js */
	    wp_enqueue_script('buzzstorepro-custom', get_template_directory_uri() . '/assets/js/buzzstorepro-custom.js', array('jquery','imagesloaded'), $theme_version, 'ture');

	    
	    $wowanimation = get_theme_mod( 'buzzstorepro_wowanimation_options', 'yes' );
	    wp_localize_script('buzzstorepro-custom', 'buzzstore_pro_ajax_script', array(
            'wowanimation' => $wowanimation,
        ));

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
}
add_action( 'wp_enqueue_scripts', 'buzzstorepro_scripts' );


/**
 * Admin Enqueue scripts and styles.
*/
if ( ! function_exists( 'buzzstorepro_media_scripts' ) ) {
    function buzzstorepro_media_scripts($hook) {

    	if( 'widgets.php' != $hook )
        return;
        wp_enqueue_script('buzzstorepro-media-uploader', get_template_directory_uri() . '/assets/js/buzzstorepro-admin.js', array('jquery', 'customize-controls') );
        wp_localize_script('buzzstorepro-media-uploader', 'buzzstorepro_widget_img', array(
            'upload' => esc_html__('Upload', 'buzzstore-pro'),
            'remove' => esc_html__('Remove', 'buzzstore-pro')
        ));
        wp_enqueue_style( 'buzzstorepro-admin-style', get_template_directory_uri() . '/assets/css/buzzstorepro-admin.css');    

        /* Buzzstore Pro Font Awesome */
    	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/library/font-awesome/css/font-awesome.css' );
    }
}
add_action('admin_enqueue_scripts', 'buzzstorepro_media_scripts');


/**
 * Call Google Fonts
*/
if ( ! function_exists( 'buzzstorepro_fonts_url' ) ) :
	/**
	 * Register default Google fonts
	 */
	function buzzstorepro_fonts_url() {
	    $fonts_url = '';

	 	/* Translators: If there are characters in your language that are not
	    * supported by Open Sans, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $open_sans = _x( 'on', 'Open Sans font: on or off', 'buzzstore-pro' );

	    /* Translators: If there are characters in your language that are not
	    * supported by Raleway, translate this to 'off'. Do not translate
	    * into your own language.
	    */
	    $Poppins = _x( 'on', 'Poppins font: on or off', 'buzzstore-pro' );

	    $Montserrat = _x( 'on', 'Montserrat font: on or off', 'buzzstore-pro' );

	    $Lato = _x( 'on', 'Lato font: on or off', 'buzzstore-pro' );

	    if ( 'off' !== $Lato || 'off' !== $Montserrat || 'off' !== $Poppins || 'off' !== $open_sans ) {
	        $font_families = array();	        

	        if ( 'off' !== $open_sans ) {
	            $font_families[] = 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic';
	        }

	        if ( 'off' !== $Poppins ) {
	            $font_families[] = 'Poppins:400,300,500,600,700';
	        }

	        if ( 'off' !== $Montserrat ) {
	            $font_families[] = 'Montserrat:400,500,600,700,800';
	        }

	        if ( 'off' !== $Lato ) {
	            $font_families[] = 'Lato:400,500,600,700,800';
	        }

	        $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext' ),
	        );

	        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	    }

	    return esc_url_raw( $fonts_url );
	}
endif;

/**
 * Require init.
*/
require  trailingslashit( get_template_directory() ).'sparklethemes/init.php';


if ( isset( $wp_customize->selective_refresh ) ) {

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title',
		'container_inclusive' => false,
		'render_callback' => 'buzzstorepro_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'container_inclusive' => false,
		'render_callback' => 'buzzstorepro_customize_partial_blogdescription',
	) );

	
	$wp_customize->selective_refresh->add_partial( 'buzzstorepro_header_leftside_options', array(
		'selector' => '.buzz-topleft',
		'container_inclusive' => false,
	) );

	$wp_customize->selective_refresh->add_partial( 'buzzstorepro_social_facebook', array(
		'selector' => '.buzz-socila-link',
		'container_inclusive' => false,
	) );

	$wp_customize->selective_refresh->add_partial( 'paymentlogo_image_two', array(
		'selector' => '.footer-payments',
		'container_inclusive' => false,
	) );

	$wp_customize->selective_refresh->add_partial( 'buzzstorepro_search_options', array(
		'selector' => '.header-search',
		'container_inclusive' => false,
	) );

	$wp_customize->selective_refresh->add_partial( 'buzzstorepro_display_wishlist', array(
		'selector' => '.buzz-topright',
		'container_inclusive' => false,
	) );

	$wp_customize->selective_refresh->add_partial( 'buzzstorepro_icon_block_section', array(
		'selector' => '.buzz-services',
		'container_inclusive' => false,
	) );	
			
	$wp_customize->selective_refresh->add_partial( 'buzzstorepro_woocommerce_enable_disable_section', array(
		'selector' => '.breadcrumbswrap',
		'container_inclusive' => false,
	) );
	
	$wp_customize->selective_refresh->add_partial( 'buzzstorepro_footer_buttom_copyright_setting', array(
		'selector' => '.footer_copyright',
		'container_inclusive' => false,
	) );

}

function buzzstorepro_customize_partial_blogname() {
	bloginfo( 'name' );
}
function buzzstorepro_customize_partial_blogdescription() {
	bloginfo( 'description' );
}