<?php
/**
 * Header template
 *
 * @package Blog Cycle
 */
global $gist_theme_options;
?>

<header id="masthead" class="site-header" role="banner">
    <!-- .top-menu-container-inner -->
    <div class="container-inner">
        <div id="mainnav-wrap">
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i
                            class="fa fa-bars"></i></button>
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu'));
                } ?>
            </nav>
            <!-- #site-navigation -->
        </div>
    </div>
    <!-- .container-inner -->
    <div class="site-branding">
        <div class="container-inner">
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
    </div>
    <!-- .site-branding -->


</header>