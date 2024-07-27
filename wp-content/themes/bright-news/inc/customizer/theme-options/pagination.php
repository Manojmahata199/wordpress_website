<?php
/**
 * Pagination
 *
 * @package Bright_News
 */

$wp_customize->add_section(
	'bright_news_pagination',
	array(
		'panel' => 'bright_news_theme_options',
		'title' => esc_html__( 'Pagination', 'bright-news' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'bright_news_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'bright_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bright_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bright_news_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'bright-news' ),
			'section'  => 'bright_news_pagination',
			'settings' => 'bright_news_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'bright_news_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'bright_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'bright_news_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'bright-news' ),
		'section'         => 'bright_news_pagination',
		'settings'        => 'bright_news_pagination_type',
		'active_callback' => 'bright_news_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'bright-news' ),
			'numeric' => __( 'Numeric', 'bright-news' ),
		),
	)
);
