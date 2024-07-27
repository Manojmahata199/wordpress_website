<?php
/**
 * Excerpt
 *
 * @package Bright_News
 */

$wp_customize->add_section(
	'bright_news_excerpt_options',
	array(
		'panel' => 'bright_news_theme_options',
		'title' => esc_html__( 'Excerpt', 'bright-news' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'bright_news_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'bright_news_sanitize_number_range',
		'validate_callback' => 'bright_news_validate_excerpt_length',
	)
);

$wp_customize->add_control(
	'bright_news_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'bright-news' ),
		'description' => esc_html__( 'Note: Min 1 & Max 100. Please input the valid number and save. Then refresh the page to see the change.', 'bright-news' ),
		'section'     => 'bright_news_excerpt_options',
		'settings'    => 'bright_news_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 200,
			'step' => 1,
		),
	)
);

// Excerpt - Read More Button Label.
$wp_customize->add_setting(
	'bright_news_excerpt_readmore_button_label',
	array(
		'default'           => __( 'Read More', 'bright-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'bright_news_excerpt_readmore_button_label',
	array(
		'label'    => esc_html__( 'Read More Button Label', 'bright-news' ),
		'section'  => 'bright_news_excerpt_options',
		'settings' => 'bright_news_excerpt_readmore_button_label',
		'type'     => 'text',
	)
);
