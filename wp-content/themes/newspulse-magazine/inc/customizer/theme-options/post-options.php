<?php
/**
 * Post Options
 *
 * @package Newspulse Magazine
 */

$wp_customize->add_section(
	'newspulse_magazine_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'newspulse-magazine' ),
		'panel' => 'newspulse_magazine_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'newspulse_magazine_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'newspulse_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Newspulse_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'newspulse_magazine_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'newspulse-magazine' ),
			'section' => 'newspulse_magazine_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'newspulse_magazine_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'newspulse_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Newspulse_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'newspulse_magazine_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'newspulse-magazine' ),
			'section' => 'newspulse_magazine_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'newspulse_magazine_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'newspulse_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Newspulse_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'newspulse_magazine_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'newspulse-magazine' ),
			'section' => 'newspulse_magazine_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'newspulse_magazine_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'newspulse_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Newspulse_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'newspulse_magazine_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'newspulse-magazine' ),
			'section' => 'newspulse_magazine_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'newspulse_magazine_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'newspulse-magazine' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'newspulse-magazine' ),
		'section'  => 'newspulse_magazine_post_options',
		'settings' => 'newspulse_magazine_post_related_post_label',
		'type'     => 'text',
	)
);
