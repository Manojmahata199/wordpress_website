<?php
/**
 * Spotlight News functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Spotlight News
 */

if ( ! function_exists( 'spotlight_news_setup' ) ) :
	function spotlight_news_setup() {
		/*
		* Make child theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_child_theme_textdomain( 'spotlight-news', get_stylesheet_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'register_block_pattern' );

		add_theme_support( 'register_block_style' );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'spotlight_news_setup' );

if ( ! function_exists( 'spotlight_news_enqueue_styles' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function spotlight_news_enqueue_styles() {
		$parenthandle = 'newspulse-magazine-style';
		$theme        = wp_get_theme();
		// Append .min if SCRIPT_DEBUG is false.
		$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		wp_enqueue_style(
			$parenthandle,
			get_template_directory_uri() . '/style.css',
			array(
				'newspulse-magazine-slick-style',
				'newspulse-magazine-fontawesome-style',
				'newspulse-magazine-google-fonts',
			),
			$theme->parent()->get( 'Version' )
		);

		wp_enqueue_style(
			'spotlight-news-style',
			get_stylesheet_uri(),
			array( $parenthandle ),
			$theme->get( 'Version' )
		);

		wp_enqueue_script( 'spotlight-news-script', get_stylesheet_directory_uri() . '/assets/js/custom' . $min . '.js', array( 'jquery', 'newspulse-magazine-navigation-script', 'newspulse-magazine-slick-script', 'newspulse-magazine-marquee-script', 'newspulse-magazine-custom-script' ), $theme->get( 'Version' ), true );

	}

endif;

add_action( 'wp_enqueue_scripts', 'spotlight_news_enqueue_styles' );

function spotlight_news_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'spotlight_news_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => 'e23636',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => 'newspulse_magazine_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'spotlight_news_custom_header_setup' );

function spotlight_news_admin_style() {
	?>
	<style type="text/css">
		.ocdi .notice.newspulse-magazine-demo-data {
			display: none !important;
		}
	</style>
	<?php
}
add_action( 'admin_head', 'spotlight_news_admin_style' );

// Widgets.
require get_theme_file_path() . '/inc/widgets/widgets.php';

// Customizer.
require get_theme_file_path() . '/inc/customizer.php';

// Custom Controls.
require get_theme_file_path() . '/inc/custom-controls.php';

/**
 * One Click Demo Import after import setup.
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
	require get_theme_file_path() . '/inc/ocdi.php';
}
