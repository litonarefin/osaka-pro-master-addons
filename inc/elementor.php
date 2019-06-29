<?php
/* Elementor Initialize */
class Master_Addons_Custom_Element{

	private static $instance = null;

	public static function get_instance() {
		if (!self::$instance)
			self::$instance = new self;
		return self::$instance;
	}

	public function init() {
		add_action('elementor/widgets/widgets_registered', array($this, 'widgets_registered'));
	}

	public function widgets_registered() {
 
      // We check if the Elementor plugin has been installed / activated.
		if (defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')) {
 

			$files_directory = get_template_directory() . '/elementor/*.php';
			
			$files = glob( $files_directory );

			foreach($files as $widgets){
			    require_once $widgets;
			}

		}
	}
}

Master_Addons_Custom_Element::get_instance()->init();