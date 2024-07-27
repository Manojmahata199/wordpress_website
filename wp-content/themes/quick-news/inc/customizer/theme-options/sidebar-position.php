<?php
/**
 * Sidebar Position
 *
 * @package Quick News
 */

$wp_customize->add_section(
	'quick_news_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'quick-news' ),
		'panel' => 'quick_news_theme_options',
	)
);

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'quick_news_sidebar_position',
	array(
		'sanitize_callback' => 'quick_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'quick_news_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'quick-news' ),
		'section' => 'quick_news_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'quick-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'quick-news' ),
		),
	)
);

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'quick_news_post_sidebar_position',
	array(
		'sanitize_callback' => 'quick_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'quick_news_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'quick-news' ),
		'section' => 'quick_news_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'quick-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'quick-news' ),
		),
	)
);

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'quick_news_page_sidebar_position',
	array(
		'sanitize_callback' => 'quick_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'quick_news_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'quick-news' ),
		'section' => 'quick_news_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'quick-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'quick-news' ),
		),
	)
);
