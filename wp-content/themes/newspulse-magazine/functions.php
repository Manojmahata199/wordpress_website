<?php

/**
 * Newspulse Magazine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Newspulse Magazine
 */

if ( ! defined( 'NEWSPULSE_MAGAZINE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'NEWSPULSE_MAGAZINE_VERSION', '1.0.4' );
}

if ( ! function_exists( 'newspulse_magazine_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function newspulse_magazine_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Newspulse Magazine, use a find and replace
		 * to change 'newspulse-magazine' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'newspulse-magazine', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		add_theme_support( 'register_block_pattern' );

		add_theme_support( 'register_block_style' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'newspulse-magazine' ),
				'social'  => esc_html__( 'Social', 'newspulse-magazine' ),
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
				'newspulse_magazine_custom_background_args',
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

		/**
		 * Add theme support for gutenberg block.
		 */
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'newspulse_magazine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newspulse_magazine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'newspulse_magazine_content_width', 640 );
}
add_action( 'after_setup_theme', 'newspulse_magazine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newspulse_magazine_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'newspulse-magazine' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'newspulse-magazine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Primary Widgets Section', 'newspulse-magazine' ),
			'id'            => 'primary-widgets-section',
			'description'   => esc_html__( 'Add primary widgets here.', 'newspulse-magazine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="section-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Secondary Widgets Section', 'newspulse-magazine' ),
			'id'            => 'secondary-widgets-section',
			'description'   => esc_html__( 'Add secondary widgets here.', 'newspulse-magazine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="section-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Tertiary Widgets Section', 'newspulse-magazine' ),
			'id'            => 'tertiary-widgets-section',
			'description'   => esc_html__( 'Add tertiary widgets here.', 'newspulse-magazine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="section-title"><span>',
			'after_title'   => '</span></h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Above Footer Widgets Section', 'newspulse-magazine' ),
			'id'            => 'above-footer-widgets-section',
			'description'   => esc_html__( 'Add above footer widgets here.', 'newspulse-magazine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="section-title">',
			'after_title'   => '</h3>',
		)
	);

	// Regsiter 4 footer widgets.
	register_sidebars(
		3,
		array(
			/* translators: %d: Footer Widget count. */
			'name'          => esc_html__( 'Footer Widget %d', 'newspulse-magazine' ),
			'id'            => 'footer-widget',
			'description'   => esc_html__( 'Add widgets here.', 'newspulse-magazine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h6 class="widget-title">',
			'after_title'   => '</h6>',
		)
	);
}
add_action( 'widgets_init', 'newspulse_magazine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function newspulse_magazine_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// Slick style.
	wp_enqueue_style( 'newspulse-magazine-slick-style', get_template_directory_uri() . '/assets/css/slick' . $min . '.css', array(), '1.8.1' );

	// Fontawesome style.
	wp_enqueue_style( 'newspulse-magazine-fontawesome-style', get_template_directory_uri() . '/assets/css/fontawesome' . $min . '.css', array(), '6.4.2' );

	// Google fonts.
	wp_enqueue_style( 'newspulse-magazine-google-fonts', wptt_get_webfont_url( newspulse_magazine_get_fonts_url() ), array(), null );

	// Main style.
	wp_enqueue_style( 'newspulse-magazine-style', get_template_directory_uri() . '/style.css', array(), NEWSPULSE_MAGAZINE_VERSION );

	// Navigation script.
	wp_enqueue_script( 'newspulse-magazine-navigation-script', get_template_directory_uri() . '/assets/js/navigation' . $min . '.js', array(), NEWSPULSE_MAGAZINE_VERSION, true );

	// Slick script.
	wp_enqueue_script( 'newspulse-magazine-slick-script', get_template_directory_uri() . '/assets/js/slick' . $min . '.js', array( 'jquery' ), '1.8.1', true );

	// jQuery marquee script.
	wp_enqueue_script( 'newspulse-magazine-marquee-script', get_template_directory_uri() . '/assets/js/jquery.marquee' . $min . '.js', array( 'jquery' ), '1.6.0', true );

	// Custom script.
	wp_enqueue_script( 'newspulse-magazine-custom-script', get_template_directory_uri() . '/assets/js/custom' . $min . '.js', array( 'jquery' ), NEWSPULSE_MAGAZINE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'newspulse_magazine_scripts' );

/**
 * Webfont Loader.
 */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

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
 * Widgets.
 */
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/google-fonts.php';

/**
 * Dynamic CSS
 */
require get_template_directory() . '/inc/dynamic-css.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/inc/class-breadcrumb-trail.php';

/**
 * Recommended Plugins
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Category color.
 */
require get_template_directory() . '/inc/custom-category-color.php';

/**
 * One Click Demo Import after import setup.
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
	require get_template_directory() . '/inc/ocdi.php';
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
