<?php
namespace Elementor;
class Master_Addons_Main_Site_Refund_Section extends Widget_Base{

	public function get_name(){
		return "ma-site-pricing-refund";
	}

	public function get_title(){
		return "Main Site: Pricing Refund";
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
				'ma_el_pricing_refund_content',
				[
					'label' => esc_html__( 'Heading Title', MELA_TD ),
				]
			);
			$this->add_control(
				'ma_el_pricing_refund_title',
				[
					'label' => esc_html__( 'Title', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Our refund policy', MELA_TD ),
				]
			);

			$this->add_control(
				'ma_el_pricing_refund_subtitle',
				[
					'label' => esc_html__( 'Sub Title', MELA_TD ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
					'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.', MELA_TD ),
				]
			);

			$this->add_control(
				'ma_el_pricing_refund_desc',
				[
					'label' => esc_html__( 'Sub Title', MELA_TD ),
					'type' => Controls_Manager::WYSIWYG,
					'label_block' => true,
					'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. ullamco laboris nisi ut aliquip ex ea commodo consequat. .', MELA_TD ),
				]
			);


			$this->add_control(
				'ma_el_pricing_refund_bg_image',
				[
					'label' => __( 'Background Image', MELA_TD ),
					'type' => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);
			$this->add_group_control(
				Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail',
					'default' => 'full',
					'condition' => [
						'ma_el_pricing_refund_bg_image[url]!' => '',
					],
				]
			);


			$this->add_control(
				'ma_el_pricing_refund_left_image',
				[
					'label' => __( 'Left Image', MELA_TD ),
					'type' => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);
			$this->add_group_control(
				Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail',
					'default' => 'full',
					'condition' => [
						'ma_el_pricing_refund_left_image[url]!' => '',
					],
				]
			);
			


			$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'ma_el_site_pricing_refund_wrapper', [
				'class' => [ 
							'page-heading', 
							'text-center'
				],

			]
		);


		?>


		<section class="refund-section" style="background: url('<?php echo esc_url( $settings['ma_el_pricing_refund_bg_image']['url'] ); ?>');">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<img src="<?php echo esc_url( $settings['ma_el_pricing_refund_left_image']['url'] ); ?>" alt="<?php echo get_post_meta( $settings['ma_el_pricing_refund_left_image']['id'], '_wp_attachment_image_alt', true);?>" >
		      		</div>
					<div class="col-lg-8">
						<h2 class="section-title white">
							<?php echo esc_html( $settings['ma_el_pricing_refund_title'] ); ?>
						</h2>
						<h4 class="sub-heading white">
							<?php echo esc_html( $settings['ma_el_pricing_refund_subtitle'] ); ?>
						</h4>
						<div class="section-description">
							<?php echo $this->parse_text_editor( $settings['ma_el_pricing_refund_desc'] ); ?>
						</div>
					</div>
				</div>
			</div><!-- /.container -->
		</section><!-- /.refund-section -->



		<?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Main_Site_Refund_Section );