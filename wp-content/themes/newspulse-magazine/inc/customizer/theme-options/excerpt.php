<?php
/**
 * Excerpt
 *
 * @package Newspulse Magazine
 */

$wp_customize->add_section(
	'newspulse_magazine_excerpt_options',
	array(
		'panel' => 'newspulse_magazine_theme_options',
		'title' => esc_html__( 'Excerpt', 'newspulse-magazine' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'newspulse_magazine_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'newspulse_magazine_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'newspulse-magazine' ),
		'section'     => 'newspulse_magazine_excerpt_options',
		'settings'    => 'newspulse_magazine_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 200,
			'step' => 1,
		),
	)
);
