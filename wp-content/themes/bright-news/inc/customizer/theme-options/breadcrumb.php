<?php
/**
 * Breadcrumb
 *
 * @package Bright_News
 */

$wp_customize->add_section(
	'bright_news_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'bright-news' ),
		'panel' => 'bright_news_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'bright_news_enable_breadcrumb',
	array(
		'sanitize_callback' => 'bright_news_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Bright_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bright_news_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'bright-news' ),
			'section' => 'bright_news_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'bright_news_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'bright_news_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'bright-news' ),
		'active_callback' => 'bright_news_is_breadcrumb_enabled',
		'section'         => 'bright_news_breadcrumb',
	)
);
