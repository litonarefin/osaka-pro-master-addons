<?php
/**
 * Template Name: Pricing
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

$page_id = get_the_ID();

// Get the page settings manager
$page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

// Get the settings model for current post
$page_settings_model = $page_settings_manager->get_model( $page_id );

// Retrieve the color we added before
$add = $page_settings_model->get_settings( 'addon_details_heading' );
$addon_details_sub_heading = $page_settings_model->get_settings( 'addon_details_sub_heading' );
$addon_details_video_link = $page_settings_model->get_settings( 'addon_details_video_link' );
$addon_details_image = $page_settings_model->get_settings( 'addon_details_image' );
$addon_details_bg_image = $page_settings_model->get_settings( 'addon_details_bg_image' );


?>


<section class="pricing-tables text-center">
	<div class="container">

		<ul class="nav nav-tabs pricing-table-tab" id="pricing-table-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="monthly" data-toggle="tab" href="#monthly-tab" role="tab" aria-controls="monthly-tab" aria-selected="true">Monthly</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="yearly-tab" data-toggle="tab" href="#yearly" role="tab" aria-controls="yearly" aria-selected="false">Yearly</a>
			</li>
		</ul>
		<div class="tab-content" id="pricing-table-tab-content">
			<div class="tab-pane fade show active" id="monthly-tab" role="tabpanel" aria-labelledby="monthly">
				<div class="row">

					<div class="col-md-4">
						<div class="price-table">
							<div class="price-table-head">
								<h3 class="price-table-title">Standard</h3><!-- /.price-table-title -->
								<p>Suitable for single website</p>
								<div class="table-price-area">
									<span class="table-price-currency">$</span>
									<span class="table-price-amount">99</span>
									<span class="price-amount-duration">Monthly</span>
								</div><!-- /.table-price-area -->
							</div><!-- /.price-table-head -->
							<div class="price-table-details">
								<ul>
									<li>One Information</li>
									<li>Lorem Ipsum Information</li>
									<li>Lorem Ipsum Information</li>
									<li>Lorem Ipsum Information</li>
									<li>Lorem Ipsum Information</li>
								</ul>

							</div><!-- /.price-table-details -->
							<div class="price-table-bottom">
								<a href="#" class="price-table-btn">Purchase now</a>
							</div><!-- /.price-table-bottom -->
						</div><!-- /.price-table -->
					</div>



				</div><!-- /.row -->
			</div>

			<div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly">
				<div class="row">

					<div class="col-md-4">
						<div class="price-table">
							<div class="price-table-head">
								<h3 class="price-table-title">Developer</h3><!-- /.price-table-title -->
								<p>Suitable for single website</p>
								<div class="table-price-area">
									<span class="table-price-currency">$</span>
									<span class="table-price-amount">99</span>
									<span class="price-amount-duration">Monthly</span>
								</div><!-- /.table-price-area -->
							</div><!-- /.price-table-head -->
							<div class="price-table-details">
								<ul>
									<li>One Information</li>
									<li>Lorem Ipsum Information</li>
									<li>Lorem Ipsum Information</li>
									<li>Lorem Ipsum Information</li>
									<li>Lorem Ipsum Information</li>
								</ul>

							</div><!-- /.price-table-details -->
							<div class="price-table-bottom">
								<a href="#" class="price-table-btn">Purchase now</a>
							</div><!-- /.price-table-bottom -->
						</div><!-- /.price-table -->
					</div>



				</div><!-- /.row -->
			</div>
		</div>
		
		<p class="additional-text">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.
		</p>
	</div><!-- /.container -->
</section><!-- /.pricing-tables -->



<button id="purchase">Buy Button</button>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://checkout.freemius.com/checkout.min.js"></script>

<select id="starter-licenses">
   <option value="1" selected="selected">Single Site License</option>
   <option value="5">5-Site License</option>
   <option value="25">25-Site License</option>
   <option value="unlimited">Unlimited Sites License</option>
</select>
<button id="starter-purchase">Buy Starter</button>

<select id="pro-licenses">
   <option value="1" selected="selected">Single Site License</option>
   <option value="5">5-Site License</option>
   <option value="25">25-Site License</option>
   <option value="unlimited">Unlimited Sites License</option>
</select>
<button id="pro-purchase">Buy Professional</button>

<select id="bus-licenses">
   <option value="1" selected="selected">Single Site License</option>
   <option value="5">5-Site License</option>
   <option value="25">25-Site License</option>
   <option value="unlimited">Unlimited Sites License</option>
</select>
<button id="bus-purchase">Buy Professional</button>

<script type="text/javascript">
(function(){
    var freemiusHandler = FS.Checkout.configure({
        plugin_id:  '4015',
        plan_id:    '6729',
        public_key: 'pk_3c9b5b4e47a06288e3500c7bf812e',
        image:      'https://your-plugin-site.com/logo-100x100.png'
    });

    var plans = {
        starter: '6729', 
        pro:     '6730',
        bus:     '6733'
    };

    var addBuyHandler = function (plan, planID){
        jQuery('#' + plan + '-purchase').on('click', function (e) {
            freemiusHandler.open({
                plan_id : planID,
                licenses: $('#' + plan + '-licenses').val(),
                // You can consume the response for after purchase logic.
                success : function (response) {
                    // alert(response.user.email);
                }
            });

            e.preventDefault();
        });
    };

    for (var plan in plans) {
        if (!plans.hasOwnProperty(plan))
            continue;

        addBuyHandler(plan, plans[plan]);
    }
})();
</script>


<section class="refund-section" style="background: url('<?php echo get_template_directory_uri();?>/images/refund-bg.png');">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
        <img src="<?php echo get_template_directory_uri();?>/images/refund.png" alt="" >
      </div>
			<div class="col-lg-8">
				<h2 class="section-title white">Our refund policy</h2>
				<h4 class="sub-heading white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</h4>
				<div class="section-description">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. ullamco laboris nisi ut aliquip ex ea commodo consequat. 
				</div>
			</div>
		</div>
	</div><!-- /.container -->
</section><!-- /.refund-section -->

<!-- Homepage Code Ended Here -->

<?php    
the_content();
get_footer();







