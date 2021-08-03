<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blogger-lite
 */

global $ample_blog_theme_options;

$excerpt_length        = $ample_blog_theme_options['ample-blog-excerpt-lenght'];

$show_meta             = $ample_blog_theme_options['ample-blog-meta-options'];

$image_option          = $ample_blog_theme_options['ample-blog-featured-image'];

$continue_reading_text = $ample_blog_theme_options['ample-blog-continue-reading-options'];

$no_of_columns         ="col-sm-6";

?>

<article  class="<?php echo esc_attr( $no_of_columns ) .' '.join( ' ', get_post_class('masonry-entry') ) ?> " id="post-<?php the_ID(); ?>">
    <div class="blog-post">
		
	<?php if ( has_post_thumbnail () && $image_option !="hide-image") 
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

			if ( ! empty( $categories ) )
			{

				  echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"rel="category tag" class="cat-link">'.esc_html( $categories[0]->name ).'</a>';
			}
			?>
	        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	      <?php
	      	if( $show_meta == 1 )
             {
	        ?>
	         <span class="post-meta"><i class="fa fa-user"></i>
	          <a href="<?php the_author_link(); ?> "><?php echo get_the_author();?></a>
	           <?php ample_blog_posted_on(); ?>
	           <a href=" <?php comments_link(); ?> ">
	           	<i class="fa fa-comment-o"></i><?php comments_number( ' 0', ' 1', ' % ' );; ?> </a></span>
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
