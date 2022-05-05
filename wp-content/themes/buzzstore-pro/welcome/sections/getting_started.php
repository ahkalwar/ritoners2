<div class="getting-started-top-wrap clearfix">
	<div class="theme-steps-list">
		<div class="theme-steps">
			<h3><?php echo esc_html__('Step 1 - Create a new page with "Front Page" Template', 'buzzstore-pro'); ?></h3>
			<ol>
				<li><?php echo esc_html__('Create a new page (any title like Home )', 'buzzstore-pro'); ?></li>
				<li><?php echo esc_html__('In right column, select "Front Page" for the Page Attributes > Template', 'buzzstore-pro'); ?> </li>
				<li><?php echo esc_html__('Click on Publish', 'buzzstore-pro'); ?></li>
			</ol>
			<a class="button button-primary" target="_blank" href="<?php echo esc_url(admin_url('post-new.php?post_type=page')); ?>"><?php echo esc_html__('Create New Page', 'buzzstore-pro'); ?></a>
		</div>

		<div class="theme-steps">
			<h3><?php echo esc_html__('Step 2 - Set "Your homepage displays" to "A Static Page"', 'buzzstore-pro'); ?></h3>
			<ol>
				<li><?php echo esc_html__('Go to Appearance > Customize > Homepage Settings > Static Front Page', 'buzzstore-pro'); ?></li>
				<li><?php echo esc_html__('Set "Your homepage displays" to "A Static Page"', 'buzzstore-pro'); ?></li>
				<li><?php echo esc_html__('In "Homepage", select the page that you created in the step 1', 'buzzstore-pro'); ?></li>
				<li><?php echo esc_html__('Save changes', 'buzzstore-pro'); ?></li>
			</ol>
			<a class="button button-primary" target="_blank" href="<?php echo esc_url(admin_url('options-reading.php')); ?>"><?php echo esc_html__('Assign Static Page', 'buzzstore-pro'); ?></a>
		</div>

		<div class="theme-steps">
			<h3><?php echo esc_html__('Step 3 - Customizer Options Panel', 'buzzstore-pro'); ?></h3>
			<p><?php echo esc_html__('Now go to Customizer Page. Using the WordPress Customizer you can easily set up the home page and customize the theme.', 'buzzstore-pro'); ?></p>
			<a class="button button-primary" href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php echo esc_html__('Go to Customizer Panels', 'buzzstore-pro'); ?></a>
		</div>

	</div>

	<div class="theme-image">
		<h3><?php echo esc_html__('Import Five Different Demos', 'buzzstore-pro'); ?></h3>
		<img src="<?php echo esc_url(get_template_directory_uri(). '/screenshot.png'); ?>" alt="<?php echo esc_html__('Buzzstore Demo', 'buzzstore-pro'); ?>">

		<div class="theme-import-demo">
			<?php 
			$buzzstore_demo_importer_slug = 'one-click-demo-import';
			$buzzstore_demo_importer_filename ='one-click-demo-import';
			$buzzstore_import_url = '#';

			if ( $this->buzzstore_check_installed_plugin( $buzzstore_demo_importer_slug, $buzzstore_demo_importer_filename ) && !$this->buzzstore_check_plugin_active_state( $buzzstore_demo_importer_slug, $buzzstore_demo_importer_filename ) ) :
				$buzzstore_import_class = 'button button-primary buzzstore-activate-plugin';
				$buzzstore_import_button_text = esc_html__('Activate Importer Plugin', 'buzzstore-pro');
			elseif( $this->buzzstore_check_installed_plugin( $buzzstore_demo_importer_slug, $buzzstore_demo_importer_filename ) ) :
				$buzzstore_import_class = 'button button-primary';
				$buzzstore_import_button_text = esc_html__('Go to Importer Page >>', 'buzzstore-pro');
				$buzzstore_import_url = admin_url('themes.php?page=pt-one-click-demo-import');
			else :
				$buzzstore_import_class = 'button button-primary buzzstore-install-plugin';
				$buzzstore_import_button_text = esc_html__('Install Importer Plugin', 'buzzstore-pro');
			endif;
			?>
			<p><?php echo sprintf(esc_html__('Or you can import the demo with just one click. It is recommended to import the demo on a fresh WordPress install. Or you can reset the website using %s plugin.', 'buzzstore-pro'), '<a target="_blank" href="https://wordpress.org/plugins/wordpress-reset/">WordPress Reset</a>'); ?></p>
			<p><?php echo esc_html__('Note: First Install All Theme Recommended Plugins.', 'buzzstore-pro'); ?></p>
			<p><?php echo esc_html__('Click on the button below to install and activate demo importer plugin.', 'buzzstore-pro'); ?></p>
			<a data-slug="<?php echo esc_attr($buzzstore_demo_importer_slug); ?>" data-filename="<?php echo esc_attr($buzzstore_demo_importer_filename); ?>" class="<?php echo esc_attr( $buzzstore_import_class ); ?>" href="<?php echo esc_url( $buzzstore_import_url ); ?>"><?php echo esc_html($buzzstore_import_button_text); ?></a>
		</div>
	</div>
</div>

<div class="getting-started-bottom-wrap">
	<h3><?php echo esc_html__('Check our Buzzstore Pro premium demos. You might be interested to visit our demo.', 'buzzstore-pro'); ?></h3>
	<p><?php echo esc_html__('Check out the websites that you can create with the premium version of Buzzstore Pro Theme. These demos can be imported with just one click.', 'buzzstore-pro'); ?></p>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() .'/welcome/css/buzzstorepro.png'); ?>" alt="<?php echo esc_html__('Technology Demo', 'buzzstore-pro'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Technology Demo','buzzstore-pro'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/buzzstorepro/" class="button button-primary"><?php echo esc_html__('Preview', 'buzzstore-pro'); ?></a>
				</span>
			</div>
		</div>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() .'/welcome/css/jewellery.jpg'); ?>" alt="<?php echo esc_html__('Jewellery Demo', 'buzzstore-pro'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Jewellery Demo','buzzstore-pro'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/buzzstorepro/jewellery/" class="button button-primary"><?php echo esc_html__('Preview', 'buzzstore-pro'); ?></a>
				</span>
			</div>
		</div>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri(). '/welcome/css/clothing.jpg'); ?>" alt="<?php echo esc_html__('Clothing Demo', 'buzzstore-pro'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Clothing Demo','buzzstore-pro'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/buzzstorepro/clothing/" class="button button-primary"><?php echo esc_html__('Preview', 'buzzstore-pro'); ?></a>
				</span>
			</div>
		</div>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/medical.jpg'); ?>" alt="<?php echo esc_html__('Mediacl Demo', 'buzzstore-pro'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Medical Demo','buzzstore-pro'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/buzzstorepro/medical/" class="button button-primary"><?php echo esc_html__('Preview', 'buzzstore-pro'); ?></a>
				</span>
			</div>
		</div>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/cosmetics.jpg'); ?>" alt="<?php echo esc_html__('Cosmetics Demo', 'buzzstore-pro'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Cosmetics Demo','buzzstore-pro'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/buzzstorepro/cosmetics/" class="button button-primary"><?php echo esc_html__('Preview', 'buzzstore-pro'); ?></a>
				</span>
			</div>
		</div>

	</div>
</div>