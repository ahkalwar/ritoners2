<?php
/**
 * Adds buzzstorepro_aboutus_info widget.
*/
add_action('widgets_init', 'buzzstorepro_aboutus_info');
function buzzstorepro_aboutus_info() {
    register_widget('buzzstorepro_aboutus_info_area');
}

class buzzstorepro_aboutus_info_area extends WP_Widget {

    /**
     * Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
            'buzzstorepro_aboutus_info_area', esc_html__('&nbsp;Buzz: About Us Information', 'buzzstore-pro'), array(
            'description' => esc_html__('A widget that shows about us information', 'buzzstore-pro')
        ));
    }
    
    private function widget_fields() {        
        
        $fields = array( 
            
            'buzzstorepro_about_logo' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_about_logo',
                'buzzstorepro_widgets_title' => esc_html__('Upload Logo Image', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'upload',
            ),
            
            'buzzstorepro_about_short_desc' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_about_short_desc',
                'buzzstorepro_widgets_title' => esc_html__('Short Description', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'textarea',
                'buzzstorepro_widgets_row' => '3'
            ),
            
            'buzzstorepro_facebook_url' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_facebook_url',
                'buzzstorepro_widgets_title' => esc_html__('Facebook Url', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'url',
            ),
            
            'buzzstorepro_twitter_url' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_twitter_url',
                'buzzstorepro_widgets_title' => esc_html__('Twitter Url', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'url',
            ),
            
            'buzzstorepro_googleplus_url' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_googleplus_url',
                'buzzstorepro_widgets_title' => esc_html__('Google Plus Url', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'url',
            ),
            
            'buzzstorepro_youtube_url' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_youtube_url',
                'buzzstorepro_widgets_title' => esc_html__('Youtube Url', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'url',
            ),
            
            'buzzstorepro_instagram_url' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_instagram_url',
                'buzzstorepro_widgets_title' => esc_html__('Instagram Url', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'url',
            ),
            
            'buzzstorepro_pinterest_url' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_pinterest_url',
                'buzzstorepro_widgets_title' => esc_html__('Pinterest Url', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'url',
            ),
                            
        );

        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        
        $logo         = empty( $instance['buzzstorepro_about_logo'] ) ? '' : $instance['buzzstorepro_about_logo'];
        $shor_desc    = empty( $instance['buzzstorepro_about_short_desc'] ) ? '' : $instance['buzzstorepro_about_short_desc'];
        $facebook     = empty( $instance['buzzstorepro_facebook_url'] ) ? '' : $instance['buzzstorepro_facebook_url'];
        $twitter      = empty( $instance['buzzstorepro_twitter_url'] ) ? '' : $instance['buzzstorepro_twitter_url'];
        $googleplus   = empty( $instance['buzzstorepro_googleplus_url'] ) ? '' : $instance['buzzstorepro_googleplus_url'];
        $youtube      = empty( $instance['buzzstorepro_youtube_url'] ) ? '' : $instance['buzzstorepro_youtube_url'];
        $instagram    = empty( $instance['buzzstorepro_instagram_url'] ) ? '' : $instance['buzzstorepro_instagram_url'];
        $pinterest    = empty( $instance['buzzstorepro_pinterest_url'] ) ? '' : $instance['buzzstorepro_pinterest_url'];   
        
       echo $before_widget; 
    ?>
      <div class="about-container buzz-clearfix">            
        
            <?php if(!empty( $logo )) { ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="aboutlogo">
                  <img src="<?php echo esc_url( $logo ); ?>" alt="" />
                </a>
            <?php }  if(!empty( $shor_desc )) { ?>
                <span class="about-small-text">
                    <?php echo wp_filter_post_kses( $shor_desc ); ?>
                </span>
            <?php } ?>       
        
            <ul class="buzz-social-list">
                <?php if(!empty( $facebook )) { ?>
                    <li>
                      <a href="<?php echo esc_url( $facebook ); ?>" target="_blank"><span class="fa fa-facebook"></span></a>
                    </li>
                <?php }  if(!empty( $twitter )) { ?>
                  <li>
                      <a href="<?php echo esc_url( $twitter ); ?>" target="_blank"><span class="fa fa-twitter"></span></a>
                  </li>
                 <?php }  if(!empty( $googleplus )) { ?>
                  <li>
                      <a href="<?php echo esc_url( $googleplus ); ?>" target="_blank"><span class="fa fa-google-plus"></span></a>
                  </li>
                 <?php }  if(!empty( $youtube )) { ?>
                  <li>
                      <a href="<?php echo esc_url( $youtube ); ?>" target="_blank"><span class="fa fa-youtube"></span></a>
                  </li>
                 <?php }  if(!empty( $instagram )) { ?>
                  <li>
                      <a href="<?php echo esc_url( $instagram ); ?>" target="_blank"><span class="fa fa-instagram"></span></a>
                  </li>
                 <?php }  if(!empty( $pinterest )) { ?>
                  <li>
                      <a href="<?php echo esc_url( $pinterest ); ?>" target="_blank"><span class="fa fa-pinterest"></span></a>
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