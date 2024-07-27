<?php

/**
 * Active Callbacks
 *
 * @package Newspulse Magazine
 */

// Theme Options.
function newspulse_magazine_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'newspulse_magazine_enable_pagination' )->value() );
}
function newspulse_magazine_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'newspulse_magazine_enable_breadcrumb' )->value() );
}

// Flash News Section.
function newspulse_magazine_is_flash_news_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'newspulse_magazine_enable_flash_news_section' )->value() );
}
function newspulse_magazine_is_flash_news_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'newspulse_magazine_flash_news_content_type' )->value();
	return ( newspulse_magazine_is_flash_news_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function newspulse_magazine_is_flash_news_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'newspulse_magazine_flash_news_content_type' )->value();
	return ( newspulse_magazine_is_flash_news_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Slider Section.
function newspulse_magazine_is_banner_posts_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'newspulse_magazine_enable_banner_section' )->value() );
}
function newspulse_magazine_is_banner_posts_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'newspulse_magazine_banner_posts_content_type' )->value();
	return ( newspulse_magazine_is_banner_posts_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function newspulse_magazine_is_banner_posts_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'newspulse_magazine_banner_posts_content_type' )->value();
	return ( newspulse_magazine_is_banner_posts_section_enabled( $control ) && ( 'category' === $content_type ) );
}
function newspulse_magazine_is_editor_picks_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'newspulse_magazine_editor_picks_content_type' )->value();
	return ( newspulse_magazine_is_banner_posts_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function newspulse_magazine_is_editor_picks_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'newspulse_magazine_editor_picks_content_type' )->value();
	return ( newspulse_magazine_is_banner_posts_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Check if static home page is enabled.
function newspulse_magazine_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}
