<?php
namespace Elementor;
class Master_Addons_Main_Site_Video extends Widget_Base{

	public function get_name(){
		return "ma-main-video-section";
	}

	public function get_title(){
		return "Main Site: Video Section";
	}

	public function get_icon() {
		return 'ma-el-icon eicon-slider-video';
	}

	public function get_categories() {
		return [ 'master-addons' ];
	}

	protected function _register_controls() {
			/**
			 * Master Video Section
			 */
			$this->start_controls_section(
				'ma_el_video_section_content',
				[
					'label' => esc_html__( 'Video Section Details', MELA_TD ),
				]
			);
			

			$this->add_control(
				'video_section_heading',
				[
					'label' => esc_html__( 'Heading', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Watch the Video', MELA_TD ),
				]
			);

			$this->add_control(
				'video_section_sub_heading',
				[
					'label' => esc_html__( 'Sub Heading', MELA_TD ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
					'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.', MELA_TD ),
				]
			);


			$this->add_control(
				'video_link',
				[
					'label' => __( 'Video Link', MELA_TD ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'https://www.youtube.com/watch?v=dWvW10QROXI', MELA_TD ),
					'label_block' => true,
					'default' => [
						'url' => '#',
						'is_external' => false,
					],
				]
			);

			$this->add_control(
				'video_section_image',
				[
					'label' => __( 'Video Image', MELA_TD ),
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
						'video_section_image[url]!' => '',
					],
				]
			);

			$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();


		// Video Section Button 
		if( $settings['video_link']['is_external'] ) {
			$this->add_render_attribute( 'video_section_button', 'target', '_blank' );
		}
		
		if( $settings['video_link']['nofollow'] ) {
			$this->add_render_attribute( 'video_section_button', 'rel', 'nofollow' );
		}


		// Video Section Image
		$video_section_image = $this->get_settings_for_display( 'video_section_image' );
		$video_section_image_url_src = wp_get_attachment_image_src( $video_section_image['id'], 'full', $settings );
		if( empty( $video_section_image_url_src ) ) {
			$video_section_image_url = $video_section_image['url'];
		} else {
			$video_section_image_url = $video_section_image_url_src[0];
		}
		?>
		

		<section class="ma-home-video-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<img src="<?php echo esc_url($video_section_image['url']); ?>" alt="<?php echo get_post_meta( $video_section_image['id'], '_wp_attachment_image_alt', true);?>">
					</div>
					<div class="col-lg-6">
						<h2 class="ma-section-title white">
							<?php echo esc_html($settings['video_section_heading']);?>
						</h2><!-- /.ma-section-title -->
						<p class="ma-section-description white">
							<?php echo esc_html($settings['video_section_sub_heading']);?>
						</p>
						<a 
							href="<?php echo esc_url_raw( $settings['video_section_link']['url'] );?>"
							class="popup-video"
							<?php echo $this->get_render_attribute_string( 'video_section_button' ); ?>>
								<img src="<?php echo get_template_directory_uri();?>/images/play.png" alt="<?php echo get_post_meta( $video_section_image['id'], '_wp_attachment_image_alt', true);?> Icon Image">
						</a>
					</div>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.video-section -->


		<?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Main_Site_Video());
