<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gist
 */
$GLOBALS['gist_theme_options'] = gist_get_theme_options();
global $gist_theme_options;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
//wp_body_open hook from WordPress 5.2
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>
    <div id="page" class="site container-main">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'blog-cycle'); ?></a>

    <?php
    /**
     * Hook - blog_cycle_action_header.
     *
     * @hooked blog_cycle_action_header - 10
     */
    do_action( 'blog_cycle_action_header' );
    ?>
                <!-- #masthead -->
                <div class="header-image-block">
                    <?php  gist_header_image(); ?>
                </div>

                <div id="content" class="site-content container-inner p-t-15">