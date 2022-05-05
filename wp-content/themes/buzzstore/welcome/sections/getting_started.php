<div class="welcome-getting-started">
    <div class="welcome-demo-import">
        <h3><?php echo esc_html__('Manual Setup', 'buzzstore'); ?></h3>

        <p><?php echo esc_html__('You can setup the home page sections either from Customizer Panel or from Elementor Pagebuilder', 'buzzstore'); ?></p>
        <p><strong><?php echo esc_html__('FROM CUSTOMIZER', 'buzzstore'); ?></strong></p>
        <ol>
            <li><?php echo esc_html__('Create a new page & select "FrontPage Template" in Page Attributes', 'buzzstore'); ?></li>
            <li><?php echo esc_html__('Go to Appearance &gt; Customize', 'buzzstore'); ?></li>
            <li><?php echo esc_html__('Click on ', 'buzzstore'); ?><strong>"<a href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=static_front_page')); ?>" target="_blank"><?php echo esc_html__('Homepage Settings', 'buzzstore'); ?></a>"</strong> <?php echo esc_html__('and choose "A static page" for "Your latest posts" and select the created page for "Home Page" option.', 'buzzstore'); ?></li>
            <li><?php echo sprintf('Now go back and click on <strong>Appearance > Widget</strong> or Manage <strong>Customizer Section</strong> Options', 'buzzstore'); ?></li>
        </ol>
        <p><strong><?php echo esc_html__('FROM ELEMENTOR', 'buzzstore'); ?></strong></p>
        <ol>
            <li><?php echo esc_html__('Firstly install and activate "Elementor Website Builder" plugin from', 'buzzstore'); ?> <a href="<?php echo esc_url(admin_url('post-new.php?page=buzzstore-welcome&section=recommended_plugins')); ?>" target="_blank"><?php echo esc_html__('Recommended Plugin page.', 'buzzstore'); ?></a></li>
            <li><?php echo esc_html__('Create a new page and edit with Elementor. Drag and drop the elements in the Elementor to create your own design.', 'buzzstore'); ?></li>
            <li><?php echo esc_html__('Now go to Appearance &gt; Customize &gt; Homepage Settings and choose "A static page" for "Your latest posts" and select the created page for "Home Page" option.', 'buzzstore'); ?></li>
        </ol>
        
        <p>
            <?php echo sprintf(esc_html__('For more detail visit our theme %s.', 'buzzstore'), '<a href="'.esc_url('https://docs.sparklewpthemes.com/buzzstore/').'" target="_blank">' . esc_html__('Documentation Page', 'buzzstore') . '</a>'); ?>
        </p>
    </div>

    <div class="welcome-demo-import">
        <h3><?php echo esc_html__('Demo Importer', 'buzzstore'); ?><a href="<?php echo esc_url('https://sparklewpthemes.com/wordpress-themes/free-ecommerce-wordpress-theme/'); ?>" target="_blank" class="button button-primary"><?php esc_html_e('Download Demo Data', 'buzzstore'); ?></a></h3>
        <div class="welcome-theme-thumb">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.png'); ?>" alt="<?php printf(esc_attr__('%s Demo', 'buzzstore'), $this->theme_name); ?>">
        </div>

        <div class="welcome-demo-import-text">
            <p><?php esc_html_e('Or you can get started by importing the demo with just one click.', 'buzzstore'); ?></p>
            <p><?php echo sprintf(esc_html__('Click on the button below to install and activate the One Click Demo Importer Plugin. For more detailed documentation on how the demo importer works, click %s.', 'buzzstore'), '<a href="'.esc_url('https://docs.sparklewpthemes.com/buzzstore/').'" target="_blank">' . esc_html__('here', 'buzzstore') . '</a>'); ?></p>
            <?php echo $this->generate_demo_installer_button(); ?>
        </div>
    </div>
</div>