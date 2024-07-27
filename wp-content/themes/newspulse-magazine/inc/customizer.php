<?php
/**
 * Newspulse Magazine Theme Customizer
 *
 * @package Newspulse Magazine
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
function newspulse_magazine_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'newspulse_magazine_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'newspulse_magazine_customize_partial_blogdescription',
			)
		);
	}

	// Homepage Settings - Enable Homepage Content.
	$wp_customize->add_setting(
		'newspulse_magazine_enable_frontpage_content',
		array(
			'default'           => false,
			'sanitize_callback' => 'newspulse_magazine_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'newspulse_magazine_enable_frontpage_content',
		array(
			'label'           => esc_html__( 'Enable Homepage Content', 'newspulse-magazine' ),
			'description'     => esc_html__( 'Check to enable content on static homepage.', 'newspulse-magazine' ),
			'section'         => 'static_front_page',
			'type'            => 'checkbox',
			'active_callback' => 'newspulse_magazine_is_static_homepage_enabled',
		)
	);

	// Upsell Section.
	$wp_customize->add_section(
		new Newspulse_Magazine_Upsell_Section(
			$wp_customize,
			'upsell_section',
			array(
				'title'            => __( 'Newspulse Magazine Pro', 'newspulse-magazine' ),
				'button_text'      => __( 'Buy Pro', 'newspulse-magazine' ),
				'url'              => 'https://ascendoor.com/themes/newspulse-magazine/',
				'background_color' => '#ea902a',
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
add_action( 'customize_register', 'newspulse_magazine_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function newspulse_magazine_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function newspulse_magazine_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newspulse_magazine_customize_preview_js() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'newspulse-magazine-customizer', get_template_directory_uri() . '/assets/js/customizer' . $min . '.js', array( 'customize-preview' ), NEWSPULSE_MAGAZINE_VERSION, true );
}
add_action( 'customize_preview_init', 'newspulse_magazine_customize_preview_js' );

/**
 * Enqueue script for custom customize control.
 */
function newspulse_magazine_custom_control_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'newspulse-magazine-custom-controls-css', get_template_directory_uri() . '/assets/css/custom-controls' . $min . '.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'newspulse-magazine-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls' . $min . '.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'newspulse_magazine_custom_control_scripts' );
