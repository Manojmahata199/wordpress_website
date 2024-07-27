<?php
/**
 * Footer Options
 *
 * @package Bright_News
 */

$wp_customize->add_section(
	'bright_news_footer_options',
	array(
		'panel' => 'bright_news_theme_options',
		'title' => esc_html__( 'Footer Options', 'bright-news' ),
	)
);

// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'bright-news' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'bright_news_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'bright_news_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'bright-news' ),
		'section'  => 'bright_news_footer_options',
		'settings' => 'bright_news_footer_copyright_text',
		'type'     => 'textarea',
	)
);

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'bright_news_scroll_top',
	array(
		'sanitize_callback' => 'bright_news_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Bright_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bright_news_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'bright-news' ),
			'section' => 'bright_news_footer_options',
		)
	)
);
