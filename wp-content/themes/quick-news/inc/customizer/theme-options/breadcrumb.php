<?php
/**
 * Breadcrumb
 *
 * @package Quick News
 */

$wp_customize->add_section(
	'quick_news_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'quick-news' ),
		'panel' => 'quick_news_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'quick_news_enable_breadcrumb',
	array(
		'sanitize_callback' => 'quick_news_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Quick_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'quick_news_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'quick-news' ),
			'section' => 'quick_news_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'quick_news_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'quick_news_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'quick-news' ),
		'active_callback' => 'quick_news_is_breadcrumb_enabled',
		'section'         => 'quick_news_breadcrumb',
	)
);
