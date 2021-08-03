<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bloge
 */

 global $ample_blog_theme_options;

  $excerpt_length = $ample_blog_theme_options['ample-blog-excerpt-lenght'];

  $show_meta      = $ample_blog_theme_options['ample-blog-meta-options'];

  $continue_reading_text   = $ample_blog_theme_options['ample-blog-continue-reading-options'];
 
  $image_id = get_post_thumbnail_id();
  $image_url = wp_get_attachment_image_src($image_id,'full',true);

?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-post qutoe-wrap" style="background: url(<?php echo esc_url($image_url[0]); ?>) no-repeat center center;;position: relative;background-size: cover;">
      <div class="post-content"> 
        <div class="post-info text-center">
          <span class="post-format-icon">&ldquo;</span>
        </div><!-- .post-info -->
        
        <div class="entry-summary qutoe-content text-center">
            <p><span>&ldquo;</span> <?php echo esc_html(get_the_content()); ?> <span>&rdquo;</span></p>
        <div class="shape1"></div>
        <h3 class="post-title"><?php the_title(); ?></h3>
        </div><!-- .entry-summary -->                      
      </div><!-- .post-content -->
    </div><!-- .blog-post -->                  
  </article>

