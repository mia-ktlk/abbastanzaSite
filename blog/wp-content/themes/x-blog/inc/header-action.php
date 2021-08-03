<?php 


function xblog_site_title_output(){
	$logo_position = get_theme_mod('logo_position');

	if(has_custom_logo() || display_header_text() == true || (display_header_text() == true && is_customize_preview()) ): ?>
		<div class="baby-container site-branding <?php echo esc_attr($logo_position); ?>">
            <?php
            if(has_custom_logo()):
                the_custom_logo();
            else:
            ?>

			<?php if (display_header_text() == true || (display_header_text() == true && is_customize_preview()) ): ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
					$xblog_description = get_bloginfo( 'description', 'display' );
					if ( $xblog_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $xblog_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>	
				<?php endif; ?>	

			<?php
			endif; ?>
		</div><!-- .site-branding -->
	<?php endif; 

}
add_action('xblog_site_title','xblog_site_title_output');

function xblog_main_menubar_output(){
    $menu_position = get_theme_mod('menu_position','logo-center');

?>
        <div class="menu-bar text-<?php echo esc_attr($menu_position); ?>">
			<div class="baby-container menu-inner">
			
				<nav id="site-navigation" class="main-navigation">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'baby-menu',
							'menu_class'        => 'baby-menu',
						) );
					?>
				</nav><!-- #site-navigation -->	
				<?php if( !empty($xblog_header_search) ): ?>
				<div class="header-search">
					<div class="search-icon"><i class="fas fa-search"></i></div>
					<div class="header-search-form">
						<?php get_search_form(); ?>
					</div>
				</div>
				<?php endif; ?>

			</div>
		</div>

<?php
}
add_action('xblog_main_menubar','xblog_main_menubar_output');