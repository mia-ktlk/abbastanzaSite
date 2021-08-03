<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package x-blog
 */
$x_blog_plus_categories_list = get_the_category_list( esc_html__( ' / ', 'x-blog-plus' ) );
$xblog_plus_posts_meta = get_theme_mod('xblog_plus_posts_meta','1');
$xblog_plus_posts_image = get_theme_mod('xblog_plus_posts_image','1');
$xblog_plus_posts_blank_image = get_theme_mod('xblog_plus_posts_blank_image','1');
$xblog_plus_post_btntext = get_theme_mod('xblog_plus_post_btntext',__('Continue Reading ..', 'x-blog-plus'));
if($xblog_plus_posts_blank_image){
$xblog_plus_arclass = 'xgrid-item';
}else{
$xblog_plus_arclass = 'card';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($xblog_plus_arclass); ?>>
	<div class="content-grid">
		<div class="grid-img">
			<?php if( $xblog_plus_posts_image == '1' ): ?>
				<?php if(has_post_thumbnail()): ?>
	        	<div class="baby-feature-image"> 
	            <?php the_post_thumbnail(); ?>
	        	</div>
	    		<?php else: ?>
	    		<div class="<?php if($xblog_plus_posts_blank_image): ?>no-img<?php else: ?>image-hide<?php endif; ?>"></div>
	    		<?php endif; ?>
    		<?php else: ?>
    			<div class="image-hide"></div>
    		<?php endif; ?>
		</div>
		<div class="grid-content">
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="top-cat post-meta grid-cat">
					<i class="fas fa-folder"></i>
					<?php echo wp_kses_post( $x_blog_plus_categories_list ); ?>
				</div>
			<?php endif; ?>
			<header class="entry-header">
				<?php
				if( !is_single() ): ?>
					<h2 class="entry-title">
						<a href="<?php the_permalink(); ?> " rel="bookmark"><?php echo wp_trim_words( get_the_title(), 8 ); ?>
						</a>
					</h2>
					
				<?php
				else:
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() && $xblog_plus_posts_meta == 1) : ?>
				
				<div class="entry-meta post-meta grid-meta">
					<?php x_blog_plus_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>
			</header><!-- .entry-header -->
				<div class="entry-content">
					<?php
			        if( !is_single() ){ 
			            echo wp_trim_words( get_the_content(), 35 ); ?>
			            <div class="redmore-btn"> <a href="<?php the_permalink( ); ?>" class="more-link" rel="bookmark"> <?php echo esc_html($xblog_plus_post_btntext) ?></a></div>
			           
			       <?php
			        }else{ 
			            the_content( sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'x-blog-plus' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						) );
			        }
						

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'x-blog-plus' ),
							'after'  => '</div>',
						) );
					?>
			
				</div><!-- .entry-content -->
		</div>
	</div>





</article><!-- #post-<?php the_ID(); ?> -->
