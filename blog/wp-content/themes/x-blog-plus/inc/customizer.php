<?php
/**
 * eyepress Theme Customizer
 *
 * @package eyepress
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
// adctive call back function for header slider
if ( ! function_exists( 'xblogplus_blank_image_show' ) ) :
function xblogplus_blank_image_show(){
    if (get_theme_mod('xblog_plus_posts_image') == '1') {
        return true;
    }else{
    return false;
    }

}
endif;
// adctive call back function for header slider
if ( ! function_exists( 'xblogplus_image_height' ) ) :
function xblogplus_image_height(){
    if (get_theme_mod('xblog_plus_posts_image') == '1' &&  get_theme_mod('xblog_plus_posts_blank_image') == '1' ) {
        return true;
    }else{
    return false;
    }

}
endif;



function x_blog_plus_customize_register( $wp_customize ) {

    $wp_customize->remove_control('xblog_content_type_control');

    //select sanitization function
    function xblog_plus_sanitize_select( $input, $setting ){
        $input = sanitize_key($input);
        $choices = $setting->manager->get_control( $setting->id )->choices;
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
          
    }

    $wp_customize->add_setting( 'xblog_plus_posts_meta' , array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'       =>  '1',
    'sanitize_callback' => 'absint',
    'transport'     => 'refresh',
    ) );
    $wp_customize->add_control( 'xblog_plus_posts_meta_control', array(
        'label'      => __('Show post meta? ', 'x-blog-plus'),
        'description'=> __('You can show or hide posts meta.', 'x-blog-plus'),
        'section'    => 'x_blog_options',
        'settings'   => 'xblog_plus_posts_meta',
        'type'       => 'checkbox',
        
    ) );
    $wp_customize->add_setting('xblog_plus_posts_date', array(
        'default'       => 'both',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'xblog_plus_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('xblog_plus_posts_date', array(
        'label'      => __('Posts Date Settings', 'x-blog-plus'),
        'section'    => 'x_blog_options',
        'settings'   => 'xblog_plus_posts_date',
        'type'       => 'select',
        'choices'    => array(
            'both' => __('Published & Updated Date', 'x-blog-plus'),
            'publish' => __('Published Date', 'x-blog-plus'),
            'update' => __('Updated Date', 'x-blog-plus'),
            'hide' => __('Hide Date', 'x-blog-plus'),
        ),
    ));
    $wp_customize->add_setting( 'xblog_plus_posts_image' , array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'       =>  '1',
    'sanitize_callback' => 'absint',
    'transport'     => 'refresh',
    ) );
    $wp_customize->add_control( 'xblog_plus_posts_image_control', array(
        'label'      => __('Show post image? ', 'x-blog-plus'),
        'description'=> __('You can show or hide posts image.', 'x-blog-plus'),
        'section'    => 'x_blog_options',
        'settings'   => 'xblog_plus_posts_image',
        'type'       => 'checkbox',
        
    ) );
    $wp_customize->add_setting( 'xblog_plus_posts_blank_image' , array(
    'capability'     => 'edit_theme_options',
    'type'           => 'theme_mod',
    'default'       =>  '1',
    'sanitize_callback' => 'absint',
    'transport'     => 'refresh',
    ) );
    $wp_customize->add_control( 'xblog_plus_posts_blank_image_control', array(
        'label'      => __('Show blank image? ', 'x-blog-plus'),
        'description'=> __('You can show or hide posts blank image.', 'x-blog-plus'),
        'section'    => 'x_blog_options',
        'settings'   => 'xblog_plus_posts_blank_image',
        'type'       => 'checkbox',
        'active_callback' => 'xblogplus_blank_image_show',

        
    ) );
    $wp_customize->add_setting('xblog_plus_post_btntext', array(
        'default'        => __('Continue Reading ..', 'x-blog-plus'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
        'priority'       => 15,
    ));
    $wp_customize->add_control('xblog_plus_post_btntext', array(
        'label'      => __('Posts Button Text', 'x-blog-plus'),
        'description'     => __('You can change post button Continue Reading text.', 'x-blog-plus'),
        'section'    => 'x_blog_options',
        'settings'   => 'xblog_plus_post_btntext',
        'type'       => 'text',

    ));

    $wp_customize->add_setting('xblog_plus_grid_height', array(
        'default'        => 750,
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
        'priority'       => 10,
    ));
    $wp_customize->add_control('xblog_plus_grid_height_control', array(
        'label'      => __('Set grid minimum height', 'x-blog-plus'),
        'description'     => __('You can reduce or increase the grid minimum height..', 'x-blog-plus'),
        'section'    => 'x_blog_options',
        'settings'   => 'xblog_plus_grid_height',
        'type'       => 'text',
        'active_callback' => 'xblogplus_image_height',

    ));

    $wp_customize->add_setting('xblog_plus_top_address', array(
        'default'        => esc_html__('Welcome','x-blog-plus'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('xblog_plus_top_address_control', array(
        'label'      => __('Top bar text', 'x-blog-plus'),
        'description'     => __('Enter top bar text here.', 'x-blog-plus'),
        'section'    => 'x_blog_options',
        'settings'   => 'xblog_plus_top_address',
        'type'       => 'text',
    ));
    


}
add_action( 'customize_register', 'x_blog_plus_customize_register',99 );

