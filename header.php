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


        <?php //osaka_light_brand_logo();?>
            <!-- <nav class="navbar navbar-expand-md m-0">
                
                <?php //osaka_light_brand_logo();?>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <div class="collapse navbar-collapse" id="main-menu">
                    
                    <?php
                      //   $args = array(
                      //       'theme_location'    => 'main-menu',
                      //       'depth'             => 2,
                      //       'container'         => false,
                      //       'container'         => '',
                      //       'container_class'   => '',
                      //       'menu_class'        => 'nav navbar-nav',
                      //       'walker'            => new osaka_light_Navwalker(),
                      //       'fallback_cb'       => 'osaka_light_Navwalker::fallback',
                      //   );
                      // wp_nav_menu($args);
                    ?>

                </div>
            </nav> -->

            <nav class="navbar navbar-default navbar-fixed navbar-transparent dark bootsnav">

                <div class="container">      
                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>

                        <?php osaka_light_brand_logo();?>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse">                        

                      <?php

                          if(has_nav_menu('main-menu')) {
                              $navbar = wp_nav_menu( array(
                                'theme_location' => 'main-menu',
                                'container'      => false,
                                'items_wrap'     => '<ul id="%1$s" class="%2$s" pwpt-nav>%3$s</ul>',
                                'menu_id'        => 'main-menu',
                                'menu_class'     => 'pwpt-navbar-nav nav navbar-nav navbar-right',
                                'echo'           => true,
                                'before'         => '',
                                'after'          => '',
                                'link_before'    => '',
                                'link_after'     => '',
                                'depth'          => 0,
                                // 'parent_id'      => 'tmMainMenu',
                                )
                              ); 
                              
                              $primary_menu = new rooten_nav_dom($navbar);
                              echo  $primary_menu->proccess();
                            }

                        ?>


                        <!-- </ul> -->

                    </div><!-- /.navbar-collapse -->
                </div>   
            </nav>            



<?php osaka_light_header_banner();?>


