<?php
/**
 * Archive Layout
 *
 * @package Quick News
 */

$wp_customize->add_section(
	'quick_news_archive_layout',
	array(
		'title' => esc_html__( 'Archive Layout', 'quick-news' ),
		'panel' => 'quick_news_theme_options',
	)
);

// Archive Layout - Grid Style.
$wp_customize->add_setting(
	'quick_news_archive_grid_style',
	array(
		'default'           => 'grid-column-3',
		'sanitize_callback' => 'quick_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'quick_news_archive_grid_style',
	array(
		'label'           => esc_html__( 'Grid Style', 'quick-news' ),
		'section'         => 'quick_news_archive_layout',
		'type'            => 'select',
		'choices'         => array(
			'grid-column-2' => __( 'Column 2', 'quick-news' ),
			'grid-column-3' => __( 'Column 3', 'quick-news' ),
		),
	)
);
