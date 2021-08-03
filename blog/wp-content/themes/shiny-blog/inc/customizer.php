<?php

function shinyblog_native_settings($wp_customize) {
  $wp_customize->get_control('header_textcolor')->label = __('Navigation Bar Color', 'shiny-blog');
  $wp_customize->get_section('colors')->title = __('Theme Colors', 'shiny-blog');
}
add_action('customize_register', 'shinyblog_native_settings');

function shinyblog_theme_colors( $wp_customize ) {

  $customcolor[] = array(
    'slug'=>'main_color', 
    'default' => '#17252a',
    'label' => __( 'Primary Color', 'shiny-blog' ),
  );

  $customcolor[] = array(
    'slug'=>'secondary_color', 
    'default' => '#00a8a8',
    'label' => __( 'Secondary Color', 'shiny-blog' ),
  );

  foreach( $customcolor as $color ) {
    $wp_customize->add_setting(
      $color['slug'], array(
        'default' => $color['default'],
        'type' => 'theme_mod', 
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(
      new WP_Customize_Color_Control(
      $wp_customize,
      $color['slug'], 
        array('label' => $color['label'], 
        'section' => 'colors',
        'settings' => $color['slug']
    )));
  }
}
add_action( 'customize_register', 'shinyblog_theme_colors' );

function shinyblog_color_control() {

$dark = get_theme_mod( 'main_color' );
$cyan = get_theme_mod( 'secondary_color' );
$background_color = get_theme_mod( 'background_color', get_theme_support( 'custom-background', 'default-color' ) );
$header_textcolor = get_theme_mod( 'header_textcolor', get_theme_support( 'custom-header', 'default-text-color' ) );
?>
<style>
article a, .post-content a, .entry-header p, .post-navigation b, .nl-meta, .nl-date, .widget_archive ul li, .widget_categories ul li, .comment a, .nl-sidebar .widgettitle, .post-info a:hover, .sbutton:hover, .mbutton:hover, .topnav li a:hover, .branding h1 a:hover, .branding p a:hover, .widget ul li a:hover { color: <?php echo esc_html($cyan); ?>; }
.post-password-form input[type="submit"], .pagination .nav-links span, .nl-featured, .post-tags a { background: <?php echo esc_html($cyan); ?>; }
.nl-main-title h1 { border-left: 2px solid <?php echo esc_html($cyan); ?>; }
.notfound-search form input:focus, .widget_search form input:focus, .comment-form input[type="text"]:focus, .comment-form input[type="email"]:focus, .comment-form input[type="url"]:focus, .comment-form textarea:focus { border-color: <?php echo esc_html($cyan); ?>; }
.widget a, .nl-sidebar .widget ul a, .nl-sidebar .widget form a, .container, article a:hover, .post-content a:hover, .comment-content th, .post-content th, .post-navigation .nav-links .nav-previous a, .post-navigation .nav-links .nav-next a, .post-navigation .nav-links .nav-previous a:hover b, .post-navigation .nav-links .nav-next a:hover b, .nl-meta a:hover { color: <?php echo esc_html($dark); ?>; }
body, .post-tags a:hover, .pagination .nav-links a, .pagination .nav-links a, .copy-text, .comment-form input[type="submit"], .navrap { background: <?php echo esc_html($dark); ?>; }
.post-navigation .nav-links .nav-previous a, .post-navigation .nav-links .nav-next a { border-left: 2px solid <?php echo esc_html($dark); ?>}#content{ background-color: <?php echo esc_html($background_color); ?>}header{ background-color: #<?php echo esc_html($header_textcolor); ?>}.lazy.nl-header-img.thumbnail{background-image: url(<?php the_post_thumbnail_url('medium'); ?>)}.lazy.nl-header-img{background-image: url(<?php header_image(); ?>)}
</style>

<?php
}
add_action( 'wp_head', 'shinyblog_color_control' );
?>