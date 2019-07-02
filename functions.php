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
	wp_enqueue_style( 'osaka-light-themes', OSAKA_LIGHT_CSS . 'themes.css');
	wp_enqueue_style( 'osaka-light-responsive', OSAKA_LIGHT_CSS . 'responsive.css');
	wp_enqueue_style( 'osaka-light-google-fonts', OSAKA_LIGHT_google_fonts_url());
	
	

	// JS
	wp_enqueue_script( 'bootstrap', OSAKA_LIGHT_JS . 'bootstrap.js', array('jquery'), OSAKA_LIGHT_VER, true );
	wp_enqueue_script( 'osaka-light-main', OSAKA_LIGHT_JS . 'main.js', array('jquery'), '', true );




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
