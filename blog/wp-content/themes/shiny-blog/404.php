<?php get_header(); ?>

<div class="main">

  <header class="nl-main-title">
    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found', 'shiny-blog' ); ?></h1>
  </header><!-- .nl-main-title -->

  <div class="searchresult">
    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'shiny-blog' ); ?></p>
  </div><!-- .searchresult -->
  
  <div class="notfound-search">
    <?php get_search_form(); ?>
  </div>

</div><!-- .main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>