<?php
/**
 * Adds buzzstore_testimonial_widget widget.
*/
add_action('widgets_init', 'buzzstore_testimonial_widget');
function buzzstore_testimonial_widget() {
    register_widget('buzzstore_testimonial_widget_area');
}

class buzzstore_testimonial_widget_area extends WP_Widget {

    /**
     * Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
            'buzzstore_testimonial_widget_area', esc_html__('&nbsp;Buzz: Testimonial Widget Section','buzzstore'), array(
            'description' => esc_html__('A widget that shows client testimonial posts', 'buzzstore')
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
            'buzzstore_testimonial_top_title' => array(
                'buzzstore_widgets_name' => 'buzzstore_testimonial_top_title',
                'buzzstore_widgets_title' => esc_html__('Testimonial Top Title', 'buzzstore'),
                'buzzstore_widgets_field_type' => 'title',
            ),            
            'testimonial_category_list' => array(
              'buzzstore_widgets_name' => 'testimonial_category_list',
              'buzzstore_mulicheckbox_title' => esc_html__('Select Blogs Category', 'buzzstore'),
              'buzzstore_widgets_field_type' => 'multicheckboxes',
              'buzzstore_widgets_field_options' => $cat_lists
            ), 
            'testimonial_no_of_posts' => array(
              'buzzstore_widgets_name' => 'testimonial_no_of_posts',
              'buzzstore_widgets_title' => esc_html__('Number of Posts to Display', 'buzzstore'),
              'buzzstore_widgets_field_type' => 'select',
              'buzzstore_widgets_field_options' => array(
                '1' => esc_html__('1', 'buzzstore' ),
                '2' => esc_html__('2', 'buzzstore'),
                '3' => esc_html__('3', 'buzzstore'),
                '4' => esc_html__('4', 'buzzstore'),
                '5' => esc_html__('5', 'buzzstore'),
              ),
            ), 
            'testimonial_number_of_columns' => array(
              'buzzstore_widgets_name' => 'testimonial_number_of_columns',
              'buzzstore_widgets_title' => esc_html__('Number of Columns', 'buzzstore'),
              'buzzstore_widgets_field_type' => 'select',
              'buzzstore_widgets_field_options' => array(
                '1' => esc_html__('1', 'buzzstore' ),
                '2' => esc_html__('2', 'buzzstore'),
                '3' => esc_html__('3', 'buzzstore'),
                '4' => esc_html__('4', 'buzzstore'),
              ),
            ),
            'buzzstore_testimonial_layout' => array(
              'buzzstore_widgets_name' => 'buzzstore_testimonial_layout',
              'buzzstore_widgets_title' => esc_html__('Select Layout', 'buzzstore'),
              'buzzstore_widgets_field_type' => 'select',
              'buzzstore_widgets_field_options' => array(
                '' => esc_html__('Layout One', 'buzzstore'),
                'style-two' => esc_html__('Layout Two', 'buzzstore'),
              ),
            ),     
        );

        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        /**
         * wp query for first block
        */
        $testimonial_top_title          = empty( $instance['buzzstore_testimonial_top_title'] ) ? '' : $instance['buzzstore_testimonial_top_title'];
        $testimonial_no_of_posts        = empty( $instance['testimonial_no_of_posts'] ) ? '' : $instance['testimonial_no_of_posts'];
        $testimonial_number_of_columns  = empty ( $instance['testimonial_number_of_columns'] ) ? : $instance['testimonial_number_of_columns'];
        $testimonial_category_list      = empty( $instance['testimonial_category_list'] ) ? '' : $instance['testimonial_category_list'];
        $buzzstore_testimonial_layout   = empty( $instance['buzzstore_testimonial_layout'] ) ? '' : $instance['buzzstore_testimonial_layout'];
        
        $testimonial_cat_id = array();
        if(!empty($testimonial_category_list)){
            $testimonial_cat_id = array_keys($testimonial_category_list);
        }

        $testimonial_posts = new WP_Query( array(
            'posts_per_page'      => $testimonial_no_of_posts,
            'post_type'           => 'post',
            'cat'                 => $testimonial_cat_id,
        ));

        echo $before_widget; 
    ?>
        <section id="testimonial" class="testimonial-container <?php echo esc_attr( $buzzstore_testimonial_layout ); ?>">

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
                  <ul class="bxslider" data-mode="vertical" data-slide-margin="50" data-min-slides="<?php echo intval( $testimonial_number_of_columns ); ?>" data-move-slides="<?php echo intval( $testimonial_number_of_columns ); ?>" data-pager="false" data-pager-custom="null" data-controls="true">
                    <?php if( $testimonial_posts->have_posts() ) : while( $testimonial_posts->have_posts() ) : $testimonial_posts->the_post(); $testimonial_thumbnail_id = get_post_thumbnail_id(); $testimonial_thumbnail_alt = get_post_meta($testimonial_thumbnail_id, '_wp_attachment_image_alt', TRUE); ?>
                      <li class="bx-clone">
                        <div class="comment-slide-item">
                          <div class="comment-slide-item_text"><?php the_excerpt(); ?></div>
                          <div class="comment-slide-item_author">
                            <div class="image">
                              <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo esc_attr( $testimonial_thumbnail_alt ); ?>">
                            </div>
                              <div class="title-wrap">
                                <i class="fa fa-quote-left"></i>
                                <span class="comment-slide-item_author_name"><?php the_title(); ?></span>
                              </div>
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