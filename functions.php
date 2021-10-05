<?php
/**
 * mdoblog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mdoblog
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.9' );
}

if ( ! function_exists( 'mdoblog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mdoblog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mdoblog, use a find and replace
		 * to change 'mdoblog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mdoblog', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'mdoblog' ),
				'sidebar' => esc_html__( 'Sidebar', 'mdoblog' ),
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

		// // Set up the WordPress core custom background feature.
		// add_theme_support(
		// 	'custom-background',
		// 	apply_filters(
		// 		'mdoblog_custom_background_args',
		// 		array(
		// 			'default-color' => 'ffffff',
		// 			'default-image' => '',
		// 		)
		// 	)
		// );

		// Add theme support for selective refresh for widgets.
		// add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		// add_theme_support(
		// 	'custom-logo',
		// 	array(
		// 		'height'      => 250,
		// 		'width'       => 250,
		// 		'flex-width'  => true,
		// 		'flex-height' => true,
		// 	)
		// );
	}
endif;
add_action( 'after_setup_theme', 'mdoblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
// function mdoblog_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'mdoblog_content_width', 640 );
// }
// add_action( 'after_setup_theme', 'mdoblog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mdoblog_widgets_init() {
	// 普通边栏
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mdoblog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mdoblog' ),
			'before_widget' => '<section id="%1$s" class="widget p-4 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title fst-italic fw-bold">',
			'after_title'   => '</h4>',
		)
	);
	// 友情链接
	register_sidebar(
		array(
			'name'          => esc_html__( 'Links Sidebar', 'mdoblog' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'mdoblog' ),
			'before_widget' => '<section id="%1$s" class="widget p-4 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title fst-italic fw-bold">',
			'after_title'   => '</h4>',
		)
	);
	// 分类边栏
	register_sidebar(
		array(
			'name'          => esc_html__( 'Category Sidebar', 'mdoblog' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'mdoblog' ),
			'before_widget' => '<section id="%1$s" class="widget p-4 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title fst-italic fw-bold">',
			'after_title'   => '</h4>',
		)
	);
	// 文章边栏
	register_sidebar(
		array(
			'name'          => esc_html__( 'Single Sidebar', 'mdoblog' ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Add widgets here.', 'mdoblog' ),
			'before_widget' => '<section id="%1$s" class="widget p-4 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title fst-italic fw-bold">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'mdoblog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mdoblog_scripts() {
	wp_enqueue_style( 'fortawesome-style', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.12.0/css/fontawesome.min.css', array(), '5.12.0' );
	wp_enqueue_style( 'fortawesome-style-brands', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.12.0/css/brands.min.css', array(), '5.12.0' );
	wp_enqueue_style( 'fortawesome-style-solid', 'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.12.0/css/solid.min.css', array(), '5.12.0' );
	wp_enqueue_style( 'sweetalert2-style', 'https://cdn.jsdelivr.net/npm/@sweetalert2/themes@5.0.0/bootstrap-4/bootstrap-4.min.css', array(), '5.0.0-bootstrap-4' );
	wp_enqueue_style( 'mdoblog-style', get_template_directory_uri().'/dist/css/style.min.css', array(), _S_VERSION );

	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js', array(), '3.4.1', true);
	wp_enqueue_script('jquery');


	wp_enqueue_script('bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array('jquery'),'5.0.1', true);
	wp_enqueue_script('jquery.qrcode-script', 'https://cdn.jsdelivr.net/npm/jquery.qrcode@1.0.3/jquery.qrcode.min.js', array('jquery'),'1.0.3', true);
	wp_enqueue_script('sweetalert2-script', 'https://cdn.jsdelivr.net/npm/sweetalert2@11.0.11/dist/sweetalert2.min.js', array('jquery'),'11.0.11', true);
	wp_enqueue_script('mdoblog-script', get_template_directory_uri().'/dist/js/bundled.min.js', array('jquery'),_S_VERSION, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mdoblog_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/customizer-functions.php';
