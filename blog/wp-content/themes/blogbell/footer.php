<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BlogBell
 */

/**
 *
 * @hooked blogbell_footer_start
 */
do_action( 'blogbell_action_before_footer' );

/**
 * Hooked - blogbell_footer_top_section -10
 * Hooked - blogbell_footer_section -20
 */
do_action( 'blogbell_action_footer' );

/**
 * Hooked - blogbell_footer_end. 
 */
do_action( 'blogbell_action_after_footer' );

wp_footer(); ?>

</body>  
</html>