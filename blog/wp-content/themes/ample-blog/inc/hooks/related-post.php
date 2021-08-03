<?php
/**
 * Related Post
 *
 * @since Ample Blog 1.0.0
 *
 * @param null
 * @return void
 *
 */


if (!function_exists('ample_blog_related_post_below')) :

    function ample_blog_related_post_below($post_id)
    {
        global $ample_blog_theme_options;
        $ample_blog_theme_options = ample_blog_get_theme_options();
        $related_post_hide_option     = $ample_blog_theme_options['ample-blog-realted-post'];
        $related_post_title_option    = $ample_blog_theme_options['ample-blog-realted-post-title'];
        $hide_post_meta               = $ample_blog_theme_options['ample-blog-post-meta'];
       
        if ( 0 == $related_post_hide_option)
     
        {
            return;
        }
      
       
         $categories = get_the_category($post_id);
       
        if ($categories)
        {
            $category_ids = array();
           
            foreach ($categories as $category)
            {
                $category_ids[] = $category->term_id;
               
            }

            $ample_blog_plus_cat_post_args = array(
                'category__in' => $category_ids,
                'post__not_in' => array($post_id),
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post_status' => 'publish',
                'ignore_sticky_posts' => true
            );
            
            $ample_blog_plus_featured_query = new WP_Query($ample_blog_plus_cat_post_args);

            if ( $ample_blog_plus_featured_query->have_posts() ) :
           
            ?>
            <div class="related-post news-block">
                <h3 class="text-center related-heading post-title">  <?php echo esc_html($related_post_title_option); ?></h3>
               
                <div class="row">
                    <?php
                    while ($ample_blog_plus_featured_query->have_posts()) :
                        $ample_blog_plus_featured_query->the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class('col-sm-4'); ?>>
                            <div class="blog-post">
                                
                            <?php if ( has_post_thumbnail () ) 
                                { ?>
                                    <div class="image-holder">

                                        <a href="<?php the_permalink(); ?>">
                                          <?php the_post_thumbnail( 'full' ); ?>
                                        </a>

                                    </div>
                          <?php } ?>        

                                <div class="post-content"> 
                                  <div class="post-info text-center">
                                    <?php
                                    $categories = get_the_category();
                                    if ( ! empty( $categories ) ) {
                                        echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"rel="category tag" class="cat-link">'.esc_html( $categories[0]->name ).'</a>';
                                                }
                                    ?>
                                    <h4 class="related-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <?php
                                     if(  $hide_post_meta == 1 )
                                      {
                                    ?>
                                        <span class="post-meta"><i class="fa fa-user"></i>
                                          <?php the_author_posts_link(); ?>
                                           <?php ample_blog_posted_on(); ?>
                                           <a href=" <?php comments_link(); ?> ">
                                            <i class="fa fa-comment-o"></i><?php comments_number( ' no Comments', ' one Comments', ' % Comments' );; ?> </a></span>
                                <?php } ?>            
                                  </div><!-- .post-info -->
                                 
                                </div><!-- .post-content -->
                            </div><!-- .blog-post -->
                        </article>

                         
                    <?php endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
            <?php
            endif;
        }
    }
endif;

add_action('ample_blog_related_posts', 'ample_blog_related_post_below', 10, 1);