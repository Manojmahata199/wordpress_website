<?php
/**
 * Sidebar Option
 *
 * @package Bright_News
 */

$wp_customize->add_section(
	'bright_news_sidebar_option',
	array(
		'title' => esc_html__( 'Layout', 'bright-news' ),
		'panel' => 'bright_news_theme_options',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'bright_news_sidebar_position',
	array(
		'sanitize_callback' => 'bright_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'bright_news_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'bright-news' ),
		'section' => 'bright_news_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'bright-news' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'bright-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'bright-news' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'bright_news_post_sidebar_position',
	array(
		'sanitize_callback' => 'bright_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'bright_news_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'bright-news' ),
		'section' => 'bright_news_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'bright-news' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'bright-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'bright-news' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'bright_news_page_sidebar_position',
	array(
		'sanitize_callback' => 'bright_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'bright_news_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'bright-news' ),
		'section' => 'bright_news_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'bright-news' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'bright-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'bright-news' ),
		),
	)
);
