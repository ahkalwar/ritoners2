<?php
/**
 * WooCommerce Section Start Here
*/
if ( ! function_exists( 'buzzstorepro_is_woocommerce_activated' ) ) {
    function buzzstorepro_is_woocommerce_activated() {
        if ( class_exists( 'WooCommerce' ) ) { return true; } else { return false; }
    }
}

/**
 * WooCommerce shop/product and single products breadcrumb funciton area
*/
if ( ! function_exists( 'buzzstorepro_breadcrumb_woocommerce' ) ) {
    function buzzstorepro_breadcrumb_woocommerce() {
        $breadcrumb_options  = esc_attr( get_theme_mod('buzzstorepro_woocommerce_enable_disable_section', 'enable') );
        $breadcrumb_bg_image = esc_url( get_theme_mod('buzzstorepro_breadcrumbs_woocommerce_background_image') );

        if($breadcrumb_bg_image){
            $breadcrumb_bg_image = $breadcrumb_bg_image;
        }else{
          $breadcrumb_bg_image = esc_url( get_template_directory_uri() ).'/assets/images/15.jpg';
        }

        if($breadcrumb_options == 'enable') { ?>
            <div class="breadcrumbswrap buzz-paralax" style="background:url('<?php echo esc_url( $breadcrumb_bg_image ); ?>') no-repeat center; background-size: cover; background-attachment:fixed;">
                <div class="buzz-overlay"></div>
                <div class="buzz-container wow zoomIn" data-wow-delay="0.3s">
                    <header class="entry-header">
                        <?php if( is_product() ) {
                              the_title( '<h2 class="entry-title">', '</h2>' );
                          }elseif( is_search() ){ ?>
                                <h2 class="entry-title"><?php printf( esc_html__( 'Search Results for : %1$s', 'buzzstore-pro' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                        <?php }else{ ?>
                            <h2 class="entry-title"><?php woocommerce_page_title(); ?></h2>
                        <?php  } ?>
                    </header><!-- .entry-header -->
                    <?php woocommerce_breadcrumb(); ?>
                </div>
            </div>
        <?php }
    }
}
add_action( 'breadcrumb-woocommerce', 'buzzstorepro_breadcrumb_woocommerce' );


/**
 * Buzzstore normal page breadcrumb function area
*/
if ( ! function_exists( 'buzzstorepro_breadcrumb_page' ) ) {
    function buzzstorepro_breadcrumb_page() {
        $breadcrumb_options_page = esc_attr( get_theme_mod('buzzstorepro_normal_page_enable_disable_section', 'enable') );
        $breadcrumb_page_image = esc_url( get_theme_mod('buzzstorepro_breadcrumbs_normal_page_background_image') );

        if($breadcrumb_page_image){
            $breadcrumb_page_image = $breadcrumb_page_image;
        }else{
          $breadcrumb_page_image = esc_url( get_template_directory_uri() ).'/assets/images/15.jpg';
        }

        if($breadcrumb_options_page == 'enable') { ?>
            <div class="breadcrumbswrap buzz-paralax" style="background:url('<?php echo esc_url( $breadcrumb_page_image ); ?>')">
                <div class="buzz-overlay"></div>
                <div class="buzz-container wow zoomIn" data-wow-delay="0.3s">
                    <header class="entry-header">
                        <?php if( is_archive() || is_category() ) {
                                the_archive_title( '<h2 class="entry-title">', '</h2>' );
                            }elseif( is_search() ){ ?>
                                <h2 class="entry-title"><?php printf( esc_html__( 'Search Results for : %s', 'buzzstore-pro' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                                <h2 class="page-title"><?php echo esc_html__('Nothing Found','buzzstore-pro'); ?></h2>
                            <?php }elseif( is_404() ){ ?>
                                <h2 class="entry-title"><?php echo esc_html__('404','buzzstore-pro'); ?></h2>
                            <?php }else{
                                the_title( '<h2 class="entry-title">', '</h2>' );
                            }
                        ?>
                    </header>
                    <?php buzzstorepro_breadcrumbs(); ?>
                </div>
            </div>
        <?php }
    }
}
add_action( 'buzzstorepro-breadcrumb-page', 'buzzstorepro_breadcrumb_page' );

/**
 * Buzzstore single post and archive breadcrumb function area
*/
if ( ! function_exists( 'buzzstorepro_breadcrumb_post' ) ) {
    function buzzstorepro_breadcrumb_post() {
        $breadcrumb_options_post = esc_attr( get_theme_mod('buzzstorepro_post_archive_page_enable_disable_section', 'enable') );
        $breadcrumb_post_image = esc_url( get_theme_mod('buzzstorepro_breadcrumbs_post_archive_background_image') );

        if($breadcrumb_post_image){
            $breadcrumb_post_image = $breadcrumb_post_image;
        }else{
          $breadcrumb_post_image = esc_url( get_template_directory_uri() ).'/assets/images/15.jpg';
        }

        if($breadcrumb_options_post == 'enable') { ?>
            <div class="breadcrumbswrap buzz-paralax" style="background:url('<?php echo esc_url( $breadcrumb_post_image ); ?>')">
                <div class="buzz-overlay"></div>
                <div class="buzz-container">
                    <header class="entry-header">
                        <?php if( is_single() ) {
                                the_title( '<h2 class="entry-title">', '</h2>' );
                            }else{
                                the_archive_title( '<h2 class="entry-title">', '</h2>' );
                            }
                        ?>
                    </header><!-- .entry-header -->
                    <?php buzzstorepro_breadcrumbs(); ?>
                </div>
            </div>
        <?php }
    }
}
add_action( 'buzzstorepro-breadcrumb-post', 'buzzstorepro_breadcrumb_post' );

/**
 * Comment Callback function
*/
if ( ! function_exists( 'buzzstorepro_comment' ) ) {
    function buzzstorepro_comment($comment, $args, $depth) { ?>
        <li <?php comment_class(); ?> id="buzz-li-comment-<?php comment_ID() ?>">
            <div class="buzz-comment-wrapper buzz-media" id="comment-<?php comment_ID(); ?>">
                <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" class="buzz-pull-left">
                  <?php echo get_avatar($comment, $size ='100' ); ?>
                </a>
                <?php if ($comment->comment_approved == '0') : ?>
                     <em><?php esc_html_e('Your comment is awaiting moderation.','buzzstore-pro') ?></em>
                <?php endif; ?>
                <div class="buzz-media-body">
                    <div>
                        <?php printf( '<h4 class="buzz-media-heading">%1$s</h4>', get_comment_author_link() ); ?>
                        <div class="buzz-prorow">
                            <div class="buzz-comment-left">
                                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                      <?php printf( '%1$s at %2$s' , esc_attr( get_comment_date() ),  esc_attr( get_comment_time() ) ); ?>
                    </a>
                    <?php comment_text() ?>
                </div>
            </div>
        </li>
        <?php
    }
}

/************************************************************
** Left Section Start                                      **
*************************************************************/

/**
 * Quick Contact Action Section
*/
if ( ! function_exists( 'buzzstorepro_quick_contact' ) ) {
	function buzzstorepro_quick_contact(){
          $buzzstorepro_map_address = esc_attr( get_theme_mod('buzzstorepro_quick_map_address') );
		  $buzzstorepro_quick_email = sanitize_email( get_theme_mod('buzzstorepro_quick_email') );
		  $buzzstorepro_quick_phone = esc_attr( get_theme_mod('buzzstorepro_quick_phone') );
        ?>
    		<ul>
                <?php if( !empty( $buzzstorepro_map_address ) ) { ?>
                    <li>
                        <span class="icon-location-pin"></span>
                        <a target="_blank" href="https://www.google.com.np/maps/place/<?php echo esc_attr( $buzzstorepro_map_address ); ?>"><?php echo esc_attr( $buzzstorepro_map_address ); ?></a>
                    </li>
                <?php } if( !empty( $buzzstorepro_quick_email ) ) { ?>
                    <li>
        				<span class="icon-envelope-open"></span>
        				<a href="mailto:'<?php echo esc_attr( antispambot( $buzzstorepro_quick_email ) ); ?>"><?php echo esc_attr( antispambot( $buzzstorepro_quick_email ) ); ?></a>
        			</li>
                <?php } if( !empty( $buzzstorepro_quick_phone ) ) { ?>
        			<li>
        				<span class="icon-call-out" aria-hidden="true"></span>
        				<a href="callto:'<?php echo esc_attr( $buzzstorepro_quick_phone ); ?>"><?php echo esc_attr( $buzzstorepro_quick_phone ); ?></a>
        			</li>
                <?php } ?>
    		</ul>
        <?php
	}
}


/**
 * Buzz Store Social Links Options
*/
if ( ! function_exists( 'buzzstorepro_social_links' ) ) {
    function buzzstorepro_social_links() { ?>
        <ul class="buzz-socila-link">
            <?php if ( esc_url( get_theme_mod('buzzstorepro_social_facebook') ) ) : ?>
                <li><a href="<?php echo esc_url( get_theme_mod( 'buzzstorepro_social_facebook' ) ); ?>" <?php if( esc_attr( get_theme_mod( 'buzzstorepro_social_facebook_checkbox', 0 ) ) == 1 ): echo "target=_blank"; endif;?>><span class="icon-social-facebook" aria-hidden="true"></span></a> </li>
            <?php endif;?>
            <?php if ( esc_url( get_theme_mod( 'buzzstorepro_social_twitter' ) ) ) : ?>
                <li><a href="<?php echo esc_url( get_theme_mod( 'buzzstorepro_social_twitter' ) ); ?>" <?php if( esc_attr( get_theme_mod( 'buzzstorepro_social_twitter_checkbox', 0 ) ) == 1): echo "target=_blank"; endif;?>><span class="icon-social-twitter" aria-hidden="true"></span></a> </li>
            <?php endif;?>

            <?php if ( esc_url( get_theme_mod( 'buzzstorepro_social_googleplus') ) ) : ?>
                <li><a href="<?php echo esc_url( get_theme_mod( 'buzzstorepro_social_googleplus' ) ); ?>" <?php if( esc_attr( get_theme_mod( 'buzzstorepro_social_googleplus_checkbox', 0 ) ) == 1): echo "target=_blank"; endif;?>><span class="icon-social-google" aria-hidden="true"></span></a> </li>
            <?php endif;?>

            <?php if ( esc_url( get_theme_mod( 'buzzstorepro_social_instagram' ) ) ) : ?>
                <li><a href="<?php echo esc_url( get_theme_mod( 'buzzstorepro_social_instagram' ) ) ;?>" <?php if( esc_attr( get_theme_mod( 'buzzstorepro_social_instagram_checkbox', 0 ) ) == 1): echo "target=_blank"; endif;?>><span class="icon-social-instagram" aria-hidden="true"></span></a> </li>
            <?php endif;?>

            <?php if ( esc_url( get_theme_mod( 'buzzstorepro_social_pinterest' ) ) ) : ?>
                <li><a href="<?php echo esc_url( get_theme_mod( 'buzzstorepro_social_pinterest' ) ); ?>" <?php if( esc_attr( get_theme_mod( 'buzzstorepro_social_pinterest_checkbox', 0 ) ) == 1): echo "target=_blank"; endif;?>><span class="icon-social-pinterest" aria-hidden="true"></span></a> </li>
            <?php endif;?>

            <?php if ( esc_url( get_theme_mod( 'buzzstorepro_social_youtube' ) ) ) : ?>
                <li><a href="<?php echo esc_url( get_theme_mod( 'buzzstorepro_social_youtube' ) ); ?>" <?php if( esc_attr( get_theme_mod( 'buzzstorepro_social_youtube_checkbox', 0 ) ) == 1): echo "target=_blank"; endif;?>><span class="icon-social-youtube" aria-hidden="true"></span></a> </li>
            <?php endif;?>
        </ul>
    <?php
    }
}

/************************************************************
** End Left Section ** Start Right Section                 **
*************************************************************/


/***************************************************
** Main Header Section                            **
***************************************************/

/**
 * Main logo section
*/
if ( ! function_exists( 'buzzstorepro_search_options' ) ){
    function buzzstorepro_search_options(){
        $buzz_search_options = intval( get_theme_mod( 'buzzstorepro_search_options', 1 ) );
        $buzzstorepro_search_type = esc_attr( get_theme_mod( 'buzzstorepro_search_type', 'no' ) );
        if(!empty($buzz_search_options) && $buzz_search_options == 1){
            if(!empty($buzzstorepro_search_type) && $buzzstorepro_search_type == 'no' ){
               if( buzzstorepro_is_woocommerce_activated() ) { buzzstorepro_adc_product_search_form(); }
            } else {
                get_product_search_form();
            }
        }
    }
}
add_action('buzzstorepro_search','buzzstorepro_search_options');



/**
 * Buzz Store Credit section
*/
if ( ! function_exists( 'buzzstorepro_credit' ) ) {
    function buzzstorepro_credit() { ?>
            <span class="footer_copyright wow fadeInLeft" data-wow-delay="0.3s">
                <?php $copyright = get_theme_mod( 'buzzstorepro_footer_buttom_copyright_setting' );
                if( !empty( $copyright ) ) { ?>
                    <?php echo apply_filters( 'buzzstorepro_copyright_text', $copyright ); ?>
                <?php } else { ?>
                    <?php echo esc_html( apply_filters( 'buzzstorepro_copyright_text', $content = '&copy; ' . date_i18n( 'Y' ) . ' - ' . get_bloginfo( 'name' ) ) ); ?>
                <?php if ( apply_filters( 'buzzstorepro_credit_link', true ) ) {
                    printf( __( '%1$s WordPress Theme : by %2$s', 'buzzstore-pro' ), ' ', '<span class="subfooter"><a href=" ' . esc_url('http://sparklewpthemes.com/') . ' "  target="_blank">Sparkle Themes</a></span' ); ?>
                <?php } } ?>
            </span><!-- .site-info -->
        <?php
    }
}
add_filter( 'buzzstorepro_credit', 'buzzstorepro_credit', 5 );


/**
 * Buzz Store payment logo section
*/
if ( ! function_exists( 'buzzstorepro_payment_logo' ) ) {

    function buzzstorepro_payment_logo() {
      $payment_logo_one   = esc_url( get_theme_mod('paymentlogo_image_one') );
      $payment_logo_two   = esc_url( get_theme_mod('paymentlogo_image_two') );
      $payment_logo_three = esc_url( get_theme_mod('paymentlogo_image_three') );
      $payment_logo_four  = esc_url( get_theme_mod('paymentlogo_image_four') );
      $payment_logo_five  = esc_url( get_theme_mod('paymentlogo_image_five') );
      $payment_logo_six   = esc_url( get_theme_mod('paymentlogo_image_six') );
    ?>
        <ul class="footer-payments wow fadeInRight" data-wow-delay="0.3s">
          <?php if(!empty($payment_logo_one)) { ?>
              <li><img src="<?php echo esc_url( $payment_logo_one ); ?>" /></li>
          <?php } ?>
          <?php if(!empty($payment_logo_two)) { ?>
              <li><img src="<?php echo esc_url( $payment_logo_two ); ?>" /></li>
          <?php } ?>
          <?php if(!empty($payment_logo_three)) { ?>
              <li><img src="<?php echo esc_url( $payment_logo_three ); ?>"  /></li>
          <?php } ?>
          <?php if(!empty($payment_logo_four)) { ?>
              <li><img src="<?php echo esc_url( $payment_logo_four ); ?>" /></li>
          <?php } ?>
          <?php if(!empty($payment_logo_five)) { ?>
              <li><img src="<?php echo esc_url( $payment_logo_five ); ?>" /></li>
          <?php } ?>
          <?php if(!empty($payment_logo_six)) { ?>
              <li><img src="<?php echo esc_url( $payment_logo_six ); ?>" /></li>
          <?php } ?>
        </ul>
    <?php
    }
}
add_filter( 'buzzstorepro_payment_logo', 'buzzstorepro_payment_logo', 10 );


/**
 * Custom Control for Customizer Page Layout Settings
*/
if( class_exists( 'WP_Customize_control') ) {

    class buzzstorepro_Image_Radio_Control extends WP_Customize_Control {
        public $type = 'radioimage';
        public function render_content() {
            $name = '_customize-radio-' . $this->id;
            ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <?php if($this->description){ ?>
                    <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                    </span>
            <?php } ?>
            <div id="input_<?php echo esc_attr( $this->id ); ?>" class="buzzimage">
                <?php foreach ( $this->choices as $value => $label ) : ?>
                        <label for="<?php echo esc_attr( $this->id ) . esc_attr($value); ?>">
                            <input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo $this->id . esc_attr($value); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
                            <img src="<?php echo esc_html( $label ); ?>"/>
                        </label>
                <?php endforeach; ?>
            </div>
            <?php
        }
    }

    class buzzstorepro_Category_Dropdown extends WP_Customize_Control{
        private $cats = false;
        public function __construct($manager, $id, $args = array(), $options = array()){
            $this->cats = get_categories($options);
            parent::__construct( $manager, $id, $args );
        }

        public function render_content(){
            if(!empty($this->cats)){
                ?>
                    <label>
                      <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
                      <select <?php $this->link(); ?>>
                        <?php
                            foreach ( $this->cats as $cat ){
                                printf('<option value="%1$s" %2$s>%3$s</option>', esc_attr($cat->term_id), selected($this->value(), $cat->term_id, false), esc_attr( $cat->name ));
                            }
                        ?>
                      </select>
                    </label>
                    <?php if($this->description){ ?>
                        <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                        </span>
                <?php }
            }
       }
    }

    class buzzstorepro_theme_Info_Text extends WP_Customize_Control{
        public function render_content(){  ?>
            <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
            </span>
            <?php if($this->description){ ?>
                <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php }
        }
    }

    /**
     * Pre Loader Custom Control Function Area
    */
    class Buzzstorepro_Preloader_Control extends WP_Customize_Control {
        public function render_content() {
            $preloaders = array( 'rhombu', 'default', 'coffee', 'grid', 'list', 'rhombus', 'setting', 'square', 'text' );
            if ( empty( $preloaders ) )
            return;
        ?>
            <label>
                <?php if ( ! empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif;
                if ( ! empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo esc_attr( $this->description ); ?></span>
                <?php endif; ?>
                <div class="buzzstorepro-preloader-container">
                    <?php foreach($preloaders as $preloader) : ?>
                        <span class="buzzstorepro-preloader <?php if($preloader == $this->value()){ echo "active"; } ?>" preloader="<?php echo esc_attr( $preloader ); ?>">
                            <img src="<?php echo esc_url( get_template_directory_uri() ).'/assets/images/preloader/'.esc_attr( $preloader ).'.gif'; ?>" />
                        </span>
                    <?php endforeach; ?>
                </div>
                <input type="hidden" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
            </label>
        <?php
        }
    }

    /**
     * Repeater Fields in Customizer Custom Control Function Area
    */
    class Buzzstorepro_Repeater_Controler extends WP_Customize_Control {
      /**
       * The control type.
       *
       * @access public
       * @var string
      */
      public $type = 'repeater';

      public $buzzstorepro_box_label = '';

      public $buzzstorepro_box_add_control = '';

      private $cats = '';

      /**
       * The fields that each container row will contain.
       *
       * @access public
       * @var array
      */
      public $fields = array();

      /**
       * Repeater drag and drop controler
       *
       * @since  1.0.0
      */
      public function __construct( $manager, $id, $args = array(), $fields = array() ) {
        $this->fields = $fields;
        $this->buzzstorepro_box_label = $args['buzzstorepro_box_label'] ;
        $this->buzzstorepro_box_add_control = $args['buzzstorepro_box_add_control'];
        $this->cats = get_categories(array( 'hide_empty' => false ));
        parent::__construct( $manager, $id, $args );
      }

      public function render_content() {
        $values = json_decode($this->value());
        ?>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <?php if($this->description){ ?>
          <span class="description customize-control-description">
          <?php echo wp_kses_post($this->description); ?>
          </span>
        <?php } ?>

        <ul class="buzzstorepro-repeater-field-control-wrap">
          <?php $this->buzzstorepro_get_fields(); ?>
        </ul>
        <input type="hidden" <?php esc_attr( $this->link() ); ?> class="buzzstorepro-repeater-collector" value="<?php echo esc_attr( $this->value() ); ?>" />
        <button type="button" class="button buzzstorepro-add-control-field"><?php echo esc_html( $this->buzzstorepro_box_add_control ); ?></button>
        <?php
      }

      private function buzzstorepro_get_fields(){
        $fields = $this->fields;
        $values = json_decode($this->value());
        if(is_array($values)){
        foreach($values as $value){    ?>
          <li class="buzzstorepro-repeater-field-control">
            <h3 class="buzzstorepro-repeater-field-title accordion-section-title"><?php echo esc_html( $this->buzzstorepro_box_label ); ?></h3>
            <div class="buzzstorepro-repeater-fields">
              <?php
                foreach ($fields as $key => $field) {
                $class = isset($field['class']) ? $field['class'] : '';
              ?>
                <div class="buzzstorepro-fields buzzstorepro-type-<?php echo esc_attr( $field['type'] ).' '.esc_attr( $class ); ?>">
                  <?php
                    $label = isset($field['label']) ? $field['label'] : '';
                    $description = isset($field['description']) ? $field['description'] : '';
                    if($field['type'] != 'checkbox'){ ?>
                      <span class="customize-control-title"><?php echo esc_html( $label ); ?></span>
                      <span class="description customize-control-description"><?php echo esc_html( $description ); ?></span>
                  <?php }

                    $new_value = isset($value->$key) ? $value->$key : '';
                    $default = isset($field['default']) ? $field['default'] : '';

                    switch ($field['type']) {
                      case 'text':
                        echo '<input data-default="'.esc_attr($default).'" data-name="'.esc_attr($key).'" type="text" value="'.esc_attr($new_value).'"/>';
                        break;

                      case 'textarea':
                        echo '<textarea data-default="'.esc_attr($default).'"  data-name="'.esc_attr($key).'">'.esc_textarea($new_value).'</textarea>';
                        break;

                      case 'select':
                        $options = $field['options'];
                        echo '<select  data-default="'.esc_attr($default).'"  data-name="'.esc_attr($key).'">';
                              foreach ( $options as $option => $val )
                              {
                                  printf('<option value="%s" %s>%s</option>', esc_attr($option), selected($new_value, $option, false), esc_html($val));
                              }
                        echo '</select>';
                        break;

                        case 'upload':
                          $image = $image_class= "";
                          if($new_value){
                            $image = '<img src="'.esc_url($new_value).'" style="max-width:100%;"/>';
                            $image_class = ' hidden';
                          }
                          echo '<div class="buzzstorepro-fields-wrap">';
                          echo '<div class="attachment-media-view">';
                          echo '<div class="placeholder'.esc_attr( $image_class ).'">';
                          esc_html_e('No image selected', 'buzzstore-pro');
                          echo '</div>';
                          echo '<div class="thumbnail thumbnail-image">';
                          echo $image;
                          echo '</div>';
                          echo '<div class="actions clearfix">';
                          echo '<button type="button" class="button buzzstorepro-delete-button align-left">'.esc_html__('Remove', 'buzzstore-pro').'</button>';
                          echo '<button type="button" class="button buzzstorepro-upload-button alignright">'.esc_html__('Select Image', 'buzzstore-pro').'</button>';
                          echo '<input data-default="'.esc_attr($default).'" class="upload-id" data-name="'.esc_attr($key).'" type="hidden" value="'.esc_attr($new_value).'"/>';
                          echo '</div>';
                          echo '</div>';
                          echo '</div>';
                          break;

                      default:
                        break;
                    }
                  ?>
                </div>
              <?php } ?>
              <div class="clearfix buzzstorepro-repeater-footer">
                <div class="alignright">
                  <a class="buzzstorepro-repeater-field-remove" href="#remove"><?php esc_html_e('Delete', 'buzzstore-pro') ?></a> |
                  <a class="buzzstorepro-repeater-field-close" href="#close"><?php esc_html_e('Close', 'buzzstore-pro') ?></a>
                </div>
              </div>
            </div>
          </li>
        <?php }
        }
      }
    }

    /**
     * Service Header Custom Control Function Area
    */
    class Buzzstorepro_Customize_Heading extends WP_Customize_Control {
        public $type = 'heading';
        public function render_content() {
            if ( !empty( $this->label ) ) : ?>
                <h3 class="buzzstorepro-accordion-section-title"><?php echo esc_html( $this->label ); ?></h3>
            <?php endif;
            if($this->description){ ?>
                <span class="description customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php }
        }
    }

    /**
     * Service Font Aweshom Custom Control Function Area
    */
    class Buzzstorepro_Fontawesome_Icon_Chooser extends WP_Customize_Control{
        public $type = 'icon';
        public function render_content(){  ?>
                <label>
                    <span class="customize-control-title">
                    <?php echo esc_html( $this->label ); ?>
                    </span>

                    <?php if($this->description){ ?>
                    <span class="description customize-control-description">
                        <?php echo wp_kses_post( $this->description ); ?>
                    </span>
                    <?php } ?>

                    <div class="buzzstorepro-selected-icon">
                        <i class="fa <?php echo esc_attr( $this->value() ); ?>"></i>
                        <span><i class="fa fa-angle-down"></i></span>
                    </div>

                    <ul class="buzzstorepro-icon-list clearfix">
                        <?php
                            $buzzstorepro_font_awesome_icon_array = buzzstorepro_font_awesome_icon_array();
                            foreach ($buzzstorepro_font_awesome_icon_array as $buzzstorepro_font_awesome_icon) {
                                $icon_class = $this->value() == $buzzstorepro_font_awesome_icon ? 'icon-active' : '';
                                echo '<li class='.esc_attr( $icon_class ).'><i class="'.esc_attr( $buzzstorepro_font_awesome_icon ).'"></i></li>';
                            }
                        ?>
                    </ul>
                    <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
                </label>
            <?php
        }
    }

    /**
     * Demo Import
    */
    class Buzzstorepro_WP_Customize_Demo_Control extends WP_Customize_Control{
        public function render_content() { ?>
            <label>
                <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif; ?>
                <div class="">
                    <a href="#" id="demo_import"><?php esc_html_e('Import Demo','buzzstore-pro'); ?></a>
                    <div class=""></div>
                    <div class="import-message"><?php esc_html_e('Click on Import Demo button to import demo contents.','buzzstore-pro'); ?></div>
                </div>
            </label>
            <?php
        }
    }

}

/**
 * Remove Excerpt ... Function
*/
function buzzstorepro_excerpt($text) {
  return '...';
}
add_filter('excerpt_more', 'buzzstorepro_excerpt');

/**
 * Buzzstore breadcrumbs function area
*/
if (!function_exists('buzzstorepro_breadcrumbs')) {
  function buzzstorepro_breadcrumbs() {
    global $post;
      $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
      $delimiter = '/';
      $home = esc_html__('Home', 'buzzstore-pro'); // text for the 'Home' link
      $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
      $before = ''; // tag before the current crumb
      $after = ''; // tag after the current crumb
      $homeLink = esc_url( home_url() );

      if (is_home() || is_front_page()) {
        if ($showOnHome == 1)
          echo '<ul><li><a href="' . esc_url($homeLink) . '">' . esc_attr($home) . '</a></ul></li>';
      } else {
          echo '<ul><li><a href="' . esc_url($homeLink) . '">' . esc_attr($home) . '</a> ' . esc_attr($delimiter) . ' ';
        if (is_category()) {
          $thisCat = get_category( get_query_var('cat') , false);
          if ($thisCat->parent != 0)
            echo wp_kses_post( get_category_parents($thisCat->parent, TRUE, ' ' . esc_attr($delimiter) . ' ') );
          echo esc_html__('Archive by category','buzzstore-pro').' "' . single_cat_title('', false) . '" ';
        } elseif (is_search()) {
          echo esc_html__('Search results for','buzzstore-pro'). '"' . get_search_query() . '"';
        } elseif (is_day()) {
          echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_attr(get_the_time('Y')) . '</a> ' . esc_attr($delimiter) . ' ';
          echo '<a href="' . esc_url(get_month_link(get_the_time('Y')), esc_attr(get_the_time('m'))) . '">' . esc_attr(get_the_time('F')) . '</a> ' . esc_attr($delimiter) . ' ';
          echo esc_attr(get_the_time('d'));
        } elseif (is_month()) {
          echo '<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_attr(get_the_time('Y')) . '</a> ' . esc_attr($delimiter) . ' ';
          echo esc_attr(get_the_time('F'));
        } elseif (is_year()) {
          echo esc_attr(get_the_time('Y'));
        } elseif (is_single() && !is_attachment()) {

          if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . esc_url($homeLink) . '/' . esc_attr($slug['slug']) . '/">' . esc_attr($post_type->labels->singular_name) . '</a>';
            if ($showCurrent == 1)
              echo ' ' . esc_attr($delimiter) . ' ' . wp_kses_post($before) . esc_attr(get_the_title()) . wp_kses_post($after);
          } else {
            $cat = get_the_category();
            $cat = $cat[0];
            $cats = get_category_parents( $cat, TRUE, ' ' . esc_html( $delimiter) . ' ');
            if ($showCurrent == 0)
              $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
            echo wp_kses_post( $cats );
            if ($showCurrent == 1)
              echo esc_attr(get_the_title());
          }

        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
          $post_type = get_post_type_object(get_post_type());
          echo esc_attr($post_type->labels->singular_name);
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat    = get_the_category($parent->ID);
            if ( isset($cat) && !empty($cat)) {
                $cat    = $cat[0];
                echo wp_kses_post( get_category_parents( $cat, TRUE, ' ' . esc_html( $delimiter ) . ' ') );
                echo '<li><a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_attr( $parent->post_title ) . '</a></li>';
            }
            if ($showCurrent == 1)
                echo wp_kses_post($before) . esc_attr(get_the_title()) . wp_kses_post($after);
        } elseif (is_page() && !$post->post_parent) {
          if ($showCurrent == 1){
            echo esc_attr(get_the_title());
          }
        } elseif (is_page() && $post->post_parent) {
          $parent_id = $post->post_parent;
          $breadcrumbs = array();
          while ($parent_id) {
            if(!empty($parent_id)){
              $page = get_post($parent_id);
              $breadcrumbs[] = '<a href="' . esc_url( get_permalink($page->ID) ) . '">' . esc_attr(get_the_title($page->ID)) . '</a>';
              $parent_id = $page->post_parent;
            }
          }
          $breadcrumbs = array_reverse( $breadcrumbs );
          for ($i = 0; $i < esc_attr( count( $breadcrumbs ) ); $i++ ) {
            echo wp_kses_post( $breadcrumbs[$i] );
            if ($i != count( $breadcrumbs) - 1)
              echo ' ' . esc_attr( $delimiter ) . ' ';
          }
          if ($showCurrent == 1){
            echo ' ' . esc_attr($delimiter) . ' ' . wp_kses_post($before) . esc_attr(get_the_title()) . wp_kses_post($after);
          }
        } elseif (is_tag()) {
          echo esc_html__('Posts tagged','buzzstore-pro').' "' . single_tag_title('', false) . '"';
        } elseif (is_author()) {
          global $author;
          $userdata = get_userdata($author);
          echo esc_html__('Articles posted by ','buzzstore-pro'). esc_attr($userdata->display_name);
        } elseif (is_404()) {
          echo esc_html__('Error 404','buzzstore-pro');
        }

        if (get_query_var('paged')) {
          if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()){
            echo ' (';
            echo esc_html__('Page', 'buzzstore-pro') . ' ' . esc_attr(get_query_var('paged'));
          }
          if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()){
                echo ')';
        }
      }
      echo '</ul></li>';
    }
  }
}

/**
 * Schema type
*/
function buzzstorepro_html_tag_schema() {
    $schema     = 'http://schema.org/';
    $type       = 'WebPage';
    // Is single post
    if ( is_singular( 'post' ) ) {
        $type   = 'Article';
    }
    // Is author page
    elseif ( is_author() ) {
        $type   = 'ProfilePage';
    }
    // Is search results page
    elseif ( is_search() ) {
        $type   = 'SearchResultsPage';
    }
    echo 'itemscope="itemscope" itemtype="' . esc_attr( $schema ) . esc_attr( $type ) . '"';
}



/**
 * Page and Post Page Display Layout Metabox function
*/
add_action('add_meta_boxes', 'buzzstorepro_metabox_section');
if ( ! function_exists( 'buzzstorepro_metabox_section' ) ) {
    function buzzstorepro_metabox_section(){
        add_meta_box('buzzstorepro_display_layout',
            __( 'Display Layout Options', 'buzzstore-pro' ),
            'buzzstorepro_display_layout_callback',
            array('page','post'),
            'normal',
            'high'
        );
    }
}

$buzzstorepro_page_layouts =array(
    'leftsidebar' => array(
        'value'     => 'leftsidebar',
        'label'     => esc_html__( 'Left Sidebar', 'buzzstore-pro' ),
        'thumbnail' => esc_url( get_template_directory_uri() ) . '/assets/images/left-sidebar.png',
    ),
    'rightsidebar' => array(
        'value'     => 'rightsidebar',
        'label'     => esc_html__( 'Right (Default)', 'buzzstore-pro' ),
        'thumbnail' => esc_url( get_template_directory_uri() ) . '/assets/images/right-sidebar.png',
    ),
     'nosidebar' => array(
        'value'     => 'nosidebar',
        'label'     => esc_html__( 'Full width', 'buzzstore-pro' ),
        'thumbnail' => esc_url( get_template_directory_uri() ) . '/assets/images/no-sidebar.png',
    ),
    'bothsidebar' => array(
        'value'     => 'bothsidebar',
        'label'     => esc_html__( 'Both Sidebar', 'buzzstore-pro' ),
        'thumbnail' => esc_url( get_template_directory_uri() ) . '/assets/images/both-sidebar.png',
    )
);

/**
 * Function for Page layout meta box
*/
if ( ! function_exists( 'buzzstorepro_display_layout_callback' ) ) {
    function buzzstorepro_display_layout_callback(){
        global $post, $buzzstorepro_page_layouts;
        wp_nonce_field( basename( __FILE__ ), 'buzzstorepro_settings_nonce' ); ?>
        <table>
            <tr>
              <td>
                <?php
                  $i = 0;
                  foreach ($buzzstorepro_page_layouts as $field) {
                  $buzzstorepro_page_metalayouts = esc_attr( get_post_meta( $post->ID, 'buzzstorepro_page_layouts', true ) );
                ?>
                  <div class="radio-image-wrapper slidercat" id="slider-<?php echo intval( $i ); ?>" style="float:left; margin-right:30px;">
                    <label class="description">
                        <span>
                          <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" />
                        </span></br>
                        <input type="radio" name="buzzstorepro_page_layouts" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( esc_html( $field['value'] ),
                            $buzzstorepro_page_metalayouts ); if(empty($buzzstorepro_page_metalayouts) && esc_html( $field['value'] ) =='rightsidebar'){ echo "checked='checked'";  } ?>/>
                         <?php echo esc_html( $field['label'] ); ?>
                    </label>
                  </div>
                <?php  $i++; }  ?>
              </td>
            </tr>
        </table>
    <?php
    }
}

/**
 * Save the custom metabox data
*/
if ( ! function_exists( 'buzzstorepro_save_page_settings' ) ) {
    function buzzstorepro_save_page_settings( $post_id ) {
        global $buzzstorepro_page_layouts, $post;
         if ( !isset( $_POST[ 'buzzstorepro_settings_nonce' ] ) || !wp_verify_nonce( sanitize_key( $_POST[ 'buzzstorepro_settings_nonce' ] ) , basename( __FILE__ ) ) )
            return;
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
            return;
        if (isset( $_POST['post_type'] ) && 'page' == $_POST['post_type']) {
            if (!current_user_can( 'edit_page', $post_id ) )
                return $post_id;
        } elseif (!current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
        }

        foreach ($buzzstorepro_page_layouts as $field) {
            $old = esc_attr( get_post_meta( $post_id, 'buzzstorepro_page_layouts', true) );
            if ( isset( $_POST['buzzstorepro_page_layouts']) ) {
                $new = sanitize_text_field( wp_unslash( $_POST['buzzstorepro_page_layouts'] ) );
            }
            if ($new && $new != $old) {
                update_post_meta($post_id, 'buzzstorepro_page_layouts', $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id,'buzzstorepro_page_layouts', $old);
            }
         }
    }
}
add_action('save_post', 'buzzstorepro_save_page_settings');


/**
 *  Pro New Features Function Area
*/
/**
 * Preloader Frontend Section area
*/
if ( ! function_exists( 'buzzstorepro_dynamic_preloader' ) ) {
    function buzzstorepro_dynamic_preloader() {
        $preloader = esc_attr( get_theme_mod( 'buzzstorepro_preloader', 'default' ) );
        if( isset( $preloader ) && $preloader != '' ) { ?>
            <style type='text/css'>
                .no-js #loader {
                    display: none;
                }
                .js #loader {
                    display: block;
                    position: absolute;
                    left: 100px;
                    top: 0;
                }
                .buzzstorepro-preloader {
                    position: fixed;
                    left: 0px;
                    top: 0px;
                    width: 100%;
                    height: 100%;
                    z-index: 9999999;
                    background: url('<?php echo esc_url( get_template_directory_uri() )."/assets/images/preloader/".esc_attr( $preloader ).".gif"; ?>') center no-repeat #fff;
                }
            </style>
        <?php  }
    }
}
add_action( 'wp_head', 'buzzstorepro_dynamic_preloader');

/**
  * Convert hexdec color string to rgb(a) string
*/
if ( ! function_exists( 'buzzstorepro_hex2rgba' ) ) {
    function buzzstorepro_hex2rgba($color, $opacity = false) {
        $default = 'rgb(0,0,0)';
        if(empty($color))
          return $default;
        if ($color[0] == '#' ) {
            $color = substr( $color, 1 );
        }
        if (strlen($color) == 6) {
              $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
              $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
              return $default;
        }
        $rgb =  array_map('hexdec', $hex);
        if($opacity){
        if(abs($opacity) > 1)
            $opacity = 1.0;
            $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
            $output = 'rgb('.implode(",",$rgb).')';
        }
        return $output;
    }
}


/**
 * Add Some Editor Options
*/
if ( ! function_exists( 'buzzstorepro_enable_more_buttons' ) ) {
  function buzzstorepro_enable_more_buttons() {
    $buttons[] = 'fontselect';
    $buttons[] = 'fontsizeselect';
    $buttons[] = 'styleselect';
    $buttons[] = 'backcolor';
    $buttons[] = 'newdocument';
    $buttons[] = 'cut';
    $buttons[] = 'copy';
    $buttons[] = 'hr';
    $buttons[] = 'visualaid';
    return $buttons;
  }
}
add_filter("mce_buttons_3", "buzzstorepro_enable_more_buttons");

/**
 * Allow shortcodes in widgets
*/
add_filter('widget_text', 'do_shortcode');



/**
 * Main banner slider
*/
if ( ! function_exists( 'buzzstorepro_slider_section' ) ) {
    function buzzstorepro_slider_section() {
            $slider_cat_id = intval( get_theme_mod( 'buzzstorepro_slider_team_id', '0' ));
            if( !empty( $slider_cat_id ) ) {
        ?>
            <section id="main-slider">
                <div id="owl-main-slider" class="enable-owl-carousel owl-main-slider owl-carousel owl-theme" data-navigation="true" data-pagination="false" data-single-item="true" data-auto-play="7000" data-transition-style="fadeUp" data-main-text-animation="true" data-after-init-delay="4000" data-after-move-delay="500" data-stop-on-hover="true">
                    <?php
                        $slider_args = array(
                            'post_type' => 'post',
                            'tax_query' => array(
                                array(
                                    'taxonomy'  => 'category',
                                    'field'     => 'id',
                                    'terms'     => $slider_cat_id
                                )),
                            'posts_per_page' => 8
                        );

                        $slider_query = new WP_Query( $slider_args );
                        if( $slider_query->have_posts() ) { while( $slider_query->have_posts() ) { $slider_query->the_post();
                        $image_path = wp_get_attachment_image_src( get_post_thumbnail_id(), 'buzzstorepro-banner-image', true );
                        $i=0;
                    ?>
                    <div class="item slide<?php echo intval( $i ); ?>">
                        <div class="buzz-overlay"></div>
                        <img src="<?php echo esc_url( $image_path[0] ); ?>" alt="<?php the_title(); ?>">
                        <div class="main-slider_content">
                            <h3 class="main-slider_title main-slider_fadeInLeft animated">
                                <?php the_title(); ?>
                            </h3>
                            <div class="main-slider_row">
                                <div class="starSeparator main-slider_zoomIn animated">
                                    <span aria-hidden="true" class="icon-star"></span>
                                </div>
                            </div>
                            <span class="main-slider_desc main-slider_fadeInRight animated">
                                <?php the_content(); ?>
                            </span>
                        </div>
                    </div>
                    <?php $i++; } } wp_reset_postdata(); ?>
                </div>
            </section>

        <?php }
    }
}
add_action('buzzstorepro_slider','buzzstorepro_slider_section');

/**
 * Normal Main banner slider
*/
if ( ! function_exists( 'buzzstorepro_normal_slider' ) ) {
    function buzzstorepro_normal_slider() {
        $all_slider = wp_kses_post( get_theme_mod('buzzstorepro_banner_all_sliders') );
        if(!empty( $all_slider )) { ?>
            <div id="home" class="banner-height">
                <div class="buzzstorepro-slider">
                    <ul class="slides">
                        <?php
                            $banner_slider = json_decode( $all_slider );
                            foreach($banner_slider as $slider){
                                $slider_image = $slider->slider_image;
                                $slider_title = $slider->slider_title;
                                $slider_desc = $slider->slider_desc;
                        ?>
                          <li class="bg-dark" style="background-image: url('<?php echo esc_url($slider_image); ?>');">
                              <div class="home-slider-overlay"></div>
                              <div class="buzzstorepro-caption">
                                  <div class="caption-content">
                                      <div class="buzzstorepro-title"><?php echo esc_attr( $slider_title ); ?></div>
                                      <div class="buzzstorepro-desc"><?php echo wp_kses_post( wp_trim_words( $slider_desc, 20 ) ); ?></div>
                                      <?php if($slider->button_text): ?>
                                        <a class="buzzstorepro-button" href="<?php echo esc_url($slider->button_url); ?>">
                                          <?php echo esc_attr($slider->button_text); ?>
                                        </a>
                                      <?php endif; ?>
                                  </div>
                              </div>
                          </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php }
    }
}
add_action('buzzstorepro_normal_slider','buzzstorepro_normal_slider');


/**
 * Revolution Main Banner Slider Function Area
*/
if ( ! function_exists( 'buzzstorepro_revolution_slider' ) ) {
  function buzzstorepro_revolution_slider() { ?>
      <div class="revolutionwrap">
        <?php
          $revolution = get_theme_mod( 'buzzstorepro_slider_revolution' );
          echo do_shortcode( $revolution );
        ?>
      </div>
    <?php
  }
}
add_action( 'buzzstorepro_revolution', 'buzzstorepro_revolution_slider', 30 );

/**
 * Slider Promo Function Area
*/
if ( ! function_exists( 'buzzstorepro_promo_slider' ) ) {
  function buzzstorepro_promo_slider() { ?>
      <?php
            $promoone    = get_theme_mod( 'buzzstorepro_slider_promo_one' );
            $promooneurl = get_theme_mod( 'buzzstorepro_slider_promo_one_url' );
            if(!empty($promoone)){
        ?>
            <a href="<?php echo esc_attr( $promooneurl ); ?>" class="promoarea" target="_blank">
                <img src="<?php echo esc_url( $promoone ); ?>" />
                <div class="promoarea_img" style="background-image:url(<?php echo esc_url( $promoone ); ?>);"></div>
            </a>
        <?php } ?>
    <?php
  }
}
add_action( 'buzzstorepro_promo_slider', 'buzzstorepro_promo_slider', 30 );


/**
 * Above Header Services Function Area
*/
if ( ! function_exists( 'buzzstorepro_header_services_area' ) ) {
    function buzzstorepro_header_services_area() {
        $services_layout  = get_theme_mod( 'buzzstorepro_services_layout', 'layout-one' ); ?>
        <div class="buzzstorepro-services-main-bg">
            <div class="<?php if($services_layout == 'layout-one'){ echo 'buzz-container'; }else{ echo 'buzz-nocontainer'; } ?>">
                <div class="buzz-clearfix buzzstorepro-services-main <?php echo esc_attr( $services_layout ); ?>">
                    <?php
                        for( $i = 1; $i < 4; $i++ ){
                            $buzz_footer_services_icon  = get_theme_mod('buzzstorepro_services_icon'.$i);
                            $buzz_footer_services_title = get_theme_mod('buzzstorepro_services_title'.$i);
                            $buzz_footer_services_desc  = get_theme_mod('buzzstorepro_services_desc'.$i);
                            if( $buzz_footer_services_title || $buzz_footer_services_desc ){ ?>
                                <div class="buzzstorepro-services-wrap">
                                    <div class="service-area">
                                        <div class="mainservices">
                                            <div class="service-icon"><i class="<?php echo esc_attr( $buzz_footer_services_icon ); ?>"></i></div>
                                            <div class="service-icon-info">
                                                <div>
                                                    <h5><?php echo esc_attr( $buzz_footer_services_title ); ?></h5>
                                                    <p><?php echo esc_attr( $buzz_footer_services_desc ); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    <?php
    }
}
add_action( 'buzzstorepro_header_services','buzzstorepro_header_services_area' );


/**
 * Below Footer Services Function Area
*/
if ( ! function_exists( 'buzzstorepro_footer_services_area' ) ) {
    function buzzstorepro_footer_services_area() {
        $services_layout  = get_theme_mod( 'buzzstorepro_footer_services_layout', 'layout-one' ); ?>
        <div class="buzzstorepro-services-main-bg">
            <div class="<?php if($services_layout == 'layout-one'){ echo 'buzz-container'; }else{ echo 'buzz-nocontainer'; } ?>">
                <div class="buzz-clearfix buzzstorepro-services-main <?php echo esc_attr( $services_layout ); ?>">
                    <?php
                        for( $i = 1; $i < 4; $i++ ){
                            $buzz_footer_services_icon  = get_theme_mod('buzzstorepro_footer_services_icon'.$i);
                            $buzz_footer_services_title = get_theme_mod('buzzstorepro_footer_services_title'.$i);
                            $buzz_footer_services_desc  = get_theme_mod('buzzstorepro_footer_services_desc'.$i);
                            if( $buzz_footer_services_title || $buzz_footer_services_desc ){ ?>
                                <div class="buzzstorepro-services-wrap">
                                    <div class="service-area">
                                        <div class="mainservices">
                                            <div class="service-icon"><i class="<?php echo esc_attr( $buzz_footer_services_icon ); ?>"></i></div>
                                            <div class="service-icon-info">
                                                <div>
                                                    <h5><?php echo esc_attr( $buzz_footer_services_title ); ?></h5>
                                                    <p><?php echo esc_attr( $buzz_footer_services_desc ); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    <?php
    }
}
add_action( 'buzzstorepro_footer_services','buzzstorepro_footer_services_area' );


/**
 * Themes required Plugins Install Section
*/
if ( ! function_exists( 'buzzstorepro_root_register_required_plugins' ) ) {
  function buzzstorepro_root_register_required_plugins() {

      $plugins = array(
        
            array(
                'name' => 'WooCommerce',
                'slug' => 'woocommerce',
                'required' => false,
            ),
            array(
                'name' => 'YITH WooCommerce Quick View',
                'slug' => 'yith-woocommerce-quick-view',
                'required' => false,
            ),
            array(
                'name' => 'YITH WooCommerce Compare',
                'slug' => 'yith-woocommerce-compare',
                'required' => false,
            ),
            array(
                'name' => 'YITH WooCommerce Wishlist',
                'slug' => 'yith-woocommerce-wishlist',
                'required' => false,
            ),
            array(
                'name' => 'WooCommerce Grid / List toggle',
                'slug' => 'woocommerce-grid-list-toggle',
                'required' => false,
            ),
            array(
                'name' => 'Contact Form 7',
                'slug' => 'contact-form-7',
                'required' => false,
            ),
            array(
                'name' => 'Easy Google Fonts',
                'slug' => 'easy-google-fonts',
                'required' => false,
            )
      );

      $config = array(
          'id' => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
          'default_path' => '', // Default absolute path to pre-packaged plugins.
          'menu' => 'tgmpa-install-plugins', // Menu slug.
          'parent_slug' => 'themes.php', // Parent menu slug.
          'capability' => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
          'has_notices' => true, // Show admin notices or not.
          'dismissable' => true, // If false, a user cannot dismiss the nag message.
          'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
          'is_automatic' => true, // Automatically activate plugins after installation or not.
          'message' => '', // Message to output right before the plugins table.
          'strings' => array(
              'page_title' => __('Install Required Plugins', 'buzzstore-pro'),
              'menu_title' => __('Install Plugins', 'buzzstore-pro'),
              'installing' => __('Installing Plugin: %s', 'buzzstore-pro'), // %s = plugin name.
              'oops' => __('Something went wrong with the plugin API.', 'buzzstore-pro'),
              'notice_can_install_required' => _n_noop(
                      'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'buzzstore-pro'
              ), // %1$s = plugin name(s).
              'notice_can_install_recommended' => _n_noop(
                      'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'buzzstore-pro'
              ), // %1$s = plugin name(s).
              'notice_cannot_install' => _n_noop(
                      'Sorry, but you do not have the correct permissions to install the %1$s plugin.', 'Sorry, but you do not have the correct permissions to install the %1$s plugins.', 'buzzstore-pro'
              ), // %1$s = plugin name(s).
              'notice_ask_to_update' => _n_noop(
                      'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'buzzstore-pro'
              ), // %1$s = plugin name(s).
              'notice_ask_to_update_maybe' => _n_noop(
                      'There is an update available for: %1$s.', 'There are updates available for the following plugins: %1$s.', 'buzzstore-pro'
              ), // %1$s = plugin name(s).
              'notice_cannot_update' => _n_noop(
                      'Sorry, but you do not have the correct permissions to update the %1$s plugin.', 'Sorry, but you do not have the correct permissions to update the %1$s plugins.', 'buzzstore-pro'
              ), // %1$s = plugin name(s).
              'notice_can_activate_required' => _n_noop(
                      'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'buzzstore-pro'
              ), // %1$s = plugin name(s).
              'notice_can_activate_recommended' => _n_noop(
                      'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'buzzstore-pro'
              ), // %1$s = plugin name(s).
              'notice_cannot_activate' => _n_noop(
                      'Sorry, but you do not have the correct permissions to activate the %1$s plugin.', 'Sorry, but you do not have the correct permissions to activate the %1$s plugins.', 'buzzstore-pro'
              ), // %1$s = plugin name(s).
              'install_link' => _n_noop(
                      'Begin installing plugin', 'Begin installing plugins', 'buzzstore-pro'
              ),
              'update_link' => _n_noop(
                      'Begin updating plugin', 'Begin updating plugins', 'buzzstore-pro'
              ),
              'activate_link' => _n_noop(
                      'Begin activating plugin', 'Begin activating plugins', 'buzzstore-pro'
              ),
              'return' => __('Return to Required Plugins Installer', 'buzzstore-pro'),
              'plugin_activated' => __('Plugin activated successfully.', 'buzzstore-pro'),
              'activated_successfully' => __('The following plugin was activated successfully:', 'buzzstore-pro'),
              'plugin_already_active' => __('No action taken. Plugin %1$s was already active.', 'buzzstore-pro'), // %1$s = plugin name(s).
              'plugin_needs_higher_version' => __('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'buzzstore-pro'), // %1$s = plugin name(s).
              'complete' => __('All plugins installed and activated successfully. %1$s', 'buzzstore-pro'), // %s = dashboard link.
              'contact_admin' => __('Please contact the administrator of this site for help.', 'buzzstore-pro'),
              'nag_type' => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
          )
      );
      tgmpa($plugins, $config);
  }
}
add_action('tgmpa_register', 'buzzstorepro_root_register_required_plugins');
