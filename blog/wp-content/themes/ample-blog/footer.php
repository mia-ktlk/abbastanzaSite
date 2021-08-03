<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ample_Blog
 */
global $ample_blog_theme_options;

$ample_blog_theme_options = ample_blog_get_theme_options();

$copyright                    = $ample_blog_theme_options['ample-blog-footer-copyright'];
?>
            </div>  
	 </div>    
</div>
		 <!-- footer start -->
		    <footer id="footer">
		   
            <?php
			
			if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4'))
			{ ?>
		    	<div class="top-footer">
				    <div class="container">
				        <div class="row footer-widget-area" data-equal=".widget-eq-height">
					         <?php
								   	$count = 0;
										for ( $i = 1; $i <= 3; $i++ )
										    {
											  if ( is_active_sidebar( 'footer-' . $i ) )
											        {
														$count++;
													}
											}
										$column = 3;
										if( $count == 3)
								        {
								             	$column = 4;
								        }
								        elseif( $count == 2) 
								        {
								             	$column = 6;
								        }
								       elseif( $count == 1) 
								        {
								             	$column = 12;
								        }
								       
								    	for ( $i = 1; $i <= 3 ; $i++ )
								    	{
					    				  	if ( is_active_sidebar( 'footer-' . $i ) )
					    				  	{
							?>	 
								          <div class="col-md-<?php  echo esc_attr( $column );?>">
								               <?php dynamic_sidebar( 'footer-' . $i ); ?>
								          </div><!-- .col-md-4 --> 
					             <?php               
					                      } 
                                        }  
                                 
		                           ?> 	     


					    </div><!-- .row -->
				    </div>    
			        
			    </div><!-- .container -->
         
      <?php } ?>

		        <div class="copyright-bar">
			        <div class="container">
			            <div class="copyright-text text-uppercase">
			            	<p><?php echo wp_kses_post($copyright); ?></p>
			            	<a href="<?php echo esc_url( __( ' https://www.wordpress.org/', 'ample-blog' ) ); ?>"><?php printf( esc_html__( ' Proudly powered by %s', 'ample-blog' ), 'WordPress' ); ?>
					
				       		</a>
							<span class="sep"> | </span>
							<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'ample-blog' ), 'ample Blog', '<a href="https://www.amplethemes.com/" target="_blank">Ample Themes</a>' ); ?>
			            </div>
			            
			        </div><!-- .container -->
		        </div><!-- .copyright-bar -->  
		    </footer> 
		    <!-- footer end -->   
	 <a id="toTop" class="scrollToTop" href="#" title="<?php esc_attr_e('Go to Top','ample-blog');?>"><i class="fa fa-angle-double-up"></i></a> 

<?php wp_footer(); ?>

</body>
</html>
