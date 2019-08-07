<?php
namespace Elementor;
class Master_Addons_Main_Site_All_Widgets_Section extends Widget_Base{

	public function get_name(){
		return "ma-site-widgets-section";
	}

	public function get_title(){
		return "Main Site: All Widgets Section";
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
				'ma_el_all_widgets_content',
				[
					'label' => esc_html__( 'Heading Title', MELA_TD ),
				]
			);
			$this->add_control(
				'ma_el_all_widgets_title',
				[
					'label' => esc_html__( 'Title', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Master Addons', MELA_TD ),
				]
			);

			$this->add_control(
				'ma_el_all_widgets_subtitle',
				[
					'label' => esc_html__( 'Sub Title', MELA_TD ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
					'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga suscipit quidem dolores beatae atque at voluptas delectus.', MELA_TD ),
				]
			);

			// $this->end_controls_section();



			// /**
			//  * Content Tab: Tabs
			//  */
			// $this->start_controls_section(
			// 	'section_widgets_tabs',
			// 	[
			// 		'label'                 => esc_html__( 'Widgets', MELA_TD )
			// 	]
			// );

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

			
			// $repeater->add_control(
			// 	'widgets_content',
			// 	[
			// 		'label'                 => esc_html__( 'Widget Content', MELA_TD ),
			// 		'type'                  => Controls_Manager::WYSIWYG,
			// 		'default'               => esc_html__( 'Ut enim ad minim veniam,  perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.', MELA_TD ),
			// 		'dynamic'               => [ 'active' => true ],
			// 		// 'condition'             => [
			// 		// 	'content_type'	=> 'content',
			// 		// ],
			// 	]
			// );

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

		$this->add_render_attribute( 'ma_el_site_all_widgets_wrapper', [
				'class' => ['ma-widgets-section','ma-home-widgets-section','text-center']
			]
		);

		?>

			<section <?php echo $this->get_render_attribute_string( 'ma_el_site_all_widgets_wrapper' ); ?>>
				<div class="container">
					<div class="section-top">
						<h2 class="ma-widget-section-title">
							<?php echo esc_html( $settings['ma_el_all_widgets_title'] ); ?>
						</h2>
						<p class="ma-widget-section-description">
							<?php echo esc_html( $settings['ma_el_all_widgets_subtitle'] ); ?>
						</p>
					</div>


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
								<a href="<?php echo esc_url_raw( $tab['widgets_link']['url'] );?>"
									<?php echo $this->get_render_attribute_string( 'widget_link' ); ?>>
									<div class="home-widgets-item">				
										<i class="<?php echo $tab['widgets_icon']; ?>"></i>
										<h4 class="item-title">
											<?php echo $tab['widgets_title']; ?>
										</h4><!-- /.item-title -->
									</div>
								</a>
							</div>

						<?php } ?>

						

					</div><!-- /.row -->

				</div>
			</section>			


		<?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Main_Site_All_Widgets_Section );