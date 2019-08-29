<?php

namespace Elementor;

class Master_Addons_Main_Site_Testimonial extends Widget_Base{

	public function get_name(){
		return "ma-main-testimonial";
	}

	public function get_title(){
		return "Main Site: Testimonial";
	}

	public function get_icon() {
		return 'ma-el-icon eicon-testimonial';
	}

	public function get_categories() {
		return [ 'master-addons' ];
	}

	protected function _register_controls() {
			/**
			 * Master Headlines Content Section
			 */
			$this->start_controls_section(
				'ma_el_main_site_testimonial_content',
				[
					'label' => esc_html__( 'Testimonial', MELA_TD ),
				]
			);

			$this->add_control(
				'main_site_testimonial_heading',
				[
					'label' => esc_html__( 'Heading', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'What Clients are Saying', MELA_TD ),
				]
			);

			$this->add_control(
				'main_site_testimonial_sub_heading',
				[
					'label' => esc_html__( 'Sub Heading', MELA_TD ),
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
				'section_main_site_testimonial_tabs',
				[
					'label'                 => esc_html__( 'Testimonials', MELA_TD )
				]
			);

			$repeater = new Repeater();



			$repeater->add_control(
				'main_site_testimonial_title',
				[
					'label'                 => __( 'Client Name', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,
					'default'               => __( 'John Doe', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);			

			$repeater->add_control(
				'main_site_testimonial_designation',
				[
					'label'                 => __( 'Client Designation', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,
					'default'               => __( 'Co-Founder', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);			

			
			$repeater->add_control(
				'main_site_testimonial_content',
				[
					'label'                 => esc_html__( 'Testimonial Content', MELA_TD ),
					'type'                  => Controls_Manager::WYSIWYG,
					'default'               => esc_html__( 'Ut enim ad minim veniam,  perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.', MELA_TD ),
					'dynamic'               => [ 'active' => true ],
					// 'condition'             => [
					// 	'content_type'	=> 'content',
					// ],
				]
			);



			$repeater->add_control(
				'main_site_testimonial_image',
				[
					'label' => __( 'Client Image', MELA_TD ),
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
						'main_site_testimonial_image[url]!' => '',
					],
				]
			);

			$this->add_control(
				'main_site_testimonial_tabs',
				[
					'type'                  => Controls_Manager::REPEATER,
					'default'               => [
						[ 'main_site_testimonial_title' => esc_html__( 'Jack Sparrow', MELA_TD ) ],
						[ 'main_site_testimonial_title' => esc_html__( 'John Doe', MELA_TD ) ],
						[ 'main_site_testimonial_title' => esc_html__( 'Jack Sparrow', MELA_TD ) ],
					],
					'fields'                => array_values( $repeater->get_controls() ),
					'title_field'           => '{{main_site_testimonial_title}}',
				]
			);

			$this->end_controls_section();



	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$id_int		= substr( $this->get_id_int(), 0, 3 );

		$this->add_render_attribute( 'info-testimonial', [
			'class'                 => 'ma-site-info-service',
			'id'                    => 'ma-site-info-service-'.esc_attr( $this->get_id() ),
			'data-info-service-id'     => esc_attr( $this->get_id() )
		] );

			
		?>




		<section class="ma-home-testimonial text-center">
			<div class="testimonial-bg"></div><!-- /.testimonial-bg -->
			<div class="container">
				<h2 class="ma-section-title">
					<?php echo esc_html($settings['main_site_testimonial_heading']);?>
				</h2><!-- /.ma-section-title -->
				<p class="ma-section-description">
					<?php echo esc_html($settings['main_site_testimonial_sub_heading']);?>
				</p><!-- /.ma-section-description -->

				<div class="row">
					<?php foreach( $settings['main_site_testimonial_tabs'] as $index => $tab ) {

						$tab_count = $index+1;
						$tab_title_setting_key = $this->get_repeater_setting_key('main_site_testimonial_title', 'main_site_testimonial_tabs', $index);
						$tab_content_setting_key = $this->get_repeater_setting_key('main_site_testimonial_content', 'main_site_testimonial_tabs', $index);				
					?>
						<div class="col-md-4">
							<div class="ma-testimonial-item">
								<div class="item-top">
									<p>
										<?php 
										// $content = preg_replace('#^<\/p>|<p>$#', '', $tab['main_site_testimonial_content']);
										// echo do_shortcode($content);
										echo do_shortcode( htmlspecialchars_decode ( $tab['main_site_testimonial_content'])); ?>
									</p>
								</div><!-- /.item-top -->

								<div class="item-details">
									<div class="avatar">
										<img class="rounded-circle" src="<?php echo esc_url($tab['main_site_testimonial_image']['url']); ?>" alt="<?php echo get_post_meta( $tab['main_site_testimonial_image']['id'], '_wp_attachment_image_alt', true);?>">
									</div><!-- /.avatar -->
									
									<h4 class="name">
										<a href="#">
											<?php echo $tab['main_site_testimonial_title']; ?>
										</a>
									</h4><!-- /.name -->

									<span class="designation">										
										<?php echo $tab['main_site_testimonial_designation']; ?>
									</span><!-- /.designation -->

								</div><!-- /.item-details -->
							</div><!-- /.ma-testimonial-item -->
						</div>
					<?php } ?>

				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.ma-home-testimonial -->



		<?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Main_Site_Testimonial );