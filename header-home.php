<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Osaka
 */
osaka_light_theme_options();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


            <nav class="navbar fixed-top navbar-transparent navbar-expand-md bootsnav">

                <div class="container pwpt-navbar-container">      
                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-main-menu">
                            <i class="fa fa-bars"></i>
                        </button>

                        <?php osaka_light_brand_logo();?>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-main-menu">                        

                      <?php

                          // if(has_nav_menu('main-menu')) {
                          //     $navbar = wp_nav_menu( array(
                          //       'theme_location' => 'main-menu',
                          //       'container'      => false,
                          //       'items_wrap'     => '<ul id="%1$s" class="%2$s" pwpt-nav>%3$s</ul>',
                          //       'menu_id'        => 'nav',
                          //       'menu_class'     => 'pwpt-navbar-nav nav navbar-nav navbar-right',
                          //       'echo'           => true,
                          //       'before'         => '',
                          //       'after'          => '',
                          //       'link_before'    => '',
                          //       'link_after'     => '',
                          //       'depth'          => 0,
                          //       // 'parent_id'      => 'tmMainMenu',
                          //       )
                          //     ); 
                              
                          //     $primary_menu = new rooten_nav_dom($navbar);
                          //     echo  $primary_menu->proccess();
                          //   }

                          $navbar = wp_nav_menu( array(
                            'theme_location' => 'main-menu',
                            'container'      => false,
                            'menu_id'        => 'nav',
                            'menu_class'     => 'pwpt-navbar-nav',
                            'echo'           => false,
                            'before'         => '',
                            'after'          => '',
                            'link_before'    => '',
                            'link_after'     => '',
                            'depth'          => 0,
                            'parent_id'      => 'tmMainMenu',
                            )
                          );

                          $primary_menu = new rooten_nav_dom($navbar);
                          echo  $primary_menu->proccess();

                        ?>


                        <!-- </ul> -->

                    </div><!-- /.navbar-collapse -->
                </div>   
            </nav>            



<?php osaka_light_header_banner();?>


