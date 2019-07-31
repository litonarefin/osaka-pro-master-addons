<?php

namespace Elementor;

class Master_Addons_Info_Service extends Widget_Base{

	public function get_name(){
		return "ma-main-service";
	}

	public function get_title(){
		return "Main Site: Info Service";
	}

	public function get_icon() {
		return 'ma-el-icon eicon-info-box';
	}

	public function get_categories() {
		return [ 'master-addons' ];
	}

	protected function _register_controls() {
			/**
			 * Master Headlines Content Section
			 */
			$this->start_controls_section(
				'ma_el_info_service_content',
				[
					'label' => esc_html__( 'Info Service', MELA_TD ),
				]
			);

			$this->add_control(
				'info_service_heading',
				[
					'label' => esc_html__( 'Heading', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Master Addons Heading', MELA_TD ),
				]
			);

			$this->add_control(
				'info_service_sub_heading',
				[
					'label' => esc_html__( 'Sub Heading', MELA_TD ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
					'default' => esc_html__( 'Enthusiastically iterate viral e-markets before diverse materials. Proactively e-enable empowered.', MELA_TD ),
				]
			);

			$this->add_control(
				'info_service_desc',
				[
					'label' => esc_html__( 'Description', MELA_TD ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
					'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.', MELA_TD ),
				]
			);

			$this->end_controls_section();



			/**
			 * Content Tab: Tabs
			 */
			$this->start_controls_section(
				'section_info_service_tabs',
				[
					'label'                 => esc_html__( 'Info & Services', MELA_TD )
				]
			);

			$repeater = new Repeater();

			// $repeater->add_control(
			// 	'info_service_icon',
			// 	[
			// 		'label'                 => esc_html__( 'Service Icon', MELA_TD ),
			// 		'type'                  => Controls_Manager::ICON,
			// 		'default'               => 'ti-cup',
			// 		// 'condition'             => [
			// 		// 	'accordion_tab_icon_show' => 'yes'
			// 		// ]
			// 	]
			// );


			$repeater->add_control(
				'info_service_icon_image',
				[
					'label' => __( 'Right Image', MELA_TD ),
					'type' => Controls_Manager::MEDIA,
					'default' => [
						'url' => Utils::get_placeholder_image_src(),
					],
				]
			);
			$repeater->add_group_control(
				Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail',
					'default' => 'full',
					'condition' => [
						'info_service_icon_image[url]!' => '',
					],
				]
			);


			$repeater->add_control(
				'info_service_title',
				[
					'label'                 => __( 'Service Title', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,
					'default'               => __( 'Service Title', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);			

			
			$repeater->add_control(
				'info_service_content',
				[
					'label'                 => esc_html__( 'Service Content', MELA_TD ),
					'type'                  => Controls_Manager::WYSIWYG,
					'default'               => esc_html__( 'Ut enim ad minim veniam,  perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.', MELA_TD ),
					'dynamic'               => [ 'active' => true ],
					// 'condition'             => [
					// 	'content_type'	=> 'content',
					// ],
				]
			);

			$this->add_control(
				'info_service_tabs',
				[
					'type'                  => Controls_Manager::REPEATER,
					'default'               => [
						[ 'info_service_title' => esc_html__( 'Lorem Ipsum #01', MELA_TD ) ],
						[ 'info_service_title' => esc_html__( 'Lorem Ipsum #02', MELA_TD ) ],
						[ 'info_service_title' => esc_html__( 'Lorem Ipsum #03', MELA_TD ) ],
					],
					'fields'                => array_values( $repeater->get_controls() ),
					'title_field'           => '{{info_service_title}}',
				]
			);

			$this->end_controls_section();



	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$id_int		= substr( $this->get_id_int(), 0, 3 );

		$this->add_render_attribute( 'info-service', [
			'class'                 => 'ma-site-info-service',
			'id'                    => 'ma-site-info-service-'.esc_attr( $this->get_id() ),
			'data-info-service-id'     => esc_attr( $this->get_id() )
		] );

			
		?>



			<section class="ma-home-info text-center">
				<div class="container">
					<h2 class="ma-section-title blue">
						<?php echo esc_html($settings['info_service_heading']);?>
					</h2>
					<h4 class="ma-sub-heading">
						<?php echo esc_html($settings['info_service_sub_heading']);?>
					</h4>
					<p class="ma-section-description">
						<?php echo esc_html($settings['info_service_desc']);?>
					</p>

					<div class="row">
						<?php foreach( $settings['info_service_tabs'] as $index => $tab ) {

							$tab_count = $index+1;
							$tab_title_setting_key = $this->get_repeater_setting_key('info_service_title', 'info_service_tabs', $index);
							$tab_content_setting_key = $this->get_repeater_setting_key('info_service_content', 'info_service_tabs', $index);				
						?>
							<div class="col-md-4">
								<div class="home-info-item">
									<div class="item-icon" style="background: url('<?php echo esc_url($tab['info_service_icon_image']['url']); ?>') center no-repeat">
										<i class="<?php echo esc_attr( $tab['info_service_icon'] ); ?>"></i>
									</div><!-- /.item-icon -->

									<div class="item-details">
										<h4 class="item-title">
											<a href="#">
												<?php echo $tab['info_service_title']; ?>
											</a>
										</h4><!-- /.item-title -->

										<?php echo $tab['info_service_content']; ?>
										
									</div>
								</div>
							</div>

						<?php } ?>
						
					</div>
				</div>
			</section><!-- /.ma-home-info -->


		<?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Info_Service );