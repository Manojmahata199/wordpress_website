<?php
/**
 * Pagination
 *
 * @package Quick News
 */

$wp_customize->add_section(
	'quick_news_pagination',
	array(
		'panel' => 'quick_news_theme_options',
		'title' => esc_html__( 'Pagination', 'quick-news' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'quick_news_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'quick_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Quick_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'quick_news_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'quick-news' ),
			'section'  => 'quick_news_pagination',
			'settings' => 'quick_news_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'quick_news_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'quick_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'quick_news_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'quick-news' ),
		'section'         => 'quick_news_pagination',
		'settings'        => 'quick_news_pagination_type',
		'active_callback' => 'quick_news_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default'  => __( 'Default (Older/Newer)', 'quick-news' ),
			'numeric'  => __( 'Numeric', 'quick-news' ),
		),
	)
);
