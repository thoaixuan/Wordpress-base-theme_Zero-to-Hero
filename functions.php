<?php
/**
 * thoaixuanv2 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package thoaixuanv2
 */

if ( ! function_exists( 'thoaixuanv2_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function thoaixuanv2_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on thoaixuanv2, use a find and replace
		 * to change 'thoaixuanv2' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'thoaixuanv2', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'thoaixuanv2' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'thoaixuanv2_custom_background_args', array(
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
add_action( 'after_setup_theme', 'thoaixuanv2_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function thoaixuanv2_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'thoaixuanv2_content_width', 640 );
}
add_action( 'after_setup_theme', 'thoaixuanv2_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function thoaixuanv2_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'thoaixuanv2' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'thoaixuanv2' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'thoaixuanv2_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

//* Do NOT include the opening php tag
 
//* Load Font Awesome


function thoaixuanv2_scripts() {
	// add font-awesome , bootstrap
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri(). '/css/bootstrap.min.css', array(), '4.4.1', 'all' );
	
	//wp_enqueue_style( 'font-awesome', get_template_directory_uri(). '/css/fontawesome.min.css', array(), '5.12.0', 'all' );
	wp_enqueue_script( 'thoaixuan-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.4.1', true );
	
	//-------------------------------------
	wp_enqueue_style( 'thoaixuanv2-style', get_stylesheet_uri() );

	wp_enqueue_script( 'thoaixuanv2-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'thoaixuanv2-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'thoaixuanv2_scripts' );

/*Add bootstrap */
// neu function no khong ton tai. thi tao 1 function 
if(!function_exists('ie_scripts')){
	function ie_scripts(){
	echo '<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->';
    echo '<!-- WARNING: Respond.js doesn'.'t work if you view the page via file:// -->';
	echo '<!--[if lt IE 9]>';
    echo '  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>';
    echo '<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>';
    echo '<![endif]-->';
}
// them action them vao the head
add_action('wp_head','ie_scripts');
}


/*------------------------------------------------------ */
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

