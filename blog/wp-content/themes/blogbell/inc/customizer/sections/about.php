<?php
/**
 * About options.
 *
 * @package BlogBell
 */

$default = blogbell_get_default_theme_options();

// About Author Section
$wp_customize->add_section( 'section_home_about',
	array(
		'title'      => __( 'About', 'blogbell' ),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_about_section]',
	array(
		'default'           => $default['disable_about_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogbell_sanitize_switch_control',
	)
);
$wp_customize->add_control( new BlogBell_Switch_Control( $wp_customize, 'theme_options[disable_about_section]',
    array(
		'label' 			=> __('Enable/Disable About Section', 'blogbell'),
		'section'    		=> 'section_home_about',
		 'settings'  		=> 'theme_options[disable_about_section]',
		'on_off_label' 		=> blogbell_switch_options(),
    )
) );

for( $i=1; $i<=3; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[about_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'blogbell_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[about_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'blogbell'), $i),
		'section'     => 'section_home_about',   
		'settings'    => 'theme_options[about_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'blogbell_about_active',
		)
	);
}