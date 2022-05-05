<?php
/**
 ** Adds buzzstorepro_team_widget widget.
*/
add_action('widgets_init', 'buzzstorepro_team_widget');
function buzzstorepro_team_widget() {
    register_widget('buzzstorepro_team_widget_area');
}

class buzzstorepro_team_widget_area extends WP_Widget {

    /**
     * Register widget with WordPress.
    **/
    public function __construct() {
        parent::__construct(
            'buzzstorepro_team_widget_area', esc_html__('&nbsp;Buzz:Team Member Widget(Pro)','buzzstore-pro'), array(
            'description' => esc_html__('A widget that shows our team member', 'buzzstore-pro')
        ));
    }

    private function widget_fields() {

        $fields = array(

            'buzzstorepro_team_title' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_team_title',
                'buzzstorepro_widgets_title' => esc_html__('Title', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'title',
            ),

            'buzzstorepro_team_short_desc' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_team_short_desc',
                'buzzstorepro_widgets_title' => esc_html__('Very Short Description', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'textarea',
                'buzzstorepro_widgets_row'    => 4,
            ),

            'buzzstorepro_team_display_order' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_team_display_order',
                'buzzstorepro_widgets_title' => esc_html__('Display Order', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'select',
                'buzzstorepro_widgets_field_options' => array(                        
                        'DESC' => 'Descending Order',
                        'ASC' => 'Ascending Order'
                    )
            )

        );

        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);
        /**
         ** wp query for first block
        **/
        $title                = empty( $instance['buzzstorepro_team_title'] ) ? '' : $instance['buzzstorepro_team_title'];
        $short_desc           = empty( $instance['buzzstorepro_team_short_desc'] ) ? '' : $instance['buzzstorepro_team_short_desc'] ;
        $team_display_order   = empty( $instance['buzzstorepro_team_display_order'] ) ? 'DESC' : $instance['buzzstorepro_team_display_order'];

        $team_posts = new WP_Query( array(
            'post_type'      => 'team',
            'posts_per_page' => -1,
            'order'          => $team_display_order,
        ));

        echo $before_widget;
    ?>

        <section class="team-container">
            <div class="buzz-container buzz-clearfix">
                
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
                  <div class="starSeparatorBox">
                      <div class="starSeparator">
                          <span class="icon-star" aria-hidden="true"></span>
                      </div>
                  </div>

                <div class="teamwrap enable-owl-carousel owl-product-slider wow fadeInUp" data-wow-delay="0.7s" data-navigation="true" data-pagination="false" data-single-item="false" data-auto-play="false" data-transition-style="false" data-main-text-animation="false" data-min600="3" data-min800="3" data-min1200="3">
                    <?php
                        if( $team_posts->have_posts() ) { while( $team_posts->have_posts() ) { $team_posts->the_post();
                        $image_path              = wp_get_attachment_image_src( get_post_thumbnail_id(), 'buzzstorepro-team-image', true );                           
                        $team_position           = get_post_meta(get_the_ID(), 'team_member_position', true);
                        $team_member_email       = get_post_meta( get_the_ID(), 'team_member_email', true );
                        $team_member_weblink     = esc_url(get_post_meta( get_the_ID(), 'team_member_weblink', true )); 
                        $team_member_facebook    = esc_url(get_post_meta( get_the_ID(), 'team_member_facebook', true )); 
                        $team_member_twitter     = esc_url(get_post_meta( get_the_ID(), 'team_member_twitter', true )); 
                        $team_member_googleplus  = esc_url(get_post_meta( get_the_ID(), 'team_member_googleplus', true )); 
                        $team_member_linkedin    = esc_url(get_post_meta( get_the_ID(), 'team_member_linkedin', true )); 
                        $team_member_instagram   = esc_url(get_post_meta( get_the_ID(), 'team_member_instagram', true ));
                    ?>
                        <div class="teaminfo">
                            <?php if( has_post_thumbnail() ) { ?>
                                <div class="team-image">
                                    <figure>
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo esc_url( $image_path[0] ); ?>" alt="<?php the_title(); ?>">
                                        </a>
                                    </figure>
                                </div>
                            <?php } ?>
                            <div class="teamdetails text-center">                                    
                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                <h6><?php echo esc_html( $team_position ); ?></h6>
                                <ul class="social-icons clearfix">
                                    <?php if(!empty( $team_member_facebook) ) { ?><li><a href="<?php echo esc_url( $team_member_facebook ); ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
                                    <?php if(!empty( $team_member_twitter) ) { ?><li><a href="<?php echo esc_url( $team_member_twitter ); ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
                                    <?php if(!empty( $team_member_googleplus) ) { ?><li><a href="<?php echo esc_url( $team_member_googleplus ); ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>
                                    <?php if(!empty( $team_member_linkedin) ) { ?><li><a href="<?php echo esc_url( $team_member_linkedin ); ?>"><i class="fa fa-linkedin"></i></a></li><?php } ?>
                                    <?php if(!empty( $team_member_instagram) ) { ?><li><a href="<?php echo esc_url( $team_member_instagram ); ?>"><i class="fa fa-instagram"></i></a></li><?php } ?>
                                    <?php if(!empty( $team_member_weblink) ) { ?><li><a href="<?php echo esc_url( $team_member_weblink ); ?>"><i class="fa fa-link"></i></a></li><?php } ?>
                                </ul>
                            </div>                       
                        </div>
                    <?php } } wp_reset_postdata(); ?> 
                </div>

            </div>
        </section><!-- End Latest Blog -->

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
