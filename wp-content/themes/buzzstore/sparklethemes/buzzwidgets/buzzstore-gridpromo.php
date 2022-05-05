<?php
/**
 * Adds buzzstore_grid_promo widget.
*/
add_action('widgets_init', 'buzzstore_grid_promo');
function buzzstore_grid_promo() {
    register_widget('buzzstore_grid_promo_area');
}

class buzzstore_grid_promo_area extends WP_Widget {

    /**
     * Register widget with WordPress.
    **/
    public function __construct() {
        parent::__construct(
            'buzzstore_grid_promo_area', esc_html__('&nbsp;Buzz: Grid Promo Widget','buzzstore'), array(
            'description' => esc_html__('A widget that promote you busincess', 'buzzstore')
        ));
    }
    
    private function widget_fields() {
      
        $fields = array( 

            'buzzstore_grid_promo_image' => array(
                'buzzstore_widgets_name' => 'buzzstore_grid_promo_image',
                'buzzstore_widgets_title' => esc_html__('Upload Grid 1 Image', 'buzzstore'),
                'buzzstore_widgets_field_type' => 'upload',
            ),
            
            'buzzstore_grid_promo_title' => array(
                'buzzstore_widgets_name' => 'buzzstore_grid_promo_title',
                'buzzstore_widgets_title' => esc_html__('Grid 1 Title', 'buzzstore'),
                'buzzstore_widgets_field_type' => 'title',
            ),

            'buzzstore_grid_promo_desc' => array(
                'buzzstore_widgets_name' => 'buzzstore_grid_promo_desc',
                'buzzstore_widgets_title' => esc_html__('Grid 1 Short Description', 'buzzstore'),
                'buzzstore_widgets_field_type' => 'text'
            ),

            'buzzstore_grid_promo_button_link' => array(
                'buzzstore_widgets_name' => 'buzzstore_grid_promo_button_link',
                'buzzstore_widgets_title' => esc_html__('Grid 1 Promo Button Link', 'buzzstore'),
                'buzzstore_widgets_field_type' => 'url',
            ),

            'buzzstore_grid_promo_button_text' => array(
                'buzzstore_widgets_name' => 'buzzstore_grid_promo_button_text',
                'buzzstore_widgets_title' => esc_html__('Grid 1 Promo Button Text', 'buzzstore'),
                'buzzstore_widgets_field_type' => 'text',
            ),

            'buzzstore_grid_2_promo_image' => array(
                'buzzstore_widgets_name' => 'buzzstore_grid_2_promo_image',
                'buzzstore_widgets_title' => esc_html__('Upload Grid 2 Image', 'buzzstore'),
                'buzzstore_widgets_field_type' => 'upload',
            ),
            
            'buzzstore_grid_2_promo_title' => array(
                'buzzstore_widgets_name' => 'buzzstore_grid_2_promo_title',
                'buzzstore_widgets_title' => esc_html__('Grid 2 Title', 'buzzstore'),
                'buzzstore_widgets_field_type' => 'title',
            ),

            'buzzstore_grid_2_promo_desc' => array(
                'buzzstore_widgets_name' => 'buzzstore_grid_2_promo_desc',
                'buzzstore_widgets_title' => esc_html__('Grid 2 Short Description', 'buzzstore'),
                'buzzstore_widgets_field_type' => 'text'
            ),

            'buzzstore_grid_2_promo_button_link' => array(
                'buzzstore_widgets_name' => 'buzzstore_grid_2_promo_button_link',
                'buzzstore_widgets_title' => esc_html__('Grid 2 Promo Button Link', 'buzzstore'),
                'buzzstore_widgets_field_type' => 'url',
            ),

            'buzzstore_grid_2_promo_button_text' => array(
                'buzzstore_widgets_name' => 'buzzstore_grid_2_promo_button_text',
                'buzzstore_widgets_title' => esc_html__('Grid 2 Promo Button Text', 'buzzstore'),
                'buzzstore_widgets_field_type' => 'text',
            ),

            'buzzstore_grid_3_promo_image' => array(
                'buzzstore_widgets_name' => 'buzzstore_grid_3_promo_image',
                'buzzstore_widgets_title' => esc_html__('Upload Grid 3 Image', 'buzzstore'),
                'buzzstore_widgets_field_type' => 'upload',
            ),
            
            'buzzstore_grid_3_promo_title' => array(
                'buzzstore_widgets_name' => 'buzzstore_grid_3_promo_title',
                'buzzstore_widgets_title' => esc_html__('Grid 3 Title', 'buzzstore'),
                'buzzstore_widgets_field_type' => 'title',
            ),

            'buzzstore_grid_3_promo_desc' => array(
                'buzzstore_widgets_name' => 'buzzstore_grid_3_promo_desc',
                'buzzstore_widgets_title' => esc_html__('Grid 3 Short Description', 'buzzstore'),
                'buzzstore_widgets_field_type' => 'text'
            ),

            'buzzstore_grid_3_promo_button_link' => array(
                'buzzstore_widgets_name' => 'buzzstore_grid_3_promo_button_link',
                'buzzstore_widgets_title' => esc_html__('Grid 3 Promo Button Link', 'buzzstore'),
                'buzzstore_widgets_field_type' => 'url',
            ),

            'buzzstore_grid_3_promo_button_text' => array(
                'buzzstore_widgets_name' => 'buzzstore_grid_3_promo_button_text',
                'buzzstore_widgets_title' => esc_html__('Grid 3 Promo Button Text', 'buzzstore'),
                'buzzstore_widgets_field_type' => 'text',
            ),

        );

        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);


        $grid_image             = empty( $instance['buzzstore_grid_promo_image'] ) ? '' : $instance['buzzstore_grid_promo_image'];
        $grid_title             = empty( $instance['buzzstore_grid_promo_title'] ) ? '' : $instance['buzzstore_grid_promo_title'];
        $grid_short_desc        = empty( $instance['buzzstore_grid_promo_desc'] ) ? '' : $instance['buzzstore_grid_promo_desc'];
        $grid_button_link       = empty( $instance['buzzstore_grid_promo_button_link'] ) ? : $instance['buzzstore_grid_promo_button_link'];
        $grid_button_text       = empty( $instance['buzzstore_grid_promo_button_text'] ) ? : $instance['buzzstore_grid_promo_button_text'];
        $grid_2_image           = empty( $instance['buzzstore_grid_2_promo_image'] ) ? '' : $instance['buzzstore_grid_2_promo_image'];
        $grid_2_title           = empty( $instance['buzzstore_grid_2_promo_title'] ) ? '' : $instance['buzzstore_grid_2_promo_title'];
        $grid_2_short_desc      = empty( $instance['buzzstore_grid_2_promo_desc'] ) ? '' : $instance['buzzstore_grid_2_promo_desc'];
        $grid_2_button_link     = empty( $instance['buzzstore_grid_2_promo_button_link'] ) ? '' : $instance['buzzstore_grid_2_promo_button_link'];
        $grid_2_button_text     = empty( $instance['buzzstore_grid_2_promo_button_text'] ) ? '' : $instance['buzzstore_grid_2_promo_button_text'];
        $grid_3_image           = empty( $instance['buzzstore_grid_3_promo_image'] ) ? '' : $instance['buzzstore_grid_3_promo_image'];
        $grid_3_title           = empty( $instance['buzzstore_grid_3_promo_title'] ) ? '' : $instance['buzzstore_grid_3_promo_title'];
        $grid_3_short_desc      = empty( $instance['buzzstore_grid_3_promo_desc'] ) ? '' : $instance['buzzstore_grid_3_promo_desc'];
        $grid_3_button_link     = empty( $instance['buzzstore_grid_3_promo_button_link'] ) ? '' : $instance['buzzstore_grid_3_promo_button_link'];
        $grid_3_button_text     = empty( $instance['buzzstore_grid_3_promo_button_text'] ) ? '' : $instance['buzzstore_grid_3_promo_button_text'];


        echo $before_widget; 
    ?>       
        
        <div class="promosection ">  
            <div class="buzz-container">    
                <div class="promoarea-div grid grid-3">

                    <div class="promoarea">
                        <a class="promosection_overlay" href="<?php echo esc_url( $grid_button_link ); ?>">
                            <figure class="promoimage" <?php if(!empty($grid_image)){ ?>style="background-image:url(<?php echo esc_url( $grid_image); ?>);"<?php } ?>>
                            </figure>
                        </a>
                        <a href="<?php echo esc_url( $grid_button_link ); ?>" class="buzz-container textwrap">
                            <span>
                                <p><?php echo esc_html( $grid_title ); ?></p>
                            </span>
                            
                            <h2><?php echo esc_html( $grid_short_desc ); ?></h2>

                            <p class="line-text line-text_white">
                                <?php echo esc_html( $grid_button_text ); ?>
                            </p>
                        </a>
                    </div>

                    <div class="promoarea">
                        <a class="promosection_overlay" href="<?php echo esc_url( $grid_2_button_link ); ?>">
                            <figure class="promoimage" <?php if(!empty($grid_2_image)){ ?>style="background-image:url(<?php echo esc_url( $grid_2_image); ?>);"<?php } ?>>
                            </figure>
                        </a>
                        <a href="<?php echo esc_url( $grid_2_button_link ); ?>" class="buzz-container textwrap">
                            <span>
                                <p><?php echo esc_html( $grid_2_title ); ?></p>
                            </span>
                            
                            <h2><?php echo esc_html( $grid_2_short_desc ); ?></h2>

                            <p class="line-text line-text_white">
                                <?php echo esc_html( $grid_2_button_text ); ?>
                            </p>
                        </a>
                    </div>                       
                        
                    <div class="promoarea">
                        <a class="promosection_overlay" href="<?php echo esc_url( $grid_3_button_link ); ?>">
                            <figure class="promoimage" <?php if(!empty($grid_3_image)){ ?>style="background-image:url(<?php echo esc_url( $grid_3_image); ?>);"<?php } ?>>
                            </figure>
                        </a>
                        <a href="<?php echo esc_url( $grid_3_button_link ); ?>" class="buzz-container textwrap">
                            <span>
                                <p><?php echo esc_html( $grid_3_title ); ?></p>
                            </span>
                            
                            <h2><?php echo esc_html( $grid_3_short_desc ); ?></h2>

                            <p class="line-text line-text_white">
                                <?php echo esc_html( $grid_3_button_text ); ?>
                            </p>
                        </a>
                    </div>    

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
            $instance[$buzzstore_widgets_name] = buzzstore_widgets_updated_field_value($widget_field, $new_instance[$buzzstore_widgets_name]);
        }
        return $instance;
    }

    public function form($instance) {
        $widget_fields = $this->widget_fields();
        foreach ($widget_fields as $widget_field) {
            extract($widget_field);
            $buzzstore_widgets_field_value = !empty($instance[$buzzstore_widgets_name]) ? $instance[$buzzstore_widgets_name] : '';
            buzzstore_widgets_show_widget_field($this, $widget_field, $buzzstore_widgets_field_value);
        }
    }
}