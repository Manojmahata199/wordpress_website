<?php
/**
 * Banner Section
 *
 * @package Bright_News
 */

$wp_customize->add_section(
	'bright_news_banner_section',
	array(
		'panel'    => 'bright_news_front_page_options',
		'title'    => esc_html__( 'Banner Section', 'bright-news' ),
		'priority' => 20,
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'bright_news_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'bright_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Bright_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'bright_news_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'bright-news' ),
			'section'  => 'bright_news_banner_section',
			'settings' => 'bright_news_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'bright_news_enable_banner_section',
		array(
			'selector' => '#bright_news_banner_section .section-link',
			'settings' => 'bright_news_enable_banner_section',
		)
	);
}

// Banner Section - Main Banner Slider Content Type.
$wp_customize->add_setting(
	'bright_news_main_banner_slider_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'bright_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'bright_news_main_banner_slider_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Slider Content Type', 'bright-news' ),
		'section'         => 'bright_news_banner_section',
		'settings'        => 'bright_news_main_banner_slider_content_type',
		'type'            => 'select',
		'active_callback' => 'bright_news_is_banner_slider_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'bright-news' ),
			'category' => esc_html__( 'Category', 'bright-news' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Banner Section - Select Main Banner Post.
	$wp_customize->add_setting(
		'bright_news_main_banner_slider_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'bright_news_main_banner_slider_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'bright-news' ), $i ),
			'section'         => 'bright_news_banner_section',
			'settings'        => 'bright_news_main_banner_slider_content_post_' . $i,
			'active_callback' => 'bright_news_is_banner_slider_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => bright_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Main Banner Category.
$wp_customize->add_setting(
	'bright_news_main_banner_slider_content_category',
	array(
		'sanitize_callback' => 'bright_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'bright_news_main_banner_slider_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'bright-news' ),
		'section'         => 'bright_news_banner_section',
		'settings'        => 'bright_news_main_banner_slider_content_category',
		'active_callback' => 'bright_news_is_banner_slider_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => bright_news_get_post_cat_choices(),
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'bright_news_banner_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bright_News_Customize_Horizontal_Line(
		$wp_customize,
		'bright_news_banner_horizontal_line',
		array(
			'section'         => 'bright_news_banner_section',
			'settings'        => 'bright_news_banner_horizontal_line',
			'active_callback' => 'bright_news_is_banner_slider_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Banner Section - Banner Posts Content Type.
$wp_customize->add_setting(
	'bright_news_banner_posts_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'bright_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'bright_news_banner_posts_content_type',
	array(
		'label'           => esc_html__( 'Select Banner Posts Content Type', 'bright-news' ),
		'section'         => 'bright_news_banner_section',
		'settings'        => 'bright_news_banner_posts_content_type',
		'type'            => 'select',
		'active_callback' => 'bright_news_is_banner_slider_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'bright-news' ),
			'category' => esc_html__( 'Category', 'bright-news' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Banner Section - Banner Posts Select Post.
	$wp_customize->add_setting(
		'bright_news_banner_posts_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'bright_news_banner_posts_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'bright-news' ), $i ),
			'section'         => 'bright_news_banner_section',
			'settings'        => 'bright_news_banner_posts_content_post_' . $i,
			'active_callback' => 'bright_news_is_banner_post_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => bright_news_get_post_choices(),
		)
	);

}

// Banner Section - Banner Posts Select Category.
$wp_customize->add_setting(
	'bright_news_banner_posts_content_category',
	array(
		'sanitize_callback' => 'bright_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'bright_news_banner_posts_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'bright-news' ),
		'section'         => 'bright_news_banner_section',
		'settings'        => 'bright_news_banner_posts_content_category',
		'active_callback' => 'bright_news_is_banner_post_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => bright_news_get_post_cat_choices(),
	)
);
