<?php

/**
 * Active Callbacks
 *
 * @package Quick News
 */

// Theme Options.
function quick_news_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'quick_news_enable_pagination' )->value() );
}
function quick_news_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'quick_news_enable_breadcrumb' )->value() );
}

// Flash News Section.
function quick_news_is_flash_news_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'quick_news_enable_flash_news_section' )->value() );
}
function quick_news_is_flash_news_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'quick_news_flash_news_content_type' )->value();
	return ( quick_news_is_flash_news_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function quick_news_is_flash_news_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'quick_news_flash_news_content_type' )->value();
	return ( quick_news_is_flash_news_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Section.
function quick_news_is_banner_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'quick_news_enable_banner_section' )->value() );
}
function quick_news_is_banner_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'quick_news_main_news_content_type' )->value();
	return ( quick_news_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function quick_news_is_banner_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'quick_news_main_news_content_type' )->value();
	return ( quick_news_is_banner_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Section - Trending Posts.
function quick_news_is_trending_posts_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'quick_news_trending_posts_content_type' )->value();
	return ( quick_news_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function quick_news_is_trending_posts_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'quick_news_trending_posts_content_type' )->value();
	return ( quick_news_is_banner_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Section - Editor Pick.
function quick_news_is_editor_pick_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'quick_news_editor_pick_content_type' )->value();
	return ( quick_news_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function quick_news_is_editor_pick_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'quick_news_editor_pick_content_type' )->value();
	return ( quick_news_is_banner_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Posts Tile Section.
function quick_news_is_posts_tile_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'quick_news_enable_posts_tile_section' )->value() );
}
function quick_news_is_posts_tile_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'quick_news_posts_tile_content_type' )->value();
	return ( quick_news_is_posts_tile_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function quick_news_is_posts_tile_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'quick_news_posts_tile_content_type' )->value();
	return ( quick_news_is_posts_tile_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Check if static home page is enabled.
function quick_news_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}
