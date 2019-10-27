<?php
namespace Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;

use MasterAddons\Inc\Helper\Master_Addons_Helper;



class Master_Addons_Main_Site_Pricing extends Widget_Base{



	public function get_name(){
		return "ma-main-site-pricing";
	}

	public function get_title(){
		return "Main Site: Pricing Table";
	}

	public function get_icon() {
		return 'ma-el-icon eicon-price-table';
	}

	public function get_categories() {
		return [ 'master-addons' ];
	}

	protected function _register_controls() {

			$this->start_controls_section(
				'pricing_table_title',
				[
					'label'                 => esc_html__( 'Pricing Tab Titles', MELA_TD )
				]
			);

			// Yearly Pricing
			$this->add_control(
				'pricing_tab_title_yearly',
				[
					'label'                 => __( 'Yearly Title', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,
					'default'               => __( 'Yearly', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);
			

			$this->add_control(
				'pricing_tab_title_lifetime',
				[
					'label'                 => __( 'Lifetime Title', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,
					'default'               => __( 'Lifetime', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);

			$this->add_control(
				'pricing_additional_text',
				[
					'label'                 => __( 'Footer Text', MELA_TD ),
					'type'                  => Controls_Manager::TEXTAREA,
					'default'               => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);
			
			$this->end_controls_section();




			/**
			 * Master Yearly Pricing Section
			 */
			$this->start_controls_section(
				'yearly_pricing_section',
				[
					'label' => esc_html__( 'Yearly Pricing Section', MELA_TD ),
				]
			);

			$repeater = new Repeater();

			$repeater->add_control(
				'yearly_table_title',
				[
					'label'                 => __( 'Title', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,
					'default'               => __( 'Personal', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);

			
			$repeater->add_control(
				'yearly_table_subtitle',
				[
					'label'                 => __( 'Subtitle', MELA_TD ),
					'type'                  => Controls_Manager::TEXTAREA,	
					'default'               => __( 'Suitable for single website', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);

			
			$repeater->add_control(
				'yearly_table_currency',
				[
					'label'                 => __( 'Currency', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,	
					'default'               => __( '$', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);

			$repeater->add_control(
				'yearly_table_price',
				[
					'label'                 => __( 'Price', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,	
					'default'               => __( '99', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);

			$repeater->add_control(
				'yearly_pricing_features_template',
				[
					'label'                 => esc_html__( 'Pricing Feature Template', MELA_TD ),
					'type'                  => Controls_Manager::SELECT,
					'label_block'           => false,
					'options'               => [
						'content'   => __( 'Content', MELA_TD ),
						'section'   => __( 'Saved Section', MELA_TD ),
						'widget'    => __( 'Saved Widget', MELA_TD ),
						'template'  => __( 'Saved Page Template', MELA_TD ),
					],
					'default'               => 'content',
				]
			);

			$repeater->add_control(
				'yearly_pricing_features_content',
				[
					'label'                 => esc_html__( 'Content', MELA_TD ),
					'type'                  => Controls_Manager::WYSIWYG,
					'default'               => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', MELA_TD ),
					'dynamic'               => [ 'active' => true ],
					'condition'             => [
						'yearly_pricing_features_template'	=> 'content',
					],
				]
			);

			$repeater->add_control(
				'yearly_saved_widget',
				[
					'label'                 => __( 'Choose Widget', MELA_TD ),
					'type'                  => Controls_Manager::SELECT,
					'options'               => $this->get_page_template_options( 'widget' ),
					'default'               => '-1',
					'condition'             => [
						'yearly_pricing_features_template'    => 'widget',
					],
					'conditions'        => [
						'terms' => [
							[
								'name'      => 'yearly_pricing_features_template',
								'operator'  => '==',
								'value'     => 'widget',
							],
						],
					],
				]
			);


			$repeater->add_control(
				'yearly_saved_section',
				[
					'label'                 => __( 'Choose Section', MELA_TD ),
					'type'                  => Controls_Manager::SELECT,
					'options'               => $this->get_page_template_options( 'section' ),
					'default'               => '-1',
					'conditions'        => [
						'terms' => [
							[
								'name'      => 'yearly_pricing_features_template',
								'operator'  => '==',
								'value'     => 'section',
							],
						],
					],
				]
			);

			$repeater->add_control(
				'yearly_templates',
				[
					'label'                 => __( 'Choose Template', MELA_TD ),
					'type'                  => Controls_Manager::SELECT,
					'options'               => $this->get_page_template_options( 'page' ),
					'default'               => '-1',
					'conditions'        => [
						'terms' => [
							[
								'name'      => 'yearly_pricing_features_template',
								'operator'  => '==',
								'value'     => 'template',
							],
						],
					],
				]
			);


			$repeater->add_control(
				'yearly_table_duration',
				[
					'label'                 => __( 'Duration', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,	
					'default'               => __( 'Annually', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);

			
			$repeater->add_control(
				'yearly_table_button_text',
				[
					'label' => esc_html__( 'Purchase Button', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Purchase now', MELA_TD ),
				]
			);

			$repeater->add_control(
				'yearly_table_freemius_purchase_id',
				[
					'label' => esc_html__( 'Freemius Plan ID', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( '6729', MELA_TD ),
				]
			);

			$repeater->add_control(
				'yearly_table_button_link',
				[
					'label' => __( 'Purchase Link', MELA_TD ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'https://master-addons.com', MELA_TD ),
					'label_block' => true,
					'default' => [
						'url' => '#',
						'is_external' => "",
					],
					'show_external' => false,
				]
			);

			$this->add_control(
				'yearly_tabs',
				[
					'type'                  => Controls_Manager::REPEATER,
					'default'               => [
						[ 'yearly_table_title' => esc_html__( 'Personal', MELA_TD ) ],
						[ 'yearly_table_title' => esc_html__( 'Business', MELA_TD ) ],
						[ 'yearly_table_title' => esc_html__( 'Developer', MELA_TD ) ],
					],
					'fields'                => array_values( $repeater->get_controls() ),
					'title_field'           => '{{yearly_table_title}}',
				]
			);

			$this->end_controls_section();



			/**
			 * Master Pricing Lifetime
			 */
			$this->start_controls_section(
				'lifetime_pricing_section',
				[
					'label' => esc_html__( 'Lifetime Pricing Section', MELA_TD ),
				]
			);

			$repeater = new Repeater();

			$repeater->add_control(
				'lifetime_table_title',
				[
					'label'                 => __( 'Title', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,
					'default'               => __( 'Personal', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);

			
			$repeater->add_control(
				'lifetime_table_subtitle',
				[
					'label'                 => __( 'Subtitle', MELA_TD ),
					'type'                  => Controls_Manager::TEXTAREA,	
					'default'               => __( 'Suitable for single website', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);

			
			$repeater->add_control(
				'lifetime_table_currency',
				[
					'label'                 => __( 'Currency', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,	
					'default'               => __( '$', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);

			$repeater->add_control(
				'lifetime_table_price',
				[
					'label'                 => __( 'Price', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,	
					'default'               => __( '99', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);

			$repeater->add_control(
				'lifetime_table_duration',
				[
					'label'                 => __( 'Duration', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,	
					'default'               => __( 'Annually', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);



			$repeater->add_control(
				'lifetime_pricing_features_template',
				[
					'label'                 => esc_html__( 'Pricing Feature Template', MELA_TD ),
					'type'                  => Controls_Manager::SELECT,
					'label_block'           => false,
					'options'               => [
						'content'   => __( 'Content', MELA_TD ),
						'section'   => __( 'Saved Section', MELA_TD ),
						'widget'    => __( 'Saved Widget', MELA_TD ),
						'template'  => __( 'Saved Page Template', MELA_TD ),
					],
					'default'               => 'content',
				]
			);

			$repeater->add_control(
				'lifetime_pricing_features_content',
				[
					'label'                 => esc_html__( 'Content', MELA_TD ),
					'type'                  => Controls_Manager::WYSIWYG,
					'default'               => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', MELA_TD ),
					'dynamic'               => [ 'active' => true ],
					'condition'             => [
						'lifetime_pricing_features_template'	=> 'content',
					],
				]
			);

			$repeater->add_control(
				'lifetime_saved_widget',
				[
					'label'                 => __( 'Choose Widget', MELA_TD ),
					'type'                  => Controls_Manager::SELECT,
					'options'               => $this->get_page_template_options( 'widget' ),
					'default'               => '-1',
					'condition'             => [
						'lifetime_pricing_features_template'    => 'widget',
					],
					'conditions'        => [
						'terms' => [
							[
								'name'      => 'lifetime_pricing_features_template',
								'operator'  => '==',
								'value'     => 'widget',
							],
						],
					],
				]
			);


			$repeater->add_control(
				'lifetime_saved_section',
				[
					'label'                 => __( 'Choose Section', MELA_TD ),
					'type'                  => Controls_Manager::SELECT,
					'options'               => $this->get_page_template_options( 'section' ),
					'default'               => '-1',
					'conditions'        => [
						'terms' => [
							[
								'name'      => 'lifetime_pricing_features_template',
								'operator'  => '==',
								'value'     => 'section',
							],
						],
					],
				]
			);

			$repeater->add_control(
				'lifetime_templates',
				[
					'label'                 => __( 'Choose Template', MELA_TD ),
					'type'                  => Controls_Manager::SELECT,
					'options'               => $this->get_page_template_options( 'page' ),
					'default'               => '-1',
					'conditions'        => [
						'terms' => [
							[
								'name'      => 'lifetime_pricing_features_template',
								'operator'  => '==',
								'value'     => 'template',
							],
						],
					],
				]
			);

			

			$repeater->add_control(
				'lifetime_table_button_text',
				[
					'label' => esc_html__( 'Purchase Button', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Purchase now', MELA_TD ),
				]
			);

			$repeater->add_control(
				'lifetime_table_freemius_purchase_id',
				[
					'label' => esc_html__( 'Freemius Plan ID', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( '6729', MELA_TD ),
				]
			);

			$repeater->add_control(
				'lifetime_table_button_link',
				[
					'label' => __( 'Purchase Link', MELA_TD ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'https://master-addons.com', MELA_TD ),
					'label_block' => true,
					'default' => [
						'url' => '#',
						'is_external' => "",
					],
					'show_external' => false,
				]
			);
			$this->add_control(
				'lifetime_tabs',
				[
					'type'                  => Controls_Manager::REPEATER,
					'default'               => [
						[ 'lifetime_table_title' => esc_html__( 'Personal', MELA_TD ) ],
						[ 'lifetime_table_title' => esc_html__( 'Business', MELA_TD ) ],
						[ 'lifetime_table_title' => esc_html__( 'Developer', MELA_TD ) ],
					],
					'fields'                => array_values( $repeater->get_controls() ),
					'title_field'           => '{{lifetime_table_title}}',
				]
			);

			$this->end_controls_section();



	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>




			<section class="pricing-tables text-center">
				<div class="container">

					<ul class="nav nav-tabs pricing-table-tab" id="pricing-table-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="monthly" data-toggle="tab" href="#monthly-tab" role="tab" aria-controls="monthly-tab" aria-selected="true">
								<?php echo esc_html( $settings['pricing_tab_title_yearly'] ); ?>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="yearly-tab" data-toggle="tab" href="#yearly" role="tab" aria-controls="yearly" aria-selected="false">
								<?php echo esc_html( $settings['pricing_tab_title_lifetime'] ); ?>
							</a>
						</li>
					</ul>
					<div class="tab-content" id="pricing-table-tab-content">
						<div class="tab-pane fade show active" id="monthly-tab" role="tabpanel" aria-labelledby="monthly">
							<div class="row">

	                            <?php foreach( $settings['yearly_tabs'] as $index => $yearly_tab ) { ?>

									<div class="col-md-4">
										<div class="price-table">
											<div class="price-table-head">
												<h3 class="price-table-title">
													<?php echo esc_attr($yearly_tab['yearly_table_title']);?>
												</h3><!-- /.price-table-title -->
												<p><?php echo esc_attr($yearly_tab['yearly_table_subtitle']);?></p>
												<div class="table-price-area">
													<span class="table-price-currency"><?php echo esc_attr($yearly_tab['yearly_table_currency']);?></span>
													<span class="table-price-amount"><?php echo esc_attr($yearly_tab['yearly_table_price']);?></span>
													<span class="price-amount-duration"><?php echo esc_attr($yearly_tab['yearly_table_duration']);?></span>
												</div><!-- /.table-price-area -->
											</div><!-- /.price-table-head -->

											<?php
												if( $yearly_tab['yearly_pricing_features_template'] == 'content' ) {

													echo do_shortcode( $yearly_tab['yearly_pricing_features_content'] );

												} elseif ( $yearly_tab['yearly_pricing_features_template'] == 'section' && !empty( $yearly_tab['yearly_saved_section'] ) ) {

													echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $yearly_tab['yearly_saved_section'] );

												} elseif ( $yearly_tab['yearly_pricing_features_template'] == 'template' && !empty( $yearly_tab['yearly_templates'] ) ) {

													echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $yearly_tab['yearly_templates'] );

												} elseif ( $yearly_tab['yearly_pricing_features_template'] == 'widget' && !empty( $yearly_tab['yearly_saved_widget'] ) ) {

													echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $yearly_tab['yearly_saved_widget'] );

												}
											?>

											<div id="yearly-pricing-tab" class="price-table-bottom">
												<a 
												id="ma-site-yearly-<?php echo strtolower( $yearly_tab['yearly_table_title'] ); ?>"
												data-billing_cycle_name="<?php echo strtolower( $yearly_tab['yearly_table_title'] ); ?>"
												class="price-table-btn">

													<?php echo esc_html( $yearly_tab['yearly_table_button_text'] ); ?>
												</a>
											</div><!-- /.price-table-bottom -->
										</div><!-- /.price-table -->
									</div>

	                            <?php } ?>



							</div><!-- /.row -->
						</div>

						<div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly">
							<div class="row">
								
								<?php foreach( $settings['lifetime_tabs'] as $index => $lifetime_tab ) { ?>

									<div class="col-md-4">
										<div class="price-table">
											<div class="price-table-head">
												<h3 class="price-table-title">
													<?php echo esc_attr($lifetime_tab['lifetime_table_title']);?>
												</h3><!-- /.price-table-title -->

												<p><?php echo esc_attr($lifetime_tab['lifetime_table_subtitle']);?></p>
												<div class="table-price-area">
													<span class="table-price-currency">
														<?php echo esc_attr($lifetime_tab['lifetime_table_currency']);?>
													</span>
													<span class="table-price-amount">
														<?php echo esc_attr($lifetime_tab['lifetime_table_price']);?>
													</span>
													<span class="price-amount-duration"><?php echo esc_attr($lifetime_tab['lifetime_table_duration']);?></span>
												</div><!-- /.table-price-area -->
											</div><!-- /.price-table-head -->

											<?php
												if( $lifetime_tab['lifetime_pricing_features_template'] == 'content' ) {

													echo do_shortcode( $lifetime_tab['lifetime_pricing_features_content'] );

												} elseif ( $lifetime_tab['lifetime_pricing_features_template'] == 'section' && !empty( $lifetime_tab['lifetime_saved_section'] ) ) {

													echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $lifetime_tab['lifetime_saved_section'] );

												} elseif ( $lifetime_tab['lifetime_pricing_features_template'] == 'template' && !empty( $lifetime_tab['lifetime_templates'] ) ) {

													echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $lifetime_tab['lifetime_templates'] );

												} elseif ( $lifetime_tab['lifetime_pricing_features_template'] == 'widget' && !empty( $lifetime_tab['lifetime_saved_widget'] ) ) {

													echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $lifetime_tab['lifetime_saved_widget'] );

												}
											?>


											<div id="lifetime-pricing-tab" class="price-table-bottom">
												<a 
												id="ma-site-lifetime-<?php echo strtolower( $lifetime_tab['lifetime_table_title'] ); ?>"
												data-billing_cycle_name="<?php echo strtolower( $lifetime_tab['lifetime_table_title'] ); ?>"
												class="price-table-btn">
													<?php echo esc_html( $lifetime_tab['lifetime_table_button_text'] ); ?>
												</a>
											</div><!-- /.price-table-bottom -->


										</div><!-- /.price-table -->
									</div>

								<?php } ?>



							</div><!-- /.row -->
						</div>
					</div>
					

					<?php if($settings['pricing_additional_text']){ ?>
						<p class="additional-text">
							<?php echo $this->parse_text_editor( $settings['pricing_additional_text']);?>
						</p>
					<?php } ?>
				</div><!-- /.container -->
			</section><!-- /.pricing-tables -->


		<?php
	}

	public function get_page_template_options( $type = '' ) {

		$page_templates = Master_Addons_Helper::ma_get_page_templates( $type );

		$options[-1]   = __( 'Select', MELA_TD );

		if ( count( $page_templates ) ) {
			foreach ( $page_templates as $id => $name ) {
				$options[ $id ] = $name;
			}
		} else {
			$options['no_template'] = __( 'No saved templates found!', MELA_TD );
		}

		return $options;
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Main_Site_Pricing );