<?php

class Shinyblog_Social_Icons_Widget extends WP_Widget {

  public function __construct() {
    parent::__construct( 'shinyblog-social-icons', __( 'Social Icons', 'shiny-blog' ),
      array(
        'classname' => 'social-icons'
      ));
  }

  public function widget( $args, $instance ) {
    extract( $args );
    
    $title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
    $text_1     = isset( $instance['text_1'] ) ? $instance['text_1'] : '';
    $text_2     = isset( $instance['text_2'] ) ? $instance['text_2'] : '';
    $text_3     = isset( $instance['text_3'] ) ? $instance['text_3'] : '';
    $text_4     = isset( $instance['text_4'] ) ? $instance['text_4'] : '';
    $text_5     = isset( $instance['text_5'] ) ? $instance['text_5'] : '';
    $select_1   = isset( $instance['select_1'] ) ? $instance['select_1'] : '';
    $select_2   = isset( $instance['select_2'] ) ? $instance['select_2'] : '';
    $select_3   = isset( $instance['select_3'] ) ? $instance['select_3'] : '';
    $select_4   = isset( $instance['select_4'] ) ? $instance['select_4'] : '';
    $select_5   = isset( $instance['select_5'] ) ? $instance['select_5'] : '';
    $protocols = wp_allowed_protocols();

    if ( $title ) {
      echo  esc_html( $title );
    }

    for ($x = 0; $x <= 4; $x++) {
      $selections = array($select_1, $select_2, $select_3, $select_4, $select_5);
      $urls = array( $text_1, $text_2, $text_3, $text_4, $text_5 ); 


      if ( $selections[$x] and $urls[$x] ) { ?>
        <a href="<?php echo  esc_url( $urls[$x], $protocols )  ?>">
          <div class="so-item <?php echo esc_attr( $selections[$x] )  ?>">
            <div class="fab fa-<?php echo esc_attr( $selections[$x] ) ?>"></div>
          </div>
        </a>
      <?php }
    }
  }

  public function update( $new_instance, $old_instance ) {
    
    $instance = $old_instance;
    $instance['title']    = isset( $new_instance['title'] ) ? esc_url_raw( $new_instance['title'] ) : '';
    $instance['text_1']     = isset( $new_instance['text_1'] ) ? esc_url_raw( $new_instance['text_1'] ) : '';
    $instance['text_2']     = isset( $new_instance['text_2'] ) ? esc_url_raw( $new_instance['text_2'] ) : '';
    $instance['text_3']     = isset( $new_instance['text_3'] ) ? esc_url_raw( $new_instance['text_3'] ) : '';
    $instance['text_4']     = isset( $new_instance['text_4'] ) ? esc_url_raw( $new_instance['text_4'] ) : '';
    $instance['text_5']     = isset( $new_instance['text_5'] ) ? esc_url_raw( $new_instance['text_5'] ) : '';
    $instance['select_1']   = isset( $new_instance['select_1'] ) ? wp_strip_all_tags( $new_instance['select_1'] ) : '';
    $instance['select_2']   = isset( $new_instance['select_2'] ) ? wp_strip_all_tags( $new_instance['select_2'] ) : '';
    $instance['select_3']   = isset( $new_instance['select_3'] ) ? wp_strip_all_tags( $new_instance['select_3'] ) : '';
    $instance['select_4']   = isset( $new_instance['select_4'] ) ? wp_strip_all_tags( $new_instance['select_4'] ) : '';
    $instance['select_5']   = isset( $new_instance['select_5'] ) ? wp_strip_all_tags( $new_instance['select_5'] ) : '';
    return $instance;
  }

  public function form( $instance ) {

    $defaults = array( 
      'title'    => '', 
      'text_1'   => '', 
      'text_2'   => '', 
      'text_3'   => '', 
      'text_4'   => '', 
      'text_5'   => '', 
      'select_1'   => '',
      'select_2'   => '',
      'select_3'   => '',
      'select_4'   => '',
      'select_5'   => '',
    );
    $options  = $this->shinyblog_get_social();

    extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Widget Title', 'shiny-blog' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>

    <?php 
      $selections = array($select_1, $select_2, $select_3, $select_4, $select_5);
      $urls = array( $text_1, $text_2, $text_3, $text_4, $text_5 ); 
    
    for ($x = 1; $x <= 5; $x++) { 
?>

      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'select_' . $x) ); ?>"><?php esc_html_e( '<b>Select Social Icon</b>', 'shiny-blog' ); ?></label>
        <select name="<?php echo esc_attr( $this->get_field_name( 'select_' . $x ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'select_' . $x ) ); ?>" class="widefat">
          <option value="0"><?php esc_html_e( '&mdash; Select &mdash;', 'shiny-blog' ); ?></option>
          <?php
          foreach ( $options as $key => $name ) {
            echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $selections[$x-1], $key, false ) . '>'. esc_html( $name ) . '</option>';
          } ?>
        </select>
      </p>

      <p>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text_' . $x ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text_' . $x ) ); ?>" type="text" placeholder="https://" value="<?php echo esc_attr( $urls[$x-1] ); ?>" />
      </p>

    <?php }
  }

  function shinyblog_get_social() {
    $social = array(
      'behance' => 'Behance',
      'facebook' => 'Facebook',
      'flickr' => 'Flickr',
      'github' => 'Github',
      'goodreads' => 'Goodreads',
      'google' => 'Google',
      'instagram' => 'Instagram',
      'linkedin' => 'Linkedin',
      'periscope' => 'Periscope',
      'pinterest' => 'Pinterest',
      'vimeo'=> 'Vimeo',
      'tumblr'=> 'Tumblr',
      'twitter'=> 'Twitter',
      'vine'=> 'Vine',
      'youtube'=> 'Youtube',
    );
    return $social;
  }
}

function shinyblog_register_widget() {
register_widget( 'Shinyblog_Social_Icons_Widget' );
}
add_action( 'widgets_init', 'shinyblog_register_widget' );