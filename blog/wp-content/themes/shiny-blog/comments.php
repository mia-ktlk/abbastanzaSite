<?php
  if ( post_password_required() )
  return;
?>

<?php if ( have_comments() ) : ?>

  <h3 id="comments">
    <?php
    $comments_number = get_comments_number();
    if ( '1' === $comments_number ) {
        /* translators: %s: post title */
        printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'shiny-blog' ), wp_kses_post( get_the_title() ) );
    } else {
        printf(
            /* translators: 1: number of comments, 2: post title */
            _nx(
                '%1$s Reply to &ldquo;%2$s&rdquo;',
                '%1$s Replies to &ldquo;%2$s&rdquo;',
                $comments_number,
                'comments title',
                'shiny-blog'
            ),
            number_format_i18n( $comments_number ),
            wp_kses_post( get_the_title() )
        );
    }
    ?>
  </h3>

  <ol class="commentlist">
    <?php
      wp_list_comments( array(
        'style'       => 'ol',
        'short_ping'  => true,
        'avatar_size' => 74,
      ) );
    ?>
  </ol><!-- .comment-list -->

  <?php
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
  ?>
    <nav class="navigation comment-navigation" role="navigation">
      <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'shiny-blog' ) ); ?></div>
      <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'shiny-blog' ) ); ?></div>
    </nav><!-- .comment-navigation -->
  <?php endif; // Check for comment navigation ?>

<?php endif; // have_comments() ?>

<?php if ( ! comments_open()) : ?>
  <p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'shiny-blog' ); ?></p>
<?php endif;
comment_form(); ?>