<?php
/**
 * Adds buzzstorepro_promoarea_widget widget.
*/
add_action('widgets_init', 'buzzstorepro_promoarea_widget');
function buzzstorepro_promoarea_widget() {
    register_widget('buzzstorepro_promoarea_widget_area');
}

class buzzstorepro_promoarea_widget_area extends WP_Widget {
    /**
     * Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
            'buzzstorepro_promoarea_widget_area', esc_html__('&nbsp;Buzz: Promo Widget (Pro)','buzzstore-pro'), array(
            'description' => esc_html__('A widget that promote you busincess visual way', 'buzzstore-pro')
        ));
    }

    private function widget_fields() {

        $fields = array(

            'buzzstorepro_promo_padding_top' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_promo_padding_top',
                'buzzstorepro_widgets_title' => esc_html__('Padding Top Default (40px)', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'number',
            ),

            'buzzstorepro_promo_padding_buttom' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_promo_padding_buttom',
                'buzzstorepro_widgets_title' => esc_html__('Padding Buttom Default (40px)', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'number',
            ),

            'buzzstorepro_title_display_layout' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_title_display_layout',
                'buzzstorepro_widgets_title' => esc_html__('Select Promo Display Layout', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'select',
                'buzzstorepro_widgets_field_options' => array(
                        'onetothree' => esc_html__('1:3 (Layout)','buzzstore-pro'),
                        'onetotwo'   => esc_html__('1:2 (Layout)','buzzstore-pro'),
                        'twotoone'   => esc_html__('2:1 (Layout)','buzzstore-pro'),
                    )
            ),

            'banner_start_group_left' => array(
                'buzzstorepro_widgets_name' => 'banner_start_group_left',
                'buzzstorepro_widgets_title' => esc_html__('Promo Section One', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'group_start',
            ),

            'buzzstorepro_promo_one_image' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_promo_one_image',
                'buzzstorepro_widgets_title' => esc_html__('Upload Promo One Image', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'upload',
            ),

            'buzzstorepro_promo_one_title' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_promo_one_title',
                'buzzstorepro_widgets_title' => esc_html__('Enter Promo One Title', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'title',
            ),

            'buzzstorepro_promo_one_desc' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_promo_one_desc',
                'buzzstorepro_widgets_title' => esc_html__('Enter Very Short Description', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'textarea',
                'buzzstorepro_widgets_row' => 2,
            ),

            'buzzstorepro_promo_one_button_link' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_promo_one_button_link',
                'buzzstorepro_widgets_title' => esc_html__('Promo One Button Link', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'url',
            ),

            'banner_end_group_left' => array(
                'buzzstorepro_widgets_name' => 'banner_end_group_left',
                'buzzstorepro_widgets_field_type' => 'group_end',
            ),

            // Promo two Area

            'banner_start_group_left_two' => array(
                'buzzstorepro_widgets_name' => 'banner_start_group_left_two',
                'buzzstorepro_widgets_title' => esc_html__('Promo Section Two', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'group_start',
            ),

            'buzzstorepro_promo_two_image' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_promo_two_image',
                'buzzstorepro_widgets_title' => esc_html__('Upload Promo Two Image', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'upload',
            ),

            'buzzstorepro_promo_two_title' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_promo_two_title',
                'buzzstorepro_widgets_title' => esc_html__('Enter Promo Two Title', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'title',
            ),

            'buzzstorepro_promo_two_desc' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_promo_two_desc',
                'buzzstorepro_widgets_title' => esc_html__('Enter Very Short Description', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'textarea',
                'buzzstorepro_widgets_row' => 2,
            ),

            'buzzstorepro_promo_two_button_link' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_promo_two_button_link',
                'buzzstorepro_widgets_title' => esc_html__('Promo Two Button Link', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'url',
            ),

            'banner_end_group_left_two' => array(
                'buzzstorepro_widgets_name' => 'banner_end_group_left_two',
                'buzzstorepro_widgets_field_type' => 'group_end',
            ),

            // Promo three Area

            'banner_start_group_left_three' => array(
                'buzzstorepro_widgets_name' => 'banner_start_group_left_three',
                'buzzstorepro_widgets_title' => esc_html__('Promo Section Three', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'group_start',
            ),

            'buzzstorepro_promo_three_image' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_promo_three_image',
                'buzzstorepro_widgets_title' => esc_html__('Upload Promo Three Image', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'upload',
            ),

            'buzzstorepro_promo_three_title' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_promo_three_title',
                'buzzstorepro_widgets_title' => esc_html__('Enter Promo Three Title', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'title',
            ),

            'buzzstorepro_promo_three_desc' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_promo_three_desc',
                'buzzstorepro_widgets_title' => esc_html__('Enter Very Short Description', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'textarea',
                'buzzstorepro_widgets_row' => 2,
            ),

            'buzzstorepro_promo_three_button_link' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_promo_three_button_link',
                'buzzstorepro_widgets_title' => esc_html__('Promo Three Button Link', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'url',
            ),

            'banner_end_group_left_three' => array(
                'buzzstorepro_widgets_name' => 'banner_end_group_left_three',
                'buzzstorepro_widgets_field_type' => 'group_end',
            )

        );

        return $fields;
    }

    public function widget($args, $instance) {
        extract($args);
        extract($instance);

        $padding_top              = empty( $instance['buzzstorepro_promo_padding_top'] ) ? 40 : $instance['buzzstorepro_promo_padding_top'];
        $padding_buttom           = empty( $instance['buzzstorepro_promo_padding_buttom'] ) ? 40 : $instance['buzzstorepro_promo_padding_buttom'];

        $promo_layout             = empty( $instance['buzzstorepro_title_display_layout'] ) ? 'onetothree' : $instance['buzzstorepro_title_display_layout'];

        $promo_one_title          = empty( $instance['buzzstorepro_promo_one_title'] ) ? '' : $instance['buzzstorepro_promo_one_title'];
        $promo_one_desc           = empty( $instance['buzzstorepro_promo_one_desc'] ) ? '' : $instance['buzzstorepro_promo_one_desc'];
        $promo_one_image          = empty( $instance['buzzstorepro_promo_one_image'] ) ? '' : $instance['buzzstorepro_promo_one_image'];
        $promo_one_button_link    = empty( $instance['buzzstorepro_promo_one_button_link'] ) ? '' : $instance['buzzstorepro_promo_one_button_link'];

        $promo_two_title          = empty( $instance['buzzstorepro_promo_two_title'] ) ? '' : $instance['buzzstorepro_promo_two_title'];
        $promo_two_desc           = empty( $instance['buzzstorepro_promo_two_desc'] ) ? '' : $instance['buzzstorepro_promo_two_desc'];
        $promo_two_image          = empty( $instance['buzzstorepro_promo_two_image'] ) ? '' : $instance['buzzstorepro_promo_two_image'];
        $promo_two_button_link    = empty( $instance['buzzstorepro_promo_two_button_link'] ) ? '' : $instance['buzzstorepro_promo_two_button_link'];

        $promo_three_title        = empty( $instance['buzzstorepro_promo_three_title'] ) ? '' : $instance['buzzstorepro_promo_three_title'];
        $promo_three_desc         = empty( $instance['buzzstorepro_promo_three_desc'] ) ? '' : $instance['buzzstorepro_promo_three_desc'];
        $promo_three_image        = empty( $instance['buzzstorepro_promo_three_image'] ) ? '' : $instance['buzzstorepro_promo_three_image'];
        $promo_three_button_link  = empty( $instance['buzzstorepro_promo_three_button_link'] ) ? '' : $instance['buzzstorepro_promo_three_button_link'];

        echo $before_widget;
    ?>

        <div class="promo-banner-section" style="padding:<?php echo intval( $padding_top ); ?>px 0 <?php echo intval( $padding_buttom ); ?>px 0;">
            <div class="buzz-container buzz-clearfix">
                <div class="buzz-row-7 buzz-clearfix">
                    <?php if( !empty( $promo_one_image ) ){ ?>
                        <div class="<?php if( $promo_layout == 'onetothree' || $promo_layout == 'onetotwo' ){ ?>buzzcol4 <?php }elseif ( $promo_layout == 'twotoone'){ ?>buzzcol8<?php } ?>">

                                <a href="<?php echo esc_url( $promo_one_button_link ); ?>" class="promo-banner-img">
                                  <div class="promo-banner-img-inner">
                                      <div class="promo-bg-image-inner" style="background-image:url(<?php echo esc_url( $promo_one_image ); ?>)">
                                        <img src="<?php echo esc_url( $promo_one_image ); ?>" alt=""/>
                                      </div>

                                      <div class="promo-img-info">
                                        <div class="promo-img-info-inner">
                                          <?php if(!empty( $promo_one_title )){ ?><h3><?php echo esc_attr( $promo_one_title ); ?></h3><?php } ?>
                                          <?php if(!empty( $promo_one_desc )){ ?><p><?php echo esc_html( $promo_one_desc ); ?></p><?php } ?>
                                        </div>
                                      </div>
                                  </div>
                                </a>
                        </div>
                    <?php } ?>

                    <?php if( !empty( $promo_two_image ) ){ ?>
                        <div class="<?php if( $promo_layout == 'onetothree' || $promo_layout == 'twotoone' ){ ?>buzzcol4<?php }elseif ( $promo_layout == 'onetotwo'){ ?>buzzcol8<?php } ?>">
                            <div class="promo-bg-image-outer" >
                                <a href="<?php echo esc_url( $promo_two_button_link ); ?>" class="promo-banner-img">
                                  <div class="promo-banner-img-inner">
                                      <div class="promo-bg-image-inner" style="background-image:url(<?php echo esc_url( $promo_two_image ); ?>)">
                                      <img src="<?php echo esc_url( $promo_two_image ); ?>" alt=""/>
                                    </div>
                                    <div class="promo-img-info">
                                      <div class="promo-img-info-inner">
                                        <?php if(!empty( $promo_two_title )){ ?><h3><?php echo esc_attr( $promo_two_title ); ?></h3><?php } ?>
                                        <?php if(!empty( $promo_two_desc )){ ?><p><?php echo esc_html( $promo_two_desc ); ?></p><?php } ?>
                                      </div>
                                    </div>
                                  </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if( $promo_layout == 'onetothree' ){ if( !empty( $promo_three_image ) ){ ?>
                        <div class="buzzcol4">
                            <div class="promo-bg-image-outer" >
                                <a href="<?php echo esc_url( $promo_three_button_link ); ?>" class="promo-banner-img">
                                  <div class="promo-banner-img-inner">
                                      <div class="promo-bg-image-inner" style="background-image:url(<?php echo esc_url( $promo_three_image ); ?>)">
                                        <img src="<?php echo esc_url( $promo_three_image ); ?>" alt=""/>
                                      </div>
                                      <div class="promo-img-info">
                                        <div class="promo-img-info-inner">
                                          <?php if(!empty( $promo_three_title )){ ?><h3><?php echo esc_attr( $promo_three_title ); ?></h3><?php } ?>
                                          <?php if(!empty( $promo_three_desc )){ ?><p><?php echo esc_html( $promo_three_desc ); ?></p><?php } ?>
                                        </div>
                                      </div>
                                  </div>
                                </a>
                            </div>
                        </div>
                    <?php } } ?>
                </div>
            </div>
        </div >

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
