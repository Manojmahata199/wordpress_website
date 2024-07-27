<?php
/**
 * Banner Section
 *
 * @package Quick News
 */

$wp_customize->add_section(
	'quick_news_banner_section',
	array(
		'panel' => 'quick_news_front_page_options',
		'title' => esc_html__( 'Banner Section', 'quick-news' ),
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'quick_news_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'quick_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Quick_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'quick_news_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'quick-news' ),
			'section'  => 'quick_news_banner_section',
			'settings' => 'quick_news_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'quick_news_enable_banner_section',
		array(
			'selector' => '#quick_news_banner_section .section-link',
			'settings' => 'quick_news_enable_banner_section',
		)
	);
}

// Banner Section - Section Title.
$wp_customize->add_setting(
	'quick_news_main_news_title',
	array(
		'default'           => __( 'Main News', 'quick-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'quick_news_main_news_title',
	array(
		'label'           => esc_html__( 'Main News Section Title', 'quick-news' ),
		'section'         => 'quick_news_banner_section',
		'settings'        => 'quick_news_main_news_title',
		'type'            => 'text',
		'active_callback' => 'quick_news_is_banner_section_enabled',
	)
);

// Banner Section - Main News Content Type.
$wp_customize->add_setting(
	'quick_news_main_news_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'quick_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'quick_news_main_news_content_type',
	array(
		'label'           => esc_html__( 'Select Main News Content Type', 'quick-news' ),
		'section'         => 'quick_news_banner_section',
		'settings'        => 'quick_news_main_news_content_type',
		'type'            => 'select',
		'active_callback' => 'quick_news_is_banner_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'quick-news' ),
			'category' => esc_html__( 'Category', 'quick-news' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'quick_news_main_news_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'quick_news_main_news_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'quick-news' ), $i ),
			'section'         => 'quick_news_banner_section',
			'settings'        => 'quick_news_main_news_content_post_' . $i,
			'active_callback' => 'quick_news_is_banner_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => quick_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Category.
$wp_customize->add_setting(
	'quick_news_main_news_content_category',
	array(
		'sanitize_callback' => 'quick_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'quick_news_main_news_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'quick-news' ),
		'section'         => 'quick_news_banner_section',
		'settings'        => 'quick_news_main_news_content_category',
		'active_callback' => 'quick_news_is_banner_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => quick_news_get_post_cat_choices(),
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'quick_news_main_news_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Quick_News_Customize_Horizontal_Line(
		$wp_customize,
		'quick_news_main_news_horizontal_line',
		array(
			'section'         => 'quick_news_banner_section',
			'settings'        => 'quick_news_main_news_horizontal_line',
			'active_callback' => 'quick_news_is_banner_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Trending Posts Section - Section Title.
$wp_customize->add_setting(
	'quick_news_trending_posts_title',
	array(
		'default'           => __( 'Trending Posts', 'quick-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'quick_news_trending_posts_title',
	array(
		'label'           => esc_html__( 'Trending Posts Section Title', 'quick-news' ),
		'section'         => 'quick_news_banner_section',
		'settings'        => 'quick_news_trending_posts_title',
		'type'            => 'text',
		'active_callback' => 'quick_news_is_banner_section_enabled',
	)
);

// Trending Section - Content Type.
$wp_customize->add_setting(
	'quick_news_trending_posts_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'quick_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'quick_news_trending_posts_content_type',
	array(
		'label'           => esc_html__( 'Select Trending Content Type', 'quick-news' ),
		'section'         => 'quick_news_banner_section',
		'settings'        => 'quick_news_trending_posts_content_type',
		'type'            => 'select',
		'active_callback' => 'quick_news_is_banner_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'quick-news' ),
			'category' => esc_html__( 'Category', 'quick-news' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// Trending Section - Select Post.
	$wp_customize->add_setting(
		'quick_news_trending_posts_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'quick_news_trending_posts_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'quick-news' ), $i ),
			'section'         => 'quick_news_banner_section',
			'settings'        => 'quick_news_trending_posts_content_post_' . $i,
			'active_callback' => 'quick_news_is_trending_posts_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => quick_news_get_post_choices(),
		)
	);

}

// Trending Section - Select Category.
$wp_customize->add_setting(
	'quick_news_trending_posts_content_category',
	array(
		'sanitize_callback' => 'quick_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'quick_news_trending_posts_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'quick-news' ),
		'section'         => 'quick_news_banner_section',
		'settings'        => 'quick_news_trending_posts_content_category',
		'active_callback' => 'quick_news_is_trending_posts_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => quick_news_get_post_cat_choices(),
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'quick_news_editor_pick_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Quick_News_Customize_Horizontal_Line(
		$wp_customize,
		'quick_news_editor_pick_horizontal_line',
		array(
			'section'         => 'quick_news_banner_section',
			'settings'        => 'quick_news_editor_pick_horizontal_line',
			'active_callback' => 'quick_news_is_banner_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Editor Pick Section - Section Title.
$wp_customize->add_setting(
	'quick_news_editor_pick_title',
	array(
		'default'           => __( 'Editor Pick', 'quick-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'quick_news_editor_pick_title',
	array(
		'label'           => esc_html__( 'Editor Pick Section Title', 'quick-news' ),
		'section'         => 'quick_news_banner_section',
		'settings'        => 'quick_news_editor_pick_title',
		'type'            => 'text',
		'active_callback' => 'quick_news_is_banner_section_enabled',
	)
);

// Editor Pick Section - Content Type.
$wp_customize->add_setting(
	'quick_news_editor_pick_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'quick_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'quick_news_editor_pick_content_type',
	array(
		'label'           => esc_html__( 'Select Editor Pick Content Type', 'quick-news' ),
		'section'         => 'quick_news_banner_section',
		'settings'        => 'quick_news_editor_pick_content_type',
		'type'            => 'select',
		'active_callback' => 'quick_news_is_banner_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'quick-news' ),
			'category' => esc_html__( 'Category', 'quick-news' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// Editor Pick Section - Select Post.
	$wp_customize->add_setting(
		'quick_news_editor_pick_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'quick_news_editor_pick_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'quick-news' ), $i ),
			'section'         => 'quick_news_banner_section',
			'settings'        => 'quick_news_editor_pick_content_post_' . $i,
			'active_callback' => 'quick_news_is_editor_pick_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => quick_news_get_post_choices(),
		)
	);

}

// Editor Pick Section - Select Category.
$wp_customize->add_setting(
	'quick_news_editor_pick_content_category',
	array(
		'sanitize_callback' => 'quick_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'quick_news_editor_pick_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'quick-news' ),
		'section'         => 'quick_news_banner_section',
		'settings'        => 'quick_news_editor_pick_content_category',
		'active_callback' => 'quick_news_is_editor_pick_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => quick_news_get_post_cat_choices(),
	)
);
