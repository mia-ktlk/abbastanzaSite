<?php
/**
 * Default theme options.
 *
 * @package BlogBell
 */

if ( ! function_exists( 'blogbell_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function blogbell_get_default_theme_options() {

	$theme_data = wp_get_theme();
	$defaults = array();


	// Featured Slider Section
	$defaults['disable_featured-slider_section']	= true;
	$defaults['disable_white_overlay']		= true;

	// Latest Posts Section
	$defaults['latest_posts_title']	   	 	= esc_html__( 'Latest Posts', 'blogbell' );
	$defaults['pagination_type']		= 'default';

	// About Section
	$defaults['disable_about_section']	= true;


	// Blog Section
	$defaults['disable_blog_section']		= true;
	$defaults['blog_title']	   	 			= esc_html__( 'Featured Post', 'blogbell' ); 

	
	//General Section
	$defaults['readmore_text']				= esc_html__('Read More','blogbell');
	$defaults['excerpt_length']				= 20;
	$defaults['layout_options_blog']			= 'no-sidebar';
	$defaults['layout_options_archive']			= 'right-sidebar';
	$defaults['layout_options_page']			= 'right-sidebar';	
	$defaults['layout_options_single']			= 'right-sidebar';	

	//Footer section 		
	$defaults['copyright_text']				= esc_html__( 'Copyright &copy; All rights reserved.', 'blogbell' );

	// Pass through filter.
	$defaults = apply_filters( 'blogbell_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'blogbell_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function blogbell_get_option( $key ) {

		$default_options = blogbell_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;