<?php
/**
 * let's create the function for Our Team Member Custom Post Type
*/
function buzzstorepro_our_team_member() { 
	register_post_type( 'team', 		
		array( 'labels' => 
				array(
				'name' => esc_html__( 'Team Member', 'buzzstore-pro' ),
				'singular_name' => esc_html__( 'Our Team Member', 'buzzstore-pro' ), 
				'all_items' => esc_html__( 'All Team Member', 'buzzstore-pro' ), 
				'add_new' => esc_html__( 'Add New', 'buzzstore-pro' ), 
				'add_new_item' => esc_html__( 'Add New Team Member', 'buzzstore-pro' ), 
				'edit' => esc_html__( 'Edit Team Member', 'buzzstore-pro' ), 
				'edit_item' => esc_html__( 'Edit', 'buzzstore-pro' ), 
				'new_item' => esc_html__( 'New Post Team Member', 'buzzstore-pro' ), 
				'view_item' => esc_html__( 'View Team Member', 'buzzstore-pro' ), 
				'search_items' => esc_html__( 'Search Team Member', 'buzzstore-pro' ),
				'not_found' =>  esc_html__( 'Nothing found in the Database.', 'buzzstore-pro' ), 
				'not_found_in_trash' => esc_html__( 'Nothing found in Trash', 'buzzstore-pro' ), 
				'parent_item_colon' => ''
				), 
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 4,
			'menu_icon' => 'dashicons-groups',
			'rewrite'	=> array( 'slug' => 'team', 'with_front' => false ), 
			'has_archive' => 'team',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt','comments')
		) 
	); 
}
add_action( 'init', 'buzzstorepro_our_team_member');


/** 
 * Our Team Member Screen Layout
*/
add_filter("manage_edit-team_columns", "buzzstorepro_team_edit_columns");
function buzzstorepro_team_edit_columns($columns){
  $columns = array(
    "cb" => "<input type='checkbox' />",
    "thum" =>'Thumbnail',
    "title" => "Title",
    "position" => "Position",
    "date" => "Date",
  ); 
  return $columns;
}

add_action("manage_posts_custom_column",  "buzzstorepro_team_custom_columns");
function buzzstorepro_team_custom_columns($column){
  global $post;
 
  switch ($column) {
    case "thum":
      the_post_thumbnail( array(50, 50) );
      break;
    case "position":
      	echo $position = esc_html( get_post_meta($post->ID, 'team_member_position', true ) );
      break;
  }
}


/**
 * Extra Fields of Team Member & Testimonial (Custom Metabox)
*/
if ( ! function_exists( 'buzzstorepro_extra_fields' ) ) {    
  function buzzstorepro_extra_fields(){  
    add_meta_box(
      'buzzstorepro_team_member',
      esc_html__( 'Our Team Member Details', 'buzzstore-pro' ),
      'buzzstorepro_team_member_settings',
      'team',
      'normal',
      'high'
    );

    add_meta_box(
      'buzzstorepro_testimonial',
      esc_html__( 'Testimonial Details', 'buzzstore-pro' ),
      'buzzstorepro_testimonial_settings',
      'testimonials',
      'high',
      'normal'
    );   
  }
}
add_action('add_meta_boxes', 'buzzstorepro_extra_fields');

/**
 * Create team member extra fieles metabox
*/
if ( ! function_exists( 'buzzstorepro_team_member_settings' ) ) {
  function buzzstorepro_team_member_settings(){
      global $post;
      wp_nonce_field( basename( __FILE__ ), 'buzzstorepro_team_member_settings_nonce' );
      $team_member_position = esc_attr(get_post_meta( $post->ID, 'team_member_position', true ));
      $team_member_email = esc_attr(get_post_meta( $post->ID, 'team_member_email', true ));
      $team_member_weblink = esc_url(get_post_meta( $post->ID, 'team_member_weblink', true )); 
      $team_member_facebook = esc_url(get_post_meta( $post->ID, 'team_member_facebook', true )); 
      $team_member_twitter = esc_url(get_post_meta( $post->ID, 'team_member_twitter', true )); 
      $team_member_googleplus = esc_url(get_post_meta( $post->ID, 'team_member_googleplus', true )); 
      $team_member_linkedin = esc_url(get_post_meta( $post->ID, 'team_member_linkedin', true )); 
      $team_member_instagram = esc_url(get_post_meta( $post->ID, 'team_member_instagram', true )); 
    ?>
      <table>
          <tr>
            <td><label class="custom_label" for="team_member_position"><?php esc_html_e('Team Member Position','buzzstore-pro'); ?></label></td>
            <td>:</td>
            <td><input class="custom_logo_input" type="text" name="team_member_position" id="team_member_position" value="<?php echo esc_attr( $team_member_position ); ?>" /></td>
          </tr>
          <tr>
            <td><label class="custom_label" for="team_member_email"><?php esc_html_e('Team Member Email','buzzstore-pro'); ?></label></td>
            <td>:</td>
            <td><input class="custom_logo_input" type="text" name="team_member_email" id="team_member_email" value="<?php echo esc_attr( antispambot( $team_member_email ) ); ?>" /></td>
          </tr>
          <tr>
            <td><label class="custom_label" for="team_member_weblink"><?php esc_html_e('Member Web Link','buzzstore-pro'); ?></label></td>
            <td>:</td>
            <td><input class="custom_logo_input" type="text" name="team_member_weblink" id="team_member_weblink" value="<?php echo esc_url( $team_member_weblink ); ?>" /></td>
          </tr>
          <tr>
            <td><label class="custom_label" for="team_member_facebook"><?php esc_html_e('Facebook Url','buzzstore-pro'); ?></label></td>
            <td>:</td>
            <td><input class="custom_logo_input" type="text" name="team_member_facebook" id="team_member_facebook" value="<?php echo esc_url( $team_member_facebook ); ?>" /></td>
          </tr>
          <tr>
            <td><label class="custom_label" for="team_member_twitter"><?php esc_html_e('Twitter Url','buzzstore-pro'); ?></label></td>
            <td>:</td>
            <td><input class="custom_logo_input" type="text" name="team_member_twitter" id="team_member_twitter" value="<?php echo esc_url( $team_member_twitter ); ?>" /></td>
          </tr>
          <tr>
            <td><label class="custom_label" for="team_member_googleplus"><?php esc_html_e('Google Plus Url','buzzstore-pro'); ?></label></td>
            <td>:</td>
            <td><input class="custom_logo_input" type="text" name="team_member_googleplus" id="team_member_googleplus" value="<?php echo esc_url( $team_member_googleplus ); ?>" /></td>
          </tr>
          <tr>
            <td><label class="custom_label" for="team_member_linkedin"><?php esc_html_e('Linkedin Url','buzzstore-pro'); ?></label></td>
            <td>:</td>
            <td><input class="custom_logo_input" type="text" name="team_member_linkedin" id="team_member_linkedin" value="<?php echo esc_url( $team_member_linkedin ); ?>" /></td>
          </tr>     
      </table>           
    <?php    
  }
}

/**
 * Save team member extra fieles metabox data value
*/
if ( ! function_exists( 'buzzstorepro_team_member_save' ) ) {
  function buzzstorepro_team_member_save( $post_id ) { 
      global $post;
      if ( !isset( $_POST[ 'buzzstorepro_team_member_settings_nonce' ] ) || !wp_verify_nonce( $_POST[ 'buzzstorepro_team_member_settings_nonce' ], basename( __FILE__ ) ) )
          return;
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
          return;
          
      if ('post' == $_POST['post_type']) {  
          if (!current_user_can( 'edit_page', $post_id ) )  
              return $post_id;  
      } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
              return $post_id;  
      }  
            
      //Execute this saving function
     
      $old_audio = get_post_meta( $post_id, 'team_member_position', true); 
      $new_audio = sanitize_text_field($_POST['team_member_position']);
      if ($new_audio && $new_audio != $old_audio) {  
          update_post_meta($post_id, 'team_member_position', $new_audio);  
      } elseif ('' == $new_audio && $old_audio) {  
          delete_post_meta($post_id,'team_member_position', $old_audio);  
      }


      $old_audio = get_post_meta( $post_id, 'team_member_email', true); 
      $new_audio = sanitize_text_field($_POST['team_member_email']);
      if ($new_audio && $new_audio != $old_audio) {  
          update_post_meta($post_id, 'team_member_email', $new_audio);  
      } elseif ('' == $new_audio && $old_audio) {  
          delete_post_meta($post_id,'team_member_email', $old_audio);  
      }


      $old_audio = get_post_meta( $post_id, 'team_member_weblink', true); 
      $new_audio = sanitize_text_field($_POST['team_member_weblink']);
      if ($new_audio && $new_audio != $old_audio) {  
          update_post_meta($post_id, 'team_member_weblink', $new_audio);  
      } elseif ('' == $new_audio && $old_audio) {  
          delete_post_meta($post_id,'team_member_weblink', $old_audio);  
      }

      $old_audio = get_post_meta( $post_id, 'team_member_facebook', true); 
      $new_audio = sanitize_text_field($_POST['team_member_facebook']);
      if ($new_audio && $new_audio != $old_audio) {  
          update_post_meta($post_id, 'team_member_facebook', $new_audio);  
      } elseif ('' == $new_audio && $old_audio) {  
          delete_post_meta($post_id,'team_member_facebook', $old_audio);  
      }

      $old_audio = get_post_meta( $post_id, 'team_member_twitter', true); 
      $new_audio = sanitize_text_field($_POST['team_member_twitter']);
      if ($new_audio && $new_audio != $old_audio) {  
          update_post_meta($post_id, 'team_member_twitter', $new_audio);  
      } elseif ('' == $new_audio && $old_audio) {  
          delete_post_meta($post_id,'team_member_twitter', $old_audio);  
      }

      $old_audio = get_post_meta( $post_id, 'team_member_googleplus', true); 
      $new_audio = sanitize_text_field($_POST['team_member_googleplus']);
      if ($new_audio && $new_audio != $old_audio) {  
          update_post_meta($post_id, 'team_member_googleplus', $new_audio);  
      } elseif ('' == $new_audio && $old_audio) {  
          delete_post_meta($post_id,'team_member_googleplus', $old_audio);  
      }

      $old_audio = get_post_meta( $post_id, 'team_member_linkedin', true); 
      $new_audio = sanitize_text_field($_POST['team_member_linkedin']);
      if ($new_audio && $new_audio != $old_audio) {  
          update_post_meta($post_id, 'team_member_linkedin', $new_audio);  
      } elseif ('' == $new_audio && $old_audio) {  
          delete_post_meta($post_id,'team_member_linkedin', $old_audio);  
      }

      $old_audio = get_post_meta( $post_id, 'team_member_instagram', true); 
      $new_audio = sanitize_text_field($_POST['team_member_instagram']);
      if ($new_audio && $new_audio != $old_audio) {  
          update_post_meta($post_id, 'team_member_instagram', $new_audio);  
      } elseif ('' == $new_audio && $old_audio) {  
          delete_post_meta($post_id,'team_member_instagram', $old_audio);  
      }
  }
}
add_action('save_post', 'buzzstorepro_team_member_save');


/**
 * Create testimonial extra fieles metabox
*/
if ( ! function_exists( 'buzzstorepro_testimonial_settings' ) ) {
  function buzzstorepro_testimonial_settings() {
      global $post;
      wp_nonce_field( basename( __FILE__ ), 'buzzstorepro_testimonial_settings_nonce' );
      $author_name = esc_attr(get_post_meta( $post->ID, 'author_name', true ));
      $author_position = esc_attr(get_post_meta( $post->ID, 'author_position', true ));
      $company_name = esc_attr(get_post_meta( $post->ID, 'company_name', true ));
    ?>
      <table>
          <tr>
            <td><label class="custom_label" for="author_position"><?php esc_html_e('Author Name','buzzstore-pro'); ?></label></td>
            <td>:</td>
            <td><input class="custom_logo_input" type="text" size="70" name="author_name" id="author_name" value="<?php echo esc_attr( $author_name ); ?>" /></td>
          </tr>
          <tr>
            <td><label class="custom_label" for="author_position"><?php esc_html_e('Author Position','buzzstore-pro'); ?></label></td>
            <td>:</td>
            <td><input class="custom_logo_input" type="text" size="70" name="author_position" id="author_position" value="<?php echo esc_attr( $author_position ); ?>" /></td>
          </tr>
          <tr>
            <td><label class="custom_label" for="company_name"><?php esc_html_e(' Author Company Name','buzzstore-pro'); ?></label></td>
            <td>:</td>
            <td><input class="custom_logo_input" type="text" size="70" name="company_name" id="company_name" value="<?php echo esc_attr( $company_name ); ?>" /></td>
          </tr>
      </table>
    <?php    
  }
}

/**
 * Save testimonial extra fieles metabox data value
*/
if ( ! function_exists( 'buzzstorepro_testmonial_save' ) ) {
  function buzzstorepro_testmonial_save( $post_id ) { 
      global $post;
      if ( !isset( $_POST[ 'buzzstorepro_testimonial_settings_nonce' ] ) || !wp_verify_nonce( $_POST[ 'buzzstorepro_testimonial_settings_nonce' ], basename( __FILE__ ) ) )
          return;
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
          return;          
      if ('post' == $_POST['post_type']) {  
          if (!current_user_can( 'edit_page', $post_id ) )  
              return $post_id;  
      } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
              return $post_id;  
      }

      //Testimonia Position
      $old = get_post_meta( $post_id, 'author_name', true); 
      $new = sanitize_text_field($_POST['author_name']);
      if ($new && $new != $old) {  
          update_post_meta($post_id, 'author_name', $new);  
      } elseif ('' == $new && $old) {  
          delete_post_meta($post_id,'author_name', $old);  
      } 
            
      //Testimonia Position
      $old = get_post_meta( $post_id, 'author_position', true); 
      $new = sanitize_text_field($_POST['author_position']);
      if ($new && $new != $old) {  
          update_post_meta($post_id, 'author_position', $new);  
      } elseif ('' == $new && $old) {  
          delete_post_meta($post_id,'author_position', $old);  
      }

      // Testimonia Company
      $old = get_post_meta( $post_id, 'company_name', true); 
      $new = sanitize_text_field($_POST['company_name']);
      if ($new && $new != $old) {  
          update_post_meta($post_id, 'company_name', $new);  
      } elseif ('' == $new && $old) {  
          delete_post_meta($post_id,'company_name', $old);  
      }
  }
}
add_action('save_post', 'buzzstorepro_testmonial_save');