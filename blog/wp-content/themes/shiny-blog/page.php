<?php get_header(); ?>

<div class="main">

  <?php if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="entry-header">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </div><!-- .entry-header -->

        <div class="post-content">
          <?php the_content(); ?>
          <?php wp_link_pages(); ?>
        </div><!-- .post-content -->

        <?php edit_post_link( __( 'Edit', 'shiny-blog' ) ); ?>

        <?php if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif; ?>

      </article><!-- #post-## -->

    <?php endwhile; ?>  
  <?php endif; ?>

</div><!-- .main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
