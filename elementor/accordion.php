<?php

namespace Elementor;

class Master_Addons_Main_Site_Accordion extends Widget_Base{

	public function get_name(){
		return "ma-main-accordion";
	}

	public function get_title(){
		return "Main Site: Accordion/FAQ";
	}

	public function get_icon() {
		return 'ma-el-icon eicon-accordion';
	}

	public function get_categories() {
		return [ 'master-addons' ];
	}

	protected function _register_controls() {
			/**
			 * Master Headlines Content Section
			 */
			$this->start_controls_section(
				'ma_el_main_site_accordion_content',
				[
					'label' => esc_html__( 'FAQ Details', MELA_TD ),
				]
			);

			$this->add_control(
				'main_site_accordion_heading',
				[
					'label' => esc_html__( 'Heading', MELA_TD ),
					'type' => Controls_Manager::TEXT,
					'label_block' => true,
					'default' => esc_html__( 'Master Addons Heading', MELA_TD ),
				]
			);

			$this->add_control(
				'main_site_accordion_sub_heading',
				[
					'label' => esc_html__( 'Sub Heading', MELA_TD ),
					'type' => Controls_Manager::TEXTAREA,
					'label_block' => true,
					'default' => esc_html__( 'Enthusiastically iterate viral e-markets before diverse materials. Proactively e-enable empowered.', MELA_TD ),
				]
			);

			$this->add_control(
				'main_site_accordion_desc',
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
				'section_main_site_accordion_tabs',
				[
					'label'                 => esc_html__( 'FAQ\'s', MELA_TD )
				]
			);

			$repeater = new Repeater();

			$repeater->add_control(
				'main_site_accordion_icon',
				[
					'label'                 => esc_html__( 'FAQ Icon', MELA_TD ),
					'type'                  => Controls_Manager::ICON,
					'default'               => 'ti-cup',
					// 'condition'             => [
					// 	'accordion_tab_icon_show' => 'yes'
					// ]
				]
			);



			$repeater->add_control(
				'main_site_accordion_title',
				[
					'label'                 => __( 'FAQ Title', MELA_TD ),
					'type'                  => Controls_Manager::TEXT,
					'default'               => __( 'FAQ Title', MELA_TD ),
					'dynamic'               => [
						'active'   => true,
					],
				]
			);			

			
			$repeater->add_control(
				'main_site_accordion_content',
				[
					'label'                 => esc_html__( 'FAQ Content', MELA_TD ),
					'type'                  => Controls_Manager::WYSIWYG,
					'default'               => esc_html__( 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.', MELA_TD ),
					'dynamic'               => [ 'active' => true ],
					// 'condition'             => [
					// 	'content_type'	=> 'content',
					// ],
				]
			);

			$this->add_control(
				'main_site_accordion_tabs',
				[
					'type'                  => Controls_Manager::REPEATER,
					'default'               => [
						[ 'main_site_accordion_title' => esc_html__( 'Lorem Ipsum #01', MELA_TD ) ],
						[ 'main_site_accordion_title' => esc_html__( 'Lorem Ipsum #02', MELA_TD ) ],
						[ 'main_site_accordion_title' => esc_html__( 'Lorem Ipsum #03', MELA_TD ) ],
					],
					'fields'                => array_values( $repeater->get_controls() ),
					'title_field'           => '{{main_site_accordion_title}}',
				]
			);

			$this->end_controls_section();



	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		$id_int		= substr( $this->get_id_int(), 0, 3 );

		$this->add_render_attribute( 'accordion', [
			'class'                 => 'ma-site-info-service',
			'id'                    => 'ma-site-info-service-'.esc_attr( $this->get_id() ),
			'data-accordion-id'     => esc_attr( $this->get_id() )
		] );

			
		?>




		<section class="ma-home-faq">
			<div class="container">
				<div id="ma-home-accordion" class="ma-home-accordion">

				<?php
					foreach( $settings['main_site_accordion_tabs'] as $index => $tab ) {

						$tab_count = $index+1;
						$tab_title_setting_key = $this->get_repeater_setting_key('main_site_accordion_title', 'main_site_accordion_tabs', $index);
						$tab_content_setting_key = $this->get_repeater_setting_key('accordion_content', 'main_site_accordion_tabs', $index);

						// $tab_title_class 	= ['ma-accordion-tab-title'];
						$tab_title_class 	= [];
						$tab_content_class 	= ['ma-accordion-tab-content'];

						// if ( $tab['accordion_tab_default_active'] == 'yes' ) {
							$tab_title_class[] 		= 'btn btn-link' . (($tab_count==1) ? " collapsed" : "");
							$tab_content_class[] 	= 'ma-accordion-tab-active-default';
						// }

						$this->add_render_attribute( $tab_title_setting_key, [
							'id'                => 'ma-accordion-tab-title-' . $id_int . $tab_count,
							'class'             => $tab_title_class,
							'data-toggle'       => 'collapse',
							'data-target'       => '#collapse' . $tab_count ,
							'aria-expanded'     => ($tab_count==1) ? true : false,
							'aria-controls'     => 'collapse' . $tab_count ,

							// 'tabindex'          => $tab_count,
							// 'data-tab'          => $tab_count,
							// 'role'              => 'tab',
							// 'aria-controls'     => 'ma-accordion-tab-content-' . $tab_count,

									// class="btn btn-link collapsed" 
									// data-toggle="collapse" 
									// data-target="#collapseThree" 
									// aria-expanded="false" 
									// aria-controls="collapseThree"


						]);

						$this->add_render_attribute( $tab_content_setting_key, [
							'id'                => 'elementor-tab-content-' . $tab_count,
							'class'             => $tab_content_class,
							'data-tab'          => $tab_count,
							'role'              => 'tabpanel',
							'aria-labelledby'   => 'ma-accordion-tab-title-' . $tab_count,
						] );
						?>


						<div class="card">
							<div class="card-header" id="heading<?php echo $tab_count;?>">
								<button 

									<?php echo $this->get_render_attribute_string($tab_title_setting_key); ?>
								>
									<span class="icon-left">
										<i class="<?php echo esc_attr( $tab['main_site_accordion_icon'] ); ?>"></i>
									</span>
									<?php echo $tab['main_site_accordion_title']; ?>
								</button>
							</div>

							<div id="<?php echo 'collapse' . $tab_count;?>" class="collapse <?php echo ($tab_count ==1)? "show" : "";?>" aria-labelledby="heading<?php echo $tab_count;?>" data-parent="#ma-home-accordion">
								<div class="card-body">
									<?php echo do_shortcode( $tab['main_site_accordion_content'] );?>
								</div>
							</div>
						</div>
					
					<?php } ?>

				</div>
			</div><!-- /.container -->
		</section><!-- /.home-faq -->





		<?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Master_Addons_Main_Site_Accordion );