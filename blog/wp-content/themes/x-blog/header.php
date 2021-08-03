<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package x-blog
 */
$theme_layout = get_theme_mod('theme_layout');
$slider_text = get_theme_mod('slider_text');
$xblog_header_search = get_theme_mod('xblog_header_search' );
$x_blog_header_image_show = get_theme_mod('x_blog_header_image_show','all-pages' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
		 if(function_exists('wp_body_open')){
		 	wp_body_open();
		 } 
	 ?>
<div id="page" class="site x-blog">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'x-blog' ); ?></a>

	<header id="masthead" class="site-header <?php if(has_header_image() && is_front_page()  && $x_blog_header_image_show == 'home-page' ): ?>baby-head-img<?php endif; ?><?php if(has_header_image() && $x_blog_header_image_show == 'all-pages'): ?>baby-head-img<?php endif; ?>">
        <?php if( has_header_image() ): ?>
	        <?php if( (has_header_image() && $x_blog_header_image_show == 'all-pages') || (has_header_image() && is_front_page() && $x_blog_header_image_show == 'home-page')  ): ?>
	        <div class="header-img"> 
	        <?php the_header_image_tag(); ?>
	        </div>
	        <?php endif; ?>
        <?php endif; ?>
		<?php do_action('xblog_site_title'); ?>
		<?php do_action('xblog_main_menubar'); ?>

		

		
	</header><!-- #masthead -->

	<?php if(!empty($slider_text) && is_home()): ?>
	<section class="home-feature-slider">
		<?php echo wp_kses_post(do_shortcode($slider_text)); ?>
	</section>
	<?php endif; ?>

	<div id="content" class="baby-container site-content <?php echo esc_attr($theme_layout); ?>">
