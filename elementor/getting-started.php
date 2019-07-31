<?php
namespace Elementor;
class Master_Addons_Main_Site_Getting_Started extends Widget_Base{

	public function get_name(){
		return "ma-main-site-getting-started";
	}

	public function get_title(){
		return "Main Site: Getting Started";
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
				'ma_el_getting_started_content',
				[
					'label' => esc_html__( 'Heading Title', MELA_TD ),
				]
			);

			$this->add_control(
				'ma_el_getting_started_heading',
				[
					'label' => esc_html__( 'Heading', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Get started now', MELA_TD ),
				]
			);

			$this->add_control(
				'ma_el_getting_started_sub_heading',
				[
					'label' => esc_html__( 'Sub Heading', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt. ut labore et dolore magna aliqua.', MELA_TD ),
				]
			);



			$this->add_control(
				'getting_started_button_text',
				[
					'label' => esc_html__( 'Getting Started Text', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Free Download', MELA_TD ),
				]
			);


			$this->add_control(
				'getting_started_button_link',
				[
					'label' => __( 'Getting Started Link', MELA_TD ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'https://master-addons.com/widgets', MELA_TD ),
					'label_block' => true,
					'default' => [
						'url' => '#',
						'is_external' => true,
					],
				]
			);


			$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Getting Started Button 
		if( $settings['getting_started_button_link']['is_external'] ) {
			$this->add_render_attribute( 'getting_started', 'target', '_blank' );
		}
		
		if( $settings['getting_started_button_link']['nofollow'] ) {
			$this->add_render_attribute( 'getting_started', 'rel', 'nofollow' );
		}


		?>
		
			
			<section class="ma-home-free-trail text-center">
				<div class="container">
					<h2 class="ma-section-title white">
						<?php echo esc_html( $settings['ma_el_getting_started_heading'] ); ?>
					</h2>
					<p class="ma-section-description white">
						<?php echo esc_html( $settings['ma_el_getting_started_sub_heading'] ); ?>
					</p>

					<a 
						href="<?php echo esc_url_raw( $settings['getting_started_button_link']['url'] );?>"
						class="btn ma-home-btn"
						<?php echo $this->get_render_attribute_string( 'widgets_button' ); ?>>
							<?php echo esc_html($settings['getting_started_button_text']);?>
					</a>
				</div><!-- /.container -->	
			</section><!-- /.ma-home-free-trail -->

		<?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Main_Site_Getting_Started );