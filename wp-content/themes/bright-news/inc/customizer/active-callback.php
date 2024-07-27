<?php

/**
 * Active Callbacks
 *
 * @package Bright_News
 */

// Theme Options.
function bright_news_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'bright_news_enable_pagination' )->value() );
}
function bright_news_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'bright_news_enable_breadcrumb' )->value() );
}

// Flash News Section.
function bright_news_is_flash_news_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'bright_news_enable_flash_news_section' )->value() );
}
function bright_news_is_flash_news_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'bright_news_flash_news_content_type' )->value();
	return ( bright_news_is_flash_news_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function bright_news_is_flash_news_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'bright_news_flash_news_content_type' )->value();
	return ( bright_news_is_flash_news_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Slider Section.
function bright_news_is_banner_slider_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'bright_news_enable_banner_section' )->value() );
}
function bright_news_is_banner_slider_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'bright_news_main_banner_slider_content_type' )->value();
	return ( bright_news_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function bright_news_is_banner_slider_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'bright_news_main_banner_slider_content_type' )->value();
	return ( bright_news_is_banner_slider_section_enabled( $control ) && ( 'category' === $content_type ) );
}
function bright_news_is_banner_post_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'bright_news_banner_posts_content_type' )->value();
	return ( bright_news_is_banner_slider_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function bright_news_is_banner_post_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'bright_news_banner_posts_content_type' )->value();
	return ( bright_news_is_banner_slider_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Check if static home page is enabled.
function bright_news_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}
