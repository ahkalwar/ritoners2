<?php
/**
 * Adds buzzstorepro_specialdeal_product_slide_widget widget.
*/
add_action('widgets_init', 'buzzstorepro_specialdeal_product_slide_widget');
function buzzstorepro_specialdeal_product_slide_widget() {
    register_widget('buzzstorepro_specialdeal_product_slide_widget_area');
}
class buzzstorepro_specialdeal_product_slide_widget_area extends WP_Widget {

    /**
     * Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
            'buzzstorepro_specialdeal_product_slide_widget_area', esc_html__('&nbsp;Buzz : Woo Special OfferDeal(Pro)','buzzstore-pro'), array(
            'description' => esc_html__('A widget that shows the multiple special offer deal products.', 'buzzstore-pro')
        ));
    }

    private function widget_fields() {

        $taxonomy     = 'product_cat';
        $empty        = 1;
        $orderby      = 'name';
        $show_count   = 0;      // 1 for yes, 0 for no
        $pad_counts   = 0;      // 1 for yes, 0 for no
        $hierarchical = 1;      // 1 for yes, 0 for no
        $title        = '';
        $empty        = 0;
        $args = array(
            'taxonomy'     => $taxonomy,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty
        );

        $woocommerce_categories = array();
        $woocommerce_categories_obj = get_categories($args);
        foreach ($woocommerce_categories_obj as $category) {
            $woocommerce_categories[$category->term_id] = $category->name;
        }

        $fields = array(

            'buzzstorepro_special_padding_top' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_special_padding_top',
                'buzzstorepro_widgets_title' => esc_html__('Padding Top Default (40px)', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'number',
            ),

            'buzzstorepro_special_padding_buttom' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_special_padding_buttom',
                'buzzstorepro_widgets_title' => esc_html__('Padding Buttom Default (40px)', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'number',
            ),

            'buzzstorepro_offer_product_title' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_offer_product_title',
                'buzzstorepro_widgets_title' => esc_html__('Title', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'title',
            ),
            'buzzstorepro_offer_product_short_desc' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_offer_product_short_desc',
                'buzzstorepro_widgets_title' => esc_html__('Very Short Description', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'textarea',
                'buzzstorepro_widgets_row'    => 4,
            ),

            'buzzstorepro_offer_product_category' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_offer_product_category',
                'buzzstorepro_mulicheckbox_title' => esc_html__('Select Special Offer Category', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'multicheckboxes',
                'buzzstorepro_widgets_field_options' => $woocommerce_categories
            ),

            'buzzstorepro_offer_product_number' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_offer_product_number',
                'buzzstorepro_widgets_title' => esc_html__('Enter Display Number of Products', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'number',
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
        $padding_top      = empty( $instance['buzzstorepro_special_padding_top'] ) ? 40 : $instance['buzzstorepro_special_padding_top'];
        $padding_buttom   = empty( $instance['buzzstorepro_special_padding_buttom'] ) ? 40 : $instance['buzzstorepro_special_padding_buttom'];
        $title            = empty( $instance['buzzstorepro_offer_product_title'] ) ? '' : $instance['buzzstorepro_offer_product_title'];
        $short_desc       = empty( $instance['buzzstorepro_offer_product_short_desc'] ) ? '' : $instance['buzzstorepro_offer_product_short_desc'];
        $product_type     = empty( $instance['buzzstorepro_product_type'] ) ? '' : $instance['buzzstorepro_product_type'];
        $offer_category   = empty( $instance['buzzstorepro_offer_product_category'] ) ? '' : $instance['buzzstorepro_offer_product_category'];
        $product_number   = empty( $instance['buzzstorepro_offer_product_number'] ) ? 5 : $instance['buzzstorepro_offer_product_number'];
        
    if(!empty( $offer_category )){
        $categories_id = array();
        foreach ($offer_category as $key => $value) {
            $categories_id[$key] = $key;
        }

        $product_args = array(
            'post_type' => 'product',
            'tax_query' => array(
                array('taxonomy'  => 'product_cat',
                    'field'     => 'term_id',
                    'terms'     => $categories_id,
                )
            ),
            'meta_query'     => array(
                array(
                    'key'           => '_sale_price_dates_to',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                )
            ),
            'posts_per_page' => $product_number
        );

        echo $before_widget;
    ?>

        <div class="specialoffter-wrap" style="padding:<?php echo intval( $padding_top ); ?>px 0 <?php echo intval( $padding_buttom ); ?>px 0;">
            <div class="buzz-container buzz-clearfix">
                <div id="productslider" class="specialoffter-area">

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

                    <div class="specialoffter enable-owl-carousel owl-product-slider wow fadeInUp" data-wow-delay="0.7s" data-navigation="true" data-pagination="false" data-single-item="false" data-auto-play="false" data-transition-style="false" data-main-text-animation="false" data-min600="2" data-min800="3" data-min1200="4">
                        <?php
                            $query = new WP_Query( $product_args );
                            if( $query->have_posts() ) {  while( $query->have_posts() ) { $query->the_post();
                        ?>
                            <li <?php post_class(); ?>>
                                    <?php
                                        /**
                                         * woocommerce_before_shop_loop_item hook.
                                         *
                                         * @hooked woocommerce_template_loop_product_link_open - 10
                                         */
                                        do_action( 'woocommerce_before_shop_loop_item' );

                                        /**
                                         * woocommerce_before_shop_loop_item_title hook.
                                         *
                                         * @hooked woocommerce_show_product_loop_sale_flash - 10
                                         * @hooked woocommerce_template_loop_product_thumbnail - 10
                                         */
                                        do_action( 'woocommerce_before_shop_loop_item_title' );
                                    ?>
                                    <?php
                                          $product_id = get_the_ID();
                                          $sale_price_dates_to    = ( $date = get_post_meta( $product_id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y-m-d', $date ) : '';
                                          $price_sale = get_post_meta( $product_id, '_sale_price', true );
                                          $date = date_create($sale_price_dates_to);
                                          $new_date = date_format($date,"Y/m/d H:i");
                                      if(!empty( $sale_price_dates_to ) ) { if(!empty( $price_sale) ) {
                                    ?>
                                        <div class="pcountdown-cnt-list-slider">
                                          <ul class="buzz-clearfix fl-style1 fl-medium fl-countdown fl-countdown-pub countdown_<?php echo intval( $product_id ); ?>">
                                              <li><div class="time-days"><span class="days">00</span><span class="time"><?php esc_html_e('Days','buzzstore-pro'); ?></span></div></li>
                                              <li><div class="time-hours"><span class="hours">00</span><span class="time"><?php esc_html_e('Hours','buzzstore-pro'); ?></span></div></li>
                                              <li><div class="time-minutes"><span class="minutes">00</span><span class="time"><?php esc_html_e('Mins','buzzstore-pro'); ?></span></div></li>
                                              <li><div class="time-seconds"><span class="seconds">00</span><span class="time"><?php esc_html_e('Secs','buzzstore-pro'); ?></span></div></li>
                                          </ul>
                                        </div>
                                        <script type="text/javascript">
                                          jQuery(document).ready(function($) {
                                            jQuery(".countdown_<?php echo intval( $product_id ); ?>").countdown({
                                                date: "<?php echo esc_html( $new_date ); ?>",
                                                offset: -8,
                                                day: "Day",
                                                days: "Days"
                                            }, function () {
                                            //  alert("Done!");
                                            });
                                          });
                                        </script>
                                    <?php } } ?>
                                    <?php
                                        /**
                                         * woocommerce_shop_loop_item_title hook.
                                         *
                                         * @hooked woocommerce_template_loop_product_title - 10
                                         */
                                        do_action( 'woocommerce_shop_loop_item_title' );

                                        /**
                                         * woocommerce_after_shop_loop_item_title hook.
                                         *
                                         * @hooked woocommerce_template_loop_rating - 5
                                         * @hooked woocommerce_template_loop_price - 10
                                         */
                                        do_action( 'woocommerce_after_shop_loop_item_title' );

                                        /**
                                         * woocommerce_after_shop_loop_item hook.
                                         *
                                         * @hooked woocommerce_template_loop_product_link_close - 5
                                         * @hooked woocommerce_template_loop_add_to_cart - 10
                                         */
                                        do_action( 'woocommerce_after_shop_loop_item' );
                                    ?>
                                </li>

                        <?php } } wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div><!-- End Product Slider -->

    <?php }
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