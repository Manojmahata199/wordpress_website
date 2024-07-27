<?php
/**
 * Sidebar Position
 *
 * @package Newspulse Magazine
 */

$wp_customize->add_section(
	'newspulse_magazine_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'newspulse-magazine' ),
		'panel' => 'newspulse_magazine_theme_options',
	)
);

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'newspulse_magazine_sidebar_position',
	array(
		'sanitize_callback' => 'newspulse_magazine_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'newspulse-magazine' ),
		'section' => 'newspulse_magazine_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'newspulse-magazine' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'newspulse-magazine' ),
		),
	)
);

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'newspulse_magazine_post_sidebar_position',
	array(
		'sanitize_callback' => 'newspulse_magazine_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'newspulse-magazine' ),
		'section' => 'newspulse_magazine_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'newspulse-magazine' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'newspulse-magazine' ),
		),
	)
);

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'newspulse_magazine_page_sidebar_position',
	array(
		'sanitize_callback' => 'newspulse_magazine_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'newspulse-magazine' ),
		'section' => 'newspulse_magazine_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'newspulse-magazine' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'newspulse-magazine' ),
		),
	)
);
