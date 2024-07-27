<?php

// Posts Grid Widget.
require get_template_directory() . '/inc/widgets/posts-grid-widget.php';

// Posts List Widget.
require get_template_directory() . '/inc/widgets/posts-list-widget.php';

// Posts Small List Widget.
require get_template_directory() . '/inc/widgets/posts-small-list-widget.php';

// Posts Slider Widget.
require get_template_directory() . '/inc/widgets/posts-slider-widget.php';

// Social Icons Widget.
require get_template_directory() . '/inc/widgets/social-icons-widget.php';

// Categories Widget.
require get_template_directory() . '/inc/widgets/categories-widget.php';

/**
 * Register Widgets
 */
function quick_news_pro_register_widgets() {

	register_widget( 'Quick_News_Posts_Grid_Widget' );

	register_widget( 'Quick_News_Posts_List_Widget' );

	register_widget( 'Quick_News_Posts_Small_List_Widget' );

	register_widget( 'Quick_News_Posts_Slider_Widget' );

	register_widget( 'Quick_News_Social_Icons_Widget' );

	register_widget( 'Quick_News_Categories_Widget' );

}
add_action( 'widgets_init', 'quick_news_pro_register_widgets' );
