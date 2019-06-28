<?php

if ( ! class_exists( 'osaka_light_Customize_Static_Text_Control' ) ){
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
class osaka_light_Customize_Static_Text_Control extends WP_Customize_Control {
	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'static-text';

	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	protected function render_content() {
			?>
		<div class="description customize-control-description">
			
			<h2><?php esc_html_e('About Osaka', 'osaka-light')?></h2>
			<p><?php esc_html_e('Osaka is simple, clean and elegant WordPress Theme for your blog site.', 'osaka-light')?> </p>
			<p>
				<a href="<?php echo esc_url('https://prowptheme.com/themes/osaka/'); ?>" target="_blank"><?php esc_html_e( 'Osaka Demo', 'osaka-light' ); ?></a>
			</p>
			<h3><?php esc_html_e('Documentation', 'osaka-light')?></h3>
			<p><?php esc_html_e('Read documentation to learn more about theme.', 'osaka-light')?> </p>
			<p>
				<a href="<?php echo esc_url('http://docs.prowptheme.com/osaka/'); ?>" target="_blank"><?php esc_html_e( 'Osaka Documentation', 'osaka-light' ); ?></a>
			</p>
			
			<h3><?php esc_html_e('Support', 'osaka-light')?></h3>
			<p><?php esc_html_e('For support, Kindly contact us and we would be happy to assist!', 'osaka-light')?> </p>
			
			<p>
				<a href="<?php echo esc_url('https://prowptheme.com/support/'); ?>" target="_blank"><?php esc_html_e( 'Osaka Support', 'osaka-light' ); ?></a>
			</p>
			<h3><?php esc_html_e( 'Rate This Theme', 'osaka-light' ); ?></h3>
			<p><?php esc_html_e('If you like Osaka Kindly Rate this Theme', 'osaka-light')?> </p>
			<p>
				<a href="<?php echo esc_url('https://wordpress.org/support/theme/osaka/reviews/#new-post'); ?>" target="_blank"><?php esc_html_e( 'Add Your Review', 'osaka-light' ); ?></a>
			</p>
			</div>
			
		<?php
	}

}
}
