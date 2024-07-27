<?php
/**
 * Pagination
 *
 * @package Newspulse Magazine
 */

$wp_customize->add_section(
	'newspulse_magazine_pagination',
	array(
		'panel' => 'newspulse_magazine_theme_options',
		'title' => esc_html__( 'Pagination', 'newspulse-magazine' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'newspulse_magazine_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'newspulse_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Newspulse_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'newspulse_magazine_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'newspulse-magazine' ),
			'section'  => 'newspulse_magazine_pagination',
			'settings' => 'newspulse_magazine_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'newspulse_magazine_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'newspulse_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'newspulse-magazine' ),
		'section'         => 'newspulse_magazine_pagination',
		'settings'        => 'newspulse_magazine_pagination_type',
		'active_callback' => 'newspulse_magazine_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'newspulse-magazine' ),
			'numeric' => __( 'Numeric', 'newspulse-magazine' ),
		),
	)
);
