<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BlogBell
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-item' ); ?>>
	<div class="post-item">
		<div class="entry-container">
			<?php if ( has_post_thumbnail() ) { ?>
				<figure>
				    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				</figure>
			<?php } ?>

			<header class="entry-header">
				<div class="entry-meta">
					<?php blogbell_entry_meta(); 
					blogbell_posted_on(); ?>
				</div><!-- .entry-meta -->

				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->

			<?php $readmore_text = blogbell_get_option( 'readmore_text' );?>
			<div class="read-more">
				<a class="more-link" href="<?php the_permalink();?>"><?php echo esc_html($readmore_text);?></a>
			</div><!-- .read-more -->
		</div><!-- .entry-container -->
	</div><!-- .post-item -->
</article><!-- #post-## -->
