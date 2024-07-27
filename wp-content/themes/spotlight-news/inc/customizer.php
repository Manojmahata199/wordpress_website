<?php
/**
 * Theme Customizer
 *
 * @package Spotlight_News
 */

function spotlight_news_customize_register( $wp_customize ) {

	// Upsell Section.
	$wp_customize->add_section(
		new Spotlight_News_Upsell_Section(
			$wp_customize,
			'upsell_sections',
			array(
				'title'            => __( 'Spotlight News Pro', 'spotlight-news' ),
				'button_text'      => __( 'Buy Pro', 'spotlight-news' ),
				'url'              => 'https://ascendoor.com/themes/spotlight-news-pro/',
				'background_color' => '#e23636',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

	for ( $i = 1; $i <= 5; $i++ ) {
		// Banner Section - Select Post.
		$wp_customize->add_setting(
			'spotlight_news_banner_posts_content_post_' . $i,
			array(
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			'spotlight_news_banner_posts_content_post_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Select Post %d', 'spotlight-news' ), $i ),
				'section'         => 'newspulse_magazine_banner_section',
				'settings'        => 'spotlight_news_banner_posts_content_post_' . $i,
				'active_callback' => 'newspulse_magazine_is_banner_posts_section_and_content_type_post_enabled',
				'type'            => 'select',
				'priority'        => 35,
				'choices'         => newspulse_magazine_get_post_choices(),
			)
		);

	}

	for ( $i = 1; $i <= 5; $i++ ) {
		// Banner Section - Editor Picks Select Post.
		$wp_customize->add_setting(
			'spotlight_news_editor_picks_content_post_' . $i,
			array(
				'sanitize_callback' => 'absint',
			)
		);

		$wp_customize->add_control(
			'spotlight_news_editor_picks_content_post_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Select Post %d', 'spotlight-news' ), $i ),
				'section'         => 'newspulse_magazine_banner_section',
				'settings'        => 'spotlight_news_editor_picks_content_post_' . $i,
				'active_callback' => 'newspulse_magazine_is_editor_picks_section_and_content_type_post_enabled',
				'type'            => 'select',
				'choices'         => newspulse_magazine_get_post_choices(),
				'priority'        => 85,
			)
		);

	}

}
add_action( 'customize_register', 'spotlight_news_customize_register' );

function spotlight_news_custom_control_scripts() {

	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'spotlight-news-custom-controls-css', get_stylesheet_directory_uri() . '/assets/css/custom-controls' . $min . '.css', array( 'newspulse-magazine-custom-controls-css' ), '1.0', 'all' );
	wp_enqueue_script( 'spotlight-news-custom-controls-js', get_stylesheet_directory_uri() . '/assets/js/custom-controls' . $min . '.js', array( 'newspulse-magazine-custom-controls-js', 'jquery', 'jquery-ui-core' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'spotlight_news_custom_control_scripts' );
