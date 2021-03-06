<?php
/**
 * REGION SECTION
 * ----------------------------------------------------------------------------
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$rvm_div_class = !isset( $rvm_tab_active_default ) && ( isset( $rvm_tab_active ) && $rvm_tab_active == 'rvm_regions_countries' ) ? ' class="rvm_active hidden"' : ' class="hidden"';
$output .= '<div id="rvm_regions_countries"' . $rvm_div_class . " >";
$array_regions = rvm_include_custom_map_settings( $post->ID, $rvm_selected_map );
$output .= '<div id="rvm_regions_from_db">';
if ( isset( $array_regions ) && is_array( $array_regions ) && !empty( $array_regions ) ) {
    // Sort regiosn alphabetically
    ksort( $array_regions );
    foreach ( $array_regions as $region ) {
        // function regionsparams() can be found in rvm_core.php
        $regionsparams_array = regionsparams( $post->ID, $region[ 1 ] ); // get regions/countries values for links , backgrounds and popup each region '$region[ 1 ]'
        $output .= '<div class="rvm_region_name rvm_region_hide"><h4><b>' . $region[ 2 ] . '</b><span class="rvm_arrow"></span></h4></div>';
        //If id structure name changes, please update accordingly on rvm_general.js row 56
        $output .= '<div id="rvm_region_' . $region[ 1 ] . '"   class="rvm_regions_flex_wrapper">';
        $output .= '<div class="rvm_regions_flex">';

        if ( $regionsparams_array[ 'field_region_onclick_action' ] == 'open_link' || empty( $regionsparams_array[ 'field_region_onclick_action' ] ) ) {
            $output .= '<div id="rvm_region_input_link_' . $region[ 1 ] . '" class="rvm_regions_input rvm_regions_wrapper_link"><label for="' . __( 'Subdivisions name', 'responsive-vector-maps' ) . '" ' . RVM_LABEL_CLASS . ' >' . __( 'Link', 'responsive-vector-maps' ) . '</label><input ' . RVM_REGION_LINK_CLASS . ' type="text" name="' . strval( $region[ 1 ] ) . '[]" value="' . $regionsparams_array[ 'field_region_link' ] . '"></div>'; //.rvm_regions_input
        }
        //case user selected to open onto custom tag
        else if ( $regionsparams_array[ 'field_region_onclick_action' ] == 'show_custom_selector' ) {
            $output .= '<div id="rvm_region_input_link_' . $region[ 1 ] . '" class="rvm_regions_input rvm_regions_wrapper_link"><label for="' . __( 'Subdivisions name', 'responsive-vector-maps' ) . '" ' . RVM_LABEL_CLASS . ' >' . __( 'Show following tag (use ID selector without "#")', 'responsive-vector-maps' ) . '</label><input ' . RVM_REGION_LINK_CLASS . ' type="text" name="' . strval( $region[ 1 ] ) . '[]" value="' . rvm_delete_first_character( $regionsparams_array[ 'field_region_link' ], '#' ) . '"></div>'; //.rvm_regions_input
        } else {
            $output .= '<div id="rvm_region_input_link_' . $region[ 1 ] . '" class="rvm_regions_input rvm_regions_wrapper_link rvm_hide"><label for="' . __( 'Fake input field just for serializing consistency', 'responsive-vector-maps' ) . '" ' . RVM_LABEL_CLASS . ' >' . __( 'Open label on default', 'responsive-vector-maps' ) . '</label><input ' . RVM_REGION_LINK_CLASS . ' type="text" name="' . strval( $region[ 1 ] ) . '[]" value="' . $regionsparams_array[ 'field_region_link' ] . '"></div>'; //.rvm_regions_input
        }
        //$output .= '</div>';//.rvm_regions_labelinput_wrapper
        $output .= '<div class="rvm_regions_input rvm_regions_wrapper_bgcolor"><label for="' . __( 'Background color', 'responsive-vector-maps' ) . '" ' . RVM_LABEL_CLASS . ' >' . __( 'Background', 'responsive-vector-maps' ) . '</label><input class="rvm_color_picker" type="text" name="' . strval( $region[ 1 ] ) . '[]" value="' . strip_tags( $regionsparams_array[ 'field_region_bg' ] ) . '"></div>'; //.rvm_regions_input
        //$output .= '</div>';//.rvm_flex_regions
        //$output .= '<div class="rvm_regions_flex">';
        $output .= '<div class="rvm_regions_input rvm_regions_wrapper_popup"><label for="rvm_region_label_popup" ' . RVM_LABEL_CLASS . ' >' . __( 'Label popup ( allowed html tags : a, b, div, em, headings, img, p, table, span, ul, ol and CSS class and id selector )', 'responsive-vector-maps' ) . '</label><textarea id="rvm_region_label_popup_' . strval( $region[ 1 ] ) . '" rows="5" name="' . strval( $region[ 1 ] ) . '[]" >' . wp_unslash( $regionsparams_array[ 'field_region_popup' ] ) . '</textarea></div>';
        $output .= '<div class="rvm_regions_input rvm_regions_wrapper_hover_color"><label for="rvm_region_activate_on_mouse_over" ' . RVM_LABEL_CLASS . ' >' .__( 'Activate Mouse Over Background <br> <span class="rvm_small_text">hold  [SHIFT] key for multiple select</span>', 'responsive-vector-maps' ) . '</label><input  type="checkbox" class="rvm_region_checkbox rvm_region_checkbox_bg" name="' . strval( $region[ 1 ] ) . '[]"    ' . checked( 'checked', $regionsparams_array[ 'field_region_mouse_hover_over_colour' ], false ) . ' ></div>';
        $output .= '<div class="rvm_regions_input rvm_regions_onclick_action"><label for="rvm_region_onclick_action" ' . RVM_LABEL_CLASS . ' >' . __( 'When click onto this subdivision: ', 'responsive-vector-maps' ) . '</label><select class="rvm_region_label_action" name="' . strval( $region[ 1 ] ) . '[]"><option ' . selected( 'open_link', $regionsparams_array[ 'field_region_onclick_action' ], false ) . ' value="open_link">' . __( 'Open link', 'responsive-vector-maps' ) . '</option><option ' . selected( 'open_label_onto_default_card', $regionsparams_array[ 'field_region_onclick_action' ], false ) . ' value="open_label_onto_default_card" >' . __( 'Open label content onto default card', 'responsive-vector-maps' ) . '</option><option ' . selected( 'show_custom_selector', $regionsparams_array[ 'field_region_onclick_action' ], false ) . ' value="show_custom_selector">' . __( 'Show custom selector', 'responsive-vector-maps' ) . '</option></select>';
        $output .= '<input type="hidden" class="rvm_regions_sub_block" value="' . $region[ 1 ] . '"></div>'; // this is needed in conjunction with the select .rvm_region_label_action to target correct link input field and change the label
        $output .= '</div>'; //.rvm_flex_regions
        $output .= '</div>'; //.rvm_regions_flex_wrapper
    } //foreach( $array_fields as $field) 
} //if( isset( $array_regions ) && is_array( $array_regions ) && !empty( $array_regions ) )
$output .= '</div>'; // close id="rvm_regions_from_db"
if ( isset( $array_regions ) && is_array( $array_regions ) && !empty( $array_regions ) && current_user_can( 'edit_others_posts' ) ) {
    //Export regions settings
    $output .= '<h2 class="rvm_h2_title">' . __( 'Export Subdivisions Settings', 'responsive-vector-maps' ) . '</h2>';
    $output .= '<div class="rvm_import_regions_button_wrapper">';
    $output .= '<input type="button" id="rvm_export_regions_button" class="button-primary"  value=" ' . __( 'Export Subdivisions', 'responsive-vector-maps' ) . '" />';
    $output .= '</div>'; // .rvm_import_regions_button_wrapper
    //Import regions settings
    $output .= '<h2 class="rvm_h2_title">' . __( 'Import Subdivisions settings ( please use exported files from RVM only )', 'responsive-vector-maps' ) . '</h2>';
    $output .= '<div class="rvm_export_regions_button_wrapper">';
    $output .= '<input type="hidden" id="rvm_upload_regions_file_id" value=""/>';
    $output .= '<input type="button" id="rvm_upload_regions_button" class="button-primary rvm_media_uploader"  value=" ' . __( 'Select Subdivisions File', 'responsive-vector-maps' ) . '" />';
    $output .= '<input type="button" id="rvm_import_regions_button" class="button-primary"  value=" ' . __( 'Import Subdivisions Settings', 'responsive-vector-maps' ) . '" />';
    $output .= '<input type="button" id="rvm_import_reset_regions_button" class="button-secondary"  value=" ' . __( 'Restore old values', 'responsive-vector-maps' ) . '" onclick="window.location.reload();" />';
    $output .= '</div>'; // .rvm_export_regions_button_wrapper
    $output .= '<div id="rvm_import_regions_status" class="rvm_messages rvm_notice_messages"></div>';
} //if( isset( $array_regions ) && is_array( $array_regions ) && !empty( $array_regions ) )
$output .= '<div style="clear:both;"></div>';
$output .= '</div>'; // close id="rvm_regions_countries"  
?>