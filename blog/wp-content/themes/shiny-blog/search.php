<?php get_header(); ?>

<div class="main">

  <header class="nl-main-title">
    <?php if ( have_posts() ) : ?>
      <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'shiny-blog' ), '<span><b>' . get_search_query() . '</b></span>' ); ?></h1>

    <?php else : ?>
      <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'shiny-blog' ); ?></h1>
    <?php endif; ?>
  </header><!-- .nl-main-title -->

  <?php if ( have_posts() ) :

    while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/content', get_post_format() );
    endwhile;
  
    get_template_part( 'template-parts/pagination' ); 

  else : ?>

  <div class="searchresult">
    <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'shiny-blog' ); ?></p>
  </div><!-- .searchresult -->

  <div class="notfound-search">
    <?php get_search_form(); ?>
  </div><!-- .notfound-search -->

  <?php endif; ?>

</div><!-- .main -->

<?php get_sidebar(); ?>

<?php get_footer();
