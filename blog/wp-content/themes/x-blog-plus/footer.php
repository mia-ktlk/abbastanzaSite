<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package x-blog
 */
$xblog_plus_footer_copywright = get_theme_mod( 'footer_copywright');

?>

	</div><!-- #content -->
    <?php if(is_dynamic_sidebar('footer-widget')): ?>
    <div class="footer-widget-area"> 
        <div class="baby-container widget-footer"> 
	        <div class="widget-items"> 
	            <?php dynamic_sidebar('footer-widget'); ?>
	        </div>
        </div>
    </div>
    <?php endif; ?>
	<footer id="colophon" class="site-footer footer-display">
		<div class="baby-container site-info">
			<p class="footer-copyright">
			<!-- .footer-copyright -->
				<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'powered by %1$s', 'x-blog-plus' ), '<a href="'.esc_url('https://wpthemespace.com/product/x-blog-plus/').'">XBlog Plus WordPress Theme </a>' );
				?>
			</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
