<?php
/**
* Theme customizer with real-time update
*
* Very helpful: http://ottopress.com/2012/theme-customizer-part-deux-getting-rid-of-options-pages/
*
* @package Natural
* @since Natural 1.0
*/
function natural_theme_customizer( $wp_customize ) {

	// Category Dropdown Control
	class Natural_Category_Dropdown_Control extends WP_Customize_Control {
	public $type = 'dropdown-categories';

	public function render_content() {
		$dropdown = wp_dropdown_categories(
				array(
					'name'              => '_customize-dropdown-categories-' . $this->id,
					'echo'              => 0,
					'show_option_none'  => esc_html__( '&mdash; Select &mdash;', 'natural' ),
					'option_none_value' => '0',
					'selected'          => $this->value(),
				)
			);

			// Hackily add in the data link parameter.
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

			printf( '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
				$this->label,
				$dropdown
			);
		}
	}

	// Numerical Control
	class natural_theme_options_Number_Control extends WP_Customize_Control {

		public $type = 'number';

		public function render_content() {
			?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" />
			</label>
			<?php
		}

	}

	function natural_sanitize_categories( $input ) {
		$categories = get_terms( 'category', array('fields' => 'ids', 'get' => 'all') );

	    if ( in_array( $input, $categories ) ) {
	        return $input;
	    } else {
	    	return '';
	    }
	}

	function natural_sanitize_pages( $input ) {
		$pages = get_all_page_ids();

	    if ( in_array( $input, $pages ) ) {
	        return $input;
	    } else {
	    	return '';
	    }
	}

	function natural_sanitize_align( $input ) {
	    $valid = array(
	        'left' 		=> esc_html__( 'Left Align', 'natural' ),
	        'center' 		=> esc_html__( 'Center Align', 'natural' ),
	        'right' 	=> esc_html__( 'Right Align', 'natural' ),
	    );

	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}

	function natural_sanitize_columns( $input ) {
	    $valid = array(
	        'one' 		=> esc_html__( 'One Column', 'natural' ),
	        'two' 		=> esc_html__( 'Two Columns', 'natural' ),
	        'three' 	=> esc_html__( 'Three Columns', 'natural' ),
	    );

	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}

	function natural_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}

	function natural_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}

	// Set site name and description text to be previewed in real-time
	$wp_customize->get_setting('blogname')->transport='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';

	// Set site title color to be previewed in real-time
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//-------------------------------------------------------------------------------------------------------------------//
	// Theme Options Panel
	//-------------------------------------------------------------------------------------------------------------------//

	$wp_customize->add_panel( 'natural_theme_options', array(
	    'priority' => 2,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => esc_html__( 'Theme Options', 'natural' ),
	    'description' => esc_html__( 'This panel allows you to customize specific areas of the Natural Theme.', 'natural' ),
	) );

	//-------------------------------------------------------------------------------------------------------------------//
	// Title and Navigation
	//-------------------------------------------------------------------------------------------------------------------//

	$wp_customize->add_section( 'natural_title_nav' , array(
		'title' => esc_html__( 'Title & Navigation', 'natural' ),
		'panel'	=> 'natural_theme_options',
		'priority'    => 101,
	) );

	// Site Title Align
	$wp_customize->add_setting( 'title_align', array(
			'default' => 'center',
			'sanitize_callback' => 'natural_sanitize_align',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_align', array(
			'type' => 'radio',
			'label' => esc_html__( 'Logo & Nav Alignment', 'natural' ),
			'section' => 'natural_title_nav',
			'choices' => array(
					'left' 		=> esc_html__( 'Left Align', 'natural' ),
					'center' 	=> esc_html__( 'Center Align', 'natural' ),
					'right' 	=> esc_html__( 'Right Align', 'natural' ),
			),
			'priority' => 45,
	) ) );

	//-------------------------------------------------------------------------------------------------------------------//
	// Homepage Section
	//-------------------------------------------------------------------------------------------------------------------//

	$wp_customize->add_section( 'natural_home_section' , array(
		'title' => esc_html__( 'Homepage', 'natural' ),
		'panel'	=> 'natural_theme_options',
		'priority'    => 105,
	) );

		// Show Homepage Content
		$wp_customize->add_setting( 'natural_home_display_content', array(
				'default' => 0,
				'sanitize_callback' => 'natural_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'natural_home_display_content', array(
				'type' => 'checkbox',
				'label' => esc_html__( 'Show Homepage Content', 'natural' ),
				'section' => 'natural_home_section',
				'priority' => 10,
		) ) );

		// Featured Page Left
		$wp_customize->add_setting( 'natural_page_left', array(
			'default' 			=> 0,
			'sanitize_callback' => 'natural_sanitize_pages',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'natural_page_left', array(
			'label'		=> esc_html__( 'Featured Page Left', 'natural' ),
			'section'	=> 'natural_home_section',
			'settings'	=> 'natural_page_left',
			'type'		=> 'dropdown-pages',
		) ) );

		// Featured Page Middle
		$wp_customize->add_setting( 'natural_page_mid', array(
			'default' 			=> 0,
			'sanitize_callback' => 'natural_sanitize_pages',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'natural_page_mid', array(
			'label'		=> esc_html__( 'Featured Page Middle', 'natural' ),
			'section'	=> 'natural_home_section',
			'settings'	=> 'natural_page_mid',
			'type'		=> 'dropdown-pages',
		) ) );

		// Featured Page Right
		$wp_customize->add_setting( 'natural_page_right', array(
			'default' 			=> 0,
			'sanitize_callback' => 'natural_sanitize_pages',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'natural_page_right', array(
			'label'		=> esc_html__( 'Featured Page Right', 'natural' ),
			'section'	=> 'natural_home_section',
			'settings'	=> 'natural_page_right',
			'type'		=> 'dropdown-pages',
		) ) );

		// Featured News Category
		$wp_customize->add_setting( 'natural_category_news', array(
			'default' 			=> '0',
			'sanitize_callback' => 'natural_sanitize_categories',
		) );
		$wp_customize->add_control( new Natural_Category_Dropdown_Control( $wp_customize, 'natural_category_news', array(
			'label'		=> esc_html__( 'News Post Category', 'natural' ),
			'section'	=> 'natural_home_section',
			'settings'	=> 'natural_category_news',
			'type'		=> 'dropdown-categories',
		) ) );

	//-------------------------------------------------------------------------------------------------------------------//
	// Portfolio
	//-------------------------------------------------------------------------------------------------------------------//

	$wp_customize->add_section( 'natural_portfolio_section' , array(
		'title'	=> esc_html__( 'Portfolio', 'natural' ),
		'panel'	=> 'natural_theme_options',
		'priority'    => 110,
	) );

		// Portfolio Column Layout
		$wp_customize->add_setting( 'natural_portfolio_columns', array(
		    'default' 			=> 'three',
		    'sanitize_callback' => 'natural_sanitize_columns',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'natural_portfolio_columns', array(
		    'type' 		=> 'radio',
		    'label' 	=> esc_html__( 'Portfolio Column Layout', 'natural' ),
		    'section' 	=> 'natural_portfolio_section',
		    'choices' 	=> array(
		        'one' 		=> esc_html__( 'One Column', 'natural' ),
		        'two' 		=> esc_html__( 'Two Columns', 'natural' ),
		        'three' 	=> esc_html__( 'Three Columns', 'natural' ),
		    ) ) ) );

}
add_action('customize_register', 'natural_theme_customizer');

/**
* Binds JavaScript handlers to make Customizer preview reload changes
* asynchronously.
*/
function natural_customize_preview_js() {
	wp_enqueue_script( 'natural-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ) );
}
add_action( 'customize_preview_init', 'natural_customize_preview_js' );
