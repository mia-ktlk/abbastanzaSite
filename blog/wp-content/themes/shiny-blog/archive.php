<?php get_header(); ?>

<div class="main">

  <?php if ( have_posts() ) : ?>

    <header class="nl-main-title">
      <?php the_archive_title( '<h1>', '</h1>' ); ?>
      <?php the_archive_description(); ?>
    </header><!-- .nl-main-title -->

    <?php while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/content', get_post_format() );
    endwhile;

      get_template_part( 'template-parts/pagination' ); 

  else :
    get_template_part( 'template-parts/content', 'none' );

  endif; ?>

</div><!-- .main -->

<?php get_sidebar(); ?>

<?php get_footer();
