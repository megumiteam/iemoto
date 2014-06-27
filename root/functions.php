<?php
/**
 * {%= title %} functions and definitions
 *
 * @package {%= title %}
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( '{%= prefix %}_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function {%= prefix %}_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on {%= title %}, use a find and replace
	 * to change '{%= prefix %}' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '{%= prefix %}', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', '{%= prefix %}' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '{%= prefix %}_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // {%= prefix %}_setup
add_action( 'after_setup_theme', '{%= prefix %}_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function {%= prefix %}_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', '{%= prefix %}' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', '{%= prefix %}_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function {%= prefix %}_scripts() {

	${%= prefix %}_theme_data = wp_get_theme();
	${%= prefix %}_theme_ver  = ${%= prefix %}_theme_data->get( 'Version' );

	wp_enqueue_style(
		'{%= prefix %}-style',
		get_stylesheet_uri(),
		array(),
		${%= prefix %}_theme_ver
	);

	wp_enqueue_script(
		'{%= prefix %}-navigation',
		get_template_directory_uri() . '/js/navigation.js',
		array(),
		'20120206',
		true
	);

	wp_enqueue_script(
		'{%= prefix %}-skip-link-focus-fix',
		get_template_directory_uri() . '/js/skip-link-focus-fix.js',
		array(),
		'20130115',
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script(
		'{%= prefix %}-script',
		get_stylesheet_directory_uri() . '/js/{%= file_name %}.min.js',
		array('jquery'),
		${%= prefix %}_theme_ver,
		true
	);
}
add_action( 'wp_enqueue_scripts', '{%= prefix %}_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
