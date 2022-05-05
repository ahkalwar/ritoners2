<?php
/**
 * Adds buzzstorepro_brandlogo_widget widget.
*/
add_action('widgets_init', 'buzzstorepro_brandlogo_widget');
function buzzstorepro_brandlogo_widget() {
  register_widget('buzzstorepro_brandlogo_widget_area');
}

class buzzstorepro_brandlogo_widget_area extends WP_Widget {

  /**
   * Register widget with WordPress.
  **/
  public function __construct() {
      parent::__construct(
          'buzzstorepro_brandlogo_widget_area', esc_html__('&nbsp;Buzz: Client/Brand Logo(Pro)','buzzstore-pro'), array(
          'description' => esc_html__('A widget that shows or promote you client/brand logo', 'buzzstore-pro')
      ));
  }

  private function widget_fields() {

      $fields = array(

          'buzzstorepro_cat_bg_image' => array(
              'buzzstorepro_widgets_name' => 'buzzstorepro_cat_bg_image',
              'buzzstorepro_widgets_title' => esc_html__(' Full Background Image', 'buzzstore-pro'),
              'buzzstorepro_widgets_field_type' => 'upload',
          ),
          'buzzstorepro_brandlogo_layout' => array(
              'buzzstorepro_widgets_name' => 'buzzstorepro_brandlogo_layout',
              'buzzstorepro_widgets_title' => esc_html__('Select Display Layout', 'buzzstore-pro'),
              'buzzstorepro_widgets_field_type' => 'select',
              'buzzstorepro_widgets_field_options' => array(
                      'brandlogoslide'   => esc_html__('Logo Slide Layout', 'buzzstore-pro'),
                      'brandlogolist'   => esc_html__('Logo List Layout', 'buzzstore-pro'),
                  )
          ),

          'buzzstorepro_brandlogo_title' => array(
              'buzzstorepro_widgets_name' => 'buzzstorepro_brandlogo_title',
              'buzzstorepro_widgets_title' => esc_html__('Title', 'buzzstore-pro'),
              'buzzstorepro_widgets_field_type' => 'title',
          ),

          'buzzstorepro_brandlogo_short_desc' => array(
              'buzzstorepro_widgets_name' => 'buzzstorepro_brandlogo_short_desc',
              'buzzstorepro_widgets_title' => esc_html__('Very Short Description', 'buzzstore-pro'),
              'buzzstorepro_widgets_field_type' => 'textarea',
              'buzzstorepro_widgets_row'  => 4
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
      $brandlogobgimage = empty( $instance['buzzstorepro_cat_bg_image'] ) ? '' : $instance['buzzstorepro_cat_bg_image'];
      $title            = empty( $instance['buzzstorepro_brandlogo_title'] ) ? '' : $instance['buzzstorepro_brandlogo_title'];
      $short_desc       = empty( $instance['buzzstorepro_brandlogo_short_desc'] ) ? '' : $instance['buzzstorepro_brandlogo_short_desc'];
      $logo_layout      = empty( $instance['buzzstorepro_brandlogo_layout'] ) ? 'brandlogoslide' : $instance['buzzstorepro_brandlogo_layout'];

      echo $before_widget;
  ?>

      <section <?php if(!empty( $brandlogobgimage )){ ?>class="brand-logo brand-logo-with-image" style="background-image:url(<?php echo esc_url($brandlogobgimage ); ?>); background-size: cover; background-attachment:fixed;"<?php  }else{ echo 'class="brand-logo noimage"'; } ?>">
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

            <div class="brandlogo <?php if($logo_layout == 'brandlogoslide'){ echo 'enable-owl-carousel'; }else{  echo 'brandlogolist'; } ?> owl-product-slider wow fadeInUp" data-wow-delay="0.7s" data-navigation="true" data-pagination="false" data-single-item="false" data-auto-play="false" data-transition-style="false" data-main-text-animation="false" data-min600="2" data-min800="3" data-min1200="5">
                <?php
                    $all_brands_logo = get_theme_mod('buzzstorepro_brand_logo_options');
                    if(!empty( $all_brands_logo )) {
                    $brands_logo = json_decode( $all_brands_logo );
                    foreach($brands_logo as $logo){
                ?>
                    <div class="item">
                        <a href="<?php echo esc_url( $logo->brand_logo_url ); ?>">
                          <img src="<?php echo esc_url( $logo->brand_logo ); ?>" alt="Image">
                        </a>
                    </div>
                <?php } } ?>
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
