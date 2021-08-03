  <header class="nl-main-title">
    <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'shiny-blog' ); ?></h1>
  </header><!-- .nl-main-title -->

  <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
    <p><?php printf( esc_html( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'shiny-blog' ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
</p>
  <?php else : ?>

    <div class="searchresult">
      <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'shiny-blog' ); ?></p>
    </div><!-- .searchresult -->

    <div class="notfound-search">
      <?php get_search_form(); ?>
    </div>

  <?php endif; ?>