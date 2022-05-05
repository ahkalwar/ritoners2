<?php

if ( buzzstorepro_is_woocommerce_activated() ) {

    /**
     * Adds buzzstorepro_category_product_widget widget.
    */
    add_action('widgets_init', 'buzzstorepro_category_product_widget');
    function buzzstorepro_category_product_widget() {
      register_widget('buzzstorepro_category_product_widget_area');
    }

    class buzzstorepro_category_product_widget_area extends WP_Widget {

      /**
       * Register widget with WordPress.
      */
      public function __construct() {
          parent::__construct(
              'buzzstorepro_category_product_widget_area', esc_html__('&nbsp;Buzz: Woo Category Product Area','buzzstore-pro'), array(
              'description' => esc_html__('A widget that shows woocommerce related category products.', 'buzzstore-pro')
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
              
              'buzzstorepro_product_cat_padding_top' => array(
                  'buzzstorepro_widgets_name' => 'buzzstorepro_product_cat_padding_top',
                  'buzzstorepro_widgets_title' => esc_html__('Padding Top Default (40px)', 'buzzstore-pro'),
                  'buzzstorepro_widgets_field_type' => 'number',
              ),

              'buzzstorepro_product_cat_padding_buttom' => array(
                  'buzzstorepro_widgets_name' => 'buzzstorepro_product_cat_padding_buttom',
                  'buzzstorepro_widgets_title' => esc_html__('Padding Buttom Default (40px)', 'buzzstore-pro'),
                  'buzzstorepro_widgets_field_type' => 'number',
              ),

              'buzzstorepro_product_title' => array(
                  'buzzstorepro_widgets_name' => 'buzzstorepro_product_title',
                  'buzzstorepro_widgets_title' => esc_html__('Title', 'buzzstore-pro'),
                  'buzzstorepro_widgets_field_type' => 'title',
              ),

              'buzzstorepro_product_short_desc' => array(
                  'buzzstorepro_widgets_name' => 'buzzstorepro_product_short_desc',
                  'buzzstorepro_widgets_title' => esc_html__('Very Short Description', 'buzzstore-pro'),
                  'buzzstorepro_widgets_field_type' => 'textarea',
                  'buzzstorepro_widgets_row' => '3'
              ),

              'buzzstorepro_category_product_type' => array(
                  'buzzstorepro_widgets_name' => 'buzzstorepro_category_product_type',
                  'buzzstorepro_mulicheckbox_title' => esc_html__('Select Products Categorys', 'buzzstore-pro'),
                  'buzzstorepro_widgets_field_type' => 'multicheckboxes',
                  'buzzstorepro_widgets_field_options' => $woocommerce_categories
              ),
              
              'buzzstorepro_product_number' => array(
                  'buzzstorepro_widgets_name' => 'buzzstorepro_product_number',
                  'buzzstorepro_widgets_title' => esc_html__('Enter Number of Products Show', 'buzzstore-pro'),
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
          $padding_top    = empty( $instance['buzzstorepro_product_cat_padding_top'] ) ? 40 : $instance['buzzstorepro_product_cat_padding_top'];
          $padding_buttom = empty( $instance['buzzstorepro_product_cat_padding_buttom'] ) ? 40 : $instance['buzzstorepro_product_cat_padding_buttom'];
          $title          = empty( $instance['buzzstorepro_product_title'] ) ? '' : $instance['buzzstorepro_product_title']; 
          $shot_desc      = empty( $instance['buzzstorepro_product_short_desc'] ) ? '' : $instance['buzzstorepro_product_short_desc'];
          $categories     = empty( $instance['buzzstorepro_category_product_type'] ) ? '' : $instance['buzzstorepro_category_product_type'];
          $product_number = intval( empty( $instance['buzzstorepro_product_number'] ) ? '' : $instance['buzzstorepro_product_number'] );

          $product_args       =   '';
          global $product_label_custom;
         
          echo $before_widget; 
      ?>      
        <div id="collection" class="buzzSeparator" style="padding:<?php echo intval( $padding_top ); ?>px 0 <?php echo intval( $padding_buttom ); ?>px 0;">            
          <div class="buzz-container buzz-clearfix relative">                
              
              <div class="buzz-titlewrap">
                <?php if(!empty( $title )) { ?>
                    <h2 class="buzz-title wow zoomIn">
                        <?php echo esc_html($title); ?>
                    </h2>
                <?php }  if(!empty( $shot_desc )) { ?>
                    <p class="buzz-subTitle wow zoomIn">
                        <?php echo esc_html($shot_desc); ?>
                    </p>
                <?php } ?>
              </div>

              <div class="starSeparatorBox"> 

                  <div class="starSeparator">
                      <span class="icon-star" aria-hidden="true"></span>
                  </div>

                  <?php
                    if (!empty($categories) && !is_wp_error($categories)) {

                        echo "<ul id='filter' class='product-filter'>";
                            echo '<li><a href="#" class="btn current" data-filter="*">' . esc_html__('All', 'buzzstore-pro') . '</a></li>';
                            foreach ($categories as $key => $category) { 
                                $term = get_term_by( 'id', $key, 'product_cat');
                                echo '<li><a href="#" class="btn" data-filter=.' . esc_attr( $term->slug ) . '>' . esc_attr( $term->name ) . '</a></li>';
                            }
                        echo "</ul>";
                    }
                  ?>
                  <div class="isotope-frame wow fadeInUp" data-wow-delay="0.3s">
                      <div class="isotope-filter">
                          <?php                                      
                              foreach ($categories as $term_key => $term_list) {                                      
                                $term = get_term_by( 'id', $term_key, 'product_cat');
                                $term_id = $term->term_id;                                    
                                $product_args = array(
                                    'post_type' => 'product',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy'  => 'product_cat',
                                            'field'     => 'id', 
                                            'terms'     => $term_id                                                                 
                                        )),
                                    'posts_per_page' => $product_number
                                );
                                $query = new WP_Query($product_args);
                                if($query->have_posts()) { while($query->have_posts()) { $query->the_post();

                                $buzzterms = wp_get_post_terms(get_the_ID(),'product_cat', array("fields" => "all"));
                                $term_slugs = array();
                                foreach ($buzzterms as $buzzterm) {
                                    $term_slugs[] = $buzzterm->slug;
                                }
                                $term_slugs = join(' ', $term_slugs);
                          ?>
                          
                          <div class="isotope-item <?php echo esc_html( $term_slugs ); ?>">
                              
                              <?php wc_get_template_part( 'content', 'product' ); ?>

                          </div>

                          <?php } }  } wp_reset_postdata(); ?>

                      </div>
                  </div>

              </div>
          </div>
        </div>         

      <?php  echo $after_widget;    }
     
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

    /**
     * Adds buzzstorepro_product_widget widget.
    */
    add_action('widgets_init', 'buzzstorepro_product_widget');
    function buzzstorepro_product_widget() {
      register_widget('buzzstorepro_product_widget_area');
    }

    class buzzstorepro_product_widget_area extends WP_Widget {

      /**
       * Register widget with WordPress.
      **/
      public function __construct() {
          parent::__construct(
              'buzzstorepro_product_widget_area', esc_html__('&nbsp;Buzz: Woo Product Area','buzzstore-pro'), array(
              'description' => esc_html__('A widget that shows woocommerce all type product (Latest, Feature, On Sale, Up Sale) and selected category products', 'buzzstore-pro')
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
            $woocommerce_categories[''] = esc_html__('Select Product Category','buzzstore-pro');
            foreach ($woocommerce_categories_obj as $category) {
              $woocommerce_categories[$category->term_id] = $category->name;
            }

          $fields = array( 
              
              'buzzstorepro_product_padding_top' => array(
                  'buzzstorepro_widgets_name' => 'buzzstorepro_product_padding_top',
                  'buzzstorepro_widgets_title' => esc_html__('Padding Top Default (40px) ', 'buzzstore-pro'),
                  'buzzstorepro_widgets_field_type' => 'number',
              ),

              'buzzstorepro_product_padding_buttom' => array(
                  'buzzstorepro_widgets_name' => 'buzzstorepro_product_padding_buttom',
                  'buzzstorepro_widgets_title' => esc_html__('Padding Buttom Default (40px)', 'buzzstore-pro'),
                  'buzzstorepro_widgets_field_type' => 'number',
              ),

              'buzzstorepro_product_title' => array(
                  'buzzstorepro_widgets_name' => 'buzzstorepro_product_title',
                  'buzzstorepro_widgets_title' => esc_html__('Title', 'buzzstore-pro'),
                  'buzzstorepro_widgets_field_type' => 'title',
              ),

              'buzzstorepro_product_short_desc' => array(
                  'buzzstorepro_widgets_name' => 'buzzstorepro_product_short_desc',
                  'buzzstorepro_widgets_title' => esc_html__('Very Short Description', 'buzzstore-pro'),
                  'buzzstorepro_widgets_field_type' => 'textarea',
                  'buzzstorepro_widgets_row' => '3'
              ),

              'buzzstorepro_product_type' => array(
                  'buzzstorepro_widgets_name' => 'buzzstorepro_product_type',
                  'buzzstorepro_widgets_title' => esc_html__('Select Product Type', 'buzzstore-pro'),
                  'buzzstorepro_widgets_field_type' => 'select',
                  'buzzstorepro_widgets_field_options' => $prod_type
              ),

              'buzzstorepro_woo_category' => array(
                  'buzzstorepro_widgets_name' => 'buzzstorepro_woo_category',
                  'buzzstorepro_widgets_title' => esc_html__('Select Category', 'buzzstore-pro'),
                  'buzzstorepro_widgets_field_type' => 'select',
                  'buzzstorepro_widgets_field_options' => $woocommerce_categories
              ),

              'buzzstorepro_product_number' => array(
                  'buzzstorepro_widgets_name' => 'buzzstorepro_product_number',
                  'buzzstorepro_widgets_title' => esc_html__('Enter Number of Products Show', 'buzzstore-pro'),
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
          $padding_top      = empty( $instance['buzzstorepro_product_padding_top'] ) ? 40 : $instance['buzzstorepro_product_padding_top'];
          $padding_buttom   = empty( $instance['buzzstorepro_product_padding_buttom'] ) ? 40 : $instance['buzzstorepro_product_padding_buttom'];
          $title            = empty( $instance['buzzstorepro_product_title'] ) ? '' : $instance['buzzstorepro_product_title']; 
          $shot_desc        = empty( $instance['buzzstorepro_product_short_desc'] ) ? '' : $instance['buzzstorepro_product_short_desc'];
          $product_type     = empty( $instance['buzzstorepro_product_type'] ) ? '' : $instance['buzzstorepro_product_type'];
          $product_category = intval( empty( $instance['buzzstorepro_woo_category'] ) ? '' : $instance['buzzstorepro_woo_category'] );
          $product_number   = intval( empty( $instance['buzzstorepro_product_number'] ) ? '' : $instance['buzzstorepro_product_number'] );

          $product_args       =   '';
          global $product_label_custom;
          
          if($product_type == 'category'){
              $product_args = array(
                  'post_type' => 'product',
                  'tax_query' => array(
                      array('taxonomy'  => 'product_cat',
                       'field'     => 'id', 
                       'terms'     => $product_category                                                                 
                      )
                  ),
                  'posts_per_page' => $product_number
              );
          }
          elseif($product_type == 'latest_product'){
              $product_label_custom = esc_html__('New', 'buzzstore-pro');
              $product_args = array(
                  'post_type' => 'product',
                  'tax_query' => array(
                      array('taxonomy'  => 'product_cat',
                       'field'     => 'id', 
                       'terms'     => $product_category                                                                 
                      )
                  ),
                  'posts_per_page' => $product_number
              );
          }
          elseif($product_type == 'upsell_product'){
              $product_args = array(
                  'post_type'         => 'product',
                  'meta_key'          => 'total_sales',
                  'orderby'           => 'meta_value_num',
                  'posts_per_page'    => $product_number
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
                      'terms'     => $product_category                                                                 
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
      <div id="slider" class="slider-container" style="padding:<?php echo intval( $padding_top ); ?>px 0 <?php echo intval( $padding_buttom ); ?>px 0;">            
        <div class="buzz-container buzz-clearfix relative">                    
              
          <div class="buzz-titlewrap">
            <?php if(!empty( $title )) { ?>
                <h2 class="buzz-title wow zoomIn" data-wow-delay="0.3s">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php }  if(!empty( $shot_desc )) { ?>
                <p class="buzz-subTitle wow zoomIn" data-wow-delay="0.3s">
                    <?php echo esc_html($shot_desc); ?>
                </p>
            <?php } ?>
          </div>

          <div class="starSeparatorBox">                
            
            <div class="starSeparator wow zoomIn" data-wow-delay="0.3s">
              <span aria-hidden="true" class="icon-star"></span>
            </div>

            <div id="owl-product-slider" class="enable-owl-carousel owl-product-slider wow fadeInUp" data-wow-delay="0.7s" data-navigation="true" data-pagination="false" data-single-item="false" data-auto-play="false" data-transition-style="false" data-main-text-animation="false" data-min600="2" data-min800="3" data-min1200="4">
                <?php                         
                  $query = new WP_Query($product_args);
                  if($query->have_posts()) { while($query->have_posts()) { $query->the_post();
                ?>
                  <?php wc_get_template_part( 'content', 'product' ); ?>
                  
                <?php } } wp_reset_postdata(); ?>
            </div>
          </div>
        </div>
      </div>

      <?php  echo $after_widget; }
     
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


    /**
     * Adds buzzstorepro_cat_widget widget.
    */
    add_action('widgets_init', 'buzzstorepro_cat_widget');
    function buzzstorepro_cat_widget() {
        register_widget('buzzstorepro_cat_widget_area');
    }
    
    class buzzstorepro_cat_widget_area extends WP_Widget {
    
        /**
         * Register widget with WordPress.
        */
        public function __construct() {
            parent::__construct(
                'buzzstorepro_cat_widget_area', esc_html__('&nbsp;Buzz: Woo Category Collection','buzzstore-pro'), array(
                'description' => esc_html__('A widget that shows woocommerce category', 'buzzstore-pro')
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
                
                'buzzstorepro_cat_padding_top' => array(
                    'buzzstorepro_widgets_name' => 'buzzstorepro_cat_padding_top',
                    'buzzstorepro_widgets_title' => esc_html__('Padding Top Default (40px)', 'buzzstore-pro'),
                    'buzzstorepro_widgets_field_type' => 'number',
                ),

                'buzzstorepro_cat_padding_buttom' => array(
                    'buzzstorepro_widgets_name' => 'buzzstorepro_cat_padding_buttom',
                    'buzzstorepro_widgets_title' => esc_html__('Padding Buttom Default (40px)', 'buzzstore-pro'),
                    'buzzstorepro_widgets_field_type' => 'number',
                ),

                'buzzstorepro_main_cat_title' => array(
                    'buzzstorepro_widgets_name' => 'buzzstorepro_main_cat_title',
                    'buzzstorepro_widgets_title' => esc_html__('Title', 'buzzstore-pro'),
                    'buzzstorepro_widgets_field_type' => 'title',
                ),

                'buzzstorepro_cat_short_desc' => array(
                    'buzzstorepro_widgets_name' => 'buzzstorepro_cat_short_desc',
                    'buzzstorepro_widgets_title' => esc_html__('Very Short Description', 'buzzstore-pro'),
                    'buzzstorepro_widgets_field_type' => 'textarea',
                    'buzzstorepro_widgets_row' => '3'
                ),
                
                'buzzstorepro_select_category' => array(
                    'buzzstorepro_widgets_name' => 'buzzstorepro_select_category',
                    'buzzstorepro_mulicheckbox_title' => esc_html__('Select Category', 'buzzstore-pro'),
                    'buzzstorepro_widgets_field_type' => 'multicheckboxes',
                    'buzzstorepro_widgets_field_options' => $woocommerce_categories
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
            $padding_top       = empty( $instance['buzzstorepro_cat_padding_top'] ) ? 40 : $instance['buzzstorepro_cat_padding_top'];
            $padding_buttom    = empty( $instance['buzzstorepro_cat_padding_buttom'] ) ? 40 : $instance['buzzstorepro_cat_padding_buttom']; 
            $title             = empty( $instance['buzzstorepro_main_cat_title'] ) ? '' : $instance['buzzstorepro_main_cat_title']; 
            $shot_desc         = empty( $instance['buzzstorepro_cat_short_desc'] ) ? '' : $instance['buzzstorepro_cat_short_desc'];
            $buzz_store_cat_id = empty( $instance['buzzstorepro_select_category'] ) ? '' : $instance['buzzstorepro_select_category'];
           
            echo $before_widget; 
        ?>
        <div id="slider" class="slider-container" style="padding:<?php echo intval( $padding_top ); ?>px 0 <?php echo intval( $padding_buttom ); ?>px 0;">
          <div class="buzz-container buzz-clearfix relative">                    
              
            <div class="buzz-titlewrap">
              <?php if(!empty( $title )) { ?>
                  <h2 class="buzz-title wow zoomIn" data-wow-delay="0.3s">
                      <?php echo esc_html($title); ?>
                  </h2>
              <?php }  if(!empty( $shot_desc )) { ?>
                  <p class="buzz-subTitle wow zoomIn" data-wow-delay="0.3s">
                      <?php echo esc_html($shot_desc); ?>
                  </p>
              <?php } ?>
            </div>
            
            <div class="starSeparatorBox">                  
              <div class="starSeparator wow zoomIn" data-wow-delay="0.3s">
                <span aria-hidden="true" class="icon-star"></span>
              </div>
              
              <div id="owl-product-slider" class="enable-owl-carousel owl-product-slider wow fadeInUp" data-wow-delay="0.7s" data-navigation="true" data-pagination="false" data-single-item="false" data-auto-play="false" data-transition-style="false" data-main-text-animation="false" data-min600="2" data-min800="3" data-min1200="4">
                <?php
                    $count = 0; 
                      if(!empty($buzz_store_cat_id)){                            
                        foreach ($buzz_store_cat_id as $key => $store_cat_id) {          
                            $thumbnail_id = get_term_meta( $key, 'thumbnail_id', true );
                            $images = wp_get_attachment_url( $thumbnail_id );
                            $image = wp_get_attachment_image_src($thumbnail_id, 'buzzstorepro-cat-image', true);
                            $term = get_term_by( 'id', $key, 'product_cat');
                        if ( $term && ! is_wp_error( $term ) ) {
                            $term_link = get_term_link($term);
                            $term_name = $term->name;
                        if ( $term->count > 0 ) 
                            $sub_count =  apply_filters( 'woocommerce_subcategory_count_html', ' ' . $term->count . ' '.esc_html__('Products','buzzstore-pro').'', $term);
                        }else{
                            $term_link = '#';
                            $term_name = esc_html__('Category','buzzstore-pro');
                            $sub_count = '0 '.esc_html__('Product','buzzstore-pro');
                        }
                      $no_img = esc_url('https://via.placeholder.com/275x370');
                ?>
                <div class="item">                      
                    <div class="product-item">                        
                        <a href="<?php echo esc_url( $term_link ); ?>">
                            <?php  
                                if ( $images ) {
                                    echo '<img class="buzz-categoryimage" src="' . esc_url( $image[0] ) . '" alt="" />';
                                } else{
                                    echo '<img class="buzz-categoryimage" src="' . esc_url( $no_img ) . '" alt="" />';
                                }
                            ?>                            
                            <ul class="buzz-categorycount transition">
                                <h3 class="buzz-categoryname"><?php echo esc_html($term_name); ?></h3>
                                <p class="buzz-productcount"><?php echo esc_attr( $sub_count );  ?></p>                    
                            </ul>
                        </a>
                    </div>
                </div>
                <?php } }  ?>                    
              </div>
            </div>
          </div>
        </div>

        <?php  echo $after_widget; }
       
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

}