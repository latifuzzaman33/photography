<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">  
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="top">

    <section class="s-pageheader <?php if(is_home()){echo 's-pageheader--home';}?> ">

        <header class="header">
            <div class="header__content row">

                <div class="header__logo">
                    <?php the_custom_logo(); ?>
                </div> 

                <ul class="header__social">
                    <?php 
                        $facebook = get_theme_mod('header_social_facebook');
                        $twitter = get_theme_mod('header_social_twitter');
                        $instagram = get_theme_mod('header_social_instagram');
                        $pinterest = get_theme_mod('header_social_pinterest');
                    ?>
                    <li>
                        <a target="_blank" href="<?php echo esc_url($facebook);?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a target="_blank" href="<?php echo esc_url($twitter);?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a target="_blank" href="<?php echo esc_url($instagram);?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a target="_blank" href="<?php echo esc_url($pinterest);?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                    </li>
                </ul> <!-- end header__social -->

                <a class="header__search-trigger" href="#0"></a>

                <div class="header__search">

                    <form role="search" method="get" class="header__search-form" action="<?php echo home_url('/'); ?>">
                        <label>
                            <span class="hide-content">Search for:</span>
                            <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                        </label>
                        <input type="submit" class="search-submit" value="Search">
                        <!-- <input type="hidden" name="post_type" value="post"/> -->
                    </form>
        
                    <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

                </div>  <!-- end header__search -->


                <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

                <nav class="header__nav-wrap">

                    <h2 class="header__nav-heading h6">Site Navigation</h2>
                    <?php                    
                       $primary_menu = wp_nav_menu(
                            array(
                                'theme_location' => 'primary-menu',
                                'menu_class'        => 'header__nav',
                                'echo'        => false,
                            )
                        );

                        $primary_menu = str_replace('menu-item-has-children','menu-item-has-children has-children',$primary_menu);

                        echo $primary_menu;                   
                    ?>
                    
                    <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

                </nav> 

            </div> 
        </header> 
            <?php
            if ( is_home() ) {
                get_template_part( "template-parts/blog-home/featured" );
            }
            ?>
</section>