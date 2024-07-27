<?php
/**
 * Typography
 *
 * @package Newspulse Magazine
 */

$wp_customize->add_section(
	'newspulse_magazine_typography',
	array(
		'panel' => 'newspulse_magazine_theme_options',
		'title' => esc_html__( 'Typography', 'newspulse-magazine' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'newspulse_magazine_site_title_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'newspulse_magazine_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'newspulse-magazine' ),
		'section'  => 'newspulse_magazine_typography',
		'settings' => 'newspulse_magazine_site_title_font',
		'type'     => 'select',
		'choices'  => newspulse_magazine_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'newspulse_magazine_site_description_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'newspulse_magazine_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'newspulse-magazine' ),
		'section'  => 'newspulse_magazine_typography',
		'settings' => 'newspulse_magazine_site_description_font',
		'type'     => 'select',
		'choices'  => newspulse_magazine_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'newspulse_magazine_header_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'newspulse_magazine_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'newspulse-magazine' ),
		'section'  => 'newspulse_magazine_typography',
		'settings' => 'newspulse_magazine_header_font',
		'type'     => 'select',
		'choices'  => newspulse_magazine_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'newspulse_magazine_body_font',
	array(
		'default'           => 'Titillium Web',
		'sanitize_callback' => 'newspulse_magazine_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'newspulse-magazine' ),
		'section'  => 'newspulse_magazine_typography',
		'settings' => 'newspulse_magazine_body_font',
		'type'     => 'select',
		'choices'  => newspulse_magazine_get_all_google_font_families(),
	)
);
