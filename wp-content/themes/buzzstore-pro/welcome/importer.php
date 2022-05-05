<?php
/**
 * OCDI support.
 *
 * @package Buzzstore Pro
 */

// Disable PT branding.
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * OCDI after import.
 *
 * @since 1.0.0
 */
function buzzstore_pro_ocdi_after_import() {


    // Assign front page and posts page (blog page).
    $front_page_id = null;

    $front_page = get_page_by_title( 'Home' );

    if ( $front_page ) {
        if ( is_array( $front_page ) ) {
            $first_page = array_shift( $front_page );
            $front_page_id = $first_page->ID;
        } else {
            $front_page_id = $front_page->ID;
        }
    }


    if ( $front_page_id ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id );
    }

    // Assign navigation menu locations.
    $menu_location_details = array(
        'primary'     => 'main-menu',
        'topmenu'     => 'top-menu',
        'footermenu'  => 'footer-menu',
    );

    if ( ! empty( $menu_location_details ) ) {
        $navigation_settings = array();
        $current_navigation_menus = wp_get_nav_menus();
        if ( ! empty( $current_navigation_menus ) && ! is_wp_error( $current_navigation_menus ) ) {
            foreach ( $current_navigation_menus as $menu ) {
                foreach ( $menu_location_details as $location => $menu_slug ) {
                    if ( $menu->slug === $menu_slug ) {
                        $navigation_settings[ $location ] = $menu->term_id;
                    }
                }
            }
        }

        set_theme_mod( 'nav_menu_locations', $navigation_settings );
    }
}
add_action( 'pt-ocdi/after_import', 'buzzstore_pro_ocdi_after_import' );


/**
 * Demo export/import
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package CoverNews
 */
if (!function_exists('buzzstore_pro_ocdi_files')) :
    /**
     * OCDI files.
     *
     * @since 1.0.0
     *
     * @return array Files.
     */
    function buzzstore_pro_ocdi_files() {

        return apply_filters( 'buzzstore_pro_demo_import_files', array(
            
            array(
                'import_file_name'             => esc_html__( 'Technology Demo', 'buzzstore-pro' ),
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'welcome/demo-data/buzzstorepro/buzzstorepro.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'welcome/demo-data/buzzstorepro/buzzstorepro.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'welcome/demo-data/buzzstorepro/buzzstorepro.dat',
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/buzzstorepro.png',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/buzzstorepro/',
            ),
            array(
                'import_file_name'             => esc_html__( 'Jewellery Demo', 'buzzstore-pro' ),
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'welcome/demo-data/jewellery/jewellery.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'welcome/demo-data/jewellery/jewellery.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'welcome/demo-data/jewellery/jewellery.dat',
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/jewellery.jpg',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/buzzstorepro/jewellery/',
            ),
            array(
                'import_file_name'             => esc_html__( 'Clothing Demo', 'buzzstore-pro' ),
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'welcome/demo-data/clothing/clothing.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'welcome/demo-data/clothing/clothing.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'welcome/demo-data/clothing/clothing.dat',                
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/clothing.jpg',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/buzzstorepro/clothing/',
            ),
            array(
                'import_file_name'             => esc_html__( 'Medical Demo', 'buzzstore-pro' ),
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'welcome/demo-data/medical/medical.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'welcome/demo-data/medical/medical.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'welcome/demo-data/medical/medical.dat',                
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/medical.jpg',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/buzzstorepro/medical/',
            ),
            array(
                'import_file_name'             => esc_html__( 'Cosmetics Demo', 'buzzstore-pro' ),
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'welcome/demo-data/cosmetics/cosmetics.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'welcome/demo-data/cosmetics/cosmetics.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'welcome/demo-data/cosmetics/cosmetics.dat',                
                'import_preview_image_url'     => trailingslashit( get_template_directory_uri() ) . 'welcome/css/cosmetics.jpg',
                'preview_url'                  => 'http://demo.sparklewpthemes.com/buzzstorepro/cosmetics/',
            )

        ));
    }
endif;
add_filter( 'pt-ocdi/import_files', 'buzzstore_pro_ocdi_files');