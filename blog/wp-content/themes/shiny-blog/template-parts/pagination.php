<?php the_posts_pagination( array(
  'mid_size'  => 2,
  'prev_text' => _x( 'Previous', 'previous set of posts', 'shiny-blog' ),
  'next_text' => _x( 'Next', 'next set of posts', 'shiny-blog' ),
  'screen_reader_text' => __( ' Site Pagination ', 'shiny-blog' ),
) );