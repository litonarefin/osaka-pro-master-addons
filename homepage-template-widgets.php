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
?>

<!-- HTML Starts here -->

<section class="ma-widgets-banner">
	<div class="container">
		<h2 class="ma-banner-section-title">Master widgets</h2>
		<p class="ma-banner-section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
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
