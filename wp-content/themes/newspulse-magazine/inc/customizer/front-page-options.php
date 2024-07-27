<?php
/**
 * Front Page Options
 *
 * @package Newspulse Magazine
 */

$wp_customize->add_panel(
	'newspulse_magazine_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'newspulse-magazine' ),
		'priority' => 130,
	)
);

// Flash News Section.
require get_template_directory() . '/inc/customizer/front-page-options/flash-news.php';

// Banner Section.
require get_template_directory() . '/inc/customizer/front-page-options/banner.php';
