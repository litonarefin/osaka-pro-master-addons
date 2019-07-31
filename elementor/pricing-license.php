<?php
namespace Elementor;
class Master_Addons_Demo_Pricing_License extends Widget_Base{

	public function get_name(){
		return "pricing-license";
	}

	public function get_title(){
		return "Main Site: Pricing License";
	}

	public function get_icon() {
		return 'ma-el-icon eicon-price-table';
	}

	public function get_categories() {
		return [ 'master-addons' ];
	}


	protected function _register_controls() {

			/**
			 * Master Headlines Content Section
			 */
			$this->start_controls_section(
				'ma_el_pricing_license_content',
				[
					'label' => esc_html__( 'Pricing Lists', MELA_TD ),
				]
			);

			$this->add_control(
				'personal_title',
				[
					'label' => esc_html__( 'Single Pricing Title', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Personal', MELA_TD ),
				]
			);

			$this->add_control(
				'developer_title',
				[
					'label' => esc_html__( 'Developer Pricing Title', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Developer', MELA_TD ),
				]
			);

			$this->add_control(
				'extended_title',
				[
					'label' => esc_html__( 'Extended Pricing Title', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Extended', MELA_TD ),
				]
			);

			$this->end_controls_section();


			/* Comparision Section */

			$this->start_controls_section(
				'pricing_license_tabs',
				[
					'label'                 => esc_html__( 'License Features', MELA_TD )
				]
			);

			$repeater = new Repeater();

			$repeater->add_control(
				'license_title',
				[
					'label'                 => __( 'License Feature', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,
					'default'               => __( 'Lifetime Update', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);


			$repeater->add_control(
				'personal_feature',
				[
					'label'                 => __( 'Personal Feature', MELA_TD ),
					'type'                  => Controls_Manager::SWITCHER,
					'placeholder'               => __( 'Yes/No (Checked for \'yes\')', MELA_TD ),
					'default'               => 'yes',
					'label_on'              => __( 'Yes', MELA_TD ),
					'label_off'             => __( 'No', MELA_TD ),
					'return_value'          => 'yes',
				]
			);
			$repeater->add_control(
				'developer_feature',
				[
					'label'                 => __( 'Developer Feature', MELA_TD ),
					'type'                  => Controls_Manager::SWITCHER,
					'placeholder'               => __( 'Yes/No (Checked for \'yes\')', MELA_TD ),
					'default'               => 'yes',
					'label_on'              => __( 'Yes', MELA_TD ),
					'label_off'             => __( 'No', MELA_TD ),
					'return_value'          => 'yes',
				]
			);

			$repeater->add_control(
				'extended_feature',
				[
					'label'                 => __( 'Extended Feature', MELA_TD ),
					'type'                  => Controls_Manager::SWITCHER,
					'placeholder'               => __( 'Yes/No (Checked for \'yes\')', MELA_TD ),
					'default'               => 'yes',
					'label_on'              => __( 'Yes', MELA_TD ),
					'label_off'             => __( 'No', MELA_TD ),
					'return_value'          => 'yes',
				]
			);

			$this->add_control(
				'pricing_license',
				[
					'type'                  => Controls_Manager::REPEATER,
					'default'               => [
						[ 'license_title' => esc_html__( 'Single Domains', MELA_TD ) ],
						[ 'license_title' => esc_html__( '24/7 Support', MELA_TD ) ],
						[ 'license_title' => esc_html__( 'Lifetime Updates', MELA_TD ) ],
					],
					'fields'                => array_values( $repeater->get_controls() ),
					'title_field'           => '{{license_title}}',
				]
			);

			$this->end_controls_section();



			$this->start_controls_section(
				'ma_el_pricing_license_content_alignment',
				[
					'label' => esc_html__( 'Alignment', MELA_TD ),
				]
			);

			$this->add_responsive_control(
				'ma_el_pricing_license_alignment',
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
		?>
		
			<section class="pricing-section gray-bg licenses">
			    <div class="section-padding">
			        <div class="container">


			            <div class="table table-2">
			                <div class="row">

			                    <div class="col-xs-6">
			                        <ul>
			                            <li>
			                                <span class="blank title">
			                                    <?php echo esc_html__('Features','jeweltheme');?>
			                                </span>
			                            </li>

			                            <?php
			                                foreach( $settings['pricing_license'] as $index => $tab ) {
			                                    echo '<li>' . $tab['license_title'] . '</li>';
			                                }
			                            ?>

			                        </ul>
			                    </div>



			                    <div class="col-xs-2">
			                        <ul>
			                            <li>
			                                <span class="title">
			                                    <?php echo esc_html( $settings['personal_title'] ); ?>
			                                </span>
			                            </li>

			                            <?php
			                            
			                                foreach ( $settings['pricing_license'] as $tab ) {
			                                    echo ( $tab['personal_feature'] == "yes" ) ? '<li><i class="fa fa-check"></i></li>' : '<li><i class="fas fa-times"></i></li>';
			                                }			                            
			                                // foreach ( $license_features as $key=>$personal ) {
			                                //     echo ( $personal->personal_feature == "yes_no" ) ? '<li><i class="fa fa-check"></i></li>' : '<li><i class="fas fa-times"></i></li>';
			                                // }
			                            ?>

			                        </ul>
			                    </div>


			                    <div class="col-xs-2">
			                        <ul>
			                            <li>
			                                <span class="title">
			                                    <?php echo esc_html( $settings['developer_title'] ); ?>
			                                </span>
			                            </li>

			                            <?php

			                                foreach ( $settings['pricing_license'] as $tab ) {
			                                    echo ( $tab['developer_feature'] == "yes" ) ? '<li><i class="fa fa-check"></i></li>' : '<li><i class="fa fa-close"></i></li>';
			                                }	

			                                // foreach ( $license_features as $key=>$developer ) {
			                                //     echo ( $developer->developer_feature == "yes_no" ) ? '<li><i class="fa fa-check"></i></li>' : '<li><i class="fa fa-close"></i></li>';
			                                // }
			                            ?>
			                        </ul>
			                    </div>


			                    <div class="col-xs-2">
			                        <ul>
			                            <li>
			                                <span class="title">
			                                    <?php echo esc_html( $settings['extended_title'] ); ?>
			                                </span>
			                            </li>

			                            <?php

			                                foreach ( $settings['pricing_license'] as $tab ) {
			                                    echo ( $tab['extended_feature'] == "yes" ) ? '<li><i class="fa fa-check"></i></li>' : '<li><i class="fa fa-close"></i></li>';
			                                }	
			                                		
			                                // foreach ( $license_features as $key=>$extended ) {
			                                //     echo ( $extended->extended_feature == "yes_no" ) ? '<li><i class="fa fa-check"></i></li>' : '<li><i class="fa fa-close"></i></li>';
			                                // }
			                            ?>
			                        </ul>
			                    </div>


			                </div>
			            </div>


			        </div><!-- /.container -->
			    </div><!-- /.section-padding -->
			</section><!-- /.pricing-section -->


		<?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Demo_Pricing_License );