<?php
/**
 * Excerpt
 *
 * @package Quick News
 */

$wp_customize->add_section(
	'quick_news_excerpt_options',
	array(
		'panel' => 'quick_news_theme_options',
		'title' => esc_html__( 'Excerpt', 'quick-news' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'quick_news_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'quick_news_sanitize_number_range',
		'validate_callback' => 'quick_news_validate_excerpt_length',
	)
);

$wp_customize->add_control(
	'quick_news_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'quick-news' ),
		'description' => esc_html__( 'Note: Min 1 & Max 200. Please input the valid number and save. Then refresh the page to see the change.', 'quick-news' ),
		'section'     => 'quick_news_excerpt_options',
		'settings'    => 'quick_news_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 200,
			'step' => 1,
		),
	)
);
