<?php
	if(!class_exists('Buzzstore_Welcome')) :

		class Buzzstore_Welcome {

			public $tab_sections = array();

			public $theme_name = ''; // For storing Theme Name
			public $theme_version = ''; // For Storing Theme Current Version Information
			public $free_plugins = array(); // For Storing the list of the Recommended Free Plugins
			public $pro_plugins = array(); // For Storing the list of the Recommended Pro Plugins

			/**
			 * Constructor for the Welcome Screen
			 */
			public function __construct() {
				
				/** Useful Variables **/
				$theme = wp_get_theme();
				$this->theme_name = $theme->Name;
				$this->theme_version = $theme->Version;

				/** Define Tabs Sections **/
				$this->tab_sections = array(
					'getting_started' => __('Getting Started', 'buzzstore-pro'),
					'recommended_plugins' => __('Recommended Plugins', 'buzzstore-pro'),
					'support' => __('Support', 'buzzstore-pro'),
					'free_vs_pro' => __('Free Vs Pro', 'buzzstore-pro'),
				);

				/** List of Recommended Free Plugins **/
				$this->free_plugins = array(

					'woocommerce' => array(
						'name' => 'WooCommerce',
						'slug' => 'woocommerce',
						'filename' => 'woocommerce'
					),
					
					'wpforms-lite' => array(
						'name' => 'Contact Form by WPForms',
						'slug' => 'wpforms-lite',
						'filename' => 'wpforms'
					),

					'contact-form-7' => array(
						'name' => 'Contact Form 7',
						'slug' => 'contact-form-7',
						'filename' => 'contact-form-7'
					),

					'yith-woocommerce-quick-view' => array(
						'name' => 'YITH WooCommerce Quick View',
						'slug' => 'yith-woocommerce-quick-view',
						'filename' => 'yith-woocommerce-quick-view'
					),

					'yith-woocommerce-compare' => array(
						'name' => 'YITH WooCommerce Compare',
						'slug' => 'yith-woocommerce-compare',
						'filename' => 'yith-woocommerce-compare'
					),

					'yith-woocommerce-wishlist' => array(
						'name' => 'YITH WooCommerce Wishlist',
						'slug' => 'yith-woocommerce-wishlist',
						'filename' => 'yith-woocommerce-wishlist'
					)
				);

				/** List of Recommended Pro Plugins **/
				$this->pro_plugins = array();

				/* Theme Activation Notice */
				add_action( 'admin_notices', array( $this, 'buzzstore_activation_admin_notice' ) );

				/* Create a Welcome Page */
				add_action( 'admin_menu', array( $this, 'buzzstore_welcome_register_menu' ) );

				/* Enqueue Styles & Scripts for Welcome Page */
				add_action( 'admin_enqueue_scripts', array( $this, 'buzzstore_welcome_styles_and_scripts' ) );

				add_action( 'wp_ajax_buzzstore_activate_plugin', array( $this, 'buzzstore_activate_plugin') );

			}

			/** Welcome Message Notification on Theme Activation **/
			public function buzzstore_activation_admin_notice() {
				global $pagenow;

				if( is_admin() && ('themes.php' == $pagenow) && (isset($_GET['activated'])) ) {

					$theme_data	 = wp_get_theme();
					echo '<div class="notice notice-success is-dismissible buzzstore-activation-notice">';
						
						echo '<h1>';
							/* translators: %s theme name */
							printf( esc_html__( 'Welcome to %s', 'buzzstore-pro' ), esc_html( $theme_data->Name ) );
						echo '</h1>';

						echo '<p>';
							/* translators: %1$s: theme name, %2$s link */
							printf( __( 'Thank you for choosing %1$s! To fully take advantage of the best our theme can offer please make sure you visit our <a href="%2$s">Welcome page</a>', 'buzzstore-pro' ), esc_html( $theme_data->Name ), esc_url( admin_url( 'themes.php?page=buzzstore-welcome' ) ) );
						echo '</p>';

						echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=buzzstore-welcome' ) ) .'" class="button button-primary button-hero">';
							/* translators: %s theme name */
							printf( esc_html__( 'Get started with %s', 'buzzstore-pro' ), esc_html( $theme_data->Name ) );
						echo '</a></p>';

					echo '</div>';
					
				}
			}


			/** Register Menu for Welcome Page **/
			public function buzzstore_welcome_register_menu() {
				add_theme_page( esc_html__( 'Welcome', 'buzzstore-pro' ), esc_html__( 'Buzzstore Settings', 'buzzstore-pro' ) , 'edit_theme_options', 'buzzstore-welcome', array( $this, 'buzzstore_welcome_screen' ));
			}

			/** Welcome Page **/
			public function buzzstore_welcome_screen() {
				$tabs = $this->tab_sections;
				?>
				<div class="wrap about-wrap access-wrap">
					<div class="abt-promo-wrap clearfix">
						<div class="abt-theme-wrap">
							<h1><?php printf( // WPCS: XSS OK.
								/* translators: 1-theme name, 2-theme version*/
								esc_html__( 'Welcome to %1$s - Version %2$s', 'buzzstore-pro' ), $this->theme_name, $this->theme_version ); ?></h1>
							<div class="about-text"><?php echo esc_html__( 'BuzzStore Pro is a clean, beautiful and fully customizable responsive WooCommerce Free WordPress theme. This theme is packed with lots of exciting features that enhance the eCommerce experience. This theme is fully compatible with WooCommerce and some other external plugins like YITH WooCommerce Wishlist, YITH WooCommerce Quick View, WOOF Products Filter for WooCommerce, WooCommerce Variation Swatches, Jetpack, Contact Form 7 and many more plugins. This theme packs many premium features and several custom widgets which helps to make your online store professional and well organized.', 'buzzstore-pro' ); ?></div>
						</div>

					</div>

					<div class="nav-tab-wrapper clearfix">
						<?php foreach($tabs as $id => $label) : ?>
							<?php
								$section = isset($_GET['section']) ? sanitize_text_field( wp_unslash( $_GET['section'] ) ) : 'getting_started'; // Input var okay.
								$nav_class = 'nav-tab';
								if($id == $section) {
									$nav_class .= ' nav-tab-active';
								}
							?>
							<a href="<?php echo esc_url(admin_url('themes.php?page=buzzstore-welcome&section='.$id)); ?>" class="<?php echo esc_attr($nav_class); ?>" >
								<?php echo esc_html( $label ); ?>
						   	</a>
						<?php endforeach; ?>
				   	</div>

			   		<div class="welcome-section-wrapper">
		   				<?php $section = isset($_GET['section']) ? sanitize_text_field( wp_unslash( $_GET['section'] ) ) : 'getting_started'; // Input var okay. ?>
	   					
	   					<div class="welcome-section <?php echo esc_attr($section); ?> clearfix">
	   						<?php require_once get_template_directory() . '/welcome/sections/'.$section.'.php'; ?>
						</div>
				   	</div>
			   	</div>
				<?php
			}

			/** Enqueue Necessary Styles and Scripts for the Welcome Page **/
			public function buzzstore_welcome_styles_and_scripts($hook) {
				if( 'appearance_page_buzzstore-welcome' == $hook ){
					$importer_params = array(
						'installing_text' => esc_html__('Installing Importer Plugin', 'buzzstore-pro'),
						'activating_text' => esc_html__('Activating Importer Plugin', 'buzzstore-pro'),
						'importer_page' => esc_html__('Go to Importer Page >>', 'buzzstore-pro'),
						'importer_url' => admin_url('themes.php?page=pt-one-click-demo-import'),
						'error' => esc_html__('Error! Reload the page and try again.', 'buzzstore-pro'),
					);
					wp_enqueue_style( 'buzzstore-welcome', get_template_directory_uri() . '/welcome/css/welcome.css' );
					wp_enqueue_style( 'plugin-install' );
					wp_enqueue_script( 'plugin-install' );
					wp_enqueue_script( 'updates' );
					wp_enqueue_script( 'buzzstore-welcome', get_template_directory_uri() . '/welcome/js/welcome.js', array(), '1.0' );
					wp_localize_script( 'buzzstore-welcome', 'importer_params', $importer_params);
				}

				/**
				 * Notice after Theme Activation.
				*/
				global $pagenow;
				if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
					wp_enqueue_style( 'buzzstore-welcome-admin', get_theme_file_uri( '/assets/css/buzzstorepro-admin.css' ) );
				}
			}

			// Check if plugin is installed
			public function buzzstore_check_installed_plugin( $slug, $filename ) {
				return file_exists( ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php' ) ? true : false;
			}

			// Check if plugin is activated
			public function buzzstore_check_plugin_active_state( $slug, $filename ) {
				return is_plugin_active( $slug . '/' . $filename . '.php' ) ? true : false;
			}

			/** Generate Url for the Plugin Button **/
			public function buzzstore_plugin_generate_url($status, $slug, $file_name) {
				switch ( $status ) {
					case 'install':
						return wp_nonce_url(
							add_query_arg(
								array(
									'action' => 'install-plugin',
									'plugin' => esc_attr($slug)
								),
								network_admin_url( 'update.php' )
							),
							'install-plugin_' . esc_attr($slug)
						);
						break;

					case 'inactive':
						return add_query_arg( array(
		                      'action'        => 'deactivate',
		                      'plugin'        => rawurlencode( esc_attr($slug) . '/' . esc_attr($file_name) . '.php' ),
		                      'plugin_status' => 'all',
		                      'paged'         => '1',
		                      '_wpnonce'      => wp_create_nonce( 'deactivate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php' ),
	                      ), network_admin_url( 'plugins.php' ) );
						break;

					case 'active':
						return add_query_arg( array(
		                      'action'        => 'activate',
		                      'plugin'        => rawurlencode( esc_attr($slug) . '/' . esc_attr($file_name) . '.php' ),
		                      'plugin_status' => 'all',
		                      'paged'         => '1',
		                      '_wpnonce'      => wp_create_nonce( 'activate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php' ),
	                      ), network_admin_url( 'plugins.php' ) );
						break;
				}
			}

			public function buzzstore_activate_plugin(){
				$slug = isset($_POST['slug']) ? sanitize_text_field( wp_unslash( $_POST['slug'] ) ) : '';
				$file = isset($_POST['file']) ? sanitize_text_field( wp_unslash( $_POST['file'] ) ) : '';
				$success = false;

				if( !empty($slug) && !empty($file)){
					$result = activate_plugin( $slug.'/'.$file.'.php' );

					if ( !is_wp_error( $result ) ) {
						$success = true;
					}
				}
				echo wp_json_encode(array('success'=>$success));
				die();
			}

		}

		new Buzzstore_Welcome();

	endif;
