<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gist
 */
global $gist_theme_options;
  $gist_copyright = wp_kses_post($gist_theme_options['gist-footer-copyright']);
?>

	</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <?php

    if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) {
        ?>

        <div class="top-footer">
            <div class="container-inner">
                <div class="clearfix">
                    <?php
                    $count = 0;
                    for ($i = 1; $i <= 4; $i++) {
                        if (is_active_sidebar('footer-' . $i)) {
                            $count++;
                        }
                    }
                    $column = $count;
                    $column_class = 'widget-column footer-active-' . absint($count);
                    for ($i = 1; $i <= 4; $i++) {
                        if (is_active_sidebar('footer-' . $i)) {
                            ?>
                            <div class="ct-col-<?php echo esc_attr($column); ?>">
                                <?php dynamic_sidebar('footer-' . $i); ?>
                            </div>
                        <?php
                        }
                    }

                    ?>


                </div>
            </div>
        </div>
    <?php } ?>
		<div class="site-info">
        <?php
            if( 1 == $gist_theme_options['gist-footer-social']){
            wp_nav_menu( array(
                    'theme_location'    => 'social',
                    'menu_class'        => 'gist-menu-social',
                    'depth'             => 0,
                    'fallback_cb'		=> false
                )
            );
        }
        if( !empty( $gist_copyright ) ){
        ?>
			<span class="copy-right-text"><?php echo $gist_copyright; ?></span>
			<?php
		} ?>
			<div class="powered-text">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'blog-cycle' ) ); ?>"><?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'blog-cycle' ), 'WordPress' );
				?></a>
				<span class="sep"> | </span>
				<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'blog-cycle' ), 'Blog Cycle', '<a href="http://www.candidthemes.com/">Candid Themes</a>' );
				?>
			</div>
			<?php 
			 	if( 1 == $gist_theme_options['gist-footer-gototop'] ){
					gist_go_to_top();
				}
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>