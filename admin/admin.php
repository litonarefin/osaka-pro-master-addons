<?php

    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux_Framework_Osaka_Admin_Config' ) ) {

        class Redux_Framework_Osaka_Admin_Config {

            public $args = array();
            public $sections = array();
            public $theme;
            public $ReduxFramework;

            public function __construct() {

                if ( ! class_exists( 'ReduxFramework' ) ) {
                    return;
                }

                // This is needed. Bah WordPress bugs.  ;)
                if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                    $this->initSettings();
                } else {
                    add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
                }

            }

            public function initSettings() {

                // Set the default arguments
                $this->setArguments();

                // Create the sections and fields
                $this->setSections();

                if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
                    return;
                }

                $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
            }

            public function setSections() {
                global $sections;
                $sections = array();

                // ACTUAL DECLARATION OF SECTIONS
                require get_template_directory() . '/admin/admin-settings/global.php';
                require get_template_directory() . '/admin/admin-settings/login.php';
                require get_template_directory() . '/admin/admin-settings/register.php';
                require get_template_directory() . '/admin/admin-settings/blog.php';
                require get_template_directory() . '/admin/admin-settings/portfolio.php';
                require get_template_directory() . '/admin/admin-settings/404.php';
                require get_template_directory() . '/admin/admin-settings/footer.php';
                require get_template_directory() . '/admin/admin-settings/socials.php';
                require get_template_directory() . '/admin/admin-settings/dequeue-styles.php';
                require get_template_directory() . '/admin/admin-settings/dequeue-scripts.php';


                $this->sections = $sections;
            }


            /**
             * All the possible arguments for Redux.
             * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
             * */
            public function setArguments() {

                $theme = wp_get_theme(); // For use with some settings. Not necessary.

                $this->args = array(
                    // TYPICAL -> Change these values as you need/desire
                    'opt_name'           => 'osaka_options',
                    // This is where your data is stored in the database and also becomes your global variable name.
                    'display_name'       => $theme->get( 'Name' ),
                    // Name that appears at the top of your panel
                    'display_version'    => $theme->get( 'Version' ),
                    // Version that appears at the top of your panel
                    'menu_type'          => 'menu',
                    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                    'allow_sub_menu'     => true,
                    // Show the sections below the admin menu item or not
                    'menu_title'         => esc_html__( 'Osaka Options', 'osaka' ),
                    'page_title'         => esc_html__( 'Osaka WordPress Theme Option Settings', 'osaka' ),
                    // You will need to generate a Google API key to use this feature.
                    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                    'google_api_key'     => '',
                    // Must be defined to add google fonts to the typography module

                    'async_typography'   => false,
                    'show_options_object'   => false,
                    // Use a asynchronous font on the front end or font string
                    'admin_bar'          => true,
                    // Show the panel pages on the admin bar
                    'global_variable'    => '',
                    // Set a different name for your global variable other than the opt_name
                    'dev_mode'           => false,
                    // Show the time the page took to load, etc
                    'customizer'         => true,
                    'forced_dev_mode_off' => true,
                    // Enable basic customizer support

                    // OPTIONAL -> Give you extra features
                    'page_priority'      => null,
                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                    'page_parent'        => 'themes.php',
                    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                    'page_permissions'   => 'manage_options',
                    // Permissions needed to access the options panel.
                    'menu_icon'          => get_template_directory_uri() . "/images/menuicon/setting.png",
                    // Specify a custom URL to an icon
                    'last_tab'           => '',
                    // Force your panel to always open to a specific tab (by id)
                    'page_icon'          => 'icon-themes',
                    // Icon displayed in the admin panel next to your menu_title
                    'page_slug'          => 'osaka-theme-options',
                    // Page slug used to denote the panel
                    'save_defaults'      => true,
                    // On load save the defaults to DB before user clicks save or not
                    'default_show'       => false,
                    // If true, shows the default value next to each field that is not the default value.
                    'default_mark'       => '',
                    // What to print by the field's title if the value shown is default. Suggested: *
                    'show_import_export' => true,
                    // Shows the Import/Export panel when not used as a field.

                    // CAREFUL -> These options are for advanced use only
                    'transient_time'     => 60 * MINUTE_IN_SECONDS,
                    'output'             => true,
                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                    'output_tag'         => true,
                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                    'database'           => '',
                    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                    'system_info'        => false,
                    // REMOVE

                    // HINTS
                    'hints'              => array(
                        'icon'          => 'icon-question-sign',
                        'icon_position' => 'right',
                        'icon_color'    => 'lightgray',
                        'icon_size'     => 'normal',
                        'tip_style'     => array(
                            'color'   => 'light',
                            'shadow'  => true,
                            'rounded' => false,
                            'style'   => '',
                        ),
                        'tip_position'  => array(
                            'my' => 'top left',
                            'at' => 'bottom right',
                        ),
                        'tip_effect'    => array(
                            'show' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'mouseover',
                            ),
                            'hide' => array(
                                'effect'   => 'slide',
                                'duration' => '500',
                                'event'    => 'click mouseleave',
                            ),
                        ),
                    )
                );

                // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
                $this->args['share_icons'][] = array(
                    'url'   => 'https://github.com/jeweltheme',
                    'title' => esc_html__( 'Visit us on GitHub', 'osaka'),
                    'icon'  => 'el-icon-github'
                    //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
                );
                $this->args['share_icons'][] = array(
                    'url'   => 'https://www.facebook.com/jwthemeltd',
                    'title' => esc_html__( 'Like us on Facebook', 'osaka'),
                    'icon'  => 'el-icon-facebook'
                );
                $this->args['share_icons'][] = array(
                    'url'   => 'https://twitter.com/jwthemeltd',
                    'title' => esc_html__( 'Follow us on Twitter', 'osaka') ,
                    'icon'  => 'el-icon-twitter'
                );

                // Panel Intro text -> before the form
                if ( ! isset( $this->args['global_variable'] ) || $this->args['global_variable'] !== false ) {
                    if ( ! empty( $this->args['global_variable'] ) ) {
                        $v = $this->args['global_variable'];
                    } else {
                        $v = str_replace( '-', '_', $this->args['opt_name'] );
                    }
                } else {
                    $this->args['intro_text'] = esc_html__( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'osaka' );
                }
            }

        }

        global $reduxConfig;
        $reduxConfig = new Redux_Framework_Osaka_Admin_Config();
    }
