<?php
/**
 * Frontpage Sidebar Position
 *
 * @package Bright_News
 */

$wp_customize->add_section(
	'bright_news_frontpage_sidebar',
	array(
		'panel' => 'bright_news_theme_options',
		'title' => esc_html__( 'Frontpage Sidebar Position', 'bright-news' ),
	)
);

// Frontpage Sidebar Position - Frontpage Sidebar Position.
$wp_customize->add_setting(
	'bright_news_frontpage_sidebar_position',
	array(
		'default'           => 'frontpage-right-sidebar',
		'sanitize_callback' => 'bright_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'bright_news_frontpage_sidebar_position',
	array(
		'label'    => esc_html__( 'Frontpage Sidebar Position', 'bright-news' ),
		'section'  => 'bright_news_frontpage_sidebar',
		'settings' => 'bright_news_frontpage_sidebar_position',
		'type'     => 'select',
		'choices'  => array(
			'frontpage-left-sidebar'  => __( 'Left Position', 'bright-news' ),
			'frontpage-right-sidebar' => __( 'Right Position', 'bright-news' ),
		),
	)
);
