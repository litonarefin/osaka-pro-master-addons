<?php
/**
 * Template Name: All Widgets
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Osaka-Pro
 */

get_header();

$post_id = get_the_ID();

// Get the page settings manager
$page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

// Get the settings model for current post
$page_settings_model = $page_settings_manager->get_model( $post_id );

// Retrieve the color we added before
$add = $page_settings_model->get_settings( 'addon_details_heading' );
$addon_details_sub_heading = $page_settings_model->get_settings( 'addon_details_sub_heading' );
$addon_details_video_link = $page_settings_model->get_settings( 'addon_details_video_link' );
$addon_details_image = $page_settings_model->get_settings( 'addon_details_image' );
$addon_details_bg_image = $page_settings_model->get_settings( 'addon_details_bg_image' );



?>

<!-- HTML Starts here -->

<section class="ma-widgets-banner">
	<div class="container">
		<h2 class="ma-banner-section-title">
			<?php the_title();?>
		</h2>
		<p class="ma-banner-section-description">
			<?php echo $addon_details_sub_heading;?>
		</p>
	</div>
</section>


<section class="ma-widgets-section text-center">
	<div class="container">
		<div class="section-top">
			<h2 class="ma-widget-section-title">General</h2>
			<p class="ma-widget-section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque similique, totam consequuntur temporibus aspernatur ea vel, quibusdam</p>
		</div>


		<div class="row">
			<div class="item">dasfasdfasdfas</div>
		</div>
	</div>
</section>

<!-- HTML End here -->


<?php 
the_post();
the_content();
get_footer();
