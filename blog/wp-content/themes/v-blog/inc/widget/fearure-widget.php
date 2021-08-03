<?php

class Blog_Mag_Feature_Widget extends WP_Widget
{
    
     private function defaults()
        {

            $defaults       = array(
                'image_uri1' => "",
                'title1'     =>esc_html__("Download",'v-blog'),
                'title_link1'=> "",
                'image_uri2' => "",
                'title2'     =>esc_html__("Features",'v-blog'),
                'title_link2'=> "",
                'image_uri3' => "",
                'title3'     =>esc_html__("Try Pro Version",'v-blog'),
                'title_link3'=> "",
            );

            return $defaults;
        }



     public function __construct()
     {
          parent::__construct(
               'v-blog-feature-widget',
               __( 'Blog Mag Feature Widget', 'v-blog' ),
               array( 'description' => __( 'Best displayed below Menu.', 'v-blog' ) )
          );
      }
    
     public function widget( $args, $instance )
     {
          extract( $args );
        if(!empty($instance))
       { 
          $instance = wp_parse_args( (array ) $instance, $this->defaults() );

         $image1      = $instance['image_uri1'];
         $title1      = $instance['title1'];
         $title_link1 = $instance['title_link1'];

         $image2      = $instance['image_uri2'];
         $title2      = $instance['title2'];
         $title_link2 = $instance['title_link2'];

         $image3      = $instance['image_uri3'];
         $title3      = $instance['title3'];
         $title_link3 = $instance['title_link3'];

         if( !empty( $image1 ) || !empty( $image2 ) || !empty( $image3 ))
         {
          ?>
             <div class=" boxed-wrapper clear-fix">
                  <!-- Link 1 -->
                <div class="featured-link col-md-4">
                      <img src="<?php echo esc_url($image1); ?>" alt="<?php echo esc_attr( $title1 ); ?>">
                  <a href="<?php echo esc_url($title_link1); ?>" class="customize-unpreviewable">
                    <div class="cv-outer">
                      <div class="cv-inner">
                        <h6><?php echo esc_html( $title1 ); ?></h6>
                      </div>
                    </div>
                  </a>
                  </div>
              
              <!-- Link 2 -->
                <div class="featured-link col-md-4">
                         <img src="<?php echo esc_url($image2); ?>" alt="<?php echo esc_attr( $title2 ); ?>">
                  <a href="<?php echo esc_url($title_link2); ?>" class="customize-unpreviewable">
                    <div class="cv-outer">
                      <div class="cv-inner">
                        <h6><?php echo esc_html( $title2 ); ?></h6>
                      </div>
                    </div>
                  </a>
                  </div>
              
                <!-- Link 3 -->
                <div class="featured-link col-md-4">
                    <img src="<?php echo esc_url($image3); ?>" alt="<?php echo esc_attr( $title3 ); ?>">
                    <a href="<?php echo esc_url($title_link3); ?>" class="customize-unpreviewable">
                    <div class="cv-outer">
                      <div class="cv-inner">
                        <h6><?php echo esc_html( $title3 ); ?></h6>
                      </div>
                    </div>
                  </a>
                </div>
  
              </div>

          
          <?php
          }
        }   
     }

     public function update( $new_instance, $old_instance ){
        $instance                 = $old_instance;
        $instance['image_uri1']   = esc_url_raw( $new_instance['image_uri1'] );
        $instance['title1']       = sanitize_text_field( $new_instance['title1'] );
        $instance['title_link1']  = esc_url_raw( $new_instance['title_link1'] );

        $instance['image_uri2']   = esc_url_raw( $new_instance['image_uri2'] );
        $instance['title2']       = sanitize_text_field( $new_instance['title2'] );
        $instance['title_link2']  = esc_url_raw( $new_instance['title_link2'] );

        $instance['image_uri3']   = esc_url_raw( $new_instance['image_uri3'] );
        $instance['title3']       = sanitize_text_field( $new_instance['title3'] );
        $instance['title_link3']  = esc_url_raw( $new_instance['title_link3'] );
       
        return $instance;
     }

     public function form($instance ){

         $instance  = wp_parse_args( (array ) $instance, $this->defaults() );
        
          ?>
             <p>
                <label for="<?php echo $this->get_field_id('image_uri1'); ?>">
                   <strong><?php _e( 'Feature One', 'v-blog' ); ?>:</strong> 
                </label>
                <span class="img-preview-wrap" <?php  if ( empty( $instance['image_uri1'] ) ){ ?> style="display:none;" <?php  } ?>>
                    <img class="widefat" src="<?php echo $instance['image_uri1']; ?>" alt="<?php esc_attr_e( 'Image preview', 'v-blog' ); ?>"  />
                </span><!-- .img-preview-wrap -->
                <input type="text" class="widefat" name="<?php echo $this->get_field_name('image_uri1'); ?>" id="<?php echo $this->get_field_id('image_uri1'); ?>" value="<?php echo $instance['image_uri1']; ?>" />
                <input type="button" id="custom_media_button"  value="<?php esc_attr_e( 'Upload Image', 'v-blog' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Image','v-blog'); ?>" data-button="<?php esc_attr_e( 'Select Image','v-blog'); ?>"/>
                <input type="button" id="remove_media_button" value="<?php esc_attr_e( 'Remove Image', 'v-blog' ); ?>" class="button media-image-remove" />
           </p>
            <p>
                 <label for="<?php echo $this->get_field_id('title1'); ?>"><strong><?php _e( 'Feature One Title', 'v-blog' ); ?></strong></label><br />
                 <input type="text" name="<?php echo $this->get_field_name('title1'); ?>" id="<?php echo $this->get_field_id('title1'); ?>" value="<?php
                  if (isset($instance['title1']) && $instance['title1'] != '' ) :
                    echo esc_attr($instance['title1']);
                   endif;

                   ?>" class="widefat" />
             </p>

             <p>
                 <label for="<?php echo $this->get_field_id('title_link1'); ?>"><strong><?php _e( 'Feature One Title Link', 'v-blog' ); ?></strong></label><br />
                 <input type="text" name="<?php echo $this->get_field_name('title_link1'); ?>" id="<?php echo $this->get_field_id('title_link1'); ?>" value="<?php
                  if (isset($instance['title_link1']) && $instance['title_link1'] != '' ) :
                    echo esc_attr($instance['title_link1']);
                   endif;

                   ?>" class="widefat" />
             </p>

            <hr>
              <p>
                <label for="<?php echo $this->get_field_id('image_uri2'); ?>">
                    <strong><?php _e( 'Feature Two', 'v-blog' ); ?>:</strong>
                </label>
                <span class="img-preview-wrap" <?php  if ( empty( $instance['image_uri2'] ) ){ ?> style="display:none;" <?php  } ?>>
                    <img class="widefat" src="<?php echo $instance['image_uri2']; ?>" alt="<?php esc_attr_e( 'Image preview', 'v-blog' ); ?>"  />
                </span><!-- .img-preview-wrap -->
                <input type="text" class="widefat" name="<?php echo $this->get_field_name('image_uri2'); ?>" id="<?php echo $this->get_field_id('image_uri2'); ?>" value="<?php echo $instance['image_uri2']; ?>" />
                <input type="button" id="custom_media_button"  value="<?php esc_attr_e( 'Upload Image', 'v-blog' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Image','v-blog'); ?>" data-button="<?php esc_attr_e( 'Select Image','v-blog'); ?>"/>
                <input type="button" id="remove_media_button" value="<?php esc_attr_e( 'Remove Image', 'v-blog' ); ?>" class="button media-image-remove" />
           </p>
            <p>
                 <label for="<?php echo $this->get_field_id('title2'); ?>"><strong><?php _e( 'Feature Two Title', 'v-blog' ); ?></strong></label><br />
                 <input type="text" name="<?php echo $this->get_field_name('title2'); ?>" id="<?php echo $this->get_field_id('title2'); ?>" value="<?php
                  if (isset($instance['title2']) && $instance['title2'] != '' ) :
                    echo esc_attr($instance['title2']);
                   endif;

                   ?>" class="widefat" />
             </p>

             <p>
                 <label for="<?php echo $this->get_field_id('title_link2'); ?>"><strong><?php _e( 'Feature Two Title Link', 'v-blog' ); ?></strong></label><br />
                 <input type="text" name="<?php echo $this->get_field_name('title_link2'); ?>" id="<?php echo $this->get_field_id('title_link2'); ?>" value="<?php
                  if (isset($instance['title_link2']) && $instance['title_link2'] != '' ) :
                    echo esc_attr($instance['title_link2']);
                   endif;

                   ?>" class="widefat" />
             </p>
            
            <hr>
              
              <p>
                <label for="<?php echo $this->get_field_id('image_uri3'); ?>">
                   <strong> <?php _e( 'Feature One', 'v-blog' ); ?>:</strong>
                </label>
                <span class="img-preview-wrap" <?php  if ( empty( $instance['image_uri3'] ) ){ ?> style="display:none;" <?php  } ?>>
                    <img class="widefat" src="<?php echo $instance['image_uri3']; ?>" alt="<?php esc_attr_e( 'Image preview', 'v-blog' ); ?>"  />
                </span><!-- .img-preview-wrap -->
                <input type="text" class="widefat" name="<?php echo $this->get_field_name('image_uri3'); ?>" id="<?php echo $this->get_field_id('image_uri3'); ?>" value="<?php echo $instance['image_uri3']; ?>" />
                <input type="button" id="custom_media_button"  value="<?php esc_attr_e( 'Upload Image', 'v-blog' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Image','v-blog'); ?>" data-button="<?php esc_attr_e( 'Select Image','v-blog'); ?>"/>
                <input type="button" id="remove_media_button" value="<?php esc_attr_e( 'Remove Image', 'v-blog' ); ?>" class="button media-image-remove" />
           </p>
            <p>
                 <label for="<?php echo $this->get_field_id('title1'); ?>"><strong><?php _e( 'Feature Three Title', 'v-blog' ); ?></strong></label><br />
                 <input type="text" name="<?php echo $this->get_field_name('title3'); ?>" id="<?php echo $this->get_field_id('title3'); ?>" value="<?php
                  if (isset($instance['title3']) && $instance['title3'] != '' ) :
                    echo esc_attr($instance['title3']);
                   endif;

                   ?>" class="widefat" />
             </p>

             <p>
                 <label for="<?php echo $this->get_field_id('title_link3'); ?>"><strong><?php _e( 'Feature Three Title Link', 'v-blog' ); ?></strong></label><br />
                 <input type="text" name="<?php echo $this->get_field_name('title_link3'); ?>" id="<?php echo $this->get_field_id('title_link3'); ?>" value="<?php
                  if (isset($instance['title_link3']) && $instance['title_link3'] != '' ) :
                    echo esc_attr($instance['title_link3']);
                   endif;

                   ?>" class="widefat" />
             </p>
            
            <hr>
             
          <?php
     }
}

add_action( 'widgets_init', 'blog_mag_author_widget' ); 
function blog_mag_author_widget(){     
    register_widget( 'Blog_Mag_Feature_Widget' );

}






