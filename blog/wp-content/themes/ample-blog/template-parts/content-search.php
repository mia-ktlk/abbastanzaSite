<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ample-blog
 */

 global $ample_blog_theme_options;

$excerpt_length = $ample_blog_theme_options['ample-blog-excerpt-lenght'];

$show_meta      = $ample_blog_theme_options['ample-blog-meta-options'];

$continue_reading_text   = $ample_blog_theme_options['ample-blog-continue-reading-options'];
$image_option   = $ample_blog_theme_options['ample-blog-featured-image'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="blog-post">
		
	<?php if ( has_post_thumbnail () && $image_option !="hide-image" ) 
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
	        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
	      </div><!-- .post-info -->
	      <div class="shape1"></div>
	      <div class="entry-summary">
	          <p> <?php echo wp_trim_words(get_the_content(),$excerpt_length);?></p>
	          <div class="text-center more-link-wrap"><a href="<?php the_permalink(); ?>" class="btn btn-default"><?php echo esc_html( $continue_reading_text ); ?></a></div>
	      </div><!-- .entry-summary -->
	     
	    </div><!-- .post-content -->
    </div><!-- .blog-post -->
</article>

