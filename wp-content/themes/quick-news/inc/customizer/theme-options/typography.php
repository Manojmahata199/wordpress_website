<?php

/**
 * Typography
 *
 * @package Quick News
 */

$wp_customize->add_section(
	'quick_news_typography',
	array(
		'panel' => 'quick_news_theme_options',
		'title' => esc_html__( 'Typography', 'quick-news' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'quick_news_site_title_font',
	array(
		'default'           => 'Mukta',
		'sanitize_callback' => 'quick_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'quick_news_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'quick-news' ),
		'section'  => 'quick_news_typography',
		'settings' => 'quick_news_site_title_font',
		'type'     => 'select',
		'choices'  => quick_news_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'quick_news_site_description_font',
	array(
		'default'           => 'Inter',
		'sanitize_callback' => 'quick_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'quick_news_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'quick-news' ),
		'section'  => 'quick_news_typography',
		'settings' => 'quick_news_site_description_font',
		'type'     => 'select',
		'choices'  => quick_news_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'quick_news_header_font',
	array(
		'default'           => 'Inter',
		'sanitize_callback' => 'quick_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'quick_news_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'quick-news' ),
		'section'  => 'quick_news_typography',
		'settings' => 'quick_news_header_font',
		'type'     => 'select',
		'choices'  => quick_news_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'quick_news_body_font',
	array(
		'default'           => 'Inter',
		'sanitize_callback' => 'quick_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'quick_news_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'quick-news' ),
		'section'  => 'quick_news_typography',
		'settings' => 'quick_news_body_font',
		'type'     => 'select',
		'choices'  => quick_news_get_all_google_font_families(),
	)
);
