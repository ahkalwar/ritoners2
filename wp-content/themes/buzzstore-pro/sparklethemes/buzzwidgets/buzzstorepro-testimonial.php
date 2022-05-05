<?php
/**
 * Adds buzzstorepro_testimonial_widget widget.
*/
add_action('widgets_init', 'buzzstorepro_testimonial_widget');
function buzzstorepro_testimonial_widget() {
    register_widget('buzzstorepro_testimonial_widget_area');
}

class buzzstorepro_testimonial_widget_area extends WP_Widget {

    /**
     * Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
            'buzzstorepro_testimonial_widget_area', esc_html__('&nbsp;Buzz: Testimonial Widget Section','buzzstore-pro'), array(
            'description' => esc_html__('A widget that shows client testimonial posts', 'buzzstore-pro')
        ));
    }
    
    private function widget_fields() {
        
        $args = array(
          'type'       => 'post',
          'child_of'   => 0,
          'orderby'    => 'name',
          'order'      => 'ASC',
          'hide_empty' => 1,
          'taxonomy'   => 'category',
        );
        $categories = get_categories( $args );
        $cat_lists = array();
        foreach( $categories as $category ) {
            $cat_lists[$category->term_id] = $category->name;
        }

        $fields = array(             
            'buzzstorepro_testimonial_top_title' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_testimonial_top_title',
                'buzzstorepro_widgets_title' => esc_html__('Testimonial Top Title', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'title',
            ),            
            'testimonial_category_list' => array(
              'buzzstorepro_widgets_name' => 'testimonial_category_list',
              'buzzstorepro_mulicheckbox_title' => esc_html__('Select Blogs Category', 'buzzstore-pro'),
              'buzzstorepro_widgets_field_type' => 'multicheckboxes',
              'buzzstorepro_widgets_field_options' => $cat_lists
            )                                  
        );

        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        /**
         * wp query for first block
        */
        $testimonial_top_title     = empty( $instance['buzzstorepro_testimonial_top_title'] ) ? '' : $instance['buzzstorepro_testimonial_top_title'];
        $testimonial_category_list = empty( $instance['testimonial_category_list'] ) ? '' : $instance['testimonial_category_list'];
        
        $testimonial_cat_id = array();
        if(!empty($testimonial_category_list)){
            $testimonial_cat_id = array_keys($testimonial_category_list);
        }

        $testimonial_posts = new WP_Query( array(
            'posts_per_page'      => 5,
            'post_type'           => 'post',
            'cat'                 => $testimonial_cat_id,
        ));

        echo $before_widget; 
    ?>
        <section id="testimonial" class="testimonial-container">

          <div class="buzz-container buzz-clearfix relative">                    
              
            <div class="buzz-titlewrap">
              <?php if(!empty( $testimonial_top_title )) { ?>
                  <h2 class="buzz-title wow zoomIn" data-wow-delay="0.3s">
                      <?php echo esc_html( $testimonial_top_title ); ?>
                  </h2>
              <?php } ?>
            </div>
          
            <div class="comments-slider starSeparatorBox">              
              
              <div class="starSeparator wow zoomIn" data-wow-delay="0.3s">
                <span class="icon-star" aria-hidden="true"></span>
              </div>

              <div class="bx-wrapper">                
                <div class="bx-viewport">
                  <ul class="bxslider" data-mode="vertical" data-slide-margin="50" data-min-slides="1" data-move-slides="1" data-pager="false" data-pager-custom="null" data-controls="true">
                    <?php if( $testimonial_posts->have_posts() ) : while( $testimonial_posts->have_posts() ) : $testimonial_posts->the_post(); ?>
                      <li class="bx-clone">
                        <div class="comment-slide-item">
                          <div class="comment-slide-item_text"><?php the_excerpt(); ?></div>
                          <div class="comment-slide-item_author">
                            <i class="fa fa-quote-left"></i>
                            <span class="comment-slide-item_author_name"><?php the_title(); ?></span>
                          </div>
                        </div>
                      </li>
                    <?php endwhile; endif; wp_reset_postdata(); ?>
                  </ul>
                </div>               

              </div>

            </div>

          </div>

        </section>

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
            $buzzstorepro_widgets_field_value = !empty($instance[$buzzstorepro_widgets_name]) ? $instance[$buzzstorepro_widgets_name] : '';
            buzzstorepro_widgets_show_widget_field($this, $widget_field, $buzzstorepro_widgets_field_value);
        }
    }
}