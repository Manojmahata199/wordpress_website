<?php
/**
 * Banner Section
 *
 * @package Newspulse Magazine
 */

$wp_customize->add_section(
	'newspulse_magazine_banner_section',
	array(
		'panel' => 'newspulse_magazine_front_page_options',
		'title' => esc_html__( 'Banner Section', 'newspulse-magazine' ),
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'newspulse_magazine_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'newspulse_magazine_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Newspulse_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'newspulse_magazine_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'newspulse-magazine' ),
			'section'  => 'newspulse_magazine_banner_section',
			'settings' => 'newspulse_magazine_enable_banner_section',
			'priority' => 10,
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'newspulse_magazine_enable_banner_section',
		array(
			'selector' => '#newspulse_magazine_banner_section .section-link',
			'settings' => 'newspulse_magazine_enable_banner_section',
		)
	);
}

// Banner Section - Banner Posts Content Type.
$wp_customize->add_setting(
	'newspulse_magazine_banner_posts_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'newspulse_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_banner_posts_content_type',
	array(
		'label'           => esc_html__( 'Select Banner\'s Posts Content Type', 'newspulse-magazine' ),
		'section'         => 'newspulse_magazine_banner_section',
		'settings'        => 'newspulse_magazine_banner_posts_content_type',
		'type'            => 'select',
		'active_callback' => 'newspulse_magazine_is_banner_posts_section_enabled',
		'priority'        => 20,
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'newspulse-magazine' ),
			'category' => esc_html__( 'Category', 'newspulse-magazine' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'newspulse_magazine_banner_posts_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'newspulse_magazine_banner_posts_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'newspulse-magazine' ), $i ),
			'section'         => 'newspulse_magazine_banner_section',
			'settings'        => 'newspulse_magazine_banner_posts_content_post_' . $i,
			'active_callback' => 'newspulse_magazine_is_banner_posts_section_and_content_type_post_enabled',
			'type'            => 'select',
			'priority'        => 30,
			'choices'         => newspulse_magazine_get_post_choices(),
		)
	);

}

// Banner Section - Select Category.
$wp_customize->add_setting(
	'newspulse_magazine_banner_posts_content_category',
	array(
		'sanitize_callback' => 'newspulse_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_banner_posts_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'newspulse-magazine' ),
		'section'         => 'newspulse_magazine_banner_section',
		'settings'        => 'newspulse_magazine_banner_posts_content_category',
		'active_callback' => 'newspulse_magazine_is_banner_posts_section_and_content_type_category_enabled',
		'type'            => 'select',
		'priority'        => 40,
		'choices'         => newspulse_magazine_get_post_cat_choices(),
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'newspulse_magazine_banner_posts_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Newspulse_Magazine_Customize_Horizontal_Line(
		$wp_customize,
		'newspulse_magazine_banner_posts_horizontal_line',
		array(
			'section'         => 'newspulse_magazine_banner_section',
			'settings'        => 'newspulse_magazine_banner_posts_horizontal_line',
			'active_callback' => 'newspulse_magazine_is_banner_posts_section_enabled',
			'type'            => 'hr',
			'priority'        => 50,
		)
	)
);

// Banner Section - Editor Pick Title.
$wp_customize->add_setting(
	'newspulse_magazine_editor_picks_title',
	array(
		'default'           => __( 'Editor\'s Picks', 'newspulse-magazine' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_editor_picks_title',
	array(
		'label'           => esc_html__( 'Editors Picks\'s Section Title', 'newspulse-magazine' ),
		'section'         => 'newspulse_magazine_banner_section',
		'settings'        => 'newspulse_magazine_editor_picks_title',
		'type'            => 'text',
		'active_callback' => 'newspulse_magazine_is_banner_posts_section_enabled',
		'priority'        => 60,
	)
);

// Banner Section - Editor Pick Content Type.
$wp_customize->add_setting(
	'newspulse_magazine_editor_picks_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'newspulse_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_editor_picks_content_type',
	array(
		'label'           => esc_html__( 'Select Editor Picks\'s Content Type', 'newspulse-magazine' ),
		'section'         => 'newspulse_magazine_banner_section',
		'settings'        => 'newspulse_magazine_editor_picks_content_type',
		'type'            => 'select',
		'active_callback' => 'newspulse_magazine_is_banner_posts_section_enabled',
		'priority'        => 70,
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'newspulse-magazine' ),
			'category' => esc_html__( 'Category', 'newspulse-magazine' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Banner Section - Editor Picks Select Post.
	$wp_customize->add_setting(
		'newspulse_magazine_editor_picks_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'newspulse_magazine_editor_picks_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'newspulse-magazine' ), $i ),
			'section'         => 'newspulse_magazine_banner_section',
			'settings'        => 'newspulse_magazine_editor_picks_content_post_' . $i,
			'active_callback' => 'newspulse_magazine_is_editor_picks_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => newspulse_magazine_get_post_choices(),
			'priority'        => 80,
		)
	);

}

// Banner Section - Editor picks Select Category.
$wp_customize->add_setting(
	'newspulse_magazine_editor_picks_content_category',
	array(
		'sanitize_callback' => 'newspulse_magazine_sanitize_select',
	)
);

$wp_customize->add_control(
	'newspulse_magazine_editor_picks_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'newspulse-magazine' ),
		'section'         => 'newspulse_magazine_banner_section',
		'settings'        => 'newspulse_magazine_editor_picks_content_category',
		'active_callback' => 'newspulse_magazine_is_editor_picks_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => newspulse_magazine_get_post_cat_choices(),
		'priority'        => 90,
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'newspulse_magazine_editor_picks_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Newspulse_Magazine_Customize_Horizontal_Line(
		$wp_customize,
		'newspulse_magazine_editor_picks_horizontal_line',
		array(
			'section'         => 'newspulse_magazine_banner_section',
			'settings'        => 'newspulse_magazine_editor_picks_horizontal_line',
			'active_callback' => 'newspulse_magazine_is_banner_posts_section_enabled',
			'type'            => 'hr',
			'priority'        => 100,
		)
	)
);

	// Banner Section - Advertisement Area.
	$wp_customize->add_setting(
		'newspulse_magazine_banner_advertisement_area',
		array(
			'default'           => '',
			'sanitize_callback' => 'newspulse_magazine_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'newspulse_magazine_banner_advertisement_area',
			array(
				'label'           => esc_html__( 'Advertisement Area', 'newspulse-magazine' ),
				'section'         => 'newspulse_magazine_banner_section',
				'settings'        => 'newspulse_magazine_banner_advertisement_area',
				'active_callback' => 'newspulse_magazine_is_banner_posts_section_enabled',
				'priority'        => 110,
			)
		)
	);

	// Banner Section - Advertisement Link.
	$wp_customize->add_setting(
		'newspulse_magazine_banner_advertisement_link',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'newspulse_magazine_banner_advertisement_link',
		array(
			'label'           => esc_html__( 'Advertisement Link', 'newspulse-magazine' ),
			'section'         => 'newspulse_magazine_banner_section',
			'settings'        => 'newspulse_magazine_banner_advertisement_link',
			'type'            => 'url',
			'active_callback' => 'newspulse_magazine_is_banner_posts_section_enabled',
			'priority'        => 120,
		)
	);
