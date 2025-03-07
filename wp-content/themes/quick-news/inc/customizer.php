<?php
/**
 * Quick News Theme Customizer
 *
 * @package Quick News
 */

// Sanitize callback.
require get_template_directory() . '/inc/customizer/sanitize-callback.php';

// Active Callback.
require get_template_directory() . '/inc/customizer/active-callback.php';

// Custom Controls.
require get_template_directory() . '/inc/customizer/custom-controls/custom-controls.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function quick_news_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'quick_news_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'quick_news_customize_partial_blogdescription',
			)
		);
	}

	// Homepage Settings - Enable Homepage Content.
	$wp_customize->add_setting(
		'quick_news_enable_frontpage_content',
		array(
			'default'           => false,
			'sanitize_callback' => 'quick_news_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'quick_news_enable_frontpage_content',
		array(
			'label'           => esc_html__( 'Enable Homepage Content', 'quick-news' ),
			'description'     => esc_html__( 'Check to enable content on static homepage.', 'quick-news' ),
			'section'         => 'static_front_page',
			'type'            => 'checkbox',
			'active_callback' => 'quick_news_is_static_homepage_enabled',
		)
	);

	// Upsell Section.
	$wp_customize->add_section(
		new Quick_News_Upsell_Section(
			$wp_customize,
			'upsell_section',
			array(
				'title'            => __( 'Quick News Pro', 'quick-news' ),
				'button_text'      => __( 'Buy Pro', 'quick-news' ),
				'url'              => 'https://ascendoor.com/themes/quick-news-pro/',
				'background_color' => '#df2e38',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

	// Theme Options.
	require get_template_directory() . '/inc/customizer/theme-options.php';

	// Front Page Options.
	require get_template_directory() . '/inc/customizer/front-page-options.php';
}
add_action( 'customize_register', 'quick_news_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function quick_news_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function quick_news_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function quick_news_customize_preview_js() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'quick-news-customizer', get_template_directory_uri() . '/assets/js/customizer' . $min . '.js', array( 'customize-preview' ), QUICK_NEWS_VERSION, true );
}
add_action( 'customize_preview_init', 'quick_news_customize_preview_js' );

/**
 * Enqueue script for custom customize control.
 */
function quick_news_custom_control_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'quick-news-custom-controls-css', get_template_directory_uri() . '/assets/css/custom-controls' . $min . '.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'quick-news-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls' . $min . '.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'quick_news_custom_control_scripts' );
