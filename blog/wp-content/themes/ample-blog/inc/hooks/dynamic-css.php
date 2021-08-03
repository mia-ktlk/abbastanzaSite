<?php

/**

 * Dynamic css

 * @subpackage ample blog

 *

 * @param null

 * @return void

 
 */

if ( !function_exists('ample_blog_dynamic_css') ):

    function ample_blog_dynamic_css(){

    $ample_blog_theme_options  = ample_blog_get_theme_options();
   
   /*====================Basic Color=====================*/

    $ample_blog_primary_color  = esc_attr( $ample_blog_theme_options['primary_color'] );
    
    $slider_caption_color          = esc_attr( $ample_blog_theme_options['slider_caption_bg_color'] );
   
    

   $custom_css = '';


/*====================Primary Color =====================*/


$custom_css .= " .post-carousel-style-2.owl-theme.owl-carousel .owl-nav > div:hover,
                  .entry-footer .post-meta a:hover,
                  .entry-footer .post-meta a:focus,
                  .reply,
                  .reply > a,
                  .color-text,
                  a:hover,
                  a:focus,
                  a:active,
                  .btn-link,
                  .cat-link,
                  .separator,
                  .post-format-icon,
                  .header-nav .menu  a:hover,
                  .header-nav .menu  a:focus,
                  .header-nav .menu  a:active,
                  .list-style i,
                  blockquote:before,
                  .widget > ul li a:hover,
                  .scrollToTop
                  {

                      color: " . $ample_blog_primary_color . ";

                   }

                  ";


    $custom_css .= ".shape1, .shape2, .footer-widget-area .widget-title:before,
                    .post-carousel .owl-nav [class*='owl-']:hover,
                    .social-icons-style1 li:hover,
                    .social-icons-style2 li a:hover i,
                    .header-nav.nav-style-dark .menu > .pull-right:hover a,
                    .btn-dark:hover,
                    .btn-dark:focus,
                    .phone-icon-wrap,
                    .email-icon-wrap,
                    .add-icon-wrap,
                    .color-bg,
                    .image-info:after,
                    .image-info:before,
                    .tagcloud a:hover,
                    .tagcloud a:focus,
                    .widget .footer-social-icons li a i:hover,
                    .widget .footer-social-icons li a i:focus,
                    .header-nav.nav-style-light .menu > li.active a:before,
                    .header-nav.nav-style-light .menu > li:hover a:before,
                    .btn-light:hover,
                    .btn-light:focus,
                    .about-me li a:hover,
                    .btn-default,input[type='submit'],
                    .nav-links a,.topbar,.breadcrumb,.header-search .form-wrapper input[type='submit'],
                    .header-search .form-wrapper input[type='submit']:hover

                  {

                      background-color: " . $ample_blog_primary_color . ";

                   }

                  ";    



$custom_css .= " .post-carousel-style-2.owl-theme.owl-carousel .owl-nav > div:hover,
                  .social-icons-style2 li a:hover i,
                  .single-gallary-item-inner::before,
                  .btn-dark:hover,
                  .btn-dark:focus,
                  .contact-info .info-inner,
                  .contact-info,
                  .tagcloud a:hover,
                  .tagcloud a:focus,
                  .widget .footer-social-icons li a i:hover,
                  .widget .footer-social-icons li a i:focus,
                  .btn-light:hover,
                  .btn-light:focus,
                  .header-style2,
                  blockquote,
                  .post-format-icon,
                  .btn-default,
                  .selectize-input.focus

                  {

                      border-color: " . $ample_blog_primary_color . ";

                   }

                  ";


$custom_css .= " .search-form input.search-field,input[type='submit'],.form-wrapper input[type='text'],
                 .top-footer .widget
                  {

                      border: 1px solid " . $ample_blog_primary_color . ";

                  }

                  ";


$custom_css .= " .site-title a, p.site-description, .main-navigation ul li.current-menu-item a
                  {

                      color: " . $ample_blog_primary_color . ";

                  }

                  ";

$custom_css .= ".header-slider-style2 .slide-item .post-info

                  {

                      background: " . $slider_caption_color . ";

                   }

                  ";                  

    /*------------------------------------------------------------------------------------------------- */

    /*custom css*/

    wp_add_inline_style('ample-blog-style', $custom_css);

}

endif;

add_action('wp_enqueue_scripts', 'ample_blog_dynamic_css', 99);