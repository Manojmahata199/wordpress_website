<?php
/**
 * Theme Options
 *
 * @package Newspulse Magazine
 */

$wp_customize->add_panel(
	'newspulse_magazine_theme_options',
	array(
		'title'    => esc_html__( 'Theme Options', 'newspulse-magazine' ),
		'priority' => 130,
	)
);

// Topbar.
require get_template_directory() . '/inc/customizer/theme-options/header-options.php';

// Typography.
require get_template_directory() . '/inc/customizer/theme-options/typography.php';

// Excerpt.
require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

// Breadcrumb.
require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

// Sidebar Position.
require get_template_directory() . '/inc/customizer/theme-options/sidebar-position.php';

// Post Options.
require get_template_directory() . '/inc/customizer/theme-options/post-options.php';

// Pagination.
require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

// Footer Options.
require get_template_directory() . '/inc/customizer/theme-options/footer-options.php';
