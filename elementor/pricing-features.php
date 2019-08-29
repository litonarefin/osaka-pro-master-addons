<?php
namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;

class Master_Addons_Main_Site_Pricing_Features extends Widget_Base{

	public function get_name(){
		return "ma-site-pricing-features";
	}

	public function get_title(){
		return "Main Site: Pricing Features";
	}

	public function get_icon() {
		return 'ma-el-icon eicon-heading';
	}

	public function get_categories() {
		return [ 'master-addons' ];
	}

	protected function _register_controls() {
			/**
			 * Master Addons Pricing Featueres
			 */
			$this->start_controls_section(
				'ma_el_pricing_features_content',
				[
					'label' => esc_html__( 'Pricing Table Features', MELA_TD ),
				]
			);

			$repeater = new Repeater();

			$repeater->add_control(
				'ma_el_pricing_features_tooltips',
				[
					'label' => esc_html__( 'Tooltips', MELA_TD ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
					'default' => esc_html__( 'Pricing Feature Tooltip', MELA_TD ),
				]
			);

			$repeater->add_control(
				'yearly_pricing_feature_content',
				[
					'label'                 => esc_html__( 'Content', MELA_TD ),
					// 'type'                  => Controls_Manager::WYSIWYG,
					'type' 					=> Controls_Manager::TEXTAREA,
					'default'               => esc_html__( 'Single Website', MELA_TD ),
					'dynamic'               => [ 'active' => true ]
				]
			);



			$this->add_control(
				'pricing_table_features',
				[
					'type'                  => Controls_Manager::REPEATER,
					'default'               => [
						[ 'yearly_pricing_feature_content' => esc_html__( 'Single Website', MELA_TD ) ],
						[ 'yearly_pricing_feature_content' => esc_html__( 'LIfetime Update', MELA_TD ) ],
						[ 'yearly_pricing_feature_content' => esc_html__( 'LIfetime Support', MELA_TD ) ],
					],
					'fields'                => array_values( $repeater->get_controls() ),
					'title_field'           => '{{yearly_pricing_feature_content}}',
				]
			);

			$this->end_controls_section();



	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'ma_el_site_pricing_features_wrapper', [
				'class' => 'price-table-details'
			]
		);

		$this->add_render_attribute( 'ma_el_site_pricing_features_tooltip', [
				'class' => 'ma-el-tooltip'
			]
		);


		?>

			<div <?php echo $this->get_render_attribute_string( 'ma_el_site_pricing_features_wrapper' ); ?>>
				<ul>
					<?php foreach( $settings['pricing_table_features'] as $index => $pricing_feature ) { ?>
						<li <?php if($pricing_feature['ma_el_pricing_features_tooltips']) echo $this->get_render_attribute_string( 'ma_el_site_pricing_features_tooltip' );?>>
							
								<?php if($pricing_feature['ma_el_pricing_features_tooltips']) {?>
									<div class="ma-el-tooltip-item tooltip-top">
										<div class="ma-el-tooltip-content">
											<?php echo $this->parse_text_editor($pricing_feature['yearly_pricing_feature_content']); ?>
										</div>
										<div class="ma-el-tooltip-text">
											<?php echo $this->parse_text_editor($pricing_feature['ma_el_pricing_features_tooltips']); ?>
										</div>				
									</div>
								<?php } else{ 
									
									echo $this->parse_text_editor($pricing_feature['yearly_pricing_feature_content']);

								}?>
						</li>
					<?php } ?>
				</ul>
			</div><!-- /.price-table-details -->


		<?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Main_Site_Pricing_Features );