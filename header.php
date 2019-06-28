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

    <header class="masthead masthead-02">
        <div class="container">
        
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
                        <a class="navbar-brand" href="#brand">
                            <?php osaka_light_brand_logo();?>
                            <img src="images/brand/logo-white.png" class="logo logo-display" alt="">
                            <img src="images/brand/logo-black.png" class="logo logo-scrolled" alt="">

                        </a>
                    </div>
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">

                <li><a href="#">Home</a></li>                    
                <li><a href="#">About Us</a></li>
                <li><a href="#">Services</a></li>
                
                <li class="dropdown megamenu-fw">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Megamenu</a>
                    <ul class="dropdown-menu megamenu-content" role="menu">
                        <li>
                            <div class="row">
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Title Menu One</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- end col-3 -->
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Title Menu Two</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- end col-3 -->
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Title Menu Three</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                            </ul>
                                        </div>
                                    </div>    
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Title Menu Four</h6>
                                        <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                                <li><a href="#">Custom Menu</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- end col-3 -->
                                </div><!-- end row -->
                        </li>
                    </ul>
                </li>

                
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdowns</a>
                        <ul class="dropdown-menu animated fadeOutUp" style="display: none; opacity: 1;">
                            <li><a href="#">Custom Menu</a></li>
                            <li><a href="#">Custom Menu</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sub Menu</a>
                                <ul class="dropdown-menu animated fadeOutUp" style="display: none; opacity: 1;">
                                    <li><a href="#">Custom Menu</a></li>
                                    <li><a href="#">Custom Menu</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sub Menu</a>
                                        <ul class="dropdown-menu animated fadeOutUp" style="display: none; opacity: 1;">
                                            <li><a href="#">Custom Menu</a></li>
                                            <li><a href="#">Custom Menu</a></li>
                                            <li><a href="#">Custom Menu</a></li>
                                            <li><a href="#">Custom Menu</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Custom Menu</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Custom Menu</a></li>
                            <li><a href="#">Custom Menu</a></li>
                            <li><a href="#">Custom Menu</a></li>
                            <li><a href="#">Custom Menu</a></li>
                        </ul>
                    </li>
                    
                <li><a href="#">Contact Us</a></li>

                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>   
            </nav>            

        </div>
    </header>


<?php osaka_light_header_banner();?>


