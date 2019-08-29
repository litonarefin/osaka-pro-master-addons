<?php

/**
 * Osaka functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Osaka
 */


define( 'OSAKA_LIGHT', wp_get_theme()->get( 'Name' ));
define( 'OSAKA_LIGHT_VER', wp_get_theme()->get( 'Version' ));
define( 'OSAKA_LIGHT_CSS', get_template_directory_uri().'/assets/css/');
define( 'OSAKA_LIGHT_JS', get_template_directory_uri().'/assets/js/');
define( 'OSAKA_LIGHT_PATH', get_template_directory());
define( 'OSAKA_LIGHT_THEME_URI', get_template_directory_uri());
define( 'AJAX_URL', esc_url_raw( admin_url('admin-ajax.php')));


if ( ! function_exists( 'osaka_light_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function osaka_light_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Osaka, use a find and replace
		 * to change 'osaka-light' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'osaka-light' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		//Custom Image Size
		add_image_size( 'osaka-light-portfolio-single', '1170', '640', true );
		

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'osaka-light' ),
		) );


		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'osaka_light_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		* Add support for Gutenberg.
		*
		* @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
		*/
		add_theme_support( 'gutenberg', array(
		 
		    // Theme supports wide images, galleries and videos.
		    'wide-images' => true,
		 
		    // Make specific theme colors available in the editor.
		    'colors' => array(
		        '#ffffff',
		        '#000000',
		        '#cccccc',
		    ),
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		add_theme_support( 'gutenberg', array( 'wide-images' => true ) );
		
		// Add support for custom color scheme.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Strong Blue', 'osaka-light' ),
				'slug'  => 'strong-blue',
				'color' => '#0073aa',
			),
			array(
				'name'  => esc_html__( 'Lighter Blue', 'osaka-light' ),
				'slug'  => 'lighter-blue',
				'color' => '#229fd8',
			),
			array(
				'name'  => esc_html__( 'Very Light Gray', 'osaka-light' ),
				'slug'  => 'very-light-gray',
				'color' => '#eee',
			),
			array(
				'name'  => esc_html__( 'Very Dark Gray', 'osaka-light' ),
				'slug'  => 'very-dark-gray',
				'color' => '#444',
			),
	        array(
	            'name' => __( 'Strong Magenta', 'osaka-light' ),
	            'slug' => 'strong-magenta',
	            'color' => '#a156b4',
	        ),
	        array(
	            'name' => __( 'Light Grayish Magenta', 'osaka-light' ),
	            'slug' => 'light-grayish-magenta',
	            'color' => '#d0a5db',
	        ),
		) );

	}
}

add_action( 'after_setup_theme', 'osaka_light_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function osaka_light_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'osaka_light_content_width', 640 );
}
add_action( 'after_setup_theme', 'osaka_light_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function osaka_light_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'osaka-light' ),
		'id'            => 'footer-sidebar',
		'description'   => esc_html__( 'Add Footer Sidebar widgets here.', 'osaka-light' ),
		'before_widget' => '<div id="%1$s" class="widget col-lg-3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Menu', 'osaka-light' ),
		'id'            => 'footer-menu',
		'description'   => esc_html__( 'Add Footer Menu widgets here.', 'osaka-light' ),
		'before_widget' => '<div id="%1$s" class="widget widget-menu %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

}
add_action( 'widgets_init', 'osaka_light_widgets_init' );



// Google Fonts
function osaka_light_google_fonts_url() {
	$font_url = '';
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'osaka-light' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Poppins:300,400,500,600,700' ), "//fonts.googleapis.com/css" );
	}
	return $font_url;
}


/**
 * Enqueue scripts and styles.
 */
function osaka_light_scripts() {

	//CSS
	wp_enqueue_style( 'osaka-light-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', OSAKA_LIGHT_CSS . 'font-awesome.min.css');
	wp_enqueue_style( 'et-line', OSAKA_LIGHT_CSS . 'et-line.css');
	wp_enqueue_style( 'themify-icons', OSAKA_LIGHT_CSS . 'themify-icons.css');
	wp_enqueue_style( 'bootstrap', OSAKA_LIGHT_CSS . 'bootstrap.min.css');
    wp_enqueue_style( 'animate', OSAKA_LIGHT_CSS . 'animate.css', array(), OSAKA_LIGHT_VER );
	// wp_enqueue_style( 'osaka-light-header', OSAKA_LIGHT_CSS . 'header.css');
	wp_enqueue_style( 'osaka-light-megamenu', OSAKA_LIGHT_CSS . 'megamenu.css');

	wp_enqueue_style( 'magnific-popup', OSAKA_LIGHT_CSS . 'magnific-popup.css');

	wp_enqueue_style( 'osaka-light-themes', OSAKA_LIGHT_CSS . 'themes.css');
	wp_enqueue_style( 'osaka-light-responsive', OSAKA_LIGHT_CSS . 'responsive.css');
	wp_enqueue_style( 'osaka-light-google-fonts', osaka_light_google_fonts_url());
	
	

	// JS
	// wp_enqueue_script( 'jquery-masonry', 'jquery-masonry', array('jquery'), OSAKA_LIGHT_VER, true );

	wp_enqueue_script( 'bootstrap', OSAKA_LIGHT_JS . 'bootstrap.js', array('jquery'), OSAKA_LIGHT_VER, true );
	wp_enqueue_script( 'magnific-popup', OSAKA_LIGHT_JS . 'jquery.magnific-popup.min.js', array('jquery'), OSAKA_LIGHT_VER, true );
	wp_enqueue_script( 'osaka-light-main', OSAKA_LIGHT_JS . 'main.js', array('jquery'), '', true );
	wp_enqueue_script( 'osaka-pricing-table', 'https://checkout.freemius.com/checkout.min.js', array('jquery'), '', true );




	if ( ! function_exists( 'is_plugin_active' ) ){
		
		require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

	}

	if( !is_plugin_active('woocommerce/woocommerce.php')){
		return;
	}     
	
	// Start of the Fomo
	global $post;

	// $p_query = new EDD_Payments_Query( array(
	// 	'number'   => 5,
	// 	'status'   => 'publish'
	// ) );

	// $payments = $p_query->get_payments();

	$query = new WC_Order_Query( array(
	    'limit' => 10,
	    'orderby' => 'date',
	    'order' => 'DESC',
	    'return' => 'ids',
	) );
	$orders = $query->get_orders();


	$output = array();
	foreach ( $orders as $payment ) {
		// print_r($payment);

		$order = wc_get_order($payment);

        $payment_data = array(
                'order_id' => $order->get_id(),
                'product_name' => $order->get_items(),
                'order_number' => $order->get_order_number(),
                'order_date' => date('Y-m-d H:i:s', strtotime(get_post($order->get_id())->post_date)),
                'status' => $order->get_status(),
                'shipping_total' => $order->get_total_shipping(),
                'shipping_tax_total' => wc_format_decimal($order->get_shipping_tax(), 2),
                // 'fee_total' => wc_format_decimal($fee_total, 2),
                // 'fee_tax_total' => wc_format_decimal($fee_tax_total, 2),
                // 'tax_total' => wc_format_decimal($order->get_total_tax(), 2),
                'cart_discount' => (defined('WC_VERSION') && (WC_VERSION >= 2.3)) ? wc_format_decimal($order->get_total_discount(), 2) : wc_format_decimal($order->get_cart_discount(), 2),
                'order_discount' => (defined('WC_VERSION') && (WC_VERSION >= 2.3)) ? wc_format_decimal($order->get_total_discount(), 2) : wc_format_decimal($order->get_order_discount(), 2),
                'discount_total' => wc_format_decimal($order->get_total_discount(), 2),
                'order_total' => wc_format_decimal($order->get_total(), 2),
                'order_currency' => $order->get_currency(),
                'payment_method' => $order->get_payment_method(),
                'shipping_method' => $order->get_shipping_method(),
                'customer_id' => $order->get_user_id(),
                'customer_user' => $order->get_user_id(),
                'customer_email' => ($a = get_userdata($order->get_user_id() )) ? $a->user_email : '',
                'billing_first_name' => $order->get_billing_first_name(),
                'billing_last_name' => $order->get_billing_last_name(),
                'billing_company' => $order->get_billing_company(),
                'billing_email' => $order->get_billing_email(),
                'billing_phone' => $order->get_billing_phone(),
                'billing_address_1' => $order->get_billing_address_1(),
                'billing_address_2' => $order->get_billing_address_2(),
                'billing_postcode' => $order->get_billing_postcode(),
                'billing_city' => $order->get_billing_city(),
                'billing_state' => $order->get_billing_state(),
                'billing_country' => $order->get_billing_country(),
                'shipping_first_name' => $order->get_shipping_first_name(),
                'shipping_last_name' => $order->get_shipping_last_name(),
                'shipping_company' => $order->get_shipping_company(),
                'shipping_address_1' => $order->get_shipping_address_1(),
                'shipping_address_2' => $order->get_shipping_address_2(),
                'shipping_postcode' => $order->get_shipping_postcode(),
                'shipping_city' => $order->get_shipping_city(),
                'shipping_state' => $order->get_shipping_state(),
                'shipping_country' => $order->get_shipping_country(),
                'customer_note' => $order->get_customer_note(),
                'download_permissions' => $order->is_download_permitted() ? $order->is_download_permitted() : 0,
        );


		// $user_info = edd_get_payment_meta_user_info( $payment->ID );
		// $download_info = edd_get_payment_meta_cart_details( $payment->ID, true );
		$avatar_url = get_avatar_url( $payment_data['customer_email'], '80' );
		// $payment_data = edd_get_payment_meta($payment->ID,'_edd_payment_meta', true);
		$payment_time = $payment_data['order_date'];

		//2018-09-25 16:28:28
		$payment_date_time = $payment_data['order_date'];
		// $today_date_time = get_the_time('Y-m-d H:i:s', $payment->ID);
		$today_date_times = date('Y-m-d H:i:s'); 
		// $date = date('Y-m-d H:i:s');

		//Time to Unix Timestamp
		$payment_time_unix = DateTime::createFromFormat('Y-m-d H:i:s', $payment_date_time, new DateTimeZone('UTC'));
		// 2018-09-25 16:28:28
		// $payment_time_unix = DateTime::createFromFormat('Y-m-d H:i:s', '2018-10-10 10:02:08', new DateTimeZone('UTC'));
		$payment_time_format_unix = $payment_time_unix->getTimestamp();

		$today_date_time_unix = DateTime::createFromFormat('Y-m-d H:i:s', $today_date_times, new DateTimeZone('UTC'));
		$today_date_times_format_unix = $today_date_time_unix->getTimestamp();

		// Final Human Time Difference
		$human_time_diff = human_time_diff( $payment_time_format_unix, $today_date_times_format_unix ) . __(" ago","zebratheme");

		
		$order_name = new WC_Order( $payment );
		$items = $order_name->get_items();
		foreach ( $items as $item ) {
			// print_r($item);
		    $product_name = $item->get_name();
		    $product = get_page_by_title( $item->get_name(), OBJECT, 'product' );
		    // echo $product_name;
		    // $product_id = $item->get_product_id();
		    // $product_variation_id = $item->get_variation_id();
		}


	    $output[] = array( 
	    	"buyer_name"	=> $payment_data['billing_first_name'],
	    	"product_name" => $product_name,
			"image" => $avatar_url,
	    	"url" => get_permalink( $product->ID ),
	    	"time" => $human_time_diff,
	    	"location" => $payment_data['billing_city'] . ',' . $payment_data['billing_country']
	    );
	}



		// wp_localize_script( 'osaka-light-main', 'product_vars', array(
		//     'products'  => $output
		// ) );

	// End of the Fomo




	wp_enqueue_script( 'osaka-light-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'osaka_light_scripts' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/breadcrumbs.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/required-plugins.php';
// require get_template_directory() . '/inc/navwalker.php';

require_once(get_template_directory() . '/inc/megamenu/dom-helper.php');
require get_template_directory() . '/inc/megamenu/nav_walker.php';
require get_template_directory() . '/inc/megamenu/menu_options.php';

require get_template_directory() . '/inc/elementor.php';

if ( defined( 'JETPACK__VERSION' ) ) { require get_template_directory() . '/inc/jetpack.php'; }
// if ( class_exists( 'WooCommerce' ) ) { require get_template_directory() . '/inc/woocommerce.php'; }



/**
 * Load Theme Support on Init
 */
if(!( function_exists('osaka_light_wp_add_editor_styles') )){
	function osaka_light_wp_add_editor_styles() {
		/**
		 * Add WP Editor Styling
		 */
	    add_editor_style( array('inc/editor-style.css'), osaka_light_google_fonts_url() );

		/**
		 * Set the content width in pixels, based on the theme's design and stylesheet.
		 *
		 * Priority 0 to make it available to lower priority callbacks.
		 *
		 * @global int $content_width
		 */
	    global $content_width;
	    if ( ! isset( $content_width ) ) $content_width = 1170;


	    //Remove post types from portfolio posts
	    remove_post_type_support('portfolio','post-formats');
	    remove_post_type_support('portfolio','comments');

	    add_post_type_support('testimonial','thumbnail');

	}
	add_action( 'init', 'osaka_light_wp_add_editor_styles', 10 );



}





/* Additional Functions*/

/*
 * Helper - expand allowed tags()
 * Source: https://gist.github.com/adamsilverstein/10783774
*/
function rooten_allowed_tags() {
	$allowed_tag = wp_kses_allowed_html( 'post' );
	// iframe
	$allowed_tag['iframe'] = array(
		'src'             => array(),
		'height'          => array(),
		'width'           => array(),
		'frameborder'     => array(),
		'allowfullscreen' => array(),
	); 
	return $allowed_tag;
}


// set custom menu walker for get facility for megamenu style and all others benefit from here.
add_filter('wp_nav_menu_args', function($args) {
    if (empty($args['walker'])) {
        $args['walker'] = new rooten_menu_walker;
    }
    return $args; }
);


/* Admin Styles and Scripts */
function osaka_pro_admin_style() {
	wp_register_style( 'admin-setting', get_template_directory_uri() . '/inc/megamenu/css/admin-settings.css' );
	wp_enqueue_style( 'admin-setting' );
}
add_action( 'admin_enqueue_scripts', 'osaka_pro_admin_style' );


/**
 * Admin related scripts
 * @return [type] [description]
 */
function osaka_pro_admin_script() {
	wp_register_script('admin-setting', get_template_directory_uri() . '/inc/megamenu/js/admin-menu.js', array( 'jquery' ), OSAKA_LIGHT_VER, true);

	wp_enqueue_script('admin-setting');
}
add_action( 'admin_enqueue_scripts', 'osaka_pro_admin_script' );



/**
 * Adding custom icon to icon control in Elementor
 */
function osaka_pro_custom_icons_controls( $controls_registry ) {

	// Get existing icons
	$icons = $controls_registry->get_control( 'icon' )->get_settings( 'options' );

	// Append new icons
	$new_icons = array_merge(
		array(

					// Arrows & Direction Icons
					'ti-arrow-up' => 'arrow-up',
					'ti-arrow-right' => 'arrow-right',
					'ti-arrow-left' => 'arrow-left',
					'ti-arrow-down' => 'arrow-down',
					'ti-arrows-vertical' => 'arrows-vertical',
					'ti-arrows-horizontal' => 'arrows-horizontal',
					'ti-angle-up' => 'angle-up',
					'ti-angle-right' => 'angle-right',
					'ti-angle-left' => 'angle-left',
					'ti-angle-down' => 'angle-down',
					'ti-angle-double-up' => 'angle-double-up',
					'ti-angle-double-right' => 'angle-double-right',
					'ti-angle-double-left' => 'angle-double-left',
					'ti-angle-double-down' => 'angle-double-down',
					'ti-move' => 'move',
					'ti-fullscreen' => 'fullscreen',
					'ti-arrow-top-right' => 'arrow-top-right',
					'ti-arrow-top-left' => 'arrow-top-left',
					'ti-arrow-circle-up' => 'arrow-circle-up',
					'ti-arrow-circle-right' => 'arrow-circle-right',
					'ti-arrow-circle-left' => 'arrow-circle-left',
					'ti-arrow-circle-down' => 'arrow-circle-down',
					'ti-arrows-corner' => 'arrows-corner',
					'ti-split-v' => 'split-v',
					'ti-split-v-alt' => 'split-v-alt',
					'ti-split-h' => 'split-h',
					'ti-hand-point-up' => 'hand-point-up',
					'ti-hand-point-right' => 'hand-point-right',
					'ti-hand-point-left' => 'hand-point-left',
					'ti-hand-point-down' => 'hand-point-down',
					'ti-back-right' => 'back-right',
					'ti-back-left' => 'back-left',
					'ti-exchange-vertical' => 'exchange-vertical',

					// Web App Icons
					'ti-wand' => 'wand',
					'ti-save' => 'save',
					'ti-save-alt' => 'save-alt',
					'ti-direction' => 'direction',
					'ti-direction-alt' => 'direction-alt',
					'ti-user' => 'user',
					'ti-link' => 'link',
					'ti-unlink' => 'unlink',
					'ti-trash' => 'trash',
					'ti-target' => 'target',
					'ti-tag' => 'tag',
					'ti-desktop' => 'desktop',
					'ti-tablet' => 'tablet',
					'ti-mobile' => 'mobile',
					'ti-email' => 'email',
					'ti-star' => 'star',
					'ti-spray' => 'spray',
					'ti-signal' => 'signal',
					'ti-shopping-cart' => 'shopping-cart',
					'ti-shopping-cart-full' => 'shopping-cart-full',
					'ti-settings' => 'settings',
					'ti-search' => 'search',
					'ti-zoom-in' => 'zoom-in',
					'ti-zoom-out' => 'zoom-out',
					'ti-cut' => 'cut',
					'ti-ruler' => 'ruler',
					'ti-ruler-alt-2' => 'ruler-alt-2',
					'ti-ruler-pencil' => 'ruler-pencil',
					'ti-ruler-alt' => 'ruler-alt',
					'ti-bookmark' => 'bookmark',
					'ti-bookmark-alt' => 'bookmark-alt',
					'ti-reload' => 'reload',
					'ti-plus' => 'plus',
					'ti-minus' => 'minus',
					'ti-close' => 'close',
					'ti-pin' => 'pin',
					'ti-pencil' => 'pencil',
					'ti-pencil-alt' => 'pencil-alt',
					'ti-paint-roller' => 'paint-roller',
					'ti-paint-bucket' => 'paint-bucket',
					'ti-na' => 'na',
					'ti-medall' => 'medall',
					'ti-medall-alt' => 'medall-alt',
					'ti-marker' => 'marker',
					'ti-marker-alt' => 'marker-alt',
					'ti-lock' => 'lock',
					'ti-unlock' => 'unlock',
					'ti-location-arrow' => 'location-arrow',
					'ti-layout' => 'layout',
					'ti-layers' => 'layers',
					'ti-layers-alt' => 'layers-alt',
					'ti-key' => 'key',
					'ti-image' => 'image',
					'ti-heart' => 'heart',
					'ti-heart-broken' => 'heart-broken',
					'ti-hand-stop' => 'hand-stop',
					'ti-hand-open' => 'hand-open',
					'ti-hand-drag' => 'hand-drag',
					'ti-flag' => 'flag',
					'ti-flag-alt' => 'flag-alt',
					'ti-flag-alt-2' => 'flag-alt-2',
					'ti-eye' => 'eye',
					'ti-import' => 'import',
					'ti-export' => 'export',
					'ti-cup' => 'cup',
					'ti-crown' => 'crown',
					'ti-comments' => 'comments',
					'ti-comment' => 'comment',
					'ti-comment-alt' => 'comment-alt',
					'ti-thought' => 'thought',
					'ti-clip' => 'clip',
					'ti-check' => 'check',
					'ti-check-box' => 'check-box',
					'ti-camera' => 'camera',
					'ti-announcement' => 'announcement',
					'ti-brush' => 'brush',
					'ti-brush-alt' => 'brush-alt',
					'ti-palette' => 'palette',
					'ti-briefcase' => 'briefcase',
					'ti-bolt' => 'bolt',
					'ti-bolt-alt' => 'bolt-alt',
					'ti-blackboard' => 'blackboard',
					'ti-bag' => 'bag',
					'ti-world' => 'world',
					'ti-wheelchair' => 'wheelchair',
					'ti-car' => 'car',
					'ti-truck' => 'truck',
					'ti-timer' => 'timer',
					'ti-ticket' => 'ticket',
					'ti-thumb-up' => 'thumb-up',
					'ti-thumb-down' => 'thumb-down',
					'ti-stats-up' => 'stats-up',
					'ti-stats-down' => 'stats-down',
					'ti-shine' => 'shine',
					'ti-shift-right' => 'shift-right',
					'ti-shift-left' => 'shift-left',
					'ti-shift-right-alt' => 'shift-right-alt',
					'ti-shift-left-alt' => 'shift-left-alt',
					'ti-shield' => 'shield',
					'ti-notepad' => 'notepad',
					'ti-server' => 'server',
					'ti-pulse' => 'pulse',
					'ti-printer' => 'printer',
					'ti-power-off' => 'power-off',
					'ti-plug' => 'plug',
					'ti-pie-chart' => 'pie-chart',
					'ti-panel' => 'panel',
					'ti-package' => 'package',
					'ti-music' => 'music',
					'ti-music-alt' => 'music-alt',
					'ti-mouse' => 'mouse',
					'ti-mouse-alt' => 'mouse-alt',
					'ti-money' => 'money',
					'ti-microphone' => 'microphone',
					'ti-menu' => 'menu',
					'ti-menu-alt' => 'menu-alt',
					'ti-map' => 'map',
					'ti-map-alt' => 'map-alt',
					'ti-location-pin' => 'location-pin',
					'ti-light-bulb' => 'light-bulb',
					'ti-info' => 'info',
					'ti-infinite' => 'infinite',
					'ti-id-badge' => 'id-badge',
					'ti-hummer' => 'hummer',
					'ti-home' => 'home',
					'ti-help' => 'help',
					'ti-headphone' => 'headphone',
					'ti-harddrives' => 'harddrives',
					'ti-harddrive' => 'harddrive',
					'ti-gift' => 'gift',
					'ti-game' => 'game',
					'ti-filter' => 'filter',
					'ti-files' => 'files',
					'ti-file' => 'file',
					'ti-zip' => 'zip',
					'ti-folder' => 'folder',
					'ti-envelope' => 'envelope',
					'ti-dashboard' => 'dashboard',
					'ti-cloud' => 'cloud',
					'ti-cloud-up' => 'cloud-up',
					'ti-cloud-down' => 'cloud-down',
					'ti-clipboard' => 'clipboard',
					'ti-calendar' => 'calendar',
					'ti-book' => 'book',
					'ti-bell' => 'bell',
					'ti-basketball' => 'basketball',
					'ti-bar-chart' => 'bar-chart',
					'ti-bar-chart-alt' => 'bar-chart-alt',
					'ti-archive' => 'archive',
					'ti-anchor' => 'anchor',
					'ti-alert' => 'alert',
					'ti-alarm-clock' => 'alarm-clock',
					'ti-agenda' => 'agenda',
					'ti-write' => 'write',
					'ti-wallet' => 'wallet',
					'ti-video-clapper' => 'video-clapper',
					'ti-video-camera' => 'video-camera',
					'ti-vector' => 'vector',
					'ti-support' => 'support',
					'ti-stamp' => 'stamp',
					'ti-slice' => 'slice',
					'ti-shortcode' => 'shortcode',
					'ti-receipt' => 'receipt',
					'ti-pin2' => 'pin2',
					'ti-pin-alt' => 'pin-alt',
					'ti-pencil-alt2' => 'pencil-alt2',
					'ti-eraser' => 'eraser',
					'ti-more' => 'more',
					'ti-more-alt' => 'more-alt',
					'ti-microphone-alt' => 'microphone-alt',
					'ti-magnet' => 'magnet',
					'ti-line-double' => 'line-double',
					'ti-line-dotted' => 'line-dotted',
					'ti-line-dashed' => 'line-dashed',
					'ti-ink-pen' => 'ink-pen',
					'ti-info-alt' => 'info-alt',
					'ti-help-alt' => 'help-alt',
					'ti-headphone-alt' => 'headphone-alt',
					'ti-gallery' => 'gallery',
					'ti-face-smile' => 'face-smile',
					'ti-face-sad' => 'face-sad',
					'ti-credit-card' => 'credit-card',
					'ti-comments-smiley' => 'comments-smiley',
					'ti-time' => 'time',
					'ti-share' => 'share',
					'ti-share-alt' => 'share-alt',
					'ti-rocket' => 'rocket',
					'ti-new-window' => 'new-window',
					'ti-rss' => 'rss',
					'ti-rss-alt' => 'rss-alt',


					//Control Icons
					'ti-control-stop' => 'control-stop',
					'ti-control-shuffle' => 'control-shuffle',
					'ti-control-play' => 'control-play',
					'ti-control-pause' => 'control-pause',
					'ti-control-forward' => 'control-forward',
					'ti-control-backward' => 'control-backward',
					'ti-volume' => 'volume',
					'ti-control-skip-forward' => 'control-skip-forward',
					'ti-control-skip-backward' => 'control-skip-backward',
					'ti-control-record' => 'control-record',
					'ti-control-eject' => 'control-eject',


					//Text Editor

					'ti-paragraph' => 'paragraph',
					'ti-uppercase' => 'uppercase',
					'ti-underline' => 'underline',
					'ti-text' => 'text',
					'ti-Italic' => 'Italic',
					'ti-smallcap' => 'smallcap',
					'ti-list' => 'list',
					'ti-list-ol' => 'list-ol',
					'ti-align-right' => 'align-right',
					'ti-align-left' => 'align-left',
					'ti-align-justify' => 'align-justify',
					'ti-align-center' => 'align-center',
					'ti-quote-right' => 'quote-right',
					'ti-quote-left' => 'quote-left',


					//Layout Icons
					'ti-layout-width-full' => 'layout-width-full',
					'ti-layout-width-default' => 'layout-width-default',
					'ti-layout-width-default-alt' => 'layout-width-default-alt',
					'ti-layout-tab' => 'layout-tab',
					'ti-layout-tab-window' => 'layout-tab-window',
					'ti-layout-tab-v' => 'layout-tab-v',
					'ti-layout-tab-min' => 'layout-tab-min',
					'ti-layout-slider' => 'layout-slider',
					'ti-layout-slider-alt' => 'layout-slider-alt',
					'ti-layout-sidebar-right' => 'layout-sidebar-right',
					'ti-layout-sidebar-none' => 'layout-sidebar-none',
					'ti-layout-sidebar-left' => 'layout-sidebar-left',
					'ti-layout-placeholder' => 'layout-placeholder',
					'ti-layout-menu' => 'layout-menu',
					'ti-layout-menu-v' => 'layout-menu-v',
					'ti-layout-menu-separated' => 'layout-menu-separated',
					'ti-layout-menu-full' => 'layout-menu-full',
					'ti-layout-media-right' => 'layout-media-right',
					'ti-layout-media-right-alt' => 'layout-media-right-alt',
					'ti-layout-media-overlay' => 'layout-media-overlay',
					'ti-layout-media-overlay-alt' => 'layout-media-overlay-alt',
					'ti-layout-media-overlay-alt-2' => 'layout-media-overlay-alt-2',
					'ti-layout-media-left' => 'layout-media-left',
					'ti-layout-media-left-alt' => 'layout-media-left-alt',
					'ti-layout-media-center' => 'layout-media-center',
					'ti-layout-media-center-alt' => 'layout-media-center-alt',
					'ti-layout-list-thumb' => 'layout-list-thumb',
					'ti-layout-list-thumb-alt' => 'layout-list-thumb-alt',
					'ti-layout-list-post' => 'layout-list-post',
					'ti-layout-list-large-image' => 'layout-list-large-image',
					'ti-layout-line-solid' => 'layout-line-solid',
					'ti-layout-grid4' => 'layout-grid4',
					'ti-layout-grid3' => 'layout-grid3',
					'ti-layout-grid2' => 'layout-grid2',
					'ti-layout-grid2-thumb' => 'layout-grid2-thumb',
					'ti-layout-cta-right' => 'layout-cta-right',
					'ti-layout-cta-left' => 'layout-cta-left',
					'ti-layout-cta-center' => 'layout-cta-center',
					'ti-layout-cta-btn-right' => 'layout-cta-btn-right',
					'ti-layout-cta-btn-left' => 'layout-cta-btn-left',
					'ti-layout-column4' => 'layout-column4',
					'ti-layout-column3' => 'layout-column3',
					'ti-layout-column2' => 'layout-column2',
					'ti-layout-accordion-separated' => 'layout-accordion-separated',
					'ti-layout-accordion-merged' => 'layout-accordion-merged',
					'ti-layout-accordion-list' => 'layout-accordion-list',
					'ti-widgetized' => 'widgetized',
					'ti-widget' => 'widget',
					'ti-widget-alt' => 'widget-alt',
					'ti-view-list' => 'view-list',
					'ti-view-list-alt' => 'view-list-alt',
					'ti-view-grid' => 'view-grid',
					'ti-upload' => 'upload',
					'ti-download' => 'download',
					'ti-loop' => 'loop',
					'ti-layout-sidebar-2' => 'layout-sidebar-2',
					'ti-layout-grid4-alt' => 'layout-grid4-alt',
					'ti-layout-grid3-alt' => 'layout-grid3-alt',
					'ti-layout-grid2-alt' => 'layout-grid2-alt',
					'ti-layout-column4-alt' => 'layout-column4-alt',
					'ti-layout-column3-alt' => 'layout-column3-alt',
					'ti-layout-column2-alt' => 'layout-column2-alt',	


					//Brand Icons
					'ti-flickr' => 'flickr',
					'ti-flickr-alt' => 'flickr-alt',
					'ti-instagram' => 'instagram',
					'ti-google' => 'google',
					'ti-github' => 'github',
					'ti-facebook' => 'facebook',
					'ti-dropbox' => 'dropbox',
					'ti-dropbox-alt' => 'dropbox-alt',
					'ti-dribbble' => 'dribbble',
					'ti-apple' => 'apple',
					'ti-android' => 'android',
					'ti-yahoo' => 'yahoo',
					'ti-trello' => 'trello',
					'ti-stack-overflow' => 'stack-overflow',
					'ti-soundcloud' => 'soundcloud',
					'ti-sharethis' => 'sharethis',
					'ti-sharethis-alt' => 'sharethis-alt',
					'ti-reddit' => 'reddit',
					'ti-microsoft' => 'microsoft',
					'ti-microsoft-alt' => 'microsoft-alt',
					'ti-linux' => 'linux',
					'ti-jsfiddle' => 'jsfiddle',
					'ti-joomla' => 'joomla',
					'ti-html5' => 'html5',
					'ti-css3' => 'css3',
					'ti-drupal' => 'drupal',
					'ti-wordpress' => 'wordpress',
					'ti-tumblr' => 'tumblr',
					'ti-tumblr-alt' => 'tumblr-alt',
					'ti-skype' => 'skype',
					'ti-youtube' => 'youtube',
					'ti-vimeo' => 'vimeo',
					'ti-vimeo-alt' => 'vimeo-alt',
					'ti-twitter' => 'twitter',
					'ti-twitter-alt' => 'twitter-alt',
					'ti-linkedin' => 'linkedin',
					'ti-pinterest' => 'pinterest',
					'ti-pinterest-alt' => 'pinterest-alt',
					'ti-themify-logo' => 'themify-logo',
					'ti-themify-favicon' => 'themify-favicon',
					'ti-themify-favicon-alt' => 'themify-favicon-alt',							



					// Elementor Icons
					'eicon-editor-link' => 'eicon-editor-link',
					'eicon-editor-unlink' => 'eicon-editor-unlink',
					'eicon-editor-external-link' => 'eicon-editor-external-link',
					'eicon-editor-close' => 'eicon-editor-close',
					'eicon-editor-list-ol' => 'eicon-editor-list-ol',
					'eicon-editor-list-ul' => 'eicon-editor-list-ul',
					'eicon-editor-bold' => 'eicon-editor-bold',
					'eicon-editor-italic' => 'eicon-editor-italic',
					'eicon-editor-underline' => 'eicon-editor-underline',
					'eicon-editor-paragraph' => 'eicon-editor-paragraph',
					'eicon-editor-h1' => 'eicon-editor-h1',
					'eicon-editor-h2' => 'eicon-editor-h2',
					'eicon-editor-h3' => 'eicon-editor-h3',
					'eicon-editor-h4' => 'eicon-editor-h4',
					'eicon-editor-h5' => 'eicon-editor-h5',
					'eicon-editor-h6' => 'eicon-editor-h6',
					'eicon-editor-quote' => 'eicon-editor-quote',
					'eicon-editor-code' => 'eicon-editor-code',
					'eicon-elementor' => 'eicon-elementor',
					'eicon-elementor-square' => 'eicon-elementor-square',
					'eicon-pojome' => 'eicon-pojome',
					'eicon-plus' => 'eicon-plus',
					'eicon-menu-bar' => 'eicon-menu-bar',
					'eicon-apps' => 'eicon-apps',
					'eicon-accordion' => 'eicon-accordion',
					'eicon-alert' => 'eicon-alert',
					'eicon-animation-text' => 'eicon-animation-text',
					'eicon-animation' => 'eicon-animation',
					'eicon-banner' => 'eicon-banner',
					'eicon-blockquote' => 'eicon-blockquote',
					'eicon-button' => 'eicon-button',
					'eicon-call-to-action' => 'eicon-call-to-action',
					'eicon-captcha' => 'eicon-captcha',
					'eicon-carousel' => 'eicon-carousel',
					'eicon-checkbox' => 'eicon-checkbox',
					'eicon-columns' => 'eicon-columns',
					'eicon-countdown' => 'eicon-countdown',
					'eicon-counter' => 'eicon-counter',
					'eicon-date' => 'eicon-date',
					'eicon-divider-shape' => 'eicon-divider-shape',
					'eicon-divider' => 'eicon-divider',
					'eicon-download-button' => 'eicon-download-button',
					'eicon-dual-button' => 'eicon-dual-button',
					'eicon-email-field' => 'eicon-email-field',
					'eicon-facebook-comments' => 'eicon-facebook-comments',
					'eicon-facebook-like-box' => 'eicon-facebook-like-box',
					'eicon-form-horizontal' => 'eicon-form-horizontal',
					'eicon-form-vertical' => 'eicon-form-vertical',
					'eicon-gallery-grid' => 'eicon-gallery-grid',
					'eicon-gallery-group' => 'eicon-gallery-group',
					'eicon-gallery-justified' => 'eicon-gallery-justified',
					'eicon-gallery-masonry' => 'eicon-gallery-masonry',
					'eicon-icon-box' => 'eicon-icon-box',
					'eicon-image-before-after' => 'eicon-image-before-after',
					'eicon-image-box' => 'eicon-image-box',
					'eicon-image-hotspot' => 'eicon-image-hotspot',
					'eicon-image-rollover' => 'eicon-image-rollover',
					'eicon-info-box' => 'eicon-info-box',
					'eicon-inner-section' => 'eicon-inner-section',
					'eicon-mailchimp' => 'eicon-mailchimp',
					'eicon-menu-card' => 'eicon-menu-card',
					'eicon-navigation-horizontal' => 'eicon-navigation-horizontal',
					'eicon-nav-menu' => 'eicon-nav-menu',
					'eicon-navigation-vertical' => 'eicon-navigation-vertical',
					'eicon-number-field' => 'eicon-number-field',
					'eicon-parallax' => 'eicon-parallax',
					'eicon-php7' => 'eicon-php7',
					'eicon-post-list' => 'eicon-post-list',
					'eicon-post-slider' => 'eicon-post-slider',
					'eicon-post' => 'eicon-post',
					'eicon-posts-carousel' => 'eicon-posts-carousel',
					'eicon-posts-grid' => 'eicon-posts-grid',
					'eicon-posts-group' => 'eicon-posts-group',
					'eicon-posts-justified' => 'eicon-posts-justified',
					'eicon-posts-masonry' => 'eicon-posts-masonry',
					'eicon-posts-ticker' => 'eicon-posts-ticker',
					'eicon-price-list' => 'eicon-price-list',
					'eicon-price-table' => 'eicon-price-table',
					'eicon-radio' => 'eicon-radio',
					'eicon-rtl' => 'eicon-rtl',
					'eicon-scroll' => 'eicon-scroll',
					'eicon-search' => 'eicon-search',
					'eicon-select' => 'eicon-select',
					'eicon-share' => 'eicon-share',
					'eicon-sidebar' => 'eicon-sidebar',
					'eicon-skill-bar' => 'eicon-skill-bar',
					'eicon-slider-3d' => 'eicon-slider-3d',
					'eicon-slider-album' => 'eicon-slider-album',
					'eicon-slider-device' => 'eicon-slider-device',
					'eicon-slider-full-screen' => 'eicon-slider-full-screen',
					'eicon-slider-push' => 'eicon-slider-push',
					'eicon-slider-vertical' => 'eicon-slider-vertical',
					'eicon-slider-video' => 'eicon-slider-video',
					'eicon-slideshow' => 'eicon-slideshow',
					'eicon-social-icons' => 'eicon-social-icons',
					'eicon-spacer' => 'eicon-spacer',
					'eicon-table' => 'eicon-table',
					'eicon-tabs' => 'eicon-tabs',
					'eicon-tel-field' => 'eicon-tel-field',
					'eicon-text-area' => 'eicon-text-area',
					'eicon-text-field' => 'eicon-text-field',
					'eicon-thumbnails-down' => 'eicon-thumbnails-down',
					'eicon-thumbnails-half' => 'eicon-thumbnails-half',
					'eicon-thumbnails-right' => 'eicon-thumbnails-right',
					'eicon-time-line' => 'eicon-time-line',
					'eicon-toggle' => 'eicon-toggle',
					'eicon-url' => 'eicon-url',
					'eicon-type-tool' => 'eicon-type-tool',
					'eicon-wordpress' => 'eicon-wordpress',
					'eicon-text' => 'eicon-text',
					'eicon-anchor' => 'eicon-anchor',
					'eicon-bullet-list' => 'eicon-bullet-list',
					'eicon-code' => 'eicon-code',
					'eicon-favorite' => 'eicon-favorite',
					'eicon-google-maps' => 'eicon-google-maps',
					'eicon-image' => 'eicon-image',
					'eicon-photo-library' => 'eicon-photo-library',
					'eicon-woocommerce' => 'eicon-woocommerce',
					'eicon-youtube' => 'eicon-youtube',
					'eicon-flip-box' => 'eicon-flip-box',
					'eicon-settings' => 'eicon-settings',
					'eicon-headphones' => 'eicon-headphones',
					'eicon-testimonial' => 'eicon-testimonial',
					'eicon-counter-circle' => 'eicon-counter-circle',
					'eicon-person' => 'eicon-person',
					'eicon-chevron-right' => 'eicon-chevron-right',
					'eicon-chevron-left' => 'eicon-chevron-left',
					'eicon-close' => 'eicon-close',
					'eicon-file-download' => 'eicon-file-download',
					'eicon-save' => 'eicon-save',
					'eicon-zoom-in' => 'eicon-zoom-in',
					'eicon-shortcode' => 'eicon-shortcode',
					'eicon-nerd' => 'eicon-nerd',
					'eicon-device-desktop' => 'eicon-device-desktop',
					'eicon-device-tablet' => 'eicon-device-tablet',
					'eicon-device-mobile' => 'eicon-device-mobile',
					'eicon-document-file' => 'eicon-document-file',
					'eicon-folder-o' => 'eicon-folder-o',
					'eicon-hypster' => 'eicon-hypster',
					'eicon-h-align-left' => 'eicon-h-align-left',
					'eicon-h-align-right' => 'eicon-h-align-right',
					'eicon-h-align-center' => 'eicon-h-align-center',
					'eicon-h-align-stretch' => 'eicon-h-align-stretch',
					'eicon-v-align-top' => 'eicon-v-align-top',
					'eicon-v-align-bottom' => 'eicon-v-align-bottom',
					'eicon-v-align-middle' => 'eicon-v-align-middle',
					'eicon-v-align-stretch' => 'eicon-v-align-stretch',
					'eicon-pro-icon' => 'eicon-pro-icon',
					'eicon-mail' => 'eicon-mail',
					'eicon-lock-user' => 'eicon-lock-user',
					'eicon-testimonial-carousel' => 'eicon-testimonial-carousel',
					'eicon-media-carousel' => 'eicon-media-carousel',
					'eicon-section' => 'eicon-section',
					'eicon-column' => 'eicon-column',
					'eicon-edit' => 'eicon-edit',
					'eicon-clone' => 'eicon-clone',
					'eicon-trash' => 'eicon-trash',
					'eicon-play' => 'eicon-play',
					'eicon-angle-right' => 'eicon-angle-right',
					'eicon-angle-left' => 'eicon-angle-left',
					'eicon-animated-headline' => 'eicon-animated-headline',
					'eicon-menu-toggle' => 'eicon-menu-toggle',
					'eicon-fb-embed' => 'eicon-fb-embed',
					'eicon-fb-feed' => 'eicon-fb-feed',
					'eicon-twitter-embed' => 'eicon-twitter-embed',
					'eicon-twitter-feed' => 'eicon-twitter-feed',
					'eicon-sync' => 'eicon-sync',
					'eicon-import-export' => 'eicon-import-export',
					'eicon-check-circle' => 'eicon-check-circle',
					'eicon-library-save' => 'eicon-library-save',
					'eicon-library-download' => 'eicon-library-download',
					'eicon-insert' => 'eicon-insert',
					'eicon-preview' => 'eicon-preview',
					'eicon-sort-down' => 'eicon-sort-down',
					'eicon-sort-up' => 'eicon-sort-up',
					'eicon-heading' => 'eicon-heading',
					'eicon-logo' => 'eicon-logo',
					'eicon-meta-data' => 'eicon-meta-data',
					'eicon-post-content' => 'eicon-post-content',
					'eicon-post-excerpt' => 'eicon-post-excerpt',
					'eicon-post-navigation' => 'eicon-post-navigation',
					'eicon-yoast' => 'eicon-yoast',
					'eicon-nerd-chuckle' => 'eicon-nerd-chuckle',
					'eicon-nerd-wink' => 'eicon-nerd-wink',
					'eicon-comments' => 'eicon-comments',
					'eicon-download-circle-o' => 'eicon-download-circle-o',
					'eicon-library-upload' => 'eicon-library-upload',
					'eicon-save-o' => 'eicon-save-o',
					'eicon-upload-circle-o' => 'eicon-upload-circle-o',
					'eicon-ellipsis-h' => 'eicon-ellipsis-h',
					'eicon-ellipsis-v' => 'eicon-ellipsis-v',
					'eicon-arrow-left' => 'eicon-arrow-left',
					'eicon-arrow-right' => 'eicon-arrow-right',
					'eicon-arrow-up' => 'eicon-arrow-up',
					'eicon-arrow-down' => 'eicon-arrow-down',
					'eicon-play-o' => 'eicon-play-o',
					'eicon-archive-posts' => 'eicon-archive-posts',
					'eicon-archive-title' => 'eicon-archive-title',
					'eicon-featured-image' => 'eicon-featured-image',
					'eicon-post-info' => 'eicon-post-info',
					'eicon-post-title' => 'eicon-post-title',
					'eicon-site-logo' => 'eicon-site-logo',
					'eicon-site-search' => 'eicon-site-search',
					'eicon-site-title' => 'eicon-site-title',
					'eicon-plus-square' => 'eicon-plus-square',
					'eicon-minus-square' => 'eicon-minus-square',
					'eicon-cloud-check' => 'eicon-cloud-check',
					'eicon-drag-n-drop' => 'eicon-drag-n-drop',
					'eicon-welcome' => 'eicon-welcome',
					'eicon-handle' => 'eicon-handle',
					'eicon-cart' => 'eicon-cart',
					'eicon-product-add-to-cart' => 'eicon-product-add-to-cart',
					'eicon-product-breadcrumbs' => 'eicon-product-breadcrumbs',
					'eicon-product-categories' => 'eicon-product-categories',
					'eicon-product-description' => 'eicon-product-description',
					'eicon-product-images' => 'eicon-product-images',
					'eicon-product-info' => 'eicon-product-info',
					'eicon-product-meta' => 'eicon-product-meta',
					'eicon-product-pages' => 'eicon-product-pages',
					'eicon-product-price' => 'eicon-product-price',
					'eicon-product-rating' => 'eicon-product-rating',
					'eicon-product-related' => 'eicon-product-related',
					'eicon-product-stock' => 'eicon-product-stock',
					'eicon-product-tabs' => 'eicon-product-tabs',
					'eicon-product-title' => 'eicon-product-title',
					'eicon-product-upsell' => 'eicon-product-upsell',
					'eicon-products' => 'eicon-products',
					'eicon-bag-light' => 'eicon-bag-light',
					'eicon-bag-medium' => 'eicon-bag-medium',
					'eicon-bag-solid' => 'eicon-bag-solid',
					'eicon-basket-light' => 'eicon-basket-light',
					'eicon-basket-medium' => 'eicon-basket-medium',
					'eicon-basket-solid' => 'eicon-basket-solid',
					'eicon-cart-light' => 'eicon-cart-light',
					'eicon-cart-medium' => 'eicon-cart-medium',
					'eicon-cart-solid' => 'eicon-cart-solid',
					'eicon-exchange' => 'eicon-exchange',
					'eicon-eye' => 'eicon-eye',
					'eicon-device-laptop' => 'eicon-device-laptop',
					'eicon-collapse' => 'eicon-collapse',
					'eicon-expand' => 'eicon-expand',
					'eicon-navigator' => 'eicon-navigator',
					'eicon-plug' => 'eicon-plug',
					'eicon-dashboard' => 'eicon-dashboard',
					'eicon-typography' => 'eicon-typography',
					'eicon-info-circle-o' => 'eicon-info-circle-o',
					'eicon-integration' => 'eicon-integration',
					'eicon-plus-circle-o' => 'eicon-plus-circle-o',
					'eicon-rating' => 'eicon-rating',
					'eicon-review' => 'eicon-review',
					'eicon-tools' => 'eicon-tools',
					'eicon-loading' => 'eicon-loading',
					'eicon-sitemap' => 'eicon-sitemap',
					'eicon-click' => 'eicon-click',
					'eicon-clock' => 'eicon-clock',
					'eicon-library-open' => 'eicon-library-open',
					'eicon-warning' => 'eicon-warning',
					'eicon-flow' => 'eicon-flow',
					'eicon-cursor-move' => 'eicon-cursor-move',
					'eicon-arrow-circle-left' => 'eicon-arrow-circle-left',
					'eicon-flash' => 'eicon-flash',
					'eicon-redo' => 'eicon-redo',
					'eicon-ban' => 'eicon-ban',
					'eicon-barcode' => 'eicon-barcode',
					'eicon-calendar' => 'eicon-calendar',
					'eicon-caret-left' => 'eicon-caret-left',
					'eicon-caret-right' => 'eicon-caret-right',
					'eicon-caret-up' => 'eicon-caret-up',
					'eicon-chain-broken' => 'eicon-chain-broken',
					'eicon-check-circle-o' => 'eicon-check-circle-o',
					'eicon-check' => 'eicon-check',
					'eicon-chevron-double-left' => 'eicon-chevron-double-left',
					'eicon-chevron-double-right' => 'eicon-chevron-double-right',
					'eicon-undo' => 'eicon-undo',
					'eicon-filter' => 'eicon-filter',
					'eicon-circle-o' => 'eicon-circle-o',
					'eicon-circle' => 'eicon-circle',
					'eicon-clock-o' => 'eicon-clock-o',
					'eicon-cog' => 'eicon-cog',
					'eicon-cogs' => 'eicon-cogs',
					'eicon-commenting-o' => 'eicon-commenting-o',
					'eicon-copy' => 'eicon-copy',
					'eicon-database' => 'eicon-database',
					'eicon-dot-circle-o' => 'eicon-dot-circle-o',
					'eicon-envelope' => 'eicon-envelope',
					'eicon-external-link-square' => 'eicon-external-link-square',
					'eicon-eyedropper' => 'eicon-eyedropper',
					'eicon-folder' => 'eicon-folder',
					'eicon-font' => 'eicon-font',
					'eicon-adjust' => 'eicon-adjust',
					'eicon-lightbox' => 'eicon-lightbox',
					'eicon-heart-o' => 'eicon-heart-o',
					'eicon-history' => 'eicon-history',
					'eicon-image-bold' => 'eicon-image-bold',
					'eicon-info-circle' => 'eicon-info-circle',
					'eicon-link' => 'eicon-link',
					'eicon-long-arrow-left' => 'eicon-long-arrow-left',
					'eicon-long-arrow-right' => 'eicon-long-arrow-right',
					'eicon-caret-down' => 'eicon-caret-down',
					'eicon-paint-brush' => 'eicon-paint-brush',
					'eicon-pencil' => 'eicon-pencil',
					'eicon-plus-circle' => 'eicon-plus-circle',
					'eicon-zoom-in-bold' => 'eicon-zoom-in-bold',
					'eicon-sort-amount-desc' => 'eicon-sort-amount-desc',
					'eicon-sign-out' => 'eicon-sign-out',
					'eicon-spinner' => 'eicon-spinner',
					'eicon-square' => 'eicon-square',
					'eicon-star-o' => 'eicon-star-o',
					'eicon-star' => 'eicon-star',
					'eicon-text-align-justify' => 'eicon-text-align-justify',
					'eicon-text-align-center' => 'eicon-text-align-center',
					'eicon-tags' => 'eicon-tags',
					'eicon-text-align-left' => 'eicon-text-align-left',
					'eicon-text-align-right' => 'eicon-text-align-right',
					'eicon-close-circle' => 'eicon-close-circle',
					'eicon-trash-o' => 'eicon-trash-o',
					'eicon-font-awesome' => 'eicon-font-awesome',
					'eicon-user-circle-o' => 'eicon-user-circle-o',
					'eicon-video-camera' => 'eicon-video-camera',
					'eicon-heart' => 'eicon-heart',
					'eicon-wrench' => 'eicon-wrench',
					'eicon-help' => 'eicon-help',
					'eicon-help-o' => 'eicon-help-o',
					'eicon-zoom-out-bold' => 'eicon-zoom-out-bold',
					'eicon-plus-square-o' => 'eicon-plus-square-o',
					'eicon-minus-square-o' => 'eicon-minus-square-o',
					'eicon-minus-circle' => 'eicon-minus-circle',
					'eicon-minus-circle-o' => 'eicon-minus-circle-o',
					'eicon-code-bold' => 'eicon-code-bold',												


		),
		$icons
	);

	// Then we set a new list of icons as the options of the icon control
	$controls_registry->get_control( 'icon' )->set_settings( 'options', $new_icons );

}

add_action( 'elementor/controls/controls_registered', 'osaka_pro_custom_icons_controls', 10, 1 );

remove_filter( 'the_content', 'wpautop' );
// OR
remove_filter( 'the_excerpt', 'wpautop' );

















// Add custom controls to the Page Settings inside the Elementor Global Options.

// Top of section
if ( ! function_exists( 'th_add_custom_controls_elem_post_settings_top' ) ) {
    function th_add_custom_controls_elem_post_settings_top(\Elementor\Core\DocumentTypes\Post $page)
    {
        

                $page->add_control(
                    'osaka_pro_transparent_header',
                    [
                        'label' => __( 'Transparent Header', 'th-widget-pack' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'default' => 'Off',
                        'label_on' => __( 'On', 'th-widget-pack' ),
                        'label_off' => __( 'Off', 'th-widget-pack' ),
                        'return_value' => 'on',
                    ]
                );

                $page->add_control(
                    'osaka_pro_header_content_style',
                    [
                        'label' => __( 'Transparent Header Content Style', 'th-widget-pack' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'label_block' => true,
                        'default' => 'light',
                        'options' => [
                            'light' => __( 'Light', 'th-widget-pack' ),
                            'dark' => __( 'Dark', 'th-widget-pack' ),
                        ],
                        'condition' => [
                            'osaka_pro_transparent_header' => 'on',
                        ],
                    ]
                );

                $page->add_control(
                    'osaka_pro_alt_logo',
                    [
                        'label' => __( 'Use Alternative Logo', 'th-widget-pack' ),
                        'description' => __( 'You can upload an alternative logo under Appearance / Customize / Theme Options / Logo / ', 'th-widget-pack' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'default' => 'Off',
                        'label_on' => __( 'On', 'th-widget-pack' ),
                        'label_off' => __( 'Off', 'th-widget-pack' ),
                        'return_value' => 'on',
                        'condition' => [
                            'osaka_pro_transparent_header' => 'on',
                        ],
                    ]
                );


                $page->add_control(
                    'osaka_pro_header_hide_shadow',
                    [
                        'label' => __( 'Hide Header Shadow', 'th-widget-pack' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_off' => __( 'No', 'elementor' ),
                        'label_on' => __( 'Yes', 'elementor' ),

                        'selectors' => [
                            '{{WRAPPER}} .navbar-default' => 'border: none',
                        ],
                    ]
                );

                $page_title_selector = get_option( 'elementor_page_title_selector' );
                if ( empty( $page_title_selector ) ) {
                    $page_title_selector = 'h1.entry-title';
                }


                $page->add_control(
                    'osaka_pro_page_title_margin',
                    [
                        'label' => __( 'Title  Margin', 'th-widget-pack' ),
                        'type' => \Elementor\Controls_Manager::SLIDER,
                        'default' => [
                            'size' => 1,
                        ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 1000,
                                'step' => 5,
                            ],
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'size_units' => [ 'px', '%' ],
                        'selectors' => [
                            '{{WRAPPER}} ' . $page_title_selector => 'margin-top: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );
            


    }
}
// Bottom of section
if ( ! function_exists( 'th_add_custom_controls_elem_post_settings_bottom' ) ) {
    function th_add_custom_controls_elem_post_settings_bottom( \Elementor\Core\DocumentTypes\Post $page )
    {


                // $page->add_control(
                //     'osaka_pro_page_layout',
                //     [
                //         'label' => __( 'Sidebar', 'th-widget-pack' ),
                //         'type' => \Elementor\Controls_Manager::CHOOSE,
                //         'default' => 'full',
                //         'options' => [
                //             'left'    => [
                //                 'title' => __( 'Left', 'th-widget-pack' ),
                //                 'icon' => 'fa fa-long-arrow-left',
                //             ],
                //             'full' => [
                //                 'title' => __( 'No Sidebar', 'th-widget-pack' ),
                //                 'icon' => 'fa fa-times',
                //             ],
                //             'right' => [
                //                 'title' => __( 'Right', 'th-widget-pack' ),
                //                 'icon' => 'fa fa-long-arrow-right',
                //             ],

                //         ],
                //         'return_value' => 'yes',
                //     ]
                // );
          

			// $page->add_control(
			// 	'addon_details_heading',
			// 	[
			// 		'label' => esc_html__( 'Heading', MELA_TD ),
			// 		'type' => \Elementor\Controls_Manager::TEXT,
			// 		'label_block' => true,
			// 		'default' => esc_html__( 'Watch the Video', MELA_TD ),
			// 	]
			// );

			$page->add_control(
				'addon_details_sub_heading',
				[
					'label' => esc_html__( 'Sub Heading', MELA_TD ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'label_block' => true,
					'default' => esc_html__( 'Progressively customize highly efficient e-markets with user friendly intellectual capital. Dramatically target.', MELA_TD ),
				]
			);



			$page->add_control(
				'addon_details_video_link',
				[
					'label' => __( 'Video Link', MELA_TD ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => __( 'https://www.youtube.com/watch?v=dWvW10QROXI', MELA_TD ),
					'label_block' => true,
					'default' => [
						'url' => '#',
						'is_external' => false,
					],
				]
			);


			$page->add_control(
				'addon_details_image',
				[
					'label' => __( 'Video Thumb Image', MELA_TD ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);

			// $page->add_control(
			// 	'addon_details_bg_image',
			// 	[
			// 		'label' => __( 'Background Image', MELA_TD ),
			// 		'type' => \Elementor\Controls_Manager::MEDIA,
			// 		'default' => [
			// 			'url' => \Elementor\Utils::get_placeholder_image_src(),
			// 		],
			// 	]
			// );


    }
}

// add_action( 'elementor/element/post/document_settings/after_section_start', 'th_add_custom_controls_elem_post_settings_top',10, 2);
add_action( 'elementor/element/post/document_settings/before_section_end', 'th_add_custom_controls_elem_post_settings_bottom',10, 2);





// Elementor Page Settings needs to be synced with Option Tree Settings.
// Compare and update to stay synced.
if ( ! function_exists( 'sync_ot_and_elem_page_settings' ) ) {
    function sync_ot_and_elem_page_settings() {
        global $post;
        if(isset($post->ID)){
            $post_id = $post->ID;

            $page = \Elementor\Plugin::$instance->documents->get( $post_id );

            if ( $page ) {

                $addon_details_heading = $page->get_settings('addon_details_heading');
                $addon_details_sub_heading = $page->get_settings('addon_details_sub_heading');
                $elm_hide_title = $page->get_settings('hide_title');
                $addon_details_video_link = $page->get_settings('addon_details_video_link');
                $addon_details_image = $page->get_settings('addon_details_image');
                $addon_details_bg_image = $page->get_settings('addon_details_bg_image');

                // if (empty($addon_details_heading)) {
                //     $addon_details_heading = 'off';
                // }
                // if (empty($elm_hide_title)) {
                //     $elm_hide_title = 'off';
                // } else {
                //     $elm_hide_title = 'on';
                // }

                update_post_meta($post_id, 'addon_details_heading', $addon_details_heading);
                update_post_meta($post_id, 'addon_details_sub_heading', $addon_details_sub_heading);
                update_post_meta($post_id, 'osaka_pro_hide_title', $elm_hide_title); //hide_title
                update_post_meta($post_id, 'addon_details_video_link', $addon_details_video_link);
                update_post_meta($post_id, 'addon_details_image', $addon_details_image);
                update_post_meta($post_id, 'addon_details_bg_image', $addon_details_bg_image);

                //}
            }

        }
    }
}

add_action('admin_head', 'sync_ot_and_elem_page_settings'); // When WP Admin is loaded
add_action('template_redirect', 'sync_ot_and_elem_page_settings'); // When Pages and posts are loaded
//add_action( 'elementor/editor/after_save', 'th_update_elem_page_settings_post_meta') ; // When Elementor Editor is saved.