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

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('list-art'); ?>>
	<div class="content-list">
		<div class="list-img">
			<?php if(has_post_thumbnail()): ?>
        	<div class="baby-feature-image"> 
            <?php the_post_thumbnail(); ?>
        	</div>
    		<?php else: ?>
    		<div class="no-img"></div>
    		<?php endif; ?>
		</div>
		<div class="list-content">
			<header class="entry-header">
				<?php
					
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

				if ( 'post' === get_post_type() && $xblog_plus_posts_meta == 1 ) : ?>
				
				<div class="entry-meta post-meta list-meta">
					<?php x_blog_plus_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>
			</header><!-- .entry-header -->
				<div class="entry-content">
					<?php
			        if( !is_single() ){ 
			            the_excerpt(); ?>
			            <div class="redmore-btn"> <a href="<?php the_permalink( ); ?>" class="more-link" rel="bookmark"> <?php esc_html_e('Continue Reading ..','x-blog-plus') ?></a></div>
			           
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
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="top-cat post-meta list-cat">
					<i class="fa fa-folder"></i>
					<?php echo wp_kses_post( $x_blog_plus_categories_list ); ?>
				</div>
			<?php endif; ?>
				</div><!-- .entry-content -->
		</div>
	</div>





</article><!-- #post-<?php the_ID(); ?> -->
