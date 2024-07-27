<?php
/**
 * Breadcrumb
 *
 * @package Newspulse Magazine
 */

$wp_customize->add_section(
	'newspulse_magazine_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'newspulse-magazine' ),
		'panel' => 'newspulse_magazine_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'newspulse_magazine_enable_breadcrumb',
	array(
		'sanitize_callback' => 'newspulse_magazine_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Newspulse_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'newspulse_magazine_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'newspulse-magazine' ),
			'section' => 'newspulse_magazine_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'newspulse_magazine_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'newspulse-magazine' ),
		'active_callback' => 'newspulse_magazine_is_breadcrumb_enabled',
		'section'         => 'newspulse_magazine_breadcrumb',
	)
);
