<?php
/**
 * Adds buzzstorepro_blog_widget widget.
 */
add_action('widgets_init', 'buzzstorepro_blog_widget');

function buzzstorepro_blog_widget() {
    register_widget('buzzstorepro_blog_widget_area');
}

class buzzstorepro_blog_widget_area extends WP_Widget {

    /**
     * Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
                'buzzstorepro_blog_widget_area', esc_html__('&nbsp;Buzz: Blogs Widget','buzzstore-pro'), array(
            'description' => esc_html__('A widget that display latest three posts', 'buzzstore-pro')
        ));
    }

    private function widget_fields() {

        $args = array(
            'type' => 'post',
            'child_of' => 0,
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => 1,
            'taxonomy' => 'category',
        );
        $categories = get_categories($args);
        $cat_lists = array();
        foreach ($categories as $category) {
            $cat_lists[$category->term_id] = $category->name;
        }

        $fields = array(
            
            'buzzstorepro_blog_padding_top' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_blog_padding_top',
                'buzzstorepro_widgets_title' => esc_html__('Padding Top Default (40px)', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'number',
            ),

            'buzzstorepro_blog_padding_buttom' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_blog_padding_buttom',
                'buzzstorepro_widgets_title' => esc_html__('Padding Buttom Default (40px)', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'number',
            ),

            'blogs_display_layout' => array(
                'buzzstorepro_widgets_name' => 'blogs_display_layout',
                'buzzstorepro_widgets_title' => esc_html__('Blogs Display Layouts', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'select',
                'buzzstorepro_widgets_field_options' => array(
                    'sliderview' => esc_html__('Slider View','buzzstore-pro'),
                    'listview' => esc_html__('List View', 'buzzstore-pro')
                )
            ),

            'buzzstorepro_blogs_title' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_blogs_title',
                'buzzstorepro_widgets_title' => esc_html__('Blogs Title', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'title',
            ),

            'buzzstorepro_blogs_desc' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_blogs_desc',
                'buzzstorepro_widgets_title' => esc_html__('Very Short Description', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'textarea',
                'buzzstorepro_widgets_row'  => 4
            ),

            'blogs_category_list' => array(
                'buzzstorepro_widgets_name' => 'blogs_category_list',
                'buzzstorepro_mulicheckbox_title' => esc_html__('Select Blogs Category', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'multicheckboxes',
                'buzzstorepro_widgets_field_options' => $cat_lists
            ),

            'blogs_post_display_number' => array(
                'buzzstorepro_widgets_name' => 'blogs_post_display_number',
                'buzzstorepro_widgets_title' => esc_html__('Enter Display Number of Posts', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'number',
            ),

            'blogs_posts_display_order' => array(
                'buzzstorepro_widgets_name' => 'blogs_posts_display_order',
                'buzzstorepro_widgets_title' => esc_html__('Display Posts Order', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'select',
                'buzzstorepro_widgets_field_options' => array(
                    'ASC' => esc_html__('Ascending Order','buzzstore-pro'),
                    'DESC' => esc_html__('Descending Order', 'buzzstore-pro')
                )
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
        $padding_top              = empty( $instance['buzzstorepro_blog_padding_top'] ) ? 40 : $instance['buzzstorepro_blog_padding_top'];
        $padding_buttom           = empty( $instance['buzzstorepro_blog_padding_buttom'] ) ? 40 : $instance['buzzstorepro_blog_padding_buttom'];

        $blogs_layout              = empty( $instance['blogs_display_layout'] ) ? 'sliderview' : $instance['blogs_display_layout'];
        $title                     = empty( $instance['buzzstorepro_blogs_title'] ) ? '' : $instance['buzzstorepro_blogs_title'];
        $short_desc                = empty( $instance['buzzstorepro_blogs_desc'] ) ? '' : $instance['buzzstorepro_blogs_desc'];
        $number_posts              = empty( $instance['blogs_post_display_number'] ) ? 5 : $instance['blogs_post_display_number'];
        $blogs_category_list       = empty( $instance['blogs_category_list'] ) ? '' : $instance['blogs_category_list'];
        $blogs_posts_display_order = empty( $instance['blogs_posts_display_order'] ) ? '' : $instance['blogs_posts_display_order'];

        $blogs_cat_id = array();
        if (!empty($blogs_category_list)) {
            $blogs_cat_id = array_keys($blogs_category_list);
        }

        $blogs_posts = new WP_Query(array(
            'posts_per_page' => $number_posts,
            'post_type' => 'post',
            'cat' => $blogs_cat_id,
            'order' => $blogs_posts_display_order
        ));

        echo $before_widget; ?>

        <div id="fromBlog" class="buzz-container buzz-clearfix" style="padding:<?php echo intval( $padding_top ); ?>px 0 <?php echo intval( $padding_buttom ); ?>px 0;">            
            <div class="buzz-titlewrap">
                <?php if(!empty( $title )) { ?>
                    <h2 class="buzz-title wow zoomIn">
                        <?php echo esc_html( $title ); ?>
                    </h2>
                <?php }  if(!empty( $short_desc )) { ?>
                    <p class="buzz-subTitle wow zoomIn">
                        <?php echo esc_html( $short_desc ); ?>
                    </p>
                <?php } ?>
            </div>
            <div class="blog-container starSeparatorBox">
                <div class="starSeparator wow zoomIn" data-wow-delay="0.3s">
                    <span class="icon-star" aria-hidden="true"></span>
                </div>
            </div>

            <ul class="buzzstorepro-blogwrap <?php if($blogs_layout == 'sliderview'){ echo 'enable-owl-carousel'; }else { echo 'listview'; } ?> owl-product-slider wow fadeInUp" data-wow-delay="0.7s" data-navigation="true" data-pagination="false" data-single-item="false" data-auto-play="false" data-transition-style="false" data-main-text-animation="false" data-min600="2" data-min800="2" data-min1200="3">
                <?php if ( $blogs_posts->have_posts()) : while ($blogs_posts->have_posts()) : $blogs_posts->the_post(); ?>
                    <li>
                        <div class="blog-preview wow fadeInUp" data-wow-delay="0.3s">
                            <?php 
                                if (has_post_thumbnail()) { 
                                $image = wp_get_attachment_image_src(get_post_thumbnail_id( get_the_ID() ), 'buzzstorepro-news-image', true);
                            ?>
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo esc_url( $image[0] ); ?>" />
                                </a>
                            <?php } ?>                    
                            <div class="header-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </div>
                            <p><?php echo wp_kses_post( wp_trim_words( get_the_content(), 30 ) ); ?></p>
                            <a class="btn-readmore" href="<?php the_permalink(); ?>">
                                <?php esc_html_e('Continue Reading', 'buzzstore-pro'); ?>
                            </a>
                        </div>
                    </li>
                <?php endwhile; endif; wp_reset_postdata(); ?>
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
            $buzzstorepro_widgets_field_value = !empty($instance[$buzzstorepro_widgets_name]) ? $instance[$buzzstorepro_widgets_name] : '';
            buzzstorepro_widgets_show_widget_field($this, $widget_field, $buzzstorepro_widgets_field_value);
        }
    }

}
