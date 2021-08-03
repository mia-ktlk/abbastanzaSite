<?php

if ( ! function_exists( 'shinyblog_setup' ) ) :

  function shinyblog_setup() {

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_editor_style();

    add_theme_support( 'custom-header', apply_filters( 'shinyblog_custom_header_args', array(
      'default-image' => get_parent_theme_file_uri( '/assets/images/header.jpg' ),
      'flex-width'    => true,
      'width'         => 1920,
      'flex-height'   => true,
      'height'        => 480,
    ) ) );

    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    add_theme_support( 'custom-background', apply_filters( 'shinyblog_custom_background_args', array(
      'default-color' => 'fff',
      'default-image' => '',
    ) ) );

    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support( 'custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ) );

    register_nav_menu( 'nl-header', __( 'Main', 'shiny-blog' ) );

  }
endif;
add_action( 'after_setup_theme', 'shinyblog_setup' );

function shinyblog_menu_settings() {
  wp_nav_menu( array(
    'theme_location'  => 'nl-header',
    'depth' => 1,
  ));
}

function shinyblog_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'shinyblog_content_width', 640 );
}
add_action( 'after_setup_theme', 'shinyblog_content_width', 0 );

function shinyblog_scripts() {

  $dir = get_template_directory_uri();

  wp_enqueue_style(
    'google-fonts', add_query_arg(
      array(
        'family' => ( 'Lato:300,400,700,900|Lora:400,400i,700,700i' ),
        'subset' => ( 'latin,latin-ext,cyrillic' ),
      ), '//fonts.googleapis.com/css'
  ));

	wp_enqueue_style( 'shinyblog-main-style', get_stylesheet_uri() );

	wp_enqueue_script( 'shinyblog-main-script', $dir . '/assets/js/script.js', array(), null, true );
	wp_register_script( 'fontawesome', $dir . '/assets/js/fontawesome.min.js', array(), null, true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'shinyblog_scripts' );

function shinyblog_widgets() {
  register_sidebar( array(
    'name' => __( 'Sidebar', 'shiny-blog' ),
    'id' => 'nl-sidebar',
    'description' => __( 'Right sidebar of the template', 'shiny-blog' ),
  ));
}
add_action( 'widgets_init', 'shinyblog_widgets' );

function shinyblog() {
  wp_nav_menu( array(
    'theme_location'  => 'nl-header',
    'menu_id' => 'menu',
    'depth' => 1,
    'container' => 'div',
    'container_id' => 'zero'
  ));
}

if ( ! is_admin() ) {
	function shinyblog_excerpt_length( $length ) {
	  return 18;
	}
	add_filter( 'excerpt_length', 'shinyblog_excerpt_length', 999 );
}

function shinyblog_excerpt_more( $more ) {
  return __('...', 'shiny-blog');
}
add_filter( 'excerpt_more', 'shinyblog_excerpt_more' );

require get_parent_theme_file_path( '/inc/widgets/nl-social.php' );
require get_parent_theme_file_path( '/inc/customizer.php' );

if ( ! function_exists( 'wp_body_open' ) ) {
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support WordPress versions prior to 5.2.0.
     */
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' );
    }
}