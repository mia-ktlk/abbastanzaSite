<?php

// Setting site primary color.
$wp_customize->add_setting( 'ample_blog_theme_options[primary_color]',
    array(
        'default'           => $defaults['primary_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'ample_blog_theme_options[primary_color]',
        array(
            'label'       => esc_html__( 'Primary Color', 'ample-blog' ),
            'description' => esc_html__( 'Applied to main color of site.', 'ample-blog' ),
            'section'     => 'colors',  
        )
    )
);

    // Overlay Color Picker control. 
        $wp_customize->add_setting(           
             'ample_blog_separator',
                array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
                )
        );
        $wp_customize->add_control(new Ample_Blog_Customize_Section_Separator(
            $wp_customize, 
                'ample_blog_separator', 
                array(
                    'type'      => 'ample_blog_separator',
                    'label' => esc_html__( 'Slider Caption Background Color', 'ample-blog' ),
                    'section'   => 'colors',
                    'priority'  => 110,
                )                   
            )
        );

    // Overlay Color Picker control. 
     $wp_customize->add_setting(
        'ample_blog_theme_options[slider_caption_bg_color]',
        array(
           'default'     =>  $defaults['slider_caption_bg_color'],
           'type'       => 'theme_mod',
           'capability'  => 'edit_theme_options',
           'sanitize_callback' => 'ample_blog_sanitize_rgba',
          

        )
    );
    $wp_customize->add_control(
        new Ample_Blog_Color_Control(
            $wp_customize,
             'ample_blog_theme_options[slider_caption_bg_color]',
            array(
              
                'section' => 'colors',
                'priority' => 110,
                
            )
        )
    );


/**
 * Theme Option
 *
 * @since 1.0.0
 */
$wp_customize->add_panel(
    'ample_blog_theme_options', 
    	array(
        		'priority'       => 200,
            	'capability'     => 'edit_theme_options',
            	'theme_supports' => '',
            	'title'          => esc_html__( 'Ample Blog Theme Options', 'ample-blog' ),
             ) 
);


/*adding sections for Header options*/
    $wp_customize->add_section( 'ample-blog-theme-header-option', array(
        'priority'       => 150,
        'capability'     => 'edit_theme_options',
        'panel'          => 'ample_blog_theme_options',
        'title'          => __( 'Header Option', 'ample-blog' )
    ) );

     /*Enable Header Top*/
    $wp_customize->add_setting( 'ample_blog_theme_options[ample-blog-theme-header-top-enable]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['ample-blog-theme-header-top-enable'],
        'sanitize_callback' => 'ample_blog_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'ample-blog-theme-header-top-enable', array(
        'label'       => __( 'Enable Header Top Section', 'ample-blog' ),
        'description' => __('This section include Top Header Section', 'ample-blog'),
        'section'     => 'ample-blog-theme-header-option',
        'settings'    => 'ample_blog_theme_options[ample-blog-theme-header-top-enable]',
        'type'        => 'checkbox',
        'priority'    => 10
    ) );



 /*Top Header Menu Options */
    $wp_customize->add_setting( 'ample_blog_theme_options[ample-blog-top-header-menu]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['ample-blog-top-header-menu'],
        'sanitize_callback' => 'ample_blog_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'ample-blog-top-header-menu', array(
        'label'     => __( 'Enable/Disable Top Header Menu', 'ample-blog' ),
        'section'   => 'ample-blog-theme-header-option',
        'settings'  => 'ample_blog_theme_options[ample-blog-top-header-menu]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );


   /*Social Options */
    $wp_customize->add_setting( 'ample_blog_theme_options[ample-blog-header-social]', array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['ample-blog-header-social'],
        'sanitize_callback' => 'ample_blog_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'ample-blog-header-social', array(
        'label'     => __( 'Enable/Disable Social Share in Header', 'ample-blog' ),
        'section'   => 'ample-blog-theme-header-option',
        'settings'  => 'ample_blog_theme_options[ample-blog-header-social]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );




   /*adding sections for Breadcrumbs for pages/posts*/
$wp_customize->add_section( 'breadcrumb_type',
 array(
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'title'          => __( 'Breadcrumbs Section', 'ample-blog' ),
        'panel'          => 'ample_blog_theme_options',
      

      ) );

/* breadcrumb_option*/
$wp_customize->add_setting( 'ample_blog_theme_options[breadcrumb_option]',
 array(
            'capability'        => 'edit_theme_options',
            'default'           => $defaults['breadcrumb_option'],
            'sanitize_callback' => 'ample_blog_sanitize_select'
      ) );

$wp_customize->add_control('ample_blog_theme_options[breadcrumb_option]',
    array(
        'label' => esc_html__('Breadcrumb Options', 'ample-blog'),
         'section'   => 'breadcrumb_type',
        'settings'  => 'ample_blog_theme_options[breadcrumb_option]',
        'choices'   => array(
        'simple'     => esc_html__('Simple', 'ample-blog'),
        'disable'    => esc_html__('Disable', 'ample-blog'),
          ),
        'type' => 'select',
        'priority' => 10
    )
);


 /**
     * Breadcrumb Text Field Option 
     */
    $wp_customize->add_setting(
        'ample_blog_theme_options[ample-blog-breadcrumb-text-option]',
        array(
                'default'           => $defaults['ample-blog-breadcrumb-text-option'],
                'sanitize_callback' => 'sanitize_text_field',
             )
    );
    $wp_customize->add_control('ample_blog_theme_options[ample-blog-breadcrumb-text-option]',
        array(
                'label'      => esc_html__('Breadcrumb Text Field','ample-blog'),
                'section'   => 'breadcrumb_type',
                'settings'  => 'ample_blog_theme_options[ample-blog-breadcrumb-text-option]',
                'type'      => 'text',
                'priority'  => 10
             )
    );

 

    /*adding sections for category section in front page*/
$wp_customize->add_section( 'ample-blog-feature-category',
 array(
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'title'          => __( 'Slider Section', 'ample-blog' ),
        'panel'          => 'ample_blog_theme_options',
        'description'    => __( 'Recommended image for slider is 1920*700', 'ample-blog' )

      ) );

/* feature cat selection */
$wp_customize->add_setting( 'ample_blog_theme_options[ample-blog-feature-cat]',
 array(
            'capability'		=> 'edit_theme_options',
            'default'			=> $defaults['ample-blog-feature-cat'],
            'sanitize_callback' => 'absint'
      ) );

$wp_customize->add_control(
    new Ample_Blog_Customize_Category_Dropdown_Control(
        $wp_customize,
        'ample_blog_theme_options[ample-blog-feature-cat]',
        array(
                'label'		=> __( 'Select Category', 'ample-blog' ),
                'section'   => 'ample-blog-feature-category',
                'settings'  => 'ample_blog_theme_options[ample-blog-feature-cat]',
                'type'	  	=> 'category_dropdown',
                'priority'  => 10
             )
    )
);


/* Hide/Show Slider Post in Category Section */

$wp_customize          -> add_setting( 'ample_blog_theme_options[hide-slider-post-at-category]',
 array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['hide-slider-post-at-category'],
        'sanitize_callback' => 'ample_blog_sanitize_checkbox'
      ) );

$wp_customize           -> add_control('ample_blog_theme_options[hide-slider-post-at-category]',
            array(
                    'label'     => __( 'Show Slider Post on Category Post', 'ample-blog'),
                    'section'   => 'ample-blog-feature-category',
                    'type'      => 'checkbox',
                    'priority'  => 10
                 )
    );


/*adding sections for category selection for promo section in homepage*/
$wp_customize        -> add_section( 'ample-blog-site-layout',
 array(
        'priority'       => 160,
        'capability'     => 'edit_theme_options',
        'panel'          => 'ample_blog_theme_options',
        'title'          => __( 'Blog Section Options', 'ample-blog' )
      ) );

/* Sidebar selection */
$wp_customize          -> add_setting( 'ample_blog_theme_options[ample-blog-layout]',
 array(
        'capability'		=> 'edit_theme_options',
        'default'			=> $defaults['ample-blog-layout'],
        'sanitize_callback' => 'ample_blog_sanitize_select'
      ) );

$choices                = ample_blog_sidebar_layout();
$wp_customize           -> add_control('ample_blog_theme_options[ample-blog-layout]',
            array(
                    'choices'   => $choices,
                    'label'		=> __( 'Select Sidebar Options', 'ample-blog'),
                    'section'   => 'ample-blog-site-layout',
                    'settings'  => 'ample_blog_theme_options[ample-blog-layout]',
                    'type'	  	=> 'select',
                    'priority'  => 10
                 )
    );


   /**
     * Enter Excerpt Length
     */
    $wp_customize->add_setting(
        'ample_blog_theme_options[ample-blog-excerpt-lenght]',
        array(
                'default'           => $defaults['ample-blog-excerpt-lenght'],
                'sanitize_callback' => 'absint',
             )
    );
    $wp_customize->add_control('ample_blog_theme_options[ample-blog-excerpt-lenght]',
        array(
                'label'      => esc_html__('Enter Excerpt Length ','ample-blog'),
                'section'    => 'ample-blog-site-layout',
                'description' => esc_html__('Enter Your Excerpt Lenght.', 'ample-blog'),
                'settings'  => 'ample_blog_theme_options[ample-blog-excerpt-lenght]',
                'type'      => 'number',
                'priority'  => 10
             )
    );


   /*Featured Image Options*/
            $wp_customize->add_setting( 'ample_blog_theme_options[ample-blog-featured-image]', array(
                'capability'        => 'edit_theme_options',
                'transport' => 'refresh',
                'default'           => $defaults['ample-blog-featured-image'],
                'sanitize_callback' => 'ample_blog_sanitize_select'
            ) );
            $wp_customize->add_control( 'ample_blog_theme_options[ample-blog-featured-image]', array(
                'choices' => array(
                            'left-image'  => __('Left Image','ample-blog'),
                            'right-image' => __('Right Image','ample-blog'),
                            'default'  => __('Default','ample-blog'),
                            'hide-image'  => __('Hide Image','ample-blog')       
                            ),
                'label'     => __( 'Featured Image Options', 'ample-blog' ),
                'description' => __('Select the options to change the featured image position or hide', 'ample-blog'),
                'section'   => 'ample-blog-site-layout',
                'settings'  => 'ample_blog_theme_options[ample-blog-featured-image]',
                'type'      => 'select',
                'priority'  => 10
            ) );

    
    /*Meta Options*/
            $wp_customize->add_setting( 'ample_blog_theme_options[ample-blog-meta-options]', array(
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh',
                'default'           => $defaults['ample-blog-meta-options'],
                'sanitize_callback' => 'ample_blog_sanitize_checkbox'
            ) );
            $wp_customize->add_control( 'ample_blog_theme_options[ample-blog-meta-options]', array(
                'label'     => __( 'Meta Show/Hide Options', 'ample-blog' ),
                'description' => __('Checked to hide Meta Options', 'ample-blog'),
                'section'   => 'ample-blog-site-layout',
                'settings'  => 'ample_blog_theme_options[ample-blog-meta-options]',
                'type'      => 'checkbox',
                'priority'  => 10
            ) );
    

    /*Continue Reading Text Options*/
            $wp_customize->add_setting( 'ample_blog_theme_options[ample-blog-continue-reading-options]', array(
                'capability'        => 'edit_theme_options',
                'transport'         => 'refresh',
                'default'           => $defaults['ample-blog-continue-reading-options'],
                'sanitize_callback' => 'sanitize_text_field'
            ) );
            $wp_customize->add_control( 'ample_blog_theme_options[ample-blog-continue-reading-options]', array(
                'label'     => __( 'Continue Reading Text', 'ample-blog' ),
                'description' => __('Enter Text For Continue Reading', 'ample-blog'),
                'section'   => 'ample-blog-site-layout',
                'settings'  => 'ample_blog_theme_options[ample-blog-continue-reading-options]',
                'type'      => 'text',
                'priority'  => 10
            ) );

  /**
     * Related Posts title
     */
    $wp_customize->add_setting(
        'ample_blog_theme_options[ample-blog-realted-post-title]',
        array(
                'default'           => $defaults['ample-blog-realted-post-title'],
                'sanitize_callback' => 'sanitize_text_field',
             )
    );
    $wp_customize->add_control('ample_blog_theme_options[ample-blog-realted-post-title]',
        array(
                'label'      => esc_html__('Related Posts title ','ample-blog'),
                'section'   => 'ample-blog-single-option',
                'settings'  => 'ample_blog_theme_options[ample-blog-realted-post-title]',
                'type'      => 'text',
                'priority'  => 10
             )
    );



/*adding sections for Single Post Options*/
    $wp_customize        -> add_section( 'ample-blog-single-option', 
        array(
                'priority'       => 170,
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'panel'          => 'ample_blog_theme_options',
                'title'          => __( 'Single Post Options', 'ample-blog' )
             ) );

/* Single Feature Image options */
$wp_customize          -> add_setting( 'ample_blog_theme_options[ample-blog-single-featured-image]',
 array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['ample-blog-single-featured-image'],
        'sanitize_callback' => 'ample_blog_sanitize_checkbox'
      ) );

$wp_customize           -> add_control('ample_blog_theme_options[ample-blog-single-featured-image]',
            array(
                    'label'     => __( 'Featured Image Options', 'ample-blog'),
                    'description' => __('Show/Hide Featured Image on Single Post', 'ample-blog'),
                    'section'   => 'ample-blog-single-option',
                    'settings'  => 'ample_blog_theme_options[ample-blog-single-featured-image]',
                    'type'      => 'checkbox',
                    'priority'  => 10
                 )
    );



/* Related post Section */
$wp_customize          -> add_setting( 'ample_blog_theme_options[ample-blog-realted-post]',
 array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['ample-blog-realted-post'],
        'sanitize_callback' => 'ample_blog_sanitize_checkbox'
      ) );

$wp_customize           -> add_control('ample_blog_theme_options[ample-blog-realted-post]',
            array(
                    'label'     => __( 'Show/Hide Related Post', 'ample-blog'),
                    'section'   => 'ample-blog-single-option',
                    'settings'  => 'ample_blog_theme_options[ample-blog-realted-post]',
                    'type'      => 'checkbox',
                    'priority'  => 10
                 )
    );


$wp_customize          -> add_setting( 'ample_blog_theme_options[ample-blog-post-meta]',
 array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['ample-blog-post-meta'],
        'sanitize_callback' => 'ample_blog_sanitize_checkbox'
      ) );

$wp_customize           -> add_control('ample_blog_theme_options[ample-blog-post-meta]',
            array(
                    'label'     => __( 'Show/Hide Related Post Post Meta', 'ample-blog'),
                    'section'   => 'ample-blog-single-option',
                    'settings'  => 'ample_blog_theme_options[ample-blog-post-meta]',
                    'type'      => 'checkbox',
                    'priority'  => 10
                 )
    );


/*adding sections for footer options*/
    $wp_customize        -> add_section( 'ample-blog-footer-option', 
        array(
                'priority'       => 170,
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'panel'          => 'ample_blog_theme_options',
                'title'          => __( 'Footer Option', 'ample-blog' )
             ) );

    /*copyright*/
    $wp_customize           -> add_setting( 'ample_blog_theme_options[ample-blog-footer-copyright]',
      array(
                'capability'        => 'edit_theme_options',
                'default'           => $defaults['ample-blog-footer-copyright'],
                'sanitize_callback' => 'wp_kses_post'
            ) );
    $wp_customize   -> 
    add_control( 'ample-blog-footer-copyright',
     array(
            'label'     => __( 'Copyright Text', 'ample-blog' ),
            'section'   => 'ample-blog-footer-option',
            'settings'  => 'ample_blog_theme_options[ample-blog-footer-copyright]',
            'type'      => 'text',
            'priority'  => 10
          ) );




/*adding sections for Sticky Sidebar Options*/
    $wp_customize        -> add_section( 'ample-blog-sticky-sidbar-option', 
        array(
                'priority'       => 170,
                'capability'     => 'edit_theme_options',
                'theme_supports' => '',
                'panel'          => 'ample_blog_theme_options',
                'title'          => __( 'Sticky Sidebar Option', 'ample-blog' )
             ) );

/* Single Feature Image options */
$wp_customize          -> add_setting( 'ample_blog_theme_options[ample-blog-sticky-sidbar-enable]',
 array(
        'capability'        => 'edit_theme_options',
        'default'           => $defaults['ample-blog-sticky-sidbar-enable'],
        'sanitize_callback' => 'ample_blog_sanitize_checkbox'
      ) );

$wp_customize           -> add_control('ample_blog_theme_options[ample-blog-sticky-sidbar-enable]',
            array(
                    'label'     => __( 'Sticky Sidebar Options', 'ample-blog'),
                    'description' => __('Sticky Sidebar Option Enable/Disable Sticky Sidebar', 'ample-blog'),
                    'section'   => 'ample-blog-sticky-sidbar-option',
                    'settings'  => 'ample_blog_theme_options[ample-blog-sticky-sidbar-enable]',
                    'type'      => 'checkbox',
                    'priority'  => 10
                 )
    );