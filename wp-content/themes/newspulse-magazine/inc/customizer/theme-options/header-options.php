<?php
/**
 * Header Options
 *
 * @package Newspulse Magazine
 */

$wp_customize->add_section(
	'newspulse_magazine_header_options',
	array(
		'panel' => 'newspulse_magazine_theme_options',
		'title' => esc_html__( 'Header Options', 'newspulse-magazine' ),
	)
);

// Header Options - Enable Topbar.
$wp_customize->add_setting(
	'newspulse_magazine_enable_topbar',
	array(
		'sanitize_callback' => 'newspulse_magazine_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Newspulse_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'newspulse_magazine_enable_topbar',
		array(
			'label'   => esc_html__( 'Enable Topbar', 'newspulse-magazine' ),
			'section' => 'newspulse_magazine_header_options',
		)
	)
);

// Header Section - Advertisement.
$wp_customize->add_setting(
	'newspulse_magazine_header_advertisement',
	array(
		'sanitize_callback' => 'newspulse_magazine_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'newspulse_magazine_header_advertisement',
		array(
			'label'    => esc_html__( 'Advertisement', 'newspulse-magazine' ),
			'section'  => 'newspulse_magazine_header_options',
			'settings' => 'newspulse_magazine_header_advertisement',
		)
	)
);

// Header Section - Advertisement URL.
$wp_customize->add_setting(
	'newspulse_magazine_header_advertisement_url',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_header_advertisement_url',
	array(
		'label'    => esc_html__( 'Advertisement URL', 'newspulse-magazine' ),
		'section'  => 'newspulse_magazine_header_options',
		'settings' => 'newspulse_magazine_header_advertisement_url',
		'type'     => 'url',
	)
);
