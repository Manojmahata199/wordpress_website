<?php

// Posts Small List Widget.
require get_theme_file_path() . '/inc/widgets/posts-small-list-widget.php';

/**
 * Register Widgets
 */
function spotlight_news_register_widgets() {

	register_widget( 'Newspulse_Magazine_Posts_Small_List_Widget' );

}
add_action( 'widgets_init', 'spotlight_news_register_widgets' );
