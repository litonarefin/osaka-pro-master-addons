<?php

namespace Elementor;

class Master_Addons_Main_Banner extends Widget_Base{

	public function get_name(){
		return "ma-main-banner";
	}

	public function get_title(){
		return "Main Site: Main Banner";
	}

	public function get_icon() {
		return 'ma-el-icon eicon-banner';
	}

	public function get_categories() {
		return [ 'master-addons' ];
	}

	protected function _register_controls() {
			/**
			 * Master Headlines Content Section
			 */
			$this->start_controls_section(
				'ma_el_banner_content',
				[
					'label' => esc_html__( 'Banner', MELA_TD ),
				]
			);

			$this->add_control(
				'banner_intro_heading',
				[
					'label' => esc_html__( 'Intro Heading', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Introducing', MELA_TD ),
				]
			);

			$this->add_control(
				'banner_heading',
				[
					'label' => esc_html__( 'Heading', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Master Addons', MELA_TD ),
				]
			);

			$this->add_control(
				'banner_content',
				[
					'label' => esc_html__( 'Content', MELA_TD ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
					'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', MELA_TD ),
				]
			);


			$this->add_control(
				'banner_button_one_text',
				[
					'label' => esc_html__( 'Button 1 Text', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'View widgets', MELA_TD ),
				]
			);


			$this->add_control(
				'banner_button_one_link',
				[
					'label' => __( 'Button 1 Link', MELA_TD ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'https://master-addons.com/widgets', MELA_TD ),
					'label_block' => true,
					'default' => [
						'url' => '#',
						'is_external' => true,
					],
					'show_external' => true,
				]
			);


			$this->add_control(
				'banner_button_two_text',
				[
					'label' => esc_html__( 'Button 2 Text', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Watch video', MELA_TD ),
				]
			);


			$this->add_control(
				'banner_button_two_link',
				[
					'label' => __( 'Button 2 Link', MELA_TD ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'https://master-addons.com/widgets', MELA_TD ),
					'label_block' => true,
					'default' => [
						'url' => '#',
						'is_external' => true,
					],
					'show_external' => true,
				]
			);


			$this->add_control(
				'banner_image',
				[
					'label' => __( 'Right Image', MELA_TD ),
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
						'banner_image[url]!' => '',
					],
				]
			);


			$this->end_controls_section();



	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		if( $settings['banner_button_one_link']['is_external'] ) {
			$this->add_render_attribute( 'banner_button_one', 'target', '_blank' );
		}
		
		if( $settings['banner_button_one_link']['nofollow'] ) {
			$this->add_render_attribute( 'banner_button_one', 'rel', 'nofollow' );
		}

		if( $settings['banner_button_two_link']['is_external'] ) {
			$this->add_render_attribute( 'banner_button_two', 'target', '_blank' );
		}
		
		if( $settings['banner_button_two_link']['nofollow'] ) {
			$this->add_render_attribute( 'banner_button_two', 'rel', 'nofollow' );
		}

		// Banner Right Image
		$banner_image = $this->get_settings_for_display( 'banner_image' );
		$banner_image_url_src = wp_get_attachment_image_src( $banner_image['id'], 'full', $settings );
		if( empty( $banner_image_url_src ) ) {
			$banner_image_url = $banner_image['url'];
		} else {
			$banner_image_url = $banner_image_url_src[0];
		}

		?>
			<section class="ma-home-banner">
				<div class="container">
					<div class="row">
						<div class="col-lg-7">
							
							<h4 class="ma-banner-intro-title">
								<?php echo esc_html($settings['banner_intro_heading']);?>
							</h4>

							<h1 class="ma-banner-title">
								<?php echo esc_html($settings['banner_heading']);?>
							</h1>
							<p>
								<?php echo esc_html($settings['banner_content']);?>
							</p>

							<div class="ma-home-btn-group">
				              	<a 
					                title="<?php echo $settings['banner_button_one_text'];?>" 
					                class="ma-home-btn"
					                href="<?php echo esc_url_raw( $settings['banner_button_one_link']['url'] );?>" 
									<?php echo $this->get_render_attribute_string( 'banner_button_one' ); ?>
				               	>
				                  	<?php echo esc_html($settings['banner_button_one_text']);?>
				              	</a>

				              	<a 
					                title="<?php echo $settings['banner_button_two_text'];?>" 
					                class="ma-home-btn"
					                href="<?php echo esc_url_raw( $settings['banner_button_two_link']['url'] );?>" 
									<?php echo $this->get_render_attribute_string( 'banner_button_two' ); ?>
					                data-nojs="false"
				               	>
				                  	<?php echo esc_html($settings['banner_button_two_text']);?>
				              	</a>

							</div><!-- /.btn-group -->
						</div>
						<div class="col-lg-5">
							<img src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo get_post_meta( $banner_image['id'], '_wp_attachment_image_alt', true);?>">
						</div>
					</div><!-- /.row -->
				</div><!-- /.container -->
			</section><!-- /.banner -->



		<?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Main_Banner );