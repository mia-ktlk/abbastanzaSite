<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">

  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
    <?php get_template_part( 'template-parts/shinyblog', 'navbar' ); ?>
    <?php get_template_part( 'template-parts/shinyblog', 'featured' ); ?>

    <div id="content" style="background-color: #<?php background_color(); ?>">

      <div class="container">
