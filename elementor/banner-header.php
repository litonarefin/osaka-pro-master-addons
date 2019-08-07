<?php
namespace Elementor;
class Master_Addons_Main_Site_Banner_Heading extends Widget_Base{

	public function get_name(){
		return "ma-site-widgets-banner";
	}

	public function get_title(){
		return "Main Site: All Widgets Banner";
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
				'ma_el_banner_header_content',
				[
					'label' => esc_html__( 'Heading Title', MELA_TD ),
				]
			);
			$this->add_control(
				'ma_el_banner_header_title',
				[
					'label' => esc_html__( 'Title', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Master Addons', MELA_TD ),
				]
			);

			$this->add_control(
				'ma_el_banner_header_subtitle',
				[
					'label' => esc_html__( 'Sub Title', MELA_TD ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
					'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga suscipit quidem dolores beatae atque at voluptas delectus.', MELA_TD ),
				]
			);

			// $this->add_control(
			// 	'ma_el_banner_header_alignment',
			// 	[
			// 		'label' => __( 'Alignment', MELA_TD ),
			// 		'type' => Controls_Manager::CHOOSE,
			// 		'options' => [
			// 			'left' => [
			// 				'title' => __( 'Left', MELA_TD ),
			// 				'icon' => 'fa fa-align-left',
			// 			],
			// 			'center' => [
			// 				'title' => __( 'Center', MELA_TD ),
			// 				'icon' => 'fa fa-align-center',
			// 			],
			// 			'right' => [
			// 				'title' => __( 'Right', MELA_TD ),
			// 				'icon' => 'fa fa-align-right',
			// 			],
			// 		],
			// 		'default' => 'center',
			// 		// 'prefix_class' => 'ma-el-section-heading-align-',
			// 	]
			// );

			// $this->add_control(
			// 	'ma_el_banner_header_color',
			// 	[
			// 		'label' => __( 'Heading Text Color', MELA_TD ),
			// 		'type' => Controls_Manager::COLOR,
			// 		'default' => '#393c3f',
			// 		// 'selectors' => [
			// 		// 	'{{WRAPPER}} .page-content-widgets-banner' => 'color: {{VALUE}}'
			// 		// ],
			// 	]
			// );

			// $this->add_control(
			// 	'ma_el_sub_banner_header_color',
			// 	[
			// 		'label' => __( 'Sub Heading Text Color', MELA_TD ),
			// 		'type' => Controls_Manager::COLOR,
			// 		'default' => '#78909c',
			// 		// 'selectors' => [
			// 		// 	'{{WRAPPER}} .page-content-section-description' => 'color: {{VALUE}}'
			// 		// ],
			// 	]
			// );

			$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'ma_el_site_banner_header_wrapper', [
				'class' => ['ma-widgets-banner']
			]
		);

		?>

			<section <?php echo $this->get_render_attribute_string( 'ma_el_site_banner_header_wrapper' ); ?>>
				<div class="container">
					<h2 class="ma-banner-section-title">
						<?php echo esc_html( $settings['ma_el_banner_header_title'] ); ?>
					</h2>
					<p class="ma-banner-section-description">
						<?php echo esc_html( $settings['ma_el_banner_header_subtitle'] ); ?>
					</p>
				</div>
			</section>


		<?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Main_Site_Banner_Heading );