<?php
/**
 * Header Options
 *
 * @package Bright_News
 */

$wp_customize->add_section(
	'bright_news_header_options',
	array(
		'panel' => 'bright_news_theme_options',
		'title' => esc_html__( 'Header Options', 'bright-news' ),
	)
);

// Header Section - Advertisement.
$wp_customize->add_setting(
	'bright_news_header_advertisement',
	array(
		'default'           => '',
		'sanitize_callback' => 'bright_news_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'bright_news_header_advertisement',
		array(
			'label'    => esc_html__( 'Advertisement', 'bright-news' ),
			'section'  => 'bright_news_header_options',
			'settings' => 'bright_news_header_advertisement',
		)
	)
);

// Header Section - Advertisement URL.
$wp_customize->add_setting(
	'bright_news_header_advertisement_url',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'bright_news_header_advertisement_url',
	array(
		'label'    => esc_html__( 'Advertisement URL', 'bright-news' ),
		'section'  => 'bright_news_header_options',
		'settings' => 'bright_news_header_advertisement_url',
		'type'     => 'url',
	)
);
