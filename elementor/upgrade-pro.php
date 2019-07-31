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

class Master_Addons_Upgrade_Pro extends Widget_Base{

	public function get_name(){
		return "upgrade-pro";
	}

	public function get_title(){
		return "Main Site: Upgrade Pro";
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
					'label'                 => esc_html__( 'Content', MELA_TD )
				]
			);


			$this->add_control(
				'features_title',
				[
					'label'                 => __( 'Features Title', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,
					'default'               => __( 'Features', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);
			
			$this->end_controls_section();

			/**
			 * Master Headlines Content Section
			 */
			$this->start_controls_section(
				'free_content_section',
				[
					'label' => esc_html__( 'Free Content Section', MELA_TD ),
				]
			);
			
			$this->add_control(
				'free_title',
				[
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Free', MELA_TD ),
				]
			);


			$this->add_control(
				'free_down_text',
				[
					'label' => esc_html__( 'Free Download Text', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Free Download', MELA_TD ),
				]
			);

			$this->add_control(
				'free_down_link',
				[
					'label' => __( 'Free Download Link', MELA_TD ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'https://your-link.com', MELA_TD ),
					'label_block' => true,
					'default' => [
						'url' => '#',
						'is_external' => "",
					],
					'show_external' => true,
				]
			);

			$this->end_controls_section();

			$this->start_controls_section(
				'pro_content_section',
				[
					'label' => esc_html__( 'Pro Content Section', MELA_TD ),
				]
			);
			
			$this->add_control(
				'pro_title',
				[
					'label' => esc_html__( 'Pro Title', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Pro', MELA_TD ),
				]
			);

			$this->add_control(
				'pro_down_text',
				[
					'label' => esc_html__( 'Pro Download Text', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Pro Download', MELA_TD ),
				]
			);


			$this->add_control(
				'pro_down_link',
				[
					'label' => __( 'Pro Download Link', MELA_TD ),
					'type' => Controls_Manager::URL,
					'placeholder' => __( 'https://your-link.com', MELA_TD ),
					'label_block' => true,
					'default' => [
						'url' => '#',
						'is_external' => "",
					],
					'show_external' => true,
				]
			);

			$this->end_controls_section();



			/* Comparision Section */

			$this->start_controls_section(
				'free_vs_pro_tabs',
				[
					'label'                 => esc_html__( 'Free vs Pro', MELA_TD )
				]
			);

			$repeater = new Repeater();



			$repeater->add_control(
				'feature_title',
				[
					'label'                 => __( 'Freature Title', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,
					'default'               => __( 'WooCommerce Compatibility', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);
			
			$repeater->add_control(
				'free_feature',
				[
					'label'                 => __( 'Free Feature', MELA_TD ),
					'type'                  => Controls_Manager::SWITCHER,
					'placeholder'               => __( 'Yes/No (Checked for \'yes\')', MELA_TD ),
					'default'               => 'yes',
					'label_on'              => __( 'Yes', MELA_TD ),
					'label_off'             => __( 'No', MELA_TD ),
					'return_value'          => 'yes',
				]
			);
			$repeater->add_control(
				'pro_feature',
				[
					'label'                 => __( 'Pro Feature', MELA_TD ),
					'type'                  => Controls_Manager::SWITCHER,
					'placeholder'               => __( 'Yes/No (Checked for \'yes\')', MELA_TD ),
					'default'               => 'yes',
					'label_on'              => __( 'Yes', MELA_TD ),
					'label_off'             => __( 'No', MELA_TD ),
					'return_value'          => 'yes',
				]
			);

			$this->add_control(
				'tabs',
				[
					'type'                  => Controls_Manager::REPEATER,
					'default'               => [
						[ 'feature_title' => esc_html__( 'WooCommerce Compatibility', MELA_TD ) ],
						[ 'feature_title' => esc_html__( 'Profile Card', MELA_TD ) ],
						[ 'feature_title' => esc_html__( 'Social Buttons', MELA_TD ) ],
					],
					'fields'                => array_values( $repeater->get_controls() ),
					'title_field'           => '{{feature_title}}',
				]
			);

			$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

			<section class="pricing-section gray-bg">
			    <div class="section-padding">
			        <div class="container">


			            <div class="table table-2">
			                <div class="row">
			                    <div class="col-xs-6">
			                        <ul>
			                            <li>
			                                <span class="title">			                                	
			                                	<?php echo esc_html( $settings['features_title'] ); ?>
			                                </span>
			                            </li>

			                            <?php
			                                foreach( $settings['tabs'] as $index => $tab ) {
			                                    echo '<li>' . $tab['feature_title'] . '</li>';
			                                }
			                            ?>

			                        </ul>
			                    </div>
			                    <div class="col-xs-3">
			                        <ul>
			                            <li>
			                                <span class="title">
			                                	<?php echo esc_html( $settings['free_title'] ); ?>
			                                </span>
			                            </li>

			                            <?php
			                                foreach ( $settings['tabs'] as $tab ) {
			                                    echo ( $tab['free_feature'] == "yes" ) ? '<li><i class="fa fa-check"></i></li>' : '<li><i class="fa fa-close"></i></li>';
			                                }
			                            ?>

			                            <li>
			                                <a href="<?php echo esc_url_raw( $settings['free_down_link']['url'] );?>" class="btn red-gradient">
			                                        <?php echo esc_html( $settings['free_down_text'] ); ?>
			                                </a>
			                            </li>
			                        </ul>
			                    </div>
			                    <div class="col-xs-3">
			                        <ul>
			                            <li>
			                                <span class="title">
			                                	<?php echo esc_html( $settings['pro_title'] ); ?>
			                                </span>
			                            </li>

			                            <?php
			                                foreach ( $settings['tabs'] as $tab ) {
			                                    echo ( $tab['pro_feature'] == "yes" ) ? '<li><i class="fa fa-check"></i></li>' : '<li><i class="fa fa-close"></i></li>';
			                                }
			                            ?>
			                            <li>
			                                <a href="<?php echo esc_url_raw( $settings['pro_down_link']['url'] );?>" class="btn">			                                	
			                                    <?php echo esc_html( $settings['pro_down_text'] ); ?>
			                                </a>
			                            </li>
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
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Upgrade_Pro );