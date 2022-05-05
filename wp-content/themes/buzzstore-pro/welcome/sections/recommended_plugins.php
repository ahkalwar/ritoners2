<?php
	$free_plugins = $this->free_plugins;

	if(!empty($free_plugins)) {
		?>
		<h4 class="recomplug-title"><?php echo esc_html__('Recommended Plugins', 'buzzstore-pro'); ?></h4>
		<p><?php echo esc_html__('Please Install all the plugins. Although these plugins are complementary, we encourage to install theme to use the theme to full extent', 'buzzstore-pro'); ?></p>
		<div class="recomended-plugin-wrap">
		<?php
		foreach($free_plugins as $plugin) {
			$slug = $plugin['slug'];
			$name = $plugin['name'];
			$filename = $plugin['filename'];
			?>
				<div class="recom-plugin-wrap">
					<div class="plugin-img-wrap">
						<img src="<?php echo esc_url('https://ps.w.org/'. esc_attr($slug) .'/assets/icon-256x256.png') ?>" />
					</div>

					<div class="plugin-title-install clearfix">
						<span class="title">
							<?php echo esc_html($name); ?>	
						</span>

						<span class="plugin-btn-wrapper">
							<?php 
							if ( $this->buzzstore_check_installed_plugin( $slug, $filename ) && !$this->buzzstore_check_plugin_active_state( $slug, $filename ) ) : ?>
								<a target="_blank" href="<?php echo esc_url($this->buzzstore_plugin_generate_url('active', $slug, $filename)) ?>" class="button button-primary"><?php esc_html_e( 'Activate', 'buzzstore-pro' ); ?></a>
							<?php 
							elseif( $this->buzzstore_check_installed_plugin( $slug, $filename ) ) : ?>
								<button type="button" class="button button-disabled" disabled="disabled"><?php esc_html_e( 'Installed', 'buzzstore-pro' ); ?></button>
							<?php 
							else : ?>
								<a target="_blank" class="install-now button-primary" href="<?php echo esc_url($this->buzzstore_plugin_generate_url('install', $slug, $filename)) ?>" >
								<?php esc_html_e( 'Install Now', 'buzzstore-pro' ); ?></a>							
							<?php 
							endif; ?>
						</span>
					</div>
				</div>
			<?php
		} ?>
		</div>
	<?php
	}