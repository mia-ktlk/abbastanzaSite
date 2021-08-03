<?php
/**
 * Active callback functions.
 *
 * @package BlogBell
 */


function blogbell_about_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_about_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}


function blogbell_slider_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_featured-slider_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function blogbell_blog_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_blog_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function blogbell_blog_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[blog_content_type]' )->value();
    return ( blogbell_blog_active( $control ) && ( 'blog_page' == $content_type ) );
}

function blogbell_blog_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[blog_content_type]' )->value();
    return ( blogbell_blog_active( $control ) && ( 'blog_post' == $content_type ) );
}

function blogbell_blog_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[blog_content_type]' )->value();
    return ( blogbell_blog_active( $control ) && ( 'blog_category' == $content_type ) );
}

