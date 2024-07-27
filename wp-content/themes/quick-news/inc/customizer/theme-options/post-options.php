<?php
/**
 * Post Options
 *
 * @package Quick News
 */

$wp_customize->add_section(
	'quick_news_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'quick-news' ),
		'panel' => 'quick_news_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'quick_news_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'quick_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Quick_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'quick_news_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'quick-news' ),
			'section' => 'quick_news_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'quick_news_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'quick_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Quick_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'quick_news_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'quick-news' ),
			'section' => 'quick_news_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'quick_news_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'quick_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Quick_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'quick_news_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'quick-news' ),
			'section' => 'quick_news_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'quick_news_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'quick_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Quick_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'quick_news_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'quick-news' ),
			'section' => 'quick_news_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'quick_news_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'quick-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'quick_news_post_related_post_label',
	array(
		'label'           => esc_html__( 'Related Posts Label', 'quick-news' ),
		'section'         => 'quick_news_post_options',
		'settings'        => 'quick_news_post_related_post_label',
		'type'            => 'text',
	)
);
