<?php get_header(); ?>

<div class="main">

  <?php if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="entry-header">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
          <p class="post-meta"><?php the_time('d.m.Y'); ?> / <?php the_author_posts_link(); ?> / <?php the_category( ', ' ); ?></p>
        </div><!-- .entry-header -->

        <div class="post-content">
          <?php the_content(); ?>
          <?php wp_link_pages(); ?>
        </div><!-- .post-content -->

        <?php if ( has_tag() ) : ?>
          <p class="post-tags"><?php the_tags( '', '', ''); ?></p>
        <?php endif; ?>

        <?php the_post_navigation( array(
        'prev_text'                  => __( '<b>Previous post: </b></br> %title', 'shiny-blog' ),
        'next_text'                  => __( '<b>Next post: </b></br> %title', 'shiny-blog' ),
        'screen_reader_text' => __( ' Post Navigation ', 'shiny-blog' )
        ) ); ?>

        <?php comments_template( '', true ); ?>

      </article><!-- #post-## -->

    <?php endwhile; ?>  
  <?php endif; ?>

</div><!-- .main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>