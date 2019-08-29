<?php
namespace Elementor;
class Master_Addons_Main_Site_Pricing_Heading extends Widget_Base{

	public function get_name(){
		return "ma-site-pricing-heading";
	}

	public function get_title(){
		return "Main Site: Pricing Heading";
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
				'ma_el_pricing_heading_content',
				[
					'label' => esc_html__( 'Heading Title', MELA_TD ),
				]
			);
			$this->add_control(
				'ma_el_pricing_heading_title',
				[
					'label' => esc_html__( 'Title', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Buy 14 Days Free, No Questions Asked Money back Guarantee', MELA_TD ),
				]
			);

			$this->add_control(
				'ma_el_pricing_heading_subtitle',
				[
					'label' => esc_html__( 'Sub Title', MELA_TD ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
					'default' => esc_html__( 'Simple Pricing, Select Your Appropriate Plan', MELA_TD ),
				]
			);

			$this->add_control(
				'ma_el_pricing_heading_alignment',
				[
					'label' => __( 'Alignment', MELA_TD ),
					'type' => Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', MELA_TD ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', MELA_TD ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => __( 'Right', MELA_TD ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => 'center',
					'prefix_class' => 'ma-el-section-heading-align-',
					'selectors' => [
						'{{WRAPPER}} .ma-page-content-section .section-top' => 'text-align: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'ma_el_pricing_heading_color',
				[
					'label' => __( 'Heading Text Color', MELA_TD ),
					'type' => Controls_Manager::COLOR,
					'default' => '#393c3f',
					'selectors' => [
						'{{WRAPPER}} .page-content-section-title' => 'color: {{VALUE}}'
					],
				]
			);

			$this->add_control(
				'ma_el_sub_pricing_heading_color',
				[
					'label' => __( 'Sub Heading Text Color', MELA_TD ),
					'type' => Controls_Manager::COLOR,
					'default' => '#78909c',
					'selectors' => [
						'{{WRAPPER}} .page-content-section-description' => 'color: {{VALUE}}'
					],
				]
			);

			$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'ma_el_site_pricing_heading_wrapper', [
				'class' => [ 
							'page-heading', 
							'text-center'
				],

			]
		);

		?>


			<section <?php echo $this->get_render_attribute_string( 'ma_el_site_pricing_heading_wrapper' ); ?>>
				<div class="bottom-arrow"></div><!-- /.bottom-arrow -->
				<div class="container">
					<div class="page-heading-titles">
						<h3 class="heading-sub-title">
							<?php echo esc_html( $settings['ma_el_pricing_heading_title'] ); ?>
						</h3>
						<h2 class="heading-page-title">
							<?php echo esc_html( $settings['ma_el_pricing_heading_subtitle'] ); ?>
						</h2>
					</div><!-- /.page-heading-titles -->
				</div><!-- /.container -->
			</section><!-- /.page-heading -->




		<?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Main_Site_Pricing_Heading );