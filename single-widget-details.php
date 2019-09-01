<?php 
/*
 * Template Name: Addons Details
 * Template Post Type: post, page, product
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

// print_r($addon_details_image['url']);

?>
<!-- Addons Details Starts Here -->

<section class="ma-page-banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<h1 class="page-title">
					<?php the_title();?>
				</h1>
				<p class="page-description">
					<?php echo $addon_details_sub_heading;?>
				</p>
			</div>

			<?php if( $addon_details_video_link['url'] !="#" ){ ?>

				<div class="col-lg-5">
					<div class="banner-image-content">
						<?php if( $addon_details_image['url'] ){ ?>
							<img src="<?php echo esc_url_raw( $addon_details_image['url'] );?>" alt="<?php echo get_post_meta( $addon_details_image['id'], '_wp_attachment_image_alt', true);?>">
						<?php } else { ?>
							<img src="<?php echo get_template_directory_uri();?>/images/page-head.png" alt="<?php echo get_post_meta( $addon_details_image['id'], '_wp_attachment_image_alt', true);?>">
						<?php } ?>
						
						<a href="<?php echo esc_url_raw( $addon_details_video_link['url'] ); ?>" class="popup-video">
							<span class="dashicons dashicons-admin-collapse"></span>
						</a>
					</div>
				</div>

			<?php } ?>


		</div>
	</div>
</section>





<!-- Addons Details Ends Here -->
<?php 

the_post();

the_content();

get_footer();
?>

<script>
	jQuery(document).ready(function() {
		jQuery('.popup-video').magnificPopup({
	 			disableOn: 700,
	 			type: 'iframe',
	 			mainClass: 'mfp-fade',
	 			removalDelay: 160,
	 			preloader: false,

	 			fixedContentPos: false
	 		});
	});
</script>