<?php
/**
 * Header template
 *
 * @package Blog Cycle
 */
global $gist_theme_options;
?>
<header id="masthead" class="site-header" role="banner">
    <div class="site-branding right-menu-blk">
        <div class="container-inner">
            <div class="header-wrapper">
                <div class="logo-wrapper">
                    <?php
                    if (function_exists('the_custom_logo')) {

                        the_custom_logo();

                    }
                    if (is_front_page() && is_home()) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                  rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                 rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php
                    endif;

                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) : ?>
                        <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                    <?php
                    endif; ?>
                </div>
                <div class="main-navigation-wrapper clear">
                    <div id="mainnav-wrap clear">
                        <nav id="site-navigation" class="main-navigation" role="navigation">
                            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i
                                        class="fa fa-bars"></i>
                            </button>
                            <?php
                            if (has_nav_menu('primary')) {
                                wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu'));
                            } ?>
                        </nav>
                        <!-- #site-navigation -->
                    </div>
                    <!-- <div id="mainnav-wrap"> -->
                </div>
            </div>
        </div>
        <!-- .container-inner -->
    </div>
    <!-- .site-branding -->


</header> <!-- <header id="masthead" class="site-header" role="banner"> -->