<?php
/*This file is part of Blog Mag, ample blog child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/


function v_blog_widgets_init()
{
    register_sidebar(array(
        'name'         => esc_html__('Feature Widget', 'v-blog'),
        'id'           => 'feature-widget',
        'description'  => esc_html__('Add widgets Below Slider.', 'v-blog'),
        'before_title' => '<h2 class="widget-title">',
        'after_title'  => '</h2>',
    ));

  
}
add_action('widgets_init', 'v_blog_widgets_init');




function v_blog_about_section( $wp_customize ) {
    global $wp_customize;
    $wp_customize->remove_section('theme_detail');
}

add_action( 'customize_register', 'v_blog_about_section' );

add_theme_support( 'post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
    'gallery',
    'status',
    'audio',
    'chat',
) );


function v_blog_child_style() {
$parent_style = 'parent-style'; 
	wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 
		'child-style', 
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version') );
    wp_enqueue_script( 'masonry' );
    wp_enqueue_script('v-blog-custom-masonary', get_stylesheet_directory_uri() . '/assets/js/custom-masonary.js', array('jquery'), '201765', true);
	}
add_action( 'wp_enqueue_scripts', 'v_blog_child_style' );


/**
 * enqueue Admins style for admin dashboard.
 */

if ( !function_exists( 'v_blog_admin_css_enqueue' ) ) :
    
    function v_blog_admin_css_enqueue($hook)
    
    {
      
        wp_register_script('v-blog-page-widget-js', get_stylesheet_directory_uri() . '/assets/js/widget.js', array('jquery'), true);
        wp_enqueue_media();
        wp_enqueue_script('v-blog-page-widget-js');

      
         }
    add_action('admin_enqueue_scripts', 'v_blog_admin_css_enqueue');
endif;

/*Write here your own functions */
require get_stylesheet_directory() . '/inc/widget/fearure-widget.php';


