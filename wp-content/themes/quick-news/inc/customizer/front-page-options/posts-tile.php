<?php
/**
 * Posts Tile Section
 *
 * @package Quick News
 */

$wp_customize->add_section(
	'quick_news_posts_tile_section',
	array(
		'panel' => 'quick_news_front_page_options',
		'title' => esc_html__( 'Posts Tile Section', 'quick-news' ),
	)
);

// Posts Tile Section - Enable Section.
$wp_customize->add_setting(
	'quick_news_enable_posts_tile_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'quick_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Quick_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'quick_news_enable_posts_tile_section',
		array(
			'label'    => esc_html__( 'Enable Posts Tile Section', 'quick-news' ),
			'section'  => 'quick_news_posts_tile_section',
			'settings' => 'quick_news_enable_posts_tile_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'quick_news_enable_posts_tile_section',
		array(
			'selector' => '#quick_news_posts_tile_section .section-link',
			'settings' => 'quick_news_enable_posts_tile_section',
		)
	);
}

// Posts Tile Section - Section Title.
$wp_customize->add_setting(
	'quick_news_posts_tile_title',
	array(
		'default'           => __( 'Posts Tile', 'quick-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'quick_news_posts_tile_title',
	array(
		'label'           => esc_html__( 'Section Title', 'quick-news' ),
		'section'         => 'quick_news_posts_tile_section',
		'settings'        => 'quick_news_posts_tile_title',
		'type'            => 'text',
		'active_callback' => 'quick_news_is_posts_tile_section_enabled',
	)
);

// Posts Tile Section - Content Type.
$wp_customize->add_setting(
	'quick_news_posts_tile_content_type',
	array(
		'default'           => 'category',
		'sanitize_callback' => 'quick_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'quick_news_posts_tile_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'quick-news' ),
		'section'         => 'quick_news_posts_tile_section',
		'settings'        => 'quick_news_posts_tile_content_type',
		'type'            => 'select',
		'active_callback' => 'quick_news_is_posts_tile_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'quick-news' ),
			'category' => esc_html__( 'Category', 'quick-news' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// Posts Tile Section - Select Post.
	$wp_customize->add_setting(
		'quick_news_posts_tile_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'quick_news_posts_tile_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'quick-news' ), $i ),
			'section'         => 'quick_news_posts_tile_section',
			'settings'        => 'quick_news_posts_tile_content_post_' . $i,
			'active_callback' => 'quick_news_is_posts_tile_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => quick_news_get_post_choices(),
		)
	);

}

// Posts Tile Section - Select Category.
$wp_customize->add_setting(
	'quick_news_posts_tile_content_category',
	array(
		'sanitize_callback' => 'quick_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'quick_news_posts_tile_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'quick-news' ),
		'section'         => 'quick_news_posts_tile_section',
		'settings'        => 'quick_news_posts_tile_content_category',
		'active_callback' => 'quick_news_is_posts_tile_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => quick_news_get_post_cat_choices(),
	)
);

// Posts Tile Section - Button Label.
$wp_customize->add_setting(
	'quick_news_posts_tile_button_label',
	array(
		'default'           => __( 'View All', 'quick-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'quick_news_posts_tile_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'quick-news' ),
		'section'         => 'quick_news_posts_tile_section',
		'settings'        => 'quick_news_posts_tile_button_label',
		'type'            => 'text',
		'active_callback' => 'quick_news_is_posts_tile_section_enabled',
	)
);

// Posts Tile Section - Button Link.
$wp_customize->add_setting(
	'quick_news_posts_tile_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'quick_news_posts_tile_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'quick-news' ),
		'section'         => 'quick_news_posts_tile_section',
		'settings'        => 'quick_news_posts_tile_button_link',
		'type'            => 'url',
		'active_callback' => 'quick_news_is_posts_tile_section_enabled',
	)
);
