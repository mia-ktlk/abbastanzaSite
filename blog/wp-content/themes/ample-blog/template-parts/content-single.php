<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ample-blog
 */

global $ample_blog_theme_options;

$show_image_option   = $ample_blog_theme_options['ample-blog-single-featured-image'];

?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  
	  <div class="blog-post single-post">
	   
	   <?php if ( has_post_thumbnail () && $show_image_option == 1 ) 
		   	{ ?>
				<div class="image-holder">
				
					  <?php the_post_thumbnail( 'full' ); ?>
				
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
	        <h1 class="post-title"><a href="#"><?php the_title(); ?></a></h1>
	         <span class="post-meta"><i class="fa fa-user"></i>
	            <?php the_author_posts_link(); ?>
	           <?php ample_blog_posted_on(); ?>
	           <a href=" <?php comments_link(); ?> ">
	           	<i class="fa fa-comment-o"></i><?php comments_number( ' no Comments', ' one Comments', ' % Comments' );; ?> </a></span>
	      </div><!-- .post-info -->
	      <div class="shape1"></div>
	      <div class="entry-content">
	          <?php the_content(); ?>                             
	      </div><!-- .entry-summary -->
	     
	    </div><!-- .post-content -->
	  </div><!-- .blog-post -->
	</article>

