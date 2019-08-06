<?php 
/*
 * Template Name: Addons Details
 * Template Post Type: post, page, product
 */
  
 get_header();
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
					Progressively customize highly efficient e-markets with user friendly intellectual capital. Dramatically target.
				</p>
			</div>
			<div class="col-lg-5">
				<div class="banner-image-content">
					<img src="<?php echo get_template_directory_uri();?>/images/page-head.png" alt="Image">
					<a href="#" class="popup-video">
						<span class="dashicons dashicons-admin-collapse"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>





<!-- Addons Details Ends Here -->
<?php 

the_post();

the_content();

get_footer();