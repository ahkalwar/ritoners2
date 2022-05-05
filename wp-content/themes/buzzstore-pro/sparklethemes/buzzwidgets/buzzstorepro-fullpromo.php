<?php
/**
 * Adds buzzstorepro_full_promo widget.
*/
add_action('widgets_init', 'buzzstorepro_full_promo');
function buzzstorepro_full_promo() {
    register_widget('buzzstorepro_full_promo_area');
}

class buzzstorepro_full_promo_area extends WP_Widget {

    /**
     * Register widget with WordPress.
    **/
    public function __construct() {
        parent::__construct(
            'buzzstorepro_full_promo_area', esc_html__('&nbsp;Buzz: Full Promo Widget','buzzstore-pro'), array(
            'description' => esc_html__('A widget that promote you busincess', 'buzzstore-pro')
        ));
    }
    
    private function widget_fields() {
      
        $fields = array( 

            'buzzstorepro_full_promo_image' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_full_promo_image',
                'buzzstorepro_widgets_title' => esc_html__('Uplaod Promo Image', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'upload',
            ),
            
            'buzzstorepro_full_promo_title' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_full_promo_title',
                'buzzstorepro_widgets_title' => esc_html__('Title', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'title',
            ),

            'buzzstorepro_full_promo_desc' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_full_promo_desc',
                'buzzstorepro_widgets_title' => esc_html__('Short Description', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'textarea',
                'buzzstorepro_widgets_row'    => 4,
            ),

            'buzzstorepro_full_promo_button_link' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_full_promo_button_link',
                'buzzstorepro_widgets_title' => esc_html__('Promo Button Link', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'url',
            ),

            'buzzstorepro_full_promo_button_text' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_full_promo_button_text',
                'buzzstorepro_widgets_title' => esc_html__('Promo Button Text', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'text',
            ),

            'buzzstorepro_title_style' => array(
              'buzzstorepro_widgets_name' => 'buzzstorepro_title_style',
              'buzzstorepro_widgets_title' => esc_html__('Full Promo Display Style', 'buzzstore-pro'),
              'buzzstorepro_widgets_field_type' => 'select',
              'buzzstorepro_widgets_field_options' => array(
                      'fullbg'   => esc_html__('Full Background', 'buzzstore-pro'),
                      'boxedbg'   => esc_html__('Boxed Background', 'buzzstore-pro')
                  )
            ),
        );

        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        
        $promo_image     = empty( $instance['buzzstorepro_full_promo_image'] ) ? '' : $instance['buzzstorepro_full_promo_image'];
        $title           = empty( $instance['buzzstorepro_full_promo_title'] ) ? '' : $instance['buzzstorepro_full_promo_title'];
        $short_desc      = empty( $instance['buzzstorepro_full_promo_desc'] ) ? '' : $instance['buzzstorepro_full_promo_desc'];
        $button_link     = empty( $instance['buzzstorepro_full_promo_button_link'] ) ? '' : $instance['buzzstorepro_full_promo_button_link'];
        $button_text     = empty( $instance['buzzstorepro_full_promo_button_text'] ) ? '' : $instance['buzzstorepro_full_promo_button_text'];
        $fullpromostyle  = empty( $instance['buzzstorepro_title_style'] ) ? 'fullbg' : $instance['buzzstorepro_title_style'];
        
        echo $before_widget; 
    ?>
        <div class="promosection <?php if( !empty( $fullpromostyle ) && $fullpromostyle == 'boxedbg' ){ echo 'buzz-container'; } ?>">            
            <div class="promoarea-div">
                <div class="promoarea">
                    <a class="promosection_overlay" href="<?php echo esc_url( $button_link ) ?>">
                        <figure class="promoimage" <?php if(!empty($promo_image)){ ?>style="background-image:url(<?php echo esc_url( $promo_image); ?>);"<?php } ?>></figure>
                    </a>
                    <a href="<?php echo esc_url( $button_link ) ?>" class="buzz-container textwrap">
                        <span>
                            <p><?php echo esc_html( $title ); ?></p>
                        </span>
                        <h2><?php echo wp_kses_post( $short_desc ); ?></h2>
                        <p class="line-text line-text_white">
                            <?php echo esc_attr( $button_text ); ?>
                        </p>
                    </a>
                </div>                         
            </div>
        </div>     
    <?php echo $after_widget;
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
            $buzzstorepro_widgets_field_value = !empty($instance[$buzzstorepro_widgets_name]) ? $instance[$buzzstorepro_widgets_name] : '';
            buzzstorepro_widgets_show_widget_field($this, $widget_field, $buzzstorepro_widgets_field_value);
        }
    }
}