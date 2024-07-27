<?php
/**
 * Typography
 *
 * @package Bright_News
 */

$wp_customize->add_section(
	'bright_news_typography',
	array(
		'panel' => 'bright_news_theme_options',
		'title' => esc_html__( 'Typography', 'bright-news' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'bright_news_site_title_font',
	array(
		'default'           => 'Maitree',
		'sanitize_callback' => 'bright_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'bright_news_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'bright-news' ),
		'section'  => 'bright_news_typography',
		'settings' => 'bright_news_site_title_font',
		'type'     => 'select',
		'choices'  => bright_news_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'bright_news_site_description_font',
	array(
		'default'           => 'Rubik',
		'sanitize_callback' => 'bright_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'bright_news_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'bright-news' ),
		'section'  => 'bright_news_typography',
		'settings' => 'bright_news_site_description_font',
		'type'     => 'select',
		'choices'  => bright_news_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'bright_news_header_font',
	array(
		'default'           => 'Lora',
		'sanitize_callback' => 'bright_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'bright_news_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'bright-news' ),
		'section'  => 'bright_news_typography',
		'settings' => 'bright_news_header_font',
		'type'     => 'select',
		'choices'  => bright_news_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'bright_news_body_font',
	array(
		'default'           => 'Merriweather Sans',
		'sanitize_callback' => 'bright_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'bright_news_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'bright-news' ),
		'section'  => 'bright_news_typography',
		'settings' => 'bright_news_body_font',
		'type'     => 'select',
		'choices'  => bright_news_get_all_google_font_families(),
	)
);
