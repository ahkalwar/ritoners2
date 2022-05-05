<?php
/**
 * Adds buzzstorepro_product_list_widget widget.
*/
add_action('widgets_init', 'buzzstorepro_product_list_widget');
function buzzstorepro_product_list_widget() {
    register_widget('buzzstorepro_product_list_widget_area');
}

class buzzstorepro_product_list_widget_area extends WP_Widget {

    /**
     * Register widget with WordPress.
    */
    public function __construct() {
        parent::__construct(
            'buzzstorepro_product_list_widget_area', esc_html__('&nbsp;Buzz: Woo Products List (Pro)','buzzstore-pro'), array(
            'description' => esc_html__('A widget that shows WooCommerce products on list.', 'buzzstore-pro')
        ));
    }

    private function widget_fields() {

        $prod_type = array(
            'category'        => esc_html__('Category', 'buzzstore-pro'),
            'latest_product'  => esc_html__('Latest Product', 'buzzstore-pro'),
            'upsell_product'  => esc_html__('UpSell Product', 'buzzstore-pro'),
            'feature_product' => esc_html__('Feature Product', 'buzzstore-pro'),
            'on_sale'         => esc_html__('On Sale Product', 'buzzstore-pro'),
        );

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

            'buzzstorepro_product_list_padding_top' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_product_list_padding_top',
                'buzzstorepro_widgets_title' => esc_html__('Padding Top Default (40px)', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'number',
            ),

            'buzzstorepro_product_list_padding_buttom' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_product_list_padding_buttom',
                'buzzstorepro_widgets_title' => esc_html__('Padding Buttom Default (40px)', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'number',
            ),

            'buzzstorepro_product_list_title' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_product_list_title',
                'buzzstorepro_widgets_title' => esc_html__('Title', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'title',
            ),

            'buzzstorepro_product_list_short_desc' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_product_list_short_desc',
                'buzzstorepro_widgets_title' => esc_html__('product list Very Short Description', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'textarea',
                'buzzstorepro_widgets_row'    => 4,
            ),

            'buzzstorepro_product_list_type' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_product_list_type',
                'buzzstorepro_widgets_title' => esc_html__('Select Display Product Type', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'select',
                'buzzstorepro_widgets_field_options' => $prod_type
            ),

            'buzzstorepro_product_list_category' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_product_list_category',
                'buzzstorepro_mulicheckbox_title' => esc_html__('Select Product Category', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'multicheckboxes',
                'buzzstorepro_widgets_field_options' => $woocommerce_categories
            ),

            'buzzstorepro_product_list_number' => array(
                'buzzstorepro_widgets_name' => 'buzzstorepro_product_list_number',
                'buzzstorepro_widgets_title' => esc_html__('Enter Display Number of Products', 'buzzstore-pro'),
                'buzzstorepro_widgets_field_type' => 'number',
            ),

            'buzzstorepro_product_list_column' => array(
            'buzzstorepro_widgets_name' => 'buzzstorepro_product_list_column',
            'buzzstorepro_widgets_title' => esc_html__('Select Column Number', 'buzzstore-pro'),
            'buzzstorepro_widgets_field_type' => 'select',
            'buzzstorepro_widgets_field_options' => array(
                    'colthree' => esc_html__('Column Three','buzzstore-pro'),
                    'colfour'  => esc_html__('Column Four','buzzstore-pro'),
                    'colfive'  => esc_html__('Column Five','buzzstore-pro'),
                    'colsix'   => esc_html__('Column Six','buzzstore-pro'),
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
        $padding_top      = empty( $instance['buzzstorepro_product_list_padding_top'] ) ? 40 : $instance['buzzstorepro_product_list_padding_top'];
        $padding_buttom   = empty( $instance['buzzstorepro_product_list_padding_buttom'] ) ? 40 : $instance['buzzstorepro_product_list_padding_buttom'];
        $main_title       = empty( $instance['buzzstorepro_product_list_title'] ) ? '' : $instance['buzzstorepro_product_list_title'];
        $short_desc       = empty( $instance['buzzstorepro_product_list_short_desc'] ) ? '' : $instance['buzzstorepro_product_list_short_desc'];
        $product_type     = empty( $instance['buzzstorepro_product_list_type'] ) ? '' : $instance['buzzstorepro_product_list_type'];
        $product_category = empty( $instance['buzzstorepro_product_list_category'] ) ? '' : $instance['buzzstorepro_product_list_category'];
        $product_number   = empty( $instance['buzzstorepro_product_list_number'] ) ? '' : $instance['buzzstorepro_product_list_number'];
        $column_number    = empty( $instance['buzzstorepro_product_list_column'] ) ? '' : $instance['buzzstorepro_product_list_column'];

    if(!empty($product_category)){
        $categories_id = array();
        foreach ($product_category as $key => $value) {
            $categories_id[$key] = $key;
        }

        $product_args       =   '';
        global $product_label_custom;
        if($product_type == 'category'){
            $product_args = array(
                'post_type' => 'product',
                'tax_query' => array(
                    array('taxonomy'  => 'product_cat',
                        'field'       => 'term_id',
                        'terms'       => $categories_id
                    )
                ),
                'posts_per_page'      => $product_number
            );
        }
        elseif($product_type == 'latest_product'){
            $product_label_custom = esc_html__('New', 'buzzstore-pro');
            $product_args = array(
                'post_type' => 'product',
                'tax_query' => array(
                    array('taxonomy'  => 'product_cat',
                        'field'       => 'term_id',
                        'terms'       => $categories_id
                    )
                ),
                'posts_per_page' => $product_number
            );
        }

        elseif($product_type == 'upsell_product'){
            $product_args = array(
                'post_type'         => 'product',
                'posts_per_page'    => $product_number,
                'meta_key'          => 'total_sales',
                'orderby'           => 'meta_value_num'
            );
        }

        elseif($product_type == 'feature_product'){           
            $product_args = array(
                'post_type'        => 'product',  
                'tax_query' => array(
                      'relation' => 'AND',      
                  array(
                      'taxonomy' => 'product_visibility',
                      'field'    => 'name',
                      'terms'    => 'featured',
                      'operator' => 'IN'
                  ),
                  array(
                    'taxonomy'  => 'product_cat',
                    'field'     => 'term_id', 
                    'terms'     => $categories_id                                                                 
                  )
                ), 
                'posts_per_page'   => $product_number   
            );
        }

        elseif($product_type == 'on_sale'){
            $product_args = array(
            'post_type'      => 'product',
            'posts_per_page'   => $product_number,
            'meta_query'     => array(
                'relation' => 'OR',
                array( // Simple products type
                    'key'           => '_sale_price',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                ),
                array( // Variable products type
                    'key'           => '_min_variation_sale_price',
                    'value'         => 0,
                    'compare'       => '>',
                    'type'          => 'numeric'
                )
            ));
        }

        echo $before_widget;
    ?>

    	<div class="buzz-productlist-wrap <?php echo esc_attr( $column_number ); ?>" style="padding:<?php echo intval( $padding_top ); ?>px 0 <?php echo intval( $padding_buttom ); ?>px 0;">
            <div class="buzz-container buzz-clearfix">
                <div class="buzz-product-list-area">

                    <div class="buzz-titlewrap">
                        <?php if(!empty( $main_title )) { ?>
                            <h2 class="buzz-title wow zoomIn">
                                <?php echo esc_html( $main_title ); ?>
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

                    <ul class="buzz-product-list buzz-clearfix wow fadeInUp">
                        <?php
                            $query = new WP_Query( $product_args );
                            if( $query->have_posts() ) {  while($query->have_posts()) { $query->the_post();
                        ?>
                            <?php wc_get_template_part( 'content', 'product' ); ?>

                        <?php } } wp_reset_postdata(); ?>
                    </ul>

                </div>
            </div>
    	</div>

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
