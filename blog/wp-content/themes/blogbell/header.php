<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BlogBell
 */
/**
* Hook - blogbell_action_doctype.
*
* @hooked blogbell_doctype -  10
*/
do_action( 'blogbell_action_doctype' );
?>
<head>
<?php
/**
* Hook - blogbell_action_head.
*
* @hooked blogbell_head -  10
*/
do_action( 'blogbell_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
	
<?php

/**
* Hook - blogbell_action_before.
*
* @hooked blogbell_page_start - 10
*/
do_action( 'blogbell_action_before' );

/**
*
* @hooked blogbell_header_start - 10
*/
do_action( 'blogbell_action_before_header' );

/**
*
*@hooked blogbell_site_branding - 10
*@hooked blogbell_header_end - 15 
*/
do_action('blogbell_action_header');

/**
*
* @hooked blogbell_content_start - 10
*/
do_action( 'blogbell_action_before_content' );

/**
 * Banner start
 * 
 * @hooked blogbell_banner_header - 10
*/
do_action( 'blogbell_banner_header' );  
