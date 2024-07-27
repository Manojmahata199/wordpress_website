<?php
/**
 * Footer Options
 *
 * @package Newspulse Magazine
 */

$wp_customize->add_section(
	'newspulse_magazine_footer_options',
	array(
		'panel' => 'newspulse_magazine_theme_options',
		'title' => esc_html__( 'Footer Options', 'newspulse-magazine' ),
	)
);

// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'newspulse-magazine' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'newspulse_magazine_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'newspulse-magazine' ),
		'section'  => 'newspulse_magazine_footer_options',
		'settings' => 'newspulse_magazine_footer_copyright_text',
		'type'     => 'textarea',
	)
);
