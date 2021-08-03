<?php
/**
 *Recommended way to include parent theme styles.
 *(Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 */
/**
 * Loads the child theme textdomain.
 */
function blog_cycle_load_language() {
    load_child_theme_textdomain( 'blog-cycle' );
}
add_action( 'after_setup_theme', 'blog_cycle_load_language' );

/**
* Enqueue Style
*/
add_action( 'wp_enqueue_scripts', 'blog_cycle_style' );
function blog_cycle_style() {
	wp_enqueue_style( 'gist-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'blog-cycle-style',get_stylesheet_directory_uri() . '/style.css',array('gist-style'));

    global  $gist_theme_options ;
    $gist_heading_font_url = esc_url( $gist_theme_options['gist-heading-font-url'] );

    if(!empty($gist_heading_font_url)):
    wp_enqueue_style( 'blog-cycle-googleapis', $gist_heading_font_url, array(), null, false, 'all' );
    endif;

    wp_enqueue_script( 'blog-cycle-custom', get_stylesheet_directory_uri() . '/js/blog-cycle-custom.js', array('jquery'), '20151215', true );
}
/**
 * Gist Theme Customizer default value
 *
 * @package Gist
 */
if ( !function_exists('gist_default_theme_options') ) :
    function gist_default_theme_options() {

        $default_theme_options = array(
            'gist-header-type-options'=>'normal-menu',
        	'gist_primary_color' => '#f88c00',
            'gist-footer-copyright'=> esc_html__('All Rights Reserved 2020','blog-cycle'),
            'gist-footer-gototop' => 1,
            'gist-sticky-sidebar'=> 1,
            'gist-sidebar-options'=>'right-sidebar',
            'gist-font-url'=> esc_url('//fonts.googleapis.com/css?family=Poppins', 'blog-cycle'),
            'gist-font-family' => esc_html__('Poppins','blog-cycle'),
            'gist-font-size'=> 16,
            'gist-font-line-height'=> 2,
            'gist-letter-spacing'=> 0,
            'gist-blog-excerpt-options'=> 'excerpt',
            'gist-blog-excerpt-length'=> 25,
            'gist-blog-featured-image'=> 'left-image',
            'blog-cycle-featured-image' => 'alternate',
            'gist-blog-meta-options'=> 0,
            'gist-blog-read-more-options' => esc_html__('Read More','blog-cycle'),
            'gist-blog-pagination-type-options'=>'default',
            'gist-related-post'=> 1,
            'gist-single-featured'=> 1,
            'gist-footer-social' => 0,
            'gist-extra-breadcrumb' => 1,
            'gist-breadcrumb-text' => esc_html__('You Are Here','blog-cycle'),
            'gist-breadcrumb-display-from-option'=> 'theme-default',
            'gist-breadcrumb-display-from-plugins'=>'yoast',
            'gist-heading-font-url'=> esc_url('//fonts.googleapis.com/css?family=Lora', 'blog-cycle'),
            'gist-heading-font-family'=> esc_html__('Lora, sans-serif','blog-cycle')
        );
        return apply_filters( 'gist_default_theme_options', $default_theme_options );
    }
endif;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blog_cycle_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Footer Widget 1', 'blog-cycle'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'blog-cycle'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Widget 2', 'blog-cycle'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'blog-cycle'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Widget 3', 'blog-cycle'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here.', 'blog-cycle'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Widget 4', 'blog-cycle'),
        'id' => 'footer-4',
        'description' => esc_html__('Add widgets here.', 'blog-cycle'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'blog_cycle_widgets_init');

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blog_cycle_customize_register( $wp_customize ) {

    $default = gist_default_theme_options();

    /*Header Options*/
        $wp_customize->add_section( 'gist_header_section', array(
            'priority'       => 15,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Header Options', 'blog-cycle' ),
            'panel'          => 'gist_panel',
        ) );

        $wp_customize->add_setting( 'gist_theme_options[gist-header-type-options]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['gist-header-type-options'],
            'sanitize_callback' => 'gist_sanitize_select'
        ) );
        $wp_customize->add_control( 'gist_theme_options[gist-header-type-options]', array(
            'choices'       => array(
                'normal-menu'         => __('Normal Menu Position','blog-cycle'),
                'top-menu'          => __('Top Menu Position','blog-cycle'),
                'right-menu'        => __('Left Logo Position','blog-cycle'),

            ),
            'label'         => __( 'Select Header Types', 'blog-cycle' ),
            'description'   => __( 'Choose from the below Options', 'blog-cycle' ),
            'section'       => 'gist_header_section',
            'settings'      => 'gist_theme_options[gist-header-type-options]',
            'type'          => 'select'
        ) );

        $wp_customize->add_section('gist-heading-typography-options', array(
                    'title'    => __( 'Heading Font Options', 'blog-cycle' ),
                    'priority' => 50,
                    'panel' => 'gist_panel'
                ));
                
                $wp_customize->add_setting('gist_theme_options[gist-heading-font-url]', array(
                    'default' =>  $default['gist-heading-font-url'],
                    'transport'   => 'refresh',
                    'sanitize_callback' => 'esc_url_raw'
                ));
                
                $wp_customize->add_control('gist_theme_options[gist-heading-font-url]', array(
                     'label' => __('Google Font URL', 'blog-cycle'),
                     'section' => 'gist-heading-typography-options',
                     'type'    => 'url',
                     'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
                        __( 'Insert', 'blog-cycle' ),
                        esc_url('https://www.google.com/fonts'),
                        __('Enter Google Font URL' , 'blog-cycle'),
                        __('to add google Font.' ,'blog-cycle')
                        ),
                    
                ));
                
                $wp_customize->add_setting('gist_theme_options[gist-heading-font-family]', array(
                    'default' => $default['gist-heading-font-family'],
                    'transport'   => 'refresh',
                    'sanitize_callback' => 'sanitize_text_field',
                    'settings'=>'gist_theme_options[gist-heading-font-url]'
                ));
                
                $wp_customize->add_control('gist_theme_options[gist-heading-font-family]', array(
                     'label' => __('Font Family', 'blog-cycle'),
                     'section' => 'gist-heading-typography-options',
                     'type'    => 'text',
                     'description' => __( 'Insert Google Font Family Name.', 'blog-cycle' ),
                )); 

            /*Featured Image Options*/
            $wp_customize->add_setting( 'gist_theme_options[blog-cycle-featured-image]', array(
                'capability'        => 'edit_theme_options',
                'transport' => 'refresh',
                'default'           => $default['blog-cycle-featured-image'],
                'sanitize_callback' => 'gist_sanitize_select'
            ) );
            $wp_customize->add_control( 'gist_theme_options[blog-cycle-featured-image]', array(
                'choices' => array(
                            'left-image'  => __('Left Image','blog-cycle'),
                            'right-image' => __('Right Image','blog-cycle'),
                            'full-image'  => __('Full Image','blog-cycle'),
                            'alternate'  => __('Left & Right Image','blog-cycle'),
                            'hide-image'  => __('Hide Image','blog-cycle')       
                            ),
                'label'     => __( 'Featured Image Options', 'blog-cycle' ),
                'description' => __('Select the options to change the featured image position or hide', 'blog-cycle'),
                'section'   => 'gist_blog_section',
                'settings'  => 'gist_theme_options[blog-cycle-featured-image]',
                'type'      => 'select',
                'priority'  => 30
            ) );

//Removed Section from the Parent theme 
$wp_customize->remove_control('gist_theme_options[gist-blog-featured-image]');

}
add_action( 'customize_register', 'blog_cycle_customize_register', 999 );

/**
 * Post Thumbnail
 *
 *  @since Gist 1.0.0
 */
if (!function_exists('blog_cycle_post_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function blog_cycle_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail( 'gist-large-thumb' ); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>
            <?php
            $image_size = 'gist-small-thumb';
            global $gist_theme_options;
            $image_location = $gist_theme_options['blog-cycle-featured-image'];
            if( $image_location == 'full-image' ){
                $image_size = 'gist-large-thumb';
            }
            if ($image_location != 'hide-image'):
                ?>
                <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                    <?php

                    the_post_thumbnail( $image_size, array(
                        'class' => $image_location,
                        'alt' => the_title_attribute(array(
                                'echo' => false,
                            )
                        )
                    ));
                    ?>
                </a>
            <?php
            endif;
            ?>

        <?php endif; // End is_singular().
    }
endif;

/**
 * Dynamic css
 *
 * @since Blog Circle 1.0.0
 *
 * @param null
 * @return null
 *
 */
if (!function_exists('blog_circle_dynamic_css')) :

    function blog_circle_dynamic_css()
    {

        global $gist_theme_options;
        $gist_heading_font_family = wp_kses_post( $gist_theme_options['gist-heading-font-family'] );
        $custom_css = '';

        if (!empty($gist_heading_font_family)) {
            $custom_css .= "h1, h2, h3, h4, h5, h6, .site-title { font-family: {$gist_heading_font_family}; }";
        }

        wp_add_inline_style('blog-cycle-style', $custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'blog_circle_dynamic_css', 99);

/**
 * Custom theme hooks
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Blog Cycle
 */
if ( ! function_exists( 'blog_cycle_add_main_header' ) ) :

    /**
     * Add main header.
     *
     * @since 1.0.0
     */
    function blog_cycle_add_main_header() {

        global $gist_theme_options;
        $header_layout = $gist_theme_options['gist-header-type-options'];
        if( $header_layout == 'top-menu'){
            get_template_part( 'template-parts/header/header','top-menu' );
        }
        elseif( $header_layout == 'right-menu') {
            get_template_part( 'template-parts/header/header','right-menu' );
        }
        else{
            get_template_part( 'template-parts/header/header','default' );
        }

    }

endif;

add_action( 'blog_cycle_action_header', 'blog_cycle_add_main_header', 10 );