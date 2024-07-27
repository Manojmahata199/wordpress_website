<?php
/**
 * Flash News Section
 *
 * @package Bright_News
 */

$wp_customize->add_section(
	'bright_news_flash_news_section',
	array(
		'panel'    => 'bright_news_front_page_options',
		'title'    => esc_html__( 'Flash News Section', 'bright-news' ),
		'priority' => 10,
	)
);

// Flash News Section - Enable Section.
$wp_customize->add_setting(
	'bright_news_enable_flash_news_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'bright_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bright_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bright_news_enable_flash_news_section',
		array(
			'label'    => esc_html__( 'Enable Flash News Section', 'bright-news' ),
			'section'  => 'bright_news_flash_news_section',
			'settings' => 'bright_news_enable_flash_news_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'bright_news_enable_flash_news_section',
		array(
			'selector' => '#bright_news_flash_news_section .section-link',
			'settings' => 'bright_news_enable_flash_news_section',
		)
	);
}

// Flash News Section - Flash News Content Type.
$wp_customize->add_setting(
	'bright_news_flash_news_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'bright_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'bright_news_flash_news_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'bright-news' ),
		'section'         => 'bright_news_flash_news_section',
		'settings'        => 'bright_news_flash_news_content_type',
		'type'            => 'select',
		'active_callback' => 'bright_news_is_flash_news_section_enabled',
		'choices'         => array(
			'post'   => esc_html__( 'Post', 'bright-news' ),
			'recent' => esc_html__( 'Recent', 'bright-news' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {

	// Flash News Section - Select Flash News Post.
	$wp_customize->add_setting(
		'bright_news_flash_news_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'bright_news_flash_news_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'bright-news' ), $i ),
			'section'         => 'bright_news_flash_news_section',
			'settings'        => 'bright_news_flash_news_content_post_' . $i,
			'active_callback' => 'bright_news_is_flash_news_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => bright_news_get_post_choices(),
		)
	);

}
