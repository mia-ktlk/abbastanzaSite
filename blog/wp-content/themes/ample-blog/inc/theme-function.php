<?php
/**
* Select Images according to Category saved.
*
* @since Ample Blog 1.0.0
*
* @param null
* @return null
*
*/
if ( !function_exists('ample_blog_slider_images_selection') ) :
  function ample_blog_slider_images_selection() 
  { 
        global $ample_blog_theme_options;

       $category_id           = $ample_blog_theme_options['ample-blog-feature-cat'];

       $continue_reading_text = $ample_blog_theme_options['ample-blog-continue-reading-options'];

       $show_meta             = $ample_blog_theme_options['ample-blog-meta-options'];

        $args = array( 'cat' =>$category_id , 'posts_per_page' => -1 );

        $query = new WP_Query($args);

        if($query->have_posts()):

          while($query->have_posts()):

           $query->the_post();
           if(has_post_thumbnail())
              {

                   $image_id = get_post_thumbnail_id();
                   $image_url = wp_get_attachment_image_src($image_id,'homepage-slider',true);
?>
                    
                    <div class="slide-item">
                        <div class="image-holder"><img src="<?php echo esc_url($image_url[0]); ?>" alt="image">
                        </div>
                          <div class="slide-item-hover text-center"> 
                              <div class="post-info text-center">
                                <?php
                                    $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                  echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"rel="category tag" class="cat-link">'.esc_html( $categories[0]->name ).'</a>';
                                      }
                                ?>
                                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <?php
                                if( $show_meta == 1 )
                                   {
                                ?>
                                  <span class="post-meta"><i class="fa fa-user"></i>
                                  <?php the_author_posts_link(); ?>
                                   <?php ample_blog_posted_on(); ?>
                                   <a href=" <?php comments_link(); ?> ">
                                    <i class="fa fa-comment-o"></i><?php comments_number( ' no Comments', ' one Comments', ' % Comments' );; ?> </a></span>
                           <?php } ?>  
                                
                                <div class="entry-summary">                        
                                    <div class="text-center more-link-wrap"><a class="btn btn-default" href="<?php the_permalink(); ?>"><?php echo esc_html( $continue_reading_text ); ?></a></div>
                                </div><!-- .entry-summary -->
                              </div><!-- .post-info -->                      
                          </div><!-- .slide-item-hover -->
                    </div><!-- .slide-item -->

            <?php 
              }
          endwhile; endif;wp_reset_postdata();
 }
endif;


/*
* Remove [...] from default fallback excerpt content
*
*/
function ample_blog_excerpt_more( $more ) {
	if(is_admin())
	{
		return $more;
	}
	return '';
}
add_filter( 'excerpt_more', 'ample_blog_excerpt_more');
 