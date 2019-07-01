<?php
namespace Elementor;
class Master_Addons_Demo_Heading extends Widget_Base{

	public function get_name(){
		return "section-title";
	}

	public function get_title(){
		return "Demo: Section Title";
	}

	public function get_icon() {
		return 'ma-el-icon eicon-heading';
	}

	public function get_categories() {
		return [ 'master-addons' ];
	}

	protected function _register_controls() {
			/**
			 * Master Headlines Content Section
			 */
			$this->start_controls_section(
				'ma_el_heading_content',
				[
					'label' => esc_html__( 'Heading Title', MELA_TD ),
				]
			);
			$this->add_control(
				'ma_el_heading_title',
				[
					'label' => esc_html__( 'Title', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Master Addons', MELA_TD ),
				]
			);

			$this->add_responsive_control(
				'ma_el_heading_alignment',
				[
					'label' => esc_html__( 'Alignment', MELA_TD ),
					'type' => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', MELA_TD ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', MELA_TD ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', MELA_TD ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => 'center',
					'label_block' => true,
					'selectors' => [
						'{{WRAPPER}}' => 'text-align: {{VALUE}};',
					],
				]
			);

			$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		
			<div class="section-top">
				<h2 class="section-title"> 
					<?php echo esc_html( $settings['ma_el_heading_title'] ); ?>
				<span></span></h2>
			</div>
		<?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Demo_Heading );