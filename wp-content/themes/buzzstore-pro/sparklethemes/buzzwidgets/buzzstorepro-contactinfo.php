<?php
/**
 * Adds buzzstorepro_contact_info widget.
*/
add_action('widgets_init', 'buzzstorepro_contact_info');
function buzzstorepro_contact_info() {
    register_widget('buzzstorepro_contact_info_area');
}

class buzzstorepro_contact_info_area extends WP_Widget {

    /**
     * Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
            'buzzstorepro_contact_info_area', esc_html__('&nbsp;Buzz: Quick Contact Info','buzzstore-pro'), array(
            'description' => esc_html__('A widget that shows quick contact information', 'buzzstore-pro')
        ));
    }
    
    private function widget_fields() {        
        
        $fields = array( 
            
            'buzzstorepro_quick_contact_title' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_quick_contact_title',
                'buzzstorepro_widgets_title' => esc_html__('Title', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'title',
            ),
            'buzzstorepro_quick_address' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_quick_address',
                'buzzstorepro_widgets_title' => esc_html__('Contact Address', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'textarea',
                'buzzstorepro_widgets_row'    => 2,
            ),
            'buzzstorepro_quick_phone' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_quick_phone',
                'buzzstorepro_widgets_title' => esc_html__('Contact Number', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'text',
            ),
            'buzzstorepro_quick_email' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_quick_email',
                'buzzstorepro_widgets_title' => esc_html__('Contact Email Address', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'text',
            ),
            'buzzstorepro_opening_time' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_opening_time',
                'buzzstorepro_widgets_title' => esc_html__('Store Opening Time', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'textarea',
                'buzzstorepro_widgets_row'    => 2,
            ),                   
        );

        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);

        $title           = empty( $instance['buzzstorepro_quick_contact_title'] ) ? '' : $instance['buzzstorepro_quick_contact_title'];
        $contact_address = empty( $instance['buzzstorepro_quick_address'] ) ? '' : $instance['buzzstorepro_quick_address'];
        $contact_number  = empty( $instance['buzzstorepro_quick_phone'] ) ? '' : $instance['buzzstorepro_quick_phone'];
        $contact_email   = empty( $instance['buzzstorepro_quick_email'] ) ? '' : $instance['buzzstorepro_quick_email'];
        $opening_time    = empty( $instance['buzzstorepro_opening_time'] ) ? '' : $instance['buzzstorepro_opening_time'];
        
        echo $before_widget; 
        
        if(!empty($title)) {
          echo '<h2 class="widget-title">'.esc_html( $title ).'</h2>';
        }
    ?>
        <div class="buzz-contactinfo buzz-clearfix">
            <ul class="buzz-contactwrap">
                <?php if(!empty( $contact_address )) { ?>
                <li class="contact-address">
                    <span class="icon-location-pin"></span>
                    <?php echo wp_kses_data( $contact_address ); ?>
                </li>
                <?php }  if(!empty( $contact_number )) { ?>
                <li class="contact-number">
                    <span class="icon-call-in"></span>
                    <?php echo wp_kses_data( $contact_number ); ?>
                </li>
                <?php }  if(!empty( $contact_email )) { ?>
                <li class="contact-email">
                    <span class="icon-envelope-open"></span>
                    <a href="mailto:<?php echo esc_attr( antispambot( $contact_email ) ); ?>"><?php echo esc_attr( antispambot( $contact_email ) ); ?></a>
                </li>
                <?php }  if(!empty( $opening_time )) { ?>
                <li class="contact-time">
                    <span class="icon-clock"></span>
                    <?php echo wp_kses_data( $opening_time ); ?>
                </li> 
                <?php } ?>                                      
            </ul>
        </div>
    <?php         
        echo $after_widget;
    }
   
    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $widget_fields = $this->widget_fields();
        foreach ($widget_fields as $widget_field) {
            extract($widget_field);
            $instance[$buzzstorepro_widgets_name] = buzzstorepro_widgets_updated_field_value($widget_field, $new_instance[$buzzstorepro_widgets_name]);
        }
        return $instance;
    }

    public function form($instance) {
        $widget_fields = $this->widget_fields();
        foreach ($widget_fields as $widget_field) {
            extract($widget_field);
            $buzzstorepro_widgets_field_value = !empty($instance[$buzzstorepro_widgets_name]) ? esc_attr($instance[$buzzstorepro_widgets_name]) : '';
            buzzstorepro_widgets_show_widget_field($this, $widget_field, $buzzstorepro_widgets_field_value);
        }
    }
}