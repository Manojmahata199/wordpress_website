<?php
/**
 * Header Options
 *
 * @package Quick News
 */

$wp_customize->add_section(
	'quick_news_header_options',
	array(
		'panel' => 'quick_news_theme_options',
		'title' => esc_html__( 'Header Options', 'quick-news' ),
	)
);

// Header Options - Enable Topbar.
$wp_customize->add_setting(
	'quick_news_enable_topbar',
	array(
		'sanitize_callback' => 'quick_news_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Quick_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'quick_news_enable_topbar',
		array(
			'label'   => esc_html__( 'Enable Topbar', 'quick-news' ),
			'section' => 'quick_news_header_options',
		)
	)
);

// Header Options - Advertisement.
$wp_customize->add_setting(
	'quick_news_header_advertisement',
	array(
		'default'           => '',
		'sanitize_callback' => 'quick_news_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'quick_news_header_advertisement',
		array(
			'label'    => esc_html__( 'Advertisement', 'quick-news' ),
			'section'  => 'quick_news_header_options',
			'settings' => 'quick_news_header_advertisement',
		)
	)
);

	// Header Options - Advertisement URL.
$wp_customize->add_setting(
	'quick_news_header_advertisement_url',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'quick_news_header_advertisement_url',
	array(
		'label'    => esc_html__( 'Advertisement URL', 'quick-news' ),
		'section'  => 'quick_news_header_options',
		'settings' => 'quick_news_header_advertisement_url',
		'type'     => 'url',
	)
);