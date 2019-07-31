<?php

namespace Elementor;

class Master_Addons_Site_Widgets extends Widget_Base{

	public function get_name(){
		return "ma-main-widgets";
	}

	public function get_title(){
		return "Main Site: Widgets";
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
				'ma_el_widgets_content',
				[
					'label' => esc_html__( 'Widgets Details', MELA_TD ),
				]
			);

			$this->add_control(
				'widgets_heading',
				[
					'label' => esc_html__( 'Heading', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Master Addons Widgets', MELA_TD ),
				]
			);

			$this->add_control(
				'widgets_sub_heading',
				[
					'label' => esc_html__( 'Sub Heading', MELA_TD ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
					'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.', MELA_TD ),
				]
			);



			$this->add_control(
				'widgets_button_text',
				[
					'label' => esc_html__( 'All Widgets Text', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Check all 50+ widgets', MELA_TD ),
				]
			);



			$this->add_control(
				'widgets_button_link',
				[
					'label' => __( 'All Widgets Link', MELA_TD ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'https://master-addons.com/widgets', MELA_TD ),
					'label_block' => true,
					'default' => [
						'url' => '#',
						'is_external' => false,
					],
				]
			);

			$this->end_controls_section();



			/**
			 * Content Tab: Tabs
			 */
			$this->start_controls_section(
				'section_widgets_tabs',
				[
					'label'                 => esc_html__( 'Widgets', MELA_TD )
				]
			);

			$repeater = new Repeater();

			$repeater->add_control(
				'widgets_icon',
				[
					'label'                 => esc_html__( 'Widget Icon', MELA_TD ),
					'type'                  => Controls_Manager::ICON,
					'default'               => 'ti-cup',
					// 'condition'             => [
					// 	'accordion_tab_icon_show' => 'yes'
					// ]
				]
			);


			$repeater->add_control(
				'widgets_title',
				[
					'label'                 => __( 'Widget Title', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,
					'default'               => __( 'Widgets Title', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);			

			
			$repeater->add_control(
				'widgets_content',
				[
					'label'                 => esc_html__( 'Widget Content', MELA_TD ),
					'type'                  => Controls_Manager::WYSIWYG,
					'default'               => esc_html__( 'Ut enim ad minim veniam,  perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.', MELA_TD ),
					'dynamic'               => [ 'active' => true ],
					// 'condition'             => [
					// 	'content_type'	=> 'content',
					// ],
				]
			);

			$repeater->add_control(
				'widgets_link',
				[
					'label' => __( 'Widget Link', MELA_TD ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'https://master-addons.com/widgets', MELA_TD ),
					'label_block' => true,
					'default' => [
						'url' => '#',
						'is_external' => true,
					],
				]
			);

			$this->add_control(
				'widgets_tabs',
				[
					'type'                  => Controls_Manager::REPEATER,
					'default'               => [
						[ 'widgets_title' => esc_html__( 'MA Accordion', MELA_TD ) ],
						[ 'widgets_title' => esc_html__( 'MA Headlines', MELA_TD ) ],
						[ 'widgets_title' => esc_html__( 'MA Dual Headlines', MELA_TD ) ],
					],
					'fields'                => array_values( $repeater->get_controls() ),
					'title_field'           => '{{widgets_title}}',
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


		// Widgets Button 
		if( $settings['widgets_button_link']['is_external'] ) {
			$this->add_render_attribute( 'widgets_button', 'target', '_blank' );
		}
		
		if( $settings['widgets_button_link']['nofollow'] ) {
			$this->add_render_attribute( 'widgets_button', 'rel', 'nofollow' );
		}

			
		?>


			<section class="ma-home-widgets-section text-center">
				<div class="container">
					<h2 class="ma-section-title">
						<?php echo esc_html($settings['widgets_heading']);?>
					</h2><!-- /.section-title -->
					<p class="ma-section-description">
						<?php echo esc_html($settings['widgets_sub_heading']);?>
					</p><!-- /.section-description -->

					<div class="row">

						<?php foreach( $settings['widgets_tabs'] as $index => $tab ) {

							$tab_count = $index+1;
							$tab_title_setting_key = $this->get_repeater_setting_key('widgets_title', 'widgets_tabs', $index);
							$tab_content_setting_key = $this->get_repeater_setting_key('widgets_content', 'widgets_tabs', $index);


							// Widget Link 
							if( $tab['widgets_link']['is_external'] ) {
								$this->add_render_attribute( 'widget_link', 'target', '_blank' );
							}
							
							if( $tab['widgets_link']['nofollow'] ) {
								$this->add_render_attribute( 'widget_link', 'rel', 'nofollow' );
							}
											
						?>
						
							<div class="col-lg-3 col-md-6">
								<a 
									href="<?php echo esc_url_raw( $tab['widgets_link']['url'] );?>"
									<?php echo $this->get_render_attribute_string( 'widget_link' ); ?>>
									<div class="home-widgets-item">
										<div class="item-front">
											<div class="front-inner">
												<i class="<?php echo $tab['widgets_icon']; ?>"></i>
												<h4 class="item-title">
													<?php echo $tab['widgets_title']; ?>
												</h4><!-- /.item-title -->
											</div><!-- /.front-inner -->
										</div><!-- /.item-front -->
										<div class="item-back">
											<div class="back-inner">									<p>
													<?php echo $tab['widgets_content']; ?>
												</p>
											</div><!-- /.back-inner -->
										</div><!-- /.item-back -->
									</div>
								</a>
							</div>

						<?php } ?>


					</div><!-- /.row -->

					<div class="btn-container">
						<a 
							href="<?php echo esc_url_raw( $settings['widgets_button_link']['url'] );?>"
							class="ma-home-btn"
							<?php echo $this->get_render_attribute_string( 'widgets_button' ); ?>>
								<?php echo esc_html($settings['widgets_button_text']);?>
						</a>
					</div><!-- /.btn-container -->
				</div><!-- /.container -->
			</section><!-- /.ma-home-widgets-section -->



		<?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Site_Widgets );