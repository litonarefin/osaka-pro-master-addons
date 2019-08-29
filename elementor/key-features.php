<?php

namespace Elementor;

class Master_Addons_Key_Features extends Widget_Base{

	public function get_name(){
		return "ma-main-key-features";
	}

	public function get_title(){
		return "Main Site: Key Features";
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
				'ma_el_key_features_content',
				[
					'label' => esc_html__( 'Key Features', MELA_TD ),
				]
			);

			$this->add_control(
				'key_features_heading',
				[
					'label' => esc_html__( 'Title', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Key Features', MELA_TD ),
				]
			);

			$this->add_control(
				'key_features_sub_heading',
				[
					'label' => esc_html__( 'Sub Heading', MELA_TD ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
					'default' => esc_html__( 'Reasons you’ll love this Element!', MELA_TD ),
				]
			);

			$this->add_control(
				'key_features_desc',
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
				'section_key_features_tabs',
				[
					'label'                 => esc_html__( 'Features', MELA_TD )
				]
			);

			$repeater = new Repeater();


			$repeater->add_control(
				'key_features_title',
				[
					'label'                 => __( 'Feature Title', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,
					'default'               => __( 'Layout Selection', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);			

			
			$this->add_control(
				'key_features_tabs',
				[
					'type'                  => Controls_Manager::REPEATER,
					'default'               => [
						[ 'key_features_title' => esc_html__( 'Layout Selection', MELA_TD ) ],
						[ 'key_features_title' => esc_html__( 'Unlimited Color Scheme', MELA_TD ) ],
						[ 'key_features_title' => esc_html__( 'Ten Style Variation', MELA_TD ) ],
						[ 'key_features_title' => esc_html__( 'Stunning Styling options', MELA_TD ) ],
					],
					'fields'                => array_values( $repeater->get_controls() ),
					'title_field'           => '{{key_features_title}}',
				]
			);

			$this->end_controls_section();



	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$id_int		= substr( $this->get_id_int(), 0, 3 );

		$this->add_render_attribute( 'key_features', [
			'class'                 => 'ma-site-key-feature',
			'id'                    => 'ma-site-key-feature-'.esc_attr( $this->get_id() ),
			'data-key-feature-id'     => esc_attr( $this->get_id() )
		] );

			
		?>



		<section 


		<?php echo $this->get_render_attribute_string( 'key_features' ); ?>>
		    <div class="ma-el-main-site-section__overlay"></div>
		    <div class="ma-el-main-site-section__inner-wrap">


		        <div class="wp-block-columns has-3-columns">
		        

		            <div class="wp-block-column">

		                <div class="ma-el-main-site-key-features__outer-wrap">
		                    <div class="ma-el-main-site-key-features">
		                        <div class="ma-el-main-site-ifb-left-right-wrap">
		                            <div class="ma-el-main-site-ifb-content">
		                                <div class="ma-el-main-site-ifb-left-title-image">
		                                    <div class="ma-el-main-site-ifb-image-icon-content ma-el-main-site-ifb-imgicon-wrap">
		                                        <div class="ma-el-main-site-ifb-icon-wrap">
		                                        	<span class="ma-el-main-site-ifb-icon">
		                                        		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
		                                        	</span>
		                                        </div>
		                                    </div>
		                                    <div class="ma-el-main-site-ifb-title-wrap">
		                                        <h4 class="ma-el-main-site-ifb-title"> Click to Tweet</h4></div>
		                                </div>
		                                <div class="ma-el-main-site-ifb-text-wrap"></div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>


		        </div>
		    </div>
		</section>




			<section class="ma-home-info text-center">
				<div class="container">
					<h2 class="ma-section-title blue">
						<?php echo esc_html($settings['key_features_heading']);?>
					</h2>
					<h4 class="ma-sub-heading">
						<?php echo esc_html($settings['key_features_sub_heading']);?>
					</h4>
					<p class="ma-section-description">
						<?php echo esc_html($settings['key_features_desc']);?>
					</p>

					<div class="row">
						<?php foreach( $settings['key_features_tabs'] as $index => $tab ) {

							$tab_count = $index+1;
							$tab_title_setting_key = $this->get_repeater_setting_key('key_features_title', 'key_features_tabs', $index);
							$tab_content_setting_key = $this->get_repeater_setting_key('key_features_content', 'key_features_tabs', $index);				
						?>



							<div class="col-md-4">

								<div class="home-info-item">
									<div class="item-icon banner-background-bg" data-image-src="<?php echo esc_url($tab['key_features_icon_image']['url']); ?>">
										<i class="<?php echo esc_attr( $tab['key_features_icon'] ); ?>"></i>
									</div><!-- /.item-icon -->

									<div class="item-details">
										<h4 class="item-title">
											<?php echo $tab['key_features_title']; ?>
										</h4><!-- /.item-title -->

										<p>
											<?php echo do_shortcode( $tab['key_features_content'] );?>
										</p>
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
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Key_Features );