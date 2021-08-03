<?php 
// Old styles
add_action( 'wp_enqueue_scripts', 'business_blogily_enqueue_styles' );
function business_blogily_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 


// New fonts
function business_blogily_load_google_fonts() {
	wp_enqueue_style( 'business-blogily-google-fonts', '//fonts.googleapis.com/css?family=Lato:700,700i' ); 
}
add_action( 'wp_enqueue_scripts', 'business_blogily_load_google_fonts' ); 


// Header changes
require get_stylesheet_directory() . '/inc/custom-header.php';


// New customizer features
function business_blogily_customize_register( $wp_customize ) {


    $wp_customize->add_setting( 'footer_headline_color', array(
        'default'           => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_headline_color', array(
        'label'       => __( 'Footer Headline Colors', 'business-blogily' ),
        'section'     => 'colors',
        'priority'   => 99,
        'settings'    => 'footer_headline_color',
        ) ) );

    $wp_customize->add_setting( 'footer_text_color', array(
        'default'           => '#807e7e',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_color', array(
        'label'       => __( 'Footer Text Colors', 'business-blogily' ),
        'section'     => 'colors',
        'priority'   => 99,
        'settings'    => 'footer_text_color',
        ) ) );

    $wp_customize->add_setting( 'footer_link_color', array(
        'default'           => '#E2E2E2',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_color', array(
        'label'       => __( 'Footer Link Colors', 'business-blogily' ),
        'section'     => 'colors',
        'priority'   => 99,
        'settings'    => 'footer_link_color',
        ) ) );


    $wp_customize->add_setting( 'footer_link_color', array(
        'default'           => '#E2E2E2',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_link_color', array(
        'label'       => __( 'Footer Link Colors', 'business-blogily' ),
        'section'     => 'colors',
        'priority'   => 99,
        'settings'    => 'footer_link_color',
        ) ) );
    $wp_customize->add_setting( 'footer_bg_color', array(
        'default'           => '#151515',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
        'label'       => __( 'Footer Background Color', 'business-blogily' ),
        'section'     => 'colors',
        'priority'   => 99,
        'settings'    => 'footer_bg_color',
        ) ) );

    $wp_customize->add_setting( 'footer_copyright_bg_color', array(
        'default'           => '#151515',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
        ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_copyright_bg_color', array(
        'label'       => __( 'Footer Copyright Background Color', 'business-blogily' ),
        'section'     => 'colors',
        'priority'   => 99,
        'settings'    => 'footer_copyright_bg_color',
        ) ) );

}
add_action( 'customize_register', 'business_blogily_customize_register' );
if(! function_exists('business_blogily_final_output' ) ):
	function business_blogily_final_output(){
		?>
		<style type="text/css">
     .footer-widgets #pageasyform input[type='submit'],  .footer-widgets #pageasyform input[type='submit']:hover{ background: <?php echo esc_attr(get_theme_mod( 'footer_link_color')); ?>; }
     .footer-widgets h3:after{ background: <?php echo esc_attr(get_theme_mod( 'footer_headline_color')); ?>; }
     .footer-widgets h3, .footer-widgets h3 a, footer .widget.widget_rss h3 a { color: <?php echo esc_attr(get_theme_mod( 'footer_headline_color')); ?>; }
     .footer-widgets .widget li, .footer-widgets .widget, #copyright-note, footer p{ color: <?php echo esc_attr(get_theme_mod( 'footer_text_color')); ?>; }
     footer .widget a, #copyright-note a, #copyright-note a:hover, footer .widget a:hover, footer .widget li a:hover{ color: <?php echo esc_attr(get_theme_mod( 'footer_link_color')); ?>; }
     footer { background: <?php echo esc_attr(get_theme_mod( 'footer_bg_color')); ?>; }
     .copyrights { background: <?php echo esc_attr(get_theme_mod( 'footer_copyright_bg_color')); ?>; }



		</style>
		<?php }
		add_action( 'wp_head', 'business_blogily_final_output' );
		endif;