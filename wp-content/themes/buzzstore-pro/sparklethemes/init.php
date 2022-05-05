<?php
/**
 * Main Custom admin functions area
 *
 * @since SparklewpThemes
 *
 * @param BuzzStore
 *
*/
if( !function_exists('buzzstorepro_file_directory') ){

    function buzzstorepro_file_directory( $file_path ){
        if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ) {
            return trailingslashit( get_stylesheet_directory() ) . $file_path;
        }
        else{
            return trailingslashit( get_template_directory() ) . $file_path;
        }
    }
}


/**
 * Load Custom Admin functions that act independently of the theme functions.
*/
require buzzstorepro_file_directory('sparklethemes/functions.php');

/**
 * Custom template tags for this theme.
*/
require buzzstorepro_file_directory('sparklethemes/core/template-tags.php');

/**
 * Custom functions that act independently of the theme header.
*/
require buzzstorepro_file_directory('sparklethemes/core/custom-header.php');

/**
 * Custom functions that act independently of the theme templates.
*/
require buzzstorepro_file_directory('sparklethemes/core/extras.php');

/**
 * Load Jetpack compatibility file.
*/
require buzzstorepro_file_directory('sparklethemes/core/jetpack.php');

/**
 * Customizer additions.
*/
require buzzstorepro_file_directory('sparklethemes/customizer/customizer.php');

/**
 * Load widget compatibility field file.
*/
require buzzstorepro_file_directory('sparklethemes/buzzwidgets/widgets-fields.php');

/**
 * Load header hooks file.
*/
require buzzstorepro_file_directory('sparklethemes/hooks/header.php');

/**
 * Load footer hooks file.
*/
require buzzstorepro_file_directory('sparklethemes/hooks/footer.php');

/**
 * Load woocommerce hooks file.
*/
if ( buzzstorepro_is_woocommerce_activated() ) {
	require buzzstorepro_file_directory('sparklethemes/hooks/woocommerce.php');
}

/**
 * Load Custom Post Type (Team Member & Testimonial) file.
*/
require buzzstorepro_file_directory('sparklethemes/buzzstorepro-custom-post-type.php');

/**
 * Load Dynamic CSS file.
*/
require buzzstorepro_file_directory('sparklethemes/dynamic-css.php');

/**
 * Load Font Awesome Icon List file.
*/
require buzzstorepro_file_directory('sparklethemes/font-awesome-list.php');

/**
 * TGM Function File Load.
*/
require buzzstorepro_file_directory('sparklethemes/buzzstorepro-plugin-activation.php');

/**
 * Load demo impoter file
*/
require buzzstorepro_file_directory('sparklethemes/import/sparkle-importer.php');

/**
 * Welcome Page.
 */
require get_template_directory() . '/welcome/welcome.php';

/**
 * Demo Import.
 */
require get_template_directory() . '/welcome/importer.php';