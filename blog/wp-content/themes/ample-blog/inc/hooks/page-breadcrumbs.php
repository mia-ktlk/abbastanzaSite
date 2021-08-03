<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @subpackage Ample Blog
 */

if (!function_exists('ample_blog_breadcrumb_type')) :

    function ample_blog_breadcrumb_type($post_id)
    {
       $ample_blog_theme_options   = ample_blog_get_theme_options();
       $breadcrumb_type       = $ample_blog_theme_options['breadcrumb_option'];

        if(  $breadcrumb_type == 'simple' )
        {
?>    
<!--breadcrumb-->
<div class="col-sm-12 col-md-12 ">
  <div class="breadcrumb">
    <?php 
        $breadcrumb_args = array(
            'container'   => 'div',
            'show_browse' => false
        );
       global $ample_blog_theme_options;

        $ample_blog_theme_options  = ample_blog_get_theme_options();
        
        $ample_blog_you_are_here_text        = esc_html( $ample_blog_theme_options['ample-blog-breadcrumb-text-option'] );
        if( !empty( $ample_blog_you_are_here_text ) ){
            $ample_blog_you_are_here_text = "<span class='breadcrumb'>".$ample_blog_you_are_here_text."</span>";
        }
        echo "<div class='breadcrumbs init-animate clearfix'><h3>".$ample_blog_you_are_here_text."</h3><div id='ample-blog-breadcrumbs' class='ample-blog-breadcrumbs clearfix'>";
        breadcrumb_trail( $breadcrumb_args );
        echo "</div></div>";
      // breadcrumb_trail(); 


     ?>
  </div>
</div>
<!--end breadcrumb-->    
<?php  
        }  
    }
endif;

add_action('ample_blog_breadcrumb_type', 'ample_blog_breadcrumb_type', 10, 1);    