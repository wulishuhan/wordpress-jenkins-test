<?php
/**
 * This file implements custom requirements for the Webriti Companion plugin.
 * It can be used as-is in themes (drop-in).
 *
 */


if (class_exists('WP_Customize_Control') && !class_exists('bluestreet_Plugin_Install_Control')) {
	/**
	 *
	 * @see WP_Customize_Section
	 */
	class bluestreet_Plugin_Install_Control extends WP_Customize_Control {
		/**
		 * Customize section type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'bluestreet_plugin_install_control';
		public $name = '';
		public $slug = '';

		public function __construct($manager, $id, $args = array()) {
			parent::__construct($manager, $id, $args);
		}

		/**
		 * enqueue styles and scripts
		 *
		 *
		 **/
		public  function enqueue() {
			wp_enqueue_script('plugin-install');
			wp_enqueue_script('updates');
			wp_enqueue_script('bluestreet-companion-install', BLUESTREET_TEMPLATE_DIR_URI . '/admin/assets/js/plugin-install.js', array('jquery'));
			wp_localize_script('bluestreet-companion-install', 'bluestreet_companion_install',
				array(
					'installing' => esc_html__('Installing', 'bluestreet'),
					'activating' => esc_html__('Activating', 'bluestreet'),
					'error'      => esc_html__('Error', 'bluestreet'),
					'ajax_url'   => esc_url(admin_url('admin-ajax.php')),
				)
			);
		}
		/**
		 * Render the section.
		 *
		 * @access protected
		 */
		protected function render_content() {
			// Determine if the plugin is not installed, or just inactive.
			
			if(empty($this->name) && empty($this->slug)){
				return;
			}
			
			$hide_install = get_option('bluestreet_hide_customizer_notice_'.$this->slug,  false);
			if($hide_install){
				return;
			}

			global $bluestreet_about_page;
			if(!is_object($bluestreet_about_page)){
				return;
			}?>
			<div class="webriti-plugin-install-control">
				<span class="webriti-customizer-notification-dismiss" id="<?php echo esc_attr($this->slug); ?>-install-dismiss" data-slug="<?php echo esc_attr($this->slug); ?>"> <i class="fa fa-times"></i></span>
				<?php if ( ! empty( $this->label ) ) : ?>
		            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		        <?php endif; ?>
		        <?php if ( ! empty( $this->description ) ) : ?>
		            <span class="description customize-control-description"><?php echo wp_kses_post($this->description ); ?></span>
		        <?php endif; ?>
				<?php 
					$button = $webriti_about_page->get_plugin_buttion($this->slug, $this->name, $this->function);
					echo wp_kses_post($button['button']);
				?>
				<div style="clear: both;"></div>
			</div>
			<?php
		}
	}
}

function bluestreet_hide_customizer_notice(){
	if(isset($_POST['webriti_plugin_slug']) && !empty($_POST['webriti_plugin_slug'])){
		$plugin_slug = sanitize_text_field($_POST['webriti_plugin_slug']);
		update_option('bluestreet_hide_customizer_notice_'.$plugin_slug, true);
		echo true;
	}
	wp_die();
}
add_action('wp_ajax_webriti_hide_customizer_notice', 'bluestreet_hide_customizer_notice');