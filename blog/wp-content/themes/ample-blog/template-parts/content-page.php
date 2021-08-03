<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Ample-blog
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 	 <div class="blog-post">
	  <div class="post-info page-info text-center ">
	    <h3 class="post-title"><?php the_title(); ?></h3>
	    
	    <div class="shape1"></div>
	  </div>
	  <div class="entry-content post-content innerpage" >
	       <?php if ( has_post_thumbnail () ) 
	     	{ ?>
			    <div class="image-info text-center">
			      <?php the_post_thumbnail( 'full' ); ?>
			      
			    </div><!-- .image-info -->
	     <?php } ?>
	          <?php the_content();
	          
	          wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ample-blog' ),
			'after'  => '</div>',
		) );
	          
	          ?>
	                           
	  </div><!-- .entry-content -->
	</div>  
</article>

