<?php

// List Posts Thumbnail Widget.
require get_template_directory() . '/inc/widgets/list-posts-thumbnail-widget.php';

// Grid Posts Widget.
require get_template_directory() . '/inc/widgets/grid-posts-widget.php';

// Trending Posts Widget.
require get_template_directory() . '/inc/widgets/trending-posts-widget.php';

// Tile List Posts Widget.
require get_template_directory() . '/inc/widgets/tile-list-posts-widget.php';

// Slider Widget.
require get_template_directory() . '/inc/widgets/slider-widget.php';

// Social Icons Widget.
require get_template_directory() . '/inc/widgets/social-icons-widget.php';

/**
 * Register Widgets
 */
function bright_news_register_widgets() {

	register_widget( 'Bright_News_List_Posts_Thumbnail_Widget' );

	register_widget( 'Bright_News_Grid_Posts_Widget' );

	register_widget( 'Bright_News_Trending_Posts_Widget' );

	register_widget( 'Bright_News_Tile_List_Posts_Widget' );

	register_widget( 'Bright_News_Slider_Widget' );

	register_widget( 'Bright_News_Social_Icons_Widget' );

}
add_action( 'widgets_init', 'bright_news_register_widgets' );
