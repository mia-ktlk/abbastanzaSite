<?php if ( is_active_sidebar( 'nl-sidebar' ) ) : ?>

  <?php 
    if ( is_active_widget( false, false, 'shinyblog-social-icons', true ) ) {
      wp_enqueue_style( 'social-icons' );
	  wp_enqueue_script( 'fontawesome' );
    }
  ?>

  <div class="nl-sidebar">
    <?php dynamic_sidebar( 'nl-sidebar' ); ?>
  </div><!-- .nl-sidebar -->
<?php endif; ?>