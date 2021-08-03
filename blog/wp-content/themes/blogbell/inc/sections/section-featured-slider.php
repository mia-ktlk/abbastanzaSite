<?php 
/**
 * Template part for displaying Featured Slider Section
 *
 *@package BlogBell
 */


    $image_overlay   = blogbell_get_option( 'disable_white_overlay' );
    $class ='';

    for( $i=1; $i<=3; $i++ ) :
        $featured_slider_page_posts[] = blogbell_get_option( 'slider_page_'.$i );

    endfor;
    ?>
    
        <div class="featured-slider-wrapper" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": true, "arrows":true, "autoplay": true, "fade": false }'>
            <?php 
                $args = array (

                'post_type'     => 'page',
                'post_per_page' => count( $featured_slider_page_posts ),
                'post__in'      => $featured_slider_page_posts,
                'orderby'       =>'post__in',
            );  

            $loop = new WP_Query($args);                        
                if ( $loop->have_posts() ) :
                $i=0;  
                    while ($loop->have_posts()) : $loop->the_post(); $i++;?>

                        <article class="slick-item" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                            <?php 
                                $class='';
                                if (false == $image_overlay) { 
                                    $class='image-overlay';
                                } else{
                                    $class='content-overlay';
                                }
                                if (false == $image_overlay)  {
                            ?>
                                <div class="overlay"></div>
                            <?php } ?>
                            <div class="wrapper">
                                <div class="<?php echo esc_attr($class); ?> featured-content-wrapper">
                                    <header class="entry-header">
                                        <a href="<?php the_permalink();?>" >
                                                <h2 class="entry-title"><?php the_title();?></h2>
                                        </a>
                                    </header>
                                    <div class="separator"></div>
                                    <div class="entry-meta">                 
                                        <?php blogbell_posted_on(); ?>
                                    </div><!-- .entry-meta -->
                                    <?php
                                    $readmore_text   = blogbell_get_option( 'slider_custom_btn_text_' . $i ); 
                                    if ( ! empty( $readmore_text ) ) { ?>
                                        <div class="read-more">
                                            <a href="<?php the_permalink();?>" class="btn btn-primary"><?php echo esc_html($readmore_text);?></a>
                                        </div><!-- .read-more -->
                                    <?php } ?>
                                </div><!-- .featured-content-wrapper -->
                            </div><!-- .wrapper -->
                        </article><!-- .slick-item -->
                    <?php endwhile;?>
                    <?php wp_reset_postdata();
                endif;?>
        </div><!-- .featured-slider-wrapper -->
    