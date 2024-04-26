<?php
/**
 * sudus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sudus
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sudus_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on sudus, use a find and replace
		* to change 'sudus' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sudus', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'sudus' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'sudus_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'sudus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sudus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sudus_content_width', 640 );
}
add_action( 'after_setup_theme', 'sudus_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function sudus_scripts() {
	wp_enqueue_style( 'sudus-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'mapbox', 'https://api.mapbox.com/mapbox-gl-js/v3.2.0/mapbox-gl.css' );
	wp_enqueue_style('sudus-main-styles', get_template_directory_uri() . '/assets/css/style.min.css', array(), _S_VERSION );

	/*wp_enqueue_script( 'mapbox-gl', 'https://api.mapbox.com/mapbox-gl-js/v3.2.0/mapbox-gl.js', array('jquery'), '0.49.0', true );*/
	wp_enqueue_script( 'sudus-main-js', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'sudus_scripts' );

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
 * Carbon init
 */

require get_template_directory() . '/inc/carbon-init.php';


/**
 * Custom post types
 */

require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Variables
 */
define( 'SITE_URL', get_site_url() );
define( 'SITE_LOCALE', get_locale() );
define( 'THEME_PATH', get_template_directory_uri() );

