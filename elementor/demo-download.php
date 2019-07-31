<?php
namespace Elementor;
class Master_Addons_Demo_Download extends Widget_Base{

	public function get_name(){
		return "demo-download";
	}

	public function get_title(){
		return "Main Site: Demo & Download Button";
	}

	public function get_icon() {
		return 'ma-el-icon eicon-download-button';
	}

	public function get_categories() {
		return [ 'master-addons' ];
	}

	protected function _register_controls() {
			/**
			 * Master Headlines Content Section
			 */
			$this->start_controls_section(
				'ma_el_demo_download_content',
				[
					'label' => esc_html__( 'Demo & Download', MELA_TD ),
				]
			);

			$this->add_control(
				'product_demo_text',
				[
					'label' => esc_html__( 'Demo Title', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Demo', MELA_TD ),
				]
			);


			$this->add_control(
				'product_demo_link',
				[
					'label' => __( 'Demo Link', MELA_TD ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'https://master-addons.com/demo', MELA_TD ),
					'label_block' => true,
					'default' => [
						'url' => '#',
						'is_external' => true,
					],
				]
			);


			$this->add_control(
				'product_download_text',
				[
					'label' => esc_html__( 'Download Title', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Download', MELA_TD ),
				]
			);


			$this->add_control(
				'product_download_link',
				[
					'label' => __( 'Download Link', MELA_TD ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'https://master-addons.com/demo', MELA_TD ),
					'label_block' => true,
					'default' => [
						'url' => '#',
						'is_external' => true,
					],
					'show_external' => true,
				]
			);


			$this->add_control(
				'product_affiliate_text',
				[
					'label' => esc_html__( 'Affiliate Title', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Affiliate', MELA_TD ),
				]
			);


			$this->add_control(
				'product_affiliate_link',
				[
					'label' => __( 'Affiliate Link', MELA_TD ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'https://master-addons.com/demo', MELA_TD ),
					'label_block' => true,
					'default' => [
						'url' => '#',
						'is_external' => true
					],
					'show_external' => true,
				]
			);

			$this->end_controls_section();


			$this->start_controls_section(
				'ma_el_demo_download_content_alignment',
				[
					'label' => esc_html__( 'Alignment', MELA_TD ),
				]
			);

			$this->add_responsive_control(
				'ma_el_demo_download_alignment',
				[
					'label' => esc_html__( 'Alignment', MELA_TD ),
					'type' => Controls_Manager::CHOOSE,
					'label_block' => true,
					'options' => [
						'left' => [
							'title' => esc_html__( 'Left', MELA_TD ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', MELA_TD ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', MELA_TD ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => 'left',
					'label_block' => true,
					'selectors' => [
						'{{WRAPPER}}' => 'text-align: {{VALUE}};',
					],
				]
			);

			$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Demo Link
		if( $settings['product_demo_link']['is_external'] ) {
			$this->add_render_attribute( 'product_demo_button', 'target', '_blank' );
		}
		
		if( $settings['product_demo_link']['nofollow'] ) {
			$this->add_render_attribute( 'product_demo_button', 'rel', 'nofollow' );
		}

		// Download Link
		if( $settings['product_download_link']['is_external'] ) {
			$this->add_render_attribute( 'product_download_button', 'target', '_blank' );
		}
		
		if( $settings['product_download_link']['nofollow'] ) {
			$this->add_render_attribute( 'product_download_button', 'rel', 'nofollow' );
		}

		// Affiliate Link
		if( $settings['product_affiliate_link']['is_external'] ) {
			$this->add_render_attribute( 'product_affiliate_button', 'target', '_blank' );
		}
		
		if( $settings['product_affiliate_link']['nofollow'] ) {
			$this->add_render_attribute( 'product_affiliate_button', 'rel', 'nofollow' );
		}

		?>
		
		    <div class="demo-download-affiliate">
		      
		        <?php if( $settings['product_demo_text'] && $settings['product_demo_link']['url'] ){ ?>
		          <div class="gem-button-container gem-button-position-inline">
		              	<a
			                title="<?php echo esc_html($settings['product_demo_text']);?>" 
			                class="gem-button gem-button-demo gem-button-size-medium gem-button-style-flat gem-button-text-weight-normal gem-button-no-uppercase thirstylink" 
			                href="<?php echo esc_url_raw( $settings['product_demo_link']['url'] );?>"
			                data-nojs="false"
			                <?php echo $this->get_render_attribute_string( 'product_demo_button' ); ?>
		            	>
		                  	<?php echo esc_html($settings['product_demo_text']);?>
		            	</a>
		        	</div>
		    	<?php } ?>


		        <?php if( $settings['product_download_text'] && $settings['product_download_link']['url'] ){ ?>
		          	<div class="gem-button-container gem-button-position-inline">
		              	<a 
			                title="<?php echo $settings['product_download_text'];?>" 
			                class="gem-button gem-button-download gem-button-size-medium gem-button-style-flat gem-button-text-weight-normal gem-button-no-uppercase thirstylink" 
			                href="<?php echo esc_url_raw( $settings['product_download_link']['url'] );?>" 
							<?php echo $this->get_render_attribute_string( 'product_download_button' ); ?>
			                data-nojs="false"
		               	>
		                  	<?php echo esc_html($settings['product_download_text']);?>
		              	</a>
		          	</div>
		        <?php } ?>

				
				<?php if( $settings['product_affiliate_text'] && $settings['product_affiliate_link']['url'] ){ ?>
		            <div class="gem-button-container gem-button-position-inline">
		                <a 
		                	title="<?php echo $product_affiliate_text;?>" 
		                	class="gem-button gem-button-hosting gem-button-size-medium gem-button-style-flat gem-button-text-weight-normal gem-button-no-uppercase thirstylink" 
		                	href="<?php echo esc_url_raw( $settings['product_affiliate_link']['url'] );?>" 
		                	<?php echo $this->get_render_attribute_string( 'product_affiliate_button' ); ?>
		                	data-nojs="false"
		                >		                
		                    <?php echo esc_html($settings['product_affiliate_text']);?>
		                </a>
		            </div>
		        <?php } ?>

		    </div>


		<?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Demo_Download );