<?php
/**
 * ample Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ample_Blog
 */

if ( ! function_exists( 'ample_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ample_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ample Blog, use a find and replace
		 * to change 'ample-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ample-blog' );
      
      	// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'homepage-slider', 1349, 605, true ); //(cropped)

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ample-blog' ),
		) );

		register_nav_menus( array(
			'top_header' => esc_html__( 'Top Header', 'ample-blog' ),
		) );

		register_nav_menus( array(
			'social-link' => esc_html__( 'Social Link', 'ample-blog' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*gutrnberg*/

		add_theme_support( 'align-wide' );

		/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );


		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ample_blog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ample_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ample_blog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ample_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'ample_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ample_blog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ample-blog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ample-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title" ><span>',
		'after_title'   => '</h3></span><div class="shape2"></div>',

	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'ample-blog' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here', 'ample-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title" ><span>',
		'after_title'   => '</h3></span><div class="shape2"></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'ample-blog' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here', 'ample-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title" ><span>',
		'after_title'   => '</h3></span><div class="shape2"></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'ample-blog' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here', 'ample-blog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title" ><span>',
		'after_title'   => '</h3></span><div class="shape2"></div>',
	) );

}
add_action( 'widgets_init', 'ample_blog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ample_blog_scripts() {

	global $ample_blog_theme_options;

    $ample_blog_theme_options              = ample_blog_get_theme_options();

    $ample_blog_sticky_sidebar_enable      = $ample_blog_theme_options['ample-blog-sticky-sidbar-enable'];

	wp_enqueue_style( 'ample-blog-googleapis', '//fonts.googleapis.com/css?family=Merriweather:300,300i,400,700', array(), null );
    
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
    
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );

    wp_enqueue_style( 'selectize-bootstrap3', get_template_directory_uri() . '/assets/css/selectize.bootstrap3.css' );

    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css' );

    wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css' );

    wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css' );

   	wp_enqueue_style( 'ample-blog-style', get_stylesheet_uri() );

    wp_enqueue_style( 'ample-blog-menu', get_template_directory_uri() . '/assets/css/menu.css' );

	wp_enqueue_style( 'ample-blog-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20151215', true );


	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), time(), true );

	wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/assets/js/jquery.fitvids.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'jquery-equalheight', get_template_directory_uri() . '/assets/js/jquery.equalheights.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'imgLiquid-min', get_template_directory_uri() . '/assets/js/imgLiquid-min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'ample-blog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '20151215', true );

	if( $ample_blog_sticky_sidebar_enable == 1 )
	{
        
        wp_enqueue_script( 'sticky-sidebar', get_template_directory_uri() . '/assets/js/sticky-sidebar.js', array('jquery'), '20151215', true );

		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array('jquery'), '20151215', true );
	}
	
	wp_enqueue_script( 'ample-blog-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array('jquery'), '20151215', true );

    wp_enqueue_script( 'menu', get_template_directory_uri() . '/assets/js/menu.js', array('jquery'), '20151215', true );

    wp_enqueue_script( 'ample-blog-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '20151215', true );



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ample_blog_scripts' );



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Loading related post file
 */

require get_template_directory() . '/inc/hooks/related-post.php';



/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Loading breadcrumbs File.
 */

if (!function_exists('breadcrumb_trail')) {
 
   require get_template_directory() . '/inc/library/breadcrumbs/breadcrumbs.php';

}

/**
 * Loading page-breadcrumbs in pages/posts
 */

require get_template_directory() . '/inc/hooks/page-breadcrumbs.php';


/**
 * Loading dyanmic css hook file
 */

require get_template_directory() . '/inc/hooks/dynamic-css.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Load theme-function  file.
 */
require get_template_directory() . '/inc/theme-function.php';

/**
 * Load Custom widget File.
 */
require get_template_directory() . '/inc/custom-widget/author-widget.php';

/**
 * Load Custom widget File.
 */
require get_template_directory() . '/inc/custom-widget/recent-posts.php';




/**
 * Exclude category in blog page
 *
 * @since Newie 1.0.0
 *
 * @param null
 * @return int
 */

global $ample_blog_theme_options;
	$ample_blog_theme_options    = ample_blog_get_theme_options();
  $showpost = $ample_blog_theme_options['hide-slider-post-at-category'];	

if( $showpost != 1 )
{
 if (!function_exists('ample_blog_exclude_category_in_blog_page')) :
    function ample_blog_exclude_category_in_blog_page($query)
    {   	

        if ($query->is_home && $query->is_main_query()  ) {
        	$ample_blog_theme_options    = ample_blog_get_theme_options();
            $catid = $ample_blog_theme_options['ample-blog-feature-cat'];
            $exclude_categories = $catid;
            if (!empty($exclude_categories)) {
                $cats = explode(',', $exclude_categories);
                $cats = array_filter($cats, 'is_numeric');
                $string_exclude = '';
                echo $string_exclude;
                if (!empty($cats)) {
                    $string_exclude = '-' . implode(',-', $cats);
                    $query->set('cat', $string_exclude);
                }
            }
        }
        return $query;
    }
endif;
add_filter('pre_get_posts', 'ample_blog_exclude_category_in_blog_page');

}


/*
Function to load admin js
*/
if( !function_exists( 'ample_blog_widgets_backend_enqueue' )):
function ample_blog_widgets_backend_enqueue($hook){   

   if ( 'widgets.php' != $hook) {
            return;
        }

    wp_enqueue_script( 'ample-blog-custom-widgets', get_template_directory_uri().'/assets/js/widgets-admin.js', array( 'jquery' ), true );
    wp_enqueue_media();

}

add_action( 'admin_enqueue_scripts', 'ample_blog_widgets_backend_enqueue' );
endif;