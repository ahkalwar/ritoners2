<?php
/**
* Buzz Store Field Functional file
*
* @package Buzzstore Pro
*/
function buzzstorepro_widgets_show_widget_field($instance = '', $widget_field = '', $buzzstorepro_field_value = '') {
   
    //list category list in array
    $buzzstorepro_category_list[0] = array(
        'value' => 0,
        'label' => esc_html__('Select Categories','buzzstore-pro')
    );
    $buzzstorepro_posts = get_categories();
    foreach ($buzzstorepro_posts as $buzzstorepro_post) :
        $buzzstorepro_category_list[$buzzstorepro_post->term_id] = array(
            'value' => $buzzstorepro_post->term_id,
            'label' => $buzzstorepro_post->name
        );
    endforeach;

    extract($widget_field);

    switch ($buzzstorepro_widgets_field_type) {

        // Standard text field
        case 'text' :
            ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id($buzzstorepro_widgets_name) ); ?>"><?php echo esc_attr( $buzzstorepro_widgets_title ); ?> :</label>
                <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id($buzzstorepro_widgets_name) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $buzzstorepro_widgets_name ) ); ?>" type="text" value="<?php echo esc_attr( $buzzstorepro_field_value ) ; ?>" />

                <?php if ( isset( $buzzstorepro_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo esc_html( $buzzstorepro_widgets_description ); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        //title
        case 'title' :
            ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $buzzstorepro_widgets_name ) ); ?>"><?php echo esc_attr( $buzzstorepro_widgets_title ); ?> :</label>
                <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $buzzstorepro_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $buzzstorepro_widgets_name ) ); ?>" type="text" value="<?php echo esc_attr( $buzzstorepro_field_value ); ?>" />
                <?php if (isset( $buzzstorepro_widgets_description )) { ?>
                    <br />
                    <small><?php echo esc_html( $buzzstorepro_widgets_description ); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        case 'group_start' :
            ?>
            <div class="buzzstorepro-main-group" id="ap-font-awesome-list <?php echo esc_attr( $instance->get_field_id( $buzzstorepro_widgets_name ) ); ?>">
                <div class="buzzstorepro-main-group-heading" style="font-size: 15px;  font-weight: bold;  padding-top: 12px;"><?php echo esc_attr( $buzzstorepro_widgets_title ); ?><span class="toogle-arrow"></span></div>
                <div class="buzzstorepro-main-group-wrap">

            <?php
            break;

            case 'group_end':
            ?></div>
            </div><?php
            break;

        // Standard url field
        case 'url' :
            ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $buzzstorepro_widgets_name ) ); ?>"><?php echo esc_attr( $buzzstorepro_widgets_title ); ?> :</label>
                <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $buzzstorepro_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name($buzzstorepro_widgets_name)); ?>" type="text" value="<?php echo esc_attr($buzzstorepro_field_value); ?>" />

                <?php if (isset( $buzzstorepro_widgets_description )) { ?>
                    <br />
                    <small><?php echo esc_html( $buzzstorepro_widgets_description ); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Textarea field
        case 'textarea' :
            ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id($buzzstorepro_widgets_name) ); ?>"><?php echo esc_attr( $buzzstorepro_widgets_title ); ?> :</label>
                <textarea class="widefat" rows="<?php echo absint( $buzzstorepro_widgets_row ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $buzzstorepro_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $buzzstorepro_widgets_name ) ); ?>"><?php echo esc_attr( $buzzstorepro_field_value ); ?></textarea>
            </p>
            <?php
            break;

        // Checkbox field
        case 'checkbox' :
            ?>
            <p>
                <input id="<?php echo esc_attr( $instance->get_field_id($buzzstorepro_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($buzzstorepro_widgets_name)); ?>" type="checkbox" value="1" <?php checked('1', $buzzstorepro_field_value); ?>/>
                <label for="<?php echo esc_attr($instance->get_field_id($buzzstorepro_widgets_name)); ?>"><?php echo esc_attr($buzzstorepro_widgets_title); ?></label>

                <?php if (isset($buzzstorepro_widgets_description)) { ?>
                    <br />
                    <small><?php echo esc_html($buzzstorepro_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Radio fields
        case 'radio' :
            ?>
            <p>
                <?php
                echo esc_attr( $buzzstorepro_widgets_title );
                echo '<br />';
                foreach ($buzzstorepro_widgets_field_options as $buzzstorepro_option_name => $buzzstorepro_option_title) {
                    ?>
                    <input id="<?php echo esc_attr($instance->get_field_id($buzzstorepro_option_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($buzzstorepro_widgets_name)); ?>" type="radio" value="<?php echo esc_attr($buzzstorepro_option_name); ?>" <?php checked($buzzstorepro_option_name, $buzzstorepro_field_value); ?> />
                    <label for="<?php echo esc_attr($instance->get_field_id($buzzstorepro_option_name)); ?>"><?php echo esc_attr($buzzstorepro_option_title); ?></label>
                    <br />
                <?php } ?>

                <?php if (isset($buzzstorepro_widgets_description)) { ?>
                    <small><?php echo esc_html($buzzstorepro_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Select field
        case 'select' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($buzzstorepro_widgets_name)); ?>"><?php echo esc_attr($buzzstorepro_widgets_title); ?> :</label>
                <select name="<?php echo esc_attr($instance->get_field_name($buzzstorepro_widgets_name)); ?>" id="<?php echo esc_attr($instance->get_field_id($buzzstorepro_widgets_name)); ?>" class="widefat">
                    <?php foreach ($buzzstorepro_widgets_field_options as $buzzstorepro_option_name => $buzzstorepro_option_title) { ?>
                        <option value="<?php echo esc_attr($buzzstorepro_option_name); ?>" id="<?php echo esc_attr($instance->get_field_id($buzzstorepro_option_name)); ?>" <?php selected($buzzstorepro_option_name, $buzzstorepro_field_value); ?>><?php echo esc_attr($buzzstorepro_option_title); ?></option>
                    <?php } ?>
                </select>

                <?php if (isset($buzzstorepro_widgets_description)) { ?>
                    <br />
                    <small><?php echo esc_html($buzzstorepro_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        case 'number' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($buzzstorepro_widgets_name)); ?>"><?php echo esc_attr($buzzstorepro_widgets_title); ?> :</label><br />
                <input name="<?php echo esc_attr($instance->get_field_name($buzzstorepro_widgets_name)); ?>" type="number" id="<?php echo esc_attr($instance->get_field_id($buzzstorepro_widgets_name)); ?>" value="<?php echo esc_attr($buzzstorepro_field_value); ?>" class="widefat" />

                <?php if (isset($buzzstorepro_widgets_description)) { ?>
                    <br />
                    <small><?php echo esc_html($buzzstorepro_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;        

        // Select category field
        case 'select_category' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($buzzstorepro_widgets_name)); ?>"><?php echo esc_attr($buzzstorepro_widgets_title); ?> :</label>
                <select name="<?php echo esc_attr($instance->get_field_name($buzzstorepro_widgets_name)); ?>" id="<?php echo esc_attr($instance->get_field_id($buzzstorepro_widgets_name)); ?>" class="widefat">
                    <?php foreach ($buzzstorepro_category_list as $buzzstorepro_single_post) { ?>
                        <option value="<?php echo esc_attr($buzzstorepro_single_post['value']); ?>" id="<?php echo esc_attr($instance->get_field_id($buzzstorepro_single_post['label'])); ?>" <?php selected($buzzstorepro_single_post['value'], $buzzstorepro_field_value); ?>><?php echo esc_attr($buzzstorepro_single_post['label']); ?></option>
                    <?php } ?>
                </select>

                <?php if (isset($buzzstorepro_widgets_description)) { ?>
                    <br />
                    <small><?php echo esc_html($buzzstorepro_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        //Multi checkboxes
        case 'multicheckboxes' :
            
            if( isset( $buzzstorepro_mulicheckbox_title ) ) { ?>
                <label><?php echo esc_attr( $buzzstorepro_mulicheckbox_title ); ?>:</label>
            <?php }
            echo '<div class="buzzstorepro-multiplecat">';
                foreach ( $buzzstorepro_widgets_field_options as $buzzstorepro_option_name => $buzzstorepro_option_title) {
                    if( isset( $buzzstorepro_field_value[$buzzstorepro_option_name] ) ) {
                        $buzzstorepro_field_value[$buzzstorepro_option_name] = 1;
                    }else{
                        $buzzstorepro_field_value[$buzzstorepro_option_name] = 0;
                    }                
                ?>
                    <p>
                        <input id="<?php echo esc_attr( $instance->get_field_id( $buzzstorepro_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $buzzstorepro_widgets_name ) ).'['.esc_attr( $buzzstorepro_option_name ).']'; ?>" type="checkbox" value="1" <?php checked('1', $buzzstorepro_field_value[$buzzstorepro_option_name]); ?>/>
                        <label for="<?php echo esc_attr( $instance->get_field_id( $buzzstorepro_option_name ) ); ?>"><?php echo esc_attr( $buzzstorepro_option_title ); ?></label>
                    </p>
                <?php
                    }
            echo '</div>';
                if (isset($buzzstorepro_widgets_description)) {
            ?>
                    <small><em><?php echo esc_html($buzzstorepro_widgets_description); ?></em></small>
            <?php
                }
            
                break;

        case 'upload' :

            $output = '';
            $id = $instance->get_field_id($buzzstorepro_widgets_name);
            $class = '';
            $int = '';
            $value = $buzzstorepro_field_value;
            $name = $instance->get_field_name($buzzstorepro_widgets_name);

            if ($value) {
                $class = ' has-file';
            }
            $output .= '<div class="sub-option section widget-upload">';
            $output .= '<label for="'.esc_attr($instance->get_field_id($buzzstorepro_widgets_name)).'">'.esc_attr($buzzstorepro_widgets_title).'</label><br/>';
            $output .= '<input id="' . $id . '" class="upload' . $class . '" type="text" name="' . $name . '" value="' . $value . '" placeholder="' . esc_html__('No file chosen', 'buzzstore-pro') . '" />' . "\n";
            
            if ( function_exists('wp_enqueue_media') ) {
                if (( $value == '')) {
                    $output .= '<input id="upload-' . $id . '" class="upload-button-wdgt button" type="button" value="' . esc_html__('Upload', 'buzzstore-pro') . '" />' . "\n";
                } else {
                    $output .= '<input id="remove-' . $id . '" class="remove-file button" type="button" value="' . esc_html__('Remove', 'buzzstore-pro') . '" />' . "\n";
                }
            } else {
                $output .= '<p><i>' . esc_html__('Upgrade your version of WordPress for full media support.', 'buzzstore-pro') . '</i></p>';
            }

            $output .= '<div class="screenshot team-thumb" id="' . $id . '-image">' . "\n";
            if ($value != '') {
                $remove = '<a class="remove-image">'.esc_html__('Remove','buzzstore-pro').'</a>';
                $image = preg_match('/(^.*\.jpg|jpeg|png|gif|ico*)/i', $value);
                if ($image) {
                    $output .= '<img src="' . $value . '" />' . $remove;
                } else {
                    $parts = explode("/", $value);
                    for ($i = 0; $i < sizeof($parts); ++$i) {
                        $title = $parts[$i];
                    }
                    $output .= '';
                    $title = esc_html__('View File', 'buzzstore-pro');
                    $output .= '<div class="no-image"><span class="file_link"><a href="' . $value . '" target="_blank" rel="external">' . $title . '</a></span></div>';
                }
            }
            $output .= '</div></div>' . "\n";
            echo $output;
            break;
    }
}

function buzzstorepro_widgets_updated_field_value($widget_field, $new_field_value) {

    extract($widget_field);

    if ($buzzstorepro_widgets_field_type == 'number') {

        return absint($new_field_value);

    } elseif ($buzzstorepro_widgets_field_type == 'textarea') {

        return wp_filter_post_kses($new_field_value);
    } 
    elseif ($buzzstorepro_widgets_field_type == 'url') {
        return esc_url_raw($new_field_value);
    }
    elseif ($buzzstorepro_widgets_field_type == 'title') {
        return wp_kses_post($new_field_value);
    }
    elseif ($buzzstorepro_widgets_field_type == 'multicheckboxes') {
        return wp_kses_post($new_field_value);
    }
    else {
        return wp_kses_data($new_field_value);
    }
}

/**
 * Load widget fields file.
*/
require buzzstorepro_file_directory('sparklethemes/buzzwidgets/buzzstorepro-widget.php');


/**
 * Load Blogs Posts widget area file.
*/
require buzzstorepro_file_directory('sparklethemes/buzzwidgets/buzzstorepro-blogs.php');

/**
 * Load About widget area file.
*/
require buzzstorepro_file_directory('sparklethemes/buzzwidgets/buzzstorepro-aboutus.php');


/**
 * Load Contact Info widget area file.
*/
require buzzstorepro_file_directory('sparklethemes/buzzwidgets/buzzstorepro-contactinfo.php');

/**
 * Load testimonial widget area file.
*/
require buzzstorepro_file_directory('sparklethemes/buzzwidgets/buzzstorepro-testimonial.php');

/**
 * Load full promo widget area file.
*/
require buzzstorepro_file_directory('sparklethemes/buzzwidgets/buzzstorepro-fullpromo.php');

/**
 * Load promo widget area file.
*/
require buzzstorepro_file_directory('sparklethemes/buzzwidgets/buzzstorepro-promoarea.php');

/**
 * Load brand logo widget area file.
*/
require buzzstorepro_file_directory('sparklethemes/buzzwidgets/buzzstorepro-brandlogo.php');

/**
 * Load our team member widget area file.
*/
require buzzstorepro_file_directory('sparklethemes/buzzwidgets/buzzstorepro-ourteam.php');

if ( buzzstorepro_is_woocommerce_activated() ) {
    
    /**
     * Load special offter product widget area file.
    */
    require buzzstorepro_file_directory('sparklethemes/buzzwidgets/buzzstorepro-specialdeal.php');
    /**
     * Load product list widget area file.
    */
    require buzzstorepro_file_directory('sparklethemes/buzzwidgets/buzzstorepro-productlist.php');
}

