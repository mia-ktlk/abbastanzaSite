<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ample-blog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ample_blog_body_classes( $classes )
   {

   	  $classes[] = 'sb-sticky-sidebar';

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() )
	{
		$classes[] = 'hfeed';
	}
// Add design layout of sidebar
	global $ample_blog_theme_options;
	$designlayout  = esc_attr( $ample_blog_theme_options['ample-blog-layout'] );
	$classes[]     = $designlayout;

	$image_options = esc_attr( $ample_blog_theme_options['ample-blog-featured-image'] );
   
	$classes[]     = $image_options;
   
	return $classes;
}
add_filter( 'body_class', 'ample_blog_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function ample_blog_pingback_header()
{
	if ( is_singular() && pings_open() ) 
	{
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'ample_blog_pingback_header');
